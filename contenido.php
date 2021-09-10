<?php
/*    require_once 'vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;
     $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML('<p>Hello como está todo?</p>');
    $html2pdf->output();
    die(); */


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
    <title>Listado Productos</title>

    <style type="text/css">
        .cajas {
            width: 30%;            
            border:1px solid black;
            margin: 5px;
            display: inline-block; 
            float:left;
        }

        .fotos {
            width: 100%;
        }
        
    
    </style>
</head>
<body>
<h1 align="center"> Listado de productos</h1>

<?php foreach( $productos as $producto) {?>
<!-- <div class="cajas">
    <img class="fotos" src="img/<?php echo $producto['imagen'];?> " alt="">
    <p align="center"><?php echo $producto['nombre']; ?></p>
    <p align="center"><b>Código:</b> <?php echo $producto['codigo']; ?></p>    
</div> -->

<div style="width: 30%; border:2px solid green; margin: 5px; display: inline-block;">
    <img class="fotos" src="img/<?php echo $producto['imagen'];?> " alt="">
    <p align="center"><?php echo $producto['nombre']; ?></p>
    <p align="center"><b>Código:</b> <?php echo $producto['codigo']; ?></p>    
</div>
<?php } ?>




    
</body>
</html>