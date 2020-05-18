<?php

    include_once('global/conexion.php');
    include_once('global/config.php');

    /*Este fichero se encarga de agregar y eliminar los productos del carrito y de la base de datos */

    $mensaje="";
    if(isset($_POST['btnAccion'])){
        switch ($_POST['btnAccion']) {
            case 'Agregar':
                
                if( is_numeric( openssl_decrypt ( $_POST['id'], COD, KEY ) ) ) {
                    $ID = ( openssl_decrypt( $_POST['id'], COD, KEY ) ) ;
                    $Conexion = Conexion::conectar();
                    $select  = $Conexion -> prepare( 'select * from productos where id = :ID;');
                    $select -> bindValue( 'ID', $ID);
                    $select -> execute();
                    $lista = $select -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($lista as $producto) {
                        $PRECIO=$producto['precio'];
                        $NOMBRE=$producto['nombre'];
                    }

                    if( is_numeric( openssl_decrypt( $_POST['cantidad'], COD, KEY ) ) ) {

                        $CANTIDAD=openssl_decrypt( $_POST['cantidad'], COD, KEY );
                        $SUBTOTAL=$PRECIO*$CANTIDAD;
                        $FECHAPEDIDO=date("Y-m-d H:i:s");
                        
                    }else{
                        $mensaje="Cantidad incorrecta";
                    }

                }else{
                    $mensaje="Id incorrecto";
                }
                if(!isset($_SESSION['CARRITO'])) {
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][0]=$producto;
                    $insert = $Conexion -> prepare( 'insert into `compras` (codigo_productos, pedidos_total, cantidad,
                     fecha_pedido) values (:codigo, :subtotal, :cantidad, :fecha_pedido);' );
                    $insert -> bindValue( 'codigo', $ID);
                    $insert -> bindValue( 'subtotal', $SUBTOTAL);
                    $insert -> bindValue( 'cantidad', $CANTIDAD);
                    $insert -> bindValue( 'fecha_pedido', $FECHAPEDIDO);
                    $insert -> execute();
                    $mensaje = "Producto agregado al carrito";
                }else{
                    $id = array_column($_SESSION['CARRITO'],"ID");
                    if(in_array($ID, $id)){
                        $select  = $Conexion -> prepare( 'select * from compras where codigo_productos = :ID;');
                        $select -> bindValue( 'ID', $ID);
                        $select -> execute();
                        $lista = $select -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($lista as $producto) {
                            $CANTIDAD=$producto['cantidad'];
                        }
                        echo $CANTIDAD;
                        $update = $Conexion -> prepare( 'update compras set cantidad = :cantidad where codigo_productos = :ID;');
                        $update -> bindValue( 'ID', $ID);
                        $update -> bindValue( 'cantidad', $CANTIDAD+1);
                        $update -> execute();
                        $mensaje = "Producto agregado al carrito por ".($CANTIDAD+1)." veces";
                    }else{
                        $NumeroProductos=count($_SESSION['CARRITO']);
                        $producto=array(
                            'ID'=>$ID,
                            'NOMBRE'=>$NOMBRE,
                            'CANTIDAD'=>$CANTIDAD,
                            'PRECIO'=>$PRECIO
                        );
                        $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                        $insert = $Conexion -> prepare( 'insert into compras (codigo_productos, pedidos_total, cantidad, fecha_pedido) 
                        values (:codigo, :subtotal, :cantidad, :fecha_pedido);' );
                        $insert -> bindValue( 'codigo', $ID);
                        $insert -> bindValue( 'subtotal', $SUBTOTAL);
                        $insert -> bindValue( 'cantidad', $CANTIDAD);
                        $insert -> bindValue( 'fecha_pedido', $FECHAPEDIDO);
                        $insert -> execute();
                        $mensaje = "Producto agregado al carrito";
                    }
                }
                
            break;
            case "Eliminar":
                if(is_numeric( $_POST['id']) ) {
                    $ID = $_POST['id'] ;
                    foreach ( $_SESSION['CARRITO'] as $indice => $producto ) {
                        if( $producto['ID'] == $ID) {
                            $Conexion = Conexion::conectar();
                            unset($_SESSION['CARRITO'][$indice]);
                            $delete = $Conexion -> prepare( 'delete from compras where codigo_productos = :codigo;' );
                            $delete -> bindValue( 'codigo', $ID);
                            $delete -> execute();
                            header('Location: mostrarCarrito.php');
                        }else {
                            echo "hubo un error";
                        }
                    }
                }else{
                    $mensaje="Upss.. ID incorrecto"."<br>";
                }
            break;
           
        }
    }
?>