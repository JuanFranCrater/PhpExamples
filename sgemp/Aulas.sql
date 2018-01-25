-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-01-2018 a las 11:54:46
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Aulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aula`
--

CREATE TABLE `Aula` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Shortname` text NOT NULL,
  `Ubicacion` text NOT NULL,
  `TIC` int(1) NOT NULL,
  `NumOrdenadores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Aula`
--

INSERT INTO `Aula` (`ID`, `Name`, `Description`, `Shortname`, `Ubicacion`, `TIC`, `NumOrdenadores`) VALUES
(1, '2 Grado Superior Desarrollo de aplicaciones multiplataforma.', 'Aula de Segundo de Grado Superior en  Desarrollo de aplicaciones multiplataforma. Primera Planta.', '2GSFPMP', 'Primera Planta', 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Horarios`
--

CREATE TABLE `Horarios` (
  `ID` int(11) NOT NULL,
  `Tramo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Horarios`
--

INSERT INTO `Horarios` (`ID`, `Tramo`) VALUES
(1, '8:15-9:15'),
(2, '9:15-10:15'),
(3, '10:15-11:15'),
(4, '11:45-12:45'),
(5, '12:45-13:45'),
(6, '13:45-14:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reservas`
--

CREATE TABLE `Reservas` (
  `IDAula` int(11) NOT NULL,
  `IDTramo` int(11) NOT NULL,
  `Dia` date NOT NULL,
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Reservas`
--

INSERT INTO `Reservas` (`IDAula`, `IDTramo`, `Dia`, `IDUsuario`) VALUES
(1, 1, '2018-01-25', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `BirthDate` date NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`ID`, `Username`, `Password`, `Name`, `Surname`, `BirthDate`, `Email`) VALUES
(9, 'jfbenitez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Juan Francisco', 'Benitez Lopez', '2018-01-24', 'juanfbenitezlopez@gmail.com'),
(10, 'Juan Francisco BenÃ­tez LÃ³pez', 'b1f6e510eb0f015b9d2bd5b22764cd95ae00d908', 'Juan Francisco', 'Benitez Lopez', '2018-01-11', 'juanfbenitezlopez@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Aula`
--
ALTER TABLE `Aula`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Horarios`
--
ALTER TABLE `Horarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Reservas`
--
ALTER TABLE `Reservas`
  ADD PRIMARY KEY (`IDAula`,`IDTramo`,`Dia`,`IDUsuario`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Aula`
--
ALTER TABLE `Aula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Horarios`
--
ALTER TABLE `Horarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
