<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>info</title>
</head>

<body>

  <?php
    echo"su id es: ". htmlspecialchars($_REQUEST['code'] ?? '') . "<br>";
    echo "Su mascota es: " . htmlspecialchars($_REQUEST['mascota'] ?? '') . "<br>";
    echo "Su edad es: " . htmlspecialchars($_REQUEST['edad'] ?? '') . "<br><br>";
    echo "Su raza es: " . htmlspecialchars($_REQUEST['raza'] ?? '') . "<br>";
    echo "la fecha es: " . htmlspecialchars($_REQUEST['fecha'] ?? '') . "<br>";
    echo "la hora es: " . htmlspecialchars($_REQUEST['hora'] ?? '') . "<br>";
    echo "Su amo es: " . htmlspecialchars($_REQUEST['amo'] ?? '') . "<br>";

    // Convertir a número entero
    $edad = (int) $edad;
    $code = (int) $code;
    // Configurar reporte de errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $database = "mascota";
    $username = "root";
    $password = "root"; 

    // Crear la conexión
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Comprobar conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    echo "Conexión establecida con éxito<br>";

    // Verificar si la tabla existe
    $checkTable = mysqli_query($conn, "SHOW TABLES LIKE 'mascota'");
    if (mysqli_num_rows($checkTable) == 0) {
        die("Error: La tabla 'mascota' no existe en la base de datos.");
    }

    // Sanitización de datos
    $code = mysqli_real_escape_string($conn, $_REQUEST["code"]?? '');
    $mascota = mysqli_real_escape_string($conn, $_REQUEST['mascota'] ?? '');
    $edad = mysqli_real_escape_string($conn, $_REQUEST['edad'] ?? '');
    $raza = mysqli_real_escape_string($conn, $_REQUEST['raza'] ?? '');
    $fecha = mysqli_real_escape_string($conn, $_REQUEST['fecha'] ?? '');
    $hora = mysqli_real_escape_string($conn, $_REQUEST['hora'] ?? '');
    $amo = mysqli_real_escape_string($conn, $_REQUEST['amo'] ?? '');
    $edad=(int)$edad;

    $query = "INSERT INTO mascota (code,mascota, edad, raza, fecha, hora, amo) VALUES ('$code', '$mascota', '$edad', '$raza', '$fecha', '$hora', '$amo')";

    if (!mysqli_query($conn, $query)) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    echo "-------------------------------------------------------------------------------";
    echo "<br>";
    echo "<br>";

    $registros = mysqli_query($conn, "select code,mascota,edad,raza,fecha,hora,amo from mascota") or
    die("Problemas en el select:" . mysqli_error($conn));
    //------------------------------------------------------------------------------------//
  while ($reg = mysqli_fetch_array($registros)) {
    echo "<br>";
    echo "code". $reg["code"] ."<br>";
    echo "mascota: " . $reg['mascota'] . "<br>";
    echo "edad: " . $reg['edad'] . "<br>";
    echo "raza: " . $reg['raza'] . "<br>";
    echo "fecha: " . $reg['fecha'] . "<br>";
    echo "hora: " . $reg['hora'] . "<br>";
    echo "amo: " . $reg['amo'] . "<br>";
    echo "<br>";
    echo "<hr>";

    //texto de la consulta
    $ar = fopen("datos.txt", "a") or
    die("Problemas en la creacion");
    fwrite($ar,"code: " . $reg['code']. "\n");
    fwrite($ar, "mascota:" . $reg['mascota'] . "\n");
    fwrite($ar, "edad:" . $reg['edad'] . "\n");
    fwrite($ar, "raza:" . $reg['raza'] . "\n");
    fwrite($ar, "fecha:" . $reg['fecha'] . "\n");
    fwrite($ar, "hora:" . $reg['hora'] . "\n");
    fwrite($ar, "amo:" . $reg['amo'] . "\n");
    fwrite($ar, "--------------------------" . "\n");
    fclose($ar);
  echo "Los datos se cargaron correctamente.";
  }
    mysqli_close($conn);


    echo "la mascota fue dado de agendada exitosamente.";

  ?>  

</body>    
</html>