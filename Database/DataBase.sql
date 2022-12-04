-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para buyeasy
CREATE DATABASE IF NOT EXISTS `buyeasy` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `buyeasy`;

-- Copiando estrutura para tabela buyeasy.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `idUser` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  CONSTRAINT `FK_ID_USER` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela buyeasy.accounts: ~8 rows (aproximadamente)
INSERT IGNORE INTO `accounts` (`id`, `name`, `email`, `password`, `idUser`) VALUES
	(1, 'Diogo Compuiter', 'diogo@compuiter.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
	(2, 'Myecia Eletronica', 'miecia@eletronica.com', '821a52c3652efcf0140ae706a7527be529569ce4', 2),
	(3, 'Mayres cosmeticos', 'mayres@cosmeticos.com', '943f108a2fe68b97d2c3a72f35bd1833835b4eb2', 3),
	(4, 'Jesiel Batel', 'jesiel@batel.com', 'a3a9b67af607b31be76557937a9997b74c0d6827', 4),
	(5, 'Vitor MotoPeças', 'vitor@moto.com', 'ddd80347cc894536655615ccf7805ebc23683866', 5),
	(6, 'Saulo Varão', 'saulo@varao.com', 'c6294fbe10ae42a83be5db50fdc7a1a46bccda5c', 6),
	(7, 'Thiago afiações', 'thiago@fios.com', 'f23d94b2a735b6193d3882ae31308d2e41e8282b', 7),
	(8, 'Jhonathan Automotivo', 'jj@automotivo.com', '3059b078d38969b2ec6282901282c4158cf077ab', 8);

-- Copiando estrutura para tabela buyeasy.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateIncrement` date NOT NULL,
  `pdfPath` varchar(255) DEFAULT NULL,
  `finalPrice` decimal(10,2) DEFAULT NULL,
  `discount` decimal(3,2) DEFAULT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ID_USER_CART` (`idUser`),
  CONSTRAINT `FK_ID_USER_CART` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela buyeasy.carts: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela buyeasy.cart_product
CREATE TABLE IF NOT EXISTS `cart_product` (
  `idCart` int NOT NULL,
  `idProduct` int NOT NULL,
  `quantity` int DEFAULT NULL,
  KEY `FK_ID_CART_PRODUCT` (`idProduct`),
  KEY `FK_ID_PRODUCT_CART` (`idCart`),
  CONSTRAINT `FK_ID_CART_PRODUCT` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_ID_PRODUCT_CART` FOREIGN KEY (`idCart`) REFERENCES `carts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela buyeasy.cart_product: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela buyeasy.commenters
CREATE TABLE IF NOT EXISTS `commenters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text,
  `star` tinyint DEFAULT NULL,
  `idUser` int NOT NULL,
  `idProduct` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_COMMENTER_ID_USER` (`idUser`),
  KEY `FK_COMMENTER_ID_PRODUCT` (`idProduct`),
  CONSTRAINT `FK_COMMENTER_ID_PRODUCT` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_COMMENTER_ID_USER` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela buyeasy.commenters: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela buyeasy.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `imgPath` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_USER_PRODUCT` (`idUser`),
  CONSTRAINT `FK_USER_PRODUCT` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela buyeasy.products: ~6 rows (aproximadamente)
INSERT IGNORE INTO `products` (`id`, `name`, `imgPath`, `description`, `price`, `idUser`) VALUES
	(1, 'Processador Intel Core i5 10400 2.4ghz', 'archives/products/638cef78d7250.jpg', 'Processador Intel Core i5-10400 <br />\r\nOs novos processadores Intel Core da 10ª Geração oferecem atualizações de desempenho incríveis para melhorar a produtividade e proporcionar entretenimento surpreendente, Intel Wi-Fi 6 (Gig) tecnologia, HDR 4K, otimização de sistema inteligentes e muito mais. <br />\r\n<br />\r\n <br />\r\n<br />\r\nProdutividade acelerada <br />\r\nRecursos de desempenho inteligente integrados aprendem e se adaptam ao que você faz, direcionando potência dinamicamente para onde ela é mais necessária. Os processadores Intel Core da 10ª Geração com memória Intel Optane fornecem a responsividade para fazer mais.<br />\r\n<br />\r\n <br />\r\n<br />\r\nA melhor conectividade da categoria <br />\r\nCom Intel Wi-Fi 6 (Gig+) e tecnologia Thunderbolt 3 integrados, os processadores Intel Core da 10ª Geração oferecem conectividade cabeada e sem fio rápida, garantida e versátil.<br />\r\n<br />\r\n <br />\r\n<br />\r\nEntretenimento premium <br />\r\nUma nova arquitetura de gráficos oferece suporte a experiências visuais ultravívidas, como vídeo em HDR 4K e jogos a 1080p. Os processadores Intel Core da 10 ª Geração com gráficos Intel Iris Plus permitem experiências de entretenimento nunca vistas.<br />\r\n<br />\r\n <br />\r\n<br />\r\nJogos sérios (serious gaming) <br />\r\nAproveite jogos incríveis com alto FPS, até mesmo enquanto realiza streaming e gravação. Turbo e aceleração da memória Intel Optane. Em casa ou em qualquer lugar, processadores Intel Core da 10ª Geração capazes de overclocking rodam as plataformas definitivas de jogos em notebooks e desktops.<br />\r\n<br />\r\n<br />\r\nPossui Vídeo Integrado <br />\r\n<br />\r\n <br />\r\nGaranta já o seu processador Intel Core i5-10400 no KaBuM!', 1069.99, 1),
	(2, 'Notebook Asus AMD', 'archives/products/638cf025592a1.jpg', 'Asus MD15 um dos menores notebooks de 15 polegadas do mundo<br />\r\nSeja para trabalho ou lazer, o ASUS M515 é um notebook que oferece desempenho poderoso e visuais envolventes. Sua tela NanoEdge possui um revestimento antirreflexo fosco para uma experiência verdadeiramente envolvente. O M515 é equipado com até processador AMD Ryzen e memória de 8 GB. Armazenamento rápido com SSD com até 256GB PCIe SSD.<br />\r\n<br />\r\n <br />\r\n<br />\r\nMais velocidade no seu dia a dia<br />\r\nO ASUS M515 possui armazenamento SSD, que além de ser muito mais rápido que o HD convencional, é menor, mais leve e não tem partes mecânicas extremamente sensíveis a impactos e solavancos. Isso garante maior proteção aos dados armazenados no seu notebook, para que você possa trabalhar sem preocupações, com alto desempenho e produtividade, mesmo em um veículo em movimento.<br />\r\n <br />\r\n<br />\r\nRápido e eficiente<br />\r\nCom processadores até SérioAMD Ryzen com 8 GB de memória, o ASUS M515 ajuda você a fazer as coisas com rapidez e eficiência.<br />\r\n<br />\r\nTenha uma visão mais ampla do mundo<br />\r\nA tela NanoEdge dá ao ASUS M515 uma vasta área de tela para uma experiência de visualização envolvente seja para o trabalho ou lazer. Com tela FHD de visão ampla apresenta um revestimento antirreflexo para reduzir distrações indesejadas de reflexos irritantes, para que você possa realmente se concentrar no que está à sua frente.', 2499.99, 1),
	(3, 'SSD 480 GB Kingston A400', 'archives/products/638cf059d164b.jpg', 'SSD 480 GB Kingston A400, SATA, Leitura: 500MB/s e Gravação: 450MB/s <br />\r\n <br />\r\n<br />\r\nSSD Kingston A400 é o mais confiável e durável do que um disco rígido<br />\r\nA unidade de estado sólido A400 da Kingston aumenta drasticamente a resposta do seu computador com tempos incríveis de inicialização, carregamento e transferência, comparados a discos rígidos mecânicos.<br />\r\n<br />\r\n <br />\r\n<br />\r\nMais velocidade para o seu PC<br />\r\nReforçado com uma controladora de última geração para velocidades de leitura e gravação de até 500MB/s e 450MB/s, este SSD é 10x mais rápido do que um disco rígido tradicional para melhor desempenho, resposta ultrarrápida em multitarefas e um computador mais rápido de modo geral. Também mais confiável e durável do que um disco rígido, o A400 é feito com memória Flash.<br />\r\n<br />\r\n <br />\r\n<br />\r\nO SSD mais resistente<br />\r\nO SSD Kingston A400, não existem partes móveis, com menor probabilidade de falhas do que um disco rígido mecânico. Também é mais frio e mais silencioso e sua resistência a choques e vibração torna-o ideal para notebooks e outros dispositivos móveis de computação.<br />\r\n<br />\r\n <br />\r\n<br />\r\nDiversas Capacidades do A400<br />\r\nO A400 está disponível em diversas capacidades de 480GB oferecendo todo o espaço que você precisa para aplicativos, vídeos, fotos e outros documentos importantes. Você também pode substituir seu disco rígido ou um SSD menor por uma unidade grande o suficiente para conter todos os seus arquivos. SSD confiável e durável para melhor desempenho do computador e respostas ultrarrápidas em multitarefas.<br />\r\n<br />\r\n <br />\r\n<br />\r\nSSD Kingston A400 é mais rápido que um disco Rígido <br />\r\nRápida inicialização, carregamento e transferência de arquivos; Mais confiável e mais durável do que um disco rígido; Diversas capacidades com espaço para aplicativos ou para substituição do disco rígido.', 204.99, 1),
	(4, 'Headset Gamer HyperX Cloud Stinger', 'archives/products/638cf0a0841aa.jpg', 'Cloud Stinger - Fone de ouvido confortável e leve totalmente ideal para jogos, estrutura rotacional de 90 graus traz conforto e durabilidade da assinatura HyperX, microfone com cancelamento de ruído giratório para mudo e com total compatibilidade multiplataformas<br />\r\n <br />\r\n<br />\r\nConforto, estrutura leve e qualidade no áudio<br />\r\n <br />\r\n<br />\r\nO HyperX Cloud Stinger é o headset ideal para jogadores que procuram conforto, qualidade de som superior e maior conveniência. Com apenas 275 gramas, é confortável em seu pescoço e seus fones de ouvido giram em um ângulo de 90 graus para um melhor ajuste. Seus drivers direcionais de 50 mm posicionam o som diretamente no ouvido para precisão de áudio, qualidade e nível de som durante o jogo.<br />\r\n<br />\r\n <br />\r\n<br />\r\nDTS Headphone: X Spatial Áudio<br />\r\n <br />\r\n<br />\r\nO Cloud Stinger também inclui 2 anos de DTS Headphone: X Spatial Audio para imersão aprimorada e dicas de áudio posicionais para mantê-lo no topo do seu jogo. Para o máximo de conforto em sessões de jogos prolongadas, ele apresenta espuma exclusiva HyperX de alta qualidade e seu controle deslizante de aço ajustável. Desbloqueie espacialização e localização de áudio 3D precisas! <br />\r\n<br />\r\n <br />\r\n<br />\r\nControle de volume intuitivo no fone de ouvido<br />\r\n <br />\r\n<br />\r\nO controle deslizante de volume está localizado na parte inferior do fone de ouvido direito, facilitando o acesso e o ajuste do volume.<br />\r\n<br />\r\n <br />\r\n<br />\r\nMicrofone com cancelamento de ruído giratório para o mudo<br />\r\n <br />\r\n<br />\r\nO cancelamento de ruído passivo integrado do HyperX Cloud Stinger reduz o ruído de fundo para uma qualidade de voz mais clara. O fone de ouvido é certificado pela TeamSpeak e Discord e compatível com outros programas de bate-papo líderes no mercado e plataformas. Silencie de maneira convenientemente e sutil o microfone virando-o verticalmente contra a cabeça.', 349.99, 1),
	(5, 'SSD 480 GB Kingston A400', 'archives/products/638cf3e949f49.jpg', 'Características:<br />\r\n<br />\r\n- Marca: Kingston<br />\r\n<br />\r\n- Modelo: SA400S37/480G<br />\r\n<br />\r\n <br />\r\n<br />\r\nEspecificações:<br />\r\n<br />\r\n- Formato: 2,5 pol <br />\r\n<br />\r\n- Interface: SATA Rev. 3.0 (6Gb/s) — compatível com a versão anterior SATA Rev. 2.0 (3Gb/s)<br />\r\n<br />\r\n- Capacidades: 480GB<br />\r\n<br />\r\n- NAND: TLC <br />\r\n<br />\r\n- Performance de referência - até 500MB/s para leitura e 450MB/s para gravação<br />\r\n<br />\r\n- Temperatura de armazenamento: -40 °C a 85 °C <br />\r\n<br />\r\n- Temperatura de operação: 0 °C a 70 °C<br />\r\n<br />\r\n- Vibração quando em operação: 2,17G pico (7 – 800 Hz)<br />\r\n<br />\r\n- Vibração quando não está em operação: 20G pico (10 – 2000 Hz)<br />\r\n<br />\r\n- Expectativa de vida útil: 1 milhão de horas MTB<br />\r\n<br />\r\n <br />\r\n<br />\r\nBenefícios: <br />\r\n<br />\r\n- 10x mais rápido do que um disco rígido: Com incríveis velocidades de leitura/gravação, o SSD A400 não somente irá aumentar o desempenho, como também poderá ser usado para dar vida nova em computadores mais antigos. <br />\r\n<br />\r\n- Robusto: O A400 é resistente a impactos e vibrações, para confiabilidade reforçada em notebooks e outros dispositivos móveis. <br />\r\n<br />\r\n- Ideal para desktops e notebooks: A400 tem um formato de 7 mm parase ajustar auma grande variedade de computadores. É ideal para notebooks mais finos e computadores, ultrabooks e ultratop com espaço limitado.', 200.50, 2),
	(6, 'Processador Intel Core i5 10400 2.4ghz', 'archives/products/638cf53e781ff.jpg', 'Processador Intel Core 10° geração', 1099.99, 2);

-- Copiando estrutura para tabela buyeasy.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint DEFAULT NULL,
  `imgPath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'archives/users/default.png',
  `numberContact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emailContact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela buyeasy.users: ~8 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `name`, `type`, `imgPath`, `numberContact`, `emailContact`, `whatsapp`, `instagram`) VALUES
	(1, 'Diogo Compuiter', 2, 'archives/users/default.png', '81912345678', 'exemplo@exemplo.com', NULL, 'https://www.instagram.com'),
	(2, 'Myecia Eletronica', 2, 'archives/users/default.png', '81912345678', 'exemplo@exemplo.com', '81912345678', 'https://www.instagram.com'),
	(3, 'Mayres cosmeticos', 2, 'archives/users/default.png', '81912345678', 'exemplo@exemplo.com', NULL, NULL),
	(4, 'Jesiel Batel', 2, 'archives/users/default.png', '81912345678', NULL, '81912345678', 'https://www.instagram.com'),
	(5, 'Vitor MotoPeças', 2, 'archives/users/default.png', '81912345678', 'exemplo@exemplo.com', '81912345678', NULL),
	(6, 'Saulo Varão', 2, 'archives/users/default.png', '81912345678', NULL, '81912345678', 'https://www.instagram.com'),
	(7, 'Thiago afiações', 2, 'archives/users/default.png', '81912345678', NULL, '81912345678', NULL),
	(8, 'Jhonathan Automotivo', 2, 'archives/users/default.png', '81912345678', 'exemplo@exemplo.com', NULL, 'https://www.instagram.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
