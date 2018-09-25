-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2018 às 01:36
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
  `matricula_professor` int(6) DEFAULT NULL,
  `possui_orientador` varchar(10) CHARACTER SET utf8 DEFAULT 'Não',
  `disciplina` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`nome`, `matricula`, `email`, `matricula_professor`, `possui_orientador`, `disciplina`) VALUES
('Michael Bruno Pereira de Castilho', 312211, NULL, NULL, 'Não', 'TCC02'),
('Thiago Vinícius Oliveira Guimarăes', 374292, NULL, NULL, 'Não', 'TCC02'),
('Davidson Felipe Caetano de Morais', 413695, NULL, NULL, 'Não', 'TCC02'),
('Barbara Danielly Neto Tavares', 469793, NULL, NULL, 'Não', 'TCC02'),
('Heitor Laurentino Terozendi Silva', 515095, NULL, NULL, 'Não', 'TCC02'),
('Pedro Lucas Duarte Faria', 536589, NULL, NULL, 'Não', 'TCC02');

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
('Engenharia de requisitos', 23),
('Testes', 24),
('AED', 26),
('Gerenciamento de projetos', 27),
('ITIL', 29),
('ddddddd', 32),
('Mineração de dados', 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_professores`
--

CREATE TABLE `area_professores` (
  `id_area` int(11) NOT NULL,
  `matricula` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `area_professores`
--

INSERT INTO `area_professores` (`id_area`, `matricula`) VALUES
(23, 333333),
(26, 333333),
(26, 444444),
(29, 444444),
(33, 222222),
(33, 555555);

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

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`nome`, `matricula`, `disciplina`, `quantidade_orientacoes`, `email`, `status`, `descricao`) VALUES
('Professor01', 222222, 'Ambas', 2, 'professor01@professor01.com', 'Ativo', 'desc01 edit'),
('Professor03AedTcc01', 333333, 'TCC01', 3, 'prof3@prof3.com', 'Ativo', 'teste abc'),
('Professor04ItilTcc02', 444444, 'TCC02', 4, 'prof4@prof4.com', 'Ativo', NULL),
('test', 555555, 'Ambas', 5, 'prof5@prof5.com', 'Ativo', 'prof5@prof5.com');

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

--
-- Extraindo dados da tabela `solicitacao_de_orientacao`
--

INSERT INTO `solicitacao_de_orientacao` (`matricula_professor`, `matricula_aluno`, `nome_da_area`, `status`) VALUES
(1, 312211, 'Engenharia de requisitos', 'Aguardando');

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
(312211, '1111111', 1),
(333333, '3', 3),
(374292, '374292', 1),
(413695, '413695', 1),
(469793, '469793', 1),
(515095, '515095', 1),
(536589, '1111111', 1),
(555555, '555555', 2);

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
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
