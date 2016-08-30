<!DOCTYPE html>
<!-- html/ListaArtistas.php -->

<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Artistas - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
		<div class="tabla">
		<h1>Lista de Artistas</h1>
		<p><a href="logout">Cerrar sesi&oacuten </a></p>
		<br />
		<table border="solid" cellspacing="2">
			<tr background="black">
				<th align="left">Nombre</th>
				<th align="center">G&eacutenero</th>
			</tr>
		<?php foreach($this->artistas as $a) {?>
			<tr>
				<td><?= $a['nombre'] ?> </td>
				<td><?= $a['genero'] ?> </td>
			</tr>	
		<?php } ?>
		
		</table>
		</br>
		<p><a href="logout">Cerrar sesi&oacuten </a></p>
		</div>
	<div class="anulafloat"></div>
		<footer>
		<p class="pie" align="center">Ramiro J. Oviedo - E-Mail: <a href="mailto:rjo250882@gmail.com">rjo250882@gmail.com </a></p>
		<p class="pie" align="center">Gabriel Sanchez - E-Mail: <a href="mailto:gabrielsanchez.frh@gmail.com">gabrielsanchez.frh@gmail.com </a></p>
		</footer>
	</div>
	</body>
</html>
