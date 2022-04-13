<?php

require_once '../App/Entity/Entity.php';

class Diplome extends Entity{
    private int $id;
    private string $nom;
    private string $ecole;
    private string $lieu;
    private string $date_ob;
    private bool $obtenu;
    private string $description;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEcole()
    {
        return $this->ecole;
    }

    public function setEcole($ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getLieu()
    {
        return $this->lieu;
    }

    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDate_ob()
    {
        return $this->date_ob;
    }
 
    public function setDate_ob($date_ob)
    {
        $this->date_ob = $date_ob;

        return $this;
    }

    public function getObtenu()
    {
        return $this->obtenu;
    }

    public function setObtenu($obtenu)
    {
        $this->obtenu = $obtenu;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}