
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
}