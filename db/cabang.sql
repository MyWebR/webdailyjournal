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
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `timedate` datetime NOT NULL,
  `detail_alamat` text NOT NULL,
  `google_maps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id`, `nama_cabang`, `gambar`, `timedate`, `detail_alamat`, `google_maps`) VALUES
(1, 'Legenda Bakmi DKI', '20250104190419.jpg', '2025-01-04 19:04:19', 'Jl. Rw. Belong No.2, RT.2/RW.3, Sukabumi Utara, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480', 'https://maps.app.goo.gl/wePQMUmJLxd7SdnD9'),
(3, 'Legenda mie ayam semarang barat', '20250104145819.jpg', '2025-01-04 14:58:19', 'Jl. Puspowarno No.34, Bojongsalaman, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50141', 'https://maps.app.goo.gl/8HMuTpnhHFwSrgfH6'),
(4, 'Legenda mie ayam Surabaya', '20250104150024.jpg', '2025-01-04 15:00:24', 'Taman Wisata Kayoon, Jl. Kayoon Stand No.24, Embong Kaliasin, Kec. Genteng, Surabaya, Jawa Timur 60127', 'https://maps.app.goo.gl/h1rk3fd51D8qyTvw7'),
(5, 'Legenda Mie Ayam Brebes', '20250105005738.jpg', '2025-01-05 00:57:38', 'Jl. Rw. Belong No.2, RT.2/RW.3, Sukabumi Utara, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480', 'https://maps.app.goo.gl/ySJPeSoA3LS39MmE9');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
