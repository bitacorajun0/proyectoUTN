<?php
class ControladorFormularios
{
	/*---------------- Usuarios -------------------	 */
	static public function ctrRegistro()
	{
		if (isset($_POST["registroUsuario"])) {
			$tabla = "administrador";
			$datos = array(
				"usuario" => $_POST["registroUsuario"],
				"email" => $_POST["registroEmail"],
				"password" => $_POST["registroPassword"]
			);
			$respuesta = ModeloFormularios::mdlUser($tabla, $datos);
			return $respuesta;
		} else {
			$respuesta = "error";
			return $respuesta;
		}
	}

	// Ingreso usuario
	public function ctrIngreso()
	{
		if (isset($_POST["ingresoEmail"])) {
			$tabla = "administrador";
			$item = "email";
			$valor = $_POST["ingresoEmail"];
			$respuesta = ModeloFormularios::mdlSeleccionarUSuario($tabla, $item, $valor);

			if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
				$_SESSION["validarIngreso"] = "ok";
				echo '<script>
					if ( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					}
					window.location = "index.php?ruta=tareas";
				</script>';
			} else {
				echo '<script>
					if ( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					}
				</script>';
				echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
			}
		}
	}

	// Seleccionar usuarios
	static public function ctrSeleccionarUsuarios($item, $valor)
	{
		$tabla = "administrador";
		$respuesta = ModeloFormularios::mdlSeleccionarUsuario($tabla, $item, $valor);
		return $respuesta;
	}


	/*---------------- tareas -------------------	 */

	static public function ctrAgregarTarea()
	{
		if (isset($_POST["titulo_tarea"], $_POST["tarea"], $_POST["estado"])) {
			$tabla = "tareas";
			$fecha = date("Y-m-d H:i:s");
			$datos = array(
				"titulo_tarea" => $_POST["titulo_tarea"],
				"tarea" => $_POST["tarea"],
				"estado" => $_POST["estado"],
				"fecha" => $fecha
			);
			$respuesta = ModeloFormularios::mdlTarea($tabla, $datos);
			if ($respuesta == "ok") {
				echo '<script>window.location = "index.php?ruta=tareas";</script>';
			} else {
				echo '<div class="alert alert-danger">Error al agregar la tarea: ' . $respuesta . '</div>';
			}
		}
	}
	// Seleccionar tareas
	static public function ctrSeleccionarTareas($item, $valor)
	{
		$tabla = "tareas";
		$respuesta = ModeloFormularios::mdlSeleccionarTarea($tabla, $item, $valor);
		return $respuesta;
	}

	//sacar id para editar
	static public function ctrSeleccionarTareaPorId($id)
	{
		$tabla = "tareas";
		return ModeloFormularios::mdlSeleccionarTarea($tabla, "id", $id);
	}

	// Actualizar tarea
	static public function ctrActualizarTarea()
	{
		if (isset($_POST["titulo_tarea"], $_POST["tarea"], $_POST["idTarea"])) {
			$tabla = "tareas";
			$datos = array(
				"id" => $_POST["idTarea"],
				"titulo_tarea" => $_POST["titulo_tarea"],
				"tarea" => $_POST["tarea"],
				"estado" => $_POST["estadoTarea"]
			);
			$respuesta = ModeloFormularios::mdlActualizarTarea($tabla, $datos);
			if ($respuesta == "ok") {
				echo '<script>
					if ( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					}
					window.location = "index.php?ruta=tareas";
				</script>';
			} else {
				// Manejar el caso de que ocurra un error al actualizar la tarea
				echo '<div class="alerta alerta-danger">Error al actualizar la tarea</div>';
			}
		}
	}

	// Eliminar
	public function ctrEliminarTarea()
	{
		if (isset($_POST["eliminarTarea"])) {
			$tabla = "tareas";
			$valor = $_POST["eliminarTarea"];
			$respuesta = ModeloFormularios::mdlEliminarTarea($tabla, $valor);
			if ($respuesta == "ok") {
				echo '<script>
					if ( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					}
					window.location = "index.php?ruta=tareas";
				</script>';
			}
		}
	}
	// cambiar estado tarea
	public function ctrCambiarEstadoTarea()
	{
		if (isset($_POST["idTarea"], $_POST["nuevoEstado"])) {
			$tabla = "tareas";
			$datos = array(
				"id" => $_POST["idTarea"],
				"estado" => $_POST["nuevoEstado"]
			);
			//print_r($datos);
			$respuesta = ModeloFormularios::mdlCambiarEstadoTarea($tabla, $datos);
			//print_r($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?ruta=tareas";
            </script>';
			} else {
				echo '<script>
					if ( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					}
				</script>';
				echo '<div class="alert alert-danger">Error</div>';
				echo '<div class="alert alert-danger">' . $respuesta . '</div>';
				print_r($_POST);
			}
		}
	}
}
