<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asignatura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Editar Asignatura</h2>
    <form action="../Controllers/AsignaturaController.php?action=editar" method="POST">

    <input type="hidden" name="id" value="<?= $asignatura->getIdAsignatura() ?>">
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la asignatura</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="equivalencia_ects" class="form-label">Equivalencia ECTS</label>
            <input type="number" class="form-control" id="equivalencia_ects" name="equivalenciaECTS" min="0">
        </div>

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo">
        </div>

        <div class="mb-3">
            <label for="horas" class="form-label">Horas</label>
            <input type="number" class="form-control" id="horas" name="horas" min="1">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="../Controllers/AsignaturaController.php?action=listar" class="btn btn-secondary">Cancelar</a>
        
    </form>
</div>

</body>
</html>