<?php

/**
 * Created by Klvst3r
 * User: Klvst3r
 * Date: 03-07-2017
 * Time: 14h30
 */
include "../config/config.php";


/*
try{
	$dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=utf8";
	new PDO($dsn,DB_USERNAME,DB_PASSWORD);
	}catch (PDOExeption $e){
			die($e->getMessage());
	}
echo "Connection Successful"; 

 */

class Conexion{
	public static function conectar(){
		try{
			$cn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSBD);
		}catch (PDOExeption $ex){
			echo $ex->getMessage();
		}
		//return $cn;
		echo "Connection Successful"; 
	}
}

Conexion::conectar();