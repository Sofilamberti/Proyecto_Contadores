-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2020 a las 22:03:36
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contadores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cuit` varchar(45) NOT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `TipoSocietario_tipo_societario` varchar(50) NOT NULL,
  `domicilio_fiscal` varchar(45) DEFAULT NULL,
  `domicilio_legal` varchar(45) DEFAULT NULL,
  `cuenta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `apellido`, `cuit`, `dni`, `email`, `TipoSocietario_tipo_societario`, `domicilio_fiscal`, `domicilio_legal`, `cuenta_id`) VALUES
('Nestor', 'Lamberti', '22224568791', '22456789', 'fewerwed@gmail.com', 'Sociedad con participacion estatal mayoritaria', 'calle 874', 'calle 123', 1),
('Sofia', 'Lamberti', '23414763634', '41476363', 'lsofi@live.com.ar', 'Unipersonal', 'calle 123', 'Calle 15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `nombre_cuenta` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `titular` varchar(45) DEFAULT NULL,
  `cuit` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `nombre_cuenta`, `direccion`, `telefono`, `titular`, `cuit`) VALUES
(1, 'prueba', '13 bis 1094 oeste', 2302485309, 'sofi', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `etiqueta` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `id_rol` int(45) NOT NULL,
  `imagen` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `etiqueta`, `link`, `id_rol`, `imagen`) VALUES
