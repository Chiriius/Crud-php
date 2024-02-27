<?php
class Usuario_Modelo {
    public static function registar($data){
        $i = new conexion();
        $con = $i->getConexion();
         $uid= uniqid();
      
        $sql = "INSERT INTO t_usuario(USU_UID, USU_NOMBRES, USU_APELLIDOS, USU_EMAIL, USU_PASSWORD,USU_TELEFONO,USU_FCH_NAC,USU_ROL)
        VALUES (?,?,?,?,?,?,?,?)";
        $st = $con->prepare($sql);
        
       
        $p = array(

            $uid,$data['nombres'], $data['apellidos'],$data['email'],sha1($data['password']) , $data['telefono'], $data['fecha_nac'] , $data['usu_rol'] 
        );
         return $st->execute($p);


    }
    public static function actualizar($data){
      $i = new conexion();
      $con = $i->getConexion();
    
      $sql = "UPDATE t_usuario SET USU_NOMBRES = ?, USU_APELLIDOS = ?, USU_EMAIL =?,USU_TELEFONO=?,USU_FCH_NAC=?, USU_ROL=?
      WHERE USU_UID=?";
      $st = $con->prepare($sql);
      
     
      $p = array(

         $data['nombres'], $data['apellidos'],$data['email'] , $data['telefono'], $data['fecha_nac'],$data['usu_rol'],$data['uid'] 
      );
       return $st->execute($p);
       

        
    }
    public static function eliminar($id){
        $i = new conexion();
        $con = $i->getConexion();
      $sql = "DELETE FROM t_usuario WHERE USU_UID = ?";
      $st = $con->prepare($sql);
      $v= array($id);
     return $st->execute($v);
     
        
    }
    public static function listar($condicion=""){
        $i = new conexion();
        $con = $i->getConexion();
      $sql = "SELECT * FROM t_usuario $condicion";
      $st = $con->prepare($sql);
      $st->execute();
      return $st ->fetchAll();
        
    }

    public static function verificarEmail($email){
        $i = new conexion();
        $con = $i->getConexion();
      $sql = "SELECT USU_EMAIL FROM t_usuario WHERE USU_EMAIL = ?";
      $st = $con->prepare($sql);
      $v = array($email);
      $st->execute($v);
      return $st ->fetch();

    }
    public static function buscarXUid($uid){
      $i = new conexion();
      $con = $i->getConexion();
    $sql = "SELECT * FROM t_usuario WHERE USU_UID = ?";
    $st = $con->prepare($sql);
    $v = array($uid);
    $st->execute($v);
    return $st ->fetch();

  }
}
