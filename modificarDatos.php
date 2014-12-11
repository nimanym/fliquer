<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Modificar datos - Fliquer";
$nombre = "Modificar datos";

require_once("cabecera.inc");

if(!isset($_SESSION['nombreUsu'])){
	header('Location: nuevoUsuario.php');
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




// Ejecuta una sentencia SQL
$sentencia = 'SELECT * FROM usuarios WHERE usuarios.NomUsuario = "' . $_SESSION['nombreUsu'] . '"';
if(!($resultado = @mysqli_query($link, $sentencia))) {
echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
echo '</p>';
exit;
}

// Recorre el resultado y lo muestra en forma de tabla HTML
while($fila = mysqli_fetch_assoc($resultado)) {

	echo '<h2>' . 'Datos de ' .  $fila['NomUsuario'] . '</h2>';

	echo '<p>' . 'Nombre de usuario: ' .  $fila['NomUsuario'] . '</p>';
	echo '<p>' . 'Contraseña: ******** </p>';
	echo '<p>' . 'Email: ' .  $fila['Email'] . '</p>';

	if($fila['Sexo'] == 0){
		echo '<p>' . 'Sexo: Hombre' . '</p>';
	}else{
		echo '<p>' . 'Sexo: Mujer' . '</p>';
	}

	echo '<p>' . 'Fecha de nacimiento: ' .  $fila['FNacimiento'] . '</p>';
	if($fila['Ciudad'] != ''){
		echo '<p>' . 'Ciudad: ' .  $fila['Ciudad'] . '</p>';
	}

	if ($fila['Pais']!=''){
		$sentencia = 'SELECT NomPais FROM paises WHERE IdPais=' . $fila['Pais'];
		if(!($resultadoPais = @mysqli_query($link, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
			echo '</p>';
			exit;
		}
		while($filaP = mysqli_fetch_assoc($resultadoPais)){
			echo '<p>' . 'Pais: ' . $filaP['NomPais'] . '</p>';
		}
	}

	echo '<p>' . 'Fecha de registro: ' .  $fila['FRegistro'] . '</p>';
}



// Ejecuta una sentencia SQL
$sentencia = 'SELECT NomPais FROM paises';
if(!($resultado = @mysqli_query($link, $sentencia))) {
	echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
	echo '</p>';
	exit;
}

?>

<form action="respuestaModificarDatos.php" method="post" id="formularioDatos" enctype="multipart/form-data" >
	<h2>Modificar datos</h2>
	Nombre de usuario: <br><input required type="text" name="nombreUsuario" id="nombreUsuario" value="<?php $fila['NomUsuario'] ?>"><br>
	Contraseña: <br><input required type="password" name="password1" id="password1"> <br>
	Verificar contraseña: <br><input required type="password" name="password2" id="password2"><br>
	E-mail: <br><input required type="email" name="email" id="email"><br>
	Fecha de nacimiento: <br><input required type="date" name="fechaNacimiento" id="fechaNacimiento"><br>
	Ciudad: <br><input type="text" name="ciudad" id="ciudad"><br>
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

	<br>
	Foto: <input type="file" name="fichero" /><br>

	<br />
	<input type="button" value="Enviar" onClick="enviarCambioDatos()" />
</form>

<p><a onClick="if(aviso()==false)return false;" href="menuregistrado.php">Volver</a></p>


<?php


// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

require_once("footer.inc");
?>