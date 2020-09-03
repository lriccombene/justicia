-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 04-07-2020 a las 20:34:20
-- Versión del servidor: 5.7.27
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fei2020`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actasinspeccion`
--

CREATE TABLE `actasinspeccion` (
  `id` int(11) NOT NULL,
  `nro` int(11) NOT NULL,
  `fec` date DEFAULT NULL,
  `id_localidad` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `latitud` int(11) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actasinspeccion`
--

INSERT INTO `actasinspeccion` (`id`, `nro`, `fec`, `id_localidad`, `id_categoria`, `id_motivo`, `id_empresa`, `id_area`, `latitud`, `longitud`) VALUES
(3, 69, NULL, 5, 2, 5, 20, 52, 669, 69),
(4, 78, '2020-07-03', 6, 1, 5, 20, 31, 78, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `descripcion`) VALUES
(30, 'test3', 'test3'),
(31, '567546', '45645'),
(32, '567546', '45645'),
(33, 'test4', 'test4'),
(34, 'test5', 'test5'),
(35, 'test6', 'test6'),
(36, 'test7', 'test7'),
(37, 'test8', 'test8'),
(51, 'testarea58', 'testarea58'),
(52, 'are59', 'area59'),
(53, 'area59', 'area59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'test1', 'test1'),
(2, 'test2', NULL),
(3, 'test3', NULL),
(4, 'categoria 4', 'categoria 4'),
(5, 'categoria 4', 'categoria 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultor`
--

CREATE TABLE `consultor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultor`
--

INSERT INTO `consultor` (`id`, `nombre`, `apellido`, `telefono`, `email`, `domicilio`) VALUES
(1, 'Pedro', 'Mario', '', 'pedromario@gmail.com', NULL),
(2, 'Jose', 'Martin', '', 'josemartin@gmail.com', NULL),
(3, 'Lucas', 'Juan', '', 'juanlucas@gmail.com', NULL),
(4, 'Ines', 'Fernandez', NULL, 'juanlucas@gmail.com', NULL),
(5, 'tatina', 'Rulli', NULL, 'tatiana@gmail.com', NULL),
(6, 'Eva', 'Pueblo', NULL, 'eva@gmail.com', NULL),
(7, 'Cristina', 'Argentina', NULL, 'cristina@gmail.com', NULL),
(8, 'maria', 'Gonzalez', NULL, 'maria@gmail.com', NULL),
(9, 'cristian', 'jabibi', NULL, 'cristian@gmail.com', NULL),
(10, 'walter', 'jabibi', NULL, 'walter@gmail.com', NULL),
(11, 'area1', NULL, NULL, NULL, NULL),
(12, 'area2', NULL, NULL, NULL, NULL),
(13, 'area3', NULL, NULL, NULL, NULL),
(14, 'area4', NULL, NULL, NULL, NULL),
(15, 'area5', NULL, NULL, NULL, NULL),
(16, 'area6', NULL, NULL, NULL, NULL),
(17, 'area7', NULL, NULL, NULL, NULL),
(18, 'area8', NULL, NULL, NULL, NULL),
(19, 'area10', NULL, NULL, NULL, NULL),
(20, 'area11', NULL, NULL, NULL, NULL),
(21, 'area12', NULL, NULL, NULL, NULL),
(22, 'area13', NULL, NULL, NULL, NULL),
(23, 'area14', NULL, NULL, NULL, NULL),
(24, 'area15', NULL, NULL, NULL, NULL),
(25, 'area16', NULL, NULL, NULL, NULL),
(26, 'area17', NULL, NULL, NULL, NULL),
(27, 'area18', NULL, NULL, NULL, NULL),
(28, 'area19', NULL, NULL, NULL, NULL),
(29, 'area20', NULL, NULL, NULL, NULL),
(30, 'area21', NULL, NULL, NULL, NULL),
(31, 'area22', NULL, NULL, NULL, NULL),
(32, '55555', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dictamentecnico`
--

CREATE TABLE `dictamentecnico` (
  `id` int(11) NOT NULL,
  `fec` date DEFAULT NULL,
  `nro` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_yacimiento` int(11) NOT NULL,
  `id_tipodictamen` int(11) NOT NULL,
  `id_tipotrabajo` int(11) NOT NULL,
  `detalle` text,
  `longitud` int(11) DEFAULT NULL,
  `latitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_consultor` int(11) NOT NULL,
  `razon_social` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `referente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `descripcion`, `id_consultor`, `razon_social`, `contacto`, `referente`) VALUES
(1, 'Empresa1', NULL, 1, NULL, NULL, NULL),
(2, 'Empresa2', NULL, 2, NULL, NULL, NULL),
(3, 'Empresa3', NULL, 3, NULL, NULL, NULL),
(4, 'Empresa4', NULL, 4, NULL, NULL, NULL),
(5, 'Empresa5', NULL, 5, NULL, NULL, NULL),
(6, 'Empresa6', NULL, 6, NULL, NULL, NULL),
(7, 'Empresa7', NULL, 7, NULL, NULL, NULL),
(8, 'Empresa8', NULL, 8, NULL, NULL, NULL),
(9, 'Empresa8', NULL, 9, NULL, NULL, NULL),
(10, 'Empresa9', NULL, 10, NULL, NULL, NULL),
(11, 'Empresa10', NULL, 1, NULL, NULL, NULL),
(12, 'Empresa11', NULL, 2, NULL, NULL, NULL),
(13, 'Empresa12', NULL, 3, NULL, NULL, NULL),
(14, 'Empresa13', NULL, 4, NULL, NULL, NULL),
(15, 'Empresa14', NULL, 4, NULL, NULL, NULL),
(16, 'Empresa15', NULL, 4, NULL, NULL, NULL),
(17, 'Empresa16', NULL, 5, NULL, NULL, NULL),
(18, 'Empresa17', NULL, 5, NULL, NULL, NULL),
(19, 'Empresa18', NULL, 5, NULL, NULL, NULL),
(20, 'Empresa19', NULL, 8, NULL, NULL, NULL),
(21, 'Empresa20', NULL, 8, NULL, NULL, NULL),
(22, 'Empresa21', NULL, 8, NULL, NULL, NULL),
(23, '77', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enviosdocumentacion`
--

CREATE TABLE `enviosdocumentacion` (
  `id` int(11) NOT NULL,
  `fec` date DEFAULT NULL,
  `transporte` varchar(255) DEFAULT NULL,
  `id_relevancia` int(11) NOT NULL,
  `detalle` text,
  `archivo_urlnotificado` varchar(255) DEFAULT NULL,
  `destino` varchar(255) DEFAULT NULL,
  `fec_notificado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enviosdocumentacion`
--

INSERT INTO `enviosdocumentacion` (`id`, `fec`, `transporte`, `id_relevancia`, `detalle`, `archivo_urlnotificado`, `destino`, `fec_notificado`) VALUES
(1, '2020-04-03', 'test1', 2, 'envio documentacion', 'url www', 'viedma', '2020-04-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Localidad1', 'Localidad1'),
(2, 'Localidad2', NULL),
(3, 'Localidad3', NULL),
(4, 'Localidad1', NULL),
(5, 'Viedma', 'Viedma'),
(6, 'Sao', 'Sao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesaentrada`
--

CREATE TABLE `mesaentrada` (
  `id` int(11) NOT NULL,
  `fec` date NOT NULL,
  `fec_ingreso` date DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `descripcion` text,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesaentrada`
--

INSERT INTO `mesaentrada` (`id`, `fec`, `fec_ingreso`, `id_categoria`, `id_tramite`, `descripcion`, `id_empresa`) VALUES
(1, '2020-04-03', '2020-04-04', 1, 1, 'test', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1587433128),
('m200421_000507_crear_table_usuarios', 1587433131),
('m200427_154318_crear_table_party_party', 1588009993),
('m200427_192037_create_party_address_table', 1588015792),
('m200427_195331_create_party_contact_table', 1589485898),
('m200514_192210_create_categoria_table', 1589485899),
('m200514_193237_create_consultor_table', 1589485899),
('m200514_193501_create_Tipotramite_table', 1589485899),
('m200514_193629_create_yacimiento_table', 1589485899),
('m200514_193720_create_localidad_table', 1589485899),
('m200514_194017_create_motivo_table', 1589485899),
('m200514_194107_create_area_table', 1589485899),
('m200514_201959_create_tipotramite_table', 1589487618),
('m200514_211029_create_empresa_table', 1589490681),
('m200515_202610_create_tipodictamen_table', 1589575055),
('m200515_202733_create_tipotrabajo_table', 1589575055),
('m200515_202835_create_relevancia_table', 1589575055),
('m200515_203239_create_solicitudcaratula_table', 1589575055),
('m200515_203650_create_mesadeentrada_table', 1589575056),
('m200515_205856_create_actasinspecion_table', 1589576345),
('m200515_210605_create_actasinspecion_table', 1589576772),
('m200515_211311_create_actasinspecion_table', 1589577198),
('m200515_211555_create_actasinspecion_table', 1589577363),
('m200515_212414_create_notassalida_table', 1589577861),
('m200515_212937_create_enviosdocumentacion_table', 1589578186),
('m200515_215008_create_dictamenestecnicos_table', 1589579415),
('m200516_000807_create_mesaentrada_table', 1589587734),
('m200516_000919_create_mesaentrada_table', 1589587767),
('m200516_003203_create_actasinspeccion_table', 1589589133),
('m200516_140046_create_actasinspeccion_table', 1589637700),
('m200516_142700_create_empresa_table', 1589726877),
('m200517_145046_create_actasinspeccion_table', 1589727095),
('m200517_223914_create_mesaentrada_table', 1589755179),
('m200531_175809_create_tipotrabajo_table', 1590948066),
('m200531_175830_create_tipodictamen_table', 1590948066),
('m200531_180052_create_dictamentecnico_table', 1590948068),
('m200531_183821_create_dictamentecnico_table', 1590950378);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`id`, `nombre`, `descripcion`) VALUES
(1, 'motivo1', 'motivo1'),
(2, 'motivo2', 'motivo2'),
(3, 'motivo3', 'motivo3'),
(4, 'test3', 'test'),
(5, 'motivo86', 'motivo86');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notassalida`
--

CREATE TABLE `notassalida` (
  `id` int(11) NOT NULL,
  `fec_emision` date DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `detalle` text,
  `notificado` tinyint(1) DEFAULT NULL,
  `fec_notificado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `party_address`
--

CREATE TABLE `party_address` (
  `id` int(11) NOT NULL,
  `id_party` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `party_contact`
--

CREATE TABLE `party_contact` (
  `id` int(11) NOT NULL,
  `id_party` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `party_party`
--

CREATE TABLE `party_party` (
  `id_party` int(11) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `num_doc` varchar(255) NOT NULL,
  `estado_civil` varchar(100) DEFAULT NULL,
  `tipo_doc` varchar(100) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `limite_credito` decimal(19,4) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relevancia`
--

CREATE TABLE `relevancia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relevancia`
--

INSERT INTO `relevancia` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Relevancia 1', NULL),
(2, 'Relevancia 2', NULL),
(3, 'Relevancia 3', NULL),
(4, 'Relevancia 4', NULL),
(5, 'Relevancia 5', NULL),
(6, 'Relevancia 6', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `tipo`, `id_usuario`) VALUES
(1, 'admin', 'administrador del sitio la posibilidad de crear usuarios y crear parametros', 1, 5),
(2, 'Tecnico', 'puede crear parametros', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudcaratula`
--

CREATE TABLE `solicitudcaratula` (
  `id` int(11) NOT NULL,
  `fec` date NOT NULL,
  `extracto` varchar(255) DEFAULT NULL,
  `recibido` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudcaratula`
--

INSERT INTO `solicitudcaratula` (`id`, `fec`, `extracto`, `recibido`) VALUES
(1, '2020-04-03', 'solicitud Caratula 1', NULL),
(2, '2020-04-02', 'solicitud Caratula 2', NULL),
(3, '2020-04-05', 'solicitud Caratula 3', NULL),
(4, '2020-04-07', 'solicitud Caratula 6', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodictamen`
--

CREATE TABLE `tipodictamen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodictamen`
--

INSERT INTO `tipodictamen` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Dictamen7', NULL),
(2, 'Dictamen8', NULL),
(3, '56666', '66666'),
(4, 'Dictamen7', NULL),
(5, 'dictamen 46', 'dictamen 46'),
(7, 'test77', 'test77');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotrabajo`
--

CREATE TABLE `tipotrabajo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipotrabajo`
--

INSERT INTO `tipotrabajo` (`id`, `nombre`, `descripcion`) VALUES
(1, 'tipo trabajo 10', 'tipo trabajo 10'),
(2, 'tipo trabajo 2', 'tipo trabajo 2'),
(5, 'tipo trabajo 1', 'tipo trabajo 1'),
(6, 'test 55', 'test 55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotramite`
--

CREATE TABLE `tipotramite` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipotramite`
--

INSERT INTO `tipotramite` (`id`, `nombre`, `descripcion`) VALUES
(1, 'tramite1', 'tramite1'),
(2, 'tramite2', NULL),
(3, 'tramite3', NULL),
(5, 'test44', 'test44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `name`, `password`, `authKey`, `accessToken`, `id_rol`) VALUES
(1, 'setttt', 'settttt', 'settt', NULL, NULL, NULL),
(2, 'test', 'test', 'test', NULL, NULL, NULL),
(4, 'juan', 'juan', '$2y$10$ZZc8SES3qhEs2xocAEEcX.QlmnzgKi2lrO/QsoUIwZpvlFpLmaINO', '1b30809ded452e9ea22bf077858c55ab', '$2y$10$9TgW8XDDProDe1YvHFpm/euzMoh96xXR/DSSQ6jgcKl04ssxR5Etu', 2),
(5, 'lucas', 'lucas', '$2y$10$4hChU.KlklBznnkUBpYDY.HkJBUnAC9Iaa9U/ZeR4lroYJIHIx7kC', '5e109a498276a99e6df6c31e92638e48', '$2y$10$t4zmOQKuIt/i/bpofuUDD.fs/PYDEacXF.s5WU05IxiAV1UufJa0K', 1),
(6, 'test1', 'test1', '$2y$10$T3h5J0whBfJxBQHaNUOhzulKDqS/G/tYhkb9XrVrlLmUC3jV/BG.6', '2405aa274750655f8f9c59be1f37e1d0', '$2y$10$3iw4wv.F8.89o81YH0SyM.mNnRCSq/UKzlz15jOObW9zBfbgdMIOO', 2),
(7, 'sayds', 'sayds', '$2y$10$mwsKebA3bAolVfBYKgLaK.u/XqKYIg2mQijuzPUFvlsjQXJYryHTG', 'ceae1316ab57589a6b9820ce445e0fde', '$2y$10$L0qhErGhiujOQEev4/weAOB0/fRQpqAAL5x10iG3rPisnfsEoqHQy', 1),
(8, 'planificacion', 'planificacion', '$2y$10$AWXJ92RgcFzB1Vdp0Fb/3OwGeZyOHJepCB6qTKy38IfzZNc.B0SE6', '2eef042bf3df007a43f1cc18e46a5858', '$2y$10$N/3yL66oVB/DHg3zvnURd.2yCoFI4xcDH04uSltZJvyRbYHih35gy', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `yacimiento`
--

CREATE TABLE `yacimiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `yacimiento`
--

INSERT INTO `yacimiento` (`id`, `nombre`, `descripcion`) VALUES
(1, 'yaciemiento 1', 'yaciemiento 2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actasinspeccion`
--
ALTER TABLE `actasinspeccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-actasinspeccion-id_localidad` (`id_localidad`),
  ADD KEY `idx-actasinspeccion-id_categoria` (`id_categoria`),
  ADD KEY `idx-actasinspeccion-id_motivo` (`id_motivo`),
  ADD KEY `idx-actasinspeccion-id_empresa` (`id_empresa`),
  ADD KEY `idx-actasinspeccion-id_area` (`id_area`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultor`
--
ALTER TABLE `consultor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dictamentecnico`
--
ALTER TABLE `dictamentecnico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-dictamentecnico-id_empresa` (`id_empresa`),
  ADD KEY `idx-dictamentecnico-id_area` (`id_area`),
  ADD KEY `idx-dictamentecnico-id_yacimiento` (`id_yacimiento`),
  ADD KEY `idx-dictamentecnico-id_tipodictamen` (`id_tipodictamen`),
  ADD KEY `idx-dictamentecnico-id_tipotrabajo` (`id_tipotrabajo`),
  ADD KEY `idx-dictamentecnico-id_categoria` (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-empresa-id_consultor` (`id_consultor`);

--
-- Indices de la tabla `enviosdocumentacion`
--
ALTER TABLE `enviosdocumentacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-enviosdocumentacion-id_relevancia` (`id_relevancia`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesaentrada`
--
ALTER TABLE `mesaentrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-mesaentrada-id_categoria` (`id_categoria`),
  ADD KEY `idx-mesaentrada-id_tramite` (`id_tramite`),
  ADD KEY `idx-mesaentrada-id_empresa` (`id_empresa`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notassalida`
--
ALTER TABLE `notassalida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-notassalida-id_categoria` (`id_categoria`),
  ADD KEY `idx-notassalida-id_empresa` (`id_empresa`);

--
-- Indices de la tabla `party_address`
--
ALTER TABLE `party_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-party_address-id_party` (`id_party`);

--
-- Indices de la tabla `party_contact`
--
ALTER TABLE `party_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-party_contact-id_party` (`id_party`);

--
-- Indices de la tabla `party_party`
--
ALTER TABLE `party_party`
  ADD PRIMARY KEY (`id_party`),
  ADD UNIQUE KEY `num_doc` (`num_doc`);

--
-- Indices de la tabla `relevancia`
--
ALTER TABLE `relevancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudcaratula`
--
ALTER TABLE `solicitudcaratula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipodictamen`
--
ALTER TABLE `tipodictamen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipotrabajo`
--
ALTER TABLE `tipotrabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipotramite`
--
ALTER TABLE `tipotramite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `yacimiento`
--
ALTER TABLE `yacimiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actasinspeccion`
--
ALTER TABLE `actasinspeccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `consultor`
--
ALTER TABLE `consultor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `dictamentecnico`
--
ALTER TABLE `dictamentecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `enviosdocumentacion`
--
ALTER TABLE `enviosdocumentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mesaentrada`
--
ALTER TABLE `mesaentrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notassalida`
--
ALTER TABLE `notassalida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `party_address`
--
ALTER TABLE `party_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `party_contact`
--
ALTER TABLE `party_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `party_party`
--
ALTER TABLE `party_party`
  MODIFY `id_party` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relevancia`
--
ALTER TABLE `relevancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitudcaratula`
--
ALTER TABLE `solicitudcaratula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipodictamen`
--
ALTER TABLE `tipodictamen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipotrabajo`
--
ALTER TABLE `tipotrabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipotramite`
--
ALTER TABLE `tipotramite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `yacimiento`
--
ALTER TABLE `yacimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actasinspeccion`
--
ALTER TABLE `actasinspeccion`
  ADD CONSTRAINT `fk-actasinspeccion-id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-actasinspeccion-id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-actasinspeccion-id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-actasinspeccion-id_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-actasinspeccion-id_motivo` FOREIGN KEY (`id_motivo`) REFERENCES `motivo` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dictamentecnico`
--
ALTER TABLE `dictamentecnico`
  ADD CONSTRAINT `fk-dictamentecnico-id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-dictamentecnico-id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-dictamentecnico-id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-dictamentecnico-id_tipodictamen` FOREIGN KEY (`id_tipodictamen`) REFERENCES `tipodictamen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-dictamentecnico-id_tipotrabajo` FOREIGN KEY (`id_tipotrabajo`) REFERENCES `tipotrabajo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-dictamentecnico-id_yacimiento` FOREIGN KEY (`id_yacimiento`) REFERENCES `yacimiento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk-empresa-id_consultor` FOREIGN KEY (`id_consultor`) REFERENCES `consultor` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `enviosdocumentacion`
--
ALTER TABLE `enviosdocumentacion`
  ADD CONSTRAINT `fk-enviosdocumentacion-id_relevancia` FOREIGN KEY (`id_relevancia`) REFERENCES `relevancia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mesaentrada`
--
ALTER TABLE `mesaentrada`
  ADD CONSTRAINT `fk-mesaentrada-id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-mesaentrada-id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-mesaentrada-id_tramite` FOREIGN KEY (`id_tramite`) REFERENCES `tipotramite` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notassalida`
--
ALTER TABLE `notassalida`
  ADD CONSTRAINT `fk-notassalida-id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-notassalida-id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresass` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `party_address`
--
ALTER TABLE `party_address`
  ADD CONSTRAINT `fk-party_address-id_party` FOREIGN KEY (`id_party`) REFERENCES `party_party` (`id_party`) ON DELETE CASCADE;

--
-- Filtros para la tabla `party_contact`
--
ALTER TABLE `party_contact`
  ADD CONSTRAINT `fk-party_contact-id_party` FOREIGN KEY (`id_party`) REFERENCES `party_party` (`id_party`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
