-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 04:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `charge_id` int(5) NOT NULL,
  `reservation_id` int(5) NOT NULL,
  `payment_method_id` int(5) NOT NULL,
  `charge_description` varchar(50) DEFAULT NULL,
  `charge_amount` decimal(10,2) NOT NULL,
  `charge_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `charge`
--

INSERT INTO `charge` (`charge_id`, `reservation_id`, `payment_method_id`, `charge_description`, `charge_amount`, `charge_status`) VALUES
(1, 3, 1, NULL, 1000.00, '๊Unpaid'),
(2, 4, 9, NULL, 2000.00, '๊Unpaid'),
(3, 5, 8, NULL, 2500.00, '๊Unpaid'),
(4, 6, 6, NULL, 1500.00, '๊Unpaid'),
(5, 7, 8, NULL, 5000.00, 'Paid'),
(6, 8, 2, NULL, 9000.00, '๊Unpaid'),
(7, 9, 3, NULL, 5300.00, 'Unpaid'),
(8, 10, 4, NULL, 2000.00, 'Unpaid'),
(9, 11, 5, NULL, 1000.00, 'Unpaid'),
(10, 12, 7, NULL, 3000.00, '๊Unpaid'),
(18, 10, 10, NULL, 1225.00, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(5) NOT NULL,
  `guest_firstname` varchar(50) NOT NULL,
  `guest_lastname` varchar(50) NOT NULL,
  `guest_email` varchar(100) NOT NULL,
  `guest_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_firstname`, `guest_lastname`, `guest_email`, `guest_phone`) VALUES
(1, 'Lays', 'Green', 'laygreen@gmail.com', '024151789'),
(2, 'Steve', 'Jobs', 'apple@gmail.com', '025789456'),
(3, 'Pand', 'Kratha', 'Korea@gmail.com', '0814567893'),
(4, 'Lufy', 'Monkey', 'roger@mail.co.th', '0881742568'),
(5, 'yokides', 'sedikoy', 'unnamed555@gmail.com', '0845559999'),
(6, 'longtime', 'tosee', 'koba@gmail.com', '024167894'),
(7, 'Kobayashi', 'Watanabe', 'wata@gmail.com', '0921470203'),
(8, 'Tanapat', 'Cherdmanusatian', 'tanapat15486@gmail.com', '0922740934'),
(9, 'Lisa', 'Mitchell', 'LisaMitchell@gmail.com', '0922740025'),
(10, 'John', 'Thomas', 'JohnThomas@gmail.com', '0923740125'),
(11, 'Daniel', 'Rodriguez', 'DanielRodriguez@gmail.com', '0922740911'),
(12, 'Anthony', 'Lopez', 'AnthonyLopez@gmail.com', '0921740456'),
(13, 'Tanapat', 'Cherdmanusatian', 'wata@gmail.com', '0922740456'),
(14, 'Pk', 'Sad', 'unnamed555@gmail.com', '0922740934'),
(15, 'Fukuda', 'Ohana', 'mojinnn@mail.co.th', '0922740964'),
(16, 'Woradon', 'IDK', 'wata@gmail.com', '098564789'),
(17, 'Laura', 'Jackson', 'LauraJackson@hotmail.com', '0922712987'),
(18, 'Linda', 'Jones', 'LindaJones@hotmail.com', '0901740978'),
(19, 'Mark', 'Turner', 'MarkTurner@hotmail.com', '0921230954'),
(20, 'Kimberly', 'Green', 'KimberlyGreen@aol.com', '0621457896'),
(21, 'Helen', 'Adams', 'HelenAdams@aol.com', '0631234569'),
(22, 'Maria', 'Garcia', 'MariaGarcia@yahoo.com', '0961234569'),
(23, 'Donna', 'Young', 'DonnaYoung@yahoo.com', '0961234569'),
(24, 'Charles', 'Gonzalez', 'CharlesGonzalez@yahoo.com', '0814561236'),
(25, 'Susan', 'Moore', 'SusanMoore@yahoo.com', '0671478523'),
(26, 'Edward', 'Nelson', 'EdwardNelson@facebook.com', '0671234569'),
(27, 'Brian', 'King', 'BrianKing@facebook.com', '0851596541'),
(28, 'Dorothy', 'Carter', 'DorothyCarter@facebook.com', '024567894'),
(29, 'pocky', 'reddy', 'pokyred@gmail.com', '0814961234'),
(30, 'true', 'gigatex', 'dtac@gmail.com', '0816231234'),
(31, 'Jason', 'Brown', 'JasonBrown@aol.com', '0614981234'),
(33, 'Pangpond', 'Woradon', 'pangpond.wrd@gmail.com', '0922748963'),
(34, 'Pond', 'Woradon', 'pond.wrd@gmail.com', '0922740823'),
(35, 'Tor', 'Tanapat', 'tor123@gmail.com', '024151743'),
(36, 'Moji', 'Jiraphat', 'moji123@gmail.com', '024151748'),
(37, 'Son', 'Heung', 'son7@gmail.com', '0923457895');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping`
--

