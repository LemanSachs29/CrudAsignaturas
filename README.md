CRUD de Asignaturas con Resultados de Aprendizaje y Criterios de Evaluación

📌 Descripción del Proyecto

Este proyecto consiste en una aplicación web para la gestión de asignaturas, sus resultados de aprendizaje y los criterios de evaluación asociados. Está desarrollado en PHP puro, siguiendo la arquitectura Modelo-Vista-Controlador (MVC) y utilizando MySQL como base de datos. La interfaz está diseñada con Bootstrap.

📂 Estructura del Proyecto

/CrudAsignaturas
│── /Controllers
│    ├── AsignaturaController.php
│    ├── ResultadoAprendizajeController.php
│    ├── CriterioEvaluacionController.php
│── /Models
│    ├── Database.php
│    ├── Asignatura.php
│    ├── AsignaturaManager.php
│    ├── ResultadoAprendizaje.php
│    ├── ResultadoAprendizajeManager.php
│    ├── CriterioEvaluacion.php
│    ├── CriterioEvaluacionManager.php
│── /View
│    ├── asignaturasView.php
│    ├── nuevo_asignatura.php
│    ├── editar_asignatura.php
│    ├── resultadosView.php
│    ├── nuevo_resultado.php
│    ├── editar_resultado.php
│    ├── criteriosView.php
│    ├── nuevo_criterio.php
│    ├── editar_criterio.php
│── /SQL
│    ├── gestion_academica.sql
│── index.php
│── .gitignore
│── README.md

🛠️ Tecnologías Utilizadas

PHP 8.x

MySQL

Bootstrap 5.3

XAMPP (para pruebas locales)

🏗️ Funcionalidades Implementadas

🔹 Módulo de Asignaturas

✔ Listado de asignaturas con opciones de editar, eliminar y ver resultados de aprendizaje.
✔ Agregar nuevas asignaturas.
✔ Edición de asignaturas existentes.
✔ Eliminación de asignaturas.

🔹 Módulo de Resultados de Aprendizaje

✔ Cada asignatura tiene múltiples resultados de aprendizaje.
✔ Listado de resultados de aprendizaje con opciones de editar, eliminar y ver criterios de evaluación.
✔ Agregar nuevos resultados de aprendizaje.
✔ Edición y eliminación de resultados de aprendizaje.

🔹 Módulo de Criterios de Evaluación

✔ Cada resultado de aprendizaje tiene varios criterios de evaluación.
✔ Listado de criterios de evaluación con opciones de editar y eliminar.
✔ Agregar nuevos criterios de evaluación.
✔ Edición y eliminación de criterios de evaluación.

🔀 Navegación y Enrutamiento

El enrutamiento se maneja mediante parámetros en la URL (GET), permitiendo acciones como:

?action=listar
?action=agregar
?action=editar&id=1
?action=eliminar&id=1

Cada Controlador maneja las solicitudes y redirige a la Vista correspondiente, asegurando la correcta interacción con el Modelo.

📝 Notas Importantes

Se han utilizado formularios con POST para el envío de datos.

Se han implementado validaciones básicas en los formularios para evitar datos vacíos o inválidos.

Se han corregido errores de redirección para conservar los parámetros en la URL tras agregar, editar o eliminar elementos.

Se ha optimizado la seguridad con htmlspecialchars() y trim() para evitar inyección de código en los formularios.

📌 Cómo Ejecutar el Proyecto

1️⃣ Descargar o clonar el repositorio

git clone https://github.com/tu-usuario/CrudAsignaturas.git

2️⃣ Importar la base de datos

Abrir phpMyAdmin o MySQL Workbench.

Crear una base de datos (gestion_academica).

Importar el archivo SQL/gestion_academica.sql.

3️⃣ Configurar la conexión a la base de datos

Modificar Database.php con los datos correctos:

private static $host = "localhost";
private static $dbname = "gestion_academica";
private static $user = "root";
private static $pass = "";

4️⃣ Ejecutar el proyecto en XAMPP o un servidor local

Iniciar Apache y MySQL en XAMPP.

Abrir en el navegador:

http://localhost/CrudAsignaturas/index.php

🚀 Mejoras Futuras

✅ Implementar un enrutador más eficiente en lugar de manejar las rutas manualmente con GET.
✅ Agregar un sistema de autenticación para restringir acceso a los módulos.
✅ Implementar AJAX y Fetch API para mejorar la experiencia de usuario.
✅ Agregar mensajes de éxito/error tras cada operación CRUD.
✅ Optimizar la seguridad con prepared statements y tokens CSRF.

📌 Contribución

Si deseas mejorar este proyecto, puedes hacer un fork y enviar un Pull Request.

💡 ¡Gracias por revisar este proyecto! 😃

