-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: dbwisatadepok
-- ------------------------------------------------------
-- Server version	5.7.24

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

--
-- Table structure for table `jenis_wisata`
--

DROP TABLE IF EXISTS `jenis_wisata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_wisata`
--

LOCK TABLES `jenis_wisata` WRITE;
/*!40000 ALTER TABLE `jenis_wisata` DISABLE KEYS */;
INSERT INTO `jenis_wisata` VALUES (1,'Kolam Renang'),(2,'Taman Kota'),(3,'Pemancingan');
/*!40000 ALTER TABLE `jenis_wisata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES (1,'Beji'),(2,'Pancoran Mas');
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `isi` text,
  `users_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `nilai_rating_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesanan_users1_idx` (`users_id`),
  KEY `fk_pesanan_produk1_idx` (`wisata_id`),
  KEY `fk_komentar_nilai_rating1_idx` (`nilai_rating_id`),
  CONSTRAINT `fk_komentar_nilai_rating1` FOREIGN KEY (`nilai_rating_id`) REFERENCES `nilai_rating` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesanan_produk1` FOREIGN KEY (`wisata_id`) REFERENCES `tempat_wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesanan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
INSERT INTO `komentar` VALUES (1,'2022-06-12','kalo berenang di sini anak2 ngak mau pulang',2,1,4);
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai_rating`
--

DROP TABLE IF EXISTS `nilai_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai_rating`
--

LOCK TABLES `nilai_rating` WRITE;
/*!40000 ALTER TABLE `nilai_rating` DISABLE KEYS */;
INSERT INTO `nilai_rating` VALUES (1,'Jelek'),(2,'Kurang Bagus'),(3,'Biasa Aja'),(4,'Bagus'),(5,'Sangat Bagus');
/*!40000 ALTER TABLE `nilai_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempat_wisata`
--

DROP TABLE IF EXISTS `tempat_wisata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempat_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `latlong` varchar(40) DEFAULT NULL,
  `jenis_id` int(11) NOT NULL,
  `skor_rating` double DEFAULT NULL,
  `harga_tiket` double DEFAULT NULL,
  `foto1` varchar(40) DEFAULT NULL,
  `foto2` varchar(40) DEFAULT NULL,
  `foto3` varchar(40) DEFAULT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `website` varchar(45) DEFAULT NULL,
  `fasilitas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produk_jenis_produk_idx` (`jenis_id`),
  KEY `fk_tempat_wisata_kelurahan1_idx` (`kecamatan_id`),
  CONSTRAINT `fk_produk_jenis_produk` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tempat_wisata_kelurahan1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempat_wisata`
--

LOCK TABLES `tempat_wisata` WRITE;
/*!40000 ALTER TABLE `tempat_wisata` DISABLE KEYS */;
INSERT INTO `tempat_wisata` VALUES (1,'Water Park Ceria','Jl. K.H.M. Usman No.110, Kukusan, Kecamatan Beji, Kota Depok, Jawa Barat 16425','-6.3650158,106.8114586',1,4.2,40000,'ceria01.jpg','ceria02.jpg','ceria03.jpg',1,'www.ceriadepok.com','tersedia 2 kolam renang, perosotan, arena futsal taman luas');
/*!40000 ALTER TABLE `tempat_wisata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','827ccb0eea8a706c4c34a16891f84e7b','admin@gmail.com','2022-06-12 00:18:11','2022-06-12 00:18:11',1,'administrator'),(2,'aminah','90b74c589f46e8f3a484082d659308bd','aminah@gmail.com','2022-06-12 00:18:12','2022-06-12 00:18:12',1,'public');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-14 13:17:44
