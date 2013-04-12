<?php
/**
 * 
 * 
 * @version        1.0
 * @copyright     EULA
 * @author         JBaires (Juan Jose Ajcuc Baires) 
 */

//Se inicializan las Sesiones
session_start();
//$_SESSION['usuario'] = true;
/** 
 * Se instancia en 1 o true para indicar que este es un archivo padre y desde el cual se pueden llamar y ejecutar otros controladores y modelos. * 
 * @param boolean
 * 
 */
define( '_SYSEXEC', 1 );

/**
 * Se Define PATH_BASE para crear una variable estatica que contendra la ruta base desde donde se ejecutaran todos los ficheros
 * o desde donde se mandaran a traer las librerias y controladores
 * @param       function
 */
define('PATH_BASE', dirname(__FILE__) );

/**
 * Se define la constante DS que contendra en separador de directorios en funcion al sistema operativo
 * @param       Constante
 */
define( 'DS', DIRECTORY_SEPARATOR );
require_once ( PATH_BASE .DS.'includes'.DS.'define.php' );
require_once ( PATH_BASE .DS.'includes'.DS.'init.php' );
require_once ( P_INCLUDES . DS .'required.php' );
$system = new Framework();
$system->display->deployContent();




?>