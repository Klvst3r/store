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
		//Ejemplo con un array, posteriormente sera recuperado con MySQL
		$usuarios = array(
			1=>array(
				"nombre"=>"Klvst3r",
				"Apellido"=>"Kozlov"
				),
			1=>array(
				"nombre"=>"Klvst3r",
				"Apellido"=>"Kozlov"
				),
			1=>array(
				"nombre"=>"Klvst3r",
				"Apellido"=>"Kozlov"
				),
			1=>array(
				"nombre"=>"Klvst3r",
				"Apellido"=>"Kozlov"
				),
			);
		//No tenemos proceso como variable en el parametro se realiza este proceso, 
		//podemos enviarle un dato o una lista de datos de empresas o categorias puede ser en formato array
		
		//Retornamos la vista de usuarios
		return Vista::crear("usuarios.lista");
	}

	public function insertar(){
		echo "Insertado Correctamente";
	}
}