<?php
class database{
    private static $host = 'localhost';
    private static $dbname = 'gestion_academica';
    private static $username = 'root';
    private static $password = '';


    //Method what returns a db connection
    public static function getConnetion(){
        try {
            //String connection
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4";

            //Creating an isntance of pdo
            $pdo = new PDO($dsn, self::$username, self::$password);

            return $pdo;
        } catch (PDOexception $e){
            echo "Conection error: " . $e->getMessage();
        }
    }

    public static function closeConnection($pdo){
        $pdo = null;
        return $pdo;
    }
}   
?>

