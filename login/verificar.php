<?php
session_start();
include "../conexion.php";

$Usuario = $_POST['Usuario']; 
$Password = $_POST['Password'];

$query = "SELECT * FROM usuarios WHERE Usuario='".$_POST['Usuario']."' AND 
Password='".$_POST['Password']."'" or die(PDO::errorInfo());

$statement = $dbConn->prepare($query);
$statement->bindValue(':Usuario', $Usuario, PDO::PARAM_STR);
$statement->bindValue(':Password', $Password, PDO::PARAM_STR);


$statement->execute();
$row_count = $statement->rowCount();

echo $row_count;

if(isset($query)){
	$_SESSION['Usuario']=$query;
	header("Location: ../carritodecompras.php");
}else{
	header("Location: ../login.php?error=datos no validos");
}

?>