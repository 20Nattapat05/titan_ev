-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2025 at 04:07 PM
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
-- Database: `titan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_lname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `email_tb`
--

CREATE TABLE `email_tb` (
  `email_id` int(11) NOT NULL,
  `email_name` varchar(255) NOT NULL,
  `email_back` varchar(255) NOT NULL,
  `email_title` text NOT NULL,
  `email_status` varchar(10) NOT NULL,
  `email_detail` text NOT NULL,
  `email_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_tb`
--

INSERT INTO `email_tb` (`email_id`, `email_name`, `email_back`, `email_title`, `email_status`, `email_detail`, `email_datetime`) VALUES
(4, 'สมชาย ใจดี', 'somchai@example.com', 'สอบถามเกี่ยวกับสินค้า', 'unread', 'อยากทราบรายละเอียดเพิ่มเติมเกี่ยวกับรุ่นรถล่าสุดครับ', '2025-09-10 20:24:23'),
(5, 'สุดา สวยงาม', 'suda@example.com', 'การชำระเงิน', 'unread', 'โอนเงินแล้ว อยากทราบว่าทางบริษัทได้รับหรือยังคะ', '2025-09-10 20:24:23'),
(6, 'วิชัย กล้าหาญ', 'wichai@example.com', 'ขอใบเสนอราคา', 'read', 'รบกวนขอใบเสนอราคาสำหรับรถยนต์ไฟฟ้ารุ่น A1 จำนวน 3 คันครับ', '2025-09-10 20:24:23'),
(7, 'ศิริพร ใจดี', 'siriporn@example.com', 'ปัญหาการใช้งาน', 'unread', 'รถไม่สามารถชาร์จไฟได้ อยากให้ช่วยตรวจสอบค่ะ', '2025-09-10 20:24:23'),
(8, 'อนันต์ สุขใจ', 'anan@example.com', 'ติดต่อเพื่อขอข้อมูล', 'read', 'สนใจเข้าร่วมเป็นตัวแทนจำหน่ายสินค้า อยากทราบรายละเอียดเพิ่มเติมครับ', '2025-09-10 20:24:23'),
(9, 'พิมพ์ใจ อ่อนหวาน', 'pimjai@example.com', 'สอบถามโปรโมชั่น', 'unread', 'ตอนนี้มีโปรโมชั่นสำหรับรุ่น SUV หรือไม่คะ', '2025-09-10 20:24:23'),
(10, 'กิตติพงษ์ พัฒนศักดิ์', 'kitti@example.com', 'นัดหมายทดลองขับ', 'read', 'อยากนัดหมายทดลองขับรถรุ่น B2 วันเสาร์นี้ครับ', '2025-09-10 20:24:23'),
(11, 'รัตนา วิเศษ', 'ratana@example.com', 'การรับประกันสินค้า', 'unread', 'อยากทราบรายละเอียดการรับประกันรถยนต์ไฟฟ้ารุ่น X3 ค่ะ', '2025-09-10 20:24:23'),
(12, 'ธีระชัย ตั้งมั่น', 'teerachai@example.com', 'สมัครงาน', 'read', 'ส่งเรซูเม่มาเพื่อสมัครงานตำแหน่งวิศวกรฝ่ายขายครับ', '2025-09-10 20:24:23'),
(13, 'มนัส สุขสันต์', 'manut@example.com', 'ขอความช่วยเหลือด่วน', 'unread', 'เกิดเหตุไฟฟ้าขัดข้องขณะใช้งาน ต้องการความช่วยเหลือเร่งด่วนครับ', '2025-09-10 20:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `news_tb`
--

CREATE TABLE `news_tb` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(20) NOT NULL,
  `news_detail` text NOT NULL,
  `news_status` varchar(30) NOT NULL,
  `news_date` date NOT NULL,
  `news_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_tb`
--

INSERT INTO `news_tb` (`news_id`, `news_title`, `news_detail`, `news_status`, `news_date`, `news_img`) VALUES
(1, 'อัปเดตรถยนต์ไฟฟ้ารุ่', 'ทางบริษัทได้เปิดตัวรถยนต์ไฟฟ้ารุ่นใหม่ล่าสุด พร้อมเทคโนโลยีการชาร์จที่รวดเร็วกว่าเดิม', 'published', '2025-09-10', 'news1.jpg'),
(2, 'โปรโมชั่นพิเศษเดือนก', 'รับส่วนลดสูงสุดถึง 20% สำหรับการสั่งจองรถยนต์ไฟฟ้าภายในเดือนนี้เท่านั้น', 'published', '2025-09-10', 'news2.jpg'),
(3, 'งานแสดงเทคโนโลยี EV ', 'เชิญร่วมชมงานแสดงเทคโนโลยียานยนต์ไฟฟ้าที่ศูนย์ประชุมแห่งชาติสิริกิติ์', 'draft', '2025-09-10', 'news3.jpg'),
(4, 'ขยายศูนย์บริการทั่วป', 'บริษัทเตรียมขยายศูนย์บริการครอบคลุมทั่วประเทศ เพื่ออำนวยความสะดวกแก่ลูกค้า', 'published', '2025-09-10', 'news4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_detail` text NOT NULL,
  `product_img` text NOT NULL,
  `product_type_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`product_id`, `product_name`, `product_price`, `product_detail`, `product_img`, `product_type_id`) VALUES
(1, 'รุ่นที่ 1', 12000, 'loremloremloremlorem', '68c185ed0ca93.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_type_tb`
--

CREATE TABLE `product_type_tb` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(255) NOT NULL,
  `product_type_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type_tb`
--

INSERT INTO `product_type_tb` (`product_type_id`, `product_type_name`, `product_type_detail`) VALUES
(1, 'ประเภทที่ 1', ''),
(2, 'ประเภทที่ 2', 'loremloremloremlorem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `email_tb`
--
ALTER TABLE `email_tb`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `news_tb`
--
ALTER TABLE `news_tb`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_type_tb`
--
ALTER TABLE `product_type_tb`
  ADD PRIMARY KEY (`product_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_tb`
--
ALTER TABLE `email_tb`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news_tb`
--
ALTER TABLE `news_tb`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_type_tb`
--
ALTER TABLE `product_type_tb`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
