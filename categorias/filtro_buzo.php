<?php 
    require '../conexion.php';
    //extraemos los id del form
    $v1 = $_REQUEST['talla'];
    $v2 = $_REQUEST['color'];
    //filtrar todos
    if($v1=='Todos' && $v2=='Todos'){
        $consulta="SELECT P.idProducto as ID, P.nombre as nombre, CL.nombre as color,T.nombre as talla,CT.nombre as categoria,P.precioUnitario as precioUnit,P.unidadesDisp as unidades,P.imagen as imagen 
            FROM Producto as P 
            LEFT JOIN Categoria as CT ON P.idCategoria=CT.idCategoria 
            LEFT JOIN Talla as T ON P.idTalla=T.idTalla 
            LEFT JOIN Color as CL ON P.idColor=CL.idColor";
    }
    //filtrar todos por talla
    if($v1!='Todos' && $v2=='Todos'){
      $consulta="SELECT P.idProducto as ID, P.nombre as nombre, CL.nombre as color,T.nombre as talla,CT.nombre as categoria,P.precioUnitario as precioUnit,P.unidadesDisp as unidades,P.imagen as imagen 
      FROM Producto as P 
      LEFT JOIN Categoria as CT ON P.idCategoria=CT.idCategoria 
      LEFT JOIN Talla as T ON P.idTalla=T.idTalla 
      LEFT JOIN Color as CL ON P.idColor=CL.idColor
      WHERE P.idTalla='$v1'";
    }
    //filtrar todos por color
    if($v1=='Todos' && $v2!='Todos'){
      $consulta="SELECT P.idProducto as ID, P.nombre as nombre, CL.nombre as color,T.nombre as talla,CT.nombre as categoria,P.precioUnitario as precioUnit,P.unidadesDisp as unidades,P.imagen as imagen 
      FROM Producto as P 
      LEFT JOIN Categoria as CT ON P.idCategoria=CT.idCategoria 
      LEFT JOIN Talla as T ON P.idTalla=T.idTalla 
      LEFT JOIN Color as CL ON P.idColor=CL.idColor
      WHERE P.idColor='$v2'";
    }
    //filtrar por talla y color
    if($v1!='Todos' && $v2!='Todos'){
        $consulta="SELECT P.idProducto as ID, P.nombre as nombre, CL.nombre as color,T.nombre as talla,CT.nombre as categoria,P.precioUnitario as precioUnit,P.unidadesDisp as unidades,P.imagen as imagen 
            FROM Producto as P 
            LEFT JOIN Categoria as CT ON P.idCategoria=CT.idCategoria 
            LEFT JOIN Talla as T ON P.idTalla=T.idTalla 
            LEFT JOIN Color as CL ON P.idColor=CL.idColor
            WHERE P.idTalla='$v1' and P.idColor='$v2'";
    }

    $resultado = mysqli_query($conexion, $consulta);
    $num_filas = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html>