(1, 'Inicio', '/home1.php', 1, '/Proyecto_Contadores/men1.png'),
(2, 'Base de Datos', '/bdd.php', 1, '/Proyecto_Contadores/men2.png'),
(3, 'Vinculaciones', '/vinculaciones.php', 1, '/Proyecto_Contadores/men3.png'),
(4, 'Tablero de Control', '/tabcont.php', 1, '/Proyecto_Contadores/men4.png'),
(5, 'Archivos', '/archivos.php', 1, '/Proyecto_Contadores/men5.png'),
(6, 'Comunicacion', '/comunicacion.php', 1, '/Proyecto_Contadores/men6.png'),
(7, 'Informes', '/informes.php', 1, '/Proyecto_Contadores/men7.png'),
(8, 'Normativa', '/normativa.php', 1, '/Proyecto_Contadores/men8.png'),
(9, 'Salir', '/logout.php', 1, '/Proyecto_Contadores/men9.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obligacion`
--

CREATE TABLE `obligacion` (
  `id` int(11) NOT NULL,
  `rubro` varchar(60) DEFAULT NULL,
  `impuesto` varchar(45) DEFAULT NULL,
  `grupo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `obligacion`
--

INSERT INTO `obligacion` (`id`, `rubro`, `impuesto`, `grupo`) VALUES
(1, 'Agentes Recaudacion ARBA', 'Percepciones iibb Bs As Reg Gral Quincenal', ''),
(2, 'Agentes Recaudacion ARBA', 'Percepciones iibb Bs As Reg Gral ', ''),
(3, 'a', 'bbb', ''),
(4, 'gy', 'jkiuh', ''),
(5, 'qwwer', 'gbe34fsd', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obligacionxcliente`
--

CREATE TABLE `obligacionxcliente` (
  `id_oxc` int(11) NOT NULL,
  `Cliente_cuit` varchar(45) NOT NULL,
  `Obligacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `obligacionxcliente`
--

INSERT INTO `obligacionxcliente` (`id_oxc`, `Cliente_cuit`, `Obligacion_id`) VALUES
(1, '22224568791', 2),
(2, '22224568791', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oxcxusuario`
--

CREATE TABLE `oxcxusuario` (
  `id_oxcxu` int(11) NOT NULL,
  `id_oxc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panel_de_control`
--

CREATE TABLE `panel_de_control` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `importe` int(11) NOT NULL,
  `periodo` date NOT NULL,
  `vencimiento` date NOT NULL,
  `id_oxc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion_rol`) VALUES
(1, 'administrador'),
(2, 'ayudante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `decripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareaxcliente`
--

CREATE TABLE `tareaxcliente` (
  `id_txc` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_cliente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposocietario`
--

CREATE TABLE `tiposocietario` (
  `tipo_societario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposocietario`
--

INSERT INTO `tiposocietario` (`tipo_societario`) VALUES
('Asociacion Civil'),
('Condominio'),
('Consorcio'),
('Cooperativa'),
('Fideicomiso'),
('Fundacion'),
('LLC'),
('SAS'),
('Sociedad  en Comandita por Acciones'),
('Sociedad  en Comandita Simple'),
('Sociedad Anonima'),
('Sociedad Civil'),
('Sociedad Colectiva'),
('Sociedad con participacion estatal mayoritaria'),
('Sociedad de Capital e Industria'),
('Sociedad de Hecho'),
('SRL'),
('Sucursal de Empresa Extranjera'),
('Unipersonal'),
('UTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `txcxusuario`
--

CREATE TABLE `txcxusuario` (
  `id_txcxu` int(11) NOT NULL,
  `id_txc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `Cuenta_id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `user`, `password`, `Cuenta_id`, `id_rol`, `email`) VALUES
(1, 'sofi', '1234', 1, 1, 'sofia@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cuit`),
  ADD KEY `fk_Cliente_TipoSocietario_idx` (`TipoSocietario_tipo_societario`),
  ADD KEY `fk_Cliente_cuentaId_idx` (`cuenta_id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_id_rol1` (`id_rol`) USING BTREE;

--
-- Indices de la tabla `obligacion`
--
ALTER TABLE `obligacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obligacionxcliente`
--
ALTER TABLE `obligacionxcliente`
  ADD PRIMARY KEY (`id_oxc`),
  ADD KEY `fk_Obligacionxcliente_Cliente_cuit1` (`Cliente_cuit`) USING BTREE,
  ADD KEY `fk_Obligacionxcliente_Obligacion_id1` (`Obligacion_id`) USING BTREE;

--
-- Indices de la tabla `oxcxusuario`
--
ALTER TABLE `oxcxusuario`
  ADD PRIMARY KEY (`id_oxcxu`),
  ADD KEY `fk_oxcxu_oxc` (`id_oxc`) USING BTREE,
  ADD KEY `fk_oxcxu_user_id` (`id_user`) USING BTREE;

--
-- Indices de la tabla `panel_de_control`
--
ALTER TABLE `panel_de_control`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_Tarea_Obligacionxcliente_id_oxc1` (`id_oxc`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareaxcliente`
--
ALTER TABLE `tareaxcliente`
  ADD PRIMARY KEY (`id_txc`),
  ADD KEY `fk_tareaxcliente_Cliente_cuit1` (`id_cliente`),
  ADD KEY `fk_tareaxcliente_id_tarea1` (`id_tarea`);

--
-- Indices de la tabla `tiposocietario`
--
ALTER TABLE `tiposocietario`
  ADD PRIMARY KEY (`tipo_societario`);

--
-- Indices de la tabla `txcxusuario`
--
ALTER TABLE `txcxusuario`
  ADD PRIMARY KEY (`id_txcxu`),
  ADD KEY `fk_txcxu_txc` (`id_txc`) USING BTREE,
  ADD KEY `fk_txcxu_id_user` (`id_user`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_Usuario_Cuenta1_idx` (`Cuenta_id`),
  ADD KEY `fk_Usuario_Rol1_idx` (`id_rol`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `obligacion`
--
ALTER TABLE `obligacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `obligacionxcliente`
--
ALTER TABLE `obligacionxcliente`
  MODIFY `id_oxc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `panel_de_control`
--
ALTER TABLE `panel_de_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `txcxusuario`
--
ALTER TABLE `txcxusuario`
  MODIFY `id_txcxu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cuenta_id`) REFERENCES `cuenta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Cliente_TipoSocietario` FOREIGN KEY (`TipoSocietario_tipo_societario`) REFERENCES `tiposocietario` (`tipo_societario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `obligacionxcliente`
--
ALTER TABLE `obligacionxcliente`
  ADD CONSTRAINT `obligacionxcliente_ibfk_1` FOREIGN KEY (`Cliente_cuit`) REFERENCES `cliente` (`cuit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obligacionxcliente_ibfk_2` FOREIGN KEY (`Obligacion_id`) REFERENCES `obligacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oxcxusuario`
--
ALTER TABLE `oxcxusuario`
  ADD CONSTRAINT `oxcxusuario_ibfk_1` FOREIGN KEY (`id_oxc`) REFERENCES `obligacionxcliente` (`id_oxc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oxcxusuario_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `panel_de_control`
--
ALTER TABLE `panel_de_control`
  ADD CONSTRAINT `panel_de_control_ibfk_1` FOREIGN KEY (`id_oxc`) REFERENCES `obligacionxcliente` (`id_oxc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareaxcliente`
--
ALTER TABLE `tareaxcliente`
  ADD CONSTRAINT `tareaxcliente_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tareaxcliente_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`cuit`);

--
-- Filtros para la tabla `txcxusuario`
--
ALTER TABLE `txcxusuario`
  ADD CONSTRAINT `txcxusuario_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `txcxusuario_ibfk_2` FOREIGN KEY (`id_txc`) REFERENCES `tareaxcliente` (`id_txc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Cuenta1` FOREIGN KEY (`Cuenta_id`) REFERENCES `cuenta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
