-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2026 a las 00:16:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"tienda_interstellar\",\"table\":\"producto\"},{\"db\":\"tienda_interstellar\",\"table\":\"cliente\"},{\"db\":\"tienda_interstellar\",\"table\":\"detalle_pedido\"},{\"db\":\"tienda_interstellar\",\"table\":\"pedido\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-04-27 22:14:05', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"NavigationWidth\":0}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Base de datos: `tienda_interstellar`
--
CREATE DATABASE IF NOT EXISTS `tienda_interstellar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tienda_interstellar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Tecnología', 'Productos tecnológicos y cables'),
(2, 'Ciencia', 'Material de laboratorio y ciencia'),
(3, 'Astronomía', 'Telescopios y observación espacial'),
(4, 'Tecnología Espacial', 'Equipos y kits relacionados con el espacio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `puntos_acumulados` int(11) DEFAULT 0,
  `fecha_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellidos`, `telefono`, `email`, `direccion`, `password_hash`, `puntos_acumulados`, `fecha_register`, `id_rol`) VALUES
(1, 'Admin', 'Interstellar', '000000000', 'admin@interstellar.com', 'Base secreta NASA', 'admin', 0, '2026-04-12 14:31:38', 1),
(2, 'ADRIANO', 'SANTNA', '', 'giheso1083@pmdeal.com', 'calle temporal 3', '$2y$10$9kU4JPwrPoNOhgdqcXAi/.N5T4nB7mGjctogy8WCBoQFAQFC/z6jO', 31, '2026-04-22 17:12:48', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_detalle`, `id_pedido`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(1, 5, 17, 1, 899.99),
(2, 5, 16, 2, 399.99),
(3, 6, 15, 1, 249.99),
(4, 7, 16, 2, 399.99),
(5, 7, 15, 1, 249.99),
(6, 8, 21, 4, 0.00),
(7, 8, 17, 0, 0.00),
(8, 8, 1, 0, 0.00),
(9, 8, 3, 1, 0.00),
(10, 8, 5, 3, 0.00),
(11, 9, 5, 2, 11.00),
(12, 10, 4, 1, 14.25),
(13, 10, 5, 1, 11.00),
(14, 10, 9, 1, 25.50),
(15, 11, 5, 1, 11.00),
(16, 11, 4, 2, 14.25),
(17, 12, 3, 2, 9.99),
(18, 12, 1, 1, 12.50),
(19, 13, 3, 2, 9.99),
(20, 13, 4, 2, 14.25),
(21, 14, 4, 1, 14.25),
(22, 14, 5, 1, 11.00),
(23, 15, 3, 1, 9.99),
(24, 16, 3, 1, 9.99),
(25, 17, 4, 1, 14.25),
(26, 17, 3, 1, 9.99),
(27, 18, 1, 1, 12.50),
(28, 18, 3, 1, 9.99),
(29, 19, 6, 1, 45.00),
(30, 19, 3, 1, 9.99),
(31, 20, 3, 1, 9.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cantidad_devuelta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_puntos`
--

CREATE TABLE `historial_puntos` (
  `id_punto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `puntos` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_puntos`
--

INSERT INTO `historial_puntos` (`id_punto`, `fecha`, `tipo`, `puntos`, `id_pedido`) VALUES
(1, '2026-04-25 21:23:54', 'Suma por compra', 0, 18),
(2, '2026-04-25 21:29:30', 'Suma por compra', 0, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_precio`
--

CREATE TABLE `historico_precio` (
  `id_producto` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `precio_normal` decimal(10,2) NOT NULL,
  `precio_oferta` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historico_precio`
--

INSERT INTO `historico_precio` (`id_producto`, `fecha_inicio`, `fecha_fin`, `precio_normal`, `precio_oferta`) VALUES
(1, '2026-04-12 16:31:38', NULL, 9.99, NULL),
(3, '2026-04-12 16:31:38', NULL, 8.99, NULL),
(4, '2026-04-12 16:31:38', NULL, 12.99, NULL),
(5, '2026-04-12 16:31:38', NULL, 7.99, NULL),
(6, '2026-04-12 16:31:38', NULL, 39.99, NULL),
(7, '2026-04-12 16:31:38', NULL, 19.99, NULL),
(8, '2026-04-12 16:31:38', NULL, 14.99, NULL),
(9, '2026-04-12 16:31:38', NULL, 4.99, NULL),
(10, '2026-04-12 16:31:38', NULL, 0.99, NULL),
(11, '2026-04-12 16:31:38', NULL, 1.49, NULL),
(12, '2026-04-12 16:31:38', NULL, 2.49, NULL),
(13, '2026-04-12 16:31:38', NULL, 15.99, NULL),
(14, '2026-04-12 16:31:38', NULL, 149.99, NULL),
(15, '2026-04-12 16:31:38', NULL, 249.99, NULL),
(16, '2026-04-12 16:31:38', NULL, 399.99, NULL),
(17, '2026-04-12 16:31:38', NULL, 899.99, NULL),
(18, '2026-04-12 16:31:38', NULL, 1299.99, NULL),
(19, '2026-04-12 16:31:38', NULL, 499.99, NULL),
(20, '2026-04-12 16:31:38', NULL, 199.99, NULL),
(21, '2026-04-12 16:31:38', NULL, 59.99, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL,
  `total` decimal(10,2) DEFAULT 0.00,
  `fecha_real_entrega` datetime DEFAULT NULL,
  `fecha_estimada_entrega` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `fecha`, `estado`, `total`, `fecha_real_entrega`, `fecha_estimada_entrega`, `id_cliente`) VALUES
(1, '2026-04-12 18:45:59', 'pendiente', 749.97, NULL, NULL, NULL),
(2, '2026-04-12 18:47:16', 'pendiente', 249.99, NULL, NULL, NULL),
(3, '2026-04-12 18:48:07', 'pendiente', 1299.98, NULL, NULL, NULL),
(4, '2026-04-12 19:18:12', 'pendiente', 1699.97, NULL, NULL, NULL),
(5, '2026-04-12 19:33:56', 'pendiente', 1699.97, NULL, NULL, NULL),
(6, '2026-04-12 19:34:05', 'pendiente', 249.99, NULL, NULL, NULL),
(7, '2026-04-12 19:34:48', 'pendiente', 1049.97, NULL, NULL, NULL),
(8, '2026-04-24 17:32:46', 'pendiente', 0.00, NULL, NULL, 2),
(9, '2026-04-24 18:23:01', 'pendiente', 22.00, NULL, NULL, 2),
(10, '2026-04-24 18:25:29', 'pendiente', 50.75, NULL, NULL, 2),
(11, '2026-04-24 19:47:08', 'Pendiente', 39.50, NULL, NULL, NULL),
(12, '2026-04-24 19:51:46', 'pendiente', 32.48, NULL, NULL, 2),
(13, '2026-04-24 19:52:06', 'pendiente', 48.48, NULL, NULL, 2),
(14, '2026-04-25 20:53:34', 'Pendiente', 25.25, NULL, NULL, NULL),
(15, '2026-04-25 20:54:05', 'pendiente', 9.99, NULL, NULL, 2),
(16, '2026-04-25 20:59:19', 'pendiente', 9.99, NULL, NULL, 2),
(17, '2026-04-25 21:10:42', 'pendiente', 24.24, NULL, NULL, 2),
(18, '2026-04-25 21:23:54', 'pendiente', 22.49, NULL, NULL, 2),
(19, '2026-04-25 21:29:03', 'Pendiente', 54.99, NULL, NULL, NULL),
(20, '2026-04-25 21:29:30', 'pendiente', 9.99, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `existencias` int(11) DEFAULT 0,
  `fecha_modificacion` datetime DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `existencias`, `fecha_modificacion`, `descripcion`, `id_categoria`, `imagen`, `precio`) VALUES
(1, 'Cable Ethernet Cat 6', 50, '2026-04-12 16:31:38', 'Cable de red de alta velocidad Cat 6', 1, 'cable_ethernet.jpg', 12.50),
(3, 'Cable HDMI', 40, '2026-04-12 16:31:38', 'Cable HDMI para vídeo y audio digital', 1, 'cable_hdmi.jpg', 9.99),
(4, 'Cable DisplayPort', 30, '2026-04-12 16:31:38', 'Cable DisplayPort para monitores', 1, 'cable_displayport.jpg', 14.25),
(5, 'Cable DVI-D', 25, '2026-04-12 16:31:38', 'Cable DVI-D para conexiones de vídeo', 1, 'cable_dvi.jpg', 11.00),
(6, 'Switch 8 puertos', 15, '2026-04-12 16:31:38', 'Switch de red de 8 puertos', 1, 'switch.jpg', 45.00),
(7, 'Densímetro', 20, '2026-04-12 16:31:38', 'Instrumento para medir densidad de líquidos', 2, 'densimetro.jpg', 85.00),
(8, 'Carpana Durham', 20, '2026-04-12 16:31:38', 'Tubo Durham para microbiología', 2, 'campana_durham.jpg', 120.00),
(9, 'Disco Porcelana', 30, '2026-04-12 16:31:38', 'Disco de porcelana para laboratorio', 2, 'disco_porcelana.jpg', 25.50),
(10, 'Tubo de ensayo', 100, '2026-04-12 16:31:38', 'Tubo de ensayo de vidrio', 2, 'tubo_ensayo.jpg', 5.75),
(11, 'Placa Petri Aséptica', 80, '2026-04-12 16:31:38', 'Placa Petri estéril para cultivo', 2, 'placa_petri.jpg', 18.90),
(12, 'Tubo centrífuga cónico', 40, '2026-04-12 16:31:38', 'Tubo cónico para centrífuga', 2, 'tubo_centrifuga.jpg', 32.00),
(13, 'Gradilla Multisoporte', 30, '2026-04-12 16:31:38', 'Gradilla para tubos de ensayo', 2, 'gradilla_soporte.jpg', 15.00),
(14, 'Microscopio', 10, '2026-04-12 16:31:38', 'Microscopio óptico de laboratorio', 2, 'microscopio.jpg', 210.00),
(15, 'Telescopio Newtoniano 130/650', 5, '2026-04-12 16:31:38', 'Telescopio para observación astronómica 130/650', 3, 'telescopio_130.jpg', 195.00),
(16, 'Telescopio Newtoniano 200/1000', 3, '2026-04-12 16:31:38', 'Telescopio avanzado 200/1000', 3, 'telescopio_200.jpg', 350.00),
(17, 'Telescopio Schmidt-Cassegrain 8\"', 2, '2026-04-12 16:31:38', 'Telescopio Schmidt-Cassegrain de 8 pulgadas', 3, 'telescopio_schmidt.jpg', 890.00),
(18, 'Traje espacial conceptual educativo (BioSuit MIT)', 1, '2026-04-12 16:31:38', 'Modelo educativo inspirado en el BioSuit del MIT', 4, 'traje_espacial.jpg', 4500.00),
(19, 'Kit CubeSat educativo', 2, '2026-04-12 16:31:38', 'Kit educativo para construir un CubeSat', 4, 'kit_cubesat.jpg', 150.00),
(20, 'Antena direccional satelital', 3, '2026-04-12 16:31:38', 'Antena direccional para comunicaciones satelitales', 4, 'antena_satelital.jpg', 75.00),
(21, 'Radio SDR USB', 10, '2026-04-12 16:31:38', 'Receptor SDR USB para radiofrecuencia', 4, 'radio_sdr.jpg', 42.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'admin', 'Administrador del sistema'),
(2, 'cliente', 'Cliente registrado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_cli_rol` (`id_rol`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id_devolucion`,`id_pedido`,`id_detalle`),
  ADD KEY `fk_dev_det` (`id_pedido`,`id_detalle`);

--
-- Indices de la tabla `historial_puntos`
--
ALTER TABLE `historial_puntos`
  ADD PRIMARY KEY (`id_punto`),
  ADD UNIQUE KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `historico_precio`
--
ALTER TABLE `historico_precio`
  ADD PRIMARY KEY (`id_producto`,`fecha_inicio`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_ped_cli` (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_prod_cat` (`id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `historial_puntos`
--
ALTER TABLE `historial_puntos`
  MODIFY `id_punto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cli_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `historial_puntos`
--
ALTER TABLE `historial_puntos`
  ADD CONSTRAINT `fk_puntos_ped` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Filtros para la tabla `historico_precio`
--
ALTER TABLE `historico_precio`
  ADD CONSTRAINT `fk_hist_prod` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_ped_cli` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_prod_cat` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
