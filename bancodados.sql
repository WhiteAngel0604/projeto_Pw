-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jun-2026 às 16:11
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancodados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrocliente`
--

CREATE TABLE `cadastrocliente` (
  `cpf` int(14) NOT NULL,
  `nome` text NOT NULL,
  `data_nascimento` int(10) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `tpo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastrocliente`
--

INSERT INTO `cadastrocliente` (`cpf`, `nome`, `data_nascimento`, `endereco`, `senha`, `categoria`, `tpo`) VALUES
(2147483647, 'lalallal lalal', 2026, 'rua tal tal tal', '12312312312', 'cabelos', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroproduto`
--

CREATE TABLE `cadastroproduto` (
  `IDproduto` int(80) NOT NULL,
  `nome` text NOT NULL,
  `categoria` varchar(80) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `marca` text NOT NULL,
  `estoque` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrovendedor`
--

CREATE TABLE `cadastrovendedor` (
  `CPFvendedor` varchar(14) NOT NULL,
  `nome` text NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `nome_loja` varchar(50) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `categoria_loja` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastrocliente`
--
ALTER TABLE `cadastrocliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `cadastroproduto`
--
ALTER TABLE `cadastroproduto`
  ADD PRIMARY KEY (`IDproduto`);

--
-- Índices para tabela `cadastrovendedor`
--
ALTER TABLE `cadastrovendedor`
  ADD PRIMARY KEY (`CPFvendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastrocliente`
--
ALTER TABLE `cadastrocliente`
  MODIFY `cpf` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de tabela `cadastroproduto`
--
ALTER TABLE `cadastroproduto`
  MODIFY `IDproduto` int(80) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
