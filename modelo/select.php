<?php
include "conexion.php";    #import
$sql="SELECT * FROM estudiante";
$respuesta=$conn->query($sql);
$resultado=array();
while ($row=$respuesta->fetch_array()){
    array_push($resultado,$row);
}
echo json_encode($resultado);

?>