<?php

namespace libreria\ORM;
class EtORM extends \Conexion{
	//Se extienda de la clase conexion importada en el core por encima de esta libreria
	//Se tienen dos porpiedades protegidas que recuepra
	protected static $cnx;
    protected static $table;

	//Funcion para imprimir la obtencion del nombre de la tabla del ORM
	/*public static function getTable(){
		echo static::$table;
	}*/

	//Se genera un constructor
	function __construct(){
		//Conectamos con la funcion definida en la parte inferior cada vez que se construye el modelo
		//Se ejecuta cada vez que se invoca a la clase por medio de un objeto
		self::getConexion(); 
	} //constructor

	//Recuperamos la conexion
	public static function getConexion(){
		//La \ es por que esta con otro nombre de espacio namespace
		// La funcion que nos conecta la Igualamos a nuestra variable de conexion
		self::$cnx = \Conexion::conectar();
	} //getConexion
	/**
	 * Guarda todo lo que tenga que ver guardado y actualización de datos por medio SQL a nuestra BD y por medio de nuestro modelo "user"
	 * Codigo extremo para Guardar (Actualizar o insertar valores a la tabla)
	 */
	public function guardar(){
        $values = $this->getColumnas();

		$filtered = null; //variable que almacenara las columnas
		//Recorre los nombres de los compos los key del array data que se ha enviado por getColumnas()
		//Funcion que recupera toda la data las propiedades asignadas manualmente
		foreach ($values as $key => $value) {
			//Mientras que haya un id no lo lance al array y si lo hay que lo concatena al array
			if ($value !== null && !is_integer($key) && $value !== '' && strpos($key, 'obj_') === false && $key !== 'id') {
				if ($value === false) {
					$value = 0;
				}
				$filtered[$key] = $value;
				//decho $key." - ".$value;
			}
			//decho "<br/>";
			//echo $key."<br>";
		} //foreach $values
		//Extraemtodo ese filtered en columnas y almacenarlas en un arreglo
		$columns = array_keys($filtered); //obteniendo columnas
		//visualizamos las columnas recuperadas
		 //echo json_encode($columns);
		 //echo "<br/>";
		
		/**
		 *  Si este modelo tiene id la posicion de la tabla desde el controlador
		 *  Ej. en Venta Controller
		 *  	$venta = new Venta();
		 *  	$venta->id = 2;
		 *  	$venta->cliente = "Klvster";
		 *  	$venta->fecha = date("Y-m-d");
		 *  	$venta->guardar();
		 *  Con esto se actualizara con un id, y no se guardara sino se actualizara por que ya existe el id en el objeto venta
		 */
		//Si este modelo que viene siendo venta, crea una variable
		if ($this->id) {
			$params = "";
            foreach($columns as $columna){ //recorre columna por columna concatenando para construir la sentencia SQL.
                $params .= $columna." = :".$columna.",";
            }//foreach
			$params =  trim($params,",");
            $query = "UPDATE " . static ::$table . " SET $params WHERE id =" . $this->id;
			//echo $query;

		} else {
			//Como no se pasa en los parametros un id, se inserta lo que se recupera de la variable table dentro del modelo 
			//el nombre de la tabla
            $params = join(", :", $columns); //Le pasamos las columnas
            $params = ":".$params; //le aregamos el arreglo de las columnas
			/*echo "<br/>";
			echo $params;
			echo "<br/>";*/
			$columns = join(", ", $columns);
			/**
			 * Inserta en las columnas los parametros de la selección de manera dinamica de acuerdo a los elementos
			 * considerados por el controlador en el controlador VentaController.php
			 * 	$venta->cliente = "Klvst3r";
			 *  $venta->fecha = date("Y-m-d");
			 */
            $query = "INSERT INTO " . static ::$table . " ($columns) VALUES ($params)";
			//echo $query;

		} //if $this->id

		//Preparando la consulta
		// Hacemos un getConexion() para que se conecte de nuevo
		self::getConexion();
		//En la variable $res peraprara la conexión con lo que se recupero de $cnx 
		//como en la parte superior en:
		//	self::$cnx = \Conexion::conectar();
		//	Reafirmamos que el cnx se llene con la conexion PDO y luego preparamos enviando como parametro un query
		/**
		 * PDO::prepare - Prepara una sentencia para su ejecución y devuelve un objeto sentencia
		 * 
		 */
		$res = self::$cnx->prepare($query);
		//La variable filter que habia llenado los arrays cargado de las columnas y las recorremos con nombre, vloar
		foreach ($filtered as $key => &$val) { //Cargamos todos los valores de
			//Cada vez que encuentra un val del array de columnas:
			//ej:
			//	:cliente = Klvst3r
			//	El key que encuentre lo llenara con el valor del filtered, Klvst3r lo esta enviando como parametro de value
			$res->bindParam(":".$key, $val);
		}//foreach
		//Realizamos una respuesta
		if($res->execute()){
				//Al realizar la ejecución recuperamos el ultimo id insertado que es el id actual de la venta
                $this->id = self::$cnx->lastInsertId();
			self::$cnx = null;
			return true;
		}else{
			return false;
		}  //if $res


	} //metodo guardar


} //Class