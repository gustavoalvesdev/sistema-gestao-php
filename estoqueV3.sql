CREATE DATABASE estoque;
USE estoque;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `compeny_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `categories` (`id`, `name`, `compeny_id`) VALUES
(1, 'PAPELARIA', 1),
(2, 'BRINQUEDOS', 1),
(3, 'PERFUMARIA', 1),
(4, 'BEBIDAS', 1),
(5, 'TESTE', 1);

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `cities` (`id`, `name`, `state`) VALUES
(1, 'MOGI DAS CRUZES', 25),
(2, 'ITAPECIRICA DA SERRA', 25),
(3, 'RIO BRANCO', 1),
(4, 'CAMPO GRANDE', 19),
(5, 'FERRAZ DE VASCONCELOS', 25);

CREATE TABLE `companies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `nfe_number` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `companies` (`id`, `name`, `nfe_number`) VALUES
(1, 'Studio Color', 12);


CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`id`, `name`, `cpf`, `phone`, `cellphone`, `zipcode`, `street`, `number`, `district`, `city`, `state`, `company_id`) VALUES
(1, 'Gustavo Alves da Silva', '404.310.328-07', '(11) 4679-7017', '(11) 99653-1308', '08544-100', 'Rua dos Goivos', '19', 'Vila Santa Margarida', 'Ferraz de Vasconcelos', 'SP', 1);

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
(22, '2920481821019', 'Cartela de Meticais', 25, 18, 15, 2, 6, 0, 0);

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `providers` (`id`, `name`, `url`, `company_id`) VALUES
(1, 'KINGSTON', 'WWW.KINGSTON.COM', 1),
(2, 'SEAGATE', 'WWW.SEAGATE.COM', 1),
(3, 'CORSAIR', 'WWW.CORSAIR.COM', 1),
(4, 'OLYMPUS', 'WWW.OLYMPUS.COM', 1),
(5, 'FUTURAIM', 'https://futuraim.com.br', 1),
(6, 'Atual Card', 'https://www.atualcard.com.br/', 0);

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_number` int(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `user_token` varchar(32) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `user_number`, `user_email`, `user_pass`, `user_token`, `company_id`) VALUES
(1, 123, 'gustavoalvesdasilva@outlook.com', '1b1c4c43759472a6ecd6036d349c542a', '3901cdab12cfcacc0b60eefa25fe6375', 1);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;