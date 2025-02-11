-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 12:40 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_person`
--

CREATE TABLE `add_person` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `per_contact` varchar(255) NOT NULL,
  `per_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_person`
--

INSERT INTO `add_person` (`per_id`, `per_name`, `per_contact`, `per_address`) VALUES
(4, 'Abdul Sattar', '098202220119', 'faderal B area'),
(5, 'sajid', '03102420485', 'Baldia'),
(6, 'Jawad', '03470805169', 'Sarenna');

-- --------------------------------------------------------

--
-- Table structure for table `add_person_record`
--

CREATE TABLE `add_person_record` (
  `id` int(11) NOT NULL,
  `person_id` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `t_amount` int(11) NOT NULL,
  `amount_memo` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `d_amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_person_record`
--

INSERT INTO `add_person_record` (`id`, `person_id`, `person_name`, `product`, `t_amount`, `amount_memo`, `cheque_no`, `p_amount`, `d_amount`, `date`) VALUES
(46, '4', 'Abdul Sattar', '2mobile', 6000, 'Cash', '00', 3000, 3000, '2017-04-20'),
(47, '5', 'sajid', '12 Head Phone', 2500, 'Cash', '00', 2500, 0, '2017-04-22'),
(48, '6', 'Jawad', '24 catton Slice juice', 60000, 'Cheque', '03423', 40000, 20000, '2017-04-04'),
(49, '3', 'Arshad', '5 Audionic Speaker', 100000, 'Cheque', '02341', 50000, 50000, '2017-04-28'),
(50, '5', 'sajid', '48 Chilli Milli', 1400, 'Cash', '00', 1000, 400, '2017-04-07'),
(51, '4', 'Abdul Sattar', '6 Dvd Rom', 7000, 'Cash', '00', 3000, 4000, '2017-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'arshad', 'hikidz');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `reciept_no` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percantage` varchar(110) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `balance_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `reciept_no`, `qty`, `price`, `discount_percantage`, `discount_amount`, `amount_due`, `paid_amount`, `balance_due`) VALUES
(9, '2017-05-0001-STO', 2, 4000, '.05', 200, 3800, 1000, 2800);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(8, 'Kurta'),
(9, 'Sherwani'),
(10, 'Khussa'),
(11, 'Prince Coat'),
(12, 'Short Sherwani'),
(13, 'Turban');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(11) NOT NULL,
  `p_code` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `pro_code` varchar(250) NOT NULL,
  `p_color` varchar(100) NOT NULL,
  `p_single_piece_cost` int(11) NOT NULL,
  `p_sold` int(11) NOT NULL,
  `p_remaining` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_size` varchar(150) NOT NULL,
  `p_pic` varchar(150) NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `p_code`, `p_name`, `pro_code`, `p_color`, `p_single_piece_cost`, `p_sold`, `p_remaining`, `p_price`, `p_size`, `p_pic`, `p_date`) VALUES
(1, 1, 'Pagri', 'Red', '', 250, 0, 18, 500, 'Medium', '', '0000-00-00'),
(2, 3, 'Kurta', 'Orange', '', 2000, -2, 8, 5000, 'Medium', 'uploaded_images/58e2a7a0440753.44258328.jpg', '0000-00-00'),
(4, 10, 'khussa', 'Af100', 'red', 1800, 0, 22, 2500, 'MEDIUM', 'uploaded_images/59184b71147ab2.28169928.jpg', '2017-05-18'),
(5, 8, 'Kurta s', 'khaf22', 'Blue', 7888, 0, 8, 2500, 'SMALL', 'uploaded_images/59189f1de86476.64085011.jpg', '2017-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_desc` varchar(255) NOT NULL,
  `pro_qty` varchar(255) NOT NULL,
  `pro_size` varchar(255) NOT NULL,
  `pro_color` varchar(255) NOT NULL,
  `pro_pic` varchar(255) NOT NULL,
  `pro_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `c_id`, `pro_name`, `pro_desc`, `pro_qty`, `pro_size`, `pro_color`, `pro_pic`, `pro_date`) VALUES
(2, 8, ' Kurta shalwar', 'kurta gali', '23', 'MEDIUM', 'Black', 'uploaded_images/5901c347bcbde6.27936278.png', '2017-04-27'),
(3, 8, 'Kurta', 'kurta gali', '12', 'MEDIUM', 'Maroon', 'uploaded_images/5901056c84e3c5.43785583.jpg', '2017-04-05'),
(4, 8, 'Kurta', 'kurta gali', '24', 'LARGE', 'white', 'uploaded_images/5901c31e35cef5.77000915.jpg', '2017-04-08'),
(5, 8, 'Kurta', 'asgdkasgak', '12', 'EXTRA LARGE', 'Maroon', 'uploaded_images/58e2a7b61b11d3.17953989.jpg', '2017-04-20'),
(6, 9, 'Sherwani', 'Groom Package', '1', 'MEDIUM', 'Silver Grey', 'uploaded_images/58e2a84302e7d1.25954567.jpg', '2017-04-26'),
(8, 13, 'Turban', 'Ragistani Turban', '7', '20 Size', 'Cooper', 'uploaded_images/58e363476e5808.82115116.jpg', '2017-04-01'),
(9, 10, 'Rabri', '', '20', 'SMALL', 'Ranbarangi', 'uploaded_images/591840c41f6955.96108435.jpg', '2017-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `reciept_code`
--

CREATE TABLE `reciept_code` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `p_code` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `reciept` varchar(250) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `p_desc` varchar(150) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `selling_date` varchar(150) NOT NULL,
  `selling_time` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_person`
--
ALTER TABLE `add_person`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `add_person_record`
--
ALTER TABLE `add_person_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `reciept_code`
--
ALTER TABLE `reciept_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_person`
--
ALTER TABLE `add_person`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `add_person_record`
--
ALTER TABLE `add_person_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reciept_code`
--
ALTER TABLE `reciept_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
