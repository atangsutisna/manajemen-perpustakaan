-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2012 at 07:28 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mylibrary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_trans_pengembalian`
--

CREATE TABLE IF NOT EXISTS `detail_trans_pengembalian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PENGEMBALIAN_ID` int(11) NOT NULL,
  `KODE` varchar(40) NOT NULL,
  `STATUS_BUKU` enum('kembali','rusak','hilang') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `detail_trans_pengembalian`
--

INSERT INTO `detail_trans_pengembalian` (`ID`, `PENGEMBALIAN_ID`, `KODE`, `STATUS_BUKU`) VALUES
(26, 21, 'IF0101', 'kembali'),
(25, 21, 'IP5042', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `detail_trans_pinjaman`
--

CREATE TABLE IF NOT EXISTS `detail_trans_pinjaman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PINJAMAN_ID` int(11) NOT NULL,
  `KODE` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `detail_trans_pinjaman`
--

INSERT INTO `detail_trans_pinjaman` (`ID`, `PINJAMAN_ID`, `KODE`) VALUES
(21, 17, 'BS654'),
(20, 17, 'IF456');

-- --------------------------------------------------------

--
-- Table structure for table `mst_anggota`
--

CREATE TABLE IF NOT EXISTS `mst_anggota` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NO_ANGGOTA` varchar(25) NOT NULL,
  `TYPE_ID` int(11) NOT NULL,
  `NAMA_ANGGOTA` varchar(40) NOT NULL,
  `ALAMAT_RUMAH` text NOT NULL,
  `NO_TLP` varchar(20) NOT NULL,
  `KELAS` char(5) NOT NULL,
  `JENIS_KELAMIN` tinyint(1) NOT NULL,
  `STATUS_PINJAMAN` tinyint(1) NOT NULL,
  `STATUS_ANGGOTA` tinyint(1) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `TANGGAL_REGISTRASI` date NOT NULL,
  `BERLAKU_HINGGA` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NO_ANGGOTA` (`NO_ANGGOTA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mst_anggota`
--

INSERT INTO `mst_anggota` (`ID`, `NO_ANGGOTA`, `TYPE_ID`, `NAMA_ANGGOTA`, `ALAMAT_RUMAH`, `NO_TLP`, `KELAS`, `JENIS_KELAMIN`, `STATUS_PINJAMAN`, `STATUS_ANGGOTA`, `image_url`, `TANGGAL_REGISTRASI`, `BERLAKU_HINGGA`) VALUES
(4, '053040074', 1, 'Atang Sutisna ', 'Sukabumi', '08562012414', 'III A', 1, 1, 1, '', '2012-03-25', '2018-03-25'),
(5, '053040047', 1, 'Arief Ikhwani', 'Rancaekek, Bandung', '08100011111', 'III B', 1, 1, 1, 'brew.jpg', '2012-03-25', '2014-03-25'),
(6, '0530400194', 1, 'Ended Kurniawan ', 'Cipecing,  Banten', '022-23845454', 'II', 1, 0, 1, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_buku`
--

