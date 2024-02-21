<?php
require_once "Modelo/inscripcion_Modelo.php";
class inscripcion_controlador{

    public function __construct(){
        $this->obj = new Plantilla();
    }
    public function principal(){
        $this-> obj ->programas=inscripcion_Modelo::listar();
        $this-> obj-> unirPagina("programa/principalpro");        
    }

    public function frmRegistrar(){
        $this-> obj-> unirPagina("programa/frmRegistrar");    
    }
    public function registrar(){
       
        if( isset($_POST['email'])&& isset($_POST['programa']) ){
            extract($_POST);
          
            $datos ['email']=$email;
            $datos ['programa']=$programa;    
            $res =Programa_Modelo:: verificarCodigo($email);
            if(is_bool($res)){
            if ( $email != ''&& $programa !=''){
                $res = Programa_Modelo::registar($datos);
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
        } else { 
            echo json_encode(array("estado"=>2, "mensaje" => "Ya existe este codigo", "icono"=>"error")) ;
        }  
    }

    }

   


    public function eliminar(){
        $id = $_GET['id'];
        $res= Programa_Modelo :: eliminar($id);
        if($res>0){
            header('location: ?controlador=programa&accion=principal');
        }
        
    }

    public function buscar(){}

}

?>