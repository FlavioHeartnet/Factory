-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Out-2015 às 20:52
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `course-factory`
--
CREATE DATABASE IF NOT EXISTS `course-factory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `course-factory`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  `sobrenome` text,
  `idCurso` int(11) DEFAULT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `RA` varchar(20) DEFAULT NULL,
  `CPF` int(20) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `bolsa` varchar(255) DEFAULT NULL,
  `Financiado` varchar(255) DEFAULT NULL,
  `DataMatricula` datetime DEFAULT NULL,
  `PeriodoLetivo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nome`, `sobrenome`, `idCurso`, `idTurma`, `endereco`, `telefone`, `celular`, `RA`, `CPF`, `RG`, `bolsa`, `Financiado`, `DataMatricula`, `PeriodoLetivo`) VALUES
(2, 'JoÃ£o', 'Pedro', 1, 2, '', '', '', '127715', 2147483647, '', '25', 'Nao', '2015-01-05 00:00:00', NULL),
(3, 'JoÃ£o', 'Pedro', 1, 2, '', '', '', '127715', 2147483647, '', '25', 'Nao', '2015-01-05 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_disciplinas`
--

DROP TABLE IF EXISTS `alunos_disciplinas`;
CREATE TABLE IF NOT EXISTS `alunos_disciplinas` (
  `idAD` int(11) NOT NULL AUTO_INCREMENT,
  `idDiciplina` int(11) DEFAULT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `cargaHoraria` varchar(255) DEFAULT NULL,
  `prerequisito` int(11) DEFAULT NULL,
  `situacao` int(255) DEFAULT NULL,
  `PeriodoLetivo` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Extraindo dados da tabela `alunos_disciplinas`
--

INSERT INTO `alunos_disciplinas` (`idAD`, `idDiciplina`, `idTurma`, `cargaHoraria`, `prerequisito`, `situacao`, `PeriodoLetivo`, `semestre`) VALUES
(67, 5, 4, '40 horas', 0, 1, 6, 1),
(68, 16, 4, '40 horas', 0, 1, 3, 1),
(69, 10, 4, '40 horas', 0, 1, 3, 1),
(70, 17, 4, '40 horas', 0, 1, 3, 1),
(71, 22, 4, '40 horas', 18, 1, 4, 2),
(72, 18, 4, '40 horas', 19, 1, 4, 2),
(73, 21, 4, '40 horas', 17, 1, 4, 2),
(74, 15, 4, '40 horas', 16, 1, 4, 2),
(75, 20, 4, '40 horas', 17, 1, 5, 3),
(76, 23, 4, '40 horas', 0, 1, 5, 3),
(77, 19, 4, '40 horas', 0, 1, 6, 4),
(78, 24, 4, '40 horas', 15, 1, 6, 4),
(79, 5, 7, '40 horas', 0, 1, 3, 1),
(80, 16, 7, '40 horas', 0, 1, 3, 1),
(81, 10, 7, '40 horas', 0, 1, 3, 1),
(82, 22, 7, '40 horas', 18, 1, 3, 1),
(83, 17, 7, '40 horas', 0, 1, 4, 2),
(84, 18, 7, '40 horas', 19, 1, 4, 2),
(85, 21, 7, '40 horas', 17, 1, 4, 2),
(86, 15, 7, '40 horas', 16, 1, 4, 2),
(87, 20, 7, '40 horas', 17, 1, 5, 3),
(88, 23, 7, '40 horas', 0, 1, 5, 3),
(89, 19, 7, '40 horas', 0, 1, 6, 4),
(90, 24, 7, '40 horas', 15, 1, 6, 4),
(91, 5, 6, '40 horas', 0, 1, 3, 1),
(92, 16, 6, '40 horas', 0, 1, 3, 1),
(93, 10, 6, '40 horas', 0, 1, 3, 1),
(94, 17, 6, '40 horas', 0, 1, 3, 1),
(95, 22, 6, '40 horas', 18, 1, 4, 2),
(96, 18, 6, '40 horas', 19, 1, 4, 2),
(97, 21, 6, '40 horas', 17, 1, 4, 2),
(98, 15, 6, '40 horas', 16, 1, 4, 2),
(99, 20, 6, '40 horas', 17, 1, 5, 3),
(100, 23, 6, '40 horas', 0, 1, 5, 3),
(101, 19, 6, '40 horas', 0, 1, 6, 4),
(102, 24, 6, '40 horas', 15, 1, 6, 4),
(103, 5, 5, '40 horas', 0, 1, 3, 1),
(104, 16, 5, '40 horas', 0, 1, 3, 1),
(105, 10, 5, '40 horas', 0, 1, 3, 1),
(106, 17, 5, '40 horas', 0, 1, 3, 1),
(107, 22, 5, '40 horas', 18, 1, 4, 2),
(108, 18, 5, '40 horas', 19, 1, 4, 2),
(109, 21, 5, '40 horas', 17, 1, 4, 2),
(110, 15, 5, '40 horas', 16, 1, 4, 2),
(111, 20, 5, '40 horas', 17, 1, 5, 3),
(112, 23, 5, '40 horas', 0, 1, 5, 3),
(113, 19, 5, '40 horas', 0, 1, 6, 4),
(114, 24, 5, '40 horas', 15, 1, 6, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `codMac` int(11) DEFAULT NULL,
  `dataAutoMac` text,
  `Cordenador` varchar(255) DEFAULT NULL,
  `Modulo` text,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idCurso`, `Nome`, `codMac`, `dataAutoMac`, `Cordenador`, `Modulo`) VALUES
(1, 'Ciências da Computação ', 0, '12/12/2003', 'Walter', '8'),
(2, 'Administração de Empresas', 0, '12/12/2003', 'Walter', '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diciplinas`
--

DROP TABLE IF EXISTS `diciplinas`;
CREATE TABLE IF NOT EXISTS `diciplinas` (
  `idDiciplina` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sigla` varchar(255) DEFAULT NULL,
  `cargaHoraria` varchar(255) DEFAULT NULL,
  `descricao` varchar(256) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDiciplina`),
  UNIQUE KEY `idDiciplina` (`idDiciplina`),
  KEY `idDiciplina_2` (`idDiciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `diciplinas`
--

INSERT INTO `diciplinas` (`idDiciplina`, `Nome`, `sigla`, `cargaHoraria`, `descricao`, `tipo`) VALUES
(5, 'Pesquisa e Ordenação', 'POD', '40 horas', 'lorem ipsum2', 1),
(10, 'Redes', 'RDE', '40 horas', 'Disciplina onde o tema proposto s?o redes de computador', 2),
(15, 'Gestão de Projetos', 'GPS', '40 horas', 'nova descricao', 1),
(16, 'Empreendedorismo', 'EMP', '40 horas', 'lorem ipsum', 0),
(17, 'Banco de Dados 1', 'BD1', '40 horas', 'Coisas de banco dedados', 1),
(18, 'Circuitos Logicos', 'CL', '40 horas', 'Lorem ipsum', 2),
(19, 'Estatistica', 'EST', '40 horas', 'Lorem ipsum', 1),
(20, 'Banco de Dados 2 ', 'BD2', '40 horas', 'lorem ipsum', 2),
(21, 'Engenharia de software', 'EGS', '40 horas', 'lorem ipsum', 1),
(22, 'Matemática  avançada', 'MAT', '40 horas', 'lorem ipsum', 2),
(23, 'Comunicação e Expressão', 'CME', '40 horas', 'lorem ipsum', 1),
(24, 'Direito da Informatica', 'DI', '40 horas', 'Sobre direito digital', 2),
(25, 'Algoritmos 2', 'ALG2', '40 horas', 'lorem ipsum', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas_equivalentes`
--

DROP TABLE IF EXISTS `disciplinas_equivalentes`;
CREATE TABLE IF NOT EXISTS `disciplinas_equivalentes` (
  `idEquivalente` int(11) NOT NULL AUTO_INCREMENT,
  `idDisciplina` int(11) DEFAULT NULL,
  `disciplinaEq` int(11) DEFAULT NULL,
  `prerequisito` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEquivalente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicoletivo`
--

DROP TABLE IF EXISTS `historicoletivo`;
CREATE TABLE IF NOT EXISTS `historicoletivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idLetivo` int(11) DEFAULT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `numAlunos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `historicoletivo`
--

INSERT INTO `historicoletivo` (`id`, `idLetivo`, `idCurso`, `idTurma`, `semestre`, `numAlunos`) VALUES
(9, 3, 1, 7, 1, 5),
(10, 4, 1, 7, 2, 5),
(11, 5, 1, 7, 3, 10),
(12, 6, 1, 7, 4, 10),
(13, 3, 1, 2, 1, 10),
(14, 4, 1, 2, 2, 20),
(15, 5, 1, 2, 3, 30),
(16, 6, 1, 2, 4, 40),
(17, 3, 1, 4, 1, 45),
(18, 4, 1, 4, 2, 11),
(19, 5, 1, 4, 3, 15),
(20, 6, 1, 4, 4, 10),
(21, 3, 1, 5, 1, 13),
(22, 4, 1, 5, 2, 20),
(23, 5, 1, 5, 3, 15),
(24, 6, 1, 5, 4, 16),
(25, 3, 1, 6, 1, 22),
(26, 4, 1, 6, 2, 21),
(27, 4, 1, 6, 3, 18),
(28, 5, 1, 6, 4, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `idCurso` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `idDiciplina` int(11) DEFAULT NULL,
  `prerequisito` int(11) DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`idModulo`, `idCurso`, `semestre`, `idDiciplina`, `prerequisito`) VALUES
(1, 1, 1, 5, 0),
(2, 1, 1, 16, 0),
(3, 1, 1, 10, 0),
(4, 1, 1, 17, 0),
(5, 1, 2, 22, 18),
(6, 1, 2, 18, 19),
(7, 1, 2, 21, 17),
(8, 1, 2, 15, 16),
(9, 1, 3, 20, 17),
(10, 1, 3, 23, 0),
(19, 1, 4, 19, 0),
(20, 1, 4, 24, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodoletivo`
--

DROP TABLE IF EXISTS `periodoletivo`;
CREATE TABLE IF NOT EXISTS `periodoletivo` (
  `idLetivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `termino` date DEFAULT NULL,
  `LetivoProximo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLetivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `periodoletivo`
--

INSERT INTO `periodoletivo` (`idLetivo`, `Nome`, `inicio`, `termino`, `LetivoProximo`) VALUES
(3, '2015Sem1', '2015-12-01', '2015-06-15', 4),
(4, '2015Sem2', '2015-08-01', '2015-12-23', 5),
(5, '2016Sem1', '2016-02-02', '2016-06-12', 6),
(6, '2016Sem2', '2016-08-12', '2016-12-12', NULL),
(7, '2017sem1', '2017-02-12', '2017-06-12', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `PeriodoLetivo` int(11) DEFAULT NULL,
  `numAlunos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTurma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `Nome`, `idCurso`, `PeriodoLetivo`, `numAlunos`) VALUES
(2, '1CCO', 1, 1, NULL),
(3, '2ADM', 2, 1, NULL),
(4, '2CCO', 1, 2, 40),
(5, '3CCO', 1, 2, NULL),
(6, 'turma3', 1, 3, 23),
(7, 'turma4', 1, 3, 23),
(8, 'Turma5', 2, NULL, 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosfactory`
--

DROP TABLE IF EXISTS `usuariosfactory`;
CREATE TABLE IF NOT EXISTS `usuariosfactory` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  `usuario` text,
  `senha` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `email` text,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuariosfactory`
--

INSERT INTO `usuariosfactory` (`idUsuario`, `nome`, `usuario`, `senha`, `status`, `email`, `nivel`) VALUES
(1, 'flavio', 'flavio', '123', 1, 'flavionogueirabarros@gmail.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
