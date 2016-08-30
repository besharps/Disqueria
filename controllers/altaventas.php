<?php

//controllers/altadiscos.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../models/Ventas.php';
require '../views/AltaVentas.php';

session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}
	
	$datos=$_SESSION['usuario'];
	$user=$datos['id_usuario'];	
	
	if(isset($_POST["fecha"])){		
		if(!isset($_POST['factura'])) die("Error 1");		
		
		if(!isset($_POST['disco'])) die("Error 2");				
		
		if(!isset($_POST['cantidad'])) die("Error 3");			
		
		$nuevacompra = New Ventas;
		$nuevacompra->setNuevaVenta($_POST['factura'], $_POST["fecha"], $_POST['disco'], $_POST['cantidad'],$user);
				
	}
	
	$d = new Discos;
	$todos = $d->getTodosConArtista();

	$v = new AltaVentas;
	$v->compras = $todos;
	$v->render();		
	
?>