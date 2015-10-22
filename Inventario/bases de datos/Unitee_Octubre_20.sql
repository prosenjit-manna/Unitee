-- --------------------------------------------------------
-- Host:                         lieison.org
-- Versión del servidor:         5.5.35-cll-lve - MySQL Community Server (GPL)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para lieison_unitee
CREATE DATABASE IF NOT EXISTS `lieison_unitee` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lieison_unitee`;


-- Volcando estructura para tabla lieison_unitee.adjunto
CREATE TABLE IF NOT EXISTS `adjunto` (
  `id_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `adjunto` text,
  `tipo` text,
  `comentario` text,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_adjunto`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.adjunto: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `adjunto` DISABLE KEYS */;
INSERT INTO `adjunto` (`id_adjunto`, `adjunto`, `tipo`, `comentario`, `fecha`) VALUES
	(1, '[{"name":"front","value":"test/polo_black_frontAMARILLO.png","type":"front"},{"name":"back","value":"test/polo_black_backAMARILLOk.png","type":"back"}]', NULL, 'nada', '2015-07-06 18:50:26'),
	(2, '[{"name":"front","value":"test/polo_black_frontNEGRO.png","type":"front"},{"name":"back","value":"test/polo_black_backNEGRO.png","type":"back"}]', NULL, 'todo', '0000-00-00 00:00:00'),
	(3, '[{"name":"front","value":"test/polo_black_frontROJO.png","type":"front"},{"name":"back","value":"test/polo_black_backROJO.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(4, '[{"name":"front","value":"test/polo_black_frontMORADO.png","type":"front"},{"name":"back","value":"test/polo_black_backMORADO.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(5, '[{"name":"front","value":"test/polo_black_frontAZUL.png","type":"front"},{"name":"back","value":"test/polo_black_backAZUL.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(23, '["{\\"name\\":[\\"LogoLieison1000px-01.png\\"],\\"document\\":\\"8ee9e6d1ab270758bc99a75ad6198fdc\\",\\"directory\\":\\"0ViDo8Nt \\"}","{\\"name\\":[\\"Capitulo2_PMA_2015.pdf\\"],\\"document\\":\\"3b50979ebcd47139a790d33bfb9d86e1\\",\\"directory\\":\\"0ViDo8Nt \\"}","{\\"name\\":[\\"componente1.docx\\"],\\"document\\":\\"d8e947cd8cf5eaf155641ae1ee828861\\",\\"directory\\":\\"0ViDo8Nt \\"}"]', 'compras', 'Cod:P71OlMFG', '2015-09-17 15:09:29'),
	(24, '["{\\"name\\":[\\"LogoLieison1000px-01.png\\"],\\"document\\":\\"3b67aee97d9dad1274b141596873702b\\",\\"directory\\":\\"q2MxrfWE \\"}"]', 'compras', 'Cod:ztrxW74c', '2015-09-18 10:09:50'),
	(38, '[]', 'cliente', 'Cod:rdC7kNGx', '2015-09-28 21:09:21'),
	(40, '["{\\"name\\":[\\"fb.jpg\\"],\\"document\\":\\"b6ca6ec17b57859a302ab2c6e180ac7a\\",\\"directory\\":\\"6ypmDRkA \\"}","{\\"name\\":[\\"componente1.docx\\"],\\"document\\":\\"9d0b4dc1ced6456228f7e4a678e97c50\\",\\"directory\\":\\"6ypmDRkA \\"}","{\\"name\\":[\\"Wallpaper-LieisonSeptiembre-01.jpg\\"],\\"document\\":\\"04a00bae4f6c5cf893cee1a48389002c\\",\\"directory\\":\\"6ypmDRkA \\"}"]', 'compras', 'Cod:cQJYtW8D', '2015-09-30 09:09:22'),
	(44, '["{\\"file\\":\\"SPOTow2R\\",\\"name\\":\\"318337.jpg\\",\\"directory\\":\\"96172058\\"}","{\\"file\\":\\"ihU2bDJs\\",\\"name\\":\\"icono-FACEBOOK-01.png\\",\\"directory\\":\\"96172058\\"}","{\\"file\\":\\"pBVrDgqQ\\",\\"name\\":\\"componente1.docx\\",\\"directory\\":\\"96172058\\"}"]', 'cliente', 'Cod:yxBWahV9', '2015-10-02 15:10:31'),
	(45, '["{\\"file\\":\\"YnMRboBD\\",\\"name\\":\\"fb.jpg\\",\\"directory\\":\\"27835106\\"}","{\\"file\\":\\"70GNtYAj\\",\\"name\\":\\"CursoBID.docx\\",\\"directory\\":\\"27835106\\"}","{\\"file\\":\\"L3ku6lwx\\",\\"name\\":\\"Instagram-01.png\\",\\"directory\\":\\"27835106\\"}"]', 'cliente', 'Cod:sXywQjTc', '2015-10-02 15:10:48'),
	(46, '["{\\"file\\":\\"t0i5HUyX\\",\\"name\\":\\"descarga.png\\",\\"directory\\":\\"96523741\\"}","{\\"file\\":\\"n5EWyHGA\\",\\"name\\":\\"10417525_10152993765388222_5619036908979102801_n.jpg\\",\\"directory\\":\\"96523741\\"}","{\\"file\\":\\"QOgIL0ql\\",\\"name\\":\\"318337.jpg\\",\\"directory\\":\\"96523741\\"}"]', 'cliente', 'Cod:dmKPsZEu', '2015-10-02 16:10:34'),
	(47, '["{\\"file\\":\\"hKQedFsG\\",\\"name\\":\\"Vigilancia Tecnologica-2015-09-20.pdf\\",\\"directory\\":\\"60342951\\"}","{\\"file\\":\\"53M6bgSn\\",\\"name\\":\\"12036874_511743155660148_3092768465204500237_n.jpg\\",\\"directory\\":\\"60342951\\"}"]', 'cliente', 'Cod:NumVErkJ', '2015-10-02 20:10:23');
/*!40000 ALTER TABLE `adjunto` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion` text,
  `talla` text,
  `status_shop` int(11) DEFAULT '0',
  `precio` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_articulos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.articulos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`id_articulos`, `nombre`, `descripcion`, `talla`, `status_shop`, `precio`, `fecha`) VALUES
	(3, 'camiseta', 'premiun tee', 's-m-l', 1, 10, '2015-07-06');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.art_adicionales
