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
	} //Funcion Index

	public function buscar(){
		//Buscar una venta por cliente que es la columna con el valor Klvstr y lo alamacenamos en una variable
		//Donde se alamacenaran todas las ventas de ese cliente
		$ventasdeklvst3r = Venta::where("cliente","Klvst3r");

		print_r($ventasdeklvst3r);
		//Para visualizar ur: localhost/dev/store/ventas/buscar
	}

}