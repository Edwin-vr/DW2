<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>E-commerce-Mi perfil</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <script src="https://kit.fontawesome.com/abc1a75f8d.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/tables.css">
     <link rel="stylesheet" type="text/css" href="http://localhost/ecommerce/publichtml/css/default.css">
  </head>
  
  <body>      
    <header>
        <nav class="titulo">
            <a href="http://localhost/ecommerce/publichtml/">E-commerce</a>
        </nav>
        <nav class="nav">
            
            <ul class="desktop-ul"> 
                <li class="elements"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/productos.php"><i class="fas fa-microchip"></i> Comprar</a></li>
                <li class="elements"><a href="http://localhost/ecommerce/publichtml/PHP-login-master/carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a></li>
                <?php
                
                   
                    $varsesion = $_SESSION['name'];
                    if($varsesion== null || $varsesion == ''){

                        echo '<li class="elements li-buttons"><a href="PHP-login-master/login.html"><i class="fas fa-sign-in-alt"></i>Login</a></li>
                        <li class="elements li-buttons"><a href="PHP-login-master/registro.html"><i class="fas fa-clipboard-list"></i>Registro</a></li>';
                    }else{
                        echo '<li class="elements li-buttons"><a href="edit-profile.php"><i class="fas fa-address-book"></i>Mi perfil</a></li>
                        <li class="elements li-buttons"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Salir</a></li>';

                    }

                ?>
                
            </ul>
        </nav>
        
    </header>
    <div class="main-container">
    <?php
    if (isset($_SESSION['loggedin'])) {  
    }
    else {
        header("Status: 301 Moved Permanently");
        header("Location: http://localhost/ecommerce/publichtml/");
        exit;
    }
    // checking the time now when check-login.php page starts
    $now = time();           
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Status: 301 Moved Permanently");
        header("Location: http://localhost/ecommerce/publichtml/");
        exit;
        }
    ?>

    <div class="container">
        <div class="bien">
            <p>Bienvenido: <?php echo $_SESSION['name']; ?></p>
        <h3>Tus pedidos</h3>
        </div>
        
        <table border>
            <tr class="encabezado">
                <td>ID VENTA</td>
                <td>FECHA</td>
                <td>TOTAL</td>
                <td>ESTADO</td>
            </tr>
            <?php
                include 'conn.php'; 
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }
                $sql="SELECT idventa, fecha, total, estado FROM VENTA WHERE Id = ".$_SESSION['id'];
              
                $result = mysqli_query($conn, $sql);

               if ($result) {
                  
               
                while($row=$result->fetch_array()){
            ?>
            <tr>
                <td><?php echo $row['idventa']?></td>
                <td><?php echo $row['fecha']?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['estado']?></td>
            </tr>
            <?php
            }
        }
            ?>
        </table>
        <div class="salir-btn"> <p><a href="logout.php">Salir de mi cuenta</a></p></div>
       
    </div>
    </div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
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