-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2015 a las 05:43:50
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `c9`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_tabla_estadistica`
--

CREATE TABLE IF NOT EXISTS `bitacora_tabla_estadistica` (
  `ID_bitacora_tabla_estadistica` int(11) NOT NULL AUTO_INCREMENT,
  `ID_grupo` int(11) NOT NULL,
  `ID_evento` int(11) NOT NULL,
  `ID_equipo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `jj` int(11) NOT NULL,
  `jg` int(11) NOT NULL DEFAULT '0',
  `jp` int(11) NOT NULL DEFAULT '0',
  `je` int(11) NOT NULL DEFAULT '0',
  `gf` int(11) NOT NULL DEFAULT '0',
  `gc` int(11) NOT NULL DEFAULT '0',
  `diff` int(11) NOT NULL DEFAULT '0',
  `pts` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_bitacora_tabla_estadistica`),
  KEY `ID_evento` (`ID_evento`),
  KEY `ID_grupo` (`ID_grupo`),
  KEY `ID_equipo` (`ID_equipo`)
) TYPE=InnoDB COMMENT='Historicos de las posiciones diarias de los grupos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confederacion`
--

CREATE TABLE IF NOT EXISTS `confederacion` (
  `ID_Confederacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `ID_continente` int(11) NOT NULL,
  PRIMARY KEY (`ID_Confederacion`),
  KEY `ID_continente` (`ID_continente`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contienente`
--

CREATE TABLE IF NOT EXISTS `contienente` (
  `ID_continente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_continente`),
  UNIQUE KEY `nombre` (`nombre`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `ID_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `foto_pais` varchar(250) NOT NULL,
  `foto_equipo` varchar(250) NOT NULL,
  `ID_continente` int(11) NOT NULL,
  `ID_Confederacion` int(11) NOT NULL,
  PRIMARY KEY (`ID_equipo`),
  KEY `ID_confederacion` (`ID_Confederacion`),
  KEY `ID_continente` (`ID_continente`)
) TYPE=InnoDB COMMENT='Datos de los equipos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipoXevento`
--

CREATE TABLE IF NOT EXISTS `equipoXevento` (
  `ID_equipoXevento` int(11) NOT NULL AUTO_INCREMENT,
  `ID_equipo` int(11) NOT NULL,
  `ID_evento` int(11) NOT NULL,
  `ID_grupo` int(11) NOT NULL,
  PRIMARY KEY (`ID_equipoXevento`),
  KEY `ID_grupo` (`ID_grupo`),
  KEY `ID_equipo` (`ID_equipo`),
  KEY `equipoXevento_ibfk_ID_evento` (`ID_evento`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadio`
--

CREATE TABLE IF NOT EXISTS `estadio` (
  `ID_estadio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_estadio`)
) TYPE=InnoDB COMMENT='Nombres de los estadios' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticaXpartido`
--

CREATE TABLE IF NOT EXISTS `estadisticaXpartido` (
  `ID_estadistica` int(11) NOT NULL AUTO_INCREMENT,
  `ID_tipo_estadistica` int(11) NOT NULL,
  `ID_integrante` int(11) NOT NULL,
  `ID_partido` int(11) NOT NULL,
  `minuto` time NOT NULL,
  PRIMARY KEY (`ID_estadistica`),
  KEY `ID_partido` (`ID_partido`),
  KEY `ID_integrante` (`ID_integrante`),
  KEY `ID_tipo_estadistica` (`ID_tipo_estadistica`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `ID_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_evento`),
  UNIQUE KEY `nombre` (`nombre`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `ID_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_grupo`),
  UNIQUE KEY `nombre` (`nombre`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante`
--

CREATE TABLE IF NOT EXISTS `integrante` (
  `ID_integrante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `num_camiseta` int(2) NOT NULL,
  `ID_nacionalidad` int(11) NOT NULL,
  `ID_equipo` int(11) NOT NULL,
  `ID_posicion` int(11) NOT NULL,
  PRIMARY KEY (`ID_integrante`),
  UNIQUE KEY `num_camiseta` (`num_camiseta`),
  KEY `ID_nacionalidad` (`ID_nacionalidad`),
  KEY `ID_equipo` (`ID_equipo`),
  KEY `ID_posicion` (`ID_posicion`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integranteXpartido`
--

CREATE TABLE IF NOT EXISTS `integranteXpartido` (
  `ID_integranteXpartido` int(11) NOT NULL AUTO_INCREMENT,
  `ID_integrante` int(11) NOT NULL,
  `ID_partido` int(11) NOT NULL,
  PRIMARY KEY (`ID_integranteXpartido`),
  KEY `ID_integrante` (`ID_integrante`),
  KEY `integranteXpartido_ibfk_ID_partido` (`ID_partido`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `ID_nacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`ID_nacionalidad`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `ID_partido` int(11) NOT NULL AUTO_INCREMENT,
  `ID_estadio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `ID_local` int(11) NOT NULL,
  `ID_visita` int(11) NOT NULL,
  `ID_evento` int(11) NOT NULL,
  PRIMARY KEY (`ID_partido`),
  KEY `ID_estadio` (`ID_estadio`),
  KEY `ID_visita` (`ID_visita`),
  KEY `ID_local` (`ID_local`),
  KEY `ID_evento` (`ID_evento`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE IF NOT EXISTS `posicion` (
  `ID_posicion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_posicion`),
  UNIQUE KEY `nombre` (`nombre`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premio`
--

CREATE TABLE IF NOT EXISTS `premio` (
  `ID_premio` int(11) NOT NULL AUTO_INCREMENT,
  `premio` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_premio`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premioXequipo`
--

CREATE TABLE IF NOT EXISTS `premioXequipo` (
  `ID_premioXequipo` int(11) NOT NULL AUTO_INCREMENT,
  `ID_premio` int(11) NOT NULL,
  `ID_equipo` int(11) NOT NULL,
  PRIMARY KEY (`ID_premioXequipo`),
  KEY `ID_equipo` (`ID_equipo`),
  KEY `ID_premio` (`ID_premio`)
) TYPE=InnoDB COMMENT='Premios ganados por los equipos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estadistica`
--

CREATE TABLE IF NOT EXISTS `tipo_estadistica` (
  `ID_tipo_estadistica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_tipo_estadistica`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora_tabla_estadistica`
--
ALTER TABLE `bitacora_tabla_estadistica`
  ADD CONSTRAINT `bitacora_tabla_estadistica_ibfk_ID_equipo` FOREIGN KEY (`ID_equipo`) REFERENCES `equipo` (`ID_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bitacora_tabla_estadistica_ibfk_ID_evento` FOREIGN KEY (`ID_evento`) REFERENCES `evento` (`ID_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bitacora_tabla_estadistica_ibfk_ID_grupo` FOREIGN KEY (`ID_grupo`) REFERENCES `grupo` (`ID_grupo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `confederacion`
--
ALTER TABLE `confederacion`
  ADD CONSTRAINT `confederacion_ibfk_ID_continente` FOREIGN KEY (`ID_continente`) REFERENCES `contienente` (`ID_continente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_ID_Confederacion` FOREIGN KEY (`ID_Confederacion`) REFERENCES `confederacion` (`ID_Confederacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_ID_continente` FOREIGN KEY (`ID_continente`) REFERENCES `contienente` (`ID_continente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipoXevento`
--
ALTER TABLE `equipoXevento`
  ADD CONSTRAINT `equipoXevento_ibfk_ID_grupo` FOREIGN KEY (`ID_grupo`) REFERENCES `grupo` (`ID_grupo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipoXevento_ibfk_ID_equipo` FOREIGN KEY (`ID_equipo`) REFERENCES `equipo` (`ID_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipoXevento_ibfk_ID_evento` FOREIGN KEY (`ID_evento`) REFERENCES `evento` (`ID_evento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadisticaXpartido`
--
ALTER TABLE `estadisticaXpartido`
  ADD CONSTRAINT `estadisticaXpartido_ibfk_ID_partido` FOREIGN KEY (`ID_partido`) REFERENCES `partido` (`ID_partido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estadisticaXpartido_ibfk_ID_integrante` FOREIGN KEY (`ID_integrante`) REFERENCES `integrante` (`ID_integrante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estadisticaXpartido_ibfk_ID_tipo_estadistica` FOREIGN KEY (`ID_tipo_estadistica`) REFERENCES `tipo_estadistica` (`ID_tipo_estadistica`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `integrante`
--
ALTER TABLE `integrante`
  ADD CONSTRAINT `integrante_ibfk_ID_posicion` FOREIGN KEY (`ID_posicion`) REFERENCES `posicion` (`ID_posicion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `integrante_ibfk_ID_equipo` FOREIGN KEY (`ID_equipo`) REFERENCES `equipo` (`ID_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `integrante_ibfk_ID_nacionalidad` FOREIGN KEY (`ID_nacionalidad`) REFERENCES `nacionalidad` (`ID_nacionalidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `integranteXpartido`
--
ALTER TABLE `integranteXpartido`
  ADD CONSTRAINT `integranteXpartido_ibfk_ID_partido` FOREIGN KEY (`ID_partido`) REFERENCES `partido` (`ID_partido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `integranteXpartido_ibfk_ID_integrante` FOREIGN KEY (`ID_integrante`) REFERENCES `integrante` (`ID_integrante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `partido_ibfk_ID_evento` FOREIGN KEY (`ID_evento`) REFERENCES `evento` (`ID_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partido_ibfk_ID_estadio` FOREIGN KEY (`ID_estadio`) REFERENCES `estadio` (`ID_estadio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partido_ibfk_ID_local` FOREIGN KEY (`ID_local`) REFERENCES `equipo` (`ID_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partido_ibfk_ID_visita` FOREIGN KEY (`ID_visita`) REFERENCES `equipo` (`ID_equipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `premioXequipo`
--
ALTER TABLE `premioXequipo`
  ADD CONSTRAINT `premioXequipo_ibfk_ID_equipo` FOREIGN KEY (`ID_equipo`) REFERENCES `equipo` (`ID_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `premioXequipo_ibfk_ID_premio` FOREIGN KEY (`ID_premio`) REFERENCES `premio` (`ID_premio`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
