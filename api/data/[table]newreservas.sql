-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2019 às 20:32
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbagenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `newreservas`
--

CREATE TABLE `newreservas` (
  `reg_id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `sala_fk` int(11) DEFAULT NULL,
  `mat_fk` int(11) DEFAULT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `reg_notes` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `newreservas`
--

INSERT INTO `newreservas` (`reg_id`, `user_fk`, `sala_fk`, `mat_fk`, `reg_date`, `reg_time`, `reg_notes`) VALUES
(1, 9, NULL, 1, '2019-12-01', '08:30:00', 'jasasajshaksa'),
(2, 9, 1, 1, '2019-12-01', '08:30:00', 'Oi :3'),
(3, 9, 2, 1, '2019-12-01', '08:30:00', 'Outro usuário só pra testar uma coisinha na hora de identificar o nome, lá na listagem ^^'),
(4, 10, 2, 1, '2019-12-01', '08:30:00', 'O outro não identificou, tô fazendo de novo :^');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `newreservas`
--
ALTER TABLE `newreservas`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `user_fk` (`user_fk`),
  ADD KEY `sala_fk` (`sala_fk`),
  ADD KEY `mat_fk` (`mat_fk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `newreservas`
--
ALTER TABLE `newreservas`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `newreservas`
--
ALTER TABLE `newreservas`
  ADD CONSTRAINT `newreservas_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `usuarios` (`user_id`),
  ADD CONSTRAINT `newreservas_ibfk_2` FOREIGN KEY (`sala_fk`) REFERENCES `salas` (`sala_id`),
  ADD CONSTRAINT `newreservas_ibfk_3` FOREIGN KEY (`mat_fk`) REFERENCES `materiais` (`mat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
