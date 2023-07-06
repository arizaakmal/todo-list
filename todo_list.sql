-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2023 pada 09.58
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
(40, 3, 'fassafsafsf', 'da', '2023-07-06 07:56:54', '2023-07-29 14:00:00', 'Done'),
(44, 3, 'sadsa update', 'adasdadsa', '2023-07-04 13:38:59', '2023-08-05 02:44:00', 'Done'),
(46, 3, 'Meeting 123', 'ffdsfsfdsdff', '2023-07-06 04:34:10', '2023-07-18 15:37:00', 'Done'),
(49, 13, 'FP Web', 'Menambahkan fitur login, register, home, dll', '2023-07-06 07:54:51', '2023-07-28 18:22:00', 'Done');

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
(13, 'Joko', 'joko@gmail.com', '$2y$10$xfFc.lkUDKI6lg1KvkpoZeL0grHF/JgtHA7ckNgD9/jE0vJdYwOTe');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
