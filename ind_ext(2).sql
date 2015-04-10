-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2015 a las 23:50:05
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

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
(104, 'indicators/get_details', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1941 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Volcado de datos para la tabla `dato`
--

INSERT INTO `dato` (`iddato`, `nombre`, `descripcion`, `desagregado`, `indicador_idindicador`) VALUES
(1, 'D1', 'Liquidaciones totales en equipo e infraestructura (interno)', 0, 1),
(2, 'D2', 'Liquidaciones totales en equipo e infraestructura (externo)', 0, 1),
(3, 'D3', 'Gastos de operacion y recurso humano (interno)', 0, 1),
(4, 'D4', 'Gastos de operacion y recurso humano (externo)', 0, 1),
(5, 'D5', 'Fondos provenientes del Fondo del Sistema de CONARE', 0, 1),
(12, 'D12', 'Gastos en operacion en Ciencias naturales', 0, 1),
(13, 'D13', 'Gastos en operacion en Ingenieria y tecnologia', 0, 1),
(14, 'D14', 'Gastos en operacion Ciencias medicas', 0, 1),
(15, 'D15', 'Gastos en operacion en Ciencias agricolas', 0, 1),
(16, 'D16', 'Gastos en operacion en Humanidades', 0, 1),
(17, 'D17', 'Gastos en operacion en Ciencias Sociales', 0, 1),
(18, 'D18', 'Gastos en recurso humano en Ciencias naturales', 0, 1),
(19, 'D19', 'Gastos en recurso humano en Ingenieria y tecnologia', 0, 1),
(20, 'D20', 'Gastos en recurso humano Ciencias medicas', 0, 1),
(21, 'D21', 'Gastos en recurso humano en Ciencias agricolas', 0, 1),
(22, 'D22', 'Gastos en recurso humano Humanidades', 0, 1),
(23, 'D23', 'Gastos en recurso humano en Ciencias Sociales', 0, 1),
(24, 'D24', 'Cantidad de Investigadores participantes (Incluye Ad honorem) masculinos', 0, 2),
(25, 'D25', 'Cantidad de investigadores participantes (Incluye Ad honorem) femeninos', 0, 2),
(26, 'D26', 'Cantidad de investigadores participantes (Incluye Ad honorem)', 0, 2),
(27, 'D27', 'Cantidad de investigadores participantes (Incluye Ad honorem) en grado Bachiller y Licenciatura', 0, 2),
(28, 'D28', 'Cantidad de investigadores participantes (Incluye Ad honorem) en grado Maestria', 0, 2),
(29, 'D29', 'Cantidad de investigadores participantes (Incluye Ad honorem) en grado Doctorado', 0, 2),
(30, 'D30', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades', 0, 2),
(31, 'D31', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia', 0, 2),
(32, 'D32', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas', 0, 2),
(33, 'D33', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas', 0, 2),
(34, 'D34', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias naturales', 0, 2),
(35, 'D35', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales', 0, 2),
(36, 'D36', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia Grado Bachiller y Licenciatura', 0, 2),
(37, 'D37', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia Grado Maestria', 0, 2),
(38, 'D38', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ingenieria y tecnologia Grado Doctorado', 0, 2),
(39, 'D39', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas Grado Bachiller y Licenciatura', 0, 2),
(40, 'D40', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas Grado Maestria', 0, 2),
(41, 'D41', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias medicas Grado Doctorado', 0, 2),
(42, 'D42', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas Grado Bachiller y Licenciatura', 0, 2),
(43, 'D43', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas Grado Maestria', 0, 2),
(44, 'D44', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias agricolas Grado Doctorado', 0, 2),
(45, 'D45', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades Grado Bachiller y Licenciatura', 0, 2),
(46, 'D46', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades Grado Maestria', 0, 2),
(47, 'D47', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Humanidades Grado Doctorado', 0, 2),
(48, 'D48', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales Grado Bachiller y Licenciatura', 0, 2),
(49, 'D49', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales Grado Maestria', 0, 2),
(50, 'D50', 'Cantidad de investigadores participantes (Incluye Ad honorem) en Ciencias sociales Grado Doctorado', 0, 2),
(51, 'D51', 'Cantidad de investigadores responsables de coordinar  masculinos grado Bachiller y Licenciatura', 0, 2),
(52, 'D52', 'Cantidad de investigadores responsables de coordinar  masculinos grado Maestria', 0, 2),
(53, 'D53', 'Cantidad de investigadores responsables de coordinar  masculinos grado Doctorado', 0, 2),
(54, 'D54', 'Cantidad de investigadores responsables de coordinar  femeninos grado Bachiller y Licenciatura', 0, 2),
(55, 'D55', 'Cantidad de investigadores responsables de coordinar  femeninos grado Maestria', 0, 2),
(56, 'D56', 'Cantidad de investigadores responsables de coordinar  femeninos grado Doctorado', 0, 2),
(57, 'D57', 'Cantidad de horas asignadas a los investigadores activos de las cuatro universidades', 0, 2),
(58, 'D58', 'Cantidad de graduados de los programas de Maestria Academica', 0, 3),
(59, 'D59', 'Cantidad de graduados de los programas de Doctorado', 0, 3),
(60, 'D60', 'Total de programas de Maestria Academica', 0, 3),
(61, 'D61', 'Total de programas de Doctorado', 0, 3),
(62, 'D62', 'Total de proyectos de investigacion vigentes UCR', 0, 3),
(63, 'D63', 'Total de proyectos de investigacion vigentes UNA', 0, 3),
(64, 'D64', 'Total de proyectos de investigacion vigentes ITCR', 0, 3),
(65, 'D65', 'Total de proyectos de investigacion vigentes UNED', 0, 3),
(66, 'D66', 'Cantidad de proyectos de investigacion financiados con Fondos del Sistema', 0, 3),
(67, 'D67', 'Cantidad de proyectos interdisciplinarios', 0, 3),
(68, 'D68', 'Cantidad de proyectos en Ingenieria y tecnologia', 0, 3),
(69, 'D69', 'Cantidad de proyectos en Humanidades', 0, 3),
(70, 'D70', 'Cantidad de proyectos en Ciencias medicas', 0, 3),
(71, 'D71', 'Cantidad de proyectos en Ciencias agricolas', 0, 3),
(72, 'D72', 'Cantidad de proyectos en Ciencias sociales', 0, 3),
(73, 'D73', 'Cantidad de proyectos en Ciencias naturales', 0, 3),
(74, 'D74', 'Cantidad de proyectos en Ingenieria y tecnologia de la sede central', 0, 3),
(75, 'D75', 'Cantidad de proyectos en Humanidades (Artes y Letras) de la sede central', 0, 3),
(76, 'D76', 'Cantidad de proyectos en Ciencias medicas de la sede central', 0, 3),
(77, 'D77', 'Cantidad de proyectos en Ciencias agricolas de la sede central', 0, 3),
(78, 'D78', 'Cantidad de proyectos en Ciencias sociales de la sede central', 0, 3),
(79, 'D79', 'Cantidad de proyectos en Ciencias naturales de la sede central', 0, 3),
(80, 'D80', 'Cantidad de proyectos en Humanidades (Artes y Letras) de la sede central', 0, 3),
(81, 'D81', 'Cantidad de proyectos en Ingenieria y tecnologia de la sede regional', 0, 3),
(82, 'D82', 'Cantidad de proyectos en Humanidades (Artes y Letras) de la sede regional', 0, 3),
(83, 'D83', 'Cantidad de proyectos en Ciencias medicas de la sede regional', 0, 3),
(84, 'D84', 'Cantidad de proyectos en Ciencias agricolas de la sede regional', 0, 3),
(85, 'D85', 'Cantidad de proyectos en Ciencias sociales de la sede regional', 0, 3),
(86, 'D86', 'Cantidad de proyectos en Ciencias naturales de la sede regional', 0, 3),
(87, 'D87', 'Cantidad de proyectos en Humanidades (Artes y Letras) de la sede regional', 0, 3),
(88, 'D88', 'Cantidad de proyectos de exploracion y explotacion del espacio', 0, 3),
(89, 'D89', 'Cantidad de proyectos de produccion  distribucion y utilizacion racional de la tierra', 0, 3),
(90, 'D90', 'Cantidad de proyectos de infraestructura y ordenamiento del territorio', 0, 3),
(91, 'D91', 'Cantidad de proyectos de produccion y tecnologia industrial', 0, 3),
(92, 'D92', 'Cantidad de proyectos de investigacion no orientada', 0, 3),
(93, 'D93', 'Cantidad de proyectos de exploracion y explotacion de la tierra', 0, 3),
(94, 'D94', 'Cantidad de proyectos de control y proteccion del medio ambiente', 0, 3),
(95, 'D95', 'Cantidad de proyectos de proteccion y mejora de la salud humana', 0, 3),
(96, 'D96', 'Cantidad de proyectos de produccion y tecnologia agricola', 0, 3),
(97, 'D97', 'Cantidad de proyectos de estructuras y relaciones sociales', 0, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1558 ;

--
-- Volcado de datos para la tabla `dato_anual_universidad`
--

INSERT INTO `dato_anual_universidad` (`iddato_anual_universidad`, `dato_iddato`, `universidad_iduniversidad`, `anho`, `valor`) VALUES
(1, 1, 2, '2011', 8000),
(2, 2, 2, '2011', 2000),
(3, 3, 2, '2011', 12000),
(4, 4, 2, '2011', 3000),
(5, 5, 2, '2011', 4000),
(24, 24, 2, '2011', 500),
(25, 25, 2, '2011', 400),
(26, 26, 2, '2011', 900),
(27, 27, 2, '2011', 400),
(28, 28, 2, '2011', 500),
(29, 29, 2, '2011', 250),
(30, 30, 2, '2011', 76),
(31, 31, 2, '2011', 100),
(32, 32, 2, '2011', 100),
(33, 33, 2, '2011', 88),
(34, 34, 2, '2011', 100),
(35, 35, 2, '2011', 100),
(36, 36, 2, '2011', 25),
(37, 37, 2, '2011', 50),
(38, 38, 2, '2011', 25),
(39, 39, 2, '2011', 25),
(40, 40, 2, '2011', 50),
(41, 41, 2, '2011', 25),
(42, 42, 2, '2011', 25),
(43, 43, 2, '2011', 50),
(44, 44, 2, '2011', 25),
(45, 45, 2, '2011', 25),
(46, 46, 2, '2011', 50),
(47, 47, 2, '2011', 25),
(48, 48, 2, '2011', 25),
(49, 49, 2, '2011', 50),
(50, 50, 2, '2011', 25),
(51, 51, 2, '2011', 100),
(52, 52, 2, '2011', 90),
(53, 53, 2, '2011', 80),
(54, 54, 2, '2011', 90),
(55, 55, 2, '2011', 80),
(56, 56, 2, '2011', 70),
(57, 57, 2, '2011', 16000),
(58, 58, 2, '2011', 200),
(59, 59, 2, '2011', 20),
(60, 60, 2, '2011', 15),
(61, 61, 2, '2011', 100),
(62, 62, 2, '2011', 1200),
(66, 66, 2, '2011', 90),
(67, 67, 2, '2011', 516),
(68, 68, 2, '2011', 436),
(69, 69, 2, '2011', 268),
(70, 70, 2, '2011', 217),
(71, 71, 2, '2011', 155),
(72, 72, 2, '2011', 130),
(73, 73, 2, '2011', 20),
(81, 81, 2, '2011', 5),
(82, 82, 2, '2011', 5),
(83, 83, 2, '2011', 5),
(84, 84, 2, '2011', 5),
(85, 85, 2, '2011', 5),
(86, 86, 2, '2011', 5),
(87, 87, 2, '2011', 5),
(88, 88, 2, '2011', 10),
(89, 89, 2, '2011', 20),
(90, 90, 2, '2011', 30),
(91, 91, 2, '2011', 40),
(92, 92, 2, '2011', 50),
(93, 93, 2, '2011', 60),
(94, 94, 2, '2011', 70),
(95, 95, 2, '2011', 80),
(96, 96, 2, '2011', 90),
(97, 97, 2, '2011', 100),
(98, 1, 2, '2010', 7000),
(99, 2, 2, '2010', 1800),
(100, 3, 2, '2010', 11000),
(101, 4, 2, '2010', 1800),
(102, 5, 2, '2010', 3000),
(121, 24, 2, '2010', 450),
(122, 25, 2, '2010', 380),
(123, 26, 2, '2010', 800),
(124, 27, 2, '2010', 350),
(125, 28, 2, '2010', 450),
(126, 29, 2, '2010', 200),
(127, 30, 2, '2010', 90),
(128, 31, 2, '2010', 90),
(129, 32, 2, '2010', 90),
(130, 33, 2, '2010', 90),
(131, 34, 2, '2010', 90),
(132, 35, 2, '2010', 90),
(133, 36, 2, '2010', 20),
(134, 37, 2, '2010', 45),
(135, 38, 2, '2010', 20),
(136, 39, 2, '2010', 20),
(137, 40, 2, '2010', 40),
(138, 41, 2, '2010', 20),
(139, 42, 2, '2010', 20),
(140, 43, 2, '2010', 40),
(141, 44, 2, '2010', 20),
(142, 45, 2, '2010', 20),
(143, 46, 2, '2010', 40),
(144, 47, 2, '2010', 20),
(145, 48, 2, '2010', 20),
(146, 49, 2, '2010', 45),
(147, 50, 2, '2010', 20),
(148, 51, 2, '2010', 90),
(149, 52, 2, '2010', 80),
(150, 53, 2, '2010', 70),
(151, 54, 2, '2010', 60),
(152, 55, 2, '2010', 70),
(153, 56, 2, '2010', 60),
(154, 57, 2, '2010', 14000),
(155, 58, 2, '2010', 180),
(156, 59, 2, '2010', 17),
(157, 60, 2, '2010', 10),
(158, 61, 2, '2010', 90),
(159, 62, 2, '2010', 1100),
(163, 66, 2, '2010', 96),
(164, 67, 2, '2010', 500),
(165, 68, 2, '2010', 400),
(166, 69, 2, '2010', 200),
(167, 70, 2, '2010', 200),
(168, 71, 2, '2010', 140),
(169, 72, 2, '2010', 110),
(170, 73, 2, '2010', 30),
(178, 81, 2, '2010', 4),
(179, 82, 2, '2010', 4),
(180, 83, 2, '2010', 4),
(181, 84, 2, '2010', 4),
(182, 85, 2, '2010', 4),
(183, 86, 2, '2010', 4),
(184, 87, 2, '2010', 4),
(185, 88, 2, '2010', 9),
(186, 89, 2, '2010', 18),
(187, 90, 2, '2010', 25),
(188, 91, 2, '2010', 35),
(189, 92, 2, '2010', 45),
(190, 93, 2, '2010', 55),
(191, 94, 2, '2010', 65),
(192, 95, 2, '2010', 75),
(193, 96, 2, '2010', 80),
(194, 97, 2, '2010', 90),
(1359, 1, 2, '2012', 25),
(1360, 2, 2, '2012', 25),
(1361, 3, 2, '2012', 25),
(1362, 4, 2, '2012', 25),
(1363, 5, 2, '2012', 25),
(1370, 12, 2, '2012', 25),
(1371, 13, 2, '2012', 25),
(1372, 14, 2, '2012', 25),
(1373, 15, 2, '2012', 25),
(1374, 16, 2, '2012', 25),
(1375, 17, 2, '2012', 25),
(1376, 18, 2, '2012', 25),
(1377, 19, 2, '2012', 25),
(1378, 20, 2, '2012', 25),
(1379, 21, 2, '2012', 25),
(1380, 22, 2, '2012', 25),
(1381, 23, 2, '2012', 25),
(1382, 24, 2, '2012', 25),
(1383, 25, 2, '2012', 25),
(1384, 26, 2, '2012', 25),
(1385, 27, 2, '2012', 25),
(1386, 28, 2, '2012', 25),
(1387, 29, 2, '2012', 25),
(1388, 30, 2, '2012', 25),
(1389, 31, 2, '2012', 25),
(1390, 32, 2, '2012', 25),
(1391, 33, 2, '2012', 25),
(1392, 34, 2, '2012', 25),
(1393, 35, 2, '2012', 25),
(1394, 36, 2, '2012', 25),
(1395, 37, 2, '2012', 25),
(1396, 38, 2, '2012', 25),
(1397, 39, 2, '2012', 25),
(1398, 40, 2, '2012', 25),
(1399, 41, 2, '2012', 25),
(1400, 42, 2, '2012', 25),
(1401, 43, 2, '2012', 25),
(1402, 44, 2, '2012', 25),
(1403, 45, 2, '2012', 25),
(1404, 46, 2, '2012', 25),
(1405, 47, 2, '2012', 25),
(1406, 48, 2, '2012', 25),
(1407, 49, 2, '2012', 25),
(1408, 50, 2, '2012', 25),
(1409, 51, 2, '2012', 25),
(1410, 52, 2, '2012', 25),
(1411, 53, 2, '2012', 25),
(1412, 54, 2, '2012', 25),
(1413, 55, 2, '2012', 25),
(1414, 56, 2, '2012', 25),
(1415, 57, 2, '2012', 25),
(1416, 58, 2, '2012', 25),
(1417, 59, 2, '2012', 25),
(1418, 60, 2, '2012', 25),
(1419, 61, 2, '2012', 25),
(1420, 62, 2, '2012', 25),
(1421, 63, 2, '2012', 25),
(1422, 64, 2, '2012', 25),
(1423, 65, 2, '2012', 25),
(1424, 66, 2, '2012', 25),
(1425, 67, 2, '2012', 25),
(1426, 68, 2, '2012', 25),
(1427, 69, 2, '2012', 25),
(1428, 70, 2, '2012', 25),
(1429, 71, 2, '2012', 25),
(1430, 72, 2, '2012', 25),
(1431, 73, 2, '2012', 25),
(1432, 74, 2, '2012', 25),
(1433, 75, 2, '2012', 25),
(1434, 76, 2, '2012', 25),
(1435, 77, 2, '2012', 25),
(1436, 78, 2, '2012', 25),
(1437, 79, 2, '2012', 25),
(1438, 80, 2, '2012', 25),
(1439, 81, 2, '2012', 25),
(1440, 82, 2, '2012', 25),
(1441, 83, 2, '2012', 25),
(1442, 84, 2, '2012', 25),
(1443, 85, 2, '2012', 25),
(1444, 86, 2, '2012', 25),
(1445, 87, 2, '2012', 25),
(1446, 88, 2, '2012', 25),
(1447, 89, 2, '2012', 25),
(1448, 90, 2, '2012', 25),
(1449, 91, 2, '2012', 25),
(1450, 92, 2, '2012', 25),
(1451, 93, 2, '2012', 25),
(1452, 94, 2, '2012', 25),
(1453, 95, 2, '2012', 25),
(1454, 96, 2, '2012', 25),
(1455, 97, 2, '2012', 25),
(1549, 1, 2, '2015', 313),
(1550, 2, 2, '2015', 1233),
(1551, 3, 2, '2015', 133),
(1552, 4, 2, '2015', 1323),
(1553, 1, 2, '2008', 100),
(1554, 2, 2, '2008', 100),
(1555, 3, 2, '2008', 100),
(1556, 4, 2, '2008', 100),
(1557, 1, 2, '2004', 1800);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='	' AUTO_INCREMENT=21 ;

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
(7, 'RH001', 'Investigadores (as) universitarios (as) activos (as) según sexo', 'Número total de investigadores universitarios que participan en proyectos vigenes en el año de referencia', 'Sumatoria de los investigadores participantes, incluyendo los nombrados ad honorem, en los proyectos de investigación vigentes en el año de referencia', 'Insumo'),
(8, 'RH002', 'Investigadores (as) universitarios (as) activos (as)', 'Número total de investigadores universitarios que participan en proyectos vigentes en el año de referencia clasificados según sexo', 'Sumatoria de los investigadores participantes, incluyendo los ad honorem, en los proyectos de investigación vigentes en el año de referencia clasificados según sexo', 'Insumo'),
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
(20, 'PRC005', 'Proyectos de investigación por objetivo socioeconómico', 'Número total de proyectos vigentes en el año de referencia clasificados por objetivo socioeconómico', 'Sumatoria de proyectos de investigación vigentes en el año de análisis clasificados por objetivo socioeconómico según el Manual de Frascati (2002) de la OECD', 'Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`idtags` int(11) NOT NULL,
  `tag` varchar(45) NOT NULL,
  `indicador_idindicador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dato`
--

CREATE TABLE IF NOT EXISTS `tipo_dato` (
`idtipodato` int(4) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_dato`
--

INSERT INTO `tipo_dato` (`idtipodato`, `tipo`) VALUES
(1, 'Gastos y fondos'),
(2, 'Investigadores'),
(3, 'Proyectos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
`idtipo_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(90) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `password`, `tipo_usuario_idtipo_usuario`, `universidad_iduniversidad`) VALUES
(1, 'Admin', 'CONARE', 'admin@ind_ext.com', '6285dc9af33de083e3abf4a2a01eb921', 3, NULL),
(6, 'Jose', 'Rodriguez Blanco', 'jose.rodriguezblanco@ucr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 2),
(7, 'Eduardo', 'Tenorio', 'eduardo.tenorio@ucr.ac.cr', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 2),
(8, 'Esterlyn', 'Quesada', 'equesada@uned.ac.cr 	', '6d506361a8c0b11d4c1b3607407e2ed3', 2, 3),
(9, 'Harry', 'Alpizar', 'halpizar@una.cr', '6921d8e9de7ea752e0db6d0cd9b1d709', 2, 1),
(10, 'Isaías', 'Rivera', 'isrivera@itcr.ac.cr', '64ae90ed8b2124652ed0c6448ad1b1de', 2, 4),
(11, 'Luis', 'Velasquez', 'lgvv06@gmail.com', '6d506361a8c0b11d4c1b3607407e2ed3', 3, NULL);

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
MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
MODIFY `idauditoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1941;
--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
MODIFY `iddato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT de la tabla `dato_anual_universidad`
--
ALTER TABLE `dato_anual_universidad`
MODIFY `iddato_anual_universidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1558;
--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
MODIFY `idindicador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
MODIFY `idtags` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_dato`
--
ALTER TABLE `tipo_dato`
MODIFY `idtipodato` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
