<?php
session_start();
include 'conn.php';
	error_reporting(0);
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }
if (isset($_SESSION['car'])) {


	if (isset($_GET['id'])) {

		$datos=$_SESSION['car'];
		$encontro=false;
		$numero=0;
		for ($i=0; $i <count($datos) ; $i++) { 
			if ($datos[$i]['id']== $_GET['id']) {
				$encontro=true;
				$numero=$i;
		
			}
		}
		

		if ($encontro==true) {
	
			$datos[$numero]['cantidad']=$datos[$numero]['cantidad']+1;
	
			$_SESSION['car']=$datos;
		}else{
		
			$nombre = "";
			$precio = "";
			$imagen = "";      
       		$sql="SELECT nombre, precio, cantidad, img FROM producto where idproducto =".$_GET['id'];
 			$resultado = mysqli_query($conn, $sql);
		
			if ($resultado) {
			while ( $row=$resultado->fetch_array()) {		
			$nombre=$row['nombre'];
			$precio=$row['precio'];
			$imagen=$row['img'];
			$cantidad=$row['cantidad'];
			if ($cantidad>1) {
				$data2 = ['id' => $_GET['id'], 'nombre' => $nombre, 'precio' => $precio, 'imagen' => $imagen, 'cantidad' => 1]; 
				array_push($datos, $data2);
				$_SESSION['car']=$datos;
			}
			
	
				}
			}
		}
	}
}else{
	

	if (isset($_GET['id'])) {
		$nombre = "";
		$precio = "";
		$imagen = "";
		
              
              
        $sql="SELECT nombre, precio, cantidad, img FROM producto where idproducto =".$_GET['id'];
 		$resultado = mysqli_query($conn, $sql);
		
		if ($resultado) {
		while ( $row=$resultado->fetch_array()) {		
		$nombre=$row['nombre'];
		$precio=$row['precio'];
		$imagen=$row['img'];
		$cantidad=$row['cantidad'];
		}
	}
		if ($cantidad) {
			$data = ['id' => $_GET['id'], 'nombre' => $nombre, 'precio' => $precio, 'imagen' => $imagen, 'cantidad' => 1]; 
		$datos[]=$data;
	
		$_SESSION['car']=$datos;
		$carro=$_SESSION['car'];
		}
		
	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/> 
	<title>Eccomerce - PC</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/productos.css">

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

	 <div class="container">
	 	<div class="bien">
	 		<p>Bienvenido <?php echo $_SESSION['name']; ?></p>
        <h3>Tu cesta</h3>
	 	</div>
        
        <table border>
            <tr class="encabezado">
                <td>NOMBRE</td>
                <td>IMAGEN</td>
                <td>CANTIDAD</td>
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
                	<h2><?php echo $arregloCarrito[$i]['nombre']; ?></h2>
                	
                </td>
                <td class="product-thumbnail">
                	<img src="data:image/jpg;base64,<?php  echo base64_encode($arregloCarrito[$i]['imagen']);?>" height="100" widht="100">
                </td>
                
                <td>
                	<div class="input-group mb-3" style="max-width: 120px">
                		<div class="input-group-prepend">
                		<p><?php echo $arregloCarrito[$i]['cantidad']; ?></p>
                	</div>   
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
         <div class="compra-btn"><p><a href="checkout.php">Proceder con la compra</a></p></div>
         <div class="salir-btn"><p><a href="logout.php">Salir de mi cuenta</a></p></div>

        
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