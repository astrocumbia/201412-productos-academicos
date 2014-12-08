-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2014 at 12:58 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `segresados`
--
CREATE DATABASE IF NOT EXISTS `segresados` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `segresados`;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `consejo`
--

DROP TABLE IF EXISTS `consejo`;
CREATE TABLE IF NOT EXISTS `consejo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `egresado_id` int(11) NOT NULL DEFAULT '0',
  `contenido` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
CREATE TABLE IF NOT EXISTS `curriculum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `egresado_id` int(11) NOT NULL DEFAULT '0',
  `idioma_id` int(11) NOT NULL DEFAULT '0',
  `ruta` varchar(255) NOT NULL DEFAULT '""' COMMENT 'Ruta relativa del archivo',
  `mime` varchar(255) NOT NULL DEFAULT '""',
  `comentarios` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `egresado_id` (`egresado_id`,`idioma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dialecto`
--

DROP TABLE IF EXISTS `dialecto`;
CREATE TABLE IF NOT EXISTS `dialecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `egresado`
--

DROP TABLE IF EXISTS `egresado`;
CREATE TABLE IF NOT EXISTS `egresado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) NOT NULL,
  `nombres` varchar(255) NOT NULL DEFAULT '""',
  `apellidos` varchar(255) NOT NULL DEFAULT '""',
  `nacido_el` date NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion1` text NOT NULL,
  `direccion2` text NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `ciudad_id` int(11) NOT NULL COMMENT 'Ciudad en donde vive.',
  `estado_id` int(11) NOT NULL COMMENT 'Estado en donde vive.',
  `ciudad_origen_id` int(11) NOT NULL COMMENT 'Ciudad de nacimiento.',
  `estado_origen_id` int(11) NOT NULL COMMENT 'Estado de nacimiento.',
  `pais_origen_id` int(11) NOT NULL COMMENT 'Pais de nacimiento.',
  `telefono_movil` varchar(20) NOT NULL,
  `telefono_fijo` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '""',
  `sigo_estudiando` int(11) NOT NULL DEFAULT '0' COMMENT '0 no 1 si',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `correo` (`correo`),
  KEY `estado_origen_id` (`estado_origen_id`,`pais_origen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `egresadodialecto`
--

DROP TABLE IF EXISTS `egresadodialecto`;
CREATE TABLE IF NOT EXISTS `egresadodialecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `egresado_id` int(11) NOT NULL DEFAULT '0',
  `dialecto_id` int(11) NOT NULL DEFAULT '0',
  `dominado_al` int(11) NOT NULL COMMENT '1-100 (porciento)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `egresadoidioma`
--

DROP TABLE IF EXISTS `egresadoidioma`;
CREATE TABLE IF NOT EXISTS `egresadoidioma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `egresado_id` int(11) NOT NULL DEFAULT '0',
  `idioma_id` int(11) NOT NULL DEFAULT '0',
  `dominado_al` int(11) NOT NULL DEFAULT '0' COMMENT '1-100 (porciento)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `giro_id` int(11) NOT NULL DEFAULT '0',
  `tamanio` int(11) NOT NULL DEFAULT '1' COMMENT '1 micro, 2 pequenia, 3 mediana, 4 grande, 5 muy grande',
  `descripcion` text NOT NULL,
  `ciudad_id` int(11) NOT NULL DEFAULT '0',
  `estado_id` int(11) NOT NULL DEFAULT '0',
  `pais_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `giro_id` (`giro_id`,`ciudad_id`,`estado_id`,`pais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `pais_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estudio`
--

DROP TABLE IF EXISTS `estudio`;
CREATE TABLE IF NOT EXISTS `estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa` varchar(255) NOT NULL DEFAULT '""',
  `institucion` varchar(255) NOT NULL DEFAULT '""' COMMENT '1 licenciatura 2 maestria 3 doctorado 4 posdoc',
  `tipo` int(11) NOT NULL DEFAULT '2',
  `iniciado_el` date DEFAULT NULL,
  `terminado_el` date DEFAULT NULL,
  `titulado_el` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `carrera_id` int(11) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `inicia_el` date NOT NULL,
  `termina_el` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giro`
--

DROP TABLE IF EXISTS `giro`;
CREATE TABLE IF NOT EXISTS `giro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `historia`
--

DROP TABLE IF EXISTS `historia`;
CREATE TABLE IF NOT EXISTS `historia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `egresado_id` int(11) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `ocurrida_el` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
CREATE TABLE IF NOT EXISTS `idioma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oferta`
--

DROP TABLE IF EXISTS `oferta`;
CREATE TABLE IF NOT EXISTS `oferta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL DEFAULT '0',
  `puesto_id` int(11) NOT NULL DEFAULT '0',
  `salario` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

DROP TABLE IF EXISTS `puesto`;
CREATE TABLE IF NOT EXISTS `puesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `puestocarrera`
--

DROP TABLE IF EXISTS `puestocarrera`;
CREATE TABLE IF NOT EXISTS `puestocarrera` (
  `id` int(11) NOT NULL,
  `puesto_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `puesto_id` (`puesto_id`,`carrera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salario`
--

DROP TABLE IF EXISTS `salario`;
CREATE TABLE IF NOT EXISTS `salario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puesto_id` int(11) NOT NULL DEFAULT '0',
  `experiencia` int(11) NOT NULL DEFAULT '1' COMMENT 'Anios de experiencia',
  `monto_min` varchar(12) NOT NULL COMMENT 'Monto minimo',
  `monto_max` varchar(12) NOT NULL COMMENT 'Monto maximo',
  PRIMARY KEY (`id`),
  KEY `puesto_id` (`puesto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
CREATE TABLE IF NOT EXISTS `trabajo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `egresado_id` int(11) NOT NULL DEFAULT '0',
  `empresa_id` int(11) NOT NULL DEFAULT '0',
  `empresa_otra` varchar(200) NOT NULL DEFAULT '""' COMMENT 'Nombre de la empresa en donde estuvo si es que no esta en la lista de empresas.',
  `pais_id` int(11) NOT NULL DEFAULT '0',
  `estado_id` int(11) NOT NULL DEFAULT '0',
  `ciudad_id` int(11) NOT NULL DEFAULT '0',
  `iniciado_el` date DEFAULT NULL,
  `finalizado_el` date DEFAULT NULL,
  `ranking_empresa` int(11) NOT NULL COMMENT '0-10',
  `comentarios` text NOT NULL COMMENT '1 publico 2 privado',
  `sector` int(11) NOT NULL DEFAULT '1',
  `salario` varchar(50) NOT NULL DEFAULT '""',
  `tipo_horario` int(11) NOT NULL DEFAULT '1' COMMENT '1 Tiempo completo 2 medio tempo',
  `puesto_id` int(11) NOT NULL DEFAULT '0',
  `acorde_carrera` int(11) NOT NULL DEFAULT '1' COMMENT '1 Acorde a su carrera , 0 no acorde.',
  PRIMARY KEY (`id`),
  KEY `pais_id` (`pais_id`,`estado_id`,`ciudad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
