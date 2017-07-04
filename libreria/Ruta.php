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
		    	$this->getController("index", $controlador); //Llamamos al metodo que nos recupera el controlador
		    }
		}else{
			//Controladores y metodos
			//echo "Controlador";
		}//if
		
	} //function submit

	/**
	 * Funcion o metodo que nos sirve para invocar al controlador con el metodo que debe de ejecutar
	 * @param  type: metodo      
	 * @param  $metodo, y $controlador
	 * @return [type]              [description]
	 */
	public function getController($metodo, $controlador ){
		$metodoController = "";
		//Condicional
		if($metodo == "index" || $metodo == ""){
			$metodoController = "index";
		}else{
			$metodoController == $metodo;
		}
		//Incluye el c0ntrolador
		$this->incluirControlador($controlador);
		//Si es llamable el controlador como clase del controlador de nombre de clase
		// Se debe llamar tal cual se llame en el archivo interno de rutas
		// Si existe la clase WelcomeController, class_exist - Verifica si la clase ha sido definida
		if(class_exists($controlador)){
			echo "La clase WelcomeController si existe";
		}else {
			die("No existe la clase WelcomeController");
		}
	
	} //function getController


	public function incluirControlador($controlador){
		//comprobamos si existe el archivo
		//Recuperar la app a traves de la ruta
		
		if(file_exists(APP_RUTA."controller/".$controlador.".php")){
			include APP_RUTA."controller/".$controlador.".php";
		}else{
			die("Error al encontrar el archivo de controlador");
		}
	}

} //Class