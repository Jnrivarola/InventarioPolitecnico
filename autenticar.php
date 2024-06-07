<?php

$conexion = mysqli_connect("localhost", "root", "", "politecnico");


if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) == 1) {
   
    header("Location: http://localhost/InventarioPolitecnico/index.html");
    exit;
} else {
   
    echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
}

mysqli_close($conexion);
?>