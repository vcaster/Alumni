-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 10:25 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(4, 'June-08-2018 17:58:25', 'somthing', 'Pulsetv', 'AINA NIRAN', '1b2a1e1747f67ce87ea8af5fdf410d23-yao-ming-face-meme-by-vexels.png', 'mig'),
(5, 'June-08-2018 18:02:29', 'sddss', 'Pulsetv', 'AINA NIRAN', '56f7e2bbcc84a.png', 'ksjkdsj'),
(7, 'June-08-2018 20:47:50', 'dfrdzvfzdfsfzdf', 'INSTABLOG', 'AINA NIRAN', 'maxresdefault (2).jpg', 'dfzdffdfxdxdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatorname`) VALUES
(1, '0', '0', '0'),
(2, 'June-07-2018 12:28:09', 'INSTABLOG', 'AINA NIRAN'),
(3, 'June-07-2018 12:49:02', 'Pulsetv', 'AINA NIRAN');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(255) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `matric` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `surname`, `firstname`, `middlename`, `email`, `address`, `matric`, `password`, `category`) VALUES
(1, 'Oluwaniran', 'Aina', 'dsd', 'ainaniran@yahoo.cof', 'ainaniran@yahoo.com', '15/1232', '', 1),
(12, 'eere', 'ereerr', 'rerer', 'ainaniran@yahoo.co', 'ainaniran@yahoo.com', '15/4333', '', 1),
(14, 'Aina', 'Oluwaniran', 'Ezekiel', 'ainaniran38@gmail.com', '12alksdlknmcs ljhnsco lnjsd', '15/0415', 'Swaggerlord', 1),
(19, 'john', 'bosco', '', 'john@bosco.com', 'jhvflgvotyfujvuofjtoyufotyuoyt', '3333333', 'are', 1),
(26, '', '', '', 'gbadamosi@yahoo.com', '', '', 'dd', 1),
(43, '', '', '', 'niran@yahoo.com', '', '', 'niran', 1),
(44, 'Jane', 'Doe', 'Example', 'janedoe@yahoo.com', 'Janes residence Lagos State Nigeria', '66/4322', 'JANE', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
