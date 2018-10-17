<?php
require_once("libs/connection.php");



Class Model{


	function __construct() {

    }

    public static function getConnection(){
        $conn=Database::get();
        return $conn;
    }
	
	
	
	
	
}
