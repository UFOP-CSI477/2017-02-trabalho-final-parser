-- MySQL dump 10.16  Distrib 10.2.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ftc_regex
-- ------------------------------------------------------
-- Server version	10.2.12-MariaDB-10.2.12+maria~xenial

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE DATABASE IF NOT EXISTS `ftc_regex` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `manutencao`;

CREATE USER `php`@`localhost` identified by "333";
GRANT ALL PRIVILEGES ON ftc_regex.* TO `php`@`localhost`;
FLUSH PRIVILEGES;
--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `data_criacao` datetime(6) NOT NULL,
  `descricao` longtext DEFAULT NULL,
  `id_tag` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `IX_comentarios_id_tag` (`id_tag`),
  KEY `IX_comentarios_id_usuario` (`id_usuario`),
  CONSTRAINT `FK_comentarios_tags_id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`) ON DELETE CASCADE,
  CONSTRAINT `FK_comentarios_usuarios_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `data_criacao` datetime(6) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'0001-01-01 00:00:00.000000','Default');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `senha_lembretes`
--

DROP TABLE IF EXISTS `senha_lembretes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `senha_lembretes` (
  `id_senha_lembrete` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` longtext DEFAULT NULL,
  PRIMARY KEY (`id_senha_lembrete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `senha_lembretes`
--

LOCK TABLES `senha_lembretes` WRITE;
/*!40000 ALTER TABLE `senha_lembretes` DISABLE KEYS */;
/*!40000 ALTER TABLE `senha_lembretes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `data_criacao` datetime(6) NOT NULL,
  `definicao` varchar(200) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`),
  KEY `IX_tags_id_grupo` (`id_grupo`),
  KEY `IX_tags_id_usuario` (`id_usuario`),
  CONSTRAINT `FK_tags_grupos_id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE,
  CONSTRAINT `FK_tags_usuarios_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_acao`
--

DROP TABLE IF EXISTS `tags_acao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_acao` (
  `id_acao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_acao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_acao`
--

LOCK TABLES `tags_acao` WRITE;
/*!40000 ALTER TABLE `tags_acao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_acao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_historico`
--

DROP TABLE IF EXISTS `tags_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_historico` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime(6) NOT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `id_acao` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id_historico`),
  KEY `IX_tags_historico_id_acao` (`id_acao`),
  KEY `IX_tags_historico_id_tag` (`id_tag`),
  CONSTRAINT `FK_tags_historico_tags_acao_id_acao` FOREIGN KEY (`id_acao`) REFERENCES `tags_acao` (`id_acao`) ON DELETE CASCADE,
  CONSTRAINT `FK_tags_historico_tags_id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_historico`
--

LOCK TABLES `tags_historico` WRITE;
/*!40000 ALTER TABLE `tags_historico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_lembretes`
--

DROP TABLE IF EXISTS `usuario_lembretes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_lembretes` (
  `id_usuario_lembretes` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` longtext DEFAULT NULL,
  `id_senha_lembrete` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_lembretes`),
  KEY `IX_usuario_lembretes_id_senha_lembrete` (`id_senha_lembrete`),
  KEY `IX_usuario_lembretes_id_usuario` (`id_usuario`),
  CONSTRAINT `FK_usuario_lembretes_senha_lembretes_id_senha_lembrete` FOREIGN KEY (`id_senha_lembrete`) REFERENCES `senha_lembretes` (`id_senha_lembrete`) ON DELETE CASCADE,
  CONSTRAINT `FK_usuario_lembretes_usuarios_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_lembretes`
--

LOCK TABLES `usuario_lembretes` WRITE;
/*!40000 ALTER TABLE `usuario_lembretes` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_lembretes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `data_criacao` datetime(6) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_relacao`
--

DROP TABLE IF EXISTS `usuarios_relacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_relacao` (
  `id_relacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_seguidor` int(11) NOT NULL,
  `id_seguindo` int(11) NOT NULL,
  PRIMARY KEY (`id_relacao`),
  KEY `IX_usuarios_relacao_id_seguidor` (`id_seguidor`),
  KEY `IX_usuarios_relacao_id_seguindo` (`id_seguindo`),
  CONSTRAINT `FK_usuarios_relacao_usuarios_id_seguidor` FOREIGN KEY (`id_seguidor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `FK_usuarios_relacao_usuarios_id_seguindo` FOREIGN KEY (`id_seguindo`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_relacao`
--

LOCK TABLES `usuarios_relacao` WRITE;
/*!40000 ALTER TABLE `usuarios_relacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_relacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-20  1:19:09
