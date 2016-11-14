-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2016 a las 02:26:51
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_gr1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`id`, `nombre`, `descripcion`) VALUES
(1, 'h', 'o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechadenacimiento` datetime NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Facultad_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombres`, `apellidos`, `fechadenacimiento`, `correo`, `direccion`, `telefono`, `Facultad_id`) VALUES
(3, 'i', 'op', '2016-01-01 00:00:00', 'iol', 'o', 'p', 1),
(4, 'j', 'j', '2016-01-01 00:00:00', 'g', 'f', 'i', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`, `carrera`, `descripcion`) VALUES
(1, 'Ingenieria en Sistemas', 'Desarrollo de Software', 'Edf.24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicaciones`
--

CREATE TABLE `indicaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Enfermedad_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `indicaciones`
--

INSERT INTO `indicaciones` (`id`, `descripcion`, `Enfermedad_id`) VALUES
(1, 'kn', NULL),
(2, 'klklklk', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentoporindicaciones`
--

CREATE TABLE `medicamentoporindicaciones` (
  `indicaciones_id` int(11) NOT NULL,
  `medicamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padecer`
--

CREATE TABLE `padecer` (
  `estudiante_id` int(11) NOT NULL,
  `enfermedad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3B3F3FADBFB26456` (`Facultad_id`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `indicaciones`
--
ALTER TABLE `indicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7D2D88E7B75C1ADF` (`Enfermedad_id`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicamentoporindicaciones`
--
ALTER TABLE `medicamentoporindicaciones`
  ADD PRIMARY KEY (`indicaciones_id`,`medicamento_id`),
  ADD KEY `IDX_1122F4667C694D5E` (`indicaciones_id`),
  ADD KEY `IDX_1122F466DECC3FDC` (`medicamento_id`);

--
-- Indices de la tabla `padecer`
--
ALTER TABLE `padecer`
  ADD PRIMARY KEY (`estudiante_id`,`enfermedad_id`),
  ADD KEY `IDX_3EF6FF9D59590C39` (`estudiante_id`),
  ADD KEY `IDX_3EF6FF9D422512A` (`enfermedad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `indicaciones`
--
ALTER TABLE `indicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `FK_3B3F3FADBFB26456` FOREIGN KEY (`Facultad_id`) REFERENCES `facultad` (`id`);

--
-- Filtros para la tabla `indicaciones`
--
ALTER TABLE `indicaciones`
  ADD CONSTRAINT `FK_7D2D88E7B75C1ADF` FOREIGN KEY (`Enfermedad_id`) REFERENCES `enfermedad` (`id`);

--
-- Filtros para la tabla `medicamentoporindicaciones`
--
ALTER TABLE `medicamentoporindicaciones`
  ADD CONSTRAINT `FK_1122F4667C694D5E` FOREIGN KEY (`indicaciones_id`) REFERENCES `indicaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1122F466DECC3FDC` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `padecer`
--
ALTER TABLE `padecer`
  ADD CONSTRAINT `FK_3EF6FF9D422512A` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedad` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3EF6FF9D59590C39` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
