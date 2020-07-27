-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2012 a las 01:06:26
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `osrp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertenencias`
--

CREATE TABLE IF NOT EXISTS `advertenencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `policia` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertirs`
--

CREATE TABLE IF NOT EXISTS `advertirs` (
  `kickid` int(11) NOT NULL AUTO_INCREMENT,
  `kickeado` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kicker` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kickid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `propietario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=914 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajails`
--

CREATE TABLE IF NOT EXISTS `ajails` (
  `ajailid` int(11) NOT NULL AUTO_INCREMENT,
  `ajaileado` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ajailer` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tiempo` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ajailid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE IF NOT EXISTS `antecedentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acusado` int(11) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `banid` int(11) NOT NULL AUTO_INCREMENT,
  `banneado` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `banner` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`banid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id2` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(3) NOT NULL DEFAULT '0',
  `time` int(20) NOT NULL DEFAULT '0',
  `bug` varchar(255) NOT NULL DEFAULT 'Sin bug',
  PRIMARY KEY (`id2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Key` int(11) NOT NULL,
  `Model` int(11) NOT NULL DEFAULT '0',
  `X` float NOT NULL DEFAULT '0',
  `Y` float NOT NULL DEFAULT '0',
  `Z` float NOT NULL DEFAULT '0',
  `A` float NOT NULL DEFAULT '0',
  `C1` int(11) NOT NULL DEFAULT '0',
  `C2` int(11) NOT NULL DEFAULT '0',
  `Owner` varchar(64) NOT NULL DEFAULT '',
  `Des` varchar(64) NOT NULL,
  `Val` int(11) NOT NULL DEFAULT '0',
  `Uso` int(11) NOT NULL DEFAULT '0',
  `Own` int(11) NOT NULL DEFAULT '0',
  `Lock` int(11) NOT NULL DEFAULT '0',
  `Motor` int(11) NOT NULL DEFAULT '0',
  `B` int(11) NOT NULL DEFAULT '0',
  `Gas` int(11) NOT NULL DEFAULT '100',
  `Drogas` varchar(255) NOT NULL DEFAULT '0,0,0,0,0,0,0',
  `Slots` varchar(64) NOT NULL DEFAULT '-1,-1,-1,-1,-1,-1,-1,-1',
  `Ammos` varchar(64) NOT NULL DEFAULT '-1,-1,-1,-1,-1,-1,-1,-1',
  `Comp` varchar(64) NOT NULL DEFAULT 'Nada',
  `PJ` int(11) NOT NULL DEFAULT '0',
  `eliminado` int(11) NOT NULL DEFAULT '0',
  `Horas` int(11) NOT NULL DEFAULT '0',
  `Park` int(11) NOT NULL DEFAULT '-1',
  `Danos` varchar(255) NOT NULL DEFAULT '0',
  `Radios` varchar(40) NOT NULL DEFAULT '1,100,0',
  `Vw` int(11) NOT NULL DEFAULT '0',
  `Interior` int(11) NOT NULL DEFAULT '0',
  `Seguro` int(11) NOT NULL DEFAULT '0',
  `Sirena` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=448 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casas`
--

CREATE TABLE IF NOT EXISTS `casas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EX` float NOT NULL DEFAULT '0',
  `EY` float NOT NULL DEFAULT '0',
  `EZ` float NOT NULL DEFAULT '0',
  `SX` float NOT NULL DEFAULT '0',
  `SY` float NOT NULL DEFAULT '0',
  `SZ` float NOT NULL DEFAULT '0',
  `Interior` int(11) NOT NULL DEFAULT '0',
  `Interior2` int(11) NOT NULL DEFAULT '0',
  `Vw` int(11) NOT NULL DEFAULT '0',
  `Owned` int(11) NOT NULL DEFAULT '0',
  `Owner` varchar(255) NOT NULL DEFAULT '',
  `Nivel` int(11) NOT NULL DEFAULT '0',
  `Costo` int(11) NOT NULL DEFAULT '0',
  `Locked` int(11) NOT NULL DEFAULT '1',
  `Armas` varchar(64) NOT NULL DEFAULT '-1,-1,-1,-1,-1,-1,-1,-1,-1,-1',
  `Ammos` varchar(64) NOT NULL DEFAULT '-1,-1,-1,-1,-1,-1,-1,-1,-1,-1',
  `Drogas` varchar(64) NOT NULL DEFAULT '0,0,0,0,0,0,0',
  `Dinero` int(11) NOT NULL DEFAULT '0',
  `Alquilable` int(11) NOT NULL DEFAULT '0',
  `PrecioAlq` int(11) NOT NULL DEFAULT '0',
  `Inquilinos` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(255) NOT NULL DEFAULT 'Casa',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1058 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comidas`
--

CREATE TABLE IF NOT EXISTS `comidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL DEFAULT 'Ninguno',
  `X` float NOT NULL DEFAULT '0',
  `Y` float NOT NULL DEFAULT '0',
  `Z` float NOT NULL DEFAULT '0',
  `Int` int(11) NOT NULL DEFAULT '0',
  `Vw` int(11) NOT NULL DEFAULT '0',
  `Tipo` int(11) NOT NULL DEFAULT '0',
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delincuentes`
--

CREATE TABLE IF NOT EXISTS `delincuentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT 'Ninguno',
  `raza` varchar(255) NOT NULL DEFAULT 'Ninguno',
  `edad` int(11) NOT NULL DEFAULT '0',
  `condenas` int(11) NOT NULL DEFAULT '0',
  `tiempocondenas` int(11) NOT NULL DEFAULT '0',
  `multas` int(11) NOT NULL DEFAULT '0',
  `cantidadmultas` int(11) NOT NULL DEFAULT '0',
  `situacion` int(11) NOT NULL DEFAULT '0',
  `bandas` int(11) NOT NULL DEFAULT '0',
  `pendiente` int(11) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT 'http://www.definicionabc.com/wp-content/uploads/desconocido.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE IF NOT EXISTS `denuncias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `denunciante` varchar(255) NOT NULL,
  `denunciado` varchar(255) NOT NULL,
  `fecha2` date NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `tacusado` varchar(255) NOT NULL,
  `motivo` text NOT NULL,
  `notas` text NOT NULL,
  `imagenes` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencias`
--

CREATE TABLE IF NOT EXISTS `frecuencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL DEFAULT '',
  `dueno` varchar(255) NOT NULL DEFAULT 'Nadie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE IF NOT EXISTS `hoteles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Renta` int(11) NOT NULL,
  `Pos_X` float NOT NULL,
  `Pos_Y` float NOT NULL,
  `Pos_Z` float NOT NULL,
  `SPos_X` float NOT NULL,
  `SPos_Y` float NOT NULL,
  `SPos_Z` float NOT NULL,
  `Inte` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignias`
--

CREATE TABLE IF NOT EXISTS `insignias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `policia` varchar(255) NOT NULL DEFAULT 'Ninguno',
  `medalla` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL DEFAULT '',
  `text0` text NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `max` int(11) NOT NULL DEFAULT '5',
  `job` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kicks`
--

CREATE TABLE IF NOT EXISTS `kicks` (
  `kickid` int(11) NOT NULL AUTO_INCREMENT,
  `kickeado` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kicker` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kickid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) NOT NULL DEFAULT 'vacio',
  `ip` varchar(16) NOT NULL DEFAULT 'Nada',
  `userid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21772 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

CREATE TABLE IF NOT EXISTS `negocios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL DEFAULT 'Ninguno',
  `Tipo` int(11) NOT NULL DEFAULT '0',
  `EPos_X` float NOT NULL DEFAULT '0',
  `EPos_Y` float NOT NULL DEFAULT '0',
  `EPos_Z` float NOT NULL DEFAULT '0',
  `SPos_X` float NOT NULL DEFAULT '0',
  `SPos_Y` float NOT NULL DEFAULT '0',
  `SPos_Z` float NOT NULL DEFAULT '0',
  `Productos` int(11) NOT NULL DEFAULT '150',
  `CajaFuerte` int(11) NOT NULL DEFAULT '0',
  `Locked` int(11) NOT NULL DEFAULT '0',
  `Owner` varchar(255) NOT NULL DEFAULT 'Nadie',
  `Owned` int(11) NOT NULL DEFAULT '0',
  `Interior` int(11) NOT NULL DEFAULT '0',
  `Costo` int(11) NOT NULL DEFAULT '0',
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `titulo` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oposiciones`
--

CREATE TABLE IF NOT EXISTS `oposiciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parkings`
--

CREATE TABLE IF NOT EXISTS `parkings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` int(11) NOT NULL DEFAULT '0',
  `Capacidad` int(11) NOT NULL DEFAULT '1000',
  `Total` int(11) NOT NULL DEFAULT '0',
  `X` float NOT NULL DEFAULT '0',
  `Y` float NOT NULL DEFAULT '0',
  `Z` float NOT NULL DEFAULT '0',
  `Owner` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantaciones`
