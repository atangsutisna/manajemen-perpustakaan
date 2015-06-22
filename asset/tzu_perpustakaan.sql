-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2012 at 05:57 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tzu_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_trans_pengembalian`
--

CREATE TABLE IF NOT EXISTS `detail_trans_pengembalian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PENGEMBALIAN_ID` int(11) NOT NULL,
  `NO_INDUK` varchar(50) NOT NULL,
  `STATUS_BUKU` enum('kembali','rusak','hilang') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `detail_trans_pengembalian`
--

INSERT INTO `detail_trans_pengembalian` (`ID`, `PENGEMBALIAN_ID`, `NO_INDUK`, `STATUS_BUKU`) VALUES
(26, 21, 'IF0101', 'kembali'),
(25, 21, 'IP5042', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `detail_trans_pinjaman`
--

CREATE TABLE IF NOT EXISTS `detail_trans_pinjaman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PINJAMAN_ID` int(11) NOT NULL,
  `NO_INDUK` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `detail_trans_pinjaman`
--

INSERT INTO `detail_trans_pinjaman` (`ID`, `PINJAMAN_ID`, `NO_INDUK`) VALUES
(17, 15, 'IP5042'),
(16, 15, 'IF0101');

-- --------------------------------------------------------

--
-- Table structure for table `mst_anggota`
--

CREATE TABLE IF NOT EXISTS `mst_anggota` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NO_ANGGOTA` varchar(25) NOT NULL,
  `NAMA_ANGGOTA` varchar(40) NOT NULL,
  `ALAMAT_RUMAH` text NOT NULL,
  `NO_TLP` varchar(20) NOT NULL,
  `KELAS` char(5) NOT NULL,
  `JENIS_KELAMIN` tinyint(1) NOT NULL,
  `STATUS_PINJAMAN` tinyint(1) NOT NULL,
  `STATUS_ANGGOTA` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NO_ANGGOTA` (`NO_ANGGOTA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mst_anggota`
--

INSERT INTO `mst_anggota` (`ID`, `NO_ANGGOTA`, `NAMA_ANGGOTA`, `ALAMAT_RUMAH`, `NO_TLP`, `KELAS`, `JENIS_KELAMIN`, `STATUS_PINJAMAN`, `STATUS_ANGGOTA`) VALUES
(4, '053040074', 'Atang Sutisna', 'Sukabumi', '08562012414', 'III A', 1, 1, 1),
(5, '053040047', 'Arief Ikhwani', 'Rancaekek, Bandung', '08100011111', 'III B', 1, 1, 1),
(6, '01234567', 'dede herna', 'sukabumi', '01123456', 'III A', 0, 1, 1),
(7, '5555555', 'dede yusup', 'tangerang', '081454656565', 'III B', 1, 0, 1),
(8, '4', 'budi', 'bubat', '23454', '2', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_buku`
--

