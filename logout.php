<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logout</title>
</head>
<body>

<?php


unset($_COOKIE["recordar"]); 
setcookie("recordar","",time()-3600);

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Borra todas las variables de sesión
$_SESSION = array();
// Borra la cookie que almacena la sesión
if(isset($_COOKIE[session_name()])) {
setcookie(session_name(), '', time() - 42000, '/');
}
// Finalmente, destruye la sesión
session_destroy();


$extra = 'index.php';
header("Location: http://$host$uri/$extra");

exit;

?>

</body>
</html>