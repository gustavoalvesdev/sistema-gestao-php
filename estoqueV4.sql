-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2023 às 01:27
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `compeny_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `compeny_id`) VALUES
(1, 'PAPELARIA', 1),
(2, 'BRINQUEDOS', 1),
(3, 'PERFUMARIA', 1),
(4, 'BEBIDAS', 1),
(5, 'TESTE', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'MOGI DAS CRUZES', 25),
(2, 'ITAPECIRICA DA SERRA', 25),
(3, 'RIO BRANCO', 1),
(4, 'CAMPO GRANDE', 19),
(5, 'FERRAZ DE VASCONCELOS', 25);

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
  `category` varchar(100) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  `soft_delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `rg`, `cpf`, `email`, `cellphone`, `phone`, `zipcode`, `street`, `number`, `district`, `city`, `state`, `complement`, `category`, `company_id`, `soft_delete`) VALUES
(3, 'Gustavo Alves da Silva', '48.050.443-x', '404.310.328-07', 'gustavoalvesdasilva@outlook.com', '(11) 99653-1308', '(11) 4679-', '08544-100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', 'SP', 'Perto do CAIC', NULL, 0, 1),
(4, 'Editado', 'Editado', 'Editado', 'editao@editado.com', 'Editado', 'editado', 'Editado', 'Editado', 'Editado', 'Editado', 'Editado', 'Editado', 'Editado', NULL, 1, 1),
(5, 'Gustavo Editado', '11.111.111-2', '111.111.111-11', 'gustavoalvesdasilva@outlook.com', '(11) 999999-9999', '(11) 4444-4444', '01310-100', 'Avenida Paulista', '12', 'Bela Vista', 'São Paulo', 'SP', 'Perto do MASP', NULL, 1, 1),
(6, 'Gustavo Alves da Silva', '11.111.111-1', '111.111.111-11', 'gustavoalvesdasilva@outlook.com', '(11) 99999-9999', '(11) 4444-4444', '01310-100', 'Avenida Paulista', '121', 'Bela Vista', 'São Paulo', 'SP', 'Perto do MASP', NULL, 1, 1),
(7, 'Maria das Dores', '22.222.222-2', '222.222.222-22', 'maria@dores.com', '(11) 22222-2222', '(11) 4444-4444', '05501-970', 'Rua Desembargador Armando Fairbanks', '321', 'Butantã', 'São Paulo', 'SP', 'Perto do Instituto Butantan', NULL, 1, 1),
(8, 'Fernando Editado', '33.333.333-3', '333.333.333-33', 'fernando@lopes.com', '(11) 99999-9999', '(11) 1234-5678', '08530-000', 'Rua Santos Dumont', '123', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto do Fórum', NULL, 1, 1),
(9, 'José da Silva', '55.555.555-55', '555.555.555-55', 'jose@gmail.com', '(11) 77777-7777', '(11) 6666-6666', '01310-100', 'Avenida Paulista', '121', 'Bela Vista', 'São Paulo', 'SP', 'Perto do MASP', NULL, 1, 1),
(10, 'Free Style Barbearia', '', '', 'freestylebarbearia@gmail.com', '(11) 97967-3235', '', '08501-100', 'Rua Paraibuna', '200', 'Sitio Paredão', 'Ferraz de Vasconcelos', 'SP', '', 'Barbearias', 1, 1),
(11, 'Marimbondos Barbearia', '', '', '', '(11) 97113-4066', '', '08531030', 'Rua Armando da Fonseca', '108', 'Vila Panucce', 'Ferraz de Vasconcelos', 'SP', '', 'Barbearias', 1, 1),
(12, 'Restaurante Del Rey', '', '', '', '', '(11) 4675-3235', '08530000', 'Rua Santos Dumont', '971', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', '', 'Restaurantes', 1, 1),
(13, 'Mc Sales Seguros', '', '', '', '', '(11) 4674-0256', ' 08500-405', 'Avenida Quinze de Novembro', '375', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 'Seguros', 1, 1),
(14, 'L A Odontologia', '', '', '', '', '(11) 4676-6102', '08500-405', 'Avenida Quinze de Novembro', '398', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', 'Sala 1', 'Dentistas', 1, 1),
(15, 'Doutor dos Bichos', '', '', 'exames.drdosbichos@gmail.com', '', '(11) 4610-2200', '08500-340', 'Rua Antônio Trevisani', '235', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 'Veterinários', 1, 1),
(16, 'PET SHOP CÃES & CIA', '', '', '', '', '', '08500-350', 'Avenida Deputado Pedro Fanganiello', '81', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 'Pet Shops', 1, 1),
(17, 'Restaurante Minha Flor', '', '', '', '(11) 96345-9934', '', '08500-110', 'Rua Getúlio Vargas', '27', 'Vila Romanópolis', 'Ferraz de Vasconcelos', 'SP', '', 'Restaurantes', 1, 1),
(18, 'Fênix Portões Automáticos', '', '', '', '(11) 95075-0422', '', '08501-000', 'Avenida Brasil', '811', 'Sitio Paredão', 'Ferraz de Vasconcelos', 'SP', '', 'Serralherias', 1, 1),
(19, 'Fênix Portões Automáticos', '', '', '', '', '', '08501-000', 'Avenida Brasil', '811', 'Sitio Paredão', 'Ferraz de Vasconcelos', 'SP', '', 'Serralherias', 1, 1),
(20, 'Tele Esfihas', '', '', '', '98132-8606 / 97783-9966', '(11) 2053-9066', '08255-000', 'Avenida Nagib Farah Maluf', '1606', 'Conjunto Residencial José Bonifácio', 'São Paulo', 'SP', '', 'Lanchonetes', 1, 1),
(21, 'Açougue JB', '', '', '', '(11) 96185-6388', '2523-0081', '08255000', 'Avenida Nagib Farah Maluf', '1614', 'Conjunto Residencial José Bonifácio', 'São Paulo', 'SP', '', 'Açougues', 1, 1),
(22, 'Passarela Fashion', '', '', '', '(11) 96348-7557', '', '08253-015', 'Avenida Nagib Farah Maluf', '1616', 'Conjunto Residencial José Bonifácio', 'São Paulo', 'SP', '', 'Roupas e Acessórios', 1, 1),
(23, 'Pedro Cardoso Lemos', '12.324.321-x', '404.214.343.20', 'pedro@lemos.com', '(11) 12133-4321', '(1!) 1234-3432', '08530-000', 'Rua Santos Dumont', '225', 'Vila Ana Maria', 'Ferraz de Vasconcelos', 'SP', 'Perto da Praia', '', 1, 0),
(24, 'Maria Silva', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(25, 'Fernanda Souza', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(26, 'Ribeiro Santos', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(27, 'Jovem Tranquilao', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(28, 'Gente Doida', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(29, 'Mais um exemplo', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(30, 'Vamos ver se rola', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0);

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
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `cod`, `name`, `price`, `quantity`, `min_quantity`, `category_id`, `subcategory_id`, `company_id`, `soft_delete`) VALUES
(10, '7891360615194', 'Lápis de cor faber castell 12 cores', 2, 7, 3, 1, 1, 1, 1),
(11, '7891360507048', 'giz de cera faber castell c/ 15 cores', 14, 18, 10, 1, 1, 1, 1),
(12, '7897629204543', 'lapiseira 0.9 técnica', 11, 35, 35, 1, 1, 1, 1),
(13, '7896342411092', 'borracha branca mercur', 7, 25, 20, 1, 2, 1, 1),
(14, '121212', 'Sem Subcategoria', 12, 451, 12, 1, 0, 1, 1),
(15, '12121', 'Teste Decimal', 1, 45, 45, 4, 9, 1, 1),
(16, '3232', 'Mais decimal', 12, 12, 3, 2, 5, 1, 1),
(17, '23423432', 'TESTE NAMESPACE FINAL', 12, 43, 32, 5, 11, 1, 1),
(18, '32323', 'ACTIVE RECORD', 12, 12, 12, 2, 6, 1, 1),
(19, '23242', 'VÍRGULA', 12.24, 12, 5, 2, 6, 1, 1),
(20, '534532', 'VINTE E CINCO', 12.25, 12, 12, 5, 11, 1, 1),
(21, '234532', 'CASA DOS MIL', 1325.58, 12, 12, 3, 8, 1, 1),
(22, '2920481821019', 'Bonca da Barbie 2023', 25, 18, 15, 2, 5, 0, 1),
(23, '353342', 'Barra de Chocolate Arcor', 35, 26, 12, 5, 11, 0, 1),
(24, '12121', 'Outro', 12.25, 15, 12, 3, 7, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `providers`
--

INSERT INTO `providers` (`id`, `name`, `url`, `company_id`) VALUES
(1, 'KINGSTON', 'WWW.KINGSTON.COM', 1),
(2, 'SEAGATE', 'WWW.SEAGATE.COM', 1),
(3, 'CORSAIR', 'WWW.CORSAIR.COM', 1),
(4, 'OLYMPUS', 'WWW.OLYMPUS.COM', 1),
(5, 'FUTURAIM', 'https://futuraim.com.br', 1),
(6, 'Atual Card', 'https://www.atualcard.com.br/', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `states`
--

INSERT INTO `states` (`id`, `name`, `fu`) VALUES
(1, 'ACRE', 'AC'),
(2, 'ALAGOAS', 'AL'),
(3, 'AMAPÁ', 'AP'),
(4, 'AMAZONAS', 'AM'),
(5, 'BAHIA', 'BA'),
(6, 'CEARÁ', 'CE'),
(7, 'DISTRITO FEDERAL', 'DF'),
(8, 'ESPÍRITO SANTO', 'ES'),
(9, 'GOIÁS', 'GO'),
(10, 'MARANHÃO', 'MA'),
(11, 'MATO GROSSO', 'MT'),
(12, 'MATO GROSSO DO SUL', 'MS'),
(13, 'MINAS GERAIS', 'MG'),
(14, 'PARÁ', 'PA'),
(15, 'PARAÍBA', 'PB'),
(16, 'PARANÁ', 'PR'),
(17, 'PERNAMBUCO', 'PE'),
(18, 'PIAUÍ', 'PI'),
(19, 'RIO DE JANEIRO', 'RJ'),
(20, 'RIO GRANDE DO NORTE', 'RN'),
(21, 'RIO GRANDE DO SUL', 'RS'),
(22, 'RONDÔNIA', 'RO'),
(23, 'RORAIMA', 'RR'),
(24, 'SANTA CATARINA', 'SC'),
(25, 'SÃO PAULO', 'SP'),
(26, 'SERGIPE', 'SE'),
(27, 'TOCANTINS', 'T0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `company_id`) VALUES
(1, 'LÁPIS', 1, 1),
(2, 'BORRACHA', 1, 1),
(5, 'BONECAS', 2, 1),
(6, 'CARRINHOS', 2, 1),
(7, 'DESODORANTE', 3, 1),
(8, 'CREME', 3, 1),
(9, 'CERVEJAS', 4, 1),
(10, 'VINHOS', 4, 1),
(11, 'SUBTESTE', 5, 1),
(12, 'TESTANDO PROVANDO', 5, 0);

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
(1, 123, 'gustavoalvesdasilva@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055', '7868d2968beb437ae1d1a7f9cdb41b47', 1);

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
  `nivel_acesso` int(11) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
