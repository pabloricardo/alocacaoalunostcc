-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2018 às 01:34
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `matricula` int(6) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `disciplina` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `nome_da_area` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`nome_da_area`, `id_area`) VALUES
('AED', 37),
('Banco de Dados', 38),
('Matemática Discreta', 39),
('Testes', 40),
('Arquitetura de software', 41),
('Engenharia de Requisitos', 42),
('Grafos', 43),
('Administração', 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_professores`
--

CREATE TABLE `area_professores` (
  `id_area` int(11) NOT NULL,
  `matricula` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `nome` varchar(50) NOT NULL,
  `matricula` int(6) NOT NULL,
  `disciplina` varchar(50) DEFAULT NULL,
  `quantidade_orientacoes` int(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_de_orientacao`
--

CREATE TABLE `solicitacao_de_orientacao` (
  `matricula_professor` int(6) NOT NULL,
  `matricula_aluno` int(6) NOT NULL,
  `nome_da_area` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `matricula` int(6) NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 NOT NULL,
  `permissao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`matricula`, `senha`, `permissao`) VALUES
(123123, '1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `area_professores`
--
ALTER TABLE `area_professores`
  ADD PRIMARY KEY (`id_area`,`matricula`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `solicitacao_de_orientacao`
--
ALTER TABLE `solicitacao_de_orientacao`
  ADD PRIMARY KEY (`matricula_professor`,`matricula_aluno`,`nome_da_area`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
