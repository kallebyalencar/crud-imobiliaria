-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2026 às 06:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `imovel_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `tipo` enum('Casa','Apartamento','Comercial','Terreno') NOT NULL,
  `finalidade` enum('Venda','Aluguel') NOT NULL,
  `preco` decimal(12,2) NOT NULL,
  `status` enum('Disponível','Reservado','Vendido') DEFAULT 'Disponível',
  `quartos` int(11) DEFAULT 0,
  `banheiros` int(11) DEFAULT 0,
  `vagas` int(11) DEFAULT 0,
  `area` decimal(10,2) DEFAULT 0.00,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `contato` varchar(20) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `usuario_id`, `titulo`, `tipo`, `finalidade`, `preco`, `status`, `quartos`, `banheiros`, `vagas`, `area`, `bairro`, `cidade`, `estado`, `descricao`, `codigo`, `contato`, `imagem`, `created_at`) VALUES
(2, 1, 'Casa no Bosque', 'Casa', 'Aluguel', 1500.00, 'Disponível', 0, 0, 0, 0.00, NULL, 'Juazeiro do Norte', 'CE', NULL, NULL, NULL, NULL, '2026-05-10 22:39:56'),
(4, 1, 'Apartamento perto do Cariri Garden', 'Apartamento', 'Venda', 350000.00, 'Disponível', 2, 0, 0, 0.00, NULL, 'Juazeiro do Norte', 'CE', 'Ótimo apartamento bem localizado, próximo a shoppings e faculdades.', NULL, NULL, NULL, '2026-05-13 04:29:43'),
(5, 1, 'Ponto Comercial no Centro', 'Comercial', 'Aluguel', 2500.00, 'Disponível', 0, 0, 0, 0.00, NULL, 'Juazeiro do Norte', 'CE', 'Amplo espaço para o seu negócio na principal avenida da cidade.', NULL, NULL, NULL, '2026-05-13 04:29:43'),
(6, 1, 'Casa com design industrial e rústico', 'Casa', 'Aluguel', 2800.00, 'Disponível', 3, 2, 2, 145.50, 'Lagoa Seca', 'Juazeiro do Norte', 'CE', 'Excelente casa de conceito aberto. Conta com acabamentos em cimento queimado, detalhes em madeira e ferro, além de uma ótima iluminação natural e espaço para closet.', NULL, NULL, NULL, '2026-05-13 04:31:36'),
(7, 1, 'Lote plano pronto para construir', 'Terreno', 'Venda', 115000.00, 'Disponível', 0, 0, 0, 300.00, 'Aeroporto', 'Juazeiro do Norte', 'CE', 'Terreno amplo e murado em área de grande expansão. Oportunidade perfeita para investimento ou construção do seu projeto dos sonhos.', NULL, NULL, NULL, '2026-05-13 04:31:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `created_at`) VALUES
(1, 'Kalleby', 'kalleby@teste.com', '123456', '88999999999', '2026-05-10 22:38:51'),
(2, 'clara', 'clara@gmail.com', '$2y$10$0OHVWtwaQfkhchfnmB8p5.48lT/LY5KPWrKSG1uW5POLJAIZ.VSGK', '(29) 30192-3102', '2026-05-13 03:50:22');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unico_favorito` (`usuario_id`,`imovel_id`),
  ADD KEY `imovel_id` (`imovel_id`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
