<?php
 
  $conexion = new PDO("mysql:host=localhost;dbname=politecnico", "root", "");

  
  $cod_producto = $_POST["cod_producto"];
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $categoria = $_POST["categoria"];
  $stock = $_POST["stock"];

  
  $consulta = $conexion->prepare("INSERT INTO productos (cod_producto, nombre, descripcion, categoria, stock) VALUES (?, ?, ?, ?, ?)");
  $consulta->execute(array($cod_producto, $nombre, $descripcion, $categoria, $stock));


  echo "<div class='alert alert-success'>Producto ingresado de manera exitosa</div>";

  header("Location: IngresoProductos.html");

  echo "<script>setTimeout(function() { window.location.href = 'IngresoProductos.html'; }, 3000);</script>";
?>