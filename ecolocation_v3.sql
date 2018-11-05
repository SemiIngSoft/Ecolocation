-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2018 at 10:21 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecolocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `centroderecoleccion`
--

CREATE TABLE `centroderecoleccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(60) NOT NULL,
  `domicilio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centroderecoleccion`
--

INSERT INTO `centroderecoleccion` (`id`, `nombre`, `ubicacion`, `domicilio`) VALUES
(1, 'San Pedro Tlaquepaque', '20.59257745,-103.3388802826151', 'San Pedro Tlaquepaque'),
(2, 'San Juan de Dios', '20.7136537,-103.3353316', 'San Juan de Dios'),
(3, 'Andares Recolection Center', '20.7105609,-103.4126405', 'Andares');

-- --------------------------------------------------------

--
-- Table structure for table `ciudadano`
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
-- Dumping data for table `ciudadano`
--

INSERT INTO `ciudadano` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `ubicacion`, `domicilio`, `telefono`, `correo`, `password`) VALUES
(1, 'Ricardo', 'Perez', 'Nuñez', '20.707307891745522,-103.36898803710939', 'Contry Club', '3332313435', 'uno@gmail.com', '123456'),
(2, 'Ulises', 'Ruelas', 'Sanchez', '20.69068779230092,-103.35353851318361', 'Panteon de Mezquitan', '3322110099', 'dos@gmail.com', '54321'),
(3, 'Maria', 'Carrillo', 'Flores', '20.66699899678941,-103.26521873474123', 'La Jalisco', '3344556677', 'tres@gmail.com', '1357'),
(18, 'NAme', 'Name', 'name', '20.720568999999998,-103.3183151', 'Calzada Independencia Norte 3785, Ricardo Flores Magón, 44240 Guadalajara, Jal., México', '9999999999', 'fake@mail.com', '$2y$10$NmhgB2mOt.8j9b6am8Jd4.RoYMBXnrSkqtxAR3tkLSa0Kt.fp0BnG');

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCentroRecoleccion` int(11) NOT NULL,
  `idCiudadano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opinion`
--

INSERT INTO `opinion` (`id`, `comentario`, `fecha`, `idCentroRecoleccion`, `idCiudadano`) VALUES
(1, 'Buen servicio, excelente trato del recolector, un 10/10, sigan asi', '2018-11-03 20:38:41', 1, 2),
(2, 'Pesimo, llego 30 min tarde y olía a alcohol', '2018-11-03 20:38:41', 3, 1),
(3, 'Me gusto el recolector de basura, estaba guapo y olia a limon, mandanme Whats ', '2018-11-03 20:38:41', 2, 3),
(5, 'sdg', '2018-11-03 21:02:16', 1, 1),
(6, 'sdgsd\n', '2018-11-03 21:08:38', 1, 1),
(7, 'kopsakfopaksopfkoaps', '2018-11-04 14:10:25', 3, 1),
(8, 'ksopafkaospfkaspo', '2018-11-04 15:15:12', 1, 1),
(9, 'safpoaskfopskaop', '2018-11-04 15:15:42', 3, 18),
(10, 'test', '2018-11-04 15:17:11', 3, 18),
(11, 'test', '2018-11-04 15:17:29', 3, 18),
(12, '', '2018-11-04 15:24:50', 3, 18),
(13, 'sdkgpsdkogskdopgkosp', '2018-11-04 15:25:08', 3, 18),
(14, 'sdkgpsdkogskdopgkosp', '2018-11-04 15:29:45', 3, 18),
(15, 'Llegaron super rapido y se llevaron todas mis cosas. ', '2018-11-05 16:20:30', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `peticion`
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
-- Dumping data for table `peticion`
--

INSERT INTO `peticion` (`id`, `descripcion`, `fecha`, `estado`, `idCentroDeRecoleccion`, `idCiudadano`) VALUES
(1, '3 OMEN HP, 1 Monitor analogico, 1 Mouse con ruedita, 5 Teclados mecanicos, 1 Esfera del 8 digital', '2018-10-11', 0, 3, 2),
(2, '2 Celulares, 1 Laptop dell, 2 Televisiones curvas 80plg', '2018-10-18', 1, 1, 2),
(3, '1 Celular, 3 Bocinas amplificadoras, 1 Iphone XS MAX', '2018-10-25', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarioempresa`
--

CREATE TABLE `usuarioempresa` (
  `id` int(11) NOT NULL,
  `nombreDueno` varchar(50) NOT NULL,
  `apellidoMaternoDueno` varchar(50) NOT NULL,
  `apellidoPaternoDueno` varchar(50) NOT NULL,
  `correo` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL,
  `idCentroDeRecoleccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarioempresa`
--

INSERT INTO `usuarioempresa` (`id`, `nombreDueno`, `apellidoMaternoDueno`, `apellidoPaternoDueno`, `correo`, `password`, `idCentroDeRecoleccion`) VALUES
(1, 'Juan', 'Perez', 'Lopez', 'perez.lopez@gmail.com', '$2y$12$IUqov9gGqTol6jPjLawn.uJhlkGZxoqBPxo5kJuaM8o.4CE4q/Gqm\n', 1),
(2, 'Maximiliano', 'Sanchez', 'Camacho', 'max.camacho@gmail.com', '$2y$12$v4EeKFLeSLOU.anDsconaefjY.4.dbFucc17lzUNob24u6vCAT07W\r\n', 2),
(4, 'Mario', 'Jimenez', 'Martinez', 'martinez.mario@gmial.com', '$2y$12$v4EeKFLeSLOU.anDsconaefjY.4.dbFucc17lzUNob24u6vCAT07W\r\n', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centroderecoleccion`
--
ALTER TABLE `centroderecoleccion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opinion_clave_centro` (`idCentroRecoleccion`),
  ADD KEY `opinion_clave_ciudadano` (`idCiudadano`);

--
-- Indexes for table `peticion`
--
ALTER TABLE `peticion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peticion_clave_centro` (`idCentroDeRecoleccion`),
  ADD KEY `peticion_clave_ciudadano` (`idCiudadano`);

--
-- Indexes for table `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCentroDeRecoleccion` (`idCentroDeRecoleccion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centroderecoleccion`
--
ALTER TABLE `centroderecoleccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ciudadano`
--
ALTER TABLE `ciudadano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `peticion`
--
ALTER TABLE `peticion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_clave_centro` FOREIGN KEY (`idCentroRecoleccion`) REFERENCES `centroderecoleccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opinion_clave_ciudadano` FOREIGN KEY (`idCiudadano`) REFERENCES `ciudadano` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peticion`
--
ALTER TABLE `peticion`
  ADD CONSTRAINT `peticion_clave_centro` FOREIGN KEY (`idCentroDeRecoleccion`) REFERENCES `centroderecoleccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peticion_clave_ciudadano` FOREIGN KEY (`idCiudadano`) REFERENCES `ciudadano` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  ADD CONSTRAINT `usuarioempresa_ibfk_1` FOREIGN KEY (`idCentroDeRecoleccion`) REFERENCES `centroderecoleccion` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
