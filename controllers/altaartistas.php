<?php

//controllers/altadiscos.php

require '../fw/fw.php';
require '../models/Generos.php';
require '../models/Artistas.php';
require '../views/AltaArtistas.php';

session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

	if(isset($_POST["genero"])){
		if(!isset($_POST['nombre'])) die("Error 1");
		$nuevoartista = New Artistas;
		$nuevoartista->setNuevoArtista($_POST['nombre'], $_POST["genero"]);		
	}
		
		$g = new Generos;
		$todos = $g->getTodosPorDescripcion();

		$v = new AltaArtistas;
		$v->artistas = $todos;
		$v->render();
?>