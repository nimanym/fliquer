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
echo "Contenido de \$_GET:\n";
print_r($_GET);
echo "\n";
echo "Contenido de \$_POST:\n";
print_r($_POST);
echo "\n";
echo "Contenido de \$_REQUEST:\n";
print_r($_REQUEST);
?>
</pre>
<p>
Incluyendo estas palabras: <b><?php echo $_POST["incluir"];?></b>
<br />
Evitando estas palabras: <b><?php echo $_POST["evitar"];?></b>
<br />
Fecha desde <b><?php echo $_POST["desde"];?>
</b> hasta <b><?php echo $_POST["hasta"];?></b>
<br />
País: <b><?php echo $_POST["pais"];?></b>
</p>
</body>
</html>