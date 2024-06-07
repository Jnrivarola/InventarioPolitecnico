<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "politecnico";


$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $cod_producto = $_POST["cod_producto"];
    $cantidad = $_POST["cantidad"];
    $consulta = "SELECT id, nombre, stock FROM productos WHERE cod_producto = '$cod_producto'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $producto = mysqli_fetch_assoc($resultado);

        if ($producto["stock"] >= $cantidad) {
            
            $nuevo_stock = $producto["stock"] - $cantidad;
            $producto_id = $producto["id"];
            $actualizar_stock = "UPDATE productos SET stock = $nuevo_stock WHERE id = $producto_id";
            
            if (mysqli_query($conexion, $actualizar_stock)) {
                $response = array("success" => true);
            } else {
                $response = array("success" => false, "message" => "Error al actualizar el stock");
            }
        } else {
            $response = array("success" => false, "message" => "No hay suficiente stock para retirar esa cantidad");
        }
    } else {
        $response = array("success" => false, "message" => "El producto no existe");
    }

   
    header("Content-Type: application/json");
    echo json_encode($response);
}


mysqli_close($conexion);
?>