-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 03:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pengurusan_tempahan_homestay_demo97`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDAdmin` varchar(6) NOT NULL,
  `NamaAdmin` varchar(20) NOT NULL,
  `NoKP` varchar(12) NOT NULL,
  `KataLaluan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IDAdmin`, `NamaAdmin`, `NoKP`, `KataLaluan`) VALUES
('HD1015', 'Jessie Chang', '031125011128', 'jessie12345');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE `bilik` (
  `NoBilik` varchar(3) NOT NULL,
  `JenisBilik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`NoBilik`, `JenisBilik`) VALUES
('131', 'Bilik Bujang'),
('137', 'Bilik Bujang'),
('205', 'Bilik Double'),
('245', 'Bilik Double'),
('853', 'Bilik Keluarga'),
('857', 'Bilik Keluarga'),
('666', 'Bilik Loteng'),
('696', 'Bilik Loteng');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribilik`
--

CREATE TABLE `kategoribilik` (
  `JenisBilik` varchar(30) NOT NULL,
  `Harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoribilik`
--

INSERT INTO `kategoribilik` (`JenisBilik`, `Harga`) VALUES
('Bilik Bujang', '80.00'),
('Bilik Double', '100.00'),
('Bilik Keluarga', '200.00'),
('Bilik Loteng', '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IDPelanggan` varchar(10) NOT NULL,
  `NamaPelanggan` varchar(50) NOT NULL,
  `NoKP` varchar(12) NOT NULL,
  `NoTel` varchar(11) DEFAULT NULL,
  `KataLaluan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IDPelanggan`, `NamaPelanggan`, `NoKP`, `NoTel`, `KataLaluan`) VALUES
('HP97001', 'Sean Xiao', '911005165897', '0108101003', 'sxz857857'),
('HP97002', 'Austin Lee', '880127013791', '0167534117', 'aulee88oli'),
('HP97003', 'Rebecca A/P Rajeev', '921021041218', '0183713502', 'bexa1106'),
('HP97004', 'Allen Deng', '921015081629', '0138585300', 'dengdeng8len'),
('HP97005', 'Nora Elfira binti Alif', '860328030278', '0177567569', 'Elfinora7569'),
('HP97006', 'Abdul Aziz bin Hassan', '870904131695', '01110921003', 'Azizhsan04'),
('HP97007', 'Jonathan A/L Thomas', '900519065631', '0145654785', 'Jooomas30'),
('HP97008', 'Ray Ma', '930909040911', '0127576889', 'raynotjack30'),
('HP97009', 'Muhammad Ali bin Ismail', '891225140541', '01193615288', 'aliadil040'),
('HP97010', 'Joanna A/P Dhruv', '990909090666', '0163342800', 'joa4113vv'),
('HP97011', 'Cyndi Lee', '040914080358', '0187715639', 'cyndi0914xl'),
('HP97012', 'Lee Pei Ying', '050318080658', '0171766196', '1pe1y1ng'),
('HP97013', '2222222222222222222', '111111111111', '22222222222', '22222222222222'),
('HP97014', 'hghghgh', '111111111111', '11111111111', 'drffdfdfdfdfdf'),
('HP97015', 'rrrrrrrrrrrrrrrrrrrr', '111111111111', '11111111111', '11111111111111'),
('HP97016', '111', '111111111111', '11111111111', '11111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `IDPengurus` varchar(10) NOT NULL,
  `NamaPengurus` varchar(50) NOT NULL,
  `NoKP` varchar(12) NOT NULL,
  `KataLaluan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`IDPengurus`, `NamaPengurus`, `NoKP`, `KataLaluan`) VALUES
('HD9710', 'Aarif', '800225016705', 'Riph4480'),
('HD9711', 'Joseph', '861127030461', 'Hpesoj0461'),
('HD9712', 'Marcus', '961229070803', 'mxxcxs96'),
('HD9713', 'Liyana', '920926031098', 'liyana0926'),
('HD9714', 'Fatimah', '950103071192', 'fatimah0301'),
('HD9715', 'Diana', '800706053344', 'd1an0691'),
('HD9716', 'Shazwan', '960414015347', '5wane0zc'),
('HD9717', 'Ashveen', '880818036172', 'ash12345'),
('HD9718', 'Janney', '920518047700', '6imjaney9'),
('HD9719', 'Damien', '890229072105', 'meee3388'),
('HD9720', 'Najwa', '980818080189', 'navevan22'),
('HD9721', '11111', '444444444444', '77777777777777'),
('HD9722', '11111', '444444444444', '12222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `IDTempahan` varchar(10) NOT NULL,
  `IDPelanggan` varchar(10) NOT NULL,
  `IDPengurus` varchar(10) NOT NULL,
  `NoBilik` varchar(3) NOT NULL,
  `TarikhDaftarMasuk` varchar(10) NOT NULL,
  `TarikhDaftarKeluar` varchar(10) NOT NULL,
  `JumlahHarga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`IDTempahan`, `IDPelanggan`, `IDPengurus`, `NoBilik`, `TarikhDaftarMasuk`, `TarikhDaftarKeluar`, `JumlahHarga`) VALUES
('A0001', 'HP97001', 'HD9712', '245', '02/09/2019', '05/09/2019', '300.00'),
('A0002', 'HP97001', 'HD9712', '857', '02/09/2019', '05/09/2019', '600.00'),
('A0003', 'HP97002', 'HD9711', '205', '02/09/2019', '05/09/2019', '300.00'),
('A0004', 'HP97003', 'HD9713', '131', '21/03/2019', '30/03/2019', '720.00'),
('A0005', 'HP97003', 'HD9714', '137', '07/09/2020', '09/09/2020', '160.00'),
('A0006', 'HP97004', 'HD9711', '245', '19/09/2019', '21/09/2019', '200.00'),
('A0007', 'HP97005', 'HD9713', '666', '04/09/2019', '07/09/2019', '900.00'),
('A0008', 'HP97005', 'HD9714', '131', '21/09/2019', '24/09/2019', '240.00'),
('A0010', 'HP97007', 'HD9713', '696', '26/09/2019', '30/09/2019', '1200.00'),
('A0016', 'HP97012', 'HD9715', '205', '04/10/2020', '12/10/2020', '800.00'),
('A0017', 'HP97001', 'HD9715', '696', '28/10/2020', '30/10/2020', '600.00'),
('A0018', 'HP97003', 'HD9714', '666', '28/10/2020', '30/10/2020', '600.00'),
('A0019', 'HP97011', 'HD9715', '696', '04/11/2020', '29/10/2020', '1800.00'),
('A0020', 'HP97011', 'HD9717', '245', '25/10/2020', '30/10/2020', '500.00'),
('A0021', 'HP97001', 'HD9712', '137', '10/06/2020', '11/05/2020', '2400.00'),
('A0022', 'HP97002', 'HD9718', '137', '06/10/2020', '05/11/2020', '2400.00'),
('A0023', 'HP97016', 'HD9714', '137', '20/10/2020', '28/10/2020', '640.00'),
('A0024', 'HP97016', 'HD9713', '245', '06/10/2020', '29/10/2020', '2300.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDAdmin`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`NoBilik`),
  ADD KEY `JenisBilik` (`JenisBilik`);

--
-- Indexes for table `kategoribilik`
--
ALTER TABLE `kategoribilik`
  ADD PRIMARY KEY (`JenisBilik`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDPelanggan`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`IDPengurus`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`IDTempahan`),
  ADD KEY `IDPelanggan` (`IDPelanggan`),
  ADD KEY `IDPengurus` (`IDPengurus`),
  ADD KEY `NoBilik` (`NoBilik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilik`
--
ALTER TABLE `bilik`
  ADD CONSTRAINT `bilik_ibfk_1` FOREIGN KEY (`JenisBilik`) REFERENCES `kategoribilik` (`JenisBilik`);

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`IDPelanggan`) REFERENCES `pelanggan` (`IDPelanggan`),
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`IDPengurus`) REFERENCES `pengurus` (`IDPengurus`),
  ADD CONSTRAINT `tempahan_ibfk_3` FOREIGN KEY (`NoBilik`) REFERENCES `bilik` (`NoBilik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
