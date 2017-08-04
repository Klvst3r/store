
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

	//Metodo para nuevo producto
	public function nuevo(){
		return Vista::crear('admin.producto.nuevo');
	}

	//Guardar producto - Agregar
	 public function agregar(){
        try {

            $producto = new Producto();

            if (input('producto_id')) {
                $producto = Producto::find(input('producto_id'));
            }

            $producto->nombre   = input("nombre");
            $producto->precio = input("precio");

            $producto->guardar();

            redirecciona()->to("producto");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } //Metodo Agregar

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