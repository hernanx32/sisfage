-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2024 a las 01:30:40
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
  `id_sucursal` int(10) UNSIGNED NOT NULL,
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
-- Estructura de tabla para la tabla `talonarios`
--

CREATE TABLE `talonarios` (
  `letra` varchar(1) NOT NULL,
  `nro_suc` int(5) NOT NULL,
  `nro_recibo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` text NOT NULL,
  `id_acceso` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `editable` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fec_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_acceso`, `nombre`, `foto`, `email`, `editable`, `id_sucursal`, `fec_act`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Hernan Ayala', '', 'webfsa@gmail.com', 0, 1, '2024-05-17'),
(2, 'caro', '21232f297a57a5a743894a0e4a801fc3', 1, 'Carolina V. Britez', '', 'krolaunam@gmail.com', 1, 1, '2024-05-12');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_sucursal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
