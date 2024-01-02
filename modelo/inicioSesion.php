<?php

include "conexion.php";

if ( !empty($_POST['btningresar']) ){
    if ( empty($_POST['usuario'] )and empty($_POST['password']) ){
        echo'<div class="alert alert-danger">Campos Vacios</div> ';
    }else{
        $password = $_POST['password'];
        $usuario = $_POST['usuario'];
        $sql="SELECT * FROM usuario where usuario = '$usuario' and contraseña = '$password'";
        $result = $conn -> query($sql);
        if ($row=$result->fetch_array()){
            header("Location: ../index.php?action=servicios");
        }
    }

}

?>