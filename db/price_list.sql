-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 07 Jan 2025 pada 05.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `diskon` decimal(5,2) DEFAULT 0.00,
  `jenis` enum('makanan','minuman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `price_list`
--

INSERT INTO `price_list` (`id`, `nama`, `harga`, `diskon`, `jenis`) VALUES
(5, 'Mie Ayam Seafood', 30000.00, 10.00, 'makanan'),
(6, 'Mie Ayam', 15000.00, 7.00, 'makanan'),
(7, 'Mie Ayam Jamur', 25000.00, NULL, 'makanan'),
(8, 'Mie Ayam Pangsit', 20000.00, NULL, 'makanan'),
(9, 'Es Teh', 5000.00, 8.00, 'minuman'),
(10, 'Mie Ayam Bangka', 27000.00, 7.00, 'makanan'),
(11, 'Mie Ayam Goreng', 20000.00, 15.00, 'makanan'),
(12, 'Mie Ayam Bakso', 25000.00, NULL, 'makanan'),
(13, 'Mie Ayam Ceker', 25000.00, NULL, 'makanan'),
(14, 'Mie Ayam Bakso Mercon', 27000.00, 9.00, 'makanan'),
(15, 'Teh Anget', 5000.00, NULL, 'minuman'),
(16, 'Es Jeruk', 7000.00, NULL, 'minuman'),
(17, 'Es Kopi', 5000.00, NULL, 'minuman'),
(18, 'Kopi', 5000.00, NULL, 'minuman'),
(19, 'Es Kelapa Muda', 10000.00, 10.00, 'minuman'),
(20, 'Air Mineral', 3000.00, NULL, 'minuman'),
(21, 'Soda Gembira', 7000.00, 10.00, 'minuman'),
(25, 'Es Sirup', 5000.00, 10.00, 'minuman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
