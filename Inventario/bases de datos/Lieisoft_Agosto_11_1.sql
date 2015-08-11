-- --------------------------------------------------------
-- Host:                         lieison.com
-- Versión del servidor:         5.5.42-MariaDB-cll-lve - MariaDB Server
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.2.0.4974
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.adjunto: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `adjunto` DISABLE KEYS */;
REPLACE INTO `adjunto` (`id_adjunto`, `adjunto`, `tipo`, `comentario`, `fecha`) VALUES
	(1, '[{"name":"front","value":"test/polo_black_frontAMARILLO.png","type":"front"},{"name":"back","value":"test/polo_black_backAMARILLOk.png","type":"back"}]', NULL, 'nada', '2015-07-06 18:50:26'),
	(2, '[{"name":"front","value":"test/polo_black_frontNEGRO.png","type":"front"},{"name":"back","value":"test/polo_black_backNEGRO.png","type":"back"}]', NULL, 'todo', '0000-00-00 00:00:00'),
	(3, '[{"name":"front","value":"test/polo_black_frontROJO.png","type":"front"},{"name":"back","value":"test/polo_black_backROJO.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(4, '[{"name":"front","value":"test/polo_black_frontMORADO.png","type":"front"},{"name":"back","value":"test/polo_black_backMORADO.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(5, '[{"name":"front","value":"test/polo_black_frontAZUL.png","type":"front"},{"name":"back","value":"test/polo_black_backAZUL.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00');
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
REPLACE INTO `articulos` (`id_articulos`, `nombre`, `descripcion`, `talla`, `status_shop`, `precio`, `fecha`) VALUES
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
REPLACE INTO `art_adicionales` (`id_adicionales`, `id_articulo`, `nombre`, `costo`) VALUES
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
REPLACE INTO `art_prod` (`id_art_prod`, `id_articulo`, `id_producto`, `cant_prod`, `total_prod`) VALUES
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
REPLACE INTO `art_variaciones` (`id_variacion`, `id_articulo`, `id_adjunto`, `id_color`, `fecha`) VALUES
	(1, 3, 1, 1, '0000-00-00'),
	(2, 3, 2, 2, '0000-00-00'),
	(3, 3, 3, 3, '0000-00-00'),
	(4, 3, 4, 4, '0000-00-00'),
	(5, 3, 5, 5, '0000-00-00');
/*!40000 ALTER TABLE `art_variaciones` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.color
CREATE TABLE IF NOT EXISTS `color` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `referencia` text,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.color: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
REPLACE INTO `color` (`id_color`, `nombre`, `referencia`) VALUES
	(1, 'amarillo', '#CCFF66'),
	(2, 'negro', '#000000'),
	(3, 'rojo', '#FF0000'),
	(4, 'morado', '#9900CC'),
	(5, 'azul', '#0033CC');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='La tabla de las compras para tshirt';

-- Volcando datos para la tabla lieison_unitee.compras: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
REPLACE INTO `compras` (`id_compras`, `id_proveedor`, `precio_total`, `ref_factura`, `PO`, `id_adjunto`, `id_user`, `date`) VALUES
	(1, 1, 20, '3345566', '01', 0, 1, '0000-00-00 00:00:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.contacto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
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


-- Volcando estructura para tabla lieison_unitee.direccion
CREATE TABLE IF NOT EXISTS `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `dir1` text NOT NULL,
  `dir2` text NOT NULL,
  `ciudad` text NOT NULL,
  `depto` text NOT NULL,
  `local` text NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.direccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.login
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `last_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.login: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
REPLACE INTO `login` (`id_login`, `user`, `password`, `status`, `date`, `last_date`) VALUES
	(1, 'admin', 'e73b1fa9efed11c3002a7f73435edeb42836c9a9fed567a9fdcfe4968ece364a3618d8daa5a572239336f0f7452561ec8ceeb241127d868b0496580028949798+k+30UUQVYsczTLU5UEnIPL8Dnqi97hgeTaQfOCGfIs=', 1, '2015-07-28 15:56:56', '2015-07-28 15:56:59'),
	(2, 'geabenitez', 'e73b1fa9efed11c3002a7f73435edeb42836c9a9fed567a9fdcfe4968ece364a3618d8daa5a572239336f0f7452561ec8ceeb241127d868b0496580028949798+k+30UUQVYsczTLU5UEnIPL8Dnqi97hgeTaQfOCGfIs=', 1, '2015-08-03 19:33:18', '2015-08-03 19:33:20'),
	(3, 'test', 'e73b1fa9efed11c3002a7f73435edeb42836c9a9fed567a9fdcfe4968ece364a3618d8daa5a572239336f0f7452561ec8ceeb241127d868b0496580028949798+k+30UUQVYsczTLU5UEnIPL8Dnqi97hgeTaQfOCGfIs=', 1, '2015-08-10 16:06:01', '2015-08-10 16:06:02');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


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
REPLACE INTO `modulos` (`id_modulo`, `nombre`, `activo`, `model`, `view`, `controller`, `date`) VALUES
	(1, 'prueba', 0, 'prueba_controller\r\n', NULL, NULL, NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.namespaces
CREATE TABLE IF NOT EXISTS `namespaces` (
  `id_namespace` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `start` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_namespace`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.namespaces: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `namespaces` DISABLE KEYS */;
REPLACE INTO `namespaces` (`id_namespace`, `name`, `start`) VALUES
	(1, '', 1),
	(2, 'Operativo', 2),
	(3, 'Administrativo', 3);
/*!40000 ALTER TABLE `namespaces` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(11) DEFAULT '0',
  `id_color` varchar(255) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `sku` varchar(255) NOT NULL,
  `margen` text,
  `precio` double DEFAULT NULL,
  `precio_est_unidad` double DEFAULT '0',
  `cantidad` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.producto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
REPLACE INTO `producto` (`id_producto`, `id_unidad`, `id_color`, `id_compra`, `nombre`, `descripcion`, `sku`, `margen`, `precio`, `precio_est_unidad`, `cantidad`, `date`) VALUES
	(3, 1, '1', 1, 'tela', 'tela gris', '0', '10', 20, 0, 10, '0000-00-00 00:00:00'),
	(4, 1, '1', 1, 'botones', 'botones negros', '0', '5', NULL, 0.1, 10, '0000-00-00 00:00:00'),
	(5, 1, '1', 1, 'hilo', 'blanco', '0', '2', 1, 0.1, NULL, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '0',
  `sub_nivel` int(11) DEFAULT '0',
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id_rol`, `nombre`, `nivel`, `sub_nivel`, `parent`) VALUES
	(1, 'administrador', 1, 0, 0),
	(2, 'tester', 2, 0, 0),
	(3, 'tester.1', 3, 2, 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.seccion: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
REPLACE INTO `seccion` (`id_seccion`, `id_namespace`, `sub_seccion`, `roles`, `name`, `icon`, `start`, `status`, `complement`) VALUES
	(1, 1, NULL, '0', 'Escritorio', 'icon-home', 1, 1, '<span class="selected"></span>'),
	(8, 3, NULL, '1', 'Usuarios', 'icon-users', 1, 1, NULL),
	(9, 2, NULL, '1', 'Proveedores', 'icon-truck', 2, 1, NULL),
	(10, 2, NULL, '1', 'Compras', 'icon-shopping-cart', 3, 1, NULL),
	(11, 2, NULL, '1', 'Articulos', 'icon-tags', 4, 1, NULL),
	(12, 2, NULL, '1', 'Inventario', 'icon-file', 5, 1, NULL),
	(13, 2, NULL, '1', 'Ventas', 'icon-flag', 1, 1, NULL),
	(14, 3, NULL, '1', 'Facturacion', 'icon-usd', 1, 1, NULL),
	(15, 3, NULL, '1', 'Clientes', 'icon-group', 2, 1, NULL);
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.sidebar
CREATE TABLE IF NOT EXISTS `sidebar` (
  `id_sidebar` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccion` int(11) DEFAULT NULL,
  `roles` text,
  `name` text,
  `model_dir` text,
  `model` text,
  `type` text,
  `status` int(11) DEFAULT NULL,
  `icon` text,
  `start` int(11) DEFAULT NULL,
  `complement` text,
  PRIMARY KEY (`id_sidebar`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.sidebar: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `sidebar` DISABLE KEYS */;
REPLACE INTO `sidebar` (`id_sidebar`, `id_seccion`, `roles`, `name`, `model_dir`, `model`, `type`, `status`, `icon`, `start`, `complement`) VALUES
	(1, 1, '0', 'Pagina Principal', '', '', 'system', 1, 'icon-dashboard', 1, NULL),
	(11, 9, '1', 'Nuevo Proveedor', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(12, 9, '1', 'Ver Proveedores', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL),
	(13, 10, '1', 'Nuevas Compras', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(14, 10, '1', 'Ver Compras', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL),
	(15, 11, '1', 'Nuevo Articulo', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(16, 11, '1', 'Ver Articulos', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL),
	(17, 12, '1', 'Crear Productos', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(18, 12, '1', 'Ver Inventario', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL),
	(19, 13, '1', 'Crear Cotizacion', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(20, 13, '1', 'Ver Cotizaciones', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL),
	(21, 8, '1,2', 'Nuevo Usuario', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(22, 8, '1,3', 'Editar Usuario', NULL, NULL, 'plugin', 1, 'icon-edit', 2, NULL),
	(23, 15, '1', 'Nuevo Cliente', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL),
	(24, 15, '1', 'Ver Clientes', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL),
	(25, 14, '1', 'XXXXXX', NULL, NULL, 'plugin', 1, 'icon-fire', 1, NULL);
/*!40000 ALTER TABLE `sidebar` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.unidad
CREATE TABLE IF NOT EXISTS `unidad` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.unidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;


-- Volcando estructura para tabla lieison_unitee.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL DEFAULT '0',
  `id_rol` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `email` text,
  `avatar` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.user: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id_user`, `id_login`, `id_rol`, `nombres`, `apellidos`, `email`, `avatar`) VALUES
	(1, 1, 1, 'Rolando Antonio', 'Arriaza Marroquin', 'admin@unitee.com', 'iAY0lcKy.jpg'),
	(2, 2, 1, 'Gerson ', 'Aguirre', 'geabenitez@lieison.com', 'VL5t1SpG.jpg'),
	(3, 3, 3, 'Dev', 'Tester', 'dev@unitee.com', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lieison_unitee.ws: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ws` DISABLE KEYS */;
REPLACE INTO `ws` (`id_ws`, `item`, `value`) VALUES
	(1, 'key', '0a23c9220ee8dd0fc81fba3e10f980f1');
/*!40000 ALTER TABLE `ws` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
