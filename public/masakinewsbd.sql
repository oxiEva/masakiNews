-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2018 at 03:06 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `autor`, `editor`, `titulo`, `idseccion`, `subtitulo`, `texto`, `imagen`, `fechaCreacion`, `fechaModificacion`, `fechaPublicacion`) VALUES
(1, 'pino', 'editor', 'Los editores de diccionarios Vox admiten que les desagrada que exista un partido con el mismo nombre', 2, 'La editorial prefiere que su marca no se asocie a la política', 'Los editores de los diccionarios Vox, con más de medio siglo de trayectoria, han admitido este lunes que les \"toca las narices\" que exista un partido con el mismo nombre, y preferirían que su marca no se asociase a la política. \"Nosotros no nos presentamos a las elecciones, nos dedicamos a hacer diccionarios, a la cultura y a la investigación\", han explicado a Europa Press fuentes de la empresa.\r\n\r\nLa editorial Vox, con sede en Barcelona e integrada en el Grupo Anaya, está especializada desde hace décadas a la creación de diccionarios monolingües y bilingües, entre ellos de latín, la lengua en la que su nombre significa voz. La misma palabra que utilizó para denominarse el partido de Santiago Abascal, que este domingo irrumpió con fuerza en las elecciones andaluzas obteniendo 12 escaños, cuando se fundó en 2013.', 'imagenes/vox.jpg', '2018-11-19', '2018-11-20', '2018-11-24'),
(3, 'lomin', 'editor', 'Las obras de Banksy llegan a España en la primera muestra dedicada al artista', 2, 'Las piezas, que ya se han expuesto en Moscú y proceden de colecciones privadas.', '\"Una exposición no autorizada de trabajos procedentes de colecciones privadas del artista conocido como Banksy. ¿Genio o Vándalo?\"; así se ha anunciado este viernes la primera muestra que se dedica al artista callejero en España, que abrirá sus puertas en el Espacio 51 de Ifema el próximo 6 de diciembre.\r\n\r\nSegún ha informado en una nota Sold Out, organizadora de la muestra junto a IQ Art Management, se expondrán \"más de 70 creaciones\". Algunas de las cuales \"estarán a la venta\", entre las que hay \"obras originales, esculturas, instalaciones, vídeos y fotografías\".', 'imagenes/bansky.jpg', '2018-12-04', '2018-12-04', '2018-12-04'),
(4, 'lomin', 'editor', 'El reggae y las tamborradas, considerados Patrimonio Inmaterial de la Humanidad', 2, 'La Unesco destacó su importancia en un comunicado official.', 'El reggae de Jamaica y las tamboradas de España fueron declarados este jueves Patrimonio Cultural Inmaterial de la Humanidad por la Unesco. Así lo ha decidido la Convención de la Organización de las Naciones Unidas para la Educación, la Ciencia y la Cultura (Unesco) tras examinar varias candidaturas esta semana.\r\n\r\nEn cuanto al género musical, \"su aportación a la reflexión internacional sobre cuestiones como la injusticia, la resistencia, el amor y la condición humana pone de relieve la fuerza intelectual, sociopolítica, espiritual y sensual de este elemento del patrimonio cultural\", ha explicado la organización en un comunicado.', 'imagenes/tamborrada.jpg', '2018-12-04', '2018-12-04', '2018-12-04'),
(5, 'pino', 'editor', 'La Audiencia rechaza apartar al juez Andreu del juicio sobre Gürtel y Aena ', 1, 'Su amistad con Delgado y Garzón le separa del juicio sobre los casos Gürtel y Aena', 'La Sección Segunda de la Sala de lo Penal de la Audiencia Nacional ha rechazado de plano apartar al juez Fernando Andreu del juicio sobre los contratos presuntamente irregulares de la trama Gürtel con Aena, una recusación que pedía uno de los encausados alegando que su amistad con la actual ministra de Justicia, Dolores Delgado, y con el exmagistrado instructor de la causa, Baltasar Garzón, ponía en duda su imparcialidad.\r\n\r\nEn concreto, la recusación fue interpuesta por José María Gavari, que fue número dos del entonces director de Comunicación de Aena, Ángel López de la Mota, cuando se registraron los supuestos contratos irregulares con las empresas de Gürtel. Por ellos, ambos se sentarán en el banquillo a partir del próximo 10 de diciembre en la Sección Segunda, de la que forma parte Andreu, futuro ponente de la sentencia.\r\n\r\n', 'imagenes/juezandreu.jpg', '2018-12-03', '2018-12-03', '2018-12-04'),
(6, 'lomin', 'editor', 'La colombiana Caterine Ibargüen gana el premio a la mejor atleta del año', 3, 'La saltadora, medallista de oro en los olímpicos de Río, apunta ahora a Tokio 2020.', 'La saltadora colombiana Caterine Ibargüen corroboró este martes el estatus de indestronable que disfruta desde hace años en su país al ser elegida como la mejor atleta de 2018 por la Federación Internacional de Atletismo (IAAF), apenas la segunda ocasión en que Latinoamérica obtiene la distinción. En la gala celebrada en Mónaco la acompañó el fondista keniano Eliud Kipchoge, recordman de maratón.\r\nIbargüen, medalla de oro en salto triple en los olímpicos de Río 2016, coronó así un año impecable. La desparpajada atleta colombiana, de 34 años, ganó las competencias de longitud y salto triple en los últimos Juegos Centroamericanos y del Caribe, en Barranquilla, y realizó la proeza de ganar estos dos títulos en la Liga de Diamante en dos ciudades diferentes en el espacio de 24 horas.', 'imagenes/ibarguen.jpg', '2018-12-05', '2018-12-05', '2018-12-05'),
(7, 'pino', 'editor', 'España cae con Holanda sobre la bocina', 3, 'España cae con Holanda sobre la bocina', 'Un gol en el último segundo de la lateral Lois Abbingh condenó a España a su primera derrota en el Europeo de Francia, tras caer este lunes por 28-27 ante Holanda, la vigente subcampeona mundial, en un encuentro en el que España demostró que puede competir de tú a tú con las grandes potencias del balonmano mundial.\r\n\r\nPero ni la excepcional actuación del conjunto español pudo evitar una derrota, que llegó de la manera más cruel posible, con un lanzamiento de golpe franco de Abbingh en el último segundo, cuando España contaba con tan sólo cuatro jugadoras de pista por las exclusiones de Almudena Rodríguez y Carmen Martín.', 'imagenes/guerreras.jpg', '2018-12-03', '2018-12-03', '2018-12-03'),
(8, 'pino', 'editor', 'Tokio 2020 propone adelantar el maratón a las 6 de la mañana para evitar el calor', 3, 'Se uniría a otras medidas ya previstas para mitigar las altas temperaturas', 'El Comité Olímpico Internacional (COI) y la organización de Tokio 2020 han propuesto adelantar el inicio de las pruebas de maratón a las 5.30 o 6.00 de la mañana para evitar el intenso calor que se prevé en las fechas de la cita deportiva. Esta medida fue formulada por un comité de expertos designado por el COI y la organización de Tokio 2020, y discutida durante las reuniones celebradas entre ambas partes en los últimos días en la capital nipona, según aseguró el presidente de la Comisión de Coordinación para los próximos JJOO, el australiano John Coates.El objetivo del adelanto horario es evitar las horas centrales del día con temperaturas de entre 39 y 41 grados que se prevén para las fechas de la competición olímpica (del 24 de julio al 9 de agosto de 2020). La medida cuenta con el respaldo de expertos en medicina deportiva y meteorología y del Gobierno Metropolitano de Tokio, tras analizar lo que conllevaría en términos logísticos, como una suficiente disponibilidad de transporte público a horas tempranas del día.El COI y la organización de Tokio 2020 se encuentran actualmente en conversaciones con la Federación Internacional de Asociaciones de Atletismo (IAAF, de sus siglas en inglés) para aprobar el cambio respecto a la hora de inicio fijada (las 7.00), algo que se espera que se formalice antes de finales de año.', 'imagenes/maraton.jpg', '2018-12-05', '2018-12-05', '2018-12-05'),
(9, 'Cloita', 'Buuu', 'La IAAF aprueba solicitar al COI la inclusión de los 50 marcha femeninos en Tokio 2020', 3, 'La española Ainhoa Pinedo forma parte de la comitiva que ha viajado a Mónaco', 'La Federación Internacional de atletismo (IAAF) ha aprobado solicitar al Comité Olímpico Internacional la inclusión de los 50 marcha femeninos en el programa olímpico ya en la edición de Tokio 2020. Una delegación de marchadoras de esta prueba, entre la que se encontraba la española Ainhoa Pinedo, viajó hasta Mónaco donde estos días se celebra el Consejo de la IAAF para realizar formalmente esta petición, que finalmente ha contado con el beneplácito del organismo internacional. \"Gracias a todos y cada uno de los miembros de la IAAF que nos han recibido con los brazos abiertos mostrando su apoyo absoluto\", asegura Pinedo. La comitiva estuvo encabezada por el abogado estadounidense Paul DeMeester y la atleta española, junto a Erin Taylor-Talcott, de Estados Unidos; Inés Henriques, de Portugal; y Johanna Ordóñez, de Ecuador.La petición ahora debe ser aceptada por el COI, aunque las marchadoras se muestran optimistas de que así sea. ', 'imagenes/ainhoa.jpg', '2018-12-05', '2018-12-05', '2018-12-05'),
(10, 'Dimsa', 'editor', 'El rey emérito regresa al Congreso más antimonárquico de la historia reciente', 1, 'En el 40 aniversario de la Constitución se suman las de En Comú Podem y Compromís. ', 'Juan Carlos I conoce bien el Congreso de los Diputados. En el hemiciclo de la Cámara sancionó la Constitución que este jueves cumple 40 años, y desde su tribuna ha presentado la apertura de la mayoría de legislaturas que han tenido lugar en España desde el final de la dictadura franquista. Pero algo ha cambiado en el Congreso, y una tendencia antimonárquica, desde diferentes visiones e ideologías, ya no respalda su presencia en las Cortes, ni tampoco la de su hijo, Felipe VI.\r\n\r\nEl aniversario de la Carta Magna reunirá este martes en el hemiciclo a dos reyes, el actual y el emérito. Al acto conmemorativo asistirán el presidente y los miembros del Gobierno, algunos presidentes autonómicos, los expresidentes, diputados, senadores y los denominados \"padres\" de la Constitución vivos, además de los presidentes del Congreso y del Senado.', 'imagenes/40constitucion.jpg', '2018-12-06', '2018-12-06', '2018-12-06'),
(11, 'Dimsa', 'editor', 'El PP destinó más de 65.000 euros de la caja B para pagar los trajes de Rajoy, Rato, Trillo y Cascos', 1, 'La unidad de la Policía Nacional fué la encargada de recuperar los papeles de Bárcenas', 'El PP destinó más de 65.000 euros de la caja B a servicios de sastrería para el expresidente del Gobierno Mariano Rajoy y los exministros conservadores Rodrigo Rato, Federico Trillo y Francisco Álvarez Cascos, según se desprende de los documentos relacionados con la contabilidad paralela de la formación, investigados en la Audiencia Nacional en el marco de la operación Kitchen.\r\n\r\nUna tarjeta del extesorero del PP Luis Bárcenas revela los pagos que la formación hizo a un sastre para elaborar los trajes de los altos cargos, según ha tenido acceso El Independiente. En este sentido, el PP abonó 12.620 euros por los servicios de sastrería para Rajoy, 13.700 euros para los de Rato, así como 19.830 euros para Álvarez Cascos. También, se recoge otro importe a nombre de Trillo por el valor de 19.470 euros. En total suman 65.623 euros.', 'imagenes/cajab.jpg', '2018-12-10', '2018-12-10', '2018-12-10'),
(12, 'Cloita', 'editor', 'Reino Unido puede revocar el Brexit según el Tribunal de Justicia de la Unión Europea', 1, 'La institución rechaza que solo los Veintisiete puedan decidir de manera detener la separación', 'Hasta el último minuto. Reino Unido podrá suspender unilateralmente el proceso de salida de la Unión Europea en cualquier momento hasta la medianoche del 29 de marzo de 2019, fecha prevista para la consumación del Brexit, según ha sentenciado este lunes el Tribunal de Justicia de la Unión Europea (TJUE).\r\n\r\n\r\nEl esperado veredicto resuelve uno de los dilemas jurídicos planteados por la primera salida de un socio de la Unión. Y aunque el Gobierno de Theresa May insiste en que no tiene intención de frenar el proceso, la sentencia llega la víspera de una sesión del Parlamento británico en la que podría rechazarse el acuerdo de salida negociado por Londres con la Unión Europea, lo que abriría nuevos escenarios, incluida la posibilidad de que no se lleve a cabo el Brexit.', 'imagenes/brexit.jpg', '2018-12-10', '2018-12-10', '2018-12-10'),
(13, 'Dimsa', 'editor', 'El descubrimiento de un aljibe en un castro revela el desarrollado pasado prerromano de los gallegos', 2, 'Un gran depósito de agua muestra que hubo un importante asentamiento antes de la conquista.', 'En lo alto de un monte desde donde las vistas sobre la comarca de A Terra Chá gallega son privilegiadas, se erige un antiguo poblado fortificado, el Castro de Viladonga. Un nuevo descubrimiento ha puesto en entredicho lo que se sabía hasta ahora sobre este yacimiento arqueológico ubicado a 535 metros sobre el nivel del mar en el municipio Castro de Rei (5.000 habitantes), a 23 kilómetros al noroeste de Lugo. Se trata del hallazgo de un aljibe de más de 70 metros cuadrados y cuatro de profundidad con capacidad para almacenar más de 150.000 litros de agua y abastecer a más de 300 personas, en la zona nordeste del castro. El depósito fue construido en el siglo III a. C., a diferencia de la mayor parte de las estructuras descubiertas hasta ahora en el lugar, que fueron fabricadas en plena época romana, entre los siglos II y V d. C. El aljibe excavado en la roca y hallado debajo de una muralla de esta fortificación, considerada Bien de Interés Cultural desde 2009, es la punta de lanza para ahondar en el pasado prerromano de la cultura castreña.', 'imagenes/viladonga.jpg', '2018-12-09', '2018-12-10', '2018-12-10'),
(14, 'pino', 'editor', 'Las directoras asaltan el nuevo cine español', 2, 'En el 2018, se ha producido una explosión de obras femeninas', 'En los últimos años hemos asistido a una explosión de óperas primas dirigidas por mujeres. El año pasado Carla Simón ganó el Goya a la mejor dirección novel por ‘Estiu 1993’, convirtiéndose en la representante de una nueva generación que viene dispuesta a cambiar las reglas del juego y plantarle cara a una industria profundamente masculinizada.\r\n\r\nNo nos engañemos, los datos siguen siendo desesperanzadores. En el último informe CIMA, se apuntaba que tan solo un 12% de mujeres habían liderado una producción, frente a un avasallador 88% de hombres. Sin embargo, que en el 2018 se hayan estrenado más de diez debuts femeninos, no deja de ser una buena noticia.\r\n\r\nSi hace unos años asistíamos al surgimiento de nombres como el de Leticia Dolera, Lara Izaguirre, Marina Seresesky, Elena Martín o el colectivo formado por Laila Alabart, Alba Cros, Laura Rius y Marta Verheyen responsables de ‘Les amigues de l\'Àgata’, así como al asentamiento de figuras fundamentales como Mar Coll o Paula Ortiz, ahora es el momento de hablar de Celia Rico (‘Viaje al cuarto de una madre’), Arantxa Echevarría (‘Carmen y Lola’), Meritxell Colell (‘Con el viento’), Anxos Fazáns (‘A estación violenta’), Andrea Jaurrieta (‘Ana de día’), Marta Díaz (‘Mi querida cofradía’), Carolina Astudillo (‘Ainhoa, yo no soy esa’), Ana Asensio (‘Most Beautiful Island’, esta bajo bandera estadounidense), Carmen Blanco (‘Los amores cobardes’), Sara Gutiérrez Galve (‘Yo la busco’), Clara Martínez Lázaro (‘Hacerse mayor y otros problemas’) o Diana Toucedo (‘Trinta Lumes’).', 'imagenes/directoras.jpg', '2018-12-10', '2018-12-10', '2018-12-10'),
(15, 'lomin', 'editor', 'Premio Nobel de la Paz 2018 al ginecólogo congoleño Denis Mukwege y la activista yazidí Nadia Murad', 1, 'El Comité Noruego les ha concedido el galardón por su labor en la lucha contra la violencia sexual', 'Denis Mukwege y Nadia Murad han sido galardonados este viernes con el Premio Nobel de la Paz 2018. El Comité Noruego lo ha anunciado a las 11.00. Denis Mukwege, un ginecólogo que cura a mujeres violadas en la República Democrática del Congo (RDC), y la activista iraquí de origen yazidí Nadia Murad, de 25 años, exesclava del grupo yihadista Estado Islámico entraban en todas las quinielas y finalmente han sido los galardonados. Ambos, además, fueron ganadores del Premio Sajárov que concede el Parlamento Europeo. El Comité Noruego ha concedido el galardón por la labor de ambos en la lucha contra la violencia sexual.', 'imagenes/pnpaz.jpg', '2018-12-10', '2018-12-10', '2018-12-10'),
(16, 'Cloita', 'editor', '20.198 aficionados en el Ciutat en el ‘derbi de la igualdad’', 3, 'El bautizado como ‘derbi de la igualdad’ entre el Levante y el Valencia acabó a 0 en el marcador', 'El bautizado como ‘derbi de la igualdad’ entre el Levante y el Valencia acabó también en igualdad en el marcador, empate sin goles. Se cumplieron las mejores expectativas de asistencia. Un total de 20.198 aficionados acudieron al Ciutat de Valencia, que vivieron una gran fiesta del fútbol. El objetivo del club granota era dar el mismo tratamiento al derbi que al masculino. También, acercarse a los 24.073 espectadores del último derbi de LaLiga Santander.\r\n\r\n\r\nEl choque empezó con mucho respeto entre ambos equipos. Pasada la media hora el Valencia empezó a aproximarse con peligro a la portería de Paraluta. La delantera chilena Yenara Aedo protagonizó grandes ocasiones para el equipo valencianista. En el 27’ su lanzamiento se estrelló en el larguero y en el 33’ su disparo de cabeza lo despejó Alharilla.\r\n\r\nEn la segunda parte la balanza se inclinó para el Levante, con ocasiones de Sonia, Jesica Silva y Charlyn. En el 57’ la mexicana tuvo la más clara tras el pase de Sonia. Con el Levante dominando, el Valencia lo siguió intentando. Fue el derbi de la igualdad, también en el terreno de juego y en el resultado.', 'imagenes/derbigualdad.jpg', '2018-12-10', '2018-12-10', '2018-12-10');

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
('administradora', '1111', 'Iris Martinez Solano', 1),
('Buuu', '1234', 'Buuu prusti', 3),
('Cloita', '2222', 'Cloita Prustiana', 2),
('Dimsa', '1111', 'Dimsa DJ', 2),
('editor', '1234', 'Pringuiminis', 3),
('irisms', '1234', 'Iris Martinez', 1),
('kazaar', '1234', 'wetrt4etyh', 2),
('lomin', '1234', 'Roi Vazquez', 2),
('Mininem', '1111', 'Mininem Prustiana', 1),
('nespresso', '1234', 'nespresso caca', 3),
('oxieva', '1234', 'Eva Lujan', 1),
('periodista', '1111', 'Eva Lujan', 2),
('pino', '1234', 'Ferran Calpe', 2),
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
