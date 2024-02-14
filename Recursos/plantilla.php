<?php
class Plantilla{
    public function unirPagina($contenido,$paginaCompleta=true){
        if($paginaCompleta){
            require_once"Vista/Header.php";
        require_once"Vista/$contenido".".php";
        require_once"Vista/footer.php";
        }
        else { 
            require_once"Vista/$contenido".".php";
        }

        
    }

}

?>