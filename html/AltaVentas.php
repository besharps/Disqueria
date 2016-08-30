<!DOCTYPE html>
<!-- html/AltaVentas.php -->

<!doctype html>
<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Alta de Ventas - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
	<div class="columna">
		<div class="interior">
		<h1>Alta de Ventas</h1>
		<p align="center"><a href="logout">Cerrar sesi&oacuten </a></p>
		<br />
		<form action="alta-ventas" method="post">
			<label for="fecha">Fecha de Alta:</label>
			<input type="date" id="fecha" name="fecha">
			<br />
			<br />
			<label for="factura">Nro.Factura:</label>
			<input type="text" id="factura" name="factura"> (Solo n&uacutemeros)
			<br />
			<br />
			<label for="disco">Disco:</label>
			<select id="disco" name="disco">
			 <?php foreach($this->compras as $d) {?>
				<option value="<?= $d['id'] ?>"><?= $d['artista']." - ".$d['disco'] ?></option>
			 <?php } ?>
			</select>
			<br />
			<br />
			<label for="cantidad">Cantidad:</label>
			<input type="text" id="cantidad" name="cantidad">
			<br />
			<br />
			<br />
			<input type="submit" value="Guardar">
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