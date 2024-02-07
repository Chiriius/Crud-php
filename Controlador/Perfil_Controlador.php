<?php
class perfil_Controlador{

    public function __construct(){
        $this->obj = new Plantilla();
    }
    public function principal(){
        $this->obj-> unirPagina("Perfil/principal");        
    }
   
   
    public function frmEditar(){}
    public function editar(){}

    public function eliminar(){}

    public function buscar(){}

}

?>