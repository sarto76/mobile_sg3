<?php

define("DB_HOST", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "scuolag_maindb");

/*
define("DB_HOST", "192.168.2.10");
define("DB_USER", "admin");
define("DB_PASS", "Elenapiffa1");
define("DB_NAME", "scuolag_maindb");
*/

//estendo cla classe PDO
class Database extends PDO
{
    //inserisco i valori delle costanti nelle variabili della classe
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $_handle = null;

    public static function get()
    {
        static $db = null;
        if ( $db == null )
            $db = new Database();
        return $db;
    }

    public function __construct()
    {
        try{
            //creo PDO per mysql
            $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $this->_handle =parent::__construct($dns, $this->user, $this->pass);
            //setto attributo per ritornare errori PDOException
            $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // meglio disabilitare gli emulated prepared con i driver MySQL
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            }
        //se ci sono errori li ritorno
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>