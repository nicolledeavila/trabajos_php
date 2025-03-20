<html>

<head>
  <title>editar</title>
  <link rel="stylesheet" href="./css/edit.css">
</head>

<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "root", "mascota") 
        or die("Problemas con la conexión");

    if (isset($_GET['code'])) {
        $code = mysqli_real_escape_string($conn, $_GET['code']);
        $query = mysqli_query($conn, "SELECT * FROM mascota WHERE code='$code'");

        if ($reg = mysqli_fetch_array($query)) {
    ?>

    <form action="actualizar.php" method="POST">
        <input type="hidden" name="code" value="<?php echo $reg['code']; ?>">
        Mascota: <input type="text" name="mascota" value="<?php echo $reg['mascota']; ?>" required><br>
        Edad: <input type="number" name="edad" value="<?php echo $reg['edad']; ?>" required><br>
        Raza: <input type="text" name="raza" value="<?php echo $reg['raza']; ?>" required><br>
        Fecha: <input type="date" name="fecha" value="<?php echo $reg['fecha']; ?>" required><br>
        Hora: <input type="time" name="hora" value="<?php echo $reg['hora']; ?>" required><br>
        Amo: <input type="text" name="amo" value="<?php echo $reg['amo']; ?>" required><br>
        <button type="submit">Actualizar Cita</button>
    </form>

    <?php
        } else {
            echo "❌ No se encontró la cita.";
        }
    } else {
        echo "❌ No se proporcionó un código válido.";
    }

    mysqli_close($conn);
    ?>

</body>



