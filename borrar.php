<html>

<head>
  <title>borrar</title>
  <link rel="stylesheet" href="./css/delete.css">
</head>

<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "root", "mascota") 
            or die("Problemas con la conexión");

        if (isset($_GET['code'])) {
            $code = mysqli_real_escape_string($conn, $_GET['code']);

            $delete = mysqli_query($conn, "DELETE FROM mascota WHERE code='$code'");

            if ($delete) {
                echo "✅ Cita eliminada con éxito.";
            } else {
                echo "❌ Error al eliminar la cita: " . mysqli_error($conn);
            }
        } else {
            echo "❌ No se proporcionó un código válido.";
        }

        mysqli_close($conn);
    ?>
    <br>
    <a href="index.html">Volver</a>

</body>

</html>