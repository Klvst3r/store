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
//Helpers del ORM 
include "help/helps.php";

//Ruta de la carpeta App
define("APP_RUTA",RUTA_BASE."app/");
//echo APP_RUTA;
define("VISTA_RUTA",RUTA_BASE."view/");
define("LIBRERIA",RUTA_BASE."libreria/");

define("RUTA",APP_RUTA."rutas/");
//echo RUTA;
//Estaran todos los modelos
define("MODELS",APP_RUTA."model/");

//Configuraciones
include RUTA_BASE."config/config.php";
include "ORM/Conexion.php";

//Incluir la libreria ORM 
include "ORM/Modelo.php";

//Ejecución de los modelos
includeModels();

//Vistas
include "Vista.php";
// Rutas 
include "Ruta.php";
include RUTA."rutas.php";

//Importamos modelos dinamicamente