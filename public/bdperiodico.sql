-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2018 at 06:07 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `periodico`
--

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `idKeyword` int(11) NOT NULL AUTO_INCREMENT,
  `Keywords` varchar(45) NOT NULL,
  PRIMARY KEY (`idKeyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `keywordsnoticia`
--

DROP TABLE IF EXISTS `keywordsnoticia`;
CREATE TABLE IF NOT EXISTS `keywordsnoticia` (
  `idnoticia` int(11) NOT NULL,
  `idkeyword` int(11) NOT NULL,
  PRIMARY KEY (`idnoticia`,`idkeyword`),
  KEY `fk_keywordsNoticia_1_idx` (`idkeyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(45) NOT NULL,
  `editor` varchar(45) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `idseccion` int(11) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `texto` longtext NOT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaModificacion` date NOT NULL,
  `fechaPublicacion` date NOT NULL,
  PRIMARY KEY (`idnoticia`),
  KEY `fk_noticias_1_idx` (`idseccion`),
  KEY `fk_noticias_2_idx` (`autor`),
  KEY `fk_noticias_3_idx` (`editor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `autor`, `editor`, `titulo`, `idseccion`, `subtitulo`, `texto`, `imagen`, `fechaCreacion`, `fechaModificacion`, `fechaPublicacion`) VALUES
(1, 'periodista', 'editor', 'Lorem Ipsum', 2, 'lorem ipsum', 'la primera noticia que consigo inserter sin morir', NULL, '2018-11-19', '2018-11-20', '2018-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
CREATE TABLE IF NOT EXISTS `seccion` (
  `idseccion` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idseccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seccion`
--

INSERT INTO `seccion` (`idseccion`, `descripcion`) VALUES
(1, 'politica'),
(2, 'cultura'),
(3, 'deportes');

-- --------------------------------------------------------

--
-- Table structure for table `tipousuarios`
--

DROP TABLE IF EXISTS `tipousuarios`;
CREATE TABLE IF NOT EXISTS `tipousuarios` (
  `idtipousuario` int(11) NOT NULL,
  `tipousuarios` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipousuarios`
--

INSERT INTO `tipousuarios` (`idtipousuario`, `tipousuarios`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'PERIODISTA'),
(3, 'EDITOR');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `fk_usuarios_1_idx` (`idtipousuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `nombre`, `idtipousuario`) VALUES
('administradora', '1111', 'Iris Martínez', 1),
('Buuu', '1234', 'Buuu prusti', 3),
('Cloita', '2222', 'Cloita Prustiana', 2),
('Dimsa', '1111', 'Dimsa DJ', 2),
('editor', '1111', 'Pringaten Primer', 3),
('kazaar', '1234', 'wetrt4etyh', 2),
('Mininem', '1111', 'Mininem Prustiana', 1),
('nespresso', '1234', 'nespresso caca', 3),
('periodista', '1111', 'Eva Lujan', 2),
('Rosca', 'value', 'oscar', 1),
('Ruc', 'values', 'prsushuhsi', 2),
('Supercloe', 'oxieva', 'etweryeryh', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keywordsnoticia`
--
ALTER TABLE `keywordsnoticia`
  ADD CONSTRAINT `fk_keywordsNoticia_1` FOREIGN KEY (`idkeyword`) REFERENCES `keywords` (`idKeyword`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_keywordsNoticia_2` FOREIGN KEY (`idnoticia`) REFERENCES `noticias` (`idnoticia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_1` FOREIGN KEY (`idseccion`) REFERENCES `seccion` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_2` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_3` FOREIGN KEY (`editor`) REFERENCES `usuarios` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuarios` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;