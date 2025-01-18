<?php

class CriticController
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

    // Fonction pour créer une critique
    public function add(Critic $newCritic)
    {
        $req = $this->db->prepare("INSERT INTO `critic` (strongPoint, weakPoint, criticTitle) VALUES (:strongPoint, :weakPoint, :criticTitle)");

        $req->bindValue(":strongPoint", htmlspecialchars($newCritic->getStrongPoint()), PDO::PARAM_STR);
        $req->bindValue(":weakPoint", $newCritic->getWeakPoint(), PDO::PARAM_STR);
        $req->bindValue(":criticTitle", $newCritic->getCriticTitle(), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id_critic)
    {
        $req = $this->db->prepare("SELECT * FROM `critic` WHERE id_critic = :id_critic");
        $req->bindValue(":id_critic", $id_critic, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetch();
        $critic = new Critic($datas);
        return $critic;
    }

    public function getAll()
    {
        $critics = [];
        $req = $this->db->query("SELECT * FROM `critic` ORDER BY criticTitle");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $critic = new Critic($data);
            $critics[] = $critic;
        }
        return $critics;
    }

    // Fonction pour modifier une critique
    public function update(Critic $updatedCritic)
    {
        $req = $this->db->prepare("UPDATE `critic` SET strongPoint = :strongPoint, weakPoint = :weakPoint, criticTitle = :criticTitle WHERE id_critic = :id_critic");

        $req->bindValue(":strongPoint", $updatedCritic->getStrongPoint(), PDO::PARAM_STR);
        $req->bindValue(":weakPoint", $updatedCritic->getWeakPoint(), PDO::PARAM_STR);
        $req->bindValue(":criticTitle",$updatedCritic->getCriticTitle(), PDO::PARAM_STR);
        $req->bindValue(":id_critic", $updatedCritic->getId_critic(), PDO::PARAM_INT);

        $req->execute();
    }

    // Fonction pour supprimer une critique
    public function remove(int $id_critic)
    {
        $req = $this->db->prepare("DELETE FROM `critic` WHERE id_critic = :id_critic");
        $req->bindValue(":id_critic", $id_critic, PDO::PARAM_INT);
        $req->execute();
    }
}
