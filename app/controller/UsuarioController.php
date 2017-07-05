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
        $us = array(
            1=>array(
                "nombre"=>"Klvst3r",
                "apellido"=>"Costal",
            ),
            2=>array(
                "nombre"=>"Stark",
                "apellido"=>"Lab",
            ),
            3=>array(
                "nombre"=>"Nimzay",
                "apellido"=>"Degu",
            ),
            4=>array(
                "nombre"=>"Sophie",
                "apellido"=>"Snow",
            ),
        );
		//No tenemos proceso como variable en el parametro se realiza este proceso, 
		//podemos enviarle un dato o una lista de datos de empresas o categorias puede ser en formato array
		
		//Retornamos la vista de usuarios
		return Vista::crear("usuarios.lista",array(
			//como lo recupero en pantalla es como se llamara la variable
            "usuar"=>$us,
        ));
	}

	public function insertar(){
		echo "Insertado Correctamente";
	}
}