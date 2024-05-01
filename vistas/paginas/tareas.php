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
$tareas = ControladorFormularios::ctrSeleccionarTareas(null, null);
// Llamada al método para eliminar tarea
$eliminar = new ControladorFormularios();
$eliminar->ctrEliminarTarea();
// Llamada al método para cambiar el estado de la tarea
$actualizar = new ControladorFormularios();
$actualizar->ctrCambiarEstadoTarea();
?>
<header class="title-block">
    <h1 class="heading">panel de <span class="text-span">tareas</span></h1>
</header>
<main>
    <div class="pricing-section">
        <div class="container">
            <div class="pricing-wrap">
                <?php foreach ($tareas as $tarea) : ?>
                    <div class="pricing-column">
                        <div class="pricing-card">
                        <div class="pricing-details-wrap">
                            <h3 class="pricing-h3"><?php echo $tarea['estado']; ?></h3>
                            <div class="date"><?php echo $tarea['fecha']; ?></div>
                            </div>
                            
                            <div class="pricing"><?php echo $tarea['titulo_tarea']; ?></div>
                            <div class="pricing-check-wrap">
                                <div class="pricing-check">
                                    <p class="pricing-text"><?php echo $tarea['tarea']; ?></p>
                                </div>
                            </div>
                            <div class="button-container">
                                <div>
                                    <form class="" method="post">
                                        <input type="hidden" value="<?php echo $tarea["id"]; ?>" name="eliminarTarea">
                                        <button type="submit" class="button">eliminar</button>
                                    </form>
                                </div>
                                <div>
                                    <form class="" method="post">
                                        <input type="hidden" name="idTarea" value="<?php echo $tarea["id"]; ?>">
                                        <input type="hidden" name="nuevoEstado" value="<?php echo $tarea['estado'] === 'pendiente' ? 'finalizado' : 'pendiente'; ?>">
                                        <button type="submit" class="button">cambiar estado</button>
                                    </form>
                                </div>
                                <a href="index.php?ruta=editar&id=<?php echo $tarea["id"]; ?>" class="button buttonA">editar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="spacer-96"></div>
    <div class="spacer-96"></div>
</main>