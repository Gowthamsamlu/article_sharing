-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 09:10 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_shr_attachments`
--

CREATE TABLE `art_shr_attachments` (
  `PST_ATTACH_ID` int(11) NOT NULL,
  `POST_ID` int(11) DEFAULT NULL,
  `ATTACHMENT_ORDER` int(11) DEFAULT NULL,
  `ATTACHMENT_PATH` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_shr_attachments`
--

INSERT INTO `art_shr_attachments` (`PST_ATTACH_ID`, `POST_ID`, `ATTACHMENT_ORDER`, `ATTACHMENT_PATH`) VALUES
(3, 10, 1, 'posts/19MX153_1_754195001572629236.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `art_shr_chat`
--

CREATE TABLE `art_shr_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_from` int(11) NOT NULL,
  `chat_to` int(11) NOT NULL,
  `chat_msg` varchar(1000) NOT NULL,
  `chat_msg_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `chat_red_by_recipient` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_shr_chat`
--

INSERT INTO `art_shr_chat` (`chat_id`, `chat_from`, `chat_to`, `chat_msg`, `chat_msg_time`, `chat_red_by_recipient`) VALUES
(1, 8, 1, 'Hi hello', '2019-11-21 08:10:11', 1),
(4, 1, 4, 'Hi John', '2019-11-21 15:36:42', 1),
(5, 1, 4, 'How are you', '2019-11-21 16:02:56', 1),
(6, 1, 8, 'Its been a long time seen you around', '2019-11-21 16:22:23', 0),
(20, 1, 4, 'Hello', '2019-11-22 00:22:34', 1),
(21, 4, 1, 'Fine', '2019-11-22 00:25:28', 1),
(25, 1, 4, 'How do you do?', '2019-11-22 07:55:26', 1),
(26, 1, 8, 'You there??', '2019-11-22 07:55:34', 0),
(27, 1, 4, 'Fine here', '2019-11-29 16:13:29', 1),
(28, 1, 11, 'Hi', '2019-12-05 15:01:58', 1),
(29, 11, 1, 'hello', '2019-12-05 15:01:59', 1),
(30, 1, 11, 'How do you do??', '2019-12-05 15:02:29', 1),
(31, 11, 1, 'i m good what about you?', '2019-12-05 15:02:47', 1),
(32, 1, 11, 'Great!!', '2019-12-05 15:02:55', 1),
(33, 11, 1, 'good', '2019-12-05 15:03:05', 1),
(34, 11, 1, 'good', '2019-12-05 15:03:11', 1),
(35, 11, 1, 'good', '2019-12-05 15:03:24', 1),
(36, 11, 1, 'what doing', '2019-12-05 15:03:58', 1),
(37, 1, 11, 'Hi', '2019-12-05 15:04:34', 1),
(38, 11, 1, 'testing', '2019-12-05 15:04:48', 1),
(39, 11, 1, 'testing', '2019-12-05 15:05:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `art_shr_login`
--

CREATE TABLE `art_shr_login` (
  `USER_ID` int(11) NOT NULL,
  `FNAME` varchar(15) NOT NULL,
  `LNAME` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `ROLL_NO` varchar(10) DEFAULT NULL,
  `ACTIVE_FLG` int(11) DEFAULT '0',
  `LAST_ACTIVITY` datetime DEFAULT CURRENT_TIMESTAMP,
  `JOINED_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `DOB` date DEFAULT NULL,
  `YOC` varchar(4) DEFAULT NULL,
  `PASSWORD1` varchar(30) DEFAULT NULL,
  `GENDER` varchar(1) DEFAULT NULL,
  `AUTHEN_FLG` int(11) DEFAULT '0',
  `ACCTYPE` varchar(1) DEFAULT 'S',
  `PROFILEPICPATH` varchar(500) DEFAULT 'profile_pic_uploads/default_image.png',
  `BLOCKD_FLG` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_shr_login`
--

INSERT INTO `art_shr_login` (`USER_ID`, `FNAME`, `LNAME`, `EMAIL`, `ROLL_NO`, `ACTIVE_FLG`, `LAST_ACTIVITY`, `JOINED_DATE`, `DOB`, `YOC`, `PASSWORD1`, `GENDER`, `AUTHEN_FLG`, `ACCTYPE`, `PROFILEPICPATH`, `BLOCKD_FLG`) VALUES
(1, 'Gowtham', 'Balaji B', 'gowthamsamlu@gmail.com', '19MX153', 1, '2019-10-29 12:15:35', '2019-10-29 00:00:00', '1997-02-20', '2020', 'Birthday', 'M', 1, 'A', 'profile_pic_uploads/19MX153_917980001574320917.jpg', 0),
(3, 'Gowtham', 'S P', 'gowthamkaviarasan59@gmail.com', '18mx209', 0, '2019-10-30 15:09:45', '2019-10-30 00:00:00', '1998-09-05', '2021', '12345', 'M', 1, 'S', 'profile_pic_uploads/default_image.png', 0),
(4, 'John', 'Issac', 'johnvissac1997@gmail.com', '18mx211', 0, '2019-11-04 10:34:01', '2019-11-04 00:00:00', '1997-01-27', '2021', 'john97', 'M', 1, 'S', 'profile_pic_uploads/18mx211_228249001572845163.jpg', 0),
(5, 'Gopi', 'Haritha', 'gopincc31@gmail.com', '18mx208', 0, '2019-11-04 13:46:38', '2019-11-04 00:00:00', '1995-05-30', '2021', 'haritha', 'M', 0, 'S', 'profile_pic_uploads/default_image.png', 0),
(6, 'Ilayaraja', 'N', 'ilayarajaan@gmail.com', 'C574', 0, '2019-11-05 09:14:01', '2019-11-05 00:00:00', '1976-10-31', '2020', 'Ilayaraja', 'M', 0, 'S', 'profile_pic_uploads/C574_624827001572925441.png', 0),
(7, 'Jothi', 'Ram', 'ramukuttytheiva@gmail.com', '18mx106', 0, '2019-11-18 17:22:03', '2019-11-18 00:00:00', '2019-11-26', '2021', 'arya', 'M', 0, 'S', 'profile_pic_uploads/default_image.png', 0),
(8, 'Rajeswari', 'S', 'srajes152@gmail.com', '19MX159', 0, '2019-11-19 10:35:06', '2019-11-19 00:00:00', '1999-06-08', '2021', 'qwertyui', 'F', 1, 'S', 'profile_pic_uploads/19MX159_701548001574141649.jpg', 0),
(11, 'Subitcha', 'Govindaraj', 'subigovind1997@gmail.com', '18mx118', 1, '2019-12-05 14:53:39', '2019-12-05 14:53:39', '1997-11-12', '2021', 'Subi1997', 'F', 1, 'S', 'profile_pic_uploads/18mx118_618956001575538308.png', 0),
(12, 'bala', 'kumar', 'abalakumar@gmail.com', '19mx151', 1, '2019-12-05 15:12:37', '2019-12-05 15:12:37', '1997-12-20', '2021', 'bala123', 'M', 0, 'S', 'profile_pic_uploads/default_image.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `art_shr_posts`
--

CREATE TABLE `art_shr_posts` (
  `POST_ID` int(11) NOT NULL,
  `POSTED_BY` int(11) DEFAULT NULL,
  `CREATED_TIME` datetime DEFAULT CURRENT_TIMESTAMP,
  `LIKES` int(11) DEFAULT '0',
  `SHARES` int(11) DEFAULT '0',
  `TITLE` varchar(1000) DEFAULT NULL,
  `CAPTION1` varchar(10000) DEFAULT NULL,
  `VALIDFLAG` int(11) DEFAULT '1',
  `BLOCKABLE` int(11) DEFAULT '1',
  `BLOCKED_BY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_shr_posts`
--

INSERT INTO `art_shr_posts` (`POST_ID`, `POSTED_BY`, `CREATED_TIME`, `LIKES`, `SHARES`, `TITLE`, `CAPTION1`, `VALIDFLAG`, `BLOCKABLE`, `BLOCKED_BY`) VALUES
(2, 1, '2019-11-01 21:32:12', 0, 0, 'Title of the post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue volutpat ornare. Mauris orci augue, dapibus a enim et, fermentum euismod diam. Integer scelerisque, orci quis porttitor malesuada, augue augue venenatis ligula, eu fringilla massa libero quis ligula. Integer ullamcorper nibh vitae enim facilisis semper. Aliquam erat volutpat. Curabitur augue diam, rutrum quis lorem vitae, sagittis commodo erat. Nulla eleifend et urna pharetra varius. Sed blandit ipsum aliquet, ornare odio a, blandit arcu.', 0, 1, 1),
(3, 1, '2019-11-01 21:08:12', 0, 0, 'Title of the post3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue volutpat ornare. Mauris orci augue, dapibus a enim et, fermentum euismod diam. Integer scelerisque, orci quis porttitor malesuada, augue augue venenatis ligula, eu fringilla massa libero quis ligula. Integer ullamcorper nibh vitae enim facilisis semper. Aliquam erat volutpat. Curabitur augue diam, rutrum quis lorem vitae, sagittis commodo erat. Nulla eleifend et urna pharetra varius. Sed blandit ipsum aliquet, ornare odio a, blandit arcu.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue volutpat ornare. Mauris orci augue, dapibus a enim et, fermentum euismod diam. Integer scelerisque, orci quis porttitor malesuada, augue augue venenatis ligula, eu fringilla massa libero quis ligula. Integer ullamcorper nibh vitae enim facilisis semper. Aliquam erat volutpat. Curabitur augue diam, rutrum quis lorem vitae, sagittis commodo erat. Nulla eleifend et urna pharetra varius. Sed blandit ipsum aliquet, ornare odio a, blandit arcu.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue volutpat ornare. Mauris orci augue, dapibus a enim et, fermentum euismod diam. Integer scelerisque, orci quis porttitor malesuada, augue augue venenatis ligula, eu fringilla massa libero quis ligula. Integer ullamcorper nibh vitae enim facilisis semper. Aliquam erat volutpat. Curabitur augue diam, rutrum quis lorem vitae, sagittis commodo erat. Nulla eleifend et urna pharetra varius. Sed blandit ipsum aliquet, ornare odio a, blandit arcu.', 0, 1, 1),
(8, 1, '2019-11-01 22:44:41', 0, 0, 'Post with images', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue volutpat ornare. Mauris orci augue, dapibus a enim et, fermentum euismod diam. Integer scelerisque, orci quis porttitor malesuada, augue augue venenatis ligula, eu fringilla massa libero quis ligula. Integer ullamcorper nibh vitae enim facilisis semper. Aliquam erat volutpat. Curabitur augue diam, rutrum quis lorem vitae, sagittis commodo erat. Nulla eleifend et urna pharetra varius. Sed blandit ipsum aliquet, ornare odio a, blandit arcu.', 0, 1, 1),
(10, 1, '2019-11-01 22:57:16', 0, 0, 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue volutpat ornare. Mauris orci augue, dapibus a enim et, fermentum euismod diam. Integer scelerisque, orci quis porttitor malesuada, augue augue venenatis ligula, eu fringilla massa libero quis ligula. Integer ullamcorper nibh vitae enim facilisis semper. Aliquam erat volutpat. Curabitur augue diam, rutrum quis lorem vitae, sagittis commodo erat. Nulla eleifend et urna pharetra varius. Sed blandit ipsum aliquet, ornare odio a, blandit arcu.', 0, 1, 1),
(11, 4, '2019-11-04 10:41:29', 0, 0, 'Placement', 'The Stock Span Problem The stock span problem is a financial problem where we have a series of n daily price quotes for a stock and we need to calculate span of stockâ€™s price for all n days. The span Si of the stockâ€™s price on a given day i is defined as the maximum number of consecutive days just before the given day, for which the price of the stock on the current day is less than or equal to its price on the given day. For example, if an array of 7 days prices is given as {100, 80, 60, 70, 60, 75, 85}, then the span values for corresponding 7 days are {1, 1, 1, 2, 1, 4, 6}', 1, 1, 1),
(13, 4, '2019-11-05 09:17:34', 0, 0, 'trt', 'trtrt', 0, 1, 1),
(14, 4, '2019-11-05 09:17:41', 0, 0, 'dsd', 'dsds', 0, 1, 1),
(15, 1, '2019-11-19 07:31:54', 0, 0, 'Sample post', '<h3>Heading of the Post:-</h3>\r\n<p style=\"padding-left: 40px;\">This is a <em>sample</em> <em>post</em> created using automatic styles of <strong>Tinymce</strong>.</p>\r\n<p style=\"padding-left: 40px;\">&nbsp;</p>', 0, 1, 1),
(16, 1, '2019-11-19 08:03:09', 0, 0, 'Sample post12', '<p>aasdad</p>', 0, 1, 1),
(17, 1, '2019-11-19 19:41:25', 0, 0, 'Placement questions', '<p>The Stock Span Problem The stock span problem is a financial problem where we have a series of n daily price quotes for a stock and we need to calculate span of stock&rsquo;s price for all n days. The span Si of the stock&rsquo;s price on a given day i is defined as the maximum number of consecutive days just before the given day, for which the price of the stock on the current day is less than or equal to its price on the given day. For example, if an array of 7 days prices is given as {100, 80, 60, 70, 60, 75, 85}, then the span values for corresponding 7 days are {1, 1, 1, 2, 1, 4, 6}</p>', 0, 1, 1),
(18, 1, '2019-11-22 10:05:24', 0, 0, 'Table post', '<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">Table header</td>\r\n<td style=\"width: 33.3333%;\">Table header1</td>\r\n<td style=\"width: 33.3333%;\">Table header2</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">Content</td>\r\n<td style=\"width: 33.3333%;\">Content</td>\r\n<td style=\"width: 33.3333%;\">Content</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">sdasdak</td>\r\n<td style=\"width: 33.3333%;\">sdsakd</td>\r\n<td style=\"width: 33.3333%;\">sadd</td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `REC_ID` int(11) NOT NULL,
  `POSTID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `LAST_SEEN_DATE` date DEFAULT NULL,
  `VIEW_CNT` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`REC_ID`, `POSTID`, `USER_ID`, `LAST_SEEN_DATE`, `VIEW_CNT`) VALUES
(1, 11, 1, '2019-12-05', 80),
(2, 3, 1, '2019-11-22', 45),
(3, 13, 1, '2019-11-18', 1),
(4, 15, 1, '2019-11-19', 8),
(5, 16, 1, '2019-11-19', 1),
(6, 15, 8, '2019-11-19', 1),
(7, 11, 8, '2019-11-19', 1),
(8, 15, 9, '2019-11-19', 1),
(9, 11, 9, '2019-11-19', 1),
(10, 3, 8, '2019-11-19', 1),
(11, 17, 1, '2019-11-19', 98),
(12, 11, 4, '2019-11-29', 2),
(13, 3, 4, '2019-11-22', 2),
(14, 18, 1, '2019-11-22', 1),
(15, 11, 11, '2019-12-05', 1),
(16, 10, 1, '2019-12-05', 1),
(17, 10, 11, '2019-12-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_shr_attachments`
--
ALTER TABLE `art_shr_attachments`
  ADD PRIMARY KEY (`PST_ATTACH_ID`);

--
-- Indexes for table `art_shr_chat`
--
ALTER TABLE `art_shr_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `art_shr_login`
--
ALTER TABLE `art_shr_login`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `art_shr_posts`
--
ALTER TABLE `art_shr_posts`
  ADD PRIMARY KEY (`POST_ID`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`REC_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_shr_attachments`
--
ALTER TABLE `art_shr_attachments`
  MODIFY `PST_ATTACH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `art_shr_chat`
--
ALTER TABLE `art_shr_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `art_shr_login`
--
ALTER TABLE `art_shr_login`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `art_shr_posts`
--
ALTER TABLE `art_shr_posts`
  MODIFY `POST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
