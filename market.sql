-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2023 a las 14:59:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `market`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_producto`
--

CREATE TABLE `categorias_producto` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias_producto`
--

INSERT INTO `categorias_producto` (`categoria_id`, `nombre`) VALUES
(1, 'Electrónica'),
(2, 'Ropa'),
(3, 'Alimentos'),
(4, 'Hogar'),
(5, 'Juguetes'),
(6, 'Deportes'),
(7, 'Muebles'),
(8, 'Joyería'),
(9, 'Salud y Belleza'),
(10, 'Libros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `empleado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `nombre`, `direccion`, `telefono`, `correo_electronico`, `producto_id`, `empleado_id`) VALUES
(1, 'Juan Pérez', '123 Calle Principal', '123-456-7890', 'juan@example.com', 1, 1),
(2, 'Ana García', '456 Avenida Central', '987-654-3210', 'ana@example.com', 2, 2),
(3, 'Carlos Rodríguez', '789 Calle Secundaria', '555-123-4567', 'carlos@example.com', 3, 3),
(4, 'María López', '101 Calle Residencial', '777-888-9999', 'maria@example.com', 4, 4),
(5, 'Sofía Martínez', '222 Calle Comercial', '111-222-3333', 'sofia@example.com', 5, 5),
(6, 'Luis Hernández', '333 Avenida del Pueblo', '444-555-6666', 'luis@example.com', 6, 6),
(7, 'Laura González', '444 Calle de la Playa', '777-888-1111', 'laura@example.com', 7, 7),
(8, 'Pedro Ramírez', '555 Calle Tranquila', '888-999-2222', 'pedro@example.com', 8, 8),
(9, 'Marta Sánchez', '666 Calle de Montaña', '111-222-4444', 'marta@example.com', 9, 9),
(10, 'Manuel Torres', '777 Calle del Río', '222-333-5555', 'manuel@example.com', 10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_de_inventario`
--

CREATE TABLE `control_de_inventario` (
  `Inventario_id` int(11) NOT NULL,
  `ubicacion_almacen` varchar(255) NOT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_salida` timestamp NULL DEFAULT NULL,
  `punt_reorden` varchar(255) DEFAULT NULL,
  `stock_producto` int(11) DEFAULT NULL,
  `nombre_stock` varchar(255) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empleado_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empleado_id`, `nombre`, `direccion`, `telefono`, `correo_electronico`, `cargo`) VALUES
(1, 'Juan Pérez', '123 Calle Principal', '123-456-7890', 'juan@example.com', 'Gerente de Tienda'),
(2, 'Ana García', '456 Avenida Central', '987-654-3210', 'ana@example.com', 'Vendedor'),
(3, 'Carlos Rodríguez', '789 Calle Secundaria', '555-123-4567', 'carlos@example.com', 'Vendedor'),
(4, 'María López', '101 Calle Residencial', '777-888-9999', 'maria@example.com', 'Cajero'),
(5, 'Sofía Martínez', '222 Calle Comercial', '111-222-3333', 'sofia@example.com', 'Vendedor'),
(6, 'Luis Hernández', '333 Avenida del Pueblo', '444-555-6666', 'luis@example.com', 'Gerente de Almacén'),
(7, 'Laura González', '444 Calle de la Playa', '777-888-1111', 'laura@example.com', 'Cajero'),
(8, 'Pedro Ramírez', '555 Calle Tranquila', '888-999-2222', 'pedro@example.com', 'Vendedor'),
(9, 'Marta Sánchez', '666 Calle de Montaña', '111-222-4444', 'marta@example.com', 'Gerente de Ventas'),
(10, 'Manuel Torres', '777 Calle del Río', '222-333-5555', 'manuel@example.com', 'Vendedor'),
(11, 'Isabel Ramírez', '888 Calle Tranquila', '333-444-5555', 'isabel@example.com', 'Vendedor'),
(12, 'Andrés López', '777 Avenida Principal', '222-111-3333', 'andres@example.com', 'Gerente de Tienda'),
(13, 'Carmen Martínez', '555 Calle Comercial', '999-888-7777', 'carmen@example.com', 'Cajero'),
(14, 'Pablo Rodríguez', '666 Calle Residencial', '777-555-4444', 'pablo@example.com', 'Vendedor'),
(15, 'Sara González', '123 Avenida del Pueblo', '555-444-3333', 'sara@example.com', 'Vendedor'),
(16, 'Fernando Pérez', '222 Calle de Montaña', '111-999-8888', 'fernando@example.com', 'Gerente de Almacén'),
(17, 'Luisa Sánchez', '444 Calle de la Playa', '777-666-5555', 'luisa@example.com', 'Cajero'),
(18, 'Diego García', '789 Calle Secundaria', '555-666-7777', 'diego@example.com', 'Vendedor'),
(19, 'Rosa Torres', '101 Calle del Río', '333-222-1111', 'rosa@example.com', 'Vendedor'),
(20, 'Javier Ramírez', '444 Avenida Central', '999-888-7777', 'javier@example.com', 'Gerente de Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `descripcion`, `precio`, `stock`, `proveedor_id`, `categoria_id`) VALUES
(1, '1', '1', 1.00, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedor_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedor_id`, `nombre`, `direccion`, `telefono`, `correo_electronico`) VALUES
(1, 'Proveedor Electrónica', '123 Calle de Proveedores', '123-456-7890', 'proveedor_electronica@example.com'),
(2, 'Proveedor Tecnología', '456 Avenida de Suministros', '987-654-3210', 'proveedor_tecnologia@example.com'),
(3, 'Proveedor Ropa', '789 Calle de Textiles', '555-123-4567', 'proveedor_ropa@example.com'),
(4, 'Proveedor Alimentos', '101 Calle de Alimentación', '777-888-9999', 'proveedor_alimentos@example.com'),
(5, 'Proveedor Muebles', '222 Calle de Mobiliario', '111-222-3333', 'proveedor_muebles@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `empleado_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_producto`
--
ALTER TABLE `categorias_producto`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `control_de_inventario`
--
ALTER TABLE `control_de_inventario`
  ADD PRIMARY KEY (`Inventario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleado_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `proveedor_id` (`proveedor_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `empleado_id` (`empleado_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_de_inventario`
--
ALTER TABLE `control_de_inventario`
  ADD CONSTRAINT `control_de_inventario_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`proveedor_id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`empleado_id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
