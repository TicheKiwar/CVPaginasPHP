<?php
include('./modelo/conexion.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
        <link rel="stylesheet" type="text/css" href="jq/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="jq/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="jq/themes/color.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script type="text/javascript" src="jq/jquery.min.js"></script>
        <script type="text/javascript" src="jq/jquery.easyui.min.js"></script>   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/99b0f2599c.js" crossorigin="anonymous"></script>
    </head>
    <form action="./modelo/buscarCedula.php" method="GET">
            <input type="text" name="cedula">
            <input type="submit" class="easyui-linkbutton" iconCls="icon-ok" value="Busqueda">
        </form>
        <table class="table" >
        <thead>
          <tr>
            <th >CEDULA</th>
            <th >NOMBRE</th>
            <th >APELLIDO</th>
            <th >DIRECCION</th>
            <th >CELULAR</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET["cedula"])){
            $cedula = $_GET['cedula'];
            $sql="SELECT * FROM estudiante where est_cedula='$cedula'";
            $respuesta=$conn->query($sql);
            $resultado=array();
                        while ($row=$respuesta->fetch_array()){ ?>
                           <tr>
                           <td> <?php echo $row['est_cedula'] ?> </td>
                           <td> <?php echo $row['est_nombre'] ?> </td>
                           <td> <?php echo $row['est_apellido'] ?> </td>
                           <td> <?php echo $row['est_direccion'] ?> </td>
                           <td> <?php echo $row['est_telefono'] ?> </td>
                           <td> 
                                <a href="./modelo/editar.php?cedula=<?php echo $row['est_cedula'] ?>"class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a> 
                                <a href="./modelo/eliminar.php?cedula=<?php echo $row['est_cedula'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a href="./vista/interface/reporteI.php?cedula=<?php echo $row['est_cedula'] ?>" class="btn btn-success btn-block">
                                    REPORTE
                                </a> 
                            </td>
                    <?php } }?>
        </tbody>

      </table>
</html>