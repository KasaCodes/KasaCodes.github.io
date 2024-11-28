-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/11/2024 às 13:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_mta`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `id_aluno` int(11) NOT NULL,
  `nm_aluno` varchar(55) NOT NULL,
  `email_aluno` varchar(120) NOT NULL,
  `tel_aluno` varchar(16) NOT NULL,
  `senha_aluno` varchar(250) NOT NULL,
  `cpf_aluno` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_aluno`, `nm_aluno`, `email_aluno`, `tel_aluno`, `senha_aluno`, `cpf_aluno`) VALUES
(1, 'Luiz', 'luiz2000@gmail.com', '123456789', 'luiz2000', '1324567'),
(2, 'Tilapia', 'HGSHSDGHDSG@gmail.com', '6767767868', 'ababab', '463423243'),
(3, 'a', 'lucas@gmail.com', '456789', 'lucas', 'fgdgd'),
(4, 'pisai', 'killerpsycho132@gmail.com', '437837', '1405seg', '1721872'),
(5, 'Luiz', 'test1e@gmail.com', '213213', 'TESTE', '2132456'),
(6, 'p', 'p@gmai.com', '3213', 'p', '131'),
(7, 'Kasa', 'kasa@gmail.com', '123456789', 'kasa', ''),
(8, 'Rafael', 'rafael@gmail.com', '4568794', '$2y$10$9Htyj1Lc4j9FkNeYZRnP5.Wj.7d9hhm8oKIhTqE2ON3b93KsN/uQi', ''),
(11, '<script>Olá Mundo</script>', 'agdyad@gmail.com', '123465', '12', ''),
(14, 'Anteteguemon', 'uniaoanteteguemon@gmail.com', '485555555555', 'abcd', ''),
(15, 'Vitor', 'vitor@gmail.com', '49646', '', ''),
(16, 'Glauber', 'glauber@gmail.com', '4840824922', 'glauber', ''),
(17, 'Vitor', '', '6465465465', 'vitor', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_exercicios`
--

CREATE TABLE `tb_exercicios` (
  `id_exercicio` int(11) NOT NULL,
  `nm_exercicio` varchar(255) NOT NULL,
  `exercicio_tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_exercicios`
--

INSERT INTO `tb_exercicios` (`id_exercicio`, `nm_exercicio`, `exercicio_tipo_id`) VALUES
(1, 'Supino Reto com Barra', 1),
(2, 'Supino inclinado com Barra', 1),
(3, 'Supino declinado com Barra', 1),
(5, 'Remada Curvada', 2),
(7, 'Crucifixo Invertido Inclinado', 2),
(8, 'Elavação de Braços', 2),
(9, 'Flexão de Braço Inclinada', 2),
(10, 'Superman', 2),
(11, 'Prancha', 2),
(12, 'Flexão de Braço', 4),
(13, 'Rosca Materlo', 4),
(14, 'Rosca Direta', 4),
(15, 'Rosca Direta Sentado', 4),
(16, 'Prança de Antebraço', 4),
(17, 'Tríceps Corda', 5),
(18, 'Tríceps Testa', 5),
(19, 'Mergulho em Barras Paralelas', 5),
(20, 'Pulley', 5),
(21, 'Tríceps Coice com Halter', 5),
(22, 'Tríceps Coice na Polia', 5),
(23, 'Tríceps Francês', 5),
(24, 'Desenvolvimento de Ombro', 3),
(25, 'Elevação Lateral', 3),
(26, 'Elevação Frontal', 3),
(27, 'Remada Alta', 3),
(28, 'Crucifixo Inverso', 3),
(29, 'Desenvolvimento com Barras', 3),
(30, 'Desenvolvimento com Halteres', 3),
(31, 'Desenvolvimento com Arnold', 3),
(32, 'Elevação lateral na Polia', 3),
(33, 'Face Pull', 3),
(34, 'Circundação de Ombros', 1),
(35, 'Press com Cabos', 1),
(36, 'Crucicifio Reto', 1),
(37, 'Voador Peitoral', 1),
(38, 'Crucufio no Cross Over', 1),
(39, 'Supino na Maquina', 1),
(40, 'Mergulho em Barras', 1),
(41, 'Barra Fixa Pegada Fechada', 2),
(42, 'Remada Unilateral ', 2),
(43, 'Remada na Maquina de Cabos', 2),
(44, 'Pullover', 2),
(45, 'Rosca Alta no Cabo', 4),
(46, 'Barra Fixa Supinada', 4),
(47, 'Rosca Barra EZ', 4),
(48, 'Rosca Scott', 4),
(49, 'Rosca Concentrada', 4),
(50, 'teste', 7),
(51, 'teste1', 8),
(52, 'teste2\r\n', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_exer_aluno`
--

CREATE TABLE `tb_exer_aluno` (
  `id_exer_aluno` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `exercicio_id` int(11) NOT NULL,
  `nm_exercicio` varchar(55) NOT NULL,
  `num_series` int(11) NOT NULL,
  `num_repeticoes` int(11) NOT NULL,
  `tem_descanso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_exer_aluno`
--

INSERT INTO `tb_exer_aluno` (`id_exer_aluno`, `aluno_id`, `exercicio_id`, `nm_exercicio`, `num_series`, `num_repeticoes`, `tem_descanso`) VALUES
(1, 3, 37, 'Voador Peitoral', 1, 5, '20'),
(2, 3, 2, 'Supino inclinado com Barra', 4, 12, '30'),
(3, 3, 36, 'Crucicifio Reto', 1, 10, '20'),
(4, 3, 37, 'Voador Peitoral', 1, 5, '20'),
(5, 3, 34, 'Circundação de Ombros', 1, 5, '40'),
(6, 3, 3, 'Supino declinado com Barra', 1, 5, '20'),
(7, 0, 14, 'Rosca Direta', 1, 5, '20'),
(8, 0, 14, 'Rosca Direta', 1, 5, '20'),
(9, 0, 46, 'Barra Fixa Supinada', 1, 5, '20'),
(10, 3, 16, 'Prança de Antebraço', 1, 5, '45'),
(11, 3, 3, 'Supino declinado com Barra', 1, 5, '20'),
(14, 3, 18, 'Tríceps Testa', 1, 5, '20'),
(15, 3, 34, 'Circundação de Ombros', 4, 10, '40'),
(16, 3, 35, 'Press com Cabos', 1, 5, '20'),
(17, 3, 9, 'Flexão de Braço Inclinada', 1, 5, '20'),
(18, 3, 45, 'Rosca Alta no Cabo', 1, 5, '20'),
(19, 3, 36, 'Crucicifio Reto', 1, 5, '20'),
(20, 3, 41, 'Barra Fixa Pegada Fechada', 1, 5, '20'),
(22, 3, 18, 'Tríceps Testa', 1, 5, '20'),
(23, 3, 46, 'Barra Fixa Supinada', 1, 5, '20'),
(26, 11, 10, 'Superman', 1, 5, '20'),
(27, 11, 29, 'Desenvolvimento com Barras', 1, 5, '20'),
(28, 11, 51, 'teste1', 1, 5, '20'),
(29, 11, 23, 'Tríceps Francês', 1, 5, '20'),
(30, 11, 46, 'Barra Fixa Supinada', 1, 5, '20'),
(31, 11, 52, 'teste2\r\n', 1, 5, '20'),
(32, 11, 50, 'teste', 1, 5, '20'),
(34, 14, 36, 'Crucicifio Reto', 1, 5, '20'),
(35, 14, 7, 'Crucifixo Invertido Inclinado', 1, 5, '20'),
(36, 14, 2, 'Supino inclinado com Barra', 1, 5, '20'),
(37, 3, 10, 'Superman', 1, 5, '20'),
(38, 3, 10, 'Superman', 1, 5, '20'),
(39, 3, 36, 'Crucicifio Reto', 1, 5, '20'),
(41, 16, 3, 'Supino declinado com Barra', 1, 5, '20'),
(43, 16, 31, 'Desenvolvimento com Arnold', 1, 5, '20'),
(44, 16, 51, 'teste1', 1, 5, '20'),
(45, 16, 21, 'Tríceps Coice com Halter', 1, 5, '20'),
(46, 16, 15, 'Rosca Direta Sentado', 1, 5, '20'),
(47, 16, 52, 'teste2\r\n', 1, 5, '20'),
(48, 16, 50, 'teste', 1, 5, '20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipo_exer`
--

CREATE TABLE `tb_tipo_exer` (
  `id_tipo_exer` int(11) NOT NULL,
  `nm_tipo_exer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_tipo_exer`
--

INSERT INTO `tb_tipo_exer` (`id_tipo_exer`, `nm_tipo_exer`) VALUES
(1, 'Peitoral'),
(2, 'Costas'),
(3, 'Ombros'),
(4, 'Biceps'),
(5, 'triceps'),
(7, 'Sem Equipamento'),
(8, 'Cardio'),
(9, 'Pernas');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `tb_exercicios`
--
ALTER TABLE `tb_exercicios`
  ADD PRIMARY KEY (`id_exercicio`),
  ADD KEY `exercicio_tipo_id` (`exercicio_tipo_id`);

--
-- Índices de tabela `tb_exer_aluno`
--
ALTER TABLE `tb_exer_aluno`
  ADD PRIMARY KEY (`id_exer_aluno`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `exercicio_id` (`exercicio_id`);

--
-- Índices de tabela `tb_tipo_exer`
--
ALTER TABLE `tb_tipo_exer`
  ADD PRIMARY KEY (`id_tipo_exer`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_exercicios`
--
ALTER TABLE `tb_exercicios`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tb_exer_aluno`
--
ALTER TABLE `tb_exer_aluno`
  MODIFY `id_exer_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tb_tipo_exer`
--
ALTER TABLE `tb_tipo_exer`
  MODIFY `id_tipo_exer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_exercicios`
--
ALTER TABLE `tb_exercicios`
  ADD CONSTRAINT `exercicio_tipo_id` FOREIGN KEY (`exercicio_tipo_id`) REFERENCES `tb_tipo_exer` (`id_tipo_exer`);

--
-- Restrições para tabelas `tb_exer_aluno`
--
ALTER TABLE `tb_exer_aluno`
  ADD CONSTRAINT `tb_exer_aluno_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `tb_aluno` (`id_aluno`),
  ADD CONSTRAINT `tb_exer_aluno_ibfk_2` FOREIGN KEY (`exercicio_id`) REFERENCES `tb_exercicios` (`id_exercicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
