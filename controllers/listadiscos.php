<?php

//controllers/listadiscos.php

require '../fw/fw.php';
require '../models/Discos.php';
require '../views/ListaDiscos.php';

session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

$d = new Discos;
$todos = $d->getTodosConDatos();

$v = new ListaDiscos;
$v->discos = $todos;
$v->render();

?>