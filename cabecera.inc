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

<script type="text/javascript">

function abrirDesplegable() {

	if(document.getElementById("formularioLogin").style.display == "block"){
		document.getElementById("formularioLogin").style.display = "none";
	}else{
		document.getElementById("formularioLogin").style.display = "block";
	}	
}

function cerrarDesplegable() {

	document.getElementById("formularioLogin").style.display = "none";
	
}

function salir() {
	document.getElementById("formularioLogin").submit();
}

</script>

</head>
<!-- El cuerpo -->
<body onload="cargaEstilo()" >

<nav>
	<ul id="navWrapper">
		<li><a href="index.php">Fliquer</a></li>
		<li><a href="nuevoUsuario.php">Nuevo usuario</a></li>
		<li><a href="formulariobusqueda.php">Búsqueda</a></li>
		<li><a class="login" href="#" onclick="abrirDesplegable()" >Iniciar Sesión</a>

			<?php
			if(isset($_COOKIE['PHPSESSID'])){
				session_start();
			?>
				<form action="logout.php" method="post" id="formularioLogin" class="formLoginDesp" >
				<h2>Hola</h2>
					<p><?php echo $_SESSION['nombreUsu']; ?> </p>
					<p>Tu último login fue el <?php echo $_SESSION['fechaUltima']; ?> </p>

					<input type="button" value="Enviar" onClick="enviar()" />

					<input type="button" value="Salir" onClick="salir()" />

				</form>
			<?php
			}else{
			?>

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