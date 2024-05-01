    <header class="title-block">
        <h1 class="heading">registrate<span class="text-span">!</span></h1>
    </header>
    <main>
        <div class="section">
            <div class="wrap">
                <form method="post" class="">
                    <div class="fields-wrap">
                        <label class="field-label">indica tus datos para registrarte</label>
                        <input type="text" class="text-field w-input" name="registroUsuario" placeholder="usuario" id="registroUsuario" required="" />
                        <input type="email" class="text-field w-input" name="registroEmail" placeholder="email@email.com" id="registroEmail" required="" />
                        <input type="password" class="text-field password w-input" name="registroPassword" placeholder="********" id="registroPassword" />
                    
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $registro = ControladorFormularios::ctrRegistro();
                        if ($registro == "ok") {
                            echo '<script> 
                    if (window.history.replaceState){
                    window.history.replaceState(null,null, window.location.href);
                    }
                    </script>';

                            echo '<div class="alerta alerta-exito"> te registraste con exito, logueate para iniciar. </div>';
                        } elseif ($registro == "error") {
                            echo '<script> 
                if (window.history.replaceState){
                    window.history.replaceState(null,null, window.location.href);
                }
                </script>';
                            echo '<div class="alerta alerta-danger"> error, comunicate con el administrador. </div>';
                        }
                    }
                    ?>
                    <input type="submit" value="enviar" class="button" />
                    </div>
                </form>
            </div>
        </div>
        <div class="spacer-96"></div>
        <div class="spacer-96"></div>
    </main>