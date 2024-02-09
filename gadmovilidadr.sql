-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2024 a las 16:54:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gadmovilidadr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `Id_Certificado` int(11) NOT NULL,
  `Numero_certificacion` varchar(100) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Cedula` varchar(10) NOT NULL,
  `Numero_resolucion` varchar(100) NOT NULL,
  `Fecha_resolucion` varchar(100) NOT NULL,
  `Id_Cooperativa` int(11) NOT NULL,
  `Ruc` varchar(100) NOT NULL,
  `Id_Vehiculo` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Placa` varchar(100) NOT NULL,
  `Sticker` varchar(100) NOT NULL,
  `fecha_emision` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `certificado`
--

INSERT INTO `certificado` (`Id_Certificado`, `Numero_certificacion`, `Id_Usuario`, `Apellido`, `Cedula`, `Numero_resolucion`, `Fecha_resolucion`, `Id_Cooperativa`, `Ruc`, `Id_Vehiculo`, `Anio`, `Placa`, `Sticker`, `fecha_emision`) VALUES
(1, '01079-DGM TT-GADM-R-2023', 6, 'GUAPULEMA VILLALVA', '0605484815', '001-005-CO-CTP-DGMTT-GADMR', 'MAYO 10 2023', 1, '0691785573001', 1, 2023, 'T02996582', '811', 'Riobamba, 17 de octubre de 2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cooperativa`
--

CREATE TABLE `cooperativa` (
  `Id_Cooperativa` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Ruc` varchar(13) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Contacto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cooperativa`
--

INSERT INTO `cooperativa` (`Id_Cooperativa`, `Nombre`, `Id_Usuario`, `Ruc`, `Direccion`, `Contacto`) VALUES
(1, 'RIOBAMBA CICNETNEARIO RIOURBIC S.A', 6, '0691785573001', 'Riobamba', '0992821327');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Cedula` varchar(10) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Nivel` varchar(20) NOT NULL,
  `Contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Correo`, `Usuario`, `Nivel`, `Contrasena`) VALUES
(1, 'Jimson', 'Andino', '1400839880', 'jimson200134@hotmail.com', 'jimson011', 'Administrador', '$2y$15$W/591TXSqGK6fd8BABS6BO2'),
(4, 'pepe', 'aasd', '1231312312', 'pepe@hotmail.com', 'pepe01', 'Usuario', '$2y$15$bE0rA6fGLL77KiPvsdPL4OP'),
(5, 'Pepe', 'asd', '2100329323', 'pepe@hotmail.com', 'pepe1', 'Socio', '$2y$15$glTTkTGIiT4mC3sLTil11OB'),
(6, 'DERITA JACKELINE', 'GUAPULEMA VILLALVA', '0605484815', 'derita01@hotmail.com', 'DeritaJ', 'Socio', '$2y$15$bAU8Lj86My7fEe3xebKIwOD'),
(7, 'Juan', 'perez', '1209829827', 'juanperez11@hotmail.com', 'juanp', 'Usuario', '$2y$15$y22zXPFV9x0U.J3X3m3cA.6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Id_Vehiculo` int(11) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Placa` varchar(100) NOT NULL,
  `Sticker` varchar(100) NOT NULL,
  `Numero_resolucion` varchar(100) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Cooperativa` int(11) NOT NULL,
  `Fecha_resolucion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Id_Vehiculo`, `Marca`, `Anio`, `Placa`, `Sticker`, `Numero_resolucion`, `Id_Usuario`, `Id_Cooperativa`, `Fecha_resolucion`) VALUES
(1, 'HINO', 2023, 'T02996582', '811', '001-005-CO-CTP-DGMTT-GADMR', 6, 1, 'MAYO 10 2023');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`Id_Certificado`),
  ADD KEY `Id_Usuario` (`Id_Usuario`,`Id_Vehiculo`,`Id_Cooperativa`),
  ADD KEY `Apellido` (`Apellido`,`Cedula`,`Numero_resolucion`,`Fecha_resolucion`,`Ruc`,`Anio`,`Placa`,`Sticker`);

--
-- Indices de la tabla `cooperativa`
--
ALTER TABLE `cooperativa`
  ADD PRIMARY KEY (`Id_Cooperativa`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Id_Vehiculo`),
  ADD KEY `Id_Usuario` (`Id_Usuario`,`Id_Cooperativa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `Id_Certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cooperativa`
--
ALTER TABLE `cooperativa`
  MODIFY `Id_Cooperativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `Id_Vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
