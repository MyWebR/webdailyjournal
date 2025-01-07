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
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Mie Ayam', 'Mi ayam atau bakmi ayam adalah masakan Indonesia yang terbuat dari mi kuning direbus mendidih kemudian ditaburi saus kecap khusus beserta daging ayam dan sayuran.', 'mie-ayam-biasa.jpg', '2024-12-20 07:12:59', 'admin'),
(2, 'Mie Ayam Bakso', 'Mie ayam bakso adalah salah satu hidangan populer di Indonesia yang merupakan kombinasi antara mie, daging ayam, dan bakso (bola daging). Hidangan ini sangat disukai karena rasa gurihnya, teksturnya yang kenyal, dan kelezatan baksonya.', 'mie-ayam-bakso.jpg', '2024-12-20 07:12:59', 'admin'),
(3, 'Mie Ayam Jamur', 'Mie ayam jamur adalah salah satu variasi dari hidangan mie ayam yang menggabungkan mie dengan daging ayam dan jamur. Hidangan ini sangat populer di Indonesia dan memiliki cita rasa yang kaya serta aroma yang menggugah selera.', 'mie-ayam-jamur.jpg', '2024-12-20 07:12:59', 'admin'),
(4, 'Mie Ayam Ceker', 'Mie ayam ceker adalah hidangan yang menggabungkan mie dengan daging ayam dan ceker (kaki) ayam. Ceker ayam merupakan bagian yang kaya akan kolagen dan memiliki tekstur yang kenyal. Hidangan ini menjadi salah satu variasi mie ayam yang cukup populer di Indonesia.', 'mie-ayam-ceker.jpg', '2024-12-20 07:12:59', 'admin'),
(5, 'Mie Ayam Pangsit', 'Mie ayam pangsit adalah salah satu hidangan yang sangat populer di Indonesia, terutama di daerah perkotaan. Hidangan ini terdiri dari mie yang disajikan dengan potongan daging ayam, kuah kaldu, dan pangsit (sejenis dumpling atau ravioli) yang biasanya digoreng atau direbus.', 'mie-ayam-pangsit.jpg', '2024-12-20 07:12:59', 'admin'),
(6, 'Mie Ayam Bakso Mercon', 'Mie ayam bakso mercon adalah variasi dari hidangan mie ayam yang populer di Indonesia, dengan penambahan bakso yang diberi sambal pedas. Nama \"mercon\" dalam bahasa Indonesia berarti \"petasan,\" yang mengacu pada rasa pedas yang menggugah selera, mirip dengan ledakan rasa yang ditimbulkan oleh sambal pedas dalam hidangan ini.', 'mie-ayam-bakso-mercon.jpg', '2024-12-20 07:12:59', 'admin'),
(7, 'Mie Ayam Bangka', 'Mie Ayam Bangka adalah salah satu varian dari mie ayam yang berasal dari Bangka Belitung, Indonesia. Mie ayam ini memiliki ciri khas pada cara penyajiannya dan bahan-bahan yang digunakan, yang membedakannya dari mie ayam di daerah lain.', '20241229033434.png', '2024-12-29 03:34:34', 'admin'),
(11, 'Mie Ayam Goreng', 'Mie ayam goreng adalah hidangan mie yang digoreng hingga garing, disajikan dengan ayam bumbu kecap manis dan sayuran, sering ditambah bawang goreng atau sambal.', '20241229033159.png', '2024-12-29 03:31:59', 'admin'),
(12, 'Mie Ayam Seafood', 'Mie Ayam Seafood adalah variasi dari mie ayam yang menggantikan topping ayam dengan berbagai jenis makanan laut (seafood). Hidangan ini menggabungkan cita rasa mie ayam dengan kelezatan seafood, menciptakan rasa yang lebih segar dan kaya.', '20241229033709.png', '2025-01-03 19:57:48', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
