-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 05-Jun-2023 às 14:09
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `akaiito`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

CREATE TABLE `anunciante` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`id`, `username`, `data_nasc`, `full_name`, `password`, `usertype`) VALUES
(1, 'Claudete', '2012-12-06', 'Claudete Ramos', 'Clau1234', 'anunciante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `legenda` varchar(150) NOT NULL,
  `URL` varchar(300) NOT NULL,
  `id_user` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `story_chapter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `forum`
--

INSERT INTO `forum` (`id`, `comentario`, `id_user`, `user_name`, `story_chapter`) VALUES
(1, 'Adorei esse capítulo!!!', 2, 'jogadorzinho', 1),
(2, 'Esse foi melhor que o primeiro :p', 2, 'jogadorzinho', 2),
(3, 'A historia esta ficando incrivel', 3, 'vinizinho', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `story_progress` int(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`id`, `username`, `data_nasc`, `full_name`, `password`, `story_progress`, `usertype`) VALUES
(2, 'jogadorzinho', '2012-12-07', 'Juca Junior', 'Juca1234', NULL, 'player'),
(3, 'vinizinho', '2012-12-11', 'Vini Ian', 'Vini1234', NULL, 'player');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`id`) VALUES
('admin'),
('anunciante'),
('player');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_adm`
--

CREATE TABLE `user_adm` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anuncio_ibfk_5` (`id_user`);

--
-- Índices para tabela `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- Índices para tabela `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_adm`
--
ALTER TABLE `user_adm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anunciante`
--
ALTER TABLE `anunciante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user_adm`
--
ALTER TABLE `user_adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anunciante`
--
ALTER TABLE `anunciante`
  ADD CONSTRAINT `anunciante_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `tipo_de_usuario` (`id`);

--
-- Limitadores para a tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncio_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `anunciante` (`id`);

--
-- Limitadores para a tabela `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `jogador` (`id`);

--
-- Limitadores para a tabela `jogador`
--
ALTER TABLE `jogador`
  ADD CONSTRAINT `jogador_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `tipo_de_usuario` (`id`);

--
-- Limitadores para a tabela `user_adm`
--
ALTER TABLE `user_adm`
  ADD CONSTRAINT `user_adm_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `tipo_de_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
