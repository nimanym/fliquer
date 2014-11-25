<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Detalles de foto - Fliquer";
$nombre = "Detalles de foto";

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
$sentencia = 'SELECT * FROM fotos WHERE IdFoto=' . $_GET["foto"];;
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

$foto='<img src="' . $fila['Fichero'] . '.jpg' . '"' . '</img>';
$nombre=$fila['Titulo'];
$fecha=$fila['Fecha'];
$pais=$fila['Pais'];
$descripcion=$fila['Descripcion'];


// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

?>




<ul style="list-style-type:none">
  <li><img class="fotodetalle" src=<?php "$foto" ?> alt="Un girasol" ></li>
  <li><?php echo $nombre ?></li>
  <li><?php echo $fecha ?></li>
  <li><?php echo $pais ?></li>
  <li><?php echo $descripcion ?></li>
  <li><?php echo $uploader ?></li>
</ul>


<?php
require_once("footer.inc");
?>