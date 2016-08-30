<!DOCTYPE html>
<!-- html/AltaVentas.php -->

<!doctype html>
<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Modificar Venta - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
	<div class="columna">
		<div class="interior">
		<h1>Modificar Venta</h1>
		<p><a href="logout">Cerrar sesi&oacuten </a></p>
		<br />
		<?php $id=$this->venta['id_venta'];
			  $fecha=$this->venta['fecha'];
			  $factura=$this->venta['nro_factura'];
			  $artista=$this->venta['artista'];
			  $titulo=$this->venta['titulo'];
			  $cantidad=$this->venta['cantidad'];
			  $precio=$this->venta['precio'];
		?>
		<form action="modifica-venta-<?=$id ?>" method="post">
			<input type="hidden" name="id" id="id" value="<?=$id ?>">
			<label for="fecha">Fecha de Alta:</label>
			<input type="date" id="fecha" name="fecha" value="<?=$fecha ?>" disabled="disabled">
			<br />
			<br />
			<label for="factura">Nro.Factura:</label>
			<input type="text" id="factura" name="factura" value="<?=$factura ?>" disabled="disabled"> (Solo n&uacutemeros)
			<br />
			<br />
			<label for="disco">Disco:</label>
			<input type="text" id="disco" name="disco" value="<?=$artista." - ".$titulo ?>" disabled="disabled">
			<br />
			<br />
			<label for="cantidad">Cantidad:</label>
			<input type="text" id="cantidad" name="cantidad" value="<?=$cantidad ?>">
			<br />			
			<br />
			<label for="precio">Precio:</label>
			<input type="text" id="precio" name="precio" value="<?=$precio ?>" disabled="disabled">
			<br />			
			<br />
			<input type="submit" value="Actualizar">
		</form>
		</br>
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