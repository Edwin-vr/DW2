<?php
session_start();


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
	$iduser=$_SESSION['id'];

			$arregloventapro=$_SESSION['car'];
          $arregloCarrito=$_SESSION['car'];
           $total=0;	
          for($i=0;$i<count($arregloCarrito);$i++){
           	
             $total+= $arregloCarrito[$i]['precio']*$arregloCarrito[$i]['cantidad'];   	               
         
          
            }

             


	$query = "INSERT INTO venta (fecha, total, Id, estado) VALUES (now(), '$total', '$iduser', 'procesado')";

	if (mysqli_query($conn, $query)) {
	
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
		

	$idu=mysqli_insert_id($conn); 
		 for($i=0;$i<count($arregloventapro);$i++){
    	 $idpro=$arregloventapro[$i]['id'];
    	 $cant=$arregloventapro[$i]['cantidad'];
    	 $sub=$arregloventapro[$i]['cantidad']*$arregloventapro[$i]['precio'];;              
         $query = "INSERT INTO productoventa (idventa,idproducto, cantidad,subtotal) VALUES ('$idu', '$idpro', '$cant','$sub')";

	if (mysqli_query($conn, $query)) {

		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	
	mysqli_close($conn);

	$_SESSION['car']=null;


}else{
header("Status: 301 Moved Permanently");
header("Location: http://localhost/ecommerce/publichtml/");
exit;
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Eccomerce - PC</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/index.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/info.css">
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
				
					error_reporting(0);
					$varsesion = $_SESSION['name'];
					if($varsesion== null || $varsesion == ''){

						echo '<li class="elements li-buttons"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/login.html"><i class="fas fa-sign-in-alt"></i>Login</a></li>
						<li class="elements li-buttons"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/registro.html"><i class="fas fa-clipboard-list"></i>Registro</a></li>';
					}else{
						echo '<li class="elements li-buttons"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/edit-profile.php"><i class="fas fa-sign-in-alt"></i>Mi perfil</a></li>
						<li class="elements li-buttons"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/logout.php"><i class="fas fa-clipboard-list"></i>Salir</a></li>';

					}

				?>
				
			</ul>
		</nav>
	</header>
	
<div class="bien">
	<h1>Gracias por tu compra</h1>
	<h1><?php echo $_SESSION['name']."!!";?></h1>
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