<?php

class ReviewController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "gamingzone";
        $port = 3306;
        $host = "localhost";
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;", $userName, $password));
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    // Fonction pour créer une revue
    public function add(Review $newReview)
    {
        $req = $this->db->prepare("INSERT INTO `review` (title, content, author, image, note, platform) VALUES (:title, :content, :author, :image, :note, :platform)");

        $req->bindValue(":title", htmlspecialchars($newReview->getTitle()), PDO::PARAM_STR);
        $req->bindValue(":content", $newReview->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $newReview->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":image", $newReview->getImage(), PDO::PARAM_STR);
        $req->bindValue(":note", $newReview->getNote(), PDO::PARAM_INT);
        $req->bindValue(":platform", $newReview->getPlatform(), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id_review)
    {
        $req = $this->db->prepare("SELECT * FROM `review` WHERE id_review = :id_review");
        $req->bindValue(":id_review", $id_review, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetch();
        $review = new Review($datas);
        return $review;
    }

    public function getAll()
    {
        $reviews = [];
        $req = $this->db->query("SELECT * FROM `review` ORDER BY title");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $review = new Review($data);
            $reviews[] = $review;
        }
        return $reviews;
    }

    // Fonction pour modifier une revue
    public function update(Review $updatedReview)
    {
        $req = $this->db->prepare("UPDATE `review` SET title = :title, content = :content, author = :author, image = :image, note = :note, platform = :platform WHERE id_review = :id_review");

        $req->bindValue(":title", $updatedReview->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $updatedReview->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $updatedReview->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":image", $updatedReview->getImage(), PDO::PARAM_STR);
        $req->bindValue(":note", $updatedReview->getNote(), PDO::PARAM_INT);
        $req->bindValue(":platform", $updatedReview->getPlatform(), PDO::PARAM_STR);
        $req->bindValue(":id_review", $updatedReview->getId_review(), PDO::PARAM_INT);

        $req->execute();
    }

    // Fonction pour supprimer une revue
    public function remove(int $id_review)
    {
        $req = $this->db->prepare("DELETE FROM `review` WHERE id_review = :id_review");
        $req->bindValue(":id_review", $id_review, PDO::PARAM_INT);
        $req->execute();
    }
}
