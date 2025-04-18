-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: proxysql-01.dd.scip.local
-- Tiempo de generación: 18-04-2025 a las 14:05:17
-- Versión del servidor: 10.10.2-MariaDB-1:10.10.2+maria~deb11
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ddb237716`
--
CREATE DATABASE IF NOT EXISTS `ddb237716` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ddb237716`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personatges`
--

DROP TABLE IF EXISTS `personatges`;
CREATE TABLE IF NOT EXISTS `personatges` (
  `id_personatge` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `cos` text NOT NULL,
  `usuari_id` int(11) NOT NULL,
  PRIMARY KEY (`id_personatge`),
  KEY `usuari_id` (`usuari_id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personatges`
--

INSERT INTO `personatges` (`id_personatge`, `nom`, `cos`, `usuari_id`) VALUES
(10, 'Roronoa Zoro', 'Un espadachín musculoso que aspira a ser el mejor del mundo.', 15),
(11, 'Nami', 'La navegante ágil con un talento excepcional para la cartografía y un amor por el tesoro.', 16),
(12, 'Usopp', 'Un francotirador delgado con una imaginación desbordante y un deseo de ser un gran guerrero.', 17),
(14, 'Tony Tony Chopper', 'Un pequeño reno que se convirtió en humano y es un talentoso médico.', 15),
(15, 'Nico Robin', 'La arqueóloga esbelta que busca desentrañar los secretos de la historia antigua.', 16),
(16, 'Franky', 'Un carpintero cyborg excéntrico que quiere construir el mejor barco del mundo.', 17),
(18, 'Trafalgar D. Water Law', 'Un médico pirata delgado con habilidades únicas y ambiciones desafiantes.', 15),
(20, 'Portgas D. Ace', 'El hermano de Luffy, un poderoso usuario del fuego que aspira a ser libre.', 15),
(21, 'Boa Hancock', 'La emperatriz de Amazon Lily, famosa por su belleza y su amor por Luffy.', 16),
(22, 'Kozuki Oden', 'Un antiguo samurái que sueña con un mundo lleno de libertad y aventuras.', 17),
(24, 'Bartholomew Kuma', 'Un antiguo miembro de los Shichibukai con el poder de la Fruta del Diablo que le permite mover objet', 15),
(26, 'Nefertari Vivi', 'La princesa de Arabasta que lucha por su pueblo y la paz en el mundo.', 17),
(27, 'Donquixote Doflamingo', 'Un villano carismático que manipula a otros y busca poder en el mundo subterráneo.', 15),
(28, 'Eustass Kid', 'Un capitán pirata con un carácter feroz y un fuerte deseo de fama y fortuna.', 16),
(29, 'Yamato', 'Hija de Kaido que busca unirse a Luffy y vivir aventuras.', 17),
(31, 'Smoker', 'Un marino que utiliza el poder del humo para capturar piratas.', 15),
(32, 'Toki', 'La mujer que puede enviar a otros a través del tiempo, con un gran deseo de proteger a su familia.', 16),
(33, 'Crocodile', 'Un ex Shichibukai con el poder de manipular la arena y un ambicioso plan para controlar el mundo.', 17),
(94, 'Monkey D. Luffy', 'Un joven pirata con habilidades de goma, determinado a convertirse en el Rey de los Piratas', 14),
(95, 'Sanji', 'Un cocinero elegante y luchador experto en el estilo de piernas negras', 14),
(97, 'Brook', 'Un esqueleto músico con habilidades de combate y un sentido del humor oscuro', 14),
(98, 'Jinbe', 'Un hombre pez fuerte y noble, maestro en artes marciales y con gran sentido de justicia', 15),
(101, 'Kizaru', 'Almirante de la Marina con el poder de la velocidad de la luz, capaz de moverse y atacar a velocidad', 16),
(102, 'Aokiji', 'Ex-Almirante de la Marina con el poder de crear y controlar hielo', 17),
(103, 'Akainu', 'Almirante de la Marina con el poder de magma, implacable y de carácter fuerte', 14),
(104, 'Big Mom', 'Una de los Yonkou, con el poder de manipular almas y una insaciable voracidad', 15),
(105, 'Kaido', 'Un Yonkou y el ser más fuerte del mundo, conocido por su apariencia imponente y fuerza brutal', 16),
(106, 'Enel', 'Dios autoproclamado de Skypiea con la habilidad de manipular la electricidad', 17),
(107, 'Crocodile', 'Un ex-Shichibukai con el poder de la arena y una ambición sin límites', 14),
(108, 'Marco', 'Primer comandante de los Piratas de Barbablanca y usuario de habilidades de regeneración como un ave', 15),
(109, 'Koby', 'Un joven y ambicioso oficial de la Marina, entrenado por Garp', 14),
(110, 'Helmeppo', 'Oficial de la Marina y compañero de Koby, ha crecido mucho desde sus días arrogantes', 15),
(111, 'Caesar Clown', 'Un científico loco y usuario de la fruta del gas, con una personalidad cruel', 16),
(112, 'Vergo', 'Un oficial encubierto del Donquixote Family en la Marina, con habilidades de endurecimiento', 17),
(114, 'Rebecca', 'Una gladiadora del Coliseo de Dressrosa que busca justicia para su familia', 15),
(115, 'Hajrudin', 'Un gigante y guerrero poderoso, líder de la flota de Luffy', 16),
(116, 'Bartolomeo', 'Un pirata excéntrico y fanático de Luffy, con el poder de crear barreras', 17),
(118, 'Diamante', 'Un oficial de la familia Donquixote, con habilidades de flexibilidad extrema', 15),
(119, 'Pica', 'Un oficial de la familia Donquixote con el poder de manipular piedra', 16),
(120, 'Sugar', 'Una niña miembro de la familia Donquixote, capaz de transformar a otros en juguetes', 17),
(121, 'Kin’emon', 'Un samurái del país de Wano con habilidades para disfrazarse y controlar fuego', 14),
(122, 'Kanjuro', 'Un samurái del país de Wano con habilidades para crear dibujos que cobran vida', 15),
(123, 'Raizo', 'Un ninja del país de Wano, aliado de los Sombrero de Paja', 16),
(124, 'Shinobu', 'Una kunoichi del país de Wano, experta en técnicas de infiltración', 17),
(125, 'Killer', 'El segundo al mando de los Piratas Kid, también conocido como “Asesino”', 14),
(126, 'Scratchmen Apoo', 'Un pirata músico con la habilidad de convertir sonidos en ataques', 15),
(127, 'Capone Bege', 'Capitán de los Piratas Fire Tank y estratega con poderes de “castillo humano”', 16),
(128, 'X Drake', 'Ex-contralmirante de la Marina convertido en pirata, usuario de una fruta zoan de dinosaurio', 17),
(151, 'Donquixote De la mancha', 'Un villano carismático que manipula a otros y busca poder en el mundo subterráneo.', 14),
(152, 'Bartholomew Kumaaa', 'dgsf', 14),
(153, 'Bartholomew Kum', 'Un antiguo miembro de los Shichibukai con el poder de la Fruta del Diablo que le permite mover objet', 45),
(155, 'mondongo', 'mondongodongo', 53),
(156, 'Shanks', 'És un fort capità pirata i espadatxí, conegut per la seva calma i poder.', 14),
(157, 'Bartholomew Kumaaa bomboclat', 'Arreglando bugs de la alba', 63),
(158, 'Dracule Mihawk', '= És el millor espadatxí del món, conegut per la seva calma i poder', 64),
(159, 'Dracule Mihawk v2', 'És el millor espadatxí del món, conegut per la seva calma i poder', 65),
(160, 'alba', 'Ex-Almirante de la Marina con el poder de crear y controlar hielo', 23),
(161, 'Dracule Mihawk v3', 'És un fort capità pirata i espadatxí, conegut per la seva calma i poder.', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `id_usuari` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `cognoms` varchar(100) NOT NULL,
  `correu` varchar(100) DEFAULT NULL,
  `usuari` varchar(30) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `imatge` varchar(200) DEFAULT NULL,
  `administrador` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `token_time` int(11) NOT NULL,
  `autentificacio` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuari`),
  UNIQUE KEY `usuari` (`usuari`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id_usuari`, `nom`, `cognoms`, `correu`, `usuari`, `contrasenya`, `imatge`, `administrador`, `token`, `token_time`, `autentificacio`) VALUES
(14, 'Alba', 'Matamoros', 'a.matamoros@sapalomera.cat', 'amatamoros', '$2y$10$zhy8vABsDd3ICXUkE9e7Bu/CKNnB0p9EUvr9Adt3i47h6QZ/9I28e', '../vista/imatges/imatgesUsers/67f4329e7de67_image (3).png', 1, '33a92978864a08b332fae15f041e737394aad9da0bddd8be8bc4d1879fb5fc07eee4e32463dea27179a70a03b6d4e6ce43f5', 1743776891, ''),
(15, 'Pedro', 'Pica', 'p.pica@sapalomera.cat', 'ppica', '$2y$10$T4wMuW7uKVd2BtQRn2v5w.4eKFr875zm33cVPFrvtXDoRvpqVKj1i', NULL, 0, '', 0, ''),
(16, 'Piter', 'Pan', 'p.pan@sapalomera.cat', 'ppan', '$2y$10$jYKa2jKaqXhAI0spRNp6eOV97H/XH6UfIV4t3UwGiI773kMI7HWAm', NULL, 0, '', 0, ''),
(17, 'mary', 'Jane', 'm.jane@sapalomera.cat', 'mjane', '$2y$10$.7q0zRTlaRctCHAqEgEk1.9kHXXXXZW/QMykfZ5xgHlfL9RBaKzxO', NULL, 1, '', 0, ''),
(19, 'Joselito', 'flores', 'joslinsuria@gmail.com', 'Joselitoflores', '$2y$10$TBGiy2IEABgNPv0UK/AL9eJXixRdnNfqrQZJKsx3ewbef1rYmQ/eG', NULL, 0, '', 0, ''),
(23, 'Àlex', 'González', 'alexpalafolls2002@gmail.com', 'KottaAG', '$2y$10$9ksL2cSbZhQoGE7gYmUqdOr1d9mH69kZbF5OLeUX6ZjpmBbJWU17O', '../vista/imatges/imatgesUsers/67d4801b33615_foto curricculum.jfif', 0, '57289e2079256f5f91672b8ff05006191669c8ff24918cd1271d15802bad9aaee22319a9df01d1e269cc00097ae4e1799ccd', 1733270201, ''),
(32, 'Marcos', 'Lopez', 'm.lopez5@sapalomera.cat', 'Marrkitus2', '$2y$10$Y632S7rnfS18Pu4EnJY9rOKwrKAJ/79sBiq4vflTbegz3N9SpH/CC', NULL, 0, 'd09827fcf1bdaa7d7a412c470e61b304670ff81b49d52f16b18bbd8e702b5455f0ddc85c89a6d1ce497f7585ea3472a355b4', 1733153534, ''),
(35, '', '', NULL, 'MATI_712', '', '../vista/imatges/imatgesUsers/67d4243b2650d_IMG_5039.JPEG', 0, '', 0, 'Reddit'),
(36, '', '', NULL, 'Aromatic_Ad5332', '', NULL, 0, '', 0, 'Reddit'),
(38, 'Alba', 'Matamoros Morales', 'matamorosmoralesalba@gmail.com', 'matamorosmoralesalba', '', '', 0, '', 0, 'Google'),
(41, 'Alba', 'Matamoros Morales', 'albamamo07@gmail.com', 'albamamo07', '', NULL, 0, '', 0, 'Google'),
(43, 'Alba', 'Matamoros Morales', 'a.matamoros@sapalomera.cat', 'a.matamoros', '', NULL, 0, '33a92978864a08b332fae15f041e737394aad9da0bddd8be8bc4d1879fb5fc07eee4e32463dea27179a70a03b6d4e6ce43f5', 1743776891, 'Google'),
(44, 'alba', 'matamoros morales', 'albamatamorosmorales@gmail.com', 'albamatamorosmorales', '', NULL, 0, '', 0, 'Google'),
(45, 'Pau', 'Muñoz', 'munozserrap@gmail.com', 'XinLu_85', '$2y$10$2acHkf7QHxE8mlcaZHgsse192lGCkqnjqO7TZKIVuctl9kBZ06..C', '', 0, '', 0, ''),
(46, 'Alba', 'Matamoros', 'albamorales@gmail.com', 'albamatamoros', '$2y$10$7AilU82tGSZwVBbxm0UL0OzUGlSvjzWi7ewn1xlxA9iFH2oC8raaG', NULL, 0, '', 0, ''),
(47, '', '', NULL, 'Agile-Dig8224', '', '', 0, '', 0, 'Reddit'),
(48, 'Alba', 'Matamoros', 'aa@sd.com', 'albamatamoros2', '$2y$10$2SrNEYR82vllQxbTMYPU4.tRMRXDgZCXolZk1pq59EFY0GNUwjXp.', NULL, 0, '', 0, ''),
(49, 'luis01', 'rgsdfg', 'luis010993@gmail.com', 'luis01', '$2y$10$B2AYEj5Qbqi1wJ./rOpMWu9pw19jVjRSc86MmNtBxA1nVYeoHwTL.', '', 0, '', 0, ''),
(50, 'Kevinflump', 'La Carioca', 'forflood516@gmail.com', 'forflood516@gmail.com', '$2y$10$7vkQ4HNcL2kRu/g7tBPEleOJYZ3CH/ZxvTYAWzpGp9mffLhArdhDC', NULL, 0, '', 0, ''),
(51, 'djaoklDJlklOxy', 'KKyUirvPYqz', 'rayanwatkinsu@gmail.com', 'kEqMjyTO', '$2y$10$qdAqbc9iOCA/M8KAgjGlcOE5.bRFfXNxGRo54pzjXWcoNAcqJr1Da', NULL, 0, '', 0, ''),
(52, 'JbRruauqXkx', 'jFhGLoKJqp', 'bradyarlainpv@gmail.com', 'UmlwwuPnF', '$2y$10$dW80OzeD.08OU0NO8MnH1eXh2kXI7vrrB4QQpNNX.Gj.fqFlG5vwW', NULL, 0, '', 0, ''),
(53, 'dani', 'torres sanchez', 'd.torres2@sapalomera.cat', 'Dani2', '$2y$10$/5cRNzIj6KmYZYikuq2x0.nw5mpu7LltU7CGbt6UaGYbC63mkMmAu', NULL, 0, '', 0, ''),
(54, 'kWRfhRGow', 'ZFvUHmhfoUMKlaV', 'utolewo891@gmail.com', 'AmgxhNSrQfvCJQW', '$2y$10$.p.XHz/xSXLhaydTNt2peOf2HtZmeQOetTNvykJ7ZsRIhkPn23C.u', NULL, 0, '', 0, ''),
(55, 'HuZDEKPWYrenhT', 'ZAyKBCQqTx', 'drorzut@yahoo.com', 'gDERakUAHqlT', '$2y$10$XIsEaDsrjWv/jveYI0VvWeKinxvCBepdhgdxg0ctnZhaIZ/kWaIG2', NULL, 0, '', 0, ''),
(56, 'aKuHtjWiS', 'AOztKNRqSQc', 'kaetisilvacv42@gmail.com', 'BpmriOrCXYbyh', '$2y$10$JlyOleR9nECdgsbvWYIcE.WwjoTsCX1r2nXz6jdKood7OsAT36CAC', NULL, 0, '', 0, ''),
(57, 'dfXyqDundNGFV', 'VLaSKnKYMlPYz', 'aqtxtsdeokeeho@yahoo.com', 'asJJDrqleVV', '$2y$10$7GOdzfzRmIxBeH4OOF7wVubqm0EIQn8nOS7mLtyAvQ/hHgj0wN/t.', NULL, 0, '', 0, ''),
(58, 'gMbczQgpr', 'vtRMAFQcj', 'hansenbernardw37@gmail.com', 'DbnqgOEWsYYiZMF', '$2y$10$MNOh3My8rOIlr6kMh38M5u1kXCzxLSX9yfToZ8X7CawJXn4NKhz5u', NULL, 0, '', 0, ''),
(59, 'bLTtMjevAo', 'inXWisqVIMksF', 'oneidacurtisth25@gmail.com', 'deZjevnzzhzs', '$2y$10$/zUMJHCgcV5Fw.RoNd0C..WQgIXpL32AHsOvdak8DJxpQ2yFRYxeG', NULL, 0, '', 0, ''),
(60, 'gUPJMiiZ', 'euijVikWpP', 'rdexcmbwqlchpu@yahoo.com', 'pQlJKxklJmXTTvJ', '$2y$10$U4GTHAJ97ok5qXkCFnvtIuzmO0eVIFVlwX3HSN8TYSG7urJAkhFcy', NULL, 0, '', 0, ''),
(61, 'GuqVtoxbwTM', 'BuEUaLlQaFtdiCp', 'kerifigu40@gmail.com', 'rIUPCyyYfG', '$2y$10$CASHQ9tBjoowKSZ8NGKHtOnu8OcZSq.D15DKIE3/oEyIaiz4QExAa', NULL, 0, '', 0, ''),
(62, 'NwqxekDMUnXNT', 'OTVyjsyKsMNdtX', 'brinnamaynard7@gmail.com', 'UhNCMMMsaA', '$2y$10$i6p/rStsvYrnhFdpoZYLWuoc.tfA0Q3z1w..mPNl4BeDavU8HWPK6', NULL, 0, '', 0, ''),
(63, 'Alvaro', 'Gomez Moreno', 'a.gomez9@sapalomera.cat', 'Alvaro', '$2y$10$VgcGPjGuyHYb/4xe7s2ZOORNn7nCLYMxA3h0Dz1ctdQbWQlZLW7lC', '../vista/imatges/imatgesUsers/67d45dfa0d265_e.png', 0, '', 0, ''),
(64, 'Panda ', 'Rojo', 'e.lasala@sapalomera.cat', 'DarkPanda73', '$2y$10$B0/uIwLK63Zt13N72HML6u55OJ9KrRgyQTKQnYYrgS8wL080cyZb6', '../vista/imatges/imatgesUsers/67d467c15cdc1_TzgmnF9h.png', 0, '', 0, ''),
(65, 'Pedro', 'Rojas', 'p.rojas2@sapalomera.cat', 'p.rojas2', '$2y$10$51TmHLlQgtrrLeeLmcZ/yeBnb9x4PJ2zB8NkYEjWHCvOCGUcGj9zC', '../vista/imatges/imatgesUsers/67d46c4337ff1_spacecraft-removebg-preview.png', 0, '', 0, ''),
(66, 'MexOMErTOu', 'sqVAfWEpf', 'brenkorepi42@gmail.com', 'xyADtnALDduu', '$2y$10$ECGnqht4vRuPTlL6QTEQquOyDQaGT/DCcQRnPffA6LFyCUmTRskyK', NULL, 0, '', 0, ''),
(67, 'oYFNiFLrlayFt', 'WkSWeOjOb', 'nutherrrw1989@gmail.com', 'jYBKugmaG', '$2y$10$inatw5bLnUWKk4LbWEQyoOdW17WymOn.3F7pHpTyvuL3hrumfhKfW', NULL, 0, '', 0, ''),
(68, 'acVkFBMeVYmt', 'pnawoPOss', 'ellifarmerh6@gmail.com', 'FUVqsAecwsajn', '$2y$10$61RL/QAATycFxQaPKhR7G.slhdRPBnFHUUn9G7PV8sjGucVp3HoX6', NULL, 0, '', 0, ''),
(69, 'RuvbSBehCSYpZ', 'fgkyOHgx', 'robinsondjessalinnx40@gmail.com', 'JGOgUZfgQdY', '$2y$10$IAwiwBMRk8ovUCSlFPtT4.8sphLnFfCxoixfZD.Z6yESOwuTv6ivu', NULL, 0, '', 0, ''),
(70, 'vfMTgDccz', 'kXxDjnziKHVlMw', 'moodybraeden1983@gmail.com', 'uVLAgUssVYrzyYv', '$2y$10$jOjiSZ/OEBBS0ZfFjvuNN.Ze//qH7dPrFfNf3Arl1DPcd/zY2Avlq', NULL, 0, '', 0, ''),
(71, 'fhMiqtIQ', 'DLqzruoAo', 'tempestbranchlk51@gmail.com', 'xcVyJNBgom', '$2y$10$QCQ4NNVbC434DZq5ZP7t8e/70qiE9W0tQcHDkAJaJezCuMrZYM.mG', NULL, 0, '', 0, ''),
(72, 'Opdwodowkdwiidwok djwkqdwqofhj', 'None', 'nomin.momin+395b6@mail.ru', 'Opdwodowkdwiidwok djwkqdwqofhj', '$2y$10$.G6RrXyUWwsYq.YMIlueaOqR7r04Ks6/kYLMn7zRHbqNLhRHnXkam', NULL, 0, '', 0, ''),
(73, 'vZzRmZuiAMz', 'fZxlaesCZhUDTE', 'fritzmerdi@gmail.com', 'AHdqvtZXesXYzed', '$2y$10$awMFyd7d.S0TyzwW1ffwzuynlMf2WTl/0h50svC3.IKDruaIhoYU.', NULL, 0, '', 0, ''),
(74, 'OFVPKvOkleZB', 'IhnnJETyPNL', 'silva.shelly604954@yahoo.com', 'YIHjlvpfoJX', '$2y$10$44184kas6.0Qf7sstd4Rfe9s.Qmy7C9a2suRB6BPaz4grUt9YMxYe', NULL, 0, '', 0, ''),
(75, 'OOEOKDGordMRb', 'eUiUnOYJIN', 'elllogan1981@gmail.com', 'ZxhMkRpDCMGYXld', '$2y$10$A6YmHbHNbvBhzUPKbyw1ku5MGCRn.AqqvsUSagL00g1fi7lzk/SKe', NULL, 0, '', 0, ''),
(76, 'vtNeVXqWPcKPx', 'gXuoBNcSosTKr', 'bisshg50@gmail.com', 'CxkfMUwXPLgfyC', '$2y$10$7qcKi3nPs9ovHeBbdPTwlODz81i0/HPLqEYhyeZL.NZP9vNdoCP3W', NULL, 0, '', 0, ''),
(77, 'ywJujpjghBj', 'YZkxcbJwPGWmq', 'taylorpriamz@gmail.com', 'pwAcSzMd', '$2y$10$5smgud/O3LYkcRwVTGPoxela1bhO6NldBsv5R77spjmCPFPHEVae2', NULL, 0, '', 0, ''),
(78, 'xCLWqpDv', 'VLtzOVnXeXKolB', 'rreksjn31@gmail.com', 'qstAtWHJwRn', '$2y$10$pFoIH0VTiwUD6a2zWHA76.2UVK3er2a7nK3x.99XBAe8n6iL5wpGu', NULL, 0, '', 0, ''),
(79, 'LiSEBVdf', 'NTuLZhTm', 'lonnifergusonlk@gmail.com', 'ACjcpOhilXtJQC', '$2y$10$tPcUNERhYpi6zrt2c6alhuAncVQOUnHbfodzniHgzKtZPJCPDJfUi', NULL, 0, '', 0, ''),
(80, 'YrDXjkFpIbjoAQg', 'FJgvAIXBNpDQ', 'basque_josh844191@yahoo.com', 'KVhZAiOTkEqd', '$2y$10$nU54/9iKY3.MKPAVRt7sUuCz7tccNSMO4i0DrlIKXlyoSw8fPCUMC', NULL, 0, '', 0, ''),
(81, 'MddkQTZgxgQj', 'ngIvrxrVjWgfR', 'wheeler.shane619935@yahoo.com', 'LPqqqrnfIQDAv', '$2y$10$IvUnyqnQ5PVRCzDSRpjjROmfWAnrbvTeNeOjFKKxB12YOd836oUlO', NULL, 0, '', 0, ''),
(82, 'gSiRjmxm', 'XXbETPYqI', 'toppsijuarezlm25@gmail.com', 'qdOwpebjD', '$2y$10$d9FOmTbJ1P03HMLcJoeNEuEnrSisFj101NEqaMxBYyzaXPYAtwtOy', NULL, 0, '', 0, ''),
(83, 'flJGuqXcfP', 'pszvQwNUP', 'penadjerikoi5@gmail.com', 'ZitZEyVZN', '$2y$10$DzquVhmi8W3PXfGaVH1r/.WhG9e4reJDSHJoSe3ckN/wHQ9nml/EK', NULL, 0, '', 0, ''),
(84, 'VkywINsav', 'QaVNYlhgBFg', 'bcooperqb37@gmail.com', 'fCYPpsTs', '$2y$10$pQP3X8ME8xk.C6MxJVtnO.sSNsHp9kgwx30a7rs9KxKAgJO.mhETq', NULL, 0, '', 0, ''),
(85, 'iBNGYPglN', 'mXxMyAVFTQMRt', 'dislistmangbowf1988@yahoo.com', 'rpgNdwyGYaxHZJO', '$2y$10$nW6.Ckr03IjBnYUrO3RL1eR8pbzT1LvJdYaxpP7iLX5MFLL1sXKCq', NULL, 0, '', 0, ''),
(86, 'PsvPWbreTvipnaA', 'ygZDSaMVITpdbM', 'ytuckeroj33@gmail.com', 'WMoqtexcwtr', '$2y$10$hw6qKIWCka4foA6H7cy9uORZmYzVvEQqAPL78a/XK2qxIKtmUIYBm', NULL, 0, '', 0, ''),
(87, 'cwkcePEUcwNsxt', 'vNYJkwjvzSTYx', 'aetelbertwatersga30@gmail.com', 'ecnPdqiGDvTZf', '$2y$10$F6KVsjB2zc8ouj/ftAALxeMsKCshUafLhGstGsFAE7DJ2uw6Km3Eq', NULL, 0, '', 0, ''),
(88, 'IkhquhEREEe', 'szPRmyNuhPb', 'gooddominbd23@gmail.com', 'TozleZbXeEFwh', '$2y$10$2xgz91jg/ClocMRY6N/C0uXPr473JHW7/N149YmaUWGBhAeF9hBZ6', NULL, 0, '', 0, ''),
(89, 'FjcbQWDhCNKNUHO', 'rotdwJUD', 'nbrittonz50@gmail.com', 'ZzUijQOjiVD', '$2y$10$lL1yGwsjUOtmn64.PBakkOlOAJsMq5gMO.Y6N3PrSiNveZZtPUCL6', NULL, 0, '', 0, '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personatges`
--
ALTER TABLE `personatges`
  ADD CONSTRAINT `personatges_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
