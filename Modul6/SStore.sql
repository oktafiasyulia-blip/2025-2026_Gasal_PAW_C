-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2024 at 08:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `kode_barang` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `supplier_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Laptop Dell Inspiron', 7500000, 20, 1),
(2, 'BRG002', 'Printer Canon PIXMA', 1500000, 35, 2),
(3, 'BRG003', 'Monitor Samsung 24', 2000000, 15, 3),
(4, 'BRG004', 'Keyboard Logitech Wireless', 300000, 50, 4),
(5, 'BRG005', 'Mouse Razer DeathAdder', 500000, 40, 5),
(6, 'BRG006', 'Smartphone Samsung Galaxy S21', 10000000, 25, 1),
(7, 'BRG007', 'Headphone Sony WH-1000XM4', 3500000, 10, 2),
(8, 'BRG008', 'Router TP-Link Archer AX50', 1800000, 30, 3),
(9, 'BRG009', 'Smartwatch Apple Watch Series 6', 6000000, 12, 4),
(10, 'BRG010', 'Tablet iPad Pro 11\"', 12000000, 8, 5),
(16, 'BRG013', 'Redmi note 12', 50000, 3, 3),
(17, 'BRG014', 'aziz', 123456789, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi Santoso', 'L', '081234567890', 'Jl. Merdeka No.10, Jakarta'),
(2, 'Budi Hermawan', 'L', '081234567891', 'Jl. Pahlawan No.15, Bandung'),
(3, 'Cici Wijaya', 'P', '081234567892', 'Jl. Sudirman No.20, Surabaya'),
(4, 'Dedi Kurniawan', 'L', '081234567893', 'Jl. Gatot Subroto No.25, Medan'),
(5, 'Fathul Aziz', 'L', '081234567894', 'Jl. Ahmad Yani No.30, Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `total` int NOT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') COLLATE utf8mb4_general_ci NOT NULL,
  `transaksi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2024-10-01 10:15:00', 7500000, 'TRANSFER', 1),
(2, '2024-10-02 14:30:00', 3000000, 'EDC', 2),
(3, '2024-10-03 09:45:00', 2000000, 'TUNAI', 3),
(4, '2024-10-04 13:00:00', 900000, 'TRANSFER', 4),
(5, '2024-10-05 11:15:00', 1000000, 'TUNAI', 5),
(6, '2024-10-06 16:30:00', 10000000, 'TRANSFER', 1),
(7, '2024-10-07 12:00:00', 3500000, 'EDC', 2),
(8, '2024-10-08 17:45:00', 3600000, 'TUNAI', 3),
(9, '2024-10-09 15:30:00', 6000000, 'TRANSFER', 4),
(10, '2024-10-10 18:00:00', 12000000, 'EDC', 5);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT. Sumber Makmur', '0213456789', 'Jl. Raya Bogor KM.12, Jakarta Timur'),
(2, 'CV. Jaya Abadi', '0229876543', 'Jl. Setiabudi No.21, Bandung'),
(3, 'UD. Toko Sejahtera', '0312345678', 'Jl. Pemuda No.5, Surabaya'),
(4, 'PT. Karya Bersama', '0361123456', 'Jl. Diponegoro No.14, Denpasar'),
(5, 'CV. Maju Jaya', '0619876543', 'Jl. Gatot Subroto No.30, Medan'),
(9, 'PT. Sarimi Indoofod', '0218234121', 'Jl. raya telang indah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `total` int DEFAULT '0',
  `pelanggan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2024-10-01', 'Pembelian barang elektronik', 7500000, 1),
(2, '2024-10-02', 'Pembelian barang elektronik', 3000000, 2),
(3, '2024-10-03', 'Pembelian barang elektronik', 2000000, 3),
(4, '2024-10-04', 'Pembelian barang elektronik', 900000, 4),
(5, '2024-10-05', 'Pembelian barang elektronik', 1000000, 5),
(6, '2024-10-06', 'Pembelian barang elektronik', 10000000, 1),
(7, '2024-10-07', 'Pembelian barang elektronik', 3500000, 2),
(8, '2024-10-08', 'Pembelian barang elektronik', 3600000, 3),
(9, '2024-10-09', 'Pembelian barang elektronik', 6000000, 4),
(10, '2024-10-10', 'Pembelian barang elektronik', 12000000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 10000000, 1),
(1, 5, 7500000, 1),
(2, 2, 3500000, 1),
(2, 4, 1500000, 2),
(3, 2, 2000000, 1),
(3, 3, 1800000, 2),
(4, 2, 300000, 3),
(4, 4, 6000000, 1),
(5, 1, 500000, 2),
(5, 5, 12000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'andi123', 'password123', 'Andi Santoso', 'Jl. Merdeka No.10, Jakarta', '081234567890', 1),
(2, 'budi456', 'passbudi456', 'Budi Hermawan', 'Jl. Pahlawan No.15, Bandung', '081234567891', 2),
(3, 'cici789', 'passwordcici', 'Cici Wijaya', 'Jl. Sudirman No.20, Surabaya', '081234567892', 1),
(4, 'dedi321', 'dedi321pass', 'Dedi Kurniawan', 'Jl. Gatot Subroto No.25, Medan', '081234567893', 3),
(5, 'erik654', 'erik654secure', 'Fathul Aziz', 'Jl. Ahmad Yani No.30, Yogyakarta', '081234567894', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_supplier` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `fk_transaksi_detail_barang` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_transaksi_detail_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_transaksi_detail_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
