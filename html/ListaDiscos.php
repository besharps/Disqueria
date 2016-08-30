<!DOCTYPE html>
<!-- html/ListaDiscos.php -->

<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Discos - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
		<div class="tabla">
		<h1>Lista de Discos</h1>
		<p><a href="logout">Cerrar sesi&oacuten </a></p>
		<br />
		<table border="solid" cellspacing="2">
			<tr background="black">
				<th align="left">Artista</th>
				<th align="center">T&iacutetulo</th>
				<th align="center">Lanzamiento</th>
				<th align="center">Fecha de Alta</th>				
				<th align="center">Canciones</th>
				<th align="center">Precio</th>
			</tr>
		<?php foreach($this->discos as $d) {?>
			<tr>
				<td><?= $d['nombre'] ?> </td>
				<td><?= $d['titulo'] ?> </td>
				<td><?= $d['fecha_lanzamiento'] ?> </td>
				<td><?= $d['alta'] ?> </td>
				<td><?= $d['lista_canciones'] ?> </td>
				<td><?= $d['precio'] ?> </td>
				<td><a href="modifica-disco-<?=$d['id_disco']?>">Modificar </a></td>
				<td><a href="elimina-disco-<?=$d['id_disco']?>" onclick="return confirm('realmente borrar?')">Borrar</a></td>
			</tr>	
		<?php } ?>
		
		</table>
		</br>
		<p ><a href="logout">Cerrar sesi&oacuten </a></p>
		</div>
	<div class="anulafloat"></div>
		<footer>
		<p class="pie" align="center">Ramiro J. Oviedo - E-Mail: <a href="mailto:rjo250882@gmail.com">rjo250882@gmail.com </a></p>
		<p class="pie" align="center">Gabriel Sanchez - E-Mail: <a href="mailto:gabrielsanchez.frh@gmail.com">gabrielsanchez.frh@gmail.com </a></p>
		</footer>
	</div>
	</body>
</html>
