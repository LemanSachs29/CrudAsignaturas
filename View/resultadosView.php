<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Aprendizaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4e1d2; /* Fondo retro */
            font-family: 'Courier New', Courier, monospace; /* Tipografía retro */
        }
        .container {
            background-color: #fff3e6; /* Fondo del contenedor */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #d9534f; /* Color retro para el título */
            font-weight: bold;
        }
        .text-primary {
            color: #5bc0de !important; /* Color retro para el texto resaltado */
        }
        .btn-secondary {
            background-color: #6c757d; /* Color retro para botones */
            border-color: #5a6268;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-success {
            background-color: #5cb85c; /* Color retro para botones */
            border-color: #4cae4c;
        }
        .btn-success:hover {
            background-color: #4cae4c;
            border-color: #4cae4c;
        }
        .btn-warning {
            background-color: #f0ad4e; /* Color retro para botones */
            border-color: #eea236;
        }
        .btn-warning:hover {
            background-color: #eea236;
            border-color: #eea236;
        }
        .btn-danger {
            background-color: #d9534f; /* Color retro para botones */
            border-color: #d43f3a;
        }
        .btn-danger:hover {
            background-color: #d43f3a;
            border-color: #d43f3a;
        }
        .btn-info {
            background-color: #5bc0de; /* Color retro para botones */
            border-color: #46b8da;
        }
        .btn-info:hover {
            background-color: #46b8da;
            border-color: #46b8da;
        }
        .table {
            background-color: #fff; /* Fondo de la tabla */
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background-color: #d9534f; /* Color retro para el encabezado de la tabla */
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f5f5f5; /* Efecto hover en las filas */
        }
        .text-center {
            color: #6c757d; /* Color retro para el texto centrado */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Resultados de Aprendizaje - <span class="text-primary"><?= htmlspecialchars($_GET['nombre_asignatura']) ?></span></h2>

        <a href="../Controllers/AsignaturaController.php?action=listar" class="btn btn-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Volver a Asignaturas
        </a>

        <a href="../Controllers/ResultadoAprendizajeController.php?action=agregar&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>"
           class="btn btn-success mb-3">
            <i class="bi bi-plus-lg"></i> Agregar RA
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($resultados)): ?>
                        <?php foreach ($resultados as $resultado): ?>
                            <tr>
                                <td><?= $resultado->getId_resultado_aprendizaje() ?></td>
                                <td><?= $resultado->getNombre() ?></td>
                                <td><?= $resultado->getCodigo() ?></td>
                                <td>
                                    <a href="../Controllers/ResultadoAprendizajeController.php?action=editar&id=<?= $resultado->getId_resultado_aprendizaje() ?>&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>"
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <a href="../Controllers/ResultadoAprendizajeController.php?action=eliminar&id=<?= $resultado->getId_resultado_aprendizaje() ?>&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Seguro que deseas eliminar este resultado de aprendizaje?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                    <a href="../Controllers/CriterioEvaluacionController.php?action=listarPorResultado&id_resultado_aprendizaje=<?= $resultado->getId_resultado_aprendizaje() ?>&nombre_ra=<?= urlencode($resultado->getNombre()) ?>&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>"
                                       class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Ver Criterios
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay resultados de aprendizaje registrados para esta asignatura.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>