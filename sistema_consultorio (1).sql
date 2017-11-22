-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2017 a las 19:22:21
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clinica_administracion`
--

INSERT INTO `clinica_administracion` (`rut_clinica`, `digito_clin`, `nombre_clinica`, `apellido_clinica`, `titulo_clinica`, `cargo_clinica`, `numero_clinica`, `correo_clinica`, `direcc_clinica`, `fech_nac_clinica`) VALUES
('77777777', '7', 'don', 'medico', 'cooper', 'medicina general', 32342342342, 'cooper@gmail.xon', 'su casa', '1960-07-08'),
('99999999', '9', 'Kenneth H', 'administracion clinica', 'Cooper', 'Doctor en medicina', 56342423423, 'octorcooper@gmail.com', 'Cooper, ValparaÃ­so, RegiÃ³n de ValparaÃ­so', '1970-02-05');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `in_histo` int(11) NOT NULL,
  `rut_histo` char(8) NOT NULL,
  `rut_especialista` char(8) NOT NULL,
  `informe_ante` varchar(300) NOT NULL,
  `tipo_atencion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`rut_persona`, `digito_persona`, `nro_ficha`, `nombre_persona`, `apellido_persona`, `fech_nac_persona`, `genero_persona`, `direccion_persona`, `servicio_salub`, `ciudad_nacimiento`, `numero_telefono`, `sector`, `establecimiento`, `tipo_persona`, `rut_contac`) VALUES
('12121212', '9', 677683, 'tom', 'gonzales', '1970-02-05', 'M', '19 NORTE CON CALLE TRES, SANTA INES', 'fonasa', 'valparaiso', 56987684748, '4', 'lucitania', 'NO', NULL),
('16891230', '7', 45, 'francisco', 'aguirre', '2015-06-11', 'M', 'de bajo del puente', 'fonasa', 'quillota', 69696969696, 'chorrillos', 'este', 'NO', NULL),
('18045045', '9', 23, 'marcelo', 'ibarra', '1973-09-11', 'M', 'av. siempre viva 444 ', 'fonasa', 'san bisente de taguatagua', 9634524532, 'los sauses', 'consultorio 1', 'NO', NULL),
('23232323', 'K', 902323, 'mariano', 'gonzales', '1980-07-11', 'M', 'su casa', 'fonasa', 'la serena', 234234232, 'miraflores', 'lucitania', 'NO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `rut` char(8) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `tipo_reveva` varchar(45) NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `rut` char(8) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`rut`, `password`, `tipo`) VALUES
('12121212', 'mu3mAXx4Xkzw6', 'NORMAL'),
('16891230', 'muS2jtPgoEkT2', 'NORMAL'),
('18045045', 'mu8T9R2k5ysDY', 'NORMAL'),
('22222222', 'mu3mAXx4Xkzw6', 'ADMINISTRACION'),
('23232323', 'mu3mAXx4Xkzw6', 'NORMAL'),
('55555555', 'mu3mAXx4Xkzw6', 'ROOT'),
('77777777', 'mu3mAXx4Xkzw6', 'CLINICA'),
('99999999', 'mub0GQ33FJQoE', 'CLINICA');

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
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

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
