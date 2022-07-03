-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2022 a las 23:37:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(3, 'Pediatria'),
(5, 'cardiologia'),
(10, 'Psiquiatria');

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
  `id_secretaria` int(10) DEFAULT NULL,
  `obra_social` varchar(10) NOT NULL DEFAULT 'os1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_medico`, `id_institucion`, `usuario`, `password`, `nombre`, `apellido`, `id_especialidad`, `id_secretaria`, `obra_social`) VALUES
(10, 123, 'oscar12', '$2y$10$CQSqfn1Sy3njXyGhnQyht.dlznuPlfD4bNwlrIpTiYJ2KySjiRJTW', 'oscar', 'frace', 1, 26, 'os2'),
(11, 123, 'juan44', '$2y$10$1xhzJBrvvR3REeqN7C3qHOz.r34io8sC5RMrmOzuwQAKEFsSyf8X2', 'juan', 'perez', 1, 17, 'os2'),
(12, 123, 'fgh', '$2y$10$tN6PQKhHi.DhT6r4u/yEDOAPDUjFlv2lXEsCmOdFEkcfiUSVXdyGG', 'fg55', 'rdr', 1, 17, 'os2'),
(13, 123, 'kdsfjlk', '$2y$10$FFooG1Jaxkab.jhfPua3j.UATroaoovSPDqVDEoSFu8A9Mofc0aFK', 'hkjh', 'kjhmg', 1, NULL, 'os2'),
(14, 123, 'popo', '$2y$10$s.lsJAU7Ebfx82Q0anjm4eeIGrPYCuGgWQdjpmQuzBGd1lw7ww8tq', 'ugy', 'uyg', 1, NULL, 'os2'),
(15, 123, 'farnco ', '$2y$10$pAt.obxtoErZ/PBHaxsyU.PPN9dkmUb8BnBW0nKkot4bFDQKT6LsK', 'gg', 'dd', 1, NULL, 'os2'),
(16, 123, 'ooo', '$2y$10$yFlRHNI2IwGEfizXhclNO.XxwsOLi60XkTOO.N3OX9tR.XnqsiCKm', 'ij', 'ij', 1, NULL, 'os2'),
(17, 123, 'ooo', '$2y$10$c4ac46W7knnNX0h6eUh4fOzTrxSXpVp5baRst59iltfPs3rHNoN5G', 'ooo', 'ooo', 1, 19, 'os2'),
(18, 123, 'a', '$2y$10$JQjaOpqyTSe5.jzikbdLwub4bZGBQUULjRKvCWEd3kcz.zM.lcOii', 'aa', 'aaa', 3, NULL, 'os2'),
(19, 123, 'a', '$2y$10$bfufXpG6dsyqCabp2JcJiOIXMj3YJ9BT0bdLHF3astRQr14Mea7Bq', 'aa', 'aaa', 3, NULL, 'os2'),
(20, 123, 'iuh', '$2y$10$MlsZMxBhUG1GLRdLHO0M2ufkb/.19OLEhcKwW/qUm3mKskjPt3gSi', 'iuh', 'iuh', 1, 21, 'os1'),
(21, 123, 'jorge', '$2y$10$b7PjCbX.jB01A0m/F6g5Puv142xszhowsbJHBJYl.0T4B0eCDwrue', 'ewe', 'ee', 1, NULL, 'os1'),
(22, 123, 'jorge', '$2y$10$1mMKoRMpT3d/ahYjNBN0Y.K3TTZAGYkqHEwdG9GidTmfGHgG41lLC', 'ewe', 'ee', 1, NULL, 'os1'),
(23, 123, 'jprge', '$2y$10$GLRYDHRl18rCqSBbH3FPeuRKd0OYLoWj.If28Ssc6YMzMYKfP5Lpe', 'ojno', 'ojno', 3, 17, 'os1'),
(24, 123, 'sosa', '$2y$10$it.Ez8bsgl9Q3W64FsUsFun7xmw8CGUTjgBdAlSJVqPIGqL.G6YNW', 'kjn', 'kjn', 1, NULL, 'os1'),
(25, 123, 'sosinnn', '$2y$10$bUkCFQ8AHSB76uZpF/DS3u8aNKN8NLeLro9p9smO7Nj5M3uyH7zcS', 'jnjn', 'njn', 1, NULL, 'os1'),
(26, 123, 'zz', '$2y$10$LHZcau7fY7Srztc2lgRWoOPuveiTWsGVu2wUh7KNS6N9m3rqBL0Lq', 'z', 'zz', 3, NULL, 'os1'),
(27, 123, 'tr', '$2y$10$6T8EoIoW8iI.3Bh7yRjtA.SZokJmekOw7fVXrscoIjwJ0Td69evUm', 'tr', 'tr', 3, NULL, 'os1'),
(28, 123, 'pepepe', '$2y$10$.AUwkINfJIyUfxLz9B5kaeImzW7IOLvPYU6PMXv9VVLCBFRiPa/kC', 'uyg', 'uyg', 5, NULL, 'os1'),
(29, 123, 'qw', '$2y$10$b.4POG8LdBYagtw/54sNl.zf8zt/WfZAAVMA0eTw6kMts7QvjXroO', 'qew', 'qew', 3, NULL, 'os1');

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

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `id_institucion`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `email`, `obra_social`, `numero_afiliado`) VALUES
(1, 0, 1, 'franco', 'girolami', 'pepa', 234, 'ff', 'os1', 11);

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
(13, 123, 'sara333', '$2y$10$diO9NTWURdQ29HuIpur2CuhYunEeo0OLFxm0rvSbzo/YJjA7yCSei', 'sara'),
(16, 123, 'pepa', '$2y$10$lwfjQkt5dAQiHG7KFRk9ZeDIexBs/MhgrccLJMNmnJ2gv3B4N.lgG', 'pepona'),
(17, 123, 'uh23', '$2y$10$fZFL6ynxRRQnsSof.Rrcce3FQIB9oLgoNDPH3XoyJR.lU4mv1hXHy', '3e3e3'),
(18, 123, 'uuu', '$2y$10$jIMr6s9A073o8hHmRESCWOLnLe7.u5FaMY4K3PELlpdDOwTIrMvxy', 'uh'),
(19, 123, 'uuu', '$2y$10$DixOAArir0E/oFVLnEAQ9.TUymyla.SQk09/LnvrJM8gdvZSvf0se', 'uuu'),
(20, 123, 'ert', '$2y$10$z1wxdPGyJOlBpOA1knn66.duhLNZ.L2MiAlzk7Ch2nSfqHl3lY70u', 'er3tt'),
(21, 123, 'agustina', '$2y$10$/2MV03/OlFJEgko59wHSXuUfPh2h.GWH/odyHi/PwspUL5YHV4.kC', 'defwef'),
(22, 123, 'sias', '$2y$10$mlZqRcJWNJQD7UVPWlJyJumHFbxgjQvstZZOS4PNR5SzyTHtgXCAy', 'sias'),
(23, 123, 'sias', '$2y$10$1U.amJmepaJJuZtqvGoON.CeQ4Yy7/rfP1cjyUd4PUCWEA7bAb/RO', 'sias'),
(24, 123, 'ww', '$2y$10$FexR.kk5TWUoC1lLySsOuOcdwQ/KKfyaeteMS6azrAF.TJcBioHoq', 'ww'),
(25, 123, 'sesar', '$2y$10$0NjZzeeVLW4iB7AtKLDv3.lgCoxVMldcaq9UL.1rixnU43XwPo7ra', 'yg'),
(26, 123, 'sesar', '$2y$10$c1CuMRFrBuHYfLuTC.n1au7BhFYToz0GWHILh6k207FEZE0KYXXo2', 'yg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `id_medico` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id_turno`, `id_paciente`, `id_medico`, `fecha`, `hora`) VALUES
(1, NULL, 10, '2022-08-12', '11:00:00'),
(2, NULL, 12, '2022-08-22', '14:00:00'),
(3, NULL, 10, '2022-05-03', '14:00:00'),
(4, NULL, 10, '2022-05-23', '17:00:00'),
(5, NULL, 10, '2022-07-13', '10:00:00'),
(6, 1, 11, '2022-08-23', '13:00:00'),
(7, NULL, 12, '2022-07-01', '09:00:00'),
(8, NULL, 15, '2022-08-23', '13:00:00'),
(9, NULL, 14, '2022-07-01', '09:00:00'),
(10, NULL, 15, '2022-08-23', '13:00:00'),
(11, 1, 20, '2022-07-01', '09:00:00'),
(12, NULL, 20, '2022-04-23', '13:00:00'),
(13, NULL, 18, '2022-02-01', '12:00:00');

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
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_medico` (`id_medico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `id_secretaria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
