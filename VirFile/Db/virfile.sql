-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 19:56:16
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virfile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise`
--

CREATE TABLE `enterprise` (
  `ID_E` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enterprise`
--

INSERT INTO `enterprise` (`ID_E`, `Name`) VALUES
(1, 'VirFile'),
(28, 'google');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `ID_F` int(3) NOT NULL,
  `FileName` varchar(260) NOT NULL,
  `ID_U` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID_User` int(5) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `ID_E` int(3) NOT NULL,
  `Stock` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Mail` varchar(35) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `User_Level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_User`, `User_Name`, `ID_E`, `Stock`, `Name`, `Mail`, `Password`, `User_Level`) VALUES
(1, 'Cristobal', 28, 0, 'Crist', 'cristobal@gmail.com', '123', 2),
(2, 'Ivan', 1, 0, 'Ivan Topp', 'ivan.topp.sandoval@gmail.com', '123', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`ID_E`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`ID_F`),
  ADD KEY `ID_U` (`ID_U`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `ID_E` (`ID_E`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `ID_E` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `ID_F` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`ID_U`) REFERENCES `user` (`ID_User`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_E`) REFERENCES `enterprise` (`ID_E`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
