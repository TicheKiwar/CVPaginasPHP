<?php
class EnlacePaginas {
    public static function enlacePaginasModelo($enlaceModelo) {
        if ($enlaceModelo == "nosotros"||
            $enlaceModelo == "login"||
            $enlaceModelo == "contactos"||
            $enlaceModelo == "inicio"||
            $enlaceModelo =="servicios"||$enlaceModelo=="reporte"
            ) {
            if ($enlaceModelo=="login") {
                header("Location: ./vista/interface/login.php");
            }else{
            $modulo="./vista/interface/".$enlaceModelo.".php";
            }
        }else{
            $modulo="./vista/interface/inicio.php";
        }
        return $modulo;
    }
}
?>