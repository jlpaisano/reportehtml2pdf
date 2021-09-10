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
 
<!--         <page_footer><p style="text-align:center;"> www.jorgepaisano.com - Página [[page_cu]] de [[page_nb]]</p></page_footer>
        <page_header> <img src="img/logo-social.png" alt=""> </page_header>

        <h1 align="center"> Listado de productos</h1> -->

        <?php
        $paginas = array_chunk($productos, 9, true);

        foreach ( $paginas as $pagina) {            
        ?>
            <page>
            <page_footer><p style="text-align:center;"> jlpaisano@gmail.com - Página [[page_cu]] de [[page_nb]]</p></page_footer>
            <page_header> <img src="img/logo-social.png" alt=""> </page_header>

             <h1 align="center"> Listado de productos</h1>
             <br>
             <br>

            <table align="center" style="border: 1px solid green;" >
                <tbody>
                    <?php
                    $filas = array_chunk($pagina, 3, true);            
                    foreach ($filas as $fila) {
                        #echo '************Esta es una fila ****************** <br>';
                        echo '<tr >';
                        
                        foreach ($fila as $celda) { ?>
                            <td style="border: 1px solid green; width:230px">
                                <div >
                                    <img class="fotos" src="img/<?php echo $celda['imagen'] ?>" alt="">
                                    <p align="center"><?php echo '<b>Código: ',$celda['codigo'],'</b>',' / ', $celda['nombre'] ?></p>
                                   <!--  <p align="center"><b>Código:</b> <?php echo $celda['codigo'] ?></p> -->
                                </div> 
                            </td>
                          
                 <?php  }
                        echo '</tr>';
                    } ?>
                </tbody>
            </table>
        </page>

  <?php } ?>

        


      

        <!-- <table style="border: 2px solid green;">
            <tbody>
            
                <?php for ( $i = 0; $i < 3; $i++) { ?>
                    <tr>
                        <td style="border: 1px solid green;">
                            <div>
                                <img class="fotos" src="img/03010017.jpg " alt="">
                                <p align="center">ROLING METAL</p>
                                <p align="center"><b>Código:</b> 03010017</p>
                            </div> 
                        </td>
                        <td style="border: 1px solid green;">
                            <div>
                                <img class="fotos" src="img/03010001.jpg" alt="">
                                <p align="center">ARO NEGRO PLASTICO</p>
                                <p align="center"><b>Código:</b> 03010001</p>
                            </div> 
                        </td>
                        <td style="border: 1px solid green;">
                            <div>
                                <img class="fotos" src="img/03010048.jpg" alt="">
                                <p align="center">VENTILADOR DE MOTOR</p>
                                <p align="center"><b>Código:</b> 03010048</p>
                            </div> 
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>  -->
    



 
    
</body>

