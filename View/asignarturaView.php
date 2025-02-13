<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Asignaturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Gestión de Asignaturas</h2>

        <a href="../Controllers/AsignaturaController.php?action=agregar" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Nueva Asignatura
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
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
                                <a href="../Controllers/ResultadoController.php?action=listarPorAsignatura&id_asignatura=<?= $asignatura->getIdAsignatura() ?>&nombre_asignatura=<?= urlencode($asignatura->getNombre()) ?>"
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

    <!-- Bootstrap Icons (Opcional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</body>

</html>