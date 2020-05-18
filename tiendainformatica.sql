-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2020 a las 05:07:11
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendainformatica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Categoria_id` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cliente_id` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Direccion` varchar(80) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `codigo_productos` int(11) NOT NULL,
  `pedidos_total` decimal(4,2) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_pedido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripción` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` double NOT NULL,
  `categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripción`, `imagen`, `precio`, `categoria`, `stock`) VALUES
(1, 'portatilMac', 'Marca: MacBook Pro   Modelo: Retina   Detalles: 13\" Retina Core i5 2,6 GHz - SSD 128 GB - 4GB - teclado inglés (us)', 'img1.jpg', 560, 1, 50),
(2, 'portatilGaming', 'Marca: Asus  Modelo: TUF Gaming FX505GT-BQ025   Detalles:  15.6?Tarjeta grafica NVIDIA GeForce GTX 1650, Procesador Intel i7-9750H, Color Negro ', 'img2.jpg', 1350, 1, 350),
(3, 'ratonGaming', 'Marca: Woox   Modelo:  LT-WG2771-Negro  Detalles: Ratón con cable compatible con Windows 10/8/7, XP, Vista, ME, 2000 y Mac OS', 'img3.jpg', 15, 2, 80),
(4, 'tecladoGaming', 'Marca: Teclado gaming victsing   Modelo: VICTSING  Detalles: Este teclado gaming  VicTsing está retroiluminado', 'img4.jpg', 40, 2, 80),
(5, 'auricularesGaming', 'Marca: FR-TEC AIZEN   Modelo: Headsets Aizen   Detalles: Multiplataforma, Micrófono plegable y extraible, con espuma para cancelación de ruido', 'img5.jpg', 50, 3, 400),
(6, 'MonitorLed', 'Marca: SAMSUNG   Modelo: Samsung S22F350FHU Detalles: Cantidad de puertos VGA (D-Sub): 1, Número de puertos HDMI: 1', 'img6.jpg', 89, 3, 300),
(7, 'Usb3.0', 'Marca: toshiba   Modelo: TransMemory Hayabusa  Detalles:Fuente de alimentación Bus alimentado por puerto USB, blanco 32GB', 'img8.jpg', 10, 4, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `Trabajador_id` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL,
  `Direccion` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Correo` int(11) NOT NULL,
  `Fecha_Ingreso` int(11) NOT NULL,
  `Salario` int(11) NOT NULL,
  `Sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(2) NOT NULL,
  `Nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Password`, `Rol_id`) VALUES
(1, 'angel', 'angel', 1),
(2, 'pepe', 'pepe', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`codigo_productos`,`pedidos_total`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `usuarios_ibfk_1` (`Rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `codigo_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
