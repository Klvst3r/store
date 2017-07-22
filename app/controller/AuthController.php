<?php

//Para no estar repitiendo cada llamada a las vistas 
use \vista\Vista;

class AuthController {
	public function index(){
		return Vista::crear("auth.login");
	}
}