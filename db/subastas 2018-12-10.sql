-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2018 a las 15:58:36
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
(1, 1, 2, 1000, 'Formulario ceta', 1, '2018-10-23', '2018-10-29', '10:00:00', 1, 1),
(2, 2, 2, 3000, 'Para infracciones pendientes', 1, '2018-11-30', '2018-12-02', '09:37:10', 1, 1),
(3, 2, 2, 2000, 'prueba', 1, '2018-01-01', '2018-12-05', '00:29:25', 1, 0);

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
  `fechaPago` date DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos_gastos_infracciones`
--

INSERT INTO `autos_gastos_infracciones` (`id`, `id_auto`, `id_usuario_pago`, `monto`, `fecha_infraccion`, `lugar`, `observacion`, `pagado`, `fechaPago`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(1, 1, 1, 4000, '2018-10-02', 'Entre rios', 'Multa por estacionar mal', 0, '2018-01-01', '2018-10-29', '15:00:00', 1, 1),
(2, 2, 2, 10000, '2018-01-01', 'CABA', 'Semaforo en rojo', 0, NULL, '2018-12-02', '09:37:42', 1, 1),
(3, 2, 1, 4000, '2010-10-10', 'CABA', 'Senda peatonal', 0, NULL, '2018-12-03', '20:44:09', 1, 1),
(4, 2, 1, 2000, '2018-01-01', 'bs as', 'vel max', 0, NULL, '2018-12-05', '00:02:42', 1, 1),
(5, 2, 2, 5000, '2018-10-10', 'santa fe', 'PRUEBA', 0, NULL, '2018-12-05', '00:30:17', 1, 1);

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
  `fechaPago` date DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos_gastos_otros`
--

