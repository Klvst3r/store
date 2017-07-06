<?php

/**
 * Class: Modelo
 * Servira para extenderlo a todos los modelos que se hagan, Mediante herencia
 * Los modelos son una representación de una tabla en una clase, si tenemos una tabla usuarios tendremos un modelo llamado Usuario
 * En singular por que es una clase y con la primera letra en mayusculas.
 * Esta clase representa lo que es la tabla en la base de datos, por cada tabla tendremos una clase dentro del proyecto.
 * Por que tendremos con ello los getters y Setters y que mediante sestilos se haan con clases dinamicas,
 */

namespace libreria\ORM;

class Modelo extends EtORM {
	//Funciones o propiedades que contendra a todas las propiedades dinamicamente
	//Creamos una propiedad que contendra un array de propiedades
	private $data = array();

	//Propiedades protegidas, 
	protected static $table;

	//Generamos un constructor y ppuede o no llevarlo por eso el parametro null
	function __construct($data = null) {
		$this->data = $data;
	}
	//Funciones Magicas definidas PHP para generar los getters y setters que alimentaran el sistema dinamicamente
	/**
	 * [__get Al hacer un get dinamico de la propiedad, con el objeto instanciado debe traera la prpiedad nombre
	 */
	public function __get($name)
	{
	    //TODO: Implement __get() method,
	    //Reornara la propiedad de manera dinamica o magica
	    //Verifica si existe el key en el array o esa clave dentro del arreglo sino no lo retorna 
	    if (array_key_exists($name, $this->data)){
	    	return $this->data[$name];
	    }
	    
	}
	 
	public function __set($name, $value)
	{
		//TODO: Implement __set() method
		//Al hacer un set o enviar una propiedad al objeto, le diremos  que en la posicion $name al data le pondra el valor enviado
	    $this->data[$name] = $value;
	    //return $this;
	}

	//Codigo que define la obtencion de las columnas recuperamos columnas de tabla
	public function getColumnas(){
		return $this->data;
	}
	
} //Class Modelo


