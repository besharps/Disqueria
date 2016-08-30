<?php

//controllers/modificadiscos.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../views/ModificaDiscos.php';

	session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

	if(isset($_POST["id"])){
		
		if(!isset($_POST["precio"])) die("Error 2");
		
		$nuevodisco = New Discos;
		$nuevodisco->setActualizarDisco($_POST["id"], $_POST["precio"]);		
	}
	
		if(!isset($_GET["id"])) die("Error 1");
		
		$d = new Discos;
		$disco = $d->getDatosDeDisco($_GET["id"]);

		$v = new ModificaDiscos;
		$v->disco = $disco;
		$v->render();
	
?>