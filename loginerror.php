<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Error - Fliquer";
$nombre = "Error";

require_once("cabecera.inc");

?>

<h2>ERROR. No se reconoce el usuario/contraseña.</h2>
<p>
<input type="button" value="Volver" onclick=" location.href='index.php' " />
</p>
<?php
require_once("footer.inc");
?>