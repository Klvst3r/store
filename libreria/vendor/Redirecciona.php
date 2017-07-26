<?php

/**
 * Para funcionar esta clase debe incluirse en el core del proyecto
 */

class Redirecciona {
	//Funcion que redireciona hacia algun lugar
	//Parametro: $url - especifica la url a donde se ira ('/hola/nuevo')
	//
	public static function to($url){
		//Invoca a la funcion de la misma clase pero que se llama en este caso redirect pasandole la misma url
		self::redirect($url);
		//Retornamos una nueva instalacia de la nueva clase para hacer uso de los metodos de manera escatli
		return new Redirecciona();
	}

	/*Ejemplo de funcionamiento, para hacer y para hacer este tipo de llamado de mestos necesitamos el llamado de 
	la instanacia d ela misma clase, por que la misma instancia de la clase trae la instancia de manera escalonada o 
	sonsecuente, necesitamos la misma instancia de la clase, para llamar a su mismo metodo*/
	//redirect()->to-> 

	/**
	 *  Funcion que redirecciona a algun lugar llevando datos en la variable de sesion
	 *  @parametro: $var - Nombre de la variable de sesion a crear ó Array de variables de sesion con valores.
	 *  @parametrp: $value - Si el parametro var no es un array, este seria el valor, ejemplo: withMessage("mensaje","hola")
	 *  El segundo paramatero es nulo para que llegue vacio
	 */
	public static function withMessage($var, $value = null){
		if(is_null($value)){
			//Va creando una sesion por cada clave y lo va a igual y lo va a igualando a su valor
			
			foreach ($var as $clave => $valor) {
				$_SESSION[$clave] = $valor;
			}
		}else{
			$_SESSION[$var] = $value;
		}//if
		return new Redirecciona();
	}//withMessage
	

	private function redirect($rute){
		$urlprin = str_replace("index.php","",$_SERVER["PHP_SELF"]);
		header("location:/".trim($urlprin,"/")."/".trim($rute,"/"));
	}

}//Class