<?php

/**
 *  Klvst3r
 *  Ruteo de controladores y metodos index e insertar
 */

use vista\Vista;


class UsuarioController {
	public function index(){
		//echo "Raiz del proyecto";
		//En lugar de visualizar mensaje, crearemos la vista 
		//Retornamos la vista de usuarios
		return Vista::crear("usuarios.lista");
	}

	public function insertar(){
		echo "Insertado Correctamente";
	}
}