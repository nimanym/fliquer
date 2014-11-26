<!DOCTYPE html>
<html lang="es">
<!-- La cabecera -->
<head>
<link rel="stylesheet" type="text/css" href="style.css" title="Estilo principal" />
<link rel="alternate stylesheet" type="text/css" href="accesible.css" title="Estilo accesible" />
<link rel="alternate stylesheet" type="text/css" href="alter.css" title="Estilo alternativo" />
<link rel="stylesheet" type="text/css" href="print.css" media="print" />

<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>

<meta charset="UTF-8" />
<meta name="generator" content="Bloc de notas" />
<meta name="author" content="Alberto Salieto - Nima Ledgard" />
<meta name="keywords" content="HTML5, web" />
<meta name="description" content="Base" />

<title><?php echo $title; ?></title>

<script src="cambioEstilos.js"></script>
<script src="validacion.js"></script>
<script src="envio.js"></script>

</head>
<!-- El cuerpo -->
<body onload="cargaEstilo()" >

<?php

	session_start();

	if(isset($_COOKIE['recordar'])){

		if(!isset($_SESSION['nombreUsu'])){
			header('Location: index.php');
		}
		$_SESSION['nombreUsu'] = $_COOKIE['recordar'];
		$_SESSION['passwordUsu'] = "";
		$t = time();
		$_SESSION['fechaUltima'] = date("d-m-Y",$t);
	}

?>

<nav>
	<ul id="navWrapper">
		<li><a href="index.php">Fliquer</a></li>

		<?php
			if(!isset($_SESSION['nombreUsu'])){

			?>

				<li><a href="nuevoUsuario.php">Nuevo usuario</a></li>

			<?php
				}
			?>
		
		<li><a href="formulariobusqueda.php">Búsqueda</a></li>
		<?php
			if(isset($_SESSION['nombreUsu'])){
				//session_start();	
			?>

				<li>

				<a class="login" href="#" onclick="abrirDesplegable()" > <?php echo $_SESSION['nombreUsu'] ?></a>
				<form action="logout.php" method="post" id="formularioLogin" class="formLoginDesp" >
					<h2>Hola</h2>
					<p><?php echo $_SESSION['nombreUsu']; ?> </p>
					<p>Tu último login fue el <?php echo $_SESSION['fechaUltima']; ?> </p>

					<input type="button" value="Ver perfil" onclick=" location.href='menuregistrado.php' " />
					<input type="button" value="Salir" onclick=" location.href='logout.php' " />
				</form>

			<?php
			}else{
			?>

				<li><a class="login" href="#" onclick="abrirDesplegable()" >Iniciar Sesión</a>

				<form action="login.php" method="post" id="formularioLogin" class="formLoginDesp" >
					<h2>Acceder</h2>
					<p>Usuario: <br /><input type="text" name="user" id="user"></p>
					<p>Contraseña: <br /><input type="password" name="password" id="password"></p>
					<p><input type="checkbox" name="recordarLogin" id="recordarLogin" /> Recordarme</p>

					<input type="button" value="Enviar" onClick="enviar()" />
				</form>

			<?php
			}
			?>
				</li>

		<li class="tema">
			<select id="selectorEstilo" onchange="estilo()">
				<option value="Estilo principal">Principal</option>
				<option value="Estilo alternativo">Alternativo</option>
				<option value="Estilo accesible">Accesible</option>
			</select>
		</li>
	</ul>
</nav>
<hr/>
<br/>

<h1 class="titulo">
	<?php echo $nombre; ?>
</h1>