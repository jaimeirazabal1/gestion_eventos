-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2016 a las 03:36:13
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u669571457_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ge_fines`
--

CREATE TABLE `ge_fines` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `se_queda` tinyint(1) DEFAULT NULL,
  `direccion` text,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ge_fines`
--

INSERT INTO `ge_fines` (`id`, `usuario_id`, `se_queda`, `direccion`, `fecha_inicio`, `fecha_final`, `fecha_registro`) VALUES
(7, 1, 1, NULL, '2016-07-16 00:00:00', '2016-07-17 00:00:00', '2016-07-15 01:03:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ge_usuario`
--

CREATE TABLE `ge_usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `compania` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seccion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  `contrasena` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ge_usuario`
--

INSERT INTO `ge_usuario` (`id`, `email`, `nombre`, `apellido`, `dni`, `tipo_usuario`, `compania`, `seccion`, `telefono`, `direccion`, `contrasena`, `fecha_registro`) VALUES
(1, 'jaimeirazabal1@gmail.com', 'Jaime', 'Irazabal', '16923509', 'ADMINISTRADOR', 'JAIG', 'UNICA', '04143299925', 'Carrizal', '7d3ff5e583a1727c07bd911d427b514b', '2016-07-14 14:51:47'),
(4, 'taymetayme8@gmail.com', 'Tayme', 'Tayme', '169235091', 'PROFESOR', 'Taymes', 'Taymes', '+5804143299925', 'Dirección de tayme', 'c81e728d9d4c2f636f067f89cc14862c', '2016-07-14 15:30:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ge_fines`
--
ALTER TABLE `ge_fines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ge_usuario`
--
ALTER TABLE `ge_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ge_fines`
--
ALTER TABLE `ge_fines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ge_usuario`
--
ALTER TABLE `ge_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
