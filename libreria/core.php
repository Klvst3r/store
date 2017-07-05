<?php
//Motor del proyecto

/**
 *Created by Klvst3r
 *User: Klvst3r
 *Date: 2017-007-04
 * Time: 10h50
 * 
 */

//Constantes de Entorno de manera global

//Ruta de la carpeta App
define("APP_RUTA",RUTA_BASE."app/");
//echo APP_RUTA;
define("VISTA_RUTA",RUTA_BASE."view/");
define("RUTA",APP_RUTA."rutas/");
//echo RUTA;

//Vistas
include "Vista.php";
// Rutas 
include "Ruta.php";
include RUTA."rutas.php";