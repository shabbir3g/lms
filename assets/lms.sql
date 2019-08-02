-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 10:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_data` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `libraian_username` varchar(50) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_data`, `book_price`, `book_qty`, `available_qty`, `libraian_username`, `datetime`) VALUES
(4, 'ভাল্লাগে না', '20190728042630.png', 'আয়মান সাদিক', 'রকমারি', '2019-07-01', '345', 23, 23, '', '2019-07-28 14:26:30'),
(5, 'প্যারাময় লাইফের প্যারাসিটামল', '20190728043353.png', 'ঝংকার মাহমুদ', 'রকমারি', '2019-01-08', '345', 23, 23, 'shabbir5g', '2019-07-28 14:33:53'),
(6, 'মস্তিষ্কের ক্যানভাস', '20190729114854.png', 'সোলায়মান সুখন', 'রকমারি', '2019-07-02', '230', 34, 34, 'shabbir5g', '2019-07-29 09:48:54'),
(7, 'অঙ্ক ভাইয়া', '20190729010950.png', 'চমক হাসান', 'রকমারি', '2019-07-03', '234', 56, 56, '', '2019-07-29 11:09:50'),
(8, 'নেভার স্টপ লার্নিং ', '20190729011249.png', 'আয়মান সাদিক', 'রকমারি', '2019-07-16', '123', 45, 45, 'shabbir5g', '2019-07-29 11:12:49'),
(9, 'Bandhobi', '20190802045120.png', 'Raba Khan', 'রকমারি', '2018-11-30', '220', 45, 45, 'shabbir5g', '2019-08-02 14:51:20'),
(10, 'মৃত্যুক্ষুধা ', '20190802050641.png', 'কাজী নজরুল ইসলাম', 'লেখালেখি', '2018-12-31', '179', 56, 56, 'shabbir5g', '2019-08-02 15:06:41'),
(11, 'শেষের কবিতা', '20190802050731.png', 'রবীন্দ্রনাথ ঠাকুর', 'ভাষাপ্রকাশ', '2019-03-14', '223', 67, 67, 'shabbir5g', '2019-08-02 15:07:31'),
(12, 'নৌকাডুবি ', '20190802050850.png', 'রবীন্দ্রনাথ ঠাকুর', 'প্রচলন প্রকাশন', '2019-02-14', '343', 89, 89, 'shabbir5g', '2019-08-02 15:08:50'),
(13, 'PHP and MySQL Web Development ', '20190802052351.png', 'Laura Thomson', 'Pearson', '2019-08-12', '1530', 78, 78, 'shabbir5g', '2019-08-02 15:23:51'),
(14, 'Fundamentals of Computers', '20190802052457.png', 'Fundamentals of Computers', 'Tata McGraw-Hill', '2018-12-12', '882', 90, 90, 'shabbir5g', '2019-08-02 15:24:57'),
(15, 'Computer Networks', '20190802052608.png', 'Andrew S. Tanenbaum', 'Pearson', '2019-08-11', '1222', 123, 123, 'shabbir5g', '2019-08-02 15:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 4, ' July 29, 2019', 'July 29, 2019', '2019-07-29 08:55:42'),
(2, 1, 4, ' July 29, 2019', 'July 29, 2019', '2019-07-29 08:58:57'),
(3, 2, 5, ' July 29, 2019', 'July 30, 2019', '2019-07-29 08:59:17'),
(4, 2, 4, ' July 29, 2019', 'July 30, 2019', '2019-07-29 09:44:23'),
(5, 2, 6, ' July 29, 2019', 'July 30, 2019', '2019-07-29 09:49:23'),
(6, 1, 6, ' July 29, 2019', 'July 30, 2019', '2019-07-29 10:55:32'),
(7, 1, 8, ' July 29, 2019', 'July 30, 2019', '2019-07-29 11:15:06'),
(8, 2, 0, ' July 29, 2019', '', '2019-07-29 13:37:12'),
(9, 1, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 01:25:39'),
(10, 2, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 01:25:56'),
(11, 3, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 02:01:51'),
(12, 1, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 03:04:05'),
(13, 2, 8, ' July 30, 2019', 'July 30, 2019', '2019-07-30 03:05:28'),
(14, 2, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 04:33:56'),
(15, 3, 6, ' July 30, 2019', 'July 30, 2019', '2019-07-30 04:55:29'),
(16, 3, 7, ' July 30, 2019', 'July 30, 2019', '2019-07-30 05:10:04'),
(17, 1, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 05:10:39'),
(18, 3, 6, ' July 30, 2019', 'July 30, 2019', '2019-07-30 05:10:56'),
(19, 3, 4, ' July 30, 2019', 'July 30, 2019', '2019-07-30 05:16:07'),
(20, 1, 4, ' July 31, 2019', 'July 31, 2019', '2019-07-31 19:25:43'),
(21, 2, 11, ' August 02, 2019', 'August 02, 2019', '2019-08-02 18:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `libraian`
--

CREATE TABLE `libraian` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libraian`
--

INSERT INTO `libraian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Mostafiz', 'Shabbir', 'mostafizshabbir@gmail.com', 'shabbir5g', '12345678', '2019-07-27 11:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_image`, `message`, `datetime`) VALUES
(3, '20190802084356.JPG', 'this is zara', 'August 02, 2019 | 8:48 PM'),
(4, '20190802084726.jpg', 'hi', 'August 02, 2019 | 8:49 PM'),
(5, '20190802084726.jpg', 'ki holo ektu age', 'August 02, 2019 | 8:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'mostafiz', 'Shabbir', 123456, 654321, 'webcoder3g@gmail.com', 'webcoder3g', '$2y$10$0ZJW4LAarbOTzbzJc/mKfOa4KOQBKEhKdzqiqP5NR2IakGBZHnDmq', '01728536054', '20190802084726.jpg', 1, '2019-08-02 18:47:26'),
(2, 'Sabila', 'Mostafiz', 123456, 234567, 'zara@gmail.com', 'zara', '$2y$10$/c0e1B2qN3n27Rwmeblt.eeqYCxtBhOHOr7q7q9i.KojHZNXtUHIa', '01827134590', '20190802084356.JPG', 1, '2019-08-02 18:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraian`
--
ALTER TABLE `libraian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `libraian`
--
ALTER TABLE `libraian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
