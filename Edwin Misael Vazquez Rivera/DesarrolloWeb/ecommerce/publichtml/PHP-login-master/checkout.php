<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['name'];

if($varsesion== null || $varsesion == ''){
header("Status: 301 Moved Permanently");
header("Location: http://localhost/ecommerce/publichtml/");
exit;
}
include 'conn.php';
	
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }

if (isset($_SESSION['car'])) {


}else{
header("Status: 301 Moved Permanently");
header("Location: http://localhost/ecommerce/publichtml/");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/> 
	<title>Eccomerce - PC</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/check.css">

<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/tables.css">

    
	<script src="https://kit.fontawesome.com/abc1a75f8d.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav class="titulo">
			<a href="http://localhost/ecommerce/publichtml/">E-commerce</a>
		</nav>
		<nav class="nav">
			
			<ul class="desktop-ul">
				
				<li class="elements"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/productos.php"><i class="fas fa-microchip"></i>Comprar</a></li>
				<li class="elements"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/carrito.php"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
				<?php
				
					$varsesion = $_SESSION['name'];
					if($varsesion== null || $varsesion == ''){

						echo '<li class="elements li-buttons"><a href="login.html"><i class="fas fa-sign-in-alt"></i>Login</a></li>
						<li class="elements li-buttons"><a href="registro.html"><i class="fas fa-clipboard-list"></i>Registro</a></li>';
					}else{
						echo '<li class="elements li-buttons"><a href="edit-profile.php"><i class="fas fa-sign-in-alt"></i>Mi perfil</a></li>
						<li class="elements li-buttons"><a href="logout.php"><i class="fas fa-clipboard-list"></i>Salir</a></li>';

					}

				?>
				
			</ul>
		</nav>
	</header>
   <form name="formularioDatos" method="post" action="gracias.php">
		 <div class="site-wrap">
    <div class="contenedor-principal">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              ¿Quiéres volver al carrito? <a href="http://localhost/ecommerce/publichtml/PHP-login-master/carrito.php">Click aquí</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="contenedor-dos">
            <h2 class="h3 mb-3 text-black">Detalles de tu pedido</h2>
           
            <div class="contenedor-info">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nombre completo <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="nom">
                </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="dir" placeholder="Número, calle/colonia, municipo">
                </div>
              </div>      
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Estado <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="estado">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Código postal <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="cp">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Correo electronico <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="email">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Número <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="num" placeholder="Número de celular">
                </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Notas</label>
                <textarea name="nota" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="..."></textarea>
              </div>

            </div>
          </div>
       

  
          	<div class="ticket">
          		
          
      
                <h2 class="h3 mb-3 text-black">Your Order</h2>
               
             <table border>
            <tr class="encabezado">
                <td>Producto</td>
                <td>SUBTOTAL</td>
            </tr>
            <?php
                

            if ($_SESSION['car']) {
                  $arregloCarrito=$_SESSION['car'];
            	$total=0;	
                for($i=0;$i<count($arregloCarrito);$i++){
              
            ?>
            <tr>
                <td class="product-name">
                	<h2><?php echo $arregloCarrito[$i]['nombre']." x ".$arregloCarrito[$i]['cantidad']; ?></h2>                	
                </td>                             
                	<td><?php echo $arregloCarrito[$i]['precio']*$arregloCarrito[$i]['cantidad']; ?></td></td>  
                	<?php $total+= $arregloCarrito[$i]['precio']*$arregloCarrito[$i]['cantidad']; ?>       	               
            </tr>

            <?php
            }

               }
            ?>
             </table>
               <div class="total"> <p><?php echo "Total=".$total;?></p></div>

          	</div>
                  <div class="form-group">

                    <button class="btn-orden" type="submit">Ordenar</button>

                
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
   </form>
    </div>


  </div>




<footer>
	<nav class="nav-f">
		<ul>
		<li class="pie-li"><a href="http://localhost/ecommerce/publichtml/contacto.php"><i class="fas fa-"></i>Contacto</a></li>
		<li class="pie-li"><a href="http://localhost/ecommerce/publichtml/sobre.php"><i class="fas fa-"></i>Sobre nosotros</a></li>
		<li class="pie-li"><i class="fas fa-"></i>e-commerce</li>
	</ul>
	</nav>	
</footer>
</body>
</html>