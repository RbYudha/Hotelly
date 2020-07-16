-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2020 pada 05.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelly`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambilbarang`
--

CREATE TABLE `ambilbarang` (
  `id_ambil` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_ambil` int(128) NOT NULL,
  `date_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ambilbarang`
--

INSERT INTO `ambilbarang` (`id_ambil`, `id_employee`, `id_barang`, `jumlah_ambil`, `date_ambil`) VALUES
(114, 1004, 111, 10, '2020-02-15'),
(115, 1004, 112, 19, '2020-01-20'),
(116, 1004, 113, 20, '2020-01-20'),
(117, 1004, 211, 100, '2020-01-20'),
(118, 1004, 212, 5, '2020-01-20'),
(119, 1004, 213, 5, '2020-01-20'),
(121, 1004, 311, 40, '2020-01-20'),
(122, 1004, 312, 15, '2020-01-20'),
(123, 1004, 411, 25, '2020-01-20'),
(124, 1004, 412, 9, '2020-01-20'),
(125, 1004, 511, 31, '2020-01-20'),
(127, 1004, 213, 12, '2020-02-15'),
(128, 1004, 214, 21, '2020-01-20'),
(132, 1004, 211, 50, '2020-02-15');

--
-- Trigger `ambilbarang`
--
DELIMITER $$
CREATE TRIGGER `ambil_barang` AFTER INSERT ON `ambilbarang` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-NEW.jumlah_ambil
WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_barang` int(128) NOT NULL,
  `stok` int(128) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok`, `id_kategori`) VALUES
(111, 'Handuk', 75000, 680, 1),
(112, 'Bantal', 120000, 320, 1),
(113, 'Guling', 80500, 219, 1),
(211, 'Sabun', 9000, 530, 2),
(212, 'Shampo', 7500, 115, 2),
(213, 'Sikat gigi', 8000, 193, 2),
(214, 'Pasta gigi', 4500, 259, 2),
(311, 'Cocoa bar', 55000, 220, 3),
(312, 'Candy', 35000, 305, 3),
(411, 'Fanta', 15000, 340, 4),
(412, 'Cola', 16000, 179, 4),
(511, 'Kopi bubuk', 3500, 279, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `baranghilang`
--

CREATE TABLE `baranghilang` (
  `id_hilang` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `jumlah_hilang` int(11) NOT NULL,
  `date_hilang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `baranghilang`
--

INSERT INTO `baranghilang` (`id_hilang`, `id_employee`, `id_barang`, `no_kamar`, `jumlah_hilang`, `date_hilang`) VALUES
(502, 1004, 112, 101, 1, '2020-07-02'),
(503, 1004, 112, 100, 5, '2020-02-15'),
(504, 1004, 311, 101, 5, '2020-01-22'),
(505, 1004, 411, 200, 5, '2020-07-18'),
(506, 1004, 113, 301, 1, '2020-07-04'),
(507, 1004, 412, 103, 2, '2020-02-22'),
(508, 1004, 112, 103, 1, '2020-07-04');

--
-- Trigger `baranghilang`
--
DELIMITER $$
CREATE TRIGGER `barang_hilang` AFTER INSERT ON `baranghilang` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-NEW.jumlah_hilang
WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `name_employee` varchar(128) NOT NULL,
  `email_employee` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id_employee`, `name_employee`, `email_employee`, `image`, `password`, `id_role`, `is_active`, `date_created`) VALUES
(1001, 'Raden Bagoes Yudha Rangga', 'RBYR@gmail.com', 'default.jpg', '$2y$10$o70Y6QmsDS47me8XKvFLo.fqmoVXSLtktPDufuZWt/7E1EGQGkdqS', 1, 1, '2005-06-20'),
(1004, 'Rangga Sanjaya', 'Rangga@gmail.com', 'default.jpg', '$2y$10$gjF86FvHYS/kA/YEp7E2uui6ErWTdSi.ApImqFpRpzOvM8ClhDQYO', 2, 1, '2015-06-19'),
(1008, 'Yogi Nadianto', 'yogi@gmail.com', 'default.jpg', '$2y$10$gjF86FvHYS/kA/YEp7E2uui6ErWTdSi.ApImqFpRpzOvM8ClhDQY123', 2, 1, '2020-07-04'),
(1009, 'Mario', 'Mario@gmail.com', 'default.jpg', '$2y$10$1E1KEvhtX.8fk3sgTeHFUeTH2bMSWWEM2StV.14pxa8pYv47x8GvW', 2, 1, '2020-07-04'),
(1011, 'Jon jones', 'jon@gmail.com', 'default.jpg', '$2y$10$b7/nGo7DH7BUjSiUwjrfJO6mh3NQBQn4/rmuUoJcSitpR7rfSsJRS', 2, 1, '2020-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` int(11) NOT NULL,
  `id_kategori_kmr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `id_kategori_kmr`) VALUES
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(200, 2),
(201, 2),
(202, 2),
(300, 3),
(301, 3),
(302, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `name_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `name_kategori`) VALUES
(1, 'Keperluan Kamar'),
(2, 'Hygiene Products'),
(3, 'Snacks'),
(4, 'Beverages'),
(5, 'Sachet (consumable)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kamar`
--

CREATE TABLE `kategori_kamar` (
  `id_kategori_kmr` int(11) NOT NULL,
  `nama_kategori_kmr` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_kamar`
--

INSERT INTO `kategori_kamar` (`id_kategori_kmr`, `nama_kategori_kmr`) VALUES
(1, 'Standard'),
(2, 'Superior'),
(3, 'Deluxe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_order` int(128) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_employee`, `id_barang`, `jumlah_order`, `date_order`) VALUES
(17, 1004, 212, 200, '2020-01-03'),
(18, 1004, 211, 200, '2020-01-03'),
(19, 1008, 511, 200, '2020-02-03'),
(22, 1009, 214, 200, '2020-03-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Manajer'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokingbarang`
--

CREATE TABLE `stokingbarang` (
  `id_stoking` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_barang` int(128) NOT NULL,
  `harga_pcs` int(11) NOT NULL,
  `transaksi` int(128) NOT NULL,
  `date_stoking` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stokingbarang`
--

INSERT INTO `stokingbarang` (`id_stoking`, `id_employee`, `id_barang`, `stok_barang`, `harga_pcs`, `transaksi`, `date_stoking`) VALUES
(205, 1004, 111, 200, 40000, 8000000, '2020-01-22'),
(207, 1004, 113, 230, 80500, 18515000, '2020-01-22'),
(208, 1004, 112, 100, 120000, 12000000, '2020-01-23'),
(215, 1004, 111, 50, 45000, 2250000, '2020-02-26'),
(218, 1004, 412, 20, 16000, 320000, '2020-02-02'),
(219, 1004, 112, 20, 120000, 2400000, '2020-02-02'),
(221, 1004, 111, 70, 45000, 3150000, '2020-03-08'),
(222, 1004, 211, 100, 9000, 900000, '2020-01-02'),
(223, 1004, 212, 20, 7500, 150000, '2020-01-05'),
(224, 1004, 213, 10, 8000, 80000, '2020-01-01'),
(225, 1004, 214, 80, 4500, 360000, '2020-01-02'),
(226, 1004, 311, 10, 55000, 550000, '2020-01-01'),
(227, 1004, 312, 20, 35000, 700000, '2020-01-05'),
(228, 1004, 411, 20, 15000, 300000, '2020-01-01'),
(229, 1004, 412, 100, 16000, 1600000, '2020-01-04'),
(230, 1004, 511, 10, 3500, 35000, '2020-01-08'),
(231, 1004, 113, 10, 80500, 805000, '2020-02-04'),
(234, 1004, 111, 400, 40000, 16000000, '2020-04-04'),
(240, 1004, 112, 20, 110000, 2200000, '2020-03-10'),
(241, 1004, 112, 50, 110000, 5500000, '2020-04-05'),
(242, 1004, 213, 100, 8000, 800000, '2020-02-20'),
(243, 1004, 211, 150, 9000, 1350000, '2020-02-02'),
(244, 1004, 111, 50, 45000, 2250000, '2020-03-02'),
(250, 1004, 211, 80, 9800, 784000, '2020-03-02'),
(251, 1004, 211, 50, 9500, 475000, '2020-04-02'),
(252, 1004, 214, 100, 4500, 450000, '2020-07-02');

--
-- Trigger `stokingbarang`
--
DELIMITER $$
CREATE TRIGGER `tambah_barang` AFTER INSERT ON `stokingbarang` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok+NEW.stok_barang
WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ambilbarang`
--
ALTER TABLE `ambilbarang`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `baranghilang`
--
ALTER TABLE `baranghilang`
  ADD PRIMARY KEY (`id_hilang`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `role_id` (`id_role`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `id_kategori_kmr` (`id_kategori_kmr`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_kamar`
--
ALTER TABLE `kategori_kamar`
  ADD PRIMARY KEY (`id_kategori_kmr`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `stokingbarang`
--
ALTER TABLE `stokingbarang`
  ADD PRIMARY KEY (`id_stoking`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ambilbarang`
--
ALTER TABLE `ambilbarang`
  MODIFY `id_ambil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `baranghilang`
--
ALTER TABLE `baranghilang`
  MODIFY `id_hilang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_kamar`
--
ALTER TABLE `kategori_kamar`
  MODIFY `id_kategori_kmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stokingbarang`
--
ALTER TABLE `stokingbarang`
  MODIFY `id_stoking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ambilbarang`
--
ALTER TABLE `ambilbarang`
  ADD CONSTRAINT `ambilbarang_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambilbarang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `baranghilang`
--
ALTER TABLE `baranghilang`
  ADD CONSTRAINT `baranghilang_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baranghilang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baranghilang_ibfk_3` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_kategori_kmr`) REFERENCES `kategori_kamar` (`id_kategori_kmr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stokingbarang`
--
ALTER TABLE `stokingbarang`
  ADD CONSTRAINT `stokingbarang_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stokingbarang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
