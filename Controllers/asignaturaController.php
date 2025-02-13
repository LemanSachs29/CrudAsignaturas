<?php
require_once '../Models/AsignaturaManager.php';

$manager = new AsignaturaManager();
$action = $_GET['action'] ?? 'listar';

switch ($action) {
    case 'listar':
        $asignaturas = $manager->readAll();

        if ($asignaturas === null) {
            echo "No hay asignaturas para listar.";
        }else {
            include './../View/asignarturaView.php';
        }
        break;

    case 'agregar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $equivalencia = htmlspecialchars(trim($_POST['equivalenciaECTS']));
            $codigo = htmlspecialchars(trim($_POST['codigo']));
            $horas = htmlspecialchars(trim($_POST['horas']));

            $asignatura = new Asignatura();
            $asignatura->setNombre($nombre);
            $asignatura->setEquivalenciaEcts($equivalencia);
            $asignatura->setCodigo($codigo);
            $asignatura->setHoras($horas);

        
            $manager->create($asignatura);
            header('Location: ../Controllers/AsignaturaController.php?action=listar');
            exit;
        } else {
            include '../View/nueva_asignatura.php';
        }
        break;

    case 'editar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id === null) {
                die("Error: ID no válido.");
            }

            $fields = [];

            //Validar y agregar los campos que no están vacíos
            if (!empty($_POST['nombre'])) {
                $fields['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            }
            if (!empty($_POST['equivalencia_ects'])) {
                $fields['equivalencia_ects'] = (int) $_POST['equivalencia_ects'];
            }
            if (!empty($_POST['codigo'])) {
                $fields['codigo'] = (int) $_POST['codigo'];
            }
            if (!empty($_POST['horas'])) {
                $fields['horas'] = (int) $_POST['horas'];
            }

            //Solamente se ejecuta el método si hay campos que acutalizar
            if (!empty($fields)) {
                $manager->update($id, $fields);
            }

            header('Location: ../Controllers/AsignaturaController.php?action=listar');
            exit;
        } else {
            $asignatura = $manager->read($_GET['id']);
            include '../View/editar_asignatura.php';
        }
        break;

    case 'eliminar':
        $manager->delete($_GET['id']);
        header('Location: ../Controllers/AsignaturaController.php?action=listar');
        exit; 
}
?>
