<?php
require_once "Modelo/inicio_Modelo.php";
class inicio_controlador{
    public function __construct(){
        $this-> obj= new Plantilla();
    }
    public function principal(){
        $this-> obj-> unirPagina("inicio/frmLogin",false);        
    }
    public function frmLogin(){
        $this-> obj-> unirPagina("inicio/frmLogin");    
    }

    public function logear(){
        if( isset($_POST['usuario'])&& isset($_POST['contraseña']) ){
            extract($_POST);
            $datos ['usuario']=$usuario;
            $datos ['contraseña']=$contraseña;
            if ( $usuario != '' || $contraseña !='' ){
                $res = inicio_Modelo::logear($datos);

                if ($res>0){
                    echo json_encode(array("estado"=>1, "mensaje" => "Datos Correctos", "icono"=>"success")) ;
                
                }
                else{
                    echo json_encode(array("estado"=>2, "mensaje" => "Contraseña o correo incorrecto", "icono"=>"error")) ;
                }
            }
            else {
                echo json_encode(array("estado"=>2, "mensaje" => "Complete los datos.", "icono"=>"error"));
            }
        }
        
    }
    public function cerrarSesion(){}

}
?>