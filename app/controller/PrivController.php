<?php

use \vista\Vista;

// Dentro de controladores de incluyen los modelos, esta referenciado la clase User
use App\model\User;
//Modelo Privilegio
use App\model\Privilegio;

class PrivController {
	
	public function index(){

		$usuarios = User::all();
            
        //regresamos la vista de listado de usuarios para verificar privilegios 
        return Vista::crear("admin.privilegio.index", array(
                "usuarios"=>$usuarios,
            ));
		
		
		
	}

	   public function edpriv($id)
    {
        //echo $id;
        //Realizamos un listado de valores de acuerdo al identificador del parametro de la fncion editar    
        $usuario = User::find($id);
        //Volcamos los datos a pantalla
        //var_dump($usuario);
        //Retornamos el usuario
        if (count($usuario)) {
            return Vista::crear('admin.privilegio.edpriv', array("usuario" => $usuario));
        }
        return redirecciona()->to('privilegio');
    }

     //Agregar o Modificar
     public function agregar(){

        try {

            $user = new User();
            if (input('usuario_id')) {
                $user = User::find(input('usuario_id'));
            }

            $user->privilegio = input("privilegio");
            $user->guardar();

            redirecciona()->to("privilegio");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } //Metodo Agregar

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
	


}