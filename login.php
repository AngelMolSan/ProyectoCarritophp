<?php
    session_start();
    include 'global/conexion.php';
?>
    <br>
    <br>

<?php


if(isset($_GET['cerrar_sesion'])){
    session_unset(); 

    // destroy the session 
    session_destroy(); 
}

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: admin.php');
        break;

        case 2:
        header('location: carrito.php');
        break;

        default:
    }
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $Conexion = Conexion::conectar();
    $query = $Conexion->prepare('SELECT *FROM usuarios WHERE Nombre = :username AND password = :password');
    $query->execute(['username' => $username, 'password' => $password]);

    $row = $query->fetch(PDO::FETCH_NUM);

    if($row == true){
        $rol = $row[3];

        $_SESSION['rol'] = $rol;
        switch($rol){
            case 1:
            header('location: admin.php');
            break;

            case 2:
            header('location: carritodecompras.php');
            break;

            default:
        }
    }else{
        // no existe el usuario
        echo "Nombre de usuario o contraseña incorrecto";
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<link   rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<header>
		<img src="./imagenes/logo.jpg" id="logo">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.jpg">
		</a>
	</header>
	<section>
    <form id="formulario" action="#" method="POST">
		<label for="Nombre">Nombre</label><br>
		<input type="text" name="username"><br/>
		<label for="Password">Password</label><br>
        <input type="text" name="password"><br/>
        <input type="submit" value="Iniciar sesión">
	</form>
	<br/>
	<br/>
	<center><a href="./">Ver catalogo</a></center>
	</section>
</body>
</html>