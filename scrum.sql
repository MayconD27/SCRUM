-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2022 às 02:01
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
  `descricao` text NOT NULL,
  `demandaConcluida` tinyint(4) NOT NULL,
  `demandaTotal` tinyint(4) NOT NULL,
  `dataSprint` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sprint`
--

INSERT INTO `sprint` (`id`, `usuario`, `sprint`, `descricao`, `demandaConcluida`, `demandaTotal`, `dataSprint`) VALUES
(14, 2, 'Karine', 'A Karine está explicando a curva ABC', 10, 20, '2022-10-20'),
(15, 2, 'Evaldo', 'Evaldo Está escutando a Karine', 10, 20, '2022-10-20'),
(16, 2, 'Maycon', 'ok', 12, 30, '2022-12-10'),
(17, 2, 'Sprint Grandona', 'asdadadsadsadadsadasdsa dslxsakdlsakdlçaskda dsdlksajdklasjda sakldajsdlka dklsajkdlasj sakdjkaslk dalksdjaslk dlksajdkla lakdjslk sldkjaslk laskjdsalk daskljdlas dklsakda klsadjas dakljd salkdajsl sdlkasj sldka sldksja adlkad salkdas askldaskl dlkasdjka askdja dkalsjdas askldjsa asdksaj asdklsa adkasjdaj adkjsalk daskldjasl daskdjasjd daklsdja kdsajdlas daskldjaks daksldjlka dasjdklaj dasjhdlkas dashd ahdslk', 10, 10, '2022-12-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(3, 'Rony', 'r@gmail', 'yu5NWAECkgt1oJ9WXF9eMw=='),
(4, 'Marina Rezende', 'mari@11', 'jeQXvkYdV1TR4XUqNGTWxA=='),
(5, 'Maycon', 'mds@12', 'aLU8IViiVwhQXmjvagMlgw=='),
(6, 'Maycon', 'md@11', '152ImlYpkGRpYMq3ry5i0A==');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
