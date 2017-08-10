<?php

// Para poder tener una vista
use vista\Vista;


class AdminController {

	//Retorna la vista del index de Admin
	public function index(){
		//verifica previamente si existen variables de sesión
		/* Opcional el if, puede estar solo en el menu */
		if(isset($_SESSION["usuario"])){
    	
    	//echo $_SESSION["usuario"];
    	//Crea la vista del index de admin, se llama al archivo index
		return vista::crear("admin.index");
		}else{
		    //echo "No existen variables de sesión";
		    return vista::crear("admin.logout");
		}
		
	}

	public function logout(){
		return vista::crear("admin.logout");
	}
}