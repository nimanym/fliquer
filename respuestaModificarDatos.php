<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Modificar datos - Fliquer";
$nombre = "Modificar datos";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
}

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

	if($_POST["sexo"] == 0){
		$sexo = 0;
	}else{
		$sexo = 1;;
	}

$sentencia = 'UPDATE usuarios SET NomUsuario="' . $_POST["nombreUsuario"] . '", Clave="' . $_POST["password1"] . '", Email="' . $_POST["email"] . '", Sexo="' . $sexo . '", FNacimiento="' . $_POST["fechaNacimiento"] . '", Pais="1" WHERE usuarios.NomUsuario="' . $_SESSION['nombreUsu'] . '"';
// Ejecuta la sentencia SQL

if(!mysqli_query($iden, $sentencia))
die("Error: no se pudo realizar la inserción");
echo 'Se han modificado los siguientes datos';
// Cierra la conexión con la base de datos
mysqli_close($iden);



?>

<p>
Nombre de usuario: <b><?php echo $_POST["nombreUsuario"];?></b>
<br />
Contraseña: <b><?php echo $_POST["password1"];?></b>
<br />
Verificar contraseña: <b><?php echo $_POST["password2"];?></b>
<br />
E-mail: <b><?php echo $_POST["email"];?></b>
<br />
Fecha de nacimiento: <b><?php echo $_POST["fechaNacimiento"];?></b>
<br />
Sexo: <b><?php echo $_POST["sexo"];?></b>
<br />
Pais: <b><?php echo $_POST["pais"];?></b>
</p>


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

?>

<input type="button" value="Volver" onclick=" location.href='index.php' " />

</body>
</html>