-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-02-2013 a las 21:35:05
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6
-- CAMBIADO EL CHARSET a utf8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `grp`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `advertenencias`
-- 

CREATE TABLE `advertenencias` (
  `id` int(11) NOT NULL auto_increment,
  `policia` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `advertenencias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `advertirs`
-- 

CREATE TABLE `advertirs` (
  `kickid` int(11) NOT NULL auto_increment,
  `kickeado` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kicker` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`kickid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `advertirs`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `agenda`
-- 

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `propietario` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `agenda`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ajails`
-- 

CREATE TABLE `ajails` (
  `ajailid` int(11) NOT NULL auto_increment,
  `ajaileado` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ajailer` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ajailid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `ajails`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `antecedentes`
-- 

CREATE TABLE `antecedentes` (
  `id` int(11) NOT NULL auto_increment,
  `acusado` int(11) NOT NULL default '0',
  `fecha` date NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `antecedentes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `bans`
-- 

CREATE TABLE `bans` (
  `banid` int(11) NOT NULL auto_increment,
  `banneado` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`banid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `bans`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `bugs`
-- 

CREATE TABLE `bugs` (
  `id2` int(11) NOT NULL auto_increment,
  `userid` int(3) NOT NULL default '0',
  `time` int(20) NOT NULL default '0',
  `bug` varchar(255) NOT NULL default 'Sin bug',
  PRIMARY KEY  (`id2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `bugs`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cars`
-- 

CREATE TABLE `cars` (
  `id` int(11) NOT NULL auto_increment,
  `Key` int(11) NOT NULL,
  `Model` int(11) NOT NULL default '0',
  `X` float NOT NULL default '0',
  `Y` float NOT NULL default '0',
  `Z` float NOT NULL default '0',
  `A` float NOT NULL default '0',
  `C1` int(11) NOT NULL default '0',
  `C2` int(11) NOT NULL default '0',
  `Owner` varchar(64) NOT NULL default '',
  `Des` varchar(64) NOT NULL,
  `Val` int(11) NOT NULL default '0',
  `Uso` int(11) NOT NULL default '0',
  `Own` int(11) NOT NULL default '0',
  `Lock` int(11) NOT NULL default '0',
  `Motor` int(11) NOT NULL default '0',
  `B` int(11) NOT NULL default '0',
  `Gas` int(11) NOT NULL default '100',
  `Drogas` varchar(255) NOT NULL default '0,0,0,0,0,0,0',
  `Slots` varchar(64) NOT NULL default '-1,-1,-1,-1,-1,-1,-1,-1',
  `Ammos` varchar(64) NOT NULL default '-1,-1,-1,-1,-1,-1,-1,-1',
  `Comp` varchar(64) NOT NULL default 'Nada',
  `PJ` int(11) NOT NULL default '0',
  `eliminado` int(11) NOT NULL default '0',
  `Horas` int(11) NOT NULL default '0',
  `Park` int(11) NOT NULL default '-1',
  `Danos` varchar(255) NOT NULL default '0',
  `Radios` varchar(40) NOT NULL default '1,100,0',
  `Vw` int(11) NOT NULL default '0',
  `Interior` int(11) NOT NULL default '0',
  `Seguro` int(11) NOT NULL default '0',
  `Sirena` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `cars`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `casas`
-- 

CREATE TABLE `casas` (
  `id` int(11) NOT NULL auto_increment,
  `EX` float NOT NULL default '0',
  `EY` float NOT NULL default '0',
  `EZ` float NOT NULL default '0',
  `SX` float NOT NULL default '0',
  `SY` float NOT NULL default '0',
  `SZ` float NOT NULL default '0',
  `Interior` int(11) NOT NULL default '0',
  `Interior2` int(11) NOT NULL default '0',
  `Vw` int(11) NOT NULL default '0',
  `Owned` int(11) NOT NULL default '0',
  `Owner` varchar(255) NOT NULL default '',
  `Nivel` int(11) NOT NULL default '0',
  `Costo` int(11) NOT NULL default '0',
  `Locked` int(11) NOT NULL default '1',
  `Armas` varchar(64) NOT NULL default '-1,-1,-1,-1,-1,-1,-1,-1,-1,-1',
  `Ammos` varchar(64) NOT NULL default '-1,-1,-1,-1,-1,-1,-1,-1,-1,-1',
  `Drogas` varchar(64) NOT NULL default '0,0,0,0,0,0,0',
  `Dinero` int(11) NOT NULL default '0',
  `Alquilable` int(11) NOT NULL default '0',
  `PrecioAlq` int(11) NOT NULL default '0',
  `Inquilinos` int(11) NOT NULL default '0',
  `Nombre` varchar(255) NOT NULL default 'Casa',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `casas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comidas`
-- 

CREATE TABLE `comidas` (
  `id` int(11) NOT NULL auto_increment,
  `Nombre` varchar(255) NOT NULL default 'Ninguno',
  `X` float NOT NULL default '0',
  `Y` float NOT NULL default '0',
  `Z` float NOT NULL default '0',
  `Int` int(11) NOT NULL default '0',
  `Vw` int(11) NOT NULL default '0',
  `Tipo` int(11) NOT NULL default '0',
  `eliminado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `comidas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `delincuentes`
-- 

CREATE TABLE `delincuentes` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL default 'Ninguno',
  `raza` varchar(255) NOT NULL default 'Ninguno',
  `edad` int(11) NOT NULL default '0',
  `condenas` int(11) NOT NULL default '0',
  `tiempocondenas` int(11) NOT NULL default '0',
  `multas` int(11) NOT NULL default '0',
  `cantidadmultas` int(11) NOT NULL default '0',
  `situacion` int(11) NOT NULL default '0',
  `bandas` int(11) NOT NULL default '0',
  `pendiente` int(11) NOT NULL default '0',
  `img` varchar(255) NOT NULL default 'http://www.definicionabc.com/wp-content/uploads/desconocido.jpg',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `delincuentes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `denuncias`
-- 

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `denunciante` varchar(255) NOT NULL,
  `denunciado` varchar(255) NOT NULL,
  `fecha2` date NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `tacusado` varchar(255) NOT NULL,
  `motivo` text NOT NULL,
  `notas` text NOT NULL,
  `imagenes` text NOT NULL,
  `estado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `denuncias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `frecuencias`
-- 

CREATE TABLE `frecuencias` (
  `id` int(11) NOT NULL auto_increment,
  `password` varchar(255) NOT NULL default '',
  `dueno` varchar(255) NOT NULL default 'Nadie',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `frecuencias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `hoteles`
-- 

CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Renta` int(11) NOT NULL,
  `Pos_X` float NOT NULL,
  `Pos_Y` float NOT NULL,
  `Pos_Z` float NOT NULL,
  `SPos_X` float NOT NULL,
  `SPos_Y` float NOT NULL,
  `SPos_Z` float NOT NULL,
  `Inte` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `hoteles`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `insignias`
-- 

CREATE TABLE `insignias` (
  `id` int(11) NOT NULL auto_increment,
  `policia` varchar(255) NOT NULL default 'Ninguno',
  `medalla` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `insignias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `items`
-- 

CREATE TABLE `items` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(25) NOT NULL default '',
  `text0` text NOT NULL,
  `tipo` int(11) NOT NULL default '1',
  `max` int(11) NOT NULL default '5',
  `job` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `items`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `kicks`
-- 

CREATE TABLE `kicks` (
  `kickid` int(11) NOT NULL auto_increment,
  `kickeado` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kicker` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`kickid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `kicks`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `logins`
-- 

CREATE TABLE `logins` (
  `id` int(11) NOT NULL auto_increment,
  `time` varchar(255) NOT NULL default 'vacio',
  `ip` varchar(16) NOT NULL default 'Nada',
  `userid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `logins`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `negocios`
-- 

CREATE TABLE `negocios` (
  `id` int(11) NOT NULL auto_increment,
  `Nombre` varchar(255) NOT NULL default 'Ninguno',
  `Tipo` int(11) NOT NULL default '0',
  `EPos_X` float NOT NULL default '0',
  `EPos_Y` float NOT NULL default '0',
  `EPos_Z` float NOT NULL default '0',
  `SPos_X` float NOT NULL default '0',
  `SPos_Y` float NOT NULL default '0',
  `SPos_Z` float NOT NULL default '0',
  `Productos` int(11) NOT NULL default '150',
  `CajaFuerte` int(11) NOT NULL default '0',
  `Locked` int(11) NOT NULL default '0',
  `Owner` varchar(255) NOT NULL default 'Nadie',
  `Owned` int(11) NOT NULL default '0',
  `Interior` int(11) NOT NULL default '0',
  `Costo` int(11) NOT NULL default '0',
  `eliminado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `negocios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticias`
-- 

CREATE TABLE `noticias` (
  `titulo` text NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `noticias`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `oposiciones`
-- 

CREATE TABLE `oposiciones` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `oposiciones`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `parkings`
-- 

CREATE TABLE `parkings` (
  `id` int(11) NOT NULL auto_increment,
  `Tipo` int(11) NOT NULL default '0',
  `Capacidad` int(11) NOT NULL default '1000',
  `Total` int(11) NOT NULL default '0',
  `X` float NOT NULL default '0',
  `Y` float NOT NULL default '0',
  `Z` float NOT NULL default '0',
  `Owner` int(11) NOT NULL default '-1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `parkings`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `plantaciones`
-- 

CREATE TABLE `plantaciones` (
  `id` int(11) NOT NULL auto_increment,
  `tipo` int(11) NOT NULL default '0',
  `X` float NOT NULL default '0',
  `Y` float NOT NULL default '0',
  `Z` float NOT NULL default '0',
  `VW` int(11) NOT NULL default '0',
  `interior` int(11) NOT NULL default '0',
  `tiempo` int(11) NOT NULL default '0',
  `plantador` varchar(255) NOT NULL default 'Nadie',
  `estado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `plantaciones`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `players`
-- 

CREATE TABLE `players` (
  `id` int(11) NOT NULL auto_increment,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 collate utf8_unicode_ci NOT NULL,
  `AdminLevel` int(11) NOT NULL default '0',
  `Documentacion` int(11) NOT NULL default '0',
  `Licencias` varchar(10) COLLATE utf8_unicode_ci NOT NULL default '0,0,0,0',
  `SeguroMedico` int(11) NOT NULL default '0',
  `Telefono` int(11) NOT NULL default '0',
  `Telefonos` varchar(32) COLLATE utf8_unicode_ci NOT NULL default '0,0',
  `Walkies` int(11) NOT NULL default '0',
  `Frecuencia` int(11) NOT NULL default '0',
  `MiFrecuencia` int(11) NOT NULL default '0',
  `Habilidades` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0',
  `Respeto` int(11) NOT NULL default '0',
  `Dinero` bigint(20) NOT NULL default '1000',
  `Banco` int(20) NOT NULL default '0',
  `Trabajo` int(11) NOT NULL default '0',
  `Contrato` int(11) NOT NULL default '0',
  `TiempoEsperaTrabajo` int(11) NOT NULL default '0',
  `Ganancias` int(11) NOT NULL default '0',
  `RutasCompletadas` int(11) NOT NULL default '0',
  `Encarcelado` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0',
  `Faccion` int(11) NOT NULL default '0',
  `Rango` int(11) NOT NULL default '0',
  `Interior` int(11) NOT NULL default '0',
  `VirtualWorld` int(11) NOT NULL default '0',
  `Casa` int(11) NOT NULL default '-1',
  `Coches` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '-1,-1,-1,-1,-1',
  `CochesPrestados` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '-1,-1,-1,-1,-1',
  `Negocio` int(11) NOT NULL default '-1',
  `X` float NOT NULL default '1205.93',
  `Y` float NOT NULL default '-1742.93',
  `Z` float NOT NULL default '13.5928',
  `Angulo` float NOT NULL default '34.8035',
  `PosNeg` int(11) NOT NULL default '0',
  `PosHotel` int(11) NOT NULL default '-1',
  `Inventario` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0,0,0,0,0',
  `Armas` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0,0,0,0,0,0,0,0,0,0,0',
  `Ammo` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0,0,0,0,0,0,0,0,0,0,0',
  `Preparada` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0',
  `NoPreparada` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0',
  `Semillas` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0',
  `Parafernalia` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0',
  `Consumos` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0',
  `TmpConsumos` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0',
  `Productos` int(11) NOT NULL default '0',
  `Tutorial` int(11) NOT NULL default '0',
  `Bloqueado` int(11) NOT NULL default '0',
  `Advertencias` int(11) NOT NULL default '0',
  `Certificacion` int(11) NOT NULL default '0',
  `Jugando` int(3) NOT NULL default '0',
  `Skin` int(11) NOT NULL,
  `Sexo` int(11) NOT NULL default '0',
  `Edad` int(11) NOT NULL default '0',
  `Uniforme` int(11) NOT NULL default '1',
  `EnServicio` int(11) NOT NULL default '0',
  `Herido` int(11) NOT NULL default '0',
  `Vida` float NOT NULL default '100',
  `Armor` float NOT NULL default '0',
  `Alcohol` int(11) NOT NULL default '0',
  `Hambre` int(3) NOT NULL default '0',
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Abstinencia` int(11) NOT NULL default '0',
  `Payday` varchar(10) COLLATE utf8_unicode_ci NOT NULL default '0,0,0',
  `LArmas` varchar(255) COLLATE utf8_unicode_ci NOT NULL default '0,0,0',
  `Loteria` int(11) NOT NULL default '-1',
  `Premium_Tipo` int(5) NOT NULL default '0',
  `Premium_Timestamp` mediumint(20) NOT NULL default '0',
  `Premium_Params` varchar(30) COLLATE utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- 
-- Volcar la base de datos para la tabla `players`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `postulaciones`
-- 

CREATE TABLE `postulaciones` (
  `postulaciones` int(11) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `postulaciones`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `progreso`
-- 

CREATE TABLE `progreso` (
  `id` int(11) NOT NULL auto_increment,
  `denuncia` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `progreso`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `reglas`
-- 

CREATE TABLE `reglas` (
  `regla` varchar(255) NOT NULL default '',
  `valor` int(20) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `reglas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `reportes`
-- 

CREATE TABLE `reportes` (
  `reportid` int(11) NOT NULL auto_increment,
  `reportado` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reportador` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(45) NOT NULL,
  PRIMARY KEY  (`reportid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `reportes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `skins`
-- 

CREATE TABLE `skins` (
  `id` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `faccion` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `skins`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `skins_backup`
-- 

CREATE TABLE `skins_backup` (
  `id` int(11) NOT NULL,
  `raza` int(11) NOT NULL,
  `sexo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `skins_backup`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `sonidos`
-- 

CREATE TABLE `sonidos` (
  `id` int(11) NOT NULL auto_increment,
  `radio` int(11) NOT NULL default '1',
  `X` float NOT NULL default '0',
  `Y` float NOT NULL default '0',
  `Z` float NOT NULL default '0',
  `ratio` float NOT NULL default '15',
  `eliminado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `sonidos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_aceptados`
-- 

CREATE TABLE `web_aceptados` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  `code` text NOT NULL,
  `email` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `web_aceptados`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_admin`
-- 

CREATE TABLE `web_admin` (
  `id` int(11) NOT NULL auto_increment,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `descrip` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `web_admin`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_assig`
-- 

CREATE TABLE `web_assig` (
  `nombre` text NOT NULL,
  `assig` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `web_assig`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_cert`
-- 

CREATE TABLE `web_cert` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` text CHARACTER SET utf8 NOT NULL,
  `resp1` text CHARACTER SET utf8 NOT NULL,
  `resp2` text CHARACTER SET utf8 NOT NULL,
  `resp3` text CHARACTER SET utf8 NOT NULL,
  `resp4` text CHARACTER SET utf8 NOT NULL,
  `resp5` text CHARACTER SET utf8 NOT NULL,
  `resp6` text CHARACTER SET utf8 NOT NULL,
  `resp7` text CHARACTER SET utf8 NOT NULL,
  `id8` int(11) NOT NULL,
  `id9` int(11) NOT NULL,
  `id10` int(11) NOT NULL,
  `resp8` text CHARACTER SET utf8 NOT NULL,
  `resp9` text CHARACTER SET utf8 NOT NULL,
  `resp10` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

-- 
-- Volcar la base de datos para la tabla `web_cert`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_changed_email`
-- 

CREATE TABLE `web_changed_email` (
  `id` int(11) NOT NULL auto_increment,
  `code` text NOT NULL,
  `antiguo` text NOT NULL,
  `nuevo` text NOT NULL,
  `player` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `web_changed_email`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_email`
-- 

CREATE TABLE `web_email` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `code` text NOT NULL,
  `pressed` text NOT NULL,
  `verified` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `web_email`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_form`
-- 

CREATE TABLE `web_form` (
  `id` int(11) NOT NULL auto_increment,
  `quest` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `web_form`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_guest`
-- 

CREATE TABLE `web_guest` (
  `id` int(11) NOT NULL auto_increment,
  `autor` text NOT NULL,
  `nombre` text NOT NULL,
  `fecha` date NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- 
-- Volcar la base de datos para la tabla `web_guest`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `web_public`
-- 

CREATE TABLE `web_public` (
  `nombre` text NOT NULL,
  `guest_visible` tinyint(1) NOT NULL,
  `message` text NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `web_public`
-- 

--  ALTER TABLE `web_cert` CHANGE `nombre` `nombre` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL 
-- --------------------------------------------------------