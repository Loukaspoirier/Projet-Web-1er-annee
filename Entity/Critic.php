<?php 

// Classe pour ajouter des critiques
class Critic
{
    // Attributs 
    private int $id_critic;
    private string $criticTitle;
    private string $strongPoint;
    private string $weakPoint;

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
    public function getId_critic(): int
    {
        return $this->id_critic;
    }
    public function setId_critic($id_critic): self
    {
        $this->id_critic = $id_critic;

        return $this;
    }
    public function getCriticTitle()
    {
        return $this->criticTitle;
    }
    public function setCriticTitle($CriticTitle)
    {
        $this->criticTitle = $CriticTitle;

        return $this;
    }
    public function getStrongPoint()
    {
        return $this->strongPoint;
    }
    public function setStrongPoint($strongPoint)
    {
        $this->strongPoint = $strongPoint;

        return $this;
    }
    public function getWeakPoint()
    {
        return $this->weakPoint;
    }
    public function setWeakPoint($weakPoint)
    {
        $this->weakPoint = $weakPoint;

        return $this;
    }
}

?>