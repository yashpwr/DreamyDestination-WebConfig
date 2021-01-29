-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2019 at 08:23 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9157568_dreamy_destination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_add_places`
--

CREATE TABLE `admin_add_places` (
  `city_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `know_more_about_place` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fun_facts` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_add_places_master`
--

CREATE TABLE `admin_add_places_master` (
  `id` int(11) NOT NULL,
  `image_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_travel_tip`
--

CREATE TABLE `admin_travel_tip` (
  `travel_description_type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `travel_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_travel_tip`
--

INSERT INTO `admin_travel_tip` (`travel_description_type`, `travel_description`, `date_added`) VALUES
('URL', 'https://webapp.diawi.com/install/QfLQ2G', 'April 12, 2019 '),
('TEXT', 'bahagahajahahhahahahahsha ahahaaahahahajaa\naajahahajjajajaqajahajaha\nahahahahahs\nnsjsja', 'April 12, 2019 '),
('URL', 'https://gandhiashramsabarmati.org/en/', 'April 12, 2019 ');

-- --------------------------------------------------------

--
-- Table structure for table `dreamy_destination_feedback`
--

CREATE TABLE `dreamy_destination_feedback` (
  `feedback_rating` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `posted_on` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dreamy_destination_feedback`
--

INSERT INTO `dreamy_destination_feedback` (`feedback_rating`, `comment`, `posted_by`, `posted_on`) VALUES
('Rating : 3.5/5.', 'perfect', 'Yash Pawar', 'April 11, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `user_full_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_unique_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_joined_date` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`user_full_name`, `user_email`, `user_password`, `user_unique_id`, `user_joined_date`) VALUES
('Nishant', 'nishu784@gmail.com', '', 'Nis1b5ed', 'April 4, 2019'),
('Yash Pawar', 'yashdvn@gmail.com', 'yash', 'Yasaa2a3', 'April 5, 2019'),
('Manisha Shah', 'manishashah2311@gmail.com', '1234', 'Maneb185', 'April 5, 2019'),
('Hitendra', 'r@g.com', 'q', 'Hit31f30', 'April 5, 2019'),
('Manisha', 'mgavale@gmail.com', '123', 'Man98929', 'April 7, 2019'),
('Nishant Tiwari', 'nishant@4squaretechnology.com', '1', 'Nis5af6f', 'April 7, 2019'),
('Parth Trivedi', 'parthtrivedi3698@gmail.com', '12345678', 'Par0081b', 'April 16, 2019'),
('Parth Trivedi', 'parthtrivedi3698@gmail.com', 'parth', 'Para43f5', 'April 16, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `UploadImageToServer`
--

CREATE TABLE `UploadImageToServer` (
  `id` int(11) NOT NULL,
  `image_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `place_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `place_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `place_type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `place_city` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UploadImageToServer`
--

INSERT INTO `UploadImageToServer` (`id`, `image_path`, `image_name`, `place_name`, `place_address`, `place_type`, `place_city`) VALUES
(11, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/0.png', 'Sabarmati ashram', 'Sabarmati ashram', 'Gandhi Smarak Sangrahalaya, Ashram Rd, Ahmedabad', 'hangout', 'Ahmedabad'),
(12, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/11.png', 'Sabarmati ashram 2', 'Sabarmati ashram 2', 'Gandhi Smarak Sangrahalaya, Ashram Rd, Ahmedabad, Gujarat', 'funFacts', 'Ahmedabad'),
(13, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/12.png', 'monuments', 'monuments', 'Gandhi Smarak Sangrahalaya, Ashram Rd, Ahmedabad, Gujarat', 'monuments', 'Ahmedabad'),
(14, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/13.png', 'this is a test', 'this is a test', 'this is a test', 'knowAboutPlaces', 'Ahmedabad'),
(15, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/14.png', 'this is a test', 'this is a test', 'this is a test', 'knowAboutPlaces', 'Ahmedabad'),
(16, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/15.png', 'this is a test', 'this is a test', 'this is a test', 'knowAboutPlaces', 'Ahmedabad'),
(17, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/16.png', 'this is a test', 'this is a test', 'this is a test', 'knowAboutPlaces', 'Ahmedabad'),
(18, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/17.png', 'this is a test', 'this is a test', 'this is a test', 'knowAboutPlaces', 'Ahmedabad'),
(19, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/18.png', 'this is a test', 'this is a test', 'this is a test', 'knowAboutPlaces', 'Ahmedabad'),
(20, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/19.png', 'this is a test demo', 'this is a test demo', 'this is a tesxt demo', 'knowAboutPlaces', 'Ahmedabad'),
(21, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/20.png', 'know more about test', 'know more about test', 'Gandhi Smarak Sangrahalaya, Ashram Rd, Ahmedabad', 'knowAboutPlaces', 'Ahmedabad'),
(22, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/21.png', 'funfacts test', 'funfacts test', 'Gandhi Smarak Sangrahalaya, Ashram Rd, Ahmedabad', 'funFacts', 'Ahmedabad'),
(23, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/22.png', 'monuments test 2', 'monuments test 2', 'Gandhi Smarak Sangrahalaya, Ashram Rd, Ahmedabad', 'monuments', 'Ahmedabad'),
(24, 'https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images/23.png', 'xgjdgkdgkdm', 'xgjdgkdgkdm', 'sfjxgjdgj', 'funFacts', 'Ahmedabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UploadImageToServer`
--
ALTER TABLE `UploadImageToServer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `UploadImageToServer`
--
ALTER TABLE `UploadImageToServer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
