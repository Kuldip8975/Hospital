-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 09:26 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `BookingID` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `driver_email` varchar(255) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `driver_name` varchar(256) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL,
  `PickupLocation` varchar(255) NOT NULL,
  `DropoffLocation` varchar(255) NOT NULL,
  `ServiceType` varchar(20) NOT NULL,
  `SpecialInstructions` text DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`BookingID`, `user_email`, `driver_email`, `ContactNumber`, `driver_name`, `Address`, `DateTime`, `PickupLocation`, `DropoffLocation`, `ServiceType`, `SpecialInstructions`, `PaymentStatus`) VALUES
(23, 'yashodipbeldar@gmail.com', 'raj.kumar@example.com', '9876543210', 'Raj Kumar', '', '2024-02-08 02:08:00', 'Shirpur', 'Dhule', 'Emergency', 'Near college', 'Paid'),
(24, 'aniketpatil40400@gmail.com', 'rajesh.kumar@example.com', '1098765432', 'Rajesh Kumar', '', '2024-02-09 17:45:00', 'Shirpur', 'Nandurbar', 'Non-emergency', 'Come near college gate', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `hname` varchar(256) NOT NULL,
  `docname` varchar(200) NOT NULL,
  `mno` varchar(100) NOT NULL,
  `role` varchar(256) NOT NULL,
  `experience` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `hname`, `docname`, `mno`, `role`, `experience`, `email`, `pass`) VALUES
(3, 'mauli', 'mauli', '123', 'Skin & Hair', 2, 'mauli@gmail.com', '1234'),
(4, 'mauli', 'mauli', '123', 'Child Specialist', 2, 'mauli@gmail.com', '1234'),
(5, 'mauli', 'mauli', '123', 'Bone and joints', 2, 'mauli1@gmail.com', '1234'),
(6, 'mauli', 'mauli', '123', 'Bone and joints', 2, 'mauli2@gmail.com', '1234'),
(7, 'mauli', 'mauli', '123', 'Ear Nose Throat', 2, 'maul1i@gmail.com', '1234'),
(8, 'Aai Manudevi', 'Gopal Patil', '2153284376', 'Dental Care', 4, 'gopalpatil@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`driver_id`, `driver_name`, `hospital_name`, `phone_number`, `email`) VALUES
(1, 'Raj Kumar', 'City Hospital', '9876543210', 'raj.kumar@example.com'),
(2, 'Suman Verma', 'Metro Health Center', '8765432109', 'suman.verma@example.com'),
(3, 'Amit Sharma', 'National Medical Center', '7654321098', 'amit.sharma@example.com'),
(5, 'Sanjay Patel', 'Sunshine Medical', '5432109876', 'sanjay.patel@example.com'),
(7, 'Vikram Yadav', 'Rainbow Hospital', '3210987654', 'vikram.yadav@example.com'),
(9, 'Rajesh Kumar', 'Everest Hospital', '1098765432', 'rajesh.kumar@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `labdetails`
--

CREATE TABLE `labdetails` (
  `id` int(11) NOT NULL,
  `fullName` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `phoneNo` varchar(100) NOT NULL,
  `lab_email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `appointmentdate` varchar(256) NOT NULL,
  `appointmenttime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labdetails`
--

INSERT INTO `labdetails` (`id`, `fullName`, `user_email`, `phoneNo`, `lab_email`, `address`, `appointmentdate`, `appointmenttime`) VALUES
(3, 'Yashodip Beldar', 'yashodipbeldar@gmail.com', '08767884273', 'cityclinical@example.com', 'At post-Virwade', '2024-02-20', '04:43');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(256) NOT NULL,
  `lab_email` varchar(256) NOT NULL,
  `lab_mo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `lab_name`, `lab_email`, `lab_mo`) VALUES
(1, 'City Clinical Labs', 'cityclinical@example.com', '+1-456-789-0123'),
(2, 'Sunrise Diagnostic Center', 'sunrisediagnostic@example.com', '+1-567-890-1234'),
(3, 'Green Health Laboratories', 'greenhealthlabs@example.com', '+1-678-901-2345'),
(4, 'MediScan Labs', 'mediscanlabs@example.com', '+1-789-012-3456'),
(5, 'BlueSky Pathology Center', 'blueskypathology@example.com', '+1-890-123-4567'),
(6, 'Wellness Lab Solutions', 'wellnesslabs@example.com', '+1-901-234-5678');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `hospital_name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `dob` varchar(256) NOT NULL,
  `mno` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `addr` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `feedback` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `hospital_name`, `user_name`, `dob`, `mno`, `email`, `addr`, `pass`, `feedback`) VALUES
(6, 'Mouli Hospital', 'Yashodip Beldar', '2003-01-19', '08767884273', 'yash@gmail.com', 'Virwade', '1234', ''),
(7, '', '', '', '', '', '', '', ''),
(8, 'Mauli', 'Yashodip', '2024-01-04', '08767884273', 'yashodipbeldar@gmail.com', 'At post-Virwade,tal-Chopda', '1234', 'Nice'),
(9, 'Mouli Hospital', 'Yashodip', '2024-01-04', '08767884273', 'yashodip2003beldar@gmail.com', 'At post-Virwade', '1234', ''),
(10, 'Mauli', 'Aadii Patil', '2024-02-09', '8767543804', 'aniketpatil40400@gmail.com', 'Dhule', '1234', ''),
(11, 'AAI', 'Aaditya Patil', '2024-02-09', '8723468234', 'aniketpatil40400@gmail.com', 'Shirpur', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `doc_email` varchar(100) NOT NULL,
  `doc_name` varchar(256) NOT NULL,
  `doc_role` varchar(200) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` varchar(100) NOT NULL,
  `illness` varchar(200) NOT NULL,
  `detail` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'Requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_request`
--

INSERT INTO `user_request` (`id`, `user_email`, `doc_email`, `doc_name`, `doc_role`, `rdate`, `rtime`, `illness`, `detail`, `status`) VALUES
(12, 'aniketpatil40400@gmail.com', 'mauli@gmail.com', 'mauli', 'Child Specialist', '2024-02-09', '19:43', 'Headaches', 'I Have fever', 'Accepted'),
(13, 'aniketpatil40400@gmail.com', 'maul1i@gmail.com', 'mauli', 'Ear Nose Throat', '2024-02-09', '19:52', 'Stomach Aches', 'problem', 'Requested'),
(14, 'yashodipbeldar@gmail.com', 'mauli@gmail.com', 'mauli', 'Child Specialist', '2024-02-20', '02:08', 'Colds and Flu', 'I love popcorn', 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `labdetails`
--
ALTER TABLE `labdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `labdetails`
--
ALTER TABLE `labdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
