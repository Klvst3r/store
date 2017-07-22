<?php

use \vista\Vista;

class WelcomeController {
	//Crear una funcion que va a rutear el index de nuestra pagina, nos retornara el index de nuestra pagina.
	public function index(){
		//recuperamos el index de /view/index.php
		return Vista::crear("index");
		
	}

	
}
