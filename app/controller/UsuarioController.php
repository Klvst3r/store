<?php

/**
 *  Klvst3r
 *  Ruteo de controladores y metodos index e insertar
 */

use vista\Vista;

//Dentro del controlador hacemos un use de App\model\User del cual nos basariamos para hacer en el controlador cualquier tipo de cosas
// Dentro de controladores de incluyen los modelos, esta referenciado la clase User
use App\model\User;


class UsuarioController {
	public function index(){ 
        //Con esto ya no hacemos un set y get por que ya tenemos los etodos dinamicos implementados dentro de model del archivo Modelo.php
        
        $user = new User();
        //Automaticamente hacemos un set()
        $user->nombre = "Klvst3r";
        $user->apellido = "Kozlov";

        //Automaticamente hacemos un get, para imprimir el nombre en pantalla con los metodos dinamicos que se han implementado
        echo $user->nombre;
        
        //Se envia el nombre de la tabla en el controlador
        //$user->getTable();
        
        //Ejemplo de columnas
        


        //El archivo index se crea en el momento en que rutas ya que tenemos ruteado usuarios
        //Podemos rutearlo cuando tengamos usu
        //Dentro de los controladores se usa las vistas y los modelos
        //echo "Estamos en index de usuario";

		//echo "Raiz del proyecto";
		//En lugar de visualizar mensaje, crearemos la vista 
		//Ejemplo con un array, posteriormente sera recuperado con MySQL
        /*$us = array(
            1=>array(
                "nombre"=>"Klvst3r",
                "apellido"=>"Kozlov",
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
        );*/
		//No tenemos proceso como variable en el parametro se realiza este proceso, 
		//podemos enviarle un dato o una lista de datos de empresas o categorias puede ser en formato array
		
		//Retornamos la vista de usuarios
		/*return Vista::crear("usuarios.lista",array(
			//como lo recupero en pantalla es como se llamara la variable
            "usuar"=>$us,
        ));*/

        
	}

	public function insertar(){
		/*echo "Insertado Correctamente";*/
	}
}