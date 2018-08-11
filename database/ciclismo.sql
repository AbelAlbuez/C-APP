-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 12:02 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciclismo`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `url_imagen` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `posicion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Accesorios'),
(3, 'Bicicletas'),
(2, 'Componentes'),
(5, 'Servicios');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_accesorios`
--

CREATE TABLE `categoria_accesorios` (
  `id` int(11) NOT NULL,
  `celular` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `moneda` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_anuncio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `destacar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `accion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `accesorio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_de_inicio` date NOT NULL,
  `fecha_de_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categoria_accesorios`
--

INSERT INTO `categoria_accesorios` (`id`, `celular`, `moneda`, `titulo_anuncio`, `descripcion`, `destacar`, `precio`, `telefono`, `accion`, `provincia`, `marca`, `modelo`, `accesorio`, `idcategoria`, `id_subcategoria`, `idusuario`, `fecha_de_inicio`, `fecha_de_fin`) VALUES
(28, 'skdmskdmskdskmkdakldms', 'RD$', 'ksdmkasdmda', 'kldsklmsadkmsdkmsdksklmdksmdsakl', 'no', '2323', 'klsdmksmakdsmakdmsakmsdkalm', 'Vender', 'Bahoruco', 'sdkmskdm', 'klsmdskamd', 'skdmsakdsakdmsasda', 1, 1, 1, '2018-08-07', '2018-09-21'),
(29, 'sdswdsadsaklskdlmsklam', 'RD$', 'swdsadlsamsda', 'sklmdksldmsklamdkslamkls', 'no', '21323213', 'lksmdklsadmklsmkldsam', 'Vender', 'Bahoruco', 'sadlkmsdklmsaklmdssdakl', 'sakldmskdmsdkamdsakl', 'lksdmklsamdksalmklsamsd', 1, 1, 1, '2018-08-07', '2018-09-21'),
(30, '232131-23123-12312-312', 'RD$', 'sladkmksladmsaklmd', 'klmsdklamkldmasmdaskmdklasmdakdajeje', 'no', '231231', '2321321-3213123-123', 'Vender', 'Azua', 'klsmdklasmdklsamklsam', 'skdmsakldmkldmaksdm', 'sklmdsaklmdkaslmdklmdas', 1, 1, 1, '2018-08-07', '2018-09-21'),
(31, 'sdaskdmsasadsa', 'RD$', 'sdsdmsa', 'ksdmklsamdklsmdklsamdksamlkads', 'no', '23123', 'ksdmklsamdaskl', 'Vender', 'María Trinidad Sánchez', 'sdklsamdklsamdaskdmas', 'ksldmlksmdsam', 'ksldmsakldmaslk', 1, 1, 1, '2018-08-07', '2018-09-21'),
(32, '3212321321321232', 'RD$', 'ksdmklasmfkdmfdkmfs', 'kmdkldmfkldsmfkdsmfkdsmfkdlsmfsklmfsd', 'no', '23124312', 'd,sal;d,sal;,dls,dal;d,dsal,', 'Vender', 'Azua', 'jdjknfjdsknfjsdnfjskdn', 'jdnfjkfndjkfnsjdn', 'sdlijsadsakdmasdjan', 1, 1, 1, '2018-08-07', '2018-09-21'),
(33, '23623627361763', 'RD$', 'skldmskadmsakdmsadkas', 'klsdklasmdksalmdaskldaskdmasl', 'no', '231232312', 'ksa2193239203219', 'Vender', 'Azua', 'sjdnsajkdnsajkdnasjdna', 'kjsndkjasndkjsandaksjndsaj', 'skdskjadnsjakdnsakjdnsjkan', 1, 1, 1, '2018-08-10', '2018-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_bicicletas`
--

