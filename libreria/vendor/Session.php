<?php

/**
 * Clase que debe estar en el core del rpoyecto para fucnionar
 */
class Session {
	//Permite validar si existe una session, has (tiene). Al llamarse a la funcion, 
	//Paramatreos $varable_session - Nombre de la variable de sesion
	/**
	 * Es un afuncion que valida que hace en forma de boolean retornando true o false si existe la variable de sesion
	 * Funcion que valida si existe o no la variable de sesion y devuelve verdadero o falso
	 */
	
	public static function has($variable_session){
		//Validar Si existe la session en la psoicion variable_session
		if(isset($_SESSION[$variable_session])){
			return true;
		}else{
			return false;
		}
	}

	//Obtiene una variable de session y hace el borrado de memoria 
	public static function get($variable_session){
		//En caso de que suceda un error pueda retornar ese error, con el mensaje = a la sesion de la variable de sesion
		//En la posicion variable de sesion y al final unset de esa variable, se vacie o se elimine y se limpie, quedando libre 
		//nuevamente la variable de sesion y al final retornamos el mensaje para retornar.
		try{
			$mensaje = $_SESSION[$variable_session];
			//vacie o se elimine de la memoria y la variable
			//Solucion al problema de validación CRSF en el login con la variable de sesión
			//session_unset($_SESSION[$variable_session]);
			unset($_SESSION[$variable_session]);
			//retorna el mensaje"
			return $mensaje;
		}catch(Exception $ex){}
	}

}