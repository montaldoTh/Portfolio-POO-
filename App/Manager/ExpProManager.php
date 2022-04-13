<?php

require '../App/Entity/ExpPro.php';
require_once '../App/Manager/Manager.php';

class ExpProManager extends Manager{
    public function getAll(){
        $sql = 'SELECT * FROM exp_pro';
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $exps = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($exps as $exp){
            $result[]= (new ExpPro())->hydrate($exp);
        }
        return $result;
    }

    public function get(int $id){
        $sql = 'SELECT * FROM exp_pro WHERE id= :id';
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $exp= (new Diplome())->hydrate($result);
        return $exp;
    }

    public function insert(string $poste, string $entreprise, string $date_debut, string $date_fin, bool $description, string $lieu){
        $sql = 'INSERT INTO exp_pro (poste, entreprise, date_debut, date_fin, description, lieu) VALUES (:poste, :entreprise, :date_debut, :date_fin, :description, :lieu)';
        $req = $this->getPdo()->prepare($sql);
        $req->execute(compact('poste', 'entreprise', 'date_debut', 'date_fin', 'description', 'lieu'));
        
        return $this->getPdo()->lastInsertId();
    }

    public function update(int $id, string $poste, string $entreprise, string $date_debut, string $date_fin, bool $description, string $lieu){
        $sql = 'UPDATE exp_pro SET poste = :poste, entreprise = :entreprise, date_debut = :date_debut, date_fin = :date_fin, description = :description, lieu = :lieu WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id', 'poste', 'entreprise', 'date_debut', 'date_fin', 'description', 'lieu'));
    }

    public function delete(int $id){
        $sql = 'DELETE FROM diplome WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id'));
    }
}