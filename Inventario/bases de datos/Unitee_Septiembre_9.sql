-- --------------------------------------------------------
-- Host:                         jauzz.net
-- Versión del servidor:         5.5.35-cll-lve - MySQL Community Server (GPL)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Volcando datos para la tabla lieison_unitee.adjunto: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `adjunto` DISABLE KEYS */;
INSERT INTO `adjunto` (`id_adjunto`, `adjunto`, `tipo`, `comentario`, `fecha`) VALUES
	(1, '[{"name":"front","value":"test/polo_black_frontAMARILLO.png","type":"front"},{"name":"back","value":"test/polo_black_backAMARILLOk.png","type":"back"}]', NULL, 'nada', '2015-07-06 18:50:26'),
	(2, '[{"name":"front","value":"test/polo_black_frontNEGRO.png","type":"front"},{"name":"back","value":"test/polo_black_backNEGRO.png","type":"back"}]', NULL, 'todo', '0000-00-00 00:00:00'),
	(3, '[{"name":"front","value":"test/polo_black_frontROJO.png","type":"front"},{"name":"back","value":"test/polo_black_backROJO.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(4, '[{"name":"front","value":"test/polo_black_frontMORADO.png","type":"front"},{"name":"back","value":"test/polo_black_backMORADO.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00'),
	(5, '[{"name":"front","value":"test/polo_black_frontAZUL.png","type":"front"},{"name":"back","value":"test/polo_black_backAZUL.png","type":"back"}]', NULL, NULL, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `adjunto` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.articulos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`id_articulos`, `nombre`, `descripcion`, `talla`, `status_shop`, `precio`, `fecha`) VALUES
	(3, 'camiseta', 'premiun tee', 's-m-l', 1, 10, '2015-07-06');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.art_adicionales: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `art_adicionales` DISABLE KEYS */;
INSERT INTO `art_adicionales` (`id_adicionales`, `id_articulo`, `nombre`, `costo`) VALUES
	(5, 3, 'sublimado', 10),
	(6, 3, 'mariguanado', 2.5);
/*!40000 ALTER TABLE `art_adicionales` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.art_prod: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `art_prod` DISABLE KEYS */;
INSERT INTO `art_prod` (`id_art_prod`, `id_articulo`, `id_producto`, `cant_prod`, `total_prod`) VALUES
	(4, 3, 3, 10, 20),
	(5, 3, 4, 2, 1),
	(6, 3, 5, 1, 3);
/*!40000 ALTER TABLE `art_prod` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.art_variaciones: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `art_variaciones` DISABLE KEYS */;
INSERT INTO `art_variaciones` (`id_variacion`, `id_articulo`, `id_adjunto`, `id_color`, `fecha`) VALUES
	(1, 3, 1, 1, '0000-00-00'),
	(2, 3, 2, 2, '0000-00-00'),
	(3, 3, 3, 3, '0000-00-00'),
	(4, 3, 4, 4, '0000-00-00'),
	(5, 3, 5, 5, '0000-00-00');
/*!40000 ALTER TABLE `art_variaciones` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.color: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id_color`, `nombre`, `referencia`) VALUES
	(1, 'amarillo', '#CCFF66'),
	(2, 'negro', '#000000'),
	(3, 'rojo', '#FF0000'),
	(5, 'azul', '#0033CC'),
	(11, 'marron', '#800e0e'),
	(15, 'rosado varon', '#85f5c8'),
	(16, 'rosado ', '#76e8bb'),
	(17, 'morado', '#6763bd');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.compras: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id_compras`, `id_proveedor`, `precio_total`, `ref_factura`, `PO`, `id_adjunto`, `id_user`, `date`) VALUES
	(1, 1, 20, '3345566', '01', 0, 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.contacto: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`id_contacto`, `tel1`, `tel2`, `fax`, `correo`, `nombre`) VALUES
	(2, '22620282', '77777777', '7777776', 'conchita@conchita.com', 'maria conchita'),
	(3, '22620282', '77777777', '7777776', 'conchita@conchita.com', 'maria conchita'),
	(6, '2222222', '23232323', '34343434', 'microsoft@microsoft.com', 'Gates'),
	(8, '222222', '78782323', '', 'algo@samsung.com', 'M Clavel'),
	(9, '23231212', '78765465', '', 'hp@hp-com', 'Howard Package'),
	(10, '22222222', '786543', '', 'alguien@sony.com', 'Alguien'),
	(13, '22223333', '78652323', '543786543', 'motrolo@motorla.com', 'Motorolo'),
	(15, '22222666', '77777777', '7777776', 'campero@campero.com', 'camperito'),
	(16, '', '', '', '', ''),
	(17, '', '', '', '', ''),
	(18, '', '', '', '', ''),
	(19, '', '', '', '', ''),
	(20, '', '', '', '', ''),
	(21, 'dfdf', 'dfdf', '', '', 'dsfdf'),
	(22, '2222 2222', '7777 7777', '8888 8888', 'info@proveedor1.com', 'Gerson Aguirre'),
	(23, '22222222', '77777777', '27227722', 'blatter@fifa.com', 'Blatter'),
	(25, '77772222', '77227722', '22772277', 'alguien@alguna.com', 'alguien'),
	(26, '21212121', '21212121', '21212121', 'test@yahoo.com', 'test'),
	(27, 'ñooñi', 'dsfdsf', 'lklñk', 'asas@asas.com', 'ooiooñoi'),
	(28, '22222222', '72727272', '22772266', 'leonel@tigo.com', 'Leonel'),
	(29, '21309025', '73980789', '444', 'esanchez@lieison.com', 'Emerson'),
	(30, '0789878', '9879870', '09809809', 'g@g.com', 'sksknasd'),
	(31, 'sadasd', 'asdasd', 'asdasd', 'asdasd@sad.com', 'asd'),
	(32, '7878787', '7878787', '7878787', 'algo@algo.com', 'alguien'),
	(33, '545454', '7845454', '7845454', 'alguien@gmail.com', 'alguien'),
	(34, '787887', '787878', '4554545', 'android@google.com', 'android'),
	(35, '22620282', '77777777', '', 'portillo@hotmail.com', 'miguel portillo'),
	(36, '22225555', '7465852', '2548967', 'akguien@collermaster.com', 'Alguien');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.costo_articulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `costo_articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `costo_articulo` ENABLE KEYS */;

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

-- Volcando datos para la tabla lieison_unitee.direccion: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` (`id_direccion`, `dir1`, `local`, `dir2`, `pais`, `depto`, `ciudad`) VALUES
	(4, 'conchita 45 ave nue', NULL, 'conchas mas conchas', 'SV', '02', '02'),
	(5, 'conchita 45 ave nue', NULL, 'conchas mas conchas', 'SV', '02', '02'),
	(9, 'Chalate', NULL, 'No tiene', 'SV', '04', '26'),
	(11, 'San Francisco', NULL, '', 'SV', '08', '15'),
	(12, 'San Francisco', '', 'Valley', 'AF', '08', '10'),
	(13, 'Santiago Chile calle 32', '', 'No hay', 'SV', '08', '15'),
	(16, 'Dallas', 'No tengo', 'No tengo', 'SV', '11', '08'),
	(18, '74 ave sur', 'por ahi', '', 'SV', '06', '02'),
	(19, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(20, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(21, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(22, '', '', '', NULL, NULL, NULL),
	(23, '', '', '', 'AF', NULL, NULL),
	(24, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(25, 'Colonia Cuscatlan', '2b', 'Pasaje Morado', 'SV', '06', '14'),
	(26, 'Suiza', '5c', 'Alemania', 'SV', 'Elige un Departamento', '10'),
	(28, 'Calle Francisco Gavidia #4 San Salvador', '5c', 'No', 'SV', '06', '08'),
	(29, 'test', 'test', '', 'SV', '13', '18'),
	(30, '', '', '', 'AF', 'Elige un Departamento', NULL),
	(31, '', '', '', 'SV', 'Elige un Departamento', NULL),
	(32, 'condomino aventura', '2b', 'calle cuscatlan', 'SV', '06', '09'),
	(33, '', '23', 'lhjljh', 'AF', 'Elige un Departamento', NULL),
	(34, '', 'asda', '', 'AF', '03', '04'),
	(35, 'sdfsdf56', 'asd4', 'dsfsd', 'SV', '09', '03'),
	(36, 'San Salvador - San Martin', '5454', 'San Martin', 'SV', '10', '09'),
	(37, 'San Martin', '554', 'San Martin', 'SV', '05', '14'),
	(38, '75 avenida norte calle mano de leon , residencial bosques de la escalon', '', 'apartamento A-5', 'SV', '09', '09'),
	(39, 'SS', 'a22', 'San Martin', 'SV', '03', '12');
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.historial_compra: 0 rows
/*!40000 ALTER TABLE `historial_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_compra` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.login: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id_login`, `user`, `password`, `status`, `password_state`, `date`, `last_date`) VALUES
	(1, 'admin', '9cf5164205312e8b6be39ec47f9f1d8af556fdc950d01b5d4ca845e190d06f85f2f76bebcc30145a0401462d3f537f6a0793eaaf6805c0c3d188f5c883367332J8eczdg0jNOFwX9/epIz0yMp8lNPLsx6kjezpBrvcN0=', 1, 1, '2015-07-28 15:56:56', '2015-09-07 13:09:48'),
	(2, 'geabenitez', '7fe73bb21265da4d14f700c2aec1cb3a0f6ed54013592b9b4af88da69295702b6ec181a55caf445a5d0294f0aad96344320ce60fed0d55b0f1ae69defad781f9lXMaQgOLbJwQ/KtLN0kkcIwt47w5d/dadAA3nTGOyPA=', 1, 1, '2015-08-03 19:33:18', '2015-09-07 09:09:29'),
	(3, 'test', 'e73b1fa9efed11c3002a7f73435edeb42836c9a9fed567a9fdcfe4968ece364a3618d8daa5a572239336f0f7452561ec8ceeb241127d868b0496580028949798+k+30UUQVYsczTLU5UEnIPL8Dnqi97hgeTaQfOCGfIs=', 1, 0, '2015-08-10 16:06:01', '2015-08-15 10:08:43'),
	(9, 'nestor', 'e73b1fa9efed11c3002a7f73435edeb42836c9a9fed567a9fdcfe4968ece364a3618d8daa5a572239336f0f7452561ec8ceeb241127d868b0496580028949798+k+30UUQVYsczTLU5UEnIPL8Dnqi97hgeTaQfOCGfIs=', 1, 0, '2015-08-13 22:08:30', '2015-09-07 12:09:09'),
	(11, 'jaimito', '0cd31d7ab83f2e4558f8727cffd597c8bb7f7ba68d8cafd740dab317f31fdda7372781a06f3ea66ceb1a914d96f5883c53e8d4529ebc4a992daf695cb27cbef4hGnmvOBMy+nsXYXX2Qa69d9iVvhyNwc5h8rrZjFn9wo=', 1, 0, '2015-08-16 06:08:44', '2015-08-15 22:08:47'),
	(12, 'jnolasco', '48ff629d4ce7c1588d2e7db88048cf0bdab9c633f1027d72df90d73219c42bfdde811749f0aed5f2b5e40887a5516b5fb7891647c12fe4855492bc8385624056+LVf9QDPgZ0WHfUXcNJDAi1kt7oKFWL+xD/Pr50rrEc=', 1, 1, '2015-08-24 11:08:18', '2015-08-27 14:08:26'),
	(13, 'osama', '8c58dd26b7f6f9c3a306c5abe09faa6af69f6b3af08486da1a35164ff41adbf7129df96afa5b22325ef83cf47c3656dd70bf7b0ddb48d11e4d7125bce7398a26U/hLx4VKIy/ve2bmiVp5f3cAa9olirvd6T04XhaWMW4=', 1, 0, '2015-08-26 00:08:59', '2015-08-26 00:08:59'),
	(14, 'esanchez', '41fb2fe258eba78183e3d7986fead6dd019859f48d33d61c27c4d6042e31a290cd24938a7dc5387e0123612a958fd660916439b74c0461b6e1fe3ab34a693e6eOvmkeStDdacsTD91A8H+OeVcCe0UP+h5H/6kR0jDQJU=', 1, 0, '2015-08-26 09:08:33', '2015-08-26 09:08:33'),
	(15, 'conchita', '981d0fe60b9303e5df7fb318967bd39790935fb7f0db5fc0cb17859f271bdef8dced5f4459fff088234621dd5e7727fd0b7940a549d91baf454ff76bf284f3cb5X0xMIwVtjVYd9d4vy4tEkLJ4uGVTiVVDj0HYknyAMw=', 1, 1, '2015-08-29 02:08:27', '2015-08-29 22:08:17'),
	(16, 'msiliezar', 'b158ab85768fd14975b67fd05c60eb68d307b7a7e07f5f4ec299ec54397b5e2c34e83b615c4ca3d6b4fdcf4af8800ee4c02cfdc8454f2993066b6562ef5c3a6ar59ROF8h2E5YCBjZW57RmEJHTqX5XIxQBSmFbDR3wyQ=', 1, 1, '2015-08-29 11:08:05', '2015-08-29 11:08:44'),
	(17, 'claudiolindo2012', '2fb10fc53711c5152c2b7a47db3200a7c55aa0298d02675fe90d884e6a94d0ae6da63012fbdc4bbdd2fbe72fa2ce90639e4b1ad2e926d82b6018807236d0db03d8MaEmQeeQuaQ1QCrMqXrcrOOZEBTIotR0Vzoug70FE=', 1, 0, '2015-08-30 19:08:43', '2015-08-30 19:08:43'),
	(18, 'mauricio', '0e2824c1f5ec1ee42474c2e38eb1c5c4e3448b08a9843f32408d49551b7b0af07a27a1b276bbcbbe60de39d895162d081c86108e23e0a6994e9e6bfb78b5b6caUsHVJXRPyr8sWt59kQxS86B6VOej1oxsgzx+M097+Gs=', 1, 0, '2015-09-04 03:09:43', '2015-09-04 03:09:43');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.metadata: 2 rows
/*!40000 ALTER TABLE `metadata` DISABLE KEYS */;
INSERT INTO `metadata` (`id_metadata`, `key`, `value`) VALUES
	(1, 'logo', 'logo.png'),
	(3, 'email', 'rmarroquin@lieison.com');
/*!40000 ALTER TABLE `metadata` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.modulos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` (`id_modulo`, `nombre`, `activo`, `model`, `view`, `controller`, `date`) VALUES
	(1, 'prueba', 0, 'prueba_controller\r\n', NULL, NULL, NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;

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

-- Volcando datos para la tabla lieison_unitee.namespaces: 3 rows
/*!40000 ALTER TABLE `namespaces` DISABLE KEYS */;
INSERT INTO `namespaces` (`id_namespace`, `name`, `start`) VALUES
	(1, '', 1),
	(2, 'Operativo', 2),
	(3, 'Administrativo', 3);
/*!40000 ALTER TABLE `namespaces` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.notification: 2 rows
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id_notification`, `id_object`, `table_object`, `id_roles`, `id_user`, `alert`, `description`, `last_date`, `redirect`, `status`, `read`, `icon`) VALUES
	(22, 22, 'producto', '1', NULL, 'label-warning', 'Producto tela2 Terminado  (test2)[Cantidad en inventario : 2]', '2015-09-07 13:09:38', 'compra=new_compra', 1, 1, 'icon-file'),
	(23, 25, 'producto', '1', NULL, 'label-warning', 'Producto tela de algodon Terminado  (tela)[Cantidad en inventario : 0]', '2015-09-07 13:09:41', 'compra=new_compra', 1, 0, 'icon-file');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

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

-- Volcando datos para la tabla lieison_unitee.producto: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id_producto`, `id_unidad`, `id_color`, `id_historial_compra`, `nombre`, `descripcion`, `sku`, `margen`, `precio`, `precio_est_unidad`, `cantidad`, `date`, `status`) VALUES
	(17, 1, 3, 0, 'tela', '        tela de color rojo                         ', 'tel-17-20150826', '25', NULL, 1.5, 30, '2015-08-26 04:08:05', 1),
	(20, 1, 3, 0, 'producto 4', 'test', 'pro-19-20150827', '20', NULL, 20, 25, '2015-08-27 19:08:52', 1),
	(21, 1, 2, 0, 'prodcuto 5', 'test', 'pro-21-20150827', '45', NULL, 9, 56, '2015-08-27 19:08:13', 1),
	(22, 2, 2, 0, 'tela2', 'test2', 'tel-22-20150827', '892', NULL, 672, 2, '2015-08-27 21:08:47', 1),
	(24, 2, 2, 0, 'El Gran Varon', 'Descripcion', 'El -24-20150827', '2', NULL, 221, 2, '2015-08-27 17:08:35', 1),
	(25, 1, 11, 0, 'tela de algodon', 'tela', 'tel-25-20150829', '50', NULL, 1, 0, '2015-08-29 11:08:04', 1),
	(26, 1, 2, 0, 'TELA', 'ES UNA TELA ', 'TEL-26-20150908', '900', NULL, 200, 1500, '2015-09-08 00:09:51', 1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.proveedor: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id_proveedor`, `codigo`, `nombre`, `id_direccion`, `id_contacto`, `descripcion`, `fecha`) VALUES
	(4, 'PROV95023274', 'Microsoft', 9, 6, NULL, '2015-08-20 17:08:31'),
	(6, 'PROV135232726', 'Samsung', 11, 8, NULL, '2015-08-20 17:08:11'),
	(7, 'PROV168329881', 'HP', 12, 9, 'HP computadoras laptops tablets', '2015-08-20 18:08:47'),
	(8, 'PROV194820081', 'Sony ', 13, 10, '                                                                                                                    \r\n                                                        es sony que mas quieren', '2015-08-20 18:08:24'),
	(11, 'PROV1883', 'Motorola', 16, 13, '                                Venta y Reparacion de telefonos ', '2015-08-20 22:08:10'),
	(13, 'PROV1867Pol', 'Pollo campero', 18, 15, '                                el pollo mas sabroso , que paja !!!', '2015-08-21 18:08:29'),
	(14, 'PROV354', '', 19, 16, '                                            ', '2015-08-25 17:08:49'),
	(15, 'PROV1702', '', 20, 17, '                                            ', '2015-08-25 17:08:44'),
	(16, 'PROV1187', '', 21, 18, '                                            ', '2015-08-25 17:08:36'),
	(17, 'PROV852', '', 22, 19, '                                            ', '2015-08-25 17:08:12'),
	(18, 'PROV198', '', 23, 20, '                                            ', '2015-08-25 17:08:35'),
	(19, 'PROV375fsd', 'fsdfds', 24, 21, '                                            ', '2015-08-25 18:08:28'),
	(20, 'PROV947Pro', 'Proveedor 1', 25, 22, 'Proveedor de calidad                                            ', '2015-08-26 09:08:53'),
	(21, 'PROV387FIF', 'FIFA', 26, 23, 'FIFA Futbol', '2015-08-26 18:08:08'),
	(23, 'PROV285Alg', 'Alguna', 28, 25, 'Empresa dedicada a y nos provee.....', '2015-08-27 19:08:16'),
	(24, 'PROV1046tes', 'test', 29, 26, '                                   test    ', '2015-08-27 17:08:41'),
	(25, 'PROV957sdf', 'sdfdsf', 30, 27, '                                        ', '2015-08-27 23:08:19'),
	(26, 'PROV1071Tig', 'Tigo', 31, 28, '                                        ', '2015-08-27 23:08:44'),
	(27, 'PROV886Lie', 'Lieison', 32, 29, 'Empresa de publicidad', '2015-08-29 11:08:01'),
	(28, 'PROV586Pru', 'Prueba', 33, 30, '                                        ', '2015-08-31 07:08:43'),
	(29, 'PROV1352asd', 'asda', 34, 31, '                                        asdasd', '2015-08-31 09:08:02'),
	(30, 'PROV96Nue', 'Nueva', 35, 32, '                                       erwer', '2015-08-31 20:08:26'),
	(31, 'PROV1077Twi', 'Twitter', 36, 33, 'redes sociales', '2015-08-31 22:08:34'),
	(32, 'PROV1731And', 'Android', 37, 34, 'Telefonos Android', '2015-08-31 23:08:34'),
	(33, 'PROV919Por', 'Portillo S.A de C.V', 38, 35, '                                            pues aca vacilando', '2015-09-04 03:09:12'),
	(34, 'PROV1315Col', 'Coller Master', 39, 36, '                                                Venta de Coller para Pc\'s Laptops etc etc                                                        \r\n                                            ', '2015-09-07 17:09:25');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.roles: 3 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id_rol`, `nombre`, `nivel`, `sub_nivel`, `parent`) VALUES
	(1, 'administrador', 1, '0', 0),
	(4, 'operativo', 2, '0', 0),
	(5, 'administrativo', 3, '0', 0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

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
	(20, 3, NULL, '1', 'Modulos', 'icon-globe', 3, 1, NULL);
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.sidebar: 18 rows
/*!40000 ALTER TABLE `sidebar` DISABLE KEYS */;
INSERT INTO `sidebar` (`id_sidebar`, `id_seccion`, `roles`, `name`, `model_dir`, `model`, `type`, `status`, `icon`, `start`, `complement`, `operations`) VALUES
	(1, 1, '0', 'Pagina Principal', '', '', 'system', 1, 'icon-dashboard', 1, NULL, NULL),
	(11, 9, '1', 'Nuevo Proveedor', 'proveedor', 'new_proveedor', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(12, 9, '1', 'Ver Proveedores', 'proveedor', 'view_proveedor', 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(13, 10, '1', 'Nuevas Compras', 'compra', 'new_compra', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(14, 10, '1', 'Ver Compras', 'compra', 'view_compra', 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(15, 11, '1', 'Nuevo Articulo', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(16, 11, '1', 'Ver Articulos', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(17, 12, '1', 'Crear Productos', 'productos', 'new_producto', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(18, 12, '1,2', 'Ver Inventario', 'productos', 'view_producto', 'plugin', 1, 'icon-eye-open', 2, NULL, '{"edit":"1,2" , "delete" : "1,2"  }'),
	(19, 13, '1', 'Crear Cotizacion', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(20, 13, '1', 'Ver Cotizaciones', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(21, 8, '1', 'Nuevo Usuario', 'user', 'user_new', 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(22, 8, '1', 'Editar Usuario', 'user', 'user_edit', 'plugin', 1, 'icon-edit', 2, NULL, NULL),
	(23, 15, '1', 'Nuevo Cliente', NULL, NULL, 'plugin', 1, 'icon-plus', 1, NULL, NULL),
	(24, 15, '1', 'Ver Clientes', NULL, NULL, 'plugin', 1, 'icon-eye-open', 2, NULL, NULL),
	(25, 14, '1', 'XXXXXX', NULL, NULL, 'plugin', 1, 'icon-fire', 1, NULL, NULL),
	(29, 20, '1', 'Ver Modulos', 'system', 'plugin_system', 'system', 1, 'icon-eye-open', 1, NULL, NULL),
	(30, 12, '1', 'Configuracion', 'productos', 'conf_producto', 'plugin', 1, 'icon-gear', 3, NULL, NULL);
/*!40000 ALTER TABLE `sidebar` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.unidad: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` (`id_unidad`, `nombre`) VALUES
	(1, 'Yardas '),
	(2, 'Pulgadas'),
	(3, 'Metros'),
	(4, 'varas');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.user: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_login`, `id_rol`, `nombres`, `apellidos`, `email`, `avatar`) VALUES
	(1, 1, 1, 'Rolando Antonio', 'Arriaza Marroquin', 'rmarroquin@lieison.com', 'UzvprCgD.jpg'),
	(2, 2, 1, 'Gerson Ezequiel', 'Aguirre Benitez', 'geabenitez@lieison.com', 'GliXLqwV.png'),
	(3, 3, 4, 'Maria Jose', 'Conchita de concha', 'rosita@unitee.com', 'pv7jsdMH.jpg'),
	(4, 9, 1, 'nestor', 'ulises', 'nulises@lieison.com', 'tAyaZRoN.png'),
	(6, 11, 5, 'jaimito', 'contreras', 'rmarroquin@lieison.com', NULL),
	(7, 12, 1, 'Jonathan ', 'Nolasco', 'jonatan.nf79@yahoo.com', 'LRV9DsGC.JPG'),
	(8, 13, 4, 'osama', 'bin laden 2', 'rmarroquin@lieison.com', NULL),
	(9, 14, 1, 'Emerson Javier', 'Sanchez Barahona', 'esanchez@lieison.com', NULL),
	(10, 15, 4, 'maria conchita', 'perez sosa', 'rmarroquin@lieison.com', NULL),
	(11, 16, 1, 'Maya Elizabeth', 'Siliezar', 'msiliezar@lieison.com', 'zodJF1uR.png'),
	(12, 17, 5, 'claudio umberto', 'ramirez perez', 'rmarroquin@lieison.com', NULL),
	(13, 18, 1, 'mauricio', 'selaya', 'rmarroquin@lieison.com', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.ventas_articulos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas_articulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_articulos` ENABLE KEYS */;

-- Volcando datos para la tabla lieison_unitee.ws: 1 rows
/*!40000 ALTER TABLE `ws` DISABLE KEYS */;
INSERT INTO `ws` (`id_ws`, `item`, `value`) VALUES
	(1, 'key', '0a23c9220ee8dd0fc81fba3e10f980f1');
/*!40000 ALTER TABLE `ws` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
