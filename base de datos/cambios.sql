ALTER TABLE `productos` ADD `descripcion` VARCHAR(800) NOT NULL AFTER `nombre`;
ALTER TABLE `ventas` ADD `descripcion` VARCHAR(200) NOT NULL AFTER `nombre_producto`;



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
  `celular3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
ALTER TABLE `proveedores` ADD `fecha_entrega` DATE NOT NULL AFTER `celular3`;