<?php
//incluye la clase Libro y CrudLibro
require_once('metodos.php');
require_once('Producto.php');

$crudtienda= new CrudTienda();
$producto= new Producto();

	// si el elemento insertar no viene nulo llama al crud e inserta un producto
	if (isset($_POST['insertar'])) {
		$producto->setNombre($_POST['nombre']);
		$producto->setPrecio($_POST['precio']);
        $producto->setCategoria($_POST['categoria']);
        $producto->setImagen($_POST['imagen']);
		$producto->setStock($_POST['stock']);
		//llama a la función insertar definida en el crud
		$crudtienda->insertar($producto);
		header('Location: ../carritodecompras.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='e') {
		$crudtienda->eliminar($_GET['id']);
		header('Location: ../carritodecompras.php');
	}
?>
