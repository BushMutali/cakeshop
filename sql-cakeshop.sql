-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 11:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`admin_username`, `admin_password`) VALUES
('admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(100) NOT NULL,
  `_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cake_type` varchar(50) NOT NULL,
  `cake_filling` varchar(50) NOT NULL,
  `cake_shape` varchar(50) NOT NULL,
  `_message` varchar(100) NOT NULL,
  `cake_size` varchar(50) NOT NULL,
  `cake_design` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` enum('paid','pending') DEFAULT 'pending',
  `amount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `_name`, `email`, `cake_type`, `cake_filling`, `cake_shape`, `_message`, `cake_size`, `cake_design`, `created`, `payment_status`, `amount`) VALUES
(2, 'ORD-46e420', 'samantha', 'samantha@email.com', 'Strawberry', 'Butter Cream', 'Circle', 'Happy Birthday Samantha', '20cm', 'pink', '2023-10-23 14:45:40', 'pending', 0),
(3, 'ORD-779a6b', 'samantha', 'samantha@email.com', 'Chocolate', 'Cream Cheese', 'Circle', 'heey', '25cm', 'pink', '2023-10-23 15:11:12', 'pending', 0),
(4, 'ORD-21f93a', 'samantha', 'samantha@email.com', 'White', 'Vanilla', 'Square', 'have a blast', '25cm', 'pinkish', '2023-10-23 18:54:14', 'pending', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(11) NOT NULL,
  `cake_name` varchar(200) NOT NULL,
  `cake_price` varchar(200) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `cake_description` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `cake_name`, `cake_price`, `img_path`, `cake_description`, `created`, `updated`) VALUES
(3, 'Vanilla Ice Cream', '250', '652cfdb07a4ed_805.jpg', 'Vanilla ice cream cake with strawberry top', '2023-10-16 09:09:04', NULL),
(4, 'Chocolate', '400', '652cff551ee6a_792.jpg', 'Chocolate cake with chocolate sprinkles', '2023-10-16 09:16:05', NULL),
(5, 'Manteca Jumpers', '3000', '652d0095a7306_278.png', 'Best for birthdays and weddings', '2023-10-16 09:21:25', NULL),
(6, 'Sweet Chocolate', '300', '652d01adf243c_516.jpg', 'Sweet chocolate cake with cherry', '2023-10-16 09:26:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL DEFAULT '0',
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_password`) VALUES
(1, 'Bush Mutali', 'bush@email.com', '$2y$10$d.soUqLySjuF8m/Le6EnBOuWcJCPUs4fJ6JrIsGfDG1bhH/ClxKy2'),
(3, 'ken', 'ken@email.com', '$2y$10$DrHYkL.jLieOh40r7yAT9eHZrfW9UxZywpcA5AL4rIbaLCU8t5MBi'),
(4, 'samantha', 'samantha@email.com', '$2y$10$1uTeci2eMOxWGF6YLNBMgOdsPZ0kPGwOatyUxpE/F8qAwMEoC7uay');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_email`, `employee_password`) VALUES
(3, 'Mike Hamster', 'hamster@email.com', '$2y$10$dG4Px3KGMtUstkUevFUEK.Mbowyk6WPvPgxTp.rfiJGscAanYt/ru');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('Paid','Unpaid') DEFAULT 'Unpaid',
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_name` (`customer_name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