CREATE TABLE `housekeeping` (
  `housekeeping_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL,
  `housekeeping_date` date NOT NULL,
  `housekeeping_time` time NOT NULL,
  `housekeeping_task` varchar(50) NOT NULL,
  `housekeeping_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `housekeeping`
--

INSERT INTO `housekeeping` (`housekeeping_id`, `staff_id`, `room_id`, `housekeeping_date`, `housekeeping_time`, `housekeeping_task`, `housekeeping_description`) VALUES
(1, 5, 4, '2023-05-24', '11:03:00', 'Clean', 'keng mak mak leaw'),
(2, 5, 16, '2023-05-11', '00:00:00', 'Clean', NULL),
(3, 5, 16, '2023-05-11', '11:31:00', 'Clean', NULL),
(4, 5, 16, '2023-05-11', '11:31:00', 'Clean', NULL),
(5, 5, 12, '2023-05-11', '10:36:00', 'Clean', NULL),
(6, 5, 12, '2023-05-11', '10:36:00', 'Clean', NULL),
(7, 5, 1, '2023-05-29', '05:49:00', 'Clean', NULL),
(8, 5, 1, '2023-05-29', '02:53:00', 'Clean', NULL),
(9, 5, 3, '2023-05-29', '04:22:00', 'Clean', NULL),
(10, 5, 1, '2023-05-29', '15:51:00', 'Clean', NULL),
(11, 5, 1, '2023-05-01', '16:09:00', 'Clean', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(5) NOT NULL,
  `reservation_id` int(5) NOT NULL,
  `payment_method_id` int(5) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `invoice_amount` decimal(10,0) NOT NULL,
  `invoice_status` varchar(50) NOT NULL,
  `invoice_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `reservation_id`, `payment_method_id`, `invoice_date`, `invoice_amount`, `invoice_status`, `invoice_description`) VALUES
(28, 3, 1, '2023-05-28 18:31:21', 2500, 'Paid', NULL),
(29, 4, 17, '2023-05-28 18:32:11', 4000, 'Pending', NULL),
(30, 5, 18, '2023-05-28 18:32:11', 5000, 'Paid', NULL),
(31, 6, 19, '2023-05-28 18:32:11', 6500, 'Paid', NULL),
(32, 7, 20, '2023-05-28 18:32:11', 8000, 'Paid', NULL),
(33, 8, 21, '2023-05-28 18:32:11', 9000, 'Pending', NULL),
(34, 9, 22, '2023-05-28 18:32:11', 8700, 'Paid', NULL),
(35, 10, 23, '2023-05-28 18:32:11', 5990, 'Pending', NULL),
(36, 11, 24, '2023-05-28 18:32:11', 8900, 'Paid', NULL),
(37, 12, 25, '2023-05-28 18:32:11', 7800, 'Paid', NULL),
(38, 13, 26, '2023-05-28 18:32:11', 6500, 'Paid', NULL),
(39, 14, 27, '2023-05-28 18:32:11', 7000, 'Pending', NULL),
(40, 15, 28, '2023-05-28 18:32:11', 8000, 'Pending', NULL),
(41, 16, 29, '2023-05-28 18:32:11', 6000, 'Pending', NULL),
(42, 17, 16, '2023-05-28 18:32:11', 7200, 'Paid', NULL),
(43, 18, 2, '2023-05-28 18:32:11', 4600, 'Pending', NULL),
(45, 5, 8, '2023-05-29 12:30:00', 2500, 'Pending', NULL),
(46, 6, 6, '2023-05-29 12:30:00', 5100, 'Pending', 'ppp'),
(49, 7, 8, '2023-05-29 15:06:00', 5000, 'Paid', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_method_id` int(5) NOT NULL,
  `select_payment` varchar(50) NOT NULL,
  `select_card` varchar(50) NOT NULL,
  `card_number` varchar(10) NOT NULL,
  `name_on_card` varchar(50) NOT NULL,
  `expiration_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_method_id`, `select_payment`, `select_card`, `card_number`, `name_on_card`, `expiration_date`, `email`, `phone_number`) VALUES
(1, 'Credit cards', 'Mastercard', '1001', 'Phukao', '2025-05-01', 'Phokao@gmail.com', '0912345678'),
(2, 'Dedit cards', 'Mastercard', '1002', 'Pond', '2026-05-01', 'Pond@gmail.com', '0922345678'),
(3, 'Credit cards', 'Mastercard', '1003', 'Torr', '2026-02-05', 'Torr@gmail.com', '0932345678'),
(4, 'Credit cards', 'Mastercard', '1004', 'Moji', '2028-05-01', 'Moji@gmail.com', '0952345678'),
(5, 'Dedit cards', 'Visa', '1005', 'POPO', '2024-02-05', 'Popo@gmail.com', '0952545678'),
(6, 'Credit cards', 'Visa', '1006', 'Paino', '2028-12-01', 'Piapia22@gmail.com', '0920345678'),
(7, 'Credit cards', 'Visa', '1007', 'Choco', '2026-02-05', 'Mask@gmail.com', '0982345678'),
(8, 'Credit cards', 'JCB', '1008', 'John', '2023-08-04', 'Wick@gmail.com', '0922389678'),
(9, 'Dedit cards', 'Mastercard', '1009', 'Fah', '2027-02-05', 'TongFah@gmail.com', '0932345612'),
(10, 'Credit cards', 'Mastercard', '1010', 'Ramin', '2025-06-02', 'Lonebird@gmail.com', '0814965678'),
(11, 'Credit cards', 'Mastercard', '1011', 'Ned Wyatt', '2023-05-23', 'badgest04@gmail.com', '0694268631'),
(12, 'Credit cards', 'Visa', '1012', 'Betsy Craig', '2023-05-25', 'caxolo5842@gmail.com', '084 402 77'),
(13, 'Dedit cards', 'Visa', '1013', 'Neo Donaldson', '2028-05-25', 'caxolo5842@gmail.com', '0814679674'),
(14, 'Credit cards', 'Mastercard', '1014', 'Esmee Watkins', '2028-05-20', 'cu05bb24j@gmail.com', '0805709143'),
(15, 'Dedit cards', 'JCB', '1015', 'Myles Stone', '2027-07-31', '6rc6ils50@gmail.com', '0671351375'),
(16, 'Dedit cards', 'JCB', '1016', 'Shayla Andrews', '2027-08-11', 'zu76aimc@gmail.com', '0671084097'),
(17, 'Dedit cards', 'Visa', '1017', 'Philip Guerra', '2026-03-26', 'ee37n2opf@gmail.com', '0621815915'),
(18, 'Dedit cards', 'Mastercard', '1018', 'Frederick Huber', '2028-01-07', '2itzbg00@gmail.com', '0671409163'),
(19, 'Credit cards', 'Mastercard', '1019', 'Eleanor Roth', '2023-09-30', 'wsl10r@gmail.com', '0971895949'),
(20, 'Dedit cards', 'Visa', '1020', 'Myla Livingston', '2028-02-16', '7cp8t15p4r@gmail.com', '0671221995'),
(21, 'Dedit cards', 'JCB', '1021', 'Athena Walton', '2025-07-14', 'mqawi6a9@gmail.com', '0671479905'),
(22, 'Dedit cards', 'JCB', '1022', 'Jayson Nicholson', '2026-10-30', '9mz2f3kp05@gmail.com', '0844437174'),
(23, 'Credit cards', 'Mastercard', '1023', 'Dennis James', '2024-08-21', '4kgdesqfv@gmail.com', '0671635176'),
(24, 'Dedit cards', 'JCB', '1024', 'Gabriella Barr', '2026-08-28', 'hnorl16@gmail.com', '0843081243'),
(25, 'Dedit cards', 'Visa', '1025', 'Nia Serrano', '2029-07-31', 'dop7rfohmspl@gmail.com', '0841938220'),
(26, 'Credit cards', 'JCB', '1026', 'Adelaide Campbell', '2025-06-28', 'b8hqaomd4@gmail.com', '0664171770'),
(27, 'Credit cards', 'Mastercard', '1027', 'Matthew Collins', '2028-02-04', 'zhgc6e@gmail.com', '0917457904'),
(28, 'Credit cards', 'Visa', '1028', 'Qasim Rios', '2027-05-21', '61phez33dv@gmail.com', '0671390845'),
(29, 'Credit cards', 'JCB', '1029', 'Jorja Quinn', '2026-08-12', 'e5rb9xnqj6xk@gmail.com', '0943679925'),
(30, 'Credit cards', 'Mastercard', '1030', 'Elaine Boyle', '2029-04-11', 'jaop7sdc1w4@gmail.com', '0651529803');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(5) NOT NULL,
  `guest_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `number_of_guest` int(5) NOT NULL,
  `number_of_room` int(5) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `checkIn_date` date NOT NULL,
  `checkOut_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `guest_id`, `staff_id`, `number_of_guest`, `number_of_room`, `reservation_date`, `checkIn_date`, `checkOut_date`) VALUES
