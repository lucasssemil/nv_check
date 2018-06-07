-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 10:06 PM
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
CREATE DATABASE IF NOT EXISTS `checker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `checker`;

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

DROP TABLE IF EXISTS `makanan`;
CREATE TABLE `makanan` (
  `kodemenurecipe` varchar(50) NOT NULL,
  `namamenurecipe` varchar(300) NOT NULL,
  `durasi` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`kodemenurecipe`, `namamenurecipe`, `durasi`) VALUES
('xx1', 'NASI GORENG', '10.00'),
('xx2', 'MIE GORENG', '8.00'),
('xx3', 'ES TEH', '5.00'),
('yy1', 'PEDAS', '0.00'),
('yy2', 'TELOR', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `torder`
--

DROP TABLE IF EXISTS `torder`;
CREATE TABLE `torder` (
  `KODELOKASI` varchar(10) NOT NULL,
  `KODETRANS` varchar(16) NOT NULL,
  `TGLTRANS` date NOT NULL,
  `TGLOMZET` date DEFAULT NULL,
  `JAMTRANS` time DEFAULT NULL,
  `KODELAYANANONLINE` varchar(10) DEFAULT NULL,
  `ORDERID` varchar(10) DEFAULT NULL,
  `KODECUSTOMER` varchar(20) DEFAULT NULL,
  `WAITER` varchar(20) DEFAULT NULL,
  `NOMORMEJA` varchar(10) DEFAULT NULL,
  `JUMLAHORANG` int(11) DEFAULT NULL,
  `CHARGE` decimal(15,4) DEFAULT NULL,
  `TOTAL` decimal(15,4) DEFAULT NULL,
  `DISC` decimal(15,4) DEFAULT NULL,
  `DISCAMOUNT` decimal(15,4) DEFAULT NULL,
  `PPNPERSEN` decimal(15,4) DEFAULT NULL,
  `PPNAMOUNT` decimal(15,4) DEFAULT NULL,
  `VOUCHER` decimal(15,4) DEFAULT NULL,
  `GRANDTOTAL` decimal(15,4) DEFAULT NULL,
  `BAYAR` decimal(15,4) DEFAULT NULL,
  `KEMBALI` decimal(15,4) DEFAULT NULL,
  `KASIR` varchar(20) DEFAULT NULL,
  `TGLBAYAR` date DEFAULT NULL,
  `JAMBAYAR` time DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `CETAKBILL` smallint(6) DEFAULT NULL,
  `CETAKPAYMENT` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torder`
--

