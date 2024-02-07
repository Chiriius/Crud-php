<?php
class Usuario_Modelo {
    public static function registar($data){
        $i = new conexion();
        $con = $i->getConexion();
      
        $sql = "INSERT INTO t_usuario(USU_UID, USU_NOMBRES, USU_APELLIDOS, USU_EMAIL, USU_PASSWORD,USU_TELEFONO,USU_FCH_NAC)
        VALUES (?,?,?,?,?,?,?)";
        $st = $con->prepare($sql);
        
        $uid= uniqid();
        $p = array(

            $uid,$data['nombres'], $data['apellidos'],$data['email'],sha1($data['password']) , $data['telefono'], $data['fecha_nac'] 
        );
         return $st->execute($p);


    }
    public static function actualizar(){
        
    }
    public static function eliminar($id){
        $i = new conexion();
        $con = $i->getConexion();
      $sql = "DELETE FROM t_usuario WHERE USU_UID = ?";
      $st = $con->prepare($sql);
      $v= array($id);
     return $st->execute($v);
     
        
    }
    public static function listar(){
        $i = new conexion();
        $con = $i->getConexion();
      $sql = "SELECT * FROM t_usuario";
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
}
