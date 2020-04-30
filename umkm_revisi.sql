-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 10:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm_revisi`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cursor_detail_transaksi` (IN `id` VARCHAR(30))  BEGIN
DECLARE vkode TEXT DEFAULT '' ;
DECLARE charga_produk TEXT DEFAULT '' ;
DECLARE cnama_produk TEXT DEFAULT '' ;
DECLARE hasil TEXT DEFAULT '' ;
DECLARE cjumlah_produk INT(11) ;
DECLARE csubtotal INT(11) ;
DECLARE selesai INT DEFAULT 0;
DECLARE tubes CURSOR FOR
    SELECT DISTINCTROW kode_bayar, tb_produk.nama_produk , tb_produk.harga_produk,  tb_detailtransaksi.jumlah_produk, subtotal 
    FROM tb_detailtransaksi
JOIN tb_produk USING(id_produk) JOIN tb_transaksi USING(id_transaksi)
WHERE id_transaksi = id;
DECLARE CONTINUE HANDLER FOR NOT FOUND
SET selesai = 1;
SET hasil = CONCAT(hasil, '\n', RPAD('Kode_Bayar', 15, ' '),'|', RPAD('Nama_Produk', 15, ' '),'|' ,
 RPAD('Harga_Produk', 15, ' '),'|',RPAD('Jumlah_Produk', 15, ' '),'|' ,RPAD('Subtotal', 15, ' '),'|' , '\n');
OPEN tubes;
WHILE
selesai < 1 DO
FETCH tubes INTO vkode,cnama_produk,charga_produk,cjumlah_produk,csubtotal;
SET hasil = CONCAT(hasil, '\n', RPAD(vkode, 15, ' '),'|', RPAD(cnama_produk, 15, ' '),'|' ,
 RPAD(charga_produk, 15, ' '),'|',RPAD(cjumlah_produk, 15, ' '),'|' ,RPAD(csubtotal, 15, ' '),'|' , '\n');
END WHILE;
CLOSE tubes;
SELECT hasil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pvalidasi_ulasan` (IN `user` VARCHAR(10), IN `produk` VARCHAR(10))  NO SQL
BEGIN
	SELECT id_user,nama_produk FROM tb_user 
    	JOIN tb_transaksi USING(id_user) 	
        JOIN tb_detailtransaksi USING(id_transaksi) 
        JOIN tb_produk using(id_produk)
	WHERE user = tb_transaksi.id_user AND produk=tb_detailtransaksi.id_produk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_detail_transaksi` (IN `kode` VARCHAR(20))  NO SQL
BEGIN
    SELECT tb_produk.foto_produk, tb_produk.nama_produk , tb_detailtransaksi.jumlah_produk, subtotal FROM tb_detailtransaksi
	JOIN tb_produk USING(id_produk) JOIN tb_transaksi USING(id_transaksi)
	WHERE tb_transaksi.kode_bayar = kode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_produk` ()  NO SQL
BEGIN
    SELECT * FROM tb_produk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_produk_sayur` (IN `v_sayur` VARCHAR(10))  NO SQL
BEGIN
    SELECT * FROM tb_produk WHERE jenis_produk = v_sayur;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_single_transaksi` (IN `kode` VARCHAR(20))  NO SQL
BEGIN
    SELECT * FROM tb_transaksi WHERE kode_bayar = fun_kode(kode);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_status` (IN `kode` VARCHAR(20))  NO SQL
