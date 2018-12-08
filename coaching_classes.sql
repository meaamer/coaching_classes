-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 12:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coaching_classes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'suvavi', 'rico', '123');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Aurangabad'),
(4, 'Beed'),
(5, 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_fees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_fees`) VALUES
(1, 'php', '6000'),
(5, 'hhjh', '789');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fees_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fees_id`, `std_id`, `debit`, `credit`, `date`) VALUES
(1, 8, '1111', '200', ''),
(3, 22, '210', '789', ''),
(16, 8, '22', '', '09-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Maharashtra'),
(3, 'karnatak'),
(9, 'rrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `student_addmission`
--

CREATE TABLE `student_addmission` (
  `std_id` int(11) NOT NULL,
  `std_full_name` varchar(255) NOT NULL,
  `std_mother_name` varchar(255) NOT NULL,
  `std_dob` varchar(255) NOT NULL,
  `std_mobile` varchar(255) NOT NULL,
  `std_email` varchar(255) NOT NULL,
  `std_education` varchar(255) NOT NULL,
  `std_gender` varchar(255) NOT NULL,
  `std_address` text NOT NULL,
  `std_city` varchar(255) NOT NULL,
  `std_state` varchar(255) NOT NULL,
  `std_course` varchar(255) NOT NULL,
  `std_sub_course` varchar(255) NOT NULL,
  `std_fees` varchar(255) NOT NULL,
  `std_addmission_date` varchar(255) NOT NULL,
  `std_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_addmission`
--

INSERT INTO `student_addmission` (`std_id`, `std_full_name`, `std_mother_name`, `std_dob`, `std_mobile`, `std_email`, `std_education`, `std_gender`, `std_address`, `std_city`, `std_state`, `std_course`, `std_sub_course`, `std_fees`, `std_addmission_date`, `std_image`) VALUES
(8, 'qqqq', 'kjddfhjk', '2017-06-03', '42342342', 'kljsdfkl@kljf.com', 'kjhjk', 'famale', 'kjhjk', 'Beed', 'karnatak', 'hhjh', 'fksdjfh', '789', '2017-06-15', 'uploads/2b4ebd3a710b30c8d40ed57b9c8b772e.jpg'),
(9, 'qqqqqq', 'jksddfh', '2017-06-17', '4382842', 'adkjaskj@kjf.com', 'dfdfd', 'male', 'dfdfd', 'Aurangabad', 'Maharashtra', 'php', 'eerwe', '6000', '2017-05-29', 'uploads/d32b2449777bd88568f8bd652fe46dde.jpg'),
(13, 'dfsdkjd', 'ssdfd', '2017-06-03', 'dssds', 'sdkldskl@fsdkl.com', 'dsdsdsd', 'famale', 'dsdsdsd', 'Aurangabad', 'Maharashtra', 'php', 'sdfsdff', '6000', '2017-06-09', 'uploads/8c766de934c787bb3ca42d6def2904bc.jpg'),
(14, 'djhasjkdh', 'kjfhsdjh', '2017-06-02', '312312321312', 'fsdkj@kjdf.com', 'sdfsdf', 'male', 'fsfdsd', 'Aurangabad', 'Maharashtra', 'php', 'asdsad', '6000', '2017-06-08', 'uploads/2399fcfb85d990a4a55a3090e7f0f3ec.jpg'),
(15, 'djhasjkdh', 'kjfhsdjh', '2017-06-02', '312312321312', 'fsdkj@kjdf.com', 'sdfsdf', 'male', 'fsfdsd', 'Aurangabad', 'Maharashtra', 'php', 'asdsad', '6000', '2017-06-08', 'uploads/dc11e825c7c6ad4b1d432ac3240a48b6.jpg'),
(16, 'djhasjkdh', 'kjfhsdjh', '2017-06-02', '312312321312', 'fsdkj@kjdf.com', 'sdfsdf', 'male', 'fsfdsd', 'Aurangabad', 'Maharashtra', 'php', 'asdsad', '6000', '2017-06-08', 'uploads/45cb4fe2126425c9f0b3650d3d15deed.jpg'),
(22, 'jdsakl', 'aklsdlk', '2017-06-03', '7831278', 'djksjk@jkhfk.con', 'sdifuo', 'male', 'dffsdfsd', 'Aurangabad', 'Maharashtra', 'php', 'jhkfsdjkhsdjk', '789', '2017-06-09', 'uploads/e83d3a4eab37cd786f80166ca30b6b62.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student_addmission`
--
ALTER TABLE `student_addmission`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student_addmission`
--
ALTER TABLE `student_addmission`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
