<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Crear álbum - Fliquer";
$nombre = "Crear álbum";

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

$sentencia = 'SELECT NomPais FROM paises';
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

?>


<form action="album.php" method="post" id="formularioAlbum">
	<h2>Crear un álbum</h2>
	Título: <br><input required type="text" name="titulo" id="titulo"><br>
	Descripción: <br><input required type="text" name="descripcion" id="descripcion"> <br>
	Fecha: <br><input required type="text" name="fecha" id="fecha"><br>
	Pais: <br><select name="pais" id="pais">  
       <option value="" selected="selected"></option>
		<?php
		while($nomPaises = mysqli_fetch_assoc($resultado)) {
			echo '<option value="' . $nomPaises['NomPais'] . '">' . $nomPaises['NomPais'] . '</option>';
		}?>
	</select><br>
	<br />
	<input type="button" value="Enviar" onClick="enviar()" />
</form>



<?php
require_once("footer.inc");
?>