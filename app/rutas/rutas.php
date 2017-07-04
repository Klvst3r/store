<?php
/**
 * Archivo donde estaran las rutas disponibles en la aplicación
 */

//echo "rutas";
/**
 * Este archivo siempre se va a actualizar, cada vez que se añada un controlador agregaremos una ruta si es necesario
 */
//Nueva instancia de la clase Ruta
$ruta = new Ruta();

/**
 * Establecemos las rutas de sus controladores respectivos
 * Son los archivos que procesaran las rutas principales del proyecto
 */
$ruta->controladores(array(
	"/"=>"WelcomeController",
	"/usuarios"=>"UsuarioController"
	));