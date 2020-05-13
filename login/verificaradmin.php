<?php
session_start();
include "../conexion.php";

$administrador = $_POST['administrador']; 
$Password = $_POST['Password'];

$admin = "SELECT * FROM usuarios WHERE administrador='".$_POST['administrador']."' AND 
Password='".$_POST['Password']."'" or die(PDO::errorInfo());

$statement = $dbConn->prepare($admin);
$statement->bindValue(':administrador', $administrador, PDO::PARAM_STR);
$statement->bindValue(':Password', $Password, PDO::PARAM_STR);


$statement->execute();
$row_count = $statement->rowCount();

echo $row_count;

if(isset($admin)){
    $_SESSION['Usuario']=$admin;
	header("Location: ../admin.php");
}else{
	header("Location: ../login.php?error=datos no validos");
}

?>