<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Añadir foto - Fliquer";
$nombre = "Añadir foto";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
}

?>

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

$sentencia = 'SELECT NomPais FROM paises';
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

$sentencia2 = 'SELECT a.* FROM albumes a, usuarios u WHERE a.Usuario=u.IdUsuario AND u.NomUsuario="' . $_SESSION['nombreUsu'] . '"';
if(!($resultado2 = @mysqli_query($link, $sentencia2))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

?>

<form action="anyadirFoto.php" method="post" id="formularioFoto">
	<h2>Añadir una foto</h2>
	Título: <br><input required type="text" name="titulo" id="titulo"><br>
	Descripción: <br><input required type="text" name="descripcion" id="descripcion"> <br>
	Fecha: <br><input required type="text" name="fecha" id="fecha"><br>
	Pais: <br><select name="pais" id="pais">  
       <option value="" selected="selected"></option>
		<?php
		while($nomPaises = mysqli_fetch_assoc($resultado)) {
			echo '<option value="' . $nomPaises['NomPais'] . '">' . $nomPaises['NomPais'] . '</option>';
		}?>
	</select>
	<br />

	Album: <br><select name="albumes" id="albumes">
		<?php
		while($nomAlbumes = mysqli_fetch_assoc($resultado2)) {
			echo '<option value="' . $nomAlbumes['IdPais'] . '">' . $nomAlbumes['Titulo'] . '</option>';
		}?>
	</select><br>
	<br />


	<input type="button" value="Enviar" onClick="submit()" />
</form>



<?php

if(isset($_POST['titulo'])){
	$sentencia = "INSERT INTO fotos VALUES (NULL, '". $_POST['titulo'] ."', '" . $_POST['descripcion']. "', '" . $_POST['fecha']. "', '" . $_POST['pais']. "', '1')";
	if(!mysqli_query($link, $sentencia))
	die("Error: no se pudo realizar la inserción");
	echo 'Se ha insertado una nueva foto en la base de datos';
}


// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

require_once("footer.inc");
?>