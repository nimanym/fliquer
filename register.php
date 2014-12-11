<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Registro completado - Fliquer";
$nombre = "Registro completado";

require_once("cabecera.inc");
?>

<pre>

<?php

if(!($iden = mysqli_connect("localhost", "root", "")))
die("Error: No se pudo conectar");
if(!mysqli_select_db($iden, "pibd"))
die("Error: No existe la base de datos");

$letrasynumeros = ("/^[0-9A-Za-z]+$/");
$letrasynumerossub = ("/^[A-Za-z0-9_]+$/");
$pass = ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/");
$emailreg = ("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/");
$nombreUsuario = ($_POST['nombreUsuario']);
$password1 = ($_POST['password1']);
$password2 = ($_POST['password2']);
$email = ($_POST['email']);
$sexo = ($_POST['sexo']);
$fechaNacimiento=($_POST['fechaNacimiento']);
$ciudad = ($_POST['ciudad']);
$paisNombre = ($_POST['pais']);
$paisId="";
$id_foto="";

if ($paisNombre!=''){
		$sentencia = 'SELECT IdPais FROM paises WHERE NomPais="' . $paisNombre . '"';
		if(!($resultadoPais = @mysqli_query($iden, $sentencia))) {
			echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($iden);
			echo '</p>';
			exit;
		}
		while($filaP = mysqli_fetch_assoc($resultadoPais)){
				$paisId=$filaP['IdPais'];
	}
}

if($_FILES["fichero"]["error"]){
	//echo "ERROR: " . $_FILES["fichero"]["error"];
}
else
{
	$id_foto = rand() . $_FILES["fichero"]["name"];

	if(move_uploaded_file($_FILES["fichero"]["tmp_name"], "C:\\xampp\\htdocs\\fliquer\\img\\fotosUsuarios\\" . $id_foto))
	{
		//echo "Se ha subido bien: " . $_FILES["fichero"]["error"];
	}
	else
	{
		//echo "NO se ha subido bien: " . $_FILES["fichero"]["error"];
	}
}

if (strcmp($sexo,"hombre"==0)){
$genero=0;
}
else if (strcmp($sexo,"mujer"==0)){
$genero=1;	
}

$stamp = date("Y-m-d H:i:s");

if(preg_match($letrasynumeros, $nombreUsuario)&&!ctype_space ($nombreUsuario)&&$nombreUsuario!=""){
	if(strlen($nombreUsuario)>=3&&strlen($nombreUsuario)<=15){
		if(preg_match($letrasynumerossub, $password1)&&!ctype_space ($password1)&&$password1!=""){
			if(strlen($password1)>=6&&strlen($password1)<=15){
				if(strcmp($password1,$password2)==0){
					if(preg_match($pass, $password1)){
						if(preg_match($emailreg, $email)&&!ctype_space ($email)&&$email!=""){
							if(!ctype_space ($sexo)&&$sexo!=""){
								if($fechaNacimiento!="Invalid Date"){
									$sentencia = "INSERT INTO usuarios VALUES (NULL, '". $nombreUsuario ."', '" . $password1. "', '" . $email. "', '" . $genero. "', '" . $fechaNacimiento. "',  '" . $ciudad . "', '" . $paisId . "',  '" . $id_foto . "', '" . $stamp . "')";
									
									if(!mysqli_query($iden, $sentencia)){
										die("Error: no se pudo realizar la inserción");
									}else{
										echo 'Felicidades! Te has registrado en Fliquer!';
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

mysqli_close($iden);

?>

</pre>
<input type="button" value="Volver" onclick=" location.href='index.php' " />
</p>

<?php
require_once("footer.inc");
?>