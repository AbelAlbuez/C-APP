-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2018 a las 01:17:41
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unirate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_profesor`
--

CREATE TABLE `calificaciones_profesor` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones_profesor`
--

INSERT INTO `calificaciones_profesor` (`id`, `id_profesor`, `id_estudiante`, `calificacion`) VALUES
(15, 6, 1, 3.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_universidad`
--

CREATE TABLE `calificaciones_universidad` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_universidad` int(11) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones_universidad`
--

INSERT INTO `calificaciones_universidad` (`id`, `id_estudiante`, `id_universidad`, `calificacion`) VALUES
(21, 1, 15, 4),
(22, 2, 15, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(7, 'IngenierÃ­a en Sistemas'),
(8, 'IngenierÃ­a de Software'),
(9, 'Medicina'),
(10, 'Arquitectura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `correo`, `contrasena`, `admin`) VALUES
(1, 'Alejandro Villa', 'alejandrovillacordero@gmail.com', '123', 1),
(2, 'Angel Reyes', 'AnggelReyes@hotmail.com', '123', 1),
(3, 'Henry Paula', 'henrypaula005@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`) VALUES
(6, 'ProgramaciÃ³n I'),
(7, 'ProgramaciÃ³n II'),
(8, 'ProgramaciÃ³n III'),
(9, 'QuÃ­mica'),
(10, 'AutoCAD'),
(11, 'CÃ¡lculo I'),
(12, 'CÃ¡lculo II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `foto`) VALUES
(6, 'Willis Polanco', '15027966_10154832666229924_1415820079106748236_n.jpg'),
(7, 'Stanley Lara', '11109210_10155475349145725_3088372026779918024_n.jpg'),
(8, 'Kenia Hiciano', '20767879_10209753145009608_7997357457697531438_n.jpg'),
(9, 'Wilton Oltmanns', 'hqdefault.jpg'),
(10, 'Luis Soto', '13139323_1066071463461438_5603328618397012543_n.jpg'),
(11, 'Jennifer Poueriet', '32883736_1686346428080214_2783654474466459648_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones_universidad_carrera`
--

CREATE TABLE `relaciones_universidad_carrera` (
  `id` int(11) NOT NULL,
  `id_universidad` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `relaciones_universidad_carrera`
--

INSERT INTO `relaciones_universidad_carrera` (`id`, `id_universidad`, `id_carrera`) VALUES
(27, 15, 8),
(28, 15, 7),
(30, 17, 10),
(31, 16, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones_universidad_carrera_estudiante`
--

CREATE TABLE `relaciones_universidad_carrera_estudiante` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_relacion_universidad_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `relaciones_universidad_carrera_estudiante`
--

INSERT INTO `relaciones_universidad_carrera_estudiante` (`id`, `id_estudiante`, `id_relacion_universidad_carrera`) VALUES
(3, 2, 27),
(5, 1, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones_universidad_carrera_materia`
--

CREATE TABLE `relaciones_universidad_carrera_materia` (
  `id` int(11) NOT NULL,
  `id_relacion_universidad_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `relaciones_universidad_carrera_materia`
--

INSERT INTO `relaciones_universidad_carrera_materia` (`id`, `id_relacion_universidad_carrera`, `id_materia`) VALUES
(22, 27, 6),
(23, 27, 7),
(26, 27, 8),
(27, 30, 10),
(28, 30, 11),
(29, 30, 12),
(30, 31, 9),
(31, 28, 6),
(32, 28, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones_universidad_carrera_materia_profesor`
--

CREATE TABLE `relaciones_universidad_carrera_materia_profesor` (
  `id` int(11) NOT NULL,
  `id_relacion_universidad_carrera_materia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `relaciones_universidad_carrera_materia_profesor`
--

INSERT INTO `relaciones_universidad_carrera_materia_profesor` (`id`, `id_relacion_universidad_carrera_materia`, `id_profesor`) VALUES
(11, 22, 6),
(12, 31, 6),
(13, 26, 7),
(14, 32, 9),
(15, 28, 9),
(16, 29, 9),
(18, 27, 11),
(19, 23, 10),
(20, 30, 8),
(22, 22, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones_universidad_carrera_materia_profesor_estudiante`
--

CREATE TABLE `relaciones_universidad_carrera_materia_profesor_estudiante` (
  `id` int(11) NOT NULL,
  `id_relacion_universidad_carrera_materia_profesor` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `relaciones_universidad_carrera_materia_profesor_estudiante`
--

INSERT INTO `relaciones_universidad_carrera_materia_profesor_estudiante` (`id`, `id_relacion_universidad_carrera_materia_profesor`, `id_estudiante`) VALUES
(2, 11, 2),
(4, 19, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

CREATE TABLE `universidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_completo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `universidades`
--

INSERT INTO `universidades` (`id`, `nombre`, `nombre_completo`, `logo`) VALUES
(15, 'UNAPEC', 'Universidad AcciÃ³n Pro EducaciÃ³n y Cultura', 'apec.png'),
(16, 'UNIBE', 'Universidad Iberoamericana', 'uniha.jpg'),
(17, 'PUCMM', 'Pontificia Universidad CatÃ³lica Madre y Maestra', 'Logo PUCMM (Color).png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_profesor`
--
ALTER TABLE `calificaciones_profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `calificaciones_universidad`
--
ALTER TABLE `calificaciones_universidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_universidad` (`id_universidad`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relaciones_universidad_carrera`
--
ALTER TABLE `relaciones_universidad_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_universidad` (`id_universidad`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `relaciones_universidad_carrera_estudiante`
--
ALTER TABLE `relaciones_universidad_carrera_estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_relacion_universidad_carrera` (`id_relacion_universidad_carrera`);

--
-- Indices de la tabla `relaciones_universidad_carrera_materia`
--
ALTER TABLE `relaciones_universidad_carrera_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_relacion_universidad_carrera` (`id_relacion_universidad_carrera`);

--
-- Indices de la tabla `relaciones_universidad_carrera_materia_profesor`
--
ALTER TABLE `relaciones_universidad_carrera_materia_profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_relacion_universidad_carrera_materia` (`id_relacion_universidad_carrera_materia`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `relaciones_universidad_carrera_materia_profesor_estudiante`
--
ALTER TABLE `relaciones_universidad_carrera_materia_profesor_estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_relacion_universidad_carrera_materia_profesor` (`id_relacion_universidad_carrera_materia_profesor`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones_profesor`
--
ALTER TABLE `calificaciones_profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `calificaciones_universidad`
--
ALTER TABLE `calificaciones_universidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `relaciones_universidad_carrera`
--
ALTER TABLE `relaciones_universidad_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `relaciones_universidad_carrera_estudiante`
--
ALTER TABLE `relaciones_universidad_carrera_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `relaciones_universidad_carrera_materia`
--
ALTER TABLE `relaciones_universidad_carrera_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `relaciones_universidad_carrera_materia_profesor`
--
ALTER TABLE `relaciones_universidad_carrera_materia_profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `relaciones_universidad_carrera_materia_profesor_estudiante`
--
ALTER TABLE `relaciones_universidad_carrera_materia_profesor_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `universidades`
--
ALTER TABLE `universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones_profesor`
--
ALTER TABLE `calificaciones_profesor`
  ADD CONSTRAINT `calificaciones_profesor_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_profesor_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones_universidad`
--
ALTER TABLE `calificaciones_universidad`
  ADD CONSTRAINT `calificaciones_universidad_ibfk_1` FOREIGN KEY (`id_universidad`) REFERENCES `universidades` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_universidad_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `relaciones_universidad_carrera`
--
ALTER TABLE `relaciones_universidad_carrera`
  ADD CONSTRAINT `relaciones_universidad_carrera_ibfk_1` FOREIGN KEY (`id_universidad`) REFERENCES `universidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relaciones_universidad_carrera_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `relaciones_universidad_carrera_estudiante`
--
ALTER TABLE `relaciones_universidad_carrera_estudiante`
  ADD CONSTRAINT `relaciones_universidad_carrera_estudiante_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relaciones_universidad_carrera_estudiante_ibfk_2` FOREIGN KEY (`id_relacion_universidad_carrera`) REFERENCES `relaciones_universidad_carrera` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `relaciones_universidad_carrera_materia`
--
ALTER TABLE `relaciones_universidad_carrera_materia`
  ADD CONSTRAINT `relaciones_universidad_carrera_materia_ibfk_1` FOREIGN KEY (`id_relacion_universidad_carrera`) REFERENCES `relaciones_universidad_carrera` (`id`),
  ADD CONSTRAINT `relaciones_universidad_carrera_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `relaciones_universidad_carrera_materia_ibfk_3` FOREIGN KEY (`id_relacion_universidad_carrera`) REFERENCES `relaciones_universidad_carrera` (`id`);

--
-- Filtros para la tabla `relaciones_universidad_carrera_materia_profesor`
--
ALTER TABLE `relaciones_universidad_carrera_materia_profesor`
  ADD CONSTRAINT `relaciones_universidad_carrera_materia_profesor_ibfk_1` FOREIGN KEY (`id_relacion_universidad_carrera_materia`) REFERENCES `relaciones_universidad_carrera_materia` (`id`),
  ADD CONSTRAINT `relaciones_universidad_carrera_materia_profesor_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
