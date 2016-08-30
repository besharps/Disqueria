<!DOCTYPE html>
<!-- html/AltaDiscos.php -->

<!doctype html>
<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Alta de Discos - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2 align="center">Sistema de Gesti&oacuten de Disquer&iacutea v. 1.1</h2></header>
	<div class="columna">
		<div class="interior">
		<h1>Alta de Discos</h1>		
		<p align="center"><a href="logout">Cerrar sesi&oacuten </a></p>
		<br />		
		<form action="alta-discos" method="post">
			<label for="alta">Fecha de Alta:</label>
			<input type="date" id="alta" name="alta" required />
			<br />
			<br />
			<label for="artista">Artista:</label>
			<select id="artista" name="artista">
			 <?php foreach($this->discos as $a) {?>
				<option value="<?= $a['id_artista'] ?>"><?= $a['nombre'] ?></option>
			 <?php } ?>
			</select>
			<br />
			<br />
			<label for="titulo">T&iacutetulo:</label>
			<input type="text" id="titulo" name="titulo" required />
			<br />
			<br />
			<label for="lanzamiento">Fecha de Lanzamiento:</label>
			<input type="date" id="lanzamiento" name="lanzamiento" required />
			<br />
			<br />
			Lista de Canciones:
			<br />
			<textarea name="canciones" cols="30" rows="15" width="100px" height="100px" >Sin detalles</textarea>
			<br />
			<br />
			<label for="precio">Precio:</label>
			<input type="text" id="precio" name="precio" required />
			<br />
			<br />
			<input type="submit" value="Guardar">
		</form>		
		<br />
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