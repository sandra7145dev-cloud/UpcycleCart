-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2025 at 08:25 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_upcyclecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogin`
--

DROP TABLE IF EXISTS `tbl_adminlogin`;
CREATE TABLE IF NOT EXISTS `tbl_adminlogin` (
  `loginid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`loginid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminlogin`
--

INSERT INTO `tbl_adminlogin` (`loginid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `category_description` varchar(125) NOT NULL,
  `category_image` varchar(300) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_image`) VALUES
(23, 'metal', 'all ferrous  and non-ferrous  materials that are disposable but valuable for recycling and upcycling.', 'a23.png'),
(26, 'Plastic', 'Assorted plastic waste (bottles, containers, films) ready for recycling and upcycling.', 'a21.png'),
(25, 'E-Waste', 'Old phone, charger', 'ewaste.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `name`, `email`, `phone_no`, `address`, `ward_id`, `wallet_id`, `username`, `password`) VALUES
(12, 'Sruthy Siju', 'sruthy123@gmail.com', 7853624569, 'Flower Villa', 15, 11, 'sruthy123', 'sruthy@234'),
(11, 'Farha Fathima', 'farhafathima1100@gmail.com', 7902509776, 'ElavumChuvattil', 14, 10, 'farha1122', 'farhs@2003'),
(10, 'Mariat Jojo', 'mariatjojo2005@gmail.com', 6282046409, 'Cheruthottathil(h)', 16, 9, 'akku', 'akku@123'),
(8, 'Sidharth E S', 'sidharth567@gmail.com', 6258963458, 'Rose  Villa,Guru ITC', 15, 7, 'sid123', '123@sid'),
(9, 'Animol P C', 'animol2003@gmail.com', 7902509668, 'Vadaathu(H)', 16, 8, 'animol123', '123@animol'),
(7, 'Abhirami v Gopal', 'abhiramivg2001@gmail.com', 9605359688, 'Vettichuvatil(H)', 14, 6, 'ammu123', '123@ammu'),
(13, 'Jesvin', 'jesvin123@gmail.com', 9123456789, 'vattakuzhy', 14, 12, 'jes123', 'Jesvin@123'),
(14, 'Neethu L P', 'neethu123@gmail.com', 9633196948, 'peace villa', 14, 13, 'neethu123', 'neethu@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_collector`
--

DROP TABLE IF EXISTS `tbl_item_collector`;
CREATE TABLE IF NOT EXISTS `tbl_item_collector` (
  `collector_id` int(11) NOT NULL AUTO_INCREMENT,
  `collector_name` varchar(30) NOT NULL,
  `collector_email` varchar(150) NOT NULL,
  `collector_phnno` varchar(15) NOT NULL,
  `collector_address` varchar(200) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`collector_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_collector`
--

INSERT INTO `tbl_item_collector` (`collector_id`, `collector_name`, `collector_email`, `collector_phnno`, `collector_address`, `ward_id`, `username`, `password`) VALUES
(1, 'Tom Johns', 'tom234@gmail.com', '9745623444', '22/6, Palarivattom Lane, Sunrise Apt', 11, 'tom235', 'tom@9745'),
(6, 'Ramesh Pillai', 'ramesh.collector@example.com', '8899776655', 'Anjali Bhavan, Muvattupuzha Road, Thodupuzha', 16, 'ramesh', 'ramesh655'),
(5, 'Rony J Mathew', 'rony345@gmail.com', '7766902584', 'Rose House, Near Civil Station', 14, 'ronymathew', 'rony@584'),
(7, ' Ajith Binoy', 'ajithbinoy@gmail.com', '9876543212', '8/17, MG Road, Thodupuzha', 15, 'ajith_binoy', 'pass@1234'),
(10, 'Afasal Rasheed', 'afsal123@gmail.com', '7905206655', 'Mayooram(H)', 20, 'afsal123', 'afsal@123'),
(9, 'Thomas Mathew', 'thomas123@gmail.com', '9895673452', 'Thekkel(H)', 19, 'tom123', 'tom@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_coin` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `customer_id`, `total_amount`, `total_coin`, `ordered_date`, `status`, `total_quantity`) VALUES
(1, 5, 450, 45, '2025-09-03', 'Paid', 1),
(9, 9, 1000, 1000, '2025-10-05', 'Paid', 2),
(3, 5, 500, 500, '2025-10-03', 'Paid', 1),
(4, 5, 670, 350, '2025-10-03', 'Paid', 1),
(5, 2, 1340, 700, '2025-10-03', 'Paid', 2),
(8, 6, 450, 45, '2025-10-04', 'Ordered', 1),
(7, 2, 1230, 700, '2025-10-03', 'Paid', 2),
(10, 9, 500, 500, '2025-10-05', 'Ordered', 1),
(11, 9, 670, 350, '2025-10-07', 'Paid', 1),
(13, 9, 1100, 550, '2025-10-10', 'Ordered', 2),
(14, 10, 300, 150, '2025-10-10', 'Paid', 1),
(15, 9, 980, 490, '2025-10-10', 'Paid', 2),
(16, 9, 1800, 900, '2025-10-10', 'Paid', 4),
(17, 10, 800, 400, '2025-10-11', 'Ordered', 1),
(18, 10, 1600, 800, '2025-10-13', 'Paid', 2),
(19, 10, 1700, 850, '2025-10-13', 'Ordered', 3),
(20, 10, 450, 225, '2025-10-13', 'Ordered', 1),
(21, 10, 450, 225, '2025-10-13', 'Ordered', 1),
(22, 10, 450, 225, '2025-10-13', 'Ordered', 1),
(23, 10, 300, 150, '2025-10-13', 'Ordered', 1),
(24, 10, 450, 225, '2025-10-13', 'Ordered', 1),
(25, 10, 450, 225, '2025-10-13', 'Ordered', 1),
(26, 10, 300, 150, '2025-10-13', 'Ordered', 1),
(27, 10, 450, 225, '2025-10-13', 'Paid', 1),
(28, 10, 300, 150, '2025-10-14', 'Paid', 1),
(29, 10, 450, 225, '2025-10-14', 'Paid', 1),
(30, 10, 450, 225, '2025-10-14', 'Paid', 1),
(31, 12, 300, 150, '2025-10-14', 'Paid', 1),
(32, 13, 600, 300, '2025-10-14', 'Paid', 2),
(33, 13, 180, 90, '2025-11-19', 'Paid', 1),
(34, 14, 360, 180, '2025-11-20', 'Paid', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `coin` int(11) NOT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `quantity`, `price`, `coin`) VALUES
(1, 1, 6, 1, 450, 45),
(2, 2, 5, 1, 500, 500),
(3, 3, 5, 1, 500, 500),
(4, 4, 7, 1, 670, 350),
(5, 5, 7, 2, 670, 350),
(6, 6, 5, 1, 500, 500),
(7, 7, 8, 1, 560, 350),
(8, 7, 7, 1, 670, 350),
(9, 8, 6, 1, 450, 45),
(10, 9, 5, 2, 500, 500),
(11, 10, 5, 1, 500, 500),
(12, 11, 7, 1, 670, 350),
(13, 13, 9, 1, 300, 150),
(14, 13, 10, 1, 800, 400),
(15, 14, 9, 1, 300, 150),
(16, 15, 11, 1, 180, 90),
(17, 15, 10, 1, 800, 400),
(18, 16, 12, 4, 450, 225),
(19, 17, 10, 1, 800, 400),
(20, 18, 10, 2, 800, 400),
(21, 19, 10, 1, 800, 400),
(22, 19, 12, 1, 450, 225),
(23, 19, 12, 1, 450, 225),
(24, 20, 12, 1, 450, 225),
(25, 21, 12, 1, 450, 225),
(26, 22, 12, 1, 450, 225),
(27, 23, 9, 1, 300, 150),
(28, 24, 12, 1, 450, 225),
(29, 25, 12, 1, 450, 225),
(30, 26, 9, 1, 300, 150),
(31, 27, 12, 1, 450, 225),
(32, 28, 9, 1, 300, 150),
(33, 29, 12, 1, 450, 225),
(34, 30, 12, 1, 450, 225),
(35, 31, 9, 1, 300, 150),
(36, 32, 9, 2, 300, 150),
(37, 33, 11, 1, 180, 90),
(38, 34, 11, 2, 180, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_coin` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `total_amount`, `payment_date`, `status`, `total_coin`) VALUES
(1, 1, 500, '2025-10-03', 'Card', 0),
(2, 3, 500, '2025-10-03', 'Card', 0),
(3, 4, 670, '2025-10-03', 'Card', 0),
(4, 5, 1340, '2025-10-03', 'Card', 0),
(5, 5, 500, '2025-10-03', 'Card', 0),
(6, 7, 1230, '2025-10-03', 'Card', 0),
(7, 9, 1000, '2025-10-05', 'Card', 0),
(8, 9, 500, '2025-10-05', 'Card', 0),
(9, 11, 0, '2025-10-07', 'E-coin', 350),
(10, 14, 0, '2025-10-10', 'E-coin', 150),
(11, 15, 980, '2025-10-10', 'Card', 0),
(12, 16, 0, '2025-10-10', 'E-coin', 900),
(13, 18, 1600, '2025-10-13', 'Card', 0),
(14, 18, 1700, '2025-10-13', 'Card', 0),
(15, 18, 450, '2025-10-13', 'Card', 0),
(16, 18, 450, '2025-10-13', 'Card', 0),
(17, 18, 300, '2025-10-13', 'Card', 0),
(18, 18, 450, '2025-10-13', 'Card', 0),
(19, 18, 450, '2025-10-13', 'Card', 0),
(20, 18, 300, '2025-10-13', 'Card', 0),
(21, 27, 450, '2025-10-13', 'Card', 0),
(22, 28, 300, '2025-10-14', 'Card', 0),
(23, 29, 450, '2025-10-14', 'Card', 0),
(24, 30, 450, '2025-10-14', 'Card', 0),
(25, 31, 300, '2025-10-14', 'Card', 0),
(26, 32, 600, '2025-10-14', 'Card', 0),
(27, 33, 0, '2025-11-19', 'E-coin', 90),
(28, 34, 0, '2025-11-20', 'E-coin', 180);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(40) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_coin` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `description`, `product_price`, `product_image`, `product_stock`, `product_coin`) VALUES
(11, 26, 'Re-Scrub', 'Durable', 180, 'brush.png', 4, 90),
(9, 26, 'Container Box', 'Size: Medium', 300, 'a211.png', 5, 150),
(10, 26, 'Terazzo Planter', 'Size: Medium', 800, 'a222.png', 5, 400),
(12, 26, 'AquaWeave ', 'Recycled-Rug', 450, 'carpet.png', 1, 225);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

DROP TABLE IF EXISTS `tbl_request`;
CREATE TABLE IF NOT EXISTS `tbl_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `coin` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `collector_id` int(11) NOT NULL,
  `collection_date` date NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `customer_id`, `category_id`, `subcategory_id`, `item_quantity`, `status`, `coin`, `request_date`, `collector_id`, `collection_date`) VALUES
(42, 9, 26, 5, 3, 'Collected', 300, '2025-10-05', 6, '2025-10-10'),
(48, 9, 26, 6, 3, 'pending', 0, '2025-10-10', 0, '2025-10-10'),
(49, 9, 26, 8, 6, 'Collected', 12, '2025-10-10', 6, '2025-11-17'),
(52, 9, 26, 6, 3, 'pending', 0, '2025-10-10', 0, '2025-10-10'),
(53, 9, 26, 7, 1, 'pending', 0, '2025-10-10', 0, '2025-10-10'),
(54, 9, 25, 9, 1, 'pending', 0, '2025-10-10', 0, '2025-10-10'),
(55, 9, 25, 10, 1, 'pending', 0, '2025-10-10', 0, '2025-10-10'),
(57, 9, 23, 12, 4, 'pending', 0, '2025-10-10', 0, '2025-10-10'),
(65, 14, 25, 9, 2, 'Collected', 2000, '2025-11-20', 5, '2025-11-26'),
(64, 13, 25, 10, 2, 'Collected', 200, '2025-11-19', 5, '2025-11-25'),
(63, 13, 25, 9, 1, 'pending', 0, '2025-11-19', 0, '2025-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(20) NOT NULL,
  `subcategory_image` varchar(235) NOT NULL,
  `coin` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`category_id`, `subcategory_id`, `subcategory_name`, `subcategory_image`, `coin`, `quantity`) VALUES
(26, 8, 'Cover', 'a23.jpg', 2, 1),
(25, 9, 'Fridge', 'fridge.png', 1000, 1),
(25, 10, 'Calculator', 'calculator.jpg', 100, 1),
(26, 5, 'Chair', 'a24.jpg', 100, 1),
(26, 6, 'Bottle', 'a211.jpg', 10, 1),
(26, 7, 'Bucket', 'a22.jpg', 30, 1),
(23, 11, 'Can', 'can.jpg', 50, 1),
(23, 12, 'Tools', 'tools.jpg', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

DROP TABLE IF EXISTS `tbl_wallet`;
CREATE TABLE IF NOT EXISTS `tbl_wallet` (
  `wallet_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `coin` int(11) NOT NULL,
  PRIMARY KEY (`wallet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wallet_id`, `customer_id`, `coin`) VALUES
(1, 5, 45),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 6, 0),
(6, 7, 0),
(7, 8, 0),
(8, 9, 2424),
(9, 10, 1060),
(10, 11, 0),
(11, 12, 100),
(12, 13, 330),
(13, 14, 1820);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ward`
--

DROP TABLE IF EXISTS `tbl_ward`;
CREATE TABLE IF NOT EXISTS `tbl_ward` (
  `ward_id` int(11) NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(30) NOT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ward`
--

INSERT INTO `tbl_ward` (`ward_id`, `ward_name`) VALUES
(14, 'Vengalloor'),
(15, 'Guru I.T.C'),
(16, 'Vengathanam'),
(20, 'Madathikandam'),
(19, 'Kolani');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
