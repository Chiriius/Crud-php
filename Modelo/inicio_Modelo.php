<?php
class inicio_Modelo {
    public static function logear($datos){
        $i = new conexion();
        $con = $i->getConexion();
        $usuario = $datos["usuario"];
        $contraseña = sha1($datos["contraseña"]);
        $sql = "SELECT USU_EMAIL,USU_PASSWORD,USU_APELLIDOS,USU_NOMBRES,USU_UID,USU_ROL,USU_ID from t_usuario WHERE USU_EMAIL=  '$usuario' AND USU_PASSWORD = '$contraseña'";

        $st = $con->prepare($sql);
        $st->execute( );
        
         return $st->fetch() ;
         


    }

 }