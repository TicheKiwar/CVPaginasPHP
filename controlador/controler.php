<?php

class McvController {
    public function plantilla() {
        include ("./vista/template.php");
    }
    public function enlacesPaginasController() {
        if (isset($_GET ["action"])) {
            $enlacesController = $_GET["action"];
        }else{
            $enlacesController = "./vista/interface/inicio.php";
        }
        $respuesta=EnlacePaginas::enlacePaginasModelo($enlacesController);
            include $respuesta;
        }
}
?>