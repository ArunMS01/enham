-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2023 at 01:11 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bellsgym_enham`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_as` tinyint(2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `email`, `role_as`, `status`, `password`) VALUES
(1, 'enham', 'enham@admin.com', 1, 1, '$2y$10$3.wtXNIo4oPWwtQS.svANOq.0fM7UPQWBEZQIfqEsaotO95S8Yu9u'),
(2, 'enham2', 'enham2@admin.com', 1, 1, '$2y$10$LIY9/fa6f0tTSaKY.zZTIesHB.fiGkONOfrbZJQnSHZ44tpfXTviC');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `heading`, `image`, `description`, `link`, `text`) VALUES
(2, 'Home Page banner1', 'TGold Standard Pre-Workout', 'banner1.jpg', 'Start at Rs 399', 'http://localhost/oops-multikart/category.php?url=test22', 'Shop Now'),
(3, 'Home age slider banner2', 'Welcome to our shop', 'banner2.jpg', 'TG Gold standard pre-workout', 'http://localhost/oops-multikart/category.php?url=test222', 'Shop Now'),
(4, 'Home Page Side Banner1', '', '17.jpg', '', 'https://gyangreedy.com/dento/category.php?url=pharmacy', 'Shop now'),
(5, 'Home Page Side banner2', '', '18.jpg', '', 'https://gyangreedy.com/dento/category.php?url=dental-brandhttps://gyangreedy.com/dento/category.php?url=dental-brand', 'Shop Now');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_url` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `cat_name`, `cat_url`, `cat_description`, `category_image`, `status`, `created_on`) VALUES
(207, NULL, 'Automotive', 'automotive', 'Automotive', '', 0, '2022-08-31 12:24:33'),
(208, NULL, 'Imitation Jewellery', 'imitation-jewellery', 'Imitation Jewellery', '', 0, '2022-08-31 13:17:23'),
(209, NULL, 'Beauty', 'beauty', 'Beauty', '', 0, '2022-08-31 14:59:04'),
(211, NULL, 'Health & Personal Care', 'health--personal-care', 'Health & Personal Care', '', 0, '2022-09-03 14:04:42'),
(212, NULL, 'Bath & Body', 'bath--body', 'Bath & Body', '', 0, '2022-09-03 14:18:44'),
(213, NULL, 'Home & Kitchen', 'home--kitchen', 'Home & Kitchen', '', 0, '2022-09-03 14:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `customer_id`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zip`) VALUES
(4, 16, '7237997084', '', '', '', '', 'India', 0),
(6, 15, '7564234576', '12 building near state ddsds', 'uuu', 'kanpur', 'Uttarakhand', 'India', 309022),
(7, 15, '7564234576', '12 builde ddsds fd', 'uuu', 'kanpur', 'Uttarakhand', 'India', 309111),
(8, 15, '7564234576', '12 building near state mall dffd', 'uuu', 'Dubai', 'Dubai', 'India', 434343),
(9, 47, '7564234576', '12 building near state mall', 'test', 'Dubai', 'Dubai', 'India', 309011),
(13, 50, '7564234576', 'ssddsdsd', '', 'Dubai', 'Dubai', 'India', 309011),
(14, 50, '7564234576', 'weeewweweew', '', 'Dubai', 'Dubai', 'India', 309011),
(15, 50, '7564234576', 'rrrerererrere', '', 'Dubai', 'Dubai', 'India', 309011),
(16, 53, '7564234576', '12 building near state mall', 'test21y728', 'Dubai', 'Dubai', 'India', 309011),
(17, 63, '7985785114', '33/161 gaya prasad lane maniram bagiya kanpur', '', 'Kanpur Nagar', 'Uttar Pradesh', 'India', 208001),
(19, 69, '7895647585', 'plot no 55', 'F2', 'kanpur', 'Uttar Pradesh', 'India', 28019);

-- --------------------------------------------------------

--
-- Table structure for table `customer_query`
--

