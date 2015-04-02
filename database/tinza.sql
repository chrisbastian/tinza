-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-04-2015 a las 03:36:24
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
-- Estructura de tabla para la tabla `terrenos`
--

CREATE TABLE IF NOT EXISTS `terrenos` (
`id_terreno` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen1` varchar(500) NOT NULL,
  `imagen2` varchar(500) NOT NULL,
  `imagen3` varchar(500) NOT NULL,
  `imagen4` varchar(500) NOT NULL,
  `imagen5` varchar(500) NOT NULL,
  `imagen6` varchar(500) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `metros_cuadrados` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `comuna` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `id_vendedor` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `bloqueado` int(11) NOT NULL,
  `telefono` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`id_terreno`, `titulo`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `imagen6`, `precio`, `metros_cuadrados`, `region`, `ciudad`, `comuna`, `descripcion`, `id_vendedor`, `pais`, `direccion`, `bloqueado`, `telefono`) VALUES
(1, 'Mi Terreno', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', '', '', '', '', '', '1.200.000', '200', 'Biobío', 'Concepción', 'Concepción', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\n', 'chrisbastian21', 'Chile', 'Santa Sabina', 0, '42564003'),
(2, 'Mi Terreno', 'Captura de pantalla 2015-01-23 a las 16.13.30.png', '', '', '', '', '', '100.000', '100', 'Región del Bío-Bío', 'Talcahuano', 'Talcahuano', 'Mi descripción', 'chrisbastian21', 'Chile', 'Andalue', 0, '42564003'),
(3, 'Mi terreno', 'Captura de pantalla 2015-01-23 a las 16.13.30.png', '', '', '', '', '', '100.000', '100', 'Región del Bío-Bío', 'Concepción', 'Concepción', 'Mi descripción.', 'chrisbastian23', 'Chile', 'Av.Andalue 2737', 0, '42564003'),
(4, 'Terreno en Chillan', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', '100.000', '250', 'Región del Bío-Bío', 'San Pedro de la Paz', 'San Pedro de La Paz', 'Descripción.', 'camila', 'Chile', 'Av. Andalue 2737', 0, '42564003'),
(5, 'Terreno en Concepción', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', '', '', '', '', '', '1.000.000', '250', 'Biobío', 'Concepción', 'Concepción', 'Descripción', 'Camila2', 'Chile', 'Santa Sabina', 0, '42564003'),
(6, 'Terreno en la Reina', 'images.jpg', '', '', '', '', '', '10.000.000', '250', 'Región Metropolitana de Santiago', 'La Reina', 'La Reina', 'Mi Terreno!!', 'camila3', 'Chile', 'La reina', 0, '42564003'),
(7, 'Mi terreno de venta', 'Piedras-Blancas2.jpg', '', '', '', '', '', '400.000', '250', 'Región de Antofagasta', 'San Pedro de Atacama', 'San Pedro de Atacama', 'Compra de Terreno', 'Chris5', 'Chile', 'Av. San pedro de atacama', 0, '42564003'),
(8, 'Terreno en Dehesa', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', '', '', '', '', '', '100.000', '100', 'Región del Bío-Bío', 'San Pedro de la Paz', 'San Pedro de La Paz', 'Mi Descripción de mi terreno...', 'chrisbastian20', 'Chile', 'Av. Andalue 2737', 0, '42564003'),
(9, 'terreno 300m2 avenida principal', 'jf7okf5kpt0vqgsjgj5ca9qjb6_20141011041633543990217a9c2.jpg', '', '', '', '', '', '3.200.000', '300', 'Región del Bío-Bío', 'Santa Juana', 'Santa Juana', 'dasdadasda', 'aquijadac', 'Chile', 'dasdada', 0, '84949494');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `ciudad` varchar(500) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `pais` varchar(500) NOT NULL,
  `dirección` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `rol` varchar(500) NOT NULL DEFAULT 'Inscrito',
  `telefono` varchar(100) DEFAULT NULL,
  `usuario` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `ciudad`, `estado`, `pais`, `dirección`, `email`, `password`, `rol`, `telefono`, `usuario`) VALUES
(16, 'Christopher Campos', 'Concepción ', 'BioBio', 'Chile', 'Santa Sabina', 'chris.bastian@hotmail.es', '3c6e6c7db470ea1f84292991a6591501', 'Administrador', '56 (9) 901-750-59', 'chrisbastian21'),
(18, 'Christopher Campos', 'San Pedro de la Paz', 'Región del Bío-Bío', 'Chile', 'Av.ndalue 2737', 'chcris@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Inscrito', '56 (9) 901-750-59', 'chrisbastian23'),
(20, '', '', '', '', '', 'camila@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Inscrito', NULL, 'camila'),
(21, '', '', '', '', '', 'cami@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Inscrito', NULL, 'Camila2'),
(22, '', '', '', '', '', 'cami3@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Inscrito', NULL, 'camila3'),
(23, '', '', '', '', '', 'ch@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Inscrito', NULL, 'Chris5'),
(24, '', '', '', '', '', 'chris.bastian21@gmail.com', '3c6e6c7db470ea1f84292991a6591501', 'Inscrito', NULL, 'chrisbastian20'),
(25, '', '', '', '', '', 'aquijadac@udd.cl', 'dc483e80a7a0bd9ef71d8cf973673924', 'Inscrito', NULL, 'aquijadac');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `terrenos`
--
ALTER TABLE `terrenos`
 ADD PRIMARY KEY (`id_terreno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `terrenos`
--
ALTER TABLE `terrenos`
MODIFY `id_terreno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
