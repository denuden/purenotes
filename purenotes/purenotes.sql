-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 09:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purenotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes_tbl`
--

CREATE TABLE `notes_tbl` (
  `noteid` int(11) NOT NULL,
  `notename` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tabid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `noteText` longtext COLLATE utf8_unicode_ci NOT NULL,
  `editTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes_tbl`
--

INSERT INTO `notes_tbl` (`noteid`, `notename`, `tabid`, `userid`, `noteText`, `editTime`, `dateCreated`) VALUES
(1, '', 1, 10, '', '2020-12-15 15:36:26', '0000-00-00'),
(23, 'note title sample 1', 33, 11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\nadd some \nnew\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\nadd some \nnewd', '2020-12-16 04:56:55', '2020-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `tab_tbl`
--

CREATE TABLE `tab_tbl` (
  `tabid` int(11) NOT NULL,
  `tabname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tab_tbl`
--

INSERT INTO `tab_tbl` (`tabid`, `tabname`, `userid`) VALUES
(1, 'fwgqwerqwrqwrwqGAWFWEGEWGWEGAW', 9),
(2, 'gwgw', 9),
(3, 'why', 9),
(4, 'ewg', 9),
(5, 'aad', 9),
(6, 'fwg', 9),
(7, 'ty', 9),
(8, 'fck', 9),
(9, 'stuff', 9),
(10, 'damn', 9),
(11, 'acasacsve', 9),
(12, 'fwfw', 9),
(13, 'aaaaa', 9),
(14, '', 9),
(15, 'fakjbgfegkaghajkglkjeglkajelkg', 9),
(16, '', 9),
(17, 'hatodg', 9),
(21, 'here', 9),
(22, 'WGAWGW', 9),
(23, 'gwhawh', 9),
(24, 'twf', 9),
(25, 'vs', 9),
(26, 'gw', 9),
(27, 'fwgw', 9),
(33, 'Sample tab 1', 11),
(42, 'fwgwegw', 10),
(47, 'fewhrh', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`userid`, `fullname`, `email`, `username`, `password`) VALUES
(1, 'von', 'test@gmail.com', 'teste', '$2y$10$cylB2AE.h5TZI7nSFfdvCOTJT36KT50llSgar0e8u8S'),
(2, 'dw', 'test@gmail.com', 'd', '$2y$10$hqgIpS7fKrVP8BXMfi1jBuS6sc7ZSScCbO00ElKyZIr'),
(3, 'a', 'test@gmail.com', 'q', '$2y$10$8txE3e9YLcW0np7roVO2EOdEJxZMXF2gHhFTyxBi1sQ'),
(4, 'v', 'test@gmail.com', 'qwe', '$2y$10$e7iCMp/xmtbePPypZygBS.2XjtWuppKsBQCwvjGUACc'),
(5, 'eqw', 'test@gmail.com', 'ffd', '$2y$10$cRLxgExOXqEWZ/yJN0A9Q.55F1lpHBRn5LUWVX2Ef0n'),
(6, 'von', 'asd@gmail.com', 'test', '$2y$10$Cum6/rbEiV7hTaNSmrYJYeYuhGpCKonFd4Wp6u0fZrI'),
(7, 'test', 'test@gmail.com', 'testt', '$2y$10$Z7sfB0RgDZKrOTVfXXSGkeh07Ccdxj6dlsYS093nPy5'),
(8, 'dwq', 'test@gmail.com', 'asd', '$2y$10$LnjHhqZT9WZOIkMAViCRYeKkEYZAy8osfEVNJSlehZM'),
(9, 'von', 'test@gmail.com', 'nov', '$2y$10$4SFUz5rgrjDg6MDQylKJ6.PB4k1eJhHSPIKbQP2k.Q6r4w0g603q2'),
(10, 'afwe', 'w@gmail.com', 'qwer', '$2y$10$IW9rftoIiqos7cvwJsxxe.xvtbPU1Fvn3OH/W6UFRL2w4KGuaVMvi'),
(11, 'Sample Sample', 'sample@gmail.com', 'sample', '$2y$10$ZMP1hJEJ3Jc8wwBW6SKKMOCquMexVzkkII.ACnjInjN3if09CkzFu'),
(12, 'Von Den', 'test@gmail.com', 'von', '$2y$10$7RZM.al9aZ7A9gkp/jIUke6dnTTDGFZNuZGR.yaLzMvHddaaM2VtK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes_tbl`
--
ALTER TABLE `notes_tbl`
  ADD PRIMARY KEY (`noteid`);

--
-- Indexes for table `tab_tbl`
--
ALTER TABLE `tab_tbl`
  ADD PRIMARY KEY (`tabid`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes_tbl`
--
ALTER TABLE `notes_tbl`
  MODIFY `noteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tab_tbl`
--
ALTER TABLE `tab_tbl`
  MODIFY `tabid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
