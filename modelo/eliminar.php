<?php

include("conexion.php");

if (isset($_GET["cedula"])) {
$cedula = $_GET["cedula"];
$sqlElimiar = "delete from estudiante where est_cedula= '$cedula';";
if($conn->query($sqlElimiar)==TRUE) {
    
    header("Location: ../index.php?action=servicios");
}
}else{
    
$cedula = $_POST["est_cedula"];
    $sqlElimiar = "delete from estudiante where est_cedula= '$cedula';";
    if($conn->query($sqlElimiar)==TRUE) {
        echo json_encode("Se Elimino");
    }
    else { 
        echo json_encode("Error" .$sqlElimiar.$conn->error);
    }
}

?>