-- Database:
CREATE DATABASE
  IF NOT EXISTS `tdszuphpdb01`
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
   
USE `tdszuphpdb01`;
 
-- --------------------------------------------------------
-- Estrutura da tabela `produtos`
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `resumo` varchar(1000) DEFAULT NULL,
  `valor` decimal(9,2) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `destaque` BIT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Indexes for table `produtos`
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);
 
-- AUTO_INCREMENT for table `produtos`
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
 
-- Estrutura para tabela `tipos`
CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Inserindo Dados na Tabela `tipos'
INSERT INTO `tipos` (`id`, `sigla`, `rotulo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa'),
(3, 'beb', 'Bebida');
 
-- Índices de tabela `tipos`
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);
 
-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
 
-- Estrutura para tabela `tipos`
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` CHAR(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
-- Inserindo Dados na Tabela `usuarios'
INSERT INTO `usuarios`
  (`id`, `login`, `senha`, `nivel`)
  VALUES
    (1, 'everson', md5('1234'), 'adm'),
    (2, 'kaua', md5('123'), 'cli'),
    (3, 'isaac', md5('123'), 'cli'),
    (4, 'well', md5('1234'), 'adm'),
    (5, 'gabriel', md5('1234'), 'adm');
 
-- Índices de tabela `tipos`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_uniq`(`login`);
 
-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
 
-- Chave estrangeira
ALTER TABLE `produtos`
  ADD CONSTRAINT `tipo_id_fk` FOREIGN KEY (`tipo_id`)
  REFERENCES `tipos`(`id`)
    ON DELETE no action
    ON UPDATE no action;  
   
-- Criando a view `vw_produtos`
CREATE VIEW vw_produtos AS
  SELECT  p.id,
      p.tipo_id,
            t.sigla,
            t.rotulo,
            p.descricao,
            p.resumo,
            p.valor,
            p.imagem,
            p.destaque
    FROM produtos p
    JOIN tipos t
  WHERE p.tipo_id=t.id;
COMMIT;

-- Estrutura da tabela `nivel`
CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(15) NOT NULL
  );
  
-- Inserindo Dados na Tabela `nivel'
INSERT INTO `nivel` (`id`, `sigla`, `rotulo`) VALUES
(1, 'adm', 'Administrador'),
(2, 'cli', 'Cliente');

-- Estrutura da tabela `clientes`
CREATE TABLE `clientes` (
  `id_cliente` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `telefone` varchar(11) NOT NULL,
  `senha` varchar(32) NOT NULL
  );

-- Estrutura da tabela `mesas`
CREATE TABLE `mesas` (
  `id_mesa` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `numero_mesa` varchar(3) NOT NULL,
  `capacidade` varchar(2) NOT NULL 
  );
    
    -- Estrutura da tabela `reservas`
  CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente`  int(11),
  `data_reserva` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `horario` TIME NOT NULL,
  `qtd_pessoas` varchar(2) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `codigo_reserva` varchar(30) NOT NULL,
   PRIMARY KEY (id_reserva),
   FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
  );
  
  -- Estrutura da tabela `negativas`
  CREATE TABLE `negativas` (
  `id_negativa` int(11) NOT NULL AUTO_INCREMENT,
  `id_reserva` int(11),
  `motivo_negativa` varchar(100) NOT NULL,
  `data_registro` DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id_negativa),
   FOREIGN KEY (id_reserva) REFERENCES reservas(id_reserva)
  );
  
  -- Estrutura da tabela `reserva_mesa`
CREATE TABLE `reserva_mesa` (
  `id_reserva` int(11),
  `id_mesa` int(11),
   PRIMARY KEY (id_reserva, id_mesa),
   FOREIGN KEY (id_reserva) REFERENCES reservas(id_reserva),
   FOREIGN KEY (id_mesa) REFERENCES mesas(id_mesa)
  );