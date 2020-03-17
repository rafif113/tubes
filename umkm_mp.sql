-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2020 pada 11.20
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
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul`, `sub_judul`, `keterangan`, `gambar`) VALUES
(1, 'Kerajinan Tangan', 'Kerajinan', 'Kerajinan Tangan adalah menciptakan suatu produk atau barang yang dilakukan oleh tangan dan memiliki fungsi pakai atau keindahan sehingga memiliki nilai jual. Kerajinan tangan yang memiliki kualitas tinggi tentu harganya akan mahal, jika kalian memiliki keterampilan dan berusaha untuk membuat suatu produk mungkin dengan kerajinan yang akan anda miliki bisa menjadi suatu usaha yang menjanjikan', 'kerajinan.jpg'),
(2, 'Sayur Mayur', 'Sayur', 'Sayuran merupakan sebutan umum bagi bahan pangan asal tumbuhan yang biasanya mengandung kadar air tinggi dan dikonsumsi dalam keadaan segar atau setelah diolah secara minimal. Sebutan untuk beraneka jenis sayuran disebut sebagai sayur-sayuran atau sayur-mayur.', 'sayuran.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komunitas`
--

CREATE TABLE `tb_komunitas` (
  `id_komunitas` varchar(255) NOT NULL,
  `nama_komunitas` varchar(255) NOT NULL,
  `alamat_komunitas` varchar(255) NOT NULL,
  `deskripsi_komunitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komunitas`
--

INSERT INTO `tb_komunitas` (`id_komunitas`, `nama_komunitas`, `alamat_komunitas`, `deskripsi_komunitas`) VALUES
('KMS001', 'Rona Roni', 'Sukabirus', 'Komunitas ini menjuali produk beras dari beras ketan, merah dan beras kuning'),
('KMS003', 'Tela', 'Banyumas', 'Komunitas ini merupakan komunitas yang menjual berbagai macam produk ketela');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paguyuban`
--

CREATE TABLE `tb_paguyuban` (
  `id_paguyuban` varchar(255) NOT NULL,
  `nama_paguyuban` varchar(255) NOT NULL,
  `alamat_paguyuban` varchar(255) NOT NULL,
  `deskripsi_paguyuban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('KRM001', 'Instant', '19000', '3 hari sampai'),
('KRM002', 'Ekspres', '17000', '3 hari sampai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portofolio`
--

CREATE TABLE `tb_portofolio` (
  `id_portofolio` varchar(255) NOT NULL,
  `judul_portofolio` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal_portofolio` varchar(255) NOT NULL,
  `foto_portofolio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_portofolio`
--

INSERT INTO `tb_portofolio` (`id_portofolio`, `judul_portofolio`, `keterangan`, `tempat`, `tanggal_portofolio`, `foto_portofolio`) VALUES
('PR001', 'UMKM', 'UMKM Inovatif', 'Banyumas', '15-02-2020', '6fac1c03033f10c354f8ce3bba31ff19.png'),
('PR002', 'UMKM Terbaik', 'UMKM Terbaik', 'KAB. BANYUMAS', '20-02-2020', '2bf531dde6110e136f868ef7a82948d4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
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

INSERT INTO `tb_produk` (`id_produk`, `id_umkm`, `nama_produk`, `jenis_produk`, `harga_produk`, `berat_produk`, `keterangan_produk`, `stok_produk`, `foto_produk`) VALUES
(2, 8, 'Wortel', 'Sayuran', 25000, 1, 'Sayuran Segar', '9', 'wortel.jpg'),
(3, 8, 'Kubis', 'Sayuran', 12000, 1, 'Sayuran Segar', '100', 'kol.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `isi_testimoni` varchar(255) NOT NULL,
  `tgl_testimoni` datetime NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengiriman` varchar(255) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_deadline` datetime NOT NULL,
  `nama_pengiriman` varchar(255) NOT NULL,
  `harga_pengiriman` varchar(255) NOT NULL,
  `estimasi_pengiriman` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat_umkm` varchar(255) NOT NULL,
  `id_komunitas` varchar(255) NOT NULL,
  `foto_umkm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_umkm`
--

INSERT INTO `tb_umkm` (`id_umkm`, `nama_umkm`, `email`, `username`, `password`, `alamat_umkm`, `id_komunitas`, `foto_umkm`) VALUES
(8, 'TOKO SOLEH', 'soleh@gmail.com', 'soleh', '202cb962ac59075b964b07152d234b70', 'Banyumas', '', '');

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
  `tgl_daftar` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `level` enum('UMKM','Komunitas','Admin','User') DEFAULT NULL,
  `foto_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `email`, `no_telepon`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat`, `tgl_daftar`, `status`, `level`, `foto_user`) VALUES
('USR0001', 'rafif', '$2y$10$tjTIg0ctRw4uvi3.jvnjOOGyyndZd5mjAtSjGMih8FCdmveNR0qAy', 'Rafif Yusuf', 'rafifyusuf@gmail.com', '082116097045', 'Jawa Barat', 'Bandung', 'Bojongsoang', '40288', 'komplek Bojong soang asri 1', '2020-03-09 03:06:01', 'Terverifikasi', 'User', ''),
('USR0002', 'alex', '$2y$10$Ql81uSY6U8h9Y/phMMfbTuMAn3FN4B7e0TCGAVQxCzm8f0XvAXi2W', 'Alex Stephen', 'ajax@gmail.com', '082117237281', 'Belanda', 'Ajax', 'Bornv', '408991', 'Ajax Street 12', '2020-03-09 06:25:45', 'Terverifikasi', 'User', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id_wishlist` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indeks untuk tabel `tb_paguyuban`
--
ALTER TABLE `tb_paguyuban`
  ADD PRIMARY KEY (`id_paguyuban`);

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
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pengiriman` (`id_pengiriman`);

--
-- Indeks untuk tabel `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD KEY `id_user` (`id_user`),
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
-- AUTO_INCREMENT untuk tabel `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `tb_umkm` (`id_umkm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `tb_testimoni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_testimoni_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_pengiriman`) REFERENCES `tb_pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE;

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
