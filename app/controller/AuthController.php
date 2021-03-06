<?php

//Para no estar repitiendo cada llamada a las vistas 
use \vista\Vista;
use App\model\User;
use libreria\ORM\EtORM;

class AuthController {


	public function index(){
		//return Vista::crear("auth.login");
		//Podriamos hacer uso del metodo directamente que se ha creado en helps.
		//Prueba de envio de un mensaje de error
		//return redirecciona()->to("/login/error")->withMessage("mensaje","Hola mundo");
		//Mensaje con un arreglo de mensajes, y va creando una sesion que pasa oir ahi
		//Demo de error junto con la funcion demo error() de la parte de abajo
		/*return redirecciona()->to("/login/error")->withMessage(array(
				"estado"=>"true",
				"mensaje"=>"Ok Ingresaste"
			));*/
	/**
	 * Hacemos uso de la funcion Redireccionar
	 */
	return Vista::crear("auth.login");
	
	}

	//Funcion de error demo
	//public function error(){
		//Si tenemos un arreglo de mensajes de error
		//echo $_SESSION["estado"]."<br/>";
		//echo "ok";
		//echo $_SESSION["mensaje"];
		/**
		 * Ya con Session en el core utilizamos simplemente las funciones
		 */
		//Si ponemos :: encontremos sus metodos estaticos o funciones estaticos para hacer el llamado directamente 
		//Pide la varieble de sesion, si la sesion tiene un estado 
		//Se hace una recuperación y eliminación de esa variable de session
	//	if(Session::has("mensaje")){
			//AL recargar el error se elimina y ya no entra a la condicional
	//		echo Session::get("mensaje"); //Es lo mismo que $_SESSION["estado"];
	//	}
	//}

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
			

			//Agregamos una variable para el input
			$email = input("email");
			//Invocamos a la funcion de hasheo
			$password = encriptar(input("password"));
			
			

			//$data = $objOrm->Ejecutar("login",array("test@gmail.com",password_hash("1234",PASSWORD_DEFAULT)));
			//$password = crypt(,'$2a$07$usesomesillystringforsalt$');

			/**
			 * Por medio del modelo haremos la ejecución de procedmiento de login
			 * Se hace uso del ORM 
			 * para el testeo del login urL: http://localhost/dev/store/login/ingresar
			 */
			$objOrm = new EtORM();
 
			
			//Ejecutamos el procedimiento dandole una variable
			//Devolvemos todo lo que retorne la ejecución a un array $data.
			
			$data = $objOrm->Ejecutar("login",array($email, $password));

			

			//var_dump($data);
			//Devolvemos el resultado en formato json
			/**
			 * Si tenemos la salida: array(0) { } No esta ingresando, que el password enviado no puede ser igual 
			 * al interno de la bd, por que esta encriptado y debe encriptarse antes
			 */
			// Se imprime salida del array
			//echo json_encode($data);
			//Condicional para el count del data
			if(count($data) > 0){
				//echo "Ingresaste";
				
				//Sacamos el nombe de usuarios, email y privilegio
				//echo json_encode($data);
				//echo $data[0]["email"];
				//Version 1 de sesiones en el sistema
				$_SESSION["id"] = $data[0]["id"];
				$_SESSION["usuario"] = $data[0]["usuario"];
				$_SESSION["email"] = $data[0]["email"];
				$_SESSION["privilegio"] = $data[0]["privilegio"];


				// Si ingreso se hara por AJAX
				// Se crean variables de sesion para almacenar todo lo que el usuario, y el username a utilizar posteriormente
				// Por medio de la sesion se validan las siguientes pagonas, en caso contrario se botaran.
				//redireccionar("/admin");
				
				/**
				 * Codigo con instancias hacia usuario version 2 como objetos
				 */
				/*$usuario = new User();
				$usuario->id = $data[0]["id"];
				$usuario->usuario = $data[0]["usuario"];
				$usuario->email = $data[0]["email"];
				$usuario->privilegio = $data[0]["privilegio"];

				$_SESSION["usuario"] = $usuario;*/

				redirecciona()->to("/admin");
				
			}else{
				//echo "No puede ingresar al sistema";
				//Redirigimos hacia atra
				//header("location: login");
				//redireccionar("/login");
				//Redirecciona al acceso al dashboard
				//Cuando redireccione al login, en el login crea en index la vista en:
				//view/auth/login.php
				redirecciona()->to("/login")->withMessage(array(
					"estado"=>"false",
					"mensaje"=>"Usuario/Password incorrectos"
				));
			}

		}else{
			echo "Esta mal";
		}
		
	}

}
