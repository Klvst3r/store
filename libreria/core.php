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
require_once("help/helps.php");

//Ruta de la carpeta App
define("APP_RUTA",RUTA_BASE."app/");
//echo APP_RUTA;
define("VISTA_RUTA",RUTA_BASE."view/");
define("ASSETS_PATH",RUTA_BASE."assets/");
define("LIBRERIA",RUTA_BASE."libreria/");

define("RUTA",APP_RUTA."rutas/");
//echo RUTA;
//Estaran todos los modelos
define("MODELS",APP_RUTA."model/");

//Configuraciones, que se requeriran directamente para la aplicación 
require_once(RUTA_BASE."config/config.php");
//Se agrega para ser usada la conexión y no necesariamente incluir contenido del archivo
require_once("ORM/Conexion.php");

//Incluir la libreria ORM EtORM
require_once("ORM/EtORM.php");
//Incluir la libreria ORM, se usara el archivo y no el contenido
require_once("ORM/Modelo.php");

//Incluir liberia class.inputfilter.php
require_once("help/class.inputfilter.php");


//Ejecución de los modelos
includeModels();

//Vistas
require_once("Vista.php");
// Rutas 
include "Ruta.php";
include RUTA."rutas.php";

//Importamos modelos dinamicamente