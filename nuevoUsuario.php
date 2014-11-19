<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Registro - Fliquer";
$nombre = "Registro";

require_once("cabecera.inc");

?>


<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>

<script type="text/javascript">

function enviar() {
	
	var nombreUsuario = document.getElementById("nombreUsuario").value;
	var password1 = document.getElementById("password1").value;
	var password2 = document.getElementById("password2").value;
	var email = document.getElementById("email").value;	

	var fechaNacimiento = new Date(document.getElementById("fechaNacimiento").value);
	var diaNacimiento = parseInt(fechaNacimiento.getDate());
	var mesNacimiento = parseInt(fechaNacimiento.getMonth());
	var anyoNacimiento = parseInt(fechaNacimiento.getFullYear());

	var fechaHoy = new Date();
	var diaHoy = parseInt(fechaHoy.getDate());
	var mesHoy = parseInt(fechaHoy.getMonth());
	var anyoHoy = parseInt(fechaHoy.getFullYear());

	document.getElementById("nombreUsuario").style.background = 'white';
	document.getElementById("password1").style.background = 'white';
	document.getElementById("password2").style.background = 'white';
	document.getElementById("email").style.background = 'white';
	document.getElementById("fechaNacimiento").style.background = 'white';

	if(esEspacios(nombreUsuario)){
		document.getElementById("nombreUsuario").style.background = 'Crimson';
		alert("No has introducido el usuario");
		return;
	}

	if(!esLetrasyNumeros(nombreUsuario)){
		document.getElementById("nombreUsuario").style.background = 'Crimson';
		alert("Nombre de usuario incorrecto. Sólo se permiten letras y números");
		return;
	}

	if(!esLongitud(nombreUsuario, 3, 15)){
		document.getElementById("nombreUsuario").style.background = 'Crimson';
		alert("Nombre de usuario incorrecto. Tiene que tener entre 3 y 15 carácteres");
		return;
	}

	if(esEspacios(password1)){
		document.getElementById("password1").style.background = 'Crimson';
		alert("No has introducido la contraseña");
		return;
	}

	if(!esLetrasyNumerosSub(password1)){
		document.getElementById("password1").style.background = 'Crimson';
		alert("Contraseña incorrecta. Sólo se permiten letras, números y subrayado");
		return;
	}

	if(!esLongitud(password1, 6, 15)){
		document.getElementById("password1").style.background = 'Crimson';
		alert("Contraseña incorrecta. Tiene que tener entre 6 y 15 carácteres");
		return;
	}

	if(!contieneMayMinNum(password1)){
		document.getElementById("password1").style.background = 'Crimson';
		alert("Contraseña incorrecta. Tiene que contener al menos una letra mayúscula, una minúscula y un número");
		return;
	}

	if(esEspacios(password2)){
		document.getElementById("password2").style.background = 'Crimson';
		alert("No has introducido la confirmación de contraseña");
		return;
	}

	if(!(password1==password2)){
		document.getElementById("password2").style.background = 'Crimson';
		alert("Las contraseñas no coinciden");
		return;
	}

	if(esEspacios(email)){
		document.getElementById("email").style.background = 'Crimson';
		alert("No has introducido el correo");
		return;
	}

	if(!esEmail(email)){
		document.getElementById("email").style.background = 'Crimson';
		alert("La dirección de correo no es válida");
		return;
	}

	if(fechaNacimiento=="Invalid Date"){
		document.getElementById("fechaNacimiento").style.background = 'Crimson';
		alert("No has introducido la fecha");
		return;
	}

	if(fechaNacimiento > fechaHoy){
		document.getElementById("fechaNacimiento").style.background = 'Crimson';
		alert("Fecha inválida");
		return;
	}
	document.getElementById("formularioRegistro").submit();
}

</script>

<form action="register.php" method="post" id="formularioRegistro">
	<h2>Registrarse</h2>
	Nombre de usuario: <br><input required type="text" name="nombreUsuario" id="nombreUsuario"><br>
	Contraseña: <br><input required type="password" name="password1" id="password1"> <br>
	Verificar contraseña: <br><input required type="password" name="password2" id="password2"><br>
	E-mail: <br><input required type="email" name="email" id="email"><br>
	Fecha de nacimiento: <br><input required type="date" name="fechaNacimiento" id="fechaNacimiento"><br>
	Sexo: <br />
	<input type="radio" checked name="sexo" value="hombre" id="sexoHombre">Hombre<br>
	<input type="radio" name="sexo" value="mujer" id="sexoMujer">Mujer<br>

	<br />
	<input type="button" value="Enviar" onClick="enviar()" />
</form>


<?php
require_once("footer.inc");
?>