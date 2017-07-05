<?php namespace vista;

//Creación de la clase vista para las vistas en view

class Vista {
	public static function crear($path){
		//echo "Vista";
		//return "Hola Vista";
		//Pasamos la ruta o el path
		/**
		 * Tenemos un array de pats con separador de "." conviertirlo en rutas
		 * Del string que viene del path de la parte de arriba
		 */
		/**
		 * Comprobamos si existe la variable path
		 */
		if($path != ""){
		//Comprobamos si esta vacio o lleno
		$paths = explode(".",$path);
		echo count($paths);
		}
	}

}
