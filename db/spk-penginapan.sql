-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 03:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-penginapan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id`, `kode_alternatif`, `nama_alternatif`) VALUES
(1, 'A1', 'Portola Grand Renggali Hotel'),
(2, 'A2', 'Grand Bayu Hill Hotel Takengon'),
(3, 'A3', 'Parkside Gayo Petro Hotel'),
(4, 'A4', 'The Lavana Jejunten Bango Takengon'),
(5, 'A5', 'Pintu Waluh Homestay'),
(6, 'A6', 'QQ Homestay'),
(7, 'A7', 'Capital O 93263 Linge Land Hotel'),
(8, 'A8', 'Camping Manja'),
(9, 'A9', 'Petro Inn Takengon'),
(10, 'A10', 'Fairuz Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` decimal(3,1) NOT NULL,
  `normalisasi` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`, `normalisasi`) VALUES
('C1', 'Harga', 3.0, 0.30),
('C2', 'Fasilitas', 2.5, 0.25),
('C3', 'Rating', 2.0, 0.20),
('C4', 'Jarak Lokasi', 1.5, 0.15),
('C5', 'Jenis Penginapan', 1.0, 0.10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matriks_keputusan`
--

CREATE TABLE `tbl_matriks_keputusan` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_matriks_keputusan`
--

INSERT INTO `tbl_matriks_keputusan` (`id`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(156, 'A1', 'C1', 277.109),
(157, 'A1', 'C2', 8),
(158, 'A1', 'C3', 4.1),
(159, 'A1', 'C4', 1),
(160, 'A1', 'C5', 1),
(161, 'A2', 'C1', 475.731),
(162, 'A2', 'C2', 11),
(163, 'A2', 'C3', 4.3),
(164, 'A2', 'C4', 2),
(165, 'A2', 'C5', 1),
(166, 'A3', 'C1', 539.307),
(167, 'A3', 'C2', 7),
(168, 'A3', 'C3', 4.5),
(169, 'A3', 'C4', 1),
(170, 'A3', 'C5', 1),
(171, 'A4', 'C1', 550.832),
(172, 'A4', 'C2', 4),
(173, 'A4', 'C3', 4.9),
(174, 'A4', 'C4', 1),
(175, 'A4', 'C5', 3),
(176, 'A5', 'C1', 602.237),
(177, 'A5', 'C2', 4),
(178, 'A5', 'C3', 4.8),
(179, 'A5', 'C4', 2),
(180, 'A5', 'C5', 3),
(181, 'A6', 'C1', 173.875),
(182, 'A6', 'C2', 1),
(183, 'A6', 'C3', 4.1),
(184, 'A6', 'C4', 2),
(185, 'A6', 'C5', 3),
(186, 'A7', 'C1', 253.857),
(187, 'A7', 'C2', 3),
(188, 'A7', 'C3', 3.8),
(189, 'A7', 'C4', 2),
(190, 'A7', 'C5', 1),
(191, 'A8', 'C1', 450),
(192, 'A8', 'C2', 9),
(193, 'A8', 'C3', 4.3),
(194, 'A8', 'C4', 1),
(195, 'A8', 'C5', 5),
(196, 'A9', 'C1', 408.264),
(197, 'A9', 'C2', 7),
(198, 'A9', 'C3', 4.2),
(199, 'A9', 'C4', 2),
(200, 'A9', 'C5', 1),
(201, 'A10', 'C1', 282.644),
(202, 'A10', 'C2', 5),
(203, 'A10', 'C3', 4.6),
(204, 'A10', 'C4', 2),
(205, 'A10', 'C5', 1),
(216, 'A11', 'C1', 345.289),
(217, 'A11', 'C2', 1),
(218, 'A11', 'C3', 4.3),
(219, 'A11', 'C4', 2),
(220, 'A11', 'C5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penginapan`
--

