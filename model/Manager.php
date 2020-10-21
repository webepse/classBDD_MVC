<?php
namespace App;
use \PDO;

class Manager{
    private $dbName = "blog2";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbHost = "localhost";

    private $bdd;

    protected function dbConnect(){
        if($this->bdd === NULL){
            try{
                $bdd = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName.';charset=utf8',$this->dbUser,$this->dbPass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $this->bdd = $bdd;
            }catch(\Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        return $this->bdd;

    }

}