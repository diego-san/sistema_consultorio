-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2017 a las 20:42:25
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
  `rut_administracion` char(8) NOT NULL,
  `digito_admin` char(1) NOT NULL,
  `nombre_administracion` varchar(45) NOT NULL,
  `cargo_admin` varchar(45) NOT NULL,
  `apellido_administracion` varchar(45) NOT NULL,
  `titulo_admin` varchar(45) NOT NULL,
  `numero_admin` bigint(20) NOT NULL,
  `correo_admin` varchar(100) NOT NULL,
  `direcc_admin` varchar(200) NOT NULL,
  `fech_nac_admin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`rut_administracion`, `digito_admin`, `nombre_administracion`, `cargo_admin`, `apellido_administracion`, `titulo_admin`, `numero_admin`, `correo_admin`, `direcc_admin`, `fech_nac_admin`) VALUES
('22222222', '2', 'marta', 'secretaria', 'segundo', 'secretaria', 45345232524, 'marta@gmail.com', 'su casas', '1930-06-12'),
('55555555', '5', 'marcelo', 'informatica', 'ibarra', 'ingeniero informatico', 56997045099, 'marcelo@gmail.com', 'su casas', '1985-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica_administracion`
--

CREATE TABLE `clinica_administracion` (
  `rut_clinica` char(8) NOT NULL,
  `digito_clin` char(1) NOT NULL,
  `nombre_clinica` varchar(45) NOT NULL,
  `apellido_clinica` varchar(45) NOT NULL,
  `titulo_clinica` varchar(45) NOT NULL,
  `cargo_clinica` varchar(45) NOT NULL,
  `numero_clinica` bigint(20) NOT NULL,
  `correo_clinica` varchar(200) NOT NULL,
  `direcc_clinica` varchar(200) NOT NULL,
  `fech_nac_clinica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clinica_administracion`
--

INSERT INTO `clinica_administracion` (`rut_clinica`, `digito_clin`, `nombre_clinica`, `apellido_clinica`, `titulo_clinica`, `cargo_clinica`, `numero_clinica`, `correo_clinica`, `direcc_clinica`, `fech_nac_clinica`) VALUES
('24242424', '7', 'marco', 'perez', 'KINECIOLOGO', 'KINESIOLOGIA', 56838472893, 'marcos@gmail.com', ' DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1970-02-04'),
('25252525', '4', 'peter', 'ojera', 'OFTAMOLOgo', 'OFTAMOLOGIA', 56567456756, 'petter@hotmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1979-01-02'),
('26262626', '1', 'marcelo', 'ibarra', 'MEDICO PEDIATRIA', 'PEDIATRIA', 56353453453, 'marceloiba@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1970-02-01'),
('27272727', '9', 'marta', 'ojera', 'medico', 'MATERNAL', 56466374563, 'marta23@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1980-02-02'),
('28282828', '6', 'yan', 'lucaveche', 'GINECOLO', 'GINECOLOGIA', 56342342342, 'yan@gmail.com', ' DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1980-06-11'),
('34343434', '0', 'pedro', 'perez', 'medico dental', 'DENTAL', 56342423423, 'pedro@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1974-12-07'),
('56345345', '1', 'jaime', 'morales', 'vendedor de paltas', 'MENTAL', 56345345345, 'jaime@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1974-12-07'),
('56566454', '9', 'marcelo', 'ibarba', 'medico pediatra', 'PEDIATRIA', 56345345356, 'marcelo@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar', '1974-12-07'),
('77777777', '7', 'don', 'cooper', 'medico general', 'GENERAL', 56456456456, 'don@gmail.com', 'DirecciÃ³n: Alvarez 1532 - ViÃ±a del Mar ', '1974-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `rut_contacto` char(8) NOT NULL,
  `nombre_contacto` varchar(45) NOT NULL,
  `apellido_contacto` varchar(45) NOT NULL,
  `numero_contacto` bigint(20) NOT NULL,
  `direcc_contacto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `rut_histo` char(8) NOT NULL,
  `rut_especialista` char(8) NOT NULL,
  `informe_ante` varchar(2000) NOT NULL,
  `tipo_atencion` varchar(45) NOT NULL,
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
('13131313', '77777777', 'siempre biene', 'GENERAL', '2017-12-04 15:31:15', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `rut_persona` char(8) NOT NULL,
  `digito_persona` char(1) NOT NULL,
  `nro_ficha` int(11) NOT NULL,
  `nombre_persona` varchar(45) NOT NULL,
  `apellido_persona` varchar(45) NOT NULL,
  `fech_nac_persona` date NOT NULL,
  `genero_persona` char(1) NOT NULL,
  `direccion_persona` varchar(45) NOT NULL,
  `servicio_salub` varchar(45) NOT NULL,
  `ciudad_nacimiento` varchar(45) NOT NULL,
  `numero_telefono` bigint(20) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `establecimiento` varchar(45) NOT NULL,
  `tipo_persona` varchar(45) NOT NULL,
  `rut_contac` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`rut_persona`, `digito_persona`, `nro_ficha`, `nombre_persona`, `apellido_persona`, `fech_nac_persona`, `genero_persona`, `direccion_persona`, `servicio_salub`, `ciudad_nacimiento`, `numero_telefono`, `sector`, `establecimiento`, `tipo_persona`, `rut_contac`) VALUES
('12121212', '9', 677683, 'tom', 'gonzales', '1970-02-05', 'M', '19 NORTE CON CALLE TRES, SANTA INES', 'fonasa', 'valparaiso', 56987684748, '4', 'lucitania', 'NO', NULL),
('13131313', '6', 343333, 'marta', 'galindo', '1970-02-05', 'F', 'Hospital Dr. Gustavo Fricke - DirecciÃ³n: Alv', 'fonasa', ' ViÃ±a del Mar ', 45345452454, '4', 'lucitania', 'NO', NULL),
('16891230', '7', 45, 'francisco', 'aguirre', '2015-06-11', 'M', 'de bajo del puente', 'fonasa', 'quillota', 69696969696, 'chorrillos', 'este', 'NO', NULL),
('17995948', '8', 2889, 'felipe', 'estay', '1992-04-21', 'M', 'Alvarez 1532 - ViÃ±a del Mar', 'fonasa', 'viÃ±a del mar', 12222222222, '4', 'hospital', 'NO', NULL),
('18045045', '9', 23, 'marcelo', 'ibarra', '1973-09-11', 'M', 'av. siempre viva 444 ', 'fonasa', 'san bisente de taguatagua', 9634524532, 'los sauses', 'consultorio 1', 'NO', NULL),
('18915384', '8', 3453322, 'diego', 'sanchez', '1986-08-16', 'M', ' Hospital Dr. Gustavo Fricke - DirecciÃ³n: Al', 'fonsana', 'valparaiso', 56997045099, 'miraflores', 'lusitania', 'NO', NULL),
('23232323', 'K', 902323, 'mariano', 'gonzales', '1980-07-11', 'M', 'su casa', 'fonasa', 'la serena', 234234232, 'miraflores', 'lucitania', 'NO', NULL),
('99922222', '6', 4533, 'jaime', 'morales', '1980-06-11', 'M', 'su casa', 'fonasa', 'val', 56756756756, '4', 'aqui', 'NO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `rut` char(8) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_reveva` varchar(45) NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`rut`, `fecha`, `tipo_reveva`, `id_reserva`) VALUES
('23232323', '2017-11-29 09:30:00', 'GENERAL', 84),
('12121212', '2017-12-04 08:45:00', 'GENERAL', 96),
('12121212', '2017-12-05 08:00:00', 'KINESIOLOGIA', 97),
('13131313', '2017-12-04 08:00:00', 'MENTAL', 100),
('13131313', '2017-12-04 08:30:00', 'PEDIATRIA', 101),
('13131313', '2017-12-05 08:30:00', 'KINESIOLOGIA', 102),
('13131313', '2017-12-04 08:30:00', 'GINECOLOGIA', 104),
('13131313', '2018-01-08 09:00:00', 'MATERNAL', 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `rut` char(8) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`rut`, `password`, `tipo`) VALUES
('12121212', 'mu3mAXx4Xkzw6', 'NORMAL'),
('13131313', 'mu3mAXx4Xkzw6', 'NORMAL'),
('16891230', 'muS2jtPgoEkT2', 'NORMAL'),
('17995948', 'mu3mAXx4Xkzw6', 'NORMAL'),
('18045045', 'mu8T9R2k5ysDY', 'NORMAL'),
('18915384', 'mu3mAXx4Xkzw6', 'NORMAL'),
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
('99922222', 'mu4yGPieUPKDQ', 'NORMAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`digito_admin`),
  ADD KEY `fk_user_admin` (`rut_administracion`);

--
-- Indices de la tabla `clinica_administracion`
--
ALTER TABLE `clinica_administracion`
  ADD PRIMARY KEY (`rut_clinica`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`rut_contacto`);

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
  ADD PRIMARY KEY (`rut_persona`),
  ADD KEY `persona_contacto_rut_contacto_fk` (`rut_contac`);

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
  MODIFY `in_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_persona_rut_contac_fk` FOREIGN KEY (`rut_contacto`) REFERENCES `persona` (`rut_contac`);

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
