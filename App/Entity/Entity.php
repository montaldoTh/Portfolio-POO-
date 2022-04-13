<?php

abstract class Entity{
    public function hydrate(array $data) // Cette méthode partagé aux autres Entités via l'heritage nous permet de transformer un tableau associatif en un objet
    {
        foreach($data as $key => $value)
        {
            $key = explode('_',$key); //ici nous retirons les _ entre les mots (s'il y en a) pour ensuite ci-dessous transformé chaque première lettre de chaque mot en majuscule
            $method = count($key) == 1 ? "set" . ucfirst($key[0]) : "set"; //Nous verifions d'abord dans le cas d'un mot unique

            //ici nous verifions les cas ou il y a plus d'un mot
            if(count($key) > 1){
                foreach($key as $k => $v){ //grace a la boucle for each nous n'avons pas a nous soucié du nombre de mot, il le fera pour chaqu'un d'eux
                    $method .= ucfirst($v);
                }
            }
            if(method_exists($this, $method)){ //Nous permet de vérifier si la methode set de cette propriétés existe
                $this->$method($value);
            }

            $this->$method($value);
        }

        return $this;
    }
}