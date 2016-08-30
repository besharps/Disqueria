<!DOCTYPE html>
<!-- html/ListaVentas.php -->

<html>
	<head>
		<!--<meta http-equiv = "content-type" content = "text / html, charset iso 8859-1"></meta>-->
		<meta charset="utf-8">
		<title>Ventas - Disquer&iacutea</title>
		<link rel="stylesheet" type="text/css" href="estilos">
	</head>
	<body>
	<div class="contenedor">
	<header><h2>Sistema de Gesti&oacuten de Disquer&iacutea v. 1.0</h2></header>
		<div class="tabla">
		<h1>Lista de Ventas</h1>
		<p><a href="logout">Cerrar sesi&oacuten </a></p>
		<br/>
		<table border="solid" cellspacing="2">
			<tr background="black">
				<th align="left">Fecha</th>
				<th align="center">Nro. Factura</th>
				<th align="center">Vendedor</th>
				<th align="center">Artista</th>				
				<th align="center">T&iacuteulo</th>
				<th align="center">Cantidad</th>
				<th align="center">Precio</th>
			</tr>
		<?php foreach($this->ventas as $vt) {?>
			<tr>
				<td><?= $vt['fecha'] ?> </td>
				<td><?= $vt['nro_factura'] ?> </td>
				<td><?= $vt['uapellido'].", ".$vt['unombre'] ?> </td>
				<td><?= $vt['artista'] ?> </td>
				<td><?= $vt['titulo'] ?> </td>
				<td><?= $vt['cantidad'] ?> </td>
				<td><?= $vt['precio'] ?> </td>
				<td><a href="modifica-venta-<?=$vt['id_venta']?>">Modificar </a></td>
				<td><a href="elimina-venta-<?=$vt['id_venta']?>" onclick="return confirm('realmente borrar?')">Borrar</a></td>
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
