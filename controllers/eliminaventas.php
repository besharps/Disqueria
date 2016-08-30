<?php

//controllers/eliminaventas.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../models/Ventas.php';
require '../views/ModificaDiscos.php';

	session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

	if(!isset($_GET["id"])) die("Error 1");
			
		$nuevaventa = New Ventas;
		$nuevaventa->eliminarVenta($_GET["id"]);	

		header("Location: lista-ventas");
		
?>