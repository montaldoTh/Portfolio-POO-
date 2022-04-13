<?php

abstract class Manager
{
    //Cette méthode est partagé aux autres manager via l'héritage, elle nous permet d'instancié PDO une seul et unique fois afin d'éviter de surcharger notre DB de requete
    protected static $pdo = NULL;

    protected function getPdo()
    {
        if(self::$pdo == NULL){
            try
            {
                self::$pdo = new PDO('mysql:host=localhost;dbname=myqcm','root');
            }
            catch(PDOException $e)
            {
                echo 'Error : ' . $e->getMessage();
                die;
            }
        }

        return self::$pdo;
    }

}