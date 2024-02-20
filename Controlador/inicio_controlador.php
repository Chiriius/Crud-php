<?php
require_once "Modelo/inicio_Modelo.php";
class inicio_controlador{
    public function __construct(){
        $this-> obj= new Plantilla();
    } 
    public function principal(){
   
        $this-> obj-> unirPagina("inicio/frmLogin",false);        
    }

    public function dashboard(){
        if(!isset($_SESSION["USU_UID"])){
            header("location:/CRUD-PHP");
        }
        $this-> obj-> unirPagina("inicio/principal");       
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
                    if (is_array($res)){
                        $_SESSION['USU_APELLIDOS'] =$res["USU_APELLIDOS"];
                        $_SESSION['USU_NOMBRES'] =$res["USU_NOMBRES"];
                        $_SESSION['USU_UID'] =$res["USU_UID"];
                        $_SESSION['USU_ID'] =$res["USU_ID"];
                        $_SESSION['USU_ROL'] =$res["USU_ROL"];
                    }
                
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
    public function cerrarSession(){
        session_destroy();
        header("location:/CRUD-PHP");
    }

}
?>