-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-04-2022 a las 10:08:51
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sarrerak`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_breve` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `aforo_total` int(11) NOT NULL,
  `aforo_actual` int(11) NOT NULL DEFAULT '0',
  `fecha_evento` datetime NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `descripcion_breve`, `descripcion`, `imagen`, `aforo_total`, `aforo_actual`, `fecha_evento`, `fecha_creacion`, `usuario_creacion`) VALUES
(1, '', '', '', '', 0, 0, '0000-00-00 00:00:00', '2022-04-27 14:42:52', ''),
(2, 'prueba', 'esto es una prueba', 'etso es una pruebaaaaa', '', 10, 0, '2022-04-27 20:00:00', '2022-04-27 14:45:39', ''),
(3, 'prueba', 'esto es una prueba', 'etso es una pruebaaaaa', 'nullo', 10, 0, '2022-04-27 20:00:00', '2022-04-27 14:47:55', ''),
(4, 'prueba', 'esto es una prueba', 'hola esto es una prueba', 'nullo', 10, 0, '2022-04-27 20:59:00', '2022-04-27 14:49:06', ''),
(5, 'prueba', 'esto es una prueba', 'esto es una pruebaaaa', 'nullo', 10, 0, '2022-04-27 20:00:00', '2022-04-27 15:05:35', 'admin'),
(6, 'prueba', 'esto es una prueba', 'esto es una pruebaaaa', 'nullo', 10, 0, '2022-04-27 20:00:00', '2022-04-27 15:13:14', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre_usuario_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `correo_electronico` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido1` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nombre_usuario_id`),
  UNIQUE KEY `correo_electronico` (`correo_electronico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario_id`, `correo_electronico`, `contrasena`, `nombre`, `apellido1`, `apellido2`, `fecha_creacion`) VALUES
('admin', 'admin@admin', 'op90OP)=', 'admin', 'admin1', 'admin2', '2022-04-14 09:43:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
