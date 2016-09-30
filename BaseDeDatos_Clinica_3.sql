-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2016 a las 23:26:08
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cj_gb2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_agenda`
--

CREATE TABLE `asignacion_agenda` (
  `id_asignacion` int(11) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `id_asunto` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `tipo_asunto` varchar(45) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `sede` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_agenda_historico`
--

CREATE TABLE `asignacion_agenda_historico` (
  `id_asignacion` int(11) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `id_asunto` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `tipo_asunto` varchar(45) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha_eliminacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motivo` varchar(255) NOT NULL,
  `quien_elimina` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asuntos`
--

CREATE TABLE `asuntos` (
  `idasuntos` int(11) NOT NULL,
  `titulo_asunto` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `rut_asociado` varchar(45) NOT NULL,
  `sede` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiencias`
--

CREATE TABLE `audiencias` (
  `id_audiencia` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_causa` varchar(45) NOT NULL,
  `tipo_audiencia` varchar(45) NOT NULL,
  `numero_audiencia` int(11) NOT NULL,
  `rut_alumno` int(255) NOT NULL,
  `rut_profesor` int(255) NOT NULL,
  `nota_registro_1` int(2) NOT NULL,
  `nota_registro_2` int(2) NOT NULL,
  `nota_registro_3` int(2) NOT NULL,
  `nota_registro_otros` varchar(45) DEFAULT NULL,
  `nota_destreza_1` int(2) NOT NULL,
  `nota_destreza_2` int(2) NOT NULL,
  `nota_destreza_3` int(2) NOT NULL,
  `nota_destreza_4` int(2) NOT NULL,
  `nota_destreza_5` int(2) NOT NULL,
  `nota_destreza_6` int(2) NOT NULL,
  `nota_destreza_7` int(2) NOT NULL,
  `nota_destreza_8` int(2) NOT NULL,
  `nota_destreza_9` int(2) NOT NULL,
  `nota_destreza_10` int(2) NOT NULL,
  `nota_destreza_11` int(2) NOT NULL,
  `nota_destreza_12` int(2) NOT NULL,
  `nota_item_1` int(2) NOT NULL,
  `nota_item_2` int(2) NOT NULL,
  `nota_item_3` int(2) NOT NULL,
  `nota_final` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `sede` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloques`
--

CREATE TABLE `bloques` (
  `tipo_horario` varchar(45) NOT NULL,
  `inicio` varchar(45) NOT NULL,
  `termino` varchar(45) NOT NULL,
  `sede` varchar(45) DEFAULT NULL,
  `oficina` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bloques`
--

INSERT INTO `bloques` (`tipo_horario`, `inicio`, `termino`, `sede`, `oficina`) VALUES
('D', '15:00:00', '18:30:00', '1', NULL),
('D', '15:30:00', '20:00:00', '2', NULL),
('D', '15:00:00', '20:00:00', '3', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causal_termino`
--

CREATE TABLE `causal_termino` (
  `id_causal_termino` int(11) NOT NULL,
  `nom_causal` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causal_termino`
--

INSERT INTO `causal_termino` (`id_causal_termino`, `nom_causal`) VALUES
(1, 'ABANDONO DE PROPIEDAD'),
(2, 'FAVORABLE'),
(3, 'CONCILIACION'),
(4, 'PADRE RECONOCE MENOR'),
(5, 'DEMANDADO INUBICABLE'),
(6, 'FAVORABLE PARCIALMENTE'),
(7, 'INCOMPARECENCIA DE LA PARTE'),
(8, 'AVENIMIENTO'),
(9, 'DESISTIMIENTO'),
(10, 'EXCEPCION DE INCOMPETENCIA'),
(11, 'SIN NOTIFICACION '),
(12, 'ARCHIVADA POR TRIBUNAL'),
(13, 'DESFAVORABLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causas`
--

CREATE TABLE `causas` (
  `id_causa` varchar(255) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `INGRESO` date DEFAULT NULL,
  `TERMINO` date DEFAULT NULL,
  `RUT_ALUMNO` varchar(20) DEFAULT NULL,
  `RUT_CLIENTE` varchar(20) DEFAULT NULL,
  `CAUSAL_TERMINO` varchar(80) DEFAULT NULL,
  `RUT_ABOGADO` varchar(20) DEFAULT NULL,
  `DV_ALUMNO` varchar(1) DEFAULT NULL,
  `DV_CLIENTE` varchar(1) DEFAULT NULL,
  `DV_ABOGADO` varchar(1) DEFAULT NULL,
  `SEDE` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `rut_cliente` int(255) NOT NULL,
  `dv_cliente` varchar(1) NOT NULL,
  `nombre_cliente` varchar(80) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf_agenda`
--

CREATE TABLE `conf_agenda` (
  `id_conf_agenda` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` varchar(45) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `sede` varchar(45) DEFAULT NULL,
  `oficina` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nom_materia` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nom_materia`) VALUES
(1, 'POSESION EFECTIVA'),
(2, 'EXTRAVIO  DE TITULO DE CREDITO PRIMER JUZGADO CIVIL'),
(3, 'TERMINO CONTRATO ARRENDAMIENTO'),
(4, 'PROTECCION'),
(5, 'ARRENDAMIENTO'),
(6, 'REBAJA ALIMENTOS'),
(7, 'REGULACION RDR'),
(8, 'DIVORCIO CON COMPENSACION ECONOMICA'),
(9, 'RECLAMACION FILIACION NO MATRIMONIAL'),
(10, 'DIVORCIO UNILATERAL'),
(11, 'RECLAMACION DE PATERNIDAD'),
(12, 'ALIMENTOS'),
(13, 'INTERDICCION Y NOMBRAMIENTO CURADOR'),
(14, 'DIVORCIO MUTUO ACUERDO'),
(15, 'DIVORCIO UNILATERAL POR CESE CONVIVENCIA'),
(16, 'MODIFICACION RDR'),
(17, 'DIVORCIO UNILATERAL SIN COMPENSACION'),
(18, 'CUIDADO PERSONAL'),
(19, 'EMBARGO'),
(20, 'DIVORCIO POR CESE DE CONVIVENCIA'),
(21, 'TRANSACCION EXTRAJUDICIAL'),
(22, 'RDR'),
(23, 'DEMANDA DE PRECARIO'),
(24, 'JUICIO ORDINARIO DE MENOR CUANTIA'),
(25, 'DIVORCIO COMUN ACUERDO'),
(26, 'VIF'),
(27, 'FILIACION'),
(28, 'HERENCIA JULIA ROJAS VALENZUELA'),
(29, 'SEGUNDAS NUPCIAS'),
(30, 'ALIMENTOS SUBSIDIARIOS'),
(31, 'AUMENTO ALIMENTOS'),
(32, 'JUICIO ARRENDAMIENTO'),
(33, 'CUMPLIMIENTO DE TITULO EJECUTIVO'),
(34, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orientacion`
--

CREATE TABLE `orientacion` (
  `id_orientacion` int(11) NOT NULL,
  `fec_ingreso` varchar(45) NOT NULL,
  `id_materia` varchar(45) NOT NULL,
  `resena` varchar(45) NOT NULL,
  `rut_abogado` varchar(45) NOT NULL,
  `rut_usuario` varchar(45) NOT NULL,
  `sede` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id_privilegio` int(255) NOT NULL,
  `rut` int(11) NOT NULL,
  `sede` int(11) NOT NULL,
  `tipo_privilegio` varchar(255) NOT NULL,
  `privilegio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id_privilegio`, `rut`, `sede`, `tipo_privilegio`, `privilegio`) VALUES
(8, 17287534, 1, 'Mantencion', 1),
(9, 17287534, 1, 'Busquedas', 1),
(10, 17287534, 1, 'Agenda', 1),
(11, 17287534, 1, 'Orientaciones', 1),
(12, 17287534, 1, 'Audiencia', 1),
(13, 17287534, 1, 'Panel', 1),
(14, 17287534, 1, 'Reportes', 1),
(15, 17185872, 1, 'Mantencion', 1),
(16, 17185872, 1, 'Busquedas', 1),
(17, 17185872, 1, 'Agenda', 1),
(18, 17185872, 1, 'Orientaciones', 1),
(19, 17185872, 1, 'Audiencia', 1),
(20, 17185872, 1, 'Panel', 1),
(21, 17185872, 1, 'Reportes', 1),
(22, 17791980, 1, 'Mantencion', 1),
(23, 17791980, 1, 'Busquedas', 1),
(24, 17791980, 1, 'Agenda', 1),
(25, 17791980, 1, 'Orientaciones', 1),
(26, 17791980, 1, 'Audiencia', 1),
(27, 17791980, 1, 'Panel', 1),
(28, 17791980, 1, 'Reportes', 1),
(29, 17000000, 2, 'Mantencion', 0),
(30, 17000000, 2, 'Busquedas', 0),
(31, 17000000, 2, 'Agenda', 0),
(32, 17000000, 2, 'Orientaciones', 0),
(33, 17000000, 2, 'Audiencia', 0),
(34, 17000000, 2, 'Panel', 0),
(35, 17000000, 2, 'Reportes', 0),
(36, 10000000, 2, 'Mantencion', 0),
(37, 10000000, 2, 'Busquedas', 0),
(38, 10000000, 2, 'Agenda', 0),
(39, 10000000, 2, 'Orientaciones', 1),
(40, 10000000, 2, 'Audiencia', 0),
(41, 10000000, 2, 'Panel', 0),
(42, 10000000, 2, 'Reportes', 0),
(43, 10000001, 2, 'Mantencion', 0),
(44, 10000001, 2, 'Busquedas', 0),
(45, 10000001, 2, 'Agenda', 0),
(46, 10000001, 2, 'Orientaciones', 1),
(47, 10000001, 2, 'Audiencia', 0),
(48, 10000001, 2, 'Panel', 0),
(49, 10000001, 2, 'Reportes', 0),
(50, 12000000, 2, 'Mantencion', 1),
(51, 12000000, 2, 'Busquedas', 1),
(52, 12000000, 2, 'Agenda', 1),
(53, 12000000, 2, 'Orientaciones', 1),
(54, 12000000, 2, 'Audiencia', 1),
(55, 12000000, 2, 'Panel', 1),
(56, 12000000, 2, 'Reportes', 1),
(57, 10000002, 2, 'Mantencion', 1),
(58, 10000002, 2, 'Busquedas', 1),
(59, 10000002, 2, 'Agenda', 1),
(60, 10000002, 2, 'Orientaciones', 1),
(61, 10000002, 2, 'Audiencia', 1),
(62, 10000002, 2, 'Panel', 1),
(63, 10000002, 2, 'Reportes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `nombre_sede` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `nombre_sede`) VALUES
(1, 'Campus Viña del mar'),
(2, 'Campus Republica'),
(3, 'Campus Los Leones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `rut` int(255) NOT NULL,
  `dv` varchar(1) NOT NULL,
  `nombre_usuario` varchar(24) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `pwd` varchar(80) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `tipo_usuario` varchar(45) NOT NULL,
  `sede` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rut`),
  UNIQUE KEY `rut_UNIQUE` (`rut`),
  UNIQUE KEY `username_unico` (`nombre_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`rut`, `dv`, `nombre_usuario`, `nombre`, `pwd`, `telefono`, `email`, `tipo_usuario`, `sede`) VALUES
(10000000, '2', 'abogado', 'Cuenta Abogado de Prueba', '$2y$08$A8YYJEIEXPhOvH1aAa4Ft.DEJ8EuNwJZWZE9FhrJWT7jy5wBXEpP2', '900000000', 'abogado.prueba@example.com', 'P', '2'),
(10000001, '2', 'profesor', 'Cuenta Profesor de Prueba', '$2y$08$zrC56fEzCCD0NOOaORpSzOOqWQKI/xEqZceapaZVLcju35G2jzi3q', '900000000', 'profesor.prueba@example.com', 'P', '2'),
(10000002, '2', 'director', 'Cuenta Director de Prueba', '$2y$08$srEu2pa8sVkE608hdqNQr.p35p37IYCjKJlenuzC6fIVj0Oq8ZA16', '900000000', 'director.prueba@example.com', 'F', '2'),
(12000000, '2', 'administrador', 'Cuenta Administrador de Prueba', '$2y$08$YPp7ciTmMCPmrbrCrJ6hSeBarR97asSMwtR6ZT8S.3YijwS5P6v.K', '900000000', 'administrador.prueba@example.com', 'F', '2'),
(17000000, '2', 'alumno', 'Cuenta Alumno de Prueba', '$2y$08$9dzaQmf1KbhoxhamhZana.XGq0DBR/y5Xlmnd/zCG3nxK3/kEQD6i', '900000000', 'alumno.prueba@example.com', 'A', '2'),
(17185872, '0', 'cristobal', 'CRISTOBAL ALEGRIA', '$2a$08$WfmfsrsHLHRcxnt2h8j8B.1Hw9eWRy5rlmTFF7xy0KU24VAe3.At2', '2972592', 'c.alegria@hrtech.cl', 'F', '2'),
(17287534, '3', 'hernan', 'HERNAN SAAVEDRA', '$2a$08$WfmfsrsHLHRcxnt2h8j8B.1Hw9eWRy5rlmTFF7xy0KU24VAe3.At2', NULL, 'her.saavedra@uandresbello.edu', 'F', '1'),
(17791980, '2', 'genesis', 'GENESIS BUSTAMANTE', '$2a$08$RsbHwJea/wgjQTbXy1pX0eLP.hwFG/SoTiEID5dy0Xqh2lXgXgCvC', '988880855', 'genmarc@gmail.com', 'F', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sede`
--

CREATE TABLE `usuario_sede` (
  `id_usuario_sede` int(11) NOT NULL,
  `rut` varchar(255) NOT NULL,
  `id_sede` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_sede`
--

INSERT INTO `usuario_sede` (`id_usuario_sede`, `rut`, `id_sede`) VALUES
(29, '17185872', '1'),
(33, '17287534', '1'),
(96, '17185872', '2'),
(97, '17185872', '3'),
(98, '17287534', '2'),
(99, '17791980', '1'),
(100, '17791980', '2'),
(101, '17791980', '3'),
(102, '17000000', '2'),
(103, '10000000', '2'),
(104, '10000001', '2'),
(105, '12000000', '2'),
(106, '10000002', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_agenda`
--
ALTER TABLE `asignacion_agenda`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD UNIQUE KEY `id_dia_abogado_UNIQUE` (`id_asignacion`);

--
-- Indices de la tabla `asignacion_agenda_historico`
--
ALTER TABLE `asignacion_agenda_historico`
  ADD PRIMARY KEY (`id_asignacion`);

--
-- Indices de la tabla `asuntos`
--
ALTER TABLE `asuntos`
  ADD PRIMARY KEY (`idasuntos`);

--
-- Indices de la tabla `audiencias`
--
ALTER TABLE `audiencias`
  ADD PRIMARY KEY (`id_audiencia`);

--
-- Indices de la tabla `causal_termino`
--
ALTER TABLE `causal_termino`
  ADD PRIMARY KEY (`id_causal_termino`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`rut_cliente`);

--
-- Indices de la tabla `conf_agenda`
--
ALTER TABLE `conf_agenda`
  ADD PRIMARY KEY (`id_conf_agenda`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `orientacion`
--
ALTER TABLE `orientacion`
  ADD PRIMARY KEY (`id_orientacion`),
  ADD UNIQUE KEY `id_orientacion_UNIQUE` (`id_orientacion`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);


--
-- Indices de la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  ADD PRIMARY KEY (`id_usuario_sede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_agenda`
--
ALTER TABLE `asignacion_agenda`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_agenda_historico`
--
ALTER TABLE `asignacion_agenda_historico`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asuntos`
--
ALTER TABLE `asuntos`
  MODIFY `idasuntos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `audiencias`
--
ALTER TABLE `audiencias`
  MODIFY `id_audiencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `causal_termino`
--
ALTER TABLE `causal_termino`
  MODIFY `id_causal_termino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `conf_agenda`
--
ALTER TABLE `conf_agenda`
  MODIFY `id_conf_agenda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `orientacion`
--
ALTER TABLE `orientacion`
  MODIFY `id_orientacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id_privilegio` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  MODIFY `id_usuario_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
