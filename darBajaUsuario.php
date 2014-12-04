<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Dar de baja - Fliquer";
$nombre = "Dar de baja";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
}

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
$sentencia = 'SELECT * FROM usuarios WHERE usuarios.NomUsuario = "' . $_SESSION['nombreUsu'] . '"';
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

// Recorre el resultado y lo muestra en forma de tabla HTML
while($fila = mysqli_fetch_assoc($resultado)) {

	echo '<h2>' . 'Datos de ' .  $fila['NomUsuario'] . '</h2>';

}

?>

<br />
<p><a onClick="if(avisoBorrado()==false)return false;" href="respuestaBorrado.php">BORRAR USUARIO</a></p>
<br />

<?php

// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

require_once("footer.inc");
?>