CREATE TABLE IF NOT EXISTS `mst_buku` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KLASIFIKASI_ID` int(11) NOT NULL,
  `NO_INDUK` varchar(50) NOT NULL,
  `JUDUL_PUSTAKA` varchar(100) NOT NULL,
  `PENGARANG` varchar(35) NOT NULL,
  `PENERBIT` varchar(35) NOT NULL,
  `TEMPAT_TERBIT` varchar(20) NOT NULL,
  `TAHUN_TERBIT` char(20) NOT NULL,
  `EDISI` char(30) NOT NULL,
  `LETAK_PENYIMPANAN` char(40) NOT NULL,
  `KETERSEDIAAN_BUKU` int(11) NOT NULL,
  `TANGGAL_INPUT` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `mst_buku`
--

INSERT INTO `mst_buku` (`ID`, `KLASIFIKASI_ID`, `NO_INDUK`, `JUDUL_PUSTAKA`, `PENGARANG`, `PENERBIT`, `TEMPAT_TERBIT`, `TAHUN_TERBIT`, `EDISI`, `LETAK_PENYIMPANAN`, `KETERSEDIAAN_BUKU`, `TANGGAL_INPUT`) VALUES
(1, 1, 'IF0101', 'Pemograman Berorientasi Objek', 'Atang Sutisna', 'Informatika Bandung', 'Bandung', '2011', '1', 'Rak 1', 5, '2005-01-01'),
(2, 1, 'IP5042', 'Filsafat Pendidikan', 'atang sutisna', 'Informatika', 'sukabumi', '2011', '1', 'Rak III', 11, '2011-11-15'),
(16, 9, 'KOMP24290', 'Komputer 2', 'brew', 'informatika', 'bandung', '2011', '1', '000', 0, '2012-02-08'),
(17, 10, 'FILS32228', 'Filsafat 1', 'brew', 'informatika', 'Bandung', '2011', '1', '100', 0, '2012-02-08'),
(18, 10, 'FILS6366', 'Filsafat 3', 'ujang tantowi', 'bandung informatika', 'bandung', '2011', '3', '100', 0, '2012-02-09'),
(19, 10, 'FILS27327', 'Filsafat 3', 'ujang tantowi', 'bandung informatika', 'bandung', '2011', '3', '100', 0, '2012-02-09'),
(20, 10, 'FILS21900', 'Filsafat 3', 'ujang tantowi', 'bandung informatika', 'bandung', '2011', '3', '100', 0, '2012-02-09'),
(21, 9, 'KOMP24130', 'sistem komputer', 'dona doni', 'informatika', 'bandung', '2011', '2', '000', 0, '2012-02-11'),
(22, 9, 'KOMP28243', 'sistem komputer', 'dona doni', 'informatika', 'bandung', '2011', '2', '000', 0, '2012-02-11'),
(23, 9, 'KOMP17545', 'sistem komputer', 'dona doni', 'informatika', 'bandung', '2011', '2', '000', 0, '2012-02-11'),
(24, 9, 'KOMP7310', 'sistem komputer', 'dona doni', 'informatika', 'bandung', '2011', '2', '000', 0, '2012-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `mst_klasifikasi`
--

CREATE TABLE IF NOT EXISTS `mst_klasifikasi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KLASIFIKASI_ID` char(15) NOT NULL,
  `NAMA_KLASIFIKASI` varchar(35) NOT NULL,
  `SLUG` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `KLASIFIKASI_ID` (`KLASIFIKASI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `mst_klasifikasi`
--

INSERT INTO `mst_klasifikasi` (`ID`, `KLASIFIKASI_ID`, `NAMA_KLASIFIKASI`, `SLUG`) VALUES
(9, '000', 'Komputer', 'KOMP'),
(10, '100', 'Filsafat dan Fisilogi', 'FILS'),
(11, '200', 'Agama', ''),
(12, '300', 'Ilmu Sosial', ''),
(13, '400', 'Bahasa', ''),
(14, '500', 'Sains dan Matematika', ''),
(15, '600', 'Teknologi', ''),
(16, '700', 'Kesenian dan Rekreasi', ''),
(17, '800', 'Sastra', ''),
(18, '900', 'Sejarah dan Geografi', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_group`
--

CREATE TABLE IF NOT EXISTS `mst_user_group` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_GROUP` varchar(35) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mst_user_group`
--

INSERT INTO `mst_user_group` (`ID`, `NAMA_GROUP`) VALUES
(2, 'Admin'),
(3, 'Petugas Pelaksana'),
(4, 'Petugas Teknis');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE IF NOT EXISTS `sys_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MENU_GROUP_ID` int(11) NOT NULL,
  `NAMA_MENU` varchar(35) NOT NULL,
  `SLUG` varchar(35) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `URUTAN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`ID`, `MENU_GROUP_ID`, `NAMA_MENU`, `SLUG`, `URL`, `URUTAN`) VALUES
