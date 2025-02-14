<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Criterio de Evaluación</title>
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
        <h2 class="mb-4">Agregar Criterio de Evaluación - <span class="text-primary"><?= htmlspecialchars($_GET['nombre_ra']) ?></span></h2>

        <form action="../Controllers/CriterioEvaluacionController.php?action=agregar&id_resultado_aprendizaje=<?= $_GET['id_resultado_aprendizaje'] ?>&nombre_ra=<?= urlencode($_GET['nombre_ra']) ?>&id_asignatura=<?= $_GET['id_asignatura'] ?>&nombre_asignatura=<?= urlencode($_GET['nombre_asignatura']) ?>" method="POST">

            <!-- 🔥 Input oculto para mantener el ID del Resultado de Aprendizaje -->
            <input type="hidden" name="id_resultado_aprendizaje" value="<?= $_GET['id_resultado_aprendizaje'] ?>">

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Criterio de Evaluación</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <div class="mb-3">
                <label for="orden" class="form-label">Código</label>
                <input type="number" class="form-control" id="orden" name="orden" min="1" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="../Controllers/CriterioEvaluacionController.php?action=listarPorResultado&id_resultado_aprendizaje=<?= $_GET['id_resultado_aprendizaje'] ?>&nombre_ra=<?= urlencode($_GET['nombre_ra']) ?>" 
               class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>