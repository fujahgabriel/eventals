-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 01:48 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--
DROP DATABASE IF EXISTS `eventsdb`;
CREATE DATABASE IF NOT EXISTS `eventsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `eventsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `eventType` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` timestamp NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `published` int(1) NOT NULL DEFAULT '1',
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `userID`, `title`, `slug`, `description`, `eventType`, `price`, `image`, `startDate`, `endDate`, `location`, `published`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'Building for Digital Health 2021', 'build-digital', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To', 'Premium-only webinar', 10.00, 'https://picsum.photos/400/300', '2021-02-09 00:00:00', '2021-02-09 13:00:00', 'Online Event', 1, 1, '2021-02-03 00:00:00', '2021-02-03 00:00:00'),
(3, 1, 'The Great Showmanship', 'show-man', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To', 'Leap', 0.00, 'https://picsum.photos/400/300', '2021-02-18 17:00:00', '2021-02-19 18:00:00', 'canada ottawa', 1, 0, '2021-02-03 00:00:00', '2021-02-03 00:00:00'),
(19, 1, 'MasterCard West African Innovation Hackathon', 'MasterCard-West-African-Innovation-Hackathon', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To', 'Hackathon,Recruiting Mission', 0.00, 'https://picsum.photos/400/300', '2021-02-13 12:58:00', '2021-02-14 12:58:00', 'Online', 1, 1, '2021-02-10 01:00:53', '2021-02-10 01:00:53'),
(20, 1, 'Wizkid Global Tour', 'Wizkid-Global-Tour', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To', 'Premium-only Webinar', 0.00, 'https://picsum.photos/400/300', '2021-02-12 15:04:00', '2021-02-12 20:04:00', 'Online', 1, 1, '2021-02-10 01:06:36', '2021-02-10 01:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `event_applications`
--

CREATE TABLE `event_applications` (
  `id` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `firstName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_applications`
--

INSERT INTO `event_applications` (`id`, `eventID`, `firstName`, `lastName`, `phone`, `email`, `created_at`) VALUES
(4, 20, 'Gabriel', 'Lexy', '0701234566', 'gab@hey.com', '2021-02-10 01:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(9, 'MeetUp', '2021-02-09 11:39:32', '2021-02-09 10:42:02'),
(10, 'Leap', '2021-02-09 11:39:36', '2021-02-09 11:39:36'),
(11, 'Recruiting Mission', '2021-02-09 11:40:02', '2021-02-09 11:40:02'),
(12, 'Hackathon', '2021-02-09 11:40:11', '2021-02-09 11:40:11'),
(13, 'Premium-only Webinar', '2021-02-09 11:40:21', '2021-02-09 11:40:21'),
(14, 'Open Webinar', '2021-02-09 11:40:24', '2021-02-09 11:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0' COMMENT '1= admin, 0 = user',
  `is_active` int(1) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '123456', 1, 1, '2021-02-03 03:09:00', '2021-02-03 03:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);
ALTER TABLE `events` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `events` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `event_applications`
--
ALTER TABLE `event_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `event_applications`
--
ALTER TABLE `event_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
