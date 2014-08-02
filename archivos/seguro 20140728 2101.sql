-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema seguro
--

CREATE DATABASE IF NOT EXISTS seguro;
USE seguro;

--
-- Definition of table `barrios`
--

DROP TABLE IF EXISTS `barrios`;
CREATE TABLE `barrios` (
  `idbarrios` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idbarrios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barrios`
--

/*!40000 ALTER TABLE `barrios` DISABLE KEYS */;
/*!40000 ALTER TABLE `barrios` ENABLE KEYS */;


--
-- Definition of table `calles`
--

DROP TABLE IF EXISTS `calles`;
CREATE TABLE `calles` (
  `idcalles` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idcalles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calles`
--

/*!40000 ALTER TABLE `calles` DISABLE KEYS */;
/*!40000 ALTER TABLE `calles` ENABLE KEYS */;


--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `idclientes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellido` varchar(25) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `idtipodocumentos` smallint(5) unsigned DEFAULT NULL,
  `documento` int(10) unsigned DEFAULT NULL,
  `idcondfiscales` smallint(5) unsigned DEFAULT NULL,
  `cc1` smallint(5) unsigned DEFAULT NULL,
  `cc2` smallint(5) unsigned DEFAULT NULL,
  `idcalles` smallint(5) unsigned DEFAULT NULL,
  `altura` smallint(5) unsigned DEFAULT NULL,
  `piso` smallint(5) unsigned DEFAULT NULL,
  `dpto` varchar(5) DEFAULT NULL,
  `idbarrios` smallint(5) unsigned DEFAULT NULL,
  `idlocalidad` smallint(5) unsigned DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idclientes`),
  KEY `clientes_calles_FK` (`idcalles`),
  KEY `clientes_barrios_FK` (`idbarrios`),
  KEY `clientes_tipodocumentos_FK` (`idtipodocumentos`),
  KEY `clientes_fiscal_FK` (`idcondfiscales`),
  CONSTRAINT `clientes_fiscal_FK` FOREIGN KEY (`idcondfiscales`) REFERENCES `condfiscales` (`idcondfiscales`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clientes_barrios_FK` FOREIGN KEY (`idbarrios`) REFERENCES `barrios` (`idbarrios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clientes_calles_FK` FOREIGN KEY (`idcalles`) REFERENCES `calles` (`idcalles`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clientes_tipodocumentos_FK` FOREIGN KEY (`idtipodocumentos`) REFERENCES `tipodocumentos` (`idtipodocumentos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Definition of table `condfiscales`
--

DROP TABLE IF EXISTS `condfiscales`;
CREATE TABLE `condfiscales` (
  `idcondfiscales` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`idcondfiscales`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condfiscales`
--

/*!40000 ALTER TABLE `condfiscales` DISABLE KEYS */;
INSERT INTO `condfiscales` (`idcondfiscales`,`descripcion`) VALUES 
 (1,'CONSUMIDOR FINAL'),
 (2,'EXCENTO'),
 (3,'MONOTRIBUTISTA'),
 (4,'RESPONSABLE INSCRIPTO');
/*!40000 ALTER TABLE `condfiscales` ENABLE KEYS */;


--
-- Definition of table `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
CREATE TABLE `telefonos` (
  `idtelefonos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idclientes` int(10) unsigned NOT NULL,
  `numero` varchar(20) NOT NULL,
  PRIMARY KEY (`idtelefonos`),
  KEY `telefonos_clientes_FK` (`idclientes`),
  CONSTRAINT `telefonos_clientes_FK` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefonos`
--

/*!40000 ALTER TABLE `telefonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefonos` ENABLE KEYS */;


--
-- Definition of table `tipodocumentos`
--

DROP TABLE IF EXISTS `tipodocumentos`;
CREATE TABLE `tipodocumentos` (
  `idtipodocumentos` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`idtipodocumentos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipodocumentos`
--

/*!40000 ALTER TABLE `tipodocumentos` DISABLE KEYS */;
INSERT INTO `tipodocumentos` (`idtipodocumentos`,`descripcion`) VALUES 
 (1,'CI'),
 (2,'DNI'),
 (3,'LC'),
 (4,'PASAPORTE'),
 (5,'RI');
/*!40000 ALTER TABLE `tipodocumentos` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
