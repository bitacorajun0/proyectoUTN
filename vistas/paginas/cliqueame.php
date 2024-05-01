<?php
if (!isset($_SESSION["validarIngreso"]) || $_SESSION["validarIngreso"] !== "ok") {
    echo '<script>window.location = "index.php?ruta=ingreso";</script>';
    return;
} else {
    if ($_SESSION["validarIngreso"] != "ok") {
        echo '<script>window.location = "index.php?ruta=ingreso";</script>';
        return;
    }
}
?>
<header class="title-block">
    <h1 class="heading">agrega <span class="text-span">tareas</span></h1>
</header>
<main>
    <!-- <div class="prueba"> <h1> test</h1></div> -->
    <div class="pricing-section">
        <div class="container-agregar">
            <div class="pricing-wrap-agregar">
                <div class="pricing-card">
                    <form class="" method="post">
                        <div class="pricing-details-wrap">
                            <input type="text" name="titulo_tarea" placeholder="titulo de la tarea" required class="text-field w-input">
                        </div>
                        <div class="pricing-check-wrap">
                            <div class="pricing-check">
                                <textarea name="tarea" placeholder="comentario" required class="text-field w-input"></textarea>
                            </div>
                        </div>
                        <?php
                        $rta = new ControladorFormularios();
                        $rta->ctrAgregarTarea();
                        if ($rta == "ok") {
                            echo '<script> 
                    if (window.history.replaceState){
                    window.history.replaceState(null,null, window.location.href);
                    }
                    </script>';

                            echo '<div class="alerta alerta-exito"> te registraste con exito. </div>';
                        }
                        if ($rta == "error") {
                            echo '<script> 
                if (window.history.replaceState){
                    window.history.replaceState(null,null, window.location.href);
                }
                </script>';
                            echo '<div class="alerta alerta-danger"> error, comunicate con el administrador. </div>';
                        }
                        ?>
                        <input type="hidden" name="estado" value="pendiente">
                        <button type="submit" class="button">agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-96"></div>
    <div class="spacer-96"></div>
</main>