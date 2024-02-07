<?php
class Plantilla{
    public function unirPagina($contenido){
        require_once"Vista/Header.php";
        require_once"Vista/$contenido".".php";
        require_once"Vista/footer.php";
    }

}

?>