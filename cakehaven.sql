-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 07:23 AM
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
-- Database: `cakehaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@email.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `second_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `app_no` int(11) NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cake_type` varchar(100) NOT NULL,
  `cake_filling` varchar(100) NOT NULL,
  `cake_shape` varchar(100) NOT NULL,
  `cake_message` varchar(100) NOT NULL,
  `cake_size` varchar(100) NOT NULL,
  `cake_design` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `description` text DEFAULT NULL,
  `img_file_path` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `name`, `category`, `price`, `description`, `img_file_path`, `date_created`, `date_updated`, `category_id`) VALUES
(1, 'Vanilla White', 'Wedding', 3000, 'Vanilla cake with white icing', '655e6c5cc61a8_385.jpg', '2023-11-22 21:02:20', '2023-11-22 21:02:20', NULL),
(2, 'Cupcake', 'Other', 100, 'Cupcake with strawberry on top', '655e6dc251962_600.jpg', '2023-11-22 21:08:18', '2023-11-22 21:08:18', NULL),
(4, 'White Vanilla Cake', 'Birthday', 500, 'Birthday cake', '655eebd19e727_811.jpg', '2023-11-23 06:06:09', '2023-11-23 06:06:09', NULL),
(5, 'Chocolate Round', 'Birthday', 1200, 'Best for birthdays', '655eecb01314a_598.jpg', '2023-11-23 06:09:52', '2023-11-23 06:09:52', NULL),
(6, 'American Heritage', 'Wedding', 2000, 'white cake with chocolate syrup', '655eed6237618_657.jpg', '2023-11-23 06:12:50', '2023-11-23 06:12:50', NULL),
(7, 'Star Raisins', 'Other', 1400, 'Sliced top', '655eee8677008_378.jpg', '2023-11-23 06:15:08', '2023-11-23 06:17:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Birthday'),
(2, 'Wedding'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`) VALUES
(1, 'Bush', 'bush@email.com', '1234'),
(2, 'Mercy', 'mercy@email.com', '1234'),
(3, 'peter', 'peter@email.com', '$2y$10$mNYbLrBarnDG9tXnv.bjAuyQZVcF3yo7gE7SZy/PntXXr6apQ6aF.');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `email`, `password`) VALUES
(1, 'Mary', 'mary@email.com', '1234'),
(2, 'sam', 'sam@email.com', '$2y$10$HqWBx5o0jd1K8Su0Df9Q3uHWBBZQ5gfvMljI4PWkJsjY.dDv93POa');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `due_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `merchant_request_id` varchar(255) DEFAULT NULL,
  `checkout_request_id` varchar(255) DEFAULT NULL,
  `response_code` int(10) DEFAULT NULL,
  `response_description` text DEFAULT NULL,
  `customer_message` text DEFAULT NULL,
  `invoice_number` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `user_email`, `merchant_request_id`, `checkout_request_id`, `response_code`, `response_description`, `customer_message`, `invoice_number`, `created`) VALUES
(4, 'sam@email.com', NULL, NULL, NULL, NULL, NULL, 587444, '2023-11-23 03:51:39'),
(5, 'sam@email.com', NULL, NULL, NULL, NULL, NULL, 224276, '2023-11-23 03:53:24'),
(6, 'sam@email.com', NULL, NULL, NULL, NULL, NULL, 139444, '2023-11-23 03:58:37'),
(7, 'sam@email.com', NULL, NULL, NULL, NULL, NULL, 906627, '2023-11-23 04:00:46'),
(8, 'sam@email.com', NULL, NULL, NULL, NULL, NULL, 995663, '2023-11-23 04:02:07'),
(9, 'sam@email.com', NULL, NULL, NULL, NULL, NULL, 617764, '2023-11-23 04:03:27'),
(10, 'peter@email.com', NULL, NULL, NULL, NULL, NULL, 406476, '2023-11-23 05:44:26'),
(11, 'peter@email.com', NULL, NULL, NULL, NULL, NULL, 820163, '2023-11-23 05:51:08'),
(12, 'peter@email.com', NULL, NULL, NULL, NULL, NULL, 450177, '2023-11-23 06:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `cake_id` int(11) DEFAULT NULL,
  `total_amount_paid` decimal(10,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cakes_category` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `FK_invoices_employees` (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cake_id` (`cake_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `cakes`
--
ALTER TABLE `cakes`
  ADD CONSTRAINT `fk_cakes_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`cake_id`) REFERENCES `cakes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
