
<?php

// Para poder tener una vista
use vista\Vista;


class ProductoController {

	//Retorna la vista del index de Admin
	public function index(){
		//Crear un listado de productos
		$producto =  ::all();


		//Crea la vista del index de admin, se llama al archivo index
		return vista::crear("admin.producto.index");
	}
}