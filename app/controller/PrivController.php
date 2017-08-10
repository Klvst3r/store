<?php

use \vista\Vista;

class PrivController {
	
	public function index(){
		
		return Vista::crear("admin.privilegio.index");
		
	}

	
}