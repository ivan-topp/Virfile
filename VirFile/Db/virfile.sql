-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2017 a las 02:07:59
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(5) NOT NULL,
  `NombreUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Empresa` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Almacenado` int(3) NOT NULL DEFAULT '0',
  `Nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `NivelUsuario` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `NombreUsuario`, `Empresa`, `Almacenado`, `Nombre`, `Correo`, `Contrasena`, `NivelUsuario`) VALUES
(1, 'Perico', 'MyHouse', 0, 'Perico', 'perico@gmail.com', '123', 0),
(2, 'CristobalD', 'cbshbdsjhb', 0, 'Cristobal Diaz', 'cristobaldiaz3244@gmail.com', '19820680', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
