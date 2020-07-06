<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/> 
	<title>Eccomerce - PC</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/productos.css">
	
	<script src="https://kit.fontawesome.com/abc1a75f8d.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav class="titulo">
			<a href="http://localhost/ecommerce/publichtml/">E-commerce</a>
		</nav>
		<nav class="nav">
			
			<ul class="desktop-ul">
				
				<li class="elements"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/productos.php"><i class="fas fa-microchip"></i> Carrito</a></li>
				<li class="elements"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/carrito.php"><i class="fas fa-shopping-cart"></i> Pagar</a></li>
				<?php
				error_reporting(0);
					
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

<section class="productos">
		<div class="lista-productos">
			<?php

				include 'conn.php'; 
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
              
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }
                $sql="SELECT idproducto, nombre, precio, cantidad, img FROM producto";
              	
                $resultado = mysqli_query($conn, $sql);

   			
               if ($resultado) {
                while($row=$resultado->fetch_array()){
			
			?>
			
				<div class="producto">
					<div class="img-producto">
					<img src="data:image/jpg;base64,<?php  echo base64_encode($row['img']);?>">
					
					</div>
					<div class="about-producto">
						<b><?php echo $row['nombre']?></b>
						<p>$<?php echo $row['precio']?></p>
						<?php if ($row['cantidad']<=0) {	# code...
						?>
						<div class="agotado"> <a></i> Agotado</a></div>
						<?php }else{ ?>
						<div class="agregar-producto"> <a href='<?php echo "carrito.php?id=".$row["idproducto"];?>'><i class="fas fa-shopping-cart"></i> Agregar</a></div>
						<?php } ?> 
					</div>
				</div>
			<script>
  </script>
			<?php
				
				}
				}
			?>

		</div>

</section>



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