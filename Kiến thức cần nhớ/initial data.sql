-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2022 at 10:19 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traluanvan`
--

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`) VALUES
(1, 'Khoa học và Kỹ thuật Máy tính'),
(2, 'Điện - Điện tử'),
(3, 'Cơ khí'),
(4, 'Kỹ thuật Hóa học'),
(5, 'Kỹ thuật Xây dựng'),
(6, 'Công nghệ Vật liệu'),
(7, 'Khoa học Ứng dụng'),
(8, 'Quản lý Công nghiệp'),
(9, 'Môi trường và Tài nguyên'),
(10, 'Kỹ thuật Giao thông'),
(11, 'Kỹ thuật Địa chất và Dầu khí'),
(12, 'Trung tâm Đào tạo Bảo dưỡng Công nghiệp');

--
-- Dumping data for table `thesis_roles`
--

INSERT INTO `thesis_roles` (`id`, `name`) VALUES
(1, 'Graduate'),
(2, 'Master'),
(3, 'Ph.D');

--
-- Dumping data for table `thesis_statuses`
--

INSERT INTO `thesis_statuses` (`id`, `name`) VALUES
(1, 'Available'),
(2, 'On-hold'),
(3, 'Unavailable');

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`) VALUES
(1, 'Student'),
(2, 'Librarian'),
(3, 'Professor');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
