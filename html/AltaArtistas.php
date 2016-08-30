<!DOCTYPE html>
<!-- html/AltaArtistas.php -->

<!doctype html>
<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Alta de Artistas - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
	<div class="columna">
		<div class="interior">
			<h1>Alta de Artistas</h1>
			<p align="center"><a href="logout">Cerrar sesi&oacuten </a></p>
			<br />
			<form action="alta-artistas" method="post">
				<label for="genero">G&eacutenero:</label>
				<select id="genero" name="genero">
				<?php foreach($this->artistas as $g) {?>
					<option value="<?= $g['id_genero'] ?>"><?= $g['descripcion'] ?></option>
				<?php } ?>
				</select>
				<br />
				<br />
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre">			
				<br />
				<br />
				<br />
				<input type="submit" value="Guardar">
			</form>
			<br />
			<p><a href="logout">Cerrar sesi&oacuten </a></p>
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