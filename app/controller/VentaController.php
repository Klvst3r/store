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
		} //foreach
	} //buscar

	public function busqueda(){
		/**
		 * Ya que en ORM etORM en la funcion guardar es que verifica si tiene el id si lo tienen hace un update en lugar de un insert
		 * desde la url puede hacer: http://localhost/dev/store/ventas/busqueda?id=24 para actualizar el id con valor 24
		 * 
		 */
		$id = $_REQUEST["id"];
		//Se busca una venta de la clase venta
		$venta = Venta::find(24);
		//echo $venta->cliente;
		//Ej de modificación de contenido por identificador con la busqueda
		$venta->cliente="Patron";
		$venta->guardar();
	}//busqueda

	public function listado(){
		//Listado de ventas
		$ventas   = Venta::all();

		//1. Para visualizar ventas url: http://localhost/dev/store/ventas/listado
		////2. Para visualizar ventas id y cliente url: http://localhost/dev/store/ventas/listado

		//Se hace el recorrido de ventas
		foreach($ventas as $venta){
			//Se imprime todos los id de todas las ventas
			//echo $venta->id."<br/>";
			echo $venta->id." - ".$venta->cliente."<br/>";
		}
	}

}