-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2024 a las 02:07:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reposteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_ticket`
--

CREATE TABLE `cabecera_ticket` (
  `ID_CABECERA_TICKET` int(11) NOT NULL,
  `ID_VENTA` int(11) DEFAULT NULL,
  `ID_VENDEDOR` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_DESCUENTO` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cabecera_ticket`
--

INSERT INTO `cabecera_ticket` (`ID_CABECERA_TICKET`, `ID_VENTA`, `ID_VENDEDOR`, `ID_USUARIO`, `ID_DESCUENTO`, `FECHA`) VALUES
(5, 1, 1, 1, 1, '2024-11-30'),
(6, 2, 2, 2, 2, '2024-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `CATEGORIA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `CATEGORIA`) VALUES
(1, 'Pasteles'),
(2, 'Galletas'),
(3, 'Panadería'),
(4, 'Postres Helados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ID_CIUDAD` int(11) NOT NULL,
  `CIUDAD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ID_CIUDAD`, `CIUDAD`) VALUES
(1, 'Ciudad de México'),
(2, 'Guadalajara'),
(3, 'Monterrey'),
(4, 'Puebla'),
(5, 'Ciudad de México'),
(6, 'Guadalajara'),
(7, 'Monterrey'),
(8, 'Puebla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `ID_DESCUENTO` int(11) NOT NULL,
  `DESCUENTO` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuento`
--

INSERT INTO `descuento` (`ID_DESCUENTO`, `DESCUENTO`) VALUES
(1, 10.00),
(2, 5.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ticket`
--

CREATE TABLE `detalle_ticket` (
  `ID_DETALLE_TICKET` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO_UNITARIO` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_ticket`
--

INSERT INTO `detalle_ticket` (`ID_DETALLE_TICKET`, `ID_PRODUCTO`, `CANTIDAD`, `PRECIO_UNITARIO`) VALUES
(1, 1, 1, 250.00),
(2, 3, 2, 30.00),
(3, 6, 3, 150.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_GENERO` int(11) NOT NULL,
  `GENERO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_GENERO`, `GENERO`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'No Binario'),
(4, 'Otro'),
(5, 'Masculino'),
(6, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_de_deseos`
--

CREATE TABLE `lista_de_deseos` (
  `ID_LISTA_DE_DESEOS` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_de_deseos`
--

INSERT INTO `lista_de_deseos` (`ID_LISTA_DE_DESEOS`, `ID_USUARIO`, `ID_PRODUCTO`) VALUES
(1, 1, 4),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `COSTO` decimal(10,2) DEFAULT NULL,
  `FECHA_CADUCIDAD` date DEFAULT NULL,
  `ID_CATEGORIA` int(11) DEFAULT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `IMAGEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE`, `COSTO`, `FECHA_CADUCIDAD`, `ID_CATEGORIA`, `DESCRIPCION`, `IMAGEN`) VALUES
(1, 'Pastel de Chocolate', 250.00, '2024-12-31', 1, 'Delicioso pastel de chocolate con cobertura de ganache.', '1.jpg'),
(2, 'Galletas de Avena', 50.00, '2025-01-15', 2, 'Crujientes galletas de avena con pasas.', '2.jpg'),
(3, 'Pan de Muerto', 30.00, '2024-11-30', 3, 'Tradicional pan de muerto, suave y esponjoso.', '3.jpg'),
(4, 'Helado de Vainilla', 100.00, '2025-03-01', 4, 'Helado artesanal de vainilla, sin conservadores.', '4.jpg'),
(5, 'Tarta de Frutas', 200.00, '2024-12-15', 1, 'Tarta fresca con frutas de temporada.', '5.jpg'),
(6, 'Macarons', 150.00, '2025-01-01', 2, 'Coloridos macarons franceses con relleno de crema.', '6.jpg'),
(7, 'Rosca de Reyes', 300.00, '2024-12-31', 3, 'Rosca de reyes tradicional, con frutas confitadas.', '7.jpg'),
(8, 'Gelatina de Fresa', 40.00, '2025-02-28', 4, 'Gelatina casera de fresa con trozos de fruta.', '8.jpg'),
(9, 'Dacquoise', 150.00, '2024-11-22', 1, 'Es también conocido como pastel de merengue japonés, para realizarlo se prepara una mezcla de polvo o harina de nueces junto con un merengue francés, es decir, un merengue crudo.', '9.jpg'),
(10, 'Angel food', 100.00, '2024-11-23', 1, 'Este tipo de pastel consiguió su nombre gracias a que tiene una textura aireada y suave, digna de los ángeles.', '10.jpg'),
(11, 'Pastel de zanahoria', 140.00, '2024-11-22', 1, 'Una receta que combina perfectamente sabores como la canela, nuez moscada, clavo, piña, coco, nueces, chocolate, higos, jengibre cristalizado y algunas frutas deshidratadas.', '11.jpg'),
(12, 'Pasteles de natilla', 180.00, '2024-11-23', 1, 'Este tipo de pasteles requiere de la preparación de una natilla o crema espesa que pueda cocinarse en baño maría o en el horno a una temperatura media-baja, algunos de los más famosos son los pasteles de queso o cheesecakes. ', '12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_SUCURSAL` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `ID_CIUDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID_SUCURSAL`, `NOMBRE`, `DIRECCION`, `ID_CIUDAD`) VALUES
(1, 'Sucursal Central', 'Av. Reforma 123, Ciudad de México', 1),
(2, 'Sucursal Norte', 'Calle Juárez 45, Monterrey', 3),
(3, 'Sucursal Sur', 'Blvd. Insurgentes 67, Puebla', 4),
(4, 'Sucursal Central', 'Av. Reforma 123, Ciudad de México', 1),
(5, 'Sucursal Norte', 'Calle Juárez 45, Monterrey', 3),
(6, 'Sucursal Sur', 'Blvd. Insurgentes 67, Puebla', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `ID_CIUDAD` int(11) DEFAULT NULL,
  `ID_GENERO` int(11) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `CONTRASENA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDO`, `DIRECCION`, `ID_CIUDAD`, `ID_GENERO`, `RFC`, `TELEFONO`, `EMAIL`, `CONTRASENA`) VALUES
(1, 'Juan', 'Pérez', 'Av. Revolución 456, Ciudad de México', 1, 1, 'JUP123456XYZ', '5512345678', 'juan.perez@gmail.com', '1234'),
(2, 'María', 'González', 'Calle Hidalgo 789, Guadalajara', 2, 2, 'MAG890123ABC', '3335678901', 'maria.gonzalez@yahoo.com', '5678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `ID_VENDEDOR` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `ID_CIUDAD` int(11) DEFAULT NULL,
  `ID_GENERO` int(11) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `ID_SUCURSAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`ID_VENDEDOR`, `NOMBRE`, `APELLIDO`, `DIRECCION`, `ID_CIUDAD`, `ID_GENERO`, `RFC`, `TELEFONO`, `ID_SUCURSAL`) VALUES
(1, 'Carlos', 'Ramírez', 'Calle Reforma 123, Monterrey', 3, 1, 'CAR780912XYZ', '8182345678', 2),
(2, 'Lucía', 'Martínez', 'Blvd. Vallejo 456, Ciudad de México', 1, 2, 'LUM650823ABC', '5556789012', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID_VENTA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`ID_VENTA`, `ID_PRODUCTO`, `ID_USUARIO`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 6, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabecera_ticket`
--
ALTER TABLE `cabecera_ticket`
  ADD PRIMARY KEY (`ID_CABECERA_TICKET`),
  ADD KEY `ID_VENTA` (`ID_VENTA`),
  ADD KEY `ID_VENDEDOR` (`ID_VENDEDOR`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_DESCUENTO` (`ID_DESCUENTO`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ID_CIUDAD`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`ID_DESCUENTO`);

--
-- Indices de la tabla `detalle_ticket`
--
ALTER TABLE `detalle_ticket`
  ADD PRIMARY KEY (`ID_DETALLE_TICKET`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Indices de la tabla `lista_de_deseos`
--
ALTER TABLE `lista_de_deseos`
  ADD PRIMARY KEY (`ID_LISTA_DE_DESEOS`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_SUCURSAL`),
  ADD KEY `ID_CIUDAD` (`ID_CIUDAD`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `ID_CIUDAD` (`ID_CIUDAD`),
  ADD KEY `ID_GENERO` (`ID_GENERO`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`ID_VENDEDOR`),
  ADD KEY `ID_CIUDAD` (`ID_CIUDAD`),
  ADD KEY `ID_GENERO` (`ID_GENERO`),
  ADD KEY `ID_SUCURSAL` (`ID_SUCURSAL`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID_VENTA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabecera_ticket`
--
ALTER TABLE `cabecera_ticket`
  MODIFY `ID_CABECERA_TICKET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ID_CIUDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `ID_DESCUENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_ticket`
--
ALTER TABLE `detalle_ticket`
  MODIFY `ID_DETALLE_TICKET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lista_de_deseos`
--
ALTER TABLE `lista_de_deseos`
  MODIFY `ID_LISTA_DE_DESEOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `ID_SUCURSAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `ID_VENDEDOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID_VENTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabecera_ticket`
--
ALTER TABLE `cabecera_ticket`
  ADD CONSTRAINT `cabecera_ticket_ibfk_1` FOREIGN KEY (`ID_VENTA`) REFERENCES `venta` (`ID_VENTA`),
  ADD CONSTRAINT `cabecera_ticket_ibfk_2` FOREIGN KEY (`ID_VENDEDOR`) REFERENCES `vendedor` (`ID_VENDEDOR`),
  ADD CONSTRAINT `cabecera_ticket_ibfk_3` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `cabecera_ticket_ibfk_4` FOREIGN KEY (`ID_DESCUENTO`) REFERENCES `descuento` (`ID_DESCUENTO`);

--
-- Filtros para la tabla `detalle_ticket`
--
ALTER TABLE `detalle_ticket`
  ADD CONSTRAINT `detalle_ticket_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `lista_de_deseos`
--
ALTER TABLE `lista_de_deseos`
  ADD CONSTRAINT `lista_de_deseos_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `lista_de_deseos_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ciudad` (`ID_CIUDAD`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ciudad` (`ID_CIUDAD`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_GENERO`) REFERENCES `genero` (`ID_GENERO`);

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `vendedor_ibfk_1` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ciudad` (`ID_CIUDAD`),
  ADD CONSTRAINT `vendedor_ibfk_2` FOREIGN KEY (`ID_GENERO`) REFERENCES `genero` (`ID_GENERO`),
  ADD CONSTRAINT `vendedor_ibfk_3` FOREIGN KEY (`ID_SUCURSAL`) REFERENCES `sucursal` (`ID_SUCURSAL`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
