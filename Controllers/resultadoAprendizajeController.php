<?php
require_once '../Models/ResultadoAprendizajeManager.php';

$manager = new ResultadoAprendizajeManager();
$action = $_GET['action'] ?? 'listarPorAsignatura';

switch ($action) {
    case 'listarPorAsignatura':
        // Listar Resultados de Aprendizaje por Asignatura
        $id_asignatura = $_GET['id_asignatura'] ?? null;

        if (!$id_asignatura) {
            die("Error: ID de asignatura no válido.");
        }

        $resultados = $manager->readBySubject($id_asignatura);
        include '../View/ResultadosView.php';
        break;

    case 'agregar':
        // Agregar un nuevo Resultado de Aprendizaje
        $id_asignatura = $_GET['id_asignatura'] ?? null;

        if (!$id_asignatura) {
            die("Error: ID de asignatura no válido.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $codigo = (int) $_POST['codigo'];

            $resultado = new ResultadoAprendizaje();
            $resultado->setNombre($nombre);
            $resultado->setCodigo($codigo);
            $resultado->setId_asignatura($id_asignatura);

            $manager->create($resultado);

            // Redirigir a la lista de RA de la asignatura
            header("Location: ../Controllers/ResultadoAprendizajeController.php?action=listarPorAsignatura&id_asignatura=$id_asignatura&nombre_asignatura=" . urlencode($nombre_asignatura));
            exit;
        } else {
            include '../View/nuevo_resultado.php';
        }
        break;

    case 'editar':
        // Editar un Resultado de Aprendizaje
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $id_asignatura = $_POST['id_asignatura'] ?? null;
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $codigo = (int) $_POST['codigo'];

            if (!$id || !$id_asignatura) {
                die("Error: Datos inválidos.");
            }

            $fields = ['nombre' => $nombre, 'codigo' => $codigo];
            $manager->update($id, $fields);

            // Redirigir a la lista de RA de la asignatura
            header("Location: ../Controllers/ResultadoAprendizajeController.php?action=listarPorAsignatura&id_asignatura=$id_asignatura&nombre_asignatura=" . urlencode($nombre_asignatura));
            exit;
        } else {
            $id = $_GET['id'] ?? null;
            $id_asignatura = $_GET['id_asignatura'] ?? null;

            if (!$id || !$id_asignatura) {
                die("Error: ID no válido.");
            }

            $resultado = $manager->read($id);
            include '../View/editar_resultado.php';
        }
        break;

    case 'eliminar':
        // Eliminar un Resultado de Aprendizaje
        $id = $_GET['id'] ?? null;
        $id_asignatura = $_GET['id_asignatura'] ?? null;

        if (!$id || !$id_asignatura) {
            die("Error: Datos inválidos.");
        }

        $manager->delete($id);

        // Redirigir a la lista de RA de la asignatura
        header("Location: ../Controllers/ResultadoAprendizajeController.php?action=listarPorAsignatura&id_asignatura=$id_asignatura&nombre_asignatura=" . urlencode($nombre_asignatura));
        exit;
    
    default:
        echo "Acción no válida.";
        break;
}
?>
