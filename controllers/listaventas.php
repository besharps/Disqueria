<?php

//controllers/listadiscos.php

require '../fw/fw.php';
require '../models/Ventas.php';
require '../views/ListaVentas.php';

session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

$vt = new Ventas;
$todas = $vt->getTodasConDatos();

$v = new ListaVentas;
$v->ventas = $todas;
$v->render();

?>