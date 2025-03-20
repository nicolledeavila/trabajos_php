<html>

<head>
  <title>consulta</title>
  <link rel="stylesheet" href="css/cssB.css">
</head>

<body>
  <section>
    <nav>
     <h1>cita agendada</h1>
    </nav>
    <br>
    <article>
      <?php
        $conn = mysqli_connect("localhost", "root", "root", "mascota") or
          die("Problemas con la conexión");
        $code = $_POST['code'];
        $registros = mysqli_query($conn, "select code,mascota,edad,raza,fecha,hora,amo from mascota where code='$code'") or
        die("Problemas en el select:" . mysqli_error($conn));
          
        if ($reg = mysqli_fetch_array($registros)) {
          echo "<br>";
          echo "code: ". $reg["code"] ."<br>";
          echo "mascota: " . $reg['mascota'] . "<br>";
          echo "edad: " . $reg['edad'] . "<br>";
          echo "raza: " . $reg['raza'] . "<br>";
          echo "fecha: " . $reg['fecha'] . "<br>";
          echo "hora: " . $reg['hora'] . "<br>";
          echo "amo: " . $reg['amo'] . "<br>";
        } else {
          echo "No existe una mascota con ese id.";
        }
        mysqli_close($conn);

      ?>
    </article>
    <a href='borrar.php?code=<?php echo $code; ?>' onclick="return confirm('¿Estás seguro de borrar esta cita?');">
      <button style='background-color: red; color: white; padding: 10px; border: none; cursor: pointer;'>
          Borrar Cita
      </button>
    </a>

    <a href='editar.php?code=<?php echo $code; ?>'>
        <button style='background-color: blue; color: white; padding: 10px; border: none; cursor: pointer;'>
            Editar Cita
        </button>
    </a>

  </section>
  
  
</body>

</html>