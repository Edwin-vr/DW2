<!DOCTYPE html>

<html>

<head>
	<title>Registro Entrada</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="manifest" href="/manifest.json">
	<link rel="stylesheet" href="CSS/estilo.css" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<script language="JavaScript" src="JS/horaactual.js"></script>

<body>
	<video src="img/fondov.mp4" autoplay loop></video>
	<div class="container">
		<div class="col-lg-12" align="right" style="position: absolute; top: 20px; left: 0;">
			<a href="{{route('loginn')}}">
				<img src="img/conf.png" alt="Ayuda" class="help">
				<div class="caption"></div>
			</a>
		</div>
	</div>

	<br>
	<div>
		<h1 class="encabezado" align="center">Registro de Asistencia</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8" align="center">
				<form name="form1" method="post" action="" onsubmit="return entrada()">
					<div class="form-group" id="campo">
						<label class="label" for="ID">ID Empleado</label>
						<input class="form-imput" type="numeric" placeholder="ID" id="user" name="user" required>

					</div>
					<div align="center" style="margin-left: 40%;">
						<input type="submit" value="Registrar" class="btn btn-primary btn-lg">
					</div>
					<br>
				</form>
				<div id="alerta"></div>
			</div>
			<div class="col-lg-4" align="center">
				<img src="img/logo2.png" class="logo" alt="Cinque Terre" vertical-align="middle">
				<image>
			</div>
		</div>
		<br>
		<div id="reloj" class="reloj"></div>
		<br>

		<hr>
		<div class="piepagina" align="center">
			<h5 class="piepagina" ;>✰ 2020 Empresa:<a href=""> Empresa.com</a></h5>
		</div>
	</div>
</body>
<script src="JS/revisar.js"></script>

</html>