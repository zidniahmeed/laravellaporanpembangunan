-- MySQL dump 10.13  Distrib 9.3.0, for macos15.4 (arm64)
--
-- Host: 127.0.0.1    Database: laravellaporanpembangunan
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelurahan` (
  `idkelurahan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `namakelurahan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamatkelurahan` text COLLATE utf8mb4_general_ci,
  `nohpkelurahan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fotokelurahan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idkelurahan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelurahan`
--

/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
INSERT INTO `kelurahan` VALUES (1,'asdasd','asdasd','Bangka Barat','Bangka Belitung','asdasdad','809809','foto_kelurahan/4gUTOq5c5vj2WWSmXtfOkwOVWleTiiM9l1u8E7Wh.jpg',17.0582620,77.8993530,'2025-06-10 06:52:54','2025-06-10 06:52:54'),(2,'kel','kecam','Bangli','Bali','alaamt','080890','foto_kelurahan/1749538602_artikel_221807090728_kenali-kepalangmerahan-lebih-dalam.jpg',19.8508470,84.0906940,'2025-06-10 06:55:44','2025-06-10 06:56:42');
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan` (
  `idlaporan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idkelurahan` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `topologi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `klasifikasi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategoridesa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `komoditas_unggulan_berdasarkan_luas_tanam` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `komoditas_unggulan_berdasarkan_nilai_ekonomi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `luas_wilayah` decimal(10,2) DEFAULT NULL,
  `lahan_sawah` decimal(10,2) DEFAULT NULL,
  `lahan_ladang` decimal(10,2) DEFAULT NULL,
  `lahan_perkebunan` decimal(10,2) DEFAULT NULL,
  `lahan_peternakan` decimal(10,2) DEFAULT NULL,
  `hutan` decimal(10,2) DEFAULT NULL,
  `waduk` decimal(10,2) DEFAULT NULL,
  `lahan_lainya` decimal(10,2) DEFAULT NULL,
  `jumlah_sertifikat` int DEFAULT NULL,
  `luas_tanah_sertifikat` decimal(10,2) DEFAULT NULL,
  `luas_tanah_kas` decimal(10,2) DEFAULT NULL,
  `jarak_dari_pusat_kecamatan` decimal(10,2) DEFAULT NULL,
  `jarak_dari_pusat_kota` decimal(10,2) DEFAULT NULL,
  `jarak_dari_pusat_kabupaten` decimal(10,2) DEFAULT NULL,
  `jarak_dari_pusat_ibu_kota_provinsi` decimal(10,2) DEFAULT NULL,
  `jumlah_kepala_keluarga` int DEFAULT NULL,
  `keluarga_pra_sejahtera` int DEFAULT NULL,
  `keluarga_sejahtera_1` int DEFAULT NULL,
  `keluarga_sejahtera_2` int DEFAULT NULL,
  `keluarga_sejahtera_3` int DEFAULT NULL,
  `keluarga_sejahtera_3_plus` int DEFAULT NULL,
  `jumlah_penduduk` int DEFAULT NULL,
  `laki_laki` int DEFAULT NULL,
  `perempuan` int DEFAULT NULL,
  `usia_0_17` int DEFAULT NULL,
  `usia_18_56` int DEFAULT NULL,
  `usia_56_keatas` int DEFAULT NULL,
  `karyawan_pns` int DEFAULT NULL,
  `karyawan_pol_tni` int DEFAULT NULL,
  `karyawan_swasta` int DEFAULT NULL,
  `wiraswasta` int DEFAULT NULL,
  `petani` int DEFAULT NULL,
  `buruh_tani` int DEFAULT NULL,
  `nelayan` int DEFAULT NULL,
  `peternak` int DEFAULT NULL,
  `jasa` int DEFAULT NULL,
  `pengrajin` int DEFAULT NULL,
  `pekerja_seni` int DEFAULT NULL,
  `pensiunan` int DEFAULT NULL,
  `lainya` int DEFAULT NULL,
  `menganggur` int DEFAULT NULL,
  `tk` int DEFAULT NULL,
  `sd` int DEFAULT NULL,
  `sltp` int DEFAULT NULL,
  `slta` int DEFAULT NULL,
  `akademi` int DEFAULT NULL,
  `sarjana` int DEFAULT NULL,
  `pasca_sarjana` int DEFAULT NULL,
  `dokter_umum` int DEFAULT NULL,
  `dokter_spesialis` int DEFAULT NULL,
  `bidan` int DEFAULT NULL,
  `mantri_kesehatan` int DEFAULT NULL,
  `perawat` int DEFAULT NULL,
  `lulusan_tk` int DEFAULT NULL,
  `lulusan_sd` int DEFAULT NULL,
  `lulusan_sltp` int DEFAULT NULL,
  `lulusan_slta` int DEFAULT NULL,
  `lulusan_akademi` int DEFAULT NULL,
  `lulusan_s1` int DEFAULT NULL,
  `lulusan_s2` int DEFAULT NULL,
  `lulusan_s3` int DEFAULT NULL,
  `lulusan_ponpes` int DEFAULT NULL,
  `lulusan_pendidikan_keagamaan` int DEFAULT NULL,
  `lulusan_slb` int DEFAULT NULL,
  `lulusan_kursus` int DEFAULT NULL,
  `tidak_lulus_sekolah` int DEFAULT NULL,
  `tidak_sekolah` int DEFAULT NULL,
  `pendapatan_desa` decimal(15,2) DEFAULT NULL,
  `pendapatan_asli_desa` decimal(15,2) DEFAULT NULL,
  `pungutan` decimal(15,2) DEFAULT NULL,
  `hasil_bumdes` decimal(15,2) DEFAULT NULL,
  `hibah` decimal(15,2) DEFAULT NULL,
  `pendapatan_lainya` decimal(15,2) DEFAULT NULL,
  `bantuan_pemerintah` decimal(15,2) DEFAULT NULL,
  `bantuan_provinsi` decimal(15,2) DEFAULT NULL,
  `bantuan_kota` decimal(15,2) DEFAULT NULL,
  `bantuan_lain_tidak_mengikat` decimal(15,2) DEFAULT NULL,
  `silpa` decimal(15,2) DEFAULT NULL,
  `dana_cadangan` decimal(15,2) DEFAULT NULL,
  `belanja_rutin` decimal(15,2) DEFAULT NULL,
  `belanja_tidak_rutin` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idadmin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bantuan_yang_diterima` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idlaporan`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` VALUES (53,1,'Diterima','2025-06-10','12','2','21','21','1',21.00,212.00,21.00,12.00,12.00,21.00,21.00,21.00,12,21.00,21.00,12.00,12.00,2123.00,23.00,32,23,23,23,23,23,32,32,32,32,32,23,32,32,32,32,32,23,32,32,32,32,23,23,32,23,23,32,23,32,23,32,32,32,32,32,32,32,32,32,32,32,32,23,32,32,32,32,32,32,32,32,32.00,32.00,32.00,32.00,32.00,32.00,32.00,32.00,23.00,32.00,32.00,23.00,32.00,32.00,'2025-06-10 08:50:19','2025-06-10 10:27:10','2025',NULL,NULL),(57,1,'Menunggu Konfirmasi Bappeda','2025-06-10','54','45','45','45','45',45.00,45.00,45.00,454.00,545.00,45.00,54.00,4545.00,45,545445.00,4.00,545.00,4545.00,45.00,45.00,45,45,45,45,45,455,445,54,54,54,45,45,45,45,54,54,45,54,554,45,45,45,45,45,45,54,45,45,45,45,45,45,45,45,45,45,54,5445,54,45,45,45,45,45,45,45,45,45,45,45,45,45,45.00,54.00,45.00,45.00,45.00,45.00,45.00,54.00,45.00,45.00,45.00,45.00,54.00,45.00,'2025-06-10 09:36:49','2025-06-10 10:37:52','2025','2',NULL),(58,1,'Ditolak',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-06-10 10:37:17','2025-06-11 02:28:15','2025','13',NULL);
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_06_10_132354_create_kelurahan_table',2),(6,'2025_06_10_142336_create_laporan_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `nik` text COLLATE utf8mb4_general_ci NOT NULL,
  `username` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` text COLLATE utf8mb4_general_ci,
  `alamat` text COLLATE utf8mb4_general_ci,
  `fotoprofil` text COLLATE utf8mb4_general_ci,
  `level` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jekel` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kec` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (1,'Fahrul Adib','','','fahruladib9@gmail.com','123','082282076702','Jl. Prapanca Raya No. 9','Untitled.png','User','2002-07-08','Jakarta','Laki-laki','DKI Jakarta','Jakarta Selatan','Ciganjur','12170'),(2,'Administrator','','admin','admin@gmail.com','admin','081293827383','Palembang','','Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Feby Saputra','','','feby@gmail.com','123','082673828283','kenten',NULL,'User',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'M. Ridwan Tri Saputra','','','ridwan@gmail.com','123','082783929302','Pangkalan Balai',NULL,'User',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Sugeng','12345','sugeng','sugeng@gmail.com','sugeng','0123123','-',NULL,'User',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'laravellaporanpembangunan'
--
