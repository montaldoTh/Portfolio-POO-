<?php

require '../App/Entity/Diplome.php';
require_once '../App/Manager/Manager.php';

class DiplomeManager extends Manager{
    public function getAll(){
        $sql = 'SELECT * FROM diplome';
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $diplomes = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($diplomes as $diplome){
            $result[]= (new Diplome())->hydrate($diplome);
        }
        return $result;
    }

    public function get(int $id){
        $sql = 'SELECT * FROM diplome WHERE id= :id';
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $diplome= (new Diplome())->hydrate($result);
        return $diplome;
    }

    public function insert(string $nom, string $ecole, string $lieu, string $date_ob, bool $obtenu, string $description){
        $sql = 'INSERT INTO diplome (nom, ecole, lieu, date_ob, obtenu, description) VALUES (:nom, :ecole, :lieu, :date_ob, :obtenu, :description)';
        $req = $this->getPdo()->prepare($sql);
        $req->execute(compact('nom', 'ecole', 'lieu', 'date_ob', 'obtenu', 'description'));
        
        return $this->getPdo()->lastInsertId();
    }

    public function update(int $id, string $nom, string $ecole, string $lieu, string $date_ob, bool $obtenu, string $description){
        $sql = 'UPDATE diplome SET nom = :nom, ecole = :ecole, lieu = :lieu, date_ob = :date_ob, obtenu = :obtenu, description = :description WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id', 'nom', 'ecole', 'lieu', 'date_ob', 'obtenu', 'description'));
    }

    public function delete(int $id){
        $sql = 'DELETE FROM diplome WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id'));
    }
}