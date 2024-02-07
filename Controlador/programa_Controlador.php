<?php
require_once "Modelo/programa_Modelo.php";
class programa_controlador{

    public function __construct(){
        $this->obj = new Plantilla();
    }
    public function principal(){
        $this-> obj ->programas=Programa_Modelo::listar( );
        $this-> obj-> unirPagina("programa/principalpro");        
    }

    public function frmRegistrar(){
        $this-> obj-> unirPagina("programa/frmRegistrar");    
    }
    public function registrar(){
       
        if( isset($_POST['nombres'])&& isset($_POST['codigos']) ){
            extract($_POST);
          
            $datos ['nombres']=$nombres;
            $datos ['codigos']=$codigos;    
            $res =Programa_Modelo:: verificarCodigo($codigos);
            if(is_bool($res)){
            if ( $nombres != ''&& $codigos !=''){
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

    public function frmEditar(){}
    public function editar(){}

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