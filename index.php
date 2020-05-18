<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
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
		<a href="./mostrarCarrito.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.jpg">
		</a>
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="index.php">Inicio</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="login/cerrar.php" >Salir de la sesion</a></li>
		<li>
          <a class="nav-link glyphicon glyphicon-log-in btn btn-primary m-1" data-toggle="modal" data-target="#modalContactForm" href="#">Registro</a>
        </li>
	  </menu>
	</nav>

	<!-- Formulario de registro -->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Registrese</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3" >
    <form action="login/guardar.php" method="POST">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form34" name="login" required="" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34" required>Nombre</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form34" name="apellido" required="" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34" required>Apellido</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="form29" name="email" required="" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form29" required>Correo</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password" required="" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass" required>Contraseña</label>
        </div>
       <div class="form-check form-check-inline ml-4">
            <input type="radio" name="sexo" class="form-check-input" value="h" />
               <label class="form-check-label">Hombre</label>
        </div>
        <div class="form-check form-check-inline ml-4">
            <input type="radio" name="sexo" class="form-check-input" value="m" />
                <label class="form-check-label">Mujer</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique"><input type="submit" value="Guardar"><i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>

<?php
include_once 'global/config.php';
include_once 'carrito.php';
include_once 'global/conexion.php';

if($mensaje!='') { 
?>

<!--Este archivo es la pantalla principal del proyecto, hace una seleccion de la tabla productos y los muestra -->

<br>
<div class="alert alert-success">
    <?php echo $mensaje; ?>
    <a href="mostrarCarrito.php" class="badge">Ver carrito</a>
</div>
<?php } ?>
<div class="row">
    <?php
        $Conexion = Conexion::conectar();
        $select  = $Conexion -> prepare( 'select * from productos');
        $select -> execute();
        $lista = $select -> fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php
        foreach($lista as $producto) {
    ?>
    <div class="col-3">
        <div class="card">
            <img title="<?php echo $producto['nombre'] ?>" class="card-img-top" src="./productos/<?php echo $producto['imagen']; ?>"
                data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion']; ?>">
            <div class="card-body text-center">
                <span><?php echo $producto['nombre']; ?></span>
                <h5 class="card-title"><?php echo $producto['precio']; ?></h5>
                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                    <button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar">Agregar al carrito</button>
                </form>   
            </div>
        </div><br>
    </div>
   
    <?php 
        } 
    ?>
</div>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
</script>