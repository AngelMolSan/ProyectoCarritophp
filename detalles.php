<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-3.5.0.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.jpg" id="logo">
		<a href="./carritoinvitado.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.jpg">
		</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
		//$re=mysql_query("select * from productos where id=".$_GET['id'])or die(mysql_error());

		$stmt = $dbConn->query('SELECT * FROM productos where id='.$_GET['id']);

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	?>
			
			<center>
				<img src="./productos/<?php echo $row['imagen'];?>"><br>
				<span><?php echo $row['nombre'];?></span><br>
				<span>Precio: <?php echo $row['precio'];?></span><br>
				<a href="./carritoinvitado.php?id=<?php  echo $row['id'];?>">Añadir al carrito de compras</a>
			</center>
		
	<?php
		}
	?>
		</br>
		<center><a href="./">Ver catalogo</a></center>

		
	</section>
</body>
</html>