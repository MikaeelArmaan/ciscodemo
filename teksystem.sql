-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 02:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teksystem`
--
CREATE DATABASE IF NOT EXISTS `teksystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teksystem`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `tbl_logs`
--

TRUNCATE TABLE `tbl_logs`;
--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `uri`, `method`, `params`, `api_key`, `ip_address`, `time`, `rtime`, `authorized`, `response_code`) VALUES
(1, 'api/admin/lists', 'get', NULL, '', '::1', 1601922569, 0.0128679, '1', 200),
(2, 'api/routers/lists', 'get', NULL, '', '::1', 1602065168, 0.00853801, '1', 0),
(3, 'api/routers/lists', 'get', NULL, '', '::1', 1602065192, 0.00725389, '1', 0),
(4, 'api/routers/lists', 'get', NULL, '', '::1', 1602065210, 0.00652504, '1', 0),
(5, 'api/routers/lists', 'get', NULL, '', '::1', 1602065220, 0.00944996, '1', 0),
(6, 'api/routers/lists', 'get', NULL, '', '::1', 1602065239, 0.00943804, '1', 0),
(7, 'api/routers/lists', 'get', NULL, '', '::1', 1602065651, 0.0110579, '1', 0),
(8, 'api/routers/lists', 'get', NULL, '', '::1', 1602065694, 0.0163872, '1', 200),
(9, 'api/routers/lists', 'get', NULL, '', '::1', 1602065710, 0.0159891, '1', 200),
(10, 'api/routers/add', 'post', NULL, '', '::1', 1602066343, 0.0107889, '1', 0),
(11, 'api/routers/add', 'post', NULL, '', '::1', 1602066352, 0.013386, '1', 0),
(12, 'api/routers/add', 'post', NULL, '', '::1', 1602066378, 0.010591, '1', 0),
(13, 'api/routers/add', 'post', NULL, '', '::1', 1602066442, 0.0104289, '1', 0),
(14, 'api/routers/add', 'post', NULL, '', '::1', 1602066474, 0.0158131, '1', 400),
(15, 'api/routers/lists', 'get', NULL, '', '::1', 1602066843, 0.0191741, '1', 200),
(16, 'api/routers/lists', 'get', NULL, '', '::1', 1602066845, 0.01775, '1', 200),
(17, 'api/routers/lists', 'get', NULL, '', '::1', 1602066845, 0.0135951, '1', 200),
(18, 'api/routers/add', 'post', NULL, '', '::1', 1602066981, 0.0131509, '1', 400),
(19, 'api/routers/add', 'post', 'a:4:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:8:\"loopback\";s:0:\"\";s:3:\"mac\";s:0:\"\";}', '', '::1', 1602067012, 0.0156951, '1', 400),
(20, 'api/routers/add', 'post', 'a:4:{s:8:\"hostname\";s:5:\"arman\";s:5:\"sapid\";s:8:\"12312jkk\";s:8:\"loopback\";s:15:\"123.123.231.123\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602067043, 0.016021, '1', 400),
(21, 'api/routers/add', 'post', 'a:4:{s:8:\"hostname\";s:9:\"armankhan\";s:5:\"sapid\";s:8:\"12312jkk\";s:8:\"loopback\";s:15:\"123.123.231.123\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602067049, 0.0291338, '1', 200),
(22, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------770530368347025069879931\r\nContent-Disposition:_form-data;_name\";s:428:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------770530368347025069879931\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------770530368347025069879931\r\nContent-Disposition: form-data; name=\"loopback\"\r\n\r\n123.123.231.123\r\n----------------------------770530368347025069879931\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------770530368347025069879931--\r\n\";}', '', '::1', 1602067549, 0.0133731, '1', 400),
(23, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------948008323408674707445059\r\nContent-Disposition:_form-data;_name\";s:428:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------948008323408674707445059\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------948008323408674707445059\r\nContent-Disposition: form-data; name=\"loopback\"\r\n\r\n123.123.231.123\r\n----------------------------948008323408674707445059\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------948008323408674707445059--\r\n\";}', '', '::1', 1602067590, 0.0166459, '1', 400),
(24, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------103878428766136858317364\r\nContent-Disposition:_form-data;_name\";s:428:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------103878428766136858317364\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------103878428766136858317364\r\nContent-Disposition: form-data; name=\"loopback\"\r\n\r\n123.123.231.123\r\n----------------------------103878428766136858317364\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------103878428766136858317364--\r\n\";}', '', '::1', 1602067613, 0.0123241, '1', 0),
(25, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------646544592123833433641941\r\nContent-Disposition:_form-data;_name\";s:428:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------646544592123833433641941\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------646544592123833433641941\r\nContent-Disposition: form-data; name=\"loopback\"\r\n\r\n123.123.231.123\r\n----------------------------646544592123833433641941\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------646544592123833433641941--\r\n\";}', '', '::1', 1602067652, 0.00977302, '1', 0),
(26, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------067378944294581269241238\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------067378944294581269241238\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------067378944294581269241238\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------067378944294581269241238--\r\n\";}', '', '::1', 1602067663, 0.00823784, '1', 0),
(27, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------649888234815839760308936\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------649888234815839760308936\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------649888234815839760308936\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------649888234815839760308936--\r\n\";}', '', '::1', 1602067690, 0.00995994, '1', 0),
(28, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------342244367914996110026182\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------342244367914996110026182\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------342244367914996110026182\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------342244367914996110026182--\r\n\";}', '', '::1', 1602067696, 0.0114219, '1', 0),
(29, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------550675535273449461986708\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------550675535273449461986708\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------550675535273449461986708\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------550675535273449461986708--\r\n\";}', '', '::1', 1602067703, 0.00841689, '1', 0),
(30, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------370929755035058891566168\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------370929755035058891566168\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------370929755035058891566168\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------370929755035058891566168--\r\n\";}', '', '::1', 1602067734, 0.021234, '1', 0),
(31, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------608291274215850013169437\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------608291274215850013169437\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------608291274215850013169437\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------608291274215850013169437--\r\n\";}', '', '::1', 1602067748, 0.0114651, '1', 0),
(32, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------519924471589497219938691\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------519924471589497219938691\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------519924471589497219938691\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------519924471589497219938691--\r\n\";}', '', '::1', 1602067854, 0.00921798, '1', 0),
(33, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------803668500058606476668738\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------803668500058606476668738\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------803668500058606476668738\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------803668500058606476668738--\r\n\";}', '', '::1', 1602067861, 0.0119271, '1', 0),
(34, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------829462414011448330305704\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------829462414011448330305704\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------829462414011448330305704\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------829462414011448330305704--\r\n\";}', '', '::1', 1602067868, 0.00938511, '1', 0),
(35, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------006397203678643908031532\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------006397203678643908031532\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------006397203678643908031532\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------006397203678643908031532--\r\n\";}', '', '::1', 1602067882, 0.00855279, '1', 0),
(36, 'api/routers/edit/122.3.4.5', 'put', 'a:2:{s:9:\"122.3.4.5\";N;s:90:\"----------------------------706755555163975626663845\r\nContent-Disposition:_form-data;_name\";s:306:\"\"hostname\"\r\n\r\narmankhan\r\n----------------------------706755555163975626663845\r\nContent-Disposition: form-data; name=\"sapid\"\r\n\r\n12312jkk\r\n----------------------------706755555163975626663845\r\nContent-Disposition: form-data; name=\"mac\"\r\n\r\nakjsdhaksjd\r\n----------------------------706755555163975626663845--\r\n\";}', '', '::1', 1602067953, 0.008147, '1', 0),
(37, 'api/routers/edit/122.3.4.5', 'post', 'a:4:{s:9:\"122.3.4.5\";N;s:8:\"hostname\";s:9:\"armankhan\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068052, 0.015728, '1', 200),
(38, 'api/routers/edit/122.3.4.5', 'post', 'a:4:{s:9:\"122.3.4.5\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068064, 0.0131888, '1', 200),
(39, 'api/routers/edit/122.3.4.5', 'post', 'a:4:{s:9:\"122.3.4.5\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068113, 0.0116148, '1', 200),
(40, 'api/routers/edit/122.3.4.5', 'post', 'a:4:{s:9:\"122.3.4.5\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068218, 0.0106781, '1', 0),
(41, 'api/routers/edit/122.3.4.5', 'post', 'a:4:{s:9:\"122.3.4.5\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068268, 0.015538, '1', 200),
(42, 'api/routers/edit/122.3.4.5', 'post', 'a:4:{s:9:\"122.3.4.5\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068293, 0.0112209, '1', 200),
(43, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068321, 0.0288908, '1', 200),
(44, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:8:\"12312jkk\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068498, 0.0144498, '1', 200),
(45, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:9:\"12312jkks\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068509, 0.0297999, '1', 200),
(46, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068520, 0.01702, '1', 200),
(47, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068574, 0.0295181, '1', 200),
(48, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:11:\"akjsdhaksjd\";}', '', '::1', 1602068740, 0.0178571, '1', 200),
(49, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:12:\"akjsdhaksjdd\";}', '', '::1', 1602068745, 0.0262899, '1', 200),
(50, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:12:\"akjsdhaksjdd\";}', '', '::1', 1602068764, 0.013624, '1', 200),
(51, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:12:\"akjsdhaksjdd\";}', '', '::1', 1602068767, 0.017921, '1', 200),
(52, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:10:\"armankhan2\";s:5:\"sapid\";s:12:\"12312jkkssss\";s:3:\"mac\";s:12:\"akjsdhaksjdd\";}', '', '::1', 1602068784, 0.01581, '1', 200),
(53, 'api/routers/edit/123.223.0.123', 'post', 'a:4:{s:13:\"123.223.0.123\";N;s:8:\"hostname\";s:11:\"armankhan2s\";s:5:\"sapid\";s:15:\"12312jkkssss222\";s:3:\"mac\";s:15:\"akjsdhaksjdd222\";}', '', '::1', 1602068805, 0.0171669, '1', 200),
(54, 'api/routers/lists', 'get', NULL, '', '::1', 1602068863, 0.016541, '1', 200),
(55, 'api/routers/lists', 'get', NULL, '', '::1', 1602068923, 0.0167031, '1', 200),
(56, 'api/routers/lists', 'get', NULL, '', '::1', 1602068937, 0.014097, '1', 200),
(57, 'api/routers/lists', 'get', NULL, '', '::1', 1602068946, 0.0142961, '1', 200),
(58, 'api/routers/lists', 'get', NULL, '', '::1', 1602068959, 0.020174, '1', 200),
(59, 'api/routers/lists', 'get', NULL, '', '::1', 1602068997, 0.0158088, '1', 200),
(60, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:1:\"s\";s:5:\"sapid\";s:0:\"\";s:3:\"mac\";s:0:\"\";s:8:\"loopback\";s:0:\"\";s:4:\"type\";s:3:\"AG1\";}', '', '::1', 1602069010, 0.015027, '1', 200),
(61, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:3:\"mac\";s:0:\"\";s:8:\"loopback\";s:0:\"\";s:4:\"type\";s:3:\"AG1\";}', '', '::1', 1602069021, 0.0149009, '1', 200),
(62, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:3:\"mac\";s:0:\"\";s:8:\"loopback\";s:0:\"\";s:4:\"type\";s:3:\"AG1\";}', '', '::1', 1602069260, 0.017853, '1', 200),
(63, 'api/routers/lists', 'get', 'a:6:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:3:\"mac\";s:0:\"\";s:9:\"loopback1\";s:3:\"129\";s:4:\"type\";s:0:\"\";s:9:\"loopback2\";s:0:\"\";}', '', '::1', 1602069636, 0.016109, '1', 200),
(64, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:9:\"loopback1\";s:15:\"123.123.231.123\";s:3:\"mac\";s:0:\"\";s:9:\"loopback2\";s:0:\"\";}', '', '::1', 1602069970, 0.013828, '1', 200),
(65, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:9:\"loopback1\";s:16:\"	253.128.106.151\";s:3:\"mac\";s:0:\"\";s:9:\"loopback2\";s:0:\"\";}', '', '::1', 1602070008, 0.013438, '1', 200),
(66, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:9:\"loopback1\";s:15:\"253.128.106.151\";s:3:\"mac\";s:0:\"\";s:9:\"loopback2\";s:0:\"\";}', '', '::1', 1602070014, 0.012413, '1', 200),
(67, 'api/routers/lists', 'get', 'a:5:{s:8:\"hostname\";s:0:\"\";s:5:\"sapid\";s:0:\"\";s:9:\"loopback1\";s:15:\"253.128.106.151\";s:3:\"mac\";s:0:\"\";s:9:\"loopback2\";s:0:\"\";}', '', '::1', 1602070102, 0.0240209, '1', 200),
(68, 'api/routers/delete/1', 'delete', 'a:1:{i:0;N;}', '', '::1', 1602070337, 0.011323, '1', 200),
(69, 'api/routers/delete/1', 'delete', 'a:1:{i:0;N;}', '', '::1', 1602070371, 0.013257, '1', 200),
(70, 'api/routers/delete/1', 'delete', 'a:1:{i:0;N;}', '', '::1', 1602070448, 0.0170741, '1', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_router`
--

