<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Búsqueda de imágenes - Fliquer";
$nombre = "Búsqueda de imágenes";

require_once("cabecera.inc");

?>


<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>

<p>
¿Qué imágenes quieres encontrar?
</p>

<form action="resultadobusqueda.php" method="post">
  Incluyendo estas palabras: <br><input type="text" name="incluir" autofocus><br>
  Evitando estas palabras: <br><input type="text" name="evitar"><br>
  Fecha desde: <br><input type="date" name="desde"><br> hasta: <br><input type="date" name="hasta"><br>
  País: <br><input type="text" name="pais"><br>
  <input type="submit">
  
</form>


<?php
require_once("footer.inc");
?>