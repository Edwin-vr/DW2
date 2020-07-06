<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Eccomerce - PC</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	
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

						echo '<li class="elements li-buttons"><a href="PHP-login-master/login.html"><i class="fas fa-sign-in-alt"></i>Login</a></li>
						<li class="elements li-buttons"><a href="PHP-login-master/registro.html"><i class="fas fa-clipboard-list"></i>Registro</a></li>';
					}else{
						echo '<li class="elements li-buttons"><a href="PHP-login-master/edit-profile.php"><i class="fas fa-sign-in-alt"></i>Mi perfil</a></li>
						<li class="elements li-buttons"><a href="PHP-login-master/logout.php"><i class="fas fa-clipboard-list"></i>Salir</a></li>';

					}

				?>
				
			</ul>
		</nav>
	</header>
	
	<div class="contenedor">

			<div class="atras botones">
				&#60
			</div>

			<div class="adelante botones">
				&#62
			</div>

			<img src="carruselImg/img1.jpg" alt="" id="imagen">
		
	</div>
<script src="js/carrusel.js" ></script>
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