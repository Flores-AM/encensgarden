/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `sahumerios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `stock` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8;

INSERT INTO `sahumerios` (`id`, `nombre`, `marca`, `precio`, `imagen`, `descripcion`, `stock`, `cantidad`) VALUES
(2, 'Palo Santo con Jazmin', 'Sagrada Madre', 460, '5965b41f7db7cdd47aa7c54731b59e19.jpg', '◼Incienso Artesanal\r\n◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: madera de palo santo (peruano), aceite esencial de jazmín, aglutinante natural.', 0, 1);
INSERT INTO `sahumerios` (`id`, `nombre`, `marca`, `precio`, `imagen`, `descripcion`, `stock`, `cantidad`) VALUES
(4, 'Sahumerio de Copal', 'Sagrada Madre', 500, 'ddb0827d29892e0d2dc0afc13b731493.jpg', '◼Incienso Artesanal\r\n◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: Resina Copal (Perú), Carbón natural, aglutinante natural.', 2, 1);
INSERT INTO `sahumerios` (`id`, `nombre`, `marca`, `precio`, `imagen`, `descripcion`, `stock`, `cantidad`) VALUES
(13, 'Sahumerio Maha', 'Sagrada Madre', 800, 'f32e6f0e66668247851e3a003a1b553c.jpg', '◼Incienso Blend Masala Artesanal.\r\n◼Hecho a mano.\r\n◼Contenido: 8 varillas gruesas de duración extra.\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: Pétalos de rosas, aceites esenciales, aceite concentrado aromático, biomasa de frutas, carbón vegetal, aglutinante natural y sal.', 2, 1);
INSERT INTO `sahumerios` (`id`, `nombre`, `marca`, `precio`, `imagen`, `descripcion`, `stock`, `cantidad`) VALUES
(44, 'Sangre de Drago', 'Sagrada Madre', 1600, '3e20e3468efc9ea3ba10ee27da7e0407.jpg', '◼Hecho a mano\r\n◼Sahumerio Artesanal Natural\r\n◼Contenido: 30 varillas gruesas\r\n◼Duración: cada varilla dura 1 hora\r\n\r\n◼EMPODERAMIENTO. COMPOSICIÓN: Aceite concentrado sangre de drago, biomasa de frutas, carbón vegetal, aglutinante NATURAL y sal.', 1, 1),
(54, ' Defumación Anís', 'Sagrada Madre', 460, 'ba4a5145d3895edd7953315d68c7883d.jpg', '◼Hecho a mano\r\n◼Composición: fabricado con hierbas, resinas y aglutinantes naturales.\r\n◼Contenido: 4 unidades\r\n◼Uso: para defumar\r\n◼Duración: El carbón permanece encendido hasta 20 minutos después de consumir las hierbas', 6, 1),
(64, 'Orquídeas & Laurel', 'Sagrada Madre', 500, 'e3f283ac3c3628f072d85753a3de0e5e.jpg', '◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n\r\n◼Composición: Hojas de laurel, aceite concentrado aromático, yagra, biomasa de fruta, carbón vegetal y sal. El poderoso aroma del Yagra, junto al Laurel propician las ganancias y combinado con el perfume de la orquídea, desbloquean el poder personal y camino al triunfo, esta mezcla única de fragancias augura un próspero destino.', 1, 1),
(74, ' Violetas & Lavanda', 'Sagrada Madre', 500, 'c67649c1c6b0020341ce45e3f375bcf0.jpg', '◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n\r\n◼Composición: Flores de lavanda, aceite concentrado aromático, yagra, biomasa de fruta, carbón vegetal y sal. El poderoso aroma del Yagra disuelve las malas vibras, combinado con la frescura de la lavanda, despejan la mente y el bello aroma de la Violeta potencia esta combinación para lograr una limpieza astral completa.', 2, 1),
(84, ' Rosa & Vainilla', 'Sagrada Madre', 500, 'e674b8806bf91e40dae87538b7dddca4.jpg', '◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n\r\n◼Composición: pétalos de rosa, aceite concentrado aromático, yagra, biomasa de fruta, carbón vegetal y sal. El vibrante aroma del Yagra revitaliza el cuerpo, combinado con el encantador perfume de los pétalos de rosa, despiertan el deseo y la pasión. Se une a esta seductora combinación, la dulce y reconfortante fragancia de la vainilla, que predispone al placer y favorece los encuentros amorosos.', 2, 1),
(94, ' Palo Santo Romero', 'Sagrada Madre', 460, '0a47d268df4d4c7f0f93aaab50b6408e.jpg', '◼Incienso Artesanal\r\n◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: madera de palo santo (peruano), romero, aglutinante natural.', 2, 1),
(104, ' Palo Santo Mirra', 'Sagrada Madre', 460, 'd175313bbfaa445adc2272545f91c74b.jpg', '◼Incienso Artesanal\r\n◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: madera de palo santo (peruano), aglutinante natural y resina de mirra.', 1, 1),
(114, ' Palo Santo Rosa', 'Sagrada Madre', 460, '45c61159f63972e11325acdc657507b5.jpg', '◼Incienso Artesanal\r\n◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: madera de Palo Santo (Perú), pétalos de rosa, aceite esencial de rosa, aglutinante natural.', 1, 1),
(124, ' Palo Santo Sándalo', 'Sagrada Madre', 460, '4fcb66f9725c296742825b14a2e58d4e.jpg', '◼Incienso Artesanal\r\n◼Hecho a mano\r\n◼Contenido: 8 varillas gruesas de duración extra\r\n◼Duración: cada varilla dura 1 hora\r\n◼Composición: madera de palo santo (peruano), Sándalo (India), aglutinante natural.', 1, 1),
(134, ' Defumación Lavanda', 'Sagrada Madre', 460, 'c697054224cd4a76159c0f5a81d89896.jpg', '◼Hecho a mano\r\n◼Composición: fabricado con hierbas, resinas y aglutinantes naturales.\r\n◼Contenido: 4 unidades\r\n◼Uso: para defumar\r\n◼Duración: El carbón permanece encendido hasta 20 minutos después de consumir las hierbas', 1, 1),
(144, ' Defumación Ruda', 'Sagrada Madre', 460, 'ea676bb83f2e9fea1e4347a8235d1a6a.jpg', '◼Hecho a mano\r\n◼Composición: fabricado con hierbas, resinas y aglutinantes naturales.\r\n◼Contenido: 4 unidades\r\n◼Uso: para defumar\r\n◼Duración: El carbón permanece encendido hasta 20 minutos después de consumir las hierbas', 1, 1),
(154, 'Ruda - Protección', 'Sagrada Madre', 350, 'f9c9ee20c4a0aa2fba4656eab9ba4805.jpg', '◼Contenido: Box de 6 Sobres individuales..\r\n◼Composición: Hierbas.\r\n◼Uso: Para Sahumar\r\n◼Medida caja: 13,5 x 11 x 9 cm.\r\n◼La penetrante fragancia de las hojas de Ruda protege y refuerza el poder interior. El aroma de la Ruda protege el espacio físico y psíquico.', 6, 1),
(164, 'Laurel - Limpieza', 'Sagrada Madre', 300, '3102054ef0ba9cd4a22fcaa1570c7fe3.jpg', '◼Contenido: Box de 6 Sobres individuales..\r\n◼Composición: Hierbas.\r\n◼Uso: Para Sahumar\r\n◼Medida caja: 13,5 x 11 x 9 cm.\r\n\r\n◼El estimulante aroma del Laurel renueva la esperanza para luchar por los sueños y anhelos.', 2, 1),
(174, ' Bomba Carbon Lavanda', 'Sagrada Madre', 520, '05031492a67322ba7d59338bc7a47003.jpg', '◼Hecho a mano\r\n◼Contenido: 12 unidades\r\n◼Composición: Harina de eucalipto, carbon vegetal, esencia concentrada, aglutinante a base de plantas.\r\n◼Uso: para defumar\r\n◼Duración: aproxidamente 15 minutos', 1, 1),
(184, ' Rosa - Frankincense', 'Sagrada Madre', 380, '5702575980beffc85fb80ba7039441db.jpg', '◼Hecho a mano\r\n◼Uso: Como un sahumerio o para defumacion.\r\n◼Contenido: 4 unidades\r\n◼Duración: 30 minutos aproximadamente\r\n◼Composición: Esencia y resinas naturales, aglutinante natural, carbón vegetal.', 1, 1),
(194, ' Sahumitos Naranja Citronella', 'Sagrada Madre', 500, '31c88b7304fed6d9d744d4211f7f8780.jpg', '◼Atado de hierbas artesanal\r\n◼Hecho a mano\r\n◼Composición: hierbas aromáticas, resinas naturales, aglutinante natural y aceites esenciales.\r\n◼Contenido: 5 unidades\r\n◼Atado (centro) hecho de cedro, laurel y eucalipto.\r\n◼Uso: para defumar\r\n◼Duración: cada sahumo dura 2 horas\r\n◼Medida caja: 18x4x12', 1, 1),
(224, ' dasdas', 'dasdas', 123, 'e1d93242149fc5b016caccb2bf57eebf.jpg', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 2, 1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;