<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Resultado de búsqueda - Fliquer";
$nombre = "Resultado de búsqueda";

require_once("cabecera.inc");

?>

<script src="ordenartabla.js"></script>
<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>

<p>
Se han encontrado 4 resultados con los siguientes criterios:
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

<table>
  <thead>
  <tr>
    <th>Foto</th>
    <th>Título</th>		
    <th>Fecha</th>
    <th>País</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td><img src="img/bear_thumb.jpg" alt="Un oso" style="width:256px;height:256px"></td>
    <td>Oso</td>
    <td>1992/02/09</td>		
    <td>Noruega</td>
  </tr>
  <tr>
    <td><img src="img/chick_thumb.jpg" alt="Un pollito" style="width:256px;height:256px"></td>
    <td>Pollito</td>
    <td>2012/12/19</td>
    <td>China</td>
  </tr>
  <tr>
    <td><img src="img/sunflower_thumb.jpg" alt="Un girasol" style="width:256px;height:256px"></td>
    <td>Girasol</td>
    <td>2002/10/10</td>
    <td>Italia</td>
  </tr>
  <tr>
    <td><img src="img/lincoln_thumb.jpg" alt="Abraham Lincoln" style="width:256px;height:256px"></td>
    <td>Abraham Lincoln</td>
    <td>1872/01/11</td>
    <td>Estados Unidos</td>
  </tr>
</tbody>
</table>

<?php
require_once("footer.inc");
?>