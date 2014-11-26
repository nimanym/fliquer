<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Mis álbumes - Fliquer";
$nombre = "Mis álbumes";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
}

?>

<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>


<?php
// Conecta con el servidor de MySQL
$link = @mysqli_connect(
'localhost', // El servidor
'root', // El usuario
'', // La contraseña
'pibd'); // La base de datos
if(!$link) {
	echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
	echo '</p>';
	exit;
}

$sentencia = 'SELECT a.* FROM albumes a, usuarios u WHERE a.Usuario=u.IdUsuario AND u.NomUsuario="' . $_SESSION['nombreUsu'] . '"';
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

echo '<dl>';
while($fila = mysqli_fetch_assoc($resultado)) {
	echo '<dt><a href="veralbum.php?albumId=' . $fila['IdAlbum'] . '" ><p>' . $fila['Titulo'] . '</p></a></dt>';
	echo '<dd><p>' . $fila['Descripcion'] . '</p></dd>';
	echo '<dd><p>' . $fila['Fecha'] . '</p></dd>';

	if ($fila['Pais']!=''){
		$sentencia = 'SELECT NomPais FROM paises WHERE IdPais=' . $fila['Pais'];
		if(!($resultadoPais = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
			while($filaP = mysqli_fetch_assoc($resultadoPais)){
				echo '<dd><p>' . $filaP['NomPais'] . '</p></dd>';
			}
		}
	}
}
echo '</dl>';
?>


<?php
require_once("footer.inc");
?>