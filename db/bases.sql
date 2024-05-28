-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 01:57:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bases`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_acceso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_acceso`, `nombre`, `id_menu`) VALUES
(1, 'Supervisor', 1),
(2, 'Ventas', 2),
(3, 'Deposito', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `cod_bar` varchar(30) NOT NULL,
  `cod_prov` int(10) NOT NULL,
  `desc_corta` varchar(20) NOT NULL,
  `desc_larga` varchar(30) NOT NULL,
  `medida` varchar(10) NOT NULL,
  `unidadxbulto` double NOT NULL,
  `precio1` float NOT NULL,
  `precio2` float NOT NULL,
  `precio3` float NOT NULL,
  `precio4` float NOT NULL,
  `estado` int(11) NOT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estructura` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id_iva` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `porcentaje` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_acceso` int(11) NOT NULL,
  `nombre_acceso` varchar(30) NOT NULL,
  `nombre_menu` varchar(20) NOT NULL,
  `menu1` int(10) NOT NULL,
  `menu2` int(10) NOT NULL,
  `menu3` int(10) NOT NULL,
  `menu4` int(10) NOT NULL,
  `menu5` int(10) NOT NULL,
  `sub_menu` tinyint(1) NOT NULL,
  `link` varchar(30) NOT NULL,
  `descri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `provincia` varchar(10) NOT NULL,
  `localidad` varchar(10) NOT NULL,
  `codPostal` int(10) NOT NULL,
  `tel1` int(20) NOT NULL,
  `tel2` int(20) NOT NULL,
  `tel3` int(20) NOT NULL,
  `id_transporte` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `nro_doc` varchar(20) NOT NULL,
  `otros` varchar(30) NOT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito_int_enc`
--

CREATE TABLE `remito_int_enc` (
  `id_rem_int` int(10) UNSIGNED NOT NULL,
  `suc_remito` char(4) NOT NULL,
  `nro_remito` char(10) NOT NULL,
  `fecha_rem` date NOT NULL,
  `origen` int(10) NOT NULL,
  `destino` int(10) NOT NULL,
  `fecha_env` date NOT NULL,
  `id_pedido` int(100) NOT NULL,
  `comentario` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `remito_int_enc`
--

INSERT INTO `remito_int_enc` (`id_rem_int`, `suc_remito`, `nro_remito`, `fecha_rem`, `origen`, `destino`, `fecha_env`, `id_pedido`, `comentario`, `estado`) VALUES
(1, '1', '1', '2024-05-28', 1, 3, '2024-05-28', 0, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito_int_linea`
--

CREATE TABLE `remito_int_linea` (
  `id_rem_int` int(10) UNSIGNED NOT NULL,
  `nro_linea` int(10) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `codbar` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidadxbulto` int(11) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `remito_int_linea`
--

INSERT INTO `remito_int_linea` (`id_rem_int`, `nro_linea`, `id_articulo`, `codbar`, `cantidad`, `unidadxbulto`, `costo`) VALUES
(1, 1, 1, 32499297, 10, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito_pedido_enc`
--

CREATE TABLE `remito_pedido_enc` (
  `id_pedido` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `origen` int(10) NOT NULL,
  `destino` int(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito_pedido_linea`
--

CREATE TABLE `remito_pedido_linea` (
  `id_pedido` int(11) NOT NULL,
  `nro_linea` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cod_barra` int(11) NOT NULL,
  `cantidad` decimal(10,4) NOT NULL,
  `unidadxbulto` int(11) NOT NULL,
  `stock_act` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_sucursal` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `unidadxbulto` int(11) NOT NULL,
  `unidad` double NOT NULL,
  `desc_corta` varchar(20) NOT NULL,
  `desc_larga` varchar(30) NOT NULL,
  `stock_inicial` double NOT NULL,
  `entrada` double NOT NULL,
  `salida` double NOT NULL,
  `stock_final` double NOT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id_sucursal` int(11) NOT NULL,
  `nro_suc` int(10) NOT NULL,
  `nomb_suc` varchar(20) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `otros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_sucursal`, `nro_suc`, `nomb_suc`, `domicilio`, `otros`) VALUES
(1, 1, 'Central', 'Av. J. D. Peron', 0),
(2, 2, 'Italia', 'Av. Italia', 0),
(3, 3, 'Moreno', 'Moreno', 0),
(4, 4, 'Nva. Formosa', 'Av. kirchner', 0),
(5, 5, 'Gutnisky', 'Gutnisky', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` char(32) NOT NULL,
  `id_acceso` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `foto` longblob NOT NULL,
  `email` varchar(30) NOT NULL,
  `editable` tinyint(1) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_acceso`, `nombre`, `foto`, `email`, `editable`, `id_sucursal`, `fec_act`) VALUES
(1, 'admin', '2ee91e657461d0ae505c020861efbec6', 1, 'Ayala Hernan', '', 'webfsa@gmail.com', 0, 1, '2024-05-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_acceso`),
  ADD UNIQUE KEY `id_menu` (`id_menu`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id_iva`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `id_acceso` (`id_acceso`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `remito_int_enc`
--
ALTER TABLE `remito_int_enc`
  ADD PRIMARY KEY (`id_rem_int`);

--
-- Indices de la tabla `remito_int_linea`
--
ALTER TABLE `remito_int_linea`
  ADD PRIMARY KEY (`id_rem_int`);

--
-- Indices de la tabla `remito_pedido_enc`
--
ALTER TABLE `remito_pedido_enc`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `remito_pedido_linea`
--
ALTER TABLE `remito_pedido_linea`
  ADD UNIQUE KEY `id_articulo` (`id_articulo`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `idacceso` (`id_acceso`),
  ADD UNIQUE KEY `idsucursal` (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id_iva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `remito_int_enc`
--
ALTER TABLE `remito_int_enc`
  MODIFY `id_rem_int` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remito_int_linea`
--
ALTER TABLE `remito_int_linea`
  MODIFY `id_rem_int` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remito_pedido_enc`
--
ALTER TABLE `remito_pedido_enc`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_acceso`) REFERENCES `acceso` (`id_acceso`);

--
-- Filtros para la tabla `remito_pedido_linea`
--
ALTER TABLE `remito_pedido_linea`
  ADD CONSTRAINT `remito_pedido_linea_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id_sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
