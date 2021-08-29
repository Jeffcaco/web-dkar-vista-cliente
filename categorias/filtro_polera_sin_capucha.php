<?php 
    require '../conexion.php';
    //extraemos los id del form
    $v1 = $_REQUEST['talla'];
    $v2 = $_REQUEST['color'];
    //filtrar todos
    if($v1=='Todos' && $v2=='Todos'){
      $consulta="SELECT a.precioUni as pu,
      a.precioMay as pm,
      a.unidadesDisp as unidades,
      b.nombre as talla,
      c.nombre as color ,
      d.nombre as subcategoria,
      e.imagen as imagen1
                                  FROM Producto as a 
                                  LEFT JOIN Talla as b on a.idTalla=b.idTalla
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='a'
                WHERE d.nombre='Polera sin capucha'
                GROUP BY c.nombre";
      
      $consulta2="SELECT e.imagen as imagen2  
                                  FROM Producto as a
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='b'
                WHERE d.nombre='Polera sin capucha'
                GROUP BY c.nombre";

      $consulta3="SELECT S.nombre as NombreSubcategoria,C.nombre as Color, sum(
                      CASE 
                        WHEN P.idTalla='S' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS S,
                    sum(
                      CASE 
                        WHEN P.idTalla='M' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS M,
                    sum(
                      CASE 
                        WHEN P.idTalla='L' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS L,
                    sum(
                      CASE 
                        WHEN P.idTalla='XL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XL,
                    sum(
                      CASE 
                        WHEN P.idTalla='XXL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XXL
                    
                    FROM Producto as P
                      LEFT JOIN Color as C ON P.idColor=C.idColor
                      LEFT JOIN Subcategoria as S ON P.idSubcategoria=S.idSubcategoria
                        GROUP BY S.idSubcategoria,P.idColor
                        HAVING S.nombre='Polera sin capucha'";
    }
    //filtrar todos por talla
    if($v1!='Todos' && $v2=='Todos'){
      $consulta="SELECT a.precioUni as pu,
      a.precioMay as pm,
      a.unidadesDisp as unidades,
      b.nombre as talla,
      c.nombre as color ,
      d.nombre as subcategoria,
      e.imagen as imagen1
                                  FROM Producto as a 
                                  LEFT JOIN Talla as b on a.idTalla=b.idTalla
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='a'
                WHERE d.nombre='Polera sin capucha' AND a.idTalla='$v1'
                GROUP BY c.nombre";
      
      $consulta2="SELECT e.imagen as imagen2  
                                  FROM Producto as a
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='b'
                WHERE d.nombre='Polera sin capucha' AND a.idTalla='$v1'
                GROUP BY c.nombre";

      $consulta3="SELECT S.nombre as NombreSubcategoria,C.nombre as Color, sum(
                      CASE 
                        WHEN P.idTalla='S' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS S,
                    sum(
                      CASE 
                        WHEN P.idTalla='M' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS M,
                    sum(
                      CASE 
                        WHEN P.idTalla='L' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS L,
                    sum(
                      CASE 
                        WHEN P.idTalla='XL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XL,
                    sum(
                      CASE 
                        WHEN P.idTalla='XXL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XXL
                    
                    FROM Producto as P 
                      LEFT JOIN Color as C ON P.idColor=C.idColor
                      LEFT JOIN Subcategoria as S ON P.idSubcategoria=S.idSubcategoria
                        WHERE P.idTalla='$v1'
                        GROUP BY S.idSubcategoria,P.idColor
                        HAVING S.nombre='Polera sin capucha'";
    }
    //filtrar todos por color
    if($v1=='Todos' && $v2!='Todos'){
      $consulta="SELECT a.precioUni as pu,
      a.precioMay as pm,
      a.unidadesDisp as unidades,
      b.nombre as talla,
      c.nombre as color ,
      d.nombre as subcategoria,
      e.imagen as imagen1
                                  FROM Producto as a 
                                  LEFT JOIN Talla as b on a.idTalla=b.idTalla
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='a'
                WHERE d.nombre='Polera sin capucha' AND a.idColor='$v2'
                GROUP BY c.nombre";
      
      $consulta2="SELECT e.imagen as imagen2  
                                  FROM Producto as a
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='b'
                WHERE d.nombre='Polera sin capucha' AND a.idColor='$v2'
                GROUP BY c.nombre";

      $consulta3="SELECT S.nombre as NombreSubcategoria,C.nombre as Color, sum(
                      CASE 
                        WHEN P.idTalla='S' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS S,
                    sum(
                      CASE 
                        WHEN P.idTalla='M' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS M,
                    sum(
                      CASE 
                        WHEN P.idTalla='L' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS L,
                    sum(
                      CASE 
                        WHEN P.idTalla='XL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XL,
                    sum(
                      CASE 
                        WHEN P.idTalla='XXL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XXL
                    
                    FROM Producto as P 
                      LEFT JOIN Color as C ON P.idColor=C.idColor
                      LEFT JOIN Subcategoria as S ON P.idSubcategoria=S.idSubcategoria
                        WHERE P.idColor='$v2'
                        GROUP BY S.idSubcategoria,P.idColor
                        HAVING S.nombre='Polera sin capucha'";
    }
    //filtrar por talla y color
    if($v1!='Todos' && $v2!='Todos'){
      $consulta="SELECT a.precioUni as pu,
      a.precioMay as pm,
      a.unidadesDisp as unidades,
      b.nombre as talla,
      c.nombre as color ,
      d.nombre as subcategoria,
      e.imagen as imagen1
                                  FROM Producto as a 
                                  LEFT JOIN Talla as b on a.idTalla=b.idTalla
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='a'
                WHERE d.nombre='Polera sin capucha' AND a.idTalla='$v1' AND a.idColor='$v2'
                GROUP BY c.nombre";
      
      $consulta2="SELECT e.imagen as imagen2  
                                  FROM Producto as a
                                  LEFT JOIN Color as c on a.idColor=c.idColor 
                                  LEFT JOIN Subcategoria as d on a.idSubcategoria=d.idSubcategoria
                                  LEFT JOIN Imagen as e on a.idProducto=e.idProducto AND e.tipoVista='b'
                WHERE d.nombre='Polera sin capucha' AND a.idTalla='$v1' AND a.idColor='$v2'
                GROUP BY c.nombre";

      $consulta3="SELECT S.nombre as NombreSubcategoria,C.nombre as Color, sum(
                      CASE 
                        WHEN P.idTalla='S' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS S,
                    sum(
                      CASE 
                        WHEN P.idTalla='M' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS M,
                    sum(
                      CASE 
                        WHEN P.idTalla='L' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS L,
                    sum(
                      CASE 
                        WHEN P.idTalla='XL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XL,
                    sum(
                      CASE 
                        WHEN P.idTalla='XXL' THEN P.unidadesDisp
                            ELSE  0
                      END
                    ) AS XXL
                    
                    FROM Producto as P 
                      LEFT JOIN Color as C ON P.idColor=C.idColor
                      LEFT JOIN Subcategoria as S ON P.idSubcategoria=S.idSubcategoria
                        WHERE P.idTalla='$v1' AND P.idColor='$v2'
                        GROUP BY S.idSubcategoria,P.idColor
                        HAVING S.nombre='Polera sin capucha'";
    }
    //asignar nombre a color segun idColor
    if($v2==130){ $v2="Blanco"; } if($v2==140){ $v2="Plomo"; } if($v2==150){ $v2="Negro"; } if($v2==160){ $v2="Azul"; } 
    if($v2==170){ $v2="Celeste"; } if($v2==180){ $v2="Rojo"; } if($v2==190){ $v2="Naranja"; } if($v2==200){ $v2="Rosado"; }
    if($v2==210){ $v2="Amarillo"; } if($v2==220){ $v2="Marron"; } if($v2==230){ $v2="Verde"; } if($v2==240){ $v2="Morado"; }


    $resultado = mysqli_query($conexion, $consulta);
    $num_filas = mysqli_num_rows($resultado);

    $resultado2=mysqli_query($conexion,$consulta2);
    $resultado3=mysqli_query($conexion,$consulta3);
?>

<!DOCTYPE html>
<html>
<head>
  <!--Developers 
		@Castillo Cornejo, Jeffrey Bryan		
		@Collantes Tito, Miguel Angel 		
 		@Mitma Huaccha, Johan Valerio
	-->
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
            <h3>CATEGORÍA <span class="badge badge-info" style="font-size: 30px; margin-left: 5px; letter-spacing: 1px;">POLERA</span></h3>
            
           
            <!--Filtros-->
             <div class="container formato-filtro">
                <?php
                    if($v1!="Todos" || $v2!="Todos"){
                      echo $num_filas.' resultado(s)'.' > '.$v1.' > '.$v2;
                    }
                ?>
              <h2>FILTRAR POR :</h2>
              <form action="filtro_polera_sin_capucha.php" method="GET">
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
                    <option value="150">Negro</option>
                    <option value="140">Plomo</option>
                    <option value="160">Azul</option>
                    <option value="170">Celeste</option>
                    <option value="180">Rojo</option>
                    <option value="190">  Naranja</option>
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
                  $row2 = mysqli_fetch_array($resultado2);
                  $row3 = mysqli_fetch_array($resultado3);
            ?>

        <!--columna articulo-->
        
        <div class="col-sm-3 formato-columnas-filtro">
          <div class="container-fluid formato-carrusel">
              <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                </ul>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                  <?php  echo '<img class="rounded" src=data:image/jpeg;base64,'.str_replace("'", '',base64_encode( $row['imagen1'] )).' style="height:400px;width:100%";/>'; ?>
                    <div class="carousel-caption">
                      <!--precio unidad--> 
                      <h2><span class="badge badge-primary">S/<?php echo round($row['pu'],2); ?></span></h2>
                    </div>
                  </div>
                  <div class="carousel-item">
                  <?php  echo '<img class="rounded" src=data:image/jpeg;base64,'.str_replace("'", '',base64_encode( $row2['imagen2'] )).' style="height:400px;width:100%";/>'; ?>
                  <div class="carousel-caption">
                      <!--precio unidad--> 
                      <h2><span class="badge badge-primary">S/<?php echo round($row['pu'],2); ?></span></h2>
                    </div>  
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
                        <h4 class="modal-title"><?php echo $row['subcategoria'].' - '.$row['color'];?></h4><br>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <h3>Tallas disponibles</h3>
                        <!--unidades por tallas-->
                        <h5>Small <span class="badge badge-warning"><?php echo $row3['S'].' unidades';?></span></h5>
                        <h5>Medium <span class="badge badge-warning"><?php echo $row3['M'].' unidades';?><!--uni.--></span></h5>
                        <h5>Large <span class="badge badge-warning"><?php echo $row3['L'].' unidades';?><!--uni.--></span></h5>
                        <h5>XL <span class="badge badge-warning"><?php echo $row3['XL'].' unidades';?><!--uni.--></span></h5>
                        <h5>XL <span class="badge badge-warning"><?php echo $row3['XXL'].' unidades';?><!--uni.--></span></h5>
                        <!--precio x mayor-->
                        <h3><span class="badge badge-dark">Precio por mayor S/<?php echo '  '.round($row['pm'],2);?></span></h3>
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

      <div style="text-align: center;">
          <?php
            if($v1=="Todos" && $v2=="Todos"){
              echo '('.$num_filas.')'.' resultados encontrados';}
          ?>
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