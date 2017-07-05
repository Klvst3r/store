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
			$paths = explode(".",$path); //Convertimos a un array separado por puntos
			//echo count($paths);
			$ruta = ""; //Inicializamos
			//Recorremos todo el arraglo de rutas $paths
			for($i=0;$i < count($paths);$i++){
				//condicional para verificar si es el ultimo elemento de la ruta para agregarle la extensión ".php"
				if($i == count($paths)-1){
					$ruta .= $paths[$i].".php";
				}else {
					//Si no es el ultimo elemento de la ruta concatenamos "/"
					$ruta .= $paths[$i]."/";
				}//if
			}//for
			//echo $ruta; //Impresion de la ruta dinamica
			//Juntamos las dos rutas
			//echo VISTA_RUTA.$ruta;
			//Comprobamos si existe el archivo
			if(file_exists(VISTA_RUTA.$ruta)){
				//Si existe la vista incluimos el archivo de la ruta
				include VISTA_RUTA.$ruta;
			}else {
				die("No existe la Vista");
			}//if
		} //if path != "" 
	} //function crear

} //Class vista
