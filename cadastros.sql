-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2026 às 01:01
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
-- Banco de dados: `cadastros`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastrocliente`
--

CREATE TABLE `cadastrocliente` (
  `CPFcliente` int(14) NOT NULL,
  `Nome_Completo` text NOT NULL,
  `DataNas` int(10) NOT NULL,
  `Endereço` varchar(100) NOT NULL,
  `Senha` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastroproduto`
--

CREATE TABLE `cadastroproduto` (
  `IDproduto` int(80) NOT NULL,
  `Nome` text NOT NULL,
  `Categoria` varchar(80) NOT NULL,
  `Preco` varchar(20) NOT NULL,
  `Marca` text NOT NULL,
  `Estoque` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastrovendedor`
--

CREATE TABLE `cadastrovendedor` (
  `CPFvendedor` varchar(14) NOT NULL,
  `Nome_Completo` text NOT NULL,
  `DatadeNas` int(10) NOT NULL,
  `Ntelefone` varchar(11) NOT NULL,
  `Nome_loja` varchar(50) NOT NULL,
  `CNPJ_loja` varchar(14) NOT NULL,
  `Senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastrocliente`
--
ALTER TABLE `cadastrocliente`
  ADD PRIMARY KEY (`CPFcliente`);

--
-- Índices de tabela `cadastroproduto`
--
ALTER TABLE `cadastroproduto`
  ADD PRIMARY KEY (`IDproduto`);

--
-- Índices de tabela `cadastrovendedor`
--
ALTER TABLE `cadastrovendedor`
  ADD PRIMARY KEY (`CPFvendedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastrocliente`
--
ALTER TABLE `cadastrocliente`
  MODIFY `CPFcliente` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastroproduto`
--
ALTER TABLE `cadastroproduto`
  MODIFY `IDproduto` int(80) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
