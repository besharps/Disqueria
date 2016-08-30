<?php

//controllers/logout.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/FormLogin.php';

session_start();

if(isset($_SESSION['usuario'])) {
	unset($_SESSION['usuario']);
	header("Location: login");
	exit;
	}
else{
	header("login");
}


$v = new FormLogin;
$v->render();

?>

