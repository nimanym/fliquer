<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Respuesta formulario</title>
</head>
<body>
<p>
Usuario: <b><?php echo $_POST["user"];?></b>
<br />
Contraseña: <b><?php echo $_POST["password"];?></b>
</p>

<?php

$user1="Nima";
$user2="Alberto";

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


if($_POST['user'] == $user1||$_POST['user'] == $user2){
	$extra = 'menuregistrado.php';
	header("Location: http://$host$uri/$extra");
}
else
{
	$extra = 'loginerror.php';
	header("Location: http://$host$uri/$extra");
}
exit;


?>

</body>
</html>