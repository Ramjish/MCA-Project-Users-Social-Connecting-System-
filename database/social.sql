-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 04:18 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounter`
--

CREATE TABLE `accounter` (
  `accounter_id` int(11) NOT NULL,
  `accounter_first_name` varchar(15) NOT NULL,
  `accounter_last_name` varchar(15) NOT NULL,
  `accounter_email` varchar(30) NOT NULL,
  `accounter_password` text NOT NULL,
  `accounter_contact` bigint(20) NOT NULL,
  `accounter_gender` varchar(8) NOT NULL,
  `accounter_join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounter`
--

INSERT INTO `accounter` (`accounter_id`, `accounter_first_name`, `accounter_last_name`, `accounter_email`, `accounter_password`, `accounter_contact`, `accounter_gender`, `accounter_join_date`, `status`) VALUES
(1, 'akash', 'talawar', 'skytalawar@gmail.com', 'e4cf979cf717fd295f4e4edc427ee1aee78fa7dc', 8898494796, 'male', '2022-04-9 11:13:05', 0),
(2, 'girish', 'shenoy', 'girishshenoy5@gmail.com', 'efcfca81d3b24d8e3fd796347b69668a289e79e5', 9833872681, 'male', '2022-04-20 22:05:59', 0),
(3, 'renuka', 'talawar', 'renuka@gmail.com', '23cd2da0f090537ef27a942425edd60941b1da8d', 8898564654, 'female', '2022-06-10 23:42:04', 0),
(4, 'admin', 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 8898494796, 'male', '2022-05-14 17:48:47', 1),


-- --------------------------------------------------------

--
-- Table structure for table `accounter_details`
--

CREATE TABLE `accounter_details` (
  `acccounter_deatils_id` int(11) NOT NULL,
  `accounter_address` text NOT NULL,
  `accounter_cover_photo` varchar(200) NOT NULL DEFAULT 'cover.jpg',
  `accounter_dp` varchar(200) NOT NULL,
  `accounter_nationality` varchar(20) NOT NULL,
  `accounter_language` text NOT NULL,
  `accounter_id` int(11) NOT NULL,
  `accounter_DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounter_details`
--

INSERT INTO `accounter_details` (`acccounter_deatils_id`, `accounter_address`, `accounter_cover_photo`, `accounter_dp`, `accounter_nationality`, `accounter_language`, `accounter_id`, `accounter_DOB`) VALUES
(1, 'mumbai', 'IMG_20161219_141946.jpg', '2015-04-12-17-21-08-751.jpg', 'indian', 'english,kannada,hindi,marathi', 1, '1995-12-08'),
(2, 'mumbai', 'IMG-20161223-WA0002~01.jpg', '3.jpg', 'indian', 'english', 2, '1995-12-08'),
(3, 'mumbai', 'offer.png', '5.jpg', 'indian', 'english', 3, '1995-12-08'),
(4, 'mumbai', 'cover.jpg', 'female.png', 'indian', 'english', 5, '1995-12-08'),
(5, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 6, '1995-12-08'),
(6, 'mumbai', '2.jpg', 'selfiecamera_2016-12-19-14-25-50-234.jpg', 'indian', 'english', 7, '1995-12-08'),
(7, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 8, '1995-12-08'),
(8, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 9, '1995-12-08'),
(9, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 10, '1995-12-08'),
(10, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 11, '1995-12-08'),
(11, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 13, '1995-12-08'),
(12, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 14, '1995-12-08'),
(13, 'mumbai', 'divback.jpg', 'female.png', 'indian', 'english', 15, '1995-12-08'),
(14, 'mumbai', 'cover.jpg', 'male1.png', 'indian', 'english', 16, '1995-12-08'),
(15, 'mumbai', 'cover.jpg', '2.jpg', 'indian', 'english', 17, '2017-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `active`
--

CREATE TABLE `active` (
  `accounter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active`
--

INSERT INTO `active` (`accounter_id`, `status`) VALUES
(1, 0),
(2, 0),
(3, 0),
(10, 0),
(11, 0),
(13, 0),
(5, 0),
(14, 0),
(7, 0),
(15, 0),
(16, 0),
(17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `accounter_id` int(11) NOT NULL,
  `background_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`accounter_id`, `background_img`) VALUES
