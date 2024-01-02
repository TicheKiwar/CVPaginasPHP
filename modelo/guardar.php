<?php
include "conexion.php";
$cedula = $_POST["est_cedula"];
$nombre = $_POST    ["est_nombre"];
$apellido = $_POST ["est_apellido"];
$direccion = $_POST ["est_direccion"];
$telefono = $_POST ["est_telefono"];
$sqlInsert = "Insert into estudiante (est_cedula,est_nombre,est_apellido,est_direccion,est_telefono) 
                values ('$cedula','$nombre','$apellido','$direccion','$telefono')";
if($conn ->query($sqlInsert)==true) {
    echo json_encode("Se guardo");
    if ( isset($_POST['save']) ){ 
    header("Location: ../index.php?action=servicios");
    }
} else {
    echo json_encode("Error" .$sqlInsert.$conn->error);
}
?>