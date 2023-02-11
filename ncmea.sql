-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 09:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncmea`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `Blog_ID` int(11) NOT NULL,
  `Blog_Cat_ID` int(11) NOT NULL,
  `Blog_Title` varchar(225) DEFAULT NULL,
  `Blog_Content` text NOT NULL,
  `Blog_Image_S` text DEFAULT NULL,
  `Blog_Image_B` text DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` datetime NOT NULL,
  `Author` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`Blog_ID`, `Blog_Cat_ID`, `Blog_Title`, `Blog_Content`, `Blog_Image_S`, `Blog_Image_B`, `Date`, `Time`, `Author`) VALUES
(2, 3, 'Help for Poor', 'Lorem uipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '1667860053_teaching_quran.jpg', 'teaching_quran.jpg', '2020-04-14', '2020-04-14 09:45:00', 'Qarban Ali'),
(6, 4, 'asdasda', 'asdas', '1667859972_teaching_quran.jpg', '1667858286_teaching_quran.jpg', '2022-11-08', '2022-11-08 19:37:00', 'sadas');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cats`
--

CREATE TABLE `blog_cats` (
  `Blog_Cat_ID` int(11) NOT NULL,
  `Blog_Cat_Name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_cats`
--

INSERT INTO `blog_cats` (`Blog_Cat_ID`, `Blog_Cat_Name`) VALUES
(3, 'Quran Teachings'),
(4, 'Islamic Country'),
(6, 'Islamic Nation');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `Event_Title` varchar(225) NOT NULL,
  `Event_Content` varchar(225) NOT NULL,
  `Event_Location` varchar(225) NOT NULL,
  `Event_Date` date NOT NULL,
  `Event_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE `scholars` (
  `Scholar_ID` int(11) NOT NULL,
  `Scholar_Name` varchar(225) NOT NULL,
  `Scholar_Email` varchar(225) NOT NULL,
  `Twitter` text DEFAULT NULL,
  `Facebook` text DEFAULT NULL,
  `Youtube` text DEFAULT NULL,
  `Scholar_Description` text NOT NULL,
  `Scholar_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`Scholar_ID`, `Scholar_Name`, `Scholar_Email`, `Twitter`, `Facebook`, `Youtube`, `Scholar_Description`, `Scholar_Image`) VALUES
(3, 'Adebayo Bakare', 'hardebayobakare@gmail.com', 'sadasdasd', 'sadasdasd', 'sadasdasd', 'asdasdasd asdasdas ddasdasdasd', '1668739778_user.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`ID`, `Image`) VALUES
(1, 'slider1.jpg'),
(2, 'slider2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `Phone` varchar(14) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Fpassword_Token` varchar(225) NOT NULL,
  `Session_ID` varchar(225) DEFAULT NULL,
  `Email_enc` varchar(225) DEFAULT NULL,
  `Reg_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Email`, `Address`, `Phone`, `Password`, `Fpassword_Token`, `Session_ID`, `Email_enc`, `Reg_Date`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Edmonton, Canada', '+15879911913', '$2y$10$z59MzyL.En5NZ2FTdtu8M.HTvBOq9D1Hp1zDlVlTZSSepSg02l4n.', '', 'cvfoargd13me96ch85llerkvev', NULL, '2022-10-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`Blog_ID`),
  ADD KEY `Blog_Cat_ID` (`Blog_Cat_ID`);

--
-- Indexes for table `blog_cats`
--
ALTER TABLE `blog_cats`
  ADD PRIMARY KEY (`Blog_Cat_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `scholars`
--
ALTER TABLE `scholars`
  ADD PRIMARY KEY (`Scholar_ID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `Blog_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_cats`
--
ALTER TABLE `blog_cats`
  MODIFY `Blog_Cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scholars`
--
ALTER TABLE `scholars`
  MODIFY `Scholar_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`Blog_Cat_ID`) REFERENCES `blog_cats` (`Blog_Cat_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
