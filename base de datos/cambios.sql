ALTER TABLE `productos` ADD `descripcion` VARCHAR(800) NOT NULL AFTER `nombre`;
ALTER TABLE `ventas` ADD `descripcion` VARCHAR(200) NOT NULL AFTER `nombre_producto`;