-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-07-2016 a las 14:24:16
-- Versión del servidor: 5.7.12-0ubuntu1.1
-- Versión de PHP: 5.6.23-2+deb.sury.org~xenial+1

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
-- Estructura de tabla para la tabla `ge_comidas`
--

CREATE TABLE `ge_comidas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_comida` date NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ge_comidas`
--

INSERT INTO `ge_comidas` (`id`, `titulo`, `usuario_id`, `descripcion`, `fecha_comida`, `fecha_registro`, `tipo`) VALUES
(2, 'Huevos', 1, 'huevos', '2016-07-18', '2016-07-18 12:03:27', 'DESAYUNO'),
(3, 'Titulo 1D', 1, 'El desayuno con el titulo 1', '2016-07-18', '2016-07-18 14:17:31', 'DESAYUNO'),
(4, 'Titulo 1A', 1, 'Almuerzo con titulo 1', '2016-07-18', '2016-07-18 14:17:51', 'ALMUERZO'),
(5, 'Titulo 1C', 1, 'Cena con titulo 1', '2016-07-18', '2016-07-18 14:18:14', 'CENA'),
(6, 'Titulo 2D', 1, 'Desayuno con titulo 2', '2016-07-20', '2016-07-18 14:18:56', 'DESAYUNO'),
(7, 'Titulo 2A', 1, 'Almuerzo con titulo 2', '2016-07-20', '2016-07-18 14:19:19', 'ALMUERZO'),
(8, 'Titulo 2C', 1, 'Cena con titulo 2', '2016-07-20', '2016-07-18 14:19:35', 'CENA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ge_comidasusuario`
--

CREATE TABLE `ge_comidasusuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comidas_id` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ge_comidasusuario`
--

INSERT INTO `ge_comidasusuario` (`id`, `usuario_id`, `comidas_id`, `fecha_registro`) VALUES
(3, 1, 6, '2016-07-18 16:00:29'),
(9, 1, 8, '2016-07-18 16:21:07'),
(11, 1, 3, '2016-07-18 16:31:38'),
(15, 1, 5, '2016-07-18 17:31:05'),
(21, 1, 2, '2016-07-18 17:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ge_contacto`
--

CREATE TABLE `ge_contacto` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ge_evento`
--

CREATE TABLE `ge_evento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `detalle` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ge_evento`
--

INSERT INTO `ge_evento` (`id`, `usuario_id`, `detalle`, `fecha_registro`, `fecha_inicio`, `fecha_final`) VALUES
(1, 1, 'eeSe dice que una imagen vale más que mil palabras, pero cuando se trata de transmitir las descripciones del evento por escrito, las palabras también son muy importantes. La manera en la que explica su evento ayudará al menos a algunas personas a decidirse si deben asistir o no.\r\n\r\nPor supuesto, los detalles sobre dónde, cuándo y qué son fundamentales, pero agregar detalles específicos adicionales de manera interesante convierten al evento en algo atractivo para el lector.\r\n\r\nConsidere estos detalles cuando escriba las descripciones del evento o hágale llegar estos consejos al equipo de marketing, y logrará que su próximo evento sea algo imperdible.', '2016-07-15 15:25:38', '2016-07-15 00:00:00', '2016-08-31 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ge_eventousuario`
--

CREATE TABLE `ge_eventousuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ge_eventousuario`
--

INSERT INTO `ge_eventousuario` (`id`, `usuario_id`, `evento_id`, `fecha_registro`) VALUES
(5, 1, 1, '2016-07-18 00:36:45');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ge_fines`
--

INSERT INTO `ge_fines` (`id`, `usuario_id`, `se_queda`, `direccion`, `fecha_inicio`, `fecha_final`, `fecha_registro`) VALUES
(17, 1, 1, NULL, '2016-07-16 00:00:00', '2016-07-17 00:00:00', '2016-07-15 12:39:51'),
(18, 4, 1, NULL, '2016-07-16 00:00:00', '2016-07-17 00:00:00', '2016-07-15 12:47:21');

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
(4, 'taymetayme8@gmail.com', 'Tayme', 'Tayme', '169235091', 'PROFESOR', 'Taymes', 'Taymes', '+5804143299925', 'Dirección de tayme', 'c81e728d9d4c2f636f067f89cc14862c', '2016-07-14 15:30:30'),
(5, 'admin@admin.com', 'antonio', 'antonio', '1111111', 'ADMINISTRADOR', 'gestion de eventos', 'gestion de eventos', '546546465', 'gestion de eventos', '21232f297a57a5a743894a0e4a801fc3', '2016-07-15 20:21:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ge_comidas`
--
ALTER TABLE `ge_comidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ge_comidasusuario`
--
ALTER TABLE `ge_comidasusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ge_contacto`
--
ALTER TABLE `ge_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ge_evento`
--
ALTER TABLE `ge_evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ge_eventousuario`
--
ALTER TABLE `ge_eventousuario`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `ge_comidas`
--
ALTER TABLE `ge_comidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ge_comidasusuario`
--
ALTER TABLE `ge_comidasusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `ge_contacto`
--
ALTER TABLE `ge_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ge_evento`
--
ALTER TABLE `ge_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ge_eventousuario`
--
ALTER TABLE `ge_eventousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ge_fines`
--
ALTER TABLE `ge_fines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `ge_usuario`
--
ALTER TABLE `ge_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
