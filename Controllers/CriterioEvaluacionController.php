<?php
require_once './../Models/CriterioEvaluacionManager.php';

$manager = new CriterioEvaluacionManager();
$action = $_GET['action'] ?? 'listarPorResultado';

switch ($action) {
    case 'listarPorResultado':
        // Listar Criterios de Evaluación por Resultado de Aprendizaje
        $id_resultado_aprendizaje = $_GET['id_resultado_aprendizaje'] ?? null;
        $nombre_ra = $_GET['nombre_ra'] ?? 'Sin Nombre';

        if (!$id_resultado_aprendizaje) {
            die("Error: ID de resultado de aprendizaje no válido.");
        }

        $criterios = $manager->readByRA($id_resultado_aprendizaje);
        include '../View/CriteriosView.php';
        break;

    case 'agregar':
        // Agregar un nuevo Criterio de Evaluación
        $id_resultado_aprendizaje = $_GET['id_resultado_aprendizaje'] ?? null;
        $nombre_ra = $_GET['nombre_ra'] ?? 'Sin Nombre';

        if (!$id_resultado_aprendizaje) {
            die("Error: ID de resultado de aprendizaje no válido.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descripcion = htmlspecialchars(trim($_POST['descripcion']));
            $orden = (int) $_POST['orden'];

            $criterio = new CriterioEvaluacion();
            $criterio->setDescripcion($descripcion);
            $criterio->setOrden($orden);
            $criterio->setId_resultado_aprendizaje($id_resultado_aprendizaje);

            $manager->create($criterio);

            // Redirigir a la lista de Criterios de Evaluación del RA
            header("Location: ../Controllers/CriterioEvaluacionController.php?action=listarPorResultado&id_resultado_aprendizaje=$id_resultado_aprendizaje&nombre_ra=" . urlencode($nombre_ra) . "&id_asignatura=$id_asignatura&nombre_asignatura=" . urlencode($nombre_asignatura));
            exit;
        } else {
            include '../View/nuevo_criterio.php';
        }
        break;

    case 'editar':
        // Editar un Criterio de Evaluación
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $id_resultado_aprendizaje = $_POST['id_resultado_aprendizaje'] ?? null;
            $nombre_ra = $_POST['nombre_ra'] ?? 'Sin Nombre';
            $descripcion = htmlspecialchars(trim($_POST['descripcion']));
            $orden = (int) $_POST['orden'];

            if (!$id || !$id_resultado_aprendizaje) {
                die("Error: Datos inválidos.");
            }

            $fields = ['descripcion' => $descripcion, 'orden' => $orden];
            $manager->update($id, $fields);

            // Redirigir a la lista de Criterios de Evaluación del RA
            header("Location: ../Controllers/CriterioEvaluacionController.php?action=listarPorResultado&id_resultado_aprendizaje=$id_resultado_aprendizaje&nombre_ra=" . urlencode($nombre_ra) . "&id_asignatura=$id_asignatura&nombre_asignatura=" . urlencode($nombre_asignatura));
            exit;
        } else {
            $id = $_GET['id'] ?? null;
            $id_resultado_aprendizaje = $_GET['id_resultado_aprendizaje'] ?? null;
            $nombre_ra = $_GET['nombre_ra'] ?? 'Sin Nombre';

            if (!$id || !$id_resultado_aprendizaje) {
                die("Error: ID no válido.");
            }

            $criterio = $manager->read($id);
            include '../View/editar_criterio.php';
        }
        break;

    case 'eliminar':
        // Eliminar un Criterio de Evaluación
        $id = $_GET['id'] ?? null;
        $id_resultado_aprendizaje = $_GET['id_resultado_aprendizaje'] ?? null;
        $nombre_ra = $_GET['nombre_ra'] ?? 'Sin Nombre';

        if (!$id || !$id_resultado_aprendizaje) {
            die("Error: Datos inválidos.");
        }

        $manager->delete($id);

        // Redirigir a la lista de Criterios de Evaluación del RA
        header("Location: ../Controllers/CriterioEvaluacionController.php?action=listarPorResultado&id_resultado_aprendizaje=$id_resultado_aprendizaje&nombre_ra=" . urlencode($nombre_ra) . "&id_asignatura=$id_asignatura&nombre_asignatura=" . urlencode($nombre_asignatura));
        exit;
    
    default:
        echo "Acción no válida.";
        break;
}


?>
