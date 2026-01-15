-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Jan-2026 às 10:58
-- Versão do servidor: 8.0.44
-- versão do PHP: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dados: `base_show`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activities`
--

CREATE TABLE `activities` (
  `Id` int NOT NULL,
  `Name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `Type` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Start_date` date NOT NULL,
  `Id_winner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `Username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(120) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bounty`
--

CREATE TABLE `bounty` (
  `Id` int NOT NULL,
  `Id_player` int NOT NULL,
  `id_target` int NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eviction`
--

CREATE TABLE `eviction` (
  `id_player` int NOT NULL,
  `votes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `player-seasons`
--

CREATE TABLE `player-seasons` (
  `Id_season` int NOT NULL,
  `Id_player` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `players`
--

CREATE TABLE `players` (
  `Id` int NOT NULL,
  `Name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `About` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `Photo` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seasons`
--

CREATE TABLE `seasons` (
  `Id` int NOT NULL,
  `Name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `Year` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_winner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `Email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(120) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`Email`, `Username`, `Password`) VALUES
('qingyunyang8888@gmail.com', 'Francisco', '$2y$10$x0mnBYG0EI2735ufoREAd.odY1PW.UZ.VXq28BsN1dcOx2q9zTnwG'),
('qingyunyang@gmail.com', 'Francisco', '$2y$10$bwiak7ZG9BYkppp2DoRoD.5ObqhoL935sJa2Nvcp0oYE5qnA/LpKO');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_winner` (`Id_winner`);

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Username`);

--
-- Índices para tabela `bounty`
--
ALTER TABLE `bounty`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_player` (`Id_player`,`id_target`),
  ADD KEY `id_target` (`id_target`);

--
-- Índices para tabela `eviction`
--
ALTER TABLE `eviction`
  ADD KEY `id_player` (`id_player`);

--
-- Índices para tabela `player-seasons`
--
ALTER TABLE `player-seasons`
  ADD KEY `Id_season` (`Id_season`,`Id_player`),
  ADD KEY `Id_player` (`Id_player`);

--
-- Índices para tabela `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_winner` (`Id_winner`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activities`
--
ALTER TABLE `activities`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bounty`
--
ALTER TABLE `bounty`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seasons`
--
ALTER TABLE `seasons`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`Id_winner`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bounty`
--
ALTER TABLE `bounty`
  ADD CONSTRAINT `bounty_ibfk_1` FOREIGN KEY (`Id_player`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bounty_ibfk_2` FOREIGN KEY (`id_target`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `eviction`
--
ALTER TABLE `eviction`
  ADD CONSTRAINT `eviction_ibfk_1` FOREIGN KEY (`id_player`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `player-seasons`
--
ALTER TABLE `player-seasons`
  ADD CONSTRAINT `player-seasons_ibfk_1` FOREIGN KEY (`Id_season`) REFERENCES `seasons` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player-seasons_ibfk_2` FOREIGN KEY (`Id_player`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`Id_winner`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
