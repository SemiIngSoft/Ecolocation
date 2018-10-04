-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2018 a las 19:34:15
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecolocation`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroderecoleccion`
--

CREATE TABLE `centroderecoleccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centroderecoleccion`
--

INSERT INTO `centroderecoleccion` (`id`, `nombre`, `ubicacion`) VALUES
(1, 'San Pedro Tlaquepaque', '20.59257745,-103.3388802826151'),
(2, 'San Juan de Dios', '20.7136537,-103.3353316'),
(3, 'Andares', '20.7105609,-103.4126405');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `ubicacion` varchar(60) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono` decimal(10,0) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudadano`
--

INSERT INTO `ciudadano` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `ubicacion`, `domicilio`, `telefono`, `correo`, `password`) VALUES
(1, 'Ricardo', 'Perez', 'Nuñez', '20.707307891745522,-103.36898803710939', 'Contry Club', '3332313435', 'uno@gmail.com', '123456'),
(2, 'Ulises', 'Ruelas', 'Sanchez', '20.69068779230092,-103.35353851318361', 'Panteon de Mezquitan', '3322110099', 'dos@gmail.com', '54321'),
(3, 'Maria', 'Carrillo', 'Flores', '20.66699899678941,-103.26521873474123', 'La Jalisco', '3344556677', 'tres@gmail.com', '1357');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `comentario` text NOT NULL,
  `idCentroRecoleccion` int(11) NOT NULL,
  `idCiudadano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`comentario`, `idCentroRecoleccion`, `idCiudadano`) VALUES
('Buen servicio, excelente trato del recolector, un 10/10, sigan asi', 1, 2),
('Pesimo, llego 30 min tarde y olía a alcohol', 3, 1),
('Me gusto el recolector de basura, estaba guapo y olia a limon, mandanme Whats ', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion`
--

CREATE TABLE `peticion` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `idCentroDeRecoleccion` int(11) NOT NULL,
  `idCiudadano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peticion`
--

INSERT INTO `peticion` (`id`, `descripcion`, `fecha`, `estado`, `idCentroDeRecoleccion`, `idCiudadano`) VALUES
(1, '3 OMEN HP, 1 Monitor analogico, 1 Mouse con ruedita, 5 Teclados mecanicos, 1 Esfera del 8 digital', '2018-10-11', 0, 3, 2),
(2, '2 Celulares, 1 Laptop dell, 2 Televisiones curvas 80plg', '2018-10-18', 1, 1, 2),
(3, '1 Celular, 3 Bocinas amplificadoras, 1 Iphone XS MAX', '2018-10-25', 1, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centroderecoleccion`
--
ALTER TABLE `centroderecoleccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD KEY `opinion_clave_centro` (`idCentroRecoleccion`),
  ADD KEY `opinion_clave_ciudadano` (`idCiudadano`);

--
-- Indices de la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peticion_clave_centro` (`idCentroDeRecoleccion`),
  ADD KEY `peticion_clave_ciudadano` (`idCiudadano`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centroderecoleccion`
--
ALTER TABLE `centroderecoleccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `peticion`
--
ALTER TABLE `peticion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_clave_centro` FOREIGN KEY (`idCentroRecoleccion`) REFERENCES `centroderecoleccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opinion_clave_ciudadano` FOREIGN KEY (`idCiudadano`) REFERENCES `ciudadano` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD CONSTRAINT `peticion_clave_centro` FOREIGN KEY (`idCentroDeRecoleccion`) REFERENCES `centroderecoleccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peticion_clave_ciudadano` FOREIGN KEY (`idCiudadano`) REFERENCES `ciudadano` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
