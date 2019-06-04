-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2019 a las 16:10:36
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `donsweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `nom_mat` varchar(35) NOT NULL,
  `fech_entraga` date NOT NULL,
  `tarea` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `homework`
--

INSERT INTO `homework` (`id`, `nombre`, `nom_mat`, `fech_entraga`, `tarea`) VALUES
(1, 'sad', 'asd', '2019-05-28', 'asdsa s sadassddsadsdsdadasdasdasdasda'),
(2, 'Prueba', 'prueba', '1111-11-11', 'Enviar'),
(3, 'Prueba', 'jajaj', '4321-04-04', 'Enviar'),
(4, 'Prueba', 'prueba2', '3332-11-11', 'asfdksapsjdakdsjdasoisajadsoan akfas<fasfÃ±lfkadsÃ±gklg lkeiefsjdnjfds dsa'),
(5, 'dsdas', 'asdsa', '2019-05-29', 'asddssdadssdaaadd'),
(7, 'Prueba', 'Bioquimica', '2019-06-01', 'Reporte de lectura.'),
(8, 'Prueba8', 'HOLA', '2019-06-04', 'HOLA'),
(9, 'Bejas', 'EspaÃ±ol', '2019-06-06', 'Leer 7 libros.'),
(10, 'Bejas', 'HOLA', '2019-06-12', 'HOLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `nom`) VALUES
(1, 'Juan'),
(2, 'Pedro'),
(3, 'Gomez'),
(4, 'Melanito'),
(5, 'Ya '),
(6, 'Men');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `user` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `user`, `email`, `password`) VALUES
(88, 'Prueba', 'Preuba7', 'Prueba7@gmail.com', 'e9cbe55e8a29e40b200bf20a5c8ead0c'),
(89, 'Juan Hernandez Montalvo', 'Prueba8', 'Prueba8@gmail.com', 'd6e187bb81953a0c6112c3bda3379c0d'),
(91, 'Joel Benjamin Hernandez', 'Bejas', 'benja@dsf.com', '5570d4d06357ed72a1041951af274c33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
