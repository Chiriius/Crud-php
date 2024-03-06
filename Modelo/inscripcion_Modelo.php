<?php

class inscripcion_Modelo
{
  public static function registar($usuid, $proCod, $fecha)
  {
    $i = new conexion();
    $con = $i->getConexion();

    $sql = "INSERT INTO t_us_pro(USPRO_UID, USPRO_USU_ID, USPRO_PRO_ID,USPRO_FCH_INS)
        VALUES (?,?,?,?)";
    $st = $con->prepare($sql);

    $uid = uniqid();
    $p = array(
      $uid,
      $usuid,
      $proCod,
      $fecha

    );
    return $st->execute($p);


  }
  public static function eliminar($id)
  {
    $i = new conexion();
    $con = $i->getConexion();
    $sql = "DELETE FROM t_us_pro WHERE USPRO_UID = ?";
    $st = $con->prepare($sql);
    $v = array($id);
    return $st->execute($v);

  }
  public static function listar()
  {
    $i = new conexion();
    $con = $i->getConexion();
    $sql = "SELECT * FROM t_us_pro INNER JOIN t_usuario ON USU_ID = USPRO_USU_ID INNER JOIN t_programa ON proCod = USPRO_PRO_ID ";
    $st = $con->prepare($sql);
    $st->execute();
    return $st->fetchAll();

  }

}