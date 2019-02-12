-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 02:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID` int(11) NOT NULL,
  `FLName` text COLLATE utf16_persian_ci NOT NULL,
  `UserLogin` text COLLATE utf16_persian_ci NOT NULL,
  `UserPass` text COLLATE utf16_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_persian_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `FLName`, `UserLogin`, `UserPass`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basket`
--

CREATE TABLE `tbl_basket` (
  `ID` int(11) NOT NULL,
  `FactorID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` text COLLATE utf16_persian_ci NOT NULL,
  `num` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_persian_ci;

--
-- Dumping data for table `tbl_basket`
--

INSERT INTO `tbl_basket` (`ID`, `FactorID`, `ProductID`, `ProductName`, `num`, `Price`) VALUES
(9, 5, 57, 'GLX X55', 1, 150),
(10, 6, 57, 'GLX X55', 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `ID` int(11) NOT NULL,
  `BrandName` text COLLATE utf16_persian_ci NOT NULL,
  `BrandLogo` text COLLATE utf16_persian_ci,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_persian_ci;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`ID`, `BrandName`, `BrandLogo`, `Status`) VALUES
(1, 'Apple', '3dec1d2af398a29b39a912e6ba8c5d8d.png', 0),
(2, 'GLX', 'd46150524f48edd70d8e017b875b989a.png', 0),
(3, 'Huawi', 'c46335045417850a51d690ab036c5b03.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factor`
--

CREATE TABLE `tbl_factor` (
  `ID` int(11) NOT NULL,
  `CustomerName` text COLLATE utf16_persian_ci NOT NULL,
  `CustomerAddress` text COLLATE utf16_persian_ci NOT NULL,
  `CustomerMobile` text COLLATE utf16_persian_ci NOT NULL,
  `CustomerPostalCode` text COLLATE utf16_persian_ci NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_persian_ci;

--
-- Dumping data for table `tbl_factor`
--

INSERT INTO `tbl_factor` (`ID`, `CustomerName`, `CustomerAddress`, `CustomerMobile`, `CustomerPostalCode`, `Status`) VALUES
(5, 'آرش محمدی', 'تهران-میدان صادقیه', '02144978540', '123', 2),
(6, 'آرش محمدی', 'آدرس تهرام', '02144978540', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile`
--

CREATE TABLE `tbl_mobile` (
  `ID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `Model` text COLLATE utf16_persian_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `Price_off` int(11) NOT NULL,
  `Camera` int(11) NOT NULL,
  `MobileImage` text COLLATE utf16_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_persian_ci;

--
-- Dumping data for table `tbl_mobile`
--

INSERT INTO `tbl_mobile` (`ID`, `BrandID`, `Model`, `Price`, `Price_off`, `Camera`, `MobileImage`) VALUES
(56, 1, 'S6 plus', 200, 0, 12, '0c18c3d4e49308bf8a2516a4b6e6154c.jpg'),
(57, 2, 'X55', 150, 0, 12, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_mobile`
-- (See below for the actual view)
--
CREATE TABLE `view_mobile` (
`ID` int(11)
,`BrandID` int(11)
,`Model` text
,`Price` int(11)
,`Price_off` int(11)
,`Camera` int(11)
,`MobileImage` text
,`BrandName` text
,`BrandLogo` text
);

-- --------------------------------------------------------

--
-- Structure for view `view_mobile`
--
DROP TABLE IF EXISTS `view_mobile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mobile`  AS  (select `tbl_mobile`.`ID` AS `ID`,`tbl_mobile`.`BrandID` AS `BrandID`,`tbl_mobile`.`Model` AS `Model`,`tbl_mobile`.`Price` AS `Price`,`tbl_mobile`.`Price_off` AS `Price_off`,`tbl_mobile`.`Camera` AS `Camera`,`tbl_mobile`.`MobileImage` AS `MobileImage`,`tbl_brands`.`BrandName` AS `BrandName`,`tbl_brands`.`BrandLogo` AS `BrandLogo` from (`tbl_mobile` join `tbl_brands` on((`tbl_mobile`.`BrandID` = `tbl_brands`.`ID`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_basket`
--
ALTER TABLE `tbl_basket`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_factor`
--
ALTER TABLE `tbl_factor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_mobile`
--
ALTER TABLE `tbl_mobile`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_basket`
--
ALTER TABLE `tbl_basket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_factor`
--
ALTER TABLE `tbl_factor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mobile`
--
ALTER TABLE `tbl_mobile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
