<?php
// Título de la página, se muestra en <title> y en el cuerpo de la página con <h2>
$title = "Modificar datos - Fliquer";
$nombre = "Modificar datos";

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


if (strcmp($sexo,"hombre"==0)){
$genero=0;
}
else if (strcmp($sexo,"mujer"==0)){
$genero=1;	
}

$stamp = date("Y-m-d H:i:s");


/////////////////////////////////FICHEROS






/////////////////////////////////////////////////////


if(preg_match($letrasynumeros, $nombreUsuario)&&!ctype_space ($nombreUsuario)&&$nombreUsuario!=""){
	if(strlen($nombreUsuario)>=3&&strlen($nombreUsuario)<=15){
		if(preg_match($letrasynumerossub, $password1)&&!ctype_space ($password1)&&$password1!=""){
			if(strlen($password1)>=6&&strlen($password1)<=15){
				if(strcmp($password1,$password2)==0){
					if(preg_match($pass, $password1)){
						if(preg_match($emailreg, $email)&&!ctype_space ($email)&&$email!=""){
							if(!ctype_space ($sexo)&&$sexo!=""){
								if($fechaNacimiento!="Invalid Date"){
									$sentencia = "INSERT INTO usuarios VALUES (NULL, '". $nombreUsuario ."', '" . $password1. "', '" . $email. "', '" . $genero. "', '" . $fechaNacimiento. "',  '" . $ciudad . "', '" . $paisId . "', '/fotoE', '" . $stamp . "')";
									



									if(!mysqli_query($iden, $sentencia)){
										die("Error: no se pudo realizar la inserción");
									}else{


										echo 'Felicidades! Te has registrado en Fliquer!';


										$ruta = $_POST['fotosUsuarios']; // $serv . "index.php";

										if($ruta==trim("")){
											$mensaje = "<font color='#990000'>Ingrese un nombre de directorio</font>";
										} else {
											if(isset($ruta)){
												$ruta=str_replace(" ","_",$ruta); // reemplazamos los espacios vacios por guion bajo
												
												if(!file_exists($ruta))
												{
													mkdir ($ruta);
													$mensaje = "Se ha creado el directorio:<br /><b>$ruta</b>";
												} else {
													$mensaje = "<font color='#FF0000'>la ruta:<br /><b>" . $ruta . "</b><br />Ya existe </font>";
												}
											}
										}


										$msgError = array(0 => "No hay error, el fichero se subió con éxito",
															1 => "El tamaño del fichero supera la directiva
															upload_max_filesize el php.ini",
															2 => "El tamaño del fichero supera la directiva
															MAX_FILE_SIZE especificada en el formulario HTML",
															3 => "El fichero fue parcialmente subido",
															4 => "No se ha subido un fichero",
															6 => "No existe un directorio temporal",
															7 => "Fallo al escribir el fichero al disco",
															8 => "La subida del fichero fue detenida por la extensión");

										if($_FILES["fichero"]["error"] > 0)
										{
											echo "Error: " . $msgError[$_FILES["fichero"]["error"]] . "<br />";
										}
										else
										{
											echo "Nombre original: " . $_FILES["fichero"]["name"] . "<br />";
											echo "Tipo: " . $_FILES["fichero"]["type"] . "<br />";
											echo "Tamaño: " . ceil($_FILES["fichero"]["size"] / 1024) . " Kb<br />";
											echo "Nombre temporal: " . $_FILES["fichero"]["tmp_name"] . "<br />";
											
											if(file_exists($ruta . $_FILES["fichero"]["name"]))
											{
												echo $_FILES["fichero"]["name"] . " ya existe";
											}
											else
											{
												move_uploaded_file($_FILES["fichero"]["tmp_name"], $ruta . $_FILES["fichero"]["name"]);
												echo "Almacenado en: " . $ruta . $_FILES["fichero"]["name"];
												echo "<br />";
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