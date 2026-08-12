-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2026 a las 00:07:22
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
-- Base de datos: `siapsystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `rol_admin` text DEFAULT NULL,
  `permissions_admin` text DEFAULT '{}',
  `email_admin` text DEFAULT NULL,
  `password_admin` text DEFAULT NULL,
  `token_admin` text DEFAULT NULL,
  `token_exp_admin` text DEFAULT NULL,
  `status_admin` int(11) DEFAULT 1,
  `title_admin` text DEFAULT NULL,
  `symbol_admin` text DEFAULT NULL,
  `font_admin` text DEFAULT NULL,
  `color_admin` text DEFAULT NULL,
  `back_admin` text DEFAULT NULL,
  `id_office_admin` int(11) DEFAULT 0,
  `scode_admin` text DEFAULT NULL,
  `chatgpt_admin` text DEFAULT NULL,
  `date_created_admin` date DEFAULT NULL,
  `date_updated_admin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `rol_admin`, `permissions_admin`, `email_admin`, `password_admin`, `token_admin`, `token_exp_admin`, `status_admin`, `title_admin`, `symbol_admin`, `font_admin`, `color_admin`, `back_admin`, `id_office_admin`, `scode_admin`, `chatgpt_admin`, `date_created_admin`, `date_updated_admin`) VALUES
