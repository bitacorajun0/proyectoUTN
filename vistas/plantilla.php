<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>to-do</title>
</head>

<body class="font-body">
    <div class="nav w-nav">
        <nav class="nav-con w-nav-menu">
            <a href="index.php?ruta=registro" class="nav-link w-nav-link">registrate</a>
            <a href="index.php?ruta=inicio" class="nav-link w-nav-link">inicio</a>
            <a href="index.php?ruta=cliqueame" class="nav-link w-nav-link">agregar</a>
            <a href="index.php?ruta=tareas" class="nav-link w-nav-link">tareas</a>
            <a href="index.php?ruta=salir" class="nav-link is--highlighted w-nav-link">salir</a>
            <!-- <a href="index.php?ruta=editar" class="hidden-link">editar</a> -->
        </nav>
    </div>
    <section>
        <?php
        if (isset($_GET["ruta"])) {
            if (
                $_GET["ruta"] == "registro" ||
                $_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "cliqueame" ||
                $_GET["ruta"] == "tareas" ||
                $_GET["ruta"] == "editar" ||
                $_GET["ruta"] == "salir"
            ) {
                include "paginas/" . $_GET["ruta"] . ".php";
            } else {
                include "paginas/error404.php";
            }
        } else {
            include "paginas/inicio.php";
        }
        ?>
    </section>

    <div class="divider-gradient gradient-rainbow"></div>
    <footer class="footer-item">
        <p><?php echo "Hoy es: " . date('d-m-y') . "."; ?> PROYECTO FINAL PHP, MARTINEZ JUNO</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="vistas/js/script.js"></script>
</body>

</html>