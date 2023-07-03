-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2023 pada 04.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_list`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `deskripsi_tugas` text DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `deadline` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Undone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `user_id`, `nama_tugas`, `deskripsi_tugas`, `tanggal_dibuat`, `deadline`, `status`) VALUES
(37, 3, 'fassafsafsfddddddddddddddddddddd', 'sdsasdadass', '2023-07-03 02:02:54', '2023-08-04 10:07:36', 'Undone'),
(40, 3, 'fassafsafsf', 'da', '2023-07-02 03:23:35', '2023-07-29 14:00:00', 'Undone'),
(41, 3, 'sadsa update sfdfdfsdfds', 'sadsada', '2023-07-03 01:59:40', '2023-07-19 10:25:00', 'Done'),
(42, 3, 'jalan-jalan', 'gassss', '2023-07-03 02:27:22', '2023-08-01 10:27:00', 'Undone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$GztoX.VJsD5ritUMHb4FGOR2LUHyfptJ545cigR7.YLU96qboMHky'),
(4, 'Ariza', 'arizaakmal@gmail.com', '$2y$10$CyK/2vLIVT0fjUwlaRtzHuwitM0VRhGG4YGEErwjsw4Oe9/rLxxMG'),
(5, 'Deska', 'deska@gmail.com', '$2y$10$aGyNWvxBPQ1OBb2BbKdFQeA8Mzfr/ghHT4bPqpwYd7AVU8soSM5jm'),
(9, 'amikom', 'amikom1@gmail.com', '$2y$10$RgRpd2bObjIsqzFD/oFEZ.iy6gd8kH2x20nO7ODz9crLHleqr2Dye');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
