# Host: localhost  (Version 5.5.5-10.4.14-MariaDB)
# Date: 2020-09-15 19:28:12
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "categoria"
#

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Structure for table "conta"
#

DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `saldo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Structure for table "despesa"
#

DROP TABLE IF EXISTS `despesa`;
CREATE TABLE `despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_id` int(11) DEFAULT NULL,
  `categoria_despesa_id` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `pago` tinyint(3) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Structure for table "receita"
#

DROP TABLE IF EXISTS `receita`;
CREATE TABLE `receita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_id` int(11) DEFAULT NULL,
  `categoria_receita_id` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `recebido` tinyint(3) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