INSERT INTO `autos_gastos_otros` (`id`, `id_auto`, `id_usuario_pago`, `monto`, `observacion`, `pagado`, `fechaPago`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(1, 1, 2, 1200, 'Kms a este auto de prueba', 1, '2018-10-25', '2018-10-28', '15:00:00', 1, 1),
(2, 2, 1, 1200, 'Bajar kms', 1, '2018-11-01', '2018-12-03', '20:44:34', 1, 1),
(3, 2, 2, 1000, 'prueba', 0, '0000-00-00', '2018-12-05', '00:57:14', 1, 1);

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
  `fechaPago` date DEFAULT NULL,
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
(1, 13, 'Prueba', 'Prueba', 2018, 'ac123kw', 15000, 'Campana', 3, 1, NULL, 154000, 0, 1, '2018-10-29', 1, '2018-10-28', '23:20:04', 1),
(2, 9, 'Ford', 'Focus exe style 1.6', 2010, 'JGM542', 247574, 'CABA', 1, 1, '-No arranca, con posibles faltantes', 121000, 13800, 2, '2018-10-21', 1, '2018-11-21', '14:43:07', 1),
(3, 21, 'Volks22', 'gol22', 2000, 'asd123', 12344, 'bsas', 1, 0, 'asdasdasdasd', 130000, 12000, 1, '2018-12-06', 1, '2018-12-06', '23:33:35', 1),
(4, 20, 'Volks', 'gol', 2000, 'asd123', 12344, 'bsas', 1, 0, 'asdasdasdasd', 203000, 12000, 2, '2018-12-07', 1, '2018-12-07', '01:46:04', 1);

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
  `id_usuario` int(11) NOT NULL,
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
  `id_usuario_pago` int(11) NOT NULL,
  `fechaCompra` date NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastosgenerales`
--

INSERT INTO `gastosgenerales` (`id`, `monto`, `observacion`, `id_usuario_pago`, `fechaCompra`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(1, 140, 'Silicona para interior', 2, '2018-09-28', '2018-09-29', '20:26:00', 1, 1),
(2, 235, 'Limpia tapizados Revigal', 1, '2018-09-29', '2018-09-29', '20:38:00', 1, 1),
(3, 45, 'Pincel para interior', 1, '2018-09-29', '2018-09-29', '20:40:00', 1, 1),
(4, 850, '2 Esmaltes retoque pintura, Blanco Oxdord (focus) y Verde Amazonas (Kangoo) + Envio. Mercadolibre', 1, '2018-10-01', '2018-10-01', '12:00:00', 1, 1),
(5, 990, 'Lijas, aerosol, pasta pulir, cera lustre, etc', 2, '2018-10-10', '2018-10-22', '09:00:00', 1, 1),
(6, 800, 'kms focus colo', 1, '2018-10-24', '2018-10-24', '23:38:25', 1, 1),
(7, 400, 'kms focus colo', 2, '2018-10-24', '2018-10-24', '23:39:07', 1, 1),
(8, 200, 'nafta focus colo', 1, '2018-10-24', '2018-10-24', '23:40:37', 1, 1),
(9, 1200, 'KMs focus alan', 2, '2018-09-24', '2018-10-28', '11:18:53', 1, 1),
(10, 4100, 'Service C4 lounge', 2, '2018-10-31', '2018-11-06', '10:34:42', 1, 1),
(11, 137, 'Total peajes papeles Suran (Registro Av Belgrano 845)', 2, '2018-11-26', '2018-11-26', '22:11:00', 1, 1),
(12, 700, 'Nafta Registro Av Belgrano', 2, '2018-11-26', '2018-11-26', '22:13:22', 1, 1),
(13, 3500, 'Pintada  paragolpe trasero C4 Lounge', 2, '2018-10-12', '2018-11-26', '22:21:03', 1, 1),
(14, 800, 'Forculario 12 Focus alan', 2, '2018-11-20', '2018-11-26', '22:22:23', 1, 1),
(15, 600, 'Formulario CETA Focus Alan', 2, '2018-11-20', '2018-11-26', '22:23:37', 1, 1);

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
  `seguro_caucion` int(11) NOT NULL,
  `caucion_paga` tinyint(1) NOT NULL DEFAULT '0',
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

INSERT INTO `subastas_autos` (`id`, `id_vendedor`, `marca`, `modelo`, `ano`, `dominio`, `kms`, `radicacion`, `ubicacion`, `id_combustible`, `arranca`, `iva_incluido`, `comision`, `seguro_caucion`, `caucion_paga`, `observacion`, `deuda_patente`, `deuda_infr_caba`, `deuda_infr_bsas`, `visita_observaciones`, `visita_puntaje`, `visita_valor_aprox`, `valor_puja`, `precio_lista`, `gastos_aprox_gestor`, `url_narvaez`, `fecha_cierre`, `hora_cierre`, `comprado`, `fecha`, `hora`, `id_usuario`, `estado`) VALUES
(9, 2, 'Ford', 'Focus exe style 1.6', 2010, 'JGM542', 247574, 'CABA', 'Campana', 1, 1, 1, 10, 0, 0, '-No arranca, con posibles faltantes', 0, 0, 0, 'El auto arranca', NULL, NULL, 121000, 178543, 13800, NULL, '2018-08-03', '14:00:00', 1, '2018-09-27', '11:00:00', 1, 1),
(10, 2, 'Ford', 'Focus exe style 1.6', 2010, 'JGM544', 211237, 'CABA', 'Campana', 1, 1, 1, 10, 0, 0, '-No arranca, con posible faltantes', 0, 0, 0, 'Arranca', NULL, NULL, 121000, 178543, 13800, NULL, '2018-08-03', '14:00:00', 0, '2018-09-27', '11:00:00', 1, 1),
(11, 3, 'Volkswagen', 'Suran 1.6L', 2011, 'JSC600', NULL, 'CABA', 'Tortuguitas', 1, 1, 1, 10, 0, 0, 'Arranca, carroceria afectada por raspones', 0, 0, 0, NULL, NULL, NULL, 133000, 180000, 13480, NULL, '2018-09-26', '11:00:00', 0, '2018-09-27', '19:00:00', 1, 1),
(12, 3, 'Volkswagen', 'Suran 1.6L', 2012, 'LTH041', 204584, 'CABA', 'Tortuguitas', 1, 1, 1, 10, 0, 0, 'Carroceria afectada por golpes y raspones', 0, 0, 0, NULL, NULL, NULL, 132000, 180000, 13480, NULL, '2018-09-26', '11:00:00', 0, '2018-09-27', '11:00:00', 1, 1),
(13, 1, 'Prueba', 'Prueba', 2018, 'ac123kw', 15000, 'Campana', 'Campana', 3, 1, 1, 10, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, 150000, 175000, 0, NULL, '2018-10-28', '11:00:00', 1, '2018-10-28', '22:38:00', 1, 1),
(15, 1, 'Peugeot', 'Berlingo 1.6 sx am54', 2014, 'aaaaaa', 117000, 'NOSE', 'NOSE', 1, 1, 1, 10, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, 160000, 270000, 20000, NULL, '2018-11-14', '14:00:00', 0, '2018-11-13', '00:00:00', 1, 1),
(16, 1, 'Renault', 'Clio Mio 5p', 2014, 'NPW114', 64000, 'BS AS', 'San Fernando', 1, 1, 1, 10, 0, 0, 'Cerradura baul rota, comando llave roto, taza rota, falta tapa de paragolpe delantero', 6385, 2172, 4345, NULL, NULL, NULL, 80000, 200000, 14000, NULL, '2018-11-15', '14:00:00', 0, '2018-11-13', '12:00:00', 1, 1),
(17, 1, 'Renault', 'Duster Privielege 2.0 PH2', 2017, 'AB547GX', 32000, 'BS AS', 'San Fernando', 1, 1, 1, 10, 0, 0, NULL, 31000, 3570, 0, NULL, NULL, NULL, 280000, 450000, 40000, NULL, '2018-11-15', '11:00:00', 0, '2018-11-13', '18:00:00', 1, 1),
(18, 1, 'volks', 'gol', 1999, 'acd123', 300000, 'rad', 'campana', 1, 1, 1, 10, 0, 0, 'obs', 0, 0, 0, 'obs vis', 10, 0, 130000, 120000, 20000, 'url', '2018-11-21', '14:00:00', 0, '2018-11-21', '12:00:00', 1, 1),
(19, 1, 'marca', 'modelo', 1989, 'dom123', 189000, 'rad', 'campana', 1, 1, 1, 10, 0, 0, 'observacion', 10000, 0, 0, 'sin obs', 0, 0, 134000, 110000, 10000, 'url', '2018-11-21', '14:00:00', 0, '2018-11-21', '14:00:00', 1, 1),
(20, 1, 'Volks', 'gol', 2000, 'asd123', 12344, 'bsas', 'campana', 1, 0, 0, 10, 0, 0, 'asdasdasdasd', 0, 0, 0, '', 1, 0, 12300, 80000, 12000, '', '2018-11-30', '14:00:00', 1, '2018-11-21', '14:17:18', 1, 1),
(21, 1, 'Volks22', 'gol22', 2000, 'asd123', 12344, 'bsas', 'campana', 1, 0, 0, 10, 0, 0, 'asdasdasdasd', 0, 4000, 1000, '', 1, 0, 130000, 80000, 12000, '', '2018-11-30', '14:00:00', 1, '2018-11-21', '14:17:47', 1, 1),
(22, 1, 'prueba1', 'modelo1', 2018, 'ac123jk', 0, 'caba', 'san fernando', 2, 1, 0, 10, 0, 0, 'HOla', 0, 0, 0, '', 0, 0, 0, 0, 0, '', '0000-00-00', '00:00:00', 0, '2018-11-21', '14:20:46', 1, 1);

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
(1, 18, 'Traslado vehiculo 0km', 7000, '2018-12-07', '12:00:00', 1, 1);

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
(1, 20, 140000, 'facebook', 1),
(4, 10, 230000, 'Mercado libre', 1),
(5, 10, 200000, 'Facebook', 1),
(7, 18, 4000, '', 1);

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
(2, 'Bunge (cerealera)', 1),
(3, 'BASF', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(145) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `mail`, `pass`, `nombre`, `estado`) VALUES
(1, 'remache01', 'bugio89@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 'colo', 1),
(2, 'tuerca01', 'alan@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 'Mostaza', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAutoComprado_idUserCarga_fk_idx` (`id_usuario`),
  ADD KEY `idAutoComprado_idUserPago_fk_idx` (`id_usuario_comprador`),
  ADD KEY `idAutoComprado_idCombustible_fk_idx` (`id_combustible`),
  ADD KEY `idAutoComprado_idAutoSubasta_idx` (`id_subasta`);

--
-- Indices de la tabla `auto_comprado_deudas`
--
ALTER TABLE `auto_comprado_deudas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCompradoDeudas_idAutoCom_fk_idx` (`id_auto_comprado`),
  ADD KEY `idCompradoDeuda_idUserCarga_fk_idx` (`id_usuario`),
  ADD KEY `idCompradoDeuda_idUserPago_fk_idx` (`id_usuario_pago`);

--
-- Indices de la tabla `gastosgenerales`
--
ALTER TABLE `gastosgenerales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuarioCompraGasto_idUsuario_fk_idx` (`id_usuario_pago`),
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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_infracciones`
--
ALTER TABLE `autos_gastos_infracciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_otros`
--
ALTER TABLE `autos_gastos_otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `autos_gastos_patentes`
--
ALTER TABLE `autos_gastos_patentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `auto_comprado`
--
ALTER TABLE `auto_comprado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `auto_comprado_deudas`
--
ALTER TABLE `auto_comprado_deudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gastosgenerales`
--
ALTER TABLE `gastosgenerales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `subastas_autos`
--
ALTER TABLE `subastas_autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `subastas_gastos_otros`
--
ALTER TABLE `subastas_gastos_otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `subastas_gestion_admin`
--
ALTER TABLE `subastas_gestion_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `subastas_valor_calle`
--
ALTER TABLE `subastas_valor_calle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Agregar montos de un modelos de vehículo, para luego poder promediar un estimado', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subastas_vendedor`
--
ALTER TABLE `subastas_vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos_gastos_gestoria`
--
ALTER TABLE `autos_gastos_gestoria`
  ADD CONSTRAINT `idGastosGest_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosGest_idUserPago` FOREIGN KEY (`id_usuario_pago`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosGesto_idAutoCom_fk` FOREIGN KEY (`id_auto`) REFERENCES `auto_comprado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autos_gastos_infracciones`
--
ALTER TABLE `autos_gastos_infracciones`
  ADD CONSTRAINT `idGastosInf_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosInf_idUserPago_fk` FOREIGN KEY (`id_usuario_pago`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosInfr_idAutoCom_fk` FOREIGN KEY (`id_auto`) REFERENCES `auto_comprado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autos_gastos_otros`
--
ALTER TABLE `autos_gastos_otros`
  ADD CONSTRAINT `idGastosOtrosPago_idUser_fk` FOREIGN KEY (`id_usuario_pago`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosOtros_idAutoComprado_fk` FOREIGN KEY (`id_auto`) REFERENCES `auto_comprado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosOtros_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autos_gastos_patentes`
--
ALTER TABLE `autos_gastos_patentes`
  ADD CONSTRAINT `idGastoPat_idAutoCom_fk` FOREIGN KEY (`id_auto`) REFERENCES `auto_comprado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosPat_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosPat_idUserPago_fk` FOREIGN KEY (`id_usuario_pago`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auto_comprado`
--
ALTER TABLE `auto_comprado`
  ADD CONSTRAINT `idAutoComprado_idAutoSubasta` FOREIGN KEY (`id_subasta`) REFERENCES `subastas_autos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAutoComprado_idCombustible_fk` FOREIGN KEY (`id_combustible`) REFERENCES `autos_combustible` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAutoComprado_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAutoComprado_idUserPago_fk` FOREIGN KEY (`id_usuario_comprador`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auto_comprado_deudas`
--
ALTER TABLE `auto_comprado_deudas`
  ADD CONSTRAINT `idCompradoDeuda_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCompradoDeuda_idUserPago_fk` FOREIGN KEY (`id_usuario_pago`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCompradoDeudas_idAutoCom_fk` FOREIGN KEY (`id_auto_comprado`) REFERENCES `auto_comprado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gastosgenerales`
--
ALTER TABLE `gastosgenerales`
  ADD CONSTRAINT `idGastosG_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idGastosG_idUserPago_fk` FOREIGN KEY (`id_usuario_pago`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subastas_autos`
--
ALTER TABLE `subastas_autos`
  ADD CONSTRAINT `idAutoSubasta_idCombustble_fk` FOREIGN KEY (`id_combustible`) REFERENCES `autos_combustible` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAutoSubasta_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAutoSubasta_idVendedor_fk` FOREIGN KEY (`id_vendedor`) REFERENCES `subastas_vendedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subastas_gastos_otros`
--
ALTER TABLE `subastas_gastos_otros`
  ADD CONSTRAINT `idSubastaOtrosGastos_idAutoSubasta_fk` FOREIGN KEY (`idAutoSubasta`) REFERENCES `subastas_autos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idSubastaOtrosGastos_idUserCarga_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subastas_valor_calle`
--
ALTER TABLE `subastas_valor_calle`
  ADD CONSTRAINT `idSubastaVCalle_idAutoSub_fk` FOREIGN KEY (`id_auto`) REFERENCES `subastas_autos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
