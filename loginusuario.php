<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script type="text/javascript"  href="js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.jpg" id="logo">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.jpg">
		</a>
	</header>
	<section>
	<form id="formulario" method="post" action="./login/verificar.php">
		<?php 
		if(isset($_GET['error'])){
			echo '<center>Datos No Validos</center>';
		}
		?>
		<label for="usuario">Usuario</label><br>
		<input type="text" id="usuario" name="Usuario" placeholder="usuario" ><br>
		<label for="password">Password</label><br>
		<input type="password" id="password" name="Password" placeholder="password" ><br>
		<input type="submit" name="aceptar" value="Aceptar" class="aceptar">
    </form>
    
    <br/>
	<br/>
	<center><a href="./">Ver catalogo</a></center>
	</section>
</body>
</html>