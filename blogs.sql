-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 03:04 PM
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
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `created_at`, `user_id`) VALUES
(21, 'The Future of Electric Cars:', 'Electric cars are shaping the future of transportation. With advancements in battery technology and charging infrastructure, EVs are becoming more practical and accessible worldwide.', './assets/upload/modern-concept-electronic-car-ev-future-generative-art-by-ai_35887-2496.jpg', '2025-02-09 10:19:38', 7),
(22, '5 Tips for Better Time Management', 'Managing time effectively is crucial for success. Prioritizing tasks, setting deadlines, and avoiding distractions can help you maximize productivity and achieve your goals', './assets/upload/time management.jpg', '2025-02-09 10:21:45', 7),
(23, 'The Benefits of a Healthy Diet', 'A balanced diet rich in nutrients improves overall health, boosts energy levels, and reduces the risk of chronic diseases. Eating fresh fruits, vegetables, and lean proteins is key', './assets/upload/istockphoto-1433432507-612x612.jpg', '2025-02-09 10:23:40', 8),
(24, 'How to Stay Motivated Every Day', 'Motivation comes from setting clear goals, maintaining a positive mindset, and celebrating small achievements. Surrounding yourself with inspiring people also helps keep you on track', './assets/upload/stay-motivated-motivational-advice-or-reminder-on-a-clipboard-with-FPXDC3.jpg', '2025-02-09 10:26:52', 8),
(25, 'The Rise of Artificial Intelligence', 'AI is transforming industries by automating tasks, improving decision-making, and enhancing user experiences. From chatbots to self-driving cars, AI is revolutionizing the way we live', './assets/upload/MV5BYTY3Mjk1N2UtMTg2MC00NThkLWEzZGItMzBhY2RiMGRhMGZhXkEyXkFqcGc@._V1_.jpg', '2025-02-09 10:28:49', 9),
(26, 'Top 3 Travel Destinations in 2024', 'Looking for adventure? Explore the breathtaking landscapes of Iceland, the cultural wonders of Japan, and the tropical paradise of the Maldives for an unforgettable experience.', './assets/upload/istockphoto-477372378-612x612.jpg', '2025-02-09 10:56:52', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(7, 'Nourhan ibrahim', 'nourhan@eg.com', '$2y$10$ynxBl2wRaKTVPLTnviE8EO9/UX53PXOu0R4B7JgvgCueYhnSeB2/i'),
(8, 'Ahmed', 'ahmed@test.com', '$2y$10$zkcVE0XMkzhognjnpMLUyu7hQBJBenK4LP2NP9JldOZEqlJzZzdwi'),
(9, 'Ali', 'ali@test.com', '$2y$10$EFn0ozwnq9DwOEjPCh7P5.0c6kRUG1A.8EepVVEXfuIk3NhSoMu1C'),
(10, 'Bassant Ahmed', 'bassant@test.com', '$2y$10$BSOHyQq96GGYISkH0ZpSkukPAYKkbfRhS6qH7GlUr6rIeuzaHBGTy'),
(11, 'Esraa Osama', 'esraa@test.com', '$2y$10$iQapdYZv4UWqDilFlhQphOxs19DzAwCtA3nlNhU3Wd3aGXYW.yQ1G'),
(12, 'Eslam Tarek', 'eslam@test.com', '$2y$10$MIviqiw/WqYyndC8/8l6feGgOV2IzpzGboS1dWFwv.ipsvI9Zf1T2'),
(13, 'Aya', 'aya@test.com', '$2y$10$NjC9wVUm96w.s4vd7Cz5Re93YTzS91LlQVxCdl8QqC/uS8a.KvDlG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_post` (`user_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
