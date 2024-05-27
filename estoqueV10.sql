-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2024 às 02:39
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
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `companies`
--

CREATE TABLE `companies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `nfe_number` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `companies`
--

INSERT INTO `companies` (`id`, `name`, `nfe_number`) VALUES
(1, 'Studio Color', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cellphone` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `zipcode` varchar(12) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `number` varchar(8) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `complement` varchar(100) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  `soft_delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `rg`, `cpf`, `email`, `cellphone`, `phone`, `zipcode`, `street`, `number`, `district`, `city`, `state`, `complement`, `company_id`, `soft_delete`) VALUES
(3, 'Gustavo Alves da Silva', '48.050.443-x', '404.310.328-07', 'gustavoalvesdasilva@outlook.com', '(11) 99653-1308', '(11) 4679-', '08544-100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', 'SP', 'Perto do CAIC', 0, 1),
(4, 'Editado', 'Editado', 'Editado', 'editao@editado.com', 'Editado', 'editado', 'Editado', 'Editado', 'Editado', 'Editado', 'Editado', 'Editado', 'Editado', 1, 1),
(5, 'Gustavo Editado', '11.111.111-2', '111.111.111-11', 'gustavoalvesdasilva@outlook.com', '(11) 999999-9999', '(11) 4444-4444', '01310-100', 'Avenida Paulista', '12', 'Bela Vista', 'São Paulo', 'SP', 'Perto do MASP', 1, 1),
(6, 'Gustavo Alves da Silva', '11.111.111-1', '111.111.111-11', 'gustavoalvesdasilva@outlook.com', '(11) 99999-9999', '(11) 4444-4444', '01310-100', 'Avenida Paulista', '121', 'Bela Vista', 'São Paulo', 'SP', 'Perto do MASP', 1, 1),
(7, 'Maria das Dores', '22.222.222-2', '222.222.222-22', 'maria@dores.com', '(11) 22222-2222', '(11) 4444-4444', '05501-970', 'Rua Desembargador Armando Fairbanks', '321', 'Butantã', 'São Paulo', 'SP', 'Perto do Instituto Butantan', 1, 1),
(8, 'Fernando Editado', '33.333.333-3', '333.333.333-33', 'fernando@lopes.com', '(11) 99999-9999', '(11) 1234-5678', '08530-000', 'Rua Santos Dumont', '123', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto do Fórum', 1, 1),
(9, 'José da Silva', '55.555.555-55', '555.555.555-55', 'jose@gmail.com', '(11) 77777-7777', '(11) 6666-6666', '01310-100', 'Avenida Paulista', '121', 'Bela Vista', 'São Paulo', 'SP', 'Perto do MASP', 1, 1),
(10, 'Free Style Barbearia', '', '', 'freestylebarbearia@gmail.com', '(11) 97967-3235', '', '08501-100', 'Rua Paraibuna', '200', 'Sitio Paredão', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(11, 'Marimbondos Barbearia', '', '', '', '(11) 97113-4066', '', '08531030', 'Rua Armando da Fonseca', '108', 'Vila Panucce', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(12, 'Restaurante Del Rey', '', '', '', '', '(11) 4675-3235', '08530000', 'Rua Santos Dumont', '971', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(13, 'Mc Sales Seguros', '', '', '', '', '(11) 4674-0256', ' 08500-405', 'Avenida Quinze de Novembro', '375', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(14, 'L A Odontologia', '', '', '', '', '(11) 4676-6102', '08500-405', 'Avenida Quinze de Novembro', '398', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', 'Sala 1', 1, 1),
(15, 'Doutor dos Bichos', '', '', 'exames.drdosbichos@gmail.com', '', '(11) 4610-2200', '08500-340', 'Rua Antônio Trevisani', '235', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(16, 'PET SHOP CÃES & CIA', '', '', '', '', '', '08500-350', 'Avenida Deputado Pedro Fanganiello', '81', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(17, 'Restaurante Minha Flor', '', '', '', '(11) 96345-9934', '', '08500-110', 'Rua Getúlio Vargas', '27', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(18, 'Fênix Portões Automáticos', '', '', '', '(11) 95075-0422', '', '08501-000', 'Avenida Brasil', '811', 'Sitio Paredão', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(19, 'Fênix Portões Automáticos', '', '', '', '', '', '08501-000', 'Avenida Brasil', '811', 'Sitio Paredão', 'Ferraz de Vasconcelos', 'SP', '', 1, 1),
(20, 'Tele Esfihas', '', '', '', '98132-8606 / 97783-9966', '(11) 2053-9066', '08255-000', 'Avenida Nagib Farah Maluf', '1606', 'Conjunto Residencial José Bonifácio', 'São Paulo', 'SP', '', 1, 1),
(21, 'Açougue JB', '', '', '', '(11) 96185-6388', '2523-0081', '08255000', 'Avenida Nagib Farah Maluf', '1614', 'Conjunto Residencial José Bonifácio', 'São Paulo', 'SP', '', 1, 1),
(22, 'Passarela Fashion', '', '', '', '(11) 96348-7557', '', '08253-015', 'Avenida Nagib Farah Maluf', '1616', 'Conjunto Residencial José Bonifácio', 'São Paulo', 'SP', '', 1, 1),
(23, 'Pedro Cardoso Lemos', '12.324.321-x', '404.214.343.20', 'pedro@lemos.com', '(11) 12133-4321', '(11) 1234-3432', '08530-000', 'Rua Santos Dumont', '225', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto da Praia', 1, 0),
(24, 'Maria Silva', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(25, 'Fernanda Souza', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(26, 'Ribeiro Santos', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(27, 'Jovem Tranquilao', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(28, 'Gente Doida', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(29, 'Mais um exemplo', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(30, 'Vamos ver se rola', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(31, 'Gustavo Alves da Silva', '48.050.443-x', '404.310.328-07', 'gustavoalvesdasilva@outlook.com', '(11) 99653-1308', '(11) 4679-7017', '08544100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', 'SP', 'Perto do CAIC', 1, 1),
(32, 'Gustavo Alves da Silva', '48.050.443-x', '404.310.328-07', 'gustavoalvesdasilva@outlook.com', '(11) 99653-1308', '(11) 4679-7017', '08544100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', 'SP', 'Teste', 1, 1),
(33, 'Pedro Santos', '12.324.321-x', '404.214.343.20', 'pedro@lemos.com', '(11) 12133-4321', '(11) 1234-3432', '08530-000', 'Rua Santos Dumont', '225', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto da Praia', 1, 1),
(34, 'Pedro Santos', '12.324.321-x', '404.214.343.20', 'pedro@lemos.com', '(11) 7777-7777', '(11) 91234-5678', '08530-000', 'Rua Santos Dumont', '225', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto da Praia', 1, 0),
(35, 'Pedro Santos', '12.324.321-x', '404.214.343.20', 'pedro@lemos.com', '(11) 5555-5555', '(11) 1234-3432', '08530-000', 'Rua Santos Dumont', '225', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto da Praia', 1, 1),
(36, 'Gustavo Alves da Silva', '48050443x', '40431032807', 'gustavoalvesdasilva@outlook.com', '(11) 99653-1308', '(11) 4679-7017', '08544100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', 'SP', 'Perto do CAIC', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cod` varchar(30) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` float NOT NULL,
  `min_quantity` float NOT NULL,
  `company_id` int(11) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `cod`, `name`, `price`, `quantity`, `min_quantity`, `company_id`, `soft_delete`) VALUES
(11, '7891360507048', 'giz de cera faber castell c/ 15 cores', 14, 18, 10, 1, 1),
(12, '7897629204543', 'lapiseira 0.9 técnica', 11, 35, 35, 1, 1),
(13, '7896342411092', 'borracha branca mercur', 7, 25, 20, 1, 1),
(14, '121212', 'Doido', 12, 451, 12, 1, 1),
(15, '12121', 'Teste Decimal', 1, 45, 45, 1, 1),
(16, '3232', 'Mais decimal', 12, 12, 3, 1, 1),
(17, '23423432', 'TESTE NAMESPACE FINAL', 12, 43, 32, 1, 1),
(20, '534532', 'VINTE E CINCO', 12.25, 12, 12, 1, 1),
(21, '234532', 'CASA DOS MIL', 1325.58, 12, 12, 1, 1),
(22, '2920481821019', 'Bonca da Barbie 2023', 25, 18, 15, 0, 1),
(24, '12121', 'Outro', 12.25, 15, 12, 0, 1),
(25, '084843', 'Folha de Loro', 222.25, 12, 5, 1, 1),
(26, '4534534', 'Outra Coisa', 25.32, 12, 45, 1, 1),
(27, '32323', 'PRODUTO BOM', 25, 12, 5, 1, 1),
(28, '7897653512447', 'LÁPIS DE COR FABBER CASTELL 12 CORES', 12.25, 35, 40, 1, 0),
(29, '0074299057854', 'Carros - Hot Wheels - Sortimento MATTEL', 18, 25, 20, 1, 0),
(30, '78787877', 'Produto Sem Loucura', 22, 12, 5, 1, 0),
(31, '45454', 'OPA EDITEI', 25, 12, 23, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `providers`
--

INSERT INTO `providers` (`id`, `name`, `url`, `company_id`, `soft_delete`) VALUES
(1, 'KINGSTON', 'WWW.KINGSTON.COM', 1, 0),
(2, 'SEAGATE', 'WWW.SEAGATE.COM', 1, 0),
(3, 'CORSAIR', 'WWW.CORSAIR.COM', 1, 0),
(4, 'OLYMPUS', 'WWW.OLYMPUS.COM', 1, 0),
(5, 'FUTURAIM', 'https://futuraim.com.br', 1, 0),
(6, 'Atual Card', 'https://www.atualcard.com.br/', 0, 0),
(7, 'MINHA VÓ', 'MINHAVO.COM.BR', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_number` int(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `user_token` varchar(32) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `user_number`, `user_email`, `user_pass`, `user_token`, `company_id`) VALUES
(1, 123, 'gustavoalvesdasilva@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055', '94e96714a4fcbe39773708f7bdb9bd17', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `nivel_acesso` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `workers`
--

INSERT INTO `workers` (`id`, `nome`, `rg`, `cpf`, `email`, `celular`, `telefone`, `senha`, `cargo`, `nivel_acesso`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `complemento`, `estado`, `soft_delete`) VALUES
(1, 'Seu Pedro', '48.123.123-x', '404.404.404-04', 'seupedro@sistemas.com', '(11) 91111-1111', '(11) 4111-1111', '81dc9bdb52d04dc20036dbd8313ed055', 'Vila Santa Margarida', 'Usuário', '08544100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', '', 'SP', 0),
(2, 'Ricardo Santos', '11.111.111-x', '111.111.111-11', 'ricardo@santos.com', '(11) 91111-1111', '(11) 4111-1111', '202cb962ac59075b964b07152d234b70', 'Vila Ana Maria', 'Usuário', '08530-000', 'Rua Santos Dumont', '325', 'Vila Ana Maria', 'Ferraz de Vasconcelos', '', 'SP', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
