-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 03:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
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
(10, 'BRG010', 'Tablet iPad Pro 11 inch', 12000000, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi Santoso', 'L', '081234567890', 'Jl. Merdeka No.10, Jakarta'),
(2, 'Budi Hermawan', 'L', '081234567891', 'Jl. Pahlawan No.15, Bandung'),
(3, 'Cici Wijaya', 'P', '081234567892', 'Jl. Sudirman No.20, Surabaya'),
(4, 'Dedi Kurniawan', 'L', '081234567893', 'Jl. Gatot Subroto No.25, Medan'),
(5, 'Erik Maulana', 'L', '081234567894', 'Jl. Ahmad Yani No.30, Yogyakarta'),
(6, 'Maulana Ardiansyah', 'L', '0851231234', 'Jl. Raya Telang'),
(7, 'Maulana Ardiansyah', 'L', '0851231232', 'Jl. Raya Telang 12');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') NOT NULL,
  `transaksi_id` int(11) NOT NULL
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
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PN. Andi Santoso Meluncur', '081234567890', 'Jl. Merdeka No.10, Jakarta'),
(2, 'CV. Jaya Abadi', '0229876543', 'Jl. Setiabudi No.21, Bandung'),
(3, 'UD. Toko Sejahtera', '0312345678', 'Jl. Pemuda No.5, Surabaya'),
(4, 'PT. Karya Bersama', '0361123456', 'Jl. Diponegoro No.14, Denpasar'),
(5, 'CV. Maju Jaya', '0619876543', 'Jl. Gatot Subroto No.30, Medan'),
(8, 'PT. Sepatu Terbang', '085974658846', 'Jl. Raya Telang Bagus 12'),
(10, 'Agus Santoso Bergetar', '091247124219', 'Kota Lama Surabaya No.12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` enum('Self Pickup','Delivery Order') NOT NULL DEFAULT 'Delivery Order',
  `total` int(11) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2024-11-01', 'Delivery Order', 15000000, 1),
(2, '2024-11-02', 'Delivery Order', 15000000, 2),
(3, '2024-11-03', 'Self Pickup', 2000000, 3),
(4, '2024-11-04', 'Self Pickup', 900000, 4),
(5, '2024-11-05', 'Self Pickup', 1000000, 5),
(15, '2024-11-07', 'Delivery Order', 11300000, 6),
(24, '2024-11-16', 'Delivery Order', 33800000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 7500000, 2),
(2, 1, 7500000, 2),
(3, 2, 1500000, 1),
(3, 3, 2000000, 2),
(4, 2, 1500000, 3),
(4, 4, 300000, 1),
(5, 1, 7500000, 2),
(5, 5, 500000, 1),
(15, 1, 7500000, 1),
(15, 2, 1500000, 1),
(15, 3, 2000000, 1),
(15, 4, 300000, 1),
(24, 1, 7500000, 1),
(24, 2, 1500000, 1),
(24, 3, 2000000, 1),
(24, 4, 300000, 1),
(24, 5, 500000, 1),
(24, 6, 10000000, 1),
(24, 10, 12000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'andi1234', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Andi Santoso', 'Jl. Merdeka No.10, Jakarta', '081234567890', 2),
(2, 'budi456', 'ac96b12bf30f850f3e59de5f6c92d8abf4e1018fbf1065d03b947cb91af9988a', 'Budi Hermawan', 'Jl. Pahlawan No.15, Bandung', '081234567891', 2),
(3, 'cici789', '3cd7279f93e0c92fabc6d40612bdda9384829daf9d16c19153a34fd30e8c1586', 'Cici Wijaya', 'Jl. Sudirman No.20, Surabaya', '081234567892', 2),
(4, 'dedi321', '9c222c4d51261b20d101a8d8f0251aaff629cb0db69059e31c7acc94e998b1fb', 'Dedi Kurniawan', 'Jl. Gatot Subroto No.25, Medan', '081234567893', 2),
(5, 'erik654', '97133a748639c505eff27346796ea6a4ca66ed5dd90f277837589a925ba77ec9', 'Erik Maulana', 'Jl. Ahmad Yani No.30, Yogyakarta', '081234567894', 2),
(7, 'maulana1123', '5a03181f53eebb52998536173eb5bf51db7f816c36fc498092bbed7dd0d60111', 'Maulana Ardiansyah', 'Jl. Raya Telang', '085280327300', 1),
(12, 'maul', 'c1e8a712397a186d9b13bcd6e48474169f6c1bde6da15e9de6895f620f2ccda7', 'Maul', 'Telang', '09876', 1);

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
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
