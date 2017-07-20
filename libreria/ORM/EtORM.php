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
	 * Desconectar,nos ayuda en nuestra conexion dentro de nuestro ORM. Si tenemos muchas conexiones abiertas al eliminar, buscar, insertar
	 * Se carga y colapsar. Cada que se ejecuta un query debe desconectar
	 */
	public static function getDesconectar(){
		//Desconectamos a la propiedad
		self::$cnx = null; 
	} //getDesconectar


		//Procedimientos almaenados
	/**
	 *  Ejecutar 
	 * @param [type] $procedimiento [nombre del procedimiento]
	 * @param [type] $params        [En formato array]
	 * Puede haber listado de datos que no siempre llevan parametros y por ello el parametro ava como nulo, 
	 * ya que puede haber parametro o no puede haber parametro
	 */ 
	public function Ejecutar($procedimiento,$params=null){
		//Hacemos la llamada al precedimiengto concatenado 
		$query = "call ".$procedimiento;

		//Conecta
		self::getConexion();

		//Sie es diferente de nulo el parametro, si es que existe el parametro
		if(!is_null($params)){
			//se crea una variable que es un cancatendaro de parametros, va ir concatenando el parametro 1, 2, 3, con una coma separada
			$paramsa = "";
			for($i=0;$i < count($params);$i++){
				$paramsa .= ":".$i.",";
			}//for
			//borra las comas iniciales y finales en caso de que existieran, pasando el caracter que voy a eliminar, bortando la coma final
			$paramsa = trim($paramsa,",");
			//concateno los parametros con un cierre de parentesis
			$paramsa .= ")";
			//concatena con el call, le concateno un parentesis inicial y los parametros concatenados con el parentesis final
			//esto siempre que existan parametros
			$query .= "(".$paramsa;
		}else{
			//encaso de no existir parametros es vacio 
			$query .= "()";   
		}
		//echo $query;
		//agregando parametros al query
		////preparamos la conexion con el query
		$res = self::$cnx->prepare($query);
		//Agregamos los parametros, el mismo for de arriba pero al $res o a la conexion lo que estamos haciendo es agregandole un parametro
		
		for($i=0;$i < count($params);$i++){
			//Si es cero con la posicion 1, todo va ligado a la raiz de datos que estamos agregando
			$res->bindParam(":".$i,$params[$i]);
		}
		//si no existe simplemente va vacio y lo ejecuta
		$res->execute();

		//Inicializamos una variable objeto 
		$obj = [];
		//recorre $res as $row, por filas y luego ese fow lo agrega a la raiz
		foreach ($res as $row) {
			$obj[] = $row;
		}
		//reotrnamos ese array directamente y tendremos un resultado correcto 
		return $obj;

	}//procedureEjecutar


	/**
	 * Metodo: Eliminar
	 * Especificamos el valor a liminar y la columna, se puede especificar o llmarse desde el objeto
	 */
	public function eliminar($valor=null, $columna=null){

		//error_reporting (0);
		$active = 0;

		//eleimna de la tabla los elementos, si es null nos pone id
		//$query = "DELETE FROM ". static ::$table ." WHERE ".(is_null($columna)?"id":$columna)." = ':p'";
		$query = "DELETE FROM ". static ::$table ." WHERE ".(is_null($columna)?"id":$columna)." = '".$this->id."'";
		//echo $query."<br/>";

		self::getConexion();
		//Prepara la conexión
		$res = self::$cnx->prepare($query);
		//Agregamos los parametros
		//Si el valor es diferente de nulo, loa agrega como parametro, en caso contraro de que no existiera el valor
		//simplemente le ponemos el valor del id del modelo o del registro que se haya puesto 
		
		//echo "id: ".$this->id;
		
		if(!is_null($valor)){
            $res->bindParam(":p",$active, $valor);
            
        }else{
            $res->bindParam(":p",$active,(is_null($this->id)?null:$this->id));
        	//error_reporting (0);
        }//if

		//ejecutar al final 
		if($res->execute()){
			//si ejecuta el query al final desconecta y retorna true
			self::getDesconectar();
			return true;
		}else{
			//si no ejecuta el query nos retorna false
			return false;
		}

	}//eliminar



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
             //vaciamos la conexion
			//self::$cnx = null;
			self::getDesconectar();
			return true;
		}else{
			return false;
		}  //if $res


	} //metodo guardar

	/**
	 * 
	 * Metodo where
	 * Función para buscar una fila  denro de unuestra bd por medio de criterio, por nombre, por id
	 * o por alguna columna en especial recuperando el valor
	 */
	/**
	 * [where Funcion de busqueda de fila en un aBD]
	 * @param  [type] $columna [Nombre del campo]
	 * @param  [type] $valor   [Valor de busqueda]
	 * @return [type]          [description]
	 */
	public static function where($columna, $valor){
		// static::venta del Modelo Venta.php
		// Si es nombre, la busqueda seria  por nombre:nombre
		// ej: select * from ventas where nombre = : nombre
		$query = "SELECT * FROM ". static ::$table ." WHERE ".$columna." = :".$columna;
		//echo $query."<br/>";
		//Obtenemos una nueva clase, que vendria siendo la clase user de \app\model\Venta.php, class Venta
		//Esta llamando la clase Venta directamente, $class recupera esa clase y la almacena
		$class = get_called_class();//La clase se llama Venta
		//Nos traemos la conexión 
		self::getConexion();
		//Preparamos la consulta a traves de la variable $cnx variable de conexión
		$res = self::$cnx->prepare($query);
		// Pasamos el parametro con ($res->bindParam) del parametro del llamdo de la funcion
		$res->bindParam(":".$columna, $valor);
		//$res->setFetchMode( PDO::FETCH_CLASS, $class);
		// Ejecuta la consulta
		$res->execute();
		//$filas = $res->fetch();
		//echo count($filas);
		// Inicializar el objegto para eviatar errores al ejecutar las consultas
		$obj = [];
		// Hacemos un recorrigo de cada respuesta que nos da como un afila un $row
		foreach ($res as $row) {
			//$obj es un objeto como instancia de la clase que se llama Venta y con cada fila lo va rellenando
			//a todo el data que viene en el modelo \libreria\ORM\Modelo.php 
			//CAda ves que se va construyendo el modelo le vamos pasando un dato igual a null del constructor
			//Por lo tanto supongamos que viene de la BD un id, un nombre y una fila y se va creando una nueva instancia 
			// y lo va enviando 
			$obj[] = new $class($row);
		}
		//Desconectar
		self::getDesconectar();

		//Al final devielve el objeto, por cada fila que vaya encontrando va creando un nuevo objeto con el nombre de la clase Venta
		return $obj;
		/**
		 * Ej. Salida cuando encuentra el valor, si hay mas valores los alamacera en el arreglo
		 * url: /localhost/dev/store/ventas/buscar
		 * SELECT * FROM ventas WHERE cliente = :cliente
		 * Array ( [0] => APP\model\Venta Object 
		 * ( [data:libreria\ORM\Modelo:private] => Array (
		 *  [id] => 17 [0] => 17 [cliente] => Klvst3r [1] => Klvst3r [fecha] => 2017-07-06 [2] => 2017-07-06
		 *   ) ) )
		 */
	} //metodo where

	
	public static function find($id){
		//echo get_called_class();
		// Llamamos al id pasado como parametro
		$resultado = self::where("id",$id);
		//Si el count de resultado es mayor que cero 
		if(count($resultado)){
			//retorna el primer resultado al modelo
			return $resultado[0];	
		}else{
			return []; //devuelve cero elementos
		}
		
	} //find

	public static function all(){
		// Realiza consulta de todos los elementos de una tabla, recupera un protected table que es el nombre de la tabla
		// En este momento es la tabla ventas
		$query = "SELECT * FROM ". static ::$table ;
		//echo $query;
		//Almacena el nombre de la clase
		$class = get_called_class();
		//Conecta con la BD
		self::getConexion();
		//Hace la preparación del query
		$res = self::$cnx->prepare($query);
		//$res->setFetchMode( PDO::FETCH_CLASS, $class);
		//Ejecuta
		$res->execute();
		//$filas = $res->fetch();
		//echo count($filas);
		//Por cada fila que encunetra lo instancia la clase que se ha visto que en este momento es venta y envia los datos como row
		foreach ($res as $row) {
			$obj[] = new $class($row);
		} //foreach
		//Desconectar
		self::getDesconectar();

		//Retorna un listado de objetos
		return $obj;
	}//all

} //Class