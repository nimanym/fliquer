<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Página principal - Fliquer";
$nombre = "Fliquer";

require_once("cabecera.inc");

?>

<p> Fotos Recientes </p>

<div class="home">

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
$sentencia = 'SELECT * FROM fotos ORDER BY FRegistro DESC LIMIT 0,5 ';
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

echo '<td>' . '<a href="detallefoto.php?foto='. $fila['IdFoto'] .'" > <img src="img\\' . $fila['Fichero'] . '" height=250></a></td>';
echo '<td>' . $fila['Titulo'] . '</td>';
echo '<td>' . $fila['Fecha'] . '</td>';

if ($fila['Pais']!=''){
		$sentencia = 'SELECT NomPais FROM paises WHERE IdPais=' . $fila['Pais'];
		if(!($resultadoPais = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		while($filaP = mysqli_fetch_assoc($resultadoPais)){
				echo '<td>' . $filaP['NomPais'] . '</td>';
	}
}
else echo '<td></td>';

echo '<td>' . $fila['FRegistro'] . '</td>';
echo '</tr>';
}
echo '</table>';






if(($fichero = @file("seleccion.txt")) == false)
{
	echo "No se ha podido abrir el fichero";
}
else
{
	$numSelecciones=(count($fichero)+1)/3;
	$sorteo=rand()%$numSelecciones;

	$IdFotoSelec=$fichero[$sorteo*3];
	$NomUsuSelec=$fichero[$sorteo*3+1];
	$DescripSelec=$fichero[$sorteo*3+2];


	$sentencia = 'SELECT Fichero FROM fotos WHERE IdFoto=' . $IdFotoSelec;
		if(!($resultado = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		while($filaP = mysqli_fetch_assoc($resultado)){
				$ficheroSelec=$filaP['Fichero'];
	}

	echo '<a href="detallefoto.php?foto='. $fila['IdFotoSelec'] .'" > <img src="img\\' . $ficheroSelec . '" height=350></a>';

	echo '<br/>';
	echo htmlspecialchars($NomUsuSelec);
	echo '<br/>';
	echo htmlspecialchars($DescripSelec);
	echo '<br/>';

}



// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

?>

</div>



<p>Algunas fotos</p>

	<div class="home">

		<a href="detallefoto.php?foto=1" ><img src="img/bear_thumb.jpg" alt="Bear" ></a>
		<a href="detallefoto.php?foto=chick_thumb.jpg&nombre=pollito&fecha=11/10/2002&pais=Francia&descripcion=Una pollito&uploader=Alberto" ><img src="img/chick_thumb.jpg" alt="Chicken" ></a>
		<a href="detallefoto.php?foto=sunflower.jpg&nombre=Girasol&fecha=10/10/2042&pais=Italia&descripcion=Una flor&uploader=Nima" ><img src="img/sunflower_thumb.jpg" alt="Girasol" ></a>
		<a href="detallefoto.php?foto=lincoln_thumb.jpg&nombre=Abraham Lincoln&fecha=24/9/2002&pais=Espana&descripcion=Presidente&uploader=Alberto" ><img src="img/lincoln_thumb.jpg" alt="Presi" ></a>
		<a href="detallefoto.php?foto=kitty_thumb.jpg&nombre=Gatito&fecha=2/9/2012&pais=EEUU&descripcion=Un gatito&uploader=Nima" ><img src="img/kitty_thumb.jpg" alt="Cat" ></a>
		<a href="detallefoto.php?foto=doge_thumb.jpg&nombre=Much doge&fecha=16/5/1993&pais=Italia&descripcion=DOGEE&uploader=Alberto" ><img src="img/doge_thumb.jpg" alt="Doge" ></a>

		<a href="detallefoto.php?foto=1" ><img src="img/bear_thumb.jpg" alt="Bear" ></a>
		<a href="detallefoto.php?foto=chick_thumb.jpg&nombre=pollito&fecha=11/10/2002&pais=Francia&descripcion=Una pollito&uploader=Alberto" ><img src="img/chick_thumb.jpg" alt="Chicken" ></a>
		<a href="detallefoto.php?foto=sunflower.jpg&nombre=Girasol&fecha=10/10/2042&pais=Italia&descripcion=Una flor&uploader=Nima" ><img src="img/sunflower_thumb.jpg" alt="Girasol" ></a>
		<a href="detallefoto.php?foto=lincoln_thumb.jpg&nombre=Abraham Lincoln&fecha=24/9/2002&pais=Espana&descripcion=Presidente&uploader=Alberto" ><img src="img/lincoln_thumb.jpg" alt="Presi" ></a>
		<a href="detallefoto.php?foto=kitty_thumb.jpg&nombre=Gatito&fecha=2/9/2012&pais=EEUU&descripcion=Un gatito&uploader=Nima" ><img src="img/kitty_thumb.jpg" alt="Cat" ></a>
		<a href="detallefoto.php?foto=doge_thumb.jpg&nombre=Much doge&fecha=16/5/1993&pais=Italia&descripcion=DOGEE&uploader=Alberto" ><img src="img/doge_thumb.jpg" alt="Doge" ></a>

   </div>
<?php
require_once("footer.inc");
?>