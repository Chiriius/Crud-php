<?php
require_once "Modelo/Usuario_Modelo.php";
class usuario_controlador{

    public function __construct(){
        if(!isset($_SESSION["USU_UID"])){
            header("location:/CRUD-PHP");
        }
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
       
        if( isset($_POST['nombres'])&& isset($_POST['apellidos']) && isset($_POST['email']) && isset ($_POST['password']) && isset ($_POST['telefono']) && isset($_POST['fecha_nac'])&& isset($_POST['usu_rol'])){
            extract($_POST);
          
            $datos ['nombres']=$nombres;
            $datos ['apellidos']=$apellidos;    
            $datos ['email']=$email;
            $datos ['password']=$password;
            $datos ['telefono']=$telefono;
            $datos ['fecha_nac']=$fecha_nac;
            $datos ['usu_rol']=$usu_rol;
            
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
//ss
    public function frmEditar(){
        $uid = $_GET["id"];
        $this-> obj-> infoUsuario = Usuario_Modelo::buscarXUid($uid);
        $this-> obj-> unirPagina("usuario/frmEditar");      

    }
    public function editar(){
        if( isset($_POST['nombres'])&& isset($_POST['apellidos']) && isset($_POST['email']) && isset ($_POST['telefono']) && isset($_POST['fecha_nac']) && isset($_POST['usu_rol'])  && isset ($_POST['uid'])){
            extract($_POST);
          
            $datos ['nombres']=$nombres;
            $datos ['apellidos']=$apellidos;    
            $datos ['email']=$email;
            $datos ['uid']=$uid;
            $datos ['telefono']=$telefono;
            $datos ['fecha_nac']=$fecha_nac;
            $datos ['usu_rol']=$usu_rol;
            $res = Usuario_Modelo::actualizar($datos);
            if ($res>0){
                echo json_encode(array("estado"=>1, "mensaje" => "Actualizado", "icono"=>"success")) ;
            }
            else{
                echo json_encode(array("estado"=>2, "mensaje" => "Error al actualizar", "icono"=>"error")) ;
            }
        }
    }

    public function eliminar(){
        $id = $_GET['id'];
        $res= Usuario_Modelo :: eliminar($id);
        if($res>0){
            header('location: ?controlador=usuario&accion=principal');
        }
       

        
    }
    public function reportePDF(){
        $rol = $_POST['rol'];
        $com = $rol != 4 ? "WHERE USU_ROL= $rol" : "";
        $allUsers =Usuario_Modelo::listar($com);
        require_once "Vista/usuario/reporte.php";

    }

    public function buscar(){}

}

?>