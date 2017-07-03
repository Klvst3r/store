<?php

/**
 * Created by Klvst3r
 * User: Klvst3r
 * Date: 03-07-2017
 * Time: 14h30
 */

define("BD_HOST","localhost");
define("DB_PORT","3306");
define("DB_NAME","store");
define("DB_USERNAME","dev");
define("DB_PASSWORD","desarrollo")

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
			$cn = new PDO("mysql:host=localhost;dbname=store", "root", "jaque");
		}catch (PDOExeption $ex){
			echo $ex->getMessage();
		}
		//return $cn;
		echo "Connection Successful"; 
	}
}

Conexion::conectar();