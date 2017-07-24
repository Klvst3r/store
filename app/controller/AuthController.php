<?php

//Para no estar repitiendo cada llamada a las vistas 
use \vista\Vista;
use App\model\User;
use libreria\ORM\EtORM;

class AuthController {
	public function index(){
		return Vista::crear("auth.login");
	}

	public function ingresar(){
		//validar el csfr token. Es algo que nos permite validar la peticiones que se hacen a nuestros diferentes tipod php 
		//diferentes codigo de servidor, los csfr son un tipo de ataque que se hacen sobre las paginas que se ejecutan sobre 
		//servidor sobre un formulario, pueden hacer envio de sesiones, cambiar las sesiones. con tl protocolo http, se intenta un medio
		//de comuniacion entre el formualrio y la pagina que procesa los valores del formulario
		if(val_csrf()){
			//echo "Todo Bien";
			/**
			 * Al recibir los valores del form aca se procesaran los valores,
			 * Se usa una libreria para recibir los valores de varias maneras de validación posibles
			 */
			//echo input("email");
			//Se devuelve tambien el pass
			//echo "<br/>";
			//echo input("password");	

			/**
			 * Por medio del modelo haremos la ejecución de procedmiento de login
			 * Se hace uso del ORM 
			 * para el testeo del login urL: http://localhost/dev/store/login/ingresar
			 */
			$objOrm = new EtORM();

			//Ejecutamos el procedimiento dandole una variable
			//Devolvemos todo lo que retorne la ejecución a un array $data.
			//$data = $objOrm->Ejecutar("login",array("test@gmail.com",password_hash("1234",PASSWORD_DEFAULT)));
			$password = crypt("1234",'$2a$07$usesomesillystringforsalt$');
			$data = $objOrm->Ejecutar("login",array("test@gmail.com", $password));

			

			//var_dump($data);
			//Devolvemos el resultado en formato json
			echo json_encode($data);
			/**
			 * Si tenemos la salida: array(0) { } No esta ingresando, que el password enviado no puede ser igual 
			 * al interno de la bd, por que esta encriptado y debe encriptarse antes
			 */

		}else{
			echo "Esta mal";
		}
		
	}

}
