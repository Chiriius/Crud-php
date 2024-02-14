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
                var_dump($res);

                if ($res>0){
                    echo json_encode(array("estado"=>1, "mensaje" => "Registrado", "icono"=>"success")) ;
                }
                else{
                    echo json_encode(array("estado"=>2, "mensaje" => "No Registro", "icono"=>"error")) ;
                }
            }
            else{
                echo json_encode(array("estado"=>2, "mensaje" => "No Registro", "icono"=>"error")) ;
            }
        }
        else {
            echo json_encode(array("estado"=>2, "mensaje" => "Este correo ya existe", "icono"=>"error")) ;
        }  
        
    }
    public function cerrarSesion(){}

}
?>