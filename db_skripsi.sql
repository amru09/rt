-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_skripsi.ref_jam
CREATE TABLE IF NOT EXISTS `ref_jam` (
  `jam` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.ref_jam: ~0 rows (approximately)
/*!40000 ALTER TABLE `ref_jam` DISABLE KEYS */;
INSERT INTO `ref_jam` (`jam`) VALUES
	('07:00 - 09:00');
/*!40000 ALTER TABLE `ref_jam` ENABLE KEYS */;

-- Dumping structure for procedure db_skripsi.rekapitulasi
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `rekapitulasi`(
	IN `prm_id_guru` VARCHAR(50),
	IN `prm_id_mapel` VARCHAR(50),
	IN `prm_kelas` VARCHAR(50),
	IN `prm_waktu` VARCHAR(50),
	IN `prm_bulan` INT,
	IN `prm_tahun` INT

)
BEGIN

IF prm_bulan = 12 THEN
   SET @bln = 1;
   SET @thn = prm_tahun+1;
ELSE
   SET @bln = prm_bulan+1;
   SET @thn = prm_tahun;
END IF;

SET @tgl_sebelum = DATE(CONCAT(prm_tahun,'-',prm_bulan,'-01'));
SET @tgl_sesudah = DATE(CONCAT(@thn,'-',@bln,'-01'));


SELECT 
  AAAA.id_siswa, 
  SUM(AAAA.tgl_1) tgl_1,
  SUM(AAAA.tgl_2) tgl_2,
  SUM(AAAA.tgl_3) tgl_3,
  SUM(AAAA.tgl_4) tgl_4,
  SUM(AAAA.tgl_5) tgl_5,
  SUM(AAAA.tgl_6) tgl_6,
  SUM(AAAA.tgl_7) tgl_7,
  SUM(AAAA.tgl_8) tgl_8,
  SUM(AAAA.tgl_9) tgl_9,
  SUM(AAAA.tgl_10) tgl_10,
  SUM(AAAA.tgl_11) tgl_11,
  SUM(AAAA.tgl_12) tgl_12,
  SUM(AAAA.tgl_13) tgl_13,
  SUM(AAAA.tgl_14) tgl_14,
  SUM(AAAA.tgl_15) tgl_15,
  SUM(AAAA.tgl_16) tgl_16,
  SUM(AAAA.tgl_17) tgl_17,
  SUM(AAAA.tgl_18) tgl_18,
  SUM(AAAA.tgl_19) tgl_19,
  SUM(AAAA.tgl_20) tgl_20,
  SUM(AAAA.tgl_21) tgl_21,
  SUM(AAAA.tgl_22) tgl_22,
  SUM(AAAA.tgl_23) tgl_23,
  SUM(AAAA.tgl_24) tgl_24,
  SUM(AAAA.tgl_25) tgl_25,
  SUM(AAAA.tgl_26) tgl_26,
  SUM(AAAA.tgl_27) tgl_27,
  SUM(AAAA.tgl_28) tgl_28,
  SUM(AAAA.tgl_29) tgl_29,
  SUM(AAAA.tgl_30) tgl_30,
  SUM(AAAA.tgl_31) tgl_31
FROM 
(	
	SELECT 
	  AAA.id_siswa,
	  CASE
	    WHEN DAY(AAA.tgl) = 1 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_1,
	  CASE
	    WHEN DAY(AAA.tgl) = 2 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_2,
	  CASE
	    WHEN DAY(AAA.tgl) = 3 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_3,
	  CASE
	    WHEN DAY(AAA.tgl) = 4 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_4,
	  CASE
	    WHEN DAY(AAA.tgl) = 5 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_5,
	  CASE
	    WHEN DAY(AAA.tgl) = 6 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_6,
	  CASE
	    WHEN DAY(AAA.tgl) = 7 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_7,
	  CASE
	    WHEN DAY(AAA.tgl) = 8 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_8,
	  CASE
	    WHEN DAY(AAA.tgl) = 9 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_9,
	  CASE
	    WHEN DAY(AAA.tgl) = 10 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_10,
	  CASE
	    WHEN DAY(AAA.tgl) = 11 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_11,
	  CASE
	    WHEN DAY(AAA.tgl) = 12 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_12,
	  CASE
	    WHEN DAY(AAA.tgl) = 13 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_13,
	  CASE
	    WHEN DAY(AAA.tgl) = 14 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_14,
	  CASE
	    WHEN DAY(AAA.tgl) = 15 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_15,
	  CASE
	    WHEN DAY(AAA.tgl) = 16 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_16,
	  CASE
	    WHEN DAY(AAA.tgl) = 17 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_17,
	  CASE
	    WHEN DAY(AAA.tgl) = 18 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_18,
	  CASE
	    WHEN DAY(AAA.tgl) = 19 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_19,
	  CASE
	    WHEN DAY(AAA.tgl) = 20 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_20,
	  CASE
	    WHEN DAY(AAA.tgl) = 21 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_21,
	  CASE
	    WHEN DAY(AAA.tgl) = 22 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_22,
	  CASE
	    WHEN DAY(AAA.tgl) = 23 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_23,
	  CASE
	    WHEN DAY(AAA.tgl) = 24 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_24,
	  CASE
	    WHEN DAY(AAA.tgl) = 25 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_25,
	  CASE
	    WHEN DAY(AAA.tgl) = 26 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_26,
	  CASE
	    WHEN DAY(AAA.tgl) = 27 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_27,
	  CASE
	    WHEN DAY(AAA.tgl) = 28 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_28,
	  CASE
	    WHEN DAY(AAA.tgl) = 29 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_29,
	  CASE
	    WHEN DAY(AAA.tgl) = 30 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_30,
	  CASE
	    WHEN DAY(AAA.tgl) = 31 AND AAA.status_hadir = 'HADIR' THEN 1
	    ELSE 0
	  END AS tgl_31
	FROM 
	(	
		SELECT 
		  AA.id_siswa, AA.tgl, 
		  CASE
		    WHEN BB.id_siswa IS NOT NULL AND BB.tgl IS NOT NULL THEN 'HADIR'
			 ELSE 'TAK' 
		  END AS status_hadir 
		FROM 
		(
			SELECT DISTINCT(a.id_siswa), B.tgl FROM tb_kehadiran a
			CROSS JOIN 
			(
			SELECT DATE(@tgl_sebelum) + INTERVAL a + b day tgl 
					   FROM   (SELECT 0 a 
							   UNION 
							   SELECT 1 a 
							   UNION 
							   SELECT 2 
							   UNION 
							   SELECT 3 
							   UNION 
							   SELECT 4 
							   UNION 
							   SELECT 5 
							   UNION 
							   SELECT 6 
							   UNION 
							   SELECT 7 
							   UNION 
							   SELECT 8 
							   UNION 
							   SELECT 9) d, 
							  (SELECT 0 b 
							   UNION 
							   SELECT 10 
							   UNION 
							   SELECT 20 
							   UNION 	
							   SELECT 30 
							   UNION 
							   SELECT 40) m 
					   WHERE  DATE(@tgl_sebelum) + INTERVAL a + b day < 
							  DATE(@tgl_sesudah) 
					   ORDER  BY a + b
			) B
			WHERE a.id_guru  = prm_id_guru
			AND   a.id_mapel = prm_id_mapel
			AND   a.kelas    = prm_kelas
			AND   a.waktu    = prm_waktu
			AND MONTH(a.tgl) = prm_bulan
			AND YEAR(a.tgl)  = prm_tahun
			ORDER BY id_siswa, tgl
		) AA
		LEFT JOIN
		(
			SELECT * FROM tb_kehadiran a 
			WHERE a.id_guru  = prm_id_guru
			AND   a.id_mapel = prm_id_mapel
			AND   a.kelas    = prm_kelas
			AND   a.waktu    = prm_waktu
			AND MONTH(a.tgl) = prm_bulan
			AND YEAR(a.tgl)  = prm_tahun
		) BB ON AA.id_siswa = BB.id_siswa AND AA.tgl = BB.tgl
		ORDER BY AA.id_siswa, AA.tgl
	) AAA
) AAAA
GROUP BY AAAA.id_siswa;

END//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_kehadiran: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_kehadiran` DISABLE KEYS */;
INSERT INTO `tb_kehadiran` (`id`, `id_guru`, `id_siswa`, `id_mapel`, `kelas`, `tgl`, `waktu`) VALUES
	(12, '132456', '182270', '001', 'VII', '2022-02-17', '07:00 - 09:00'),
	(13, '132456', '182271', '002', 'VII', '2022-02-06', '07:00 - 09:00'),
	(14, '132456', '182272', '002', 'VII', '2022-02-06', '07:00 - 09:00'),
	(15, '132456', '182273', '002', 'VII', '2022-02-06', '07:00 - 09:00'),
	(16, '132456', '182274', '002', 'VII', '2022-02-06', '07:00 - 09:00'),
	(17, '132456', '182275', '002', 'VII', '2022-02-06', '07:00 - 09:00'),
	(18, '132456', '182276', '002', 'VII', '2022-02-06', '07:00 - 09:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='dta kelas apa, mapel';

-- Dumping data for table db_skripsi.tb_qrcode: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_qrcode` DISABLE KEYS */;
INSERT INTO `tb_qrcode` (`id`, `id_guru`, `id_mapel`, `tgl`, `waktu`) VALUES
	(1, '132456', '002', '2022-02-10', '07:00 - 09:00'),
	(2, '132456', '002', '2022-02-08', '07:00 - 09:00'),
	(3, '132456', '002', '2022-02-10', '07:00 - 09:00'),
	(4, '132456', '001', '2022-01-01', '07:00 - 09:00'),
	(5, '132456', '003', '2022-01-31', '07:00 - 09:00'),
	(6, '132456', '001', '2022-02-17', '07:00 - 09:00'),
	(7, '132456', '001', '2022-02-11', '07:00 - 09:00'),
	(8, '132456', '002', '2022-02-06', '07:00 - 09:00');
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

-- Dumping data for table db_skripsi.tb_siswa: ~9 rows (approximately)
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` (`id_siswa`, `nama`, `jkel`, `kelas`, `tempat_lahir`, `tgl_lahir`) VALUES
	('182270', 'Muhammad Rizky Amru Husain', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182271', 'riski 1', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182272', 'riski 2', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182273', 'riski 3', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182274', 'riski 4', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182275', 'riski 5', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182276', 'riski 6', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182277', 'riski 7', 'L', 'VII', 'Sudiang', '2022-02-07'),
	('182278', 'riski 8', 'L', 'VII', 'Sudiang', '2022-02-07');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `hak_akses` char(50) NOT NULL DEFAULT '0' COMMENT 'ADMIN (1)/GURU (2)/SISWA (3)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table db_skripsi.tb_users: ~11 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `username`, `password`, `hak_akses`) VALUES
	(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
	(16, '182270', 'dadb2ec9408cc9d2090a1e0a93f51eb6', '3'),
	(17, '132456', 'a3f0bec59cebeb60553ec80bbfd5dfdf', '2'),
	(18, '182271', '309fb18bc492af88007757ec85400198', '3'),
	(19, '182272', 'ff49d8947eb750cd16b6332239d7d4ec', '3'),
	(20, '182273', '436786e7360b5899a5c23f6936753ea4', '3'),
	(21, '182274', '4b09444a060e06c144f6d8cd3a8a8415', '3'),
	(22, '182275', 'cabe305cd58bcd4f3295e4a4f650052d', '3'),
	(23, '182276', '159e4c71a015cf4ab9f25955107d2275', '3'),
	(24, '182277', 'bcb6f6ece1ea84048b232053705a00d7', '3'),
	(25, '182278', 'e8e98df8b3a0e7198457779ef7e3eeda', '3');
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
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
