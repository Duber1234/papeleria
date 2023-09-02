-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2023 a las 19:14:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_cl` varchar(200) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `n_documento` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `celular1` varchar(20) NOT NULL,
  `celular2` varchar(20) NOT NULL,
  `celular3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cl`, `tipo_documento`, `n_documento`, `direccion`, `email`, `celular1`, `celular2`, `celular3`) VALUES
(1, 'Duber Felipe Pesca Lombana', 'CC', '1.057.606.748', 'calle 24 mz D casa 6 urbanizacion los alcarabanes, mani casanare', 'pescafelipe@gmail.com', '3142349563', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(800) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_fabrica` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `descripcion`, `cantidad`, `precio_fabrica`, `precio_venta`, `foto`) VALUES
(5, '', 'Colchoneta 1mtr', '', 18, 115000, 210000, NULL),
(6, '', 'Comedor 4 psts tamborado', '', 2, 420000, 790000, NULL),
(7, '', 'Comedor 6 psts flor morado', '', 1, 1250000, 2300000, NULL),
(8, '', 'Comedor 6 psts cedro', '', 1, 1150000, 2100000, NULL),
(9, '', 'comedor 4 psts cedro', '', 2, 890000, 1700000, NULL),
(10, '', 'Colchoneta 1.20mtr', '', 6, 21, 25, NULL),
(11, '', 'Colchoneta 1.40mtr', '', 6, 24, 29, NULL),
(12, '', 'Colchon Semi 1mtr', '', 3, 72, 86, NULL),
(13, '', 'Colchon Semi 1.20mtr', '', 3, 85, 102, NULL),
(14, '', 'Colchon Semi 1.40mtr', '', 3, 88, 106, NULL),
(15, '', 'Colchon Anat. 1mtr2', '', 1, 160, 192, NULL),
(16, '', 'Colchon Anat. 1.20mtr', '', 2, 173, 207, NULL),
(17, '', 'Colchon Anat. 1.40mtr', '', 3, 122, 146, NULL),
(18, '', 'Colchon Emperador King', '', 2, 740, 888, NULL),
(19, '', 'Colchon Clinico King', '', 1, 1, 1, NULL),
(20, '', 'Colchon Pillow 1.60', '', 2, 1, 1, NULL),
(21, '', 'Colchon Pillow 1.40', '', 2, 1, 1, NULL),
(22, '', 'Colchon Pillow Densa 1.40', '', 2, 1, 1, NULL),
(23, '', 'Colchon Clinico  Dens 1.40', '', 2, 1, 1, NULL),
(24, '', 'Ñlkplk', '', 12, 1250, 0, NULL),
(25, '001', 'Celular', '', 111, 9009, 11, NULL),
(28, '002', 'Carpeta Blanca Hoja De Vida Presentacion 2', 'El mundo es un lugar maravilloso, lleno de belleza y maravillas. Es nuestro deber protegerlo y preservarlo para las generaciones futuras x.', 99, 100000, 120000, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `n_documento` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `celular1` varchar(20) NOT NULL,
  `celular2` varchar(20) NOT NULL,
  `celular3` varchar(20) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `tipo_documento`, `n_documento`, `direccion`, `email`, `celular1`, `celular2`, `celular3`, `fecha_entrega`) VALUES
(2, 'Kalley', 'NIT', '23.725.856', 'CALLE 24 MZ D CS 6 URBANIZACION LOS ALCARABANEZ YOPAL', 'auberaelipe@gmail.com', '3107614750', '', '', '0000-00-00'),
(3, 'Villanueva EOC', 'NIT', '1.057.606.748', 'calle 24 mz D casa 6 urbanizacion los alcarabanes, mani casanare', '', '', '', '', '0000-00-00'),
(4, 'Villanueva EOC', 'NIT', '23.725.856', 'calle 24 mz D casa 6 urbanizacion los alcarabanes, mani casanare', 'pescafelipe@gmail.com', '', '', '', '2023-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_fabrica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `precio_fabrica`) VALUES
(1, 'Duber Felipe Pesca Lombana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_fabrica` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `idv` int(11) DEFAULT NULL COMMENT 'el id de la venta grupal por si se venden varios productos en un momento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cantidad`, `precio_fabrica`, `precio_venta`, `nombre_producto`, `descripcion`, `fecha`, `cliente`, `id_producto`, `codigo`, `idv`) VALUES
(1, 1, 160, 192, 'Colchon Anat. 1mtr PRUEBA ', '', '2023-08-25 16:05:27', 0, 15, '', NULL),
(2, 1, 160, 192, 'Colchon Anat. 1mtr PRUEBA', '', '2023-08-25 16:06:32', 1, 15, '', NULL),
(3, 1, 333333, 400000, '003', '', '2023-08-29 17:16:33', 0, 27, '', NULL),
(4, 1, 333333, 400000, 'Celular', '', '2023-08-29 17:17:07', 0, 27, '003', NULL),
(5, 1, 100000, 120000, 'Carpeta Blanca Hoja De Vida Presentacion ', '', '2023-08-31 17:22:21', 0, 28, '002', NULL),
(6, 1, 100000, 120000, 'Carpeta Blanca Hoja De Vida Presentacion ', '', '2023-08-31 17:26:36', 0, 28, '002', NULL),
(7, 1, 160, 192, 'Colchon Anat. 1mtr', '', '2023-08-31 17:28:11', 0, 15, '', NULL),
(8, 1, 100000, 120000, 'Carpeta Blanca Hoja De Vida Presentacion 3', '', '2023-08-31 17:42:22', 0, 28, '002', NULL),
(9, 1, 100000, 120000, 'Carpeta Blanca Hoja De Vida Presentacion 3', '', '2023-08-31 17:42:32', 0, 28, '002', NULL),
(10, 1, 100000, 120000, 'Carpeta Blanca Hoja De Vida Presentacion 2', 'El mundo es un lugar maravilloso, lleno de belleza y maravillas. Es nuestro deber protegerlo y preservarlo para las generaciones futuras x.', '2023-08-31 18:11:59', 0, 28, '002', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_ventas_productos_idx` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
