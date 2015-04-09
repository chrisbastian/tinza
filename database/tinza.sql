-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-04-2015 a las 04:01:35
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tinza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `city` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Abasolo'),
(2, 'Agualeguas'),
(3, 'Los Aldamas'),
(4, 'Allende'),
(5, 'Anahuac'),
(6, 'Apodaca'),
(7, 'Aramberri'),
(8, 'Bustamante'),
(9, 'Cadereyta Jimenez'),
(10, 'Carmen'),
(11, 'Cerralvo'),
(12, 'Cienega de Flores'),
(13, 'China'),
(14, 'Dr. Arroyo'),
(15, 'Dr. Coss'),
(16, 'Dr. Gonzalez'),
(17, 'Galeana'),
(18, 'Garcia'),
(19, 'San Pedro Garza Garcia'),
(20, 'Gral. Bravo'),
(21, 'Gral. Escobedo'),
(22, 'Gral. Teran'),
(23, 'Gral. Trevi'),
(24, 'Gral. Zaragoza'),
(25, 'Gral. Zuazua'),
(26, 'Guadalupe'),
(27, 'Los Herreras'),
(28, 'Higueras'),
(29, 'Hualahuises'),
(30, 'Iturbide'),
(31, 'Juarez'),
(32, 'Lampazos de Naranjo'),
(33, 'Linares'),
(34, 'Marin'),
(35, 'Melchor Ocampo'),
(36, 'Mier y Noriega'),
(37, 'Mina'),
(38, 'Montemorelos'),
(39, 'Monterrey'),
(40, 'Paras'),
(41, 'Pesqueria'),
(42, 'Los Ramones'),
(43, 'Rayones'),
(44, 'Sabinas Hidalgo'),
(45, 'Salinas Victoria'),
(46, 'San Nicolas de los Garza'),
(47, 'Hidalgo'),
(48, 'Santa Catarina'),
(49, 'Santiago'),
(50, 'Vallecillo'),
(51, 'Villaldama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE IF NOT EXISTS `correos` (
`id_correo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `de` varchar(1000) NOT NULL,
  `bcc` varchar(1000) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id_correo`, `id_user`, `de`, `bcc`, `titulo`, `descripcion`) VALUES
