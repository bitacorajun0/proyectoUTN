# Proyecto de Evaluación Final Integradora

Este proyecto consiste en una aplicación web que contiene varias secciones relacionadas con un tema específico. La aplicación se conecta a una base de datos y utiliza PHP nativo orientado a objetos siguiendo el patrón de diseño MVC (Modelo-Vista-Controlador).

## Estructura del Proyecto

El árbol de directorios del proyecto es el siguiente:

proyecto/
├── ajax/
│ └── formularios.ajax.php
├── controladores/
│ ├── formularios.controlador.php
│ └── plantilla.controlador.php
├── css/
│ └── estilos.css
├── index.php
├── modelos/
│ ├── conexion.php
│ └── formularios.modelo.php
└── vistas/
├── js/
│ └── script.js
└── paginas/
├── cliqueame.php
├── editar.php
├── error404.php
├── inicio.php
├── registro.php
├── salir.php
└── tareas.php
├── plantilla.php


## Lógica del Proyecto

El proyecto consta de las siguientes características:

- **Registro de Usuarios**: Los usuarios pueden registrarse en la aplicación proporcionando un nombre de usuario, correo electrónico y contraseña.
- **Inicio de Sesión**: Los usuarios pueden iniciar sesión utilizando su correo electrónico y contraseña.
- **Agregar Tareas**: Los usuarios pueden agregar nuevas tareas a su lista.
- **Editar Tareas**: Los usuarios pueden editar las tareas existentes.
- **Eliminar Tareas**: Los usuarios pueden eliminar las tareas existentes.
- **Cambiar Estado de Tareas**: Los usuarios pueden marcar las tareas como finalizado o pendiente.
- **Validación de Correo Electrónico**: Se realiza una validación en tiempo real del correo electrónico ingresado durante el registro para evitar duplicados en la base de datos.

## Herramientas Utilizadas

- **PHP**: Se utiliza PHP nativo orientado a objetos.
- **MySQL**: MySQL: Se conecta a una base de datos MySQL utilizando la extensión PDO (PHP Data Objects).
- **HTML/CSS/JavaScript**: Se utilizan para la estructura, estilo y funcionalidad de la interfaz de usuario.
- **jQuery**: Se utiliza para realizar solicitudes AJAX en tiempo real para la validación del correo electrónico.
- **Patrón MVC**: Se sigue el patrón Modelo-Vista-Controlador para una mejor organización del código y la separación de las responsabilidades.

