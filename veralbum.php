<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Ver Álbum - Fliquer";
$nombre = "Ver Álbum";

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

// Ejecuta una sentencia SQL
$sentencia = 'SELECT f.* FROM albumes a, fotos f WHERE f.Album=a.IdAlbum and IdAlbum=' . $_GET["albumId"];
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

echo '<table style="margin: 0 auto;"><tr>';
echo '<th>Ficher</th><th>Titulo</th><th>Fecha</th><th>Pais</th><th>FRegistro</th>';
echo '</tr>';
// Recorre el resultado y lo muestra en forma de tabla HTML
while($fila = mysqli_fetch_assoc($resultado)) {

echo '<tr>';

echo '<td>' . '<a href="detallefoto.php?foto='. $fila['IdFoto'] .'" > <img src="' . $fila['Fichero'] . '_thumb.jpg' . '"</img></a></td>';
echo '<td>' . $fila['Titulo'] . '</td>';
echo '<td>' . $fila['Fecha'] . '</td>';
echo '<td>' . $fila['Pais'] . '</td>';
echo '<td>' . $fila['FRegistro'] . '</td>';
echo '</tr>';
}
echo '</table>';


// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

?>



<?php
require_once("footer.inc");
?>