<?php
	class Producto{
		private $id;
		private $nombre;
        private $precio;
        private $categoria;
        private $imagen;
        private $stock;
 
		function __construct() {}

        public function getId() {
			return $this->id;
        }
        public function getNombre() {
			return $this->nombre;
        }
        public function getPrecio() {
			return $this->precio;
        }
        public function getCategoria() {
			return $this->categoria;
        }
        public function getImagen() {
			return $this->imagen;
        }
        public function getStock() {
			return $this->stock;
        }

        public function setId($id) {
			$this->id=$id;
        }
        public function setNombre($nombre) {
			$this->nombre=$nombre;
        }
        public function setCategoria($categoria) {
			$this->categoria=$categoria;
        }
        public function setPrecio($precio) {
			$this->precio=$precio;
        }
        public function setImagen($imagen) {
			$this->imagen=$imagen;
        }
        public function setStock($stock) {
			$this->stock=$stock;
        }

    }
?>