--

CREATE TABLE IF NOT EXISTS `plantaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `X` float NOT NULL DEFAULT '0',
  `Y` float NOT NULL DEFAULT '0',
  `Z` float NOT NULL DEFAULT '0',
  `VW` int(11) NOT NULL DEFAULT '0',
  `interior` int(11) NOT NULL DEFAULT '0',
  `tiempo` int(11) NOT NULL DEFAULT '0',
  `plantador` varchar(255) NOT NULL DEFAULT 'Nadie',
  `estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=775 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `AdminLevel` int(11) NOT NULL DEFAULT '0',
  `Documentacion` int(11) NOT NULL DEFAULT '0',
  `Licencias` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0',
  `SeguroMedico` int(11) NOT NULL DEFAULT '0',
  `Telefono` int(11) NOT NULL DEFAULT '0',
  `Telefonos` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `Walkies` int(11) NOT NULL DEFAULT '0',
  `Frecuencia` int(11) NOT NULL DEFAULT '0',
  `MiFrecuencia` int(11) NOT NULL DEFAULT '0',
  `Habilidades` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0',
  `Respeto` int(11) NOT NULL DEFAULT '0',
  `Dinero` bigint(20) NOT NULL DEFAULT '1000',
  `Banco` int(20) NOT NULL DEFAULT '0',
  `Trabajo` int(11) NOT NULL DEFAULT '0',
  `Contrato` int(11) NOT NULL DEFAULT '0',
  `TiempoEsperaTrabajo` int(11) NOT NULL DEFAULT '0',
  `Ganancias` int(11) NOT NULL DEFAULT '0',
  `RutasCompletadas` int(11) NOT NULL DEFAULT '0',
  `Encarcelado` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `Faccion` int(11) NOT NULL DEFAULT '0',
  `Rango` int(11) NOT NULL DEFAULT '0',
  `Interior` int(11) NOT NULL DEFAULT '0',
  `VirtualWorld` int(11) NOT NULL DEFAULT '0',
  `Casa` int(11) NOT NULL DEFAULT '-1',
  `Coches` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '-1,-1,-1,-1,-1',
  `CochesPrestados` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '-1,-1,-1,-1,-1',
  `Negocio` int(11) NOT NULL DEFAULT '-1',
  `X` float NOT NULL DEFAULT '1205.93',
  `Y` float NOT NULL DEFAULT '-1742.93',
  `Z` float NOT NULL DEFAULT '13.5928',
  `Angulo` float NOT NULL DEFAULT '34.8035',
  `PosNeg` int(11) NOT NULL DEFAULT '0',
  `PosHotel` int(11) NOT NULL DEFAULT '-1',
  `Inventario` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0,0,0,0',
  `Armas` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0',
  `Ammo` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0',
  `Preparada` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0',
  `NoPreparada` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `Semillas` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `Parafernalia` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `Consumos` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0',
  `TmpConsumos` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0',
  `Productos` int(11) NOT NULL DEFAULT '0',
  `Tutorial` int(11) NOT NULL DEFAULT '0',
  `Bloqueado` int(11) NOT NULL DEFAULT '0',
  `Advertencias` int(11) NOT NULL DEFAULT '0',
  `Certificacion` int(11) NOT NULL DEFAULT '0',
  `Jugando` int(3) NOT NULL DEFAULT '0',
  `Skin` int(11) NOT NULL,
  `Sexo` int(11) NOT NULL DEFAULT '0',
  `Edad` int(11) NOT NULL DEFAULT '0',
  `Uniforme` int(11) NOT NULL DEFAULT '1',
  `EnServicio` int(11) NOT NULL DEFAULT '0',
  `Herido` int(11) NOT NULL DEFAULT '0',
  `Vida` float NOT NULL DEFAULT '100',
  `Armor` float NOT NULL DEFAULT '0',
  `Alcohol` int(11) NOT NULL DEFAULT '0',
  `Hambre` int(3) NOT NULL DEFAULT '0',
  `Email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Abstinencia` int(11) NOT NULL DEFAULT '0',
  `Payday` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0',
  `LArmas` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0',
  `Loteria` int(11) NOT NULL DEFAULT '-1',
  `Premium_Tipo` int(5) NOT NULL DEFAULT '0',
  `Premium_Timestamp` mediumint(20) NOT NULL DEFAULT '0',
  `Premium_Params` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1360 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE IF NOT EXISTS `postulaciones` (
  `postulaciones` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE IF NOT EXISTS `progreso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denuncia` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas`
--

CREATE TABLE IF NOT EXISTS `reglas` (
  `regla` varchar(255) NOT NULL DEFAULT '',
  `valor` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE IF NOT EXISTS `reportes` (
  `reportid` int(11) NOT NULL AUTO_INCREMENT,
  `reportado` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `reportador` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `razon` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fecha` varchar(45) NOT NULL,
  PRIMARY KEY (`reportid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=373 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skins`
--

CREATE TABLE IF NOT EXISTS `skins` (
  `id` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `faccion` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skins_backup`
--

CREATE TABLE IF NOT EXISTS `skins_backup` (
  `id` int(11) NOT NULL,
  `raza` int(11) NOT NULL,
  `sexo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sonidos`
--

CREATE TABLE IF NOT EXISTS `sonidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL DEFAULT '1',
  `X` float NOT NULL DEFAULT '0',
  `Y` float NOT NULL DEFAULT '0',
  `Z` float NOT NULL DEFAULT '0',
  `ratio` float NOT NULL DEFAULT '15',
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_aceptados`
--

CREATE TABLE IF NOT EXISTS `web_aceptados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `code` text NOT NULL,
  `email` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=345 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_admin`
--

CREATE TABLE IF NOT EXISTS `web_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `descrip` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_assig`
--

CREATE TABLE IF NOT EXISTS `web_assig` (
  `nombre` text NOT NULL,
  `assig` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_cert`
--

CREATE TABLE IF NOT EXISTS `web_cert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `resp1` text CHARACTER SET latin1 NOT NULL,
  `resp2` text CHARACTER SET latin1 NOT NULL,
  `resp3` text CHARACTER SET latin1 NOT NULL,
  `resp4` text CHARACTER SET latin1 NOT NULL,
  `resp5` text CHARACTER SET latin1 NOT NULL,
  `resp6` text CHARACTER SET latin1 NOT NULL,
  `resp7` text CHARACTER SET latin1 NOT NULL,
  `id8` int(11) NOT NULL,
  `id9` int(11) NOT NULL,
  `id10` int(11) NOT NULL,
  `resp8` text CHARACTER SET latin1 NOT NULL,
  `resp9` text CHARACTER SET latin1 NOT NULL,
  `resp10` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_changed_email`
--

CREATE TABLE IF NOT EXISTS `web_changed_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `antiguo` text NOT NULL,
  `nuevo` text NOT NULL,
  `player` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_email`
--

CREATE TABLE IF NOT EXISTS `web_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `code` text NOT NULL,
  `pressed` text NOT NULL,
  `verified` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=832 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_form`
--

CREATE TABLE IF NOT EXISTS `web_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quest` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_guest`
--

CREATE TABLE IF NOT EXISTS `web_guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` text NOT NULL,
  `nombre` text NOT NULL,
  `fecha` date NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_public`
--

CREATE TABLE IF NOT EXISTS `web_public` (
  `nombre` text NOT NULL,
  `guest_visible` tinyint(1) NOT NULL,
  `message` text NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_quest`
--

CREATE TABLE IF NOT EXISTS `web_quest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correcta` int(11) NOT NULL,
  `quest` text NOT NULL,
  `resp1` text NOT NULL,
  `resp2` text NOT NULL,
  `resp3` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
