-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 03:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zapp`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailedtemplate`
-- (See below for the actual view)
--
CREATE TABLE `detailedtemplate` (
`temp_id` int(40)
,`temp_name` varchar(40)
,`img` varchar(1000)
,`text_msg` varchar(1000)
);

-- --------------------------------------------------------

--
-- Table structure for table `myimges`
--

CREATE TABLE `myimges` (
  `video_id` int(40) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mytexts`
--

CREATE TABLE `mytexts` (
  `video_id` int(40) NOT NULL,
  `text_msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `myvideos`
--

CREATE TABLE `myvideos` (
  `acc_id` int(40) NOT NULL,
  `video_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(40) NOT NULL,
  `team_name` varchar(40) DEFAULT NULL,
  `acc_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `acc_id`) VALUES
(304, 'Xeniz', 34),
(304, 'Xeniz', 1),
(304, 'Xeniz', 33),
(304, 'Xeniz', 2),
(432, 'Cloneit', 35),
(432, 'Cloneit', 1),
(304, 'Xeniz', 34);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `temp_id` int(40) NOT NULL,
  `temp_name` varchar(40) NOT NULL,
  `acc_type` varchar(40) NOT NULL DEFAULT 'free',
  `dis_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`temp_id`, `temp_name`, `acc_type`, `dis_img`) VALUES
(101, 'Build your own scene', 'free', 'build'),
(102, 'New year', 'premium', 'newyear'),
(103, 'Birthday', 'free', 'birthday'),
(104, 'Welcome back to school', 'free', 'school'),
(105, 'Online course ad', 'premium', 'oncourse'),
(106, 'Dental Hospital', 'premium', 'dental'),
(107, 'Dussehra', 'premium', 'duss'),
(108, 'Gandhi Jayanti', 'free', 'gandhi');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `temp_id` int(40) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_images`
--

INSERT INTO `temp_images` (`temp_id`, `img`) VALUES
(102, 'newyear'),
(103, 'birthday'),
(104, 'school'),
(105, 'oncourse'),
(106, 'dental'),
(107, 'duss'),
(108, 'gandhi');

-- --------------------------------------------------------

--
-- Table structure for table `temp_text`
--

CREATE TABLE `temp_text` (
  `temp_id` int(40) NOT NULL,
  `text_msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_text`
--

INSERT INTO `temp_text` (`temp_id`, `text_msg`) VALUES
(103, 'Happy Birthday Dad'),
(102, 'Bye 2018 , Welcome  2019'),
(104, 'Good Old days'),
(105, 'New courses from top tutors'),
(106, 'Best Dental Hosipitals '),
(107, 'Happy Dussehra'),
(108, 'Happy Gandhi Jayanti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `acc_id` int(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `acc_type` varchar(40) NOT NULL DEFAULT 'free',
  `phone_no` bigint(10) DEFAULT NULL,
  `onboarding` varchar(40) NOT NULL DEFAULT 'false',
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`acc_id`, `username`, `email`, `password`, `acc_type`, `phone_no`, `onboarding`, `gender`) VALUES
(1, 'Smith', 'smith.gajjar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'free', 9820554494, 'false', 'Male'),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'premium', NULL, 'false', 'null'),
(33, 'Jai', 'jai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'free', 98721471, 'false', 'male'),
(34, 'Varun', 'varun@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'premium', 9821125, 'false', 'Male'),
(35, 'vrushu', 'vrushu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'free', 14215125, 'false', 'Male');

-- --------------------------------------------------------

--
-- Structure for view `detailedtemplate`
--
DROP TABLE IF EXISTS `detailedtemplate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailedtemplate`  AS  select `templates`.`temp_id` AS `temp_id`,`templates`.`temp_name` AS `temp_name`,`temp_images`.`img` AS `img`,`temp_text`.`text_msg` AS `text_msg` from ((`templates` join `temp_images` on(`temp_images`.`temp_id` = `templates`.`temp_id`)) join `temp_text` on(`temp_text`.`temp_id` = `templates`.`temp_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myimges`
--
ALTER TABLE `myimges`
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `mytexts`
--
ALTER TABLE `mytexts`
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `myvideos`
--
ALTER TABLE `myvideos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD KEY `temp_id` (`temp_id`);

--
-- Indexes for table `temp_text`
--
ALTER TABLE `temp_text`
  ADD KEY `temp_id` (`temp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`acc_id`,`acc_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myvideos`
--
ALTER TABLE `myvideos`
  MODIFY `video_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `temp_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `acc_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myimges`
--
ALTER TABLE `myimges`
  ADD CONSTRAINT `myimges_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `myvideos` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mytexts`
--
ALTER TABLE `mytexts`
  ADD CONSTRAINT `mytexts_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `myvideos` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `myvideos`
--
ALTER TABLE `myvideos`
  ADD CONSTRAINT `myvideos_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `users` (`acc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `users` (`acc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD CONSTRAINT `temp_images_ibfk_1` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`temp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `temp_text`
--
ALTER TABLE `temp_text`
  ADD CONSTRAINT `temp_text_ibfk_1` FOREIGN KEY (`temp_id`) REFERENCES `templates` (`temp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
