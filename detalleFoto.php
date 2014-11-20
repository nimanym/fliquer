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


$foto=$_GET["foto"];

echo $foto;

$nombre=$_GET["nombre"];
$fecha=$_GET["fecha"];
$pais=$_GET["pais"];
$descripcion=$_GET["descripcion"];
$uploader=$_GET["uploader"];

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