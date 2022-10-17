-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2022 às 01:00
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `buyeasy_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `date_increment` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_product`
--

CREATE TABLE `cart_product` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `commenter`
--

CREATE TABLE `commenter` (
  `id` int(11) NOT NULL,
  `commenter` text DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `id_user_commenter` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `date_increament` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT '../archives/users/img.png',
  `name` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `data_increament` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_USER` (`id_user`);

--
-- Índices para tabela `cart_product`
--
ALTER TABLE `cart_product`
  ADD KEY `FK_ID_CART` (`id_cart`),
  ADD KEY `FK_ID_PRODUCT` (`id_product`);

--
-- Índices para tabela `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_USER_COMMENTER` (`id_user_commenter`),
  ADD KEY `FK_ID_PRODUCT_COMMENTER` (`id_product`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_MERCHANT` (`id_merchant`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `commenter`
--
ALTER TABLE `commenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_ID_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `FK_ID_CART` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `FK_ID_PRODUCT` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `FK_ID_PRODUCT_COMMENTER` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_ID_USER_COMMENTER` FOREIGN KEY (`id_user_commenter`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_ID_MERCHANT` FOREIGN KEY (`id_merchant`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
