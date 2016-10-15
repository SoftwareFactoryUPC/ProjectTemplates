-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2016 a las 02:05:06
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `demo1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `demo1`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login`(IN `usuario` VARCHAR(20), IN `clave` VARCHAR(50))
BEGIN

SELECT u.id_usuario, u.usunombres, u.usuapepaterno, u.usuapematerno
    FROM usuario u 
WHERE u.usunick = usuario AND u.usuclave = clave AND u.usuestado = 1;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `contitulo` varchar(45) NOT NULL,
  `convalor` text NOT NULL,
  PRIMARY KEY (`id_configuracion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `contitulo`, `convalor`) VALUES
(1, 'TITULO_PAGINA', 'PRUEBA'),
(2, 'RAZON_SOCIAL', 'PRUEBA S.A.C'),
(3, 'TELEFONOS', '(51) 123456'),
(4, 'EMAIL_CONTACTO', 'msegoviachacon@gmail.com'),
(6, 'PAGINA_FACEBOOK', 'https://www.facebook.com'),
(7, 'PAGINA_TWITTER', 'javascript:;'),
(8, 'PAGINA_YOUTUBE', 'javascript:;'),
(9, 'PAGINA_LINKEDIN', 'javascript:;'),
(10, 'DIRECCION', 'UPC SAN ISIDRO'),
(13, 'COORDENADAS_DIRECCION', '-12.0876243, -77.0522941'),
(16, 'CODIGO_ANALYTICS', '[removed]\r\n\r\n[removed]'),
(17, 'META_DESCRIPCION', 'meta descripcion'),
(18, 'META_KEYWORDS', 'meta keywords'),
(19, 'META_COPYRIGHT', 'PRUEBA S.A.C'),
(20, 'META_AUTOR', 'PRUEBA S.A.C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_empresa` varchar(100) NOT NULL,
  `tx_empresa` text NOT NULL,
  `im_empresa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `no_empresa`, `tx_empresa`, `im_empresa`) VALUES
(5, 'Nuestra Misión', '<p>Brindar el mejor servicio de construcción a nivel nacional</p>', '210820161904378.png'),
(6, 'Nuestra Visión', '<p>Ser una empresa de construcción de alcance internacional.</p>', '270820141238046.png'),
(7, 'Valores', '<ul>\r\n<li>Honestidad</li>\r\n<li>Perseverancia</li>\r\n</ul>', '210820161905468.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `modnombre` varchar(45) NOT NULL,
  `modestado` tinyint(1) DEFAULT NULL,
  `modorden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `modnombre`, `modestado`, `modorden`) VALUES
(1, 'Mantenimiento', 1, 1),
(2, 'Configuración Panel', 1, 3),
(3, 'Configuración Interna', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `secnombre` varchar(45) NOT NULL,
  `securl` varchar(45) NOT NULL,
  `secclase` varchar(45) DEFAULT NULL,
  `sectabla` varchar(45) DEFAULT NULL,
  `secestado` tinyint(1) NOT NULL,
  `secorden` int(11) NOT NULL,
  `modulo_id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_seccion`),
  KEY `fk_seccion_modulo` (`modulo_id_modulo`),
  KEY `modulo_id_modulo` (`modulo_id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `secnombre`, `securl`, `secclase`, `sectabla`, `secestado`, `secorden`, `modulo_id_modulo`) VALUES
(1, 'Soluciones', 'panel/solucion/listado', 'solucion', 'solucion', 1, 2, 1),
(3, 'Servicios', 'panel/servicio/listado', 'servicio', 'servicio', 1, 4, 1),
(4, 'Empresa', 'panel/empresa/listado', 'empresa', 'empresa', 1, 5, 1),
(6, 'Usuarios', 'panel/usuario/listado', 'usuario', 'usuario', 1, 2, 3),
(7, 'Configuración Web', 'panel/configuracion/listado', 'configuracion', 'configuracion', 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `id_servicio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_servicio` varchar(100) NOT NULL,
  `tx_servicio_breve` varchar(300) NOT NULL,
  `tx_servicio` text NOT NULL,
  `im_servicio` varchar(20) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `no_servicio`, `tx_servicio_breve`, `tx_servicio`, `im_servicio`) VALUES
(5, 'Soporte de Venta', 'Contamos con personal capacitado para atenderte en cualquier situación. ', '<p>Contamos con personal capacitado para atenderte en cualquier situación:</p>\r\n<ul>\r\n<li>Atención las 24 horas del dia</li>\r\n<li>Vamos hasta donde tu estés </li>\r\n</ul>', '070920160616527.png'),
(6, 'Desarrollo de Construccion', 'Desarrollamos la construccion en comunicación con el cliente', '<p dir="ltr">Desarrollamos la construccion en comunicación con el cliente</p>', '070920160615093.png'),
(7, 'Venta de Casas', 'Disponemos del personal adecuado para las ventas.', '<p>Disponemos del personal adecuado para las ventas:</p>\r\n<ul>\r\n<li>Tipo de personal 1</li>\r\n<li>Tipo de personal 2</li>\r\n</ul>', '070920160614251.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucion`
--

CREATE TABLE IF NOT EXISTS `solucion` (
  `id_solucion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_solucion` varchar(100) NOT NULL,
  `tx_solucion_breve` varchar(300) NOT NULL,
  `tx_solucion` text NOT NULL,
  `im_solucion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_solucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `solucion`
--

INSERT INTO `solucion` (`id_solucion`, `no_solucion`, `tx_solucion_breve`, `tx_solucion`, `im_solucion`) VALUES
(4, 'Publicidad', 'Vende tu casa lo más rápido posible', '<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>\r\n<p> </p>\r\n<ul>\r\n<li> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>\r\n<li> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>\r\n</ul>', '070920160610549.png'),
(5, 'Construccion', 'Lorem ipsum dolor sit amet, consectetur ', '<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', '070920160610403.png'),
(6, 'Creación de diseños', 'Se crean diseños de arquitectura a pedido del cliente. ', '<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', '070920160609554.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usunombres` varchar(45) DEFAULT NULL,
  `usuapepaterno` varchar(45) DEFAULT NULL,
  `usuapematerno` varchar(45) DEFAULT NULL,
  `usuemail` varchar(45) DEFAULT NULL,
  `usunick` varchar(45) NOT NULL,
  `usuclave` varchar(50) DEFAULT NULL,
  `usuestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usunombres`, `usuapepaterno`, `usuapematerno`, `usuemail`, `usunick`, `usuclave`, `usuestado`) VALUES
(1, 'Maria', 'Segovia', 'Chacon', 'msegovia@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `fk_seccion_modulo` FOREIGN KEY (`modulo_id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
