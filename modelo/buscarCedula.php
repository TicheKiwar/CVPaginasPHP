<?php
include "conexion.php";    #import
if (isset($_GET["cedula"])){
   $cedula= $_GET["cedula"];
header("Location: ../index.php?action=servicios2&cedula=".$cedula);
}else
{
    header("Location: ../index.php?action=servicios");
}

?>