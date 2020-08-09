-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Set-2019 às 18:56
-- Versão do servidor: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdnoticia`
--
CREATE DATABASE IF NOT EXISTS `bdnoticia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdnoticia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `codcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomecategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`codcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codcategoria`, `nomecategoria`) VALUES
(13, 'Esportes'),
(14, 'Games');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `codnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `codcategoria` int(11) NOT NULL,
  PRIMARY KEY (`codnoticia`),
  KEY `codcategoria` (`codcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`codnoticia`, `titulo`, `autor`, `data`, `conteudo`, `imagem`, `codcategoria`) VALUES
(4, 'Responsabilidade TÃ©cnica e Social', 'Anderson Spera', '2019-09-06', '<p>zxzc\\</p>\r\n', 'sonic.jpg', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  PRIMARY KEY (`codusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codusuario`, `nome`, `email`, `senha`, `nivel_acesso`) VALUES
(18, 'teste de cadastro', 'teste@teste.com', 'asklfasj', 2),
(24, 'Anderson Spera', 'andersonspera@gmail.com', '2e76fd7955d350d5754d132e6e96a6ffc3f99b2b', 1),
(25, 'Anderson Spera', 'andersonspera@gmail.com', '793c41bce8b83711d498a0b6f62a22f4802bee04', 1),
(26, 'Anderson Spera', 'andersonspera@gmail.com', '8bdf64501f3e21522d3996e266c8eff7055885bd', 1),
(27, 'Anderson Spera', 'andersonspera@gmail.com', 'df211ccdd94a63e0bcb9e6ae427a249484a49d60', 1),
(28, 'Anderson Spera', 'andersonspera@gmail.com', 'bfff0147b7805dd47fadf3fb41642184888c0779', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `noticia_ibfk_2` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codcategoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
