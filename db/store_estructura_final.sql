-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-08-2017 a las 13:04:24
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`dev`@`localhost` PROCEDURE `listar` ()  select * from ventas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (`_email` VARCHAR(50), `_pass` VARCHAR(60))  select * from users where email = _email and pass = _pass$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `newVenta` (`_cliente` VARCHAR(30))  insert into ventas(cliente, fecha) values(_cliente,now())$$

CREATE DEFINER=`dev`@`localhost` PROCEDURE `registrar` (`_email` VARCHAR(100), `_usuario` VARCHAR(50), `_pass` VARCHAR(256), `_privilegio` VARCHAR(50))  insert into users (email, usuario, pass, privilegio) 
    values(_email, _usuario, _pass, _privilegio)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `estado` int(11) DEFAULT '0',
  `privilegio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaDetalle`
--

CREATE TABLE `ventaDetalle` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `monto_venta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventaDetalle`
--
ALTER TABLE `ventaDetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `ventaDetalle`
--
ALTER TABLE `ventaDetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
