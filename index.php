<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Página principal - Fliquer";
$nombre = "Fliquer";

require_once("cabecera.inc");

?>

<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>
<script type="text/javascript">

function enviar() {

	var usuario = document.getElementById("user").value;
	var contrasenya = document.getElementById("password").value;
	var recordarLogin = document.getElementById("recordarLogin").value;

	usuario = usuario.replace(/\s/g,'');
	contrasenya = contrasenya.replace(/\s/g,'');

	if(usuario==""){
		alert("No has introducido el usuario");
		return;
	}

	if(contrasenya==""){
		alert("No has introducido la contraseña");
		return;
	}

	document.getElementById("formularioLogin").submit();

}

</script>

<p> Fotos Recientes </p>
	<div class="home">

		<a href="detallefoto.php?foto=img/bear_thumb.jpg&nombre=Oso&fecha=10/10/2002&pais=Italia&descripcion=Un oso&uploader=Nima"><img src="img/bear_thumb.jpg" alt="Bear" ></a>
		<a href="detallefoto.php?foto=chick_thumb.jpg&nombre=pollito&fecha=11/10/2002&pais=Francia&descripcion=Una pollito&uploader=Alberto"><img src="img/chick_thumb.jpg" alt="Chicken" ></a>
		<a href="detallefoto.php?foto=sunflower.jpg&nombre=Girasol&fecha=10/10/2042&pais=Italia&descripcion=Una flor&uploader=Nima"><img src="img/sunflower_thumb.jpg" alt="Girasol" ></a>
		<a href="detallefoto.php?foto=lincoln_thumb.jpg&nombre=Abraham Lincoln&fecha=24/9/2002&pais=Espana&descripcion=Presidente&uploader=Alberto"><img src="img/lincoln_thumb.jpg" alt="Presi" ></a>
		<a href="detallefoto.php?foto=kitty_thumb.jpg&nombre=Gatito&fecha=2/9/2012&pais=EEUU&descripcion=Un gatito&uploader=Nima"><img src="img/kitty_thumb.jpg" alt="Cat" ></a>
		<a href="detallefoto.php?foto=doge_thumb.jpg&nombre=Much doge&fecha=16/5/1993&pais=Italia&descripcion=DOGEE&uploader=Alberto"><img src="img/doge_thumb.jpg" alt="Doge" ></a>


				<img src="img/bear_thumb.jpg" alt="Un oso" >
		<img src="img/chick_thumb.jpg" alt="Un pollito" >
		<a href="detallefoto.php"><img src="img/sunflower_thumb.jpg" alt="Un girasol" ></a>
		<img src="img/lincoln_thumb.jpg" alt="Abraham Lincoln" >
		<img src="img/kitty_thumb.jpg" alt="Gatito" >
		<img src="img/doge_thumb.jpg" alt="Much doge" >

				<img src="img/bear_thumb.jpg" alt="Un oso" >
		<img src="img/chick_thumb.jpg" alt="Un pollito" >
		<a href="detallefoto.php"><img src="img/sunflower_thumb.jpg" alt="Un girasol" ></a>
		<img src="img/lincoln_thumb.jpg" alt="Abraham Lincoln" >
		<img src="img/kitty_thumb.jpg" alt="Gatito" >
		<img src="img/doge_thumb.jpg" alt="Much doge" >

				<img src="img/bear_thumb.jpg" alt="Un oso" >
		<img src="img/chick_thumb.jpg" alt="Un pollito" >
		<a href="detallefoto.php"><img src="img/sunflower_thumb.jpg" alt="Un girasol" ></a>
		<img src="img/lincoln_thumb.jpg" alt="Abraham Lincoln" >
		<img src="img/kitty_thumb.jpg" alt="Gatito" >
		<img src="img/doge_thumb.jpg" alt="Much doge" >

				<img src="img/bear_thumb.jpg" alt="Un oso" >
		<img src="img/chick_thumb.jpg" alt="Un pollito" >
		<a href="detallefoto.php"><img src="img/sunflower_thumb.jpg" alt="Un girasol" ></a>
		<img src="img/lincoln_thumb.jpg" alt="Abraham Lincoln" >
		<img src="img/kitty_thumb.jpg" alt="Gatito" >
		<img src="img/doge_thumb.jpg" alt="Much doge" >

   </div>
   



<?php
require_once("footer.inc");
?>