(1, 'superadmin', '{\"todo\":\"on\"}', 'superadmin@siapsystem.com', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3ODU4NzY5MTgsImV4cCI6MTc4NTk2MzMxOCwiZGF0YSI6eyJpZCI6MSwiZW1haWwiOiJzdXBlcmFkbWluQHNpYXBzeXN0ZW0uY29tIn19.jIhl8CXvZZ4RjvK0XHymdaIOjsZyYdh2t1EtZXuernU', '1785963318', 1, 'SiapSystem', '<i class=\"bi bi-tools\"></i>', '', '#0039d8', 'https://res.cloudinary.com/dqtlqsbms/image/upload/v1773510020/tmeykzzsn93ojuk5jtih.png', 0, NULL, NULL, '2026-01-20', '2026-08-04 20:55:18'),
(2, 'admin', '%7B%22todo%22%3A%22on%22%7D', 'admin@siapsystem.com', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', '', '', 1, '', '', '', '', '', 0, NULL, NULL, '2026-04-22', '2026-04-23 03:49:34'),
(3, 'admin', '%7B%22todo%22%3A%22on%22%7D', 'admin@laapartada.com', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3NzcwNzM1NTIsImV4cCI6MTc3NzE1OTk1MiwiZGF0YSI6eyJpZCI6MywiZW1haWwiOiJhZG1pbkBsYWFwYXJ0YWRhLmNvbSJ9fQ.SqcZF-nan37BJ6KbEAm9KgQWJZ71iNo6wDjKk0VlDM8', '1777159952', 1, '', '', '', '', '', 1, NULL, NULL, '2026-04-22', '2026-04-24 23:32:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `title_category` text DEFAULT NULL,
  `url_category` text DEFAULT NULL,
  `img_category` text DEFAULT NULL,
  `icon_category` longtext DEFAULT NULL,
  `status_category` int(11) DEFAULT 1,
  `date_created_category` date DEFAULT NULL,
  `date_updated_category` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `columns`
--

CREATE TABLE `columns` (
  `id_column` int(11) NOT NULL,
  `id_module_column` int(11) DEFAULT 0,
  `title_column` text DEFAULT NULL,
  `alias_column` text DEFAULT NULL,
  `type_column` text DEFAULT NULL,
  `matrix_column` text DEFAULT NULL,
  `visible_column` int(11) DEFAULT 1,
  `order_column` int(11) NOT NULL DEFAULT 0,
  `date_created_column` date DEFAULT NULL,
  `date_updated_column` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `columns`
--

INSERT INTO `columns` (`id_column`, `id_module_column`, `title_column`, `alias_column`, `type_column`, `matrix_column`, `visible_column`, `order_column`, `date_created_column`, `date_updated_column`) VALUES
(1, 2, 'rol_admin', 'rol', 'select', 'superadmin,admin,editor', 1, 0, '2026-01-20', '2026-01-20 20:33:18'),
(2, 2, 'permissions_admin', 'permisos', 'object', '', 1, 0, '2026-01-20', '2026-01-20 20:33:18'),
(3, 2, 'email_admin', 'email', 'email', '', 1, 0, '2026-01-20', '2026-01-20 20:33:18'),
(4, 2, 'password_admin', 'pass', 'password', '', 0, 0, '2026-01-20', '2026-01-20 20:33:18'),
(5, 2, 'token_admin', 'token', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:18'),
(6, 2, 'token_exp_admin', 'expiración', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:18'),
(7, 2, 'status_admin', 'estado', 'boolean', '', 1, 0, '2026-01-20', '2026-01-20 20:33:18'),
(8, 2, 'title_admin', 'título', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:18'),
(9, 2, 'symbol_admin', 'simbolo', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:19'),
(10, 2, 'font_admin', 'tipografía', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:19'),
(11, 2, 'color_admin', 'color', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:19'),
(12, 2, 'back_admin', 'fondo', 'text', '', 0, 0, '2026-01-20', '2026-01-20 20:33:19'),
(13, 4, 'nombre_company', 'Nombre', 'text', NULL, 1, 0, '2026-04-17', '2026-04-24 21:57:25'),
(14, 4, 'codigo_company', 'Codigo', 'text', NULL, 1, 0, '2026-04-17', '2026-04-24 21:57:31'),
(15, 4, 'nit_company', 'Nit', 'text', NULL, 1, 0, '2026-04-17', '2026-04-17 21:45:40'),
(16, 4, 'email_company', 'Email', 'email', NULL, 1, 0, '2026-04-17', '2026-04-17 21:45:40'),
(17, 4, 'telefono_company', 'Telefono', 'text', NULL, 1, 0, '2026-04-17', '2026-04-17 21:45:40'),
(18, 4, 'contacto_company', 'Contacto', 'text', NULL, 1, 0, '2026-04-17', '2026-04-17 21:45:40'),
(19, 4, 'direccion_company', 'Direccion', 'text', NULL, 1, 0, '2026-04-17', '2026-04-17 21:45:40'),
(20, 4, 'status_company', 'Estado', 'boolean', NULL, 1, 0, '2026-04-17', '2026-04-17 21:45:40'),
(29, 8, 'nombre_office', 'Nombre', 'text', NULL, 1, 0, '2026-04-18', '2026-04-24 21:58:48'),
(30, 8, 'codigo_office', 'Codigo', 'text', NULL, 1, 0, '2026-04-18', '2026-04-24 21:58:41'),
(31, 8, 'nit_office', 'Nit', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 00:21:16'),
(32, 8, 'email_office', 'Email', 'email', NULL, 1, 0, '2026-04-18', '2026-04-19 00:21:19'),
(33, 8, 'phone_office', 'Telefono', 'text', NULL, 1, 0, '2026-04-18', '2026-04-25 17:57:33'),
(34, 8, 'contacto_office', 'Contacto', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 00:21:26'),
(35, 8, 'direccion_office', 'Direccion', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 00:21:31'),
(36, 8, 'status_office', 'Estado', 'boolean', NULL, 0, 0, '2026-04-18', '2026-04-23 03:38:51'),
(46, 8, 'id_company_office', 'Empresa', 'relations', 'companys', 1, 0, '2026-04-18', '2026-04-23 03:23:24'),
(48, 19, 'title_category', 'Categoria', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 02:24:31'),
(49, 19, 'url_category', 'Url', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 02:24:31'),
(50, 19, 'img_category', 'Imagen', 'image', NULL, 1, 0, '2026-04-18', '2026-04-19 02:24:31'),
(51, 19, 'icon_category', 'Icono', 'code', NULL, 1, 0, '2026-04-18', '2026-04-19 02:24:31'),
(52, 19, 'status_category', 'Estado', 'boolean', NULL, 1, 0, '2026-04-18', '2026-04-19 02:24:31'),
(53, 20, 'title_subcategory', 'subcategoria', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 02:26:55'),
(54, 20, 'id_category_subcategory', 'Categoria', 'relations', NULL, 1, 0, '2026-04-18', '2026-04-19 02:26:55'),
(55, 20, 'url_subcategory', 'Url', 'text', NULL, 1, 0, '2026-04-18', '2026-04-19 02:26:55'),
(56, 20, 'status_subcategory', 'Estado', 'boolean', NULL, 1, 0, '2026-04-18', '2026-04-19 02:26:55'),
(57, 2, 'id_office_admin', 'Sucursal', 'relations', 'offices', 1, 0, '2026-04-22', '2026-04-23 03:56:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companys`
--

CREATE TABLE `companys` (
  `id_company` int(11) NOT NULL,
  `nombre_company` text DEFAULT NULL,
  `codigo_company` text DEFAULT NULL,
  `nit_company` text DEFAULT NULL,
  `email_company` text DEFAULT NULL,
  `telefono_company` text DEFAULT NULL,
  `contacto_company` text DEFAULT NULL,
  `direccion_company` text DEFAULT NULL,
  `status_company` int(11) DEFAULT 1,
  `date_created_company` date DEFAULT NULL,
  `date_updated_company` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `companys`
--

INSERT INTO `companys` (`id_company`, `nombre_company`, `codigo_company`, `nit_company`, `email_company`, `telefono_company`, `contacto_company`, `direccion_company`, `status_company`, `date_created_company`, `date_updated_company`) VALUES
(1, 'Concesion+Ruta+Al+Mar+s.a.s', '001-000', '900894996-0', 'contacto@rutaalmar.com', '3216177100', 'Manuel+Raigozo', 'Centro+Log%C3%ADstico+Industrial+San+Jer%C3%B3nimo+Km+3+V%C3%ADa+Monter%C3%ADa+%E2%80%93+Planeta+Rica.+Bodega+%23+4+Calle+B+Etapa+Contiguo+a+planta+de+Bavaria+en+Monter%C3%ADa+%E2%80%93+C%C3%B3rdoba', 1, '2026-04-22', '2026-04-23 03:17:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id_file` int(11) NOT NULL,
  `id_folder_file` int(11) DEFAULT 0,
  `name_file` text DEFAULT NULL,
  `extension_file` text DEFAULT NULL,
  `type_file` text DEFAULT NULL,
  `size_file` double DEFAULT 0,
  `link_file` text DEFAULT NULL,
  `thumbnail_vimeo_file` text DEFAULT NULL,
  `id_mailchimp_file` text DEFAULT NULL,
  `id_admin_file` int(11) DEFAULT 0,
  `date_created_file` date DEFAULT NULL,
  `date_updated_file` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id_file`, `id_folder_file`, `name_file`, `extension_file`, `type_file`, `size_file`, `link_file`, `thumbnail_vimeo_file`, `id_mailchimp_file`, `id_admin_file`, `date_created_file`, `date_updated_file`) VALUES
(1, 2, 'login', 'png', 'image/png', 2232167, 'http://res.cloudinary.com/dqtlqsbms/image/upload/v1773510020/tmeykzzsn93ojuk5jtih.png', NULL, NULL, 1, '2026-03-14', '2026-03-14 22:40:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folders`
--

CREATE TABLE `folders` (
  `id_folder` int(11) NOT NULL,
  `name_folder` text DEFAULT NULL,
  `size_folder` text DEFAULT NULL,
  `total_folder` double DEFAULT 0,
  `max_upload_folder` text DEFAULT NULL,
  `url_folder` text DEFAULT NULL,
  `keys_folder` text DEFAULT NULL,
  `date_created_folder` date DEFAULT NULL,
  `date_updated_folder` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `folders`
--

INSERT INTO `folders` (`id_folder`, `name_folder`, `size_folder`, `total_folder`, `max_upload_folder`, `url_folder`, `keys_folder`, `date_created_folder`, `date_updated_folder`) VALUES
(1, 'Server', '200000000000', 0, '500000000', 'http://cms.siapsystem.com', NULL, '2026-03-14', '2026-03-14 21:52:21'),
(2, 'Cloudinary', '20000000000', 2232167, '100000000', 'dqtlqsbms', '974474226794182|txatlu4c74kq0Z-kBTxZGAFbor0', NULL, '2026-03-14 22:40:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id_module` int(11) NOT NULL,
  `id_page_module` int(11) DEFAULT 0,
  `type_module` text DEFAULT NULL,
  `title_module` text DEFAULT NULL,
  `suffix_module` text DEFAULT NULL,
  `content_module` text DEFAULT NULL,
  `width_module` int(11) DEFAULT 100,
  `editable_module` int(11) DEFAULT 1,
  `date_created_module` date DEFAULT NULL,
  `date_updated_module` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id_module`, `id_page_module`, `type_module`, `title_module`, `suffix_module`, `content_module`, `width_module`, `editable_module`, `date_created_module`, `date_updated_module`) VALUES
(1, 2, 'breadcrumbs', 'Administradores', NULL, NULL, 100, 1, '2026-03-14', '2026-03-14 21:52:21'),
(2, 2, 'tables', 'admins', 'admin', '', 100, 0, '2026-03-14', '2026-04-23 03:50:59'),
(3, 6, 'breadcrumbs', 'gestión de información de la empresa', '', '', 100, 1, '2026-04-17', '2026-04-17 21:33:22'),
(4, 6, 'tables', 'companys', 'company', '', 100, 1, '2026-04-17', '2026-04-17 21:50:30'),
(7, 8, 'breadcrumbs', 'gestión de información de la sucursal', '', '', 100, 1, '2026-04-18', '2026-04-19 00:16:53'),
(8, 8, 'tables', 'offices', 'office', '', 100, 1, '2026-04-18', '2026-04-19 00:17:29'),
(17, 10, 'breadcrumbs', 'gestión de información de categorias', '', '', 100, 1, '2026-04-18', '2026-04-19 02:20:41'),
(18, 11, 'breadcrumbs', 'gestión de información de subcategorias', '', '', 100, 1, '2026-04-18', '2026-04-19 02:20:54'),
(19, 10, 'tables', 'categories', 'category', '', 100, 1, '2026-04-18', '2026-04-19 02:24:31'),
(20, 11, 'tables', 'subcategories', 'subcategory', '', 100, 1, '2026-04-18', '2026-04-19 02:26:55'),
(21, 24, 'breadcrumbs', 'registro de mantenimiento preventivo', '', '', 100, 1, '2026-04-18', '2026-04-19 03:08:56'),
(22, 25, 'breadcrumbs', 'registro de mantenimiento correctivo', '', '', 100, 1, '2026-04-18', '2026-04-19 03:15:33'),
(23, 27, 'breadcrumbs', 'registro de herramientas', '', '', 100, 1, '2026-04-19', '2026-04-19 16:24:55'),
(24, 28, 'breadcrumbs', 'registro de equipos', '', '', 100, 1, '2026-04-19', '2026-04-19 16:25:10'),
(25, 29, 'breadcrumbs', 'registro de software', '', '', 100, 1, '2026-04-19', '2026-04-19 16:26:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offices`
--

CREATE TABLE `offices` (
  `id_office` int(11) NOT NULL,
  `nombre_office` text DEFAULT NULL,
  `codigo_office` text DEFAULT NULL,
  `nit_office` text DEFAULT NULL,
  `email_office` text DEFAULT NULL,
  `phone_office` text DEFAULT NULL,
  `contacto_office` text DEFAULT NULL,
  `direccion_office` text DEFAULT NULL,
  `status_office` int(11) DEFAULT 1,
  `id_company_office` int(11) DEFAULT 0,
  `date_created_office` date DEFAULT NULL,
  `date_updated_office` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `offices`
--

INSERT INTO `offices` (`id_office`, `nombre_office`, `codigo_office`, `nit_office`, `email_office`, `phone_office`, `contacto_office`, `direccion_office`, `status_office`, `id_company_office`, `date_created_office`, `date_updated_office`) VALUES
(1, 'La+Apartada', '001-001', '900895996-0', 'peaje.laapartada@rutaal.ar.com', '3216177100', '3216177100', 'PR+12+%2B+0.000++Caucasia+-+La+Apartada', 1, 1, '2026-04-22', '2026-04-23 03:24:43'),
(2, 'los Manguitos', '001-002', '900895996-0', 'peaje.manguitos@rutaalmar.com', '3216177100', '3216177100', 'PR 52 + 450.000  La Apartada - Planeta Rica', 1, 1, '2026-04-22', '2026-04-23 03:30:59'),
(3, 'Purgatorio', '001-003', '900895996-0', 'peaje.purgatorio@rutaalmar.com', '3216177100', '3216177100', 'PR 38 + 670.000  Planeta Rica - Montería', 1, 1, '2026-04-22', '2026-04-23 03:29:58'),
(4, 'los Cedros', '001-004', '900895996-0', 'peaje.loscedros@rutaalmar.com', '3216177100', '3216177100', 'PR 41 + 100.000 Montería - Arboletes', 1, 1, '2026-04-22', '2026-04-23 03:30:21'),
(5, 'Mata de Caña', '001-005', '900895996-0', 'peaje.matadecana@rutaalmar.com', '3216177100', '3216177100', 'PR 32 + 130.000 Cereté - Lorica', 1, 1, '2026-04-22', '2026-04-23 03:33:38'),
(6, 'Caimanera', '001-006', '900895996-0', 'peaje.caimanera@rutaalmar.com', '3216177100', '3216177100', 'PR 41 + 150.000 Tolú - Coveñas', 1, 1, '2026-04-22', '2026-04-23 03:33:08'),
(7, 'San+Onofre', '001-007', '900895996-0', 'peaje.sanonofre@rutaalmar.com', '3216177100', '3216177100', 'PR+22+%2B+600.000+Cruz+del+Vizo+-+San+Onofre', 1, 1, '2026-04-22', '2026-04-23 03:34:44'),
(8, 'San Carlos', '001-008', '900895996-0', 'peaje.sancarlos@rutaalmar.com', '3216177100', '3216177100', 'PR 9 + 660.000 Planeta Rica - Cereté', 1, 1, '2026-04-22', '2026-04-23 03:36:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `title_page` text DEFAULT NULL,
  `url_page` text DEFAULT NULL,
  `icon_page` text DEFAULT NULL,
  `type_page` text DEFAULT NULL,
  `order_page` int(11) DEFAULT 1,
  `menu_type_page` int(11) DEFAULT 0,
  `parent_id_page` int(11) DEFAULT 0,
  `date_created_page` date DEFAULT NULL,
  `date_updated_page` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id_page`, `title_page`, `url_page`, `icon_page`, `type_page`, `order_page`, `menu_type_page`, `parent_id_page`, `date_created_page`, `date_updated_page`) VALUES
(1, 'Inicio', 'inicio', 'bi bi-house-door-fill', 'modules', 1, 0, 0, '2026-03-14', '2026-03-14 21:52:20'),
(2, 'Admins', 'admins', 'bi bi-person-fill-gear', 'modules', 8, 2, 4, '2026-03-14', '2026-04-19 17:23:56'),
(3, 'Archivos', 'archivos', 'bi bi-file-earmark-image', 'custom', 12, 0, 0, '2026-03-14', '2026-04-19 17:24:33'),
(4, 'Configuracion', 'configuracion', 'bi bi-gear', 'submenu', 7, 1, 0, '2026-04-17', '2026-04-19 17:23:56'),
(5, 'Proyecto', 'proyecto', 'bi bi-buildings', 'submenu', 2, 1, 0, '2026-04-17', '2026-04-19 17:23:32'),
(6, 'Empresa', 'empresa', 'bi bi-building-gear', 'modules', 3, 2, 5, '2026-04-17', '2026-04-19 17:23:32'),
(8, 'Sucursales', 'sucursales', 'bi bi-building-down', 'modules', 5, 2, 5, '2026-04-17', '2026-04-19 17:23:32'),
(10, 'Categorías', 'categorias', 'bi bi-bookmark', 'modules', 9, 2, 4, '2026-04-18', '2026-04-19 17:23:56'),
(11, 'Subategorías', 'subcategorias', 'bi bi-bookmarks', 'modules', 10, 2, 4, '2026-04-18', '2026-04-19 17:23:56'),
(21, 'Academia', 'http://web.siapsystem.com/', 'bi bi-mortarboard-fill', 'external_link', 21, 0, 0, '2026-04-18', '2026-04-19 17:23:25'),
(22, 'Mantenimientos', 'mantenimientos', 'bi bi-clipboard-pulse', 'submenu', 17, 1, 0, '2026-04-18', '2026-04-19 17:24:39'),
(23, 'Tareas', 'tareas', 'bi bi-card-checklist', 'submenu', 20, 1, 0, '2026-04-18', '2026-04-19 17:24:39'),
(24, 'Preventivos', 'preventivos', 'bi bi-window-stack', 'modules', 18, 2, 22, '2026-04-18', '2026-04-19 17:24:39'),
(25, 'Correctivos', 'correctivos', 'bi bi-wrench-adjustable', 'modules', 19, 2, 22, '2026-04-18', '2026-04-19 17:24:39'),
(26, 'Inventario', 'inventario', 'bi bi-box-seam', 'submenu', 13, 1, 0, '2026-04-19', '2026-04-19 17:24:33'),
(27, 'Herramientas', 'herramientas', 'bi bi-tools', 'modules', 14, 2, 26, '2026-04-19', '2026-04-19 17:24:33'),
(28, 'Equipos', 'equipos', 'bi bi-pc-display-horizontal', 'modules', 15, 2, 26, '2026-04-19', '2026-04-19 17:24:33'),
(29, 'Softwares', 'softwares', 'bi bi-file-earmark-easel', 'modules', 16, 2, 26, '2026-04-19', '2026-04-19 17:24:33'),
(30, 'Definición Maestros', 'definicionmaestros', 'bi bi-database-lock', 'submenu', 11, 1, 0, '2026-04-19', '2026-04-19 17:24:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategories`
--

CREATE TABLE `subcategories` (
  `id_subcategory` int(11) NOT NULL,
  `title_subcategory` text DEFAULT NULL,
  `id_category_subcategory` int(11) DEFAULT 0,
  `url_subcategory` text DEFAULT NULL,
  `status_subcategory` int(11) DEFAULT 1,
  `date_created_subcategory` date DEFAULT NULL,
  `date_updated_subcategory` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id_column`);

--
-- Indices de la tabla `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id_company`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`);

--
-- Indices de la tabla `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id_folder`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`);

--
-- Indices de la tabla `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id_office`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Indices de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id_subcategory`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `columns`
--
ALTER TABLE `columns`
  MODIFY `id_column` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `companys`
--
ALTER TABLE `companys`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `folders`
--
ALTER TABLE `folders`
  MODIFY `id_folder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `offices`
--
ALTER TABLE `offices`
  MODIFY `id_office` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id_subcategory` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
