<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Dar de baja - Fliquer";
$nombre = "Dar de baja";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
}

// Se conecta al SGBD
if(!($iden = mysqli_connect("localhost", "root", "")))
die("Error: No se pudo conectar");
// Selecciona la base de datos
if(!mysqli_select_db($iden, "pibd"))
die("Error: No existe la base de datos");
// Sentencia SQL: inserta un nuevo libro

$sentencia = 'DELETE FROM usuarios WHERE NomUsuario="' . $_SESSION['nombreUsu'] . '"';
// Ejecuta la sentencia SQL

if(!mysqli_query($iden, $sentencia))
die("Error: no se pudo realizar el borrado");
echo 'Se borrado tu usuario.';
// Cierra la conexión con la base de datos
mysqli_close($iden);

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

?>
<p>
<input type="button" value="Volver" onclick=" location.href='index.php' " />
</p>

<?php
require_once("footer.inc");
?>