<?php

$conexion = new PDO("mysql:host=localhost;dbname=politecnico", "root", "");


$consulta = $conexion->query("SELECT cod_producto, nombre, descripcion, categoria, stock FROM productos ORDER BY nombre");

$productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (!empty($productos)) {
    
    echo '<div class="tabla-contenedor">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Nombre</th>';
    echo '<th>Descripción</th>';
    echo '<th>Categoría</th>';
    echo '<th>Stock</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($productos as $producto) {
        echo '<tr>';
        echo '<td>' . $producto['cod_producto'] . '</td>';
        echo '<td>' . $producto['nombre'] . '</td>';
        echo '<td>' . $producto['descripcion'] . '</td>';
        echo '<td>' . $producto['categoria'] . '</td>';
        echo '<td>' . $producto['stock'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No hay productos registrados.';
}
?>
<style>
 
  .lista-productos {
    background-color: rgba(255, 255, 255, 0.9);
    max-width: 800px; 
    margin: 0 auto;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
    font-family: 'Poppins', sans-serif;
    overflow-y: auto; 
    max-height: 600px; 
  }

 
  .tabla-container {
    width: 100%;
    position: relative;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid rgb(51, 102, 153);
  }

  th, td {
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: rgb(51, 102, 153);
    color: white;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
  }

  
  tr:nth-child(odd) {
    background-color: rgb(223, 217, 210);
  }

  
  tr:nth-child(even) {
    background-color: rgb(204, 204, 204);
  }

  .search-bar {
            text-align: right;
            margin-top: 5px;
            margin-right: 285px;
          
        }

        #search-input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #search-button {
            padding: 5px 10px;
            background-color: rgb(51, 102, 153);
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
</style>