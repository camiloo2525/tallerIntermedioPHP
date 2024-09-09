<!-- index.php (Vista) -->
<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Cálculo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Calculadora de IMC y Conversión de Kilómetros a Millas</h1>

    <form method="POST" action="index.php">
        <div class="mb-3">
            <label class="form-label">Coloca tu peso en kilos:</label>
            <input type="number" name="peso" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Coloca tu altura en metros:</label>
            <input type="number" name="altura" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Coloca los kilómetros para convertir a millas:</label>
            <input type="number" name="kilometros" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Coloca tu correo electrónico</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            
            <button type="submit" name="accion" value="calcular" class="btn btn-primary">Calcular</button>
            <button type="submit" name="accion" value="generar_pdf" class="btn btn-secondary">Generar PDF</button>
            <button type="submit" name="accion" value="calcular_y_enviar_correo" class="btn btn-success">Calcular y Enviar Correo</button>
        </div>
    </form>

    <?php if (isset($resultado)) : ?>
        <div class="mt-4">
            <h2>Resultados:</h2>
            <p><strong>IMC:</strong> <?php echo $resultado['IMC']; ?></p>
            <p><strong>Kilómetros a millas:</strong> <?php echo $resultado['Conversion']; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>


