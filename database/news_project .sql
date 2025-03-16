-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 10:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Sports', 3),
(31, 'Web-Development', 3),
(33, 'Health', 0),
(43, 'Politics', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(50, 'Democracy vs. Dictatorship', '                                        While some nations thrive under democracy, others experience authoritarian rule, where power is concentrated in the hands of a few. Political systems vary across countries, affecting governance, human rights, and individual freedoms. As leaders seek to expand their influence, power struggles often emerge, leading to protests, civil unrest, and even coups. Explore the differences between democratic and authoritarian governments and how these systems impact global politics                                ', '43', '15 Mar, 2025', 62, '1742037682-politics3.jpg'),
(49, 'T 20 world Cup', '                                                                                The T20 World Cup 2025 is just around the corner, and cricket fans worldwide are eagerly waiting for the action to unfold. From powerhouse teams to rising stars, this tournament promises thrilling matches, record-breaking performances, and unpredictable moments. Get the latest schedule, team news, and expert predictions.                                                                ', '30', '15 Mar, 2025', 62, '1742118318-cricket.jpg'),
(47, 'Premier League', '               The Premier League never fails to entertain, with last-minute goals, shocking upsets, and intense rivalries. This week saw some unexpected results as underdog teams claimed victory over title contenders. Check out the full match reports, player performances, and upcoming fixtures', '30', '23 Feb, 2025', 26, '1742033710-pexels-pixabay-262524.jpg'),
(46, 'Cricket', '                                        The T20 World Cup 2025 is just around the corner, and cricket fans worldwide are eagerly waiting for the action to unfold. From powerhouse teams to rising stars, this tournament promises thrilling matches, record-breaking performances, and unpredictable moments. Get the latest schedule, team news, and expert predictions.                                                                                                                    ', '30', '23 Feb, 2025', 50, '1742034088-pexels-case-originals-3718433.jpg'),
(45, 'Frontend Trends', '                            The world of frontend development is evolving rapidly with new frameworks, tools, and design techniques. From Tailwind CSS to Next.js, explore the latest trends shaping modern web development. Choosing the right backend technology is crucial for performance and scalability. Learn about the latest updates in Node.js, Laravel, Django, and other popular backend frameworks                  ', '31', '23 Feb, 2025', 26, '1742034352-software-developer-6521720_1280.jpg'),
(43, 'Backend Trends', '                   Backend development is the backbone of every web application, handling databases, authentication, APIs, and business logic. The choice of backend technology depends on the project’s needs, scalability, and security. Popular backend frameworks like Node.js, Laravel, Django, and Spring Boot offer powerful tools for building efficient web applications. From choosing the right programming language (PHP, Python, Java, or JavaScript) to implementing RESTful APIs and GraphQL, backend developers play a crucial role in ensuring seamless functionality and performance.        ', '31', '23 Feb, 2025', 26, '1742034540-2.jpg'),
(51, 'Election News', 'Elections are the backbone of democracy, shaping the future of nations. With upcoming elections around the world, political parties are gearing up for intense campaigns, promising economic reforms, better governance, and social development. Voter turnout, opinion polls, and key debates will play a crucial role in determining the outcome. Stay updated with the latest election schedules, candidate profiles, and expert analysis on who might take the lead in the race for power.', '43', '15 Mar, 2025', 50, '1742037822-gettyimages-169259817-612x612.jpg'),
(52, 'Laravel', 'PHP remains one of the most widely used backend languages, and Laravel has made PHP development more efficient and structured. Laravel offers Blade templating, Eloquent ORM, API resources, middleware, and authentication tools, making it perfect for building secure and scalable applications. With features like Laravel Jetstream, Livewire, and Inertia.js, developers can now create dynamic applications faster than ever. Whether you\'re working on an eCommerce platform, a CMS, or a SaaS application, Laravel provides a clean and efficient backend structure.', '31', '15 Mar, 2025', 26, '1742037981-photo-1515879218367-8466d910aaa4 - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `websitename` varchar(70) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `footerdesc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`websitename`, `logo`, `footerdesc`) VALUES
('News-Project', 'weblogo.jpg', '© Copyright 2025 News | Powered by Shahsawar khan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(26, 'Shahsawar', 'khan', 'shahsawar', '202cb962ac59075b964b07152d234b70', 1),
(50, 'Ijaz', 'ahmed', 'Ijaz', 'caf1a3dfb505ffed0d024130f58c5cfa', 0),
(60, 'Baseer', 'Ahmed', 'Baseer', '9df62e693988eb4e1e1444ece0578579', 0),
(61, 'Mehmood', 'khan', 'Mehmood', '3026e4ae95929337c792a9d8f1e781db', 0),
(62, 'Farhan', 'khan', 'farhan', 'd1bbb2af69fd350b6d6bd88655757b47', 1),
(63, 'Fatama', 'yaseer', 'Fatma', '38ab93488e52710515c3095a83a92bcf', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`websitename`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
