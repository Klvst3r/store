<?php

use \vista\Vista;

// Dentro de controladores de incluyen los modelos, esta referenciado la clase User
use App\model\User;
//Modelo Privilegio
use App\model\Privilegio;

class PrivController {
	
	public function index(){

		$privilegios = Privilegio::all();
            
        //regresamos la vista de listado de usuarios para verificar privilegios 
        return Vista::crear("admin.privilegio.index", array(
                "privilegios"=>$privilegios,
            ));
		
		
		
	}

	   public function edpriv($id)
    {
        //echo $id;
        //Realizamos un listado de valores de acuerdo al identificador del parametro de la fncion editar    
        $privilegio = Privilegio::find($id);
        //Volcamos los datos a pantalla
        //var_dump($usuario);
        //Retornamos el usuario
        if (count($privilegio)) {
            return Vista::crear('admin.privilegio.edpriv', array("privilegio" => $privilegio));
        }
        return redirecciona()->to('privilegio');
    }

     //Agregar o Modificar
     public function agregar(){

        try {

            $privilegio = new Privilegio();
            if (input('privilegio_id')) {
                $privilegio = Privilegio::find(input('privilegio_id'));
            }

            $privilegio->descripcion = input("privilegio");
            $privilegio->guardar();

            redirecciona()->to("privilegio");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } //Metodo Agregar Privilegio

    public function nuevo(){
        return Vista::crear("admin.privilegio.nuevo");
    }



    public function add(){

        try {

            $priv = new Privilegio();

            $priv->descripcion = input("privilegio");

            $priv->guardar();

            redirecciona()->to("privilegio");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } //Metodo Agregar Privilegio

    public function editar($id)
    {
        echo $id;
        //Realizamos un listado de valores de acuerdo al identificador del parametro de la fncion editar    
        //$privilegio = Privilegio::find($id);
        //Volcamos los datos a pantalla
        //var_dump($privilegio);
        //Retornamos el usuario
        
        /*if (count($privilegio)) {
            return Vista::crear('admin.privilegio.edpriv', array("privilegio" => $privilegio));
        }
        return redirecciona()->to('privilegio');*/
    }
	

	/**
	 * Eliminar Privilegio de la BD
	 */

}