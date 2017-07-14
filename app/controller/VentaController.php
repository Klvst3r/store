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
		//ej con url: http://localhost/dev/store/ventas/buscar?cliente=Klvst3r
		$cliente = $_REQUEST["cliente"];

		//Donde se alamacenaran todas las ventas de ese cliente
		//$ventasdeklvst3r = Venta::where("cliente","Klvst3r");
		$ventasdeklvst3r = Venta::where("cliente",$cliente );

		//print_r($ventasdeklvst3r);
		//Para visualizar ur: localhost/dev/store/ventas/buscar

		//Imprime la columna $clinete de cuenatos clinetes llamados "Klvst3r" existan		
		foreach ($ventasdeklvst3r as $venta) {
			//echo $venta->cliente." - ".$venta->fecha."<br/>";
			/**
			 * Ej salida
			 * Klvst3r - 2017-07-06
			 * Klvst3r - 2017-07-13
			 */
			//Con id
			echo $venta->id." - ".$venta->cliente." - ".$venta->fecha."<br/>";
		}
	}

}