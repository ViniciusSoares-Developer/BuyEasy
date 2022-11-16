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

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

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

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela buyeasy.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint DEFAULT NULL,
  `imgPath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '"archives/users/default.png"',
  `numberContact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emailContact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
