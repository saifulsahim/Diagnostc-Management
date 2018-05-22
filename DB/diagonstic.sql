--
-- Database: `diagonstic`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_admin`
--

CREATE TABLE `add_admin` (
  `id` int(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_role` text NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_admin`
--

INSERT INTO `add_admin` (`id`, `admin_name`, `email`, `password`, `confirm_password`, `admin_role`, `is_trashed`) VALUES
(3, 'fefefg', 'smaaf102@gmail.com', '12345', '12345', 'Operator', 'No'),
(4, 'Mitun', 'asada@yahoo.com', '1234', '', 'Operator', 'No'),
(5, 'Saiful Sahimmmm', 'samihaakther12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'Operator', '2018-03-19 18:04:41'),
(8, 'Saiful Sahim', 'smaaf102@gmail.com', '1234', '1234', 'Operator', 'No'),
(9, 'Fahimvvbr', 'sahimkhan12@yahoo.com', '1234', '1234', 'Operator', 'No'),
(10, 'Sahim', 'sahimalam96@gmail.com', '12345', '12345', 'Admin', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `clear_payment`
--

CREATE TABLE `clear_payment` (
  `id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `due` double(18,3) NOT NULL,
  `paid` double(18,3) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clear_payment`
--

INSERT INTO `clear_payment` (`id`, `patient_id`, `due`, `paid`, `invoice_no`, `is_trashed`) VALUES
(4, 12, 56.000, 400.000, 'fegef', 'No'),
(8, 19, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(9, 20, 310.210, 250.000, 'Sfsdgfe254', 'No'),
(10, 27, 300.210, 260.000, 'POu78', 'No'),
(11, 28, 300.210, 260.000, 'POu78', 'No'),
(12, 29, 56.000, 400.000, 'fegef', 'No'),
(13, 30, 56.000, 400.000, 'fegef', 'No'),
(14, 31, 56.000, 400.000, 'fegef', 'No'),
(15, 34, 407210.000, 40000.000, '50', '2018-03-30 19:56:12'),
(16, 35, 400.210, 160.000, 'HJ45', 'No'),
(17, 36, 400.210, 160.000, 'HJ45', '2018-03-30 23:35:27'),
(19, 38, 340.210, 2200.000, 'AS980', 'No'),
(20, 39, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(21, 40, 39.210, 521.000, 'Z', 'No'),
(22, 41, 39.210, 521.000, 'Z', 'No'),
(23, 42, 39.210, 521.000, 'Z', 'No'),
(24, 43, 39.210, 521.000, 'Z', 'No'),
(28, 47, 88552.000, 890.000, 'ERT', 'No'),
(29, 48, 0.000, 0.000, 'ERT', 'No'),
(30, 49, 88552.000, 890.000, 'ERT', 'No'),
(31, 50, 88552.000, 890.000, 'ERT', 'No'),
(32, 51, 88552.000, 890.000, 'ERT', 'No'),
(39, 58, 0.000, 0.000, 'OI45', 'No'),
(43, 62, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(44, 63, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(45, 64, 56.000, 400.000, 'fegef', 'No'),
(46, 65, 56.000, 400.000, 'fegef', 'No'),
(49, 72, 300.000, 400.000, '1234', 'No'),
(50, 73, 45321.000, 200.000, '456', 'No'),
(51, 74, 45321.000, 200.000, '456', 'No'),
(54, 77, 400.000, 1200.000, '789', 'No'),
(55, 78, 400.000, 1200.000, '789', 'No'),
(56, 79, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(57, 80, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(58, 81, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(59, 82, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(60, 83, 300.000, 400.000, '456', 'No'),
(61, 84, 300.000, 400.000, '456', 'No'),
(62, 85, 39.210, 521.000, '789', 'No'),
(63, 87, 44621.000, 100.000, '789', 'No'),
(64, 88, 44621.000, 100.000, '789', 'No'),
(65, 89, 30.210, 530.000, '789', 'No'),
(66, 90, 30.210, 530.000, '789', 'No'),
(67, 91, 40721.000, 4000.000, '789', 'No'),
(68, 92, 40721.000, 4000.000, '789', 'No'),
(69, 94, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(70, 95, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(71, 96, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(74, 99, 56.000, 400.000, 'fegef', 'No'),
(75, 100, 56.000, 400.000, 'fegef', 'No'),
(76, 101, 300.000, 400.000, 'Ba78', 'No'),
(77, 102, 300.000, 400.000, 'Ba78', 'No'),
(78, 103, 56.000, 400.000, 'fegef', 'No'),
(79, 104, 56.000, 400.000, 'fegef', 'No'),
(81, 106, 150.000, 550.000, 'alam12', 'No'),
(82, 107, 150.000, 550.000, 'alam12', 'No'),
(83, 108, 540.000, 20.000, 'captain12', 'No'),
(84, 109, 540.000, 20.000, 'captain12', 'No'),
(85, 110, 0.000, 0.000, '369', 'No'),
(86, 111, 10.000, 690.000, '001', 'No'),
(87, 112, 200.000, 1800.000, '231', 'No'),
(89, 114, 1430.000, 570.000, '258', 'No'),
(90, 115, 1430.000, 570.000, '258', 'No'),
(91, 116, 1430.000, 570.000, '258', 'No'),
(92, 117, 1430.000, 570.000, '258', 'No'),
(93, 118, 1430.000, 570.000, '258', 'No'),
(94, 119, 1430.000, 570.000, '258', 'No'),
(95, 122, 0.000, 0.000, '159', 'No'),
(96, 123, 1401.000, 599.000, '159', 'No'),
(97, 124, 1922.000, 78.000, 'wfef', 'No'),
(110, 12, 25.000, 50.000, 'AS12', 'No'),
(112, 125, 1800.000, 50.000, '258', 'No'),
(116, 128, 56.000, 400.000, 'fegef', 'No'),
(117, 129, 1700.000, 800.000, '69', 'No'),
(118, 130, 851.000, 999.000, '78', '2018-04-19 11:59:22'),
(119, 131, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(120, 132, 1589.000, 1111.000, '943', 'No'),
(121, 133, 2589.000, 111.000, '941', 'No'),
(122, 134, 2589.000, 111.000, '941', 'No'),
(123, 135, 1994.000, 9.000, '297', 'No'),
(124, 136, 1994.000, 9.000, '297', 'No'),
(125, 137, 1994.000, 9.000, '297', 'No'),
(126, 138, 2590.000, 110.000, '893', 'No'),
(127, 139, 1799.000, 51.000, '451', 'No'),
(128, 140, 1700.000, 150.000, 'AS45', '2018-04-19 11:59:12'),
(129, 141, 1491.000, 69.000, '491', 'No'),
(130, 142, 262.000, 1298.000, 'AS45', '2018-04-19 11:59:12'),
(131, 143, 262.000, 1298.000, 'AS45', '2018-04-19 11:59:12'),
(132, 144, 1482.000, 78.000, 'AS45', '2018-04-19 11:59:12'),
(133, 145, 1482.000, 78.000, 'AS45', '2018-04-19 11:59:12'),
(134, 146, 1472.000, 88.000, 'AS45', '2018-04-19 11:59:12'),
(135, 147, 1472.000, 88.000, 'AS45', '2018-04-19 11:59:12'),
(136, 148, 1472.000, 88.000, 'AS45', '2018-04-19 11:59:12'),
(137, 149, 1472.000, 88.000, 'ef', 'No'),
(138, 150, 1472.000, 88.000, 'ef', 'No'),
(139, 151, 1483.000, 77.000, 'fegef', 'No'),
(140, 152, 1483.000, 77.000, 'fegef', 'No'),
(141, 153, 660.000, 900.000, 'fegef', 'No'),
(142, 154, 1269.000, 1231.000, 'AS45', '2018-04-19 11:59:12'),
(143, 155, 1269.000, 1231.000, 'AS45', '2018-04-19 11:59:12'),
(144, 156, 1269.000, 1231.000, 'AS45', '2018-04-19 11:59:12'),
(145, 157, 1269.000, 1231.000, 'AS45', '2018-04-19 11:59:12'),
(146, 158, 1269.000, 1231.000, 'AS45', '2018-04-19 11:59:12'),
(147, 159, 2212.000, 488.000, 'AS45', '2018-04-19 11:59:12'),
(148, 160, 2212.000, 488.000, 'AS45', '2018-04-19 11:59:12'),
(149, 161, 2212.000, 488.000, 'AS45', '2018-04-19 11:59:12'),
(150, 163, 2050.000, 450.000, 'fegef', 'No'),
(151, 164, 2000.000, 500.000, 'fegef', 'No'),
(152, 165, 2377.000, 123.000, 'AS45', '2018-04-19 11:59:12'),
(153, 166, 2377.000, 123.000, 'AS45', '2018-04-19 11:59:12'),
(154, 167, -5929.000, 7489.000, 'fegef', 'No'),
(155, 169, 1450.000, 400.000, 'AS45', '2018-04-19 11:59:12'),
(156, 170, 1450.000, 400.000, 'AS45', '2018-04-19 11:59:12'),
(157, 171, 1450.000, 400.000, 'AS45', '2018-04-19 11:59:12'),
(158, 172, 1482.000, 78.000, 'AS45', '2018-04-19 11:59:12'),
(159, 173, 1482.000, 78.000, 'AS45', '2018-04-19 11:59:12'),
(160, 174, 1800.000, 900.000, 'AS45', '2018-04-19 11:59:12'),
(161, 175, 1800.000, 900.000, 'AS45', '2018-04-19 11:59:12'),
(162, 177, 775.000, 785.000, 'AS45', '2018-04-19 11:59:12'),
(163, 178, 775.000, 785.000, 'AS45', '2018-04-19 11:59:12'),
(164, 179, 2100.000, 400.000, 'fegef', 'No'),
(165, 180, 2100.000, 400.000, 'fegef', 'No'),
(166, 181, 1800.000, 900.000, 'AS45', '2018-04-19 11:59:12'),
(167, 191, 660.000, 900.000, 'AS45', '2018-04-19 11:59:12'),
(168, 192, 1460.000, 100.000, 'AS45', '2018-04-19 11:59:12'),
(169, 193, 1502.000, 58.000, 'fegef', 'No'),
(170, 196, 1600.000, 900.000, 'AS45', 'No'),
(171, 197, 1600.000, 900.000, 'AS45', 'No'),
(172, 198, 2100.000, 400.000, 'AS45', 'No'),
(173, 199, 2100.000, 400.000, 'AS45', 'No'),
(174, 200, 2100.000, 400.000, 'AS45', 'No'),
(175, 201, 660.000, 900.000, 'AS45', 'No'),
(176, 202, 660.000, 900.000, 'AS45', 'No'),
(177, 203, 660.000, 900.000, 'AS45', 'No'),
(178, 204, 1160.000, 400.000, 'AS45', 'No'),
(179, 209, 2100.000, 400.000, 'fegef', 'No'),
(180, 211, 2100.000, 400.000, 'AS45', 'No'),
(181, 213, 1600.000, 900.000, 'AS45', 'No'),
(182, 214, 1000.000, 1700.000, 'AS45', 'No'),
(183, 215, 1229.000, 1471.000, '573', 'No'),
(184, 216, 852.000, 998.000, 'fcedvv', 'No'),
(185, 217, 953.000, 897.000, 'AS45', 'No'),
(186, 218, 973.000, 587.000, 'AS45', 'No'),
(187, 219, 1296.000, 264.000, 'AS45', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` int(100) NOT NULL,
  `logo_image` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `choose_currency` varchar(11) NOT NULL,
  `initial_balance` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `email`, `mobile_no`, `logo_image`, `currency`, `choose_currency`, `initial_balance`) VALUES