(1, 1, 1, 3, 1, '2023-05-28 18:40:33', '2023-05-04', '2023-05-06'),
(2, 4, 1, 3, 1, '2023-05-28 18:40:53', '2023-05-12', '2023-05-13'),
(3, 4, 1, 1, 0, '2023-05-28 16:00:47', '2023-05-27', '2023-05-27'),
(4, 5, 1, 3, 0, '2023-05-28 16:00:54', '2023-05-27', '2023-05-27'),
(5, 7, 1, 4, 0, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(6, 8, 1, 2, 0, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(7, 10, 1, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(8, 11, 1, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(9, 12, 2, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(10, 13, 2, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(11, 14, 2, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(12, 15, 2, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(13, 16, 2, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(14, 17, 2, 4, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(15, 18, 2, 3, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(16, 19, 3, 3, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(17, 20, 3, 3, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(18, 21, 3, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(19, 22, 3, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(20, 23, 3, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(21, 24, 4, 2, 1, '2023-05-28 16:01:36', '2023-05-27', '2023-05-27'),
(22, 25, 4, 2, 1, '2023-05-28 16:01:36', '2023-05-28', '2023-05-30'),
(23, 26, 5, 2, 1, '2023-05-28 16:01:36', '2023-05-28', '2023-05-30'),
(24, 27, 5, 2, 1, '2023-05-28 16:01:36', '2023-05-28', '2023-05-30'),
(25, 28, 5, 1, 1, '2023-05-28 16:01:36', '2023-05-28', '2023-05-31'),
(26, 27, 1, 4, 1, '2023-05-28 18:55:52', '2023-05-25', '2023-05-26'),
(27, 29, 2, 2, 1, '2023-05-29 04:14:12', '2023-05-29', '2023-05-30'),
(28, 30, 4, 4, 1, '2023-05-29 04:14:20', '2023-05-30', '2023-05-31'),
(29, 32, 2, 4, 1, '2023-05-29 04:13:40', '2023-05-29', '2023-05-30'),
(30, 33, 2, 4, 1, '2023-05-29 05:48:00', '2023-05-29', '2023-05-30'),
(31, 34, 2, 1, 1, '2023-05-29 07:35:12', '2023-05-29', '2023-05-30'),
(32, 35, 2, 1, 1, '2023-05-29 07:40:27', '2023-05-29', '2023-05-30'),
(33, 36, 2, 1, 1, '2023-05-29 07:43:06', '2023-06-05', '2023-06-06'),
(34, 37, 2, 1, 1, '2023-05-29 08:02:49', '2023-05-29', '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(5) NOT NULL,
  `season_id` int(5) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_status` varchar(50) NOT NULL,
  `room_available` tinyint(1) NOT NULL,
  `room_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `season_id`, `room_type`, `room_status`, `room_available`, `room_price`) VALUES
(1, 21, 'Standard', 'Clean', 1, 2250),
(2, 1, 'Standard', 'Not Clean', 0, 1500),
(3, 1, 'Standard', 'Not Clean', 0, 1500),
(4, 1, 'Standard', 'Not Clean', 0, 1500),
(5, 1, 'Standard', 'Not Clean', 0, 1500),
(6, 1, 'Standard', 'Not Clean', 0, 1500),
(7, 1, 'Standard', 'Not Clean', 0, 1500),
(8, 1, 'Standard', 'Not Clean', 0, 1500),
(9, 1, 'Standard', 'Not Clean', 1, 1500),
(10, 1, 'Standard', 'Not Clean', 1, 1500),
(11, 1, 'Standard', 'Not Clean', 1, 1500),
(12, 1, 'Standard', 'Not Clean', 1, 1500),
(13, 1, 'Standard', 'Not Clean', 1, 1500),
(14, 1, 'Standard', 'Not Clean', 1, 1500),
(15, 1, 'Standard', 'Not Clean', 1, 1500),
(16, 1, 'Standard', 'Not Clean', 1, 1500),
(17, 1, 'Standard', 'Not Clean', 1, 1500),
(18, 1, 'Standard', 'Not Clean', 1, 1500),
(19, 1, 'Standard', 'Not Clean', 1, 1500),
(20, 1, 'Standard', 'Not Clean', 1, 1500),
(21, 1, 'Deluxe', 'Not Clean', 1, 3000),
(22, 1, 'Deluxe', 'Not Clean', 1, 3000),
(23, 1, 'Deluxe', 'Not Clean', 1, 3000),
(24, 1, 'Deluxe', 'Not Clean', 1, 3000),
(25, 1, 'Deluxe', 'Not Clean', 1, 3000),
(26, 1, 'Deluxe', 'Not Clean', 1, 3000),
(27, 1, 'Deluxe', 'Not Clean', 1, 3000),
(28, 1, 'Deluxe', 'Not Clean', 1, 3000),
(29, 1, 'Deluxe', 'Not Clean', 1, 3000),
(30, 1, 'Deluxe', 'Not Clean', 1, 3000),
(31, 1, 'Deluxe', 'Not Clean', 1, 3000),
(32, 1, 'Deluxe', 'Not Clean', 1, 3000),
(33, 1, 'Deluxe', 'Not Clean', 1, 3000),
(34, 1, 'Deluxe', 'Not Clean', 1, 3000),
(35, 1, 'Deluxe', 'Not Clean', 1, 3000),
(36, 1, 'Deluxe', 'Not Clean', 1, 3000),
(37, 1, 'Deluxe', 'Not Clean', 1, 3000),
(38, 1, 'Deluxe', 'Not Clean', 1, 3000),
(39, 1, 'Deluxe', 'Not Clean', 1, 3000),
(40, 1, 'Deluxe', 'Not Clean', 1, 3000),
(41, 1, 'Suite', 'Not Clean', 1, 4500),
(42, 1, 'Suite', 'Not Clean', 1, 4500),
(43, 1, 'Suite', 'Not Clean', 1, 4500),
(44, 1, 'Suite', 'Not Clean', 1, 4500),
(45, 1, 'Suite', 'Not Clean', 1, 4500),
(46, 1, 'Suite', 'Not Clean', 1, 4500),
(47, 1, 'Suite', 'Not Clean', 1, 4500),
(48, 1, 'Suite', 'Not Clean', 1, 4500),
(49, 1, 'Suite', 'Not Clean', 1, 4500),
(50, 1, 'Suite', 'Not Clean', 1, 4500),
(51, 1, 'Suite', 'Not Clean', 1, 4500),
(52, 1, 'Suite', 'Not Clean', 1, 4500),
(53, 1, 'Suite', 'Not Clean', 1, 4500),
(54, 1, 'Suite', 'Not Clean', 1, 4500),
(55, 1, 'Suite', 'Not Clean', 1, 4500),
(56, 1, 'Suite', 'Not Clean', 1, 4500),
(57, 1, 'Suite', 'Not Clean', 1, 4500),
(58, 1, 'Suite', 'Not Clean', 1, 4500),
(59, 1, 'Suite', 'Not Clean', 1, 4500),
(60, 1, 'Suite', 'Not Clean', 1, 4500),
(61, 2, 'Standard', 'Not Clean', 1, 1500),
(62, 2, 'Standard', 'Not Clean', 1, 1500),
(63, 2, 'Standard', 'Not Clean', 1, 1500),
(64, 2, 'Standard', 'Not Clean', 1, 1500),
(65, 2, 'Standard', 'Not Clean', 1, 1500),
(66, 2, 'Standard', 'Not Clean', 1, 1500),
(67, 2, 'Standard', 'Not Clean', 1, 1500),
(68, 2, 'Standard', 'Not Clean', 1, 1500),
(69, 2, 'Standard', 'Not Clean', 1, 1500),
(70, 2, 'Standard', 'Not Clean', 1, 1500),
(71, 2, 'Standard', 'Not Clean', 1, 1500),
(72, 2, 'Standard', 'Not Clean', 1, 1500),
(73, 2, 'Standard', 'Not Clean', 1, 1500),
(74, 2, 'Standard', 'Not Clean', 1, 1500),
(75, 2, 'Standard', 'Not Clean', 1, 1500),
(76, 2, 'Standard', 'Not Clean', 1, 1500),
(77, 2, 'Standard', 'Not Clean', 1, 1500),
(78, 2, 'Standard', 'Not Clean', 1, 1500),
(79, 2, 'Standard', 'Not Clean', 1, 1500),
(80, 2, 'Standard', 'Not Clean', 1, 1500),
(81, 2, 'Deluxe', 'Not Clean', 1, 3000),
(82, 2, 'Deluxe', 'Not Clean', 1, 3000),
(83, 2, 'Deluxe', 'Not Clean', 1, 3000),
(84, 2, 'Deluxe', 'Not Clean', 1, 3000),
(85, 2, 'Deluxe', 'Not Clean', 1, 3000),
(86, 2, 'Deluxe', 'Not Clean', 1, 3000),
(87, 2, 'Deluxe', 'Not Clean', 1, 3000),
(88, 2, 'Deluxe', 'Not Clean', 1, 3000),
(89, 2, 'Deluxe', 'Not Clean', 1, 3000),
(90, 2, 'Deluxe', 'Not Clean', 1, 3000),
(91, 2, 'Deluxe', 'Not Clean', 1, 3000),
(92, 2, 'Deluxe', 'Not Clean', 1, 3000),
(93, 2, 'Deluxe', 'Not Clean', 1, 3000),
(94, 2, 'Deluxe', 'Not Clean', 1, 3000),
(95, 2, 'Deluxe', 'Not Clean', 1, 3000),
(96, 2, 'Deluxe', 'Not Clean', 1, 3000),
(97, 2, 'Deluxe', 'Not Clean', 1, 3000),
(98, 2, 'Deluxe', 'Not Clean', 1, 3000),
(99, 2, 'Deluxe', 'Not Clean', 1, 3000),
(100, 2, 'Deluxe', 'Not Clean', 1, 3000),
(101, 2, 'Suite', 'Not Clean', 1, 4500),
(102, 2, 'Suite', 'Not Clean', 1, 4500),
(103, 2, 'Suite', 'Not Clean', 1, 4500),
(104, 2, 'Suite', 'Not Clean', 1, 4500),
(105, 2, 'Suite', 'Not Clean', 1, 4500),
(106, 2, 'Suite', 'Not Clean', 1, 4500),
(107, 2, 'Suite', 'Not Clean', 1, 4500),
(108, 2, 'Suite', 'Not Clean', 1, 4500),
(109, 2, 'Suite', 'Not Clean', 1, 4500),
(110, 2, 'Suite', 'Not Clean', 1, 4500),
(111, 2, 'Suite', 'Not Clean', 1, 4500),
(112, 2, 'Suite', 'Not Clean', 1, 4500),
(113, 2, 'Suite', 'Not Clean', 1, 4500),
(114, 2, 'Suite', 'Not Clean', 1, 4500),
(115, 2, 'Suite', 'Not Clean', 1, 4500),
(116, 2, 'Suite', 'Not Clean', 1, 4500),
(117, 2, 'Suite', 'Not Clean', 1, 4500),
(118, 2, 'Suite', 'Not Clean', 1, 4500),
(119, 2, 'Suite', 'Not Clean', 1, 4500),
(120, 2, 'Suite', 'Not Clean', 1, 4500),
(121, 3, 'Standard', 'Not Clean', 1, 1500),
(122, 3, 'Standard', 'Not Clean', 1, 1500),
(123, 3, 'Standard', 'Not Clean', 1, 1500),
(124, 3, 'Standard', 'Not Clean', 1, 1500),
(125, 3, 'Standard', 'Not Clean', 1, 1500),
(126, 3, 'Standard', 'Not Clean', 1, 1500),
(127, 3, 'Standard', 'Not Clean', 1, 1500),
(128, 3, 'Standard', 'Not Clean', 1, 1500),
(129, 3, 'Standard', 'Not Clean', 1, 1500),
(130, 3, 'Standard', 'Not Clean', 1, 1500),
(131, 3, 'Standard', 'Not Clean', 1, 1500),
(132, 3, 'Standard', 'Not Clean', 1, 1500),
(133, 3, 'Standard', 'Not Clean', 1, 1500),
(134, 3, 'Standard', 'Not Clean', 1, 1500),
(135, 3, 'Standard', 'Not Clean', 1, 1500),
(136, 3, 'Standard', 'Not Clean', 1, 1500),
(137, 3, 'Standard', 'Not Clean', 1, 1500),
(138, 3, 'Standard', 'Not Clean', 1, 1500),
(139, 3, 'Standard', 'Not Clean', 1, 1500),
(140, 3, 'Standard', 'Not Clean', 1, 1500),
(141, 3, 'Deluxe', 'Not Clean', 1, 3000),
(142, 3, 'Deluxe', 'Not Clean', 1, 3000),
(143, 3, 'Deluxe', 'Not Clean', 1, 3000),
(144, 3, 'Deluxe', 'Not Clean', 1, 3000),
(145, 3, 'Deluxe', 'Not Clean', 1, 3000),
(146, 3, 'Deluxe', 'Not Clean', 1, 3000),
(147, 3, 'Deluxe', 'Not Clean', 1, 3000),
(148, 3, 'Deluxe', 'Not Clean', 1, 3000),
(149, 3, 'Deluxe', 'Not Clean', 1, 3000),
(150, 3, 'Deluxe', 'Not Clean', 1, 3000),
(151, 3, 'Deluxe', 'Not Clean', 1, 3000),
(152, 3, 'Deluxe', 'Not Clean', 1, 3000),
(153, 3, 'Deluxe', 'Not Clean', 1, 3000),
(154, 3, 'Deluxe', 'Not Clean', 1, 3000),
(155, 3, 'Deluxe', 'Not Clean', 1, 3000),
(156, 3, 'Deluxe', 'Not Clean', 1, 3000),
(157, 3, 'Deluxe', 'Not Clean', 1, 3000),
(158, 3, 'Deluxe', 'Not Clean', 1, 3000),
(159, 3, 'Deluxe', 'Not Clean', 1, 3000),
(160, 3, 'Deluxe', 'Not Clean', 1, 4500),
(161, 3, 'Suite', 'Not Clean', 1, 4500),
(162, 3, 'Suite', 'Not Clean', 1, 4500),
(163, 3, 'Suite', 'Not Clean', 1, 4500),
(164, 3, 'Suite', 'Not Clean', 1, 4500),
(165, 3, 'Suite', 'Not Clean', 1, 4500),
(166, 3, 'Suite', 'Not Clean', 1, 4500),
(167, 3, 'Suite', 'Not Clean', 1, 4500),
(168, 3, 'Suite', 'Not Clean', 1, 4500),
(169, 3, 'Suite', 'Not Clean', 1, 4500),
(170, 3, 'Suite', 'Not Clean', 1, 4500),
(171, 3, 'Suite', 'Not Clean', 1, 4500),
(172, 3, 'Suite', 'Not Clean', 1, 4500),
(173, 3, 'Suite', 'Not Clean', 1, 4500),
(174, 3, 'Suite', 'Not Clean', 1, 4500),
(175, 3, 'Suite', 'Not Clean', 1, 4500),
(176, 3, 'Suite', 'Not Clean', 1, 4500),
(177, 3, 'Suite', 'Not Clean', 1, 4500),
(178, 3, 'Suite', 'Not Clean', 1, 4500),
(179, 3, 'Suite', 'Not Clean', 1, 4500),
(180, 3, 'Suite', 'Not Clean', 1, 4500),
(184, 3, 'Suite', 'Clean', 1, 5600);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `season_id` int(5) NOT NULL,
  `season_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rate_modifier` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`season_id`, `season_name`, `start_date`, `end_date`, `rate_modifier`) VALUES
(1, 'Summer', '2023-03-01', '2023-06-30', 1.50),
(2, 'Rainy', '2023-07-01', '2023-10-31', 1.00),
(3, 'Winter', '2023-11-01', '2024-02-29', 1.30),
(4, 'Summer', '2024-03-01', '2024-05-31', 1.45),
(5, 'Rainy', '2024-07-01', '2024-10-31', 1.00),
(6, 'Winter', '2024-11-01', '2025-02-28', 1.25),
(7, 'Summer', '2025-03-01', '2025-06-30', 1.60),
(8, 'Rainy ', '2025-07-01', '2025-10-31', 1.00),
(9, 'Winter', '2025-11-01', '2026-02-28', 1.40),
(21, 'Summer', '2023-05-29', '2023-05-30', 1.50),
(22, 'Spring', '2023-05-29', '2023-05-30', 1.20);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(5) NOT NULL,
  `staff_first_name` varchar(50) NOT NULL,
  `staff_last_name` varchar(50) NOT NULL,
  `staff_position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_phone_number` varchar(20) NOT NULL,
  `hire_date` date NOT NULL,
  `salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_first_name`, `staff_last_name`, `staff_position`, `department`, `staff_email`, `staff_phone_number`, `hire_date`, `salary`) VALUES
(1, 'John', 'Doe', 'Manager', 'Finance', 'john.doe@example.com', '1234567890', '2022-01-01', 50000.00),
(2, 'Woradon', 'Samphanpaisarn', 'Receptionist', 'Reception', 'woradon_s@hotmail.com', '0922740934', '2023-05-26', 100000.00),
(3, 'Jiraphat', 'Ruttana', 'Accounting', 'Sales and Marketing', 'Jiraphat6575@gmail.com', '0897776575', '2023-05-01', 80000.00),
(4, 'kim', 'jung', 'Receptionist', 'Reception', 'kimi888@hotmail.com', '0812346578', '2023-05-31', 60000.00),
(5, 'Ronald', 'Clark', 'Housekeeper', 'Housekeeping', 'RonaldClark@gmail.com', '0856675565', '2022-02-02', 25000.00),
(6, 'harsh', 'russle', 'Housekeeper', 'Housekeeping', 'dede6565@gmail.com', '0856666565', '2022-02-02', 25000.00),
(7, 'laab', 'kua', 'Housekeeper', 'Housekeeping', 'somtumaroi@hotmail.com', '0824571478', '2022-04-02', 26000.00),
(8, 'Kim ', 'Toppu', 'Housekeeper', 'Housekeeping', 'Kimtop@gmail.com', '0814567891', '2023-05-29', 15000.00),
(9, 'Som', 'Red', 'Housekeeper', 'Housekeeping', 'somred@gmail.com', '0914561234', '2023-05-29', 15000.00),
(10, 'Harry', 'Kane', 'Housekeeper', 'Housekeeping', 'harry10@gmail.com', '0951234567', '2023-05-29', 15000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `transcript_id` int(11) NOT NULL,
  `reservation_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`transcript_id`, `reservation_id`, `room_id`) VALUES
(1, 1, 1),
(2, 4, 4),
(3, 7, 5),
(4, 11, 8),
(5, 3, 12),
(6, 9, 16),
(7, 1, 2),
(8, 2, 1),
(9, 3, 11),
(10, 4, 15),
(11, 5, 16),
(12, 6, 17),
(13, 7, 28),
(14, 8, 29),
(15, 9, 35),
(16, 10, 48),
(17, 11, 49),
(18, 12, 50),
(19, 13, 27),
(20, 14, 26),
(21, 15, 48),
(22, 16, 7),
(23, 17, 19),
(24, 18, 44),
(25, 19, 23),
(26, 20, 5),
(27, 21, 59),
(28, 22, 61),
(29, 23, 67),
(30, 24, 73),
(31, 25, 21),
(32, 26, 53),
(33, 22, 51),
(34, 11, 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`charge_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `housekeeping`
--
ALTER TABLE `housekeeping`
  ADD PRIMARY KEY (`housekeeping_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`season_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`transcript_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `room_id` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charge`
--
ALTER TABLE `charge`
  MODIFY `charge_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `housekeeping`
--
ALTER TABLE `housekeeping`
  MODIFY `housekeeping_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_method_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `season_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transcript`
--
ALTER TABLE `transcript`
  MODIFY `transcript_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charge`
--
ALTER TABLE `charge`
  ADD CONSTRAINT `charge_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `charge_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment` (`payment_method_id`);

--
-- Constraints for table `housekeeping`
--
ALTER TABLE `housekeeping`
  ADD CONSTRAINT `housekeeping_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `housekeeping_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment` (`payment_method_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`season_id`);

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `transcript_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `transcript_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
