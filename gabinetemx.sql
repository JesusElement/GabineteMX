-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2020 a las 00:35:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gabinetemx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `nom` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ape1` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ape2` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` char(100) COLLATE latin1_spanish_ci NOT NULL,
  `fech_na` date NOT NULL,
  `rfc` char(13) COLLATE latin1_spanish_ci DEFAULT 'xxxxxxxxxxxxx'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_m_pago`
--

CREATE TABLE `cli_m_pago` (
  `id_cliente` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_m_pago` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `expi` date NOT NULL,
  `num_tar` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `tip_tar` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_conte` char(16) COLLATE latin1_spanish_ci NOT NULL,
  `id_produc` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `ruta` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `tip_arch` varchar(8) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contraseña`
--

CREATE TABLE `contraseña` (
  `id_cliente` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `contra` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(80) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta_comp`
--

CREATE TABLE `deta_comp` (
  `id_produc` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_pedido` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_uni` decimal(10,2) NOT NULL,
  `factura` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direc` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_estado` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `calle` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `num_int` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `num_ext` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `cp` char(5) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direc_cliente`
--

CREATE TABLE `direc_cliente` (
  `id_cliente` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_direc` char(12) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_m_pago` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `nom` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_oferta` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_produc` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `fech_ini` date NOT NULL,
  `hora_ini` time NOT NULL,
  `fech_ter` date NOT NULL,
  `hora_ter` time NOT NULL,
  `desc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` char(18) COLLATE latin1_spanish_ci NOT NULL,
  `id_cliente` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_trans` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `fech_pe` date NOT NULL,
  `hora_pe` time NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_produc` char(16) COLLATE latin1_spanish_ci NOT NULL,
  `id_provee` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `datos` text COLLATE latin1_spanish_ci NOT NULL,
  `pal_clav` text COLLATE latin1_spanish_ci NOT NULL,
  `clav_clas` char(8) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_provee` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `nom` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `razon_s` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `cp` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `rfc` char(13) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_produc` char(12) COLLATE latin1_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `prec_uni` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id_trans` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `nom` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `razon_s` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `cp` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `rfc` char(13) COLLATE latin1_spanish_ci NOT NULL,
  `num_rast` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `fech_reci` date NOT NULL,
  `hora_reci` time NOT NULL,
  `fech_ente` date NOT NULL,
  `hora_ente` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cli_m_pago`
--
ALTER TABLE `cli_m_pago`
  ADD PRIMARY KEY (`id_cliente`,`id_m_pago`),
  ADD KEY `cli_m_pago_ibfk_2` (`id_m_pago`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD KEY `id_produc` (`id_produc`);

--
-- Indices de la tabla `contraseña`
--
ALTER TABLE `contraseña`
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `deta_comp`
--
ALTER TABLE `deta_comp`
  ADD KEY `id_produc` (`id_produc`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direc`),
  ADD KEY `fk_estado_direc` (`id_estado`);

--
-- Indices de la tabla `direc_cliente`
--
ALTER TABLE `direc_cliente`
  ADD PRIMARY KEY (`id_cliente`,`id_direc`),
  ADD KEY `direc_cliente_ibfk_2` (`id_direc`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_m_pago`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `id_produc` (`id_produc`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_produc`),
  ADD KEY `id_provee` (`id_provee`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_provee`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_produc`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id_trans`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cli_m_pago`
--
ALTER TABLE `cli_m_pago`
  ADD CONSTRAINT `cli_m_pago_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cli_m_pago_ibfk_2` FOREIGN KEY (`id_m_pago`) REFERENCES `metodo_pago` (`id_m_pago`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`id_produc`) REFERENCES `producto` (`id_produc`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `contraseña`
--
ALTER TABLE `contraseña`
  ADD CONSTRAINT `contraseña_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `deta_comp`
--
ALTER TABLE `deta_comp`
  ADD CONSTRAINT `deta_comp_ibfk_1` FOREIGN KEY (`id_produc`) REFERENCES `producto` (`id_produc`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `deta_comp_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_estado_direc` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `direc_cliente`
--
ALTER TABLE `direc_cliente`
  ADD CONSTRAINT `direc_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `direc_cliente_ibfk_2` FOREIGN KEY (`id_direc`) REFERENCES `direccion` (`id_direc`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`id_produc`) REFERENCES `producto` (`id_produc`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_trans`) REFERENCES `transporte` (`id_trans`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_provee`) REFERENCES `proveedor` (`id_provee`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_produc`) REFERENCES `producto` (`id_produc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
