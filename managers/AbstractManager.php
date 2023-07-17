<?php

abstract class AbstractManager
{
    protected PDO $db;
    
    public function __construct()
    {
        $dbName = "kevincorvaisier_simple-api";
        $dbPort = "3306";
        $dbHost = "db.3wa.io";
        $dbUsername = "kevincorvaisier";
        $dbPassword = "04646b679a4ab0a202f8007ea81fe675";

        $connexionString = 'mysql:host='.$dbHost.';port='.$dbPort.';dbname='.$dbName;
        $this->db = new PDO(
           $connexionString,
           $dbUsername,
           $dbPassword
        );
    }
}