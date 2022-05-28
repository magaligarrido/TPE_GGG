-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2022 a las 22:29:35
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turnofacil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(10) NOT NULL,
  `especialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `especialidad`) VALUES
(1, 'Traumatologia'),
(2, 'Traumatologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(10) NOT NULL,
  `nombre_institucion` varchar(50) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`, `usuario`, `pass`) VALUES
(0, 'CRUZ AZUL', 'usertest', '$2y$10$bKOaPaeslD9r4Cwu5WcGC.kbHyERnLs6SDS1A3T.9m4TAlU4WLerq'),
(123, 'El Ocaso', 'fran123', '$2a$12$lMO5VgYcL04TQ7G75vu6..WZbxXeChoJnXwbjzLnpsi/UUyslgUDe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(10) NOT NULL,
  `id_institucion` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `id_especialidad` int(20) NOT NULL,
  `id_secretaria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_medico`, `id_institucion`, `usuario`, `password`, `nombre`, `apellido`, `id_especialidad`, `id_secretaria`) VALUES
(7, 0, 'user1', '$2y$10$R6uVDcEA8HP4ycMduRrSlOpuFIPPFvIBSAX0NmZYL8HMnCDoD8K06', 'testtraumato', 'test', 1, NULL),
(8, 0, '1', '$2y$10$0XQCIEcyTvkqvKulOvK9LOjOZ8KhPcOhFICHYfgLPjMI.RAAKCej6', '1', '12', 1, NULL),
(9, 0, '1', '$2y$10$prHZqi/GN3hcZYAFjiZ79uCmJzlNvlbZ9E/ySk9AOK.kg3Rkrunl2', '1', '1', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(10) NOT NULL,
  `id_institucion` int(10) NOT NULL,
  `dni` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `obra_social` varchar(20) NOT NULL,
  `numero_afiliado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE `secretaria` (
  `id_secretaria` int(10) NOT NULL,
  `id_institucion` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`id_secretaria`, `id_institucion`, `usuario`, `password`, `nombre`) VALUES
(5, 0, 'pepa', '$2y$10$WvGu9lNra.2i/yCKgspJr.llV6sfFzTxlsn2mzH63ap3AHtpAbVNm', ''),
(8, 0, 'user', '$2y$10$Tih6IRAjUSxW9cO.h5k5qOUQTxsDoupw6NdzdBOqseZh.wU1QpPwK', 'pepa'),
(9, 0, 'cucu', '$2y$10$hFSWMH008aOXqs6YMcDV6uKAW2ihss61ZNcgERCFz25KOvELsm1fO', 'sara'),
(10, 0, 'S1', '$2y$10$5qCkNT5ebcfXUMD8hHUBlOu/oahSDnvSwcAfANoI1G9wkgyig2Pme', 'Secre1'),
(11, 0, 'S2', '$2y$10$X5jn1BX4J2uXRdKifhRnIeyWMjy8p3N5EWganwSKaDmN6h4vUaBXa', 'Secre2'),
(12, 0, 'S2', '$2y$10$qBttbRrJ7UFy23N3p28oy.jMIurtCHbTBxPt6KlyYtSJgsL8tgHaS', 'Secre2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `secretaria` (`id_secretaria`),
  ADD KEY `id_institucion` (`id_institucion`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`id_secretaria`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `id_secretaria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`id_secretaria`) REFERENCES `secretaria` (`id_secretaria`),
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`),
  ADD CONSTRAINT `medico_ibfk_3` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`);

--
-- Filtros para la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `secretaria_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
