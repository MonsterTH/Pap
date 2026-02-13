-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13-Fev-2026 às 13:37
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
  `Name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Type` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Start_date` date NOT NULL,
  `Id_winner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `Email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Creation` date DEFAULT NULL,
  `Photo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`Email`, `Username`, `Password`, `Creation`, `Photo`) VALUES
('123456789987654321@gmail.com', '123456789', '$2y$10$jAC9OfKXzMUgJLxwuPcL3.Q0.M6LknzpH2Yp6DwKmFIVp4dQxdDV2', '2026-02-01', 'Image.png'),
('98765432123456789@gmail.com', '12345678987654321', '$2y$10$/K4mctizMtnt5MOcyITnB.xzgGeYicz/bomvZ3pw7oZ5C7mOaPIpu', '2026-02-01', 'Image.png'),
('Admin@gmail.com', 'Admin1', '$2y$10$QTrCOS6phNfvMma1fugnOO2OSUmh5zpN6LTsrNZ.WOwBvuo952mpK', '2026-02-01', 'Image.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bounty`
--

CREATE TABLE `bounty` (
  `Id` int NOT NULL,
  `Id_player` int NOT NULL,
  `Id_target` int NOT NULL,
  `Completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eviction`
--

CREATE TABLE `eviction` (
  `Id_player` int NOT NULL,
  `Email_user` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `Id` int NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text COLLATE utf8mb4_general_ci NOT NULL,
  `Date` date NOT NULL,
  `Image` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `Genre` varchar(12) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`Id`, `Title`, `Description`, `Date`, `Image`, `Genre`) VALUES
(4, 'Yang mata uma Criança Outra Vez?????', 'What the actual fuck yang', '2026-02-06', 'Image.png', 'DE'),
(5, 'Yang Joga Genshin Impact?', 'Sigma...', '2026-02-06', 'Image.png', 'MV'),
(6, 'Yang Joga Honkai Star Rail??', 'Sigma...', '2026-02-06', 'Image.png', 'DR'),
(7, 'Yang Joga ZZZ??', 'Gooner...', '2026-02-06', 'Image.png', 'NC'),
(8, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(9, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(10, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(11, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(12, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(13, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(14, 'Test De OverFlow Tuff', 'Sigma...', '2026-02-06', 'Image.png', 'NC'),
(15, 'Yang Gosta De Deepwoken', 'Block parry & Dodge', '2026-03-07', 'Image.png', 'MV');

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
  `Name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `About` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Photo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `players`
--

INSERT INTO `players` (`Id`, `Name`, `Birth_date`, `About`, `Photo`) VALUES
(7, 'AlunoFodastico123123', '2025-07-01', '123456789876543212345678987654321234567899876543212345678987654321', 'Imagem.png'),
(8, '1232131231', '1006-06-30', '1345t678765432', 'Imagem.png'),
(9, '1232131231', '1006-06-30', '1345t678765432', 'Imagem.png'),
(10, '1232131231', '1006-06-30', '1345t678765432', 'Imagem.png'),
(11, '1232131231', '1006-06-30', '1345t678765432', 'Imagem.png'),
(12, '1232131231', '1006-06-30', '1345t678765432', 'Imagem.png'),
(13, '1232131231', '1006-06-30', '1345t678765432', 'Imagem.png'),
(14, 'olha 3::', '7673-07-06', 'fgh_fd', 'Imagem.png'),
(15, 'Francisco Mora Yang', '2001-12-08', 'Jogador Semi-Profissional de Genshin Impact,', 'Imagem.png'),
(16, 'Francisco Mora Yang', '2001-12-08', 'Jogador Semi-Profissional de Genshin Impact, Top 1 Global: Gooner, Treinador Amador de Cavalos e Incapaz de queimar ovo mexido', 'Imagem.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `Id` int NOT NULL,
  `Email_User` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `Content` text COLLATE utf8mb4_general_ci NOT NULL,
  `Image` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_coments`
--

CREATE TABLE `post_coments` (
  `Id` int NOT NULL,
  `Email_User` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_Post` int NOT NULL,
  `Content` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_likes`
--

CREATE TABLE `post_likes` (
  `Id_Post` int NOT NULL,
  `Email_User` varchar(120) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seasons`
--

CREATE TABLE `seasons` (
  `Id` int NOT NULL,
  `Name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_winner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `Email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Creation` date NOT NULL,
  `Photo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`Email`, `Username`, `Password`, `Creation`, `Photo`) VALUES
('123456789@gmail.com', '1234567', '$2y$10$VYQP88XxhYDoMdUwHIbrGuOd9olwiVnCLTulwS/o2VxnREvnR6gTC', '2026-02-11', 'Image.png'),
('fs3$#$#Ds_wcom@gmail.com', 'Fella', '$2y$10$4GogSUHRz7.cQoKmGE7pk.wOKJStaA14X90JSrNHWADsnBNj5xKpO', '2026-02-02', 'Image.png'),
('NovaContra@gmail.com', 'teste123', '$2y$10$AD6mYLh/2rAFnHszVIqWCev/O6y0MgfRQv2hQhiz0vBB9L8GK87VC', '2026-02-10', 'Image.png'),
('qingyunyang8888@gmail.com', 'Francisco', '$2y$10$x0mnBYG0EI2735ufoREAd.odY1PW.UZ.VXq28BsN1dcOx2q9zTnwG', '2026-02-19', 'Image.png'),
('qingyunyang@gmail.com', 'Yang', '$2y$10$IES//Sj6szD6wYKmpX1r.e1QKmWq53kZudJ6WTzBrliwTVIERQb3e', '2026-02-01', 'Image.png'),
('TheGnorpApologue@gmail.com', 'Gnorp', '$2y$10$m/klZyOVOzWUn3lX.IOZs.xof663ervyJCLCvaWLPWuDwYtim5gb.', '2026-02-02', 'Image.png');

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
  ADD PRIMARY KEY (`Email`);

--
-- Índices para tabela `bounty`
--
ALTER TABLE `bounty`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_player` (`Id_player`,`Id_target`),
  ADD KEY `id_target` (`Id_target`);

--
-- Índices para tabela `eviction`
--
ALTER TABLE `eviction`
  ADD KEY `id_player` (`Id_player`),
  ADD KEY `Email_user` (`Email_user`);

--
-- Índices para tabela `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`);

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
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_User` (`Email_User`),
  ADD UNIQUE KEY `Id_User_2` (`Email_User`),
  ADD KEY `Id_User_3` (`Email_User`);

--
-- Índices para tabela `post_coments`
--
ALTER TABLE `post_coments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Post` (`Id_Post`),
  ADD KEY `Id_User` (`Email_User`);

--
-- Índices para tabela `post_likes`
--
ALTER TABLE `post_likes`
  ADD KEY `Id_Post` (`Id_Post`,`Email_User`),
  ADD KEY `Email_User` (`Email_User`);

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
-- AUTO_INCREMENT de tabela `news`
--
ALTER TABLE `news`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
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
  ADD CONSTRAINT `bounty_ibfk_2` FOREIGN KEY (`Id_target`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `eviction`
--
ALTER TABLE `eviction`
  ADD CONSTRAINT `eviction_ibfk_1` FOREIGN KEY (`Id_player`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eviction_ibfk_2` FOREIGN KEY (`Email_user`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `player-seasons`
--
ALTER TABLE `player-seasons`
  ADD CONSTRAINT `player-seasons_ibfk_1` FOREIGN KEY (`Id_season`) REFERENCES `seasons` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player-seasons_ibfk_2` FOREIGN KEY (`Id_player`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `post_coments` (`Id_Post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`Email_User`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `post_coments`
--
ALTER TABLE `post_coments`
  ADD CONSTRAINT `post_coments_ibfk_1` FOREIGN KEY (`Email_User`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`Id_Post`) REFERENCES `posts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`Email_User`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`Id_winner`) REFERENCES `players` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
