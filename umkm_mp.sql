-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2020 pada 04.25
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
-- Database: `umkm_mp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sub_judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul`, `sub_judul`, `keterangan`, `gambar`, `link`) VALUES
(1, 'Kerajinan Tangan', 'Kerajinan', 'Kerajinan Tangan adalah menciptakan suatu produk atau barang yang dilakukan oleh tangan dan memiliki fungsi pakai atau keindahan sehingga memiliki nilai jual. Kerajinan tangan yang memiliki kualitas tinggi tentu harganya akan mahal, jika kalian memiliki keterampilan dan berusaha untuk membuat suatu produk mungkin dengan kerajinan yang akan anda miliki bisa menjadi suatu usaha yang menjanjikan.', 'kerajinan.jpg', 'https://hot.liputan6.com/read/3928271/kerajinan-fungsi-hias-bahan-dan-unsur-pentingnya-yang-bernilai-estetik'),
(2, 'Sayur Mayur', 'Sayur', 'Sayuran merupakan sebutan umum bagi bahan pangan asal tumbuhan yang biasanya mengandung kadar air tinggi dan dikonsumsi dalam keadaan segar atau setelah diolah secara minimal. Sebutan untuk beraneka jenis sayuran disebut sebagai sayur-sayuran atau sayur-mayur.', 'sayuran.jpg', 'https://www.suara.com/tag/sayuran');

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
('KMT0002', 'Komunitas PBB', 'PBB', 'Komunitas penjualan pakan ternak', 'USR0007');

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
('KRM001', 'Instant', '15000', '3 hari sampai');

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
('PR001', 'Sertifikat UMKM terbaik', 'UMKM Terbaik', 'Sukapura', '2020-03-10', '4d344c7cabc528b026ba9ff75b384a00.png'),
('PR002', 'Sertifikat UMKM inovatif', 'UMKM Inovatiff', 'Sukapur', '2020-03-20', '0a5d96f0025caa102036e673a723fd1b.png');

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
('PRD01', 'Beras Jagung', 'Sembako', 60000, 5, 'Halal', '15', '7ccaa8583db081d561c18e39367fec43.jpg'),
('PRD02', 'Minyak Sunco', 'Sembako', 12000, 1, 'Minyak ini menggunakan bahan-bahan alami', '100', 'f17444c8384571e200c3748b7e108fee.jpg'),
('PRD03', 'Nopia', 'Makanan', 12000, 500, 'Halal', '100', 'b5df5b07abd853bb7d0915af8e79ba70.jpg'),
('PRD04', 'Air Mineral', 'Sembako', 29000, 500, 'Halal', '100', 'a5e1149f7b80eea8375f24e4a24063bd.png'),
('PRD05', 'Apel', 'Buah', 12000, 1, 'Buah segar', '100', 'apel.jpg'),
('PRD06', 'Jambu', 'Buah', 11000, 1, 'Buah Segar', '120', 'jambu.jpg'),
('PRD07', 'Jeruk', 'Buah', 45000, 1, 'Buah segar', '300', 'jeruk.jpg'),
('PRD08', 'Kubis', 'Sayuran', 9000, 1, 'Sayuran segar', '400', 'kol.jpg'),
('PRD09', 'Wortel', 'Sayuran', 14000, 1, 'Sayuran segar', '100', 'wortel.jpg');

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

--
-- Dumping data untuk tabel `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `id_user`, `id_produk`, `isi_testimoni`, `tgl_testimoni`, `rating`) VALUES
('TST0001', 'USR0003', 'PRD02', 'Barang Bagus', '2020-03-03', 5),
('TST0002', 'USR0006', 'PRD04', 'Rapih', '2020-03-04', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_pengiriman` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_pengiriman` varchar(255) NOT NULL,
  `harga_pengiriman` varchar(255) NOT NULL,
  `status_transaksi` varchar(255) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `jumlah_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_produk`, `id_pengiriman`, `tgl_transaksi`, `nama_pengiriman`, `harga_pengiriman`, `status_transaksi`, `kode_bayar`, `nama_produk`, `jenis_produk`, `foto_produk`, `jumlah_produk`, `harga_produk`, `sub_total`) VALUES
('TRX0001', 'USR0002', 'PRD01', 'KRM0001', '2020-03-18', 'JNT', '20000', 'pengiriman', 'A2UZ8IEJ4K', 'Minyak Sunco', '', '', '1', '', '500000');

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
('USR0001', 'widyaarumamalia', '202cb962ac59075b964b07152d234b70', 'WIDYA ARUM AMALIA', 'widyaarumamalia95@gmail.com', '', '', '', '', '', '', '', 'pending', 'UMKM', ''),
('USR0002', 'soleh', '202cb962ac59075b964b07152d234b70', 'Soleh', 'soleh@gmail.com', '', '', '', '', '', '', '', 'pending', 'UMKM', ''),
('USR0003', 'sidamakmur', '202cb962ac59075b964b07152d234b70', 'Rohmadi', 'rohmadi@gmail.com', '', '', '', '', '', '', '', 'pending', 'UMKM', ''),
('USR0006', 'ana', '202cb962ac59075b964b07152d234b70', 'Anaa ', 'ana@gmail.com', '', '', '', '', '', '', '', 'pending', 'UMKM', 'WIN_20191227_22_40_55_Pro.jpg'),
('USR0007', 'rudi', '202cb962ac59075b964b07152d234b70', 'rudi', 'rudi@dmail.com', '', '', '', '', '', '', '', 'verified', '', ''),
('USR0009', 'rafif', '$2y$10$RESdH/za/GGW93sg/pPzNuruckVcuCsyP6bq35ED0edSQ8f3qjvOC', 'Rafif Yusuf', 'rafifyusuf@gmail.com', '082116097045', 'Jawa Barat', 'Bandung', 'Bojongsoang', '40288', 'komplek Bojong soang asri 1', '2020-03-22 12:54:05', 'Terverifikasi', 'User', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id_wishlist` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id_wishlist`, `id_user`, `id_produk`, `jenis_produk`, `harga_produk`, `foto_produk`) VALUES
('WSL001', 'USR0001', 'PRD01', 'Sembako', 50000, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

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
  ADD KEY `id_user` (`id_user`,`id_produk`,`id_pengiriman`),
  ADD KEY `id_produk` (`id_produk`);

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
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD CONSTRAINT `tb_umkm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_umkm_ibfk_2` FOREIGN KEY (`id_komunitas`) REFERENCES `tb_komunitas` (`id_komunitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD CONSTRAINT `tb_wishlist_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_wishlist_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
