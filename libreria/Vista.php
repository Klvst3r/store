<?php namespace vista;

//Creación de la clase vista para las vistas en view

class Vista {
	//Se reciben parametros los cuales no necesariamente deben ser obligatorios entonces al parametro le agregamos "null"
	public static function crear($path,$key=null,$value=null){
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
				//comprobar si existe $key en los parametros de la ruta como atrreglo si es diferente de nulo
				if(!is_null($key)){
					//si viene en formato array
					if(is_array($key)){
						/**
						 * 
						 * Extrar los key y los convierte a variavles
						 */
						//Todo lo que viene como key en el arreglo lo convierte a variable y a la vez su valor lo va a signando a ese key
						extract($key, EXTR_PREFIX_SAME,"");
					}else {
						//creamos una variable que tiene el nombre del key que sea igual al value 
						//Viene en la vista como ("index","usus",$usuarios)
						//Crea una variable con el nombre con el que pasamos como parametro y el valor sea el mismo de value
						//Se creara una variable usus y con el valor respectivo 
						//("index","usuarios",$usuarios)
						//creando al final $usus = $usuarios;
						//
						${$key} = $value;
					}//if is_array
				}

				//Si existe la vista incluimos el archivo de la ruta
				include VISTA_RUTA.$ruta;
			}else {
				die("No existe la Vista");
			}//if
		} //if path != "" 
	} //function crear
	//para no generar error en el controlador de usuarios en la vista::crear por que es vacio y no retorna nada
	// return null;

} //Class vista
