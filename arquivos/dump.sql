-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `db_de_teste`
--
CREATE DATABASE IF NOT EXISTS `db_de_teste` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_de_teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartorios`
--

CREATE TABLE `cartorios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `razao` varchar(255) NOT NULL,
  `tipo_documento` int(10) DEFAULT NULL,
  `documento` bigint(20) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tabeliao` varchar(255) NOT NULL,
  `ativo` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cartorios`
--
ALTER TABLE `cartorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nome` (`nome`),
  ADD KEY `documento` (`documento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartorios`
--
ALTER TABLE `cartorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
