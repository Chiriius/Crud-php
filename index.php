<?php
require_once"Recursos/ruta.php"; 
require_once"Recursos/plantilla.php";
require_once"Recursos/conexion.php";
if (isset($_GET["controlador"]) && isset($_GET["accion"]) ){
    $controlador= $_GET["controlador"];
    $accion =$_GET["accion"];
}else{
    $controlador = "inicio";
    $accion      =  "principal";
}

ruta::cargarContenido($controlador,$accion);
?> 