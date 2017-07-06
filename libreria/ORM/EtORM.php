<?php

namespace libreria\ORM;

class EtORM extends \Conexion {
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
			//Mientras que haya un id no lo lance al array y si lo hay que lo concatene
			if($value !== null && !is_integer($key) && $value !== '' && strpos($key,'obj_') === false && $key !== 'id'){
				if($value === false){
					$value = 0;
				}
				$filtered[$key] = $value;
				//echo $key." - ".$value;
			}
			//echo $key."<br>";
		} //foreach $values
		$columns = array_keys($filtered);
		// echo json_encode($columns);
		
		if($this->id){
			$params = "";
			foreach ($columns as $columna) {
				$params.= $columna." = : ".$columna.",";
			}//foreach
			$params = trim($params,",");
			$query = "UPDATE " . static :: $table . " SET $params WHERE id =" . $this->id;
			//echo $query;

		}else {
			$params = join(", :",$columns);
			$params = ":".$params;
			$columns = join(", ", $columns);
			$query = "INSERT INTO " . static::$table . " ($columns) VALUE ($params)";
		} //if $this->id

		//Preparando la consulta
		self::getConexion();
		$res = self::$cnx->prepare($query);
		foreach ($filtered as $key => $val) { //Cargamos todos los valores de
			$res->bindParam(":".$key, $val);
		}//foreach
		//Realizamos una respuesta
		if($res->execute()){
			$this->id = self::$cnx->lastInsertId();
			self::$cnx = null;
			return true;
		}else{
			return false;
		}  //if $res


	} //metodo guardar


} //Class