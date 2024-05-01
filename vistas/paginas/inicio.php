<?php
$ingreso = new ControladorFormularios();
$ingreso->ctrIngreso();
?>
 <header class="title-block">
        <h1 class="heading">log<span class="text-span">in</span></h1>
    </header>
    <main>
        <div class="section">
            <div class="wrap">
                <form method="post">
                    <div class="fields-wrap">
                        <input type="email" class="text-field w-input" maxlength="50" name="ingresoEmail" placeholder="email" id="ingresoEmail" required="">
                        <input type="password" class="text-field password w-input" maxlength="50" name="ingresoPassword" placeholder="********" id="ingresoPassword">
                        <?php
                        if ($ingreso == "ok") {
                            echo '<script> 
                    if (window.history.replaceState){
                    window.history.replaceState(null,null, window.location.href);
                    }
                    </script>';

                            echo '<div class="alerta alerta-exito"> ingresaste con exito. </div>';
                        }
                        if ($ingreso == "error") {
                            echo '<script> 
                if (window.history.replaceState){
                    window.history.replaceState(null,null, window.location.href);
                }
                </script>';

                            echo '<div class="alerta alerta-danger">error, chequea de nuevo o comunicate con el administrador. </div>';
                        }
                        ?>
                        <input type="submit" value="login" class="button">
                    </div>
                </form>
            </div>
        </div>
        <div class="spacer-96"></div>
        <div class="spacer-96"></div>
        <div class="spacer-96"></div>
    </main>