CREATE TABLE IF NOT EXISTS `art_adicionales` (
  `id_adicionales` int(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` int(11) DEFAULT '0',
  `nombre` varchar(255) DEFAULT '0',
  `costo` double DEFAULT '0',
  PRIMARY KEY (`id_adicionales`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.art_adicionales: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `art_adicionales` DISABLE KEYS */;
INSERT INTO `art_adicionales` (`id_adicionales`, `id_articulo`, `nombre`, `costo`) VALUES
	(5, 3, 'sublimado', 10),
	(6, 3, 'mariguanado', 2.5);
/*!40000 ALTER TABLE `art_adicionales` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.art_prod
CREATE TABLE IF NOT EXISTS `art_prod` (
  `id_art_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cant_prod` int(11) DEFAULT NULL,
  `total_prod` double DEFAULT NULL,
  PRIMARY KEY (`id_art_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.art_prod: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `art_prod` DISABLE KEYS */;
INSERT INTO `art_prod` (`id_art_prod`, `id_articulo`, `id_producto`, `cant_prod`, `total_prod`) VALUES
	(4, 3, 3, 10, 20),
	(5, 3, 4, 2, 1),
	(6, 3, 5, 1, 3);
/*!40000 ALTER TABLE `art_prod` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.art_variaciones
CREATE TABLE IF NOT EXISTS `art_variaciones` (
  `id_variacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` int(11) NOT NULL DEFAULT '0',
  `id_adjunto` int(11) DEFAULT '0',
  `id_color` int(11) DEFAULT '0',
  `fecha` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id_variacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.art_variaciones: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `art_variaciones` DISABLE KEYS */;
INSERT INTO `art_variaciones` (`id_variacion`, `id_articulo`, `id_adjunto`, `id_color`, `fecha`) VALUES
	(1, 3, 1, 1, '0000-00-00'),
	(2, 3, 2, 2, '0000-00-00'),
	(3, 3, 3, 3, '0000-00-00'),
	(4, 3, 4, 4, '0000-00-00'),
	(5, 3, 5, 5, '0000-00-00');
/*!40000 ALTER TABLE `art_variaciones` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_direccion` int(11) DEFAULT '0',
  `id_contacto` int(11) DEFAULT '0',
  `nombre` varchar(250) DEFAULT '0',
  `descripcion` text,
  `id_adjunto` int(11) DEFAULT '0',
  `tipo` varchar(30) DEFAULT '0',
  `nit` varchar(17) DEFAULT '0',
  `iva` varchar(9) DEFAULT '0',
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.cliente: 4 rows
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `id_direccion`, `id_contacto`, `nombre`, `descripcion`, `id_adjunto`, `tipo`, `nit`, `iva`, `fecha`) VALUES
	(7, 53, 50, 'LIEISON', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', 45, 'Persona Natural', '2223-222211-221-2', '233233-4', '2015-09-28'),
	(8, 54, 51, 'PRUEBA B', '                                                                                                                                    nada                                                                                                                        ', 46, 'Persona Natural', '', '', '2015-09-29'),
	(10, 62, 59, 'Prueba DADO', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', 44, 'Persona Natural', '2233-333322-232-2', '122232-2', '2015-10-02'),
	(9, 61, 58, 'Prueba C', '                                                                                                                                                                        ', 47, 'Persona Natural', '', '', '2015-10-02');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.color
CREATE TABLE IF NOT EXISTS `color` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `referencia` text,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.color: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id_color`, `nombre`, `referencia`) VALUES
	(1, 'amarillo', '#CCFF66'),
	(2, 'negro', '#000000'),
	(3, 'rojo', '#FF0000'),
	(5, 'azul', '#0033CC'),
	(11, 'marron', '#800e0e'),
	(15, 'rosado varon', '#85f5c8'),
	(16, 'rosado ', '#76e8bb'),
	(17, 'morado', '#6763bd'),
	(18, 'blanco', '#ffffff');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL DEFAULT '0',
  `precio_total` double DEFAULT '0',
  `ref_factura` varchar(255) DEFAULT NULL,
  `PO` tinytext,
  `id_adjunto` int(11) DEFAULT '0',
  `id_user` int(11) DEFAULT '0',
  `date` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_compras`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COMMENT='La tabla de las compras para tshirt';

-- Volcando datos para la tabla lieison_unitee.compras: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id_compras`, `id_proveedor`, `precio_total`, `ref_factura`, `PO`, `id_adjunto`, `id_user`, `date`) VALUES
	(36, 34, 60, '122', '3333', 23, 1, '2015-09-17 15:09:30'),
	(37, 36, 36, '456', '123', 24, 1, '2015-09-18 10:09:50'),
	(40, 27, 8.4, '123456FACT', '3445900000', NULL, 1, '2015-09-21 19:09:50'),
	(44, 34, 1.4, 'TEST-2015', '12236TO', 40, 1, '2015-09-30 09:09:22');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `tel1` text NOT NULL,
  `tel2` text NOT NULL,
  `fax` text NOT NULL,
  `correo` text NOT NULL,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.contacto: ~42 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`id_contacto`, `tel1`, `tel2`, `fax`, `correo`, `nombre`) VALUES
	(2, '22620282', '77777777', '7777776', 'conchita@conchita.com', 'maria conchita'),
	(3, '22620282', '77777777', '7777776', 'conchita@conchita.com', 'maria conchita'),
	(9, '23231212', '78765465', '', 'hp@hp-com', 'Howard Package'),
	(13, '22223333', '78652323', '543786543', 'motrolo@motorla.com', 'Motorolo'),
	(16, '', '', '', '', ''),
	(17, '', '', '', '', ''),
	(18, '', '', '', '', ''),
	(19, '', '', '', '', ''),
	(20, '', '', '', '', ''),
	(21, 'dfdf', 'dfdf', '', '', 'dsfdf'),
	(22, '2222 2222', '7777 7777', '8888 8888', 'info@proveedor1.com', 'Gerson Aguirre'),
	(23, '22222222', '77777777', '27227722', 'blatter@fifa.com', 'Blatter'),
	(26, '21212121', '21212121', '21212121', 'test@yahoo.com', 'test'),
	(27, 'ñooñi', 'dsfdsf', 'lklñk', 'asas@asas.com', 'ooiooñoi'),
	(28, '22222222', '72727272', '22772266', 'leonel@tigo.com', 'Leonel'),
	(29, '21309025', '73980789', '444', 'esanchez@lieison.com', 'Emerson'),
	(30, '0789878', '9879870', '09809809', 'g@g.com', 'sksknasd'),
	(33, '545454', '7845454', '7845454', 'alguien@gmail.com', 'alguien'),
	(34, '787887', '787878', '4554545', 'android@google.com', 'android'),
	(36, '22225555', '7465852', '2548967', 'akguien@collermaster.com', 'Alguien'),
	(37, '22222222', '77777777', '11111111', 'nlima@lieison.com', 'Nestor Lima'),
	(38, '22222222', '22222222', '22222222', 'alguien@claro.com', 'alguien'),
	(41, '223312', '12222', '12222', 'machuca@machuca.com', 'MACHUCA'),
	(42, '223312', '12222', '12222', 'machuca@machuca.com', 'MACHUCA'),
	(43, '223312', '12222', '12222', 'machuca@machuca.com', 'MACHUCA'),
	(44, '1222667', '4556678', '5555555', 'rolignu90@gmail.com', 'Rolando '),
	(45, '22222222', '55555555', '', 'adf@sadf.com', 'Maya'),
	(46, '22332123', '2233322', '', 'rolignu90@gmail.com', 'mario'),
	(47, '112222', '11222', '', 'rolignu90@gmail.com', 'dios'),
	(48, '2232233', '3333333', '', 'geabenitez@lieison.com', 'Gerson Aguirre'),
	(49, '223333', '222222', '', 'rolignu90@gmail.com', 'Test'),
	(50, '2232233', '223332444', '23322233', 'geabenitez@lieison.com', 'Gerson Aguirre'),
	(51, '1222211', '1122222', '12222', 'rolignu90@gmail.com', 'MARIO BROS '),
	(53, '23332233', '22222221', '23332211', 'test@lieison.com', 'Rolando'),
	(54, '333222', '222222', '', 'test@lieison.com', 'prueba'),
	(55, '2233322 ', '22233 ', '', 'test@lieison.com', 'maya  '),
	(56, '23333', '2222', '', 'test@lieison.com', 'MAYO'),
	(57, '112', '122', '', 'test@lieison.com', 'aaa'),
	(58, '22333222', '2233333', '23332', 'roli@gmail.com', 'rolando'),
	(59, '12222112', '34344332', '22333322', 'rolignu90@gmail.com', 'YO'),
	(60, '1222', '22333', '22222', 'rmarroquin@lieison.com', 'A'),
	(61, '23303254', '73885512', '23654587', 'genaro_gatuso@gmail.com', 'Genaro Gatuso');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.costo_articulo
CREATE TABLE IF NOT EXISTS `costo_articulo` (
  `id_costo_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `total` double DEFAULT '0',
  `porcentaje` double DEFAULT '0',
  PRIMARY KEY (`id_costo_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.costo_articulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `costo_articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `costo_articulo` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.depto_pais
CREATE TABLE IF NOT EXISTS `depto_pais` (
  `id_depto_pais` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_depto_pais` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `iso` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_depto_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.depto_pais: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `depto_pais` DISABLE KEYS */;
INSERT INTO `depto_pais` (`id_depto_pais`, `codigo_depto_pais`, `nombre`, `iso`) VALUES
	(1, '01', 'Ahuachapán', 'SV'),
	(2, '02', 'Santa Ana', 'SV'),
	(3, '03', 'Sonsonate', 'SV'),
	(4, '04', 'Chalatenango', 'SV'),
	(5, '05', 'La Libertad', 'SV'),
	(6, '06', 'San Salvador', 'SV'),
	(7, '07', 'Cuscatlán', 'SV'),
	(8, '08', 'La Paz', 'SV'),
	(9, '09', 'Cabañas', 'SV'),
	(10, '10', 'San Vicente', 'SV'),
	(11, '11', 'Usulután', 'SV'),
	(12, '12', 'San Miguel', 'SV'),
	(13, '13', 'Morazán', 'SV'),
	(14, '14', 'La Unión', 'SV');
/*!40000 ALTER TABLE `depto_pais` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.direccion
CREATE TABLE IF NOT EXISTS `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `dir1` text NOT NULL,
  `local` text,
  `dir2` text,
  `pais` text,
  `depto` text,
  `ciudad` text,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.direccion: ~42 rows (aproximadamente)
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` (`id_direccion`, `dir1`, `local`, `dir2`, `pais`, `depto`, `ciudad`) VALUES
	(4, 'conchita 45 ave nue', NULL, 'conchas mas conchas', 'SV', '02', '02'),
	(5, 'conchita 45 ave nue', NULL, 'conchas mas conchas', 'SV', '02', '02'),
	(12, 'San Francisco', '', 'Valley', 'AF', '08', '10'),
	(16, 'Dallas', 'No tengo', 'No tengo', 'SV', '11', '08'),
	(19, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(20, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(21, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(22, '', '', '', NULL, NULL, NULL),
	(23, '', '', '', 'AF', NULL, NULL),
	(24, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(25, 'Colonia Cuscatlan', '2b', 'Pasaje Morado', 'SV', '06', '14'),
	(26, 'Suiza', '5c', 'Alemania', 'SV', 'Elige un Departamento', '10'),
	(29, 'test', 'test', '', 'SV', '13', '18'),
	(30, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(31, '', '', '', 'SV', 'Elige un Departamento', NULL),
	(32, 'condomino aventura', '2b', 'calle cuscatlan', 'SV', '06', '09'),
	(33, '', '23', 'lhjljh', 'AF', 'Elige un Departamento', NULL),
	(36, 'San Salvador - San Martin', '5454', 'San Martin', 'SV', '10', '09'),
	(37, 'San Martin', '554', 'San Martin', 'SV', '05', '14'),
	(39, 'SS', 'a22', 'San Martin', 'SV', '14', '01'),
	(40, 'Ilopango', '', '', 'AF', 'Elige un Departamento', NULL),
	(41, 'SS', '6565', 'LA', 'SV', '09', '03'),
	(44, 'por metro ', 'AVENTURA', 'alla cabal ', 'SV', '05', '17'),
	(45, 'por metro ', 'AVENTURA', 'alla cabal ', 'SV', '02', '01'),
	(46, 'por metro ', 'AVENTURA', 'alla cabal ', 'SV', '03', '05'),
	(47, '344 por metro', 'casa', '', 'SV', '02', '09'),
	(48, 'sd2qsd', '', '', 'SV', 'Elige un Departamento', NULL),
	(49, '78 ave norte calle mano de leon', '', '', 'SV', '01', '02'),
	(50, 'eeeess', '', '', 'SV', '12', '16'),
	(51, 'paseo general escalon', 'Edificio ventura', '', 'SV', '04', '11'),
	(52, 'rolando', 'rolando', '', 'SV', '04', '13'),
	(53, 'paseo general escalon', '', '', 'SV', '13', '22'),
	(54, 'abc', '', 'aaa', 'SV', '06', '02'),
	(56, 'por mi casa', 'rolando', 'si cabal ahi', 'SV', '06', '02'),
	(57, 'alla por mi casa', 'no ', '', 'SV', '10', '08'),
	(58, '22333', 'local', '', 'SV', '12', '12'),
	(59, 'ERRR', 'MAYA', '', 'SV', '11', '13'),
	(60, 'aaaaaaaaaaa', '', '', 'SV', '12', '13'),
	(61, '74 ave norte', '', 'por mi casa', 'SV', '03', '02'),
	(62, '75 ave norte', 'rolando por ahi', 'por mi casa', 'SV', '13', '15'),
	(63, '333', '', '', 'SV', '02', '05'),
	(64, 'San Salvador, AV Jerusalen', 'a4', 'Casa 45 A Sur ', 'SV', '06', '02');
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.historial_compra
CREATE TABLE IF NOT EXISTS `historial_compra` (
  `id_historial_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) DEFAULT '0',
  `id_producto` int(11) DEFAULT '0',
  `cant` int(11) DEFAULT '0',
  `price` double DEFAULT '0',
  PRIMARY KEY (`id_historial_compra`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.historial_compra: 14 rows
/*!40000 ALTER TABLE `historial_compra` DISABLE KEYS */;
INSERT INTO `historial_compra` (`id_historial_compra`, `id_compra`, `id_producto`, `cant`, `price`) VALUES
	(29, 36, 20, 12, 12),
	(28, 36, 24, 12, 24),
	(27, 36, 25, 24, 24),
	(30, 37, 17, 12, 12),
	(31, 37, 24, 12, 12),
	(32, 37, 21, 12, 12),
	(45, 44, 25, 12, 1.4),
	(35, 40, 22, 12, 1.2),
	(36, 40, 17, 12, 1.2),
	(37, 40, 24, 12, 1.2),
	(38, 40, 21, 12, 1.2),
	(39, 40, 20, 12, 1.2),
	(40, 40, 26, 12, 1.2),
	(41, 40, 25, 12, 1.2);
/*!40000 ALTER TABLE `historial_compra` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.login
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `password_state` int(11) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `last_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.login: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id_login`, `user`, `password`, `status`, `password_state`, `date`, `last_date`) VALUES
	(1, 'admin', '9cf5164205312e8b6be39ec47f9f1d8af556fdc950d01b5d4ca845e190d06f85f2f76bebcc30145a0401462d3f537f6a0793eaaf6805c0c3d188f5c883367332J8eczdg0jNOFwX9/epIz0yMp8lNPLsx6kjezpBrvcN0=', 1, 1, '2015-07-28 15:56:56', '2015-10-20 09:10:54'),
	(2, 'geabenitez', '7fe73bb21265da4d14f700c2aec1cb3a0f6ed54013592b9b4af88da69295702b6ec181a55caf445a5d0294f0aad96344320ce60fed0d55b0f1ae69defad781f9lXMaQgOLbJwQ/KtLN0kkcIwt47w5d/dadAA3nTGOyPA=', 1, 1, '2015-08-03 19:33:18', '2015-10-15 09:10:33'),
	(9, 'nestor', 'e73b1fa9efed11c3002a7f73435edeb42836c9a9fed567a9fdcfe4968ece364a3618d8daa5a572239336f0f7452561ec8ceeb241127d868b0496580028949798+k+30UUQVYsczTLU5UEnIPL8Dnqi97hgeTaQfOCGfIs=', 1, 0, '2015-08-13 22:08:30', '2015-10-20 13:10:59'),
	(12, 'jnolasco', '48ff629d4ce7c1588d2e7db88048cf0bdab9c633f1027d72df90d73219c42bfdde811749f0aed5f2b5e40887a5516b5fb7891647c12fe4855492bc8385624056+LVf9QDPgZ0WHfUXcNJDAi1kt7oKFWL+xD/Pr50rrEc=', 1, 1, '2015-08-24 11:08:18', '2015-08-27 14:08:26');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.metadata
CREATE TABLE IF NOT EXISTS `metadata` (
  `id_metadata` int(11) NOT NULL AUTO_INCREMENT,
  `key` text,
  `value` text,
  PRIMARY KEY (`id_metadata`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.metadata: 5 rows
/*!40000 ALTER TABLE `metadata` DISABLE KEYS */;
INSERT INTO `metadata` (`id_metadata`, `key`, `value`) VALUES
	(1, 'logo', 'logo.png'),
	(3, 'email', 'rmarroquin@lieison.com'),
	(4, 'plugin_key', '0a23c9220ee8dd0fc81fba3e10f980f1'),
	(5, 'sidebar_logo', 'images/dashboard/logo.png'),
	(6, 'sidebar_name', '<h4 style="color:white;">Cargando Menú</h4>');
/*!40000 ALTER TABLE `metadata` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.modulos
CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `activo` int(11) DEFAULT '0',
  `model` text,
  `view` text,
  `controller` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.modulos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` (`id_modulo`, `nombre`, `activo`, `model`, `view`, `controller`, `date`) VALUES
	(1, 'prueba', 0, 'prueba_controller\r\n', NULL, NULL, NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.municipio_depto
CREATE TABLE IF NOT EXISTS `municipio_depto` (
  `id_municipio_depto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_depto_pais` char(2) DEFAULT NULL,
  `codigo_municipio_depto` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_municipio_depto`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.municipio_depto: ~262 rows (aproximadamente)
/*!40000 ALTER TABLE `municipio_depto` DISABLE KEYS */;
INSERT INTO `municipio_depto` (`id_municipio_depto`, `codigo_depto_pais`, `codigo_municipio_depto`, `nombre`) VALUES
	(1, '01', '01', 'Ahuachapán'),
	(2, '01', '02', 'Apaneca'),
	(3, '01', '03', 'Atiquizaya'),
	(4, '01', '04', 'Concepción de Ataco'),
	(5, '01', '05', 'El Refugio'),
	(6, '01', '06', 'Guaymango'),
	(7, '01', '07', 'Jujutla'),
	(8, '01', '08', 'San Francisco Menéndez '),
	(9, '01', '09', 'San Lorenzo'),
	(10, '01', '10', 'San Pedro Puxtla'),
	(11, '01', '11', 'Tacuba'),
	(12, '01', '12', 'Turín'),
	(13, '03', '01', 'Acajutla'),
	(14, '03', '02', 'Armenia'),
	(15, '03', '03', 'Caluco'),
	(16, '03', '04', 'Cuisnahuat'),
	(17, '03', '06', 'Izalco'),
	(18, '03', '07', 'Juayúa'),
	(19, '03', '08', 'Nahuizalco'),
	(20, '03', '09', 'Nahulingo'),
	(21, '03', '10', 'Salcoatitán'),
	(22, '03', '11', 'San Antonio del Monte'),
	(23, '03', '12', 'San Julián'),
	(24, '03', '13', 'Santa Catarina Masahuat'),
	(25, '03', '05', 'Santa Isabel Ishuatán'),
	(26, '03', '14', 'Santo Domingo de Guzmán'),
	(27, '03', '15', 'Sonsonate'),
	(28, '03', '16', 'Sonzacate'),
	(29, '09', '01', 'Cinquera'),
	(30, '09', '09', 'Dolores / Villa Dolores'),
	(31, '09', '02', 'Guacotecti'),
	(32, '09', '03', 'Ilobasco'),
	(33, '09', '04', 'Jutiapa'),
	(34, '09', '05', 'San Isidro'),
	(35, '09', '06', 'Sensuntepeque'),
	(36, '09', '07', 'Tejutepeque'),
	(37, '09', '08', 'Victoria'),
	(38, '04', '01', 'Agua Caliente'),
	(39, '04', '02', 'Arcatao'),
	(40, '04', '03', 'Azacualpa'),
	(41, '04', '07', 'Chalatenango'),
	(42, '04', '04', 'Citalá'),
	(43, '04', '05', 'Comalapa'),
	(44, '04', '06', 'Concepción Quezaltepeque'),
	(45, '04', '08', 'Dulce Nombre de María'),
	(46, '04', '09', 'El Carrizal'),
	(47, '04', '10', 'El Paraíso'),
	(48, '04', '11', 'La Laguna'),
	(49, '04', '12', 'La Palma'),
	(50, '04', '13', 'La Reina'),
	(51, '04', '14', 'Las Vueltas'),
	(52, '04', '15', 'Nombre de Jesús'),
	(53, '04', '16', 'Nueva Concepción'),
	(54, '04', '17', 'Nueva Trinidad'),
	(55, '04', '18', 'Ojos de Agua'),
	(56, '04', '19', 'Potonico'),
	(57, '04', '20', 'San Antonio de la Cruz'),
	(58, '04', '21', 'San Antonio Los Ranchos'),
	(59, '04', '22', 'San Fernando'),
	(60, '04', '23', 'San Francisco Lempa'),
	(61, '04', '24', 'San Francisco Morazán'),
	(62, '04', '25', 'San Ignacio'),
	(63, '04', '26', 'San Isidro Labrador'),
	(64, '04', '27', 'San José Cancasque / Cancasque'),
	(65, '04', '28', 'San José Las Flores / Las Flores'),
	(66, '04', '29', 'San Luis del Carmen'),
	(67, '04', '30', 'San Miguel de Mercedes'),
	(68, '04', '31', 'San Rafael'),
	(69, '04', '32', 'Santa Rita'),
	(70, '04', '33', 'Tejutla'),
	(71, '07', '01', 'Candelaria'),
	(72, '07', '02', 'Cojutepeque'),
	(73, '07', '03', 'El Carmen'),
	(74, '07', '04', 'El Rosario'),
	(75, '07', '05', 'Monte San Juan'),
	(76, '07', '06', 'Oratorio de Concepción'),
	(77, '07', '07', 'San Bartolomé Perulapía'),
	(78, '07', '08', 'San Cristóbal'),
	(79, '07', '09', 'San José Guayabal'),
	(80, '07', '10', 'San Pedro Perulapán'),
	(81, '07', '11', 'San Rafael Cedros'),
	(82, '07', '12', 'San Ramón'),
	(83, '07', '13', 'Santa Cruz Analquito'),
	(84, '07', '14', 'Santa Cruz Michapa'),
	(85, '07', '15', 'Suchitoto'),
	(86, '07', '16', 'Tenancingo'),
	(87, '13', '01', 'Arambala'),
	(88, '13', '02', 'Cacaopera'),
	(89, '13', '04', 'Chilanga'),
	(90, '13', '03', 'Corinto'),
	(91, '13', '05', 'Delicias de Concepción'),
	(92, '13', '06', 'El Divisadero'),
	(93, '13', '07', 'El Rosario'),
	(94, '13', '08', 'Gualococti'),
	(95, '13', '09', 'Guatajiagua'),
	(96, '13', '10', 'Joateca'),
	(97, '13', '11', 'Jocoaitique'),
	(98, '13', '12', 'Jocoro'),
	(99, '13', '13', 'Lolotiquillo'),
	(100, '13', '14', 'Meanguera'),
	(101, '13', '15', 'Osicala'),
	(102, '13', '16', 'Perquín'),
	(103, '13', '17', 'San Carlos'),
	(104, '13', '18', 'San Fernando'),
	(105, '13', '19', 'San Francisco Gotera'),
	(106, '13', '20', 'San Isidro'),
	(107, '13', '21', 'San Simón'),
	(108, '13', '22', 'Sensembra'),
	(109, '13', '23', 'Sociedad'),
	(110, '13', '24', 'Torola'),
	(111, '13', '25', 'Yamabal'),
	(112, '13', '26', 'Yoloaiquín'),
	(113, '05', '01', 'Antiguo Cuscatlán'),
	(114, '05', '05', 'Chiltiupán'),
	(115, '05', '02', 'Ciudad Arce'),
	(116, '05', '03', 'Colón'),
	(117, '05', '04', 'Comasagua'),
	(118, '05', '06', 'Huizúcar'),
	(119, '05', '07', 'Jayaque'),
	(120, '05', '08', 'Jicalapa'),
	(121, '05', '09', 'La Libertad'),
	(122, '05', '11', 'Santa Tecla'),
	(123, '05', '10', 'Nuevo Cuscatlán'),
	(124, '05', '15', 'San Juan Opico'),
	(125, '05', '12', 'Quezaltepeque'),
	(126, '05', '13', 'Sacacoyo'),
	(127, '05', '14', 'San José Villanueva'),
	(128, '05', '16', 'San Matías'),
	(129, '05', '17', 'San Pablo Tacachico'),
	(130, '05', '19', 'Talnique'),
	(131, '05', '18', 'Tamanique'),
	(132, '05', '20', 'Teotepeque'),
	(133, '05', '21', 'Tepecoyo'),
	(134, '05', '22', 'Zaragoza'),
	(135, '08', '01', 'Cuyultitán'),
	(136, '08', '02', 'El Rosario / Rosario de La Paz'),
	(137, '08', '03', 'Jerusalén'),
	(138, '08', '04', 'Mercedes La Ceiba'),
	(139, '08', '05', 'Olocuilta'),
	(140, '08', '06', 'Paraíso de Osorio'),
	(141, '08', '07', 'San Antonio Masahuat'),
	(142, '08', '08', 'San Emigdio'),
	(143, '08', '09', 'San Francisco Chinameca'),
	(144, '08', '10', 'San Juan Nonualco'),
	(145, '08', '11', 'San Juan Talpa'),
	(146, '08', '12', 'San Juan Tepezontes'),
	(147, '08', '22', 'San Luis La Herradura'),
	(148, '08', '13', 'San Luis Talpa'),
	(149, '08', '14', 'San Miguel Tepezontes'),
	(150, '08', '15', 'San Pedro Masahuat'),
	(151, '08', '16', 'San Pedro Nonualco'),
	(152, '08', '17', 'San Rafael Obrajuelo'),
	(153, '08', '18', 'Santa María Ostuma'),
	(154, '08', '19', 'Santiago Nonualco'),
	(155, '08', '20', 'Tapalhuaca'),
	(156, '08', '21', 'Zacatecoluca'),
	(157, '14', '01', 'Anamorós'),
	(158, '14', '02', 'Bolívar'),
	(159, '14', '03', 'Concepción de Oriente'),
	(160, '14', '04', 'Conchagua'),
	(161, '14', '05', 'El Carmen'),
	(162, '14', '06', 'El Sauce'),
	(163, '14', '07', 'Intipucá'),
	(164, '14', '08', 'La Unión'),
	(165, '14', '09', 'Lilisque'),
	(166, '14', '10', 'Meanguera del Golfo'),
	(167, '14', '11', 'Nueva Esparta'),
	(168, '14', '12', 'Pasaquina'),
	(169, '14', '13', 'Polorós'),
	(170, '14', '14', 'San Alejo'),
	(171, '14', '15', 'San José'),
	(172, '14', '16', 'Santa Rosa de Lima'),
	(173, '14', '17', 'Yayantique'),
	(174, '14', '18', 'Yucuaiquín'),
	(175, '12', '01', 'Carolina'),
	(176, '12', '04', 'Chapeltique'),
	(177, '12', '05', 'Chinameca'),
	(178, '12', '06', 'Chirilagua'),
	(179, '12', '02', 'Ciudad Barrios'),
	(180, '12', '03', 'Comacarán'),
	(181, '12', '07', 'El Tránsito'),
	(182, '12', '08', 'Lolotique'),
	(183, '12', '09', 'Moncagua'),
	(184, '12', '10', 'Nueva Guadalupe'),
	(185, '12', '11', 'Nuevo Edén de San Juan'),
	(186, '12', '12', 'Quelepa'),
	(187, '12', '13', 'San Antonio del Mosco'),
	(188, '12', '14', 'San Gerardo'),
	(189, '12', '15', 'San Jorge'),
	(190, '12', '16', 'San Luis de la Reina'),
	(191, '12', '17', 'San Miguel'),
	(192, '12', '18', 'San Rafael Oriente'),
	(193, '12', '19', 'Sesori'),
	(194, '12', '20', 'Uluazapa'),
	(195, '06', '01', 'Aguilares'),
	(196, '06', '02', 'Apopa'),
	(197, '06', '03', 'Ayutuxtepeque'),
	(198, '06', '19', 'Delgado'),
	(199, '06', '04', 'Cuscatancingo'),
	(200, '06', '05', 'El Paisnal'),
	(201, '06', '06', 'Guazapa'),
	(202, '06', '07', 'Ilopango'),
	(203, '06', '08', 'Mejicanos'),
	(204, '06', '09', 'Nejapa'),
	(205, '06', '10', 'Panchimalco'),
	(206, '06', '11', 'Rosario de Mora'),
	(207, '06', '12', 'San Marcos'),
	(208, '06', '13', 'San Martín'),
	(209, '06', '14', 'San Salvador'),
	(210, '06', '15', 'Santiago Texacuangos'),
	(211, '06', '16', 'Santo Tomás'),
	(212, '06', '17', 'Soyapango'),
	(213, '06', '18', 'Tonacatepeque'),
	(214, '10', '01', 'Apastepeque'),
	(215, '10', '02', 'Guadalupe'),
	(216, '10', '03', 'San Cayetano Istepeque'),
	(217, '10', '06', 'San Esteban Catarina'),
	(218, '10', '07', 'San Ildefonso'),
	(219, '10', '08', 'San Lorenzo'),
	(220, '10', '09', 'San Sebastián'),
	(221, '10', '10', 'San Vicente'),
	(222, '10', '04', 'Santa Clara'),
	(223, '10', '05', 'Santo Domingo'),
	(224, '10', '11', 'Tecoluca'),
	(225, '10', '12', 'Tepetitán'),
	(226, '10', '13', 'Verapaz'),
	(227, '02', '01', 'Candelaria de la Frontera'),
	(228, '02', '03', 'Chalchuapa'),
	(229, '02', '02', 'Coatepeque'),
	(230, '02', '04', 'El Congo'),
	(231, '02', '05', 'El Porvenir'),
	(232, '02', '06', 'Masahuat'),
	(233, '02', '07', 'Metapán'),
	(234, '02', '08', 'San Antonio Pajonal'),
	(235, '02', '09', 'San Sebastián Salitrillo'),
	(236, '02', '10', 'Santa Ana'),
	(237, '02', '11', 'Santa Rosa Guachipilín'),
	(238, '02', '12', 'Santiago de la Frontera'),
	(239, '02', '13', 'Texistepeque'),
	(240, '11', '01', 'Alegría'),
	(241, '11', '02', 'Berlín'),
	(242, '11', '03', 'California'),
	(243, '11', '04', 'Concepción Batres'),
	(244, '11', '05', 'El Triunfo'),
	(245, '11', '06', 'Ereguayquín'),
	(246, '11', '07', 'Estanzuelas'),
	(247, '11', '08', 'Jiquilisco'),
	(248, '11', '09', 'Jucuapa'),
	(249, '11', '10', 'Jucuarán'),
	(250, '11', '11', 'Mercedes Umaña'),
	(251, '11', '12', 'Nueva Granada'),
	(252, '11', '13', 'Ozatlán'),
	(253, '11', '14', 'Puerto El Triunfo'),
	(254, '11', '15', 'San Agustín'),
	(255, '11', '16', 'San Buenaventura'),
	(256, '11', '17', 'San Dionisio'),
	(257, '11', '19', 'San Francisco Javier'),
	(258, '11', '18', 'Santa Elena'),
	(259, '11', '20', 'Santa María'),
	(260, '11', '21', 'Santiago de María'),
	(261, '11', '22', 'Tecapán'),
	(262, '11', '23', 'Usulután');
/*!40000 ALTER TABLE `municipio_depto` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.namespaces
CREATE TABLE IF NOT EXISTS `namespaces` (
  `id_namespace` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `start` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_namespace`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.namespaces: 3 rows
/*!40000 ALTER TABLE `namespaces` DISABLE KEYS */;
INSERT INTO `namespaces` (`id_namespace`, `name`, `start`) VALUES
	(1, 'Generales', 1),
	(2, 'Operativo', 2),
	(3, 'Administrativo', 3);
/*!40000 ALTER TABLE `namespaces` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `id_object` int(11) NOT NULL DEFAULT '0',
  `table_object` text NOT NULL,
  `id_roles` text,
  `id_user` text,
  `alert` text,
  `description` text NOT NULL,
  `last_date` datetime NOT NULL,
  `redirect` text NOT NULL,
  `status` int(11) DEFAULT '1',
  `read` int(11) DEFAULT '0',
  `icon` text,
  PRIMARY KEY (`id_notification`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.notification: 2 rows
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id_notification`, `id_object`, `table_object`, `id_roles`, `id_user`, `alert`, `description`, `last_date`, `redirect`, `status`, `read`, `icon`) VALUES
	(40, 22, 'producto', '1', NULL, 'label-warning', 'Producto Tela Seda Terminado  , [Color: negro][Cantidad en inventario : 14]', '2015-09-17 10:09:42', 'compra=new_compra?i=22&n=Tela Seda&c=negro', 0, 0, 'icon-file'),
	(41, 26, 'producto', '1', NULL, 'label-warning', 'Producto tela de algodon Terminado  , [Color: negro][Cantidad en inventario : 12]', '2015-09-17 10:09:44', 'compra=new_compra?i=26&n=tela de algodon&c=negro', 1, 1, 'icon-file');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `id_paises` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_paises`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.paises: ~240 rows (aproximadamente)
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` (`id_paises`, `iso`, `nombre`) VALUES
	(1, 'AF', 'Afganistán'),
	(2, 'AX', 'Islas Gland'),
	(3, 'AL', 'Albania'),
	(4, 'DE', 'Alemania'),
	(5, 'AD', 'Andorra'),
	(6, 'AO', 'Angola'),
	(7, 'AI', 'Anguilla'),
	(8, 'AQ', 'Antártida'),
	(9, 'AG', 'Antigua y Barbuda'),
	(10, 'AN', 'Antillas Holandesas'),
	(11, 'SA', 'Arabia Saudí'),
	(12, 'DZ', 'Argelia'),
	(13, 'AR', 'Argentina'),
	(14, 'AM', 'Armenia'),
	(15, 'AW', 'Aruba'),
	(16, 'AU', 'Australia'),
	(17, 'AT', 'Austria'),
	(18, 'AZ', 'Azerbaiyán'),
	(19, 'BS', 'Bahamas'),
	(20, 'BH', 'Bahréin'),
	(21, 'BD', 'Bangladesh'),
	(22, 'BB', 'Barbados'),
	(23, 'BY', 'Bielorrusia'),
	(24, 'BE', 'Bélgica'),
	(25, 'BZ', 'Belice'),
	(26, 'BJ', 'Benin'),
	(27, 'BM', 'Bermudas'),
	(28, 'BT', 'Bhután'),
	(29, 'BO', 'Bolivia'),
	(30, 'BA', 'Bosnia y Herzegovina'),
	(31, 'BW', 'Botsuana'),
	(32, 'BV', 'Isla Bouvet'),
	(33, 'BR', 'Brasil'),
	(34, 'BN', 'Brunéi'),
	(35, 'BG', 'Bulgaria'),
	(36, 'BF', 'Burkina Faso'),
	(37, 'BI', 'Burundi'),
	(38, 'CV', 'Cabo Verde'),
	(39, 'KY', 'Islas Caimán'),
	(40, 'KH', 'Camboya'),
	(41, 'CM', 'Camerún'),
	(42, 'CA', 'Canadá'),
	(43, 'CF', 'República Centroafricana'),
	(44, 'TD', 'Chad'),
	(45, 'CZ', 'República Checa'),
	(46, 'CL', 'Chile'),
	(47, 'CN', 'China'),
	(48, 'CY', 'Chipre'),
	(49, 'CX', 'Isla de Navidad'),
	(50, 'VA', 'Ciudad del Vaticano'),
	(51, 'CC', 'Islas Cocos'),
	(52, 'CO', 'Colombia'),
	(53, 'KM', 'Comoras'),
	(54, 'CD', 'República Democrática del Congo'),
	(55, 'CG', 'Congo'),
	(56, 'CK', 'Islas Cook'),
	(57, 'KP', 'Corea del Norte'),
	(58, 'KR', 'Corea del Sur'),
	(59, 'CI', 'Costa de Marfil'),
	(60, 'CR', 'Costa Rica'),
	(61, 'HR', 'Croacia'),
	(62, 'CU', 'Cuba'),
	(63, 'DK', 'Dinamarca'),
	(64, 'DM', 'Dominica'),
	(65, 'DO', 'República Dominicana'),
	(66, 'EC', 'Ecuador'),
	(67, 'EG', 'Egipto'),
	(68, 'SV', 'El Salvador'),
	(69, 'AE', 'Emiratos Árabes Unidos'),
	(70, 'ER', 'Eritrea'),
	(71, 'SK', 'Eslovaquia'),
	(72, 'SI', 'Eslovenia'),
	(73, 'ES', 'España'),
	(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
	(75, 'US', 'Estados Unidos'),
	(76, 'EE', 'Estonia'),
	(77, 'ET', 'Etiopía'),
	(78, 'FO', 'Islas Feroe'),
	(79, 'PH', 'Filipinas'),
	(80, 'FI', 'Finlandia'),
	(81, 'FJ', 'Fiyi'),
	(82, 'FR', 'Francia'),
	(83, 'GA', 'Gabón'),
	(84, 'GM', 'Gambia'),
	(85, 'GE', 'Georgia'),
	(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
	(87, 'GH', 'Ghana'),
	(88, 'GI', 'Gibraltar'),
	(89, 'GD', 'Granada'),
	(90, 'GR', 'Grecia'),
	(91, 'GL', 'Groenlandia'),
	(92, 'GP', 'Guadalupe'),
	(93, 'GU', 'Guam'),
	(94, 'GT', 'Guatemala'),
	(95, 'GF', 'Guayana Francesa'),
	(96, 'GN', 'Guinea'),
	(97, 'GQ', 'Guinea Ecuatorial'),
	(98, 'GW', 'Guinea-Bissau'),
	(99, 'GY', 'Guyana'),
	(100, 'HT', 'Haití'),
	(101, 'HM', 'Islas Heard y McDonald'),
	(102, 'HN', 'Honduras'),
	(103, 'HK', 'Hong Kong'),
	(104, 'HU', 'Hungría'),
	(105, 'IN', 'India'),
	(106, 'ID', 'Indonesia'),
	(107, 'IR', 'Irán'),
	(108, 'IQ', 'Iraq'),
	(109, 'IE', 'Irlanda'),
	(110, 'IS', 'Islandia'),
	(111, 'IL', 'Israel'),
	(112, 'IT', 'Italia'),
	(113, 'JM', 'Jamaica'),
	(114, 'JP', 'Japón'),
	(115, 'JO', 'Jordania'),
	(116, 'KZ', 'Kazajstán'),
	(117, 'KE', 'Kenia'),
	(118, 'KG', 'Kirguistán'),
	(119, 'KI', 'Kiribati'),
	(120, 'KW', 'Kuwait'),
	(121, 'LA', 'Laos'),
	(122, 'LS', 'Lesotho'),
	(123, 'LV', 'Letonia'),
	(124, 'LB', 'Líbano'),
	(125, 'LR', 'Liberia'),
	(126, 'LY', 'Libia'),
	(127, 'LI', 'Liechtenstein'),
	(128, 'LT', 'Lituania'),
	(129, 'LU', 'Luxemburgo'),
	(130, 'MO', 'Macao'),
	(131, 'MK', 'ARY Macedonia'),
	(132, 'MG', 'Madagascar'),
	(133, 'MY', 'Malasia'),
	(134, 'MW', 'Malawi'),
	(135, 'MV', 'Maldivas'),
	(136, 'ML', 'Malí'),
	(137, 'MT', 'Malta'),
	(138, 'FK', 'Islas Malvinas'),
	(139, 'MP', 'Islas Marianas del Norte'),
	(140, 'MA', 'Marruecos'),
	(141, 'MH', 'Islas Marshall'),
	(142, 'MQ', 'Martinica'),
	(143, 'MU', 'Mauricio'),
	(144, 'MR', 'Mauritania'),
	(145, 'YT', 'Mayotte'),
	(146, 'MX', 'México'),
	(147, 'FM', 'Micronesia'),
	(148, 'MD', 'Moldavia'),
	(149, 'MC', 'Mónaco'),
	(150, 'MN', 'Mongolia'),
	(151, 'MS', 'Montserrat'),
	(152, 'MZ', 'Mozambique'),
	(153, 'MM', 'Myanmar'),
	(154, 'NA', 'Namibia'),
	(155, 'NR', 'Nauru'),
	(156, 'NP', 'Nepal'),
	(157, 'NI', 'Nicaragua'),
	(158, 'NE', 'Níger'),
	(159, 'NG', 'Nigeria'),
	(160, 'NU', 'Niue'),
	(161, 'NF', 'Isla Norfolk'),
	(162, 'NO', 'Noruega'),
	(163, 'NC', 'Nueva Caledonia'),
	(164, 'NZ', 'Nueva Zelanda'),
	(165, 'OM', 'Omán'),
	(166, 'NL', 'Países Bajos'),
	(167, 'PK', 'Pakistán'),
	(168, 'PW', 'Palau'),
	(169, 'PS', 'Palestina'),
	(170, 'PA', 'Panamá'),
	(171, 'PG', 'Papúa Nueva Guinea'),
	(172, 'PY', 'Paraguay'),
	(173, 'PE', 'Perú'),
	(174, 'PN', 'Islas Pitcairn'),
	(175, 'PF', 'Polinesia Francesa'),
	(176, 'PL', 'Polonia'),
	(177, 'PT', 'Portugal'),
	(178, 'PR', 'Puerto Rico'),
	(179, 'QA', 'Qatar'),
	(180, 'GB', 'Reino Unido'),
	(181, 'RE', 'Reunión'),
	(182, 'RW', 'Ruanda'),
	(183, 'RO', 'Rumania'),
	(184, 'RU', 'Rusia'),
	(185, 'EH', 'Sahara Occidental'),
	(186, 'SB', 'Islas Salomón'),
	(187, 'WS', 'Samoa'),
	(188, 'AS', 'Samoa Americana'),
	(189, 'KN', 'San Cristóbal y Nevis'),
	(190, 'SM', 'San Marino'),
	(191, 'PM', 'San Pedro y Miquelón'),
	(192, 'VC', 'San Vicente y las Granadinas'),
	(193, 'SH', 'Santa Helena'),
	(194, 'LC', 'Santa Lucía'),
	(195, 'ST', 'Santo Tomé y Príncipe'),
	(196, 'SN', 'Senegal'),
	(197, 'CS', 'Serbia y Montenegro'),
	(198, 'SC', 'Seychelles'),
	(199, 'SL', 'Sierra Leona'),
	(200, 'SG', 'Singapur'),
	(201, 'SY', 'Siria'),
	(202, 'SO', 'Somalia'),
	(203, 'LK', 'Sri Lanka'),
	(204, 'SZ', 'Suazilandia'),
	(205, 'ZA', 'Sudáfrica'),
	(206, 'SD', 'Sudán'),
	(207, 'SE', 'Suecia'),
	(208, 'CH', 'Suiza'),
	(209, 'SR', 'Surinam'),
	(210, 'SJ', 'Svalbard y Jan Mayen'),
	(211, 'TH', 'Tailandia'),
	(212, 'TW', 'Taiwán'),
	(213, 'TZ', 'Tanzania'),
	(214, 'TJ', 'Tayikistán'),
	(215, 'IO', 'Territorio Británico del Océano Índico'),
	(216, 'TF', 'Territorios Australes Franceses'),
	(217, 'TL', 'Timor Oriental'),
	(218, 'TG', 'Togo'),
	(219, 'TK', 'Tokelau'),
	(220, 'TO', 'Tonga'),
	(221, 'TT', 'Trinidad y Tobago'),
	(222, 'TN', 'Túnez'),
	(223, 'TC', 'Islas Turcas y Caicos'),
	(224, 'TM', 'Turkmenistán'),
	(225, 'TR', 'Turquía'),
	(226, 'TV', 'Tuvalu'),
	(227, 'UA', 'Ucrania'),
	(228, 'UG', 'Uganda'),
	(229, 'UY', 'Uruguay'),
	(230, 'UZ', 'Uzbekistán'),
	(231, 'VU', 'Vanuatu'),
	(232, 'VE', 'Venezuela'),
	(233, 'VN', 'Vietnam'),
	(234, 'VG', 'Islas Vírgenes Británicas'),
	(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
	(236, 'WF', 'Wallis y Futuna'),
	(237, 'YE', 'Yemen'),
	(238, 'DJ', 'Yibuti'),
	(239, 'ZM', 'Zambia'),
	(240, 'ZW', 'Zimbabue');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(11) DEFAULT '0',
  `fabricado` int(11) DEFAULT '0',
  `id_color` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `sku` varchar(255) NOT NULL,
  `margen` text,
  `precio` double DEFAULT '0',
  `precio_est_unidad` double DEFAULT '0',
  `cantidad` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.producto: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id_producto`, `id_unidad`, `fabricado`, `id_color`, `nombre`, `descripcion`, `sku`, `margen`, `precio`, `precio_est_unidad`, `cantidad`, `date`, `status`) VALUES
	(17, 1, 0, 3, 'Tela Seda', '        SEDA DE COLOR ROJO ', 'tel-17-20150826', '25', 1.2, 1.5, 924, '2015-08-26 04:08:05', 1),
	(22, 2, 0, 2, 'Tela Seda', 'SEDA DE COLOR', 'tel-22-20150827', '10', 40, 672, 226, '2015-08-27 21:08:47', 1),
	(24, 2, 0, 2, 'cubierta de algodon', 'Descripcion', 'El -24-20150827', '2', 1.2, 0, 294, '2015-08-27 17:08:35', 1),
	(25, 1, 0, 11, 'tela de algodon', 'tela', 'tel-25-20150829', '50', 1.4, 1, 1000, '2015-08-29 11:08:04', 1),
	(26, 1, 0, 2, 'tela de algodon', 'SEDA DE COLOR X+Y', 'TEL-26-20150908', '900', 120, 200, 224, '2015-09-08 00:09:51', 1),
	(27, 1, 0, 2, 'Camisa blanca', 'S', 'kkkalalal', '50', 1.5, 0.6, 100, '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` text,
  `nombre` text,
  `id_direccion` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `descripcion` text,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.proveedor: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id_proveedor`, `codigo`, `nombre`, `id_direccion`, `id_contacto`, `descripcion`, `fecha`) VALUES
	(7, 'PROV168329881', 'HP', 12, 9, 'HP computadoras laptops tablets', '2015-08-20 18:08:47'),
	(11, 'PROV1883', 'Motorola', 16, 13, '                                Venta y Reparacion de telefonos ', '2015-08-20 22:08:10'),
	(14, 'PROV354', '', 19, 16, '                                            ', '2015-08-25 17:08:49'),
	(15, 'PROV1702', '', 20, 17, '                                            ', '2015-08-25 17:08:44'),
	(16, 'PROV1187', '', 21, 18, '                                            ', '2015-08-25 17:08:36'),
	(17, 'PROV852', '', 22, 19, '                                            ', '2015-08-25 17:08:12'),
	(18, 'PROV198', '', 23, 20, '                                            ', '2015-08-25 17:08:35'),
	(19, 'PROV375fsd', 'fsdfds', 24, 21, '                                            ', '2015-08-25 18:08:28'),
	(20, 'PROV947Pro', 'Proveedor 1', 25, 22, 'Proveedor de calidad                                            ', '2015-08-26 09:08:53'),
	(21, 'PROV387FIF', 'FIFA', 26, 23, 'FIFA Futbol', '2015-08-26 18:08:08'),
	(24, 'PROV1046tes', 'test', 29, 26, '                                   test    ', '2015-08-27 17:08:41'),
	(25, 'PROV957sdf', 'sdfdsf', 30, 27, '                                        ', '2015-08-27 23:08:19'),
	(26, 'PROV1071Tig', 'Tigo', 31, 28, '                                        ', '2015-08-27 23:08:44'),
	(27, 'PROV886Lie', 'Lieison', 32, 29, 'Empresa de publicidad', '2015-08-29 11:08:01'),
	(28, 'PROV586Pru', 'Prueba', 33, 30, '                                        ', '2015-08-31 07:08:43'),
	(31, 'PROV1077Twi', 'Twitter', 36, 33, 'redes sociales', '2015-08-31 22:08:34'),
	(32, 'PROV1731And', 'Android', 37, 34, 'Telefonos Android', '2015-08-31 23:08:34'),
	(34, 'PROV1315Col', 'Coller Master', 39, 36, '                                                Venta de Coller para Pc\'s Laptops etc etc                                                        \r\n                                                                                                    \r\n                                                                                                    \r\n                                            ', '2015-09-07 17:09:25'),
	(35, 'PROV656Pro', 'Proveedor X', 40, 37, '                                        ', '2015-09-09 14:09:27'),
	(36, 'PROV1522Cla', 'Claro', 41, 38, 'Venta de telefonos en el salvador', '2015-09-09 23:09:17'),
	(38, 'PROV586May', 'Maya', 48, 45, '', '2015-09-28 12:09:34'),
	(40, 'PROV1276Pro', 'Proveedor prueba arvixe', 57, 54, 'hola baby', '2015-10-01 13:10:21'),
	(41, 'PROV1653A', 'A', 63, 60, '', '2015-10-02 20:10:06'),
	(42, 'PROV1001La ', 'La Constancia', 64, 61, 'Venta de cerveza helada ', '2015-10-09 18:10:48');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '0',
  `sub_nivel` text,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.roles: 3 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id_rol`, `nombre`, `nivel`, `sub_nivel`, `parent`) VALUES
	(1, 'administrador', 1, '0', 0),
	(4, 'operativo', 2, '0', 0),
	(5, 'administrativo', 3, '0', 0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.seccion
CREATE TABLE IF NOT EXISTS `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_namespace` int(11) DEFAULT NULL,
  `sub_seccion` int(11) DEFAULT NULL,
  `roles` text,
  `name` text,
  `icon` text,
  `start` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `complement` text,
  PRIMARY KEY (`id_seccion`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.seccion: 10 rows
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` (`id_seccion`, `id_namespace`, `sub_seccion`, `roles`, `name`, `icon`, `start`, `status`, `complement`) VALUES
	(1, 1, NULL, '0', 'Escritorio', 'icon-home', 1, 1, '<span class="selected"></span>'),
	(8, 3, NULL, '1', 'Usuarios', 'icon-users', 1, 1, NULL),
	(9, 2, NULL, '1', 'Proveedores', 'icon-truck', 2, 1, NULL),
	(10, 2, NULL, '1', 'Compras', 'icon-shopping-cart', 3, 1, NULL),
	(11, 2, NULL, '1', 'Articulos', 'icon-tags', 4, 1, NULL),
	(12, 2, NULL, '1,2', 'Inventario', 'icon-file', 5, 1, NULL),
	(13, 2, NULL, '1', 'Ventas', 'icon-flag', 1, 1, NULL),
	(14, 3, NULL, '1', 'Facturacion', 'icon-usd', 1, 1, NULL),
	(15, 3, NULL, '1', 'Clientes', 'icon-group', 2, 1, NULL),
	(20, 3, NULL, '1', 'Modulos', 'icon-globe', 3, 0, NULL);
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.sidebar
CREATE TABLE IF NOT EXISTS `sidebar` (
  `id_sidebar` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccion` int(11) DEFAULT NULL,
  `roles` text,
  `name` text,
  `model_dir` text,
  `model` text,
  `routes` text,
  `type` text,
  `status` int(11) DEFAULT NULL,
  `icon` text,
  `start` int(11) DEFAULT NULL,
  `complement` text,
  `operations` text,
  PRIMARY KEY (`id_sidebar`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.sidebar: 18 rows
/*!40000 ALTER TABLE `sidebar` DISABLE KEYS */;
INSERT INTO `sidebar` (`id_sidebar`, `id_seccion`, `roles`, `name`, `model_dir`, `model`, `routes`, `type`, `status`, `icon`, `start`, `complement`, `operations`) VALUES
	(1, 1, '0', 'Pagina Principal', '', '', 'main', 'system', 1, 'icon-dashboard', 1, NULL, NULL),
	(11, 9, '1', 'Nuevo Proveedor', 'proveedor', 'new_proveedor', NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(12, 9, '1', 'Ver Proveedores', 'proveedor', 'view_proveedor', NULL, 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(13, 10, '1', 'Nuevas Compras', 'compra', 'new_compra', 'nueva_compra', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(14, 10, '1', 'Ver Compras', 'compra', 'view_compra', 'compras', 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(15, 11, '1', 'Nuevo Articulo', 'articulos', 'new_articulo', NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(16, 11, '1', 'Ver Articulos', '', '', '', 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(17, 12, '1', 'Crear Productos', 'productos', 'new_producto', NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(18, 12, '1,2', 'Ver Inventario', 'productos', 'view_producto', NULL, 'plugin', 1, 'icon-eye-open', 2, NULL, '{"edit":"1,2" , "delete" : "1,2"  }'),
	(19, 13, '1', 'Crear Cotizacion', NULL, NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(20, 13, '1', 'Ver Cotizaciones', NULL, NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(21, 8, '1', 'Nuevo Usuario', 'user', 'user_new', 'nuevo_usuario', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(22, 8, '1', 'Editar Usuario', 'user', 'user_edit', 'editar_usuario', 'plugin', 1, 'icon-edit', 2, NULL, NULL),
	(23, 15, '1', 'Nuevo Cliente', 'clientes', 'new_cliente', 'nuevo_cliente', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(24, 15, '1', 'Ver Clientes', 'clientes', 'view_cliente', 'clientes', 'plugin', 1, 'icon-eye-open', 2, NULL, '{ "edit" : "1" , "delete": "1" }'),
	(25, 14, '1', 'XXXXXX', NULL, NULL, NULL, 'plugin', 1, 'icon-fire', 1, NULL, NULL),
	(29, 20, '1', 'Ver Modulos', 'system', 'plugin_system', NULL, 'system', 1, 'icon-eye-open', 1, NULL, NULL),
	(30, 12, '1', 'Configuracion', 'productos', 'conf_producto', NULL, 'plugin', 1, 'icon-gear', 3, NULL, NULL);
/*!40000 ALTER TABLE `sidebar` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.tallas
CREATE TABLE IF NOT EXISTS `tallas` (
  `id_tallas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  PRIMARY KEY (`id_tallas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tabla de tallas ';

-- Volcando datos para la tabla lieison_unitee.tallas: 0 rows
/*!40000 ALTER TABLE `tallas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tallas` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.unidad
CREATE TABLE IF NOT EXISTS `unidad` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.unidad: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` (`id_unidad`, `nombre`) VALUES
	(1, 'Yardas '),
	(2, 'Pulgadas'),
	(3, 'Metros'),
	(6, 'Unidad');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL DEFAULT '0',
  `id_rol` int(11) DEFAULT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `email` text,
  `avatar` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.user: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_login`, `id_rol`, `nombres`, `apellidos`, `email`, `avatar`) VALUES
	(1, 1, 1, 'Rolando Antonio', 'Arriaza Marroquin', 'rmarroquin@lieison.com', 'UzvprCgD.jpg'),
	(2, 2, 1, 'Gerson Ezequiel', 'Aguirre Benitez', 'geabenitez@lieison.com', 'GliXLqwV.png'),
	(4, 9, 1, 'nestor', 'ulises', 'nulises@lieison.com', 'tAyaZRoN.png'),
	(7, 12, 1, 'Jonathan ', 'Nolasco', 'jonatan.nf79@yahoo.com', 'LRV9DsGC.JPG');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_direccion` int(11) DEFAULT '0',
  `id_contacto` int(11) DEFAULT '0',
  `total_pago` double DEFAULT '0',
  `anticipo` double DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `referencia_factura` text,
  `fecha_entrega` datetime DEFAULT '0000-00-00 00:00:00',
  `total_articulo` decimal(10,0) DEFAULT '0',
  `id_adjunto` int(11) DEFAULT '0',
  PRIMARY KEY (`id_ventas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.ventas_articulos
CREATE TABLE IF NOT EXISTS `ventas_articulos` (
  `id_venta_articulos` int(11) NOT NULL AUTO_INCREMENT,
  `id_ventas` int(11) NOT NULL DEFAULT '0',
  `id_articulo` int(11) NOT NULL DEFAULT '0',
  `cantidad_articulo` int(11) NOT NULL DEFAULT '0',
  `id_color` int(11) NOT NULL DEFAULT '0',
  `id_costo_articulo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_venta_articulos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.ventas_articulos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas_articulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_articulos` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.ws
CREATE TABLE IF NOT EXISTS `ws` (
  `id_ws` int(11) NOT NULL AUTO_INCREMENT,
  `item` text,
  `value` text,
  PRIMARY KEY (`id_ws`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.ws: 1 rows
/*!40000 ALTER TABLE `ws` DISABLE KEYS */;
INSERT INTO `ws` (`id_ws`, `item`, `value`) VALUES
	(1, 'key', '0a23c9220ee8dd0fc81fba3e10f980f1');
/*!40000 ALTER TABLE `ws` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
