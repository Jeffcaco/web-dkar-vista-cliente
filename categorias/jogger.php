<!--en esta parte se recibira la consulta-->
<!--comentario-->
<?php
  require '../conexion.php';

  $consulta="SELECT * FROM producto WHERE categoria='Jogger'";
  $resultado=mysqli_query($conexion,$consulta);
  $num_filas=mysqli_num_rows($resultado);
  //$array=mysqli_fetch_array($resultado);
  //echo $num_filas;
?>

<!DOCTYPE html>
<html>
<head>
  <title>D'KAR</title>
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
        <a href="../Principal.html">HOME</a></li>
        <a href="../Nosotros.html">NOSOTROS</a></li>
        <a href="#">WHATSAPP</a></li>
        <a href="#">UBICACION</a></li>
        <a href="../Catalogo.html">CATALOGO</a></li>
      </nav>
    </div>
  </header>
  
  <main class="container-filtro">
      <div class="logo3">
        <h3>BOUTIQUE D'KAR</h3>
        <p>Lo mejor de moda para <span>ellos!</span></p>
      </div>
       <hr>
      <div class="row" style="padding: 0px;margin: 0px;">
        <!--columna categoria-->
        <div class="col-sm formato-colum1">
          <ul class="nav flex-column formato-categoria-filtro">
            <h3>CATEGORÍA <span class="badge badge-info" style="font-size: 30px; margin-left: 5px; letter-spacing: 1px;">BUZOS</span></h3>
            
           
            <!--Filtros-->
             <div class="container formato-filtro">
              <h2>Filtrar por :</h2>
              <form action="filtro.php">
                <div class="form-group">
                  <label for="talla">Talla:</label>
                  <select class="form-control formato-lista" id="talla" name="talla">
                    <option>Todos</option>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                  </select>
                </div>
                <div class="form-group formato-filtro">
                  <label for="color">Color:</label>
                  <select class="form-control formato-lista" id="color" name="color">
                    <option>Todos</option>
                    <option>Blanco</option>
                    <option>Negro</option>
                    <option>Plomo</option>
                    <option>Azul</option>
                    <option>Celeste</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Rosado</option>
                    <option>Amarillo</option>
                    <option>Marrón</option>
                    <option>Verde</option>
                    <option>Morado</option>
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
                  <img class="mx-auto d-block img-fluid rounded" src="../img/<?php print $row['Imagen1'] ?>" alt="item-1">
                    <div class="carousel-caption">
                      <h4><?php print $row['categoria'] ?></h4>
                      <h2><span class="badge badge-primary">S/<?php print $row['precio_menor'] ?></span></h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                  <img class="mx-auto d-block img-fluid rounded" src="../img/<?php print $row['Imagen2'] ?>" alt="item-2">
                  </div>
                  <div class="carousel-item">
                  <img class="mx-auto d-block img-fluid rounded" src="../img/<?php print $row['Imagen3'] ?>" alt="item-3">
                  </div>
                </div>
              </div>
          </div>
          <!--detalles-->
            <div class="detalles">                                              <!--asignamos nombre segun el boton de for-->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target=<?php print '#btn'.$x?>>
              Ver detalles
              </button>
              <div class="modal fade" id=<?php echo 'btn'.$x?>>
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title"><?php print $row['categoria']?></h4><br>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <h3>Tallas disponibles</h3>
                        <h5>Small <span class="badge badge-warning"><?php print $row['unidades'].' unidades'?></span></h5>
                        <h5>Medium <span class="badge badge-warning"><!--uni.--></span></h5>
                        <h5>Large <span class="badge badge-warning"><!--uni.--></span></h5>
                        <h5>XL <span class="badge badge-warning"><!--uni.--></span></h5>
                        <h3><span class="badge badge-dark">Precio por mayor S/<?php print '  '.$row['precio_mayor']?></span></h3>
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Añadir<i class="fas fa-shopping-cart"></i></button>
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
                <strong>Error!</strong> <br>No se encontraron productos disponibles. <a href="../Catalogo.html" class="alert-link formato-error">Volver a catálogo</a>.
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