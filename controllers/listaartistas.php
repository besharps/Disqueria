<?php

//controllers/listaartistas.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../views/ListaArtistas.php';

session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

$a = new Artistas;
$todos = $a->getTodosConGenero();

$v = new ListaArtistas;
$v->artistas = $todos;
$v->render();

?>