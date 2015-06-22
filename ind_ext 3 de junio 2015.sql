-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-06-2015 a las 10:23:42
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.4.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ind_ext`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `idacceso` int(11) NOT NULL,
  `url` varchar(135) NOT NULL,
  `tipo_usuario_idtipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`idacceso`, `url`, `tipo_usuario_idtipo_usuario`) VALUES
(1, 'authentication/login', 1),
(2, 'authentication/login', 2),
(3, 'authentication/login', 3),
(4, 'authentication/logout', 1),
(5, 'authentication/logout', 2),
(6, 'authentication/logout', 3),
(7, 'error/access_denied', 1),
(8, 'error/access_denied', 2),
(9, 'error/access_denied', 3),
(10, 'home', 1),
(11, 'home', 2),
(12, 'home', 3),
(13, 'indicators/indicators_list', 1),
(14, 'indicators/indicators_list', 2),
(15, 'indicators/indicators_list', 3),
(16, 'chart/create_chart/ins011/15', 1),
(17, 'chart/create_chart/inv001/1', 1),
(18, 'chart/create_chart/inv002/2', 1),
(19, 'chart/create_chart/inv003/3', 1),
(20, 'chart/create_chart/inv004/4', 1),
(21, 'chart/create_chart/inv005/5', 1),
(22, 'chart/create_chart/inv006/6', 1),
(23, 'chart/create_chart/prc001/16', 1),
(24, 'chart/create_chart/prc002/17', 1),
(25, 'chart/create_chart/prc003/18', 1),
(26, 'chart/create_chart/prc004/19', 1),
(27, 'chart/create_chart/prc005/20', 1),
(28, 'chart/create_chart/rh001/7', 1),
(29, 'chart/create_chart/rh002/8', 1),
(30, 'chart/create_chart/rh003/9', 1),
(31, 'chart/create_chart/rh004/10', 1),
(32, 'chart/create_chart/rh004/11', 1),
(33, 'chart/create_chart/rh005/12', 1),
(34, 'chart/create_chart/rh006/13', 1),
(35, 'chart/create_chart/rh007/14', 1),
(36, 'chart/create_chart/ins011/15', 2),
(37, 'chart/create_chart/inv001/1', 2),
(38, 'chart/create_chart/inv002/2', 2),
(39, 'chart/create_chart/inv003/3', 2),
(40, 'chart/create_chart/inv004/4', 2),
(41, 'chart/create_chart/inv005/5', 2),
(42, 'chart/create_chart/inv006/6', 2),
(43, 'chart/create_chart/prc001/16', 2),
(44, 'chart/create_chart/prc002/17', 2),
(45, 'chart/create_chart/prc003/18', 2),
(46, 'chart/create_chart/prc004/19', 2),
(47, 'chart/create_chart/prc005/20', 2),
(48, 'chart/create_chart/rh001/7', 2),
(49, 'chart/create_chart/rh002/8', 2),
(50, 'chart/create_chart/rh003/9', 2),
(51, 'chart/create_chart/rh004/10', 2),
(52, 'chart/create_chart/rh004/11', 2),
(53, 'chart/create_chart/rh005/12', 2),
(54, 'chart/create_chart/rh006/13', 2),
(55, 'chart/create_chart/rh007/14', 2),
(56, 'chart/create_chart/ins011/15', 3),
(57, 'chart/create_chart/inv001/1', 3),
(58, 'chart/create_chart/inv002/2', 3),
(59, 'chart/create_chart/inv003/3', 3),
(60, 'chart/create_chart/inv004/4', 3),
(61, 'chart/create_chart/inv005/5', 3),
(62, 'chart/create_chart/inv006/6', 3),
(63, 'chart/create_chart/prc001/16', 3),
(64, 'chart/create_chart/prc002/17', 3),
(65, 'chart/create_chart/prc003/18', 3),
(66, 'chart/create_chart/prc004/19', 3),
(67, 'chart/create_chart/prc005/20', 3),
(68, 'chart/create_chart/rh001/7', 3),
(69, 'chart/create_chart/rh002/8', 3),
(70, 'chart/create_chart/rh003/9', 3),
(71, 'chart/create_chart/rh004/10', 3),
(72, 'chart/create_chart/rh004/11', 3),
(73, 'chart/create_chart/rh005/12', 3),
(74, 'chart/create_chart/rh006/13', 3),
(75, 'chart/create_chart/rh007/14', 3),
(76, 'chart/create_chart', 1),
(77, 'chart/create_chart', 2),
(78, 'chart/create_chart', 3),
(79, 'system', 3),
(80, 'system/users', 3),
(81, 'system/groups', 3),
(82, 'system/access', 3),
(83, 'data', 2),
(85, 'data/xml_file', 2),
(87, 'data/save_data', 2),
(89, 'data/load_data', 2),
(91, 'data/update_data', 2),
(93, 'system/delete_user', 3),
(94, 'system/create_user', 3),
(95, 'system/get_user', 3),
(96, 'system/update_user', 3),
(97, 'system/audit', 3),
(98, 'audit', 2),
(99, 'audit/index', 2),
(100, 'audit/get_audit', 2),
(101, 'indicators/get_details', 1),
(102, 'indicators/get_details', 2),
(103, 'indicators/get_details', 3),
(104, 'indicators/get_details', 4),
(105, 'data/new_year_data', 2),
(106, 'data/new_year_data', 3),
(107, 'indicators/indicators_insumo', 1),
(108, 'indicators/indicators_insumo', 2),
(109, 'indicators/indicators_insumo', 3),
(110, 'indicators/indicators_insumo', 4),
(111, 'indicators/indicators_proceso', 1),
(112, 'indicators/indicators_proceso', 2),
(113, 'indicators/indicators_proceso', 3),
(114, 'indicators/indicators_proceso', 4),
(115, 'indicators/indicators_producto', 1),
(116, 'indicators/indicators_producto', 2),
(117, 'indicators/indicators_producto', 3),
(118, 'indicators/indicators_producto', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `idauditoria` int(11) NOT NULL,
  `valor` double DEFAULT NULL,
  `anho` int(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `dato_iddato` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`idauditoria`, `valor`, `anho`, `fecha`, `usuario_idusuario`, `dato_iddato`) VALUES
(1, 3190, 2014, '2015-06-01 10:50:19', 13, 1),
(2, 560, 2014, '2015-06-01 10:50:19', 13, 2),
(3, 3190, 2014, '2015-06-01 10:50:19', 13, 3),
(4, 560, 2014, '2015-06-01 10:50:19', 13, 4),
(5, 375, 2014, '2015-06-01 10:50:19', 13, 5),
(6, 2000, 2014, '2015-06-01 10:50:19', 13, 12),
(7, 500, 2014, '2015-06-01 10:50:19', 13, 13),
(8, 1400, 2014, '2015-06-01 10:50:19', 13, 14),
(9, 1500, 2014, '2015-06-01 10:50:19', 13, 15),
(10, 700, 2014, '2015-06-01 10:50:19', 13, 16),
(11, 1400, 2014, '2015-06-01 10:50:19', 13, 17),
(12, 2000, 2014, '2015-06-01 10:50:19', 13, 18),
(13, 500, 2014, '2015-06-01 10:50:19', 13, 19),
(14, 1400, 2014, '2015-06-01 10:50:19', 13, 20),
(15, 1500, 2014, '2015-06-01 10:50:19', 13, 21),
(16, 700, 2014, '2015-06-01 10:50:19', 13, 22),
(17, 1400, 2014, '2015-06-01 10:50:19', 13, 23),
(18, 500, 2014, '2015-06-01 10:50:19', 13, 24),
(19, 600, 2014, '2015-06-01 10:50:19', 13, 25),
(20, 1100, 2014, '2015-06-01 10:50:19', 13, 26),
(21, 400, 2014, '2015-06-01 10:50:19', 13, 27),
(22, 300, 2014, '2015-06-01 10:50:19', 13, 28),
(23, 150, 2014, '2015-06-01 10:50:19', 13, 29),
(24, 140, 2014, '2015-06-01 10:50:19', 13, 30),
(25, 100, 2014, '2015-06-01 10:50:19', 13, 31),
(26, 230, 2014, '2015-06-01 10:50:19', 13, 32),
(27, 180, 2014, '2015-06-01 10:50:19', 13, 33),
(28, 280, 2014, '2015-06-01 10:50:19', 13, 34),
(29, 400, 2014, '2015-06-01 10:50:19', 13, 35),
(30, 70, 2014, '2015-06-01 10:50:19', 13, 36),
(31, 30, 2014, '2015-06-01 10:50:19', 13, 37),
(32, 15, 2014, '2015-06-01 10:50:19', 13, 38),
(33, 100, 2014, '2015-06-01 10:50:19', 13, 39),
(34, 80, 2014, '2015-06-01 10:50:19', 13, 40),
(35, 40, 2014, '2015-06-01 10:50:19', 13, 41),
(36, 100, 2014, '2015-06-01 10:50:19', 13, 42),
(37, 70, 2014, '2015-06-01 10:50:19', 13, 43),
(38, 40, 2014, '2015-06-01 10:50:19', 13, 44),
(39, 50, 2014, '2015-06-01 10:50:19', 13, 45),
(40, 50, 2014, '2015-06-01 10:50:19', 13, 46),
(41, 160, 2014, '2015-06-01 10:50:19', 13, 47),
(42, 160, 2014, '2015-06-01 10:50:19', 13, 48),
(43, 50, 2014, '2015-06-01 10:50:19', 13, 49),
(44, 15, 2014, '2015-06-01 10:50:19', 13, 50),
(45, 130, 2014, '2015-06-01 10:50:19', 13, 51),
(46, 150, 2014, '2015-06-01 10:50:19', 13, 52),
(47, 150, 2014, '2015-06-01 10:50:19', 13, 53),
(48, 130, 2014, '2015-06-01 10:50:19', 13, 54),
(49, 150, 2014, '2015-06-01 10:50:19', 13, 55),
(50, 150, 2014, '2015-06-01 10:50:19', 13, 56),
(51, 5600, 2014, '2015-06-01 10:50:19', 13, 57),
(52, 140, 2014, '2015-06-01 10:50:19', 13, 58),
(53, 15, 2014, '2015-06-01 10:50:19', 13, 59),
(54, 70, 2014, '2015-06-01 10:50:19', 13, 60),
(55, 7, 2014, '2015-06-01 10:50:19', 13, 61),
(56, 900, 2014, '2015-06-01 10:50:19', 13, 62),
(57, 45, 2014, '2015-06-01 10:50:19', 13, 66),
(58, 10, 2014, '2015-06-01 10:50:19', 13, 67),
(59, 70, 2014, '2015-06-01 10:50:19', 13, 68),
(60, 125, 2014, '2015-06-01 10:50:19', 13, 69),
(61, 200, 2014, '2015-06-01 10:50:19', 13, 70),
(62, 150, 2014, '2015-06-01 10:50:19', 13, 71),
(63, 300, 2014, '2015-06-01 10:50:19', 13, 72),
(64, 400, 2014, '2015-06-01 10:50:19', 13, 73),
(65, 10, 2014, '2015-06-01 10:50:19', 13, 74),
(66, 0, 2014, '2015-06-01 10:50:19', 13, 75),
(67, 0, 2014, '2015-06-01 10:50:19', 13, 76),
(68, 0, 2014, '2015-06-01 10:50:19', 13, 77),
(69, 0, 2014, '2015-06-01 10:50:19', 13, 78),
(70, 0, 2014, '2015-06-01 10:50:19', 13, 79),
(71, 1, 2014, '2015-06-01 10:50:19', 13, 81),
(72, 10, 2014, '2015-06-01 10:50:19', 13, 82),
(73, 4, 2014, '2015-06-01 10:50:19', 13, 83),
(74, 14, 2014, '2015-06-01 10:50:19', 13, 84),
(75, 17, 2014, '2015-06-01 10:50:19', 13, 85),
(76, 15, 2014, '2015-06-01 10:50:19', 13, 86),
(77, 5, 2014, '2015-06-01 10:50:19', 13, 88),
(78, 15, 2014, '2015-06-01 10:50:19', 13, 89),
(79, 20, 2014, '2015-06-01 10:50:19', 13, 90),
(80, 50, 2014, '2015-06-01 10:50:19', 13, 91),
(81, 80, 2014, '2015-06-01 10:50:19', 13, 92),
(82, 80, 2014, '2015-06-01 10:50:19', 13, 93),
(83, 125, 2014, '2015-06-01 10:50:19', 13, 94),
(84, 175, 2014, '2015-06-01 10:50:19', 13, 95),
(85, 175, 2014, '2015-06-01 10:50:19', 13, 96),
(86, 300, 2014, '2015-06-01 10:50:19', 13, 97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato`
--

CREATE TABLE IF NOT EXISTS `dato` (
  `iddato` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(135) NOT NULL,
  `desagregado` tinyint(1) NOT NULL,
  `indicador_idindicador` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dato`
--

INSERT INTO `dato` (`iddato`, `nombre`, `descripcion`, `desagregado`, `indicador_idindicador`) VALUES
(1, 'D1', 'Liquidaciones totales en equipo e infraestructura (interno)', 0, 1),
(2, 'D2', 'Liquidaciones totales en equipo e infraestructura (externo)', 0, 1),
(3, 'D3', 'Gastos de operacion y recurso humano (interno)', 0, 1),
(4, 'D4', 'Gastos de operacion y recurso humano (externo)', 0, 1),
(5, 'D5', 'Fondos provenientes del Fondo del Sistema de CONARE', 0, 1),
(12, 'D12', 'Gastos en operacion en Ciencias naturales', 0, 2),
(13, 'D13', 'Gastos en operacion en Ingenieria y tecnologia', 0, 2),
(14, 'D14', 'Gastos en operacion en Ciencias medicas', 0, 2),
(15, 'D15', 'Gastos en operacion en Ciencias agricolas', 0, 2),
(16, 'D16', 'Gastos en operacion en Humanidades', 0, 2),
(17, 'D17', 'Gastos en operacion en Ciencias Sociales', 0, 2),
(18, 'D18', 'Gastos en recurso humano en Ciencias naturales', 0, 2),
(19, 'D19', 'Gastos en recurso humano en Ingenieria y tecnologia', 0, 2),
(20, 'D20', 'Gastos en recurso humano en Ciencias medicas', 0, 2),
(21, 'D21', 'Gastos en recurso humano en Ciencias agricolas', 0, 2),
(22, 'D22', 'Gastos en recurso humano en Humanidades', 0, 2),
(23, 'D23', 'Gastos en recurso humano en Ciencias Sociales', 0, 2),
(24, 'D24', 'Cantidad de Investigadores participantes (Incluye Ad honorem) masculinos', 0, 3),
(25, 'D25', 'Cantidad de investigadores participantes (Incluye Ad honorem) femeninos', 0, 3),
(26, 'D26', 'Cantidad de investigadores participantes (Incluye Ad honorem)', 0, 4),
(27, 'D27', 'Cantidad de investigadores participantes (Incluye Ad honorem) en grado Bachiller y Licenciatura', 0, 5),
(28, 'D28', 'Cantidad de investigadores participantes (Incluye Ad honorem) en grado Maestria', 0, 5),
(29, 'D29', 'Cantidad de investigadores participantes (Incluye Ad honorem) en grado Doctorado', 0, 5),
(30, 'D30', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades', 0, 6),
(31, 'D31', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia', 0, 6),
(32, 'D32', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas', 0, 6),
(33, 'D33', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas', 0, 6),
(34, 'D34', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias naturales', 0, 6),
(35, 'D35', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales', 0, 6),
(36, 'D36', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia Grado Bachiller y Licenciatura', 0, 6),
(37, 'D37', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia Grado Maestria', 0, 6),
(38, 'D38', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia Grado Doctorado', 0, 6),
(39, 'D39', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas Grado Bachiller y Licenciatura', 0, 6),
(40, 'D40', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas Grado Maestria', 0, 6),
(41, 'D41', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas Grado Doctorado', 0, 6),
(42, 'D42', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas Grado Bachiller y Licenciatura', 0, 6),
(43, 'D43', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas Grado Maestria', 0, 6),
(44, 'D44', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas Grado Doctorado', 0, 6),
(45, 'D45', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades Grado Bachiller y Licenciatura', 0, 6),
(46, 'D46', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades Grado Maestria', 0, 6),
(47, 'D47', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades Grado Doctorado', 0, 6),
(48, 'D48', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales Grado Bachiller y Licenciatura', 0, 6),
(49, 'D49', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales Grado Maestria', 0, 6),
(50, 'D50', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales Grado Doctorado', 0, 6),
(51, 'D51', 'Cantidad de investigadores responsables de coordinar  masculinos grado Bachiller y Licenciatura', 0, 7),
(52, 'D52', 'Cantidad de investigadores responsables de coordinar  masculinos grado Maestria', 0, 7),
(53, 'D53', 'Cantidad de investigadores responsables de coordinar  masculinos grado Doctorado', 0, 7),
(54, 'D54', 'Cantidad de investigadores responsables de coordinar  femeninos grado Bachiller y Licenciatura', 0, 7),
(55, 'D55', 'Cantidad de investigadores responsables de coordinar  femeninos grado Maestria', 0, 7),
(56, 'D56', 'Cantidad de investigadores responsables de coordinar  femeninos grado Doctorado', 0, 7),
(57, 'D57', 'Cantidad de horas asignadas a los investigadores activos de las cuatro universidades', 0, 8),
(58, 'D58', 'Cantidad de graduados de los programas de Maestria Academica', 0, 9),
(59, 'D59', 'Cantidad de graduados de los programas de Doctorado', 0, 9),
(60, 'D60', 'Total de programas de Maestria Academica', 0, 15),
(61, 'D61', 'Total de programas de Doctorado', 0, 15),
(62, 'D62', 'Total de proyectos de investigacion vigentes', 0, 10),
(66, 'D66', 'Cantidad de proyectos de investigacion financiados con Fondos del Sistema', 0, 11),
(67, 'D67', 'Cantidad de proyectos interdisciplinarios', 0, 12),
(68, 'D68', 'Cantidad de proyectos en Ingenieria y tecnologia', 0, 12),
(69, 'D69', 'Cantidad de proyectos en Humanidades', 0, 12),
(70, 'D70', 'Cantidad de proyectos en Ciencias medicas', 0, 12),
(71, 'D71', 'Cantidad de proyectos en Ciencias agricolas', 0, 12),
(72, 'D72', 'Cantidad de proyectos en Ciencias sociales', 0, 12),
(73, 'D73', 'Cantidad de proyectos en Ciencias naturales', 0, 12),
(74, 'D74', 'Cantidad de proyectos en Ingenieria y tecnologia de la sede central', 0, 16),
(75, 'D75', 'Cantidad de proyectos en Humanidades (Artes y Letras) de la sede central', 0, 16),
(76, 'D76', 'Cantidad de proyectos en Ciencias medicas de la sede central', 0, 16),
(77, 'D77', 'Cantidad de proyectos en Ciencias agricolas de la sede central', 0, 16),
(78, 'D78', 'Cantidad de proyectos en Ciencias sociales de la sede central', 0, 16),
(79, 'D79', 'Cantidad de proyectos en Ciencias naturales de la sede central', 0, 16),
(81, 'D81', 'Cantidad de proyectos en Ingenieria y tecnologia de la sede regional', 0, 13),
(82, 'D82', 'Cantidad de proyectos en Humanidades (Artes y Letras) de la sede regional', 0, 13),
(83, 'D83', 'Cantidad de proyectos en Ciencias medicas de la sede regional', 0, 13),
(84, 'D84', 'Cantidad de proyectos en Ciencias agricolas de la sede regional', 0, 13),
(85, 'D85', 'Cantidad de proyectos en Ciencias sociales de la sede regional', 0, 13),
(86, 'D86', 'Cantidad de proyectos en Ciencias naturales de la sede regional', 0, 13),
(88, 'D88', 'Cantidad de proyectos de exploracion y explotacion del espacio', 0, 14),
(89, 'D89', 'Cantidad de proyectos de produccion  distribucion y utilizacion racional de la tierra', 0, 14),
(90, 'D90', 'Cantidad de proyectos de infraestructura y ordenamiento del territorio', 0, 14),
(91, 'D91', 'Cantidad de proyectos de produccion y tecnologia industrial', 0, 14),
(92, 'D92', 'Cantidad de proyectos de investigacion no orientada', 0, 14),
(93, 'D93', 'Cantidad de proyectos de exploracion y explotacion de la tierra', 0, 14),
(94, 'D94', 'Cantidad de proyectos de control y proteccion del medio ambiente', 0, 14),
(95, 'D95', 'Cantidad de proyectos de proteccion y mejora de la salud humana', 0, 14),
(96, 'D96', 'Cantidad de proyectos de produccion y tecnologia agricola', 0, 14),
(97, 'D97', 'Cantidad de proyectos de estructuras y relaciones sociales', 0, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato_anual_universidad`
--

CREATE TABLE IF NOT EXISTS `dato_anual_universidad` (
  `iddato_anual_universidad` int(11) NOT NULL,
  `dato_iddato` int(11) NOT NULL,
  `universidad_iduniversidad` int(11) NOT NULL,
  `anho` varchar(45) NOT NULL,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dato_anual_universidad`
--

INSERT INTO `dato_anual_universidad` (`iddato_anual_universidad`, `dato_iddato`, `universidad_iduniversidad`, `anho`, `valor`) VALUES
(57, 1, 2, '2014', 3190),
(58, 2, 2, '2014', 560),
(59, 3, 2, '2014', 3190),
(60, 4, 2, '2014', 560),
(61, 5, 2, '2014', 375),
(62, 12, 2, '2014', 2000),
(63, 13, 2, '2014', 500),
(64, 14, 2, '2014', 1400),
(65, 15, 2, '2014', 1500),
(66, 16, 2, '2014', 700),
(67, 17, 2, '2014', 1400),
(68, 18, 2, '2014', 2000),
(69, 19, 2, '2014', 500),
(70, 20, 2, '2014', 1400),
(71, 21, 2, '2014', 1500),
(72, 22, 2, '2014', 700),
(73, 23, 2, '2014', 1400),
(74, 24, 2, '2014', 500),
(75, 25, 2, '2014', 600),
(76, 26, 2, '2014', 1100),
(77, 27, 2, '2014', 400),
(78, 28, 2, '2014', 300),
(79, 29, 2, '2014', 150),
(80, 30, 2, '2014', 140),
(81, 31, 2, '2014', 100),
(82, 32, 2, '2014', 230),
(83, 33, 2, '2014', 180),
(84, 34, 2, '2014', 280),
(85, 35, 2, '2014', 400),
(86, 36, 2, '2014', 70),
(87, 37, 2, '2014', 30),
(88, 38, 2, '2014', 15),
(89, 39, 2, '2014', 100),
(90, 40, 2, '2014', 80),
(91, 41, 2, '2014', 40),
(92, 42, 2, '2014', 100),
(93, 43, 2, '2014', 70),
(94, 44, 2, '2014', 40),
(95, 45, 2, '2014', 50),
(96, 46, 2, '2014', 50),
(97, 47, 2, '2014', 160),
(98, 48, 2, '2014', 160),
(99, 49, 2, '2014', 50),
(100, 50, 2, '2014', 15),
(101, 51, 2, '2014', 130),
(102, 52, 2, '2014', 150),
(103, 53, 2, '2014', 150),
(104, 54, 2, '2014', 130),
(105, 55, 2, '2014', 150),
(106, 56, 2, '2014', 150),
(107, 57, 2, '2014', 5600),
(108, 58, 2, '2014', 140),
(109, 59, 2, '2014', 15),
(110, 60, 2, '2014', 70),
(111, 61, 2, '2014', 7),
(112, 62, 2, '2014', 900),
(113, 66, 2, '2014', 45),
(114, 67, 2, '2014', 10),
(115, 68, 2, '2014', 70),
(116, 69, 2, '2014', 125),
(117, 70, 2, '2014', 200),
(118, 71, 2, '2014', 150),
(119, 72, 2, '2014', 300),
(120, 73, 2, '2014', 400),
(121, 74, 2, '2014', 10),
(122, 75, 2, '2014', 0),
(123, 76, 2, '2014', 0),
(124, 77, 2, '2014', 0),
(125, 78, 2, '2014', 0),
(126, 79, 2, '2014', 0),
(127, 81, 2, '2014', 1),
(128, 82, 2, '2014', 10),
(129, 83, 2, '2014', 4),
(130, 84, 2, '2014', 14),
(131, 85, 2, '2014', 17),
(132, 86, 2, '2014', 15),
(133, 88, 2, '2014', 5),
(134, 89, 2, '2014', 15),
(135, 90, 2, '2014', 20),
(136, 91, 2, '2014', 50),
(137, 92, 2, '2014', 80),
(138, 93, 2, '2014', 80),
(139, 94, 2, '2014', 125),
(140, 95, 2, '2014', 175),
(141, 96, 2, '2014', 175),
(142, 97, 2, '2014', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE IF NOT EXISTS `indicador` (
  `idindicador` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(135) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `formula` varchar(500) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`idindicador`, `codigo`, `nombre`, `descripcion`, `formula`, `tipo`) VALUES
(1, 'INV001', 'Inversión total en investigación y desarrollo', 'Monto total en recursos, en millones de colones corrientes, que se gastan (invierten) en la ejecución de I+D', 'Sumatoria de las liquidaciones totales en equipo e infraestructura, gastos de operación y recurso humano destinados al financiamiento de proyectos de I+D, se incluye el financiamiento externo e interno. Debe incluirse la totalidad del presupuesto de programas, institutos y centros de investigación.', 'Insumo'),
(2, 'INV002', 'Financiamiento externo como porcentaje del total de gastos en I+D', 'Monto total de las transferencias financieras de fuentes externas registradas en las universidades públicas, funcaciones y afines, destinadas al financiamiento de proyectos de investigación de las universidades públicas costarricenses (incluye operación, inversión y recurso humano) como porcentaje de la inversión total en I+D', 'Sumatoria total de gastos en operación, inversión y recurso humano del financiamiento externo dividido entre la inversión total en I+D, multiplicado por 100', 'Insumo'),
(3, 'INV003', 'Financiamiento interno como porcentaje del total de gastos en I+D', 'Monto total de recursos propios de las universidades públicas costarricenses destinadas al financiamiento de sus proyetos de investigación (incluye operación, inversión y recurso humano) como porcentaje de la inversión total en I+D', 'Sumatoria total de gastos en operación, inversión y recurso humano del financiamiento interno dividido entre la inversión total en I+D, multiplicado por 100', 'Insumo'),
(4, 'INV004', 'Fondos del Sistema como porcentaje del financiamiento externo en I+D', 'Monto total de las transferencias financieras provenientes de los Fondos del Sistema de CONARE para el financiamiento de proyectos de investigación, como porcentaje de la inversión total en I+D', 'Sumatoria total de los fondos provenientes del Fondo del Sistema de CONARE para el financiamiento de proyectos de investigación dividido entre la inversión total en I+D, multiplicado por 100', 'Insumo'),
(5, 'INV005', 'Fondos del Sistema como porcentaje del total de gastos en I+D', 'Monto toal de las transferencias financieras provenientes de los Fondos del Sistema de CONARE para el financiamiento de proyectos de investigación, como porcentaje del financiamiento externo universitario en I+D', 'Sumatoria total de los fondos provenientes del Fondo del Sistema de CONARE para el financiamiento de proyectos de investigación dividido entre el financiemiento externo universitario en I+D multiplicado por cien', 'Insumo'),
(6, 'INV006', 'Inversión total universitaria en I+D por disciplina', 'Monto total en millones de colones y en gastos corrientes en I+D por disciplina distribuido según su ejecución por área del conocimiento (disciplina) según el Manual de Frascati (2002) de la OECD', 'Sumatoria de gastos de operación y recurso humano destinados al financiamiento de proyectos de I+D en cada una de las disciplinas del Manual de Frascati: Ciencias naturales, Ingeniería y tecnología, Ciencias médicas, Ciencias agrícolas, Ciencias Sociales y Humanidades', 'Insumo'),
(7, 'RH001', 'Investigadores (as) universitarios (as) activos (as)', 'Número total de investigadores universitarios que participan en proyectos vigentes en el año de referencia clasificados según sexo', 'Sumatoria de los investigadores participantes, incluyendo los ad honorem, en los proyectos de investigación vigentes en el año de referencia clasificados según sexo', 'Insumo'),
(8, 'RH002', 'Investigadores (as) universitarios (as) activos (as) según sexo', 'Número total de investigadores universitarios que participan en proyectos vigenes en el año de referencia', 'Sumatoria de los investigadores participantes, incluyendo los nombrados ad honorem, en los proyectos de investigación vigentes en el año de referencia', 'Insumo'),
(9, 'RH003', 'Investigadores (as) universitarios (as) activos (as) por grado académico', 'Investigadores(as) universitarios(as) acrivos(as) clasificados por su grado académico más alto', 'Sumatoria de los investigadores participantes en los proyectos de ivnestigación vigentes, incluyendo los ad honorem, en el año de referencia distribuidos segúnel grado académico más alto obtenido', 'Insumo'),
(10, 'RH004', 'Investigadores (as) universitarios (as) activos (as) por disciplina', 'Número total de investigadores universitarios que participan en proyectos vigentes en el año referencia distribuidos según el área del conocimiento. Las áreas del concoimiento son las establecidas a un dígito en el Manual de Frascati (2002) de la OECD', 'Sumatoria de los investigadores participantes, incluyendo los ad honorem, en los proyectos de investigación vigentes en el año de referencia distribuidos según disciplina', 'Insumo'),
(11, 'RH004', 'Investigadores (as) universitarios (as) activos por disciplina según grado académico', 'Investigadores(as) universitarios(as) activos(as) clasificados según disciplina y por grado académico', 'Sumatoria de los investigadores participantes en los proyectos de investigación vigentes, incluyendo los ad honorem, en el año de análisis distribuidos por disciplina y según grado académico', 'Insumo'),
(12, 'RH005', 'Investigadores (as) universitarios (as) activos (as) responsables de proyectos por grado académico y según sexo', 'Investigadores(as) universitarios(as) activos(as) responsables de coordinar proyectos de investigación clasificados por su grado académico más alto y según sexo', 'Sumatoria del total de investigadores responsables de coordinar los proyectos de investigación vigentes en el año de análisis, distribuidos por grado académico smás alto obtenido (Doctorado, Maestría, Licenciatura y Bachillerato) y según sexo', 'Insumo'),
(13, 'RH006', 'Tiempos completos de Investigadores (as) universitarios (as) activos (as)', 'Total de tiempos completos que los investigadores de las cuatro universidades dedican a la ejecución de proyectos de investigación', 'Sumatoria de horas asignadas a los investigadores activos de las cuatro universidades estatales, para la ejecución de proyectos de investigación, dividida entre las 40 horas que confroman un tiempo completo', 'Insumo'),
(14, 'RH007', 'Graduados de programas de Maestría Académica y Doctorado por grado académico', 'Número total de graduados de los programas de Maestría Académica y Doctorado, por grado académico, que se imparten en las universidades estatales.', 'Sumatoria de los graduados de los programas de Maestría Académica y Doctorado, por grado académico, que se imparten en las universidades estatales', 'Insumo'),
(15, 'INS011', 'Total de programas de maestría académica y doctorado', 'Número total de programas de Maestría Académica y Doctorado que se imparten en las universidades estatales', 'Sumatoria de los programas de Maestría Académica (sin considerar los énfasis) y Doctorado que se imparten en las universidades estatales', 'Insumo'),
(16, 'PRC001', 'Total de proyectos de investigación', 'Número de proyectos de investigación vigentes en el año de referencia de las universidades públicas costarricenses', 'Sumatoria de los proyectos de investigación vigentes en el año de referencia de las universidades públicas costarricenses', 'Proceso'),
(17, 'PRC002', 'Proyectos financiados con fondos del sistema como porcentaje del total de proyectos de investigación', 'Número de proyectos de investigación vigentes en el año de referencia y financiados con Fondos del Sistema en relación con el total de proyectos de investigación de las cuatro universidades', 'Sumatoria de los proyectos de investigación financiados con Fondos del Sistema que se encuentran vigentes en el año referido, dividida entre el total de proyectos de investigación. Los proyectos financiados con estos fondos son contabilizados exclusivamente por la universidad que los coordina', 'Proceso'),
(18, 'PRC003', 'Total de proyectos de investigación por disciplina', 'Número de proyectos de investigación vigentes en el año de referencia de las universidades públicas costarricenses por disciplina', 'Sumatoria de los proyectos de investigación vigentes en el año de referencia de las universidades públicas costarricenses, clasificados según disciplina a un dígito del Manual de Frascati', 'Proceso'),
(19, 'PRC004', 'Total de proyectos de investigación por disciplina según sede por area científica', 'Número de proyectos de investigación vigentes en el año de referncia de las universidades públicas costarricenses desarrollados en las sedes regionales según área de la ciencia', 'Sumatoria de los proyectos de investigación vigentes en el año de referencia de las universidades públicas costarriceneses desarrollados en las sedes regionales clasificados según área de la ciencia', 'Proceso'),
(20, 'PRC005', 'Proyectos de investigación por objetivo socioeconómico', 'Número total de proyectos vigentes en el año de referencia clasificados por objetivo socioeconómico', 'Sumatoria de proyectos de investigación vigentes en el año de análisis clasificados por objetivo socioeconómico según el Manual de Frascati (2002) de la OECD', 'Proceso'),
(21, 'PDTO001', 'Publicaciones en revistas indexadas en Thompson Reuters', 'Total de artículos en revistas indexadas de las universidades públicas costarricenses en la base de datos Thompson Reuters.', 'Sumatoria de artículos de las universidades públicas costarricenses publicados en revistas indexadas en la base de datos de Thompson Reuters según año de referencia.', 'Producto'),
(22, 'PDTO002', 'Publicaciones en revistas indexadas en Scopus', 'Total de artículos en revistas indexadas de las universidades públicas costarricenese en la base de datos Scopus.', 'Sumatoria de artículos de las universidades públicas costarricenses publicados en revistas indexadas en la base de datos Scopus según añode referencia.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `idtags` int(11) NOT NULL,
  `tag` varchar(45) NOT NULL,
  `indicador_idindicador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dato`
--

CREATE TABLE IF NOT EXISTS `tipo_dato` (
  `idtipodato` int(4) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_dato`
--

INSERT INTO `tipo_dato` (`idtipodato`, `tipo`) VALUES
(1, 'INV001 - Gasto I+D'),
(2, 'INV006 - Gastos corrientes en I+D por disciplina'),
(3, 'RH001 - Investigadores universitarios activos'),
(4, 'RH002 - Investigadores (as) universitarios (as) activos (as) según sexo'),
(5, 'RH003 - Investigadores universitarios activos por grado académico'),
(6, 'RH004.1 - Investigadores (as) universitarios (as) activos por disciplina según grado académico'),
(7, 'RH005 - Investigadores (as) universitarios (as) activos (as) responsables de proyectos por grado aca'),
(8, 'RH006 - Tiempos completos de Investigadores (as) universitarios (as) activos (as)'),
(9, 'RH007 - Graduados de programas de Maestría Académica y Doctorado por grado académico'),
(10, 'PRC001 - Total de proyectos en I+D'),
(11, 'PRC002 - Proyectos financiados con fondos del sistema como porcentaje del total de proyectos de investigación'),
(12, 'PRC003 - Total de proyectos de investigación por disciplina'),
(13, 'PRC004 - Total de proyectos de investigación por disciplina según sede por area científica'),
(14, 'PRC005 - Proyectos de investigación por objetivo socioeconómico'),
(15, 'INS011 - Total de programas de maestría académica y doctorado'),
(16, 'INDEFINIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipo_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(90) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipo_usuario`, `nombre`, `descripcion`) VALUES
(1, 'invitado', 'Usuario sin privilegios.'),
(2, 'editor', 'Usuario que puede ingresar datos.'),
(3, 'administrador', 'Usuario que tiene accesos basicamente a todo'),
(4, 'supervisor', 'Usuario que tiene acceso a auditorias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE IF NOT EXISTS `universidad` (
  `iduniversidad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `acronimo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`iduniversidad`, `nombre`, `acronimo`) VALUES
(1, 'Universidad Nacional', 'UNA'),
(2, 'Universidad de Costa Rica', 'UCR'),
(3, 'Universidad Nacional a Distancia', 'UNED'),
(4, 'Instituto Tecnologico de Costa Rica', 'ITCR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(135) NOT NULL,
  `tipo_usuario_idtipo_usuario` int(11) NOT NULL,
  `universidad_iduniversidad` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `password`, `tipo_usuario_idtipo_usuario`, `universidad_iduniversidad`) VALUES
(1, 'Admin', 'CONARE', 'admin@ind_ext.com', '6285dc9af33de083e3abf4a2a01eb921', 3, NULL),
(2, 'Marcela', 'Vílchez', 'marcela.vilchez@ucr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 2),
(3, 'Patricia', 'Meneses Guillén', 'pmeneses@itcr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 4),
(4, 'Andrés', 'Segura', 'asegurac@uned.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 3),
(6, 'Jose', 'Rodriguez Blanco', 'jose.rodriguezblanco@ucr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 2),
(7, 'Eduardo', 'Tenorio', 'eduardo.tenorio@ucr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 2),
(8, 'Esterlyn', 'Quesada', 'equesada@uned.ac.cr 	', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 3),
(9, 'Harry', 'Alpizar', 'halpizar@una.cr', '6921d8e9de7ea752e0db6d0cd9b1d709', 2, 1),
(10, 'Isaías', 'Rivera', 'isrivera@itcr.ac.cr', '64ae90ed8b2124652ed0c6448ad1b1de', 2, 4),
(11, 'Luis', 'Velasquez', 'lgvv06@gmail.com', '6d506361a8c0b11d4c1b3607407e2ed3', 3, NULL),
(12, 'Juan', 'UNA', 'una@una.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 1),
(13, 'Juan', 'UCR', 'ucr@ucr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 2),
(14, 'Juan', 'TEC', 'itcr@itcr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 4),
(15, 'Juan', 'UNED', 'uned@uned.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`idacceso`), ADD UNIQUE KEY `idacceso_UNIQUE` (`idacceso`), ADD KEY `fk_acceso_tipo_usuario1_idx` (`tipo_usuario_idtipo_usuario`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`idauditoria`), ADD UNIQUE KEY `idauditoria_UNIQUE` (`idauditoria`), ADD KEY `fk_auditoria_usuario1_idx` (`usuario_idusuario`), ADD KEY `fk_auditoria_dato1_idx` (`dato_iddato`);

--
-- Indices de la tabla `dato`
--
ALTER TABLE `dato`
  ADD PRIMARY KEY (`iddato`), ADD UNIQUE KEY `iddatos_UNIQUE` (`iddato`), ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`), ADD KEY `fk_dato_indicador1_idx` (`indicador_idindicador`);

--
-- Indices de la tabla `dato_anual_universidad`
--
ALTER TABLE `dato_anual_universidad`
  ADD PRIMARY KEY (`iddato_anual_universidad`), ADD UNIQUE KEY `iddato_anual_universidad_UNIQUE` (`iddato_anual_universidad`), ADD KEY `fk_dato_anual_universidad_dato_idx` (`dato_iddato`), ADD KEY `fk_dato_anual_universidad_universidad1_idx` (`universidad_iduniversidad`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`idindicador`), ADD UNIQUE KEY `idindicador_UNIQUE` (`idindicador`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idtags`), ADD UNIQUE KEY `idtags_UNIQUE` (`idtags`), ADD KEY `fk_tags_indicador1_idx` (`indicador_idindicador`);

--
-- Indices de la tabla `tipo_dato`
--
ALTER TABLE `tipo_dato`
  ADD PRIMARY KEY (`idtipodato`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipo_usuario`), ADD UNIQUE KEY `idtipo_usuario_UNIQUE` (`idtipo_usuario`), ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`iduniversidad`), ADD UNIQUE KEY `iduniversidad_UNIQUE` (`iduniversidad`), ADD UNIQUE KEY `acronimo_UNIQUE` (`acronimo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`), ADD UNIQUE KEY `idusuario_UNIQUE` (`idusuario`), ADD UNIQUE KEY `email` (`email`), ADD KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usuario_idtipo_usuario`), ADD KEY `fk_usuario_universidad1_idx` (`universidad_iduniversidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `idauditoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `iddato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT de la tabla `dato_anual_universidad`
--
ALTER TABLE `dato_anual_universidad`
  MODIFY `iddato_anual_universidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `idindicador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `idtags` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_dato`
--
ALTER TABLE `tipo_dato`
  MODIFY `idtipodato` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipo_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `iduniversidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
ADD CONSTRAINT `fk_acceso_tipo_usuario1` FOREIGN KEY (`tipo_usuario_idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
ADD CONSTRAINT `fk_auditoria_dato1` FOREIGN KEY (`dato_iddato`) REFERENCES `dato` (`iddato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_auditoria_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dato`
--
ALTER TABLE `dato`
ADD CONSTRAINT `fk_dato_indicador1` FOREIGN KEY (`indicador_idindicador`) REFERENCES `indicador` (`idindicador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dato_anual_universidad`
--
ALTER TABLE `dato_anual_universidad`
ADD CONSTRAINT `fk_dato_anual_universidad_dato` FOREIGN KEY (`dato_iddato`) REFERENCES `dato` (`iddato`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_dato_anual_universidad_universidad1` FOREIGN KEY (`universidad_iduniversidad`) REFERENCES `universidad` (`iduniversidad`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tag`
--
ALTER TABLE `tag`
ADD CONSTRAINT `fk_tags_indicador1` FOREIGN KEY (`indicador_idindicador`) REFERENCES `indicador` (`idindicador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario_idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuario_universidad1` FOREIGN KEY (`universidad_iduniversidad`) REFERENCES `universidad` (`iduniversidad`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
