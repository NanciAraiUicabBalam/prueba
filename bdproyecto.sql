-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-11-2021 a las 19:43:09
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `subtotal` float NOT NULL,
  `iva` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `user_id`, `fecha_compra`, `subtotal`, `iva`, `total`) VALUES
(1, 1, '2020-01-01 00:00:00', 70, 10, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_detalle`
--

DROP TABLE IF EXISTS `compra_detalle`;
CREATE TABLE IF NOT EXISTS `compra_detalle` (
  `compra_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  PRIMARY KEY (`producto_id`,`compra_id`),
  KEY `producto_id` (`producto_id`),
  KEY `compra_id` (`compra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `descripcion`, `direccion`, `telefono`) VALUES
(1, 'Burger King', 'Burger King es una cadena estadounidense de restaurantes de comida rápida, especializada en la confección de hamburguesas y sándwiches.', 'C. 39 195, Centro, 97780 Valladolid, Yuc.', '985 856 40'),
(2, 'Domino', 'Domino\'s Pizza es una empresa de comida rápida estadounidense de restaurantes, especializada en la elaboración de pizzas. ... Fundada por Tom Monaghan en 1960, quien había abierto su primera pizzería en Ypsilanti (Míchigan).', ' C. 41 No. 206-Int 180, Sambulá, 97780 Valladolid, Yuc', '985 856 165');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1631145764),
('m130524_201442_init', 1631145776),
('m190124_110200_add_verification_token_column_to_user_table', 1631145777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `subtotal` float NOT NULL,
  `iva` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `user_id`, `fecha_pedido`, `fecha_entrega`, `subtotal`, `iva`, `total`) VALUES
(1, 1, '2021-01-01 00:00:00', '2021-01-01 00:00:00', 70, 10, 80),
(2, 1, '2021-01-01 00:00:00', '2021-01-01 00:00:00', 80, 5, 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

DROP TABLE IF EXISTS `pedido_detalle`;
CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `pedido_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` int(11) NOT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `compra_id` (`compra_id`),
  KEY `empresa_id` (`empresa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `user_id`, `role_id`, `nombres`, `apellidos`, `direccion`, `telefono`) VALUES
(1, 1, 1, 'Nanci', 'Uicab Balam', 'calle 34 entre 12 x 87 Cenrtro', '9841252365');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad_id` (`unidad_id`),
  KEY `empresa_id` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_costo`, `precio_venta`, `fecha_alta`, `empresa_id`, `unidad_id`, `stock`) VALUES
(1, 'WHOPPER Jr. con Queso', 'Nuestra WHOPPER Jr. con Queso lleva una carne de res a la parrilla, preparada con jugosos tomates, lechuga recién cortada, mayonesa, pepinillos y cebollas en rodajas, sobre un pan suave con ajonjolí. ¡Pídela en COMBO con papas a la francesa y refresco frío!\r\n420 CAL. / 5.5 OZ (165.8 G) ', 70, 70, '2021-05-01 00:00:00', 1, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `nombre`) VALUES
(1, 'ADMINISTRADOR '),
(2, 'REPARTIDOR'),
(3, 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrpcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `descrpcion`) VALUES
(1, 'Ración entera'),
(2, 'Media Ración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'nanci.uicab', 'XUYuSJOaOW7FE0tIgB0BdK3NFLYvY4V9', '$2y$13$a9C9dovcv5q1W3FvE/hAdeVEILgg4crNLIQOz0UisqsBS610L.QSi', NULL, 'nanci.uicabbalam@itsva.edu.mx', 10, 1636517032, 1636517032, 'kEkRR3cInkDRvcbNrRvZwklxOvl2RAnc_1636517032'),
(3, 'Jonathan.Ortega', 'lKtaDtv2Su7GPvCR4vPgFGGSXctMoxjF', '$2y$13$quHUgMm6ntGLD1n8lzDmkeBfVr.4WuoHAu0wW8wDUZbJ7ZzWDq9kC', NULL, 'canul_aldair@hotmail.com', 9, 1636606485, 1636606485, 'EtGF24KIlV_4h0keQSm7nBLA6fsvSPnn_1636606485');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `compra_detalle`
--
ALTER TABLE `compra_detalle`
  ADD CONSTRAINT `compra_detalle_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `compra_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `pedido_detalle_ibfk_2` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `pedido_detalle_ibfk_3` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `pedido_detalle_ibfk_4` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `perfil_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
