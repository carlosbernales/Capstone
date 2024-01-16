-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2024 at 08:01 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u696532059_finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name_city` varchar(255) NOT NULL,
  `brgy_name` varchar(255) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `city_id`, `name_city`, `brgy_name`, `shipping_fee`) VALUES
(1, 2, 'Baco', 'Dulangan II', 210.00),
(2, 2, 'Baco', 'Dulangan I', 210.00),
(15, 6, 'Calapan City', 'Balingayan', 180.00),
(16, 6, 'Calapan City', 'Balite', 100.00),
(17, 6, 'Calapan City', 'Baruyan', 180.00),
(18, 6, 'Calapan City', 'Batino', 120.00),
(19, 6, 'Calapan City', 'Bayanan I', 110.00),
(20, 6, 'Calapan City', 'Bayanan II', 120.00),
(21, 6, 'Calapan City', 'Biga', 140.00),
(22, 6, 'Calapan City', 'Bondoc', 140.00),
(23, 6, 'Calapan City', 'Bucayao', 150.00),
(24, 6, 'Calapan City', 'Buhuan', 160.00),
(25, 6, 'Calapan City', 'Bulusan', 100.00),
(26, 6, 'Calapan City', 'Calero', 100.00),
(27, 6, 'Calapan City', 'Camansihan', 140.00),
(28, 6, 'Calapan City', 'Camilmil', 100.00),
(29, 6, 'Calapan City', 'Canubing I', 150.00),
(30, 6, 'Calapan City', 'Canubing II', 160.00),
(31, 6, 'Calapan City', 'Comunal', 140.00),
(32, 6, 'Calapan City', 'Guinobatan', 100.00),
(33, 6, 'Calapan City', 'Gulod', 150.00),
(34, 6, 'Calapan City', 'Gutad', 150.00),
(35, 6, 'Calapan City', 'Ibaba East', 100.00),
(36, 6, 'Calapan City', 'Ibaba West', 100.00),
(37, 6, 'Calapan City', 'Ilaya', 100.00),
(38, 6, 'Calapan City', 'Lalud', 100.00),
(39, 6, 'Calapan City', 'Lazareto', 100.00),
(40, 6, 'Calapan City', 'Libis', 100.00),
(41, 6, 'Calapan City', 'Lumang Bayan', 100.00),
(42, 6, 'Calapan City', 'Mahal na Pangalan', 100.00),
(43, 6, 'Calapan City', 'Maidlang', 130.00),
(44, 6, 'Calapan City', 'Malad', 120.00),
(45, 6, 'Calapan City', 'Malamig', 140.00),
(46, 6, 'Calapan City', 'Managpi', 150.00),
(47, 6, 'Calapan City', 'Masipit', 100.00),
(48, 6, 'Calapan City', 'Nag-iba I', 200.00),
(49, 6, 'Calapan City', 'Nag-iba II', 210.00),
(50, 6, 'Calapan City', 'Navotas', 120.00),
(51, 6, 'Calapan City', 'Pachoca', 100.00),
(52, 6, 'Calapan City', 'Palhi', 120.00),
(53, 6, 'Calapan City', 'Panggalaan', 110.00),
(54, 6, 'Calapan City', 'Parang', 100.00),
(55, 6, 'Calapan City', 'Patas', 130.00),
(56, 6, 'Calapan City', 'Personas', 120.00),
(57, 6, 'Calapan City', 'Puting tubig', 130.00),
(58, 6, 'Calapan City', 'Salong', 100.00),
(59, 6, 'Calapan City', 'San Antonio', 100.00),
(60, 6, 'Calapan City', 'San Vicente East', 100.00),
(61, 6, 'Calapan City', 'San Vicente North', 100.00),
(62, 6, 'Calapan City', 'San Vicente South', 100.00),
(63, 6, 'Calapan City', 'San Vicente West', 100.00),
(64, 6, 'Calapan City', 'Santa Cruz', 140.00),
(65, 6, 'Calapan City', 'Santa Isabel', 130.00),
(66, 6, 'Calapan City', 'Santa Marie Village', 100.00),
(67, 6, 'Calapan City', 'Santa Rita', 170.00),
(68, 6, 'Calapan City', 'Santo Nino', 100.00),
(69, 6, 'Calapan City', 'Sapul', 130.00),
(70, 6, 'Calapan City', 'Silonay', 140.00),
(71, 6, 'Calapan City', 'Suqui', 100.00),
(72, 6, 'Calapan City', 'Tawagan', 140.00),
(73, 6, 'Calapan City', 'Tawiran', 100.00),
(74, 6, 'Calapan City', 'Tibag', 100.00),
(75, 6, 'Calapan City', 'Wawa', 140.00),
(76, 2, 'Baco', 'Alag', 210.00),
(77, 2, 'Baco', 'Bangkatan', 220.00),
(78, 2, 'Baco', 'Baras (Mangyan Minority)', 250.00),
(79, 2, 'Baco', 'Bayanan', 220.00),
(80, 2, 'Baco', 'Burbuli', 230.00),
(81, 2, 'Baco', 'Catwiran I', 240.00),
(82, 2, 'Baco', 'Catwiran II', 250.00),
(85, 2, 'Baco', 'Lantuyang (Mangyan Minority)', 220.00),
(86, 2, 'Baco', 'Lumang Bayan', 210.00),
(87, 2, 'Baco', 'Malapad', 220.00),
(88, 2, 'Baco', 'Mangangan I', 250.00),
(89, 2, 'Baco', 'Mangangan II', 260.00),
(90, 2, 'Baco', 'Mayabig', 220.00),
(91, 2, 'Baco', 'Pambisan', 260.00),
(92, 2, 'Baco', 'Poblacion', 200.00),
(93, 2, 'Baco', 'Pulang-Tubig', 220.00),
(94, 2, 'Baco', 'Putican-Cabulo', 230.00),
(95, 2, 'Baco', 'San Andres', 250.00),
(96, 2, 'Baco', 'San Ignacio (Dulangan)', 220.00),
(97, 2, 'Baco', 'Santa Cruz', 230.00),
(98, 2, 'Baco', 'Santa Rosa I', 230.00),
(99, 2, 'Baco', 'Santa Rosa II', 240.00),
(100, 2, 'Baco', 'Tabon-tabon', 230.00),
(101, 2, 'Baco', 'Tagumpay', 240.00),
(102, 2, 'Baco', 'Water', 240.00),
(103, 3, 'Naujan', 'Adrialuna', 210.00),
(104, 3, 'Naujan', 'Andres Ylagan (Mag-asawang Tubig)', 220.00),
(105, 3, 'Naujan', 'Antipolo', 220.00),
(106, 3, 'Naujan', 'Apitong', 230.00),
(107, 3, 'Naujan', 'Arangin', 250.00),
(108, 3, 'Naujan', 'Aurora', 250.00),
(109, 3, 'Naujan', 'Bacungan', 0.00),
(110, 3, 'Naujan', 'Bagong Buhay', 210.00),
(111, 3, 'Naujan', 'Balite', 230.00),
(112, 3, 'Naujan', 'Bancuro', 220.00),
(113, 3, 'Naujan', 'Banuton', 230.00),
(114, 3, 'Naujan', 'Barcenaga', 210.00),
(115, 3, 'Naujan', 'Bayani', 260.00),
(116, 3, 'Naujan', 'Buhangin', 220.00),
(117, 3, 'Naujan', 'Caburo', 260.00),
(118, 3, 'Naujan', 'Concepcion', 250.00),
(119, 3, 'Naujan', 'Dao', 240.00),
(120, 3, 'Naujan', 'Del Pilar', 230.00),
(121, 3, 'Naujan', 'Estrella', 0.00),
(122, 3, 'Naujan', 'Evangelista', 0.00),
(123, 3, 'Naujan', 'Gamao', 0.00),
(124, 3, 'Naujan', 'General Esco', 0.00),
(125, 3, 'Naujan', 'Herrera', 0.00),
(126, 3, 'Naujan', 'Inarawan', 0.00),
(127, 3, 'Naujan', 'Kalinisan', 0.00),
(128, 3, 'Naujan', 'Laguna', 0.00),
(129, 3, 'Naujan', 'Mabini', 0.00),
(130, 3, 'Naujan', 'Magtibay', 0.00),
(131, 3, 'Naujan', 'Mahabang Parang', 90.00),
(132, 3, 'Naujan', 'Malabo', 0.00),
(133, 3, 'Naujan', 'Malaya', 0.00),
(134, 3, 'Naujan', 'Malinao', 9.00),
(135, 3, 'Naujan', 'Malvar', 9.00),
(136, 3, 'Naujan', 'Masagana', 0.00),
(137, 3, 'Naujan', 'Masaguing', 0.00),
(138, 3, 'Naujan', 'Melgar A', 0.00),
(139, 3, 'Naujan', 'Melgar B', 0.00),
(140, 3, 'Naujan', 'Metolza', 0.00),
(141, 3, 'Naujan', 'Montelago', 0.00),
(142, 3, 'Naujan', 'Montemayor', 90.00),
(143, 3, 'Naujan', 'Motoderazo', 0.00),
(144, 3, 'Naujan', 'Mulawin', 0.00),
(145, 3, 'Naujan', 'Nag-Iba I', 0.00),
(146, 3, 'Naujan', 'Nag-Iba II', 0.00),
(147, 3, 'Naujan', 'Pagkakaisa', 0.00),
(148, 3, 'Naujan', 'Paitan', 0.00),
(149, 3, 'Naujan', 'Paniquian', 0.00),
(151, 3, 'Naujan', 'Pinagsabangan I', 0.00),
(152, 3, 'Naujan', 'Pinagsabangan II', 0.00),
(153, 3, 'Naujan', 'Pinahan', 0.00),
(154, 3, 'Naujan', 'Poblacion I Barangay I)', 0.00),
(155, 3, 'Naujan', 'Poblacion II (Barangay II)', 0.00),
(156, 3, 'Naujan', 'Poblacion II (Barangay I)', 0.00),
(157, 3, 'Naujan', 'Poblacion III Barangay III)', 0.00),
(158, 3, 'Naujan', 'Sampaguita', 0.00),
(159, 3, 'Naujan', 'San Agustin I', 0.00),
(160, 3, 'Naujan', 'San Agustin II', 0.00),
(161, 3, 'Naujan', 'San Andres', 0.00),
(162, 3, 'Naujan', 'San Antonio', 0.00),
(163, 3, 'Naujan', 'San Carlos', 0.00),
(164, 3, 'Naujan', 'San Isidro', 0.00),
(165, 3, 'Naujan', 'San Jose', 0.00),
(166, 3, 'Naujan', 'San Luis', 0.00),
(167, 3, 'Naujan', 'San Nicolas', 0.00),
(168, 3, 'Naujan', 'San Pedro', 0.00),
(169, 3, 'Naujan', 'Santa Cruz', 0.00),
(170, 3, 'Naujan', 'Santa Isabel', 0.00),
(171, 3, 'Naujan', 'Santa Maria', 0.00),
(172, 3, 'Naujan', 'Santa Maria', 0.00),
(173, 3, 'Naujan', 'Santo Nino', 0.00),
(174, 3, 'Naujan', 'Tagumpay', 0.00),
(175, 3, 'Naujan', 'Tigkan', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `balance` varchar(100) NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `proof_payment` text NOT NULL,
  `status` enum('Pending','Approved','Cancelled','Finished') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `fk_userid`, `fullname`, `contact`, `email`, `location`, `date`, `start`, `balance`, `payment_amount`, `proof_payment`, `status`) VALUES
(5, 22, 'tem cueto', '09774034444', 'temcueto@gmail.com', 'Naujan, Poblacion 2', '2023-10-17', '13:30:00', '20000', '20000', '', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_cost` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `fk_product_id`, `fk_user_id`, `cart_qty`, `cart_cost`, `created_at`, `updated_at`) VALUES
(51, 3, 3, 3, 650, '2023-10-08 23:14:44', '2023-10-08 23:15:05'),
(86, 11, 26, 1, 700, '2023-11-12 09:01:52', '0000-00-00 00:00:00'),
(124, 6, 21, 1, 1300, '2023-12-05 04:20:37', '2023-12-12 07:09:08'),
(148, 3, 26, 1, 650, '2023-12-10 20:51:47', '0000-00-00 00:00:00'),
(169, 3, 33, 1, 650, '2023-12-11 21:34:33', '2023-12-11 21:35:31'),
(170, 5, 21, 1, 1400, '2023-12-11 22:12:26', '2023-12-12 07:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `category`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Flowers Bouquet', '', '', '2023-05-08 03:51:25', '2023-06-11 01:12:07'),
(21, 'Base Flowers', '', '', '2023-06-24 16:47:39', '2023-09-23 11:33:55'),
(22, 'Dried Bouquet', '', '', '2023-11-05 04:13:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`) VALUES
(2, 'Baco'),
(3, 'Naujan'),
(6, 'Calapan City');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '20231201060510', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695538, 1),
(4, '20231401010730', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695666, 2),
(5, '20231401011630', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695688, 3),
(6, '20231401011645', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695690, 4),
(7, '20231401011820', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695691, 5),
(8, '20231401011855', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695692, 6),
(9, '20231401011905', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1673695693, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orderdata`
--

CREATE TABLE `orderdata` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL DEFAULT 0,
  `labor` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_type` enum('N/A','Online','COD','POS','Pick Up','Pick Up (Paid)') NOT NULL DEFAULT 'COD',
  `flower_sizeOrtype` enum('DragNdrop','Order','POS','Upload','Small Bouquet','Regular Bouquet') NOT NULL,
  `proof_payment` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `selected_city` varchar(100) NOT NULL,
  `selected_barangay` varchar(100) NOT NULL,
  `other_infoaddres` text NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `order_status` enum('Agree','Settle','Request','Pending','To Pay','To Deliver','Completed','Received','Ready','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `orderdata`
--

INSERT INTO `orderdata` (`id`, `order_id`, `fk_user_id`, `order_amount`, `labor`, `order_date`, `order_type`, `flower_sizeOrtype`, `proof_payment`, `user_email`, `firstname`, `lastname`, `contact`, `selected_city`, `selected_barangay`, `other_infoaddres`, `shipping_fee`, `order_status`) VALUES
(12, 'REF_ID. 70059487', 0, 200, 0, '2023-10-13', 'POS', 'POS', '', '', 'Jocelyn', 'Sarmiento', '09989330011', '', '', '', 0, 'Completed'),
(13, 'REF_ID. 56464521', 0, 250, 0, '2023-10-13', 'POS', 'POS', '', '', 'Ronilo', 'Abutar', '09293136115', '', '', '', 0, 'Completed'),
(14, 'REF_ID. 187847614', 0, 150, 50, '2023-10-13', 'POS', 'POS', '', '', 'Jocelyn', 'Sarmiento', '09814516559', '', '', '', 0, 'Completed'),
(15, 'REF_ID. 11912261', 0, 200, 0, '2023-10-13', 'POS', 'POS', '', '', 'Angelica', 'Gutierrez', '09508494255', '', '', '', 0, 'Completed'),
(16, 'REF_ID. 521089775', 0, 150, 0, '2023-10-13', 'POS', 'POS', '', '', 'Roberto', 'Marquez', '09474002356', '', '', '', 0, 'Completed'),
(17, 'REF_ID. 69587312', 0, 800, 0, '2023-10-14', 'POS', 'POS', '', '', 'Vanessa', 'Bagsic', '09279481222', '', '', '', 0, 'Completed'),
(18, 'REF_ID. 76722610', 0, 3000, 0, '2023-10-28', 'POS', 'POS', '', '', 'Corona', 'Paraluman', '09153304777', '', '', '', 0, 'Completed'),
(19, 'REF_ID. 12225718', 0, 400, 0, '2023-11-01', 'POS', 'POS', '', '', 'Joena', 'Patricio', '09154662235', '', '', '', 0, 'Completed'),
(20, 'REF_ID. 711447349', 0, 750, 0, '2023-10-31', 'POS', 'POS', '', '', 'Corona', 'Paraluman', '09153304777', '', '', '', 0, 'Completed'),
(21, 'REF_ID. 679734655', 0, 960, 0, '2023-10-31', 'POS', 'POS', '', '', 'Marisol', 'Muerong', '09274036664', '', '', '', 0, 'Completed'),
(22, 'REF_ID. 12303248', 0, 2000, 0, '2023-10-31', 'POS', 'POS', '', '', 'Erick', 'Faraer', '', '', '', '', 0, 'Completed'),
(23, 'REF_ID. 66973749', 0, 500, 0, '2023-10-31', 'POS', 'POS', '', '', 'Cora', 'Tolentino', '', '', '', '', 0, 'Completed'),
(24, 'REF_ID. 55434188', 0, 1200, 0, '2023-10-31', 'POS', 'POS', '', '', 'Rosalina', 'Leido', '', '', '', '', 0, 'Completed'),
(25, 'REF_ID. 82413422', 0, 500, 0, '2023-10-31', 'POS', 'POS', '', '', 'Morada', 'Fenelia', '', '', '', '', 0, 'Completed'),
(26, 'REF_ID. 13557688', 0, 2600, 0, '2023-10-31', 'POS', 'POS', '', '', 'Jojo', 'Perez', '', '', '', '', 0, 'Completed'),
(27, 'REF_ID. 777148931', 0, 1050, 0, '2023-10-31', 'POS', 'POS', '', '', 'Jojo', 'Perez', '', '', '', '', 0, 'Completed'),
(28, 'REF_ID. 346727357', 0, 600, 0, '2023-10-31', 'POS', 'POS', '', '', 'Ghie', 'Fernandez', '', '', '', '', 0, 'Completed'),
(29, 'REF_ID. 81506003', 0, 950, 0, '2023-10-31', 'POS', 'POS', '', '', 'Nita', 'Mendoza', '', '', '', '', 0, 'Completed'),
(37, 'REF_ID. 80669608', 0, 400, 0, '2023-11-01', 'POS', 'POS', '', '', 'Rosell', 'Poro', '', '', '', '', 0, 'Completed'),
(38, 'REF_ID. 76666650', 0, 450, 0, '2023-11-01', 'POS', 'POS', '', '', 'Joey', 'Salome', '', '', '', '', 0, 'Completed'),
(39, 'REF_ID. 69031177', 0, 600, 0, '2023-11-01', 'POS', 'POS', '', '', 'Jezel', 'Belleza', '', '', '', '', 0, 'Completed'),
(40, 'REF_ID. 30425586', 0, 1000, 0, '2023-11-01', 'POS', 'POS', '', '', 'Wendell', 'Metrio', '', '', '', '', 0, 'Completed'),
(41, 'REF_ID. 55516916', 0, 950, 0, '2023-11-01', 'POS', 'POS', '', '', 'Jesusa', 'Narsoles', '', '', '', '', 0, 'Completed'),
(42, 'REF_ID. 92931786', 0, 4500, 0, '2023-11-01', 'POS', 'POS', '', '', 'Evelyn', 'Marasigan', '', '', '', '', 0, 'Completed'),
(43, 'REF_ID. 75331739', 0, 350, 0, '2023-11-01', 'POS', 'POS', '', '', 'Lilia', 'Landicho', '', '', '', '', 0, 'Completed'),
(44, 'REF_ID. 871015736', 0, 150, 0, '2023-11-01', 'POS', 'POS', '', '', 'Lilia', 'Landicho', '', '', '', '', 0, 'Completed'),
(45, 'REF_ID. 569019229', 0, 1440, 0, '2023-11-01', 'POS', 'POS', '', '', 'Mylene', 'Alcantara', '', '', '', '', 0, 'Completed'),
(46, 'REF_ID. 49656867', 0, 2100, 0, '2023-11-01', 'POS', 'POS', '', '', 'Gloria', 'Apigo', '', '', '', '', 0, 'Completed'),
(47, 'REF_ID. 668135893', 0, 300, 0, '2023-11-01', 'POS', 'POS', '', '', 'Gloria', 'Apigo', '', '', '', '', 0, 'Completed'),
(48, 'REF_ID. 16797973', 0, 200, 0, '2023-11-01', 'POS', 'POS', '', '', 'Marc', 'Macapagal', '', '', '', '', 0, 'Completed'),
(49, 'REF_ID. 92537932', 0, 700, 0, '2023-11-01', 'POS', 'POS', '', '', 'Rhadjie', 'Hulleza', '', '', '', '', 0, 'Completed'),
(50, 'REF_ID. 69248303', 0, 300, 0, '2023-11-01', 'POS', 'POS', '', '', 'Nanette', 'Cusi', '', '', '', '', 0, 'Completed'),
(51, 'REF_ID. 35588078', 0, 500, 0, '2023-11-01', 'POS', 'POS', '', '', 'Cel', 'Soco', '', '', '', '', 0, 'Completed'),
(52, 'REF_ID. 92295962', 0, 1550, 0, '2023-11-01', 'POS', 'POS', '', '', 'Edna', 'Barrientos', '', '', '', '', 0, 'Completed'),
(333, '#940HE7652LZX13', 23, 500, 0, '2023-10-26', 'Online', 'Order', '650', 'aileenrs27@gmail.com', 'Rebecca', 'Aileen', '09175152375', 'Calapan City', 'Canubing I', 'Pajo', 150, 'Received'),
(334, '#A216M9348P0X', 24, 15000, 0, '2023-10-29', 'Online', 'Upload', '40122939126701', 'mndza_lee556@gmail.com', 'Lee', 'Mendoza', '09185994113', 'Calapan City', 'Guinobatan', 'Corehousing', 100, 'Received'),
(335, '#84K1SXO92375', 25, 1000, 0, '2023-10-31', 'Online', 'Upload', '09482717017', 'ma_cyntss1990@gmail.com', 'Cynthia', 'Hernandez', '09482817017', 'Calapan City', 'Mahal na Pangalan', 'Ubasan', 100, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_image` text NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_color` varchar(255) NOT NULL,
  `item_amount` int(11) NOT NULL DEFAULT 0,
  `item_qty` int(11) NOT NULL,
  `details` text NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `fk_order_id`, `product_id`, `item_image`, `item_name`, `item_color`, `item_amount`, `item_qty`, `details`, `order_date`) VALUES
(12, 7, 6, '', 'BFS_265', '', 1300, 2, '', '2023-10-10'),
(14, 9, 5, '1683537635_c94df0d87837ec9db7a2.jpg', 'BFS_379', '', 1400, 1, '', '2023-10-09'),
(15, 10, 0, '', 'Rhadus', '', 45, 1, '', '2023-10-10'),
(20, 12, 44, '', 'BFS 762', '', 100, 2, '', '2023-11-05'),
(21, 13, 49, '', 'BFS 708', '', 250, 1, '', '2023-11-05'),
(22, 14, 0, '', 'Rose', '', 50, 3, '', '2023-11-05'),
(23, 15, 44, '', 'BFS 762', '', 100, 2, '', '2023-11-05'),
(24, 16, 0, '', 'Sunflower', '', 75, 2, '', '2023-11-05'),
(25, 17, 50, '', 'BFS 872', '', 800, 1, '', '2023-11-05'),
(26, 18, 43, '', 'BFS 539', '', 100, 30, '', '2023-11-05'),
(27, 19, 43, '', 'BFS 539', '', 100, 4, '', '2023-11-05'),
(28, 20, 0, '', 'Glass', '', 150, 5, '', '2023-11-05'),
(29, 21, 0, '', 'Rhadus', '', 40, 24, '', '2023-11-05'),
(30, 22, 42, '', 'BFS 934', '', 100, 20, '', '2023-11-05'),
(31, 23, 44, '', 'BFS 762', '', 100, 5, '', '2023-11-05'),
(32, 24, 45, '', 'BFS 451', '', 100, 12, '', '2023-11-05'),
(33, 25, 49, '', 'BFS 708', '', 250, 2, '', '2023-11-05'),
(34, 26, 51, '', 'BFS 413', '', 350, 3, '', '2023-11-05'),
(35, 26, 49, '', 'BFS 708', '', 250, 3, '', '2023-11-05'),
(36, 26, 44, '', 'BFS 762', '', 100, 8, '', '2023-11-05'),
(37, 27, 0, '', 'Glass', '', 150, 3, '', '2023-11-05'),
(38, 27, 0, '', 'Cover', '', 200, 3, '', '2023-11-05'),
(39, 28, 0, '', 'Rhadus', '', 40, 4, '', '2023-11-05'),
(40, 28, 0, '', 'Rhadus', '', 40, 6, '', '2023-11-05'),
(41, 28, 0, '', 'Glass', '', 150, 1, '', '2023-11-05'),
(42, 28, 0, '', 'Vigil', '', 10, 5, '', '2023-11-05'),
(43, 29, 42, '', 'BFS 934', '', 100, 7, '', '2023-11-05'),
(44, 29, 49, '', 'BFS 708', '', 250, 1, '', '2023-11-05'),
(47, 32, 54, '1699424314_cd72574b832554c722fb.jpg', 'BFS 170', '', 500, 1, '', '2023-11-08'),
(48, 32, 44, '1699179133_0dfea621ef40f063e820.jpg', 'BFS 762', '', 100, 1, '', '2023-11-08'),
(49, 33, 0, '', 'Vigil', '', 10, 3, '', '2023-11-08'),
(55, 37, 44, '', 'BFS 762', '', 100, 4, '', '2023-11-16'),
(56, 38, 49, '', 'BFS 708', '', 250, 1, '', '2023-11-16'),
(57, 38, 44, '', 'BFS 762', '', 100, 2, '', '2023-11-16'),
(58, 39, 52, '', 'BFS 593', '', 500, 1, '', '2023-11-16'),
(59, 39, 44, '', 'BFS 762', '', 100, 1, '', '2023-11-16'),
(60, 40, 45, '', 'BFS 451', '', 100, 10, '', '2023-11-16'),
(61, 41, 44, '', 'BFS 762', '', 100, 2, '', '2023-11-16'),
(62, 41, 49, '', 'BFS 708', '', 250, 3, '', '2023-11-16'),
(63, 42, 43, '', 'BFS 539', '', 100, 20, '', '2023-11-16'),
(64, 42, 49, '', 'BFS 708', '', 250, 10, '', '2023-11-16'),
(65, 43, 51, '', 'BFS 413', '', 350, 1, '', '2023-11-16'),
(66, 44, 0, '', 'Glass', '', 150, 1, '', '2023-11-16'),
(67, 45, 0, '', 'Rhadus', '', 40, 12, '', '2023-11-16'),
(68, 45, 0, '', 'Rhadus', '', 40, 24, '', '2023-11-16'),
(69, 46, 49, '', 'BFS 708', '', 250, 2, '', '2023-11-16'),
(70, 46, 52, '', 'BFS 593', '', 500, 2, '', '2023-11-16'),
(71, 46, 42, '', 'BFS 934', '', 100, 6, '', '2023-11-16'),
(72, 47, 0, '', 'Glass', '', 150, 2, '', '2023-11-16'),
(73, 48, 44, '', 'BFS 762', '', 100, 2, '', '2023-11-16'),
(74, 49, 44, '', 'BFS 762', '', 100, 2, '', '2023-11-16'),
(75, 49, 52, '', 'BFS 593', '', 500, 1, '', '2023-11-16'),
(76, 50, 44, '', 'BFS 762', '', 100, 3, '', '2023-11-16'),
(77, 51, 44, '', 'BFS 762', '', 100, 5, '', '2023-11-16'),
(78, 52, 52, '', 'BFS 593', '', 500, 1, '', '2023-11-16'),
(79, 52, 51, '', 'BFS 413', '', 350, 3, '', '2023-11-16'),
(408, 333, 9, '1683538031_ad1ceaf9e2c0acfb7e39.jpg', 'BFS_467', '', 500, 1, '', '2023-10-26'),
(409, 334, 0, '1702517010_272a3b3009d6f291516f.jpg', 'Custom', '', 5000, 3, 'Condolence from Mendoza Family, just copy the design thank you', '2023-10-29'),
(410, 335, 0, '1702517751_47f980b19402c6f8e4c4.jpg', 'Custom', '', 1000, 1, 'kulay black ung wrapper, then ung ribbon is white then copy nlng ung design', '2023-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `payment_data`
--

CREATE TABLE `payment_data` (
  `id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `reference_id` varchar(100) NOT NULL,
  `proof_image` text NOT NULL,
  `total_payment` decimal(10,0) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('Pending','Completed') NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_data`
--

INSERT INTO `payment_data` (`id`, `fk_id`, `reference_id`, `proof_image`, `total_payment`, `email`, `status`, `payment_date`) VALUES
(1, 4, '12345678', '1697461698_27f996ae7f7ba161822f.jpg', 100, 'carlosbernales24@gmail.com', 'Completed', '2023-11-20'),
(2, 11, '1234567890p', '1700459819_c668612fe2ed2c7361f7.jpg', 5000, 'carlosbernales24@gmail.com', 'Completed', '2023-11-20'),
(3, 11, '1234567890p', '1700460122_17ce08b74fd3de18c7e8.jpg', 10000, 'carlosbernales24@gmail.com', 'Pending', '2023-11-20'),
(4, 13, '3013 307 470862', '1701047152_bfd6b0cc7c16d66f1674.jpg', 5000, 'carlosbernales24@gmail.com', 'Completed', '2023-11-27'),
(5, 13, '1234456', '', 500, 'carlosbernales24@gmail.com', 'Completed', '2023-12-11'),
(6, 14, '1234567890p', '', 1000, 'carlosbernales24@gmail.com', 'Completed', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_des` text DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT 1,
  `availability` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_name`, `category_id`, `product_name`, `product_des`, `product_price`, `product_qty`, `availability`, `product_image`, `created_at`, `updated_at`) VALUES
(3, 'Flowers Bouquet', 1, 'BFS_178', 'This flower bouquet is compose of 1 Sunflower, Assorted Carnation flowers, Light Violet Snapdragon.', 650, 1, 'Available', '1683536668_84e1ec5b2ca39411a9aa.jpg', '2023-05-08 04:04:28', '2023-09-21 09:17:08'),
(5, 'Flowers Bouquet', 1, 'BFS_379', 'This flower bouquet is composed of 3 Sunflowers, 3 Roses, Green Leaves, Chrysanthemum, and Lilys', 1400, 1, 'Available', '1683537635_c94df0d87837ec9db7a2.jpg', '2023-05-08 04:20:35', '2023-06-24 03:00:30'),
(6, 'Flowers Bouquet', 1, 'BFS_265', 'This flower bouquet is composed of Assorted Carnation, 2 Red Roses, 2 Peach Roses, Tulips and Green Leaves.', 1300, 1, 'Available', '1683537771_285548e4ada696a01dad.jpg', '2023-05-08 04:22:51', '2023-06-24 03:01:11'),
(7, 'Flowers Bouquet', 1, 'BFS_620', 'This flower bouquet is composed of 10 Red Roses, 10 Pink Roses, Assorted carnation, and White Aster', 900, 1, 'Available', '1683537842_8690f6813ae82e809aaa.jpg', '2023-05-08 04:24:02', '2023-06-24 03:01:22'),
(8, 'Flowers Bouquet', 1, 'BFS_820', 'This flower is composed of 3 Red Roses, 4 Yellow Carnation, Green leaves and White Aster', 750, 1, 'Available', '1683537921_b2b53e6d7ffdd04d8ca5.jpg', '2023-05-08 04:25:21', '2023-06-29 05:53:06'),
(9, 'Flowers Bouquet', 1, 'BFS_467', 'This flower bouquet is composed of 3 Red Roses, White Carnation Flowers, Green Leaves and White Aster', 500, 1, 'Available', '1683538031_ad1ceaf9e2c0acfb7e39.jpg', '2023-05-08 04:27:11', '2023-06-24 03:01:39'),
(41, 'Flowers Bouquet', 1, 'BFS 413', 'Compose of 3 pieces of red roses, pink rhadus, and aster with plastic cover and pink wrapper', 350, 1, 'Available', '1699178860_43de319c48dc2a9b952d.jpg', '2023-11-05 04:07:40', '0000-00-00 00:00:00'),
(42, 'Base Flowers', 21, 'BFS 934', 'Foam based with fresh green leaves and assorted rhadus flowers.', 100, 1, 'Available', '1699178928_a55949d8de037972a5e3.jpg', '2023-11-05 04:08:48', '0000-00-00 00:00:00'),
(43, 'Base Flowers', 21, 'BFS 539', 'Foam based with fresh green leaves and assorted rhadus flowers.', 100, 1, 'Available', '1699179022_ede51b0764f97125163c.jpg', '2023-11-05 04:10:22', '0000-00-00 00:00:00'),
(44, 'Base Flowers', 21, 'BFS 762', 'Foam based with fresh green leaves and assorted rhadus flowers.', 100, 1, 'Available', '1699179133_0dfea621ef40f063e820.jpg', '2023-11-05 04:12:13', '0000-00-00 00:00:00'),
(45, 'Base Flowers', 21, 'BFS 451', 'Foam based with fresh green leaves and assorted rhadus flowers.', 100, 1, 'Available', '1699179164_883bd7fcc820cdaafb78.jpg', '2023-11-05 04:12:44', '0000-00-00 00:00:00'),
(46, 'Dried Bouquet', 22, 'BFS 85', 'Compose of wooden brown flowers and dried aster with abaca and black and white wrapper', 600, 1, 'Available', '1699179342_59c53913bbdbc4beddb6.jpg', '2023-11-05 04:15:42', '0000-00-00 00:00:00'),
(47, 'Dried Bouquet', 22, 'BFS 255', 'Compose of wooden peach flowers, with dried assorted aster, abaca and with pink wrapper', 500, 1, 'Available', '1699179431_fd3aced90b947d2180e0.jpg', '2023-11-05 04:17:11', '0000-00-00 00:00:00'),
(48, 'Dried Bouquet', 22, 'BFS 251', 'Compose of wooden flowers, with assorted dried aster and flower wrapper', 500, 1, 'Available', '1699179497_fddd5d7bb6b33a243552.jpg', '2023-11-05 04:18:17', '0000-00-00 00:00:00'),
(49, 'Base Flowers', 21, 'BFS 708', 'Based pot with assorted rhadus flowers and fresh green leaves.', 250, 1, 'Available', '1699179727_d8b7d45a111d4f1d315e.jpg', '2023-11-05 04:22:07', '0000-00-00 00:00:00'),
(50, 'Flowers Bouquet', 1, 'BFS 872', 'Compose of 3 fresh sunflowers, white wrapper and abaca', 800, 1, 'Available', '1699181697_b23aaf5ea7fa0f5ab39f.jpg', '2023-11-05 04:54:57', '0000-00-00 00:00:00'),
(51, 'Base Flowers', 21, 'BFS 413', 'Foam based medium size, compose of fresh green leaves and assorted rhadus flowers.', 350, 1, 'Available', '1699183132_fcaa649d371081dfc1a4.jpg', '2023-11-05 05:18:52', '0000-00-00 00:00:00'),
(52, 'Base Flowers', 21, 'BFS 593', 'Basket flower compose of fresh green leaves and assorted rhadus flowers.', 500, 1, 'Available', '1699183177_58b305709d819b1f9435.jpg', '2023-11-05 05:19:37', '0000-00-00 00:00:00'),
(53, 'Base Flowers', 21, 'BFS 119', 'Large basket size compose of assorted rhauds flowers with tagoko aster.', 1200, 1, 'Available', '1699183245_ba20c36e295b6ca6b6e1.jpg', '2023-11-05 05:20:45', '0000-00-00 00:00:00'),
(54, 'Flowers Bouquet', 1, 'BFS 170', 'good', 500, 1, 'Available', '1699424314_cd72574b832554c722fb.jpg', '2023-11-08 00:18:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `fk_order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `variation` int(11) NOT NULL,
  `rating` text NOT NULL,
  `review` text NOT NULL,
  `response` text NOT NULL,
  `status` set('Pending','Replied','Dismissed') NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `fk_order_id`, `name`, `variation`, `rating`, `review`, `response`, `status`, `date`) VALUES
(5, 9, 333, 'Rebecca Aileen', 1, '5', 'ganda ng pagkakabouquet and on time sa delivery', 'Salamat po', 'Replied', '2023-10-26'),
(6, 0, 334, 'Lee Mendoza', 3, '5', 'fresh mga bulaklak at maayos salamat po', 'salamat po', 'Replied', '2023-10-29'),
(7, 0, 335, 'Cynthia Hernandez', 1, '5', 'Salamat po ang ganda', 'Salamat din po', 'Replied', '2023-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `shipinfo_checkout`
--

CREATE TABLE `shipinfo_checkout` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `selected_city` varchar(100) NOT NULL,
  `selected_barangay` varchar(100) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `other_infoaddres` text NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipinfo_checkout`
--

INSERT INTO `shipinfo_checkout` (`id`, `firstname`, `lastname`, `contact`, `selected_city`, `selected_barangay`, `barangay_id`, `shipping_fee`, `city_id`, `other_infoaddres`, `fk_user_id`) VALUES
(1, 'Carlos', 'Bernales', '09951776920', 'Baco', 'Dulangan II', 1, 210, 2, 'Lungos, malapit sa tulay', 2),
(2, 'raven', 'orops', '09508696193', 'Naujan', 'Bacungan', 109, 0, 3, 'Caringal St.', 4),
(3, 'Lee', 'Mendoza', '09185994113', 'Calapan City', 'Guinobatan', 32, 100, 6, 'Corehousing', 24),
(4, 'raven', 'poro', '09508696193', 'Baco', 'Pambisan', 91, 260, 2, 'ert', 21),
(5, 'Carlos', 'Bernales', '09951776920', 'Calapan City', 'Masipit', 47, 100, 6, '535, Caringal Street, Near Tower', 20),
(6, '', '', '', '', '', 0, 0, 0, '', 0),
(7, 'Rebecca', 'Aileen', '09175152375', 'Calapan City', 'Canubing I', 29, 150, 6, 'Pajo', 23),
(8, 'cynthia', 'Hernandez', '09482817017', 'Calapan City', 'Mahal na Pangalan', 42, 100, 6, 'Ubasan', 25);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `selected_city` varchar(255) NOT NULL,
  `selected_barangay` varchar(255) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `other_infoaddres` text NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_info`
--

INSERT INTO `shipping_info` (`id`, `firstname`, `lastname`, `contact`, `selected_city`, `selected_barangay`, `barangay_id`, `shipping_fee`, `city_id`, `other_infoaddres`, `fk_user_id`) VALUES
(1, 'Carlos', 'Bernales', '09951776920', 'Baco', 'Dulangan II', 1, 210, 2, 'Lungos, malapit sa tulay', 2),
(2, 'raven', 'orops', '09508696193', 'Naujan', 'Bacungan', 109, 0, 3, 'Caringal St.', 4),
(4, 'd', 'f', '09321654987', 'Calapan City', 'Baruyan', 17, 180, 6, 'fdf', 26),
(5, 'raven', 'poro', '09508696193', 'Baco', 'Pambisan', 91, 260, 2, 'ert', 21),
(6, 'raven', 'poro', '09508696193', 'Calapan City', 'Masipit', 47, 100, 6, 'Caringal St.', 21),
(19, 'Carlos', 'Bernales', '09951776920', 'Calapan City', 'Masipit', 47, 100, 6, '535, Caringal Street, Near Tower', 20),
(23, 'Rebecca', 'Aileen', '09175152375', 'Calapan City', 'Canubing I', 29, 150, 6, 'Pajo', 23),
(24, 'Lee', 'Mendoza', '09185994113', 'Calapan City', 'Guinobatan', 32, 100, 6, 'Corehousing', 24),
(25, 'cynthia', 'Hernandez', '09482817017', 'Calapan City', 'Mahal na Pangalan', 42, 100, 6, 'Ubasan', 25);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `stock_category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT 'Default',
  `image` text NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `fix_stock_qty` int(11) NOT NULL,
  `stock_price` float NOT NULL,
  `bundle_price` float NOT NULL,
  `goods` int(11) NOT NULL,
  `reject` int(11) NOT NULL,
  `rejectprice` float NOT NULL,
  `goodprice` float NOT NULL,
  `investment` float NOT NULL,
  `revenue` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_category_id`, `category_name`, `product_name`, `color`, `image`, `stock_qty`, `fix_stock_qty`, `stock_price`, `bundle_price`, `goods`, `reject`, `rejectprice`, `goodprice`, `investment`, `revenue`, `created_at`) VALUES
(23, 2, 'Fresh Flowers', 'Wonder', 'Default', '1699176881_d9ce1ccf1c28f032d8c9.jpg', 24, 12, 40, 700, 0, 0, 0, 0, 700, 0, '2023-11-05 03:34:41'),
(25, 2, 'Fresh Flowers', 'Sunflower', 'Yellow', '1699177491_48eb5baffe4067c9e3dc.jpg', 24, 12, 75, 3000, 0, 0, 0, 0, 3000, 0, '2023-11-05 03:39:07'),
(26, 2, 'Fresh Flowers', 'Rose', 'Red', '1702287297_33cf851ba850ff615dca.jpg', 36, 12, 50, 4800, 0, 0, 0, 0, 4800, 0, '2023-11-05 03:45:31'),
(28, 11, 'Candle', 'Vigil', 'White', '1699177674_d42056d259bec57f6a95.jpg', 75, 25, 10, 750, 0, 0, 0, 0, 750, 0, '2023-11-05 03:47:54'),
(29, 11, 'Candle', 'Glass', 'White', '1699177751_2f03fbdedea690bde553.jpg', 10, 10, 150, 150, 0, 0, 0, 0, 150, 0, '2023-11-05 03:49:11'),
(30, 11, 'Candle', 'Cover', 'White', '1699177799_38a472560ab9d5ef0b49.jpg', 5, 5, 200, 200, 0, 0, 0, 0, 200, 0, '2023-11-05 03:49:59'),
(31, 10, 'Wooden Flowers', 'Wooden Flower', 'Default', '1699177945_dd9918abab270a34396f.jpg', 36, 12, 100, 1050, 0, 0, 0, 0, 1050, 0, '2023-11-05 03:52:25'),
(32, 12, 'Dried Leaves', 'Anahaw', 'Default', '1699177992_512f14744d3307d780b6.jpg', 24, 12, 35, 700, 0, 0, 0, 0, 700, 0, '2023-11-05 03:53:12'),
(33, 15, 'Others', 'Broom', 'Default', '1699178033_53521acecebdd33b18bf.jpg', 5, 5, 120, 120, 0, 0, 0, 0, 120, 0, '2023-11-05 03:53:53'),
(34, 14, 'Basket', 'Small Basket', 'Default', '1699178067_12a38434ccced0cf1aa1.jpg', 1, 1, 450, 0, 0, 0, 0, 0, 350, 0, '2023-11-05 03:54:27'),
(35, 14, 'Basket', 'Medium Basket', 'Default', '1699178089_2ef6c272696823106c3f.jpg', 1, 1, 450, 450, 0, 0, 0, 0, 450, 0, '2023-11-05 03:54:49'),
(36, 14, 'Basket', 'Large Basket', 'Default', '1699178110_94cf0e3101266830ab71.jpg', 1, 1, 550, 550, 0, 0, 0, 0, 550, 0, '2023-11-05 03:55:10'),
(37, 13, 'Pot', 'Base Pot', 'Default', '1699178205_fe9e0061e9f29ba17b13.jpg', 5, 5, 300, 300, 0, 0, 0, 0, 300, 0, '2023-11-05 03:56:45'),
(38, 13, 'Pot', 'Big Pot', 'Default', '1699178338_5af6ad83c622d41169b9.jpg', 1, 1, 1000, 1000, 0, 0, 0, 0, 1000, 0, '2023-11-05 03:58:58'),
(39, 3, 'Ribbon', 'Satin', 'Red', '1699178461_2694959c7432c6c256bd.jpg', 50, 50, 12, 12, 0, 0, 0, 0, 12, 0, '2023-11-05 04:01:01'),
(40, 3, 'Ribbon', 'Satin', 'Blue', '1699178495_7ba75235df605859be3f.jpg', 50, 50, 12, 12, 0, 0, 0, 0, 12, 0, '2023-11-05 04:01:35'),
(41, 3, 'Ribbon', 'Satin', 'Pink', '1699178608_16540d6b8cabe09fee60.jpg', 50, 50, 12, 12, 0, 0, 0, 0, 12, 0, '2023-11-05 04:03:28'),
(42, 3, 'Ribbon', 'Satin', 'Violet', '1699178631_cdbefe91d5b4580c9956.jpg', 50, 50, 12, 12, 0, 0, 0, 0, 12, 0, '2023-11-05 04:03:51'),
(43, 3, 'Ribbon', 'Satin', 'Light Green', '1699178661_b49aaed1e31c89bfafc7.jpg', 50, 50, 12, 12, 0, 0, 0, 0, 12, 0, '2023-11-05 04:04:21'),
(44, 3, 'Ribbon', 'Satin', 'Royal Blue', '1699178694_58428a868c3f546e7025.jpg', 50, 50, 12, 12, 0, 0, 0, 0, 12, 0, '2023-11-05 04:04:54'),
(45, 15, 'Others', 'Trigo', 'Default', '1699179577_4e9a73d4bfcb3aa00996.jpg', 12, 12, 150, 150, 0, 0, 0, 0, 150, 0, '2023-11-05 04:19:37'),
(46, 4, 'Wrapper', 'Wrapper', 'Black', '1700136158_b13f9e6287e63eb11617.png', 20, 10, 15, 200, 0, 0, 0, 0, 400, 0, '2023-11-16 06:02:38'),
(47, 4, 'Wrapper', 'Wrapper', 'Light Pink', '1700136218_7b53178c583d83b88553.png', 20, 20, 15, 200, 0, 0, 0, 0, 200, 0, '2023-11-16 06:03:38'),
(48, 4, 'Wrapper', 'Wrapper', 'Violet', '1700136268_5d960383d4f851d7c471.png', 20, 20, 15, 200, 0, 0, 0, 0, 200, 0, '2023-11-16 06:04:28'),
(49, 2, 'Fresh Flowers', 'Rhadus', 'White', '1702287377_44e24eb8a337672bbd74.jpg', 36, 12, 40, 1350, 0, 0, 0, 0, 1350, 0, '2023-12-11 03:36:17'),
(50, 2, 'Fresh Flowers', 'Rhadus', 'Yellow', '1702287426_7ccdf827dd86a4305c22.jpg', 36, 12, 45, 1350, 0, 0, 0, 0, 1350, 0, '2023-12-11 03:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_category`
--

CREATE TABLE `stocks_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks_category`
--

INSERT INTO `stocks_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Fresh Flowers', '2023-06-24 23:29:47', '2023-06-24 23:35:00'),
(3, 'Ribbon', '2023-06-24 23:30:20', '2023-07-06 08:22:47'),
(4, 'Wrapper', '2023-06-24 23:32:14', '2023-06-25 15:50:51'),
(10, 'Wooden Flowers', '2023-11-05 03:26:02', '2023-11-05 03:50:39'),
(11, 'Candle', '2023-11-05 03:26:11', '0000-00-00 00:00:00'),
(12, 'Dried Leaves', '2023-11-05 03:26:30', '0000-00-00 00:00:00'),
(13, 'Pot', '2023-11-05 03:26:37', '0000-00-00 00:00:00'),
(14, 'Basket', '2023-11-05 03:26:46', '0000-00-00 00:00:00'),
(15, 'Others', '2023-11-05 03:27:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gcash_no` varchar(100) NOT NULL,
  `gcash_qr` text NOT NULL,
  `signature_image` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('verified','not_verified') NOT NULL,
  `role` enum('Admin','Superadmin','User','Employee') NOT NULL,
  `token` text NOT NULL,
  `tokens` text NOT NULL,
  `otp` text NOT NULL,
  `otp_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `phone`, `gcash_no`, `gcash_qr`, `signature_image`, `address`, `password`, `status`, `role`, `token`, `tokens`, `otp`, `otp_timestamp`, `created_at`) VALUES
(2, 'Carlos', 'Laurel', 'sarahelmenzo13@gmail.com', '09951776920', '', '', '', 'Masipit, Calapan City', '$2y$10$sXByNoD4A5RBghFcnC79EevoDMH/aW5Y1Uz3pS33n1YhWKkQ0iGoi', 'verified', 'Admin', 'WEjMQ9RXH2bmYqcCrAzdLnawilgOGxI4BDTptV6FUZK5No37Sef08PsvhukJy1', '', '', '2023-11-27 01:57:03', '2023-09-23 00:32:41'),
(19, 'Jenny', 'Acedillo', 'bituinflowershop@gmail.com', '0919 508 9652', '09511094616', '1704855920_05764888abea74469167.jpg', '1704855920_cfbe96942b3b14794386.png', 'Jp. Rizal Street, Brgy. Ilaya, Calapan City (beside of halina bakery), Oriental Mindoro, Philippines', '$2y$10$QoLQpcRwKX0mAG2GSNiKP.UmScM7oDgypjYBtIj9OcUEWBb9R14Vm', 'verified', 'Superadmin', '', '90750fd210a2b97d44a603e4116995cc7ca5a9ceb27aee5f10260ff95b4a2089', '711489', '2024-01-16 07:37:24', '2023-10-13 01:39:41'),
(20, 'Carlos', 'Bernales', 'carlosbernales24@gmail.com', '09951776920', '', '', '', 'Masipit, Calapan City ', '$2y$10$daE0xNuCQf0.n6PbeZVxU.INagSlgP6nrIvXr12qAtIx/CD.ITYDG', 'verified', 'User', 'gt07yoLZrXQ15ObPCvMJhSRA8qjHID6wik4VpGYmNnWlxEFKzaec93UfdsB2Tu', '59f741317e1bc9220df69fb1d36b7d89bcdb534e8b223c6b650f60882db73874', '550153', '2023-12-05 10:23:50', '2023-10-13 01:46:35'),
(21, 'Raven', 'Poro', 'johnravenporo01@gmail.com', '09508474699', '', '', '', 'Suqui', '$2y$10$ZnrOXw05S0t8KHpJBGko0e4AsZxY/OxQtdO2RShv7tN34Zq8AbdvC', 'verified', 'User', 'gU8CE7HQy0pR4c3oMXma1qWFj6YuSnBDxl2GrtIdVskAeOhvNb9ZJzf5LKPwTi', '', '', '2023-11-29 13:43:31', '2023-10-14 01:52:43'),
(22, 'Tem', 'Cueto', 'temcueto@gmail.com', '09774034444', '', '', '', 'Tawiran', '$2y$10$v9BO.ffU/ZmVEp3mqWct6ee.h.AfGeT/eYGaF3VgQC8K9ID322DcK', 'verified', 'User', '3B4MctEDQgH0hXjuaiZJKfRmz26bOPFqVrplAokCxIsYUv1GdneT579SyN8LwW', '', '', '2023-11-29 13:43:23', '2023-11-05 05:03:08'),
(23, 'Rebecca', 'Aileen', 'aileenrs27@gmail.com', '09175152375', '', '', '', 'Canubing 1, Calapan City', '$2y$10$ULEUfKNZ1UwsA5vdkuMrKu5hL/lfaswWR1ke6Z9FYXCxUfCfVBwoi', 'verified', 'User', 'vt3HAYV9uJLoTdUXDfeGbc8KnhZBNCEa1Om2rPWIRMjpSwg750li6kqQ4xyFsz', '', '', '2023-12-14 01:04:53', '2023-10-25 09:05:24'),
(24, 'Lee', 'Mendoza', 'mndza_lee556@gmail.com', '09185994113', '', '', '', 'Guinobatan, Calapan City', '$2y$10$p/zjzmntv4pDL7CxDhyFx.vQtWJOWhV/.NeH8wJb27WYiEXr8ZsEi', 'verified', 'User', 'EGWR5tOBZkHhMnDUbT7qyAsvV1liFmXSdzoPLr6Y3pwKajuNg0QJcIeC4f92x8', '', '', '2023-12-14 01:04:58', '2023-10-29 18:53:37'),
(25, 'Cynthia', 'Hernandez', 'ma_cyntss1990@gmail.com', '09482817017', '', '', '', 'Mahal Na Pangalan', '$2y$10$tLLgTAmUKn09R2FiZfeFze5xSaA635V61zXFXdvO8bwCBFMXTBiUi', 'verified', 'User', 'huZkNvC5WGD307TcLIm1lfaBisdexJXrYgb2ojA4qMtFEHSPQO8UznKpRyw9V6', '', '', '2023-12-14 01:05:02', '2023-10-31 10:57:35'),
(26, 'Arnelli', 'Madrigal', 'madrigalarnelli25250231@gmail.com', '09810082598', '', '', '', 'bagong pook batrangay palhi calapan city ', '$2y$10$ywNWoo.p5un3rlvU7VvOcuiDkRKEuZn/bJLUYx6GnE5T4bmtlkSe6', 'verified', 'User', '1RDzU7C8QIAJPcuxBh0EHjyTZMenVSa3Nvlbi5tGpskOmYqL62XKwfrWoFd94g', '', '', '2023-12-14 01:02:11', '2023-11-07 23:51:01'),
(27, 'Roxanne', 'Madrigal', 'roxane_madrigal3304.com', '09684464430', '', '', '', 'bagong pook batrangay palhi calapan city ', '$2y$10$cGOjDJEN.PxQGvfoftYLWehqPaeCZIEiM3UwEPbo66KYvMKfCd4Ye', 'verified', 'User', 'RigKfDl6Uo9MAkyr1G0esjacqTtxunHELh54wISbzd38QBFmP7WVvJXY2CNZOp', '', '', '2023-12-14 01:02:13', '2023-11-07 23:51:55'),
(28, 'Allan', 'Mangubat', 'customer@gmail.com', '09076553345', '', '', '', 'Del Pilar', '$2y$10$4PKc5k9nxr2s7BG7i0rWAOPYKzE9GqaHcYRyfxIQrtsmza.gKdfw6', 'verified', 'User', 'mKGzTZASkjcaI4dhuUY6t0BOe9vq7QfbwE3XgH2sn1yPlpRFVrLWoNJD8CixM5', '', '', '2023-12-14 01:02:16', '2023-11-08 07:10:48'),
(29, 'Jefferson', 'Cusi', 'jefferson.cusi28@gmail.com', '09076552235', '', '', '', 'Bayanan 2', '$2y$10$PIk/faiV6l0ZsNr2Ql20pu.w2TdXO2d146dOY7dL8lUQMqErjm/oW', 'verified', 'User', 'QLnuxWeYjGgBa2ItC8y5RwbHqvSF9UX7VzAJmloEpKiTMPhONf0dk6csr31D4Z', '', '', '2023-12-14 01:02:19', '2023-11-08 22:30:53'),
(37, 'Elmar', 'Madrigal', 'mymykimpay@gmail.com', '09951776920', '', '', '', 'Ilaya', '$2y$10$088U3eumJuAsuhxBmDWMf.6nzdgy5t1eFnxHpJAZfTtMBjMnpaI7W', 'verified', 'Employee', '', '', '310299', '2023-12-14 01:01:11', '2023-11-10 22:28:06'),
(38, 'Ryan', 'Santos', 'venven825@gmail.com', '09508474699', '', '', '', 'Suqui', '$2y$10$3Tv0D85jQQzSu8Iw7yWUOeq24tAj7fN/epvsHRxV8rWy4UGWItbtG', 'verified', 'User', '8TPviEINzaJXoAQRnh5cYFOCgLkMZH6DG37r0U4KmBlSusbyWtwdjqpx2V1e9f', '', '', '2023-12-14 01:01:02', '2023-11-25 21:41:59'),
(39, 'Denn', 'Villarez', 'thisisdennuel@gmail.com', '09984253789', '', '', '', 'libis', '$2y$10$jH10yMe3cuSNuCs8Guz0heFBng.H5rUVLpHiR25vJ53KTCzkvgwgS', 'verified', 'User', '3p5ZEjaMOf6vVih7Y9GDQdH14tl2sIUrJcwLx0enSCAXkgKbqoNuR8TyBPFzWm', '', '', '2023-12-14 01:00:59', '2023-11-29 04:33:12'),
(40, 'Rafhael', 'Acedillo', 'rafhaelacedillo22@gmail.com', '09511094616', '', '', '', 'Ilaya Calapan City , Ormin', '$2y$10$pxwYJ9xkQM5.n3WYfU6sDuHuLtIOb1qe0QgFc0oTneFp8ZOsDwbpG', 'verified', 'User', 'cPwEG3ygXZnLuxBNTDr2dvhRM7bOQWpYCU5je9mqAkFHSiotas6lKVzIJ148f0', '', '', '2023-12-14 01:00:56', '2023-11-29 05:07:33'),
(41, 'Eden', 'Florendo', 'edenflorendo123@gmail.com', '09129644931', '', '', '', 'Evangelista, Naujan, Oriental Mindoro ', '$2y$10$TkIm34KbmTNPOg./c0AO0Ohg/e5JHiwWRLplbSYx.KK.c0OX.NZ4W', 'verified', 'User', '96oZjxUbM7fRmND3c2gkviysPKpFtrulBdWnEQ0Aw4hVOS5XCGYIHz8TJaL1eq', '', '', '2023-12-14 01:00:53', '2023-11-29 05:55:48'),
(42, 'keith', 'Librada', 'keithashleylibrada@gmail.com', '09203747815', '', '', '', 'SMV', '$2y$10$LoDvtPHgoWFgjnzdVHlp0edIKSju5fqBUTOCWD7Qt1eQGIDorwaiu', 'verified', 'User', '23IjytDGm81TUXvgCVnsWawrH4F7eZQSO6zpAKi0qJ9dRulcMNYfEkbPoxBhL5', '', '', '2023-12-14 01:00:39', '2023-11-29 17:55:03'),
(43, 'Giolo', 'Evora', 'giolo.evora@gmail.com', '09924401097', '', '', '', 'Ibaba West Calpan City', '$2y$10$5rArVAetPcWNA87nKYHxqOuwc/NnhN3Iyu44k51kieMfLoJ8AIVrC', 'verified', 'User', 'zeIAEmH7Ykrj1lF36M9bT5gtCDGofQOVJNwL2s4cSvRnK8UdhZ0WpxiyuPXaqB', '', '', '2023-12-14 01:00:05', '2023-12-11 21:28:42'),
(71, 'Epie', 'Custodio ', 'epiefcustodio@gmail.com', '09369448036', '', '', '', 'Masipit ', '$2y$10$6LeggsFiyo79Lxvd47RHKOzi2x4onNOwvmOIxnwE7d2tbHRdJ5i/2', 'verified', 'User', 'UxnL0OjIlWMHJDkz6YyvFmaG9XA1N5S7dbioQKCBeuwgf42EVqT3phrPsRt8Zc', '', '', '2023-12-14 06:14:06', '2023-12-14 00:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_data`
--
ALTER TABLE `payment_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipinfo_checkout`
--
ALTER TABLE `shipinfo_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks_category`
--
ALTER TABLE `stocks_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `payment_data`
--
ALTER TABLE `payment_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipinfo_checkout`
--
ALTER TABLE `shipinfo_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `stocks_category`
--
ALTER TABLE `stocks_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