CREATE TABLE `customer_query` (
  `id` int(11) NOT NULL,
  `customer_fame` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(2) DEFAULT 1 COMMENT '1->not resolved, 2->Processed, 3->Resolved',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_query`
--

INSERT INTO `customer_query` (`id`, `customer_fame`, `customer_lname`, `order_id`, `user_id`, `email`, `product_name`, `message`, `status`, `created_at`) VALUES
(1, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', 'Septodont Lignospan Special (50 cartridges)', 'ghgggh', 1, '2022-03-06 18:05:33'),
(2, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', 'Septodont Lignospan Special (50 cartridges)', 'ghgggh', 1, '2022-03-06 18:09:53'),
(3, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', 'Septodont Lignospan Special (50 cartridges)', 'ghgggh', 1, '2022-03-06 18:10:12'),
(4, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', 'Septodont Lignospan Special (50 cartridges)', 'ghgggh', 1, '2022-03-06 18:11:15'),
(5, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', '3A MEDES Bleaching and night guard sheets', 'ggggg', 1, '2022-03-06 18:12:51'),
(6, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', '3A MEDES Bleaching and night guard sheets', 'ggggg', 1, '2022-03-06 18:13:54'),
(7, 'Shivam', 'Verma', 1544759713, 13, 'shivam.raj28.sr@gmail.com', '3A MEDES Bleaching and night guard sheets', 'ggggg', 1, '2022-03-06 18:14:53'),
(8, 'Shivam', 'verma', 1525343616, 13, 'shivam.raj28.sr@gmail.com', 'Waldent Electric Pulp Tester1', 'test', 3, '2022-03-07 16:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer_query_replies`
--

CREATE TABLE `customer_query_replies` (
  `id` int(11) NOT NULL,
  `customer_query_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `reply` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_query_replies`
--

INSERT INTO `customer_query_replies` (`id`, `customer_query_id`, `subject`, `reply`, `date`) VALUES
(1, 0, 'hhh', '<p>hjhjhjhj</p>', '2022-03-16 10:01:58'),
(2, 8, 'ffggf', '<p>fgfgfg</p>', '2022-03-16 10:03:15'),
(3, 8, 'Test', '<p>Dear Shivam Verma,</p><p>Your request will be<b> soon pocesses,</b></p><ol><li>Lorem ispum</li><li>Lorem ipsum</li></ol><p>Thanks,</p>', '2022-03-16 10:37:36'),
(4, 8, 'Order Query Reponse', '<p>Dear Shivam Verma,</p><p>Your request will be <b>sonn processes,</b></p><ol><li>Lorem ipsum</li><li>Lorem ipsum</li></ol><p>Thanks</p>', '2022-03-16 10:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0->Publish, 1->Hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `category_id`, `name`, `status`) VALUES
(22, 37, 'Size', 0),
(23, 37, 'Color', 0),
(24, 37, 'Fabric', 0);

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option_values`
--

INSERT INTO `option_values` (`id`, `options_id`, `value`) VALUES
(76, 22, 's'),
(77, 22, 'm'),
(78, 22, 'xl'),
(79, 22, 'xxl'),
(80, 23, 'red'),
(81, 23, 'black'),
(82, 23, 'blue'),
(83, 23, 'green'),
(84, 24, 'cotton'),
(85, 24, 'polycotton'),
(86, 24, 'polyster');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ordered_on` datetime NOT NULL,
  `shipped_on` datetime DEFAULT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `total` float(10,2) NOT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `payment_info` text NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `ship_firstname` varchar(255) DEFAULT NULL,
  `ship_lastname` varchar(255) DEFAULT NULL,
  `ship_email` varchar(255) DEFAULT NULL,
  `ship_phone` varchar(40) DEFAULT NULL,
  `ship_address1` varchar(255) DEFAULT NULL,
  `ship_address2` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_zip` varchar(11) DEFAULT NULL,
  `ship_zone` varchar(255) DEFAULT NULL,
  `ship_zone_id` int(11) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `ship_country_code` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `admin_id`, `order_number`, `customer_id`, `status`, `ordered_on`, `shipped_on`, `tax`, `total`, `payment_status`, `payment_info`, `payment_id`, `ship_firstname`, `ship_lastname`, `ship_email`, `ship_phone`, `ship_address1`, `ship_address2`, `ship_city`, `ship_zip`, `ship_zone`, `ship_zone_id`, `ship_country`, `ship_country_code`) VALUES
(136, NULL, '15284428136', 72, 'Order Placed', '2022-09-03 21:00:10', NULL, NULL, 179.00, NULL, 'Cash on delivery', '', 'Naman', 'Agarwal', 'namaneretail890@gmail.com', '7985785114', '1/101A ground floor ', 'rishi nagar shuklaganj', 'unnao', '209861', 'Uttar Pradesh', NULL, 'India', NULL),
(137, NULL, '15141900137', 78, 'Order Placed', '2022-09-21 12:24:07', NULL, NULL, 199.00, NULL, 'Cash on delivery', '', 'Mahender', 'Thakur', 'manuthakur335@gmail.com', '9873225539', 'Kheri bijali borad near rps sawana Kheri road ', 'Faridabad ', 'Faridabad', '121002', 'Haryana', NULL, 'India', NULL),
(138, NULL, '15135295138', 79, 'Order Placed', '2022-09-23 11:11:17', NULL, NULL, 159.00, NULL, 'Cash on delivery', '', 'Ashish', 'Sharma ', 'ashishsharma7081918@gmail.com', '9559603128', '486/275 lahoreganj daliganj Lucknow ', 'Daliganj railway station ', 'Lucknow ', '226020', 'Uttar Pradesh', NULL, 'India', NULL),
(139, NULL, '15244786139', 80, 'Order Placed', '2022-09-25 08:43:06', NULL, NULL, 279.00, NULL, 'Cash on delivery', '', ' SRINIVAS', 'A', 'srinivas0199@gmail.com', '9739861927', 'RESIL CHEMICALS PVT LTD, NO. 30, BCIE, OLD MADRAS ROAD BANGALORE', 'Land mark : Near Pushpanjali theatre', 'BANGALORE', '560016', 'Karnataka', NULL, 'India', NULL),
(140, NULL, '15588952140', 77, 'Order Placed', '2022-09-29 21:49:48', NULL, NULL, 179.00, NULL, 'Cash on delivery', '', ' Raunak', 'Pandey', 'raunak@maidenstride.com', '8881333462', 'Test', 'Test', 'Kanpur', '208014', 'Uttar Pradesh', NULL, 'India', NULL),
(141, NULL, '15758763141', 81, 'Order Placed', '2022-10-16 20:12:26', NULL, NULL, 159.00, NULL, 'Cash on delivery', '', 'Rajbir', 'singh ', 'rajbirsingh76383@gmail.com', '6375462256', 'vpo Kallah teh khadur shaib distt tarn taran pin 143406', '', 'tarn taran ', '0000', 'Punjab', NULL, 'India', NULL),
(142, NULL, '15726343142', 82, 'Order Placed', '2022-10-17 17:53:29', NULL, NULL, 189.00, NULL, 'Cash on delivery', '', 'Jeel', 'Shah', 'jeelshah629@gmail.com', '9428032461', '21Anand park society nandasan road kadi ', 'Society ', 'Kadi', '382715', 'Gujarat', NULL, 'India', NULL),
(143, NULL, '15943825143', 83, 'Order Placed', '2022-10-21 19:33:51', NULL, NULL, 189.00, NULL, 'Cash on delivery', '', ' Shivam', 'Verma', 'shivam@maidenstride.com', '7564234576', 'P block 79', 'Yashoda nagar', 'Kanpur', '208011', 'Uttar Pradesh', NULL, 'India', NULL),
(144, NULL, '15218937144', 83, 'Order Placed', '2022-10-22 13:31:14', NULL, NULL, 179.00, NULL, 'Cash on delivery', '', ' Shivam', 'Verma', 'shivam@maidenstride.com', '7564234576', 'P block 79', 'Yashoda nagar', 'Kanpur', '208011', 'Uttar Pradesh', NULL, 'India', NULL),
(145, NULL, '15177892145', 84, 'Order Placed', '2022-10-25 10:09:36', NULL, NULL, 189.00, NULL, 'Cash on delivery', '', 'Bawithapar', 'Beulah', 'bawitha09@gmail.com', '8130802347', 'B36 Chanakya Place, Uttam Nagar ', 'Azaad Juice Coner', 'New Delhi ', '110059', 'Delhi', NULL, 'India', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `admin_id` tinyint(2) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipping` float(10,2) DEFAULT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `total` float NOT NULL,
  `invoice_number` varchar(100) DEFAULT NULL,
  `tracking_id` text DEFAULT NULL,
  `shiprocket_orderid` int(50) DEFAULT NULL,
  `sku_number` varchar(100) NOT NULL,
  `last_status_ecom` text DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `admin_id`, `product_id`, `quantity`, `shipping`, `tax`, `total`, `invoice_number`, `tracking_id`, `shiprocket_orderid`, `sku_number`, `last_status_ecom`, `delivery_date`) VALUES
(157, 136, 1, 92, 1, NULL, NULL, 179, NULL, '252642328', 253254455, 'Microfibrecloth12', NULL, NULL),
(158, 137, 1, 95, 1, NULL, NULL, 199, NULL, '258898741', 259512038, 'Glass washer Tablet1.2', NULL, NULL),
(159, 138, 2, 109, 1, NULL, NULL, 159, NULL, '269396949', 270002969, 'Brush 1.5', NULL, NULL),
(160, 139, 1, 96, 1, NULL, NULL, 279, NULL, '261259932', 261873348, 'Duster1.2', NULL, NULL),
(161, 140, 1, 93, 1, NULL, NULL, 179, NULL, '261740094', 262352510, 'Duster11', NULL, NULL),
(162, 141, 2, 109, 1, NULL, NULL, 159, NULL, NULL, NULL, 'Brush 1.5', NULL, NULL),
(163, 142, 2, 124, 1, NULL, NULL, 189, NULL, '269396947', 270002967, 'Hair Accessories1.4', NULL, NULL),
(164, 143, 2, 133, 1, NULL, NULL, 189, NULL, '269358122', 269964141, 'Hair Accessories1.13', NULL, NULL),
(165, 144, 1, 87, 1, NULL, NULL, 179, NULL, NULL, NULL, 'MakeupBrush11', NULL, NULL),
(166, 145, 2, 117, 1, NULL, NULL, 189, NULL, '270438553', 271044595, 'Home & Kitchen1.3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items_status`
--

CREATE TABLE `order_items_status` (
  `id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `item_status` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `cancel_reason` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `ecom_status` longtext DEFAULT NULL,
  `current_ecom_status` text DEFAULT NULL,
  `last_update_time` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items_status`
--

INSERT INTO `order_items_status` (`id`, `order_item_id`, `item_status`, `notes`, `cancel_reason`, `images`, `ecom_status`, `current_ecom_status`, `last_update_time`, `created_at`) VALUES
(146, 157, 'Shipped', NULL, ' ', NULL, NULL, NULL, NULL, '2022-09-03 15:30:12'),
(147, 158, 'Shipped', NULL, ' ', NULL, NULL, NULL, NULL, '2022-09-21 06:54:08'),
(148, 159, 'Shipped', NULL, ' ', NULL, NULL, NULL, NULL, '2022-09-23 05:41:18'),
(149, 160, 'Shipped', NULL, ' ', NULL, NULL, NULL, NULL, '2022-09-25 03:13:06'),
(150, 161, 'Cancelled', NULL, ' ', NULL, NULL, NULL, NULL, '2022-09-29 16:19:48'),
(151, 162, 'Order Placed', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 14:42:27'),
(152, 163, 'Shipped', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 12:23:32'),
(153, 164, 'Cancelled', NULL, ' ', NULL, NULL, NULL, NULL, '2022-10-21 14:03:51'),
(154, 165, 'Order Placed', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-22 08:01:14'),
(155, 166, 'Shipped', NULL, ' ', NULL, NULL, NULL, NULL, '2022-10-25 04:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image_one` varchar(255) NOT NULL,
  `image_two` varchar(255) NOT NULL,
  `image_three` varchar(255) NOT NULL,
  `image_four` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `regular_price` float NOT NULL,
  `shipping` float(11,2) DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `sku` varchar(250) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `long_desc` text NOT NULL,
  `short_decs` text NOT NULL,
  `general_info` text DEFAULT NULL,
  `sale_tag` varchar(255) DEFAULT NULL,
  `item_weight` float(11,2) DEFAULT NULL,
  `item_length` float(11,2) DEFAULT NULL,
  `item_height` float(11,2) DEFAULT NULL,
  `item_breadth` float(11,2) DEFAULT NULL,
  `updated_on` datetime NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `admin_id`, `name`, `brand_name`, `image`, `image_one`, `image_two`, `image_three`, `image_four`, `price`, `regular_price`, `shipping`, `quantity`, `sku`, `url`, `title`, `meta_description`, `status`, `long_desc`, `short_decs`, `general_info`, `sale_tag`, `item_weight`, `item_length`, `item_height`, `item_breadth`, `updated_on`, `added_on`) VALUES
(83, 1, 'Car interior Matt Cleaning Brush (Pack of 1)', 'Enham', 'mahek-accessories-Car-Polishing-Tool-SDL669059613-1-ac9b8.jpg', '', '', '', '', 199, 229, 0.00, 50, 'Brush 1.3', 'car-interior-matt-cleaning-brush-pack-of-1', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"The brush is designed to make cleaning easier. It is equipped with long plastic bristles that reach deep and effectively scrub dust, spilled food and other dirt from hard-to-reach places. It can be used to clean carpets or rugs without damaging the surface. The handle is durable and non-slip, your hand won\'t hurt. The soft bristles do not damage the surface of the garment. This versatile brush offers multi-purpose use as it can be used on both dry and wet surfaces.\"}\" data-sheets-userformat=\"{\"2\":7043,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":3,\"3\":1},\"15\":\"inherit\"}\" style=\"color: rgb(0, 0, 0); font-size: 10pt; font-family: Arial;\">The brush is designed to make cleaning easier. It is equipped with long plastic bristles that reach deep and effectively scrub dust, spilled food and other dirt from hard-to-reach places. It can be used to clean carpets or rugs without damaging the surface. The handle is durable and non-slip, your hand won\'t hurt. The soft bristles do not damage the surface of the garment. This versatile brush offers multi-purpose use as it can be used on both dry and wet surfaces.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Handle for a comfortable non-slip grip when cleaning</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">A very effective cleaning brush for removing dust from the interior and exterior of the car</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Non-toxic, durable, lightweight brush with a long handle</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Long bristles reach deep into carpets and remove dust and stains from carpets without damaging the delicate fibers.</span><br></li></ul>', '<p><span data-sheets-value=\"{\" 1\":2,\"2\":\"cleaning=\"\" brush\"}\"=\"\" data-sheets-userformat=\"{\" 2\":128,\"10\":1}\"=\"\" data-sheets-formula=\"=R[0]C[-21]\" style=\"\"><font color=\"#000000\" face=\"Roboto, RobotoDraft, Helvetica, Arial, sans-serif\"><span style=\"font-size: 13px; white-space: pre-wrap;\"><b>Common or Generic Name of the Commodity:</b></span></font><span style=\"color: rgb(0, 0, 0); font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; font-size: 13px; white-space: pre-wrap;\"><b> </b></span><font color=\"#000000\" face=\"Arial\"><span style=\"font-size: 10pt;\">Cleaning Brush</span></font></span></p><p><span data-sheets-value=\"{\" 1\":2,\"2\":\"cleaning=\"\" brush\"}\"=\"\" data-sheets-userformat=\"{\" 2\":128,\"10\":1}\"=\"\" data-sheets-formula=\"=R[0]C[-21]\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\"><font color=\"#000000\" face=\"Arial\"><span style=\"font-size: 13.3333px;\"><b>Manufacturer Name & Address:</b></span></font></span></span></span></span><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13.3333px;\">Naman Eretail Unnao UP</span><br></p><p><span data-sheets-value=\"{\" 1\":2,\"2\":\"cleaning=\"\" brush\"}\"=\"\" data-sheets-userformat=\"{\" 2\":128,\"10\":1}\"=\"\" data-sheets-formula=\"=R[0]C[-21]\" style=\"color: rgb(0, 0, 0); font-size: 10pt; font-family: Arial;\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\" style=\"font-size: 10pt;\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\" style=\"font-size: 10pt;\"><b>Packet name & Address :</b>Naman Eretail Unnao UP</span></span></span></p><p><span data-sheets-value=\"{\" 1\":2,\"2\":\"cleaning=\"\" brush\"}\"=\"\" data-sheets-userformat=\"{\" 2\":128,\"10\":1}\"=\"\" data-sheets-formula=\"=R[0]C[-21]\" style=\"color: rgb(0, 0, 0); font-size: 10pt; font-family: Arial;\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\" style=\"font-size: 10pt;\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\" style=\"font-size: 10pt;\"><span data-sheets-value=\"{\" 1\":2,\"2\":\"naman=\"\" eretail=\"\" unnao=\"\" up\"}\"=\"\" data-sheets-userformat=\"{\" 2\":641,\"3\":{\"1\":0},\"10\":1,\"12\":0}\"=\"\" style=\"font-size: 10pt;\"><b>Packet name & Address </b>:Naman Eretail Unnao UP</span></span></span></span></p>', 'featured', 0.20, 18.00, 2.00, 12.00, '2022-08-31 19:15:34', '2022-08-31 12:37:03'),
(84, 1, 'Designer imitation chain for men', 'Enham', 'Foxy-Trend-Chain-In-Gold-SDL662236858-2-11895.jpg', '', '', '', '', 199, 209, 0.00, 50, 'menschain11', 'designer-imitation-chain-for-men', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">This perfectly crafted chain for men has been fashioned out of brass. The intricate pattern is a result of excellent workmanship. Striking yellow gold plating gives a genuine gold look and feels to the chain.\r\n\r\nTo make your accessories last longer avoid harsh chemicals and moisture. Keep dry, clean with a dry cloth, and wear with panache. Keep it away from direct heat, water, perfumes, deodorants, And other strong chemicals as they may react with the metal or plating.\r\n\r\nWipe the jewellery gently with chamois cloth or leather swatch after every use. Wiping the jewellery with a soft cloth after removing the jewelry would add to its life. Always preserve your jewellery in The original box or in a soft cloth pouch.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">CLASSIC DESIGN CHAIN - Create your own style statement with this stunning and uniquely designed men\'s Gold plated chain. This yellow gold chain finish add a masculine splendour to your looks.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">PREMIUM QUALITY: The chain has been fashioned out of brass which doesnt cause any harm to skin. Nickel free and Lead free as per International Standards.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">PERFECT GIFT: This Gold Chain Is perfect gift for your special ones on birthdays, fathers\' days, anniversaries, parties, and vacations.</span></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Importer Name & Adress :</b> N/A</p><p><b>Common or Generic Name of the Commodity : </b>Chains for men</p><p><b>Manufacturer Name & Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name & Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name & Address : </b>Naman Eretail Unnao UP</p>', 'trending', 0.20, 18.00, 12.00, 2.00, '2022-08-31 19:16:10', '2022-08-31 14:09:14'),
(85, 1, 'designer imitation jewellery chain for men Pack of 1', 'Enham', 'shankhraj-mall-Gold-Brass-Copper-SDL191063880-1-502b9.jpeg', 'shankhraj-mall-Gold-Brass-Copper-SDL191063880-3-3badb.jpg', 'shankhraj-mall-Gold-Brass-Copper-SDL191063880-2-cefab.jpeg', '', '', 199, 209, 0.00, 50, 'menschain12', 'designer-imitation-jewellery-chain-for-men-pack-of-1', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Brass has been used to make this elegant design chain for men. Excellent craftsmanship is the cause of the specific pattern. The chain has a striking yellow gold finishing which gives it a true gold look and feel.\r\n\r\nKeep apart from substances and dampness to extend the lifespan of your accessories. Maintain dryness, wipe with a dry cloth, and do with style. Keep it away from things that could react with the metal or plating, such as direct heat, water, perfumes, deodorants, and other strong chemicals.\r\n\r\nAfter each use, carefully wipe the jewellery with chamois cloth or leather swatch. After taking off the jewellery, wipe it down with a soft cloth to prolong its life. Keep your jewellery in its original box or a soft cloth pouch at all times.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">TOP QUALITY - Highly resistant to corrosion and corrosive deposits, ensuring that it remains untarnished for a long time. Comfortable and easy to wear. Provided the piece is well coated, the piece of jewelry will have a strong exterior as well as an attractive finish.</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">NON-ALLERGIC: These chains are 100% nickel free. Best quality as per quality standard which makes it very skin friendly and skin safe. Anti-allergic and safe for the skin.\r\n</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">BEST GIFT FOR YOUR LOVED ONES: Perfect gift for your father, brother, husband, and boyfriend. Perfect for parties, the office, and everyday wear. The beautiful chain can be used for birthdays, weddings, engagements, or any occasion where you want.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Importer Name & Adress :</b> N/A</p><p><b>Common or Generic Name of the Commodity : </b>Chains for men</p><p><b>Manufacturer Name & Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name & Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name & Address :</b> Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 12.00, 2.00, '2022-08-31 14:28:01', '2022-08-31 14:16:41'),
(87, 1, 'Make brush with free beauty blender (set of 10)', 'Enham', 'mahek-accessories-250-g-10-SDL520657766-1-e4163.jpg', 'mahek-accessories-250-g-10-SDL520657766-2-4dac4.jpg', 'mahek-accessories-250-g-10-SDL520657766-3-268ec.jpg', 'mahek-accessories-250-g-10-SDL520657766-3-268ec (1).jpg', '', 179, 199, 0.00, 50, 'MakeupBrush11', 'make-brush-with-free-beauty-blender-set-of-10', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">This 10 pcs high-quality brush set for facial make-up provides a superb ability to hold powder, soft and pleasing for your skin. An essential tool for not only professionals but also DIY users. \r\n\r\nA professional quality brush set that includes all the basics you need for daily applications. Easy to stick powder, natural color, rendering uniform your brushes can be enjoyed for years with proper care. To blend your make up you also get 1 pcs of sponge free of cost. \r\n</span></p><div><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\"><br></span></div>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">The set includes 10 pcs of brushes for facial make-up. Comes with one free beauty blender.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">These essential make up brushes are ideally made for liquids, powders, or creams to produce a beautiful makeup application.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Easy to Carry , Easy to Clean</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Importer Name & Adress :</b> N/A</p><p><b>Common or Generic Name of the Commodity : </b>Makeup Brush sets</p><p><b>Manufacturer Name & Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name & Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name & Address : </b>Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 12.00, 2.00, '2022-08-31 15:15:58', '2022-08-31 15:10:04'),
(88, 1, 'Beauty blender Makeup Puff (Pack of 4)', 'Enham', 'BEAUTY_BLENDER_Sponge_10_gm_SDL050095766_1_NEW-c1e7d.jpg', 'BEAUTY-BLENDER-Sponge-10-gm-SDL050095766-1-4b708.jpeg', '', '', '', 179, 199, 0.00, 50, 'BeautyBlender4', 'beauty-blender-makeup-puff-pack-of-4', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">This Beauty Blender sponge will allow the product to sit on the top of the sponge rather than being absorbed. Allowing you to complete your make-up application with fewer products &amp; less time. Its unique shape &amp; exclusive material is an edgeless sponge a high-definition cosmetics sponge applicator. \r\n\r\nApply flawless foundation like a pro. Use this soft sponge to blend any makeup or foundation to get an even look. \r\n\r\nTips to use: Use this unique sponge with your cream, liquid, or powder foundation. It can also be used for contouring and highlighting with cream or powder products. Works great with liquid, cream, mousse foundations, and concealer and does not soak much product.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">The combo is a must have for every woman in their makeup kit.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Long lasting and durable performance</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Skin-friendly and tested</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">A unique product that is perfect for defining your make-up</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Best for professional and everyday use</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Importer Name &amp; Adress : </b>N/A</p><p><b>Common or Generic Name of the Commodity : </b>Makeup Puff &amp; Sponges</p><p><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 15:26:59'),
(89, 1, 'Small Makeup brush (set of 7)', 'Enham', 'mahek-accessories-Natural-1-gm-SDL870404447-1-647c3.jpg', '', '', '', '', 179, 199, 0.00, 50, 'MakeupBrush13', 'small-makeup-brush-set-of-7', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">This brand new professional quality brush set includes all the basics you need for daily applications. Its synthetic bristles are ultra plush and smoother than the hair you\'ll find in other brushes. The soft fibers help create a flawless high-definition finish in any type of light.\r\n\r\nThe collection is suitable for a wide range of products and every makeup need from powders creams and liquids to mineral makeup highlighter and shimmer.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">High density synthetic hair will always give you a silky smooth feel.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Excellent performance in blending, shaping and cutting pleats.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Lightweight and portable, suitable for home and professional use.</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Soft and firm for makeup application, bristles don\'t fall out when blending, contouring and shading</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Importer Name &amp; Adress : </b>N/A</p><p><b>Common or Generic Name of the Commodity : </b>Makeup Brush sets</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', 'trending', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 15:32:49'),
(90, 1, 'Makeup brush (set of 10)', 'Enham', 'mahek-accessories-250-g-10-SDL974195911-1-fbd3d.jpg', '', 'mahek-accessories-250-g-10-SDL974195911-3-887e9.jpg', 'mahek-accessories-250-g-10-SDL974195911-4-87242.jpg', '', 229, 249, 0.00, 50, 'MakeupBrush14', 'makeup-brush-set-of-10', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">This set of makeup brush Precision with every stroke Whether you\'re going to an evening party or heading to the beach, this pocket-friendly makeup brush set will come in handy. The Generic Foundation, Eyeshadow Makeup Brush is ideal for both studio and personal makeup. The brushes have a high hair density which makes the application of makeup a very easy process. The brushes are made of soft hair fiber which is not harsh on your skin and glides as smooth as butter. Product Features Set of 10 brushes High-quality brushes Fit for regular use Travel-friendly Product Highlights Multipurpose brushes for different purposes Generic Foundation, Eyeshadow Makeup Brush by Generic is packed with ten brushes of different shapes and sizes, designed for a variety of makeup requirements. The big brushes cover larger areas that can be used to apply makeup base or foundation. The smaller sized-brushes are used for highlighting eyes or even defining lips. Fibre Hair Ease Application The brushes are made with high-quality fiber hair. The soft and fine bristles are not harsh on your skin. They are perfect for both studio and personal makeup. The brushes glide smoothly on your skin, ensuring a smooth application of makeup. Portable Set Get ready to face the world with style with this set of brushes from Generic. Lightweight and small in size, the brush set can be easily packed inside your vanity bags, discreetly. Features Portable Set Get ready to face the world with style with this set of brushes from Generic. Lightweight and small in size, the brush set can be easily packed inside your vanity bags, discreetly. Wooden handle These ergonomically-shaped brushes from Generic sport a wooden handle along with an aluminum tube which enhances the look of the brushes. The wooden handle makes the brushes more durable. Usage Instructions Wash these brushes regularly for avoiding unwanted makeup residue on brushes that hinder the easy application of makeup on your skin.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Professional makeup brushes set of 10pieces. Suitable for both home use or professional use.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">These 10pcs professional makeup brush set is the basics you need for daily applications, Suitable for both professional and home use.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Its special design will make you look unique, It is also a good gift for your lover,family,friend and coworkers.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Importer Name &amp; Adress :</b> N/A</p><p><b>Common or Generic Name of the Commodity : </b>Makeup Brush sets</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', 'bestselling', 0.20, 18.00, 2.00, 18.00, '0000-00-00 00:00:00', '2022-08-31 15:50:32'),
(91, 1, 'Microfiber Multicolor Car Cleaning Cloth for Detailing & Polishing (Pack of 4)', 'Enham', 'V-Craft-Microfiber-Car-Cleaning-SDL837133618-1-64301.jpeg', 'V-Craft-Microfiber-Car-Cleaning-SDL837133618-3-9a941.jpeg', '', '', '', 199, 229, 0.00, 50, 'Microfibrecloth11', 'microfiber-multicolor-car-cleaning-cloth-for-detailing--polishing-pack-of-4', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Microfiber is essential to high-quality detailing/cleaning and polishing for both the interior and exterior of any vehicle. Microfiber cloth is very soft, has excellent absorption, quick dry, has no odor, is bacteria-free, and wrinkle-free. It is easy to wash. Lasts up to hundreds of washes. It may be used to clean the paint, leather, wheels, glass, interior, and much more.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Microfiber Car Cleaning Cloth has excellent absorption, quick dry has no odor, is bacteria-free, and wrinkle-free</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Easy to wash</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Reliable performance</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Importer Name &amp; Adress : </b>N/A</p><p><b>Common or Generic Name of the Commodity :</b> Cloth &amp; Wipes</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 16:12:15'),
(92, 1, 'Microfiber Cloth for Car Cleaning and detailing | Dual Sided, Extra Thick Plush Microfiber Towel Lint-free, 600 GSM, 40cm x 40cm (Pack of 1)', '', 'Microfiber-Cloth-for-Car-Cleaning-SDL844788613-1-2d121.jpeg', 'Microfiber-Cloth-for-Car-Cleaning-SDL844788613-2-e2f48.jpeg', 'Microfiber-Cloth-for-Car-Cleaning-SDL844788613-4-f1ba6.jpeg', '', '', 179, 199, 0.00, 50, 'Microfibrecloth12', 'microfiber-cloth-for-car-cleaning-and-detailing--dual-sided-extra-thick-plush-microfiber-towel-lint-free-600-gsm-40cm-x-40cm-pack-of-1', '', '', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Microfiber car cleaning cloth designed with premium ultra-thick 600 GSM double-layer plush microfiber, which is super softer and ultra-absorbent than other towels. The soft microfiber used in this cloth is super absorbent and made to trap dirt, grime, and other particles. Absorbs water more &amp; faster and dries faster than cotton, safe for all hard surfaces. This microfiber cleaning cloth is safe for all finishes and surfaces! Cleans fine automobile finishes, glass, stone, television &amp; other delicate surfaces without worrying or leaving messy streaks behind. The offered microfiber cleaning cloth holds up to 8 times its weight in water, making it great for wet washing with or without cleaning products.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Very soft, excellent absorption, quick dry, no odor, bacteria-free, wrinkle-free</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Easily washable, no chemicals required, no bleach- light weight - lasts hundreds of washes</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">can be used for daily household chores </span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Importer Name &amp; Adress : </b>N/A</p><p><b>Common or Generic Name of the Commodity :</b> Cloth &amp; Wipes</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 16:25:51'),
(93, 1, 'Adjustable Extendable Microfiber Duster For Easy Cleaning and Dusting', 'Enham', 'mahek-accessories-Adjustable-Extendable-Microfiber-SDL007946132-1-94bf0.jpg', '', '', '', '', 179, 199, 0.00, 50, 'Duster11', 'adjustable-extendable-microfiber-duster-for-easy-cleaning-and-dusting', '', '', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Adjustable Extendable Microfiber Duster Cleans all sizes of ceiling fans safely and easily. It is great for you to clean your car, and also can be used for daily household chores like cleaning window blinds,ceiling fans, bookshelves, etc.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Flexible, the head is great for car, window blinds, ceiling fans, crown molding, bookshelves</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">It is great for you to clean your car, auto and also can be use for house working</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Long Plastic Handle Allows You To Reach Hard-To-Reach Corners,It Is Soft, Super-Absorbent and Quick Drying Duster</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Importer Name & Adress :</b> N/A</p><p><b>Common or Generic Name of the Commodity :</b> Dusters</p><p><b>Manufacturer Name & Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name & Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name & Address : </b>Naman Eretail Unnao UP</p>', 'trending', 0.20, 18.00, 12.00, 2.00, '2022-09-07 15:04:45', '2022-08-31 17:02:40'),
(94, 1, ' Car Windshield Cleaner Tablet (Pack of 10)', 'Enham', 'Tablet_Packof10_3-a62c5.jpg', '', '', '', '', 159, 179, 0.00, 50, 'Glass washer Tablet1.1', 'car-windshield-cleaner-tablet-pack-of-10', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">This water-soluble tablet made with scientific cleansing solution will clean all the dirt and spots on your windshield. The water turns light blue when the tablet is dissolved giving a fresh look while you spray. It also has antifreeze which helps to reduce fog in winters. Easy to use and designed specially for windshield cleaning. </span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Convenient to carry- portable, small size like milk film general size. It is convenient to carry and use.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Usage- this item is suitable for daily cleaning and care of all kinds of cars. Ideal to clean and decontaminate, reduce the friction between the wiper and the glass.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Efficient- a grain of 4 liter equals to general water wiper.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">How to use - just open the glass cover of the bottle, find the wiper reservoir, fill it with water and put in a grain of concentrated block. Finally, wait 10 minutes and then use it normally. In winter you can wait more 5 to 6 minutes.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Strong cleaning agent - suitable for besmirch clothes, besmirch hood, wood polishes, mud, etc.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> China</p><p><b>Importer Name &amp; Adress :</b>&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Naman Eretail Unnao UP</span></p><p><b>Common or Generic Name of the Commodity :</b> Glass Cleaning Tablets</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 12.00, 2.00, '2022-08-31 18:06:03', '2022-08-31 17:38:53'),
(95, 1, 'Effervescent Tablets Spray Cleaner Car Windshield Glass Washer (Pack of 20)', 'Enham', 'Packof20_1-08fee.jpg', '', 'Packof20_2-b77b0.jpg', '', 'Effervescent-Tablets-Spray-Cleaner-Car-SDL486203496-5-70886.jpeg', 199, 229, 0.00, 50, 'Glass washer Tablet1.2', 'effervescent-tablets-spray-cleaner-car-windshield-glass-washer-pack-of-20', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Turns regular water into a powerful cleaning fluid. More convenient and easier to use than traditional windscreen cleaner. It Dissolves thoroughly, with no residual, and applies to all metal, rubber, plastic, and painted surfaces. Very effective at removing bug splatter, bird droppings, tree sap, and road grime from your windshield. Mixable with an anti-freezing agent, for improved cleaning performance in winter. \r\n</span></p><div><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\"><br></span></div>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Convenient to carry- portable, small size like milk film general size. It is convenient to carry and use.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Usage- this item is suitable for daily cleaning and care of all kinds of cars. Ideal to clean and decontaminate, reduce the friction between the wiper and the glass.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Efficient- a grain of 4 liter equals to general water wiper.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Environmental friendly, biodegradable, phosphate and fragrance free formula. </span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>China</p><p><b>Importer Name &amp; Adress :&nbsp;</b><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Naman Eretail Unnao UP</span></p><p><b>Common or Generic Name of the Commodity : </b>Glass Cleaning Tablets</p><p><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 12.00, 2.00, '2022-08-31 18:07:14', '2022-08-31 17:47:54'),
(96, 1, 'Long Handel Telescopic extendable Microfibre Duster Pack of 1', '', 'Takecare-Grey-Car-Cleaning-Duster-SDL858151082-1-eda95.jpg', '', '', '', '', 279, 299, 0.00, 50, 'Duster1.2', 'long-handel-telescopic-extendable-microfibre-duster-pack-of-1', '', '', 0, '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Duster is made of microfiber material for professional cleaning of your car. This highly absorbent material is soft and will be suitable for properly cleaning your car.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Made from Microfiber Material.No Marks & Scratches after use.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Easy to use Intense & Economical Tool for Automotive cleaning.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 13px; white-space: pre-wrap;\">Best accessory for Car Interior & Exterior Dity Cleaning Detailing.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>China</p><p><b>Importer Name &amp; Adress :</b>Naman Eretail Unnao UP</p><p><b>Common or Generic Name of the Commodity : </b>Dusters</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', 'featured', 0.40, 24.00, 12.00, 3.00, '2022-08-31 18:08:24', '2022-08-31 17:56:29'),
(97, 1, 'Microfiber Duster Brush for, Home, Kitchen & Computer (Pack of 1)', '', 'd5-54046.jpeg', '', '', '', '', 179, 199, 0.00, 50, 'Duster1.3', 'microfiber-duster-brush-for-home-kitchen--computer-pack-of-1', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"Presenting Microfiber Duster Pack Duster Brush for your, Home, Kitchen & Computer.  It can wipe small cracks that are hard to reach and is easy to rotate and clean. \"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Presenting Microfiber Duster Pack Duster Brush for your, Home, Kitchen & Computer. It can wipe small cracks that are hard to reach and is easy to rotate and clean.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Can be used for cleaning dusting house, kitchen & computer, etc</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Can be stored easily because of its compact size and wall hanging handle</span><br></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"Can be used for cleaning dusting house, kitchen & computer, etc\\nCan be stored easily because of its compact size and wall hanging handle\\nThis is a unique product that is made using gentle fibers, which do not harm your appliances \"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">This is a unique product that is made using gentle fibers, which do not harm your appliances</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Common or Generic Name of the Commodity : </b>Dusters</p><p><b>Manufacturer Name & Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name & Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name & Address : </b>Naman Eretail Unnao UP</p>', 'bestselling', 0.20, 18.00, 12.00, 2.00, '2022-09-07 15:04:28', '2022-08-31 18:03:36'),
(98, 1, 'Mini Cleansing Wiper for Car and Household Cleaning (Pack of 1)', '', 'mahek-accessories-1Pc-Simple-Green-SDL163469977-1-5003d.jpg', '', '', '', '', 129, 149, 0.00, 50, 'Wiper1.1', 'mini-cleansing-wiper-for-car-and-household-cleaning-pack-of-1', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Multipurpose Cleanser for your car and household cleaning. It is suitable for cleaning and scraping water on glass, bathtub, mirror, wall, car glass. It is easy to shave, safety and hygiene.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:0},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"color: rgb(0, 0, 0); font-size: 11pt; font-family: Arial;\">Multipurpose Cleanser for your car and household cleaning. It is suitable for cleaning and scraping water on glass, bathtub, mirror, wall, car glass. It is easy to shave, safety and hygiene.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Easy To Use :- Curved handle, Soft, comfortable handle,Slim profile and light weight.</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Comfort to handle is easy to grip by your hands. Uses your hand power to swipe clean. Useful household item for daily use</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Used for cleaning of tiles, car windows, screens, window panes, glasses, mirrors, kitchen platform, smooth surfaces, bathroom tiles etc</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Common or Generic Name of the Commodity :&nbsp;</b><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Wipers</span></p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 18:25:53'),
(99, 1, 'Double Sided Micro fiber Premium Car / Bike Wash Mitt Gloves Dusters Medium Size- Buy 1 Get 1 Free', 'Enham', '657758640893_1_4f3f6_15a98-095a3.jpg', '', '', '', '', 199, 229, 0.00, 50, 'Microfibre Gloves1.4', 'double-sided-micro-fiber-premium-car-bike-wash-mitt-gloves-dusters-medium-size-buy-1-get-1-free', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"As a glove to wear, it is easier to clean hard-to-clean areas. Made of soft microfiber. Suitable for cleaning cars and bicycles. Suitable for Made of soft microfiber. - Removes dirt quickly and easily.\"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">As a glove to wear, it is easier to clean hard-to-clean areas. Made of soft microfiber. Suitable for cleaning cars and bicycles. Suitable for Made of soft microfiber. - Removes dirt quickly and easily.</span><br></p>', '<ul><li><span data-sheets-value=\"{\"1\":2,\"2\":\"-Suitable for Car and Bike Wash\\n-Made from Soft Microfibre Material.\\n-Quickly and easily removes dirt.\\n-Absorbs water.\"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Suitable for Car and Bike Wash</span></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"-Suitable for Car and Bike Wash\\n-Made from Soft Microfibre Material.\\n-Quickly and easily removes dirt.\\n-Absorbs water.\"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Made from Soft Microfibre Material.</span></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"-Suitable for Car and Bike Wash\\n-Made from Soft Microfibre Material.\\n-Quickly and easily removes dirt.\\n-Absorbs water.\"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Quickly and easily removes dirt.</span></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"-Suitable for Car and Bike Wash\\n-Made from Soft Microfibre Material.\\n-Quickly and easily removes dirt.\\n-Absorbs water.\"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Absorbs water.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly </b>:Â <span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">India</span></p><p><b>Common or Generic Name of the Commodity</b> : Dusters</p><p><b>Manufacturer Name & Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name & Address</b> :Â <span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Naman Eretail Unnao UP</span></p><p><b>Marketer Name & Address</b> : Naman Eretail Unnao UP</p>', 'bestselling', 0.20, 18.00, 12.00, 2.00, '2022-08-31 19:23:59', '2022-08-31 18:36:25'),
(100, 1, '\"Car and bike cleaning Microfiber Hand Gloves Towel Duster  ', 'Enham', 'carwashing-gloves.jpeg', '', '', '', '', 199, 229, 0.00, 50, 'Microfibre Gloves1.3', 'car-and-bike-cleaning-microfiber-hand-gloves-towel-duster', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;This extra large, extra plush, absorbent, super soft and non-scratch car wash glove is gentle on your vehicle\'s finish and provides an amazing wash like no other. Soft and easy to use&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">This extra large, extra plush, absorbent, super soft and non-scratch car wash glove is gentle on your vehicle\'s finish and provides an amazing wash like no other. Soft and easy to use</span><br></p>', '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Amazingly absorbent, destroys dust and dirt, easy to clean and dry, gently lifts, catches dirt and grime like a magnet until it is washed. Ultra soft fine fibers make cleaning easy like a pro\\nIdeal for cleaning vehicles like cars, bikes &quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Amazingly absorbent, destroys dust and dirt, easy to clean and dry, gently lifts, catches dirt and grime like a magnet until it is washed. Ultra soft fine fibers make cleaning easy like a pro<br>Ideal for cleaning vehicles like cars, bikes</span><br></p>', '<p><b>Country of origin or Manufacture or Assembly</b> : India</p><p><b>Common or Generic Name of the Commodity </b>:&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Microfibre Gloves</span></p><p><b>Manufacturer Name &amp; Address</b>: Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address </b>: Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address</b> : Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 18:42:20'),
(101, 1, 'Silicone water wiper with squeegee blade for car (Pack of 1)', 'Enham', 'mahek-accessories-1pc-Silicone-Home-SDL210791816-1-6c609 (1).jpg', '', '', '', '', 159, 179, 0.00, 50, 'wiper1.2', 'silicone-water-wiper-with-squeegee-blade-for-car-pack-of-1', '', '', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">This hand squeegee is made with a comfortable handle that won\'t tire you out while cleaning. Its slim design is easy to handle and fits into small and tight spaces.\r\nMade of durable plastic and rubber that resists water and steam, you don\'t have to worry about it rusting or scratching the surface of the shower glass.\r\nConvenient storage: The hanging holes in the handle make it very practical to have the shower cleaner with squeegee exactly where you need it, making the task of cleaning the shower door easier to remember.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Slim profile and light weight, easy to use\r\n</span></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">The glass shower squeegee can wipe water drops off quickly.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Durable, silicone blade with precision edge for consistent, streak-free drying</span><br></li></ul>', '<p>Country of origin or Manufacture or Assembly : India</p><p>Common or Generic Name of the Commodity : Wipers</p><p>Manufacturer Name & Address: Naman Eretail Unnao UP</p><p>Packet name & Address : Naman Eretail Unnao UP</p><p>Marketer Name & Address : Naman Eretail Unnao UP</p>', 'trending', 0.20, 18.00, 12.00, 2.00, '2022-09-07 15:04:10', '2022-08-31 18:45:54'),
(102, 1, 'Car Wash Gloves Car Care Microfiber Cleaning Tools Car Wool Brush Soft Car Auto Car & Bike Cleaner Car-Styling Washing Machine -Pack of 1- (Assorted Color)', 'Enham', '4-8f6c3.jpg', '', '', '', '', 199, 229, 0.00, 50, 'Microfibre Gloves1.2', 'car-wash-gloves-car-care-microfiber-cleaning-tools-car-wool-brush-soft-car-auto-car', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;This extra large, extra plush, absorbent, super soft and non-scratch car wash glove is gentle on your vehicle\'s finish and provides an amazing wash like no other. Softer than the finest sheepskin gloves with microfiber absorption.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">This extra large, extra plush, absorbent, super soft and non-scratch car wash glove is gentle on your vehicle\'s finish and provides an amazing wash like no other. Softer than the finest sheepskin gloves with microfiber absorption.</span><br></p>', '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Multi-functional: Suitable for cleaning cars, glass, floors, bathrooms, furniture, kitchen and so on. Soft, comfortable and good handling\\r\\nThey use less water and soap. Coral fleece brush Does not leave delicate surfaces in your car\\r\\nWater absorption, strong detergency and soft touch.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\"><b>Multi-functional</b>: Suitable for cleaning cars, glass, floors, bathrooms, furniture, kitchen and so on. Soft, comfortable and good handling<br>They use less water and soap. Coral fleece brush Does not leave delicate surfaces in your car<br>Water absorption, strong detergency and soft touch.</span><br></p>', '<p>Country of origin or Manufacture or Assembly : China</p><p>Common or Generic Name of the Commodity :&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Microfibre Gloves</span></p><p>Manufacturer Name &amp; Address: Naman Eretail Unnao UP</p><p>Packet name &amp; Address : Naman Eretail Unnao UP</p><p>Marketer Name &amp; Address : Naman Eretail Unnao UP</p>', 'bestselling', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 18:46:26');
INSERT INTO `product` (`id`, `admin_id`, `name`, `brand_name`, `image`, `image_one`, `image_two`, `image_three`, `image_four`, `price`, `regular_price`, `shipping`, `quantity`, `sku`, `url`, `title`, `meta_description`, `status`, `long_desc`, `short_decs`, `general_info`, `sale_tag`, `item_weight`, `item_length`, `item_height`, `item_breadth`, `updated_on`, `added_on`) VALUES
(103, 1, 'T Type Drying Car Auto Wash Blade Glass Window Snow Water Rain Cleaner Sweep Shovel Wiper(Pack of 1)', '', 'mahek-accessories-1-PCS-T-SDL154985640-1-3d9d9.jpg', '', '', '', '', 199, 229, 0.00, 50, 'Wiper1.3', 't-type-drying-car-auto-wash-blade-glass-window-snow-water-rain-cleaner-sweep-shovel-wiperpack-of-1', '', '', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">T Type Drying Car Auto Wash Blade is a versatile squeegee for wiping shower doors and walls, trim, windows, car windshields and windows. It has a soft, non-slip and flexible silicone ergonomic handle that provides the user with an extreme level of comfort. Nikavi T Type Drying Car Auto Wash Blade effectively wipes and cleans car windows.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Scraping soft and delicate, will not to hurt the surface. Using ergonomic design, curved handle, comfortable and it is very convenient to operate.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">All-purpose squeegee for wiping shower doors &amp; walls, tiles, windows, car windshield and windows</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Streak-free &amp; squeak-free water control thanks to its even &amp; flexible silicone blade</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Soft non-slip handle provides extra comfort and ergonomics.</span><br></li></ul>', '<p>Country of origin or Manufacture or Assembly : India</p><p>Common or Generic Name of the Commodity : Wipers</p><p>Manufacturer Name &amp; Address: Naman Eretail Unnao UP</p><p>Packet name &amp; Address : Naman Eretail Unnao UP</p><p>Marketer Name &amp; Address : Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 18:49:53'),
(104, 1, 'Dual Sided Multipurpose Car Home Office Cleaning Microfiber Glove Mitt with Waterproofing Layer | Super Large Size (25x18 cm) Extra Thick (Pack of 1)', 'Enham', 'carhome.jpg', 'carhome2.jpg', 'carhome3.jpg', '', '', 199, 229, 0.00, 50, 'Microfibre Gloves1.1', 'dual-sided-multipurpose-car-home-office-cleaning-microfiber-glove-mitt-with-waterproofing-layer', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;It can be used for washing cars, bathrooms, cleaning tiles, washing windows, cleaning kitchens and cleaning other surfaces. The bone shape offers a better grip with wet hands. Non-abrasive soft surface - does not cause scratches on the surface. The Multi-Purpose Microfiber Home Office Cleaning Glove with Waterproof Coating has two sides of yellow bristles to help you clean those hard-to-reach areas.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">It can be used for washing cars, bathrooms, cleaning tiles, washing windows, cleaning kitchens and cleaning other surfaces. The bone shape offers a better grip with wet hands. Non-abrasive soft surface - does not cause scratches on the surface. The Multi-Purpose Microfiber Home Office Cleaning Glove with Waterproof Coating has two sides of yellow bristles to help you clean those hard-to-reach areas.</span><br></p>', '<ul><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Quick cleaning - Easy rinsing - Long life - Cleans without scratching, long lasting. Premium quality foams and sponge.\\nThe bone shape offers a better grip with wet hands. Non-abrasive soft surface - does not cause scratches on the surface\\nThe super absorbent sponge soaks up and lathers for a perfect clean.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\"><b>Quick cleaning - Easy rinsing - Long life -</b> Cleans without scratching, long lasting. </span></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Quick cleaning - Easy rinsing - Long life - Cleans without scratching, long lasting. Premium quality foams and sponge.\\nThe bone shape offers a better grip with wet hands. Non-abrasive soft surface - does not cause scratches on the surface\\nThe super absorbent sponge soaks up and lathers for a perfect clean.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Premium quality foams and sponge.</span></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Quick cleaning - Easy rinsing - Long life - Cleans without scratching, long lasting. Premium quality foams and sponge.\\nThe bone shape offers a better grip with wet hands. Non-abrasive soft surface - does not cause scratches on the surface\\nThe super absorbent sponge soaks up and lathers for a perfect clean.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">The bone shape offers a better grip with wet hands.</span></li><li><b>Non-abrasive soft surface -</b> does not cause scratches on the surface The super absorbent sponge soaks up and lathers for a perfect clean.</li></ul>', '<p><span style=\"font-family: Montserrat;\"><b>Country of origin or Manufacture or Assembly </b>:&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">India</span></p><p><span style=\"font-family: Montserrat;\"><b>Common or Generic Name of the Commodity </b>:&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Microfibre Gloves</span></p><p><span style=\"font-family: Montserrat;\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p><span style=\"font-family: Montserrat;\"><b>Packet name &amp; Address </b>: Naman Eretail Unnao UP</span></p><p><span style=\"font-family: Montserrat;\"><b>Marketer Name &amp; Address </b>: Naman Eretail Unnao UP</span></p>', 'bestselling', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 18:53:10'),
(105, 1, 'Multipurpose Tyre Tyre Cleaning Brush for Cycle Cleaner,  Motorcycle, Car Wheel,', 'Enham', '511nAaw3uBS.jpg', '51sH5poVzwS.jpg', '', '', '', 199, 229, 0.00, 50, 'Brush 1.1', 'multipurpose-tyre-tyre-cleaning-brush-for-cycle-cleaner--motorcycle-car-wheel', '', '', 0, '<p><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Our vehicles need to be kept clean and this can be achieved with a set of convenient tools to help us do this. Introducing the EVERY tire cleaning brush that is durable and highly functional. These brushes are made from the highest quality materials that help in cleaning your vehicle\'s tires effectively. Now take home your own set of brushes and keep your tires clean. Easy to store and transport. It is compact and portable. They thus consume less storage space. The handle of these brushes is equipped with a hole for hanging them.\r\n\r\n</span></p>', '<ul><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Convenient car cleaning tool, easy to Operate</span><br></li><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Grip Handle for comfortable non-slip grip while you clean,Details all areas of the wheel, lug nut, stem, and more</span><br></li><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 15px; white-space: pre-wrap;\">Contoured design is a perfect fit for tire sidewalls,Extra soft scratch free bristles,Handle provides control and protection</span><br></li></ul>', '<p>Country of origin or Manufacture or Assembly : India</p><p>Common or Generic Name of the Commodity : Brush</p><p>Manufacturer Name &amp; Address: Naman Eretail Unnao UP</p><p>Packet name &amp; Address : Naman Eretail Unnao UP</p><p>Marketer Name &amp; Address : Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-08-31 18:58:13'),
(106, 1, 'Auto Detail Cleaning Brushes Detailing Brush Set for Motorcycle Automotive Interior -5 Pieces', 'Enham', '61fRHAio84L._SL1200_.jpg', '61jTDnKgg2L._SL1200_.jpg', '61ADDFFPfZL._SL1200_.jpg', '714UjFgM9NL._SL1200_.jpg', '', 279, 299, 0.00, 50, 'Brush 1.4', 'auto-detail-cleaning-brushes-detailing-brush-set-for-motorcycle-automotive-interior-5-pieces', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"Multi-functional detailing brushes is an essential tool for your car and motorcycle. Perfect for cleaning wheels, dashboard, interior, exterior, leather, vents, emblems for cars and motorcycles. A hanging hole on the handle makes it easy to hang and store. It is difficult to age, break, corrode and mold. It dries easily after washing and is comfortable to hold.\"}\" data-sheets-userformat=\"{\"2\":14979,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":987409},\"15\":\"Arial\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Multi-functional detailing brushes is an essential tool for your car and motorcycle. Perfect for cleaning wheels, dashboard, interior, exterior, leather, vents, emblems for cars and motorcycles. A hanging hole on the handle makes it easy to hang and store. It is difficult to age, break, corrode and mold. It dries easily after washing and is comfortable to hold.</span><br></p>', '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"A set of 5 multi-functional detailing brushes is an essential tool for your car and motorcycle.\\nPerfect for cleaning wheels, dashboard, interior, exterior, leather, vents, emblems for cars and motorcycles.\\nThe bristles are soft and thick and not easy to fall off, so it is very easy to wipe away dirt and other things. Safe use.\"}\" data-sheets-userformat=\"{\"2\":14979,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":987409},\"15\":\"Arial\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">A set of 5 multi-functional detailing brushes is an essential tool for your car and motorcycle.<br>Perfect for cleaning wheels, dashboard, interior, exterior, leather, vents, emblems for cars and motorcycles.<br>The bristles are soft and thick and not easy to fall off, so it is very easy to wipe away dirt and other things. Safe use.</span><br></p>', '<p><span style=\"font-family: Montserrat;\"><b>Country of origin or Manufacture or Assembly</b> :Â </span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">India</span></p><p><span style=\"font-family: Montserrat;\"><b>Common or Generic Name of the Commodity </b>:Â </span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Cleaning Brush</span></p><p><span style=\"font-family: Montserrat;\"><b>Manufacturer Name & Address</b>:<b> </b>Naman Eretail Unnao UP</span></p><p><span style=\"font-family: Montserrat;\"><b>Packet name & Address </b>: Naman Eretail Unnao UP</span></p><p><span style=\"font-family: Montserrat;\"><b>Marketer Name & Address </b>: Naman Eretail Unnao UP</span></p>', 'trending', 0.20, 18.00, 12.00, 2.00, '2022-08-31 19:43:08', '2022-08-31 19:00:10'),
(107, 1, 'Washing Accessories| Wheel Tire Rim Scrub Brush for car Washing ', 'Enham', 'Mahek-Accessories-Car-Wheel-Tire-SDL788444021-1-a67bd.jpeg', 'Mahek-Accessories-Car-Wheel-Tire-SDL788444021-2-56df3.jpeg', 'Mahek-Accessories-Car-Wheel-Tire-SDL788444021-3-11e2d.jpeg', '', '', 199, 229, 0.00, 50, 'Brush 1.2', 'washing-accessories-wheel-tire-rim-scrub-brush-for-car-washing-', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"This Tire Brush is comfortable to handle. Protective Rubber Bumper, Handle Provides Control and Protection, Molded Design Fits Sidewall, Rinse Area Thoroughly First to Remove Any Loose Dirt, Rinse Brush Frequently to Dislodge Trapped Particles, rinse and dry after use. \"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">This Tire Brush is comfortable to handle. Protective Rubber Bumper, Handle Provides Control and Protection, Molded Design Fits Sidewall, Rinse Area Thoroughly First to Remove Any Loose Dirt, Rinse Brush Frequently to Dislodge Trapped Particles, rinse and dry after use.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">High quality flexible, easy and simple, women and children can also help wash car wheels</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">An essential brush for every car owner, it will keep your car cleaner and looking comfortable after use</span></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Soft, gentle bristles reach tight spots, Handle provides control and protection Suitable for all types of vehicle tires, rims, alloy</span><br></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"High quality flexible, easy and simple, women and children can also help wash car wheels\\r\\n\\r\\nAn essential brush for every car owner, it will keep your car cleaner and looking comfortable after use\\r\\n\\r\\nSoft, gentle bristles reach tight spots, Handle provides control and protection Suitable for all types of vehicle tires, rims, alloy\\r\\n\\r\\nEffectively clean the wheel surface of aluminum wheel rims and tires from various corners, cracks\"}\" data-sheets-userformat=\"{\"2\":15235,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"11\":3,\"12\":0,\"14\":{\"1\":2,\"2\":3355443},\"15\":\"inherit\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Effectively clean the wheel surface of aluminum wheel rims and tires from various corners, cracks</span><br></li></ul>', '<p>Country of origin or Manufacture or Assembly : India</p><p>Common or Generic Name of the Commodity : Brush</p><p>Manufacturer Name & Address: Naman Eretail Unnao UP</p><p>Packet name & Address : Naman Eretail Unnao UP</p><p>Marketer Name & Address : Naman Eretail Unnao UP</p>', 'trending', 0.20, 18.00, 2.00, 12.00, '2022-09-07 15:03:47', '2022-08-31 19:05:53'),
(108, 1, 'Designer Men Imitation Jewellery Chain For Men Pack of 1', 'Enham', 'Shankhraj-Mall-Gold-Plated-Designer-SDL320092033-3-9a7e9 (1).jpeg', 'Shankhraj-Mall-Gold-Plated-Designer-SDL320092033-5-0fb5e (1).jpeg', 'Shankhraj-Mall-Gold-Plated-Designer-SDL320092033-4-6645d (1).jpeg', '', '', 199, 209, 0.00, 50, 'menschain13', 'designer-men-imitation-jewellery-chain-for-men-pack2', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"This classy chain for men features brass construction. The distinctive pattern is the result of excellent craftsmanship. The chain\'s eye-catching yellow gold finishing gives it a genuine gold appearance and feel.\\n\\nKeep your accessories away from chemicals and moisture to increase their lifespan. Maintain dryness, use a dry towel to wipe, and act elegantly. Keep it away from substances like direct heat, water, perfumes, deodorants, and other potent compounds that could react with the metal or plating.\\n\\nUse chamois or a leather swatch to gently wipe the jewellery after each use. To extend the life of your jewellery, clean it after removing it with a soft cloth. Keep your jewellery in the box it came in or a soft bag.gives a genuine gold look and feel to the chain. To make your accessories last longer avoid harsh chemicals and moisture. Keep dry, clean with dry cloth and wear with panache.\"}\" data-sheets-userformat=\"{\"2\":14979,\"3\":{\"1\":0},\"4\":{\"1\":3,\"3\":4},\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":0},\"15\":\"Arial\",\"16\":11}\" style=\"color: rgb(0, 0, 0); font-size: 11pt; font-family: Arial;\">This classy chain for men features brass construction. The distinctive pattern is the result of excellent craftsmanship. The chain\'s eye-catching yellow gold finishing gives it a genuine gold appearance and feel.<br><br>Keep your accessories away from chemicals and moisture to increase their lifespan. Maintain dryness, use a dry towel to wipe, and act elegantly. Keep it away from substances like direct heat, water, perfumes, deodorants, and other potent compounds that could react with the metal or plating.<br><br>Use chamois or a leather swatch to gently wipe the jewellery after each use. To extend the life of your jewellery, clean it after removing it with a soft cloth. Keep your jewellery in the box it came in or a soft bag.gives a genuine gold look and feel to the chain. To make your accessories last longer avoid harsh chemicals and moisture. Keep dry, clean with dry cloth and wear with panache.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 11pt;\">Gold plated designer chain with a solid finish & classy look</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 11pt;\">and non-irritating on the skin</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 11pt;\">Sturdy, easy-to-wear</span><br></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"Gold plated designer chain with a solid finish & classy look\\nComfortable and non-irritating on the skin\\nSturdy, easy-to-wear\\nVersatile build to suit both formal and casual styles. \"}\" data-sheets-userformat=\"{\"2\":14979,\"3\":{\"1\":0},\"4\":{\"1\":3,\"3\":4},\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":0},\"15\":\"Arial\",\"16\":11}\" style=\"color: rgb(0, 0, 0); font-size: 11pt; font-family: Arial;\">Versatile build to suit both formal and casual styles.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Importer Name & Adress : </b>N/A</p><p><b>Common or Generic Name of the Commodity :</b>Â Chains for menÂ </p><p><b>Manufacturer Name & Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name & Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name & Address : </b>Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 2.00, 12.00, '2022-08-31 19:42:56', '2022-08-31 19:13:47'),
(109, 2, 'Car AC Multifunctional Window Brush ', 'Enham', 'VD-Solution-Car-AC-Window-SDL085585047-1-dcd1e.jpg', 'VD-Solution-Car-AC-Window-SDL085585047-2-d1786.jpg', 'VD-Solution-Car-AC-Window-SDL085585047-3-09f51.jpg', '', '', 159, 179, 0.00, 50, 'Brush 1.5', 'car-ac-multifunctional-window-brush-', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Brand new and high quality Used to clean the car air outlet, dashboard and other interior seams of the car, can also be used to clean the keyboard and window blinds, convenient and useful appearance Mini can be carried, easy to carry and use High brush from quality material can be stable and durable Item&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:15987699},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Brand new and high quality Used to clean the car air outlet, dashboard and other interior seams of the car, can also be used to clean the keyboard and window blinds, convenient and useful appearance Mini can be carried, easy to carry and use High brush from quality material can be stable and durable Item</span><br></p>', '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Multi-function: cleaning keyboard, dashboard, equipment in car .The faux bristle is enough to reach the nook and aperture\\nEasily Clean Unreachable And Dirty Window Channels, Keyboard Etc. Portable And Lightweight, Convenient To Carry. Also Features A Hole For Hanging&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:15987699},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Multi-function: cleaning keyboard, dashboard, equipment in car .The faux bristle is enough to reach the nook and aperture<br>Easily Clean Unreachable And Dirty Window Channels, Keyboard Etc. Portable And Lightweight, Convenient To Carry. Also Features A Hole For Hanging</span><br></p>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Common or Generic Name of the Commodity :&nbsp;</b><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Cleaning Brush</span></p><p><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 13:28:22'),
(110, 2, 'Plastic Dust Pan with Brush', 'Enham', 'mahek-accessories-Plastic-With-Brush-SDL536908904-1-20bf0.jpeg', 'mahek-accessories-Plastic-With-Brush-SDL536908904-2-50860.jpeg', 'mahek-accessories-Plastic-With-Brush-SDL536908904-4-6bbf6.jpeg', '', '', 179, 199, 0.00, 50, 'Brush 1.6', 'plastic-dust-pan-with-brush', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Keep your home and kitchen clean with this cleaning tool. Multi-purpose use, it can be used to clean keyboards, car dashboards, kitchen platforms, shelves, the inside of microwave ovens, toasters, gas burners and more. The small body gets into corners and sides and easily wipes away dust and dirt. Plastic bristles can clean without damaging surfaces. It can be conveniently hung on wall hooks with a hole in the cleaning brush. It is washable and reusable. Comes with a scoop to collect dust, dirt and food particles.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Keep your home and kitchen clean with this cleaning tool. Multi-purpose use, it can be used to clean keyboards, car dashboards, kitchen platforms, shelves, the inside of microwave ovens, toasters, gas burners and more. The small body gets into corners and sides and easily wipes away dust and dirt. Plastic bristles can clean without damaging surfaces. It can be conveniently hung on wall hooks with a hole in the cleaning brush. It is washable and reusable. Comes with a scoop to collect dust, dirt and food particles.</span><br></p>', '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Perfect for car, office or home. Keep your desk tidy with this cute mini dustbin.\\r\\nYou can put a plastic bag in the bin for more convenient use.\\r\\nClamshell design with swing Lid, keep your desktop clean and tidy.\\r\\nMini trash can, very creative and practical. Wont take up too much space.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Perfect for car, office or home. Keep your desk tidy with this cute mini dustbin.<br>You can put a plastic bag in the bin for more convenient use.<br>Clamshell design with swing Lid, keep your desktop clean and tidy.<br>Mini trash can, very creative and practical. Wont take up too much space.</span><br></p>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Common or Generic Name of the Commodity :</b> Cleaning Brush</p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 13:36:22'),
(111, 2, 'Car Washing Sponge With Microfiber Washer Towel Duster For Cleaning Car. Bike Vehicle ( Color May Vary)', 'Enham', 'mahek-accessories-Plastic-With-Brush-SDL536908904-4-6bbf6.jpeg', '', '', '', '', 199, 299, 0.00, 50, 'Sponges 1.1', 'car-washing-sponge-with-microfiber-washer-towel-duster-for-cleaning-car-bike-vehicle--color-may-vary', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;MULTI-PURPOSE CAR WASHING SPONGE MULTI-PURPOSE CAR WASHING SPONGE It can be used for washing the car, washing the bathroom, cleaning tiles, windows, cleaning the kitchen and cleaning other surfaces. Washable and reusable It is shaped for easy handling, you can hold it comfortably while washing Non-abrasive soft surface - does not cause scratches on the surface&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">MULTI-PURPOSE CAR WASHING SPONGE MULTI-PURPOSE CAR WASHING SPONGE It can be used for washing the car, washing the bathroom, cleaning tiles, windows, cleaning the kitchen and cleaning other surfaces. Washable and reusable It is shaped for easy handling, you can hold it comfortably while washing Non-abrasive soft surface - does not cause scratches on the surface</span><br></p>', '<p><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\">It can be used for car washing, bathroom washing, tile cleaning, window cleaning, kitchen cleaning, and cleaning other surfaces.</span><br style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\"><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\">Washable and reusable</span><br style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\"><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\">It is shaped for easy handling you can hold it conveniently while washing</span><br style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\"><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14.6667px;\">Non-abrasive soft surface - does not cause scratches to the surface</span><br></p>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Common or Generic Name of the Commodity :</b>&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Sponges</span></p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 13:58:08'),
(112, 2, 'Car Washing Sponge With Microfiber Washer Towel Duster For Cleaning Car. Bike Vehicle ( Color May Vary ) (1)', 'Enham', 'Aeoss_Car_Washing_Sponge_With_SDL124604911_1_92e29-2ad45.jpeg', 'sca_65cad-be60f.jpg', 'Aeoss-Car-Washing-Sponge-With-SDL124604911-2-78daa.jpeg', 'Aeoss-Car-Washing-Sponge-With-SDL124604911-3-55c45.jpeg', '', 199, 229, 0.00, 50, 'Sponges 1.2', 'car-washing-sponge-with-microfiber-washer-towel-duster-for-cleaning-car-bike-vehicle--color-may-vary--1', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Microfiber Duster with Sponge and Handle Solve all your cleaning problems with this lifestyle microfiber cloth/sponge. This tool is the solution to all your cleaning problems and can be used for mopping, scrubbing, dusting, wiping, etc. This microfiber cloth/sponge provides a good grip and easy handling, is easy to use and is the perfect cleaning aid. have in your car.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Microfiber Duster with Sponge and Handle Solve all your cleaning problems with this lifestyle microfiber cloth/sponge. This tool is the solution to all your cleaning problems and can be used for mopping, scrubbing, dusting, wiping, etc. This microfiber cloth/sponge provides a good grip and easy handling, is easy to use and is the perfect cleaning aid. have in your car.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">This microfiber can be used for cleaning cars, household appliances, kitchen/bathroom glasses.</span></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Its superfine microfiber suds will not leave any sratches on glass.</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;This microfiber can be used for cleaning cars, household appliances, kitchen/bathroom glasses.\\r\\nIts superfine microfiber suds will not leave any sratches on glass.\\r\\nThe Microfiber Premium Scratch-Free Wash Mitt is extra plush and fluffy, and holds tons of suds to make any car wash a fun and safe experience.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">The Microfiber Premium Scratch-Free Wash Mitt is extra plush and fluffy, and holds tons of suds to make any car wash a fun and safe experience.</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly : </b>India</p><p><b>Common or Generic Name of the Commodity :</b>&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Sponges</span></p><p><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 14:03:01'),
(113, 2, 'Silicon Heel Protection Foot Protectors (Free Size)', 'Enham', 'ARADENT-Silicon-Heel-Protection-Foot-SDL966536364-1-17a41.jpg', 'ARADENT-Silicon-Heel-Protection-Foot-SDL966536364-2-6d55b.jpg', '', '', '', 139, 159, 0.00, 50, 'Heel Socks1.1', 'silicon-heel-protection-foot-protectors-free-size', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"Orthopedic silicone heel protectors: protects the heel bone from extreme pressure, fatigue and strain, prevents thickening of the heel skin, protects the heel from blisters, chipped skin, corns and cracked feet. Provides a hydrating treatment to repair dry, painful, hard and cracked skin on the heels. They also provide an improvement in appearance by helping to reduce the fine lines of aging. These socks can also be used with foot cream. Pain relief: prevents joint and foot pain caused by poorly cushioned shoes, daily weight pressure, walking and standing. Ultimate relief from heel pain and heel swelling. Provides extra cushioning, shock absorption, non-slip and breathable. Up OK. Maximum comfort on the heel, stability, reusable, economical and hygienic.\"}\" data-sheets-userformat=\"{\"2\":6851,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"9\":0,\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":0},\"15\":\"Arial\"}\" style=\"color: rgb(0, 0, 0); font-size: 10pt; font-family: Arial;\">Orthopedic silicone heel protectors: protects the heel bone from extreme pressure, fatigue and strain, prevents thickening of the heel skin, protects the heel from blisters, chipped skin, corns and cracked feet. Provides a hydrating treatment to repair dry, painful, hard and cracked skin on the heels. They also provide an improvement in appearance by helping to reduce the fine lines of aging. These socks can also be used with foot cream. Pain relief: prevents joint and foot pain caused by poorly cushioned shoes, daily weight pressure, walking and standing. Ultimate relief from heel pain and heel swelling. Provides extra cushioning, shock absorption, non-slip and breathable. Up OK. Maximum comfort on the heel, stability, reusable, economical and hygienic.</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Unisize, provides extra cushioning, shork absorption, anti-slip, breathable, ultimate heel pain relief slip-on pads, for heel pain, spurs, heel swelling. One pair, two units, universal size. Most thickest heel slip ons for ultimate heel comfort stability for firm foot-fall, reusable, economic, hygienic, soft to wear under shoes or barefooted</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Washable and reusabe: hand wash in water with detergent powder and dry in a shade avoiding direct exposure to sunlight</span><br></li><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt;\">Anti heel crack silicone protector: protects heel bone from extreme pressure, fatigue and strain, prevents thickening of heel skin, keeps heel safe from blisters, chipped skin, corn and cracked feet. provides hydration treatment to repair your dry, painful, hard and cracked skin on your heels. Also provide an improvement of the appearance by helping reduce fine lines of Ageing. These gel socks can also be used with foot cream</span><br></li><li><span data-sheets-value=\"{\" 1\":2,\"2\":\"unisize,=\"\" provides=\"\" extra=\"\" cushioning,=\"\" shork=\"\" absorption,=\"\" anti-slip,=\"\" breathable,=\"\" ultimate=\"\" heel=\"\" pain=\"\" relief=\"\" slip-on=\"\" pads,=\"\" for=\"\" pain,=\"\" spurs,=\"\" swelling.=\"\" one=\"\" pair,=\"\" two=\"\" units,=\"\" universal=\"\" size.=\"\" most=\"\" thickest=\"\" slip=\"\" ons=\"\" comfort=\"\" stability=\"\" firm=\"\" foot-fall,=\"\" reusable,=\"\" economic,=\"\" hygienic,=\"\" soft=\"\" to=\"\" wear=\"\" under=\"\" shoes=\"\" or=\"\" barefoote\\n\\nwashable=\"\" and=\"\" reusabe:=\"\" hand=\"\" wash=\"\" in=\"\" water=\"\" with=\"\" detergent=\"\" powder=\"\" dry=\"\" a=\"\" shade=\"\" avoiding=\"\" direct=\"\" exposure=\"\" sunlight\\n\\r\\nanti=\"\" crack=\"\" silicone=\"\" protector:=\"\" protects=\"\" bone=\"\" from=\"\" extreme=\"\" pressure,=\"\" fatigue=\"\" strain,=\"\" prevents=\"\" thickening=\"\" of=\"\" skin,=\"\" keeps=\"\" safe=\"\" blisters,=\"\" chipped=\"\" corn=\"\" cracked=\"\" feet.=\"\" hydration=\"\" treatment=\"\" repair=\"\" your=\"\" dry,=\"\" painful,=\"\" hard=\"\" skin=\"\" on=\"\" heels.=\"\" also=\"\" provide=\"\" an=\"\" improvement=\"\" the=\"\" appearance=\"\" by=\"\" helping=\"\" reduce=\"\" fine=\"\" lines=\"\" ageing.=\"\" these=\"\" gel=\"\" socks=\"\" can=\"\" be=\"\" used=\"\" foot=\"\" cream\\n\\r\\nprevents=\"\" joints=\"\" caused=\"\" poorly=\"\" padded=\"\" footwear,=\"\" daily=\"\" weight=\"\" pressure:=\"\" walking=\"\" standing=\"\" washable=\"\" sunlight\"}\"=\"\" data-sheets-userformat=\"{\" 2\":6851,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"9\":0,\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":0},\"15\":\"arial\"}\"=\"\" style=\"color: rgb(0, 0, 0); font-size: 10pt; font-family: Arial;\">Prevents joints and foot pain caused by poorly padded footwear, daily weight pressure: walking and standing washable and reusabe: hand wash in water with detergent powder and dry in a shade avoiding direct exposure to sunlight</span><br></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Common or Generic Name of the Commodity :&nbsp;</b><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Foot care</span></p><p><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</p>', 'featured', 0.20, 18.00, 2.00, 12.00, '2022-09-03 14:16:56', '2022-09-03 14:10:18'),
(114, 2, 'Silicone Bath Body Brush ', 'Enham', 'Saleh-Silicone-Shower-Bath-Belt-SDL405036270-1-0c211.jpg', '', '', '', '', 169, 189, 0.00, 50, 'Bath Belt1.1', 'silicone-bath-body-brush-', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;This wash brush will give you a comfortable massage feeling when you use it to scrub your body -- perfect to relax muscles, relieve stress, release metabolic waste and toxins,promote blood circulation as well as increase the elasticity of your skin&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:0},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"color: rgb(0, 0, 0); font-size: 11pt; font-family: Arial;\">This wash brush will give you a comfortable massage feeling when you use it to scrub your body -- perfect to relax muscles, relieve stress, release metabolic waste and toxins,promote blood circulation as well as increase the elasticity of your skin</span><br></p>', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: Arial; font-size: 11pt;\">Top-quality of food-grade silicone, 100% body-safe, odorless and durable in use. The silicone material is acid resistant and can use with soda water, essential oils</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Top-quality of food-grade silicone, 100% body-safe, odorless and durable in use. The silicone material is acid resistant and can use with soda water, essential oils\\n\\nThe ultra long length of the body scrubber, combined with the handles at each end. Not only ensures anti-slip and comfortable grip, but also allows you to massage and clean your back and other hard-to-reach body areas with ease\\n\\n\\n\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:0},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"color: rgb(0, 0, 0); font-size: 11pt; font-family: Arial;\">The ultra long length of the body scrubber, combined with the handles at each end. Not only ensures anti-slip and comfortable grip, but also allows you to massage and clean your back and other hard-to-reach body areas with ease<br><br><br><br></span></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Body Scrubber &amp; Polishes</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacurer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 14:26:25'),
(115, 2, 'Drain Pipe Cleaner Spring Hair Catcher Sink Clean Stainless Steel Drain Cleaner', 'Enham', 'Gatih-Drain-Pipe-Cleaner-Spring-SDL408187678-4-d146b.jpg', 'Gatih-Drain-Pipe-Cleaner-Spring-SDL408187678-2-f1b25.jpg', '', '', '', 189, 199, 0.00, 50, 'Home & Kitchen1.1', 'drain-pipe-cleaner-spring-hair-catcher-sink-clean-stainless-steel-drain-cleaner', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;It is a very flexible and flexible winding steel spring cable, it is easy to use and the grip on the top is very convenient, the steel spring is very heavy and there are retractable claws on the bottom. It can be bent in narrow places, has strong adhesion and easily pulls out small non-ferrous objects that cannot be attracted by magnets.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">It is a very flexible and flexible winding steel spring cable, it is easy to use and the grip on the top is very convenient, the steel spring is very heavy and there are retractable claws on the bottom. It can be bent in narrow places, has strong adhesion and easily pulls out small non-ferrous objects that cannot be attracted by magnets.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">This Drain Cleaner Wire Stick Clears The Drainage Pipes, Unclogging Them. Made of high quality metal, have good tenacity, gripper design. The Drain clog remover is 160 cm for you to be more convenient and deeper in drain sewer cleaning.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Drainage block remover tools comes with tiny hooks for hooking up hair clogs to remove and clean the drain instantly.</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;This Drain Cleaner Wire Stick Clears The Drainage Pipes, Unclogging Them. Made of high quality metal, have good tenacity, gripper design. The Drain clog remover is 160 cm for you to be more convenient and deeper in drain sewer cleaning.\\n\\nDrainage block remover tools comes with tiny hooks for hooking up hair clogs to remove and clean the drain instantly.\\n\\nDrain cleaner sticks is made of Hard non-breakable Red Plastic handle and Super Sturdy Steel Spring.\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Drain cleaner sticks is made of Hard non-breakable Red Plastic handle and Super Sturdy Steel Spring.<br></span></li></ul>', '<p><b>Country of origin or Manufacture or Assembly :</b> India</p><p><b>Common or Generic Name of the Commodity :</b>&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Bathroom &amp; Toilets</span></p><p><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</p><p><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</p><p><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 15:01:54');
INSERT INTO `product` (`id`, `admin_id`, `name`, `brand_name`, `image`, `image_one`, `image_two`, `image_three`, `image_four`, `price`, `regular_price`, `shipping`, `quantity`, `sku`, `url`, `title`, `meta_description`, `status`, `long_desc`, `short_decs`, `general_info`, `sale_tag`, `item_weight`, `item_length`, `item_height`, `item_breadth`, `updated_on`, `added_on`) VALUES
(116, 2, 'Windmill Shape Stainless Steel Watermelon Slicer Fast Cutter Cutting Tools', 'Enham', 'Windmill-Shape-Stainless-Steel-Watermelon-SDL714859030-1-821d5.jpg', 'Windmill-Shape-Stainless-Steel-Watermelon-SDL714859030-2-48ddd.jpg', 'Windmill-Shape-Stainless-Steel-Watermelon-SDL714859030-3-7ebf2.jpg', 'Windmill-Shape-Stainless-Steel-Watermelon-SDL714859030-4-eee8c.jpg', '', 189, 199, 0.00, 50, '', 'windmill-shape-stainless-steel-watermelon-slicer-fast-cutter-cutting-tools', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">An innovative tool for quickly and cleanly slicing and serving watermelon. With Angelo, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genetti :- 1000 and 1 solutions for your kitchen. Features: </span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">1. Easy to cut into the watermelon, allowing you to scoop and cut out pieces </span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">2. Get the most out of your watermelon with this handy little utensil </span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">3. Useful for summer parties! </span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">4. Stainless steel - dishwasher safe </span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">5. Easy and accurate. </span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">7. Extracts all the pulp of the watermelon.</span></p><p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An innovative tool for quickly and cleanly slicing and serving watermelon. With Angurello, you can cut and extract from the fruit, with just a simple gesture, perfect slices of chicken, while removing the taste. Genietti :- 1000 and 1 solutions for your kitchen. Features: 1. Easy to cut into watermelon, allowing you to scoop and cut out pieces 2. Get the most out of your watermelon with this handy little utensil 3. Useful for summer parties! 4. Stainless steel - dishwasher safe 5. Easy and accurate. 7. Extracts all the pulp of the watermelon. 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\"> 8. you can cut and extract perfect slices of pulp from fruit with just a simple gesture.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Watermelon Melon Slicer Corer Fruit Knife Cutter Kitchen accessories Stainless Steel kitchen tools Knife Corer Watermelon</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Dishwasher Safe, 100% Stainless Steel</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Watermelon Melon Slicer Corer Fruit Knife Cutter Kitchen accessories Stainless Steel kitchen tools Knife Corer Watermelon\\n\\nDishwasher Safe, 100% Stainless Steel\\n\\r\\nReduces Watermelon Cutting Time In Half&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;inherit&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Reduces Watermelon Cutting Time In Half</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b> Fruit cutters</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 15:35:24'),
(117, 2, 'Plastic Tap Extension Assorted Colours Set of 1 Plastic (ABS) Kitchen Sink Tap (Sink Cock)', 'Enham', 'Trending-Tail-Plastic-Tap-Extension-SDL006345582-1-6f247.jpeg', '', '', '', '', 189, 199, 0.00, 50, 'Home & Kitchen1.3', 'plastic-tap-extension-assorted-colours-set-of-1-plastic-abs-kitchen-sink-tap-sink-cock', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Built-in layered filter can separate coconut activated carbon, zeolite, PVA non-woven?fabrics, calcium sulfite and rubber, which applys to purify hard water and well water. A must item for home &amp; office use,100% new and high quality.High temperature resistance, not easy to deform.To clean, simply remove the strainer and rinse it off under the water.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Built-in layered filter can separate coconut activated carbon, zeolite, PVA non-woven?fabrics, calcium sulfite and rubber, which applys to purify hard water and well water. A must item for home &amp; office use,100% new and high quality.High temperature resistance, not easy to deform.To clean, simply remove the strainer and rinse it off under the water.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Perfect For normal kitchen sink Taps, Moderately Flexible which makes it easy to rotate and hold its place while using</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Tap Extender Sprayer, Makes the normal water flow into sprayer form like a shower which helps in cleaning greater area at the same time and in same amount of water</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Perfect For normal kitchen sink Taps, Moderately Flexible which makes it easy to rotate and hold its place while using\\r\\nTap Extender Sprayer, Makes the normal water flow into sprayer form like a shower which helps in cleaning greater area at the same time and in same amount of water\\r\\nComes with a Tightening Metal Clamp use the clamp right not too tight not too loose so as to prevent leakage and damaging&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Comes with a Tightening Metal Clamp use the clamp right not too tight not too loose so as to prevent leakage and damaging</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly : </b>India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b> Taps extension</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 15:58:05'),
(118, 2, 'Plastic Corners & Edges Dust Multipurpose Use Cleaning Brush for Window Frame, Keyboard set of 2', 'Enham', 'Devani-trading-Plastic-Regular-Brush-SDL112545609-1-0a395.jpg', 'Devani-trading-Plastic-Regular-Brush-SDL112545609-7-6fb3b.jpg', 'Devani-trading-Plastic-Regular-Brush-SDL112545609-3-83587.jpg', 'Devani-trading-Plastic-Regular-Brush-SDL112545609-4-da577.jpg', '', 189, 199, 0.00, 50, 'Home & Kitchen1.4', 'plastic-corners--edges-dust-multipurpose-use-cleaning-brush-for-window-frame-keyboard-set-of-2', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;This brush is the perfect size for cleaning crevices, corners and skirting boards. The bristles fit into small crevices and remove dirt. If you are looking for something to remove dirt from hard to reach places, we recommend this product. No more using a toothbrush and then folding paper towels in half to try to squeeze in those places to get the dirt out, even with this nifty toy!. Multi-functional: cleaning the keyboard, dashboard, equipment in the car, etc. Artificial bristles are enough to reach the nooks and crannies. Portable and lightweight, convenient to carry. It also has a hanging hole.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">This brush is the perfect size for cleaning crevices, corners and skirting boards. The bristles fit into small crevices and remove dirt. If you are looking for something to remove dirt from hard to reach places, we recommend this product. No more using a toothbrush and then folding paper towels in half to try to squeeze in those places to get the dirt out, even with this nifty toy!. Multi-functional: cleaning the keyboard, dashboard, equipment in the car, etc. Artificial bristles are enough to reach the nooks and crannies. Portable and lightweight, convenient to carry. It also has a hanging hole.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">2-in-1 Design: Brush and dust pan cleaning set, removable. Storage is easy and convenient</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Easy Multipurpose: Small brush head design not only cleans the window and door truck but also helps not making the cake clean on the keyboard. Clear Gap Good Helper</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Remove dirt with window tracks with confidence, The window track cleaning brush is a great tool for sweeping the glass door track quickly and use easily to sweeping dust from the window</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;2-in-1 Design: Brush and dust pan cleaning set, removable. Storage is easy and convenient\\r\\nEasy Multipurpose: Small brush head design not only cleans the window and door truck but also helps not making the cake clean on the keyboard. Clear Gap Good Helper\\r\\nRemove dirt with window tracks with confidence, The window track cleaning brush is a great tool for sweeping the glass door track quickly and use easily to sweeping dust from the window\\r\\nEasy foldable two in one design: a brush with a small dustpan&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Easy foldable two in one design: a brush with a small dustpan</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b> Brushes</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 16:06:28'),
(119, 2, 'Silicone Star Shaped Sink Filter Bathroom Hair Catcher Drain Strainers for Basin PACK OF 4', 'Enham', 'LDL-Silicone-Star-Shaped-Sink-SDL795416455-1-3f33f.jpg', 'LDL-Silicone-Star-Shaped-Sink-SDL795416455-3-9f7e2.jpg', '', '', '', 189, 199, 0.00, 50, 'Home & Kitchen1.5', 'silicone-star-shaped-sink-filter-bathroom-hair-catcher-drain-strainers-for-basin-pack-of-4', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Silicone Drain Filter Molded starfish hair catcher with 5 suction cups that hold the catcher in place on the bottom of the bath Easy to use, simply place the catcher on the bath/shower drain and push the suction cups for a secure hold, easy to catch hair but not obstruct water drainage.M Made of rubber, stainless. Perfect for kitchen, bathroom and laundry use, suitable for most sinks, drains, sinks and sinks.g Protects against mold and mildew. Prevent objects from falling down the drain Features What This Starfish Drain Catcher is a versatile hair catcher and drain cover that adds fun while keeping your drain free of clogs.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Silicone Drain Filter Molded starfish hair catcher with 5 suction cups that hold the catcher in place on the bottom of the bath Easy to use, simply place the catcher on the bath/shower drain and push the suction cups for a secure hold, easy to catch hair but not obstruct water drainage.M Made of rubber, stainless. Perfect for kitchen, bathroom and laundry use, suitable for most sinks, drains, sinks and sinks.g Protects against mold and mildew. Prevent objects from falling down the drain Features What This Starfish Drain Catcher is a versatile hair catcher and drain cover that adds fun while keeping your drain free of clogs.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Made of a flexible and water-resistant TPR material, won\'t rust.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Perfect use in the kitchen, bathroom and laundry, fit most basins, drains, sinks, and slop sinks. Travel size easy to pack essential for on the go washing easy to clean, highest quality materials, guards against mold and mildew.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Easy to use, simply put the catcher on the tub/shower drain and press down on the suction cups for a secure hold,easy to catch hair but not prevent the water from draining.</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Made of a flexible and water-resistant TPR material, won\'t rust.\\r\\nPerfect use in the kitchen, bathroom and laundry, fit most basins, drains, sinks, and slop sinks. Travel size easy to pack essential for on the go washing easy to clean, highest quality materials, guards against mold and mildew.\\r\\nEasy to use, simply put the catcher on the tub/shower drain and press down on the suction cups for a secure hold,easy to catch hair but not prevent the water from draining.\\r\\nWidely Used : Perfect use in the kitchen, bathroom and laundry, fit most basins, drains, sinks, and slop sinks.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Widely Used : Perfect use in the kitchen, bathroom and laundry, fit most basins, drains, sinks, and slop sinks.</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Sink Tools</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 16:15:19'),
(120, 2, 'Stainless Steel Sink Strainer/Jali (Size-3) Silver 4inch Steel Angle Cock', 'Enham', 'Shree-Krishna-Stainless-Steel-Sink-SDL784021845-3-c2c83.jpeg', 'Shree-Krishna-Stainless-Steel-Sink-SDL784021845-4-a9d56.jpeg', 'Shree-Krishna-Stainless-Steel-Sink-SDL784021845-2-a2586.jpeg', '', '', 189, 199, 0.00, 50, 'Home & Kitchen1.6', 'stainless-steel-sink-strainerjali-size-3-silver-4inch-steel-angle-cock', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Our kitchen sink strainer fits to most of today\'s modern time sinks. The upgrade handle of our strainer makes dumping out food residue so much easier, no longer have to worry about strainer stuck in the sink. No sharp edges on the drain strainer, so it would not scratch or damage your sink and hands. This drain strainer is easy to cleana and anti-clogging. Averagely distributed perforations on entire basket ensure water go through seamlessly while efficiently catching all the garbage so that it does not clog the sink system. Simply dump the chunks then give them a quick rinse and wipe under running water to get them completely clean and shiny.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Our kitchen sink strainer fits to most of today\'s modern time sinks. The upgrade handle of our strainer makes dumping out food residue so much easier, no longer have to worry about strainer stuck in the sink. No sharp edges on the drain strainer, so it would not scratch or damage your sink and hands. This drain strainer is easy to cleana and anti-clogging. Averagely distributed perforations on entire basket ensure water go through seamlessly while efficiently catching all the garbage so that it does not clog the sink system. Simply dump the chunks then give them a quick rinse and wipe under running water to get them completely clean and shiny.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Made of premium stainless steel, non-deforming &amp; rust-free. Suited to daily utilitarian use for long-lasting protection against clogging</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Made of premium stainless steel, non-deforming &amp; rust-free. Suited to daily utilitarian use for long-lasting protection against clogging.\\n\\nPerfect for long-lasting protection against clogging. Stops large food particles from going down the drain while still allowing the free flow of water, no more clogged sink/sewer - all small particles are stopped in the filter&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Perfect for long-lasting protection against clogging. Stops large food particles from going down the drain while still allowing the free flow of water, no more clogged sink/sewer - all small particles are stopped in the filter</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b> Sink Tools</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 16:23:35'),
(121, 2, 'Hair Styling Twist Bun Pack of 1', 'Enham', 'mahek-accessories-Hair-Styling-Twist-SDL082695571-1-3e5c2.jpg', 'mahek-accessories-Hair-Styling-Twist-SDL082695571-2-d989a.jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.1', 'hair-styling-twist-bun-pack-of-1', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Multi-layer hollow twist hair clip made of ABS resin material, will not damage the hair. The magic hair clip itself comes with 8 gadgets for braiding hair, you can weave your favorite braids anytime, anywhere for ladies, girls and men with long hair.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Multi-layer hollow twist hair clip made of ABS resin material, will not damage the hair. The magic hair clip itself comes with 8 gadgets for braiding hair, you can weave your favorite braids anytime, anywhere for ladies, girls and men with long hair.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Multi-layer hollow twist hair clip made of ABS resin material, will not damage the hair</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">The magic hair clip itself comes with 8 gadgets for braiding hair, you can weave your favorite braids anytime, anywhere for ladies, girls and men with long hair</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Multi-layer hollow twist hair clip made of ABS resin material, will not damage the hair\\r\\nThe magic hair clip itself comes with 8 gadgets for braiding hair, you can weave your favorite braids anytime, anywhere for ladies, girls and men with long hair\\nMagic twist hairpin rod, suitable for indoor and outdoor sports, face washing, yoga, travel and daily wear&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Magic twist hairpin rod, suitable for indoor and outdoor sports, face washing, yoga, travel and daily wear</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b> Hair Curlers</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 16:32:55'),
(122, 2, 'High elastic band for ponytail Styler Pack of 30', 'Enham', 'mahek-accessories-Hair-Styling-Twist-SDL082695571-2-d989a (1).jpg', 'mahek-accessories-high-elastic-band-SDL026783619-2-8336f.jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.2', 'high-elastic-band-for-ponytail-styler-pack-of-30', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Soft Black Stretchable Soft Elastic Hair Rubber Bands Ponytail Holder For Thick Hair Girls And Women\'s. Size: 1.9cm wide, 28-30 stretching length, 5-6cm outside diameter Pack Of 30 for Day To Day Use.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Soft Black Stretchable Soft Elastic Hair Rubber Bands Ponytail Holder For Thick Hair Girls And Women\'s. Size: 1.9cm wide, 28-30 stretching length, 5-6cm outside diameter Pack Of 30 for Day To Day Use.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Soft Black Stretchable Soft Elastic Hair Rubber Bands Ponytail Holder For Thick Hair Girls And Women\'s</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Soft Black Stretchable Soft Elastic Hair Rubber Bands Ponytail Holder For Thick Hair Girls And Women\'s\\n\\nPack Of 30 for Day To Day Use&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Pack Of 30 for Day To Day Use</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :&nbsp;</b></span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Rubber Bands &amp; Grips</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:17:46'),
(123, 2, 'Hair rubber band for pony tail | Styler | Pack of 30 | Multicoloured', 'Enham', 'mahek-accessories-high-elastic-band-SDL026783619-2-8336f (1).jpg', '', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.3', 'hair-rubber-band-for-pony-tail--styler--pack-of-30--multicoloured', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Colorful sweet candy colors, bright color and never fade. pulling continued, soft and not hurt the hair. Suits for the little girl, lady for setting the different hair style Quality materials, even for a long time can also maintain a high elasticity&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Colorful sweet candy colors, bright color and never fade. pulling continued, soft and not hurt the hair. Suits for the little girl, lady for setting the different hair style Quality materials, even for a long time can also maintain a high elasticity</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Rubber band Made of 100% Natural Rubber</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Rubber band Made of 100% Natural Rubber\\r\\nSoft and not hurt the hair.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Soft and not hurt the hair.</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b>&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Rubber Bands &amp; Grips</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:26:42'),
(124, 2, 'Designer Hair Bun Maker Combo Styler Pack of 10', 'Enham', 'mahek-accessories-Designer-Hair-Bun-SDL334815279-1-870be.jpg', 'mahek-accessories-Designer-Hair-Bun-SDL334815279-2-530e6.jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.4', 'designer-hair-bun-maker-combo-styler-pack-of-10', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Seconds for a new hairstyle, essential tool for French Twist and buns. Use it like this: if your hair consists of different layers of lengths, we recommend securing the ponytail with a rubber band, otherwise ignore this step. Pull the hair through the existing gap of the curling iron and press intervals for additional grip. Lift both ends of the curler up to the end of the hair. Hold both ends of the curler and roll down on your own. Adjust as needed for proper tightness and bend both ends into a circular shape. Gently flip your hair back to cover the exposed curl. When the curler is finally hidden. A beautiful bun easily completed in seconds.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Seconds for a new hairstyle, essential tool for French Twist and buns. Use it like this: if your hair consists of different layers of lengths, we recommend securing the ponytail with a rubber band, otherwise ignore this step. Pull the hair through the existing gap of the curling iron and press intervals for additional grip. Lift both ends of the curler up to the end of the hair. Hold both ends of the curler and roll down on your own. Adjust as needed for proper tightness and bend both ends into a circular shape. Gently flip your hair back to cover the exposed curl. When the curler is finally hidden. A beautiful bun easily completed in seconds.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Hair Styling Tool Make new hair styles in seconds Easy and convenient to carry and use Simple and elegant hair style, not only embellishes the shape of head and face,but also achieves graceful and sweet temperament</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">For Party and Proms</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Hair Styling Tool Make new hair styles in seconds Easy and convenient to carry and use Simple and elegant hair style, not only embellishes the shape of head and face,but also achieves graceful and sweet temperament\\r\\nFor Party and Proms\\r\\nHair Volumizing Accessories.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Hair Volumizing Accessories.</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly : </b>India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b>&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat; font-size: 10pt;\">Juda Maker Tools</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:34:14'),
(125, 2, 'Hair roller curler bendy Styler Pack of 10', '', 'mahek-accessories-Designer-Hair-Bun-SDL334815279-2-530e6 (1).jpg', '', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.5', 'hair-roller-curler-bendy-styler-pack-of-10', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;These flexi rods are soft and lightweight foam rollers designed to smoothly grip you hair without pulling on it and causing no damage to your hair. These are travel-friendly and can be carried in handbags, side slings, travel pouches, tote bags, and beauty kits, among other places. It\'s built of high-quality materials, so it\'ll last a long time. They are portable and may be taken anywhere without fear of breaking or spoiling.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">These flexi rods are soft and lightweight foam rollers designed to smoothly grip you hair without pulling on it and causing no damage to your hair. These are travel-friendly and can be carried in handbags, side slings, travel pouches, tote bags, and beauty kits, among other places. It\'s built of high-quality materials, so it\'ll last a long time. They are portable and may be taken anywhere without fear of breaking or spoiling.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">These heatless hair curlers are safe to wear during sleep, and will help you achieve the curls that you desire with no heat damage to your hair.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">It is easy to use as you can effortlessly create pretty curls at home with wet or dry hair. You can sleep or go about your daily tasks while wearing them. Wet hair &amp; blow dryer yields instant curls.</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;These heatless hair curlers are safe to wear during sleep, and will help you achieve the curls that you desire with no heat damage to your hair.\\r\\nIt is easy to use as you can effortlessly create pretty curls at home with wet or dry hair. You can sleep or go about your daily tasks while wearing them. Wet hair &amp; blow dryer yields instant curls.\\r\\nGreat alternative to Velcro, these are perfect for curling short, medium, and long hair.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Great alternative to Velcro, these are perfect for curling short, medium, and long hair.</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b> Hair Curlers</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:38:57');
INSERT INTO `product` (`id`, `admin_id`, `name`, `brand_name`, `image`, `image_one`, `image_two`, `image_three`, `image_four`, `price`, `regular_price`, `shipping`, `quantity`, `sku`, `url`, `title`, `meta_description`, `status`, `long_desc`, `short_decs`, `general_info`, `sale_tag`, `item_weight`, `item_length`, `item_height`, `item_breadth`, `updated_on`, `added_on`) VALUES
(126, 2, 'Professional Combs Styler Pack of 10', 'Enham', 'mahek-accessories-Designer-Hair-Bun-SDL334815279-2-530e6 (1).jpg', '', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.6', 'professional-combs-styler-pack-of-10', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;These combs can be used after the shower, bath or on dry hair. In fact, they\'re great for head hair and even brushing out your beard.\\r\\nLightweight and discrete, this unisex hair comb set from durable plastic can be put in the car, a briefcase, your desk at work, or even your bathroom.\\r\\nEach of our combs is designed with straight, durable teeth of different sizes and densities to avoid pulling, tangling or damaging hair. The combs are anti-static and have specially designed rounded tips that don\'t hurt your scalp. These combs are available in fun, vibrant colors and are made with a high-grade polymer material.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">These combs can be used after the shower, bath or on dry hair. In fact, they\'re great for head hair and even brushing out your beard.<br>Lightweight and discrete, this unisex hair comb set from durable plastic can be put in the car, a briefcase, your desk at work, or even your bathroom.<br>Each of our combs is designed with straight, durable teeth of different sizes and densities to avoid pulling, tangling or damaging hair. The combs are anti-static and have specially designed rounded tips that don\'t hurt your scalp. These combs are available in fun, vibrant colors and are made with a high-grade polymer material.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Durable, anti-static hair cutting comb. Light weight and easy to carry.</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Styling comb is suitable for all ages and all genders(the young and the old,Adults and Kids,Men and Women,Girls and Boys).</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Easily &amp; painlessly detangle all types of hair; fine, thick or curly, without tearing or breaking.</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Durable, anti-static hair cutting comb. Light weight and easy to carry.\\r\\nStyling comb is suitable for all ages and all genders(the young and the old,Adults and Kids,Men and Women,Girls and Boys).\\r\\nEasily &amp; painlessly detangle all types of hair; fine, thick or curly, without tearing or breaking.\\r\\nProfessional salon quality - Won\'t scratch your scalp or get caught in knots - Great for adding volume to straight or wavy hair. âœ”Durable, anti-static hair cutting comb. Light weight and easy to carry.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Professional salon quality - Won\'t scratch your scalp or get caught in knots - Great for adding volume to straight or wavy hair. âœ”Durable, anti-static hair cutting comb. Light weight and easy to carry.</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Hair combs</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:43:35'),
(127, 2, 'Hair Stylers for Women | Combo of 11', 'Enham', 'mahek-accessories-Designer-Hair-Bun-SDL334815279-2-530e6 (1).jpg', '', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.7', 'hair-stylers-for-women--combo-of-11', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Hair accessories for professional salons and salons This item is a set of hair styling accessories, make your own hairstyles. It is an essential tool kit for women. Create your own hairstyle with this hair styling kit. Help create your own hairstyles. Enjoy your new hairstyle with this hair styling kit. Hair styling tool Make new hairstyles in seconds, easy and comfortable to wear and use a simple and elegant hairstyle, not only decorates the head shape and is suitable for parties or banquets, it brings you a new hairstyle in seconds. Help create your own hairstyles. A handy styling tool that helps you easily braid braids and create all kinds of vintage hairstyles. The face, but also achieves a graceful and sweet temperament. Easy and convenient to carry and use. Elegant according to your wishes. Feel confident and beautiful in seconds.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Hair accessories for professional salons and salons This item is a set of hair styling accessories, make your own hairstyles. It is an essential tool kit for women. Create your own hairstyle with this hair styling kit. Help create your own hairstyles. Enjoy your new hairstyle with this hair styling kit. Hair styling tool Make new hairstyles in seconds, easy and comfortable to wear and use a simple and elegant hairstyle, not only decorates the head shape and is suitable for parties or banquets, it brings you a new hairstyle in seconds. Help create your own hairstyles. A handy styling tool that helps you easily braid braids and create all kinds of vintage hairstyles. The face, but also achieves a graceful and sweet temperament. Easy and convenient to carry and use. Elegant according to your wishes. Feel confident and beautiful in seconds.</span><br></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Use These Combos To Make Hair Styles In A Perfect Way Like Salon</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Help To Make Your DIY Hair Styles</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Use These Combos To Make Hair Styles In A Perfect Way Like Salon \\nHelp To Make Your DIY Hair Styles\\r\\nIt Is a Necessary Tool Set for Women&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">It Is a Necessary Tool Set for Women</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Juda Maker Tools</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address:</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:50:43'),
(128, 2, 'Hair donut braid maker puff Styler Pack of 10', 'Enham', 'mahek-accessories-Designer-Hair-Bun-SDL334815279-2-530e6 (1).jpg', '', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.8', 'hair-donut-braid-maker-puff-styler-pack-of-10', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;All you need to do is roll, snap and wrap!! It\'s that easy!! DONUT BUN is Lightweight, Comfortable you can even sleep in it creating beautiful, Bouncy Curls and Waves.Set is available in Black, Brown, and Blonde. Choose set according to closest hair color match.\\r\\n\\r\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">All you need to do is roll, snap and wrap!! It\'s that easy!! DONUT BUN is Lightweight, Comfortable you can even sleep in it creating beautiful, Bouncy Curls and Waves.Set is available in Black, Brown, and Blonde. Choose set according to closest hair color match.<br><br></span></p>', '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Hair accessories combo</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Easy to use hair accessories</span><br></li><li><span style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 11pt;\">Get Salon-Styled Hair And Boost Volume With These Hair Volumizing Accessories.</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Hair accessories combo\\nEasy to use hair accessories\\nGet Salon-Styled Hair And Boost Volume With These Hair Volumizing Accessories.\\nHair Styling Tool Make New Hair Styles In Seconds Good For Going Party Or Banquet Brings You A New Hair Style In Seconds Perfect For All Hair Types, Straight, Curly, Thick Or Fine&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:15235,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;11&quot;:3,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:3355443},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(51, 51, 51);\">Hair Styling Tool Make New Hair Styles In Seconds Good For Going Party Or Banquet Brings You A New Hair Style In Seconds Perfect For All Hair Types, Straight, Curly, Thick Or Fine</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Juda Maker Tools</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 17:55:01'),
(129, 2, 'Multicolour Plastic Clip/Clutcher for Women, Set of 12 Pieces', 'Enham', '61FgJT+2U7L._SX679_.jpg', '41bB2SUCAML.jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.9', 'multicolour-plastic-clipclutcher-for-women-set-of-12-pieces', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;These hair clips function as good hair styling tools and accessories, and they are good for holding your hairstyle well and will not hurt your hair. These are daily use Tic Tac Hair Clips. Easy to clip in hair due to its claw action. Hair Claws are better than Hair pins as they are easy to handle and to clip.\\r\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">These hair clips function as good hair styling tools and accessories, and they are good for holding your hairstyle well and will not hurt your hair. These are daily use Tic Tac Hair Clips. Easy to clip in hair due to its claw action. Hair Claws are better than Hair pins as they are easy to handle and to clip.<br></span></p>', '<ul><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">Small hair clutcher /half hair claw for daily use in different colors in low range</span><br></li><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">Simple, beautiful, elegant and looks nice on your hair</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Small hair clutcher /half hair claw for daily use in different colors in low range\\r\\nSimple, beautiful, elegant and looks nice on your hair\\r\\nInterlocking teeth holds hair in place&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Interlocking teeth holds hair in place</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly : </b>India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Hair Clutchers</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 18:06:42'),
(130, 2, 'Girl\'s and Women\'s Elastic Foam Rubber Bands for Hair Pack of 30', 'Enham', '91Hfd+pdadL._UL1500_.jpg', '818llFlAQ0L._UL1500_.jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.10', 'girls-and-womens-elastic-foam-rubber-bands-for-hair-pack-of-30', '', '', 0, '<p><span data-sheets-value=\"{\"1\":2,\"2\":\"Our hair clips provide enough comfort for everyday, all-day use. Made without metal, it reduces the risk of hair damage and helps prevent tangling. Great for ponytails!\"}\" data-sheets-userformat=\"{\"2\":14979,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":987409},\"15\":\"Arial\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Our hair clips provide enough comfort for everyday, all-day use. Made without metal, it reduces the risk of hair damage and helps prevent tangling. Great for ponytails!</span><br></p>', '<ul><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">The hair bands are with good elasticity ,they can be stretched from 1.6inch till 7inch. The high elastic material is thick and durable which can keep the hair firmly and not easy to loosen up, they can hold your ponytail all day long.</span><br></li><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">Made of premium elastic fabric band, flexible, stretchy and durable. The hand bands are not easy to be broken and out of shape. Our hair ties are not easy to stretch out, you can use them for a long time.</span><br></li><li><span data-sheets-value=\"{\"1\":2,\"2\":\"The hair bands are with good elasticity ,they can be stretched from 1.6inch till 7inch. The high elastic material is thick and durable which can keep the hair firmly and not easy to loosen up, they can hold your ponytail all day long.\\r\\nMade of premium elastic fabric band, flexible, stretchy and durable. The hand bands are not easy to be broken and out of shape. Our hair ties are not easy to stretch out, you can use them for a long time.\\nWith soft and seamless design, the hair ties are easy to pull from head without any damage to the hair. They are also suitable for heavy thick or curly hair.\\n\"}\" data-sheets-userformat=\"{\"2\":14979,\"3\":{\"1\":0},\"4\":{\"1\":2,\"2\":16777215},\"10\":1,\"12\":0,\"14\":{\"1\":2,\"2\":987409},\"15\":\"Arial\",\"16\":11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">With soft and seamless design, the hair ties are easy to pull from head without any damage to the hair. They are also suitable for heavy thick or curly hair.<br></span></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly : </b>India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity : </b>Rubber Bands & Grips</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name & Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name & Address :</b> Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name & Address :</b> Naman Eretail Unnao UP</span></p>', 'featured', 0.20, 18.00, 12.00, 2.00, '2022-09-03 18:12:42', '2022-09-03 18:11:49'),
(131, 2, 'Hair Accessories1.11	Women\'s Neon Daily Use Plane Plastic Hair Bands - Set of 12, Multicolour', '', '71LTatlNnHL._UL1500_.jpg', '91JfZI0C5WL._UL1500_.jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.11', 'hair-accessories111womens-neon-daily-use-plane-plastic-hair-bands---set-of-12-multicolour', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Great accessory and hair decoration for girls, women perfect size and with so many beautiful colours has one to match every outfit you will ever wear. Fit for Straight, Curl and Wavy Hair.Special Design and Unique Structure. a Beautiful and Amazing Hair Band Style Your Hair Comfortable Just in Seconds Easy to Use,light Weight\\r\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Great accessory and hair decoration for girls, women perfect size and with so many beautiful colours has one to match every outfit you will ever wear. Fit for Straight, Curl and Wavy Hair.Special Design and Unique Structure. a Beautiful and Amazing Hair Band Style Your Hair Comfortable Just in Seconds Easy to Use,light Weight<br></span></p>', '<ul><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">Plastic with fluorescent Shine Finish</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Plastic with fluorescent Shine Finish \\nThese plastic hairbands can wear with loose hair or in a pony for casual or elegant occasions.\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">These plastic hairbands can wear with loose hair or in a pony for casual or elegant occasions.<br></span></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly : </b>India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b>Hair Bands</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 18:19:33'),
(132, 2, 'Women\'s Plastic Rainbow Colors Head Band (Multicolour, Small) - Combo Pack of 12', '', '719-UoDE8PL._UL1500_.jpg', '91JfZI0C5WL._UL1500_ (1).jpg', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.12', 'womens-plastic-rainbow-colors-head-band-multicolour-small---combo-pack-of-12', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Plastic hairbands with solid grip, but painless and ouchless feel. For girls and women for trendy look.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Plastic hairbands with solid grip, but painless and ouchless feel. For girls and women for trendy look.</span><br></p>', '<ul><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">Plastic hairbands with solid grip, but painless and ouchless feel</span><br></li><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">For girls and women for trendy look</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Plastic hairbands with solid grip, but painless and ouchless feel\\r\\nFor girls and women for trendy look\\r\\nPlastic hairband printed soft touch for girls&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Plastic hairband printed soft touch for girls</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly : </b>India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b>Hair Bands</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address : </b>Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 18:23:58'),
(133, 2, 'Rubber Pony Tail Holder/Stretching/Hair Foam Ties Bands (Black Red and White) -Set of 30 Pieces', 'Enham', '61PTaRSIO9L._SL1500_.jpg', '', '', '', '', 189, 209, 0.00, 50, 'Hair Accessories1.13', 'rubber-pony-tail-holderstretchinghair-foam-ties-bands-black-red-and-white--set-of-30-pieces', '', '', 0, '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ponytail Holders Hair Elastic Rubber Bands. There is no metal ties that will tangle, snag or pull your hair.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">Ponytail Holders Hair Elastic Rubber Bands. There is no metal ties that will tangle, snag or pull your hair.</span><br></p>', '<ul><li><span style=\"color: rgb(15, 17, 17); font-family: Arial; font-size: 11pt;\">Ponytail Holders Hair Elastic Rubber Bands Colour: BLACK/WHITE/RED Pack of 30 Pieces</span><br></li><li><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ponytail Holders Hair Elastic Rubber Bands Colour: BLACK/WHITE/RED Pack of 30 Pieces\\nNo metal ties that will tangle, snag or pull your hair&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:14979,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;10&quot;:1,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:987409},&quot;15&quot;:&quot;Arial&quot;,&quot;16&quot;:11}\" style=\"font-size: 11pt; font-family: Arial; color: rgb(15, 17, 17);\">No metal ties that will tangle, snag or pull your hair</span><br></li></ul>', '<p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Country of origin or Manufacture or Assembly :</b> India</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Common or Generic Name of the Commodity :</b>Rubber Bands &amp; Grips</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Manufacturer Name &amp; Address: </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Packet name &amp; Address : </b>Naman Eretail Unnao UP</span></p><p class=\"selectable-text copyable-text\"><span class=\"selectable-text copyable-text\"><b>Marketer Name &amp; Address :</b> Naman Eretail Unnao UP</span></p>', '', 0.20, 18.00, 2.00, 12.00, '0000-00-00 00:00:00', '2022-09-03 18:28:54'),
(134, 1, 'Car wash gloves multipurpose wet & dry cleaning pack of 1', '', 'WhatsApp Image 2022-09-07 at 3.06.02 PM.jpeg', 'WhatsApp Image 2022-09-07 at 3.06.02 PM (2).jpeg', 'WhatsApp Image 2022-09-07 at 3.06.02 PM (1).jpeg', '', '', 179, 199, 0.00, 1000, 'Plaingloves', 'car-wash-gloves-multipurpose-wet--dry-cleaning-pack-of-1', '', '', 0, '', '', '', 'trending', 0.10, 18.00, 2.00, 12.00, '2022-09-07 15:14:41', '2022-09-07 15:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribites`
--

CREATE TABLE `product_attribites` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attr_name` varchar(255) NOT NULL,
  `attr_values` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attribites`
--

INSERT INTO `product_attribites` (`id`, `product_id`, `attr_name`, `attr_values`) VALUES
(7, 126, 'Size', '[1,2,3,4]'),
(8, 126, 'color', '[\"2gb\",\"red\"]');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `secondsubcategory_id` int(11) DEFAULT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`, `subcategory_id`, `secondsubcategory_id`, `sequence`) VALUES
(69, 39, 35, 7, 0, 0),
(70, 40, 29, 0, 0, 0),
(71, 43, 192, 9, 4, 0),
(72, 44, 195, 12, 6, 0),
(73, 45, 195, 12, 0, 0),
(74, 46, 195, 12, 0, 0),
(75, 47, 195, 12, 0, 0),
(76, 48, 195, 12, 0, 0),
(77, 49, 195, 12, 0, 0),
(78, 50, 195, 12, 0, 0),
(79, 51, 195, 12, 0, 0),
(80, 52, 195, 12, 0, 0),
(81, 53, 195, 12, 0, 0),
(82, 54, 197, 13, 7, 0),
(83, 55, 197, 13, 7, 0),
(84, 56, 194, 0, 0, 0),
(85, 57, 195, 0, 0, 0),
(86, 58, 195, 12, 0, 0),
(87, 59, 199, 0, 0, 0),
(88, 60, 196, 0, 0, 0),
(89, 61, 199, 0, 0, 0),
(90, 62, 194, 5, 0, 0),
(91, 63, 194, 5, 0, 0),
(92, 64, 194, 0, 0, 0),
(93, 65, 194, 5, 0, 0),
(94, 66, 194, 5, 0, 0),
(95, 67, 194, 5, 0, 0),
(96, 68, 194, 5, 0, 0),
(97, 69, 194, 5, 0, 0),
(98, 70, 194, 0, 0, 0),
(99, 75, 195, 14, 0, 0),
(100, 77, 195, 12, 0, 0),
(101, 79, 203, 19, 9, 0),
(102, 80, 195, 12, 6, 0),
(103, 81, 205, 21, 10, 0),
(104, 82, 206, 23, 11, 0),
(105, 83, 207, 24, 12, 0),
(106, 84, 208, 25, 13, 0),
(107, 85, 208, 25, 13, 0),
(108, 86, 208, 25, 13, 0),
(109, 87, 209, 26, 14, 0),
(110, 88, 209, 26, 15, 0),
(111, 89, 209, 26, 14, 0),
(112, 90, 209, 26, 14, 0),
(113, 91, 207, 27, 16, 0),
(114, 92, 207, 27, 16, 0),
(115, 93, 207, 27, 17, 0),
(116, 94, 207, 29, 18, 0),
(117, 95, 207, 29, 18, 0),
(118, 96, 207, 27, 17, 0),
(119, 97, 207, 27, 17, 0),
(120, 98, 207, 29, 19, 0),
(121, 99, 207, 27, 20, 0),
(122, 100, 207, 27, 20, 0),
(123, 101, 207, 29, 19, 0),
(124, 102, 207, 27, 20, 0),
(125, 103, 207, 29, 19, 0),
(126, 104, 207, 27, 20, 0),
(127, 105, 207, 31, 21, 0),
(128, 106, 207, 24, 12, 0),
(129, 107, 207, 31, 21, 0),
(130, 108, 208, 25, 13, 0),
(131, 109, 207, 24, 12, 0),
(132, 110, 207, 24, 12, 0),
(133, 111, 207, 27, 22, 0),
(134, 112, 207, 27, 22, 0),
(135, 113, 211, 32, 23, 0),
(136, 114, 212, 33, 24, 0),
(137, 115, 213, 34, 25, 0),
(138, 116, 213, 35, 26, 0),
(139, 117, 213, 36, 27, 0),
(140, 118, 213, 34, 28, 0),
(141, 119, 213, 35, 29, 0),
(142, 120, 213, 35, 29, 0),
(143, 121, 209, 37, 30, 0),
(144, 122, 209, 37, 31, 0),
(145, 123, 209, 37, 31, 0),
(146, 124, 209, 37, 32, 0),
(147, 125, 209, 37, 30, 0),
(148, 126, 209, 37, 33, 0),
(149, 127, 209, 37, 32, 0),
(150, 128, 209, 37, 32, 0),
(151, 129, 209, 37, 30, 0),
(152, 130, 209, 37, 31, 0),
(153, 131, 209, 37, 35, 0),
(154, 132, 209, 37, 35, 0),
(155, 133, 209, 37, 31, 0),
(156, 134, 207, 27, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_filters`
--

CREATE TABLE `product_filters` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filter_name` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_filters`
--

INSERT INTO `product_filters` (`id`, `product_id`, `category_id`, `filter_name`, `options`) VALUES
(9, 102, 38, 'Size', 'S'),
(10, 102, 38, 'Size', 'M'),
(11, 102, 38, 'Size', 'XL'),
(12, 102, 38, 'Size', '4'),
(13, 102, 38, 'Size', '4'),
(14, 102, 38, 'Fabric', 'Polyester'),
(15, 102, 38, 'Fabric', 'georget'),
(16, 102, 38, 'Color', 'Red'),
(17, 102, 38, 'Color', 'Black'),
(18, 102, 38, 'Color', 'Yellow'),
(19, 102, 38, 'Color', 'Green'),
(20, 103, 38, 'Size', '38'),
(21, 103, 38, 'Size', '40'),
(22, 103, 38, 'Fabric', 'Cottonblend'),
(23, 103, 38, 'Color', 'Blue'),
(24, 104, 37, 'Size', '1'),
(25, 104, 37, 'Size', '2'),
(26, 104, 37, 'Size', '3'),
(27, 104, 37, 'Size', '4'),
(28, 104, 37, 'Size', '4'),
(29, 104, 37, 'Color', 'red'),
(30, 104, 37, 'Color', 'blue'),
(31, 104, 37, 'Fabric', 'pollycotton'),
(32, 105, 37, 'Size', '1'),
(33, 105, 37, 'Size', '2'),
(34, 105, 37, 'Size', '3'),
(35, 105, 37, 'Size', '4'),
(36, 105, 37, 'Size', '4'),
(37, 105, 37, 'Color', 'red'),
(38, 105, 37, 'Color', 'black'),
(39, 105, 37, 'Fabric', 'pollycotton'),
(40, 110, 37, 'Size', '1'),
(41, 110, 37, 'Size', '2'),
(42, 110, 37, 'Size', '3'),
(43, 110, 37, 'Size', '4'),
(44, 110, 37, 'Size', '4'),
(45, 110, 37, 'Color', 'red'),
(46, 110, 37, 'Color', 'black'),
(47, 110, 37, 'Fabric', 'dfd'),
(48, 110, 37, 'Fabric', 'dffdfd'),
(49, 111, 37, 'Size', '1'),
(50, 111, 37, 'Size', '2'),
(51, 111, 37, 'Size', '3'),
(52, 111, 37, 'Size', '4'),
(53, 111, 37, 'Size', '4'),
(54, 111, 37, 'Color', 'red'),
(55, 111, 37, 'Color', 'black'),
(56, 111, 37, 'Fabric', 'dfd'),
(57, 111, 37, 'Fabric', 'dffdfd'),
(58, 115, 37, 'Size', '1'),
(59, 115, 37, 'Size', '2'),
(60, 115, 37, 'Size', '3'),
(61, 115, 37, 'Size', '4'),
(62, 115, 37, 'Size', '4'),
(63, 115, 37, 'Color', '1'),
(64, 115, 37, 'Color', '2'),
(65, 115, 37, 'Color', '3'),
(66, 115, 37, 'Color', '4'),
(67, 115, 37, 'Color', '4'),
(68, 115, 37, 'Fabric', '1'),
(69, 115, 37, 'Fabric', '2'),
(70, 115, 37, 'Fabric', '3'),
(71, 115, 37, 'Fabric', '4'),
(72, 115, 37, 'Fabric', '4'),
(73, 116, 37, 'Size', '1'),
(74, 116, 37, 'Size', '2'),
(75, 116, 37, 'Size', '3'),
(76, 116, 37, 'Size', '4'),
(77, 116, 37, 'Size', '4'),
(78, 116, 37, 'Color', '1'),
(79, 116, 37, 'Color', '2'),
(80, 116, 37, 'Color', '3'),
(81, 116, 37, 'Color', '4'),
(82, 116, 37, 'Color', '4'),
(83, 116, 37, 'Fabric', '1'),
(84, 116, 37, 'Fabric', '2'),
(85, 116, 37, 'Fabric', '3'),
(86, 116, 37, 'Fabric', '4'),
(87, 116, 37, 'Fabric', '4'),
(88, 117, 37, 'Size', '1'),
(89, 117, 37, 'Size', '2'),
(90, 117, 37, 'Size', '3'),
(91, 117, 37, 'Size', '4'),
(92, 117, 37, 'Size', '4'),
(93, 117, 37, 'Color', '1'),
(94, 117, 37, 'Color', '2'),
(95, 117, 37, 'Color', '3'),
(96, 117, 37, 'Color', '4'),
(97, 117, 37, 'Color', '4'),
(98, 117, 37, 'Fabric', '1'),
(99, 117, 37, 'Fabric', '2'),
(100, 117, 37, 'Fabric', '3'),
(101, 117, 37, 'Fabric', '4'),
(102, 117, 37, 'Fabric', '4'),
(103, 118, 37, 'Size', '1'),
(104, 118, 37, 'Size', '2'),
(105, 118, 37, 'Size', '3'),
(106, 118, 37, 'Size', '4'),
(107, 118, 37, 'Size', '4'),
(108, 118, 37, 'Color', '1'),
(109, 118, 37, 'Color', '2'),
(110, 118, 37, 'Color', '3'),
(111, 118, 37, 'Color', '4'),
(112, 118, 37, 'Color', '4'),
(113, 118, 37, 'Fabric', '1'),
(114, 118, 37, 'Fabric', '2'),
(115, 118, 37, 'Fabric', '3'),
(116, 118, 37, 'Fabric', '4'),
(117, 118, 37, 'Fabric', '4'),
(118, 126, 37, 'Size', '1'),
(119, 126, 37, 'Size', '2'),
(120, 126, 37, 'Size', '3'),
(121, 126, 37, 'Size', '4'),
(122, 126, 37, 'Size', '4'),
(123, 126, 37, 'Color', '1'),
(124, 126, 37, 'Color', '2'),
(125, 126, 37, 'Color', '3'),
(126, 126, 37, 'Color', '4'),
(127, 126, 37, 'Color', '4'),
(128, 126, 37, 'Fabric', '1'),
(129, 126, 37, 'Fabric', '2'),
(130, 126, 37, 'Fabric', '3'),
(131, 126, 37, 'Fabric', '4'),
(132, 126, 37, 'Fabric', '4');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shiprocket_token`
--

CREATE TABLE `shiprocket_token` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shiprocket_token`
--

INSERT INTO `shiprocket_token` (`id`, `token`, `created_at`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5NDM4NjMsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjc5NDI1NTg1LCJleHAiOjE2ODAyODk1ODUsIm5iZiI6MTY3OTQyNTU4NSwianRpIjoiSktncHRkRHhoTHFKMHlmcCJ9.2cjeyfoZKUej_76Isvkxy1J2A8XupjJa1zS-BG9WQHU', '2023-03-21'),
(2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5NDM5MTYsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjczNTk3NTM1LCJleHAiOjE2NzQ0NjE1MzUsIm5iZiI6MTY3MzU5NzUzNSwianRpIjoieHl1Z3d4dkRRamNHd0FsNSJ9.4-CoWfKyYmZ2gbKzwnSEkljPWhW7xPKOoXEFSEgnIFI', '2023-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subcat_image` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`, `url`, `description`, `subcat_image`, `status`, `created_on`) VALUES
(24, 'Interior Cleaning', 207, 'interior-cleaning', 'Interior Cleaning', '', 0, '2022-08-31 12:26:11'),
(25, 'Men\'s Jewellery', 208, 'mens-jewellery', 'Men\'s Jewellery', '', 0, '2022-08-31 13:59:38'),
(26, 'Brushes & Applicators', 209, 'brushes--applicators', 'Brushes & Applicators', '', 0, '2022-08-31 14:59:19'),
(27, 'Cloths, Sponges & Cleaning Aids', 207, 'cloths-sponges--cleaning-aids', 'Cloths, Sponges & Cleaning Aids', '', 0, '2022-08-31 15:53:45'),
(29, 'Glass Cleaner', 207, 'glass-cleaner', 'Glass Cleaner', '', 0, '2022-08-31 17:26:52'),
(31, 'Exterior Cleaning', 207, 'exterior-cleaning', 'Exterior Cleaning', '', 0, '2022-08-31 18:51:31'),
(32, 'Supports & Splints', 211, 'supports--splints', 'Supports & Splints', '', 0, '2022-09-03 14:05:05'),
(33, 'Bath & Showers', 212, 'bath--showers', 'Bath & Showers', '', 0, '2022-09-03 14:19:04'),
(34, 'Home Cleaning', 213, 'home-cleaning', 'Home Cleaning', '', 0, '2022-09-03 14:55:45'),
(35, 'Kitchen Tools ', 213, 'kitchen-tools-', 'Kitchen Tools ', '', 0, '2022-09-03 15:06:37'),
(36, 'Taps & Showers', 213, 'taps--showers', 'Taps & Showers', '', 0, '2022-09-03 15:38:09'),
(37, 'Hair Accessories', 209, 'hair-accessories', 'Hair Accessories', '', 0, '2022-09-03 16:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `supersubcategory`
--

CREATE TABLE `supersubcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `super_name` varchar(255) NOT NULL,
  `subcat_description` text DEFAULT NULL,
  `subcat_image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supersubcategory`
--

INSERT INTO `supersubcategory` (`id`, `category_id`, `subcategory_id`, `super_name`, `subcat_description`, `subcat_image`, `slug`, `status`) VALUES
(12, 207, 24, 'Cleaning Brush', '', '', 'cleaning-brush', 0),
(13, 208, 25, 'Chains for men', 'Chains for men', '', 'chains-for-men', 0),
(14, 209, 26, 'Makeup Brush sets', 'Makeup Brush sets', '', 'makeup-brush-sets', 0),
(15, 209, 26, 'Makeup Puff & Sponges', 'Makeup Puff & Sponges', '', 'makeup-puff--sponges', 0),
(16, 207, 27, 'Cloth & Wipes', 'Cloth & Wipes', '', 'cloth--wipes', 0),
(17, 207, 27, 'Dusters', 'Dusters', '', 'dusters', 0),
(18, 207, 29, 'Glass Cleaning Tablets', 'Glass Cleaning Tablets', '', 'glass-cleaning-tablets', 0),
(19, 207, 29, 'Wipers', 'Wipers', '', 'wipers', 0),
(20, 207, 27, 'Microfibre Gloves', 'Microfibre Gloves', '', 'microfibre-gloves', 0),
(21, 207, 31, 'Brush', 'Brush', '', 'brush', 0),
(22, 207, 27, 'Sponges', 'Sponges', '', 'sponges', 0),
(23, 211, 32, 'Foot care', 'Foot care', '', 'foot-care', 0),
(24, 212, 33, 'Body Scrubber & Polishes', 'Body Scrubber & Polishes', '', 'body-scrubber--polishes', 0),
(25, 213, 34, 'Bathroom & Toilets', 'Bathroom & Toilets', '', 'bathroom-toilets', 0),
(26, 213, 35, 'Fruit cutters', 'Fruit cutters', '', 'fruit-cutters', 0),
(27, 213, 36, 'Taps extension ', 'Taps extension ', '', 'taps-extension-', 0),
(28, 213, 34, 'Brushes', 'Brushes', '', 'brushes', 0),
(29, 213, 35, 'Sink Tools', 'Sink Tools', '', 'sink-tools', 0),
(30, 209, 37, 'Hair Curlers', 'Hair Curlers', '', 'hair-curlers', 0),
(31, 209, 37, 'Rubber Bands & Grips', 'Rubber Bands & Grips', '', 'rubber-bands--grips', 0),
(32, 209, 37, 'Juda Maker Tools', 'Juda Maker Tools', '', 'juda-maker-tools', 0),
(33, 209, 37, 'Hair combs', 'Hair combs', '', 'hair-combs', 0),
(34, 209, 37, 'Hair Clutchers', 'Hair Clutchers', '', 'hair-clutchers', 0),
(35, 209, 37, 'Hair Bands', 'Hair Bands', '', 'hair-bands', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `role_as` tinyint(2) NOT NULL COMMENT '0=>users, 1=>admin',
  `status` tinyint(2) NOT NULL COMMENT '0=>Inactive, 1=>active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `phone` varchar(40) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `last_name`, `email`, `password`, `verify_token`, `role_as`, `status`, `created_at`, `phone`, `address1`, `address2`, `city`, `zone`, `country`, `zip`) VALUES
(54, 'naman agarwal', '', 'namanagarwal890@gmail.com', '$2y$10$Gu9xoyJbJzb3zZk07pMVSO3gdiM6KUNYoL0dJLyHFPGjuwXZteZL6', '8700d9e802e02d1dea29aaf5d98083d0', 0, 1, '2022-07-27 11:55:47', '7985785114', '1/101A', 'rishi nagar shuklaganj', 'kanpur', 'uttar pradesh', 'India', '209861'),
(62, 'Anubhav', 'Tuwari', 'anubhavtiwariat.72@gmail.com', '$2y$10$07USjWWdVmJIDt3pMGi3WeAjG3V7TfeBRrbPE9T8W1l8EkKrk2WPi', '', 0, 1, '2022-07-30 05:39:13', '6395740776', 'F31 saket nagar', 'Near kishan deri', 'Kanpur', 'Uttar pradesh ', 'India', '208016'),
(63, 'Khushi', 'Agarwal', 'sweetyagarwal3611@gmail.com', '$2y$10$xW1jPKJZyXglQOavtDDaY.qLvLmIbnXjLWJfk1EfysB3jJMZGur8.', 'e36ae65315b1763ae42055a51e728eef', 0, 1, '2022-08-15 08:54:08', '7617838331', '1/101 A jagdamba park', 'Shuklaganj', 'Unnao', 'Uttar Pradesh', 'India', '209861'),
(66, 'Something', '', 'test@gmail.com', '$2y$10$JXxZ3SMrovCx2eUizZumVeFve5d0BkCuurDsvawinEX5QHZK5URzu', 'bfbe2b9481aae50f2fd7baecae3b501c', 0, 1, '2022-08-16 12:32:48', '+918956587412', '', '', '', '', '', ''),
(67, 'test test', 'test', 'test1@gmail.com', '$2y$10$1kRsg2f0jKTkdiZ40AvZp.SAIsvespRhpIepvQI3tSdgjmsVSp0HK', '8c158c49f25b25726566421877b868a8', 0, 1, '2022-08-17 14:01:32', '+917564234576', '12 building near state mall', '', 'Dubai', 'Dubai', 'United Arab Emirates', '309011'),
(69, 'Vivek', 'singh', 'singhvivek12sm@gmail.com', '$2y$10$CWZ/doJejBDzSVy9wguumuZGFm5SSckPJixzirN3tu40erhYN93fK', '80ff148577238516a0a8159370fb9a70', 0, 1, '2022-08-25 17:40:22', '+917895647585', 'Rk cycle store', '', 'kanpur', 'Uttar Pradesh', 'India', '208011'),
(70, 'NAMAN', 'AGARWAL', 'namanERETAIL123@gmail.com', '$2y$10$OmMdIfeRjfx1QhD0lKiUVeqoFH1uecgYrshgU5aKGUmMNLPaIrhj6', '', 0, 1, '2022-08-31 06:20:00', '7985785114', '1/101A GROUND FLOOR ', 'rishi nagar shuklaganj', 'KANPUR', 'Uttar Pradesh', 'India', '209861'),
(72, 'Naman', 'Agarwal', 'namaneretail890@gmail.com', '$2y$10$R7hl7K3Izr5F/bQbZqG.XOv1za42fw6PY.t8KcT0kdevCpEome4Ze', '', 0, 1, '2022-09-03 15:30:12', '7985785114', '1/101A ground floor ', 'rishi nagar shuklaganj', 'unnao', 'Uttar Pradesh', 'India', '209861'),
(74, 'Anubhav ', NULL, 'developerbrother.db@gmail.com', '$2y$10$BrJOUKJ9/FFnJZn97QaAMOXyJLR2dKk4iOFHVZWm2R8QNCnInBB3W', 'd7284fa21cc774013aa3829a210c7f82', 0, 1, '2022-09-20 13:52:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Shivam', NULL, 'shivamverma.ms@gmail.com', '$2y$10$616fdAc7HPwazLy60NGjIe/ndpopxNtL0ggmDM6lGffNh9.qmrU8W', '3c7e7849872310c0eb2029deb38e17ec', 0, 1, '2022-09-20 13:57:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Raunak', 'Pandey', 'raunak@maidenstride.com', '$2y$10$8BesUj2EnsMmWfLX03ThtOvx3C9daQCePS4kz5mnQGo5hcsFPt9EC', 'aaa5e8d48a94a161287b9d135b2396af', 0, 1, '2022-09-20 14:12:05', '8881333462', 'Test', 'Test', 'Kanpur', 'Uttar Pradesh', 'India', '208014'),
(78, 'Mahender', 'Thakur', 'manuthakur335@gmail.com', '$2y$10$xs0Isqal2odoqDdq0V64de84S.rJzOizg2J3x0eLR4F6A3Rt8mdg.', '', 0, 1, '2022-09-21 06:54:08', '9873225539', 'Kheri bijali borad near rps sawana Kheri road ', 'Faridabad ', 'Faridabad', 'Haryana', 'India', '121002'),
(79, 'Ashish', 'Sharma ', 'ashishsharma7081918@gmail.com', '$2y$10$nTzwfxUb72wUYdgy/i5Q.euzgIAFznXowSdJLyELCyEzMr32zjquC', '', 0, 1, '2022-09-23 05:41:18', '9559603128', '486/275 lahoreganj daliganj Lucknow ', 'Daliganj railway station ', 'Lucknow ', 'Uttar Pradesh', 'India', '226020'),
(80, 'SRINIVAS', 'A', 'srinivas0199@gmail.com', '$2y$10$HzqluSmEwlc1pnUfBO9p3.U3xEpgJp4fGNyPKVRFc8VOSDBr8mTM2', 'ecaafe4fc88f1b1944a662b4dad96229', 0, 1, '2022-09-24 14:42:36', '9739861927', 'RESIL CHEMICALS PVT LTD, NO. 30, BCIE, OLD MADRAS ROAD BANGALORE', 'Land mark : Near Pushpanjali theatre', 'BANGALORE', 'Karnataka', 'India', '560016'),
(81, 'Rajbir', 'singh ', 'rajbirsingh76383@gmail.com', '$2y$10$eYgAeZy5jLKAZPYTOTVk8uP3Vt7VZI9TdEdoeFx9OFP0sniYmROsS', '', 0, 1, '2022-10-16 14:42:27', '6375462256', 'vpo Kallah teh khadur shaib distt tarn taran pin 143406', '', 'tarn taran ', 'Punjab', 'India', '0000'),
(82, 'Jeel', 'Shah', 'jeelshah629@gmail.com', '$2y$10$zLtc9BB1D6N3PDjrblR71.95kUN4S7RvS6CaB3pc24T.zJcQ00jzG', '', 0, 1, '2022-10-17 12:23:32', '9428032461', '21Anand park society nandasan road kadi ', 'Society ', 'Kadi', 'Gujarat', 'India', '382715'),
(83, 'Shivam', 'Verma', 'shivam@maidenstride.com', '$2y$10$Yb5JOijhnnMdBhJ7PBGWtOTuUDZidZmYCrW1EdRWaFKbhtPdlgNde', 'e25b5cee50cde3184373d935946eeed5', 0, 1, '2022-10-21 14:02:45', '7564234576', 'P block 79', 'Yashoda nagar', 'Kanpur', 'Uttar Pradesh', 'India', '208011'),
(84, 'Bawithapar', 'Beulah', 'bawitha09@gmail.com', '$2y$10$8l4oqoEHsu7n8COrLB6Pa.InJYlQzizZZyKYQNH10LRA/Am4s.f/C', '', 0, 1, '2022-10-25 04:39:38', '8130802347', 'B36 Chanakya Place, Uttam Nagar ', 'Azaad Juice Coner', 'New Delhi ', 'Delhi', 'India', '110059'),
(85, 'Shivam ', NULL, 'sv708128@gmail.com', '$2y$10$4hNQp62euWM0SFXhjMbV7eMYTA3EMLsUtQplFjHmee1oBpl0/.qaq', 'd69ebb79902efd509f7bd997c09b6b20', 0, 1, '2023-06-20 10:04:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'popo', NULL, 'popo@gmail.com', '$2y$10$bLY56m9hOGgayGEGSxxX2ej6.FCzocOR3NrQfMGnEIO3Qij7EOZf2', 'ef029cd22b3d93ee8fc8544bd35adb57', 0, 0, '2023-07-06 06:20:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `created_at`) VALUES
(5, 14, 39, '2022-05-04 16:09:05'),
(6, 1, 42, '2022-05-16 18:11:55'),
(9, 15, 0, '2022-07-04 14:06:07'),
(17, 1, 48, '2022-07-04 16:59:34'),
(18, 1, 0, '2022-07-04 17:08:39'),
(19, 2, 79, '2022-07-11 14:57:19'),
(23, 16, 75, '2022-07-11 15:10:11'),
(34, 66, 75, '2022-08-16 19:21:06'),
(35, 66, 69, '2022-08-16 19:21:10'),
(36, 67, 69, '2022-08-17 19:32:45'),
(38, 67, 44, '2022-08-18 13:15:36'),
(40, 77, 83, '2022-09-29 22:12:08'),
(41, 77, 101, '2022-09-29 22:12:59'),
(42, 77, 91, '2022-09-29 22:13:13'),
(43, 77, 96, '2022-09-29 22:13:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_url` (`cat_url`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_query`
--
ALTER TABLE `customer_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_query_replies`
--
ALTER TABLE `customer_query_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items_status`
--
ALTER TABLE `order_items_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `product_attribites`
--
ALTER TABLE `product_attribites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `catid` (`category_id`);

--
-- Indexes for table `supersubcategory`
--
ALTER TABLE `supersubcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer_query`
--
ALTER TABLE `customer_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_query_replies`
--
ALTER TABLE `customer_query_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `order_items_status`
--
ALTER TABLE `order_items_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `supersubcategory`
--
ALTER TABLE `supersubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
