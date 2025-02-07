<?php
/**
 * Connection to the database using a PDO object. 
 * @author Juan <juanblancomoyano@gmail.com>
 */
class database{
    /**
     * Database url
     * @var string
     */
    private static $host = 'localhost';
    /**
     * Database name
     * @var string
     */
    private static $dbname = 'gestion_academica';
    /**
     * Database username
     * @var string
     */
    private static $username = 'root';
    /**
     * Database password
     * @var string
     */
    private static $password = 'admin';


    /**
     * Method that connects with the database using values from fields
     * @return PDO instance
     */
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

    /**
     * This method close the connection with de database 
     * @param mixed $pdo connection
     * @return null 
     */
    public static function closeConnection($pdo){
        $pdo = null;
        return $pdo;
    }
}   
?>

