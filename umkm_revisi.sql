-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2020 pada 18.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

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
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `view_detail_transaksi` (IN `kode` VARCHAR(20))  NO SQL
BEGIN
    SELECT tb_detailtransaksi.* , tb_produk.* FROM tb_detailtransaksi
	JOIN tb_produk USING(id_produk) JOIN tb_transaksi USING(id_transaksi)
	WHERE kode_bayar = fun_kode(kode);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_produk` ()  NO SQL
BEGIN
    SELECT * FROM tb_produk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_produk_sayur` (IN `v_sayur` VARCHAR(10))  NO SQL
BEGIN
    SELECT * FROM tb_produk WHERE jenis_produk = v_sayur;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_transaksi` (IN `kode` VARCHAR(20))  NO SQL
BEGIN
    SELECT * FROM tb_transaksi WHERE kode_bayar = fun_kode(kode);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_total_harga_produk` (IN `kode` VARCHAR(20))  NO SQL
BEGIN
    SELECT SUM(subtotal) as total_harga_produk FROM tb_detailtransaksi
	JOIN tb_transaksi USING(id_transaksi)
	WHERE kode_bayar = fun_kode(kode);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_transaksi_user` (IN `id` VARCHAR(10))  NO SQL
BEGIN
    SELECT * FROM tb_transaksi WHERE id_user = id;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fun_kode` (`kode` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET latin1 NO SQL
    DETERMINISTIC
BEGIN
DECLARE k_bayar VARCHAR(20);
SELECT kode_bayar INTO k_bayar FROM tb_transaksi WHERE kode_bayar = kode;
RETURN k_bayar;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sub_judul` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Kesalahan membaca data untuk tabel umkm_revisi.tb_artikel: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `umkm_revisi`.`tb_artikel`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailtransaksi`
--

INSERT INTO `tb_detailtransaksi` (`id_transaksi`, `id_produk`, `jumlah_produk`, `subtotal`) VALUES
('TRX0001', 'PRD0001', 2, 24000),
('TRX0001', 'PRD0002', 1, 10000),
('TRX0002', 'PRD0001', 2, 24000),
('TRX0002', 'PRD0002', 1, 10000),
('TRX0002', 'PRD0004', 9, 58500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komunitas`
--

CREATE TABLE `tb_komunitas` (
  `id_komunitas` varchar(255) NOT NULL,
  `nama_komunitas` varchar(255) NOT NULL,
  `alamat_komunitas` varchar(255) NOT NULL,
  `deskripsi_komunitas` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komunitas`
--

INSERT INTO `tb_komunitas` (`id_komunitas`, `nama_komunitas`, `alamat_komunitas`, `deskripsi_komunitas`, `id_user`) VALUES
('KMT0001', 'Komunitas Sembako', 'Sukapura', 'Menjual Sembako', 'USR0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` varchar(255) NOT NULL,
  `nama_pengiriman` varchar(255) NOT NULL,
  `harga_pengiriman` varchar(255) NOT NULL,
  `estimasi_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `nama_pengiriman`, `harga_pengiriman`, `estimasi_pengiriman`) VALUES
('KRM0001', 'Instantt', '15000', '3 hari sampai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portofolio`
--

CREATE TABLE `tb_portofolio` (
  `id_portofolio` varchar(255) NOT NULL,
  `judul_portofolio` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal_portofolio` date NOT NULL,
  `foto_portofolio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_portofolio`
--

INSERT INTO `tb_portofolio` (`id_portofolio`, `judul_portofolio`, `keterangan`, `tempat`, `tanggal_portofolio`, `foto_portofolio`) VALUES
('PR0001', 'UMKM Terbaik', 'UMKM Terbaik', 'Sukapura', '2020-04-17', '1283116dad3b1e68881784e430816342.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `keterangan_produk` varchar(255) NOT NULL,
  `stok_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `jenis_produk`, `harga_produk`, `berat_produk`, `keterangan_produk`, `stok_produk`, `foto_produk`) VALUES
('PRD0001', 'Minyak Sunco', 'Sembako', 12000, 1000, 'Halal', '100', 'f17444c8384571e200c3748b7e108fee.jpg'),
('PRD0002', 'Beras Jagung', 'Sembako', 10000, 2, 'Minyak ini menggunakan bahan-bahan alami', '100', '7ccaa8583db081d561c18e39367fec43.jpg'),
('PRD0003', 'Nopia', 'Makanan', 12000, 1, 'Makanan enak', '1000', 'b5df5b07abd853bb7d0915af8e79ba70.jpg'),
('PRD0004', 'Air Mineral', 'Sembako', 6500, 1, 'Air menyegarkan', '1000', 'a5e1149f7b80eea8375f24e4a24063bd.png'),
('PRD0005', 'Apel', 'Buah', 12000, 1, 'Buah Segar', '100', 'apel.jpg'),
('PRD0006', 'Jambu', 'Buah', 15500, 2, 'Buah Segar', '211', 'jambu.jpg'),
('PRD0007', 'Jeruk', 'Buah', 9500, 1, 'Buah Segar', '102', 'jeruk.jpg'),
('PRD0008', 'Kubis', 'Sayuran', 4500, 1, 'Sayuran tersegar', '800', 'kol.jpg'),
('PRD0009', 'Wortel', 'Sayuran', 6000, 1, 'Sayuran segar', '1000', 'wortel.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `isi_testimoni` varchar(255) NOT NULL,
  `tgl_testimoni` date NOT NULL,
  `rating` double(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_pengiriman` varchar(255) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_deadline` date NOT NULL,
  `status_transaksi` varchar(255) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_pengiriman`, `tanggal_transaksi`, `tanggal_deadline`, `status_transaksi`, `kode_bayar`, `total`) VALUES
('TRX0001', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-18', 'Dikirim', 'wLb082116097045', '49000'),
('TRX0002', 'USR0003', 'KRM0001', '0000-00-00', '2020-04-18', 'Dikirim', 'bup082116097045', '107500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `id_umkm` varchar(255) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `alamat_umkm` varchar(255) NOT NULL,
  `id_komunitas` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_umkm`
--

INSERT INTO `tb_umkm` (`id_umkm`, `nama_umkm`, `alamat_umkm`, `id_komunitas`, `id_user`) VALUES
('UKM0001', 'UMKM Sembako', 'Sukapura', 'KMT0001', 'USR0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_daftar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `level` enum('UMKM','Komunitas','Admin','User') NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `email`, `no_telepon`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat`, `tgl_daftar`, `status`, `level`, `foto_user`) VALUES
('USR0001', 'admin1', '202cb962ac59075b964b07152d234b70', 'WIDYA ARUM AMALIA', 'widyaarumamalia95@gmail.com', '', '', '', '', '', 'Sukapura', '', 'verified', 'Komunitas', ''),
('USR0002', 'soleh', '202cb962ac59075b964b07152d234b70', 'Soleh', 'soleh@gmail.com', '', '', '', '', '', '', '', 'pending', 'UMKM', ''),
('USR0003', 'rafif', '$2y$10$aVKqrIEZBre4WQYBmnBAj.7GSBr3Y5wUlJi2HKKXif2Jbfh.7Lyqi', 'RAFIF YUSUF AVANDY', 'rafifyusuf@gmail.com', '082116097045', 'Jawa Barat', 'Bandung', 'Bojongsoang', '40288', 'Komplek Bojong soang asri 1', '2020-04-17 04:06:53', 'Terverifikasi', 'User', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id_wishlist` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id_wishlist`, `id_user`, `id_produk`) VALUES
('WHS0001', 'USR0003', 'PRD0001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD PRIMARY KEY (`id_komunitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  ADD PRIMARY KEY (`id_portofolio`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`,`id_pengiriman`),
  ADD KEY `id_pengiriman` (`id_pengiriman`);

--
-- Indeks untuk tabel `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `id_komunitas` (`id_komunitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD CONSTRAINT `tb_detailtransaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detailtransaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_komunitas`
--
ALTER TABLE `tb_komunitas`
  ADD CONSTRAINT `tb_komunitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `tb_testimoni_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_testimoni_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pengiriman`) REFERENCES `tb_pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD CONSTRAINT `tb_umkm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_umkm_ibfk_2` FOREIGN KEY (`id_komunitas`) REFERENCES `tb_komunitas` (`id_komunitas`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD CONSTRAINT `tb_wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
