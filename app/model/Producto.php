<?php  

/**
 * Modelo de la tabla Productos
 */

class Producto {
	private $id;
	private $nombre;
	private $precio;

	function __construct($nombre, $precio){
		$this->nombre = $nombre;
		$this->precio = $precio;
	} //function __construct

	public function getPrecio(){
		return $this->precio;
	}//function getPrecio
} //Class