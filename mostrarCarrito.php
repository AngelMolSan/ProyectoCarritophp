<?php

include_once 'global/config.php';
include_once 'carrito.php';
include_once 'global/conexion.php';

   
    if(!empty($_SESSION['CARRITO'])) {
        $Conexion = Conexion::conectar();
        $select  = $Conexion -> prepare( 'select * from compras join productos where codigo_productos = id');
        $select -> execute();
        $lista = $select -> fetchAll(PDO::FETCH_ASSOC);
        
?>

<!--Este archivo es el que muestra el carrito, con todos los productos que hay en el pedido -->
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
<br>
<h3>Lista del carrito</h3>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%" class="text-center">Producto</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%"></th>
        </tr>
        <?php $total=0; ?>
        <?php foreach($lista as $producto) {?>
        <tr>
            <td width="40%" class="text-center"><?php echo $producto['nombre']; ?></td>
            <td width="15%" class="text-center"><?php echo $producto['cantidad']; ?>
            </td>
            <td width="20%" class="text-center"><?php echo $producto['precio']; ?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['precio']*$producto['cantidad'],2); ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $producto['id']; ?>">
                    <button class="btn btn-primary" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                </form>
            </td>
           
        </tr>
        <?php $total=$total+($producto['precio']*$producto['cantidad']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td><a class="btn btn-primary" href="global/salida.php">Generar Factura</a></td>
        </tr>
        <!--<tr>
            <td colspan="5">
                <form action="pagar.php" method="post">
                    <div class="alert alert-success">
                        <div class="form-group">
                            <label>Correo de contacto:</label>
                            <input id="email" name="email" class="form-control" type="email" placeholder="Por favor escribe tu correo" required>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Los productos se enviaran a este correo.</small>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder a pagar</button>
                </form>
            </td>
        </tr>-->
    </tbody>
</table>
<?php }else{?>
<div class="alert alert-primary">
    No hay productos en el carrito..
</div>
<?php } 

?>
<center><a href="./">Ver catalogo</a></center>
</body>
</html>