(1, 2, 'Kelompok Pengguna', 'user_group', 'user_group', 1),
(3, 1, 'Pengaturan Hak Akses', 'permission', 'user_roles', 2),
(4, 1, 'Pengaturan Sistem', 'default_setting', 'application_setting', 3),
(5, 2, 'Klasifikasi', 'klasifikasi', 'klasifikasi', 1),
(6, 2, 'Buku', 'buku', 'buku', 2),
(7, 2, 'Anggota', 'anggota', 'anggota', 3),
(8, 3, 'Sirkulasi', 'pinjaman', 'pinjaman', 1),
(9, 1, 'Kelompok Menu', 'menu_group', 'menu_group', 4),
(10, 1, 'Menu', 'main_menu', 'menu', 5),
(13, 4, 'Buku', '', 'laporan_buku', 1),
(14, 4, 'Pinjaman', '', 'laporan_pinjaman', 2),
(15, 4, 'Pengembalian', '', 'laporan_pengembalian', 3),
(16, 1, 'Pengguna', '', '#', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_group`
--

CREATE TABLE IF NOT EXISTS `sys_menu_group` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_GROUP` varchar(35) NOT NULL,
  `URUTAN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_menu_group`
--

INSERT INTO `sys_menu_group` (`ID`, `NAMA_GROUP`, `URUTAN`) VALUES
(1, 'Setup', 1),
(2, 'Master', 2),
(3, 'Transaksi', 3),
(4, 'Laporan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sys_setting`
--

CREATE TABLE IF NOT EXISTS `sys_setting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_APP` varchar(50) NOT NULL,
  `DENDA` double NOT NULL,
  `TERAKHIR_DIUBAH` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sys_setting`
--

INSERT INTO `sys_setting` (`ID`, `NAMA_APP`, `DENDA`, `TERAKHIR_DIUBAH`) VALUES
(1, 'Aplikasi Perpustakaan SMA PGRI Rancaekek', 100, '2011-11-04 10:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE IF NOT EXISTS `sys_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_GROUP_ID` int(11) NOT NULL,
  `USERNAME` varchar(35) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `NAMA_LENGKAP` varchar(35) NOT NULL,
  `EMAIL` varchar(35) NOT NULL,
  `NO_TELP` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_GROUP_ID` (`USER_GROUP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`ID`, `USER_GROUP_ID`, `USERNAME`, `PASSWORD`, `NAMA_LENGKAP`, `EMAIL`, `NO_TELP`) VALUES
(1, 2, 'pgri', 'rancaekek', 'pgri rancaekek', 'rancaekek@gmail.com', '08562012414');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_right`
--

CREATE TABLE IF NOT EXISTS `sys_user_right` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `USER_GROUP_ID` int(11) NOT NULL,
  `MENU_ID` int(11) NOT NULL,
  `CREATE` tinyint(1) NOT NULL,
  `DELETE` tinyint(1) NOT NULL,
  `UPDATE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_GROUP_ID` (`USER_GROUP_ID`),
  KEY `MENU_ID` (`MENU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_right`
--

INSERT INTO `sys_user_right` (`ID`, `USER_GROUP_ID`, `MENU_ID`, `CREATE`, `DELETE`, `UPDATE`) VALUES
(0, 2, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_trans_pinjaman`
--

CREATE TABLE IF NOT EXISTS `tmp_trans_pinjaman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NO_INDUK` varchar(50) NOT NULL,
  `NO_ANGGOTA` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tmp_trans_pinjaman`
--


-- --------------------------------------------------------

--
-- Table structure for table `trans_pengembalian`
--

CREATE TABLE IF NOT EXISTS `trans_pengembalian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PINJAMAN_ID` int(11) NOT NULL,
  `TGL_KEMBALI` datetime NOT NULL,
  `DENDA` double NOT NULL,
  `KEMBALI` int(11) NOT NULL,
  `HILANG` int(11) NOT NULL,
  `RUSAK` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `trans_pengembalian`
--

INSERT INTO `trans_pengembalian` (`ID`, `PINJAMAN_ID`, `TGL_KEMBALI`, `DENDA`, `KEMBALI`, `HILANG`, `RUSAK`, `USER_ID`) VALUES
(21, 15, '2012-03-07 00:00:00', 0, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_pinjaman`
--

CREATE TABLE IF NOT EXISTS `trans_pinjaman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NO_ANGGOTA` varchar(25) NOT NULL,
  `TGL_PINJAM` datetime NOT NULL,
  `BATAS_PENGEMBALIAN` datetime NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `JUMLAH_PINJAMAN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `trans_pinjaman`
--

INSERT INTO `trans_pinjaman` (`ID`, `NO_ANGGOTA`, `TGL_PINJAM`, `BATAS_PENGEMBALIAN`, `USER_ID`, `STATUS`, `JUMLAH_PINJAMAN`) VALUES
(15, '053040047', '2012-03-07 00:00:00', '0000-00-00 00:00:00', 1, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
