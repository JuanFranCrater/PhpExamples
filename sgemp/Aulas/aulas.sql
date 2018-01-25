-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2018 a las 19:40:18
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Shortname` text NOT NULL,
  `Ubicacion` text NOT NULL,
  `TIC` int(1) NOT NULL,
  `NumOrdenadores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`ID`, `Name`, `Description`, `Shortname`, `Ubicacion`, `TIC`, `NumOrdenadores`) VALUES
(1, '2 Grado Superior Desarrollo de aplicaciones multiplataforma.', 'Aula de Segundo de Grado Superior en  Desarrollo de aplicaciones multiplataforma. Primera Planta.', '2GSFPMP', 'Primera Planta', 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `ID` int(11) NOT NULL,
  `Tramo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`ID`, `Tramo`) VALUES
(1, '8:15-9:15'),
(2, '9:15-10:15'),
(3, '10:15-11:15'),
(4, '11:45-12:45'),
(5, '12:45-13:45'),
(6, '13:45-14:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `IDAula` int(11) NOT NULL,
  `IDTramo` int(11) NOT NULL,
  `Dia` date NOT NULL,
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IDAula`, `IDTramo`, `Dia`, `IDUsuario`) VALUES
(1, 1, '2018-01-15', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `BirthDate` date NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Name`, `Surname`, `BirthDate`, `Email`) VALUES
(9, 'jfbenitez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Juan Francisco', 'Benitez Lopez', '2018-01-24', 'juanfbenitezlopez@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IDAula`,`IDTramo`,`Dia`,`IDUsuario`),
  ADD KEY `IDTramo` (`IDTramo`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`IDAula`) REFERENCES `aula` (`ID`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`IDTramo`) REFERENCES `horarios` (`ID`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`IDUsuario`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
