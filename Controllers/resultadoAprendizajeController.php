<?php
require_once '../Models/ResultadoManager.php';

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
        include '../Views/resultados_asignatura.php';
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

            // Redirigir de nuevo a la lista de RA de la asignatura
            header("Location: ../Controllers/ResultadoController.php?action=listarPorAsignatura&id_asignatura=$id_asignatura");
            exit;
        } else {
            include '../Views/nuevo_resultado.php';
        }
        break;

    default:
        echo "Acción no válida.";
        break;
}
?>
