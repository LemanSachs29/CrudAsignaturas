<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Resultado de Aprendizaje</title>
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
        .form-label {
            color: #5bc0de; /* Color retro para las etiquetas */
            font-weight: bold;
        }
        .form-control {
            background-color: #fff; /* Fondo de los inputs */
            border: 1px solid #d9534f; /* Borde retro */
            border-radius: 5px;
            color: #333; /* Color del texto */
        }
        .form-control:focus {
            border-color: #5bc0de; /* Color del borde al enfocar */
            box-shadow: 0 0 5px rgba(91, 192, 222, 0.5); /* Sombra al enfocar */
        }
        .btn-success {
            background-color: #5cb85c; /* Color retro para botones */
            border-color: #4cae4c;
        }
        .btn-success:hover {
            background-color: #4cae4c;
            border-color: #4cae4c;
        }
        .btn-secondary {
            background-color: #6c757d; /* Color retro para botones */
            border-color: #5a6268;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Resultado de Aprendizaje</h2>

        <form action="../Controllers/ResultadoAprendizajeController.php?action=editar&id=<?= $resultado->getId_resultado_aprendizaje() ?>&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>" method="POST">
            
            <!-- 🔥 Input oculto para mantener el ID del resultado de aprendizaje -->
            <input type="hidden" name="id" value="<?= $resultado->getId_resultado_aprendizaje() ?>">
            
            <!-- 🔥 Input oculto para mantener el ID de la asignatura asociada -->
            <input type="hidden" name="id_asignatura" value="<?= $_GET['id_asignatura'] ?>">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Resultado de Aprendizaje</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $resultado->getNombre() ?>" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="number" class="form-control" id="codigo" name="codigo" value="<?= $resultado->getCodigo() ?>" min="1" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
            <a href="../Controllers/ResultadoAprendizajeController.php?action=listarPorAsignatura&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>