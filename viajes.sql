-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2024 a las 03:11:14
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `id` int(11) NOT NULL,
  `nombrechofer` varchar(100) NOT NULL,
  `edadchofer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`id`, `nombrechofer`, `edadchofer`) VALUES
(1, 'chofer1', 29),
(2, 'chofer2', 19),
(3, 'chofer3', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combis`
--

CREATE TABLE `combis` (
  `id` int(11) NOT NULL,
  `modelo_combi` varchar(100) NOT NULL,
  `patente_combi` varchar(100) NOT NULL,
  `capacidad_combi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `combis`
--

INSERT INTO `combis` (`id`, `modelo_combi`, `patente_combi`, `capacidad_combi`) VALUES
(1, '   Toyota    ', 'CT010', 20),
(2, 'Iveco', 'CI01', 15),
(3, ' Mercedes Benz ', 'CMB01', 20),
(4, '  Omnibus Mercedes Benz  ', 'OMB01', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorridofijo1`
--

CREATE TABLE `recorridofijo1` (
  `id` int(11) NOT NULL,
  `salida` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `id_combiasignada` int(11) NOT NULL,
  `id_choferasignado` int(11) NOT NULL,
  `paradas_recorrido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recorridofijo1`
--

INSERT INTO `recorridofijo1` (`id`, `salida`, `horario`, `id_combiasignada`, `id_choferasignado`, `paradas_recorrido`) VALUES
(1, 'Once ', '6:00am', 1, 1, 'Flores, Ciudad Evita, Laferrere'),
(2, 'Once', '11:00am', 2, 2, 'Flores, Ciudad Evita, Laferrere'),
(3, 'Once', '15:00pm', 3, 3, 'Flores, Ciudad Evita, Laferrere'),
(4, 'CUDI', '13:00', 1, 1, 'Laferrere, Ciudad Evita, Flores'),
(5, 'CUDI', '17:30', 2, 2, 'Laferrere, Ciudad Evita, Flores'),
(6, 'CUDI', '21:30', 3, 3, 'Laferrere, Ciudad Evita, Flores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorridofijo2`
--

CREATE TABLE `recorridofijo2` (
  `id` int(11) NOT NULL,
  `salida` varchar(100) NOT NULL,
  `horariofijo` varchar(100) NOT NULL,
  `id_combiasignada` int(11) NOT NULL,
  `id_choferasignado` int(11) NOT NULL,
  `paradas_recorrido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recorridofijo2`
--

INSERT INTO `recorridofijo2` (`id`, `salida`, `horariofijo`, `id_combiasignada`, `id_choferasignado`, `paradas_recorrido`) VALUES
(1, 'Once', '6:00', 3, 3, 'Flores, Villa Madero, Lomas del Mirador'),
(2, 'Once', '11:00', 2, 2, 'Flores, Villa Madero, Lomas del Mirador'),
(3, 'Once', '15:00', 1, 1, 'Flores, Villa Madero, Lomas del Mirador'),
(4, 'UNLAM', '13:00', 3, 3, 'Lomas del Mirador, Villa Madero, Flores'),
(5, 'UNLAM', '17:30', 2, 2, 'Lomas del Mirador, Villa Madero, Flores'),
(6, 'UNLAM', '21:30', 1, 1, 'Lomas del Mirador, Villa Madero, Flores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rec_turisticos`
--

CREATE TABLE `rec_turisticos` (
  `id` int(11) NOT NULL,
  `destino_turistico` varchar(100) NOT NULL,
  `distancia_recorrido` int(11) NOT NULL,
  `precio_km` int(11) NOT NULL,
  `id_combiusada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `nombre_pasajero` varchar(100) NOT NULL,
  `edad_pasajero` int(11) NOT NULL,
  `DNI_pasajero` varchar(20) NOT NULL,
  `correo_pasajero` varchar(50) NOT NULL,
  `destino_reserva` varchar(100) NOT NULL,
  `pasajeros` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `horario_salida` time NOT NULL,
  `fecha_regreso` date NOT NULL,
  `horario_regreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `contraseña`, `correo`) VALUES
(1, 'franco', '12345', 'email1@gmail.com'),
(2, 'sasha', '12345', 'email2@gmail.com'),
(9, 'director', '12345', 'email3@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combis`
--
ALTER TABLE `combis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `recorridofijo1`
--
ALTER TABLE `recorridofijo1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_combiasignada` (`id_combiasignada`),
  ADD KEY `id_choferasignado` (`id_choferasignado`);

--
-- Indices de la tabla `recorridofijo2`
--
ALTER TABLE `recorridofijo2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_combiasignada` (`id_combiasignada`),
  ADD KEY `id_choferasignado` (`id_choferasignado`);

--
-- Indices de la tabla `rec_turisticos`
--
ALTER TABLE `rec_turisticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_combiusada` (`id_combiusada`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `combis`
--
ALTER TABLE `combis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recorridofijo1`
--
ALTER TABLE `recorridofijo1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recorridofijo2`
--
ALTER TABLE `recorridofijo2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rec_turisticos`
--
ALTER TABLE `rec_turisticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id_reserva`);

--
-- Filtros para la tabla `recorridofijo1`
--
ALTER TABLE `recorridofijo1`
  ADD CONSTRAINT `recorridofijo1_ibfk_1` FOREIGN KEY (`id_choferasignado`) REFERENCES `choferes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recorridofijo1_ibfk_2` FOREIGN KEY (`id_combiasignada`) REFERENCES `combis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recorridofijo2`
--
ALTER TABLE `recorridofijo2`
  ADD CONSTRAINT `recorridofijo2_ibfk_1` FOREIGN KEY (`id_combiasignada`) REFERENCES `combis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recorridofijo2_ibfk_2` FOREIGN KEY (`id_choferasignado`) REFERENCES `choferes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rec_turisticos`
--
ALTER TABLE `rec_turisticos`
  ADD CONSTRAINT `rec_turisticos_ibfk_1` FOREIGN KEY (`id_combiusada`) REFERENCES `combis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
