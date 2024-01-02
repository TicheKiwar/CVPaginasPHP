
<html>
    <head>
        <meta charset="UTF-8">
        <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
        <link rel="stylesheet" type="text/css" href ="./css/estilos.css" >
    </head>
    <header> 
        <img src="../img\descarga.jpeg">
    </header>
    <nav>
        <ul>
            <li> <a href="index.php?action=inicio">Inicio</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=login">Servicios</a></li>
            <li><a href="index.php?action=contactos">Contactos</a></li>
            <li><a href="index.php?action=reporte">Reportes</a></li>
        </ul>
    </nav>
    <section>
        <?php
        $mvc = new McvController();
        $mvc-> enlacesPaginasController ();
        ?>
    </section>
    <footer>2023 © Universidad Tecnica de Amabato</footer>
</html>