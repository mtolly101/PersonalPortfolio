-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2025 at 10:26 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_education`
--

CREATE TABLE `about_education` (
  `id` int NOT NULL,
  `date` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `education1` varchar(200) NOT NULL,
  `education2` varchar(200) NOT NULL,
  `education3` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_education`
--

INSERT INTO `about_education` (`id`, `date`, `name`, `education1`, `education2`, `education3`, `user_id`) VALUES
(1, 'August 2022 - Present (Expected 2026 May Graduate)', 'Willamette University', 'Computer Science and Data Science Majors', 'Member of Alpha Phi International Women\'s Fraternity, Director of Marketing (2023) and Vice President of Finance and Administration (2024)', 'Member of Cybersecurity and Basketball club', 1),
(2, 'August 2018 - May 2022', 'Upper Arlington High School', 'Member of women\'s golf team (4 years)', 'Member of women\'s track and field and basketball teams (1 year)', NULL, 1),
(3, '2020-2024', 'University of California, Berkeley', 'B.S. in Business Administration', 'Emphasis in Finance and Organizational Behavior', 'VP of Consulting Club', 4),
(4, '2016-2020', 'Pitman High School', 'Member of Basketball', 'something', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `about_experience`
--

CREATE TABLE `about_experience` (
  `id` int NOT NULL,
  `date` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `skill1` varchar(300) NOT NULL,
  `skill2` varchar(300) NOT NULL,
  `skill3` varchar(300) DEFAULT NULL,
  `skill4` varchar(300) DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_experience`
--

INSERT INTO `about_experience` (`id`, `date`, `name`, `skill1`, `skill2`, `skill3`, `skill4`, `user_id`) VALUES
(1, 'May 2024 - August 2024', 'Information Systems Summer Intern', 'Created a program to take .csv files and send them through my program.', 'Learned C# to create this program.', 'Created a Blazer Ecommerce website using html and css. The website consisted of many formats of selecting an item into the cart and it linked with a database when something was “bought”.', 'Learned how to use SQL databases within a program and worked with WebAssembly on Microsoft Visual Studio.', 1),
(2, 'May 2024 - August 2024', 'Pro Shop Attendant', 'Responsible for welcoming members and day-of-play personnel to play on the golf course.', 'Enforced dress code, pricings, retail products, and golf rules.', NULL, NULL, 1),
(3, 'May 2023 - August 2023', 'Business Intelligence Summer Intern', 'Learned  Microsoft SQL Server, PyCharm, Python, Postman, Git/Github, and Chrome DEV Tools.', 'Created a program in PyCharm where it pulls different food prices from fast food competitors and compares them to White Castles food prices in that region and state.', NULL, NULL, 1),
(4, '2021–Present', 'Business Analyst', 'Led cross-functional teams to analyze client operations and recommend cost-saving strategies', 'resulting in an average of 12% efficiency gains.', 'Delivered presentations to senior executives on quarterly performance and growth forecasts.', NULL, 4),
(5, 'Summer 2020', 'Operations Intern', 'Developed data dashboards for inventory flow, helping reduce warehouse inefficiencies by 18%.', 'Assisted in rollout of a new employee training protocol.', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `about_image`
--

CREATE TABLE `about_image` (
  `id` int NOT NULL,
  `image` varchar(300) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_image`
--

INSERT INTO `about_image` (`id`, `image`, `user_id`) VALUES
(1, '../Portfolio/images/user.png', 1),
(2, '../Portfolio/images/userimage.webp', 4);

-- --------------------------------------------------------

--
-- Table structure for table `about_skills`
--

CREATE TABLE `about_skills` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_skills`
--

INSERT INTO `about_skills` (`id`, `name`, `description`, `user_id`) VALUES
(1, 'Programming Languages', 'Computer literate in Python, C, C#, Java, Javascript, HTML, CSS, R, and SQL', 1),
(2, 'Web Development', 'Created a Blazer Ecommerce Website', 1),
(3, 'App Development', 'Designed a golf app to collect scores with friends with Javascript', 1),
(4, 'Strategic Planning', 'Financial Analysis', 4),
(5, 'Project Management', 'Business Development', 4),
(7, 'test main', 'test main', 1),
(12, 'Market Research', 'Public Speaking', 4),
(13, 'Computer Skills', 'Microsoft Excel, PowerPoint, SQL', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contactme`
--

CREATE TABLE `contactme` (
  `contact_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactme`
--

INSERT INTO `contactme` (`contact_id`, `name`, `email`, `message`) VALUES
(12, 'Mal', 'example@gmail.com', 'Hi'),
(13, 'Mal', 'example@gmail.com', 'Test'),
(14, 'Mallory', 'example@gmail.com', 'test'),
(15, 'Mallory', 'example@gmail.com', 'test'),
(16, 'Mallory Tolliver', 'example@gmail.com', 'hi'),
(18, 'Hi', 'example@gmail.com', 'g'),
(19, 'Mallory Tolliver', 'mallorytolliver@gmail.com', 'Hi'),
(20, 'mal', 'example@gmail.com', 'heyyyy'),
(21, 'bob', 'example@gmail.com', 'hi im bob'),
(22, 'hola', 'hola@examople.com', 'hola');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `image`, `name`, `description`, `link`, `icon`, `user_id`) VALUES
(1, '../Portfolio/images/python2.png', 'Connections Game', 'This game was created through python and it is a clone of the connections game from The New York Times.', 'https://github.com/mtolly101/Connections', 'fa-solid fa-up-right-from-square', 1),
(2, '../Portfolio/images/blazor.png', 'Blazor Ecommerce', 'This Ecommerce website was created thorugh Microsoft Visual Studio using C# and WebAssembly.', 'https://github.com/mtolly101/BlazorEcommerce', 'fa-solid fa-up-right-from-square', 1),
(3, '../Portfolio/images/java3.png', 'Golf App', 'This app was created through Expo Go; you can log in/create an account and track your scores with friends during a golf round.', '/images/golf-app-3/App.js', 'fa-solid fa-up-right-from-square', 1),
(4, '../Portfolio/images/startupbob.jpeg', 'Startup Strategy Toolkit', 'Designed a free downloadable resource pack for early-stage founders, with financial templates, pitch decks, and KPI dashboards. Over 10,000 downloads and counting', 'https://photos.wubearcats.com/Mens-Basketball/2024-25/Pacific-University/i-JXbmxsj', 'fa-solid fa-up-right-from-square', 4),
(8, '../Portfolio/images/bizpodbob.png', 'BizPod Weekly', 'Hosted a weekly business podcast breaking down recent case studies and corporate trends. Averaged 5,000 monthly listeners; partnered with two business schools for content integration.', 'link', 'fa-solid fa-up-right-from-square', 4),
(9, '../Portfolio/images/remoteworkbob.jpg', 'Remote Work Readiness Audit', 'Created a proprietary tool for evaluating remote team workflows, now used by 20+ small firms. Includes assessments of productivity, communication, and tool adoption.', 'link', 'fa-solid fa-up-right-from-square', 4);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int NOT NULL,
  `icon` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(200) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `icon`, `name`, `description`, `link`, `user_id`) VALUES
(1, 'fa-solid fa-images', 'Images', 'In this section, I have photos of me taken.', 'https://photos.wubearcats.com/keyword/n-5b8MHb/mallory%20tolliver', 1),
(2, 'fa-solid fa-newspaper', 'Articles', 'In this section, I have a few articles wrtiten about me.', 'https://www.wubearcats.com/sports/wgolf/2022-23/releases/20230319wd93x2', 1),
(3, 'fa-solid fa-image-portrait', 'Media', 'In this section, I have photos of me taken for media day.', 'https://www.kha.photos/Sports/WU/Golf/Media-Day-2023', 1),
(4, 'fa-solid fa-school', '“Scaling Smart: How to Grow Without Breaking”', 'Harvard Business Review (Digital)', '2023', 4),
(5, 'fa-solid fa-person-chalkboard', '“Financial Forecasting for Modern Startups”', 'Forbes Community Voice', '2022', 4),
(6, 'fa-solid fa-laptop-file', '“Efficiency in the Remote Era: New Norms for Project Management”', 'Business Quarterly', '2021', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teaching`
--

CREATE TABLE `teaching` (
  `id` int NOT NULL,
  `icon` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(200) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`id`, `icon`, `name`, `description`, `link`, `user_id`) VALUES
(1, 'fa-brands fa-python', 'Coding is Fun', 'On this youtube channel, they teach about python and different coding languages and ways to use those in different elements.', 'http://www.youtube.com/@CodingIsFun', 1),
(2, 'fa-solid fa-code', 'Leet Code', 'Leet Code is a website that allows you to take courses to learn different programming languages.', 'https://leetcode.com', 1),
(3, 'fa-solid fa-chalkboard-user', 'Mentor – Business Fundamentals Bootcamp', 'Mentored early-career professionals in budgeting, planning, and market research basics. Created asynchronous learning modules for ongoing remote access', 'Startup Launchpad Nonprofit', 4),
(4, 'main', 'test', 'test', 'test', 1),
(7, 'fa-solid fa-face-smile', 'Guest Lecturer – \"Business Strategy for Startups\"', 'Presented case studies on go-to-market strategies for tech and consumer product startupsDesigned a capstone workshop where students developed mock pitches for venture capitalists', 'UC Berkeley – Haas School of Business', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userlevel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `created`, `userlevel`) VALUES
(1, 'mallorytolliver@gmail.com', 'mrtolliver', '$2y$10$eRbVGBs.dvwDmYPGKoEuNu2sBc.cfYO1XY4tc1G.bqpgiFFySCpO2', '2025-04-08 21:39:03', 1),
(3, 'josiah@gmail.com', 'josiah', '$2y$10$oCavP6EtdUKKfbccgr3icubxnU5zsR6q2g2M10inN87m/rQx0kT2u', '2025-04-09 23:29:32', 0),
(4, 'bob@example.com', 'bob', '$2y$10$HC.6QhvERS0aAHP.x7VI8u/nPSljeafurAjl8aUVgJoW0gBv0UHdO', '2025-04-10 17:36:36', 0),
(7, 'lindsay@example.com', 'Lindsay', '$2y$10$GxpJgb2mnzyZ7a.DNsKd0OnIWltsik/jqUEpSRJGRUigi2/xiIvBq', '2025-04-21 21:36:33', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_education`
--
ALTER TABLE `about_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_experience`
--
ALTER TABLE `about_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_image`
--
ALTER TABLE `about_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_skills`
--
ALTER TABLE `about_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactme`
--
ALTER TABLE `contactme`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teaching`
--
ALTER TABLE `teaching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_education`
--
ALTER TABLE `about_education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_experience`
--
ALTER TABLE `about_experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `about_image`
--
ALTER TABLE `about_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_skills`
--
ALTER TABLE `about_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactme`
--
ALTER TABLE `contactme`
  MODIFY `contact_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teaching`
--
ALTER TABLE `teaching`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
