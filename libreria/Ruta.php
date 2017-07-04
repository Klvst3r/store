<?php

/*** Klvst3r **/
/**
 * Archivo para la ayuda a la lectura de las rutas
 */

class Ruta {
	/**
	 * Metodo que permite ingresar controladores con sus respectivas rutas
	 * Enviara los controladores a la propiedad privada que indiquemos
	 */
	//Propiedad basica en un arreglo
	private $_controladores = array();
	public function controladores($controlador){
		$this->_controladores = $controlador;
		//Este archivo Siempre se estara llamando. al recargarsse la pagina
		//llamada al metodo que hace el rpoceso de rutas
		/**
		 * La clase (Ruta) se llama cada vez que se recarga o abra una página en la aplicación
		 *  self hace referencia a esta clase dinamica, que se enviara en cada recarga o enter a la URL
		 */
		self::submit();
	}

	public function submit(){
		//echo "Hola Submit";
		// Procesamos la URL que ejecutara sobre la dirección superior
		/**
		 * Lo que indiquemos en la barra da direcciones seria el nombre del controlador y lo que sigue sera el metodo
		 * Son las peticiones GET["uri"] hecha sobre nuestra aplicacion
		 * Expresión para hacer condicionales de manera más rapida
		 * La condición ? proceso si se cumple: proceso si no se cumple
		 */
		// Metodo que se ejecuta cada vez que se envia la petición en la url
		$uri = isset($_GET["uri"])?$_GET["uri"]:"/"; //recupera la url del proyecto
		//echo $uri;
		//Dividir en un array de paths
		$paths = explode("/",$uri);
		//print_r($paths);
		//Identificar con una condicional para divir la url en partes y forma un array, 
		//para saber si esta en un controlador o en ruta principal
		if($uri == "/"){
			//Principal
			//echo "Principal";
		    /**
		     * Guardamos la respuesta que nos da si el array key existe,
		     * Buscamos "/" en los keys o claves en la propiedad privada  $_controladores
		     * ejemplo: array("key":"valor")
		     */
		    $res = array_key_exists("/",$this->_controladores);//Buscando si existe la ruta (/) en el array de controladores
		    if($res != "" && $res == 1){ //comprobando
		    	//echo "Correcto";
		    	//Buscamos dentro de las rutas el controlador recorriendo el array de controladores
		    	foreach($this->_controladores as $ruta=>$controller){ //recorriendo los controladores como key=>value
		    		//$ruta=>$controller o tambiern $key=>value del array si es igual a / lo recuperas y almacenas en una variable
		    		if($ruta == "/"){ //Comprobamos si las rutas son iguales
		    			$controlador = $controller; // Asignamos a una variable la ruta en este caso el controlador que existe y se ha recuperado
		    		}//if
		    	}//foreach
		    	//echo $controlador;
		    	// De esta clase llamamos a la funcion getController que traera el controlador
		    	$this->getController();
		    }
		}else{
			//Controladores y metodos
			//echo "Controlador";
		}//if
		
	}

}