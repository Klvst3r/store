<?php

/*** Klvst3r **/
/**
 * Archivo para la ayuda a la lectura de las rutas
 */

class Ruta{
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
		//Lamada al metodo que hace el proceso de rutas
		self::submit();
	}

	//función o método que se ejecuta cada vez que se envia la petición en la url
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
		$paths = explode("/",$uri);//divide la url en partes y forma un array
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
		    	 $this->getController("index",$controlador); //Llamamos al metodo que nos recupera el controlador
		    }
		}else{

			/*--------------------------------------- Else Anterior --------------------------------------*/
			//Controladores y metodos
			//echo "Controlador";
			//Comprobar el estado de ruta iniciando en falso
			//El estado de ruta nos servira para validar si la ruta del controlador y metodo es correcto
			/**
			 * Realizamos un trim a la ruta para limpiar el "/" de decir:
			 * "/usuarios"=>"UsuarioController"
			 *     $ruta            $count 
			 */
			/*$estado= false;
			foreach($this->_controladores as $ruta => $cont){
				# ($paths) el array de rutas que ponemos en el explorador
				# estudiantes/asdasd
				#    0           1
				#    Siempre recupera el primero
				if(trim($ruta,"/") == $paths[0]){
					//Si existe cambiamos de estado
					$estado = true;
					//El controlador sera igual al count de la parte superior
					$controlador = $cont;
					//Metodo vacio entonces es index automaticamente
					$metodo = "";
					//Si paths es mayor que 1, que es el count de la ruta de un explode
					if(count($paths) > 1){
                        $metodo = $paths[1];
                    } //if count
					//PAsamos metodo y controlador
					$this->getController($metodo,$controlador);
				}
			}
			//Fuera del foreach corobamos estado 
			if($estado == false){
                die("error en la ruta");
            }
			*/
			/*--------------------------------------- Else Anterior --------------------------------------*/
			/*---------------------------------------- Else Proyecto -------------------------------------*/
			//controladores y metodos
            //echo "<b>Url:</b> ".$uri."<br><hr>";
            $estado= false;
            foreach($this->_controladores as $ruta => $cont){
                //echo "<br><b>Ruta:</b> ".$ruta."<br>";

                if(trim($ruta,"/") != ""){
                    $pos = strpos($uri, trim($ruta,"/"));

                    if($pos === false){
                        //echo "<small style='color:red;'>no se encontro</small><br>";
                    }else{
                        //echo "<small style='color:green;'>se econtro </small><br>";
                        $arrayParams = array(); //array donde se guardaran los parametros de la web
                        $estado = true; // estado de ruta
                        $controlador = $cont;
                        $metodo = "";
                        $cantidadRuta = count(explode("/",trim($ruta,"/")));
                        $cantidad = count($paths);
                        if($cantidad > $cantidadRuta){
                            $metodo = $paths[$cantidadRuta];

                            for ($i=0; $i < count($paths) ; $i++) {
                                if($i > $cantidadRuta){
                                    $arrayParams[] = $paths[$i];
                                }
                            }
                        }
                        //echo "<b>Parametros: </b>".json_encode($arrayParams);
                        //echo "<br><b>cantidad Rutas</b>: ".count(explode("/",trim($ruta,"/")))."<br>";
                        //echo "<br><b>cantidad Uris</b>: ".count($paths)."<br>";
                        /*if(count($paths) > 1){
                            $metodo = $paths[1];
                        }*/
                        $this->getController($metodo,$controlador,$arrayParams);

                    }
                }
                //echo "<hr>";
            }

            if($estado == false){
                die("error en la ruta");
            }
			/*---------------------------------------- Else Proyecto -------------------------------------*/
		}//if
		
	} //function submit

	/**
	 * Funcion o metodo que nos sirve para invocar al controlador con el metodo que debe de ejecutar
	 * @param  type: metodo      
	 * @param  $metodo, y $controlador
	 * @return [type]              [description]
	 */
	public function getController($metodo,$controlador){
		$metodoController = ""; //metodo que se ejecutar inciando vacio
		//Condicional para comprobar si es index o no el metodo del controlador en la ruta
		if($metodo == "index" || $metodo ==""){
			$metodoController = "index";
		}else{
			$metodoController = $metodo;
		}
		//Incluye el c0ntrolador
		$this->incluirControlador($controlador);
		//Si es llamable el controlador como clase del controlador de nombre de clase
		// Se debe llamar tal cual se llame en el archivo interno de rutas
		// Si existe la clase WelcomeController, class_exist - Verifica si la clase ha sido definida
		// Si existe se crea una clase temporal en base a la variable controlador = (WelcomeController)
		// Estamos creando la variable con una nueva instancias
		// $clase = new WelcomeController;
		if(class_exists($controlador)){
			//echo "La clase WelcomeController si existe";
			$ClaseTemp = new $controlador();
			/**
			 * Si se puede llamar dentro de esa clase el metodo Controler que es index, 
			 * Comrpobamos si se puede llamar a la funcion o metodo de esa clase
			 */
			if(is_callable(array($ClaseTemp,$metodoController))){
				//echo "Es llamable";
				//Imprimimos la salida del metodo index()
				//Hacemos una llamada al metodo de esa clase, se llama al index
				//$Clase->index();
				$ClaseTemp->$metodoController();
			}else{
				die("No existe el metodo");
			}
		}else {
			die("No existe la clase WelcomeController"); 
		}
	
	} //function getController


	public function incluirControlador($controlador){
		//comprobamos si existe el archivo
		//Recuperar la app a traves de la ruta
		//Validando si existe el archivo o no
		
		if(file_exists(APP_RUTA."controller/".$controlador.".php")){
			//Si existe lo incluimos
			include APP_RUTA."controller/".$controlador.".php";
		}else{
			die("Error al encontrar el archivo de controlador");
		}
	}

} //Class