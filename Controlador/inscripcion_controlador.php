<?php
require_once "Modelo/programa_Modelo.php";
require_once "Modelo/Usuario_Modelo.php";
require_once "Modelo/inscripcion_Modelo.php";
class inscripcion_controlador{

    public function __construct(){
        $this->obj = new Plantilla();
    }
    public function principal(){
        $this-> obj ->inscripciones=inscripcion_Modelo::listar( );
        $this-> obj-> unirPagina("inscripcion/principal");      
    }

    public function frmRegistrar(){
        $this-> obj-> unirPagina("programa/frmRegistrar");    
    }
    public function registrar(){
       
        if( isset($_POST['ins_usu_correo'])&& isset($_POST['ins_usu_codigo']) ){
            extract($_POST);
          
            $datos ['ins_usu_correo']=$ins_usu_correo;
            $datos ['ins_usu_codigo']=$ins_usu_codigo;    
            $datos ['USPRO_FCH_INS']=$USPRO_FCH_INS;    
            $res =Usuario_Modelo:: verificarEmail($ins_usu_correo);
            $res1 =Programa_Modelo:: verificarCodigo($ins_usu_codigo);
             if(!is_array($res)){
                echo json_encode(array("estado"=>2, "mensaje" => "Usuario no existente", "icono"=>"error")) ;
             }
             elseif (!is_array($res1)){
                echo json_encode(array("estado"=>2, "mensaje" => "Programa no existente", "icono"=>"error")) ;
             }
             else{
                $res = inscripcion_Modelo::registar($res["USU_ID"],$res1["proCod"],$USPRO_FCH_INS);
                if ($res>0){
                    echo json_encode(array("estado"=>1, "mensaje" => "Inscrito Correctamente", "icono"=>"success")) ;
                }
                else{
                    echo json_encode(array("estado"=>2, "mensaje" => "No Inscrito", "icono"=>"error")) ;
                }
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