-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 11:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_longname` varchar(90) NOT NULL,
  `user_created_on` datetime NOT NULL,
  `user_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_longname`, `user_created_on`, `user_updated_on`) VALUES
(1, 'dsadasd1', '$2y$12$nVrBqn67J9VCxNgtG7hkk.5MO5LjazFTJ74Kcr43CRb1qTsel3U1i', 'John Doe', '2020-06-27 11:05:32', '2020-07-01 15:17:47'),
(2, 'johndoe4201212', '123456', 'John Doe', '2020-06-27 11:09:54', '2020-06-30 16:55:20'),
(3, 'johndoe420', '123456', 'John Doe', '2020-06-28 12:45:21', '2020-06-30 16:58:43'),
(14, 'johndoe', '123456', 'John Doe', '2020-06-28 12:46:58', '2020-06-30 17:44:52'),
(16, 'dasddsa3121312dasda', '$2y$12$w6rPQPN0qmA3qGuWu9XlfeaQKjwxTUxa0Wp3698BnYx4ODEWWlBC2', 'dasdasdasdasdasdasdasdasdadasdas', '2020-06-28 12:49:18', '2020-07-01 15:56:55'),
(22, 'johndoe4201212dasdasdasdasdasdas', '$2y$12$CAYzLgq7h4WfD00rYPdmQ.b0dHSP24keurK/wMeKmG..585yXamdS', 'dasdasdasd', '2020-07-01 15:56:00', '0000-00-00 00:00:00'),
(24, 'dasdasdasdasdasdasdasd', '$2y$12$HvPx9SjYX69bPqBDzsGeEO9E.5E3oazDaIr8yiEnKAAr576zZvfiu', 'dasdasdasdasdasdasdasdasdadasdas', '2020-07-03 09:33:33', '0000-00-00 00:00:00'),
(25, 'johndoe420121212312312dasdasdas', '$2y$12$1WywJa/J.gqs/FFJbLt.S.h4lC/hPJIb5fksO/5.AhzEpV8G62pDi', 'dasdasdasdasdasdasdasdasdadasdas', '2020-07-03 09:33:44', '0000-00-00 00:00:00'),
(26, 'ass1312312312312', '$2y$12$vQjfMO3malxwd0hyoNYwfebDSsAPad3S2gYKqvrUg.7jsftlGnw9i', 'asdasdasdasda', '2020-07-03 09:33:52', '0000-00-00 00:00:00'),
(27, 'dasldlasdkweiuoqwiue1o231231', '$2y$12$iGYWr3aQ0hT56CZe2N6s9eECu9WrjeBHvgExVa13oljOx/z.WEf3G', 'dasldlasdkweiuoqwiue', '2020-07-03 09:34:05', '0000-00-00 00:00:00'),
(28, '12312321312dsadasdsdasdasdadasdas', '$2y$12$4L/X59pUhBhviJ3riqskS.v275J2Osy3CoRhUJCtWiGSJDSdE3Syy', 'dasdasdasdasdasdasdasdasdadasdasw ', '2020-07-03 09:34:24', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
