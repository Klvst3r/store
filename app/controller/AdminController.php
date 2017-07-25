<?php

// Para poder tener una vista
use vista\Vista;


class AdminController {

	//Retorna la vista del index de Admin
	public function index(){
		//Crea la vista del index de admin, se llama al archivo index
		return vista::crear("admin.index");
	}
}