(33, 16, 'Administrador', 'BCC DEL MENSAJE', 'TITULO', 'DESCRIPCION'),
(34, 26, 'Administrador', 'BCC DEL MENSAJE', 'TITULO', 'DESCRIPCION'),
(35, 16, 'asd', 'ASD', 'ASD', 'ASD'),
(36, 26, 'asd', 'ASD', 'ASD', 'ASD'),
(37, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(38, 26, 'ASD', 'ASD', 'ASD', 'ASD'),
(39, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(40, 26, 'ASD', 'ASD', 'ASD', 'ASD'),
(41, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(42, 26, 'ASD', 'ASD', 'ASD', 'ASD'),
(43, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(44, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(45, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(46, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(47, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(48, 16, 'ASD', 'ASD', 'ASD', 'ASD'),
(49, 26, 'ASD', 'ASD', 'ASD', 'ASD'),
(50, 16, 'asd', 'ASD', 'ASD', 'ASD'),
(51, 26, 'asd', 'ASD', 'ASD', 'ASD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_properties`
--

CREATE TABLE IF NOT EXISTS `extra_properties` (
`id_extra` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `id_property` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extra_properties`
--

INSERT INTO `extra_properties` (`id_extra`, `title`, `description`, `id_property`) VALUES
(138, 'jej', 'jeje', 50),
(139, 'jej', 'jeje', 50),
(140, '123', '123', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identification`
--

CREATE TABLE IF NOT EXISTS `identification` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_propertie` int(10) unsigned NOT NULL,
  `id_use_ground` int(11) NOT NULL,
  `soil_date_expedition` date NOT NULL,
  `soil_date_expiration` date NOT NULL,
  `document_identification` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `catastral` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `identification`
--

INSERT INTO `identification` (`id`, `created_at`, `updated_at`, `id_propertie`, `id_use_ground`, `soil_date_expedition`, `soil_date_expiration`, `document_identification`, `catastral`) VALUES
(234, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50, 1, '1991-12-12', '1991-12-12', '', '123-123-126'),
(235, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50, 2, '1991-12-13', '1991-12-12', '', '123-123-126');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `id_propertie` int(10) unsigned NOT NULL,
  `type_license` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lic_date_expedition` date NOT NULL,
  `lic_date_expiration` date NOT NULL,
  `id_document` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `licenses`
--

INSERT INTO `licenses` (`id_propertie`, `type_license`, `lic_date_expedition`, `lic_date_expiration`, `id_document`, `created_at`, `updated_at`, `id`) VALUES
(50, '2', '1991-12-12', '1991-12-12', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 181);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `license_type`
--

CREATE TABLE IF NOT EXISTS `license_type` (
  `id` int(11) NOT NULL,
  `license_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `license_type`
--

INSERT INTO `license_type` (`id`, `license_type`) VALUES
(1, 'Uso de suelo'),
(2, 'Licencia de construcción'),
(3, 'Licencia de uso de edificación'),
(4, 'Certificado de libertad de gravámen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
`id` int(10) unsigned NOT NULL,
  `id_profile` int(11) NOT NULL,
  `catastral` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_building` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `number_ext` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `number_int` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `neighborhood` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_state` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cos` decimal(8,2) NOT NULL,
  `cus` decimal(8,2) NOT NULL,
  `cas` decimal(8,2) NOT NULL,
  `slope` decimal(8,2) NOT NULL,
  `surface` int(11) NOT NULL,
  `remetimiento_forntal` decimal(8,2) NOT NULL,
  `remetimiento_posterior` decimal(8,2) NOT NULL,
  `remetimiento_izquierdo` decimal(8,2) NOT NULL,
  `remetimiento_derecho` decimal(8,2) NOT NULL,
  `has_parking` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parking_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_parking_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `has_urban_incorporation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `urban_incorporation_description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `urban_height_limit` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `building` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `properties`
--

INSERT INTO `properties` (`id`, `id_profile`, `catastral`, `is_building`, `street`, `number_ext`, `number_int`, `neighborhood`, `zip_code`, `id_state`, `id_city`, `latitude`, `longitude`, `cos`, `cus`, `cas`, `slope`, `surface`, `remetimiento_forntal`, `remetimiento_posterior`, `remetimiento_izquierdo`, `remetimiento_derecho`, `has_parking`, `parking_description`, `id_parking_document`, `has_urban_incorporation`, `urban_incorporation_description`, `urban_height_limit`, `created_at`, `updated_at`, `building`) VALUES
(50, 26, '123-123-126', 'Construcción', 'Calle 2', '123', '123', 'Colonia', 'C.P', 'Nuevo León', 11, '', '', '13.00', '13.00', '13.00', '12.00', 10, '12.00', '12.00', '12.00', '12.00', 'Si', 'jejjee', '', 'Si', '12', '12.00', '2015-04-03 14:04:54', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solictudes`
--

CREATE TABLE IF NOT EXISTS `solictudes` (
`id_solicitud` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solictudes`
--

INSERT INTO `solictudes` (`id_solicitud`, `id_usuario`) VALUES
(1, 26),
(2, 26),
(3, 26),
(4, 26),
(5, 26),
(6, 26),
(7, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_soil_type`
--

CREATE TABLE IF NOT EXISTS `use_soil_type` (
  `id` int(11) NOT NULL,
  `use_soil_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `use_soil_type`
--

INSERT INTO `use_soil_type` (`id`, `use_soil_type`) VALUES
(1, 'Unifamiliar'),
(2, 'Multifamiliar'),
(3, 'Servicios'),
(4, 'Equipamiento privado'),
(5, 'Equipamiento público'),
(6, 'Comercial'),
(7, 'Habitacional'),
(8, 'Industrial'),
(9, 'Agropecuario'),
(10, 'Forestal'),
(11, 'Áreas verdes'),
(12, 'No tiene uso de suelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `rol` varchar(500) NOT NULL DEFAULT 'Inscrito',
  `empresa` varchar(500) NOT NULL,
  `apellido_paterno` varchar(500) NOT NULL,
  `apellido_materno` varchar(500) NOT NULL,
  `rfc` varchar(500) NOT NULL,
  `telefono` varchar(500) NOT NULL,
  `celular` varchar(500) NOT NULL,
  `calle_domicilio` varchar(500) NOT NULL,
  `num_ext_domicilio` varchar(500) NOT NULL,
  `num_int_domicilio` varchar(500) NOT NULL,
  `colonia_domicilio` varchar(500) NOT NULL,
  `estado_domicilio` varchar(500) NOT NULL,
  `municipio_domicilio` varchar(500) NOT NULL,
  `cp_domicilio` varchar(500) NOT NULL,
  `calle_fiscal` varchar(500) NOT NULL,
  `num_ext_fiscal` varchar(500) NOT NULL,
  `num_int_fiscal` varchar(500) NOT NULL,
  `colonia_fiscal` varchar(500) NOT NULL,
  `estado_fiscal` varchar(500) NOT NULL,
  `municipio_fiscal` varchar(500) NOT NULL,
  `cp_fiscal` varchar(500) NOT NULL,
  `id_fuente` int(10) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `rol`, `empresa`, `apellido_paterno`, `apellido_materno`, `rfc`, `telefono`, `celular`, `calle_domicilio`, `num_ext_domicilio`, `num_int_domicilio`, `colonia_domicilio`, `estado_domicilio`, `municipio_domicilio`, `cp_domicilio`, `calle_fiscal`, `num_ext_fiscal`, `num_int_fiscal`, `colonia_fiscal`, `estado_fiscal`, `municipio_fiscal`, `cp_fiscal`, `id_fuente`, `fecha_registro`, `status`) VALUES
(16, 'Christopher Campos', 'chris.bastian@hotmail.es', '3c6e6c7db470ea1f84292991a6591501', 'Administrador', '', '', '', '', '', '', '', '', '', '', 'Nuevo León', '1', '', '', '', '', '', '', '', '', 0, '2015-04-03 16:52:06', 'Activo'),
(26, 'TINZA', 'tinza@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Cliente', 'TINZA EMPRESA', 'APELLIDO', 'APELLIDO MATERNO', 'TINZA', '90175059', '412123422', 'TINZA', 'TINZA', 'TINZA', 'TINZA', 'Nuevo León', '1', 'TINZA', 'TINZA', 'TINZA', 'TINZA', 'TINZA', 'Nuevo León', '1', 'TINZA', 16, '2015-04-03 17:57:58', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
 ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `extra_properties`
--
ALTER TABLE `extra_properties`
 ADD PRIMARY KEY (`id_extra`);

--
-- Indices de la tabla `identification`
--
ALTER TABLE `identification`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licenses`
--
ALTER TABLE `licenses`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `license_type`
--
ALTER TABLE `license_type`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `properties`
--
ALTER TABLE `properties`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solictudes`
--
ALTER TABLE `solictudes`
 ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `use_soil_type`
--
ALTER TABLE `use_soil_type`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
MODIFY `id_correo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `extra_properties`
--
ALTER TABLE `extra_properties`
MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT de la tabla `identification`
--
ALTER TABLE `identification`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT de la tabla `licenses`
--
ALTER TABLE `licenses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT de la tabla `properties`
--
ALTER TABLE `properties`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `solictudes`
--
ALTER TABLE `solictudes`
MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
