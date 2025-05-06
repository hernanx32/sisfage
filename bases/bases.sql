-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2025 a las 01:29:32
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `razon_social` varchar(30) NOT NULL,
  `nomb_fantasia` varchar(30) NOT NULL,
  `id_grupo` int(3) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `id_ciudad` int(3) NOT NULL,
  `id_provincia` int(3) NOT NULL,
  `cod_postal` int(10) NOT NULL,
  `telefono1` int(30) NOT NULL,
  `telefono2` int(30) NOT NULL,
  `tipo_doc` int(3) NOT NULL,
  `nro_doc` int(30) NOT NULL,
  `tipo_pago` int(3) NOT NULL,
  `nro_tarjeta` int(30) NOT NULL,
  `riego_max` float(13,4) NOT NULL,
  `estado` int(2) NOT NULL,
  `id_us_act` int(3) NOT NULL,
  `fecha_act` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `razon_social`, `nomb_fantasia`, `id_grupo`, `direccion`, `id_ciudad`, `id_provincia`, `cod_postal`, `telefono1`, `telefono2`, `tipo_doc`, `nro_doc`, `tipo_pago`, `nro_tarjeta`, `riego_max`, `estado`, `id_us_act`, `fecha_act`) VALUES
(1, 'Consumidor Final', 'Consumidor Final', 1, 'Sin Domicilio', 1, 1, 3600, 0, 0, 1, 1111111111, 1, 0, 0.0000, 1, 1, '2025-05-06'),
(2, 'Britez Virginia Carolina', 'Britez Virginia Carolina', 2, 'B20 DE JULIO MZ 65 C 18', 1, 1, 3600, 0, 0, 1, 32049155, 2, 123049155, 1000000.0000, 1, 1, '2025-05-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
