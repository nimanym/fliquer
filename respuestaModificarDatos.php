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

$paisId="";
if ($_POST["pais"]!=''){
		$sentencia = 'SELECT IdPais FROM paises WHERE NomPais="' . $_POST["pais"] . '"';
		if(!($resultadoPais = @mysqli_query($iden, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($iden);
			echo '</p>';
			exit;
		}
		while($filaP = mysqli_fetch_assoc($resultadoPais)){
				$paisId=$filaP['IdPais'];
	}
}


$sentencia = 'UPDATE usuarios SET NomUsuario="' . $_POST["nombreUsuario"] . '", Clave="' . $_POST["password1"] . '", Email="' . $_POST["email"] . '", Sexo="' . $sexo . '", FNacimiento="' . $_POST["fechaNacimiento"] . '", Ciudad="' . $_POST["ciudad"] . '" Pais="' . $paisId . '" WHERE usuarios.NomUsuario="' . $_SESSION['nombreUsu'] . '"';
// Ejecuta la sentencia SQL

if(!mysqli_query($iden, $sentencia))
die("Error: no se pudo realizar la modificación. Error al ejecutar la sentencia <b>$sentencia</b>");
echo 'Se han modificado correctamente tus datos';
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

<input type="button" value="Volver" onclick=" location.href='index.php' " />

</body>
</html>