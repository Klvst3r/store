<?php

namespace libreria\ORM;

class EtORM extends \Conexion {
	//Se extienda de la clase conexion importada en el core por encima de esta libreria
	//Se tienen dos porpiedades protegidas que recuepra
	protected static $cnx;
	protected static $table;

	//Funcion para imprimir la obtencion del nombre de la tabla del ORM
	public static function getTable(){
		echo static::$table;
	}

}