CREATE TABLE `categoria_bicicletas` (
  `id` int(11) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `moneda` varchar(30) NOT NULL,
  `titulo_anuncio` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `destacar` varchar(20) NOT NULL,
  `precio` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `accion` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `size_cuadro` varchar(30) NOT NULL,
  `size_aro` varchar(30) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_de_inicio` date NOT NULL,
  `fecha_de_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_bicicletas`
--

INSERT INTO `categoria_bicicletas` (`id`, `celular`, `moneda`, `titulo_anuncio`, `descripcion`, `destacar`, `precio`, `telefono`, `accion`, `provincia`, `modelo`, `marca`, `size_cuadro`, `size_aro`, `idcategoria`, `id_subcategoria`, `idusuario`, `fecha_de_inicio`, `fecha_de_fin`) VALUES
(12, '26323738938213', 'RD$', 'salmskdmsaknd', 'sakjdnsajkndsajkndjkandsdnjdsanjdksnjdsaknjdsanjsda', 'no', '232323321', 'iwqjesdamkdmslkdsdam', 'Vender', 'Elías Piña', 'sd;l,dls;,lds,dsl,daldasksdjkd', 'BH', 'Niños', '16 Pulgadas', 3, 3, 1, '2018-08-07', '2018-09-21'),
(13, '3912390831kdmsklmds', 'RD$', 'q2312312323', 'klsdmklsdmklsdmkdskdmklsdmklas', 'no', '2321323', 'klmdskmdasklmdsklmdsakl', 'Vender', 'Dajabón', 'sdkmsakdsamdkl', 'Klein', 'XS', '16 Pulgadas', 3, 3, 1, '2018-08-07', '2018-09-21'),
(14, 'wsdewwewqewqewqewq', 'RD$', 'skldmsklddaskdsa', 'siodfjdisdsamdsddsasdsadassadsa', 'no', '3123213213', 'wewkewenjwnejqkwnewkjneqw', 'Vender', 'Azua', 'sdkmskaldmskldmklasmkladmkdlsm', 'Fuji', 'Desconocido', '12 Pulgadas', 3, 3, 1, '2018-08-07', '2018-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_componentes`
--

CREATE TABLE `categoria_componentes` (
  `id` int(11) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `moneda` varchar(30) NOT NULL,
  `titulo_anuncio` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `destacar` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `accion` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `precio` varchar(30) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_de_inicio` date NOT NULL,
  `fecha_de_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_componentes`
--

INSERT INTO `categoria_componentes` (`id`, `celular`, `moneda`, `titulo_anuncio`, `descripcion`, `destacar`, `telefono`, `accion`, `provincia`, `tipo`, `marca`, `modelo`, `precio`, `idcategoria`, `id_subcategoria`, `idusuario`, `fecha_de_inicio`, `fecha_de_fin`) VALUES
(5, '232321oi321sad ', 'RD$', 'klsadksladdsakm', 'klsdmlksadmklsdmklsdaklsdamksdaklsdamsad', 'no', 'sdalsodkasksdamkd', 'Vender', 'Azua', 'BMX', 'BH', 'model', '5002312', 2, 4, 1, '2018-08-07', '2018-09-21'),
(6, '9e193281938213', 'RD$', 'ksdmksdaas', 'klmkmdlkfslmsalkmsadldsklsadad', 'no', 'sdjsdijasdijdsaiasd', 'Vender', 'Dajabón', 'BMX', 'BH', 'kdlmsakldmskdmdsalkdmsakd', '231232', 2, 5, 1, '2018-08-07', '2018-09-21'),
(7, '21323213231231231231', 'RD$', 'kldmsmdklamlkmsa', 'klmsdklmdslkmdklasmksmlsmlkamsdkldam', 'no', '231321312321321', 'Vender', 'Azua', 'BMX', 'Cyfac', 'sdlmaksmdkslamdklmdakm', '1232312323', 2, 6, 1, '2018-08-07', '2018-09-21'),
(8, '3231232323231232', 'RD$', 'jeiicoooooooooooooooooooo', 'jeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'no', '232312312312323211', 'Vender', 'Azua', 'BMX', 'BH', '232132sddadadas', '342343432432', 2, 6, 1, '2018-08-07', '2018-09-21'),
(9, '391239083123123', 'RD$', 'jeje', 'sdkasldmsakda21312313', 'no', '3213213123213', 'Comprar', 'Duarte', 'Chopper', 'Colnago', 'model', '6000', 2, 6, 1, '2018-08-07', '2018-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_servicios`
--

CREATE TABLE `categoria_servicios` (
  `id` int(11) NOT NULL,
  `celular` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `moneda` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_anuncio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `destacar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `accion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_de_inicio` date NOT NULL,
  `fecha_de_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categoria_servicios`
--

INSERT INTO `categoria_servicios` (`id`, `celular`, `moneda`, `titulo_anuncio`, `descripcion`, `destacar`, `precio`, `telefono`, `accion`, `provincia`, `idcategoria`, `id_subcategoria`, `idusuario`, `fecha_de_inicio`, `fecha_de_fin`) VALUES
(1, '13213423432434', 'US$', 'admsakldm', 'ksdmksamdksalmdsakdmsaklmdsamd', 'no', '31242343', '1ll;dslmfdkm34342342', 'Vender', 'La Romana', 5, 9, 1, '2018-08-07', '2018-09-21'),
(2, '13213423432434', 'US$', 'admsakldm', 'ksdmksamdksalmdsakdmsaklmdsamd', 'no', '31242343', '1ll;dslmfdkm34342342', 'Vender', 'La Romana', 5, 9, 1, '2018-08-07', '2018-09-21'),
(4, '13213423432434', 'US$', 'admsakldm', 'ksdmksamdksalmdsakdmsaklmdsamd', 'no', '31242343', '1ll;dslmfdkm34342342', 'Vender', 'La Romana', 5, 9, 1, '2018-08-07', '2018-09-21'),
(5, '13213423432434', 'US$', 'admsakldm', 'ksdmksamdksalmdsakdmsaklmdsamd', 'no', '31242343', '1ll;dslmfdkm34342342', 'Vender', 'La Romana', 5, 9, 1, '2018-08-07', '2018-09-21'),
(6, '13213423000', 'RD$', 'admsakldm', 'Angel Reyes Espinal Espinal', 'no', '31242343', '1ll;dslmfdkm34342342', 'Vender', 'La Romana', 5, 9, 1, '2018-08-07', '2018-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `lugar` varchar(30) NOT NULL,
  `latitud` varchar(30) NOT NULL,
  `longitud` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `url_imagen` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `tipo_anuncio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `id_anuncio`, `tipo_anuncio`) VALUES
(76, 'fondos-de-pantalla-de-animales-23-478x299.jpg', 28, 'Accesorios'),
(77, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 28, 'Accesorios'),
(81, 'f329de14bf00bb8cdcc13473dc694039-700.jpg', 12, 'Bicicletas'),
(82, 'fondos-de-pantalla-de-animales-23-478x299.jpg', 12, 'Bicicletas'),
(83, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 12, 'Bicicletas'),
(84, 'images.jpg', 13, 'Bicicletas'),
(85, 'fondos-de-pantalla-de-animales-23-478x299.jpg', 13, 'Bicicletas'),
(86, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 13, 'Bicicletas'),
(87, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 29, 'Accesorios'),
(88, 'thumb-350-678636.jpg', 29, 'Accesorios'),
(89, 'fondos-de-pantalla-de-animales-23-478x299.jpg', 5, 'Componentes'),
(90, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 5, 'Componentes'),
(91, 'leopardo-en-la-nieve-2845.jpg', 5, 'Componentes'),
(92, 'thumb-350-678636.jpg', 5, 'Componentes'),
(93, 'animals-horse-wallpaper-hd-3565.jpg', 6, 'Componentes'),
(94, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 7, 'Componentes'),
(96, 'animals-horse-wallpaper-hd-3565.jpg', 8, 'Componentes'),
(97, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 8, 'Componentes'),
(98, 'thumb-350-678636.jpg', 8, 'Componentes'),
(99, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 9, 'Componentes'),
(101, 'imagenes-wallpaper-hd-gratis-animales-salvajes-fotos-fondos-pantalla (63).jpg', 1, 'Servicios'),
(102, 'images.jpg', 1, 'Servicios'),
(103, 'leopardo-en-la-nieve-2845.jpg', 1, 'Servicios'),
(104, 'thumb-350-678636.jpg', 1, 'Servicios'),
(105, '37023965_1768234266590909_1013402859250647040_n.png', 4, 'Servicios'),
(108, '37023965_1768234266590909_1013402859250647040_n.png', 30, 'Accesorios'),
(109, '37023965_1768234266590909_1013402859250647040_n.png', 31, 'Accesorios'),
(110, '37023965_1768234266590909_1013402859250647040_n.png', 32, 'Accesorios'),
(111, '37023965_1768234266590909_1013402859250647040_n.png', 33, 'Accesorios');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `url_imagen` varchar(250) NOT NULL,
  `fecha_de_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `idcategoria`, `nombre`) VALUES
(1, 1, 'Bomba de aire'),
(2, 1, 'Aros'),
(3, 3, 'Chopper'),
(4, 2, 'aros'),
(5, 2, 'cables'),
(6, 2, 'pedales'),
(7, 5, 'Clases'),
(8, 5, 'Eventos'),
(9, 5, 'Fitting');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `apodo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `permisos` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `apodo`, `correo`, `contrasenia`, `fecha`, `tipo`, `permisos`) VALUES
(1, 'Admin', 'aalbuezs@gmail.com', '123456', '2018-07-27', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `categoria_accesorios`
--
ALTER TABLE `categoria_accesorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `categoria_bicicletas`
--
ALTER TABLE `categoria_bicicletas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marca` (`marca`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `categoria_componentes`
--
ALTER TABLE `categoria_componentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categoria_accesorios`
--
ALTER TABLE `categoria_accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categoria_bicicletas`
--
ALTER TABLE `categoria_bicicletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categoria_componentes`
--
ALTER TABLE `categoria_componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoria_accesorios`
--
ALTER TABLE `categoria_accesorios`
  ADD CONSTRAINT `categoria_accesorios_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria_accesorios_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `categoria_accesorios_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `categoria_bicicletas`
--
ALTER TABLE `categoria_bicicletas`
  ADD CONSTRAINT `categoria_bicicletas_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `categoria_bicicletas_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `categoria_bicicletas_ibfk_4` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `categoria_componentes`
--
ALTER TABLE `categoria_componentes`
  ADD CONSTRAINT `categoria_componentes_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `categoria_componentes_ibfk_3` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `categoria_componentes_ibfk_4` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id`);

--
-- Constraints for table `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  ADD CONSTRAINT `categoria_servicios_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria_servicios_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `categoria_servicios_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