CREATE TABLE `tbl_router` (
  `id` int(11) NOT NULL,
  `sapid` varchar(20) NOT NULL,
  `hostname` text NOT NULL,
  `loopback` varchar(15) NOT NULL,
  `mac_address` varchar(18) NOT NULL,
  `flg_is_assigned` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1-assigned,0-unassigned',
  `flg_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1-active,0-inactive',
  `flg_is_deleted` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1-deleted,0-present',
  `type` varchar(10) NOT NULL,
  `added_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_router`
--

TRUNCATE TABLE `tbl_router`;
--
-- Dumping data for table `tbl_router`
--

INSERT INTO `tbl_router` (`id`, `sapid`, `hostname`, `loopback`, `mac_address`, `flg_is_assigned`, `flg_status`, `flg_is_deleted`, `type`, `added_at`, `updated_at`, `added_by`, `updated_by`) VALUES
(1, '12312jkkssss222', 'armankhan2s', '123.223.0.123', 'akjsdhaksjdd222', 0, 0, 1, 'AG1', '2020-10-07 09:34:09', '2020-10-07 08:04:08', 0, 0),
(2, 'qkp5g8a3t10ir9hz74', 'jwscgdtiuy.com', '153.205.19.73', '6b:5a:5b:b1:05:07', 0, 1, 0, 'AG1', '2020-10-07 12:01:44', '2020-10-07 06:31:44', 0, 0),
(3, 'qxrdku1fja0lom7pt2', 'sqbyjxtpeu.com', '166.181.164.14', 'aa:10:d1:c5:fb:e7', 0, 1, 0, 'CSS', '2020-10-07 12:01:44', '2020-10-07 06:31:44', 0, 0),
(4, 'tyjdzn8e1qosv49luf', 'slvuqfdzkj.com', '198.35.1.155', '8e:b4:5d:f4:07:a3', 0, 1, 0, 'CSS', '2020-10-07 12:01:44', '2020-10-07 06:31:44', 0, 0),
(5, '9z40e7i1nrmtg8hcod', 'qjbtavucde.com', '253.128.106.151', 'b1:46:d6:31:c1:a6', 0, 1, 0, 'CSS', '2020-10-07 12:01:44', '2020-10-07 06:31:44', 0, 0),
(6, 'asas', 'armankhan', '123.123.231.123', 'akjsdhaksjds', 0, 0, 0, '', '2020-10-07 12:37:29', '2020-10-07 07:07:29', 0, 0),
(7, 'q0zd6lreoaik5xyh3c', 'alocujpntm.com', '172.136.177.223', 'ea:21:9d:a0:08:81', 0, 1, 0, 'AG1', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(8, 'pwvgadoc4fb61e9isq', 'iznbodupac.com', '13.58.65.53', 'aa:74:7e:7e:28:  ', 0, 1, 0, 'AG1', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(9, 'x9mr60f1o34kdtlzj5', 'vuptqrynkc.com', '96.94.255.214', 'ee:ac:b5:d8:7c:7e', 0, 1, 0, 'AG1', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(10, 'ip89y1coksdzmt0fxu', 'pdrmiakgyq.com', '244.68.208.116', '35:67:0f:9a:f7:11', 0, 1, 0, 'AG1', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(11, 'kqhsfbu4alx10yto98', 'saicwdvykh.com', '31.73.238.164', '5f:cb:39:f9:cc:f3', 0, 1, 0, 'CSS', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(12, '8hnecxaypd102675w9', 'akhivgbzuo.com', '159.227.213.107', '57:72:d9:3d:c1:45', 0, 1, 0, 'CSS', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(13, 'tgru0icl8knzyeox23', 'mrcqtzeusn.com', '244.217.146.43', '2e:50:ab:97:05:30', 0, 1, 0, 'CSS', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(14, 'sqt4plcrwf396dz527', 'hqwcybiunx.com', '97.36.152.207', 'f9:2c:03:ce:0a:b2', 0, 1, 0, 'CSS', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(15, 'm2o7bxjcev50airn1u', 'yfztkwjqug.com', '107.223.87.56', 'de:83:2c:f1:ce:63', 0, 1, 0, 'CSS', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0),
(16, 'mew53ivygbrdh4xkzj', 'neigzmkcqo.com', '100.36.21.125', '6a:8c:a2:a8:a6:ff', 0, 1, 0, 'AG1', '2020-10-07 14:07:52', '2020-10-07 08:37:52', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_router`
--
ALTER TABLE `tbl_router`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sapid` (`sapid`),
  ADD UNIQUE KEY `hostname` (`hostname`) USING HASH,
  ADD UNIQUE KEY `loopback` (`loopback`),
  ADD UNIQUE KEY `mac_address` (`mac_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_router`
--
ALTER TABLE `tbl_router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
