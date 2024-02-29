<?php

class inscripcion_Modelo {
    public static function registar($usuid,$proCod,$fecha){
        $i = new conexion();
        $con = $i->getConexion();
      
        $sql = "INSERT INTO t_us_pro(USPRO_UID, USPRO_USU_ID, USPRO_PRO_ID,USPRO_FCH_INS)
        VALUES (?,?,?,?)";
        $st = $con->prepare($sql);
        
        $uid= uniqid();
        $p = array(
          $uid,
          $usuid,
          $proCod,
          $fecha
           
        );
         return $st->execute($p);


    }
    
    public static function listar (){
      $i = new conexion();
      $con = $i->getConexion();
    $sql = "SELECT * FROM t_us_pro";
    $st = $con->prepare($sql);
    $st->execute();
    return $st ->fetchAll();
      
  }

  }