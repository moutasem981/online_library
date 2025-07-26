-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 يوليو 2025 الساعة 18:10
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library`
--

-- --------------------------------------------------------

--
-- بنية الجدول `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `publishing_house_name` varchar(50) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `cover_photo` varchar(50) NOT NULL,
  `count_book` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `books`
--

INSERT INTO `books` (`id`, `book_name`, `author_name`, `publishing_house_name`, `reference_number`, `cover_photo`, `count_book`) VALUES
(8, 'كتاب السر', 'روندا بايرن', ' مكتبة جرير', '565uj', '07212025144802687e370253868.jpg', '9'),
(9, 'أرض زيكولا', ' عمرو عبد الحميد', 'عصير الكتب للنشر والتوزيع', '6763545547', '07212025145025687e37916f001.jpg', '11'),
(11, 'ghdf', 'effgbfs', 'عصير الكتب للنشر والتوزيع', '5678723', '07222025194413687fcdedcc68b.jpg', '20'),
(12, 'كتاب 1948', 'محمد خلف', 'النور للنشر والطباعة', '123456765432', '072320251642596880f4f382562.jpg', '20');

-- --------------------------------------------------------

--
-- بنية الجدول `borrow_a_book`
--

CREATE TABLE `borrow_a_book` (
  `id` int(11) NOT NULL,
  `the_user` varchar(50) NOT NULL,
  `the_book` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `borrowing_date` date NOT NULL,
  `replay_date` date NOT NULL,
  `security` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `borrow_a_book`
--

INSERT INTO `borrow_a_book` (`id`, `the_user`, `the_book`, `order_time`, `order_status`, `notes`, `borrowing_date`, `replay_date`, `security`) VALUES
(16, 'a11', 9, '2025-07-24 20:46:12', 'طرف الطالب', '', '2009-01-02', '2025-05-04', 'cc'),
(17, 'a11', 11, '2025-07-24 20:46:13', 'تم الإرجاع ', 'xzx', '2025-07-24', '2025-07-30', '3werttgvd'),
(18, 'a11', 12, '2025-07-24 20:46:14', 'طرف الطالب', '', '0000-00-00', '0000-00-00', 'شسيبسش'),
(19, 'zz', 12, '2025-07-25 16:02:08', 'طرف الطالب', '3423', '2025-07-24', '2025-08-01', ''),
(20, 'dd', 8, '2025-07-25 17:59:36', 'طرف الطالب', '', '0000-00-00', '0000-00-00', ''),
(21, 'dd', 11, '2025-07-25 18:08:29', 'تالف', '', '0000-00-00', '0000-00-00', ''),
(22, 'dd', 9, '2025-07-25 18:08:30', 'طلب', '', '0000-00-00', '0000-00-00', '3werttgvd'),
(23, 'dd', 8, '2025-07-25 18:14:52', 'طلب', '', '0000-00-00', '0000-00-00', '3werttgvd'),
(24, 'dd', 11, '2025-07-25 18:19:26', 'طلب', '', '0000-00-00', '0000-00-00', 'cc'),
(25, 'a11', 9, '2025-07-25 19:11:41', 'طلب', '', '0000-00-00', '0000-00-00', ''),
(26, 'a11', 8, '2025-07-25 19:11:43', 'طلب', '', '0000-00-00', '0000-00-00', ''),
(27, 'a11', 9, '2025-07-26 14:42:39', 'طلب', '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- بنية الجدول `us`
--

CREATE TABLE `us` (
  `id` int(50) NOT NULL,
  `the_name` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `us`
--

INSERT INTO `us` (`id`, `the_name`, `e_mail`, `adress`, `msg`) VALUES
(10, 'معتصم عماد', 'a11@gmail.com', 'كلمة السر ', 'نسيت كلمة المرور غيرلي ياها');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `the_user` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `jop` varchar(50) NOT NULL,
  `the_email` varchar(50) NOT NULL,
  `the_password` varchar(255) NOT NULL,
  `stage` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `is_temp_password` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `the_user`, `full_name`, `jop`, `the_email`, `the_password`, `stage`, `city`, `is_temp_password`) VALUES
(40, 'uu', 'uu', 'مشرف', 'uu@uu', '$2y$10$lExpuEOp6NXp7b3rFPVhWex4X2Q/FZaq7CL5YqeILXv/LY6i3Dv.C', 'طالب جامعة ', 'uu', NULL),
(41, 'tt', 'tt', 'مشرف', 'tt@tt', '$2y$10$aoO1itLdis2IMvrqZKlPHexM9RV6ojSywato1Olpc9yQhSN3Akh12', 'طالب جامعة ', 'tt', NULL),
(42, 'a11', 'معتصم عماد', 'عضو', 'a11@gmail.com', '$2y$10$I7hRby/uEKxuU0rP88x2putjDT0wrl4eOLbyTsUVrDseSgeVopEQi', 'طالب جامعة ', 'nablus', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_a_book`
--
ALTER TABLE `borrow_a_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `us`
--
ALTER TABLE `us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrow_a_book`
--
ALTER TABLE `borrow_a_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `us`
--
ALTER TABLE `us`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
