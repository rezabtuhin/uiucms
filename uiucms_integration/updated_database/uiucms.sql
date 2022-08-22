-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 07:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiucms`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_info`
--

CREATE TABLE `club_info` (
  `club_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `comment` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `followship`
--

CREATE TABLE `followship` (
  `person` varchar(10) NOT NULL,
  `follower` varchar(10) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followship`
--

INSERT INTO `followship` (`person`, `follower`, `time`) VALUES
('011191156', '011191172', '2022-08-20 03:38:54.739583'),
('011191117', '011191172', '2022-08-20 03:38:54.761509'),
('011191130', '011191172', '2022-08-20 03:38:54.775282'),
('011191187', '011191172', '2022-08-20 03:38:54.788629'),
('011191172', '011191156', '2022-08-20 03:38:54.801409'),
('011191172', '011191130', '2022-08-20 03:38:54.814144'),
('011191172', '011191117', '2022-08-20 03:38:54.826761');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `user_id` varchar(10) NOT NULL,
  `club_id` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `person` varchar(10) NOT NULL,
  `person_to` varchar(10) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`person`, `person_to`, `message`, `time`) VALUES
('011191156', 'DeptCSE', 'Assalamualaikum Sir', '2022-08-15 10:36:12.552093'),
('011191156', 'DeptCSE', 'hello', '2022-08-15 11:07:54.611196'),
('DeptCSE', '011191156', 'what? ki chao?', '2022-08-15 11:09:10.136546'),
('011191156', 'DeptCSE', 'emni message dilam dekhte j jay kina🙂', '2022-08-15 11:12:37.437976'),
('011191156', 'DeptCSE', ' nice message jacche', '2022-08-15 11:13:15.472787'),
('DeptCSE', '011191156', 'hoise ekhn off jao', '2022-08-15 11:13:47.674961'),
('011191156', 'DeptCSE', 'okay🙂', '2022-08-15 20:07:47.122716');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `post_text` varchar(10000) NOT NULL,
  `post_picture` varchar(50) NOT NULL,
  `privacy` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_reaction` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user`, `post_text`, `post_picture`, `privacy`, `time`, `total_reaction`) VALUES
(1, '011191172', 'Ajke amar mon valo nei :)', '', 'public', '2022-08-22 04:47:07', 0),
(2, '011191172', 'onek chill korchi :)', '', '', '2022-08-22 05:00:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `post_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `dept` varchar(8) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `cover_pic` varchar(200) NOT NULL,
  `bio` varchar(10000) NOT NULL,
  `fb` varchar(1000) NOT NULL,
  `linked_in` varchar(1000) NOT NULL,
  `git` varchar(1000) NOT NULL,
  `personal_web` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `dept`, `profile_pic`, `cover_pic`, `bio`, `fb`, `linked_in`, `git`, `personal_web`) VALUES
('011191117', 'Sharita Rahman', 'srahman191117@bscse.uiu.ac.bd', '011191172', 'CSE', '011191117.jpg', '011191117.jpg', '', '', '', '', ''),
('011191130', 'Ahmed Rafi Hasan', 'ahasan191130@bscse.uiu.ac.bd', '011191172', 'CSE', '011191130.jpg', '011191130.jpg', '', '', '', '', ''),
('011191156', 'Shahariar Tasin Sobuj', 'srifat191156@bscse.uiu.ac.bd', '011191172', 'CSE', '011191156.jpg', '011191156.jpg', 'Cholo na boshundhora jai :)', 'https://www.facebook.com/Shahariar.Tasin.Rifat', 'linkedin.com/rifat', 'github.com/rifat', 'rifat.com'),
('011191172', 'Afsana Airin', 'aairin191172@bscse.uiu.ac.bd', '011191172', 'CSE', '011191172.jpg', '011191172.jpg', 'Software engineer and Writer', 'https://www.facebook.com/afsana.airin.90', 'https://www.linkedin.com/in/afsana-airin-763420200/', 'https://github.com/Afsanaairin', ''),
('011191187', 'Rezab Ud Dawla', 'rdawla191187@bscse.uiu.ac.bd', '011191172', 'CSE', '011191187.jpg', '011191187.jpg', '', '', '', '', ''),
('DeptCSE', 'Department of Computer Science and Engineering', 'cse.uiu.ac.bd', '011191172', '', 'img1.png', 'img1.png', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_info`
--
ALTER TABLE `club_info`
  ADD KEY `club_id` (`club_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `followship`
--
ALTER TABLE `followship`
  ADD KEY `person` (`person`),
  ADD KEY `follower` (`follower`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `person` (`person`),
  ADD KEY `person_to` (`person_to`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_info`
--
ALTER TABLE `club_info`
  ADD CONSTRAINT `club_info_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `club_info_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `followship`
--
ALTER TABLE `followship`
  ADD CONSTRAINT `followship_ibfk_1` FOREIGN KEY (`person`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `followship_ibfk_2` FOREIGN KEY (`follower`) REFERENCES `users` (`id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`person`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`person_to`) REFERENCES `users` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `reaction`
--
ALTER TABLE `reaction`
  ADD CONSTRAINT `reaction_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
