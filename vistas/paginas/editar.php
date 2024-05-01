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
if (isset($_GET["id"])) {
    $item = "id";
    $valor = $_GET["id"];
    $tarea = ControladorFormularios::ctrSeleccionarTareas($item, $valor);
}
$actualizar = new ControladorFormularios();
$actualizar->ctrActualizarTarea();
?>

<header class="title-block">
    <h1 class="heading">edita tu <span class="text-span">tarea</span></h1>
</header>
<main>
    <div class="pricing-section">
        <div class="container-agregar">
            <div class="pricing-wrap-agregar">
                <div class="pricing-card">
                    <form class="" method="post">
                        <div class="pricing-details-wrap">
                            <input class="text-field w-input" type="text" name="titulo_tarea" value="<?php echo isset($tarea['titulo_tarea']) ? $tarea['titulo_tarea'] : ''; ?>" required>
                        </div>
                        <div class="pricing-check-wrap">
                            <div class="pricing-check">
                                <textarea class="text-field w-input" name="tarea" required><?php echo isset($tarea['tarea']) ? $tarea['tarea'] : ''; ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="estadoTarea" value="<?php echo isset($tarea['estado']) ? $tarea['estado'] : ''; ?>">
                        <input type="hidden" name="idTarea" value="<?php echo isset($tarea['id']) ? $tarea['id'] : ''; ?>">
                        <div class="button-container">
                            <button type="submit" class="button">confirmar</button>
                            <a href="index.php?ruta=tareas" class="button buttonA">cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-96"></div>
    <div class="spacer-96"></div>
</main>