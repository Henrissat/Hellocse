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
            //echo "success";git 
        }
        catch(PDOException $e)
        {
            die($e->getMessage("Erreur connection base de données"));
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