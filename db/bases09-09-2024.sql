-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 07:14:06
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
