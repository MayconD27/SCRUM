-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2022 às 02:17
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
-- Banco de dados: `scrum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sprint`
--

CREATE TABLE `sprint` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `usuario` tinyint(3) UNSIGNED NOT NULL,
  `sprint` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `demandaConcluida` tinyint(4) NOT NULL,
  `demandaTotal` tinyint(4) NOT NULL,
  `dataSprint` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sprint`
--

INSERT INTO `sprint` (`id`, `usuario`, `sprint`, `descricao`, `demandaConcluida`, `demandaTotal`, `dataSprint`) VALUES
(14, 3, 'Karine', 'A Karine está explicando a curva ABC', 10, 20, '2022-10-20'),
(15, 3, 'Evaldo', 'Evaldo Está escutando a Karine', 10, 20, '2022-10-20'),
(17, 3, 'Sprint Grandona', 'asdadadsadsadadsadasdsa dslxsakdlsakdlçaskda dsdlksajdklasjda sakldajsdlka dklsajkdlasj sakdjkaslk dalksdjaslk dlksajdkla lakdjslk sldkjaslk laskjdsalk daskljdlas dklsakda klsadjas dakljd salkdajsl sdlkasj sldka sldksja adlkad salkdas askldaskl dlkasdjka ', 10, 10, '2022-12-13'),
(19, 6, 'sprint1', 'aa', 5, 14, '2022-11-10'),
(20, 6, '123', ' ', 8, 10, '2022-11-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(3, 'Rony', 'r@gmail', 'yu5NWAECkgt1oJ9WXF9eMw=='),
(5, 'Maycon', 'mds@12', 'aLU8IViiVwhQXmjvagMlgw=='),
(6, 'Maycon', 'md@11', '152ImlYpkGRpYMq3ry5i0A==');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioFK` (`usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sprint`
--
ALTER TABLE `sprint`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `usuarioFK` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
