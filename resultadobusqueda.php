<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Resultado de búsqueda - Fliquer";
$nombre = "Resultado de búsqueda";

require_once("cabecera.inc");

?>

<script src="ordenartabla.js"></script>

<p>
Resultado de la búsqueda:
</p>

<p>
Incluyendo estas palabras: <b><?php echo $_POST["incluir"];?></b>
<br />
Evitando estas palabras: <b><?php echo $_POST["evitar"];?></b>
<br />
Fecha desde: <b><?php echo $_POST["desde"];?></b>
<br /> 
      hasta: <b><?php echo $_POST["hasta"];?></b>
<br />
País: <b><?php echo $_POST["pais"];?></b>
</p>

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
//$sentencia = "SELECT * FROM fotos WHERE titulo LIKE " . "'%" . $_POST['incluir'] . "%'" . " AND titulo";

if($_POST['evitar'] == ""){

  $sentencia = "SELECT * FROM fotos WHERE titulo LIKE '%" . $_POST['incluir'] . "%'";

  //AND pais = $_POST['pais'];

}else{

  $sentencia = "SELECT * FROM fotos WHERE titulo LIKE '%" . $_POST['incluir'] . "%' AND titulo NOT LIKE '%" . $_POST['evitar'] . "%'";

}

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