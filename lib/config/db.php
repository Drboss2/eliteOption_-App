<?php
ob_start();
session_start();

define('DOMIAN',"http://localhost/eliteoption/site/user/");

class Database{

    private $con;

    public $server = "localhost";

    public $username = "root";

    public $password = "";

    public $dbname = "eliteoption";


    public function connect(){

       $this->con = new mysqli($this->server,$this->username,$this->password,$this->dbname);
        if($this->con){
            return $this->con;
        }
        return false;
    }
}







?>