CREATE TABLE IF NOT EXISTS `mst_buku` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KLASIFIKASI_ID` char(15) NOT NULL,
  `ISBN_ISSN` varchar(45) NOT NULL,
  `JUDUL_PUSTAKA` varchar(100) NOT NULL,
  `PENGARANG` varchar(35) NOT NULL,
  `PENERBIT` varchar(35) NOT NULL,
  `TEMPAT_TERBIT` varchar(20) NOT NULL,
  `TAHUN_TERBIT` char(20) NOT NULL,
  `EDISI` char(30) NOT NULL,
  `TANGGAL_INPUT` date NOT NULL,
  `LAST_UPDATE` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `mst_buku`
--

INSERT INTO `mst_buku` (`ID`, `KLASIFIKASI_ID`, `ISBN_ISSN`, `JUDUL_PUSTAKA`, `PENGARANG`, `PENERBIT`, `TEMPAT_TERBIT`, `TAHUN_TERBIT`, `EDISI`, `TANGGAL_INPUT`, `LAST_UPDATE`) VALUES
(25, '000', '978-0-470-39509-7', 'Profesional PHP6', 'Alex Fergusen', 'Willey', 'Informatika', '2010', '', '2012-03-22', '0000-00-00 00:00:00'),
(26, '400', '978-0-470-39509-7', 'Bahasa Indonesia untuk karangan ilmiah', 'Tim dosen Pendidikan Bahasa', 'Ummpress', 'Yogyakarta', '2010', '', '2012-03-22', '0000-00-00 00:00:00'),
(59, '000', '455-9789896789-787', 'Jaringan Komputer', 'Atang Sutisna', 'Kasenian Bandung', 'Bandung', '2012', '1', '2012-03-24', '0000-00-00 00:00:00'),
(60, '000', '455-9789896770-787', 'Sistem Operasi', 'Atang Sutisna', 'Informatika', 'Bandung', '2012', '1', '2012-03-24', '0000-00-00 00:00:00'),
(61, '000', '455-9839896789-787', 'Linux for Administrator', 'James Bond', 'Informatika', 'Bandung', '2001', '1', '2012-03-24', '0000-00-00 00:00:00'),
(63, '000', '78-7878-54545', 'MySQL Bible', 'Atang Sutisna', 'Informatika', 'Bandung', '2012', '1', '2012-03-24', '0000-00-00 00:00:00');

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
-- Table structure for table `mst_kolesi_buku`
--

CREATE TABLE IF NOT EXISTS `mst_kolesi_buku` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BUKU_ID` int(11) NOT NULL,
  `KODE` varchar(40) NOT NULL,
  `PENEMPATAN` varchar(10) NOT NULL,
  `TYPE_KOLEKSI` varchar(25) NOT NULL,
  `NO_PESANAN` varchar(45) NOT NULL,
  `TGL_PESANAN` date NOT NULL,
  `TGL_PENERIMAAN` date NOT NULL,
  `PENYEDIA` varchar(45) NOT NULL,
  `FAKTUR` varchar(40) NOT NULL,
  `TGL_FAKTUR` date NOT NULL,
  `HARGA` double NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `LAST_UPDATE` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BUKU_ID` (`BUKU_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_kolesi_buku`
--

INSERT INTO `mst_kolesi_buku` (`ID`, `BUKU_ID`, `KODE`, `PENEMPATAN`, `TYPE_KOLEKSI`, `NO_PESANAN`, `TGL_PESANAN`, `TGL_PENERIMAAN`, `PENYEDIA`, `FAKTUR`, `TGL_FAKTUR`, `HARGA`, `STATUS`, `LAST_UPDATE`) VALUES
(1, 25, 'IF456', '005', 'textbook', '20120322-001', '2012-03-22', '2012-03-25', 'Gramedia', '012-56665656', '2012-03-25', 120000, 1, '2012-03-24 00:00:00'),
(2, 26, 'BS654', '004', 'textbook', '012-56665656', '2012-03-22', '2012-03-25', 'Gramedia', '012-56665656', '2012-03-25', 56000, 1, '2012-03-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_type_anggota`
--

CREATE TABLE IF NOT EXISTS `mst_type_anggota` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_TYPE_KEANGGOTAAN` varchar(20) NOT NULL,
  `LAMA_PINJAMAN` int(11) NOT NULL,
  `LAMA_KEANGGOTAAN` int(11) NOT NULL,
  `DENDA` double NOT NULL,
  `JUMLAH_PINJAMAN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mst_type_anggota`
--

INSERT INTO `mst_type_anggota` (`ID`, `NAMA_TYPE_KEANGGOTAAN`, `LAMA_PINJAMAN`, `LAMA_KEANGGOTAAN`, `DENDA`, `JUMLAH_PINJAMAN`) VALUES
(1, 'standar', 14, 365, 400, 2);

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
(1, 2, 'admin', 'admin123', 'administrator', 'admin@pgri.com', '08562012414');

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
  `KODE` varchar(40) NOT NULL,
  `NO_ANGGOTA` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

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
  `TGL_PINJAMAN` date NOT NULL,
  `TGL_HARUS_KEMBALI` date NOT NULL,
  `TGL_KEMBALI` datetime NOT NULL,
  `TERLAMBAT` int(11) NOT NULL,
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


-- --------------------------------------------------------

--
-- Table structure for table `trans_pinjaman`
--

CREATE TABLE IF NOT EXISTS `trans_pinjaman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NO_ANGGOTA` varchar(25) NOT NULL,
  `TGL_PINJAMAN` datetime NOT NULL,
  `TGL_HARUS_KEMBALI` datetime NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `JUMLAH_PINJAMAN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `trans_pinjaman`
--

INSERT INTO `trans_pinjaman` (`ID`, `NO_ANGGOTA`, `TGL_PINJAMAN`, `TGL_HARUS_KEMBALI`, `USER_ID`, `STATUS`, `JUMLAH_PINJAMAN`) VALUES
(15, '053040047', '2012-03-07 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(17, '053040074', '2012-03-25 00:00:00', '2012-03-28 00:00:00', 1, 0, 2);
