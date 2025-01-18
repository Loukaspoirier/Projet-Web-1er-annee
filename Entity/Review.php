<?php

// Classe pour ajouter une revue
class Review
{
    // Attributs
    private int $id_review;
    private string $title;
    private string $content;
    private string $author;
    private string $image;
    private int $note;
    private string $platform;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Méthodes
    public function getId_review(): int
    {
        return $this->id_review;
    }

    public function setId_review(int $id_review): self
    {
        $this->id_review = $id_review;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getNote()
    {
        return $this->note;
    }
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }
    public function getPlatform()
    {
        return $this->platform;
    }
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }
}
