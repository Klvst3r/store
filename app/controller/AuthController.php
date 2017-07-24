<?php

//Para no estar repitiendo cada llamada a las vistas 
use \vista\Vista;

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
			echo input("email");
		}else{
			echo "Esta mal";
		}
		
	}

}
