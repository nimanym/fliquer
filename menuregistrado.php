<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Menú de usuario - Fliquer";
$nombre = "Menú de usuario";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
}

?>

<h2>Perfil</h2>

<p><a href="datosUsuario.php">Mis datos</a></p>
<p><a href="darBajaUsuario.php">Darme de baja</a></p>
<p><a href="misalbumes.php">Mis álbumes</a></p>
<p><a href="crearalbum.php">Crear álbum</a></p>
<p><a href="anyadirFoto.php">Añadir foto al álbum</p>
<br />


<?php
require_once("footer.inc");
?>