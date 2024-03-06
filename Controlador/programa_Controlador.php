<?php
require_once "Modelo/programa_Modelo.php";
class Programa_controlador{

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

    public function frmEditar(){
        $uid = $_GET["id"];
        $this-> obj-> infoUsuario = programa_Modelo::buscarXUid($uid);
        $this-> obj-> unirPagina("programa/frmEditar");
    }
    public function editar(){
        if( isset($_POST['nombres'])&& isset($_POST['codigos'])  && isset ($_POST['uid'])){
            extract($_POST);
          
            $datos ['nombres']=$nombres;
            $datos ['codigos']=$codigos;    
            $datos ['uid']=$uid;
            
            $res = programa_Modelo::actualizar($datos);
            if ($res>0){
                echo json_encode(array("estado"=>1, "mensaje" => "Actualizadoo", "icono"=>"success")) ;
            }
            else{
                echo json_encode(array("estado"=>2, "mensaje" => "Error al actualizar", "icono"=>"error")) ;
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