(2, 'Synchornise IT', 'Gec', 'sahimalam96@gmail.com', 1756128527, '15232900531523271116synchronise-it-logo.png', '$/', 'Before Amou', '2000.000');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `profile_picture` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` date NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`profile_picture`, `id`, `doctor_name`, `father_name`, `mother_name`, `email`, `mobile_no`, `contact_address`, `designation`, `birth_date`, `join_date`, `is_trashed`) VALUES
('', 20, 'Saiful Sahim,', 'Nurul', 'Sanjida', 'samihaakther12@gmail.com', '01549685545', 'Agrabad', 'MBBS', '2018-03-05', '2018-03-28', 'No'),
('', 23, 'Sohaguyu', 'Sakib', 'Fakibggg', 'sahimkhan12@yahoo.com', '01549685545', 'Agrabad', 'FCPS', '2011-06-21', '2015-10-26', 'No'),
('', 26, 'Assdd', 'dds`', 'fed', 'daasddd@gmail.com', '01549685545', 'ef', 'vv', '2018-03-08', '2018-03-23', 'No'),
('', 30, '', '', 'Morsheda Khanam', '', '', '', '', '1970-01-01', '1970-01-01', '2018-03-31 00:35:43'),
('', 32, '', 'Sakib', '', '', '', '', '', '1970-01-01', '1970-01-01', '2018-03-31 00:04:17'),
('', 35, 'Sohag', 'deffw', 'ssw', 'sahimalam96@gmail.com', '01756128527', 'ax', 'xscde', '2018-03-27', '2018-04-03', 'No'),
('1521695017', 36, '', '', '', '', '', '', '', '1970-01-01', '1970-01-01', '2018-04-16 12:28:26'),
('1523775195sasuke.jpg', 37, 'Rakib', 'Maksudur Rahman', 'Morsheda Khanam2', 'samihaakther12@gmail.com', '01756128527', 'Lalkhan Bazar', 'FCPS', '1994-04-27', '2018-04-24', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `description`, `is_trashed`) VALUES
(8, 'Software', 'Safe', 'No'),
(14, 'Alam', 'deevd', 'No'),
(15, 'ffw', 'gew', '2018-04-17 15:59:19'),
(16, 'litfr', 'iopu9', '2018-04-17 16:01:34'),
(17, 'Electric Bill', 'Office', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `expense_invoice`
--

CREATE TABLE `expense_invoice` (
  `id` int(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `expense_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `amount` double(10,3) NOT NULL,
  `admin_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_invoice`
--

INSERT INTO `expense_invoice` (`id`, `invoice_no`, `date`, `expense_id`, `description`, `amount`, `admin_id`) VALUES
(8, '698', '2010-05-02', 15, 'kalyan', 3000.000, 5),
(9, '456', '2009-05-18', 17, 'nayan', 3500.000, 5),
(10, '004', '2014-05-18', 8, 'Sahim', 4500.000, 5),
(11, '004', '2014-05-18', 8, 'Sahim', 4500.000, 5),
(12, '147', '2017-04-25', 16, 'Pal', 1500.000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `time` time NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `invoice_type` varchar(11) NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `patient_name`, `age`, `sex`, `mobile_no`, `delivery_date`, `time`, `doctor_id`, `description`, `invoice_no`, `invoice_type`, `is_trashed`) VALUES
(3, 'Sa', '25', 'Others', '01538659558', '2015-03-06', '01:30:00', 23, 'bfg', '78', '--Select--', '2018-04-19 11:59:22'),
(4, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(12, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(17, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(22, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(28, 'Sadman', '27', 'Male', '0168456797', '1970-01-01', '00:00:00', 35, 'gr', 'POu78', 'income', 'No'),
(30, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(31, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(34, 'Tanvir', '42', 'Female', 'dcc', '2020-02-10', '00:00:00', 26, 'hftr', 'Sfsdgfe254', 'income', 'No'),
(35, 'Shahbaz', '22', 'Female', '017564741552', '2011-02-02', '00:00:00', 0, 'feg', 'HJ45', '--Select--', '2018-03-30 19:07:35'),
(36, 'Shahbaz', '22', 'Others ', '017564741552', '2011-02-02', '00:00:00', 20, 'feg', 'HJ45', 'income', 'No'),
(37, 'Raju', '25', 'Male', '01756128527', '2018-02-27', '12:30:00', 26, 'grf', 'mnbv', 'income', 'No'),
(38, 'Alam', '29', 'Male', '01672412645', '2014-06-10', '01:30:00', 20, 'asdd', 'AS98', 'income', 'No'),
(45, 'Bakshi', '25', 'Female', 'dc', '2016-02-03', '12:30:00', 35, 'feef', 'Z', '--Select--', 'No'),
(51, 'T D Kishore', '12', 'Others ', 'dcc', '2025-02-06', '12:30:00', 26, 'fwfw', 'ERT', 'income', 'No'),
(58, 'Sahim', '25', 'Male', '01549685546', '2023-03-21', '02:00:00', 23, 'asdd', 'OI45', 'income', 'No'),
(62, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(64, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(65, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(72, 'Asraf', '25', 'Male', '01756128527', '2016-02-03', '12:00:00', 20, 'fcrrg', '1234', 'income', 'No'),
(73, 'Bartra', '12', 'Male', '01549685546', '2018-03-27', '01:30:00', 26, 'd', '456', 'income', 'No'),
(77, 'Saiful', '25', 'Male', 'dc', '2018-04-02', '01:00:00', 23, 'fee', '789', 'income', 'No'),
(78, 'Saiful', '25', 'Male', 'dc', '2018-04-02', '01:00:00', 23, 'fee', '789', 'income', 'No'),
(81, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(82, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(83, 'Rudro  bhai', '29', 'Male', '01549685545', '2016-03-27', '02:00:00', 23, 'fge', '456', 'income', 'No'),
(85, 'Amit', '25', 'Male', 'dc', '2016-03-27', '06:30:00', 35, 'eg', '789', 'income', 'No'),
(87, 'Saiful', '25', 'Male', 'dcc', '2011-02-02', '02:00:00', 20, 'rty', '789', 'income', 'No'),
(88, 'Saiful', '25', 'Male', 'dcc', '2011-02-02', '02:00:00', 20, 'rty', '789', 'income', 'No'),
(89, 'Rudro bhai', '25', 'Male', 'dc', '1970-01-01', '01:30:00', 20, 'eg', '789', 'income', 'No'),
(91, 'rudro', '25', 'Male', '01549685545', '2015-02-28', '05:00:00', 20, 'werw', '789', 'income', 'No'),
(94, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(95, 'Hasanulll', '8568', 'Male', '01756128527', '2020-02-16', '05:00:00', 20, 'y5r', '159', '--Select--', 'No'),
(96, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(100, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(102, 'Mamun', '25', 'Male', 'dc', '1970-01-01', '02:30:00', 20, 'qee', 'Ba78', 'income', 'No'),
(103, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(104, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(106, 'Captain', '25', 'Male', '01549685546', '2011-06-15', '01:30:00', 20, 'dwwd', 'alam12', 'income', 'No'),
(107, 'Captain', '25', 'Male', '01549685546', '2011-06-15', '01:30:00', 20, 'dwwd', 'alam12', 'income', 'No'),
(108, 'Mitunnnn Alam ', '8568', 'Others', 'dc', '2000-03-06', '02:30:00', 23, 'wdfw', 'captain12', '--Select--', 'No'),
(109, 'Mitunnnn Alam ', '8568', 'Others', 'dc', '2000-03-06', '02:30:00', 23, 'wdfw', 'captain12', '--Select--', 'No'),
(112, 'Mahmud', '25', 'Male', '01549685546', '1970-01-01', '05:00:00', 35, 'fww', '231', 'income', 'No'),
(114, 'Alam', '26', 'Male', '01756128527', '2014-04-11', '02:00:00', 35, 'wdf', '258', 'income', 'No'),
(115, 'Alam', '26', 'Male', '01756128527', '2014-04-11', '02:00:00', 35, 'wdf', '258', 'income', 'No'),
(116, 'Alam', '26', 'Male', '01756128527', '2014-04-11', '02:00:00', 35, 'wdf', '258', 'income', 'No'),
(117, 'Alam', '26', 'Male', '01756128527', '2014-04-11', '02:00:00', 35, 'wdf', '258', 'income', 'No'),
(118, 'Alam', '26', 'Male', '01756128527', '2014-04-11', '02:00:00', 35, 'wdf', '258', 'income', 'No'),
(119, 'Alam', '26', 'Male', '01756128527', '2014-04-11', '02:00:00', 35, 'wdf', '258', 'income', 'No'),
(120, '', '', 'Male', '01549685545', '2018-03-26', '12:30:00', 0, 'gge', 'wfef', 'income', 'No'),
(121, 'Hasanul', '29', 'Male', '01549685546', '2012-04-10', '02:30:00', 35, 'wdf', '159', 'income', 'No'),
(123, 'Hasanul', '29', 'Male', '01549685546', '2012-04-10', '02:30:00', 35, 'wdf', '159', 'income', 'No'),
(124, '', '', 'Male', '01549685545', '2018-03-26', '12:30:00', 0, 'gge', 'wfef', 'income', 'No'),
(128, 'qwetr', '78', 'Others', '01549685546', '2011-03-06', '01:00:00', 0, 'fgeegtf', 'fegef', 'income', 'No'),
(129, 'Dhar', '25', 'Female', '01756128527', '2023-03-21', '02:30:00', 26, 'fef', '69', 'income', 'No'),
(130, 'Sa', '25', 'Others', '01538659558', '2015-03-06', '01:30:00', 23, 'bfg', '78', '--Select--', '2018-04-19 11:59:22'),
(131, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(132, 'Amir', '25', 'Male', '01756128527', '2016-03-21', '02:00:00', 37, 'Asdf', '943', 'income', 'No'),
(133, 'Amir', '25', 'Male', '01549685545', '2011-02-02', '02:30:00', 23, 'wsdf', '941', 'income', 'No'),
(134, 'Amir', '25', 'Male', '01549685545', '2011-02-02', '02:30:00', 23, 'wsdf', '941', 'income', 'No'),
(135, 'Amir', '25', 'Female', '01549685545', '2016-02-16', '12:30:00', 23, 'egfw', '297', 'income', 'No'),
(136, 'Amir', '25', 'Female', '01549685545', '2016-02-16', '12:30:00', 23, 'egfw', '297', 'income', 'No'),
(137, 'Amir', '25', 'Female', '01549685545', '2016-02-16', '12:30:00', 23, 'egfw', '297', 'income', 'No'),
(138, 'Islam', '25', 'Others', '01756128527', '2014-03-14', '02:30:00', 23, 'few', '893', '--Select--', 'No'),
(139, 'Amir', '25', 'Others', '01756128527', '2018-03-07', '12:30:00', 23, 'ef', '451', '--Select--', 'No'),
(140, 'SS', '42', 'Others', '01549685546', '2006-05-06', '00:00:00', 0, 'rght', 'AS45', '--Select--', '2018-04-19 11:59:12'),
(141, 'Zahid', '25', 'Male', '01756128527', '2014-04-06', '12:00:00', 23, 't4gr', '491', 'income', 'No'),
(142, 'Fshim', '25', 'Male', '01756128527', '2016-03-26', '02:30:00', 23, 'ft', 'AS45', 'income', '2018-04-19 11:59:12'),
(143, 'Fshim', '25', 'Male', '01756128527', '2016-03-26', '02:30:00', 23, 'ft', 'AS45', 'income', '2018-04-19 11:59:12'),
(144, 'Abedul', '8568', 'Male', '01756128527', '2018-03-27', '05:00:00', 26, 'efef', 'AS45', 'income', '2018-04-19 11:59:12'),
(145, 'Abedul', '8568', 'Male', '01756128527', '2018-03-27', '05:00:00', 26, 'efef', 'AS45', 'income', '2018-04-19 11:59:12'),
(146, 'Asiq', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 23, 'fdw', 'AS45', 'income', '2018-04-19 11:59:12'),
(147, 'Asiq', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 23, 'fdw', 'AS45', 'income', '2018-04-19 11:59:12'),
(148, 'Asiq', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 23, 'fdw', 'AS45', 'income', '2018-04-19 11:59:12'),
(149, 'Farhan', '42', 'Male', '01756128527', '2018-03-27', '01:00:00', 23, 'fw', 'ef', 'income', 'No'),
(150, 'Farhan', '42', 'Male', '01756128527', '2018-03-27', '01:00:00', 23, 'fw', 'ef', 'income', 'No'),
(151, 'Raihan', '25', 'Male', '01756128527', '2018-03-27', '12:30:00', 20, 'f', 'fegef', 'income', 'No'),
(152, 'Raihan', '25', 'Male', '01756128527', '2018-03-27', '12:30:00', 20, 'f', 'fegef', 'income', 'No'),
(153, 'Patan', '25', 'Male', '01756128527', '1970-01-01', '02:30:00', 20, 'fwe', 'fegef', 'income', 'No'),
(154, 'PO', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'fe', 'AS45', 'income', '2018-04-19 11:59:12'),
(155, 'PO', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'fe', 'AS45', 'income', '2018-04-19 11:59:12'),
(156, 'PO', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'fe', 'AS45', 'income', '2018-04-19 11:59:12'),
(157, 'PO', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'fe', 'AS45', 'income', '2018-04-19 11:59:12'),
(158, 'PO', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'fe', 'AS45', 'income', '2018-04-19 11:59:12'),
(159, 'Tasnim', '25', 'Male', '01549685546', '2018-03-27', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(160, 'Tasnim', '25', 'Male', '01549685546', '2018-03-27', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(161, 'Tasnim', '25', 'Male', '01549685546', '2018-03-27', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(162, 'ds', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 23, 'vs', 'fegef', 'income', 'No'),
(163, 'ds', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 23, 'vs', 'fegef', 'income', 'No'),
(164, 'Al', '25', 'Male', '01756128527', '2011-02-02', '02:30:00', 20, 'feefg', 'fegef', '--Select--', 'No'),
(165, 'Wrf', '25', 'Male', '01756128527', '2018-03-27', '02:30:00', 23, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(166, 'Wrf', '25', 'Male', '01756128527', '2018-03-27', '02:30:00', 23, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(167, 'Sah', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'eg', 'fegef', 'income', 'No'),
(168, 'Yusuf', '25', 'Male', '01549685545', '2018-03-27', '02:30:00', 23, 'ge', 'AS45', 'income', '2018-04-19 11:59:12'),
(169, 'Yusuf', '25', 'Male', '01549685545', '2018-03-27', '02:30:00', 23, 'ge', 'AS45', 'income', '2018-04-19 11:59:12'),
(170, 'Yusuf', '25', 'Male', '01549685545', '2018-03-27', '02:30:00', 23, 'ge', 'AS45', 'income', '2018-04-19 11:59:12'),
(171, 'Yusuf', '25', 'Male', '01549685545', '2018-03-27', '02:30:00', 23, 'ge', 'AS45', 'income', '2018-04-19 11:59:12'),
(172, 'Towfiq', '25', 'Male', '01549685545', '2018-03-27', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(173, 'Towfiq', '25', 'Male', '01549685545', '2018-03-27', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(174, 'Rudro', '25', 'Male', '01756128527', '2018-04-03', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(175, 'Rudro', '25', 'Male', '01756128527', '2018-04-03', '01:00:00', 20, 'gr', 'AS45', 'income', '2018-04-19 11:59:12'),
(176, 'Sah', '8568', 'Male', '01549685545', '1970-01-01', '02:30:00', 20, 'tgr', 'AS45', 'income', '2018-04-19 11:59:12'),
(177, 'Sah', '8568', 'Male', '01549685545', '1970-01-01', '02:30:00', 20, 'tgr', 'AS45', 'income', '2018-04-19 11:59:12'),
(178, 'Sah', '8568', 'Male', '01549685545', '1970-01-01', '02:30:00', 20, 'tgr', 'AS45', 'income', '2018-04-19 11:59:12'),
(179, 'Amit', '8568', 'Female', '01756128527', '1970-01-01', '12:30:00', 23, 'fe', 'fegef', 'income', 'No'),
(180, 'Amit', '8568', 'Female', '01756128527', '1970-01-01', '12:30:00', 23, 'fe', 'fegef', 'income', 'No'),
(181, 'Saiful', '25', 'Male', '01756128527', '2018-03-27', '12:30:00', 20, 'fwe', 'AS45', 'income', '2018-04-19 11:59:12'),
(182, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(183, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(184, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(185, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(186, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(187, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(188, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(189, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '12:30:00', 26, 'ef', 'AS45', 'income', '2018-04-19 11:59:12'),
(190, 'Sah', '25', 'Male', '01756128527', '2018-03-25', '12:30:00', 20, 'wdf', 'AS45', 'income', '2018-04-19 11:59:12'),
(191, 'Sah', '25', 'Male', '01756128527', '2018-03-25', '12:30:00', 20, 'wdf', 'AS45', 'income', '2018-04-19 11:59:12'),
(192, 'Jhon doe', '8568', 'Male', '01549685545', '2018-04-02', '01:00:00', 23, 'efgv', 'AS45', 'income', '2018-04-19 11:59:12'),
(193, 'Saiful', '25', 'Male', '01756128527', '2011-02-02', '02:30:00', 26, 'fe', 'fegef', 'income', 'No'),
(194, 'Sah', '25', 'Male', '01549685545', '2011-02-02', '02:30:00', 23, 'hr', 'AS45', 'income', 'No'),
(195, 'Sah', '25', 'Male', '01549685545', '2011-02-02', '02:30:00', 23, 'hr', 'AS45', 'income', 'No'),
(196, 'Sah', '25', 'Male', '01549685545', '2011-02-02', '02:30:00', 23, 'hr', 'AS45', 'income', 'No'),
(197, 'Sah', '25', 'Male', '01549685545', '2011-02-02', '02:30:00', 23, 'hr', 'AS45', 'income', 'No'),
(198, 'Amit', '25', 'Male', '01756128527', '1970-01-01', '02:30:00', 20, 'few', 'AS45', 'income', 'No'),
(199, 'Amit', '25', 'Male', '01756128527', '1970-01-01', '02:30:00', 20, 'few', 'AS45', 'income', 'No'),
(200, 'Amit', '25', 'Male', '01756128527', '1970-01-01', '02:30:00', 20, 'few', 'AS45', 'income', 'No'),
(201, 'Sah', '25', 'Male', '01756128527', '2011-02-02', '01:00:00', 23, 'hrf', 'AS45', '--Select--', 'No'),
(202, 'Sah', '25', 'Male', '01756128527', '2011-02-02', '01:00:00', 23, 'hrf', 'AS45', '--Select--', 'No'),
(203, 'Sah', '25', 'Male', '01756128527', '2011-02-02', '01:00:00', 23, 'hrf', 'AS45', '--Select--', 'No'),
(204, 'Sah', '25', 'Male', '01756128527', '2018-03-27', '02:30:00', 20, 'fe', 'AS45', 'income', 'No'),
(205, 'Saiful', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'wf', 'fegef', 'income', 'No'),
(206, 'Saiful', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'wf', 'fegef', 'income', 'No'),
(207, 'Saiful', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'wf', 'fegef', 'income', 'No'),
(208, 'Saiful', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'wf', 'fegef', 'income', 'No'),
(209, 'Saiful', '25', 'Male', '01549685545', '1970-01-01', '12:30:00', 20, 'wf', 'fegef', 'income', 'No'),
(210, 'Sah', '25', 'Male', '01756128527', '2018-03-27', '02:30:00', 20, 'fw', 'AS45', 'income', 'No'),
(211, 'Sah', '25', 'Male', '01756128527', '2018-03-27', '02:30:00', 20, 'fw', 'AS45', 'income', 'No'),
(212, 'Raisul', '25', 'Male', '01756128527', '1970-01-01', '02:30:00', 20, 'hiy868', 'AS45', 'income', 'No'),
(213, 'Raisul', '25', 'Male', '01756128527', '1970-01-01', '02:30:00', 20, 'hiy868', 'AS45', 'income', 'No'),
(214, 'Chow', '25', 'Male', '01756128527', '2018-04-03', '12:00:00', 20, 'e4', 'AS45', 'income', 'No'),
(215, 'Shahjahan', '25', 'Others', '01549685545', '2010-03-13', '02:30:00', 0, 'gfe', '573', 'income', 'No'),
(216, 'Asif', '25', 'Male', '01549685545', '2011-02-02', '12:30:00', 20, 'gr', 'fcedvv', 'income', 'No'),
(217, 'Sayem', '25', 'Male', '01756128527', '2011-02-02', '05:00:00', 20, 'rvbg', 'AS45', 'income', 'No'),
(218, 'Shahriar', '25', 'Male', '01756128527', '2018-03-27', '05:00:00', 20, 'feg', 'AS45', 'income', 'No'),
(219, 'Shahi', '25', 'Male', '01756128527', '2018-03-27', '12:00:00', 20, 'gw', 'AS45', 'income', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `sub_test_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` decimal(50,0) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `patient_id`, `sub_test_id`, `date`, `quantity`, `total`, `invoice_no`, `admin_id`, `is_trashed`) VALUES
(1, 50, '20', '2018-03-05', 100, '120', 'AS45', 31, 'No'),
(2, 25, '58', '2018-03-07', 50, '850', '12', 63, 'fg'),
(7, 40, '12', '2016-02-03', 1, '560', 'Z', 4, 'No'),
(8, 41, '12', '2016-02-03', 2, '1120', 'Z', 4, 'No'),
(13, 108, '12', '2012-04-04', 1, '560', 'captain12', 5, 'No'),
(14, 110, '13', '2013-02-02', 1, '700', '369', 5, 'No'),
(16, 112, '18', '1970-01-01', 1, '2000', '231', 5, 'No'),
(17, 113, '19', '2006-03-27', 1, '2003', 'fcedvv', 5, 'No'),
(112, 122, '112', '2012-04-10', 1, '2000', '159', 5, 'No'),
(113, 125, '114', '1970-01-01', 1, '1850', 'YU19', 5, 'No'),
(114, 126, '114', '2010-04-05', 2, '3700', 'wq78', 5, 'No'),
(115, 126, '113', '2010-04-05', 1, '2500', 'wq78', 5, 'No'),
(116, 127, '19', '2011-02-02', 1, '2003', '23', 5, 'No'),
(117, 128, '114', '2013-04-03', 1, '1850', 'fegef', 5, 'No'),
(118, 129, '113', '2023-03-21', 1, '2500', '69', 5, 'No'),
(119, 130, '114', '2018-03-27', 1, '1850', '78', 5, 'No'),
(120, 131, '19', '2011-02-02', 1, '2003', 'AS45', 5, 'No'),
(121, 138, '115', '2011-02-02', 1, '2700', '893', 5, 'No'),
(122, 139, '114', '2011-02-08', 1, '1850', '451', 5, 'No'),
(123, 140, '114', '2011-03-27', 1, '1850', 'AS45', 5, 'No'),
(124, 141, '116', '2014-04-06', 1, '1560', '491', 5, 'No'),
(125, 213, '117', '1970-01-01', 1, '2500', 'AS45', 5, 'No'),
(126, 214, '115', '2018-04-03', 1, '2700', 'AS45', 5, 'No'),
(127, 215, '115', '1970-01-01', 1, '2700', '573', 5, 'No'),
(128, 216, '114', '2011-02-02', 1, '1850', 'fcedvv', 5, 'No'),
(129, 217, '114', '2011-02-02', 1, '1850', 'AS45', 5, 'No'),
(130, 219, '116', '2018-03-27', 1, '1560', 'AS45', 5, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `sub_test_category`
--

CREATE TABLE `sub_test_category` (
  `id` int(100) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `lab_id` varchar(100) NOT NULL,
  `test_price` float NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_test_category`
--

INSERT INTO `sub_test_category` (`id`, `category_id`, `test_name`, `lab_id`, `test_price`, `is_trashed`) VALUES
(3, '7', 'HIV 1 ', 'ASD12', 7890, '2018-03-22 12:04:45'),
(4, 'Select Test Category Name', 'Numonia', 'QWe544', 789, '2018-04-01 11:21:00'),
(5, 'Select Test Category Name', 'Tuhin', 'ASD155', 510, '2018-04-01 20:02:57'),
(6, 'Select Test Category Name', 'HIV12', 'zxc12', 5600, '2018-04-01 20:02:57'),
(7, '22', 'HIV123', 'asq', 7440, 'No'),
(8, '12', 'ddw', 'ded', 44721, 'No'),
(9, '12', 'ddw', 'ded', 447210, '2018-04-17 16:01:51'),
(10, '15', 'dsd', 'dd', 0, 'No'),
(11, 'Select Test Category Name', 'Urine Test', 'ddeefe', 456, 'No'),
(12, '12', 'asddf', 'QWe544', 560.21, 'No'),
(13, '12', 'Numoniaaaaaa', 'TY12', 700, 'No'),
(14, 'Select Test Category Name', 'RRDNA', '6987', 1000, 'No'),
(15, '23', 'Ultras', 'RTY01', 2000, '2018-03-31 14:42:07'),
(16, '25', 'asder', 'GHI25', 800, '2018-04-02 17:41:53'),
(17, '26', 'mnbv', 'OYT10', 1500, '2018-04-02 17:41:53'),
(19, '28', 'Asdd', '654', 2003, 'No'),
(111, '12', 'Fajhh', 'As45dd', 560.212, 'No'),
(112, '12', 'MUN', 'poi', 2000, 'No'),
(113, '29', 'Ray', 'GH45', 2500, 'No'),
(114, '30', 'Abdomen', 'RE36', 1850, 'No'),
(115, '31', 'Ultro', '145', 2700, 'No'),
(116, '32', 'E05', '457', 1560, 'No'),
(117, '33', 'MR12', '59', 2500, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_trashed` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`id`, `name`, `is_trashed`) VALUES
(1, 'X-Ray', '2018-04-16 11:50:15'),
(2, 'Ultrasno', '2018-04-01 10:58:48'),
(3, 'Cas', '2018-03-22 12:03:41'),
(4, 'X-Ray', '2018-03-31 12:29:13'),
(6, 'ECG', '2018-03-31 12:29:13'),
(7, 'MRI', '2018-03-31 12:29:13'),
(8, 'ECG', '2018-03-31 12:26:13'),
(9, 'Saiful Sahim', '2018-03-20 13:14:44'),
(10, 'Blood Test', '2018-03-31 12:34:50'),
(11, 'HIV', '2018-03-31 12:33:16'),
(12, 'Blood Test', '2018-04-10 11:38:21'),
(13, 'Soma', '2018-03-20 13:14:44'),
(14, 'MCV', '2018-04-01 10:58:21'),
(15, 'Add', '2018-03-22 12:03:45'),
(16, 'FEOKWP', '2018-03-22 10:57:45'),
(19, 'Saiful Sahim', '2018-03-31 12:26:13'),
(20, 'MRI', '2018-04-01 10:58:22'),
(21, 'ECG', '2018-03-31 12:29:13'),
(22, 'HIV', '2018-04-01 10:58:22'),
(23, 'X-Rayy', '2018-04-01 10:58:56'),
(24, 'DNA test', '2018-04-01 10:59:17'),
(25, 'X-ray', '2018-04-02 18:33:53'),
(26, 'Ultrasnography', '2018-04-02 18:33:56'),
(27, 'Monir12', 'No'),
(28, 'ABCD', '2018-04-17 15:47:44'),
(29, 'X_ray', '2018-04-17 16:20:37'),
(30, 'Blood Tests', 'No'),
(31, 'Ultrasnography', 'No'),
(32, 'ECG', 'No'),
(33, 'MRI', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_admin`
--
ALTER TABLE `add_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clear_payment`
--
ALTER TABLE `clear_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_invoice`
--
ALTER TABLE `expense_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_test_category`
--
ALTER TABLE `sub_test_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_admin`
--
ALTER TABLE `add_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clear_payment`
--
ALTER TABLE `clear_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `expense_invoice`
--
ALTER TABLE `expense_invoice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `sub_test_category`
--
ALTER TABLE `sub_test_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
