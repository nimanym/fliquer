<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Búsqueda de imágenes - Fliquer";
$nombre = "Búsqueda de imágenes";

require_once("cabecera.inc");

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

$sentencia = 'SELECT NomPais FROM paises';
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

?>

<p>
¿Qué imágenes quieres encontrar?
</p>

<form action="resultadobusqueda.php" method="post">
	<br/>
  Incluyendo estas palabras: <br/><input type="text" name="incluir" autofocus><br/>
  Evitando estas palabras: <br/><input type="text" name="evitar"><br/>
  Fecha desde: <br/><input type="date" name="desde"><br/> hasta: <br/><input type="date" name="hasta"><br/>
  País: <br/>

	<select name="pais" id="pais">  

       <option value="" selected="selected"></option>
		<?php
		while($nomPaises = mysqli_fetch_assoc($resultado)) {
			echo '<option value="' . $nomPaises['NomPais'] . '">' . $nomPaises['NomPais'] . '</option>';
		}
		?>
    </select>

    <br/>
    <br/>

  <input type="submit">
  
</form>


<?php

// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

require_once("footer.inc");
?>