BEGIN
    SELECT fun_total_harga(kode) as total_harga_produk,
    	   fun_status(kode) as status
    	   FROM tb_transaksi
	WHERE kode_bayar = kode;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_transaksi_user` (IN `id` VARCHAR(10))  NO SQL
BEGIN
    SELECT * FROM tb_transaksi WHERE id_user = id;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fun_kode` (`kode` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET latin1 NO SQL
    DETERMINISTIC
BEGIN
DECLARE k_bayar VARCHAR(20);
SELECT kode_bayar INTO k_bayar FROM tb_transaksi WHERE kode_bayar = kode;
RETURN k_bayar;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fun_status` (`kode` VARCHAR(60)) RETURNS VARCHAR(60) CHARSET latin1 NO SQL
    DETERMINISTIC
BEGIN
DECLARE status VARCHAR(60);
DECLARE hasil VARCHAR(60);
SELECT IF(id_transaksi IS NOT NULL, 'Benar', 'Salah') INTO status FROM tb_transaksi WHERE kode_bayar=kode;
IF status = 'Benar' THEN
SET hasil = 'Transaksi Berhasil';
ELSE 
SET hasil = 'Transaksi Gagal';
END IF;
RETURN(hasil);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fun_total_harga` (`kode` VARCHAR(20)) RETURNS INT(11) NO SQL
    DETERMINISTIC
BEGIN
DECLARE sum_harga INT;
SELECT SUM(subtotal) INTO sum_harga FROM tb_detailtransaksi
	JOIN tb_transaksi USING(id_transaksi)
	WHERE kode_bayar = kode;
RETURN sum_harga;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul`, `link`) VALUES
(1, 'Kerajinan Tangan', 'https://hot.liputan6.com/read/3928271/kerajinan-fu'),
(2, 'Sayur Mayur', 'https://www.suara.com/tag/sayuran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailtransaksi`
--

INSERT INTO `tb_detailtransaksi` (`id_transaksi`, `id_produk`, `jumlah_produk`, `subtotal`) VALUES
('TRX0001', 'PRD0001', 2, 24000),
('TRX0001', 'PRD0002', 1, 10000),
('TRX0002', 'PRD0001', 2, 24000),
('TRX0002', 'PRD0002', 1, 10000),
('TRX0002', 'PRD0004', 9, 58500),
('TRX0003', 'PRD0001', 12, 144000),
('TRX0004', 'PRD0005', 10, 120000),
('TRX0005', 'PRD0001', 4, 48000),
('TRX0005', 'PRD0009', 7, 42000),
('TRX0006', 'PRD0005', 9, 108000),
('TRX0007', 'PRD0008', 6, 27000),
('TRX0008', 'PRD0002', 1, 10000),
('TRX0008', 'PRD0003', 1, 12000);

--
-- Triggers `tb_detailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `TRG_Produk` AFTER INSERT ON `tb_detailtransaksi` FOR EACH ROW BEGIN
    UPDATE tb_produk SET jumlah_produk = jumlah_produk-NEW.jumlah_produk
        WHERE id_produk = NEW.id_produk;
        
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_komunitas`
--

CREATE TABLE `tb_komunitas` (
  `id_komunitas` varchar(10) NOT NULL,
  `nama_komunitas` varchar(20) NOT NULL,
  `alamat_komunitas` text NOT NULL,
  `deskripsi_komunitas` text NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komunitas`
--

INSERT INTO `tb_komunitas` (`id_komunitas`, `nama_komunitas`, `alamat_komunitas`, `deskripsi_komunitas`, `id_user`) VALUES
('KMT0001', 'Komunitas Sembako', 'Sukapura', 'Menjual Sembako', 'USR0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` varchar(10) NOT NULL,
  `nama_pengiriman` varchar(20) NOT NULL,
  `harga_pengiriman` int(11) NOT NULL,
  `estimasi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `nama_pengiriman`, `harga_pengiriman`, `estimasi_pengiriman`) VALUES
('KRM0001', 'Instantt', 15000, '3 hari sampai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_portofolio`
--

CREATE TABLE `tb_portofolio` (
  `id_portofolio` varchar(10) NOT NULL,
  `judul_portofolio` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_portofolio` date NOT NULL,
  `foto_portofolio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_portofolio`
--

INSERT INTO `tb_portofolio` (`id_portofolio`, `judul_portofolio`, `keterangan`, `tempat`, `tanggal_portofolio`, `foto_portofolio`) VALUES
('PR0001', 'UMKM Terbaik', 'UMKM Terbaik', 'Sukapura', '2020-04-17', '1283116dad3b1e68881784e430816342.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `jenis_produk` varchar(20) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `keterangan_produk` text NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `jenis_produk`, `harga_produk`, `berat_produk`, `keterangan_produk`, `jumlah_produk`, `foto_produk`) VALUES
('PRD0001', 'Minyak Sunco', 'Sembako', 12000, 1000, 'Halal', 84, 'f17444c8384571e200c3748b7e108fee.jpg'),
('PRD0002', 'Beras Jagung', 'Sembako', 10000, 2, 'Minyak ini menggunakan bahan-bahan alami', 99, '7ccaa8583db081d561c18e39367fec43.jpg'),
('PRD0003', 'Nopia', 'Makanan', 12000, 1, 'Makanan enak', 999, 'b5df5b07abd853bb7d0915af8e79ba70.jpg'),
('PRD0004', 'Air Mineral', 'Sembako', 6500, 1, 'Air menyegarkan', 1000, 'a5e1149f7b80eea8375f24e4a24063bd.png'),
('PRD0005', 'Apel', 'Buah', 12000, 1, 'Buah Segar', 81, 'apel.jpg'),
('PRD0006', 'Jambu', 'Buah', 15500, 2, 'Buah Segar', 211, 'jambu.jpg'),
('PRD0007', 'Jeruk', 'Buah', 9500, 1, 'Buah Segar', 102, 'jeruk.jpg'),
('PRD0008', 'Kubis', 'Sayuran', 4500, 1, 'Sayuran tersegar', 794, 'kol.jpg'),
('PRD0009', 'Wortel', 'Sayuran', 6000, 1, 'Sayuran segar', 993, 'wortel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `isi_testimoni` text NOT NULL,
  `tgl_testimoni` date NOT NULL,
  `rating` double(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `id_user`, `id_produk`, `isi_testimoni`, `tgl_testimoni`, `rating`) VALUES
('TST0001', 'USR0003', 'PRD0001', 'mantap', '2020-04-21', 5.0),
('TST0002', 'USR0003', 'PRD0001', 'mantap djiwa', '2020-04-21', 5.5),
('TST0003', 'USR0003', 'PRD0009', 'Produk memiliki kualitas terbaik', '2020-04-25', 5.7),
('TST0004', 'USR0003', 'PRD0008', 'barang bagus', '2020-04-27', 5.5),
('TST0005', 'USR0003', 'PRD0002', 'mantap', '2020-04-30', 5.5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_pengiriman` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_deadline` date NOT NULL,
  `status_transaksi` varchar(20) NOT NULL,
  `kode_bayar` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_pengiriman`, `tanggal_transaksi`, `tanggal_deadline`, `status_transaksi`, `kode_bayar`, `total`) VALUES
('TRX0001', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-18', 'Dikirim', 'wLb082116097045', 49000),
('TRX0002', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-18', 'Dikirim', 'bup082116097045', 107500),
('TRX0003', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-20', 'Dikirim', 'xFj082116097045', 159000),
('TRX0004', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-21', 'Dikirim', 'ng6082116097045', 135000),
('TRX0005', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-26', 'Dikirim', 'msF082116097045', 105000),
('TRX0006', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-28', 'Dikirim', 'Uod082116097045', 123000),
('TRX0007', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-28', 'Dikirim', 'lNh082116097045', 42000),
('TRX0008', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-28', 'Dikirim', '85G082116097045', 37000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `id_umkm` varchar(10) NOT NULL,
  `nama_umkm` varchar(20) NOT NULL,
  `alamat_umkm` text NOT NULL,
  `id_komunitas` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_umkm`
--

INSERT INTO `tb_umkm` (`id_umkm`, `nama_umkm`, `alamat_umkm`, `id_komunitas`, `id_user`) VALUES
('UKM0001', 'UMKM Sembako', 'Sukapura', 'KMT0001', 'USR0002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `provinsi` varchar(15) NOT NULL,
  `kota` varchar(15) NOT NULL,
  `kecamatan` varchar(15) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `level` enum('UMKM','Komunitas','Admin','User') NOT NULL,
  `foto_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `email`, `no_telepon`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat`, `tgl_daftar`, `status`, `level`, `foto_user`) VALUES
('USR0001', 'admin1', '202cb962ac59075b964b07152d234b70', 'WIDYA ARUM AMALIA', 'widyaarumamalia95@gmail.c', '', '', '', '', '', 'Sukapura', '0000-00-00', 'verified', 'Komunitas', ''),
('USR0002', 'soleh', '202cb962ac59075b964b07152d234b70', 'Soleh', 'soleh@gmail.com', '', '', '', '', '', '', '0000-00-00', 'pending', 'UMKM', ''),
('USR0003', 'rafif', '202cb962ac59075b964b07152d234b70', 'Rafif Yusuf Avandy', 'rafifyusuf@gmail.com', '082116097045', 'Jawa Barat', 'Bandung', 'Bojongsoang', '40288', 'Komplek Bojong Soang Asri 1', '2020-04-17', 'Terverifikasi', 'User', '262068fb3f2f21324349f5757b4cc3cd.png'),
('USR0004', 'ashiap', '$2y$10$dHhMFMPMRC8u7JjJNhy1Ou1LDKMEybXItNrPkIHDFHEZIrMFEJZja', '', '', '', '', '', '', '', '', '2020-04-22', 'Belum terverifikasi', 'User', ''),
('USR0005', 'stephen', '202cb962ac59075b964b07152d234b70', '', '', '', '', '', '', '', '', '2020-04-30', 'Belum terverifikasi', 'User', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id_wishlist` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id_wishlist`, `id_user`, `id_produk`) VALUES
('WHS0001', 'USR0003', 'PRD0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD PRIMARY KEY (`id_komunitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  ADD PRIMARY KEY (`id_portofolio`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`,`id_pengiriman`),
  ADD KEY `id_pengiriman` (`id_pengiriman`);

--
-- Indexes for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `id_komunitas` (`id_komunitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD CONSTRAINT `tb_detailtransaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detailtransaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD CONSTRAINT `tb_komunitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `tb_testimoni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_testimoni_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `tb_pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD CONSTRAINT `tb_umkm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_umkm_ibfk_2` FOREIGN KEY (`id_komunitas`) REFERENCES `tb_komunitas` (`id_komunitas`);

--
-- Constraints for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD CONSTRAINT `tb_wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
