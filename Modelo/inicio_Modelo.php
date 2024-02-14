<?php
class inicio_Modelo {
    public static function logear($datos){
        $i = new conexion();
        $con = $i->getConexion();
      //  var_dump($datos);
        
        $sql = "SELECT USU_EMAIL,USU_PASSWORD from t_usuario WHERE USU_EMAIL= ? AND USU_PASSWORD =?";

        $st = $con->prepare($sql);
        $dsad=array(
            $datos['usuario'], sha1($datos['contraseña'] ) 
        );
        $st->execute( $dsad);
        
         return $st->fetchAll() ;
         


    }

 }