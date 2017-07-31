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
        
        /**
         * Para Ejecutar la inserción de un usuario en la tabla usuarios lo hacemos invocando al metodo usuario
         * Para ello la url es simplemente:  http://localhost/dev/store/usuario y en la Bd eliminamos el registro existente
         */
        //Demo 1
        //$user = new User();

        //echo json_encode($user->all());
        //Automaticamente hacemos un set()
        //$user->email = "test@gmail.com";
        //$user->usuario = "test";
        
        //Encriptamos el password y se manda encriptado a la BD
        //$user->pass = password_hash("1234",PASSWORD_DEFAULT);
        //$user->privilegio = "admin";

        //$user->guardar();


        //Automaticamente hacemos un get, para imprimir el nombre en pantalla con los metodos dinamicos que se han implementado
        //echo $user->nombre;
        
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
        
        $usuarios = User::all();
            
        //regresamos la vista de listado de usuarios
        return Vista::crear("admin.usuario.listado", array(
                "usuarios"=>$usuarios,
            ));
        
	}

    public function nuevo(){
        return Vista::crear("admin.usuario.crear");
    }

	public function insertar(){
		/*echo "Insertado Correctamente";*/
	}

    public function agregar(){
        //$user = new User();

        //echo json_encode($user->all());
        //Automaticamente hacemos un set()
        
        //$user->email = "test@gmail.com";
        //$user->usuario = "test";
        
        
        //Encriptamos el password y se manda encriptado a la BD
        //$user->pass = password_hash("1234",PASSWORD_DEFAULT);
        //Recurrimo al metodo de encriptacion siguiente
        //$user->pass=crypt("1234",'$2a$07$usesomesillystringforsalt$');
        
        //$user->privilegio = "admin";
       

        try {
            
            $user = new User();
            $user->email = input("email");
            $user->usuario = input("usuario");
            $user->pass = crypt(input("password"), '$2a$07$usesomesillystringforsalt$');
            $user->privilegio = input("privilegio");
            $user->guardar();

            redirecciona()->to("usuario");

        } catch (Exception $e) {
            //Si no guarda
            echo $e->getMessage();
            
        }

    } //Metodo Agregar


    
    /**
     * Funcion o metodo que sera vinculada a la ruta que se esta enviando "editar" desde el boton editar del listado de usuario
     * con un parametro que es el id, los parametros estaran separados por barras, los parametros se captura en la función
     * Mátodo para editar usuario
     * 
     * @param  int $id id del usuario
     * @return redirect
     */

    public function editar($id)
    {
        //echo $id;
        //Realizamos un listado de valores de acuerdo al identificador del parametro de la fncion editar    
        $usuario = User::find($id);
        //Volcamos los datos a pantalla
        //var_dump($usuario);
        //Retornamos el usuario
        if (count($usuario)) {
            return Vista::crear('admin.usuario.crear', array("usuario" => $usuario));
        }
        return redirecciona()->to('usuario');
    }




}