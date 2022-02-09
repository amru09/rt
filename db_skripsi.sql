-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_skripsi
CREATE DATABASE IF NOT EXISTS `db_skripsi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_skripsi`;

-- Dumping structure for table db_skripsi.tb_guru
CREATE TABLE IF NOT EXISTS `tb_guru` (
  `id_guru` char(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jkel` char(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_skripsi.tb_guru: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_guru` DISABLE KEYS */;
INSERT INTO `tb_guru` (`id_guru`, `nama`, `jkel`, `tempat_lahir`, `tgl_lahir`) VALUES
	('132456', 'Muh Taufiq S.kom', 'L', 'Gowa', '1999-09-07'),
	('admin', 'admin', 'L', 'makassar', '2022-02-08');
/*!40000 ALTER TABLE `tb_guru` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_kehadiran
CREATE TABLE IF NOT EXISTS `tb_kehadiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` char(50) DEFAULT NULL,
  `id_siswa` char(50) DEFAULT NULL,
  `id_mapel` char(50) DEFAULT NULL,
  `kelas` char(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_kehadiran: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kehadiran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kehadiran` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_mapel
CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `id_mapel` char(50) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_skripsi.tb_mapel: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_mapel` DISABLE KEYS */;
INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
	('001', 'Matematika'),
	('002', 'Bahasa Indonesia'),
	('003', 'Pendidikan Agama Islam');
/*!40000 ALTER TABLE `tb_mapel` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_qrcode
CREATE TABLE IF NOT EXISTS `tb_qrcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` char(50) DEFAULT NULL,
  `id_mapel` char(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='dta kelas apa, mapel';

-- Dumping data for table db_skripsi.tb_qrcode: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_qrcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_qrcode` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_siswa
CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` char(50) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `jkel` char(50) DEFAULT NULL,
  `kelas` char(50) DEFAULT NULL,
  `tempat_lahir` varchar(250) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_skripsi.tb_siswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` (`id_siswa`, `nama`, `jkel`, `kelas`, `tempat_lahir`, `tgl_lahir`) VALUES
	('182270', 'Muhammad Rizky Amru Husain', 'L', 'VII', 'Sudiang', '2022-02-07');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `hak_akses` char(50) NOT NULL DEFAULT '0' COMMENT 'ADMIN (1)/GURU (2)/SISWA (3)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table db_skripsi.tb_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `username`, `password`, `hak_akses`) VALUES
	(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
	(16, '182270', 'dadb2ec9408cc9d2090a1e0a93f51eb6', '3'),
	(17, '132456', 'a3f0bec59cebeb60553ec80bbfd5dfdf', '2');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Dumping structure for trigger db_skripsi.xttrg_add_guru
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_add_guru` AFTER INSERT ON `tb_guru` FOR EACH ROW BEGIN
	INSERT INTO tb_users SET username = NEW.id_guru, password = MD5(NEW.id_guru), hak_akses = '2';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_skripsi.xttrg_add_siswa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_add_siswa` AFTER INSERT ON `tb_siswa` FOR EACH ROW BEGIN
	INSERT INTO tb_users SET username = NEW.id_siswa, password = MD5(NEW.id_siswa), hak_akses = '3';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_skripsi.xttrg_delete_guru
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_delete_guru` AFTER DELETE ON `tb_guru` FOR EACH ROW BEGIN
	DELETE FROM tb_users WHERE username = OLD.id_guru;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_skripsi.xttrg_delete_siswa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_delete_siswa` AFTER DELETE ON `tb_siswa` FOR EACH ROW BEGIN
	DELETE FROM tb_users WHERE username = OLD.id_siswa;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
