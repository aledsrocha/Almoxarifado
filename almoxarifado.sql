-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jul-2022 às 01:02
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
-- Banco de dados: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `name` varchar(10000) NOT NULL,
  `quantidade` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `name`, `quantidade`) VALUES
(7, 'produto', '10'),
(8, 'faca', '2'),
(9, 'tesoura', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` varchar(200) NOT NULL,
  `token` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `name`, `birthdate`, `token`) VALUES
(1, 'admin', '123', '', '', ''),
(2, 'aledsrocha@gmail.com', '$2y$10$lbzGgFQEDiQpDkpFb1q7Ou2uV', 'Alessandro Rocha', '1995-01-19', '42121c1f86e35ccb23d5e47cadd761f1'),
(3, 'teste', '$2y$10$3n5aD3qwXMOopO3zsTWIdedO4', 'Alessandro Rocha', '1995-01-19', 'a5b3410cf2769997ad39527268c6b7f4'),
(4, 'teste1', '$2y$10$QtOLWOR7rPY6DuV277D.eesKx', 'Alessandro Rocha', '1995-01-19', '2eaf231999333096e052904ab2e78a7d'),
(5, 'teste2', '$2y$10$P2J1SMyRb3tJkSLlst.S/OCbK', 'Alessandro Rocha', '1995-01-19', '53296b73b9a6a7f54628fba5e70895b6'),
(6, 'admin1', '$2y$10$vYKAFUUwFA1bjPPc/si75Ooy9', 'Alessandro Dos Santos Rocha', '1995-01-19', '4f9d9624a9cd7a9a3faca59046b8c189'),
(7, 'teste4', '$2y$10$xJwpCyA48Z0FAMJdLd7nnOMHj', 'Alessandro Dos Santos Rocha', '1995-01-19', '322084d1de5e3b8518cc79edf4c128c9'),
(8, 'teste98', '$2y$10$6KmtOcTC6z2ATH4L77S8kuhzC', 'Alessandro Rocha', '1995-01-19', 'efae30a0c24c5457c2fce8e456ca3b8c'),
(9, 'teste97', '$2y$10$wd.qXezm0882uc7VeYC6OeNzQ', 'Alessandro Rocha', '1995-01-19', '09c79712d504190a72cc348eda88424d'),
(10, 'teste90', '$2y$10$KsxacMwVmiTYpjxduCbrIumlv', 'Alessandro Rocha', '1995-01-19', '0b6bd8243ce4540300cc373e737851b2'),
(11, 'c', '$2y$10$MlwhekxqFfJKTZIMcnIZw.cWg', 'Alessandro Rocha', '1995-01-19', '9390fce30b1b15bb17084794f7f4ecf9');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
