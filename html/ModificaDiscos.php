<!DOCTYPE html>
<!-- html/ModificaDiscos.php -->

<!doctype html>
<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Modificar Disco - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
	<div class="columna">
		<div class="interior">
		<h1>Modificar Disco</h1>
		<p><a href="logout">Cerrar sesi&oacuten </a></p>
		<br />
		<?php $id=$this->disco['id_disco'];
			  $alta=$this->disco['alta'];
			  $artista=$this->disco['nombre'];
			  $titulo=$this->disco['titulo'];
			  $lanzamiento=$this->disco['fecha_lanzamiento'];
			  $canciones=$this->disco['lista_canciones'];
			  $precio=$this->disco['precio'];
		?>
		<form action="modifica-disco-<?=$id ?>" method="post">
			<input type="hidden" name="id" id="id" value="<?=$id ?>">
			<label for="alta">Fecha de Alta:</label>
			<input type="date" id="alta" name="alta" value="<?=$alta ?>" disabled="disabled">
			<br />
			<br />
			<label for="artista">Artista:</label>
			<input type="text" id="artista" name="artista" value="<?=$artista ?>" disabled="disabled">
			<br />
			<br />
			<label for="titulo">T&iacutetulo:</label>
			<input type="text" id="titulo" name="titulo" value="<?=$titulo ?>" disabled="disabled">
			<br />
			<br />
			<label for="lanzamiento">Fecha de Lanzamiento:</label>
			<input type="date" id="lanzamiento" name="lanzamiento" value="<?=$lanzamiento ?>" disabled="disabled">
			<br />
			<br />
			Lista de Canciones:
			<br />
			<textarea name="canciones" cols="30" rows="15" width="100px" height="100px" disabled="disabled"><?=$canciones ?></textarea>
			<br />
			<br />
			<label for="precio">Precio:</label>
			<input type="text" id="precio" name="precio" value="<?=$precio ?>">
			<br />
			<br />
			<input type="submit" value="Actualizar">
		</form>
		</br>
		<p align="center"><a href="logout">Cerrar sesi&oacuten </a></p>
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