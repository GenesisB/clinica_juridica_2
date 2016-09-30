-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-07-2016 a las 06:32:28
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clinica_juridica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_agenda`
--

CREATE TABLE IF NOT EXISTS `asignacion_agenda` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(45) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `id_asunto` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `tipo_asunto` varchar(45) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `sede` varchar(45) NOT NULL,
  PRIMARY KEY (`id_asignacion`),
  UNIQUE KEY `id_dia_abogado_UNIQUE` (`id_asignacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_agenda_historico`
--

CREATE TABLE IF NOT EXISTS `asignacion_agenda_historico` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(45) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `id_asunto` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `tipo_asunto` varchar(45) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha_eliminacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motivo` varchar(255) NOT NULL,
  `quien_elimina` varchar(255) NOT NULL,
  PRIMARY KEY (`id_asignacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asuntos`
--

CREATE TABLE IF NOT EXISTS `asuntos` (
  `idasuntos` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_asunto` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `rut_asociado` varchar(45) NOT NULL,
  `sede` varchar(45) NOT NULL,
  PRIMARY KEY (`idasuntos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiencias`
--

CREATE TABLE IF NOT EXISTS `audiencias` (
  `id_audiencia` int(11) NOT NULL AUTO_INCREMENT,
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
  `sede` varchar(45) NOT NULL,
  PRIMARY KEY (`id_audiencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloques`
--

CREATE TABLE IF NOT EXISTS `bloques` (
  `tipo_horario` varchar(45) NOT NULL,
  `inicio` varchar(45) NOT NULL,
  `termino` varchar(45) NOT NULL,
  `sede` varchar(45) DEFAULT NULL,
  `oficina` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `causal_termino` (
  `id_causal_termino` int(11) NOT NULL AUTO_INCREMENT,
  `nom_causal` varchar(80) NOT NULL,
  PRIMARY KEY (`id_causal_termino`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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

CREATE TABLE IF NOT EXISTS `causas` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `rut_cliente` int(255) NOT NULL,
  `dv_cliente` varchar(1) NOT NULL,
  `nombre_cliente` varchar(80) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`rut_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf_agenda`
--

CREATE TABLE IF NOT EXISTS `conf_agenda` (
  `id_conf_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` varchar(45) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `sede` varchar(45) DEFAULT NULL,
  `oficina` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_conf_agenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nom_materia` varchar(80) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

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

CREATE TABLE IF NOT EXISTS `orientacion` (
  `id_orientacion` int(11) NOT NULL AUTO_INCREMENT,
  `fec_ingreso` varchar(45) NOT NULL,
  `id_materia` varchar(45) NOT NULL,
  `resena` varchar(45) NOT NULL,
  `rut_abogado` varchar(45) NOT NULL,
  `rut_usuario` varchar(45) NOT NULL,
  `sede` varchar(45) NOT NULL,
  PRIMARY KEY (`id_orientacion`),
  UNIQUE KEY `id_orientacion_UNIQUE` (`id_orientacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id_privilegio` int(255) NOT NULL AUTO_INCREMENT,
  `rut` int(11) NOT NULL,
  `sede` int(11) NOT NULL,
  `tipo_privilegio` varchar(255) NOT NULL,
  `privilegio` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_privilegio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

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
(28, 17791980, 1, 'Reportes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id_sede` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sede` varchar(255) NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `usuarios` (
  `rut` int(255) NOT NULL,
  `dv` varchar(1) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `pwd` varchar(80) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `tipo_usuario` varchar(45) NOT NULL,
  `sede` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`rut`, `dv`, `nombre`, `pwd`, `telefono`, `email`, `tipo_usuario`, `sede`) VALUES
(17185872, '0', 'CRISTOBAL ALEGRIA', '$2a$08$WfmfsrsHLHRcxnt2h8j8B.1Hw9eWRy5rlmTFF7xy0KU24VAe3.At2', '2972592', 'c.alegria@hrtech.cl', 'F', '2'),
(17287534, '3', 'HERNAN SAAVEDRA', '$2a$08$WfmfsrsHLHRcxnt2h8j8B.1Hw9eWRy5rlmTFF7xy0KU24VAe3.At2', NULL, 'her.saavedra@uandresbello.edu', 'F', '1'),
(17791980, '2', 'GENESIS BUSTAMANTE', '$2a$08$RsbHwJea/wgjQTbXy1pX0eLP.hwFG/SoTiEID5dy0Xqh2lXgXgCvC', '988880855', 'genmarc@gmail.com', 'F', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sede`
--

CREATE TABLE IF NOT EXISTS `usuario_sede` (
  `id_usuario_sede` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(255) NOT NULL,
  `id_sede` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario_sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Volcado de datos para la tabla `usuario_sede`
--

INSERT INTO `usuario_sede` (`id_usuario_sede`, `rut`, `id_sede`) VALUES
(29, '17185872', '1'),
(96, '17185872', '2'),
(97, '17185872', '3'),
(33, '17287534', '1'),
(98, '17287534', '2'),
(99, '17791980', '1'),
(100, '17791980', '2'),
(101, '17791980', '3');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
