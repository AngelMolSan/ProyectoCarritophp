<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Carrito de la compra</title>
        <meta charset=”utf-8”/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link   rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
<body>
<div class="container">
      <!-- menu de navegacion-->
      <nav class="navbar bg-dark navbar-dark navbar-expand-sm fixed-top">
      <div class="container-fluid navbar-header">
        <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mostrarCarrito.php" >Carrito(<?php
                        echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                    ?>)</a>
            </li>
    </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
         <li >
          <a class="nav-link glyphicon glyphicon-user btn btn-primary m-1" data-toggle="modal" data-target="#modalLoginForm" href="#">Login</a>
        </li>
        <li>
          <a class="nav-link glyphicon glyphicon-log-in btn btn-primary m-1" data-toggle="modal" data-target="#modalContactForm" href="#">Registro</a>
        </li>
      </ul>
    </div>
    </nav>
    
<!-- Formulario de login -->
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
         <h4 class="modal-title w-100 font-weight-bold">Inicie sesion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body mx-3">
        <form>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email" required>Correo electronico</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass" required>Contraseña</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Iniciar</button>
      </div>
    </form>
    </div>
  </div>
</div>
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
        <form>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form34" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34" required>Nombre</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form34" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34" required>Apellido</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="form29" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form29" required>Correo</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
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
        <button class="btn btn-unique">Enviar <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>
    <div class="container">