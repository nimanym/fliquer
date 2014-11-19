<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Menú de usuario - Fliquer";
$nombre = "Menú de usuario";

require_once("cabecera.inc");

?>

<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>

<h2>Alberto Salieto</h2>

<p>Mis datos</p>
<p>Darme de baja</p>
<p>Mis álbumes</p>
<p><a href="crearalbum.php">Crear álbum</a></p>
<p>Añadir foto al álbum</p>
<br />
<p>Salir</p>


<?php
require_once("footer.inc");
?>