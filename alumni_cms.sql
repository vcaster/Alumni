-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 01:26 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `addedby` varchar(20) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `category` int(10) NOT NULL,
  `datetimelogged` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `addedby`, `datetime`, `category`, `datetimelogged`) VALUES
(1, 'admin', 'qqqqqq', 'AINA NIRAN', '', 0, 0),
(2, 'admin', 'dddddd', 'AINA NIRAN', 'June-12-2018 17:35:32', 0, 0),
(3, 'Ainaniran', 'Ainaniran', 'AINA NIRAN', 'June-12-2018 18:11:42', 0, 0),
(4, 'qqqqqq', 'qqqqqq', 'Aina', 'June-12-2018 22:40:44', 0, 0),
(5, 'Ezekiel', 'eeeeee', 'qqqqqq', 'June-13-2018 10:20:49', 0, 0);

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
(7, 'June-13-2018 08:59:28', 'dfrdzvfzdfsfzdf', 'Pulsetv', 'AINA NIRAN', '2014-02-Summer-Wallpaper-25.jpg', 'dfzdffdfxdxdf'),
(9, 'June-13-2018 08:59:18', 'sldssdmklkjjk', 'Pulsetv', 'AINA NIRAN', '51h4sGbMQbL.png', 'trump'),
(10, 'June-13-2018 09:44:10', 'Caleb University', 'INSTABLOG', 'Ainaniran', '38t1wlyw4z4y.png', 'hjbdsfkjdrkfdkdsjvbhjgfrkhgknhjfkjfkugfjhdfbhjvrfjlxfbjfblefwnmgfbjhzbkhgzsjeridxfbfv;khgrbk;bdih;kbn;dxkhbfzsjvszuszjjhfxr bxjhdbvjbkhfv bx;dfkb fx;dvi;bhk'),
(11, 'June-13-2018 12:18:26', 'kisdlksd', 'Pulsetv', 'Dada', '0-W_3koJ9hFcRFHr6l.jpg', 'bkhusdfkjbdsfkvfdkhudskhus'),
(13, 'June-14-2018 15:05:44', 'test', 'test', 'Dada', '0d9b24189f42fb3f2563ef854b41ab0f.png', 'jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  jhbdslezbyuxjhbvglyujxgbhuyjhdrgbyuxjhbcylud jvbeluarhdzyyv  ');

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
(3, 'June-07-2018 12:49:02', 'Pulsetv', 'AINA NIRAN'),
(4, 'June-14-2018 15:04:32', 'test', 'Dada');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL,
  `addedby` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `comments`, `status`, `admin_panel_id`, `addedby`, `image`) VALUES
(21, 'June-16-2018 17:12:06', '', 'dsvsdv ', 'ON', 13, 'Ayomide Popoola', 'AINA OLUWANIRAN.jpg'),
(22, 'June-16-2018 17:28:32', '', 'klcfklfd\r\n', 'ON', 13, 'Ayomide Popoola', 'AINA OLUWANIRAN.jpg'),
(23, 'June-16-2018 17:40:18', '', 'lkjsdkds', 'ON', 13, 'neon', ''),
(24, 'June-16-2018 17:43:12', '', ',mds,mds', 'ON', 13, 'Ayomide Popoola', 'ecb07f912670b91bbf714bb6d8053f8e--open-letter-smiley-faces.jpg'),
(25, 'June-16-2018 17:43:43', '', 'sd,jsdj', 'OFF', 13, 'Ayomide Popoola', 'ecb07f912670b91bbf714bb6d8053f8e--open-letter-smiley-faces.jpg'),
(26, 'June-19-2018 19:55:10', '', 'yyuyuyuguyguy', 'ON', 13, 'Ayomide Popoola', 'ecb07f912670b91bbf714bb6d8053f8e--open-letter-smiley-faces.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`id`, `datetime`, `status`, `user_id`) VALUES
(4, 'June-20-2018 11:05:39', '', 54),
(5, 'June-20-2018 15:20:52', 'PAYED', 54);

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
  `phoneno` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `gradyear` varchar(5) NOT NULL,
  `password` varchar(20) NOT NULL,
  `category` int(10) NOT NULL,
  `datetimelogged` varchar(10) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `dp` varchar(100) NOT NULL,
  `datetime` varchar(11) NOT NULL,
  `addedby` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `surname`, `firstname`, `middlename`, `email`, `address`, `matric`, `phoneno`, `department`, `gradyear`, `password`, `category`, `datetimelogged`, `bio`, `dp`, `datetime`, `addedby`) VALUES
(51, 'Ayomide', 'Popoola', 'John', 'ayo@yahoo.com', '13,Jakande street,ikeja,Lagos, Nigeria', '12/3234', '', '', '', 'ayo', 1, '', '', 'ecb07f912670b91bbf714bb6d8053f8e--open-letter-smiley-faces.jpg', '', ''),
(52, '', '', '', 'neon', '', '', '', '', '', 'neons', 0, '', '', '', 'June-14-201', 'Dada'),
(53, '', '', '', 'femii', '', '', '', '', '', 'femmi', 0, '', '', '', 'June-19-201', 'neon'),
(54, 'Aina', 'Oluwaniran', 'Ezekiel', 'ainaniran@yahoo.com', 'babcock university', '15/0415', '07018048701', 'Computer Science', '2018', 'niran', 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transcriptsreq`
--

CREATE TABLE `transcriptsreq` (
  `id` int(10) NOT NULL,
  `datetime` int(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `info_id` int(20) NOT NULL,
  `addedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcriptsreq`
--
ALTER TABLE `transcriptsreq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_id` (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `transcriptsreq`
--
ALTER TABLE `transcriptsreq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `foreign_key_admin` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dues`
--
ALTER TABLE `dues`
  ADD CONSTRAINT `foreign_key_dues` FOREIGN KEY (`user_id`) REFERENCES `info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
