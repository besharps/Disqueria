<?php

//controllers/altadiscos.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../views/AltaDiscos.php';

	session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}
	
	if(isset($_POST["alta"])){
			
		if(!isset($_POST['artista'])) die("Error 1");
			
		if(!isset($_POST['titulo'])) die("Error 2");
			
		if(!isset($_POST['lanzamiento'])) die("Error 3");
			
		if(!isset($_POST['canciones'])) die("Error 4");
		
		if(!isset($_POST['precio'])) die("Error 5");
			
		$nuevodisco = New Discos;
		$nuevodisco->setNuevoDisco($_POST["alta"], $_POST['artista'], $_POST['titulo'], $_POST['lanzamiento'], $_POST['canciones'], $_POST['precio']);		
	}
	
		$a = new Artistas;
		$todos = $a->getTodosPorNombre();

		$v = new AltaDiscos;
		$v->discos = $todos;
		$v->render();
	
?>