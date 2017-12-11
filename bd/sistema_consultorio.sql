-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2017 a las 00:16:02
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `rut_administracion` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `digito_admin` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_administracion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_admin` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_administracion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_admin` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_admin` bigint(20) NOT NULL,
  `correo_admin` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direcc_admin` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac_admin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`rut_administracion`, `digito_admin`, `nombre_administracion`, `cargo_admin`, `apellido_administracion`, `titulo_admin`, `numero_admin`, `correo_admin`, `direcc_admin`, `fech_nac_admin`) VALUES
('22222222', '2', 'MARTA', 'secretaria', 'SEGUNDO', 'secretaria', 45345232524, 'marta@gmail.com', ' DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1930-06-12'),
('55555555', '5', 'MARCELO', 'informatica', 'IBARRA', 'ingeniero informatico', 56997045099, 'marcelo@gmail.com', 'su casas', '1986-08-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica_administracion`
--

CREATE TABLE `clinica_administracion` (
  `rut_clinica` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `digito_clin` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_clinica` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_clinica` bigint(20) NOT NULL,
  `correo_clinica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direcc_clinica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac_clinica` date NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clinica_administracion`
--

INSERT INTO `clinica_administracion` (`rut_clinica`, `digito_clin`, `nombre_clinica`, `apellido_clinica`, `titulo_clinica`, `cargo_clinica`, `numero_clinica`, `correo_clinica`, `direcc_clinica`, `fech_nac_clinica`, `estado`) VALUES
('24242424', '7', 'marco', 'perez', 'KINECIOLOGO', 'KINESIOLOGIA', 56838472893, 'marcos@gmail.com', ' DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1970-02-04', 'ACTIVO'),
('25252525', '4', 'peter', 'ojera', 'OFTAMOLOgo', 'OFTAMOLOGIA', 56567456756, 'petter@hotmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1979-01-02', 'ACTIVO'),
('26262626', '1', 'marcelo', 'ibarra', 'MEDICO PEDIATRIA', 'PEDIATRIA', 56353453453, 'marceloiba@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1970-02-01', 'ACTIVO'),
('27272727', '9', 'marta', 'ojera', 'medico', 'MATERNAL', 56466374563, 'marta23@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1980-02-02', 'ACTIVO'),
('28282828', '6', 'yan', 'lucaveche', 'GINECOLO', 'GINECOLOGIA', 56342342342, 'yan@gmail.com', ' DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1980-06-11', 'ACTIVO'),
('34343434', '0', 'pedro', 'perez', 'medico dental', 'DENTAL', 56342423423, 'pedro@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1974-12-07', 'ACTIVO'),
('56345345', '1', 'jaime', 'morales', 'vendedor de paltas', 'MENTAL', 56345345345, 'jaime@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1974-12-07', 'ACTIVO'),
('56566454', '9', 'marcelo', 'ibarba', 'medico pediatra', 'PEDIATRIA', 56345345356, 'marcelo@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1974-12-07', 'ACTIVO'),
('77777777', '7', 'DON', 'COOPER', 'medico general', 'GENERAL', 56456456456, 'don@gmai.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1974-12-07', 'ACTIVO'),
('9288248', '9', 'JOSE', 'MANOLITO', 'enfermero', 'ENFERMERIA', 56345345345, 'jose@gmail.com', ' DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1980-06-12', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espera`
--

CREATE TABLE `espera` (
  `rut_es` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_es` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_es` datetime NOT NULL,
  `id_es` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `espera`
--

INSERT INTO `espera` (`rut_es`, `tipo_es`, `fecha_es`, `id_es`) VALUES
('12121212', 'OFTAMOLOGIA', '2017-12-13 09:30:00', 132),
('13131313', 'GENERAL', '2017-12-13 09:30:00', 135);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `rut_histo` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `rut_especialista` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `informe_ante` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_atencion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `in_histo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`rut_histo`, `rut_especialista`, `informe_ante`, `tipo_atencion`, `fecha`, `in_histo`) VALUES
('12121212', '77777777', 'primero consulta', 'GENERAL', '2017-12-03 22:02:54', 11),
('12121212', '77777777', 'segunda consulta', 'GENERAL', '2017-12-03 22:03:13', 12),
('12121212', '34343434', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n', 'DENTAL', '2017-12-03 22:48:37', 13),
('12121212', '34343434', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut\r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\nnisi ut aliquip ex ea commodo consequat. Duis aute irure ', 'DENTAL', '2017-12-03 22:55:16', 14),
('12121212', '34343434', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut\r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\nnisi ut aliquip ex ea commodo consequat. Duis aute irure ', 'DENTAL', '2017-12-03 22:55:25', 15),
('12121212', '34343434', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut\r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\nnisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisici', 'DENTAL', '2017-12-03 22:55:45', 16),
('12121212', '34343434', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut\r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\nnisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisici', 'DENTAL', '2017-12-03 22:55:55', 17),
('12121212', '77777777', 'sfaefEFwefWEFwrWG', 'GENERAL', '2017-12-04 00:39:05', 18),
('12121212', '77777777', 'Inputs and selects have width: 100%; applied by default in Bootstrap. Within inline forms, we reset that to width: auto; so multiple controls can reside on the same line. Depending on your layout, additional custom widths may be required.', 'GENERAL', '2017-12-04 01:06:43', 19),
('13131313', '77777777', 'Inputs and selects have width: 100%; applied by default in Bootstrap. Within inline forms, we reset that to width: auto; so multiple controls can reside on the same line. Depending on your layout, additional custom widths may be required.', 'GENERAL', '2017-12-04 01:10:47', 20),
('13131313', '77777777', 'Perimera consulta', 'GENERAL', '2017-12-04 01:13:03', 21),
('12121212', '77777777', 'estreÃ±ido denuevo', 'GENERAL', '2017-12-04 13:39:17', 22),
('13131313', '25252525', 'LO DE SIMPRE', 'OFTAMOLOGIA', '2017-12-04 13:59:33', 23),
('13131313', '34343434', 'tiene caries', 'DENTAL', '2017-12-04 14:01:28', 24),
('13131313', '27272727', 'va a morir', 'MATERNAL', '2017-12-04 14:09:36', 25),
('17995948', '25252525', 'el tipo no ve nada', 'OFTAMOLOGIA', '2017-12-04 14:20:24', 26),
('13131313', '77777777', 'siempre biene', 'GENERAL', '2017-12-04 15:31:15', 27),
('12121212', '77777777', 'Los linfomas no Hodgkin comienzan cuando un tipo de glÃ³bulos blancos, llamado cÃ©lulas T o cÃ©lulas B, se hacen anormales. Las cÃ©lulas se dividen una y otra vez aumentando el nÃºmero de cÃ©lulas anormales. Las cÃ©lulas anormales pueden diseminarse a casi todas las demÃ¡s partes del cuerpo. La mayor parte del tiempo, los mÃ©dicos no pueden determinar por quÃ© una persona desarrolla un linfoma no Hodgkin. Usted estÃ¡ en mayor riesgo si tiene un sistema inmunitario dÃ©bil o cierto tipo de infecciones.', 'GENERAL', '2017-12-13 14:34:02', 28),
('12121212', '77777777', 'Firefox has some awkward fieldset styling involving width that interferes with the responsive table. This cannot be overridden without a Firefox-specific hack that we don\'t provide in Bootstrap:', 'GENERAL', '2017-12-13 16:54:56', 29),
('12121212', '77777777', 'Laub (German: leaf, foliage) may refer to: Laub-Petschnikoff Stradivarius, an antique violin; USS Laub (disambiguation). Laub is the surname of: Daryl Laub, television and radio personality; Donald Laub (born 1935), American plastic surgeon; Ferdinand Laub (1832-1875), Czech violinist; Henry Laub (1792â€“1813), officer ...', 'GENERAL', '2017-12-13 18:28:43', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `rut_persona` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `digito_persona` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nro_ficha` int(11) NOT NULL,
  `nombre_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fech_nac_persona` date NOT NULL,
  `genero_persona` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `servicio_salub` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_nacimiento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_telefono` bigint(20) NOT NULL,
  `sector` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `establecimiento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_persona` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`rut_persona`, `digito_persona`, `nro_ficha`, `nombre_persona`, `apellido_persona`, `fech_nac_persona`, `genero_persona`, `direccion_persona`, `servicio_salub`, `ciudad_nacimiento`, `numero_telefono`, `sector`, `establecimiento`, `tipo_persona`) VALUES
('10875439', '7', 453, 'MATIAS', 'SALAZAR', '1989-12-01', 'M', 'chorrillos 1200 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 33333333333, '3', 'hospital', 'NO'),
('11098766', '8', 46, 'HUGO', 'MENA', '1993-10-28', 'M', 'recreo 1788 ViÃ±a del Mar', 'fonasa', 'quilpue', 88888888888, '3', 'hospital', 'NO'),
('12121212', '9', 677683, 'TOM', 'GONZALES', '1970-02-05', 'M', '219 NORTE CON CALLE TRES, SANTA INES', 'fonasa', 'valparaiso', 56987684748, '4', 'lucitania', 'NO'),
('12678953', 'k', 23, 'ROBERTO', 'HERRERA', '1994-09-26', 'M', 'chorrillos 1200 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 33333333333, '23', 'hospital', 'NO'),
('13131313', '6', 343333, 'MARTA', 'GALINDO', '1970-03-05', 'F', 'Hospital Dr. Gustavo Fricke - DirecciÃ³n: Alv', 'fonasa', ' ViÃ±a del Mar ', 45345452454, '4', 'lucitania', 'NO'),
('14667460', '7', 67, 'CONSTANZA', 'VILLEGAS', '1996-05-07', 'F', 'recreo 1788 ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 3333222333, '21', 'hospital', 'NO'),
('15983267', '8', 456, 'ANTONIA', 'CONTRERAS', '1984-03-01', 'F', 'chorrillos 1200 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 33333333333, '1', 'hospital', 'NO'),
('16054326', '4', 12, 'LUCIA', 'GOMEZ', '1984-04-25', 'F', 'Alvarez 1532 - ViÃ±a del Mar', 'fonasa', 'valparaiso', 33333333333, '1', 'hospital', 'NO'),
('16783254', '7', 789, 'JUAN', 'VARGAS', '1990-09-18', 'M', 'chorrillos 1200 - ViÃ±a del Mar', 'fonasa', 'valparaiso', 33331111333, '12', 'hospital', 'NO'),
('16891230', '7', 45, 'francisco', 'AGUIRRE', '2015-06-11', 'M', 'de bajo del puente', 'fonasa', 'quillota', 69696969696, 'chorrillos', 'este', 'NO'),
('17845455', '2', 32, 'LUIS', 'VALDEZ', '1983-12-26', 'M', 'marina 2345 ViÃ±a del mar', 'fonasa', 'viÃ±a del mar', 33333333333, '3', 'hospital', 'NO'),
('17995948', '8', 2889, 'felipe', 'ESTAY', '1992-04-21', 'M', 'Alvarez 1532 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 12222222222, '4', 'hospital', 'NO'),
('18045045', '9', 23, 'marcelo', 'IBARRA', '1973-09-11', 'M', 'av. siempre viva 444 ', 'fonasa', 'san bisente de taguatagua', 9634524532, 'los sauses', 'consultorio 1', 'NO'),
('18915384', '8', 3453322, 'diego', 'SANCHEZ', '1986-08-16', 'M', ' Hospital Dr. Gustavo Fricke - DirecciÃ³n: Al', 'fonsana', 'valparaiso', 56997045099, 'miraflores', 'lusitania', 'NO'),
('20981342', '4', 45676, 'CAROL', 'MEDINA', '1988-10-06', 'F', 'chorrillos 1200 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 6666666666, '89', 'hospital', 'NO'),
('21333266', 'K', 234234243, 'max', 'SANCHEZ', '2013-03-08', 'M', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', 'fonasa', 'valparaiso', 56234242342, '3', 'este', 'NO'),
('21986452', '3', 785, 'LUIS', 'SAAVEDRA', '1995-11-03', 'M', 'Alvarez 1532 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 76736731, '34', 'hospital', 'NO'),
('23232323', 'K', 902323, 'mariano', 'GONZALES', '1980-07-11', 'M', 'su casa', 'fonasa', 'la serena', 234234232, 'miraflores', 'lucitania', 'NO'),
('99922222', '6', 4533, 'jaime', 'MORALES', '1980-06-11', 'M', 'su casa', 'fonasa', 'val', 56756756756, '4', 'aqui', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `rut` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_reveva` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `qr` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`rut`, `fecha`, `tipo_reveva`, `estado`, `id_reserva`, `qr`) VALUES
('12121212', '2017-12-13 09:30:00', 'OFTAMOLOGIA', 'CONFIRMADA', 132, '132090a393aa250d85cf5720c8c136efd9b.png'),
('13131313', '2017-12-13 09:30:00', 'GENERAL', 'CONFIRMADA', 135, '13502bca4f38ffa647d1f5b1200012b5ff0.png'),
('13131313', '2017-12-13 09:00:00', 'KINESIOLOGIA', 'PENDIENTE', 136, NULL),
('13131313', '2017-12-13 09:00:00', 'PEDIATRIA', 'PENDIENTE', 137, NULL),
('12121212', '2017-12-13 09:30:00', 'KINESIOLOGIA', 'PENDIENTE', 138, NULL),
('12121212', '2017-12-13 08:00:00', 'DENTAL', 'PENDIENTE', 139, NULL),
('12121212', '2017-12-13 08:00:00', 'MENTAL', 'PENDIENTE', 140, NULL),
('12121212', '2017-12-13 08:15:00', 'GENERAL', 'PENDIENTE', 141, NULL),
('12121212', '2017-12-13 09:30:00', 'PEDIATRIA', 'PENDIENTE', 142, NULL),
('13131313', '2017-12-14 09:30:00', 'GINECOLOGIA', 'PENDIENTE', 143, NULL),
('10875439', '2017-12-13 11:00:00', 'DENTAL', 'PENDIENTE', 237, NULL),
('10875439', '2017-12-13 11:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 238, NULL),
('10875439', '2017-12-14 13:00:00', 'MENTAL', 'PENDIENTE', 239, NULL),
('10875439', '2017-12-15 10:30:00', 'KINESIOLOGIA', 'PENDIENTE', 240, NULL),
('10875439', '2017-12-20 09:00:00', 'GENERAL', 'PENDIENTE', 241, NULL),
('11098766', '2017-12-13 15:00:00', 'DENTAL', 'PENDIENTE', 242, NULL),
('11098766', '2017-12-12 11:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 243, NULL),
('11098766', '2017-12-15 16:00:00', 'MENTAL', 'PENDIENTE', 244, NULL),
('11098766', '2017-12-14 11:00:00', 'KINESIOLOGIA', 'PENDIENTE', 245, NULL),
('11098766', '2017-12-15 08:15:00', 'GENERAL', 'PENDIENTE', 246, NULL),
('11098766', '2017-12-12 08:00:00', 'PEDIATRIA', 'PENDIENTE', 247, NULL),
('13131313', '2017-12-14 10:00:00', 'MATERNAL', 'PENDIENTE', 248, NULL),
('13131313', '2017-12-12 14:00:00', 'DENTAL', 'PENDIENTE', 249, NULL),
('13131313', '2018-01-04 10:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 250, NULL),
('13131313', '2017-12-13 11:00:00', 'MENTAL', 'PENDIENTE', 251, NULL),
('14667460', '2017-12-13 17:00:00', 'DENTAL', 'PENDIENTE', 252, NULL),
('14667460', '2017-12-14 10:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 253, NULL),
('14667460', '2017-12-11 09:00:00', 'MENTAL', 'PENDIENTE', 254, NULL),
('14667460', '2017-12-15 11:00:00', 'PEDIATRIA', 'PENDIENTE', 255, NULL),
('14667460', '2018-01-08 09:00:00', 'KINESIOLOGIA', 'PENDIENTE', 256, NULL),
('14667460', '2017-12-14 09:45:00', 'GENERAL', 'PENDIENTE', 257, NULL),
('14667460', '2017-12-13 10:00:00', 'MATERNAL', 'PENDIENTE', 258, NULL),
('14667460', '2017-12-13 15:30:00', 'GINECOLOGIA', 'PENDIENTE', 259, NULL),
('15983267', '2017-12-11 16:00:00', 'DENTAL', 'PENDIENTE', 260, NULL),
('15983267', '2018-01-11 11:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 261, NULL),
('15983267', '2017-12-12 15:00:00', 'MENTAL', 'PENDIENTE', 262, NULL),
('15983267', '2017-12-14 11:30:00', 'PEDIATRIA', 'PENDIENTE', 263, NULL),
('15983267', '2017-12-12 10:30:00', 'KINESIOLOGIA', 'PENDIENTE', 264, NULL),
('15983267', '2017-12-11 09:15:00', 'GENERAL', 'PENDIENTE', 265, NULL),
('15983267', '2017-12-14 11:30:00', 'MATERNAL', 'PENDIENTE', 266, NULL),
('15983267', '2017-12-14 11:30:00', 'GINECOLOGIA', 'PENDIENTE', 267, NULL),
('16054326', '2017-12-13 10:00:00', 'DENTAL', 'PENDIENTE', 268, NULL),
('16054326', '2017-12-15 11:30:00', 'OFTAMOLOGIA', 'PENDIENTE', 269, NULL),
('16054326', '2017-12-12 11:00:00', 'PEDIATRIA', 'PENDIENTE', 270, NULL),
('16054326', '2017-12-11 11:30:00', 'KINESIOLOGIA', 'PENDIENTE', 271, NULL),
('16054326', '2017-12-15 11:00:00', 'MATERNAL', 'PENDIENTE', 272, NULL),
('16783254', '2017-12-13 09:00:00', 'DENTAL', 'PENDIENTE', 273, NULL),
('16783254', '2017-12-14 11:00:00', 'MENTAL', 'PENDIENTE', 274, NULL),
('16783254', '2017-12-12 09:30:00', 'GENERAL', 'PENDIENTE', 275, NULL),
('16783254', '2017-12-14 15:00:00', 'PEDIATRIA', 'PENDIENTE', 276, NULL),
('16891230', '2017-12-12 10:00:00', 'MENTAL', 'PENDIENTE', 277, NULL),
('16891230', '2017-12-13 08:45:00', 'GENERAL', 'PENDIENTE', 278, NULL),
('16891230', '2017-12-14 10:00:00', 'PEDIATRIA', 'PENDIENTE', 279, NULL),
('17845455', '2017-12-13 16:00:00', 'DENTAL', 'PENDIENTE', 280, NULL),
('17845455', '2017-12-14 08:30:00', 'OFTAMOLOGIA', 'PENDIENTE', 281, NULL),
('17845455', '2017-12-11 13:00:00', 'MENTAL', 'PENDIENTE', 282, NULL),
('17845455', '2017-12-13 14:00:00', 'KINESIOLOGIA', 'PENDIENTE', 283, NULL),
('17845455', '2017-12-11 10:30:00', 'PEDIATRIA', 'PENDIENTE', 284, NULL),
('17995948', '2017-12-13 10:30:00', 'OFTAMOLOGIA', 'PENDIENTE', 285, NULL),
('17995948', '2017-12-15 15:00:00', 'DENTAL', 'PENDIENTE', 286, NULL),
('17995948', '2017-12-15 09:30:00', 'KINESIOLOGIA', 'PENDIENTE', 287, NULL),
('17995948', '2017-12-12 09:00:00', 'GENERAL', 'PENDIENTE', 288, NULL),
('18045045', '2017-12-13 14:00:00', 'DENTAL', 'PENDIENTE', 289, NULL),
('18045045', '2017-12-13 13:00:00', 'MENTAL', 'PENDIENTE', 290, NULL),
('18045045', '2017-12-14 09:15:00', 'GENERAL', 'PENDIENTE', 291, NULL),
('18045045', '2017-12-14 12:30:00', 'PEDIATRIA', 'PENDIENTE', 292, NULL),
('18915384', '2017-12-14 13:30:00', 'OFTAMOLOGIA', 'PENDIENTE', 293, NULL),
('18915384', '2017-12-14 17:00:00', 'MENTAL', 'PENDIENTE', 294, NULL),
('18915384', '2017-12-14 13:30:00', 'GENERAL', 'PENDIENTE', 295, NULL),
('20981342', '2017-12-13 15:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 296, NULL),
('20981342', '2017-12-13 12:00:00', 'DENTAL', 'PENDIENTE', 297, NULL),
('20981342', '2017-12-12 14:30:00', 'MATERNAL', 'PENDIENTE', 298, NULL),
('20981342', '2018-01-10 09:30:00', 'GINECOLOGIA', 'PENDIENTE', 299, NULL),
('21333266', '2017-12-13 13:00:00', 'DENTAL', 'PENDIENTE', 300, NULL),
('21333266', '2017-12-14 08:00:00', 'GENERAL', 'PENDIENTE', 301, NULL),
('21333266', '2017-12-14 09:30:00', 'KINESIOLOGIA', 'PENDIENTE', 302, NULL),
('21333266', '2017-12-15 14:00:00', 'MENTAL', 'PENDIENTE', 303, NULL),
('21986452', '2017-12-14 14:00:00', 'DENTAL', 'PENDIENTE', 304, NULL),
('21986452', '2017-12-14 15:00:00', 'MENTAL', 'PENDIENTE', 305, NULL),
('21986452', '2017-12-14 11:45:00', 'GENERAL', 'PENDIENTE', 306, NULL),
('21986452', '2017-12-13 11:00:00', 'KINESIOLOGIA', 'PENDIENTE', 307, NULL),
('21986452', '2017-12-13 10:00:00', 'PEDIATRIA', 'PENDIENTE', 308, NULL),
('23232323', '2017-12-12 11:00:00', 'DENTAL', 'PENDIENTE', 309, NULL),
('23232323', '2017-12-11 10:30:00', 'OFTAMOLOGIA', 'PENDIENTE', 310, NULL),
('23232323', '2017-12-13 17:00:00', 'MENTAL', 'PENDIENTE', 311, NULL),
('23232323', '2017-12-14 08:45:00', 'GENERAL', 'PENDIENTE', 312, NULL),
('23232323', '2017-12-15 16:00:00', 'KINESIOLOGIA', 'PENDIENTE', 313, NULL),
('99922222', '2017-12-14 11:00:00', 'DENTAL', 'PENDIENTE', 314, NULL),
('99922222', '2017-12-14 13:00:00', 'OFTAMOLOGIA', 'PENDIENTE', 315, NULL),
('99922222', '2018-01-08 15:00:00', 'MENTAL', 'PENDIENTE', 316, NULL),
('99922222', '2017-12-12 13:30:00', 'KINESIOLOGIA', 'PENDIENTE', 317, NULL),
('99922222', '2017-12-15 16:15:00', 'GENERAL', 'PENDIENTE', 318, NULL),
('99922222', '2018-01-11 09:30:00', 'PEDIATRIA', 'PENDIENTE', 319, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `rut` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`rut`, `password`, `tipo`) VALUES
('1000000', 'mu3mAXx4Xkzw6', 'ROOT'),
('10875439', 'mu3mAXx4Xkzw6', 'NORMAL'),
('11098766', 'mu3mAXx4Xkzw6', 'NORMAL'),
('12121212', 'mu3mAXx4Xkzw6', 'NORMAL'),
('12678953', 'muFrnP66FrLPM', 'NORMAL'),
('13131313', 'mu3mAXx4Xkzw6', 'NORMAL'),
('14667460', 'mu3mAXx4Xkzw6', 'NORMAL'),
('15983267', 'mu3mAXx4Xkzw6', 'NORMAL'),
('16054326', 'mu3mAXx4Xkzw6', 'NORMAL'),
('16783254', 'mu3mAXx4Xkzw6', 'NORMAL'),
('16891230', 'muS2jtPgoEkT2', 'NORMAL'),
('17845455', 'mu3mAXx4Xkzw6', 'NORMAL'),
('17995948', 'mu3mAXx4Xkzw6', 'NORMAL'),
('18045045', 'mu8T9R2k5ysDY', 'NORMAL'),
('18915384', 'mu3mAXx4Xkzw6', 'NORMAL'),
('20981342', 'mu3mAXx4Xkzw6', 'NORMAL'),
('21333266', 'mu3mAXx4Xkzw6', 'NORMAL'),
('21986452', 'mu3mAXx4Xkzw6', 'NORMAL'),
('22222222', 'mu3mAXx4Xkzw6', 'ADMINISTRACION'),
('23232323', 'mu3mAXx4Xkzw6', 'NORMAL'),
('24242424', 'mu3mAXx4Xkzw6', 'CLINICA'),
('25252525', 'mu3mAXx4Xkzw6', 'CLINICA'),
('26262626', 'mu3mAXx4Xkzw6', 'CLINICA'),
('27272727', 'mu3mAXx4Xkzw6', 'CLINICA'),
('28282828', 'muuf.ZbmY4tyc', 'CLINICA'),
('34343434', 'mu3mAXx4Xkzw6', 'CLINICA'),
('55555555', 'mu3mAXx4Xkzw6', 'ROOT'),
('56345345', 'mu1.ZF/yb5k8c', 'CLINICA'),
('56566454', 'mu2M.6J5W25ko', 'CLINICA'),
('77777777', 'mu3mAXx4Xkzw6', 'CLINICA'),
('9288248', 'mub76z0mdAp1k', 'CLINICA'),
('99922222', 'mu4yGPieUPKDQ', 'NORMAL'),
('99999999', 'mub0GQ33FJQoE', 'ADMINISTRACION');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`rut_administracion`),
  ADD KEY `fk_user_admin` (`rut_administracion`);

--
-- Indices de la tabla `clinica_administracion`
--
ALTER TABLE `clinica_administracion`
  ADD PRIMARY KEY (`rut_clinica`);

--
-- Indices de la tabla `espera`
--
ALTER TABLE `espera`
  ADD PRIMARY KEY (`id_es`),
  ADD KEY `espera_reserva_rut_fk` (`rut_es`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`in_histo`),
  ADD KEY `historial_persona_rut_persona_fk` (`rut_histo`),
  ADD KEY `historial_clinica_administracion_rut_clinica_fk` (`rut_especialista`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`rut_persona`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `reserva_persona_rut_persona_fk` (`rut`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `in_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`rut_administracion`) REFERENCES `user` (`rut`);

--
-- Filtros para la tabla `clinica_administracion`
--
ALTER TABLE `clinica_administracion`
  ADD CONSTRAINT `fk_user_clinica` FOREIGN KEY (`rut_clinica`) REFERENCES `user` (`rut`);

--
-- Filtros para la tabla `espera`
--
ALTER TABLE `espera`
  ADD CONSTRAINT `espera_reserva_id_reserva_fk` FOREIGN KEY (`id_es`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_clinica_administracion_rut_clinica_fk` FOREIGN KEY (`rut_especialista`) REFERENCES `clinica_administracion` (`rut_clinica`),
  ADD CONSTRAINT `historial_persona_rut_persona_fk` FOREIGN KEY (`rut_histo`) REFERENCES `persona` (`rut_persona`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_user_persona` FOREIGN KEY (`rut_persona`) REFERENCES `user` (`rut`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_persona_rut_persona_fk` FOREIGN KEY (`rut`) REFERENCES `persona` (`rut_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
