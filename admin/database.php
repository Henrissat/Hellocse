<?php

class Database
{

    private static $dbHost = "localhost";
    private static $dbname = "hellocse";
    private static $dbUser = "root";
    private static $dbUserPassword = "";

    private static $connection = null;

    /* Connection à la base de données avec gestion des erreurs */
    public static function connect()
    {
        
        try
        {
            self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" .self::$dbname,self::$dbUser,self::$dbUserPassword);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
        return self::$connection;
    }

    /* deconnection à la base de donneés*/ 
    public static function disconnect()
    {
        self::$connection = null;
    }
}

Database::connect();

?>