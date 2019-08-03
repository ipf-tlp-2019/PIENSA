-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2019 a las 08:42:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_piensa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `ID_CONTENIDO` int(11) NOT NULL,
  `NOMBRE_CONT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`ID_CONTENIDO`, `NOMBRE_CONT`) VALUES
(1, 'CONJUNTO'),
(2, 'LÓGICA PROPOSICIONAL'),
(3, 'FUNCIONES'),
(4, 'MATRICES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `ID_NIVEL` int(11) NOT NULL,
  `DESCRI_NIVEL` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`ID_NIVEL`, `DESCRI_NIVEL`) VALUES
(1, 'BAJO'),
(2, 'MEDIO'),
(3, 'ALTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID_PERSONA` int(11) NOT NULL,
  `APELLIDO_NOMBRE` text NOT NULL,
  `DNI` int(8) NOT NULL,
  `FECHA_NAC` varchar(11) NOT NULL,
  `TELEFONO` varchar(11) NOT NULL,
  `AÑO_INGRESO` int(4) NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `PASSWORD` varchar(6) NOT NULL,
  `FK_TIPO_PERSONA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `ID_TIPO_PERSONA` int(11) NOT NULL,
  `TIPO_PERSONA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`ID_TIPO_PERSONA`, `TIPO_PERSONA`) VALUES
(1, 'ESTUDIANTE'),
(2, 'DOCENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `password_1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `e_mail`, `password_1`) VALUES
(1, 'aaa@wwww', '$2y$10$D0K'),
(6, 'ewwe@dks', '$2y$10$M7t'),
(7, 'ddsf@jdjd', '$2y$10$yPV'),
(8, 'sil@romero', '$2y$10$8BV');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID_PERSONA`),
  ADD KEY `fk_tipo_persona` (`FK_TIPO_PERSONA`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`ID_TIPO_PERSONA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_tipo_persona` FOREIGN KEY (`FK_TIPO_PERSONA`) REFERENCES `tipo_persona` (`ID_TIPO_PERSONA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
