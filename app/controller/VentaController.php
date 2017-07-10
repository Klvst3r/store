<?php
//Controlador de Ventas
//Para importar la clase de Ventas del modelo de la Aplicación
use App\model\Venta;

class VentaController {
    //Usamos La Vista
	public function index(){
		//echo "Estamos en el index de ventas";
		//Instancia de Venta, para hacer una inserción de venta
		$venta = new Venta();
		//Se debe coincidir la estructura de la tabla, el id no se envia
		$venta->cliente = "Klvst3r";
		$venta->fecha = date("Y-m-d");


		//Funcion del ORM para insertar los datos directamente
		$venta->guardar();
		//recuperamos el ultimo id que se inserto
		//echo $venta->id;
	}

}