INSERT INTO `torder` (`KODELOKASI`, `KODETRANS`, `TGLTRANS`, `TGLOMZET`, `JAMTRANS`, `KODELAYANANONLINE`, `ORDERID`, `KODECUSTOMER`, `WAITER`, `NOMORMEJA`, `JUMLAHORANG`, `CHARGE`, `TOTAL`, `DISC`, `DISCAMOUNT`, `PPNPERSEN`, `PPNAMOUNT`, `VOUCHER`, `GRANDTOTAL`, `BAYAR`, `KEMBALI`, `KASIR`, `TGLBAYAR`, `JAMBAYAR`, `STATUS`, `CETAKBILL`, `CETAKPAYMENT`) VALUES
('LOK001', 'TRA001', '2018-05-28', '2018-05-28', '12:58:19', NULL, NULL, NULL, NULL, '1', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('LOK001', 'TRA002', '2018-05-28', '2018-05-28', '13:08:25', NULL, NULL, NULL, NULL, '2', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('LOK001', 'TRA003', '2018-06-04', '2018-06-04', '14:03:06', NULL, NULL, NULL, NULL, '3', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('LOK002', 'TRA004', '2018-06-04', '2018-06-04', '16:17:33', NULL, NULL, NULL, NULL, '1', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('LOK002', 'TRA005', '2018-06-04', '2018-06-04', '16:18:21', NULL, NULL, NULL, NULL, '2', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `torderchecker`
--

DROP TABLE IF EXISTS `torderchecker`;
CREATE TABLE `torderchecker` (
  `KODELOKASI` varchar(10) NOT NULL,
  `KODETRANS` varchar(50) NOT NULL,
  `TGLOMZET` date NOT NULL,
  `KODEMENURECIPE` varchar(50) NOT NULL,
  `NAMAMENURECIPE` varchar(300) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `URUTAN` int(11) NOT NULL,
  `URUTANCHECKER` int(11) NOT NULL,
  `JAMORDER` time NOT NULL,
  `JAMTARGET` time NOT NULL,
  `JAMFINISH` time NOT NULL,
  `DURASI` decimal(15,2) NOT NULL,
  `USERORDER` varchar(100) NOT NULL,
  `USERCHECKER` varchar(100) NOT NULL,
  `STATUS` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torderchecker`
--

INSERT INTO `torderchecker` (`KODELOKASI`, `KODETRANS`, `TGLOMZET`, `KODEMENURECIPE`, `NAMAMENURECIPE`, `JUMLAH`, `URUTAN`, `URUTANCHECKER`, `JAMORDER`, `JAMTARGET`, `JAMFINISH`, `DURASI`, `USERORDER`, `USERCHECKER`, `STATUS`) VALUES
('LOK001', 'TRA001', '2018-05-28', 'xx1', 'NASI GORENG', 1, 0, -1, '13:03:36', '13:13:36', '13:08:57', '10.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA001', '2018-05-28', 'xx2', 'MIE GORENG', 1, 1, -1, '13:03:47', '13:11:47', '13:08:57', '8.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA001', '2018-05-28', 'xx3', 'ES TEH', 1, 2, -1, '13:06:31', '13:11:31', '22:04:06', '5.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA001', '2018-05-28', 'xx3', 'ES TEH', 1, 3, -1, '13:06:44', '13:11:44', '00:00:00', '5.00', 'TEST', 'TEST', 0),
('LOK001', 'TRA001', '2018-05-28', 'xx2', 'MIE GORENG', 1, 4, -1, '13:06:49', '13:14:49', '00:00:00', '8.00', 'TEST', 'TEST', 0),
('LOK001', 'TRA001', '2018-05-28', 'xx3', 'ES TEH', 1, 6, -1, '13:08:36', '13:13:36', '21:08:50', '5.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA001', '2018-05-28', 'xx3', 'ES TEH', 1, 7, -1, '13:08:39', '13:13:39', '22:04:06', '5.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA002', '2018-05-28', 'xx1', 'NASI GORENG', 1, 5, -1, '13:08:34', '13:18:34', '00:00:00', '10.00', 'TEST', 'TEST', 0),
('LOK001', 'TRA002', '2018-05-28', 'yy1', 'PEDAS', 1, 8, 5, '13:09:19', '13:09:19', '00:00:00', '0.00', 'TEST', 'TEST', 0),
('LOK001', 'TRA002', '2018-05-28', 'yy2', 'TELOR', 1, 9, 5, '13:09:22', '13:09:22', '00:00:00', '0.00', 'TEST', 'TEST', 0),
('LOK001', 'TRA003', '2018-06-04', 'xx1', 'NASI GORENG', 1, 10, -1, '14:03:23', '14:13:23', '14:09:04', '10.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA003', '2018-06-04', 'xx3', 'ES TEH', 1, 11, -1, '14:03:42', '14:08:42', '14:05:34', '5.00', 'TEST', 'TEST', 1),
('LOK001', 'TRA003', '2018-06-04', 'yy1', 'PEDAS', 1, 12, 11, '14:05:11', '14:05:11', '00:00:00', '0.00', 'TEST', 'TEST', 0),
('LOK002', 'TRA004', '2018-06-04', 'xx1', 'NASI GORENG', 1, 13, -1, '16:17:37', '16:27:37', '00:00:00', '10.00', 'TEST', 'TEST', 0),
('LOK002', 'TRA004', '2018-06-04', 'xx3', 'ES TEH', 1, 14, -1, '16:18:05', '16:23:05', '00:00:00', '5.00', 'TEST', 'TEST', 0),
('LOK002', 'TRA005', '2018-06-04', 'xx1', 'NASI GORENG', 1, 15, -1, '16:18:27', '16:28:27', '16:49:30', '10.00', 'TEST', 'TEST', 1),
('LOK002', 'TRA005', '2018-06-04', 'xx2', 'MIE GORENG', 1, 16, -1, '16:18:30', '16:26:30', '00:00:00', '8.00', 'TEST', 'TEST', 0),
('LOK002', 'TRA005', '2018-06-04', 'xx3', 'ES TEH', 1, 17, -1, '16:18:33', '16:23:33', '00:00:00', '5.00', 'TEST', 'TEST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `torderdtl`
--

DROP TABLE IF EXISTS `torderdtl`;
CREATE TABLE `torderdtl` (
  `SPESIFIKASI` varchar(20) NOT NULL,
  `KODELOKASI` varchar(10) NOT NULL,
  `KODETRANS` varchar(20) NOT NULL,
  `TGLTRANS` date DEFAULT NULL,
  `TGLOMZET` date NOT NULL,
  `JAMTRANS` time DEFAULT NULL,
  `WAITER` varchar(20) DEFAULT NULL,
  `URUTAN` int(11) NOT NULL,
  `KODEMENURECIPE` varchar(10) NOT NULL,
  `URUTANHEADER` int(11) DEFAULT NULL,
  `JENIS` varchar(50) DEFAULT NULL,
  `KODEDETAIL` varchar(10) DEFAULT NULL,
  `KETERANGAN` varchar(50) DEFAULT NULL,
  `NAMAFRONT` varchar(50) DEFAULT NULL,
  `NAMAPDA` varchar(50) DEFAULT NULL,
  `NAMAPRINTER` varchar(50) DEFAULT NULL,
  `PPN` smallint(6) DEFAULT NULL,
  `JML` decimal(15,2) DEFAULT NULL,
  `PAKET` smallint(6) DEFAULT NULL,
  `HARGA` decimal(15,2) DEFAULT NULL,
  `AMOUNT` decimal(15,2) DEFAULT NULL,
  `PERSENTASE` decimal(15,2) DEFAULT NULL,
  `INFO` varchar(20) DEFAULT NULL,
  `NOBILLASAL` varchar(20) DEFAULT NULL,
  `NOBILLTUJUAN` varchar(20) DEFAULT NULL,
  `STATUS` char(5) DEFAULT NULL,
  `JMLVOID` decimal(15,2) DEFAULT NULL,
  `KODEBRG` varchar(10) DEFAULT NULL,
  `NAMABRG` varchar(10) DEFAULT NULL,
  `SATUAN` varchar(10) DEFAULT NULL,
  `JAMVOID` time DEFAULT NULL,
  `USERVOID` varchar(20) DEFAULT NULL,
  `VOIDREASON` varchar(50) DEFAULT NULL,
  `NAMAKOMPUTER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torderdtl`
--

INSERT INTO `torderdtl` (`SPESIFIKASI`, `KODELOKASI`, `KODETRANS`, `TGLTRANS`, `TGLOMZET`, `JAMTRANS`, `WAITER`, `URUTAN`, `KODEMENURECIPE`, `URUTANHEADER`, `JENIS`, `KODEDETAIL`, `KETERANGAN`, `NAMAFRONT`, `NAMAPDA`, `NAMAPRINTER`, `PPN`, `JML`, `PAKET`, `HARGA`, `AMOUNT`, `PERSENTASE`, `INFO`, `NOBILLASAL`, `NOBILLTUJUAN`, `STATUS`, `JMLVOID`, `KODEBRG`, `NAMABRG`, `SATUAN`, `JAMVOID`, `USERVOID`, `VOIDREASON`, `NAMAKOMPUTER`) VALUES
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:03:36', NULL, 0, 'xx1', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:03:47', NULL, 1, 'xx2', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:06:31', NULL, 2, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:06:44', NULL, 3, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:06:49', NULL, 4, 'xx2', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:08:36', NULL, 6, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA001', '2018-05-28', '2018-05-28', '13:08:39', NULL, 7, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA002', '2018-05-28', '2018-05-28', '13:08:34', NULL, 5, 'xx1', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA002', '2018-05-28', '2018-05-28', '13:09:19', NULL, 8, 'yy1', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA002', '2018-05-28', '2018-05-28', '13:09:22', NULL, 9, 'yy2', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA003', '2018-06-04', '2018-06-04', '14:03:23', NULL, 10, 'xx1', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA003', '2018-06-04', '2018-06-04', '14:03:42', NULL, 11, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK001', 'TRA003', '2018-06-04', '2018-06-04', '14:05:11', NULL, 12, 'yy1', 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK002', 'TRA004', '2018-06-04', '2018-06-04', '16:17:37', NULL, 13, 'xx1', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK002', 'TRA004', '2018-06-04', '2018-06-04', '16:18:05', NULL, 14, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK002', 'TRA005', '2018-06-04', '2018-06-04', '16:18:27', NULL, 15, 'xx1', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK002', 'TRA005', '2018-06-04', '2018-06-04', '16:18:30', NULL, 16, 'xx2', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'LOK002', 'TRA005', '2018-06-04', '2018-06-04', '16:18:33', NULL, 17, 'xx3', -1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Triggers `torderdtl`
--
DROP TRIGGER IF EXISTS `INSERT_CHECKER`;
DELIMITER $$
CREATE TRIGGER `INSERT_CHECKER` AFTER INSERT ON `torderdtl` FOR EACH ROW BEGIN
DECLARE m_durasi decimal(15,2) DEFAULT 0;
DECLARE m_namamenurecipe varchar(300);
SELECT durasi INTO m_durasi FROM makanan WHERE KODEMENURECIPE = new.kodemenurecipe;
SELECT namamenurecipe INTO m_namamenurecipe FROM makanan WHERE KODEMENURECIPE = new.kodemenurecipe;

insert into torderchecker VALUES(new.kodelokasi,new.kodetrans,new.tglomzet,new.kodemenurecipe,m_namamenurecipe,"1",new.urutan,new.urutanheader,CURRENT_TIME,CURRENT_TIME + interval m_durasi minute,"00:00:00",m_durasi,"TEST","TEST",0);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_orderchecker`
--

DROP TABLE IF EXISTS `t_orderchecker`;
CREATE TABLE `t_orderchecker` (
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
  `JUMLAHCOVER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_orderchecker`
--

INSERT INTO `t_orderchecker` (`KODELOKASI`, `KODETRANS`, `TANGGALOMSET`, `NOMORMEJA`, `KODEMENURECIPE`, `NAMAMENURECIPE`, `JUMLAH`, `HARGA`, `KODEDETAIL`, `NAMADETAIL`, `URUTANHEADER`, `URUTAN`, `JAMORDER`, `JAMTARGET`, `JAMFINISH`, `DURASI`, `USERORDER`, `USERCHECKER`, `STATUS`, `JUMLAHCOVER`) VALUES
('', 'order001', '2018-04-17', 1, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL001', 'NO CHIC', 1, 1, '00:02:02', '14:44:00', '14:33:40', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order002', '2018-04-17', 1, 'MENU002', 'CHAWAN MUSHI', 2, '35000.0000', 'DTL002', 'NO CHIC', 1, 2, '00:02:02', '14:44:00', '11:37:51', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order003', '2018-04-17', 1, 'MENU003', 'EBI MAYO BENTO', 1, '20000.0000', 'DTL003', 'NO CHIC', 1, 3, '00:02:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('', 'order004', '2018-04-17', 1, 'MENU004', 'SENCA DINGIN', 3, '10000.0000', 'DTL004', 'NO CHIC', 1, 4, '23:13:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('', 'order005', '2018-04-17', 2, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL005', 'NO CHIC', 5, 5, '17:42:02', '14:44:00', '10:33:48', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order006', '2018-04-17', 2, 'MENU002', 'CHAWAN MUSHI', 1, '35000.0000', 'DTL006', 'NO CHIC', 5, 6, '17:42:02', '14:44:00', '11:37:51', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order007', '2018-04-17', 2, 'MENU003', 'EBI MAYO BENTO', 2, '20000.0000', 'DTL007', 'NO CHIC', 5, 7, '17:42:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('', 'order008', '2018-04-17', 3, 'MENU004', 'SENCA DINGIN', 4, '10000.0000', 'DTL008', 'NO CHIC', 8, 8, '17:42:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('', 'order009', '2018-04-17', 3, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL009', 'NO CHIC', 8, 9, '17:42:02', '14:44:00', '10:34:14', 5, 'DANIEL', 'DANIEL', 1, 0),
('', 'order010', '2018-04-17', 3, 'MENU002', 'CHAWAN MUSHI', 1, '35000.0000', 'DTL010', 'NO CHIC', 8, 10, '17:42:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('', 'order011', '2018-04-17', 4, 'MENU002', 'CHAWAN MUSHI', 1, '35000.0000', 'DTL010', 'NO CHIC', 8, 10, '17:42:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('', 'order012', '2018-04-17', 6, 'MENU001', 'CHIC TRYK BENTO', 1, '40000.0000', 'DTL001', 'NO CHIC', 1, 1, '00:02:02', '14:44:00', '00:00:00', 5, 'DANIEL', 'DANIEL', 0, 0),
('12345', 'order14', '2018-04-17', 5, 'RA001', 'RAWON', 1, '15000.0000', '0', '0', 1, 1, '11:40:00', '14:44:00', '00:00:00', 5, '1', '1', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`kodemenurecipe`);

--
-- Indexes for table `torder`
--
ALTER TABLE `torder`
  ADD PRIMARY KEY (`KODELOKASI`,`KODETRANS`,`TGLTRANS`) USING BTREE,
  ADD KEY `TORDER_IDX2` (`KODETRANS`),
  ADD KEY `TORDER_IDX3` (`TGLTRANS`),
  ADD KEY `TORDER_IDX4` (`TGLOMZET`),
  ADD KEY `TORDER_IDX5` (`KODELAYANANONLINE`),
  ADD KEY `TORDER_IDX6` (`KODECUSTOMER`),
  ADD KEY `TORDER_IDX7` (`STATUS`),
  ADD KEY `TORDER_IDX8` (`ORDERID`),
  ADD KEY `TORDER_IDX1` (`KODELOKASI`) USING BTREE;

--
-- Indexes for table `torderchecker`
--
ALTER TABLE `torderchecker`
  ADD PRIMARY KEY (`KODELOKASI`,`KODETRANS`,`TGLOMZET`,`URUTAN`);

--
-- Indexes for table `torderdtl`
--
ALTER TABLE `torderdtl`
  ADD PRIMARY KEY (`SPESIFIKASI`,`KODELOKASI`,`KODETRANS`,`TGLOMZET`,`URUTAN`,`KODEMENURECIPE`);

--
-- Indexes for table `t_orderchecker`
--
ALTER TABLE `t_orderchecker`
  ADD PRIMARY KEY (`KODETRANS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
