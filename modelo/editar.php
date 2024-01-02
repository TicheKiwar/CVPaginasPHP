<?php
    include("conexion.php");
    if(isset($_GET["cedula"])){
        $id = $_GET["cedula"];
        $sqlSelect = "SELECT * FROM estudiante WHERE est_cedula = '$id'";
        $result = $conn -> query($sqlSelect);
        if(mysqli_num_rows($result) == 1){
            $resulatado = mysqli_fetch_array($result);
            $nombre = $resulatado["est_nombre"];
            $apellido = $resulatado['est_apellido'];
            $direccion = $resulatado["est_direccion"];
            $telefono = $resulatado['est_telefono'];
        }
    }
    if  (isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST["est_nombre"];
        $apellido = $_POST['est_apellido'];
        $direccion = $_POST["est_direccion"];
        $telefono = $_POST['est_telefono'];
        $query = "UPDATE estudiante set est_nombre='$nombre',est_apellido='$apellido',est_direccion='$direccion',est_telefono='$telefono' where est_cedula='$id'";
        $conn -> query($query);
        header("Location: ../index.php?action=servicios");
    }

?>


<?php include ("incluide/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['cedula']?>" method="POST">
                <div class="form-group">
                        <input type="text" name="est_nombre" value="<?php echo $nombre; ?>" id="" rows="2" class="form-control"
                        placeholder="Nombre" autofocus required="true">
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="est_apellido" value="<?php echo $apellido; ?>" id="" class="form-control"
                        placeholder="Apellido" autofocus required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="est_direccion" id=""value="<?php echo $direccion; ?>" rows="2" class="form-control"
                        placeholder="Direccion" autofocus required="true">
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="est_telefono" id="" value="<?php echo $telefono; ?>"class="form-control"
                        placeholder="Telefono" autofocus required="true">
                    </div>
                    <input type="submit" name="update" class="btn btn-success btn-block" value="EDITAR">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("incluide/footer.php") ?>