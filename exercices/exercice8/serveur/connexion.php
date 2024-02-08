<?php
include_once("configconnexion.php");
class Connexion
{
    public static $_instance = null;
    private $pdo;
    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new Connexion();
        }
        return self::$_instance;
    }


    private function __construct()
    {

        try {
            $this->pdo = new PDO(
                DB_TYPE . ":host=" . DB_HOST . ";port=3306;dbname=" . DB_NAME,
                DB_USER,
                DB_PASS,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_PERSISTENT => true
                )
            );
        } catch (PDOException $e) {
            print "Erreur !:" . $e->getMessage() . "";
            die();
        }

    }
    
}
?>