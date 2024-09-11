-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 15:23:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
(2, 'Administacion', 2),
(3, 'Ventas', 3),
(4, 'Deposito', 4),
(5, 'Rectificadora', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `cod_bar` varchar(30) DEFAULT NULL,
  `desc_corta` varchar(20) NOT NULL,
  `desc_larga` varchar(30) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `id_rubro_sub` int(11) NOT NULL,
  `medida` varchar(10) NOT NULL,
  `unidadxbulto` double NOT NULL,
  `estado` int(11) NOT NULL,
  `stock_total` tinyint(4) DEFAULT 0,
  `id_proveedor` int(11) NOT NULL,
  `cod_bar_prov` int(10) NOT NULL,
  `id_iva` int(11) DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `id_imp_interno` int(11) DEFAULT NULL,
  `imp_interno` float(3,2) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `bonifc` float(13,2) DEFAULT NULL,
  `flete_gastos` float(13,2) DEFAULT NULL,
  `precio1` float DEFAULT NULL,
  `precio2` float DEFAULT NULL,
  `precio3` float DEFAULT NULL,
  `precio4` float DEFAULT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `cod_bar`, `desc_corta`, `desc_larga`, `id_rubro`, `id_rubro_sub`, `medida`, `unidadxbulto`, `estado`, `stock_total`, `id_proveedor`, `cod_bar_prov`, `id_iva`, `iva`, `id_imp_interno`, `imp_interno`, `costo`, `bonifc`, `flete_gastos`, `precio1`, `precio2`, `precio3`, `precio4`, `fec_act`) VALUES
(1, '32499297', 'ARTICULO PRUEBA', 'ARTICULO PRUEBA AL 21%', 1, 1, 'Unidad', 1, 1, 1, 1, 239, 1, 1, 0, 0.00, 110.85, 0.00, 0.00, 186.5, 200.5, 190, NULL, '2024-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estructura` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre`, `estructura`) VALUES
(1, 'CUIT/CUIL', 'XX-XXXXXXXX-X'),
(2, 'DNI', 'XXXXXXXX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imp_interno`
--

CREATE TABLE `imp_interno` (
  `id_imp_interno` int(11) NOT NULL,
  `tipo_imp_int` varchar(20) NOT NULL,
  `desc_imp_int` varchar(20) NOT NULL,
  `porcen_imp_int` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `imp_interno`
--

INSERT INTO `imp_interno` (`id_imp_interno`, `tipo_imp_int`, `desc_imp_int`, `porcen_imp_int`) VALUES
(1, 'A', 'Tasa al 2 %', 2.00),
(2, 'B', 'Tasa al 4 %', 4.00),
(3, 'C', 'Tasa al 4.17 %', 4.17),
(4, 'D', 'Tasa al 8 %', 8.00),
(5, 'E', 'Tasa al 8.7 %', 8.70),
(6, 'F', 'Tasa al 12 %', 12.00),
(7, 'G', 'Tasa al 13.64 %', 13.64),
(8, 'H', 'Tasa al 20 %', 20.00),
(9, 'I', 'Tasa al 25 %', 25.00),
(10, 'J', 'LOPEZ HNOS', 2.00),
(11, 'Z', 'Tasa al 0%', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id_iva` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `porcentaje` decimal(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id_iva`, `nombre`, `porcentaje`) VALUES
(1, 'IVA AL 21 %', 21.00),
(2, 'IVA AL 10.5 %', 10.50),
(3, 'IVA AL 27 %', 27.00),
(4, 'IVA AL 15 %', 15.00),
(5, 'IVA AL 17.85 %', 17.85),
(6, 'IVA AL 19.38 % ', 19.38),
(7, 'IVA AL 17 %', 17.00),
(8, 'IVA EXENTO ', 0.00);

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

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `direccion`, `provincia`, `localidad`, `codPostal`, `tel1`, `tel2`, `tel3`, `id_transporte`, `id_doc`, `nro_doc`, `otros`, `fec_act`) VALUES
(1, 'Ayala Hernan H', 'B20 DE JULIO MZ 65 C 18', 'Formosa', 'Formosa', 3600, 0, 0, 0, 0, 1, '23324992979', '', '2024-09-07');

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
(1, '1', '1', '2024-05-28', 1, 3, '2024-05-28', 0, '', 1),
(2, '1', '2', '2024-06-04', 6, 4, '2024-06-04', 0, '', 1);

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
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id_rubro` int(11) NOT NULL,
  `desc_rubro` varchar(10) NOT NULL,
  `ref_rubro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id_rubro`, `desc_rubro`, `ref_rubro`) VALUES
(1, 'Varios', ''),
(2, 'REPUESTOS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro_sub`
--

CREATE TABLE `rubro_sub` (
  `id_rubro_sub` int(11) NOT NULL,
  `desc_rubro_sub` varchar(10) NOT NULL,
  `id_rubro` int(4) NOT NULL,
  `ref_rubro_sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rubro_sub`
--

INSERT INTO `rubro_sub` (`id_rubro_sub`, `desc_rubro_sub`, `id_rubro`, `ref_rubro_sub`) VALUES
(1, 'LUBRICANTE', 2, ''),
(2, 'ACCESORIOS', 2, ''),
(3, 'PEGAMENTOS', 2, ''),
(4, 'MOTOR', 2, ''),
(5, 'TRASMISION', 2, ''),
(6, 'RODADOS', 2, ''),
(7, 'VARIOS', 2, '');

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
(6, 10, 'Deposito Central', 'Av. J. D. Peron ', 0);

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
  `foto` longblob DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `editable` tinyint(1) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_acceso`, `nombre`, `foto`, `email`, `editable`, `id_sucursal`, `fec_act`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Ayala Hernan', '', 'webfsa@gmail.com', 0, 1, '2024-09-10'),
(2, 'caro', '21232f297a57a5a743894a0e4a801fc3', 2, 'Carolina Britez', '', 'krolaunam@gmail.com', 1, 1, '2024-07-17');

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
-- Indices de la tabla `imp_interno`
--
ALTER TABLE `imp_interno`
  ADD PRIMARY KEY (`id_imp_interno`);

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
  ADD PRIMARY KEY (`id_rem_int`),
  ADD UNIQUE KEY `origen` (`origen`,`destino`),
  ADD KEY `destino` (`destino`);

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
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `rubro_sub`
--
ALTER TABLE `rubro_sub`
  ADD PRIMARY KEY (`id_rubro_sub`);

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
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `idacceso` (`id_acceso`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imp_interno`
--
ALTER TABLE `imp_interno`
  MODIFY `id_imp_interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id_iva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remito_int_enc`
--
ALTER TABLE `remito_int_enc`
  MODIFY `id_rem_int` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rubro_sub`
--
ALTER TABLE `rubro_sub`
  MODIFY `id_rubro_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_acceso`) REFERENCES `acceso` (`id_acceso`);

--
-- Filtros para la tabla `remito_int_enc`
--
ALTER TABLE `remito_int_enc`
  ADD CONSTRAINT `remito_int_enc_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `sucursales` (`id_sucursal`),
  ADD CONSTRAINT `remito_int_enc_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `sucursales` (`id_sucursal`);

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
