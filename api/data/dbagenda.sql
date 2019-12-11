-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2019 às 03:36
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
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `hora_id` int(11) NOT NULL,
  `hora_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`hora_id`, `hora_time`) VALUES
(1, '08:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `mat_id` int(11) NOT NULL,
  `mat_nome` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`mat_id`, `mat_nome`) VALUES
(1, 'Notebook e criatividade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `reg_id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `sala_fk` int(11) DEFAULT NULL,
  `mat_fk` int(11) DEFAULT NULL,
  `hora_fk` int(11) NOT NULL,
  `class_fk` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_notes` varchar(120) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`reg_id`, `user_fk`, `sala_fk`, `mat_fk`, `hora_fk`, `class_fk`, `reg_date`, `reg_notes`, `create_at`) VALUES
(1, 14, 1, 1, 1, 1, '0000-00-00', 'aaaaaaaa', '2019-12-01 10:37:38'),
(5, 9, 1, 1, 1, 1, '0000-00-00', 'Espero que tenha ido, tenho trab de fisica kkkk', '2019-12-01 10:37:38'),
(6, 9, 1, 1, 1, 1, '2019-11-25', 'Deus me ajuda, faça ir!', '2019-12-01 10:37:38'),
(8, 9, 1, 1, 1, 1, '2019-12-25', 'Vai meu filho!', '2019-12-01 10:37:38'),
(10, 9, 1, 1, 1, 1, '2019-12-31', 'Agora o tipo da reserva é obrigatório, legal né? (Quinta vez que escrevo isso kkk)', '2019-12-01 11:20:59'),
(15, 9, 1, 1, 1, 1, '2019-12-23', 'aaaa', '2019-12-01 11:44:27'),
(17, 9, 1, 1, 1, 1, '2019-12-22', 'Testes de php pra arrumar erro de um valor null\n', '2019-12-01 11:46:54'),
(22, 9, 1, NULL, 1, 1, '2019-12-16', 'sjcnsjd', '2019-12-01 13:21:09'),
(23, 9, 1, NULL, 1, 1, '2019-12-03', 'Testando só sala', '2019-12-01 18:18:14'),
(24, 9, NULL, 1, 1, 1, '2019-12-25', 'Só material', '2019-12-01 18:19:33'),
(28, 9, 2, NULL, 1, 1, '2019-12-23', 'Suponho que todas as validações estão feitas... (Sobre a tela de formulário)', '2019-12-01 19:19:30'),
(29, 9, 1, NULL, 1, 1, '2019-12-31', 'AAAAAAAAAAAAAA', '2019-12-01 19:42:56'),
(30, 9, 1, NULL, 1, 1, '2019-12-31', 'AAAAAAAAAAAAAA', '2019-12-01 19:43:11'),
(31, 9, 2, NULL, 1, 1, '2019-12-17', 'asasasas', '2019-12-01 19:46:10'),
(32, 9, 1, NULL, 1, 1, '2019-12-13', 'sasasasa', '2019-12-01 19:48:48'),
(33, 9, 1, NULL, 1, 1, '2019-12-12', 'jjlkj', '2019-12-01 19:50:42'),
(34, 9, 1, NULL, 1, 1, '2019-12-18', 'Alert eu lhe invoco!', '2019-12-01 19:53:10'),
(35, 9, 1, NULL, 1, 1, '2019-12-12', 'jjj,n,nm,mn', '2019-12-01 19:54:09'),
(36, 9, 1, NULL, 1, 1, '2019-12-18', 'hkkjhj', '2019-12-01 19:57:14'),
(40, 9, 1, NULL, 1, 1, '2019-12-25', 'Todas as verificações de formulário feitas', '2019-12-01 21:16:09'),
(47, 9, 2, NULL, 1, 1, '2019-12-30', 'sddf', '2019-12-01 22:57:27'),
(48, 9, 1, NULL, 1, 1, '2019-12-16', 'ssdsfdf', '2019-12-01 23:15:52'),
(49, 9, 1, NULL, 1, 1, '2019-12-16', 'ssdsfdf', '2019-12-01 23:15:52'),
(50, 9, 1, 1, 1, 1, '2019-12-24', 'kjhjl,', '2019-12-01 23:16:39'),
(51, 9, 1, 1, 1, 1, '2019-12-24', 'kjhjl,', '2019-12-01 23:16:39'),
(52, 9, 2, 1, 1, 1, '2019-12-25', 'sjassjaja', '2019-12-01 23:18:04'),
(53, 9, 2, 1, 1, 1, '2019-12-25', 'sjassjaja', '2019-12-01 23:18:23'),
(54, 9, 2, 1, 1, 1, '2019-12-25', 'sjassjaja', '2019-12-01 23:18:35'),
(55, 9, 2, NULL, 1, 1, '2019-12-25', 'jjn,mn,m,', '2019-12-01 23:19:07'),
(56, 9, 2, NULL, 1, 1, '2019-12-27', 'jjn,mn,m,', '2019-12-01 23:19:07'),
(57, 9, 2, NULL, 1, 1, '2019-12-27', 'jjn,mn,m,', '2019-12-01 23:19:08'),
(58, 9, NULL, 1, 1, 1, '2019-12-25', 'Por que tá registrando vários?', '2019-12-01 23:23:07'),
(59, 9, NULL, 1, 1, 1, '2019-12-27', 'Por que tá registrando vários?', '2019-12-01 23:23:07'),
(60, 9, NULL, 1, 1, 1, '2019-12-27', 'Por que tá registrando vários?', '2019-12-01 23:23:07'),
(61, 9, NULL, 1, 1, 1, '2019-12-24', 'Por que tá registrando vários?', '2019-12-01 23:23:07'),
(62, 9, NULL, 1, 1, 1, '2019-12-24', 'Por que tá registrando vários?', '2019-12-01 23:23:07'),
(63, 9, NULL, 1, 1, 1, '2019-12-24', 'Por que tá registrando vários?', '2019-12-01 23:23:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `sala_id` int(11) NOT NULL,
  `sala_nome` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`sala_id`, `sala_nome`) VALUES
(1, 'Sala 15'),
(2, 'Laboratório 30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`class_id`, `class_name`) VALUES
(1, '3° Informática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_name`) VALUES
(9, 'Chefia'),
(10, 'Sagumu'),
(13, 'All Might'),
(14, 'Midoriya'),
(15, 'clara');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`hora_id`);

--
-- Índices para tabela `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`mat_id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `sala_fk` (`sala_fk`),
  ADD KEY `mat_fk` (`mat_fk`),
  ADD KEY `hora_fk` (`hora_fk`),
  ADD KEY `class_fk` (`class_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`sala_id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`class_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `hora_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `sala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`sala_fk`) REFERENCES `salas` (`sala_id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`mat_fk`) REFERENCES `materiais` (`mat_id`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`hora_fk`) REFERENCES `horarios` (`hora_id`),
  ADD CONSTRAINT `reservas_ibfk_4` FOREIGN KEY (`class_fk`) REFERENCES `turmas` (`class_id`),
  ADD CONSTRAINT `reservas_ibfk_5` FOREIGN KEY (`user_fk`) REFERENCES `usuarios` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
