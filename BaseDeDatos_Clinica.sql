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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

--
-- Volcado de datos para la tabla `asignacion_agenda`
--

INSERT INTO `asignacion_agenda` (`id_asignacion`, `rut`, `fecha_asignacion`, `id_asunto`, `hora_inicio`, `hora_fin`, `tipo_asunto`, `estado`, `sede`) VALUES
(136, '12953441', '2016-07-27', 'C-2329-2015', '15:30:00', '16:00:00', 'causa', 'Agendado', '1'),
(137, '12953441', '2016-07-27', 'AUX-0005-2016', '16:00:00', '16:30:00', 'causa', 'Agendado', '1'),
(142, '22555470', '2016-07-26', 'AS_35', '16:30:00', '17:00:00', 'asunto', 'Agendado', '1'),
(143, '22555470', '2016-07-29', 'AS_36', '16:00:00', '16:30:00', 'asunto', 'Agendado', '2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Volcado de datos para la tabla `asignacion_agenda_historico`
--

INSERT INTO `asignacion_agenda_historico` (`id_asignacion`, `rut`, `fecha_asignacion`, `id_asunto`, `hora_inicio`, `hora_fin`, `tipo_asunto`, `estado`, `fecha_eliminacion`, `motivo`, `quien_elimina`) VALUES
(132, '1', '2016-07-20', 'cas-23845-2016', '17:30:00', '18:00:00', 'causa', 'Agendado', '2016-07-18 02:26:21', 'cancelacion', '1'),
(138, '22555470', '2016-07-29', 'AUX-00584', '15:30:00', '16:00:00', 'causa', 'Agendado', '2016-07-25 02:12:03', 'reagendar', '17185872'),
(139, '22555470', '2016-07-29', 'AS_33', '15:30:00', '16:00:00', 'asunto', NULL, '2016-07-25 02:12:21', 'mal_asignado', '17185872'),
(141, '0', '2016-07-26', 'AS_34', '16:30:00', '17:00:00', 'asunto', 'Agendado', '2016-07-27 04:07:20', 'otro', '17185872');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `asuntos`
--

INSERT INTO `asuntos` (`idasuntos`, `titulo_asunto`, `descripcion`, `rut_asociado`, `sede`) VALUES
(33, 'test', 'test', '22555470', '2'),
(34, 'prueba', 'test', '0', '1'),
(35, 'dsfsf', 'sfsfdsdf', '22555470', '1'),
(36, 'asdasd', 'asdasd', '22555470', '2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `audiencias`
--

INSERT INTO `audiencias` (`id_audiencia`, `descripcion`, `id_causa`, `tipo_audiencia`, `numero_audiencia`, `rut_alumno`, `rut_profesor`, `nota_registro_1`, `nota_registro_2`, `nota_registro_3`, `nota_registro_otros`, `nota_destreza_1`, `nota_destreza_2`, `nota_destreza_3`, `nota_destreza_4`, `nota_destreza_5`, `nota_destreza_6`, `nota_destreza_7`, `nota_destreza_8`, `nota_destreza_9`, `nota_destreza_10`, `nota_destreza_11`, `nota_destreza_12`, `nota_item_1`, `nota_item_2`, `nota_item_3`, `nota_final`, `fecha`, `hora`, `sede`) VALUES
(14, 'Preparación del caso.', 'C-3262-2015', 'Preparatoria', 1, 17501290, 12953441, 70, 70, 70, '', 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, '2016-07-01', '08:30:00', ''),
(15, 'Descripcion de lo sucedido en el juicio en palabras del abogado.', 'C-3262-2015', 'Jucio', 2, 17501290, 12953441, 50, 30, 30, '', 50, 50, 30, 70, 40, 50, 40, 50, 50, 40, 60, 30, 37, 47, 60, 48, '2016-07-04', '09:00:00', ''),
(16, 'Punto 1 de JuicioPunto 2 de JuicioPunto 3 de Juicio', 'C-3262-2015', 'Revision', 3, 17501290, 12953441, 50, 50, 50, '', 60, 40, 40, 60, 10, 40, 40, 10, 40, 10, 20, 40, 50, 34, 50, 45, '2016-07-05', '14:45:00', ''),
(17, 'Jucio llega a resolucion desfavorable para cliente.', 'C-3262-2015', 'Juicio', 4, 17501290, 12953441, 40, 50, 30, '', 10, 10, 30, 20, 50, 30, 30, 40, 40, 50, 60, 30, 40, 33, 40, 38, '2016-07-06', '09:30:00', ''),
(22, 'sfsdfsdf', 'C-2329-2015', 'asdasd', 1, 18299883, 12953441, 10, 10, 10, '', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2016-07-12', '15:10:00', '1'),
(23, 'xsdfdsfdsfsdfsd', 'AUX-014569', 'sfdssdsd', 1, 8224847, 22555470, 10, 10, 10, '', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2016-07-07', '15:30:00', '2'),
(24, 'asdzsasasdfa', 'C-2175-2014', 'fsdfdsfsdfsd', 1, 17501290, 12953441, 10, 10, 10, '', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2016-07-12', '15:20:00', '1');

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

CREATE TABLE IF NOT EXISTS `causal_termino` (
  `id_causal_termino` int(11) NOT NULL AUTO_INCREMENT,
  `nom_causal` varchar(80) NOT NULL,
  PRIMARY KEY (`id_causal_termino`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causas`
--

INSERT INTO `causas` (`id_causa`, `id_materia`, `INGRESO`, `TERMINO`, `RUT_ALUMNO`, `RUT_CLIENTE`, `CAUSAL_TERMINO`, `RUT_ABOGADO`, `DV_ALUMNO`, `DV_CLIENTE`, `DV_ABOGADO`, `SEDE`) VALUES
('C-2857-2015', 17, '2016-01-05', NULL, '17352995', '16278620', NULL, '10713094', '3', '2', '2', '1'),
('AUX-0002-2016', 17, '2016-01-12', NULL, '18446852', '15040833', NULL, '10713094', '2', '4', '2', '1'),
('AUX-0003-2016', 12, '2016-01-12', NULL, '18446852', '12747065', NULL, '10713094', '2', '0', '2', '1'),
('AUX-0004-2016', 11, '2016-03-08', NULL, '17973045', '17734289', NULL, '10713094', '6', '0', '2', '1'),
('C-322-2016', 12, '2016-03-08', NULL, '17973045', '13223735', NULL, '10713094', '6', '2', '2', '1'),
('C-1243-2015', 17, '2015-05-11', '2015-12-14', '17501290', '8084542', '2', '12953441', '7', '1', '9', '1'),
('C-2175-2014', 19, '2015-07-20', '2016-07-17', '17501290', '10469973', '10', '12953441', '7', '1', '9', '1'),
('C-2233-2015', 20, '2015-12-14', '2015-12-21', '18274328', '9821835', '2', '12953441', '3', '1', '9', '1'),
('T-131-2015', 21, '2015-08-18', '2015-11-30', '18300868', '18618515', '2', '12953441', '4', '3', '9', '1'),
('C-2329-2015', 11, '2015-09-07', NULL, '18299883', '17605603', NULL, '12953441', '4', '7', '9', '1'),
('C-2582-2015', 25, '2015-09-14', '2015-12-21', '17754562', '12225828', '2', '12953441', '7', '9', '9', '1'),
('C-2102-2015', 22, '2015-09-14', '2016-01-25', '17474021', '18379773', '3', '12953441', '6', '5', '9', '1'),
('C-3262-2015', 24, '2015-10-05', NULL, '17501290', '2234256', NULL, '12953441', '7', '8', '9', '1'),
('C-2933-2015', 22, '2015-11-02', NULL, '17754562', '15754087', NULL, '12953441', '7', '4', '9', '1'),
('C-2736-2015', 27, '2015-11-09', '2016-07-13', '18274328', '13372344', '12', '12953441', '3', '7', '9', '1'),
('C-2733-2015', 12, '2015-11-09', '2016-01-04', '17474021', '18380627', '3', '12953441', '6', '0', '9', '1'),
('C-2233-2015', 20, '2015-12-14', '2015-12-21', '18300868', '10157184', NULL, '12953441', '4', 'K', '9', '1'),
('C-2996-2015', 10, '2016-01-04', NULL, '18299883', '11329656', NULL, '12953441', '4', '9', '9', '1'),
('AUX-0005-2016', 30, '2016-01-18', '2016-07-04', '18300868', '13422081', '5', '12953441', '4', '3', '9', '1'),
('AUX-419877', 4, '2016-07-29', NULL, '8224847', '11282172', NULL, '22555470', '1', '4', '6', '2'),
('AUX-00584', 3, '2016-07-29', '2016-07-05', '8224847', '10157184', '10', '22555470', '1', 'K', '6', '2'),
('AUX-014569', 6, '2016-07-29', NULL, '8224847', '9821835', NULL, '22555470', '1', '1', '6', '2'),
('AUX-6478358738', 7, '2016-07-29', NULL, '8224847', '15040833', NULL, '22555470', '1', '4', '6', '2'),
('AUX-RES', 12, '2016-07-29', NULL, '8224847', '10469973', NULL, '22555470', '1', '1', '6', '2'),
('AUX-DEFG', 3, '2016-07-29', NULL, '8224847', '17605603', NULL, '22555470', '1', '7', '6', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`rut_cliente`, `dv_cliente`, `nombre_cliente`, `telefono`, `domicilio`, `email`) VALUES
(123, '5', 'hola1', 'asdasdasd', 'asasdasd', 'asdasd'),
(567, '5', '786546', '34534', '575685', '75867'),
(1234, '5', '12341d1d', 'e1', '1ed11ed13e', 'e1e31'),
(234234, '8', '242342', '234236', '234', '236'),
(1234676, 'u', 'wqerty', '123156', 'qwerty', 'ewrtyu'),
(2234256, '8', 'CASTRO NAVARRETE FELIX ROBERTO', NULL, NULL, NULL),
(2341234, '5', '1234123', '12341234', '1234124', '123412351234'),
(6491226, '7', 'Fulanito De Prueba', '456789', 'asdasd', 'asdasd@asdas.com'),
(8084542, '1', 'PONCE VEGA ELDE ISMAEL', NULL, NULL, NULL),
(9821835, '1', 'ROMERO RUBILAR HECTOR EDUARDO', NULL, NULL, NULL),
(10157184, 'K', 'PARRA CISTERNA HUGO FERNANDO', NULL, NULL, NULL),
(10469973, '1', 'CARTAJENA RIVES SERGIO IVAN', NULL, NULL, NULL),
(11282172, '4', 'MUÑOZ BRAVO ELIAS ENRIQUE', NULL, NULL, NULL),
(11329656, '9', 'SECO TAPIA MANUEL ENRIQUE', NULL, NULL, NULL),
(12225828, '9', 'OSORIO AYALA VERONICA ESTER', NULL, NULL, NULL),
(12457623, '8', '2342342762', '6364', '52323', '643'),
(12747065, '0', 'DANIELA PAZ SOTOMAYOR AEDO', NULL, NULL, NULL),
(13223735, '2', 'ALEJANDRO MICHEL MOLINA RAMOS', NULL, NULL, NULL),
(13372344, '7', 'GONZALEZ BRAVO HECTOR ANTONIO', NULL, NULL, NULL),
(13422081, '3', 'GUERRA RODRIGUEZ MARTA VITALIA', NULL, NULL, NULL),
(15040833, '4', 'RICARDO ESTEBAN ARAYA RIVERA', NULL, NULL, NULL),
(15754087, '4', 'GACITUA MARTINEZ FELIPE IGNACIO', NULL, NULL, NULL),
(16278620, '2', 'JUAN ALFONSO VILLALOBOS JIMENEZ', NULL, NULL, NULL),
(17287534, '3', 'TESTORIENTACION', '1231412', '[object Object]', 'ASDASD@ASDASD.COM'),
(17605603, '7', 'SANCHEZ FUENTES KATHERINE AMALIA', NULL, NULL, NULL),
(17734289, '0', 'CLAUDIA ANDREA GAMONAL PARADA', NULL, NULL, NULL),
(17920323, '5', 'sebastian valenzuela', '512129410', 'joaquin tocornal 10861', 'seanvava@hotmail.com'),
(18379773, '5', 'IBACACHE BARRERA MICHELY ALEXANDRA', NULL, NULL, NULL),
(18380627, '0', 'LARCO MARIN FRANCCESCA NICOLLE', NULL, NULL, NULL),
(18618515, '3', 'ANGULO MUGA MARIA JOSE', NULL, NULL, NULL),
(19895452, '8', 'gdfsz,mklghdsjhdfkolgjmdk', '45245', 'ewtwereqw', '32423wr'),
(172875343, 'u', 'TESTORIENTACION', '1235412', '[object Object]', 'asdasda@gmail.com'),
(2147483647, '8', 'wertwejgfs', '2345234', 'domicilio', 'regwe');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `conf_agenda`
--

INSERT INTO `conf_agenda` (`id_conf_agenda`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `dia`, `rut`, `sede`, `oficina`) VALUES
(49, '2009-07-01', '2017-07-30', '15:00:00', '17:30:00', 'miercoles', '12953441', '1', NULL),
(50, '2008-06-04', '2017-07-20', '15:30:00', '17:30:00', 'viernes', '22555470', '2', NULL),
(51, '2011-07-01', '2018-07-25', '16:00:00', '17:30:00', 'martes', '22555470', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nom_materia` varchar(80) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `orientacion`
--

INSERT INTO `orientacion` (`id_orientacion`, `fec_ingreso`, `id_materia`, `resena`, `rut_abogado`, `rut_usuario`, `sede`) VALUES
(9, '1970-01-01', '4', '18918919819819819819819814981', '17185872', '10469973', ''),
(10, '1970-01-01', '4', '18918919819819819819819814981', '17185872', '10469973', '2'),
(11, '1970-01-01', '4', '18918919819819819819819814981', '17185872', '10469973', '2'),
(12, '1970-01-01', '3', 'fsdgdfhdfhd', '17185872', '12225828', '2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

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
(99, 1, 2, 'Mantencion', 1),
(100, 1, 2, 'Busquedas', 1),
(101, 1, 2, 'Agenda', 1),
(102, 1, 2, 'Orientaciones', 1),
(103, 1, 2, 'Audiencia', 1),
(104, 1, 2, 'Panel', 1),
(105, 1, 2, 'Reportes', 1),
(106, 22555470, 2, 'Mantencion', 0),
(107, 22555470, 2, 'Busquedas', 0),
(108, 22555470, 2, 'Agenda', 0),
(109, 22555470, 2, 'Orientaciones', 1),
(110, 22555470, 2, 'Audiencia', 0),
(111, 22555470, 2, 'Panel', 0),
(112, 22555470, 2, 'Reportes', 0),
(113, 8224847, 2, 'Mantencion', 0),
(114, 8224847, 2, 'Busquedas', 0),
(115, 8224847, 2, 'Agenda', 0),
(116, 8224847, 2, 'Orientaciones', 0),
(117, 8224847, 2, 'Audiencia', 0),
(118, 8224847, 2, 'Panel', 0),
(119, 8224847, 2, 'Reportes', 0),
(120, 6491226, 2, 'Mantencion', 1),
(121, 6491226, 2, 'Busquedas', 1),
(122, 6491226, 2, 'Agenda', 1),
(123, 6491226, 2, 'Orientaciones', 1),
(124, 6491226, 2, 'Audiencia', 1),
(125, 6491226, 2, 'Panel', 1),
(126, 6491226, 2, 'Reportes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id_sede` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sede` varchar(255) NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`rut`, `dv`, `nombre`, `pwd`, `telefono`, `email`, `tipo_usuario`, `sede`) VALUES
(8224847, '1', 'Matilda Bauer', '12qw12', NULL, NULL, 'A', '2'),
(9633643, '8', 'ALBERTO CLEMENTE', 'clave', NULL, NULL, 'A', '1'),
(10023354, '1', 'PABLO VILLANUEVA ROMERO', 'clave', NULL, NULL, 'P', '1'),
(10713094, '2', 'PEDRO SEBASTIAN GUERRA ARAYA', 'clave', NULL, NULL, 'P', '1'),
(10911811, '7', 'ELBA VALLE VIDAL', 'clave', '74779793', 'el.valle@uandresbello.edu', 'A', '1'),
(12228692, '4', 'ROMANET GUTIERREZ PINOCHET', 'clave', '91626000', 'romanet.sol@gmail.com', 'A', '1'),
(12270999, 'K', 'PAOLA SANCHEZ RIOS', 'clave', '93151896', 'paola.sanchez.rios72@gmail.com', 'A', '1'),
(12953441, '9', 'DAENERYS TARGARYEN', 'clave', NULL, NULL, 'P', '1'),
(13857489, 'K', 'JUAN MANUEL FUENTES DEL RIO', 'clave', '97809608', 'juanmanuelfuentesdelrio@gmail.com', 'A', '1'),
(14719316, '5', 'STEVEN SANTANA CARRERA', 'clave', '79789466', 's.santanacarrera@gmail.com', 'A', '1'),
(15342575, '2', 'FELIPE DOMINGUEZ DELGADO', 'clave', NULL, NULL, 'P', '1'),
(15372493, '8', 'JOSE LUIS RIOSECO PINOCHET', 'clave', '89051893', 'renot20@gmail.com', 'A', '1'),
(15580519, '6', 'FABIOLA AHUMADA DIAZ', 'clave', '97910592', 'ahumada.fabiola@gmail.com', 'A', '1'),
(15808231, '4', 'MARCELO SAAVEDRA TOLOZA', 'clave', '87727847', 'm.saavedra.toloza@gmail.com', 'A', '1'),
(15830958, '0', 'PIA ROMERO', 'clave', '88177434', 'p.romero@uandresbello.edu', 'A', '1'),
(15948485, '8', 'PROFESOR DANIEL VALLEJOS NAVARRO', 'clave', NULL, NULL, 'A', '1'),
(15974897, '9', 'SUSANA GALAZ BECERRA', 'clave', '87727848', 'susan.galaz@gmail.com', 'A', '1'),
(16231788, '1', 'ALEJANDRO RETAMAL VERGARA', 'clave', '86634403', 'alejandroretamalv@gmail.com', 'A', '1'),
(16301563, '3', 'TATIANA TOLEDO CAMPUSANO', 'clave', '81219808', 'ta.toledoc@gmail.com', 'A', '1'),
(16331378, '2', 'MAXIMILIANO CONCHA URETA', 'clave', '51482092', 'maximiliano.concha@gmail.com', 'A', '1'),
(16574620, '1', 'PATRICIO ALVARADO RODRIGUEZ', 'clave', '50034969', 'palvarado@frax.cl', 'A', '1'),
(16576059, 'K', 'SEBASTIAN BASAUL FERNANDEZ', 'clave', '57521535', 'seba.basaul@gmail.com', 'A', '1'),
(16775973, '4', 'JAIME QUETRA GARRIDO', 'clave', '68993630', 'jaimequetra@live.cl', 'A', '1'),
(16888435, '4', 'RODOLFO MARIN FIGUEROA', 'clave', '78894541', 'rodolfo.marin.f@gmail.com', 'A', '1'),
(16938984, '5', 'SAMUEL ZAMORANO', 'clave', '76574740', 'sa.zamorano@uandresbello.edu', 'A', '1'),
(16939823, '2', 'FERNANDO VALENZUELA', 'clave', '94391627', 'f.valenzuela.r@uandresbello.edu', 'A', '1'),
(17013797, '3', 'MARGARETT LEAL CASTAÑEDA', 'clave', '72511704', 'margarett_leal@hotmail.com', 'A', '1'),
(17094883, '1', 'STEFANO GIANNONI', 'clave', '82336448', 's.giannonigrimaldi@uandresbello.edu', 'A', '1'),
(17108089, '4', 'CESAR MUÑOZ LOYOLA', 'clave', '66509271', 'ces.munoz.l@gmail.com', 'A', '1'),
(17185872, '0', 'CRISTOBAL ALEGRIA', 'clave', '2972592', 'c.alegria@hrtech.cl', 'F', '2'),
(17186196, '9', 'CATALINA HERRERA FIGUEROA', 'clave', '942957262', 'cataherrera@live.cl', 'A', '1'),
(17201672, '3', 'MARIA JOSE ARAVENA EUGENIN', 'clave', '81896008', 'mariajosearavena@hotmail.com', 'A', '1'),
(17235367, '3', 'FRANCISCA MERLET GONZALEZ', 'clave', '53192153', 'fr.merlet@uandresbello.edu', 'A', '1'),
(17287534, '3', 'Hernan Saavedra', 'clave', NULL, 'her.saavedra@uandresbello.edu', 'F', '1'),
(17318816, '1', 'JAZMIN MALDONADO CUEVAS', 'clave', '976503922', 'ja.maldonado89@hotmail.es', 'A', '1'),
(17335602, '1', 'JESSICA VARGAS CORNEJO', 'clave', '76263160', 'jessyvargasc@gmail.com', 'A', '1'),
(17352995, '3', 'RODRIGO RUIZ COSIGNANI', 'clave', '92653950', 'negro.ruiz.c@gmail.com', 'A', '1'),
(17353440, 'K', 'CAROLINA PLAZA SOLIS', 'clave', '90656059', 'car.plaza45@gmail.com', 'A', '1'),
(17354965, '2', 'CARLOS CASTRO DANIOU', 'clave', '97199816', 's.castrodaniou@gmail.com', 'A', '1'),
(17355679, '9', 'MAURICIO LENIZ TELLO', 'clave', '82897992', 'mauricio.leniz@hotmail.com', 'A', '1'),
(17378511, '9', 'MATIAS MELLADO MANSILLA', 'clave', '97845254', 'm.mellado14@gmail.com', 'A', '1'),
(17439426, '1', 'CARMEN ALEJANDRA CONEJEROS PINO', 'clave', '51482093', 'ca.conejeros@uandresbello.edu', 'A', '1'),
(17439895, 'K', 'SELIKA ESPONDA GUTIERREZ', 'clave', '98447241', 's.esponda@uandresbello.edu', 'A', '1'),
(17468368, '9', 'CRISTOBAL ARANCIBIA CHACANA', 'clave', '97950998', 'cristobal.arancibia@gmail.com', 'A', '1'),
(17474021, '6', 'RODRIGO RAMIREZ ARDUIZ', 'clave', '65899964', 'r.ramirez.a@uandresbello.edu', 'A', '1'),
(17478825, '1', 'KARINA GAETE ALVARADO', 'clave', '83234958', 'ka.gaete.a@gmail.com', 'A', '1'),
(17501290, '7', 'MONICA BUSTOS CAVIERES	', 'clave', '59421405', 'monica.pazbc@gmail.com', 'A', '1'),
(17553163, '7', 'NICOL GODOY GUERRA', 'clave', '61536973', 'cornejogallegos.fernanda@gmail.com', 'A', '1'),
(17560788, '9', 'VALENTINA LARA LAGOS', 'clave', '87767366', 'valentinna.lara@gmail.com', 'A', '1'),
(17586530, '6', 'CATALINA SCABINI ESCOBAR', 'clave', '84193051', 'catalinascabini@live.cl', 'A', '1'),
(17594403, '6', 'VANESSA MUÑOZ YEVENES', 'clave', '82991238', 'v.muozyevenes@gmail.com', 'A', '1'),
(17627746, '7', 'CAROLINA BECERRA CHAPA	', 'clave', '89863383', 'c.becerrachapa@uandresbello.edu', 'A', '1'),
(17704652, '3', 'CATALINA VARGAS CANDIA', 'clave', '97291667', 'catalina.vargascandia@hotmail.com', 'A', '1'),
(17735058, '3', 'MAGDALENA CARCAMO', 'clave', '951493735', 'm.carcamomieres@uandresbello.edu', 'A', '1'),
(17751806, '9', 'CLAUDIA MESIAS', 'clave', '82308123', 'c.mesias@uandresbello.edu', 'A', '1'),
(17751872, '7', 'JAVIER SANCHEZ VALLEJOS	', 'clave', '86970938', 'javiera.sanchez@uandresbello.edu', 'A', '1'),
(17753308, '4', 'MARIA FERNANDA RODRIGUEZ BONILLA', 'clave', '322484752', 'ma.rodriguez.bonilla@gmail.com', 'A', '1'),
(17754562, '7', 'CAMILA JARAMILLO CAMPOS', 'clave', '89008139	', 'cami.jaramillo.c@hotmail.com', 'A', '1'),
(17856447, '1', 'MARIA CONSTANZA HERNAEZ MONTECINOS', 'clave', '54140462', 'constanza_hernaez@hotmail.com', 'A', '1'),
(17893998, 'K', 'DANILO VILLALON GALLARDO', 'clave', '84611485', 'danilovg92@gmail.com', 'A', '1'),
(17964469, 'K', 'NICOLAS ORDENES SALDIVAR', 'clave', '97510079', 'ni.ordenes@uandresbello.edu', 'A', '1'),
(17973045, '6', 'VALENTINA VILLANUEVA BELTRAN', 'clave', '83402403', 'val.villanueva@uandresbello.edu', 'A', '1'),
(17978371, '1', 'PAULINA PIZARRO PIZARRO', 'clave', '82918516', 'p.pizarro.p@uandresbello.edu', 'A', '1'),
(17993535, 'K', 'MARIA JOSE SALAZAR CARVAJAL', 'clave', '84588958', 'mariaj.salazar@uandresbello.edu', 'A', '1'),
(17994515, '0', 'JAVIERA QUIROZ MIERES', 'clave', '54020108', 'javieraquirozmieres@gmail.com', 'A', '1'),
(17994905, '9', 'CAMILA SILVA', 'clave', '54024096', 'c.silvalpez@uandresbello.edu', 'A', '1'),
(17995288, '2', 'MARJORIE ASPEE LEINS', 'clave', '59832789', 'm.aspee@uandresbello.edu', 'A', '1'),
(17996177, '6', 'FERNANDA DAPIK  CABRERA', 'clave', '74951299', 'f.dapik@uandresbello.edu', 'A', '1'),
(18158314, '2', 'AMINA RIVAS ESCOBAR', 'clave', '97344924', 'amina.rivas@gmail.com', 'A', '1'),
(18159059, '9', 'SHARIFA MAHMUD ARENAS', 'clave', '78206521', 'arenas.bilbao@gmail.com', 'A', '1'),
(18165483, 'K', 'SEBASTIAN GAJARDO MARCHANT', 'clave', '78000256', 'sebastiangajardomarchant@gmail.com', 'A', '1'),
(18210762, 'K', 'IGNACIO VASQUEZ MELLA', 'clave', '87840412', 'i.vasquezmella@uandresbello.edu', 'A', '1'),
(18272062, '3', 'DANIELA SANCHEZ CRUZ', 'clave', '94454159', 'daniela.sanchezcruz.19@gmail.com', 'A', '1'),
(18274328, '3', 'CAMILO PICCARDO HERRERA', 'clave', '56831528', 'c.piccardoherrera@uandresbello.edu', 'A', '1'),
(18274897, '8', 'ARLIN FLORES', 'clave', '75562401', 'a.floresriveros@uandresbello.edu', 'A', '1'),
(18297418, '8', 'FELIPE CLEMENTE MOLINA', 'clave', '75309705', 'f.clementemolina@uandresbello.edu', 'A', '1'),
(18298616, 'K', 'MARIA JOSE REINOSO RODRIGUEZ', 'clave', '51357622', 'm.reinosorodriguez@uandresbello.edu', 'A', '1'),
(18299028, '0', 'BRAULIO VIRAGO HUDSON', 'clave', '85946859', 'brauliovirago@gmail.com', 'A', '1'),
(18299066, '3', 'NATHALY CAMUS', 'clave', '93607737', 'natalia.scf@hotmail.com', 'A', '1'),
(18299693, '9', 'CAMILA GARCIA BENAVIDES', 'clave', '92704775', 'camilagarciabenavides@gmail.com', 'A', '1'),
(18299883, '4', 'ISABEL ESCOBAR DE DIEGO', 'clave', '99051515', 'is.escobar@uandresbello.edu', 'A', '1'),
(18300220, '1', 'GABRIELA GARCIA CATALAN', 'clave', '97454476', 'gabriela-paz@live.cl', 'A', '1'),
(18300868, '4', 'DANIEL ALVARADO LANDAZURI', 'clave', '96508971', 'daniel.alvarado@uandresbello.edu', 'A', '1'),
(18357458, '2', 'LUCAS DE LA SOTTA FIERRO', 'clave', '55388836', 'lucasdelasotta@gmail.com', 'A', '1'),
(18375140, '9', 'FERNANDA CORNEJO GALLEJOS', 'clave', '87970943', 'cornejogallegos.fernanda@gmail.com', 'A', '1'),
(18378322, 'K', 'FELIPE CELIS GONZALEZ', 'clave', '82942082', 'felipe.celis26@gmail.com', 'A', '1'),
(18390855, '3', 'BERNARDITA MEDINA', 'clave', '94200082', 'b.medinabadilla@uandresbello.edu', 'A', '1'),
(18421614, '0', 'HUGO ORTIZ OSORIO', 'clave', '82349858', 'h.ortizosorio@hotmail.com', 'A', '1'),
(18446852, '2', 'LUISA CARTAGENA GAONA', 'clave', '87837843', 'l.cartagenagaona@uandresbello.edu', 'A', '1'),
(18458328, '3', 'CAMILA OLIVARES CARRASCO	', 'clave', '75605328', 'camila.olivares.carrasco@gmail.com', 'A', '1'),
(18464349, '9', 'LORETO CID YAÑEZ', 'clave', '93009588', 'l.cidyaez@uandresbello.edu', 'A', '1'),
(18466923, '4', 'STEFFI SCHRAMM LOPEZ', 'clave', '66499464', 's.schrammlopez@gmail.com', 'A', '1'),
(18583726, '2', 'KAREN BARRIA JEREZ', 'clave', '84657192', 'k.barriajerez@gmail.com', 'A', '1'),
(18584987, '2', 'MARIA IGNACIA SUAREZ ZAPATA', 'clave', '92728016', 'm.ignaciasuarez@gmail.com', 'A', '1'),
(18585895, '2', 'BEGOÑA MAHANA DAVALOS', 'clave', '99485345', 'begomahana@gmail.com', 'A', '1'),
(18586455, '3', 'YARITZA GONZALEZ ALOSILLA', 'clave', '61191179', 'y.gonzalezalosilla@uandresbello.edu', 'A', '1'),
(22555470, '6', 'Itan Dexter Jack Braulio', '12qw12', NULL, NULL, 'P', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sede`
--

CREATE TABLE IF NOT EXISTS `usuario_sede` (
  `id_usuario_sede` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(255) NOT NULL,
  `id_sede` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario_sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Volcado de datos para la tabla `usuario_sede`
--

INSERT INTO `usuario_sede` (`id_usuario_sede`, `rut`, `id_sede`) VALUES
(1, '9633643', '1'),
(2, '10023354', '1'),
(3, '10713094', '1'),
(4, '10911811', '1'),
(5, '12228692', '1'),
(6, '12270999', '1'),
(7, '12953441', '1'),
(8, '13857489', '1'),
(9, '14719316', '1'),
(10, '15342575', '1'),
(11, '15372493', '1'),
(12, '15580519', '1'),
(13, '15808231', '1'),
(14, '15830958', '1'),
(15, '15948485', '1'),
(16, '15974897', '1'),
(17, '16231788', '1'),
(18, '16301563', '1'),
(19, '16331378', '1'),
(20, '16574620', '1'),
(21, '16576059', '1'),
(22, '16775973', '1'),
(23, '16888435', '1'),
(24, '16938984', '1'),
(25, '16939823', '1'),
(26, '17013797', '1'),
(27, '17094883', '1'),
(28, '17108089', '1'),
(29, '17185872', '1'),
(30, '17186196', '1'),
(31, '17201672', '1'),
(32, '17235367', '1'),
(33, '17287534', '1'),
(34, '17318816', '1'),
(35, '17335602', '1'),
(36, '17352995', '1'),
(37, '17353440', '1'),
(38, '17354965', '1'),
(39, '17355679', '1'),
(40, '17378511', '1'),
(41, '17439426', '1'),
(42, '17439895', '1'),
(43, '17468368', '1'),
(44, '17474021', '1'),
(45, '17478825', '1'),
(46, '17501290', '1'),
(47, '17553163', '1'),
(48, '17560788', '1'),
(49, '17586530', '1'),
(50, '17594403', '1'),
(51, '17627746', '1'),
(52, '17704652', '1'),
(53, '17735058', '1'),
(54, '17751806', '1'),
(55, '17751872', '1'),
(56, '17753308', '1'),
(57, '17754562', '1'),
(58, '17856447', '1'),
(59, '17893998', '1'),
(60, '17964469', '1'),
(61, '17973045', '1'),
(62, '17978371', '1'),
(63, '17993535', '1'),
(64, '17994515', '1'),
(65, '17994905', '1'),
(66, '17995288', '1'),
(67, '17996177', '1'),
(68, '18158314', '1'),
(69, '18159059', '1'),
(70, '18165483', '1'),
(71, '18210762', '1'),
(72, '18272062', '1'),
(73, '18274328', '1'),
(74, '18274897', '1'),
(75, '18297418', '1'),
(76, '18298616', '1'),
(77, '18299028', '1'),
(78, '18299066', '1'),
(79, '18299693', '1'),
(80, '18299883', '1'),
(81, '18300220', '1'),
(82, '18300868', '1'),
(83, '18357458', '1'),
(84, '18375140', '1'),
(85, '18378322', '1'),
(86, '18390855', '1'),
(87, '18421614', '1'),
(88, '18446852', '1'),
(89, '18458328', '1'),
(90, '18464349', '1'),
(91, '18466923', '1'),
(92, '18583726', '1'),
(93, '18584987', '1'),
(94, '18585895', '1'),
(95, '18586455', '1'),
(96, '17185872', '2'),
(97, '17185872', '3'),
(98, '17287534', '2'),
(99, '1', '2'),
(101, '22555470', '2'),
(102, '8224847', '2'),
(103, '6491226', '2'),
(104, '12953441', '2'),
(105, '22555470', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
