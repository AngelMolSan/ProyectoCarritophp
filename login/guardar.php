<?php
require_once "../conexion.php";

	$login=$_POST['login'];
	$password=$_POST['password'];

	$insert=$dbConn->prepare('INSERT INTO usuarios (usuario, password) VALUES(:login,:password)');

	$insert->bindParam(':login',$login);
	$insert->bindParam(':password',$password);

	if($insert->execute()){
		echo "datos almacenados";
	}else{
		echo "Error no se pudo almacenar los datos";
	}

echo '<br><a href="../index.php" title="ir al listado">Página principal</a></br>';
?>