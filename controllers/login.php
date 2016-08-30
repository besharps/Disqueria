<?php

//controllers/login.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/FormLogin.php';

session_start();

if(isset($_POST['usuario'])) {
	if(!isset($_POST['contrasena'])) die("Error 1");
	
	$u = new Usuarios;
	$ok = $u->chequearLogin($_POST['usuario'],$_POST['contrasena']);
	
	if($ok) {
		$_SESSION['usuario'] = $u->getDatosUsuario($_POST['usuario']);
		header("Location: alta-discos");
		exit;
	}
	
}

$v = new FormLogin;
$v->render();

?>

