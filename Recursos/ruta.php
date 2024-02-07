<?php
class ruta{
    public static function cargarContenido($controlador, $accion){
        //echo"<br> Se debe cargar el controlador: $controlador";
        //echo"<br> y ejecutar el servicio: $accion";
        if(file_exists("Controlador/$controlador"."_controlador.php")){
            require_once"Controlador/$controlador"."_controlador.php";
            $ctn= $controlador."_controlador";
            $obj=new $ctn();
            if(method_exists($obj, $accion)){
                $obj-> $accion();
            }else{
                echo"Ese Servicio No existe";
            }
        }else{
        echo"<br>ese controlador no existe";
    }
}
}
?>