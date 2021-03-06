
<?php

// Para poder tener una vista
use vista\Vista;

use App\model\Producto;


class ProductoController {

	//Retorna la vista del index de Admin
	public function index(){
		//Crear un listado de productos
		$productos =  Producto::all();

		//Para asegurar que existen datos se activa y se deshabilita la siguiente linea de codio 
		//var_dump($productos);
		//Crea la vista del index de admin, se llama al archiv o index
		//return vista::crear("admin.producto.index");
		
		//Retornamos la vista, mediante un array asociativo para identificar en la pantalla
		return Vista::crear("admin.producto.index", array(
				"productos"=>$productos,
			));
	}

    public function todos(){
        //Obtenemos todos los productos
        $productos =  Producto::all();

        //Por medio de JSON, retornamos los productos 
        echo json_response($productos);
    }

	//Metodo para nuevo producto
	public function nuevo(){
		return Vista::crear('admin.producto.nuevo');
	}

	//Guardar producto - Agregar
	 public function agregar(){
        try {
            if(!empty($_POST)){
               $producto = new Producto();

                if (input('producto_id')) {
                    $producto = Producto::find(input('producto_id'));
                }

                $producto->nombre   = input("nombre");
                $producto->precio = input("precio");

                $producto->guardar();

                redirecciona()->to("producto"); 
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //Si no sucede nada con el metodo POST
        redirecciona()->to("producto"); 

    } //Metodo Agregar

    //Editar Producto
    public function editar($id)
    {
        //echo $id;
        //Realizamos un listado de valores de acuerdo al identificador del parametro de la fncion editar    
        $producto = Producto::find($id);
        //Volcamos los datos a pantalla
        //var_dump($producto);
        //Retornamos el producto
        if (count($producto)) {
            return Vista::crear('admin.producto.nuevo', array("producto" => $producto));
        }
        return redirecciona()->to('producto');
    }

    //Metodo para eliminar Producto
    public function eliminar($id){
        $producto = Producto::find($id);
        if (count($producto)) {
            $producto->eliminar();
            return redirecciona()->to('producto');
        }
        return redirecciona()->to('producto');

    }

	

}