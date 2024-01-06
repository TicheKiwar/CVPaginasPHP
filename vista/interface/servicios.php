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
    
        <h2>Basic CRUD Application</h2>
        <p>Click the buttons on datagrid toolbar to do crud actions.</p>
        <form action="vista/interface/reporteI.php" method="post">    

            <input type="submit" class="easyui-linkbutton" iconCls="icon-ok" value="Generar Reporte">

        </form>
        <form action="./modelo/buscarCedula.php" method="GET">
            <input type="text" name="cedula">
            <input type="submit" class="easyui-linkbutton" iconCls="icon-ok" value="Busqueda">
        </form>
        <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:700px;height:250px"
                url="modelo/select.php"
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="est_cedula" width="50">Cedula</th>
                    <th field="est_nombre" width="50">Nombre</th>
                    <th field="est_apellido" width="50">Apellido</th>
                    <th field="est_direccion" width="50">Direccion</th>
                    <th field="est_telefono" width="50">Telefono</th>
                </tr>
            </thead>
        </table>
       <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remover Estudiante</a>
        </div>
        
        <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Ingrese Estudiante</h3>
                <div style="margin-bottom:10px">
                    <input name="est_cedula" class="easyui-textbox" required="true" label="cedula:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="est_nombre" class="easyui-textbox" required="true" label="nombre:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="est_apellido" class="easyui-textbox" required="true" label="apellido:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="est_direccion" class="easyui-textbox" required="true"  label="Direccion:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="est_telefono" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
        </div>
        <script type="text/javascript">
            var url;
            function newUser(){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Estudiante');
                $('#fm').form('clear');
                url = './modelo/guardar.php';
            }
            function editUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Usuario');
                    $('#fm').form('load',row);
                    url = 'modelo/modificar.php?est_cedula='+row.est_cedula;
                }
            }
            function saveUser(){
                $('#fm').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlg').dialog('close');        // close the dialog
                            $('#dg').datagrid('reload');    // reload the user data
                        }
                    }
                });
            }
            function destroyUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirmar','¿Esta seguro que quiere eliminar?',function(r){
                        if (r){
                            $.post('./modelo/eliminar.php',{est_cedula:row.est_cedula},function(result){
                                if (!result.success){
                                    $('#dg').datagrid('reload');    // reload the user data
                                    $.messager.show({    // show error message
                                        title: 'Se Elimino',
                                        msg: 'Se elimino exitosamente'
                                    });
                                } else {
                                    $.messager.show({    // show error message
                                        title: 'Error',
                                        msg: result.errorMsg
                                    });
                                }
                            },'json');
                        }
                    });
                }
            }
        </script>
        <div class="col-md-4">
            <div class="card card-body">
                <form action="../../modelo/guardar.php" method="POST">
                    <div class="form-gruop">
                        <input type="text" name="est_cedula" id="" class="form-control"
                        placeholder="Cedula" autofocus required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="est_nombre" id="" rows="2" class="form-control"
                        placeholder="Nombre" autofocus required="true">
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="est_apellido" id="" class="form-control"
                        placeholder="Apellido" autofocus required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="est_direccion" id="" rows="2" class="form-control"
                        placeholder="Direccion" autofocus required="true">
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="est_telefono" id="" class="form-control"
                        placeholder="Telefono" autofocus required="true">
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="save" value="Guardar Tarea">
                </form>
            </div>
        </div>
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
                        $sql = "SELECT * from estudiante";
                        $result = $conn-> query($sql);
                        while ($row=$result->fetch_array()){ ?>
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
                    <?php } ?>
        </tbody>

      </table>
</html>