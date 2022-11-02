-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2022 at 10:33 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plusmei2_dbtodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbhistory`
--

DROP TABLE IF EXISTS `dbhistory`;
CREATE TABLE IF NOT EXISTS `dbhistory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` int(11) NOT NULL,
  `IdTask` int(11) NOT NULL,
  `Message` text COLLATE utf8_persian_ci NOT NULL,
  `Date` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `dbhistory`
--

INSERT INTO `dbhistory` (`Id`, `IdUser`, `IdTask`, `Message`, `Date`) VALUES
(1, 2, 56, 'hi', '123'),
(2, 3, 56, 'hello', '456'),
(3, 1, 56, 'ویرایش توسط1انجام شد.', '1401/6/12-22:10'),
(4, 1, 56, 'ویرایش توسطمحمد دوسیانجام شد.', '1401/6/12-22:10'),
(5, 1, 56, 'ویرایش توسط محمد دوسی انجام شد.', '1401/6/12-22:11'),
(6, 1, 58, 'ویرایش توسط محمد دوسی انجام شد.', '1401/6/12-22:21'),
(7, 1, 58, 'ویرایش توسط محمد دوسی انجام شد.', '1401/6/12-22:21'),
(8, 1, 61, 'توسطمحمد دوسیآغاز شد.', '1401/6/13-22:45'),
(9, 1, 62, 'توسطمحمد دوسیآغاز شد.', '1401/6/13-22:46'),
(10, 1, 62, 'ویرایش توسط محمد دوسی انجام شد.', '1401/7/21-20:56');

-- --------------------------------------------------------

--
-- Table structure for table `dbpermission`
--

DROP TABLE IF EXISTS `dbpermission`;
CREATE TABLE IF NOT EXISTS `dbpermission` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` int(11) NOT NULL,
  `GroupUser` int(11) NOT NULL,
  `Design` int(11) NOT NULL,
  `VideoEdit` int(11) NOT NULL,
  `ADesign` int(11) NOT NULL,
  `AVideo` int(11) NOT NULL,
  `End` int(11) NOT NULL,
  `Edit` int(11) NOT NULL,
  `Error` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbpermission`
--

INSERT INTO `dbpermission` (`Id`, `IdUser`, `GroupUser`, `Design`, `VideoEdit`, `ADesign`, `AVideo`, `End`, `Edit`, `Error`) VALUES
(1, 1, 1, 1, 0, 1, 0, 0, 0, 0),
(2, 0, 0, 1, 1, 1, 1, 1, 1, 1),
(3, 26, 0, 0, 0, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dbtask`
--

DROP TABLE IF EXISTS `dbtask`;
CREATE TABLE IF NOT EXISTS `dbtask` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Text` text COLLATE utf8_persian_ci NOT NULL,
  `Description` text COLLATE utf8_persian_ci,
  `Maker` int(3) NOT NULL,
  `Designer` int(3) DEFAULT NULL,
  `Editor` int(3) DEFAULT NULL,
  `Status` int(2) NOT NULL,
  `Level` int(1) NOT NULL,
  `Year` int(4) NOT NULL,
  `Month` int(2) NOT NULL,
  `Day` int(2) NOT NULL,
  `Nday` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `Hour` int(2) NOT NULL,
  `Min` int(2) NOT NULL,
  `Tag` text COLLATE utf8_persian_ci,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `dbtask`
--

INSERT INTO `dbtask` (`Id`, `Text`, `Description`, `Maker`, `Designer`, `Editor`, `Status`, `Level`, `Year`, `Month`, `Day`, `Nday`, `Hour`, `Min`, `Tag`) VALUES
(62, 'qwe', 'aew', 1, 1, 0, 4, 3, 1401, 6, 13, 'یکشنبه', 22, 46, '@مهدی_آرین_منش@خانم_سپهری');

-- --------------------------------------------------------

--
-- Table structure for table `dbuser`
--

DROP TABLE IF EXISTS `dbuser`;
CREATE TABLE IF NOT EXISTS `dbuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PId` text,
  `Name` text NOT NULL,
  `Password` text NOT NULL,
  `TagName` text NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `Avator` text NOT NULL,
  `Lastseen` text,
  `Android` int(2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbuser`
--

INSERT INTO `dbuser` (`Id`, `PId`, `Name`, `Password`, `TagName`, `Mobile`, `Avator`, `Lastseen`, `Android`) VALUES
(1, '12', 'محمد دوسی', '123', '@دوسی', '09367513175', '140105232f8eec2195ca171658.png', '1401/7/21 - 20:56', 29),
(2, '13', 'مهدی نیکوزاد', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@نیکوزاد', '09902564244', 'u4.png', '1400/05/03 - 15:06', 28),
(3, '14', 'محمد حسن زاده', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@حسن زاده', '09106468495', 'u4.png', '1400/05/03 - 15:06', 28),
(4, '15', 'مهدی آرین منش', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@مهدی_آرین_منش', '09217634951', 'u4.png', '1400/05/03 - 15:06', 28),
(5, '16', 'خانم پهلوان', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@خانم_پهلوان', '09167388655', '1', '1', 1),
(6, '17', 'خانم آرین منش', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@خانم_آرین_منش', '09169469197', '1', '1', 22),
(7, '18', 'خانم صحتی', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@خانم_صحتی', '09305349197', '1', '1', 23),
(8, '19', 'خانم سپهری', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@خانم_سپهری', '09027587979', '1', '1', 23),
(9, '20', 'خانم قاسم زاده', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@خانم_قاسم_زاده', '09367969244', '1', '1', 1),
(10, '21', 'احسان محمدیان', '7c4a8d09ca3762af61e59520943dc26494f8941b', '@احسان_محمدیان', '09163411645', '1', '1', 23);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
