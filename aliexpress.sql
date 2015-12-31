-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2015 a las 15:28:55
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aliexpress`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicasprod`
--

CREATE TABLE `caracteristicasprod` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `productoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(42, 'Perfumes'),
(43, 'Cosas serias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteproducto`
--

CREATE TABLE `clienteproducto` (
  `clienteId` int(11) NOT NULL,
  `productoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direnvio`
--

CREATE TABLE `direnvio` (
  `id` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codpostal` int(11) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linpedido`
--

CREATE TABLE `linpedido` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `pedidoId` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `productoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `clienteId` int(11) NOT NULL,
  `tiendaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `direnvioId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `especificaciones` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `tiendaId` int(11) NOT NULL,
  `subcategoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`) VALUES
(2, 'KAKAKA', 'BAAAAA', 'TA WAPO', '0', 15, 6),
(3, 'KAKAKA', 'BAAAAA', 'TA WAPO', '99', 15, 6),
(7, 'KAPA', 'KEPO', 'KIPO', '0', 14, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `categoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nombre`, `categoriaId`) VALUES
(5, 'Juguetes', 43),
(6, 'Cuchillos', 43),
(7, 'Con veneno', 42),
(8, 'Chanel numero PI', 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `localizacion` varchar(30) NOT NULL,
  `fechaapertura` date NOT NULL,
  `infocontacto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `localizacion`, `fechaapertura`, `infocontacto`) VALUES
(14, 'Chinalandia', 'China', '2015-08-01', 'chinalandia@gmail.com'),
(15, 'Amazon', 'Alemania?', '2015-09-03', 'amazon.co.uk'),
(16, 'Tienda Pepe', 'España, Madrid', '2014-11-11', 'tiendapepe@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendacliente`
--

CREATE TABLE `tiendacliente` (
  `clienteId` int(11) NOT NULL,
  `tiendaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicasprod`
--
ALTER TABLE `caracteristicasprod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caractprod` (`productoId`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `clienteproducto`
--
ALTER TABLE `clienteproducto`
  ADD KEY `fkprodclienteid` (`clienteId`),
  ADD KEY `fkcliproductoid` (`productoId`);

--
-- Indices de la tabla `direnvio`
--
ALTER TABLE `direnvio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enviocli` (`clienteId`);

--
-- Indices de la tabla `linpedido`
--
ALTER TABLE `linpedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `linpedped` (`pedidoId`),
  ADD KEY `linpedprod` (`productoId`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mensajecli` (`clienteId`),
  ADD KEY `mensajetienda` (`tiendaId`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoenvio` (`direnvioId`),
  ADD KEY `pedidocli` (`clienteId`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodsubcat` (`subcategoriaId`),
  ADD KEY `prodtienda` (`tiendaId`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcattienecat` (`categoriaId`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tiendacliente`
--
ALTER TABLE `tiendacliente`
  ADD KEY `fktiendaclienteid` (`clienteId`),
  ADD KEY `fkclientetiendaid` (`tiendaId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicasprod`
--
ALTER TABLE `caracteristicasprod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `direnvio`
--
ALTER TABLE `direnvio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `linpedido`
--
ALTER TABLE `linpedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicasprod`
--
ALTER TABLE `caracteristicasprod`
  ADD CONSTRAINT `caractprod` FOREIGN KEY (`productoId`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `clienteproducto`
--
ALTER TABLE `clienteproducto`
  ADD CONSTRAINT `fkcliproductoid` FOREIGN KEY (`productoId`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `fkprodclienteid` FOREIGN KEY (`clienteId`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `direnvio`
--
ALTER TABLE `direnvio`
  ADD CONSTRAINT `enviocli` FOREIGN KEY (`clienteId`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `linpedido`
--
ALTER TABLE `linpedido`
  ADD CONSTRAINT `linpedped` FOREIGN KEY (`pedidoId`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `linpedprod` FOREIGN KEY (`productoId`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensajecli` FOREIGN KEY (`clienteId`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `mensajetienda` FOREIGN KEY (`tiendaId`) REFERENCES `tienda` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedidocli` FOREIGN KEY (`clienteId`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `pedidoenvio` FOREIGN KEY (`direnvioId`) REFERENCES `direnvio` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `prodsubcat` FOREIGN KEY (`subcategoriaId`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `prodtienda` FOREIGN KEY (`tiendaId`) REFERENCES `tienda` (`id`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcattienecat` FOREIGN KEY (`categoriaId`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiendacliente`
--
ALTER TABLE `tiendacliente`
  ADD CONSTRAINT `fkclientetiendaid` FOREIGN KEY (`tiendaId`) REFERENCES `tienda` (`id`),
  ADD CONSTRAINT `fktiendaclienteid` FOREIGN KEY (`clienteId`) REFERENCES `cliente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
