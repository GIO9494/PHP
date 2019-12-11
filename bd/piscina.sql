-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2019 a las 17:36:45
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `piscina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casillero`
--

CREATE TABLE `casillero` (
  `Cod_casillero` int(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Cant_Llaves` int(10) NOT NULL,
  `Color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `casillero`
--

INSERT INTO `casillero` (`Cod_casillero`, `Estado`, `Cant_Llaves`, `Color`) VALUES
(1, 'Ocupado', 3, 'celeste'),
(2, 'Ocupado', 3, 'celeste'),
(3, 'vacio', 3, 'celeste'),
(4, 'vacio', 3, 'celeste'),
(5, 'Ocupado', 3, 'celeste'),
(6, 'ocupado', 3, 'celeste'),
(7, 'Ocupado', 3, 'celeste'),
(8, 'vacio', 3, 'celeste'),
(9, 'Ocupado', 3, 'celeste'),
(10, 'vacio', 3, 'celeste'),
(11, 'vacio', 3, 'celeste'),
(12, 'vacio', 3, 'celeste'),
(13, 'vacio', 3, 'celeste'),
(14, 'Ocupado', 3, 'celeste'),
(15, 'vacio', 3, 'celeste'),
(16, 'vacio', 3, 'celeste'),
(17, 'ocupado', 3, 'celeste'),
(18, 'vacio', 3, 'celeste'),
(19, 'Ocupado', 3, 'celeste'),
(20, 'vacio', 3, 'celeste'),
(21, 'vacio', 3, 'celeste'),
(22, 'vacio', 3, 'celeste'),
(23, 'vacio', 3, 'celeste'),
(24, 'vacio', 3, 'celeste'),
(25, 'vacio', 3, 'celeste'),
(26, 'vacio', 3, 'rosado'),
(27, 'vacio', 3, 'rosado'),
(28, 'Ocupado', 3, 'rosado'),
(29, 'ocupado', 3, 'rosado'),
(30, 'vacio', 3, 'rosado'),
(31, 'vacio', 3, 'rosado'),
(32, 'vacio', 3, 'rosado'),
(33, 'vacio', 3, 'rosado'),
(34, 'Ocupado', 3, 'rosado'),
(35, 'ocupado', 3, 'rosado'),
(36, 'vacio', 3, 'rosado'),
(37, 'vacio', 3, 'rosado'),
(38, 'vacio', 3, 'rosado'),
(39, 'vacio', 3, 'rosado'),
(40, 'vacio', 3, 'rosado'),
(41, 'vacio', 3, 'rosado'),
(42, 'vacio', 3, 'rosado'),
(43, 'vacio', 3, 'rosado'),
(44, 'vacio', 3, 'rosado'),
(45, 'Ocupado', 3, 'rosado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cod_Cliente` int(255) NOT NULL,
  `Grado_Cliente` varchar(100) NOT NULL,
  `Cod_Casillero` int(30) NOT NULL,
  `Codigo_C` varchar(255) NOT NULL,
  `Costo_ing` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cod_Cliente`, `Grado_Cliente`, `Cod_Casillero`, `Codigo_C`, `Costo_ing`) VALUES
(63, ' Vip', 20, '32', 0),
(64, ' Vip', 13, '657', 0),
(65, ' Empleado', 19, '653', 0),
(66, ' Vip', 39, '652', 0),
(68, ' Normal', 7, '659', 0),
(69, ' Normal', 16, '6534', 0),
(70, ' Normal', 6, '6527', 0),
(114, ' Vip', 45, '657790', 0),
(115, ' Vip', 19, '1', 0),
(116, ' Empleado', 12, '653', 0),
(117, ' Vip', 34, '2', 0),
(118, ' Normal', 7, '6534', 0),
(119, ' Normal', 9, '90', 0),
(120, ' Vip', 5, '998', 0),
(121, ' Normal', 19, '145', 0),
(122, ' Otro', 28, 'abc', 70),
(123, ' Empleado', 45, '6534a', 20),
(124, ' Vip', 14, '657', 40),
(126, ' Otro', 1, '657', 10),
(127, ' Vip', 2, '7777', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `Cod_producto` int(50) NOT NULL,
  `Ingredientes` varchar(250) NOT NULL,
  `FotoCo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`Cod_producto`, `Ingredientes`, `FotoCo`) VALUES
(5, 'Leche,Crema', 'Views/img/productos/yogurt/914.jpg'),
(7, 'harinas y postres', 'Views/img/productos/donas/425.jpg'),
(8, 'zumo, agua,azucar ', 'Views/img/productos/jugo de naranja/566.jpg'),
(9, 'refresco con lata metalica roja', 'Views/img/productos/CocaCola/954.jpg'),
(11, 'bebida Alcoholica , finisimo', 'Views/img/productos/Coñac/683.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `Id_Usuario` int(50) NOT NULL,
  `nombre_Cuenta` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado` int(20) DEFAULT NULL,
  `perfil` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `ultimo_login` datetime(6) DEFAULT NULL,
  `fecha` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `Id_persona` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`Id_Usuario`, `nombre_Cuenta`, `email`, `estado`, `perfil`, `passwords`, `foto`, `ultimo_login`, `fecha`, `Id_persona`) VALUES
(1, 'root', 'jeandarkmakne@gmail.com', 0, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/root/758.jpg', '2019-05-15 01:04:11.156219', '2019-11-04 16:17:25.166549', 1),
(3, 'demian', 'demian@gmail.com', 1, 'administrador', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/demian/693.jpg', '2019-11-12 00:00:00.000000', '2019-10-17 19:51:47.078125', 0),
(4, 'vendedor', 'vend@yahoo.com', 0, 'administrador de ventas', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/vendedor/864.png', NULL, '2019-06-26 22:09:29.887075', NULL),
(5, 'van', 'van@yahoo.com', 1, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/van/141.png', NULL, '2019-05-22 20:43:59.439818', NULL),
(6, 'junior', 'juliuskill@gmail.com', NULL, ' Especial', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'views/img/usuarios/junior/664.png', NULL, '2019-05-09 17:06:14.659271', NULL),
(7, 'Dan', 'dan@yahoo.com', 1, ' Especial', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/Dan/853.jpg', NULL, '2019-05-22 20:45:17.445289', 3),
(8, 'israel', 'israel@yahoo.com', NULL, ' Especial', '$2a$07$asxx54ahjppf45sd87a5auxZ9B1VAcJEU0fGufJ41iCTyHTrzd5si', 'views/img/usuarios/israel/300.jpg', NULL, '2019-05-10 15:42:45.585711', NULL),
(9, 'ale', 'ale@gmail.com', 1, ' Especial', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/ale/334.jpg', NULL, '2019-05-22 20:41:22.977436', NULL),
(10, 'roman', 'roman@gmail.com', NULL, ' Especial', '$2a$07$asxx54ahjppf45sd87a5auMUUAXh.i.spmFAUev5D1d5IsEQMCmzm', 'views/img/usuarios/roman/525.jpg', NULL, '2019-05-12 17:17:09.274109', NULL),
(11, 'fortu', 'user23@yahoo.com', NULL, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'views/img/usuarios/fortu/989.jpg', NULL, '2019-05-14 20:27:25.846599', NULL),
(12, 'jean', 'jeandarkmaknae@gmail.com', NULL, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5aufX1IWwx2qywPWoMsE21hZgtVlJ/Rhei', 'views/img/usuarios/jean/800.jpg', NULL, '2019-05-17 19:53:42.947754', NULL),
(13, 'isral', 'isral@yahoo.com', NULL, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/isral/171.png', NULL, '2019-05-22 19:05:33.535639', NULL),
(14, 'eve', 'eve@gmail.com', 1, ' Especial', '$2a$07$asxx54ahjppf45sd87a5au4IctbdJ5jnUe/7YObTqPnEK8Hs5EaIm', 'views/img/usuarios/eve/693.jpg', '2019-06-26 18:12:05.000000', '2019-06-26 22:12:05.867310', NULL),
(15, 'evy', 'evy@yahoo.com', 1, ' Especial', '$2a$07$asxx54ahjppf45sd87a5au4vjHxBH9F3NNMIE7/ybylMdSjdtwaty', 'views/img/usuarios/evy/106.jpg', '2019-05-22 16:47:18.000000', '2019-05-22 20:47:18.324575', NULL),
(22, 'pepe', 'pepe@yahoo.com', 1, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5au1mMwPFOiFOa2BiMswhkNpbB7hBZc6pa', 'views/img/usuarios/pepe/455.png', '2019-05-30 10:41:58.000000', '2019-05-30 14:53:28.790521', NULL),
(23, 'pedrito', 'pedro@yahoo.com', 1, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'views/img/usuarios/pedrito/886.jpg', '2019-06-26 18:12:42.000000', '2019-06-26 22:12:42.768091', NULL),
(24, 'grover', 'grover@yahoo.com', 1, ' Administrador', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'views/img/usuarios/grover/804.png', '2019-11-04 12:17:11.000000', '2019-11-04 16:17:11.754729', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Cod_Curso` int(20) NOT NULL,
  `Nombre_Curso` varchar(30) NOT NULL,
  `Cant_Cupos` int(30) NOT NULL,
  `Costo` double(30,0) NOT NULL,
  `Ubicacion` varchar(50) DEFAULT NULL,
  `Certificacion` varchar(50) NOT NULL,
  `Inicio_Fin_Clases` datetime DEFAULT NULL,
  `Id_Horario` int(30) DEFAULT NULL,
  `Id_Instructor` int(30) DEFAULT NULL,
  `fotoC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Cod_Curso`, `Nombre_Curso`, `Cant_Cupos`, `Costo`, `Ubicacion`, `Certificacion`, `Inicio_Fin_Clases`, `Id_Horario`, `Id_Instructor`, `fotoC`) VALUES
(2, 'Swim5', 30, 160, NULL, 'Certificado Avalado por el Gobierno De El Alto', '0000-00-00 00:00:00', 3, 3, 'views/img/cursos/Swim5/367.png'),
(3, 'Swim6', 30, 150, 'Zona: la ceja Calle: El Dorado', 'Certificado Avalado por el Gobierno De El Alto', '0000-00-00 00:00:00', 3, 1, 'views/img/cursos/Swim6/863.png'),
(4, 'Swim5', 30, 160, 'Zona: la ceja Calle: El Dorado', 'Certificado Avalado por el gobierno', '0000-00-00 00:00:00', 3, 6, 'views/img/cursos/Swim5/867.png'),
(5, 'Swim7', 25, 140, 'Zona: la ceja Calle: El Dorado', 'Certificado Avalado por el Gobierno De El Alto1', '0000-00-00 00:00:00', 4, 6, 'views/img/cursos/Swim7/968.jpg'),
(6, 'Swim8', 28, 160, 'Zona: la ceja Calle: El Dorado', 'Certificado Avalado por el Gobierno De El Alto', '0000-00-00 00:00:00', 3, 6, 'views/img/cursos/Swim8/851.jpg'),
(7, 'Swiming1', 28, 160, 'Zona: la Ceja Calle: El Dorado Nro: 2133', 'Certificado Avalado por el Gobierno De El Alto', '0000-00-00 00:00:00', 3, 1, 'views/img/cursos/Swiming1/269.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_Empleado` int(50) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Sueldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `Id_Horario` int(20) NOT NULL,
  `Turno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`Id_Horario`, `Turno`) VALUES
(1, 'Mañana        09 -- 11 am'),
(2, 'Media Mañana  11 -- 01 pm'),
(3, 'Media Tarde   02 -- 04 pm'),
(4, 'Tarde         04 -- 06 pm'),
(5, 'Noche         06 -- 08 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `Id_Instructor` int(50) NOT NULL,
  `Nro_de_Meritos` int(100) NOT NULL,
  `Especialidades` varchar(500) NOT NULL,
  `fotoI` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`Id_Instructor`, `Nro_de_Meritos`, `Especialidades`, `fotoI`) VALUES
(1, 5, ' Rescatista Profecional,Resistencia a Aguas heladas,Especialidad en submarinos', NULL),
(3, 5, 'Rescatista Profecional,Curso de Natacion En Rios Caudalosos,Resistencia a Aguas heladas', NULL),
(6, 5, ' Rescatista Profecional,Curso de Natacion En Rios Caudalosos,Especialidad en buseo', NULL),
(8, 5, ' Curso de Natacion En Rios Caudalosos,Resistencia a Aguas heladas,Especialidad en estilos de Natacion', NULL),
(61, 1, 'natacion', 'views/img/instructores/grgfdd/274.jpg'),
(62, 1, 'natacion', 'views/img/instructores/JuanGabriel/214.jpg'),
(67, 1, 'natacion', 'views/img/instructores/awewqe/869.png'),
(125, 6, 'natacion y buseo', 'views/img/instructores/pepe/357.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto_piscina`
--

CREATE TABLE `objeto_piscina` (
  `Cod_producto` int(50) NOT NULL,
  `FotoO` text,
  `Talla` varchar(30) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Costo_Reposicion` double(50,0) NOT NULL,
  `Costo_Flete` double(50,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `objeto_piscina`
--

INSERT INTO `objeto_piscina` (`Cod_producto`, `FotoO`, `Talla`, `Color`, `Marca`, `Estado`, `Costo_Reposicion`, `Costo_Flete`) VALUES
(6, 'Views/img/objetos_piscina/sombrilla/369.jpg', 'Grande', 'Multicolor', 'Bombazo', ' Exelente', 60, 10),
(10, 'Views/img/objetos_piscina/gafas/494.png', 'Grande', 'Verde', 'Patito', ' Sin ningun Daño ', 25, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Id_Pedido` int(255) NOT NULL,
  `Cantidad` int(100) NOT NULL,
  `Fecha_Pedido` date NOT NULL,
  `Cod_producto` int(30) NOT NULL,
  `Id_Cliente` int(30) DEFAULT NULL,
  `Id_Servicio` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Cod_Cliente` int(100) NOT NULL,
  `Ci` varchar(30) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ap_Paterno` varchar(50) NOT NULL,
  `Ap_Materno` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Correo_Electronico` varchar(150) NOT NULL,
  `Nro_Cel` int(30) NOT NULL,
  `Fecha_Nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Cod_Cliente`, `Ci`, `Nombre`, `Ap_Paterno`, `Ap_Materno`, `Genero`, `Correo_Electronico`, `Nro_Cel`, `Fecha_Nac`) VALUES
(1, '12450199 LP', 'Juan Gabriel', 'Churata', 'Paco', 'Masculino', 'jeandarkmaknae@gmail.com', 78946206, '1996-09-22'),
(3, '13246566 LP', 'Demian Rodrigo', 'Villca', 'Copa', 'Masculino', 'demian@gmail.com', 67734222, '1994-11-12'),
(6, '1242333 LP', 'junior', 'Churata', 'Hernadez', 'Masculino', 'junior@gmail.com', 74556788, '1990-04-21'),
(8, '12434664 LP', 'Israel', 'Churata', 'Hernadez', 'Masculino', 'Israel@gmail.com', 78433432, '1994-03-14'),
(9, '12434556 LP', 'Alejandra', 'Chavez', 'Valboa', 'Femenino', 'Ale@gmail.com', 75556885, '1996-05-16'),
(10, '2345345', 'Elva', 'Churata', 'Lupanandez', 'Femenino', 'Elvasito@gmail.com', 77747772, '1993-11-12'),
(12, '12341234', 'Vannesa', 'Churata', 'Fernandez', 'Femenino', 'anesav@gmail.com', 78549743, '1995-08-17'),
(13, '1234345LP', 'manuel', 'zda', 'den', 'Masculino', 'z@gmail.com', 67891531, '1996-09-22'),
(14, '11332342LP', 'delia', 'pacheco', 'mendoza', 'Femenino', 'delia@gmail.com', 77323531, '1992-09-22'),
(15, '1234345LP', 'dania', 'pacheco', 'den', 'Masculino', 'pa@gmail.com', 67891531, '1993-06-22'),
(16, '12450199LP', 'Manuel', 'Churata', 'Hernadez', 'Masculino', 'manuel@gmail.com', 78946206, '1994-03-14'),
(17, '12450199LP', 'Manu', 'Chura', 'Hernadez', 'Masculino', 'manu@gmail.com', 77946206, '1992-03-14'),
(18, '1234345LP', 'ever', 'z', 'p', 'Masculino', 'ever@gmail.com', 67890533, '1936-09-22'),
(19, '1234345LP', 'lupa', 'zda', 'den', 'Femenino', 'lupa@gmail.com', 67890532, '1996-02-17'),
(20, '12342345LP', 'as', 'as', 'fd', 'Masculino', 'dan@gmail.com', 67890533, '1996-09-21'),
(57, '12342345LP', 'PedroAlfredo', 'pacheco', 'mendoza', 'Masculino', 'dan@gmail.com', 67890532, '1996-09-22'),
(58, '12342345LP', 'PedroAlfredo', 'pacheco', 'mendoza', 'Masculino', 'dan@gmail.com', 67890532, '1996-09-22'),
(59, '12342342LP', 'juandf', 'almanza', 'p', 'Masculino', 'delia@gmail.com', 67890533, '1996-09-22'),
(60, '12342345LP', 'fagfgfa', 'almanza', 'den', 'Masculino', 'dan@gmail.com', 67890533, '1996-09-22'),
(61, '12342342LP', 'grgfdd', 'zda', 'mendoza', 'Masculino', 'z@gmail.com', 67890533, '1996-09-22'),
(62, '12450199LP', 'JuanGabriel', 'Churata', 'Paco', 'Masculino', 'juanCh@gmail.com', 678946206, '1996-09-22'),
(63, '12450199LP', 'pedro', 'infante', 'denian', 'Masculino', 'pedro@yahoo.com', 76676787, '1996-09-22'),
(64, '12450192LP', 'dariel', 'infante', 'denian', 'Masculino', 'dariel@yahoo.com', 664477574, '1996-09-22'),
(65, '12450199LP', 'dariel', 'infan', 'denia', 'Masculino', 'dariel@yahoo.com', 87686788, '1996-09-22'),
(66, '12450192LP', 'jhonny', 'Churata', 'Paco', 'Masculino', 'jhonny@yahoo.com', 87678587, '1996-09-22'),
(67, '1234345LP', 'awewqe', 'pacheco', 'mendoza', 'Masculino', 'z@gmail.com', 67890531, '1996-09-22'),
(68, '12450199LP', 'darielbobles', 'infante', 'denia', 'Masculino', 'darielrobles@yahoo.com', 77754445, '1993-09-22'),
(69, '12450192LP', 'casimiro', 'Churata', 'Paco', 'Masculino', 'casimiro@yahoo.com', 77764545, '1996-09-26'),
(70, '12450129LP', 'casimiro', 'infante', 'denia', 'Masculino', 'jhonny@yahoo.com', 84848788, '1996-09-22'),
(71, '12450192LP', 'dariel', 'infante', 'denia', 'Masculino', 'dariel@yahoo.com', 65437676, '1996-09-22'),
(72, '12450192LP', 'casimiro', 'Churata', 'Paco', 'Masculino', 'norman@yahoo.com', 56778685, '1996-09-22'),
(73, '12450192LP', 'casimiro', 'Churata', 'Paco', 'Masculino', 'norman@yahoo.com', 56778685, '1996-09-22'),
(74, '12450192LP', 'casimiro', 'Churata', 'Paco', 'Masculino', 'norman@yahoo.com', 56778685, '1996-09-22'),
(75, '12450199LP', 'dariel', 'infan', 'denia', 'Masculino', 'jhonny@yahoo.com', 6478785, '1996-09-22'),
(76, '12450199LP', 'dariel', 'infan', 'denia', 'Masculino', 'jhonny@yahoo.com', 6478785, '1996-09-22'),
(77, '12450192LP', 'darielbobles', 'infante', 'denia', 'Masculino', 'norman@yahoo.com', 5463457, '1996-09-22'),
(78, '12450192LP', 'darielbobles', 'infante', 'denia', 'Masculino', 'norman@yahoo.com', 5463457, '1996-09-22'),
(114, '12450199LP', 'jeandark', 'maknae', 'zapta', 'Masculino', 'jeandark@yahoo.com', 777749348, '1996-12-22'),
(115, '12450192LP', 'jhonny', 'Churata', 'altamirano', 'Masculino', 'darielrobles@yahoo.com', 577880087, '1996-09-22'),
(116, '12450192LP', 'david', 'Churata', 'Paco', 'Masculino', 'david@yahoo.com', 76744678, '1992-09-22'),
(117, '6236455LP', 'casimiro', 'infan', 'Lopes', 'Masculino', 'norman@yahoo.com', 77868656, '1996-09-20'),
(118, '12450192LP', 'microbio', 'ibanez', 'natario', 'Masculino', 'microbio@yahoo.com', 88574778, '1993-06-21'),
(119, '1244566LP', 'hernan', 'Cotez', 'Caba', 'Masculino', 'hernan@yahoo.com', 77577548, '1982-10-12'),
(120, '12345678LP', 'Jorge', 'Chacales', 'Pereira', 'Otro', 'Jorchdelaselva@yahoo.com', 77778499, '1991-09-22'),
(121, '12450191LP', 'Abran', 'kenta', 'Lopes', 'Masculino', 'Abrahan@yahoo.com', 77788990, '1991-02-23'),
(122, '12450192LP', 'Daniel', 'infante', 'Lopes', 'Masculino', 'daniel@yahoo.com', 77686997, '1992-09-22'),
(123, '12450192LP', 'jhonnys', 'infan', 'altamirano', 'Masculino', 'jhonnys@yahoo.com', 79797963, '1986-09-21'),
(124, '12450199LP', 'ever', 'kenta', 'perez', 'Masculino', 'ever@yahoo.com', 77755334, '1995-09-22'),
(125, '12342345 LP', 'pepe', 'pacheco', 'pipo', 'Masculino', 'pepito@gmail.com', 67890532, '1996-09-22'),
(126, '12450192LP', 'Daniel', 'Churata', 'Ticona', 'Masculino', 'daniel@yahoo.com', 77727778, '1996-09-22'),
(127, '8335375', 'Angelica', 'Alba', 'Quispe', 'Femenino', 'angelicaalbaquispe@gmail.com', 75212346, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Cod_producto` int(50) NOT NULL,
  `Nom_Prod` varchar(50) NOT NULL,
  `id_Stock` int(50) NOT NULL,
  `Precio_Compra` double(100,0) DEFAULT NULL,
  `Precio_Venta` double(100,0) DEFAULT NULL,
  `Tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_producto`, `Nom_Prod`, `id_Stock`, `Precio_Compra`, `Precio_Venta`, `Tipo`) VALUES
(3, 'Toalla1', 4, 12, 15, ' Toallas'),
(4, 'Toalla2', 5, 13, 16, ' Toallas'),
(5, 'yogurt', 6, 1, 2, ' Bebidas'),
(6, 'sombrilla', 7, 50, 60, ' Otros'),
(7, 'donas', 8, 3, 5, ' Pasteles y Tortas '),
(8, 'jugo de naranja', 9, 2, 3, ' Bebidas'),
(9, 'CocaCola', 10, 3, 6, ' Bebidas'),
(10, 'gafas', 11, 25, 30, ' Otros'),
(11, 'Coñac', 12, 100, 120, ' Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registra`
--

CREATE TABLE `registra` (
  `Id_Registro` int(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Costo Ingreso` int(30) NOT NULL,
  `Cod_casillero` int(30) NOT NULL,
  `Id_Empleado` int(30) NOT NULL,
  `Id_Cliente` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `Id_Usuario` int(30) NOT NULL,
  `Cod_casillero` int(30) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Id_Servicio` int(20) NOT NULL,
  `Duracion` varchar(30) NOT NULL,
  `Calidad` varchar(50) NOT NULL,
  `Id_empleado` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `Id_Stock` int(255) NOT NULL,
  `Cantidad` int(255) DEFAULT NULL,
  `Proveedor` varchar(255) DEFAULT NULL,
  `Fecha_Compraul` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`Id_Stock`, `Cantidad`, `Proveedor`, `Fecha_Compraul`) VALUES
(1, 20, 'Dorado', '2019-05-16'),
(2, 20, 'propio', '2019-03-21'),
(3, 50, 'Real', '2019-03-10'),
(4, 50, '16 de Julio', '2019-03-21'),
(5, 54, '16 de Julio', '2019-02-21'),
(6, 100, 'Pil', '2019-02-21'),
(7, 20, 'Boob', '2019-01-03'),
(8, 100, 'Real', '2019-03-21'),
(9, 100, 'propio', '2019-03-21'),
(10, 10, 'Cocacola', '2019-01-21'),
(11, 12, '16 de Julio', '2019-03-21'),
(12, 10, 'Real', '2019-03-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienec`
--

CREATE TABLE `tienec` (
  `Id_Usuario` int(100) NOT NULL,
  `Cod_Cliente` int(100) NOT NULL,
  `tipoCuenta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienecurso`
--

CREATE TABLE `tienecurso` (
  `Cod_Curso` int(255) NOT NULL,
  `Cod_Cliente` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casillero`
--
ALTER TABLE `casillero`
  ADD PRIMARY KEY (`Cod_casillero`),
  ADD KEY `Cod_casillero` (`Cod_casillero`) USING BTREE;

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_Cliente`),
  ADD KEY `Cod_casilleroFK` (`Cod_Casillero`) USING BTREE;

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`Cod_producto`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `Id_personaFK` (`Id_persona`) USING BTREE;

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Cod_Curso`),
  ADD KEY `Cod_Curso` (`Cod_Curso`) USING BTREE,
  ADD KEY `Id_InstructorFK` (`Id_Instructor`) USING BTREE,
  ADD KEY `Id_Horario` (`Id_Horario`) USING BTREE;

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`Id_Horario`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`Id_Instructor`);

--
-- Indices de la tabla `objeto_piscina`
--
ALTER TABLE `objeto_piscina`
  ADD PRIMARY KEY (`Cod_producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD KEY `Cod_ProdFK` (`Cod_producto`) USING BTREE,
  ADD KEY `Id_ServicioFK` (`Id_Servicio`) USING BTREE,
  ADD KEY `Id_ClienteFK` (`Id_Cliente`) USING BTREE;

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Cod_Cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_producto`),
  ADD KEY `Id_Stock_FK` (`id_Stock`) USING BTREE;

--
-- Indices de la tabla `registra`
--
ALTER TABLE `registra`
  ADD PRIMARY KEY (`Id_Registro`),
  ADD KEY `Id_empleadoFK` (`Id_Empleado`) USING BTREE,
  ADD KEY `Id_ClienteFK` (`Id_Cliente`) USING BTREE,
  ADD KEY `Id_CasilleroFKY` (`Cod_casillero`) USING BTREE;

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`Id_Usuario`,`Cod_casillero`),
  ADD KEY `Id_CasilleroPK1` (`Cod_casillero`) USING BTREE;

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Id_Servicio`),
  ADD KEY `Id_Empleado` (`Id_empleado`) USING BTREE;

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Id_Stock`);

--
-- Indices de la tabla `tienec`
--
ALTER TABLE `tienec`
  ADD PRIMARY KEY (`Id_Usuario`,`Cod_Cliente`),
  ADD KEY `Cod_Clientefk` (`Cod_Cliente`);

--
-- Indices de la tabla `tienecurso`
--
ALTER TABLE `tienecurso`
  ADD PRIMARY KEY (`Cod_Curso`,`Cod_Cliente`) USING BTREE,
  ADD KEY `Cod_ClienteT` (`Cod_Cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casillero`
--
ALTER TABLE `casillero`
  MODIFY `Cod_casillero` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Id_Usuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `Cod_Curso` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `Id_Horario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Cod_Cliente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_producto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `registra`
--
ALTER TABLE `registra`
  MODIFY `Id_Registro` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `Id_Usuario` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `Id_Servicio` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `Id_Stock` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `Cod_Casillerofk` FOREIGN KEY (`Cod_Casillero`) REFERENCES `casillero` (`Cod_casillero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Cod_Clienterg` FOREIGN KEY (`Cod_Cliente`) REFERENCES `persona` (`Cod_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `Cod_productoC` FOREIGN KEY (`Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `Id_Horario` FOREIGN KEY (`Id_Horario`) REFERENCES `horarios` (`Id_Horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_InstructorFKC` FOREIGN KEY (`Id_Instructor`) REFERENCES `instructor` (`Id_Instructor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `Id_Instructorfk` FOREIGN KEY (`Id_Instructor`) REFERENCES `persona` (`Cod_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `objeto_piscina`
--
ALTER TABLE `objeto_piscina`
  ADD CONSTRAINT `Cod_productoO` FOREIGN KEY (`Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Cod_productofk` FOREIGN KEY (`Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Clienterfkr` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Cod_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Serviciofk` FOREIGN KEY (`Id_Servicio`) REFERENCES `servicio` (`Id_Servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `id_Stockfk` FOREIGN KEY (`id_Stock`) REFERENCES `stock` (`Id_Stock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registra`
--
ALTER TABLE `registra`
  ADD CONSTRAINT `Cod_casillerofkey` FOREIGN KEY (`Cod_casillero`) REFERENCES `casillero` (`Cod_casillero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_ClienteR` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Cod_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Empleadofkey` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleado` (`Id_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `Cod_casillero` FOREIGN KEY (`Cod_casillero`) REFERENCES `casillero` (`Cod_casillero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `cuenta` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `Id_empleadofk1` FOREIGN KEY (`Id_empleado`) REFERENCES `empleado` (`Id_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tienec`
--
ALTER TABLE `tienec`
  ADD CONSTRAINT `Cod_Clientefk` FOREIGN KEY (`Cod_Cliente`) REFERENCES `persona` (`Cod_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Usuariofk` FOREIGN KEY (`Id_Usuario`) REFERENCES `cuenta` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tienecurso`
--
ALTER TABLE `tienecurso`
  ADD CONSTRAINT `Cod_ClienteT` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Cod_Curso` FOREIGN KEY (`Cod_Curso`) REFERENCES `curso` (`Cod_Curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
