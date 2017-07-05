<?php namespace App;
/*Geter y Setters
http://mikeangstadt.name/projects/getter-setter-gen/
*/
//Usamos una clase la libreria ORM
use libreria\ORM\Modelo;
//Extendemos la clase del modelo
class User extends Modelo{
	
	/**
	 * Se eleminan los geters y setters por que se generaran dinamicamente
	 */
	/*
	private $id;
	private $email;
	private $usuario;
	private $pass;
	private $estado;
	private $privilegio;

	function __construct($id, $email, $usuario, $pass, $stado, $privilegio) {
		$this->id = $id;
		$this->email = $email;
		$this->usuario = $usuario;
		$this->pass = $pass;
		$this->estado = $estado;
		$this->privilegio = $privilegio;
	}


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	} 

	public function getPass(){
		return $this->pass;
	}

	public function setPass($pass){
		$this->pass = $pass;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getPrivilegio(){
		return $this->privilegio;
	}

	public function setPrivilegio($privilegio){
		$this->privilegio = $privilegio;
	}
	*/

}