<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de RUT</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Validador de RUT</h1>
        <form method="post" class="mt-4">
            <div class="form-group">
                <label for="rut">Ingrese RUT (ej. 12.345.678-5)</label>
                <input type="text" class="form-control" id="rut" name="rut" required>
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Validar</button>
            <button type="submit" class="btn btn-secondary" name="format">Formatear</button>
        </form>
        <div class="mt-3">
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    try {
                        $rut = $_POST['rut'];
                        $validator = new RutValidator($rut);
                        $isValid = $validator->validar();
                        if (isset($_POST['validate'])) {
                            echo '<div class="alert alert-' . ($isValid ? 'success' : 'danger') . '">' . ($isValid ? 'RUT válido' : 'RUT inválido') . '</div>';
                        } elseif (isset($_POST['format']) && $isValid) {
                            echo '<div class="alert alert-success">RUT formateado: ' . $validator->formato() . '</div>';
                        } else {
                            echo '<div class="alert alert-danger">RUT inválido</div>';
                        }
                    } catch (Exception $e) {
                        echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
                    }
                }

                class RutValidator {
                    private $rut;
                    private $digitoVerificador;
                    private $esValido;

                    public function __construct($rut) {
                        $rut = preg_replace('/[^0-9kK]/', '', $rut); // Eliminar todos los caracteres no permitidos
                        $this->digitoVerificador = strtolower(substr($rut, -1)); // Obtiene el dígito verificador
                        $this->rut = substr($rut, 0, -1); // RUT sin el dígito verificador

                        if (!preg_match('/^\d+$/', $this->rut) || !preg_match('/^[0-9kK]$/', $this->digitoVerificador)) {
                            throw new Exception("RUT inválido: contiene caracteres no permitidos.");
                        }
                    }

                    public function validar() {
                        $numerosInvertidos = str_split(strrev($this->rut));
                        $acumulador = 0;
                        $multiplicador = 2;

                        foreach ($numerosInvertidos as $numero) {
                            $acumulador += intval($numero) * $multiplicador;
                            $multiplicador = ($multiplicador === 7) ? 2 : $multiplicador + 1;
                        }

                        $digitoVerificadorCalculado = 11 - ($acumulador % 11);
                        $digitoVerificadorCalculado = ($digitoVerificadorCalculado === 11) ? '0' : (($digitoVerificadorCalculado === 10) ? 'k' : (string) $digitoVerificadorCalculado);

                        $this->esValido = ($digitoVerificadorCalculado === $this->digitoVerificador);
                        return $this->esValido;
                    }

                    public function formato() {
                        if (!$this->esValido) {
                            return '';
                        }
                        return number_format($this->rut, 0, '', '.') . '-' . $this->digitoVerificador;
                    }
                }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
