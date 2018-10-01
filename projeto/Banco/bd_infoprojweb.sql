-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Out-2018 às 01:44
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_infoprojweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigolink`
--

DROP TABLE IF EXISTS `codigolink`;
CREATE TABLE IF NOT EXISTS `codigolink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `codigolink`
--

INSERT INTO `codigolink` (`id`, `codigo`, `data`) VALUES
(1, '11d9573e0de4e96f441675df5865864a56ae10aa', '2018-09-30 01:04:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupopesquisa`
--

DROP TABLE IF EXISTS `grupopesquisa`;
CREATE TABLE IF NOT EXISTS `grupopesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGrupo` varchar(200) NOT NULL,
  `sigla_grupo` varchar(100) NOT NULL,
  `link_lattes` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `texto` text,
  `data_criacao` datetime NOT NULL,
  `lider_id` int(11) NOT NULL,
  `situacao_id` int(11) NOT NULL,
  `img_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`lider_id`,`situacao_id`),
  KEY `fk_grupopesquisa_usuario1_idx` (`lider_id`),
  KEY `fk_grupopesquisa_situacao1_idx` (`situacao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeImg` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

DROP TABLE IF EXISTS `permissao`;
CREATE TABLE IF NOT EXISTS `permissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Lider');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

DROP TABLE IF EXISTS `situacao`;
CREATE TABLE IF NOT EXISTS `situacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `senha_nova` varchar(45) DEFAULT NULL,
  `data_senha` date DEFAULT NULL,
  `prontuario` varchar(10) NOT NULL,
  `lattes` varchar(200) DEFAULT NULL,
  `permissao_id` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`permissao_id`),
  KEY `fk_Usuario_permissao1` (`permissao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_permissao1` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
