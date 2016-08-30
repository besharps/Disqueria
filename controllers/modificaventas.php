<?php

//controllers/modificaventas.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../models/Ventas.php';
require '../views/ModificaVentas.php';

	session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

	if(isset($_POST["id"])){
		
		if(!isset($_POST["cantidad"])) die("Error 2");
		
		$nuevaventa = New Ventas;
		$nuevaventa->setActualizarVenta($_POST["id"], $_POST["cantidad"]);		
	}
	
		if(!isset($_GET["id"])) die("Error 1");
		
		$vt = new Ventas;
		$venta= $vt->getDatosDeVenta($_GET["id"]);

		$v = new ModificaVentas;
		$v->venta = $venta;
		$v->render();
	
?>