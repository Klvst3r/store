<?php

/**
 * Clase que debe estar en el core del rpoyecto para fucnionar
 */
class Session {
	//Permite validar si existe una session
	public static function has($variable_session){
		if(isset($_SESSION[$variable_session])){
			return true;
		}else{
			return false;
		}
	}

	//Obtiene una variable de session
	public static function get($variable_session){
		try{
			$mensaje = $_SESSION[$variable_session];
			session_unset($_SESSION[$variable_session]);
			return $mensaje;
		}catch(Exception $ex){}
	}

}