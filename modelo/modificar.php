<?php

include("conexion.php");
$cedula = $_POST["est_cedula"];
$nombre = $_POST["est_nombre"];
$apellido = $_POST ["est_apellido"];
$direccion = $_POST ["est_direccion"];
$telefono = $_POST ["est_telefono"];
$sqlInsert = "Update estudiante set est_nombre = '$nombre',est_apellido='$apellido',est_direccion='$direccion',est_telefono='$telefono' where est_cedula ='$cedula' ";
if($conn ->query($sqlInsert)==true) {
    echo json_encode("Se guardo");
} else {
    echo json_encode("Error" .$sqlInsert.$conn->error);
}

?>