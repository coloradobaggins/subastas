-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2018 a las 13:51:08
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `subastas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_combustible`
--

CREATE TABLE `autos_combustible` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos_combustible`
--

INSERT INTO `autos_combustible` (`id`, `nombre`, `estado`) VALUES
(1, 'Nafta', 1),
(2, 'Nafta/GNC', 1),
(3, 'Diesel', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_gastos_gestoria`
--

CREATE TABLE `autos_gastos_gestoria` (
  `id` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_usuario_pago` int(11) DEFAULT NULL,
  `monto` int(6) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos_gastos_gestoria`
--

INSERT INTO `autos_gastos_gestoria` (`id`, `id_auto`, `id_usuario_pago`, `monto`, `observacion`, `pagado`, `fecha_pago`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(1, 2, 2, 30000, 'Gastos de gestor, patentamiento, etc', 0, '0000-00-00', '2018-10-01', '12:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_gastos_infracciones`
--

CREATE TABLE `autos_gastos_infracciones` (
  `id` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_usuario_pago` int(11) DEFAULT NULL,
  `monto` int(6) NOT NULL,
  `fecha_infraccion` date NOT NULL,
  `lugar` varchar(80) NOT NULL,
  `observacion` text,
  `pagado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_gastos_otros`
--

CREATE TABLE `autos_gastos_otros` (
  `id` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_usuario_pago` int(11) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `observacion` text NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha_realizacion` date DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos_gastos_otros`
--

INSERT INTO `autos_gastos_otros` (`id`, `id_auto`, `id_usuario_pago`, `monto`, `observacion`, `pagado`, `fecha_realizacion`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(1, 5, 1, 123, 'prueba otro gasto', 0, '2018-10-26', '2018-10-18', '22:38:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_gastos_patentes`
--

CREATE TABLE `autos_gastos_patentes` (
  `id` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_usuario_pago` int(11) DEFAULT NULL,
  `monto` int(6) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto_comprado`
--

CREATE TABLE `auto_comprado` (
  `id` int(11) NOT NULL,
  `id_subasta` int(11) DEFAULT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `ano` int(4) NOT NULL,
  `dominio` varchar(10) NOT NULL,
  `kms` int(7) DEFAULT NULL,
  `radicacion` varchar(80) NOT NULL,
  `id_combustible` int(11) NOT NULL,
  `arranca` tinyint(1) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `monto` int(6) DEFAULT NULL,
  `gastos_gestor` int(6) DEFAULT NULL,
  `id_usuario_comprador` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auto_comprado`
--

INSERT INTO `auto_comprado` (`id`, `id_subasta`, `marca`, `modelo`, `ano`, `dominio`, `kms`, `radicacion`, `id_combustible`, `arranca`, `observacion`, `monto`, `gastos_gestor`, `id_usuario_comprador`, `fecha_compra`, `id_usuario`, `fecha`, `hora`, `estado`) VALUES
(4, 2, 'Ford', 'Focus exe style 1.6', 2010, 'JGM542', 247574, 'CABA', 1, 0, '-No arranca, con posibles faltantes', 121000, 13800, 2, '2018-10-09', 1, '2018-10-09', '16:39:17', 1),
(5, 7, 'Volkswagen', 'Suran 1.6L', 2012, 'LTH041', 204584, 'CABA', 1, 1, 'Carroceria afectada por golpes y raspones', 167000, 13480, 1, '2018-10-25', 1, '2018-10-23', '23:30:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto_comprado_deudas`
--

CREATE TABLE `auto_comprado_deudas` (
  `id` int(11) NOT NULL,
  `id_auto_comprado` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `detalle` text NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `id_usuario_pago` int(11) DEFAULT NULL,
  `fechaPago` date DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastosgenerales`
--

CREATE TABLE `gastosgenerales` (
  `id` int(11) NOT NULL,
  `monto` int(7) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `id_usuarioCompra` int(11) NOT NULL,
  `fechaCompra` date NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastosgenerales`
--

INSERT INTO `gastosgenerales` (`id`, `monto`, `observacion`, `id_usuarioCompra`, `fechaCompra`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(2, 140, 'Silicona para interior', 2, '2018-09-28', '2018-09-29', '20:26:00', 1, 1),
(3, 235, 'Limpia tapizados Revigal', 1, '2018-09-29', '2018-09-29', '20:38:00', 1, 1),
(4, 45, 'Pincel para interior', 1, '2018-09-29', '2018-09-29', '20:40:00', 1, 1),
(5, 850, '2 Esmaltes retoque pintura, Blanco Oxdord (focus) y Verde Amazonas (Kangoo) + Envio. Mercadolibre', 1, '2018-10-01', '2018-10-01', '12:00:00', 1, 1),
(6, 990, 'Lijas, aerosol, pasta pulir, cera lustre, etc', 2, '2018-10-10', '2018-10-22', '09:00:00', 1, 1),
(8, 800, 'kms focus colo', 1, '2018-10-24', '2018-10-24', '23:38:25', 1, 1),
(9, 400, 'kms focus colo', 2, '2018-10-24', '2018-10-24', '23:39:07', 1, 1),
(10, 200, 'nafta focus colo', 1, '2018-10-24', '2018-10-24', '23:40:37', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_autos`
--

CREATE TABLE `subastas_autos` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `dominio` varchar(10) NOT NULL,
  `kms` int(7) DEFAULT NULL,
  `radicacion` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `id_combustible` int(11) NOT NULL,
  `arranca` tinyint(1) NOT NULL,
  `iva_incluido` tinyint(1) NOT NULL DEFAULT '1',
  `comision` smallint(3) NOT NULL DEFAULT '10',
  `observacion` text,
  `deuda_patente` int(6) NOT NULL,
  `deuda_infr_caba` int(6) NOT NULL,
  `deuda_infr_bsas` int(6) NOT NULL,
  `visita_observaciones` text,
  `visita_puntaje` int(1) DEFAULT NULL,
  `visita_valor_aprox` int(11) DEFAULT NULL,
  `valor_puja` int(7) NOT NULL,
  `precio_lista` int(7) NOT NULL,
  `gastos_aprox_gestor` int(6) NOT NULL,
  `url_narvaez` varchar(250) DEFAULT NULL,
  `fecha_cierre` date NOT NULL,
  `hora_cierre` time NOT NULL,
  `comprado` tinyint(1) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastas_autos`
--

INSERT INTO `subastas_autos` (`id`, `id_vendedor`, `marca`, `modelo`, `ano`, `dominio`, `kms`, `radicacion`, `ubicacion`, `id_combustible`, `arranca`, `iva_incluido`, `comision`, `observacion`, `deuda_patente`, `deuda_infr_caba`, `deuda_infr_bsas`, `visita_observaciones`, `visita_puntaje`, `visita_valor_aprox`, `valor_puja`, `precio_lista`, `gastos_aprox_gestor`, `url_narvaez`, `fecha_cierre`, `hora_cierre`, `comprado`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(2, 3, 'Ford', 'Focus exe style 1.6', 2010, 'JGM542', 247574, 'CABA', 'Campana', 1, 0, 1, 10, '-No arranca, con posibles faltantes', 0, 0, 0, 'El auto arranca', 8, NULL, 121000, 178543, 13800, NULL, '2018-08-03', '14:00:00', 1, '2018-09-27', '19:11:00', 1, 1),
(4, 3, 'Ford', 'Focus exe style 1.6', 2010, 'JGM544', 211237, 'CABA', 'Campana', 1, 0, 1, 10, '-No arranca, con posible faltantes', 0, 0, 0, 'Arranca', 8, NULL, 121000, 178543, 13800, NULL, '2018-08-03', '14:00:00', 0, '2018-09-27', '19:15:00', 1, 1),
(6, 2, 'Volkswagen', 'Suran 1.6L', 2011, 'JSC600', NULL, 'CABA', 'Tortuguitas', 1, 1, 1, 10, 'Arranca, carroceria afectada por raspones', 0, 0, 0, NULL, NULL, NULL, 133000, 180000, 13480, NULL, '2018-09-26', '11:00:00', 0, '2018-09-27', '19:32:00', 1, 1),
(7, 2, 'Volkswagen', 'Suran 1.6L', 2012, 'LTH041', 204584, 'CABA', 'Tortuguitas', 1, 1, 1, 10, 'Carroceria afectada por golpes y raspones', 0, 0, 0, NULL, NULL, NULL, 132000, 180000, 13480, NULL, '2018-09-26', '11:00:00', 1, '2018-09-27', '19:36:00', 1, 1),
(8, 1, 'PRUEBA', 'PRUEBA', 2018, 'AA123CC', 1, 'CABA', 'CABA', 1, 1, 1, 10, 'CERO, A TRASLADAR DE AGENCIA.', 0, 0, 0, NULL, NULL, NULL, 203000, 0, 0, NULL, '2018-09-29', '20:00:00', 0, '2018-09-29', '22:38:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_gastos_otros`
--

CREATE TABLE `subastas_gastos_otros` (
  `id` int(11) NOT NULL,
  `idAutoSubasta` int(11) NOT NULL,
  `observacion` varchar(60) NOT NULL,
  `monto` int(6) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastas_gastos_otros`
--

INSERT INTO `subastas_gastos_otros` (`id`, `idAutoSubasta`, `observacion`, `monto`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(1, 8, 'PATENTAMIENTO Y TRASLADO APROX', 40000, '2018-09-29', '23:00:00', 1, 1),
(2, 2, 'acarreo', 2000, '2018-09-30', '15:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_gestion_admin`
--

CREATE TABLE `subastas_gestion_admin` (
  `id` int(11) NOT NULL,
  `valor_oferta_desde` decimal(9,2) NOT NULL,
  `valor_oferta_hasta` decimal(9,2) NOT NULL,
  `monto` int(7) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastas_gestion_admin`
--

INSERT INTO `subastas_gestion_admin` (`id`, `valor_oferta_desde`, `valor_oferta_hasta`, `monto`, `estado`) VALUES
(1, '0.01', '5000.00', 250, 1),
(2, '5001.00', '15000.00', 750, 1),
(3, '15001.00', '30000.00', 1500, 1),
(4, '30001.00', '50000.00', 2200, 1),
(5, '50001.00', '100000.00', 4100, 1),
(6, '100001.00', '150000.00', 6000, 1),
(7, '150001.00', '200000.00', 8000, 1),
(8, '200001.00', '500000.00', 10500, 1),
(9, '500001.00', '1000000.00', 15000, 1),
(10, '1000001.00', '0.00', 24000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_usuarios`
--

CREATE TABLE `subastas_usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `pass` varchar(120) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastas_usuarios`
--

INSERT INTO `subastas_usuarios` (`id`, `user`, `mail`, `pass`, `nombre`, `estado`) VALUES
(1, 'remache01', 'colo@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 'Colo', 1),
(2, 'tuerca01', 'kgrefrigeracion@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 'Alan', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_valor_calle`
--

CREATE TABLE `subastas_valor_calle` (
  `id` int(11) NOT NULL COMMENT 'Agregar montos de un modelos de vehículo, para luego poder promediar un estimado',
  `id_auto` int(11) NOT NULL,
  `valor` int(7) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastas_valor_calle`
--

INSERT INTO `subastas_valor_calle` (`id`, `id_auto`, `valor`, `url`, `estado`) VALUES
(2, 2, 209000, NULL, 1),
(3, 4, 209000, NULL, 1),
(4, 2, 190000, NULL, 1),
(5, 4, 190000, NULL, 1),
(6, 2, 238000, NULL, 1),
(7, 4, 238000, NULL, 1),
(8, 2, 245000, NULL, 1),
(9, 4, 245000, NULL, 1),
(10, 2, 235000, NULL, 1),
(11, 4, 235000, NULL, 1),
(16, 6, 220000, NULL, 1),
(17, 7, 220000, NULL, 1),
(18, 6, 240000, NULL, 1),
(19, 7, 240000, NULL, 1),
(21, 7, 189000, NULL, 1),
(22, 6, 200000, NULL, 1),
(23, 7, 200000, NULL, 1),
(24, 6, 245000, NULL, 1),
(25, 7, 245000, NULL, 1),
(26, 6, 230000, NULL, 1),
(27, 7, 230000, NULL, 1),
(28, 8, 340000, 'prueba de carga', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas_vendedor`
--

CREATE TABLE `subastas_vendedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastas_vendedor`
--

INSERT INTO `subastas_vendedor` (`id`, `nombre`, `estado`) VALUES
(1, 'Narvaez Bid', 1),
(2, 'BASF', 1),
(3, 'Bunge (cerealera)', 1),
(4, 'N/A', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos_combustible`
--
ALTER TABLE `autos_combustible`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autos_gastos_gestoria`
--
ALTER TABLE `autos_gastos_gestoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGastoGestoria_idAuto_fk_idx` (`id_auto`),
  ADD KEY `idGastosGestoria_idUsuario_fk_idx` (`id_usuario_pago`),
  ADD KEY `idGastosGestoria_idUsuario_fk_idx1` (`id_usuario`);

--
-- Indices de la tabla `autos_gastos_infracciones`
--
ALTER TABLE `autos_gastos_infracciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGastosInfr_idAuto_fk_idx` (`id_auto`),
  ADD KEY `idGastosInfr_idUsuarioPago_fk_idx` (`id_usuario_pago`),
  ADD KEY `idGastosInfr_idUsuario_fk_idx` (`id_usuario`);

--
-- Indices de la tabla `autos_gastos_otros`
--
ALTER TABLE `autos_gastos_otros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGastosOtros_idAuto_fk_idx` (`id_auto`),
  ADD KEY `idGastosOtros_idUsuario_fk_idx` (`id_usuario_pago`),
  ADD KEY `idGastosOtros_idUsuario_fk_idx1` (`id_usuario`);

--
-- Indices de la tabla `autos_gastos_patentes`
--
ALTER TABLE `autos_gastos_patentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGastosPat_idAuto_fk_idx` (`id_auto`),
  ADD KEY `idGastosPat_idUsuarioComprador_fk_idx` (`id_usuario_pago`),
  ADD KEY `idGastosPat_idUsuario_fk_idx` (`id_usuario`);

--
-- Indices de la tabla `auto_comprado`
--
ALTER TABLE `auto_comprado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auto_comprado_deudas`
--
ALTER TABLE `auto_comprado_deudas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastosgenerales`
--
ALTER TABLE `gastosgenerales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuarioCompraGasto_idUsuario_fk_idx` (`id_usuarioCompra`),
  ADD KEY `idUsuarioCompraCarga_idUsuario_fk_idx` (`id_usuario`);

--
-- Indices de la tabla `subastas_autos`
--
ALTER TABLE `subastas_autos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVendedor_Vendedor_fk_idx` (`id_vendedor`),
  ADD KEY `idAuto_idUsuario_fk_idx` (`id_usuario`),
  ADD KEY `idAuto_idCombustible_fk_idx` (`id_combustible`);

--
-- Indices de la tabla `subastas_gastos_otros`
--
ALTER TABLE `subastas_gastos_otros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGastosOtros_idAutoSubasta_fk_idx` (`idAutoSubasta`),
  ADD KEY `idGastosOtros_idUsuario_fk_idx` (`id_usuario`);

--
-- Indices de la tabla `subastas_gestion_admin`
--
ALTER TABLE `subastas_gestion_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subastas_usuarios`
--
ALTER TABLE `subastas_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subastas_valor_calle`
--
ALTER TABLE `subastas_valor_calle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idValorCalle_idAuto_fk_idx` (`id_auto`);

--
-- Indices de la tabla `subastas_vendedor`
--
ALTER TABLE `subastas_vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos_combustible`
--
ALTER TABLE `autos_combustible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_gestoria`
--
ALTER TABLE `autos_gastos_gestoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_infracciones`
--
ALTER TABLE `autos_gastos_infracciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_otros`
--
ALTER TABLE `autos_gastos_otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_patentes`
--
ALTER TABLE `autos_gastos_patentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `auto_comprado`
--
ALTER TABLE `auto_comprado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `auto_comprado_deudas`
--
ALTER TABLE `auto_comprado_deudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gastosgenerales`
--
ALTER TABLE `gastosgenerales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `subastas_autos`
--
ALTER TABLE `subastas_autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `subastas_gastos_otros`
--
ALTER TABLE `subastas_gastos_otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `subastas_gestion_admin`
--
ALTER TABLE `subastas_gestion_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `subastas_usuarios`
--
ALTER TABLE `subastas_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `subastas_valor_calle`
--
ALTER TABLE `subastas_valor_calle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Agregar montos de un modelos de vehículo, para luego poder promediar un estimado', AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `subastas_vendedor`
--
ALTER TABLE `subastas_vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
