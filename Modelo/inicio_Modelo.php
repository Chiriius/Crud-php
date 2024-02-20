<?php
class inicio_Modelo {
    public static function logear($datos){
        $i = new conexion();
        $con = $i->getConexion();
        $usuario = $datos["usuario"];
        $contraseña = sha1($datos["contraseña"]);
        $sql = "SELECT USU_EMAIL,USU_PASSWORD from t_usuario WHERE USU_EMAIL=  '$usuario' AND USU_PASSWORD = '$contraseña'";

        $st = $con->prepare($sql);
        $st->execute( );
        
         return $st->fetch() ;
         


    }

 }