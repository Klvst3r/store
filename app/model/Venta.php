<?php namespace APP\model;
/**
 * Implementación del modelo de Venta
 */
//Se agrega lo mismo que users
// se Agrega la libreria Modelo del la libreria ORM
use libreria\ORM\Modelo;

Class Venta extends Modelo{
	//Nombre de la Tabla de Ventas, protegido por el concepto de encapsulamiento
	protected static $table = "ventas";


	//Getters y Setters estaticos de la Clase Venta
	
	/*private $id;
	private $cliente;
	private $fecha;

	function __construct($cliente, $fecha){
		$this->cliente = $cliente;
		$this->fecha = $fecha;
	}

	
	public function getFecha(){
		return $this->fecha;
	}

	
	public function setFecha($fecha){
		$this->fecha = $fecha
	}

	
	public function getCliente(){
		return $this->cliente
	}

	
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	
	public function getId(){
		return $this->id;
	}

	
	public function setId($id){
		$this->id = $id;
	}
	*/

}