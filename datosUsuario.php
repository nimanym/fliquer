<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Datos de usuario - Fliquer";
$nombre = "Datos de usuario";

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


	echo '<p><img src="img\\fotosUsuarios\\' . $fila['Foto'] . '" height="150"></p>';

	echo '<p>' . 'Nombre de usuario: ' .  $fila['NomUsuario'] . '</p>';
	echo '<p>' . 'Contraseña: ********' . '</p>';
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

?>

<br />
<p><a href="modificarDatos.php">Modificar datos</a></p>
<br />

<br />
<p><a href="menuregistrado.php">Volver</a></p>
<br />



<?php

// Libera la memoria ocupada por el resultado
mysqli_free_result($resultado);
// Cierra la conexión
mysqli_close($link);

require_once("footer.inc");
?>