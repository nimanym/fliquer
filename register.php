<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Respuesta formulario</title>
</head>
<body>
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

if (strcmp($sexo,"hombre"==0)){
$genero=0;
}
else if (strcmp($sexo,"mujer"==0)){
$genero=1;	
}

$stamp = new DateTime();

if(preg_match($letrasynumeros, $nombreUsuario)&&!ctype_space ($nombreUsuario)&&$nombreUsuario!=""){
	if(strlen($nombreUsuario)>=3&&strlen($nombreUsuario)<=15){
		if(preg_match($letrasynumerossub, $password1)&&!ctype_space ($password1)&&$password1!=""){
			if(strlen($password1)>=6&&strlen($password1)<=15){
				if(strcmp($password1,$password2)==0){
					if(preg_match($pass, $password1)){
						if(preg_match($emailreg, $email)&&!ctype_space ($email)&&$email!=""){
							if(!ctype_space ($sexo)&&$sexo!=""){
								if($fechaNacimiento!="Invalid Date"){
									$sentencia = "INSERT INTO usuarios VALUES (null, ". $nombreUsuario .", " . $password1. ", " . $email. ", " . $genero. ", " . $fechaNacimiento. ", " . "". ", " . $_POST['pais']. ", " . "". ", " . $stamp->getTimestamp() . ")";
									echo $sentencia;
									if(!mysqli_query($iden, $sentencia))
									die("Error: no se pudo realizar la inserción");
									echo 'Se ha insertado un nuevo usuario en la base de datos';
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
<p>
Nombre de usuario: <b><?php echo $_POST["nombreUsuario"];?></b>
<br />
Contraseña: <b><?php echo $_POST["password1"];?></b>
<br />
Verificar contraseña: <b><?php echo $_POST["password2"];?></b>
<br />
E-mail: <b><?php echo $_POST["email"];?></b>
<br />
Fecha de nacimiento: <b><?php echo $_POST["fechaNacimiento"];?></b>
<br />
Sexo: <b><?php echo $_POST["sexo"];?></b>
</p>
</body>
</html>