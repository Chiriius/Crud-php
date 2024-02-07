<?php
require_once "Modelo/Usuario_Modelo.php";
class usuario_controlador{

    public function __construct(){
        $this->obj = new Plantilla();
    }
    public function principal(){
        $this-> obj ->usuarios=Usuario_Modelo::listar( );
        $this-> obj-> unirPagina("usuario/PrincipalUsu");        
    }

    public function frmRegistrar(){
        $this-> obj-> unirPagina("usuario/frmRegistrar");    
    }
    public function registrar(){
       
        if( isset($_POST['nombres'])&& isset($_POST['apellidos']) && isset($_POST['email']) && isset ($_POST['password']) && isset ($_POST['telefono']) && isset($_POST['fecha_nac'])){
            extract($_POST);
          
            $datos ['nombres']=$nombres;
            $datos ['apellidos']=$apellidos;    
            $datos ['email']=$email;
            $datos ['password']=$password;
            $datos ['telefono']=$telefono;
            $datos ['fecha_nac']=$fecha_nac;
            $res= Usuario_Modelo :: verificarEmail($email);
            if (is_bool($res)){
            if ( $nombres != ''or $apellidos !=''or $email!=''or $password ='' or $telefono != '' or $fecha_nac !=''){
                $res = Usuario_Modelo::registar($datos);
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
    }

    public function frmEditar(){}
    public function editar(){}

    public function eliminar(){
       
       

        
    }

    public function buscar(){}

}

?>