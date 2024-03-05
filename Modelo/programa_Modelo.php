<?php
class Programa_Modelo
{
  public static function registar($data)
  {
    $i = new conexion();
    $con = $i->getConexion();

    $sql = "INSERT INTO t_programa(proNombre, proCod, proUid)
        VALUES (?,?,?)";
    $st = $con->prepare($sql);

    $uid = uniqid();
    $p = array(

      $data['nombres'],
      $data['codigos'],
      $uid,
    );
    return $st->execute($p);


  }
  public static function actualizar($data)
  {
    $i = new conexion();
    $con = $i->getConexion();

    $sql = "UPDATE t_programa SET proNombre = ?, proCod = ?
      WHERE proUid=?";
    $st = $con->prepare($sql);


    $p = array(

      $data['nombres'],
      $data['codigos'],
      $data['uid']
    );
    return $st->execute($p);
  }
  public static function eliminar($id)
  {
    $i = new conexion();
    $con = $i->getConexion();
    $sql = "DELETE FROM t_programa WHERE proUid = ?";
    $st = $con->prepare($sql);
    $v = array($id);
    return $st->execute($v);

  }
  public static function listar()
  {
    $i = new conexion();
    $con = $i->getConexion();
    $sql = "SELECT * FROM t_programa";
    $st = $con->prepare($sql);
    $st->execute();
    return $st->fetchAll();

  }
  public static function verificarCodigo($codigos)
  {
    $i = new conexion();
    $con = $i->getConexion();
    $sql = "SELECT proCod FROM t_programa WHERE proCod = ?";
    $st = $con->prepare($sql);
    $v = array($codigos);
    $st->execute($v);
    return $st->fetch();
  }
  public static function buscarXUid($uid)
  {
    $i = new conexion();
    $con = $i->getConexion();
    $sql = "SELECT * FROM t_programa WHERE proUid = ?";
    $st = $con->prepare($sql);
    $v = array($uid);
    $st->execute($v);
    return $st->fetch();

  }
}