CREATE TABLE `tbl_penginapan` (
  `id` int(11) NOT NULL,
  `nama_penginapan` varchar(255) NOT NULL,
  `harga_kamar` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `jarak_lokasi` varchar(255) NOT NULL,
  `jenis_penginapan` varchar(50) NOT NULL,
  `link_penginapan` varchar(255) DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penginapan`
--

INSERT INTO `tbl_penginapan` (`id`, `nama_penginapan`, `harga_kamar`, `fasilitas`, `rating`, `jarak_lokasi`, `jenis_penginapan`, `link_penginapan`, `latitude`, `longitude`) VALUES
(1, 'Portola Grand Renggali Hotel', '277.109', 'WiFi, Lift, Parkir, Restoran, AC, Ruang Tamu, Resepsionis 24 Jam, Fasilitas Rapat', 4.1, 'Dekat Pusat Wisata', 'Hotel', 'https://www.tiket.com/hotel/indonesia/portola-grand-renggali-hotel-609001694159925575?adult=1&room=1&source=global_search', 4.613362, 96.864037),
(2, 'Grand Bayu Hill Hotel Takengon', '475.731', 'Kolam Renang, Antar Jemput Bandara, Fasilitas Anak, WiFi, Resepsionis 24 Jam, Ruang Tamu, Parkir, Lift, AC, Restoran, Fasilitas Rapat', 4.3, 'Pusat Kota', 'Hotel', 'https://www.tiket.com/hotel/indonesia/grand-bayu-hill-hotel-takengon-603001679622626012?adult=1&room=1&source=global_search', 4.642217, 96.839340),
(3, 'Parkside Gayo Petro Hotel', '539.307', 'WiFi, Lift, Parkir, Restoran, Antar Jemput Bandara, Fasilitas Rapat, Resepsionis 24 Jam', 4.5, 'Dekat Pusat Wisata', 'Hotel', 'https://www.tiket.com/hotel/indonesia/parkside-gayo-petro-hotel-410001634037067936?adult=1&room=1&source=global_search', 4.631906, 96.854019),
(4, 'The Lavana Jejunten Bango Takengon', '550.832', 'Kolam Renang, Wifi, Parkir, AC', 4.9, 'Dekat Pusat Wisata', 'Homestay', 'https://www.tiket.com/hotel/indonesia/the-lavana-jejunten-bango-takengon-609001695875444172?adult=1&room=1&source=global_search', 4.625638, 96.853645),
(5, 'Pintu Waluh Homestay', '602.237', 'Parkir, Pet-Friendly, Dapur, TV', 4.8, 'Pusat Kota', 'Homestay', 'https://www.tiket.com/homes/indonesia/pintu-waluh-homestay-506001654742396796?adult=1&room=1&source=global_search', 4.637835, 96.842628),
(6, 'QQ Homestay', '173.875', 'Parkir', 4.1, 'Pusat Kota', 'Homestay', 'https://www.tiket.com/hotel/indonesia/qq-homestay-402001614220951253?adult=1&room=1&source=global_search', 4.633840, 96.853172),
(7, 'Capital O 93263 Linge Land Hotel', '253.857', 'Wifi, Parkir, Resepsionis 24 Jam', 3.8, 'Pusat Kota', 'Hotel', 'https://www.tiket.com/hotel/indonesia/capital-o-93263-linge-land-hotel-611001699917696834?adult=1&room=1&source=global_search', 4.622509, 96.838524),
(8, 'Camping Manja', '450.000', 'Tenda, Matras, Selimut, Makan Malam, Sarapan, Wayer (Colokan), Api Unggun, Parkir, Alat BBQ', 4.3, 'Dekat Pusat Wisata', 'Camp', 'https://campingmanja.com/', 4.604513, 96.990097),
(9, 'Petro Inn Takengon', '408.264', 'WiFi, Lift, Parkir, Restoran, AC, Fasilitas Anak, Resepsionis 24 Jam', 4.2, 'Pusat Kota', 'Hotel', 'https://www.tiket.com/hotel/indonesia/petro-inn-takengon-505001653640240227?adult=1&room=1&source=global_search', 4.632131, 96.853516),
(10, 'Fairuz Hotel', '282.644', 'Wifi, Restoran, Parkir, AC, Resepsionis 24 Jam', 4.6, 'Pusat Kota', 'Hotel', 'https://www.tiket.com/hotel/indonesia/fairuz-hotel-705001715658050782?adult=1&room=1&source=global_search', 4.636559, 96.848671);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(3, 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nama_alternatif` (`nama_alternatif`),
  ADD KEY `idx_kode_alternatif` (`kode_alternatif`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`),
  ADD KEY `idx_kode_kriteria` (`kode_kriteria`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `tbl_matriks_keputusan`
--
ALTER TABLE `tbl_matriks_keputusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_alternatif` (`kode_alternatif`),
  ADD KEY `tbl_matriks_keputusan_ibfk_2` (`kode_kriteria`);

--
-- Indexes for table `tbl_penginapan`
--
ALTER TABLE `tbl_penginapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nama_penginapan` (`nama_penginapan`),
  ADD KEY `nama_penginapan` (`nama_penginapan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_matriks_keputusan`
--
ALTER TABLE `tbl_matriks_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `tbl_penginapan`
--
ALTER TABLE `tbl_penginapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD CONSTRAINT `fk_nama_alternatif` FOREIGN KEY (`nama_alternatif`) REFERENCES `tbl_penginapan` (`nama_penginapan`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_matriks_keputusan`
--
ALTER TABLE `tbl_matriks_keputusan`
  ADD CONSTRAINT `tbl_matriks_keputusan_ibfk_2` FOREIGN KEY (`kode_kriteria`) REFERENCES `tbl_kriteria` (`kode_kriteria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