(1, 'divback.jpg'),
(2, '7.jpg'),
(3, '13_Brief_58.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `accounter_id` int(11) NOT NULL,
  `comment_desc` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `accounter_id`, `comment_desc`, `comment_date`) VALUES
(1, 5, 3, 'my big bro...miss u', '2017-05-03 08:52:18'),
(2, 5, 1, 'miss u to sis..', '2017-05-03 08:54:30'),
(3, 7, 1, 'awesome...', '2017-05-03 08:55:55'),
(4, 7, 3, 'nice one...bro', '2017-05-03 08:56:08'),
(5, 6, 2, 'heart touching movie..', '2017-05-03 09:02:00'),
(6, 1, 2, 'i am also winner ...', '2017-05-03 09:02:31'),
(7, 1, 7, 'congrats both of u....', '2017-05-03 09:08:18'),
(8, 10, 17, 'nice song', '2017-05-04 12:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `folder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `folder_id`) VALUES
(1, 'Software Project Management - A Unified Framework by Walker Royce.pdf', 1),
(2, '20151018_061644.jpg', 2),
(3, '365253a46042d88be880f9f27b3773a9.jpg', 2),
(4, 'CanvasJS Chart.jpeg', 8),
(5, '17554581_638295229693498_8170178464245459948_n.jpg', 9),
(6, 'akash.pdf', 9),
(7, 'akash.pdf', 14),
(8, 'PM_Manual.pdf', 15),
(9, '2.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `fid` int(11) NOT NULL,
  `folder_name` varchar(50) NOT NULL,
  `accounter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`fid`, `folder_name`, `accounter_id`) VALUES
(1, 'java notes', 1),
(2, 'my pics', 1),
(3, 'hello', 1),
(4, 'ajax', 5),
(5, 'c#', 1),
(6, 'world skill', 14),
(7, 'ak', 1),
(8, 'akash1', 1),
(9, 'akash rupali', 2),
(10, 'rupali', 2),
(11, 'sky', 1),
(12, 'a1', 1),
(13, 'avi', 1),
(14, 'pk', 1),
(15, 'shuboy', 1),
(16, 'java', 1),
(17, 'parmod', 17);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `froms` int(11) NOT NULL,
  `tos` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`froms`, `tos`, `status`) VALUES
(3, 2, 1),
(2, 1, 1),
(2, 5, 1),
(1, 6, 0),
(7, 1, 1),
(3, 1, 1),
(13, 1, 1),
(15, 2, 0),
(1, 5, 0),
(17, 1, 1),
(17, 3, 0),
(1, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `group_desc` varchar(500) NOT NULL,
  `accounter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `accounter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `accounter_id`) VALUES
(2, 2),
(3, 13),
(1, 2),
(5, 3),
(5, 1),
(7, 3),
(7, 2),
(6, 2),
(5, 2),
(7, 7),
(1, 7),
(10, 1),
(6, 1),
(8, 1),
(10, 17),
(9, 17);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `message_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_id`, `receiver_id`, `message`, `message_date`) VALUES
(1, 2, 1, 'hello', '2017-04-21 20:24:27'),
(2, 1, 2, 'hello', '2017-04-21 20:24:40'),
(3, 2, 1, 'hello', '2017-04-22 20:02:44'),
(4, 1, 2, 'hiii', '2017-04-22 20:02:53'),
(5, 1, 2, 'hello', '2017-04-22 20:03:16'),
(6, 1, 2, 'fine', '2017-04-22 20:03:39'),
(7, 2, 1, 'ihi', '2017-04-22 20:04:01'),
(8, 1, 2, 'hugu', '2017-04-22 20:04:15'),
(9, 2, 1, 'hiii', '2017-04-22 20:06:52'),
(10, 1, 2, 'kjb', '2017-04-22 20:07:08'),
(11, 1, 2, 'akash', '2017-04-22 20:07:17'),
(12, 1, 2, 'bjb', '2017-04-22 20:07:50'),
(13, 1, 2, 'jhb', '2017-04-22 20:08:13'),
(14, 2, 1, 'jhvjh', '2017-04-22 20:08:25'),
(15, 1, 2, 'akash', '2017-04-27 21:22:43'),
(16, 1, 13, 'hello', '2017-04-30 09:36:02'),
(17, 13, 1, 'hello', '2017-04-30 09:36:22'),
(18, 2, 1, 'hello', '2017-05-03 08:45:22'),
(19, 1, 2, 'hii', '2017-05-03 08:45:37'),
(20, 1, 2, 'hello good evening...', '2017-05-03 16:55:45'),
(21, 1, 2, 'hello', '2017-05-04 09:45:45'),
(22, 1, 2, 'bhjvh', '2017-05-04 09:48:23'),
(23, 1, 2, 'hello', '2017-05-04 09:50:23'),
(24, 1, 2, 'hiii', '2017-05-04 10:33:35'),
(25, 1, 3, 'hello', '2017-05-04 10:35:22'),
(26, 2, 1, 'hrllo', '2017-05-04 10:40:16'),
(27, 1, 2, 'Hii', '2017-05-04 11:38:31'),
(28, 1, 2, 'hello hw r u?', '2017-05-04 12:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_description` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_img` text NOT NULL,
  `accounter_id` int(11) NOT NULL,
  `post_video` varchar(100) NOT NULL,
  `post_audio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_description`, `post_date`, `post_img`, `accounter_id`, `post_video`, `post_audio`) VALUES
(1, '#_1st_#_price_#_in_#_technova...2k16..', '2017-04-21 19:45:28', '20161219_161516.jpg', 1, '', ''),
(2, 'hello...', '2017-04-21 20:19:29', '', 2, '', ''),
(3, 'hhh', '2017-04-30 09:34:03', '', 13, '', ''),
(4, '', '2017-04-30 09:34:18', '17554581_638295229693498_8170178464245459948_n.jpg', 13, '', ''),
(5, 'my bro...', '2017-05-03 08:51:48', '365253a46042d88be880f9f27b3773a9.jpg', 3, '', ''),
(6, 'kaabil movie..', '2017-05-03 08:53:27', '', 3, 'Sample.mkv', ''),
(7, 'humsufer...', '2017-05-03 08:55:37', '', 1, '', '05 - Humsafar - DownloadMing.SE.mp3'),
(8, 'assians cridit...sample movie...', '2017-05-03 09:12:20', '', 1, 'Sample1.mkv', ''),
(9, 'my activity graph in skyconnect...', '2017-05-03 09:22:36', 'CanvasJS Chart.png', 1, '', ''),
(10, 'hello..good morining friends..', '2017-05-04 11:07:13', '', 1, '', ''),
(11, 'song..', '2017-05-04 12:32:32', '', 1, '', '05 - Humsafar - DownloadMing.SE.mp3'),
(12, 'pic..', '2017-05-04 12:33:42', 'Juyzpo1.jpg', 17, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `unlike`
--

CREATE TABLE `unlike` (
  `post_id` int(11) NOT NULL,
  `accounter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unlike`
--

INSERT INTO `unlike` (`post_id`, `accounter_id`) VALUES
(3, 13),
(2, 2),
(7, 7),
(4, 1),
(10, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounter`
--
ALTER TABLE `accounter`
  ADD PRIMARY KEY (`accounter_id`),
  ADD UNIQUE KEY `accounter_email` (`accounter_email`);

--
-- Indexes for table `accounter_details`
--
ALTER TABLE `accounter_details`
  ADD PRIMARY KEY (`acccounter_deatils_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounter`
--
ALTER TABLE `accounter`
  MODIFY `accounter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `accounter_details`
--
ALTER TABLE `accounter_details`
  MODIFY `acccounter_deatils_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
