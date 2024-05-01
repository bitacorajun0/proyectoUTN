<?php
class Conexion
{
    static public function conectar()
    {
        $link = new PDO(
            "mysql:host=localhost;port=3306;dbname=bdUTN",
            "root",
            "1234"
        );
        $link->exec("set names utf8");

        // Verificar si la tabla "tareas" existe, sino la creo
        $query = "CREATE TABLE IF NOT EXISTS tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo_tarea VARCHAR(50),
    tarea TEXT,
    estado ENUM('pendiente', 'finalizado'),
    fecha TIMESTAMP
)";
        $stmt = $link->prepare($query);
        $stmt->execute();

        // Verificar si la tabla "administradores" existe, sino la creo
        $queryAdmin = "CREATE TABLE IF NOT EXISTS administrador (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario VARCHAR(50),
            email VARCHAR(50),
            password VARCHAR(50)
        )";

        $stmtAdministradores = $link->prepare($queryAdmin);
        $stmtAdministradores->execute();

        return $link;
    }
}
