<?php
//Controlador de Ventas

use App\model\Venta;

class VentaController {
    //Usamos La Vista
	public function index(){
		echo "Estamos en el index de ventas";
		//Instancia de Venta
		/*$venta = new Venta();

		$venta->cliente = "Klvst3r";
		$venta->fecha = date("Y-m-d");*/
		//Funcion del ORM 
		//$venta->guardar();
	}

}