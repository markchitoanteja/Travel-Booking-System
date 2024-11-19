-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 02:00 PM
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
-- Database: `travel_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `passenger_id` int(10) UNSIGNED NOT NULL,
  `van_id` int(10) UNSIGNED NOT NULL,
  `trip_date` varchar(10) NOT NULL,
  `trip_time` varchar(7) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `fare` float(11,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_type` enum('admin','customer') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `username`, `password`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(1, '5db73d8d32e4dd48b810fb58ed9397d3', 'Administrator', 'admin', '$2y$10$OvwAVxnHxLVjvKHzmRERLuuDS21K.BnIe.PFePR5Ij6Kct2VAZT/y', 'default-user-image.png', 'admin', '2024-11-13 14:07:13', '2024-11-17 11:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `vans`
--

CREATE TABLE `vans` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `model` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('available','unavailable') DEFAULT 'available',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vans`
--

INSERT INTO `vans` (`id`, `uuid`, `model`, `brand`, `capacity`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'a9e66f4b6c011a60d82515520c36f707', 'HiAce', 'Toyota', 15, 'toyota_hiace.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:56:02'),
(2, '150ecbfc43044134185f73ca21d45315', 'NV350', 'Nissan', 12, 'nissan_nv350.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:56:19'),
(3, '03add13a34f91b85e5ed70cb0b75df9a', 'Starex', 'Hyundai', 11, 'hyundai_starex.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:56:36'),
(4, '312d136db99b84e49db6972b2e246b22', 'Transit', 'Ford', 14, 'ford_transit.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:56:47'),
(5, '04ee914bef0ea688ab53c64019d704a3', 'Urvan', 'Nissan', 12, 'nissan_urvan.png', 'unavailable', '2024-11-14 15:37:59', '2024-11-18 23:14:36'),
(6, '1f501a8f7c8c6c8e42db06535f48d918', 'Vito', 'Mercedes-Benz', 10, 'mercedes_benz_vito.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:57:16'),
(7, '3b66edfcdeb13d168723f5a22764dabb', 'Sprinter', 'Mercedes-Benz', 16, 'mercedes_benz_sprinter.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:57:38'),
(8, 'abc5bfd02c44fc7f622b5dba3baa6d91', 'Grand Starex', 'Hyundai', 11, 'hyundai_grand_starex.png', 'unavailable', '2024-11-14 15:37:59', '2024-11-18 23:18:51'),
(9, '46512f243df874024ee37540d345a581', 'Master', 'Renault', 13, 'renault_master.png', 'available', '2024-11-14 15:37:59', '2024-11-16 12:58:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vans`
--
ALTER TABLE `vans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vans`
--
ALTER TABLE `vans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
