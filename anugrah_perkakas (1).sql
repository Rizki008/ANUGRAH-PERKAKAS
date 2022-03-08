-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2021 pada 17.20
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anugrah_perkakas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `harga` varchar(128) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_supplier`, `id_kategori`, `stock`, `harga`, `gambar`) VALUES
(1, 'kursi', 1, 3, 50, '50000', 'Rukia_Kuchiki.png'),
(2, 'lemari', 1, 2, 97, '20600', 'toshiro_hitsugaya_Cosplay_Photos.gif'),
(3, 'kayu jati', 2, NULL, 100, '50000', 'Bleach_Anime_Photo__Bleach_Funny.jpg'),
(4, 'kayu mahoni', 2, NULL, 100, '50000', 'Rukia_Kuchiki1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_customer`
--

CREATE TABLE `barang_customer` (
  `id_barang_customer` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_customer`
--

INSERT INTO `barang_customer` (`id_barang_customer`, `id_pesanan`) VALUES
(1, 4),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_toko`
--

CREATE TABLE `barang_toko` (
  `id_barang_toko` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_toko`
--

INSERT INTO `barang_toko` (`id_barang_toko`, `id_pesanan`, `id_barang`) VALUES
(1, 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `no_tlpn` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `no_pesanan` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `nama_kategori` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_supplier`, `nama_kategori`) VALUES
(1, 1, 'kayu mahoni'),
(2, 1, 'kayu jati'),
(3, 1, 'kayu arbise');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `no_pesanan` varchar(128) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status_pesan` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_barang`, `status`, `no_pesanan`, `tgl_pesan`, `qty`, `status_pesan`, `total_bayar`, `grand_total`, `bukti_bayar`, `status_bayar`, `jumlah_bayar`, `catatan`) VALUES
(1, 1, 1, 'admin', '20211106AI1OAI08', '2021-11-06', 3, 0, NULL, NULL, NULL, 0, NULL, NULL),
(2, 1, 2, 'admin', '20211106YAI5DPH8', '2021-11-06', 7, 3, NULL, NULL, 'Gud0c_on_Twitter2.jpg', 1, 12132131, NULL),
(3, 2, 2, 'customer', '20211106OYYEL9O8', '2021-11-06', 3, 3, NULL, NULL, 'Ichigo_Bleach_Amigurumi1.png', 1, 120000, NULL),
(4, 2, 2, 'customer', '202111067INKGC1Z', '2021-11-06', 3, 3, NULL, NULL, 'Ichigo_Bleach_Amigurumi2.png', 1, 123455, NULL),
(5, 1, 2, 'admin', '20211108NFCSMVIR', '2021-11-08', 3, 2, NULL, NULL, 'Gud0c_on_Twitter3.jpg', 1, 120000, NULL);

--
-- Trigger `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_barang` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN 
UPDATE barang SET stock = stock-NEW.qty
WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(60) DEFAULT NULL,
  `no_rekening` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama`, `nama_bank`, `no_rekening`) VALUES
(1, 'irfan', 'BRI', '125014578145214');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `no_tlpn` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `no_tlpn`, `alamat`, `email`, `password`, `status`, `gambar`) VALUES
(1, 'UD manon jaya', 2147483647, 'jakarta', 'jaya@gmail.com', '123456789', 'supplier', 'Rukia_Kuchiki4.png'),
(2, 'sinarmas', 2147483647, 'sindang barang', 'samsula@gmail.com', '12345', 'supplier', NULL),
(3, 'sejahtra bersama', 2147483647, 'sindang barang', 'samsul@gmail.com', '12345', 'supplier', 'Gud0c_on_Twitter1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `no_tlpn` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_tlpn`, `alamat`, `email`, `password`, `status`, `gambar`) VALUES
(1, 'irfan', '085746985475', 'ciwaru kuningan', 'irfan@gmail.com', '123456789', 'admin', 'Rukia_Kuchiki.png'),
(2, 'jamal', '085156727368', 'cipicung kuningan', 'jamal@gmail.com', '123456789', 'customer', 'toshiro_hitsugaya_Cosplay_Photos.gif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_customer`
--
ALTER TABLE `barang_customer`
  ADD PRIMARY KEY (`id_barang_customer`);

--
-- Indeks untuk tabel `barang_toko`
--
ALTER TABLE `barang_toko`
  ADD PRIMARY KEY (`id_barang_toko`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang_customer`
--
ALTER TABLE `barang_customer`
  MODIFY `id_barang_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_toko`
--
ALTER TABLE `barang_toko`
  MODIFY `id_barang_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
