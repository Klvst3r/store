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
		$this->_controladores[] = $controlador;
		//Este archivo Siempre se estara llamando. al recargarsse la pagina
		//llamada al metodo que hace el rpoceso de rutas
		/**
		 * La clase (Ruta) se llama cada vez que se recarga o abra una página en la aplicación
		 *  self hace referencia a esta clase dinamica, que se enviara en cada recarga o enter a la URL
		 */
		self::submit();
	}

	public function submit(){
		echo "Hola Submit";
	}

}