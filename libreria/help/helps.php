<?php

/**
  * Funcion que nos permite incluir los modelos dinamicamente
 */

function includeModels(){
	//Los modelos estan inlcuidos en el core por lo tanto pueden ser leidos desde cualquier archivo de la aplicación
	$directorio = opendir(MODELS);
	//Leemos el directorio cuanstas veces exista el directorio
	//echo $directorio;
	//Cada vez que sea un archivo entra y en caso contrario no entre
	while($archivo = readdir($directorio )){
		//VErificamos si no es directorio, sera un archivo .php
		if(!is_dir($archivo)){
			//sin esto no puede funcionar, la dirde models se concatena el archivo
			require_once MODELS.$archivo;
		}//if
	}//while
}
/**
 * Esta funcion nos va a ayudar a retornar un asset (un CSS o Js, imagen, archivo de video o imagen)
 *  - $asset : nombre del archivo que esta dentro de asset
 */
function asset($asset){
	$urlprin = trim(str_replace("index.php","",$_SERVER["PHP_SELF"]),"/");
	echo "/".$urlprin."/assets/".$asset;

}


/**
 *  Funcion que permite redireccionar hacia otra parte
 *   - $rute : ruta hacia donde queremos dirigirnos
 */
function redireccionar($rute){
	$urlprin = str_replace("index.php","",$_SERVER["PHP_SELF"]);
	header("location:/".trim($urlprin,"/")."".$rute);
}
/**
 * Funcion que nos permite escribir una url por medio del que le pasamos
 * - $rute : ruta hacia donde se va a ir.
 */
function ruta($ruta){
	$urlprin = str_replace("index.php","",$_SERVER["PHP_SELF"]);
	echo trim($urlprin,"/")."".$rute;
}