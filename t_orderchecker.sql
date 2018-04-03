-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 09:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checker`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_orderchecker`
--

DROP TABLE IF EXISTS `t_orderchecker`;
CREATE TABLE IF NOT EXISTS `t_orderchecker` (
  `KODELOKASI` varchar(10) NOT NULL,
  `KODETRANS` varchar(50) NOT NULL,
  `TANGGALOMSET` date NOT NULL,
  `NOMORMEJA` int(11) NOT NULL,
  `KODEMENURECIPE` varchar(50) NOT NULL,
  `NAMAMENURECIPE` varchar(300) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `HARGA` decimal(15,4) NOT NULL,
  `KODEDETAIL` varchar(50) NOT NULL,
  `NAMADETAIL` varchar(300) NOT NULL,
  `URUTANHEADER` int(11) NOT NULL,
  `URUTAN` int(11) NOT NULL,
  `JAMORDER` time NOT NULL,
  `JAMTARGET` time NOT NULL,
  `JAMFINISH` time NOT NULL,
  `DURASI` int(11) NOT NULL,
  `USERORDER` varchar(100) NOT NULL,
  `USERCHECKER` varchar(100) NOT NULL,
  `STATUS` tinyint(4) NOT NULL,
  `JUMLAHCOVER` int(11) NOT NULL,
  PRIMARY KEY (`KODETRANS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_orderchecker`
--

INSERT INTO `t_orderchecker` (`KODELOKASI`, `KODETRANS`, `TANGGALOMSET`, `NOMORMEJA`, `KODEMENURECIPE`, `NAMAMENURECIPE`, `JUMLAH`, `HARGA`, `KODEDETAIL`, `NAMADETAIL`, `URUTANHEADER`, `URUTAN`, `JAMORDER`, `JAMTARGET`, `JAMFINISH`, `DURASI`, `USERORDER`, `USERCHECKER`, `STATUS`, `JUMLAHCOVER`) VALUES
('', '011', '0000-00-00', 10, '', '', 0, '0.0000', '', '', 0, 0, '00:00:00', '00:00:00', '00:00:00', 0, '', '', 0, 0),
('', '012', '0000-00-00', 10, '', '', 0, '0.0000', '', '', 0, 0, '00:00:00', '00:00:00', '00:00:00', 0, '', '', 0, 0),
('', 'order001', '2018-04-03', 1, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL001', 'NO CHIC', 1, 1, '17:42:02', '13:42:02', '14:31:37', 3, 'DANIEL', 'DANIEL', 1, 0),
('', 'order002', '2018-03-01', 1, 'MENU002', 'CHAWAN MUSHI', 2, '35000.0000', 'DTL002', 'NO CHIC', 1, 2, '17:42:02', '13:42:02', '14:31:37', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order003', '2018-03-01', 1, 'MENU003', 'EBI MAYO BENTO', 1, '20000.0000', 'DTL003', 'NO CHIC', 1, 3, '17:42:02', '12:42:02', '14:33:01', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order004', '2018-03-01', 1, 'MENU004', 'SENCA DINGIN', 3, '10000.0000', 'DTL004', 'NO CHIC', 1, 4, '17:42:02', '17:42:02', '00:00:00', 300, 'DANIEL', 'DANIEL', 0, 0),
('', 'order005', '2018-03-01', 2, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL005', 'NO CHIC', 5, 5, '17:42:02', '17:42:02', '00:00:00', 300, 'DANIEL', 'DANIEL', 0, 0),
('', 'order006', '2018-03-01', 2, 'MENU002', 'CHAWAN MUSHI', 1, '35000.0000', 'DTL006', 'NO CHIC', 5, 6, '17:42:02', '17:42:02', '00:00:00', 300, 'DANIEL', 'DANIEL', 0, 0),
('', 'order007', '2018-03-01', 2, 'MENU003', 'EBI MAYO BENTO', 2, '20000.0000', 'DTL007', 'NO CHIC', 5, 7, '17:42:02', '17:42:02', '14:00:36', 300, 'DANIEL', 'DANIEL', 1, 0),
('', 'order008', '2018-03-01', 3, 'MENU004', 'SENCA DINGIN', 4, '10000.0000', 'DTL008', 'NO CHIC', 8, 8, '17:42:02', '17:42:02', '17:42:02', 300, 'DANIEL', 'DANIEL', 0, 0),
('', 'order009', '2018-03-01', 3, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL009', 'NO CHIC', 8, 9, '17:42:02', '17:42:02', '20:09:36', 300, 'DANIEL', 'DANIEL', 1, 0),
('', 'order010', '2018-03-01', 3, 'MENU002', 'CHAWAN MUSHI', 1, '35000.0000', 'DTL010', 'NO CHIC', 8, 10, '17:42:02', '17:42:02', '14:05:27', 300, 'DANIEL', 'DANIEL', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
