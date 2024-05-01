<?php
require_once "conexion.php";
class ModeloFormularios
{
	// ------------------Insertar usuario nuevo-------------
	static public function mdlUser($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, email, password) VALUES (:usuario, :email, :password)");

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->closeCursor();
		$stmt = null;
	}

	// ------------------Seleccionar usuario-----------
	static public function mdlSeleccionarUsuario($tabla, $item, $valor)
	{
		$stmt = null;

		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
			$stmt->execute(); 
			$result = $stmt->fetchAll();
			$stmt->closeCursor(); 
			return $result; 
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch();
			$stmt->closeCursor();
			return $result;
		}
		$stmt = null;
	}

	// ------------------Insertar tarea-------------
	static public function mdlTarea($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo_tarea, tarea, estado, fecha) VALUES (:titulo_tarea, :tarea, :estado, :fecha)");

		$stmt->bindParam(":titulo_tarea", $datos["titulo_tarea"], PDO::PARAM_STR);
		$stmt->bindParam(":tarea", $datos["tarea"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->closeCursor();
		$stmt = null;
	}

	// ------------------Seleccionar tarea-----------
	static public function mdlSeleccionarTarea($tabla, $item, $valor)
	{
		$stmt = null;

		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");
			$stmt->execute();
			$result = $stmt->fetchAll(); 
			$stmt->closeCursor(); 
			return $result;
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch();
			$stmt->closeCursor();
			return $result;
		}
		$stmt = null;
	}
	// ------------------Actualizar tarea-----------
	static public function mdlActualizarTarea($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo_tarea=:titulo_tarea, tarea=:tarea WHERE id = :id");

		$stmt->bindParam(":titulo_tarea", $datos["titulo_tarea"], PDO::PARAM_STR);
		$stmt->bindParam(":tarea", $datos["tarea"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->closeCursor();
		$stmt = null;
	}

	// ------------------Eliminar tarea-----------
	static public function mdlEliminarTarea($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $valor, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->closeCursor();
		$stmt = null;
	}
	// ------------------ cambiar estado tarea -----------
	static public function mdlCambiarEstadoTarea($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado WHERE id = :id");

		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->closeCursor();
		$stmt = null;
	}
}
