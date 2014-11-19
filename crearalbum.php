<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Crear álbum - Fliquer";
$nombre = "Crear álbum";

require_once("cabecera.inc");

?>

<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>

<h2>Alberto Salieto</h2>

<form action="album.php" method="post" id="formularioAlbum">
	<h2>Crear un álbum</h2>
	Título: <br><input required type="text" name="titulo" id="titulo"><br>
	Descripción: <br><input required type="text" name="descripcion" id="descripcion"> <br>
	Fecha: <br><input required type="text" name="fecha" id="fecha"><br>
	País: <br><input required type="text" name="pais" id="pais"><br>
	<br />
	<input type="button" value="Enviar" onClick="enviar()" />
</form>



<?php
require_once("footer.inc");
?>