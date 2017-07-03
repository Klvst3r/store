<?php

/**
 * Created by Klvst3r
 * User: Klvst3r
 * Date: 03-07-2017
 * Time: 14h30
 */

class Conexion{
	public static function conectar(){
		try{
			$cn = new PDO("mysql:host=localhost;database=store", "root", "jaque");
		}catch (PDOExeption $ex){
			echo $ex->getMessage();
		}
		//return $cn;
		echo "Conection Successful";
	}
}

Conexion::conectar();