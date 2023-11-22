<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>

<?php
    // Variables para almacenar los números y el resultado
    $numero1 = $numero2 = $resultado = "";
    // Variable para almacenar la operación
    $operacion = "";

    // Verifica si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los valores del formulario
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $operacion = $_POST["operacion"];

        // Realiza la operación correspondiente
        switch ($operacion) {
            case "sumar":
                $resultado = $numero1 + $numero2;
                break;
            case "restar":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicar":
                $resultado = $numero1 * $numero2;
                break;
            case "dividir":
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Error: No se puede dividir por cero.";
                }
                break;
            default:
                $resultado = "Operación no válida.";
        }
    }
?>

<h2>Calculadora PHP</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Número 1: <input type="text" name="numero1" value="<?php echo $numero1; ?>"><br>
    Número 2: <input type="text" name="numero2" value="<?php echo $numero2; ?>"><br>
    Operación:
    <select name="operacion">
        <option value="sumar" <?php if($operacion == 'sumar') echo 'selected'; ?>>Sumar</option>
        <option value="restar" <?php if($operacion == 'restar') echo 'selected'; ?>>Restar</option>
        <option value="multiplicar" <?php if($operacion == 'multiplicar') echo 'selected'; ?>>Multiplicar</option>
        <option value="dividir" <?php if($operacion == 'dividir') echo 'selected'; ?>>Dividir</option>
    </select><br>
    <input type="submit" value="Calcular">
</form>

<?php
    // Muestra el resultado si está definido
    if ($resultado !== "") {
        echo "<p>El resultado de $operacion $numero1 y $numero2 es: $resultado</p>";
    }
?>

</body>
</html>
