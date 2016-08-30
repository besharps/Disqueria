<!DOCTYPE html>
<!-- html/FormLogin.php -->

<!doctype html>
<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Iniciar Sesi&oacuten - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
	<div class="columna">
		<div class="interior">
		<h1>Iniciar Sesi&oacuten</h1>
		<form action="login" method="post">
			<label for="usuario">Nombre de usuario:</label>
			<input type="text" id="usuario" name="usuario" required />
			<br />
			<br />
			<label for="contrasena">Contraseña:</label>
			<input type="password" id="contrasena" name="contrasena" required />			
			<br />
			<br />
			<br />
			<input type="submit" value="Login">
		</form>
	</div>
		</div>
	<div class="columna">
		<div class="interior">    	
			<img src="logo"></img>
		</div>
	</div>
	<div class="anulafloat"></div>
		<footer>
		<p class="pie" align="center">Ramiro J. Oviedo - E-Mail: <a href="mailto:rjo250882@gmail.com">rjo250882@gmail.com </a></p>
		<p class="pie" align="center">Gabriel Sanchez - E-Mail: <a href="mailto:gabrielsanchez.frh@gmail.com">gabrielsanchez.frh@gmail.com </a></p>
		</footer>
	</div>
	</body>
</html>