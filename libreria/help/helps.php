<?php

/**
 * Incluimos los modelos dinamicamente.
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