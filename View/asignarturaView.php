<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Asignaturas</title>
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
        .btn-primary {
            background-color: #5cb85c; /* Color retro para botones */
            border-color: #4cae4c;
        }
        .btn-primary:hover {
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Gestión de Asignaturas</h2>

        <a href="../Controllers/AsignaturaController.php?action=agregar" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Nueva Asignatura
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Equivalencia ECTS</th>
                        <th>Horas</th>
                        <th>Código</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asignaturas as $asignatura): ?>
                        <tr>
                            <td><?= $asignatura->getIdAsignatura() ?></td>
                            <td><?= $asignatura->getNombre() ?></td>
                            <td><?= $asignatura->getEquivalenciaEcts() ?></td>
                            <td><?= $asignatura->getHoras(); ?></td>
                            <td><?= $asignatura->getCodigo() ?></td>
                            <td>
                                <a href="../Controllers/AsignaturaController.php?action=editar&id=<?= $asignatura->getIdAsignatura() ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <a href="../Controllers/AsignaturaController.php?action=eliminar&id=<?= $asignatura->getIdAsignatura() ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta asignatura?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </a>
                                <a href="../Controllers/ResultadoAprendizajeController.php?action=listarPorAsignatura&id_asignatura=<?= $asignatura->getIdAsignatura() ?>&nombre_asignatura=<?= urlencode($asignatura->getNombre()) ?>"
                                    class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Ver RA
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>