<?php

//controllers/altadiscos.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../models/Compras.php';
require '../views/AltaCompras.php';

session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

	if(isset($_POST["fecha"])){
				
		if(!isset($_POST['disco'])) die("Error 1");
				
		if(!isset($_POST['cantidad'])) die("Error 2");
				
		$nuevacompra = New Compras;
		$nuevacompra->setNuevaCompra($_POST["fecha"], $_POST['disco'], $_POST['cantidad']);
				
	}
	
	$c = new Discos;
	$todos = $c->getTodosConArtista();

	$v = new AltaCompras;
	$v->compras = $todos;
	$v->render();		
	
?>