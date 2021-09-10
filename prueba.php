<?php
  require_once 'controllers/ProductosController.php';
  $producto = new ProductoController();
  $productos = $producto->obtenerProductos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <style type="text/css">
        .cajas {
            width: 30%;            
            border:1px solid;
            margin: 5px;
            display: inline-block; 
        }

        .fotos {
            width: 30%;            
        }
        
    
    </style>
</head>
<body>
    <h1> Listado de productos</h1>
    <div style="border: 1px solid green;">
    ........este es un divi
   
    </div>

    <div>
    ........este es otro divi
   
    </div>

        
    <?php foreach( $productos as $producto) {?>
     <!-- <div> -->
        <img  class="fotos" src="img/03010001.jpg" alt="">
        <p>Aro negro licuadora</p>
        <p><b>Código:</b>03010001</p>    
   <!--  </div> -->
   <?php } ?>

    
</body>
</html>

