<?php

//controllers/eliminadiscos.php

require '../fw/fw.php';
require '../models/Artistas.php';
require '../models/Discos.php';
require '../views/ModificaDiscos.php';

	session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: login");
		exit;
	}

	if(!isset($_GET["id"])) die("Error 1");
			
		$nuevodisco = New Discos;
		$nuevodisco->eliminarDisco($_GET["id"]);

		header("Location: lista-discos");
	
?>