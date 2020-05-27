<?php

class Database {
    
    private static $dbHost = "localhost";
    private static $dbName = "boutique";
    private static $dbUser = "root";
    private static $dbUserPassword = "";

    private static $bdd = null;

    public static function connect(){
       self::$bdd = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,self::$dbUser, self::$dbUserPassword,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return self::$bdd;
    }

    public static function disconnect(){
        self::$bdd = null;
    }
}

Database::connect();



?>