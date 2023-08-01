-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 22:31:43
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `imagen_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like`
--

CREATE TABLE `like` (
  `likeid` int(10) NOT NULL,
  `id_p` int(10) NOT NULL,
  `id_u` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `like`
--

INSERT INTO `like` (`likeid`, `id_p`, `id_u`) VALUES
(1, 13, 1),
(2, 14, 1),
(3, 23, 3),
(4, 24, 3),
(5, 13, 3),
(6, 14, 3),
(18, 17, 4),
(19, 14, 4),
(20, 15, 4),
(21, 17, 1),
(22, 24, 1),
(25, 18, 4),
(26, 26, 4),
(28, 32, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posteo`
--

CREATE TABLE `posteo` (
  `id_p` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen_url` varchar(255) NOT NULL,
  `tiempo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posteo`
--

INSERT INTO `posteo` (`id_p`, `titulo`, `descripcion`, `imagen_url`, `tiempo`, `fk_usuario`) VALUES
(13, 'ejemplo de imagen', 'a ver si sale..', 'ifts.jpg', '2019-11-25 18:25:01', 1),
(14, 'qwerty', 'qwerty', 'ifts16.jpg', '2019-11-25 18:25:25', 1),
(15, 'ultima', 'a ver ahora', 'rev-38.jpg', '2019-11-25 18:25:48', 1),
(16, 'barrio', 'eventos en el barrio monte castro', 'l_1570966744.jpg', '2019-11-29 17:23:01', 1),
(17, 'a juntar basura', 'separar la basura por su tipo', 'WhatsApp-Image-2019-08-27-at-10.36.03-990x552-1.jpeg', '2019-11-29 17:24:33', 1),
(18, 'reparaciones', 'finalemente se procede a reparar la cloaca', 'ARCHI_512289.jpg', '2019-11-29 17:25:31', 1),
(20, 'dia del niÃ±o', 'un evento unico en el aÃ±o.. para no perderse', 'evento.jpg', '2019-11-29 17:28:02', 1),
(22, 'test', 'test', 'ARCHI_512289.jpg', '2019-11-30 03:02:56', 3),
(23, 'test2', 'test2', 'evento.jpg', '2019-11-30 08:16:35', 3),
(24, 'el chavo', 'no hay', 'ARCHI_512289.jpg', '2019-11-30 08:24:35', 3),
(25, 'qwert', 'qwert', 'ARCHI_512289.jpg', '2019-11-30 08:28:11', 3),
(26, 'qwerty', 'qwer', 'evento.jpg', '2019-11-30 08:32:31', 3),
(27, 'el chavo', 'asd', 'ARCHI_512289.jpg', '2019-11-30 08:38:27', 3),
(28, 'test', 'test', 'ARCHI_512289.jpg', '2019-11-30 08:39:27', 1),
(29, 'qwe', 'asd', 'evento.jpg', '2019-12-02 04:50:48', 3),
(30, 'asd', 'asd', 'ARCHI_512289.jpg', '2019-12-02 05:13:35', 1),
(31, 'qwerty', 'qwerty', 'evento.jpg', '2019-12-02 05:26:22', 3),
(32, 'asd', 'asd', 'ARCHI_512289.jpg', '2019-12-02 11:30:38', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_u` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_u`, `nombre`, `apellido`, `edad`, `correo`, `usuario`, `clave`) VALUES
(1, 'rodrigo', 'fernandez checa', 28, 'rfc@gmail.com', 'admin', 'admin'),
(2, 'carlos', 'gutierrez', 18, 'ejemplo@gmail.com', 'cg', 'cg'),
(3, 'julian', 'perez', 15, 'ejemplo@gmail.com', 'jp', 'jp'),
(4, 'jkl', 'jkl', 55, 'jkl@hotmail.com', 'jkl', 'jkl');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`likeid`);

--
-- Indices de la tabla `posteo`
--
ALTER TABLE `posteo`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `like`
--
ALTER TABLE `like`
  MODIFY `likeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `posteo`
--
ALTER TABLE `posteo`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_u` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posteo`
--
ALTER TABLE `posteo`
  ADD CONSTRAINT `posteo_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
