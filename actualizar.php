<html>

<head>
  <title>borrar</title>
</head>

<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "root", "mascota") 
        or die("Problemas con la conexión");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = mysqli_real_escape_string($conn, $_POST['code']);
        $mascota = mysqli_real_escape_string($conn, $_POST['mascota']);
        $edad = mysqli_real_escape_string($conn, $_POST['edad']);
        $raza = mysqli_real_escape_string($conn, $_POST['raza']);
        $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
        $hora = mysqli_real_escape_string($conn, $_POST['hora']);
        $amo = mysqli_real_escape_string($conn, $_POST['amo']);

        $update = mysqli_query($conn, 
            "UPDATE mascota SET 
            mascota='$mascota', 
            edad='$edad', 
            raza='$raza', 
            fecha='$fecha', 
            hora='$hora', 
            amo='$amo' 
            WHERE code='$code'");

        if ($update) {
            echo "✅ Cita actualizada con éxito.";
        } else {
            echo "❌ Error al actualizar la cita: " . mysqli_error($conn);
        }
    } else {
        echo "❌ No se recibieron datos.";
    }

    mysqli_close($conn);
    ?>
<br>
<a href="index.html">Volver</a>

</body>