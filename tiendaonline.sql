-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-12-2023 a las 13:20:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Impresoras 3D', 'Impresoras 3D de diferentes tamaños y capacidades', '2023-11-22 13:03:41', '2023-11-24 18:43:03'),
(2, 'Filamentos', 'Filamentos de varios materiales y colores para impresión 3D', '2023-11-22 13:03:41', '2023-11-22 13:03:41'),
(3, 'Resinas', 'Resinas para impresoras 3D SLA/DLP', '2023-11-22 13:03:41', '2023-11-24 18:13:32'),
(4, 'Accesorios', 'Accesorios y herramientas para impresión 3D', '2023-11-22 13:03:41', '2023-11-22 13:03:41'),
(5, 'Modelos 3D', 'Archivos de modelos 3D listos para imprimir', '2023-11-22 13:03:41', '2023-11-22 13:03:41'),
(6, 'Componentes', 'Componentes electrónicos para impresoras 3D', '2023-11-22 14:33:52', '2023-11-22 14:33:52'),
(7, 'Software', 'Software y aplicaciones para modelado 3D', '2023-11-22 14:33:52', '2023-11-22 14:33:52'),
(8, 'Servicios de impresión', 'Servicios de impresión 3D personalizados', '2023-11-22 14:33:52', '2023-11-27 15:49:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `name`, `surname`, `email`, `description`, `created_at`, `updated_at`) VALUES
(8, 'Alfonso', 'Romero', 'alfonrome@gmail.com', 'Que dia tengo que exponer?', '2023-12-11 16:42:20', '2023-12-11 16:42:20'),
(9, 'José', 'Coronel Camacho', 'jcoronelcamacho@gmail.com', 'probando con alfonso', '2023-12-11 17:28:21', '2023-12-11 17:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedido_id`, `producto_id`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 2, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(2, 21, 3, 1, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(3, 22, 2, 4, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(4, 22, 5, 1, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(6, 23, 3, 3, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(7, 23, 1, 1, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(8, 23, 2, 2, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(9, 22, 4, 1, '2023-11-22 17:33:26', '2023-11-22 17:33:26'),
(14, 22, 5, 2, '2023-11-26 18:34:32', '2023-11-26 18:34:32'),
(18, 29, 2, 2, '2023-11-27 12:23:48', '2023-11-27 12:23:48'),
(19, 29, 4, 1, '2023-11-27 12:24:04', '2023-11-27 12:24:04'),
(20, 32, 4, 1, '2023-11-30 15:17:46', '2023-11-30 15:17:46'),
(21, 32, 1, 1, '2023-11-30 15:17:54', '2023-11-30 15:17:54'),
(22, 32, 7, 1, '2023-11-30 15:18:04', '2023-11-30 15:18:04'),
(23, 31, 3, 2, '2023-11-30 19:13:10', '2023-11-30 19:13:10'),
(33, 42, 4, 1, '2023-12-10 18:20:06', '2023-12-10 18:20:06'),
(34, 42, 1, 5, '2023-12-10 18:20:19', '2023-12-10 18:20:19'),
(35, 43, 40, 50, '2023-12-11 11:50:59', '2023-12-11 11:50:59'),
(36, 44, 1, 1, '2023-12-11 17:23:06', '2023-12-11 17:23:06'),
(37, 45, 39, 1, '2023-12-12 09:29:08', '2023-12-12 09:29:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_productos`
--

CREATE TABLE `imagen_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('portada','galeria') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'galeria',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagen_productos`
--

INSERT INTO `imagen_productos` (`id`, `producto_id`, `url`, `tipo`, `created_at`, `updated_at`) VALUES
(30, 2, '1701360563_filamentosPLA.webp', 'portada', '2023-11-30 15:09:23', '2023-11-30 15:09:23'),
(31, 4, '1701360631_Espatula.jpg', 'portada', '2023-11-30 15:10:31', '2023-11-30 15:10:31'),
(32, 29, '1701360901_FilamentoAzul.jpg', 'portada', '2023-11-30 15:15:01', '2023-11-30 15:15:01'),
(33, 28, '1701360917_Thanos.jpg', 'portada', '2023-11-30 15:15:17', '2023-11-30 15:15:17'),
(34, 30, '1701360942_FilamentoRojo.jpg', 'portada', '2023-11-30 15:15:42', '2023-11-30 15:15:42'),
(35, 6, '1701360958_PlacaBase.jpg', 'portada', '2023-11-30 15:15:58', '2023-11-30 15:15:58'),
(36, 7, '1701360973_Cura.jpg', 'portada', '2023-11-30 15:16:13', '2023-11-30 15:16:13'),
(38, 31, '1701361013_FilamentoVerde.jpg', 'portada', '2023-11-30 15:16:53', '2023-11-30 15:16:53'),
(39, 3, '1701361168_ResinaUV.jpg', 'portada', '2023-11-30 15:19:28', '2023-11-30 15:19:28'),
(40, 32, '1701371312_flsun.jpg', 'galeria', '2023-11-30 18:08:32', '2023-11-30 18:09:33'),
(41, 32, '1701371370_flsunsr.jpg', 'portada', '2023-11-30 18:09:30', '2023-11-30 18:09:33'),
(42, 5, '1701371462_superman.jpg', 'portada', '2023-11-30 18:11:02', '2023-11-30 18:11:02'),
(43, 33, '1701947975_delta.jpeg', 'portada', '2023-12-07 10:19:35', '2023-12-07 10:19:35'),
(44, 34, '1701948229_FilamentoTransparente.jpg', 'portada', '2023-12-07 10:23:49', '2023-12-07 10:23:49'),
(45, 35, '1701948250_ResinaFlex.jpg', 'portada', '2023-12-07 10:24:10', '2023-12-07 10:24:10'),
(46, 36, '1701948279_BoquillaTitanio0.4.jpg', 'portada', '2023-12-07 10:24:39', '2023-12-07 10:24:39'),
(47, 37, '1701948307_RobotArticulado.jpg', 'portada', '2023-12-07 10:25:07', '2023-12-07 10:25:07'),
(48, 38, '1701948330_Rodamientos.jpg', 'portada', '2023-12-07 10:25:30', '2023-12-07 10:25:30'),
(49, 39, '1701948352_Licencia.png', 'portada', '2023-12-07 10:25:52', '2023-12-07 10:25:52'),
(50, 40, '1701948378_Prototipado.webp', 'portada', '2023-12-07 10:26:18', '2023-12-07 10:26:18'),
(52, 1, '1702298841_1701371370_flsunsr.jpg', 'galeria', '2023-12-11 11:47:21', '2023-12-12 10:43:46'),
(54, 1, '1702298866_1701947975_delta.jpeg', 'portada', '2023-12-11 11:47:46', '2023-12-12 10:43:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_20_162802_create_rols_table', 1),
(6, '2023_11_20_163029_create_categorias_table', 1),
(7, '2023_11_20_164035_add_role_id_to_users_table', 2),
(8, '2023_11_20_164515_create_productos_table', 3),
(9, '2023_11_19_164515_create_productos_table', 4),
(10, '2023_11_20_165240_create_imagen_productos_table', 5),
(11, '2023_11_20_165652_create_stock_productos_table', 6),
(12, '2023_11_20_165825_create_pedidos_table', 7),
(13, '2023_11_20_170051_create_detalle_pedidos_table', 8),
(14, '2014_10_12_100000_create_password_resets_table', 9),
(15, '2023_11_20_171228_add_user_type_to_users_table', 9),
(16, '2023_11_22_133409_add_cantidad_stock_productos_table', 10),
(17, '2023_11_22_180107_add_estado_to_detalle_pedidos_table', 11),
(18, '2023_11_22_180350_add_estado_to_pedidos_table', 12),
(19, '2023_12_09_180333_add_direccion_to_users', 13),
(20, '2023_12_11_152045_create_contactos_table', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('jcoronelcamacho@gmail.com', '$2y$12$34nXiFt9.xDggJEzMDOSJuwohoOwCRnXub7/zxmEyKkqjgnE9eYNq', '2023-12-11 16:06:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` enum('pendiente','completado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `fecha`, `created_at`, `updated_at`, `estado`) VALUES
(21, 2, '2023-11-22 10:00:00', '2023-11-22 17:26:43', '2023-11-22 17:17:22', 'completado'),
(22, 2, '2023-11-22 11:30:00', '2023-11-22 17:26:43', '2023-11-27 12:26:05', 'completado'),
(23, 3, '2023-11-22 14:00:00', '2023-11-22 17:26:43', '2023-11-22 20:00:04', 'completado'),
(29, 3, '2023-11-27 00:00:00', '2023-11-27 12:23:33', '2023-11-27 12:24:23', 'completado'),
(31, 3, '2023-11-27 00:00:00', '2023-11-27 15:23:09', '2023-12-08 19:17:39', 'completado'),
(32, 12, '2023-11-30 00:00:00', '2023-11-30 15:17:14', '2023-11-30 19:11:59', 'completado'),
(42, 12, '2023-12-10 00:00:00', '2023-12-10 18:19:47', '2023-12-11 17:22:18', 'completado'),
(43, 13, '2023-12-11 00:00:00', '2023-12-11 11:50:29', '2023-12-11 11:50:29', 'pendiente'),
(44, 15, '2023-12-11 00:00:00', '2023-12-11 17:22:51', '2023-12-11 17:23:26', 'completado'),
(45, 3, '2023-12-12 10:29:08', '2023-12-12 09:29:08', '2023-12-12 09:29:08', 'completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Impresora 3D Anet A8', 'Impresora 3D de escritorio DIY con área de impresión de 220x220x240mm', '167.00', '2023-11-22 13:19:34', '2023-11-30 18:06:24'),
(2, 2, 'Filamento PLA 1kg', 'Filamento PLA de 1.75mm de diámetro, biodegradable y no tóxico', '22.99', '2023-11-22 13:19:34', '2023-11-22 13:19:34'),
(3, 3, 'Resina UV', 'Resina UV estándar para impresoras 3D SLA, 500ml', '35.99', '2023-11-22 13:19:34', '2023-11-22 13:19:34'),
(4, 4, 'Espátula para impresión 3D', 'Espátula de acero inoxidable para facilitar la retirada de impresiones', '7.99', '2023-11-22 13:19:34', '2023-11-22 13:19:34'),
(5, 5, 'Modelo 3D de busto', 'Archivo digital de un busto para impresión 3D', '25.00', '2023-11-22 13:19:34', '2023-11-30 18:06:44'),
(6, 6, 'Placa base para Impresora 3D', 'Placa base de alto rendimiento para impresoras 3D', '65.99', '2023-11-22 14:35:17', '2023-11-22 14:35:17'),
(7, 7, 'Software de diseño 3D', 'Software avanzado para el diseño de modelos 3D', '120.00', '2023-11-22 14:35:17', '2023-11-22 14:35:17'),
(8, 8, 'Impresión 3D a pedido', 'Servicio de impresión 3D a pedido con materiales premium', '0.10', '2023-11-22 14:35:17', '2023-11-22 14:35:17'),
(28, 5, 'Thanos', 'Este es un modelo de Thanos', '33.00', '2023-11-24 17:31:27', '2023-11-24 17:31:27'),
(29, 2, 'Filamento azul', 'Filamento de color azul', '18.00', '2023-11-24 18:12:04', '2023-11-24 18:12:04'),
(30, 2, 'Filamento Rojo', 'Filamento de color rojo', '18.00', '2023-11-30 15:13:42', '2023-11-30 15:13:42'),
(31, 2, 'Filamento Verde', 'Filamento de color verde', '18.00', '2023-11-30 15:14:06', '2023-11-30 15:14:06'),
(32, 1, 'FLSUN Super Racer', 'La Super Racer de FLSUN es una impresora 3D delta muy económica que satisface las necesidades de un gran número de grupos y hace que tus ideas se hagan realidad en poco tiempo.', '568.00', '2023-11-30 18:07:50', '2023-11-30 18:07:50'),
(33, 1, 'Impresora 3D Delta Kossel', 'Impresora 3D tipo Delta con estructura de aluminio y cama caliente magnética.', '299.99', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(34, 2, 'Filamento PETG Transparente 1kg', 'Filamento PETG de 1.75mm transparente, ideal para proyectos que requieren durabilidad y claridad.', '22.99', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(35, 3, 'Resina Flexible 500g', 'Resina fotopolímera flexible para impresión 3D, compatible con impresoras DLP y SLA.', '35.50', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(36, 4, 'Boquilla de Titanio 0.4mm', 'Boquilla de alta durabilidad para impresoras 3D, resistente a la abrasión y la corrosión.', '14.75', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(37, 5, 'Figura Articulada Robótica', 'Modelo 3D de una figura robótica articulada lista para imprimir.', '49.99', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(38, 6, 'Kit de Rodamientos Lineales', 'Kit de rodamientos lineales para el mantenimiento y mejora de la impresora 3D.', '19.99', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(39, 7, 'Licencia Simplify3D Profesional', 'Software avanzado de impresión 3D para optimizar y personalizar los procesos de impresión.', '149.99', '2023-12-07 11:15:44', '2023-12-07 11:15:44'),
(40, 8, 'Prototipado Rápido a Pedido', 'Servicio de impresión 3D para la creación de prototipos rápidos y personalizados según las especificaciones del cliente.', '299.00', '2023-12-07 11:15:44', '2023-12-07 11:15:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'user', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_productos`
--

CREATE TABLE `stock_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `tipo` enum('inicio','compra') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inicio',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stock_productos`
--

INSERT INTO `stock_productos` (`id`, `producto_id`, `fecha`, `tipo`, `created_at`, `updated_at`, `cantidad`) VALUES
(1, 1, '2023-11-22 14:35:42', 'inicio', '2023-11-22 13:35:42', '2023-11-22 13:35:42', 50),
(2, 2, '2023-11-22 14:35:42', 'inicio', '2023-11-22 13:35:42', '2023-11-22 13:35:42', 10),
(3, 3, '2023-11-22 14:35:42', 'inicio', '2023-11-22 13:35:42', '2023-11-22 13:35:42', 40),
(4, 4, '2023-11-22 14:35:42', 'inicio', '2023-11-22 13:35:42', '2023-11-22 13:35:42', 5),
(5, 5, '2023-11-22 14:35:42', 'inicio', '2023-11-22 13:35:42', '2023-11-22 13:35:42', 35),
(11, 6, '2023-11-22 15:39:09', 'inicio', '2023-11-22 14:39:09', '2023-11-22 14:39:09', 10),
(12, 7, '2023-11-22 15:39:09', 'inicio', '2023-11-22 14:39:09', '2023-11-22 14:39:09', 20),
(13, 8, '2023-11-22 15:39:09', 'inicio', '2023-11-22 14:39:09', '2023-11-22 14:39:09', 15),
(19, 1, '2023-11-25 00:00:00', 'inicio', '2023-11-26 17:05:28', '2023-11-26 17:05:28', 12),
(20, 1, '2023-11-26 00:00:00', 'compra', '2023-11-26 17:05:54', '2023-11-26 17:05:54', 20),
(22, 1, '2023-11-26 19:41:52', 'compra', '2023-11-26 18:41:52', '2023-11-26 18:41:52', 4),
(23, 2, '2023-11-26 19:42:54', 'compra', '2023-11-26 18:42:54', '2023-11-26 18:42:54', 8),
(24, 2, '2023-11-27 13:23:48', 'compra', '2023-11-27 12:23:48', '2023-11-27 12:23:48', 2),
(25, 4, '2023-11-27 13:24:04', 'compra', '2023-11-27 12:24:04', '2023-11-27 12:24:04', 1),
(26, 4, '2023-11-30 16:17:46', 'compra', '2023-11-30 15:17:46', '2023-11-30 15:17:46', 1),
(27, 1, '2023-11-30 16:17:54', 'compra', '2023-11-30 15:17:54', '2023-11-30 15:17:54', 1),
(28, 7, '2023-11-30 16:18:04', 'compra', '2023-11-30 15:18:04', '2023-11-30 15:18:04', 1),
(29, 3, '2023-11-30 20:13:10', 'compra', '2023-11-30 19:13:10', '2023-11-30 19:13:10', 2),
(30, 4, '2023-12-10 19:20:06', 'compra', '2023-12-10 18:20:06', '2023-12-10 18:20:06', 1),
(31, 1, '2023-12-10 19:20:19', 'compra', '2023-12-10 18:20:19', '2023-12-10 18:20:19', 5),
(32, 40, '2023-12-12 00:00:00', 'inicio', '2023-12-11 11:49:48', '2023-12-11 11:49:48', 100),
(33, 40, '2023-12-11 12:50:59', 'compra', '2023-12-11 11:50:59', '2023-12-11 11:50:59', 50),
(34, 1, '2023-12-11 18:23:06', 'compra', '2023-12-11 17:23:06', '2023-12-11 17:23:06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `direccion`) VALUES
(2, 1, 'Administrador', 'admin@admin.com', '2023-11-20 16:31:43', '$2y$12$2amEyjzLSUqnxCtS1PBWeeOD7FLc784.JqO6xgUjGOtU/7DmznBti', 'admin', 'HWEwxXU1F8pA3r4cM1sOBel45yYmohGCCIHoGC7du0DkH8xeKvoxPEK3WwXq', '2023-11-20 16:31:43', '2023-11-20 16:31:43', NULL),
(3, 2, 'Jose Coronel', 'jcoronel@gmail.com', NULL, '$2y$12$.HTWI1dUsLtpGu.xbyrfJufCwv2dj1anrZsXIJhGrCnID3c1eTkK6', 'user', NULL, '2023-11-22 10:31:00', '2023-11-28 10:01:51', NULL),
(10, 2, 'Manuel Gonzalez', 'manuel@gmail.com', NULL, '$2y$12$tIg5IPlAoU8rL8JTU90ilOPn1v.Z7sXgs/nQBxelO2yVaReICqfIK', 'user', NULL, '2023-11-27 15:51:59', '2023-11-27 15:56:23', NULL),
(11, 2, 'Maria Lopez', 'marialopez@gmail.com', NULL, '$2y$12$UOmaID2W7emRquLrBlc87uN2zPvDGDY2NSC21aZB8mlkNRXXxWaYK', 'user', NULL, '2023-11-27 15:57:10', '2023-11-27 15:57:10', NULL),
(12, 2, 'Jose Manuel', 'karlion@gmail.com', NULL, '$2y$12$.HTWI1dUsLtpGu.xbyrfJufCwv2dj1anrZsXIJhGrCnID3c1eTkK6', 'user', NULL, '2023-11-27 15:57:34', '2023-11-27 15:57:34', NULL),
(13, 2, 'Rosa', 'rosa@gmail.com', NULL, '$2y$12$w5Yjr9T5sx0Ft46RXqgYA.H8eZtpJfcrTUX5ULA0vRnEn8mICubB6', 'user', NULL, '2023-11-27 15:57:50', '2023-11-27 15:57:50', NULL),
(15, 2, 'Profesor Alfonso', 'profeAlfonso@gmail.com', NULL, '$2y$12$/DFDEeDD/W8Vdf18PvtzlenBC5CH4xMzZi5Bq/hrdmBoRQKxOED7e', 'user', NULL, '2023-12-11 16:02:14', '2023-12-11 16:02:14', NULL),
(16, 2, 'José', 'jcoronelcamacho@gmail.com', NULL, '$2y$12$8z3zT6tYnYr2PF.q9/028.Ifg9r7rjzlWlyBiFY8QQS0HIq2wvwRa', 'user', NULL, '2023-12-11 16:06:31', '2023-12-11 16:06:31', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_pedidos_pedido_id_foreign` (`pedido_id`),
  ADD KEY `detalle_pedidos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `imagen_productos`
--
ALTER TABLE `imagen_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagen_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock_productos`
--
ALTER TABLE `stock_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen_productos`
--
ALTER TABLE `imagen_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `stock_productos`
--
ALTER TABLE `stock_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_pedidos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagen_productos`
--
ALTER TABLE `imagen_productos`
  ADD CONSTRAINT `imagen_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stock_productos`
--
ALTER TABLE `stock_productos`
  ADD CONSTRAINT `stock_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
