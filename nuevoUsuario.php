<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Registro - Fliquer";
$nombre = "Registro";

require_once("cabecera.inc");

if(isset($_SESSION['nombreUsu'])){
	header('Location: index.php');
}

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

<form action="register.php" method="post" id="formularioRegistro">
	<h2>Registrarse</h2>
	Nombre de usuario: <br><input required type="text" name="nombreUsuario" id="nombreUsuario"><br>
	Contraseña: <br><input required type="password" name="password1" id="password1"> <br>
	Verificar contraseña: <br><input required type="password" name="password2" id="password2"><br>
	E-mail: <br><input required type="email" name="email" id="email"><br>
	Fecha de nacimiento: <br><input required type="date" name="fechaNacimiento" id="fechaNacimiento"><br>
	Pais: <br>


	<select name="pais" id="pais">  

       <option value="" selected="selected"></option>
		<?php
		while($nomPaises = mysqli_fetch_assoc($resultado)) {
			echo '<option value="' . $nomPaises['NomPais'] . '">' . $nomPaises['NomPais'] . '</option>';
		}
		?>
    </select>

    <br>


	Sexo: <br />
	<input type="radio" checked name="sexo" value="hombre" id="sexoHombre">Hombre<br>
	<input type="radio" name="sexo" value="mujer" id="sexoMujer">Mujer<br>

	<br />
	<input type="button" value="Enviar" onClick="enviarRegistro()" />
</form>


<?php

// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

require_once("footer.inc");
?>