<head>
  <title>D'KAR</title>
  <link rel="icon" type="image/png" href="../img/faviconv2.png"/>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../css/catalogo.css">
  <link rel="stylesheet" type="text/css" href="../css/filtro.css">
  <script src="https://kit.fontawesome.com/31127b7562.js" crossorigin="anonymous"></script>
  <!--Bootstrap-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <header>
    <div class="contenedor">
      <input type="checkbox" id="menuprincipal">
      <label class="fas fa-bars" for="menuprincipal"></label>
      <nav class="menu">
        <a href="../index.html">HOME</a></li>
        <a href="../Nosotros.html">NOSOTROS</a></li>
				<a href="https://wa.link/z4gos0" target="_blank">WHATSAPP</a></li>
				<a href="https://goo.gl/maps/11nKpywHspxLEXoA8" target="_blank">UBICACION</a></li>
        <a href="../Catalogo.html">CATALOGO</a></li>
      </nav>
    </div>
  </header>
  
  <main class="container-filtro">
      <div class="logo3">
        <h3>BOUTIQUE D'KAR</h3>
        <p>Lo mejor de moda para <span>ellos!</span></p>
      </div>
      <div class="row" style="padding: 0px;margin: 0px;">
        <!--columna categoria-->
        <div class="col-sm formato-colum1">
          <hr>
          <ul class="nav flex-column formato-categoria-filtro">
            <h3>CATEGORÍA <span class="badge badge-info" style="font-size: 30px; margin-left: 5px; letter-spacing: 1px;">BUZOS</span></h3>
            
           
            <!--Filtros-->
             <div class="container formato-filtro">
                <?php
                    if($v1!="Todos" || $v2!="Todos"){
                      echo 'Filtro'.' > '.$v1.' > '.$v2;
                    }
                ?>
              <h2>Filtrar por :</h2>
              <form action="filtro_buzo.php" method="GET">
                <div class="form-group">
                  <label for="talla">Talla:</label>
                  <select class="form-control formato-lista" id="talla" name="talla">
                    <option value="Todos" selected>Todos</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                  </select>
                </div>
                <div class="form-group formato-filtro">
                  <label for="color">Color:</label>
                  <select class="form-control formato-lista" id="color" name="color">
                    <option value="Todos" selected>Todos</option>
                    <option value="130">Blanco</option>
                    <option value="5">Negro</option>
                    <option value="4">Plomo</option>
                    <option value="160">Azul</option>
                    <option value="170">Celeste</option>
                    <option value="8">Rojo</option>
                    <option value="9">  Naranja</option>
                    <option value="200">Rosado</option>
                    <option value="210">Amarillo</option>
                    <option value="220">Marrón</option>
                    <option value="230">Verde</option>
                    <option value="240">Morado</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-dark">Filtrar<i class="fas fa-filter formato-icono-filtro"></i></button>
              </form>
            </div>
          </ul>
          <hr>
        </div>
            <?php
              if($num_filas > 0){
                for($x =0; $x < $num_filas; $x++){
                  $row = mysqli_fetch_array($resultado);
            ?>

        <!--columna articulo-->
        
        <div class="col-sm-3 formato-columnas-filtro">
          <div class="container-fluid formato-carrusel">
              <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                  <img class="mx-auto d-block img-fluid rounded" src=<?php echo "data:image/jpeg;base64,'".base64_encode($row['imagen'])."'";?>>
                    <div class="carousel-caption">
                      <!--nombre del modelo de producto-->
                      <h4 style="color:#000;"><?php echo $row['nombre']; ?></h4> 
                      <!--precio unidad--> 
                      <h2><span class="badge badge-primary">S/<?php echo round($row['precioUnit'],2); ?></span></h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                  <img class="mx-auto d-block img-fluid rounded" src=<?php echo "data:image/jpeg;base64,'".base64_encode($row['imagen'])."'";?>>
                  </div>
                  <div class="carousel-item">
                  <img class="mx-auto d-block img-fluid rounded" src=<?php echo "data:image/jpeg;base64,'".base64_encode($row['imagen'])."'";?>>
                  <?php /*<img class="mx-auto d-block img-fluid rounded" src="../img/<?php print $row['Imagen3']; ?>" alt="item-3"> */ ?>
                  </div>
                </div>
              </div>
          </div>
          <!--detalles-->
            <div class="detalles">
              <!--tanque-->                                              <!--asignamos nombre segun el boton de for-->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target=<?php print '#btn'.$x?>>
              Ver detalles 
              </button>
              <div class="modal fade" id=<?php echo 'btn'.$x?>>
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <!--nombre y descripcion del producto-->
                        <h4 class="modal-title"><?php echo $row['nombre'].' - '.$row['categoria'];?></h4><br>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <h3>Tallas disponibles</h3>
                        <!--unidades por tallas-->
                        <h5>Small <span class="badge badge-warning"><?php echo $row['unidades'].' unidades';?></span></h5>
                        <h5>Medium <span class="badge badge-warning"><?php echo $row['unidades'].' unidades';?><!--uni.--></span></h5>
                        <h5>Large <span class="badge badge-warning"><?php echo $row['unidades'].' unidades';?><!--uni.--></span></h5>
                        <h5>XL <span class="badge badge-warning"><?php echo $row['unidades'].' unidades';?><!--uni.--></span></h5>
                        <!--precio x mayor-->
                        <h3><span class="badge badge-dark">Precio por mayor S/<?php echo '  '.round($row['precioUnit'],2);?></span></h3>
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Añadir <i class="fas fa-shopping-cart"></i></button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
        <!--fin columna 1*****************************-->
        </div>
      <!--fin-->
      <?php
                } //fin de for
                mysqli_close($conexion);
            }else{?>  <!--fin de if-->
              <style type="text/css">
                .formato-colum1{ 
                  display: none;
                }
                .pie{
                  display: none;
                }
              </style>
              <div class="alert alert-danger">  
              <i class="fas fa-exclamation-circle" style="color:#000;"></i><strong>¡Error!</strong> 
              <br>No se encontraron productos disponibles por el momento <i class="far fa-frown" style="color:#000;"></i>. Estamos trabajando en ello. <a href="../Catalogo.html" class="alert-link formato-error">Volver a catálogo</a>.
              </div>
          <?php }?>
      </div>  
  </main>
  
  <br>
  <br>
  <br>  
  <footer>
    <div class="pie">
      <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
      <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="#"><i class="fas fa-map-marked-alt fa-2x"></i></a>
      <p>Copyright © 2021, Todos los derechos reservados.</p>
    </div>
    
  </footer>
</body>
</html>