-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 12:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `migacade_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
`id` int(11) NOT NULL,
  `title1AR` varchar(255) DEFAULT NULL,
  `title2AR` varchar(255) DEFAULT NULL,
  `title3AR` varchar(255) DEFAULT NULL,
  `title1GE` varchar(255) NOT NULL,
  `title2GE` varchar(255) DEFAULT NULL,
  `title3GE` varchar(255) DEFAULT NULL,
  `titleAR` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `descGE` text NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title1AR`, `title2AR`, `title3AR`, `title1GE`, `title2GE`, `title3GE`, `titleAR`, `descAR`, `titleGE`, `descGE`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'إعرفنا أكتر', 'أكاديمية', 'MIG', 'Know More', 'MIG', 'Academy', 'إتعلم ألماني مع أكاديمية MIG', '<p>يقدم المركز خدمات عديدة للطلبه، تشمل تقديم كورسات بأسعار مخفضة عن طريق مدرسين مصريين و ألمان لجميع مستويات اللغه الألمانية&nbsp;وفقا للإطار الأوربي المرجعى لتعليم اللغات المعتمد فى معهد جوته .<br />كما يقدم السنتر خدمة مميزة و بأسعار ممتازة لتقديم العون للدراسة في ألمانيا عن طريق تجهيز و تقديم الأوراق للطلبة في الجامعات الألمانية .</p>\r\n<p>فريق عمل المركز فريق متكون من مصريين و ألمان لتسهيل عملية التسجيل للجامعات بطريقة سلسة و بدون أي تعقيدات من خلال فريق عمله ومستشاريه المنتشرين فى جميع ربوع &nbsp;ألمانيا</p>', 'Make It in Germany', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', '2015-11-02 08:22:43', '2016-02-03 05:44:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `about_images`
--

CREATE TABLE IF NOT EXISTS `about_images` (
`id` int(11) NOT NULL,
  `aboutId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_images`
--

INSERT INTO `about_images` (`id`, `aboutId`, `image`) VALUES
(6, 1, 'd6e80300ddb304ceb38d72a7751403ec.jpg'),
(5, 1, 'e9a8b4e7e709ccfc22625f9d3201bb08.jpg'),
(4, 1, '6b61de3266cda9b6edcc9d514babf579.jpg'),
(7, 1, 'd2cc583e5cf8ae022ef6316656911be9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE IF NOT EXISTS `about_sections` (
`id` int(11) NOT NULL,
  `aboutId` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `captionAR` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `captionGE` varchar(255) NOT NULL,
  `descGE` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `aboutId`, `titleAR`, `captionAR`, `descAR`, `titleGE`, `captionGE`, `descGE`) VALUES
(1, 1, 'ماذا؟ ', 'ماذا تعرف عن MIG? ', '<p>يقدم المركز خدمات عديدة للطلبه، تشمل تقديم كورسات بأسعار مخفضة عن طريق مدرسين مصريين و ألمان لجميع مستويات اللغه الألمانية&nbsp;وفقا للإطار الأوربي المرجعى لتعليم اللغات المعتمد فى معهد جوته .</p>\n<p>&nbsp;</p>', 'What?', 'MIG Academy', '<p>It is a long established fact that1111111111111111111111 a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here</p>'),
(2, 1, 'ليه? ', 'ليه تختار أكاديمية MIG? ', '<p>يقدم المركز خدمات عديدة للطلبه، تشمل تقديم كورسات بأسعار مخفضة عن طريق مدرسين مصريين و ألمان لجميع مستويات اللغه الألمانية&nbsp;وفقا للإطار الأوربي المرجعى لتعليم اللغات المعتمد فى معهد جوته .</p>\n<p>&nbsp;</p>', 'Why?', 'We are The Best', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here</p>'),
(3, 1, 'إزاي؟ ', 'إزاي تستفاد من MIG? ', '<p>يقدم المركز خدمات عديدة للطلبه، تشمل تقديم كورسات بأسعار مخفضة عن طريق مدرسين مصريين و ألمان لجميع مستويات اللغه الألمانية&nbsp;وفقا للإطار الأوربي المرجعى لتعليم اللغات المعتمد فى معهد جوته .</p>\n<p></p>', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
`id` int(11) NOT NULL,
  `traineeId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL DEFAULT '0',
  `packageId` int(11) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `paid` float NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Book and pay later, 1 = paypal',
  `status` varchar(255) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `branchesId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `traineeId`, `courseId`, `packageId`, `price`, `paid`, `type`, `status`, `addingDate`, `lastModifiedDate`, `userId`, `branchesId`) VALUES
(1, 3, 2, 0, 0, 0, 0, 'pending', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 2),
(2, 2, 2, 0, 0, 0, 0, 'pending', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 2),
(3, 1, 2, 0, 0, 0, 0, 'pending', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 2),
(4, 4, 6, 0, 0, 0, 1, 'normal', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 25),
(5, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 25),
(6, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 18),
(7, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 25),
(8, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-11 00:00:00', '0000-00-00 00:00:00', 0, 25),
(9, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(10, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(11, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(12, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(13, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(14, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(15, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(16, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(17, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(18, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(19, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(20, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(21, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(22, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(23, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(24, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(25, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(26, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(27, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(28, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(29, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(30, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(31, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(32, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(33, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(34, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(35, 5, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(36, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(37, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(38, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(39, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(40, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(41, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(42, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 0),
(43, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 0),
(44, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(45, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(46, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(47, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(48, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(49, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(50, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(51, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(52, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(53, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(54, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(55, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(56, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(57, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(58, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(59, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(60, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(61, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(62, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(63, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(64, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(65, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(66, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(67, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(68, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(69, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(70, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(71, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(72, 1, 6, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 25),
(73, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(74, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(75, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 19),
(76, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 19),
(77, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(78, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(79, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(80, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(81, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(82, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(83, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(84, 1, 2, 0, 0, 0, 0, 'pending', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(85, 1, 2, 0, 0, 0, 0, 'pending', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(86, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(87, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(88, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(89, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(90, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(91, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(92, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(93, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(94, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(95, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(96, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(97, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(98, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(99, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(100, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(101, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(102, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(103, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(104, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(105, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(106, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(107, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(108, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(109, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(110, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(111, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(112, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(113, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 18),
(114, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(115, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 19),
(116, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 19),
(117, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 19),
(118, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 19),
(119, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(120, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(121, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(122, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(123, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-13 00:00:00', '0000-00-00 00:00:00', 0, 20),
(124, 1, 2, 0, 0, 0, 1, 'normal', '2016-02-14 00:00:00', '0000-00-00 00:00:00', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`id` int(11) NOT NULL,
  `title1AR` varchar(255) DEFAULT NULL,
  `title2AR` varchar(255) DEFAULT NULL,
  `title3AR` varchar(255) DEFAULT NULL,
  `title1GE` varchar(255) DEFAULT NULL,
  `title2GE` varchar(255) DEFAULT NULL,
  `title3GE` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `lastModifiedDate` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title1AR`, `title2AR`, `title3AR`, `title1GE`, `title2GE`, `title3GE`, `image`, `userId`, `lastModifiedDate`) VALUES
(1, 'اهلاً و سهلاً', 'Germany', 'Make It in', 'Hello', 'Make It in', 'Germany', '171416e7b49039b2d9bef3b9a21d94a4.jpg', 1, '2016-02-03 06:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `descGE` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `autherAR` varchar(255) NOT NULL,
  `autherGE` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `titleAR`, `titleGE`, `descAR`, `descGE`, `image`, `addingDate`, `lastModifiedDate`, `userId`, `autherAR`, `autherGE`) VALUES
(10, 'المدونة الأولى', 'First Blog Post', '<p>يقدم المركز خدمات عديدة للطلبه، تشمل تقديم كورسات بأسعار مخفضة عن طريق مدرسين مصريين و ألمان لجميع مستويات اللغه الألمانية&nbsp;وفقا للإطار الأوربي المرجعى لتعليم اللغات المعتمد فى معهد جوته .<br style="box-sizing: border-box;" />كما يقدم السنتر خدمة مميزة و بأسعار ممتازة لتقديم العون للدراسة في ألمانيا عن طريق تجهيز و تقديم الأوراق للطلبة في الجامعات الألمانية .</p>\r\n<p></p>', '<p>First Blog Post</p>', 'eb0f20ddca4b80b41eb4c3f2a1675fce.jpg', '2016-02-03 10:00:47', '2016-02-03 10:01:08', 1, '', ''),
(11, 'المدونة الثانية', 'Second Blog Post', '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-area" style="box-sizing: border-box; position: relative; min-height: 1px; padding-left: 15px; padding-right: 15px; float: right; width: 585px; color: #757575; font-family: mobily, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 28px;">\r\n<p>يقدم المركز خدمات عديدة للطلبه، تشمل تقديم كورسات بأسعار مخفضة عن طريق مدرسين مصريين و ألمان لجميع مستويات اللغه الألمانية&nbsp;وفقا للإطار الأوربي المرجعى لتعليم اللغات المعتمد فى معهد جوته .<br style="box-sizing: border-box;" />كما يقدم السنتر خدمة مميزة و بأسعار ممتازة لتقديم العون للدراسة في ألمانيا عن طريق تجهيز و تقديم الأوراق للطلبة في الجامعات الألمانية .</p>\r\n<p>فريق عمل المركز فريق متكون من مصريين و ألمان لتسهيل عملية التسجيل للجامعات بطريقة سلسة و بدون أي تعقيدات من خلال فريق عمله ومستشاريه المنتشرين فى جميع ربوع &nbsp;ألماني</p>\r\n</div>', '<p>Second Blog Post</p>', '0cf8115f5f6edca7889d989bae02e3b4.jpg', '2016-02-03 10:02:01', '2016-02-10 08:54:56', 1, 'sdfdssdfsf', 'sdasdasda');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `titleGE` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `desAR` text CHARACTER SET utf8mb4 NOT NULL,
  `desGE` text CHARACTER SET utf8mb4 NOT NULL,
  `phone` int(14) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `lagitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `userId` int(11) NOT NULL,
  `lastModifiedDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `titleAR`, `titleGE`, `desAR`, `desGE`, `phone`, `mail`, `lagitude`, `latitude`, `isActive`, `userId`, `lastModifiedDate`) VALUES
(2, 'باب الشعرية', 'الماني', '<p>وصف الفرع</p>', '<p>وصف ألماني</p>', 100, 'email@yahoo.com', '31.255963410028016', '30.053998821776116', 1, 1, '2016-02-02 08:48:32'),
(3, 'المعادي', 'الاسم بالالماني', '<p>وصف فرع</p>', '<p>الوصف</p>', 1000885477, 'efrsd;gnss@yahoo.com', '31.25111397612909', '29.969939985313733', 1, 1, '2016-02-11 10:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `titleAR`, `titleGE`, `isActive`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'A1', 'A1', 1, '2015-05-24 10:58:25', '2016-02-03 06:02:44', 1),
(11, 'B2', 'B2', 1, '2016-02-03 06:03:50', '0000-00-00 00:00:00', 1),
(8, 'A2', 'A2', 1, '2015-05-24 11:26:37', '2016-02-03 06:02:55', 1),
(10, 'B1', 'B1', 1, '2016-02-03 06:03:43', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `tel`, `email`, `message`, `date`) VALUES
(16, 'ibrahim samir', '01000885477', 'ebrahim_samer2001@yahoo.com', 'sdasadasdadasd', '2016-02-09 08:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
`id` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `lagitude` varchar(255) NOT NULL,
  `paypalEmail` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `tel`, `email`, `latitude`, `lagitude`, `paypalEmail`, `facebook`, `linkedIn`, `twitter`, `addingDate`, `lastModifiedDate`) VALUES
(1, '+1 234 5678 910', 'ebrahim_samer2001@yahoo.com', '30.00304061468779', '31.245256031640565', 'yasmeen.fci@gmail.com', 'https://www.facebook.com/', 'https://www.linkedin.com', '', '2015-05-06 07:39:45', '2016-02-07 14:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `desc200AR` varchar(200) NOT NULL,
  `desc200GE` varchar(200) NOT NULL,
  `contentAR` text COMMENT 'course content',
  `contentGE` text,
  `categoryId` int(11) NOT NULL DEFAULT '0' COMMENT 'This will be any id, if the type is language',
  `image` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1= active',
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `duration` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `titleAR`, `titleGE`, `desc200AR`, `desc200GE`, `contentAR`, `contentGE`, `categoryId`, `image`, `isActive`, `addingDate`, `lastModifiedDate`, `userId`, `price`, `duration`) VALUES
(1, 'A1', 'A1', '<p>يتم التدريب على نظام امتحانات معهد جوتة، تعقد امتحانات دورية في كافة المستويات على ان يكون الامتحان مشابهاً تماما لامتحانات معهد جوتة&nbsp;</p>\r\n<p>سعرالامتحان ٥٠ جنيه مصري&nbsp;</p>\r\n<p></p>', '', '<p>يتم التدريب على نظام امتحانات معهد جوتة، تعقد امتحانات دورية في كافة المستويات على ان يكون الامتحان مشابهاً تماما لامتحانات معهد جوتة&nbsp;</p>\r\n<p>سعرالامتحان ٥٠ جنيه مصري&nbsp;</p>\r\n<p>متابعة دورية للدارسين عند طريق جروب واتس اب للرد على كافة الأسئلة في اي وقت.&nbsp;</p>\r\n<p>تعقد دورات خاصة للتدريب على امتحان B1 و B2. سعر الدورة ٥٠٠ جنيه مصري</p>', '', 1, 'd08b21821dcae8994ddca2fb35ba8553.jpg', 1, '2016-02-05 10:09:26', '2016-02-10 09:46:06', 1, '450', 25),
(2, 'B1', 'B1', '<p>يتم التدريب على نظام امتحانات معهد جوتة، تعقد امتحانات دورية في كافة المستويات على ان يكون الامتحان مشابهاً تماما لامتحانات معهد جوتة&nbsp;</p>\r\n<p>سعرالامتحان ٥٠ جنيه مصري&nbsp;</p>\r\n<p></p>', '', '<p>يتم التدريب على نظام امتحانات معهد جوتة، تعقد امتحانات دورية في كافة المستويات على ان يكون الامتحان مشابهاً تماما لامتحانات معهد جوتة&nbsp;</p>\r\n<p>سعرالامتحان ٥٠ جنيه مصري&nbsp;</p>\r\n<p>متابعة دورية للدارسين عند طريق جروب واتس اب للرد على كافة الأسئلة في اي وقت.&nbsp;</p>\r\n<p>تعقد دورات خاصة للتدريب على امتحان B1 و B2. سعر الدورة ٥٠٠ جنيه مصري</p>', '', 10, '9bb77d9f1e98883ef2c16834322a693f.jpg', 1, '2016-02-05 10:18:52', '2016-02-10 03:32:21', 1, '500', 25),
(5, 'كورس 1', 'الماني', '<p>كورس 1</p>', '<p>الماني</p>', '<p>كورس 1</p>', '<p>الماني</p>', 1, 'ed97fe729f2648a8e21cf0a29f97dd7b.jpg', 1, '2016-02-10 15:03:51', '0000-00-00 00:00:00', 1, '1500', 120),
(6, 'كورس 1', 'الماني', '<p>كورس 1</p>', '<p>الماني</p>', '<p>كورس 1</p>', '<p>الماني</p>', 1, 'acfd74fbee259983d09860b1c70227b2.jpg', 1, '2016-02-10 15:08:21', '2016-02-14 08:19:09', 1, '1500', 120),
(7, 'كورس 2', 'ألماني 2', '<p>كورس 2</p>', '<p>ألماني 2</p>', '<p>كورس 2</p>', '<p>ألماني 2</p>', 1, '0e0b25c72d78f828f6da118a3b1d8bed.jpg', 1, '2016-02-21 03:38:58', '2016-02-21 04:23:56', 1, '1500', 10);

-- --------------------------------------------------------

--
-- Table structure for table `course_branches`
--

CREATE TABLE IF NOT EXISTS `course_branches` (
`id` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `branchesId` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `weeksNum` int(11) NOT NULL,
  `lecturesNum` int(11) NOT NULL,
  `AvailableSeats` int(11) NOT NULL,
  `start` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_branches`
--

INSERT INTO `course_branches` (`id`, `courseId`, `branchesId`, `price`, `duration`, `weeksNum`, `lecturesNum`, `AvailableSeats`, `start`) VALUES
(18, 2, 2, '500', 10, 10, 10, 0, '0000-00-00 00:00:00'),
(19, 2, 3, '1200', 10, 10, 10, 0, '0000-00-00 00:00:00'),
(20, 2, 3, '1200', 10, 10, 10, 0, '0000-00-00 00:00:00'),
(39, 6, 2, '10000', 10, 100, 10, 0, '2016-02-14 00:00:00'),
(40, 6, 2, '1000', 100, 10, 100, 0, '2016-02-14 00:00:00'),
(48, 7, 3, '1500', 10, 12, 18, 10, '2016-02-21 00:00:00'),
(49, 7, 2, '100', 10, 5, 15, 15, '2016-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_instructors`
--

CREATE TABLE IF NOT EXISTS `course_instructors` (
`id` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `instructorId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_instructors`
--

INSERT INTO `course_instructors` (`id`, `courseId`, `instructorId`) VALUES
(58, 5, 9),
(57, 1, 9),
(60, 2, 9),
(4, 3, 2),
(5, 3, 9),
(10, 4, 10),
(9, 4, 9),
(20, 5, 10),
(19, 5, 9),
(86, 6, 10),
(101, 7, 10),
(100, 7, 9),
(85, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `contentAR` text NOT NULL,
  `contentGE` text NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `locationAR` varchar(255) NOT NULL,
  `locationGE` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `lagitude` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `titleAR`, `titleGE`, `contentAR`, `contentGE`, `date`, `startTime`, `endTime`, `locationAR`, `locationGE`, `latitude`, `lagitude`, `image`, `userId`, `addingDate`, `lastModifiedDate`) VALUES
(17, 'إتعلم ألماني مع أكاديمية MIG', 'event', '<p>إتعلم ألماني مع أكاديمية MIG&nbsp;</p>\n<p>إتعلم ألماني مع أكاديمية MIG&nbsp;</p>\n<p>إتعلم ألماني مع أكاديمية MIG&nbsp;</p>', '<p>text</p>', '2016-02-09', '16:00:00', '18:59:00', 'الاسكندرية', 'alexandria', '31.187990112742607', '29.925094212182557', '512ce7ab11e06ef24c48e809a81dcde7.jpg', 1, '2016-02-05 11:01:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events_applications`
--

CREATE TABLE IF NOT EXISTS `events_applications` (
`id` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_applications`
--

INSERT INTO `events_applications` (`id`, `eventId`, `name`, `tel`, `email`, `date`) VALUES
(5, 17, 'hossamnasef', '0111111111', 'hossam.ossama@gmail.com', '2016-02-05 11:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `tel`, `email`, `message`, `date`) VALUES
(1, 'ibrahim samir', '01000885477', 'ebrahim_samer2001@yahoo.com', 'asdsafdsdfsdfd', '2016-02-09 08:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `descGE` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 => images, 2 => videos',
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `isActive` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1= active',
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `titleAR`, `descAR`, `titleGE`, `descGE`, `image`, `type`, `addingDate`, `lastModifiedDate`, `isActive`, `userId`) VALUES
(2, 'fgggggg', '<p>ggggggggg</p>', 'ggggggg', '<p>ggggggggg</p>', '3476ae0b20de061e295da846d02a4265.jpg', 1, '2015-06-07 15:08:18', '0000-00-00 00:00:00', 1, 1),
(4, 'dddddd', '', 'dddddd', '', '6b4a3f67068729f7e7e5fe7913fbfa20.jpg', 1, '2015-06-07 16:20:56', '0000-00-00 00:00:00', 1, 1),
(5, 'vvvvvvvv', '', 'vvvvvvvvv', '', 'f1a4d56f83d0eec36507330998c8a430.jpg', 1, '2015-06-07 16:33:18', '0000-00-00 00:00:00', 1, 1),
(6, 'video gallery 1', '', 'video gallery 1', '', '3b6e0af4038a538fe49498579b02a391.jpg', 2, '2015-06-07 16:46:49', '0000-00-00 00:00:00', 1, 1),
(8, 'video gallery 2', '', 'video gallery 2', '', 'dee4c9f6d373352ac27527a245c9daf2.jpg', 2, '2015-06-08 00:24:55', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_files`
--

CREATE TABLE IF NOT EXISTS `gallery_files` (
`id` int(11) NOT NULL,
  `galleryId` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_files`
--

INSERT INTO `gallery_files` (`id`, `galleryId`, `titleAR`, `titleGE`, `fileName`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 3, '', '', '55e6a41f6635adec3af8359c220ea6a2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 3, '', '', 'f6a57f09d1aa5b0fd16d9219f46cb5ec.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 3, '', '', '02cce91db52c0f6e138f594bedefbe21.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 2, '', '', 'd58ae9ecc38c9e40a80c152479a612df.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 2, '', '', '8d88d7634833b6f76cbd2f335a4901f6.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 0, 'dddddd', 'ddddd', NULL, '2015-06-07 16:23:14', '0000-00-00 00:00:00', 1),
(11, 0, 'ddd', 'ddd', '015f345dd204d90f288541d82d1e8c5b.jpg', '2015-06-07 16:23:23', '0000-00-00 00:00:00', 1),
(12, 4, 'srgdfsg111', 'fgdfg111111', 'e5b620c14d5f30f9c580e5a4f8c2993f.jpg', '2015-06-07 16:23:57', '2015-06-07 16:25:58', 1),
(14, 5, 'aaaaaa', 'aaaaaaaaa', '7a9c552017e638119af4b99cb8cf610b.jpg', '2015-06-07 16:33:33', '0000-00-00 00:00:00', 1),
(15, 5, 'bbb', 'bbbb', '1592d10092acfdae4c9a0dd4a9a36150.jpg', '2015-06-07 16:33:45', '0000-00-00 00:00:00', 1),
(16, 5, 'ccc', 'ccccc', '04f3975d42cc8593e0f7acdb9c232caf.jpg', '2015-06-07 16:34:04', '0000-00-00 00:00:00', 1),
(21, 6, 'video1', 'video1', '01QWC-rZcfE', '2015-06-08 00:06:38', '2015-11-02 10:28:58', 1),
(22, 6, 'video2', 'video2', 'auxpcdQimCs', '2015-06-08 00:06:50', '2015-11-02 10:29:02', 1),
(23, 8, 'ccccc', 'ccccc', 'auxpcdQimCs', '2015-06-08 00:25:07', '0000-00-00 00:00:00', 1),
(24, 8, 'dddd', 'dd', 'auxpcdQimCs', '2015-06-08 00:25:16', '0000-00-00 00:00:00', 1),
(25, 2, 'لبلل', 'ffgfdg', '8f802976a705fa2db52862cd780369d4.jpg', '2015-11-02 10:25:50', '2015-11-02 10:26:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
`id` int(11) NOT NULL,
  `title1AR` varchar(255) DEFAULT NULL,
  `title2AR` varchar(255) DEFAULT NULL,
  `title3AR` varchar(255) DEFAULT NULL,
  `title1GE` varchar(255) DEFAULT NULL,
  `title2GE` varchar(255) DEFAULT NULL,
  `title3GE` varchar(255) DEFAULT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `captionAR` varchar(255) NOT NULL COMMENT 'this can be empty',
  `captionGE` varchar(255) NOT NULL COMMENT 'this can be empty',
  `pageName` varchar(255) NOT NULL COMMENT 'the place where this row is used, those are specific names',
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='static titles and description for interface pages';

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `title1AR`, `title2AR`, `title3AR`, `title1GE`, `title2GE`, `title3GE`, `titleAR`, `titleGE`, `captionAR`, `captionGE`, `pageName`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'MIG', 'شركاء', 'النجاح', 'Meet', 'MIG', 'Partners', 'الشركاء', 'Partners', 'شركاء النجاح في شتى المجالات', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'partnersContent', '2015-05-28 10:58:59', '2016-02-03 06:26:48', 1),
(10, 'أكاديمية MIG', 'توثيق', 'النجاح', 'MIG', 'Video', 'Image', 'معرض الصور و الفيديو', 'Gallery', 'البومات داخل و خارج الأكاديمية', 'Image and Video Albums', 'galleryContent', '2016-02-03 06:34:44', '2016-02-03 06:35:52', 1),
(2, 'إعرفنا أكتر', 'فريق', 'MIG', 'Meet', 'MIG', 'Team', 'فريق MIG', 'Meet Our Team', 'فريق إدارة أكاديمية MIG', 'MIG Management Team', 'ourTeam', '2015-05-28 11:35:32', '2016-02-03 06:17:36', 1),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'Why Join XSpace', 'Why Join XSpace', 'Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. Ferri clitaponderum ne.', 'Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. Ferri clitaponderum ne.', 'indexSection2', '2015-05-31 04:43:48', '0000-00-00 00:00:00', 1),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 'College Admissions', 'College Admissions', 'Ex utamur fierent tacimates duis choro an', 'Ex utamur fierent tacimates duis choro an', 'admissionsContent', '2015-06-06 13:09:40', '0000-00-00 00:00:00', 1),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 'الخدمات', 'Services', '', '', 'servicesContent', '2015-06-07 13:53:46', '0000-00-00 00:00:00', 1),
(6, 'أكاديمية MIG', 'توثيق', 'النجاح', 'View', 'MIG', 'Gallery', 'معرض الصور', 'MIG Image Gallery', 'ألبومات الصور داخل و خارج أكاديمية MIG', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'albumsContent', '2015-11-02 10:22:14', '2016-02-03 06:42:31', 1),
(7, 'إتعلم ألماني', 'أكاديمية', 'MIG', 'Learn', 'MIG', 'Academy', 'الكورسات', 'MIG Courses', 'أختار الكورس المناسب لك', 'Choose the suitable course', 'coursesContent', '2015-11-02 11:27:05', '2016-02-03 06:05:35', 1),
(8, 'Contact', 'MIG', 'Academy', 'Contact', 'MIG', 'Academy', 'Connect with us', 'Connect with us', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'contactContent', '2015-11-02 15:25:16', '0000-00-00 00:00:00', 1),
(9, 'إقرأ', 'مدونة', 'MIG', 'Read', 'MIG', 'Blog', 'اخر المدونات', 'Latest Blog', 'مقالات من فريق و طلبة MIG', '', 'blogContent', '2015-11-02 17:06:19', '2016-02-03 06:45:28', 1),
(11, 'أكاديمية MIG', 'توثيق', 'النجاح', 'MIG', 'Video', 'Image', 'معرض الفيديو', 'Gallery', 'فيديوهات داخل و خارج أكاديمية MIG', 'Image and Video Albums', 'videosContent', '2016-02-03 06:42:37', '0000-00-00 00:00:00', 1),
(12, 'تابع', 'أخبار', 'MIG', 'Follow', 'MIG', 'NEWS', 'أخر الأخبار و الإنجازات', 'Latest News', 'إنجازات و أخبار أكاديمية MIG', 'News & Achievements', 'newsContent', '2016-02-03 06:54:53', '0000-00-00 00:00:00', 1),
(13, 'تابع', 'مناسبات', 'MIG', 'Follow', 'MIG', 'Events', 'المناسبات', 'Events', 'مناسبات MIG', 'Follow MIG Events', 'eventsContent', '2016-02-03 09:54:17', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'secretary', 'Secretary user'),
(3, 'system', 'System user'),
(4, 'website', 'Website Admin');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
`id` int(11) NOT NULL,
  `nameAR` varchar(255) NOT NULL,
  `nameGE` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `descGE` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT '0' COMMENT '0 = male, 1 = female',
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `nameAR`, `nameGE`, `descAR`, `descGE`, `image`, `gender`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(10, 'ياسر سليمان', 'Yasser Soliman', '<p>َاكاديمية MIG</p>', '<p>MIG Academy</p>', 'fbd201ae839d84d76a1b4c0f85f80bdf.jpg', 0, '2016-02-03 05:57:17', '0000-00-00 00:00:00', 1),
(9, 'علي منصور', 'Ali Mansour', '<p>مؤسس اكاديمية MIG</p>', '<p>MIG Academy Founder</p>', '66886e2c2023d102bf26788fb04d6dbe.jpg', 0, '2015-05-29 11:22:56', '2016-02-03 05:51:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ipn_log`
--

CREATE TABLE IF NOT EXISTS `ipn_log` (
`id` int(11) NOT NULL,
  `listener_name` varchar(3) DEFAULT NULL COMMENT 'Either IPN or API',
  `transaction_type` varchar(16) DEFAULT NULL COMMENT 'The type of call being made to the listener',
  `transaction_id` varchar(19) DEFAULT NULL COMMENT 'The unique transaction ID generated by PayPal',
  `status` varchar(16) DEFAULT NULL COMMENT 'The status of the call',
  `message` varchar(512) DEFAULT NULL COMMENT 'Explanation of the call status',
  `ipn_data_hash` varchar(32) DEFAULT NULL COMMENT 'MD5 hash of the IPN post data',
  `detail` text COMMENT 'Detail text (potentially JSON) on this call',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipn_log`
--

INSERT INTO `ipn_log` (`id`, `listener_name`, `transaction_type`, `transaction_id`, `status`, `message`, `ipn_data_hash`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'IPN', 'cache', NULL, NULL, NULL, NULL, 'a:38:{s:8:"mc_gross";s:6:"333.00";s:22:"protection_eligibility";s:10:"Ineligible";s:14:"address_status";s:9:"confirmed";s:8:"payer_id";s:13:"BJMUSDEHFCTPE";s:3:"tax";s:4:"0.00";s:14:"address_street";s:9:"1 Main St";s:12:"payment_date";s:25:"19:54:55 Nov 05, 2015 PST";s:14:"payment_status";s:7:"Pending";s:7:"charset";s:12:"windows-1252";s:11:"address_zip";s:5:"95131";s:10:"first_name";s:7:"Yasmeen";s:20:"address_country_code";s:2:"US";s:12:"address_name";s:13:"Yasmeen Hamid";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:10:"unverified";s:15:"address_country";s:13:"United States";s:12:"address_city";s:8:"San Jose";s:8:"quantity";s:1:"1";s:11:"verify_sign";s:56:"ABx8YosY6No1Rlx.-SdEzzHnVKG.A5wINJGcN5BdNOSzW0MCPa0NFYMJ";s:11:"payer_email";s:28:"yasmeen.fci-buyer2@gmail.com";s:6:"txn_id";s:17:"6EF49313AC3037526";s:12:"payment_type";s:7:"instant";s:9:"last_name";s:5:"Hamid";s:13:"address_state";s:2:"CA";s:14:"receiver_email";s:21:"yasmeen.fci@gmail.com";s:14:"pending_reason";s:10:"unilateral";s:8:"txn_type";s:10:"web_accept";s:9:"item_name";s:8:"package1";s:11:"mc_currency";s:3:"USD";s:11:"item_number";s:0:"";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:15:"handling_amount";s:4:"0.00";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:6:"333.00";s:8:"shipping";s:4:"0.00";s:12:"ipn_track_id";s:13:"f9761bed3d1c9";}', '2015-11-05 22:31:22', '2015-11-05 22:55:01'),
(2, 'IPN', 'web_accept', '2DF36884HG738183U', 'SUCCESS', 'Parsing, authentication and validation complete', '9bcb42ad402307affaa6dd501eeb6a8e', '{"ipn_data":{"mc_gross":"2000.00","protection_eligibility":"Ineligible","address_status":"confirmed","payer_id":"BJMUSDEHFCTPE","tax":"0.00","address_street":"1 Main St","payment_date":"19:31:17 Nov 05, 2015 PST","payment_status":"Pending","charset":"windows-1252","address_zip":"95131","first_name":"Yasmeen","address_country_code":"US","address_name":"Yasmeen Hamid","notify_version":"3.8","custom":null,"payer_status":"unverified","address_country":"United States","address_city":"San Jose","quantity":"1","verify_sign":"AgUrNvI4k8kPKcQ3WKJfHwiFJ7kQA-FnTcEVFiPledr81MGeAQXT52uW","payer_email":"yasmeen.fci-buyer2@gmail.com","txn_id":"2DF36884HG738183U","payment_type":"instant","last_name":"Hamid","address_state":"CA","receiver_email":"yasmeen.fci@gmail.com","pending_reason":"unilateral","txn_type":"web_accept","item_name":"course1","mc_currency":"USD","item_number":null,"residence_country":"US","test_ipn":"1","handling_amount":"0.00","transaction_subject":null,"payment_gross":"2000.00","shipping":"0.00","ipn_track_id":"e045e67a9a743"},"ipn_response":"HTTP\\/1.1 200 OK\\r\\nDate: Fri, 06 Nov 2015 03:31:23 GMT\\r\\nServer: Apache\\r\\nX-Frame-Options: SAMEORIGIN\\r\\nSet-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=FuAe2EDj__iEYBJfrGUDdRumsAD3XYuOGl1YU4f_Ze4rIUy-Mrac5m2wfaoX1CY1IYPYxoA4MJtYO3eMWHYfPaPcgpN1WYr5vupR5QuqQG95k1h38DpTwVxUKkBEnqeD01wmVp0Cnn6hN0tVqIUyKqfZ_55TNK68T3oRZMZI5gBzH_ls2YszbuE1jKeKWo-6dYlLEymlSv0EYXxqOMTAIgFvQCEZbf5WaOL13jAIzmCtsHZJBxZHxI6Dz-Olge4jtmv5TuzA27C3vFxW9CMezb1GzB_ZS6W7PtcukGqLqkkj5E1eDH243DyOgNngEZIBj-sffHXm80n-5kiUC6doPk_Y4F0-hd_HbnI2PO5kShMDzEjqv7PHsxMR2GdNlvloC8sgJgLff4DwhNwJhUZNu9Qtzxpmqjb_nZlTh5zQo0tnz_rxCPeUk_3ZFHa; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: cookie_check=yes; expires=Mon, 03-Nov-2025 03:31:23 GMT; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: navlns=0.0; expires=Sun, 05-Nov-2017 03:31:23 GMT; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: Apache=10.72.108.11.1446780683296226; path=\\/; expires=Sun, 29-Oct-45 03:31:23 GMT\\r\\nVary: Accept-Encoding,User-Agent\\r\\nConnection: close\\r\\nPaypal-Debug-Id: 1b7789544491\\r\\nSet-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D186596438; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT\\r\\nSet-Cookie: Apache=10.72.128.11.1446780683279506; path=\\/; expires=Sun, 29-Oct-45 03:31:23 GMT\\r\\nStrict-Transport-Security: max-age=14400\\r\\nTransfer-Encoding: chunked\\r\\nContent-Type: text\\/html; charset=UTF-8\\r\\n\\r\\n8\\r\\nVERIFIED\\r\\n0\\r\\n\\r\\n"}', '2015-11-05 22:31:22', '2015-11-05 22:31:22'),
(3, 'IPN', 'web_accept', '6EF49313AC3037526', 'SUCCESS', 'Parsing, authentication and validation complete', '66efcaa17451371f6eaa4972cb7d16e4', '{"ipn_data":{"mc_gross":"333.00","protection_eligibility":"Ineligible","address_status":"confirmed","payer_id":"BJMUSDEHFCTPE","tax":"0.00","address_street":"1 Main St","payment_date":"19:54:55 Nov 05, 2015 PST","payment_status":"Pending","charset":"windows-1252","address_zip":"95131","first_name":"Yasmeen","address_country_code":"US","address_name":"Yasmeen Hamid","notify_version":"3.8","custom":null,"payer_status":"unverified","address_country":"United States","address_city":"San Jose","quantity":"1","verify_sign":"ABx8YosY6No1Rlx.-SdEzzHnVKG.A5wINJGcN5BdNOSzW0MCPa0NFYMJ","payer_email":"yasmeen.fci-buyer2@gmail.com","txn_id":"6EF49313AC3037526","payment_type":"instant","last_name":"Hamid","address_state":"CA","receiver_email":"yasmeen.fci@gmail.com","pending_reason":"unilateral","txn_type":"web_accept","item_name":"package1","mc_currency":"USD","item_number":null,"residence_country":"US","test_ipn":"1","handling_amount":"0.00","transaction_subject":null,"payment_gross":"333.00","shipping":"0.00","ipn_track_id":"f9761bed3d1c9"},"ipn_response":"HTTP\\/1.1 200 OK\\r\\nDate: Fri, 06 Nov 2015 03:55:02 GMT\\r\\nServer: Apache\\r\\nX-Frame-Options: SAMEORIGIN\\r\\nSet-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=nfCEMf8mGMCVgf9JlwAWvmg9qo4_3_iS3Wh6c08r0BLR3dBr5LiHorabaqWYfNp8EXBJNQ1S6SWB5wKApoIevJ5z8ENQGDIlIivdYMGFkmU4Mqmas1-Q-L97Xv7bKYo0UtMbkQ5bLLhgmnFCrSx8lJNE4plsl0N_TNoO0dhO2xE8aVXcjEvTZsH1LITJzBKNznHLJonBV2cBI4IauAmT8-_D-gBdutH69HvMbA0dpjQjkSplaxWB1JWX7BMuHDRdgfVN7EWVrvG7CS0RoLVu11hi8c7qGricwMAdzxAbPS0fm-QTgaU_ktSFtNAKnu6csAc-RKkm8yO7u3zWKa89e1OG_FZHbUAylIooWY9-Fcgui1OmEWtOGHErgIBTsQJHkiGr_Y9475Iz8jBnBoPBNSZDjzyF1WSLeITBFhUJSB3Ymd4I7S1-M6jQEjK; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: cookie_check=yes; expires=Mon, 03-Nov-2025 03:55:03 GMT; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: navlns=0.0; expires=Sun, 05-Nov-2017 03:55:03 GMT; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: Apache=10.72.108.11.1446782102905960; path=\\/; expires=Sun, 29-Oct-45 03:55:02 GMT\\r\\nVary: Accept-Encoding,User-Agent\\r\\nConnection: close\\r\\nPaypal-Debug-Id: e212ea5dd89b2\\r\\nSet-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2518957142; domain=.paypal.com; path=\\/; Secure; HttpOnly\\r\\nSet-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT\\r\\nSet-Cookie: Apache=10.72.128.11.1446782102886906; path=\\/; expires=Sun, 29-Oct-45 03:55:02 GMT\\r\\nStrict-Transport-Security: max-age=14400\\r\\nTransfer-Encoding: chunked\\r\\nContent-Type: text\\/html; charset=UTF-8\\r\\n\\r\\n8\\r\\nVERIFIED\\r\\n0\\r\\n\\r\\n"}', '2015-11-05 22:55:01', '2015-11-05 22:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `ipn_orders`
--

CREATE TABLE IF NOT EXISTS `ipn_orders` (
`id` int(11) NOT NULL,
  `notify_version` varchar(64) DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `protection_eligibility` varchar(24) DEFAULT NULL COMMENT 'Which type of seller protection the buyer is protected by',
  `charset` varchar(127) DEFAULT NULL COMMENT 'Character set used by PayPal',
  `btn_id` varchar(40) DEFAULT NULL COMMENT 'The PayPal buy button clicked',
  `address_city` varchar(40) DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `receiver_email` varchar(127) DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) DEFAULT NULL COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `order_status` enum('PAID','WAITING','REJECTED') DEFAULT NULL COMMENT 'Additional variable to make payment_status more actionable',
  `discount` decimal(10,2) DEFAULT NULL COMMENT 'Additional variable to record the discount made on the order',
  `shipping_discount` decimal(10,2) DEFAULT NULL COMMENT 'Record the discount made on the shipping',
  `ipn_track_id` varchar(127) DEFAULT NULL COMMENT 'Internal tracking variable added in April 2011',
  `transaction_subject` varchar(255) DEFAULT NULL COMMENT 'Describes the product for a button-based purchase',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `shipped` int(11) NOT NULL DEFAULT '0' COMMENT '0 = no , 1 = yes',
  `shippedAt` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipn_orders`
--

INSERT INTO `ipn_orders` (`id`, `notify_version`, `verify_sign`, `test_ipn`, `protection_eligibility`, `charset`, `btn_id`, `address_city`, `address_country`, `address_country_code`, `address_name`, `address_state`, `address_status`, `address_street`, `address_zip`, `first_name`, `last_name`, `payer_business_name`, `payer_email`, `payer_id`, `payer_status`, `contact_phone`, `residence_country`, `business`, `receiver_email`, `receiver_id`, `custom`, `invoice`, `memo`, `tax`, `auth_id`, `auth_exp`, `auth_amount`, `auth_status`, `num_cart_items`, `parent_txn_id`, `payment_date`, `payment_status`, `payment_type`, `pending_reason`, `reason_code`, `remaining_settle`, `shipping_method`, `shipping`, `transaction_entity`, `txn_id`, `txn_type`, `exchange_rate`, `mc_currency`, `mc_fee`, `mc_gross`, `mc_handling`, `mc_shipping`, `payment_fee`, `payment_gross`, `settle_amount`, `settle_currency`, `auction_buyer_id`, `auction_closing_date`, `auction_multi_item`, `for_auction`, `subscr_date`, `subscr_effective`, `period1`, `period2`, `period3`, `amount1`, `amount2`, `amount3`, `mc_amount1`, `mc_amount2`, `mc_amount3`, `recurring`, `reattempt`, `retry_at`, `recur_times`, `username`, `password`, `subscr_id`, `case_id`, `case_type`, `case_creation_date`, `order_status`, `discount`, `shipping_discount`, `ipn_track_id`, `transaction_subject`, `created_at`, `updated_at`, `shipped`, `shippedAt`) VALUES
(1, '3.8', 'AgUrNvI4k8kPKcQ3WKJfHwiFJ7kQA-FnTcEVFiPledr81MGeAQXT52uW', 1, 'Ineligible', 'windows-1252', NULL, 'San Jose', 'United States', 'US', 'Yasmeen Hamid', 'CA', 'confirmed', '1 Main St', '95131', 'Yasmeen', 'Hamid', NULL, 'yasmeen.fci-buyer2@gmail.com', 'BJMUSDEHFCTPE', 'unverified', NULL, 'US', NULL, 'yasmeen.fci@gmail.com', NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '19:31:17 Nov 05, 2015 PST', 'Pending', 'instant', 'unilateral', NULL, NULL, NULL, '0.00', NULL, '2DF36884HG738183U', 'web_accept', NULL, 'USD', NULL, '2000.00', NULL, NULL, NULL, '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WAITING', '0.00', NULL, 'e045e67a9a743', NULL, '2015-11-05 22:31:22', '2015-11-05 22:31:22', 0, '0000-00-00'),
(2, '3.8', 'ABx8YosY6No1Rlx.-SdEzzHnVKG.A5wINJGcN5BdNOSzW0MCPa0NFYMJ', 1, 'Ineligible', 'windows-1252', NULL, 'San Jose', 'United States', 'US', 'Yasmeen Hamid', 'CA', 'confirmed', '1 Main St', '95131', 'Yasmeen', 'Hamid', NULL, 'yasmeen.fci-buyer2@gmail.com', 'BJMUSDEHFCTPE', 'unverified', NULL, 'US', NULL, 'yasmeen.fci@gmail.com', NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '19:54:55 Nov 05, 2015 PST', 'Pending', 'instant', 'unilateral', NULL, NULL, NULL, '0.00', NULL, '6EF49313AC3037526', 'web_accept', NULL, 'USD', NULL, '333.00', NULL, NULL, NULL, '333.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WAITING', '0.00', NULL, 'f9761bed3d1c9', NULL, '2015-11-05 22:55:02', '2015-11-05 22:55:02', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ipn_order_items`
--

CREATE TABLE IF NOT EXISTS `ipn_order_items` (
`id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(127) DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `cost_per_item` decimal(10,2) DEFAULT NULL COMMENT 'Cost of an individual item',
  `option_name_1` varchar(64) DEFAULT NULL COMMENT 'Option 1 name as requested by you',
  `option_selection_1` varchar(200) DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_name_2` varchar(64) DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection_2` varchar(200) DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `option_name_3` varchar(64) DEFAULT NULL COMMENT 'Option 3 name as requested by you',
  `option_selection_3` varchar(200) DEFAULT NULL COMMENT 'Option 3 choice as entered by your customer',
  `option_name_4` varchar(64) DEFAULT NULL COMMENT 'Option 4 name as requested by you',
  `option_selection_4` varchar(200) DEFAULT NULL COMMENT 'Option 4 choice as entered by your customer',
  `option_name_5` varchar(64) DEFAULT NULL COMMENT 'Option 5 name as requested by you',
  `option_selection_5` varchar(200) DEFAULT NULL COMMENT 'Option 5 choice as entered by your customer',
  `option_name_6` varchar(64) DEFAULT NULL COMMENT 'Option 6 name as requested by you',
  `option_selection_6` varchar(200) DEFAULT NULL COMMENT 'Option 6 choice as entered by your customer',
  `option_name_7` varchar(64) DEFAULT NULL COMMENT 'Option 7 name as requested by you',
  `option_selection_7` varchar(200) DEFAULT NULL COMMENT 'Option 7 choice as entered by your customer',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipn_order_items`
--

INSERT INTO `ipn_order_items` (`id`, `order_id`, `item_name`, `item_number`, `quantity`, `mc_gross`, `mc_handling`, `mc_shipping`, `tax`, `cost_per_item`, `option_name_1`, `option_selection_1`, `option_name_2`, `option_selection_2`, `option_name_3`, `option_selection_3`, `option_name_4`, `option_selection_4`, `option_name_5`, `option_selection_5`, `option_name_6`, `option_selection_6`, `option_name_7`, `option_selection_7`, `created_at`, `updated_at`) VALUES
(1, 1, 'course1', NULL, '1', '2000.00', NULL, NULL, '0.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-11-05 22:31:22', '2015-11-05 22:31:22'),
(2, 2, 'package1', NULL, '1', '333.00', NULL, NULL, '0.00', '333.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-11-05 22:55:02', '2015-11-05 22:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `na_tags`
--

CREATE TABLE IF NOT EXISTS `na_tags` (
`id` int(11) NOT NULL,
  `newsArticleId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COMMENT='news_articles_tags';

--
-- Dumping data for table `na_tags`
--

INSERT INTO `na_tags` (`id`, `newsArticleId`, `tagId`) VALUES
(78, 6, 2),
(88, 5, 4),
(87, 5, 3),
(77, 2, 3),
(76, 2, 2),
(80, 1, 4),
(8, 0, 1),
(86, 5, 2),
(85, 5, 1),
(79, 1, 2),
(40, 0, 3),
(73, 8, 4),
(47, 7, 4),
(72, 8, 3),
(84, 9, 3),
(83, 9, 1),
(92, 10, 2),
(91, 10, 1),
(104, 11, 4),
(103, 11, 3),
(102, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `newslsubsc`
--

CREATE TABLE IF NOT EXISTS `newslsubsc` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newslsubsc`
--

INSERT INTO `newslsubsc` (`id`, `email`, `name`, `date`) VALUES
(6, 'aa@tt.kk', '', '2015-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE IF NOT EXISTS `our_team` (
`id` int(11) NOT NULL,
  `nameAR` varchar(255) NOT NULL,
  `nameGE` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `descGE` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0' COMMENT '0 = male, 1 = female',
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedIn` varchar(255) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `nameAR`, `nameGE`, `descAR`, `descGE`, `image`, `gender`, `facebook`, `twitter`, `linkedIn`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(12, 'علي منصور', 'Ali Mansour', '<p>مؤسس اكاديمية MIG</p>', '<p>MIG Academy Founder</p>', '31f5a7a435f234bca1e0eb6eba3ead47.jpg', 0, 'https://www.facebook.com/alimansours?fref=ts', '', '', '2016-02-03 05:54:10', '0000-00-00 00:00:00', 1),
(13, 'ياسر سليمان', 'Yasser Soliman', '<p>أكاديمية MIG</p>', '<p>MIG Academy</p>', 'dc3546d3d8703234dc85997af1de25d3.jpg', 0, 'https://www.facebook.com/MIGCairo/', '', '', '2016-02-03 05:55:34', '2016-02-03 05:56:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pacakge_courses`
--

CREATE TABLE IF NOT EXISTS `pacakge_courses` (
`id` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pacakge_courses`
--

INSERT INTO `pacakge_courses` (`id`, `packageId`, `titleAR`, `titleGE`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 1, 'dsfdfd1111', 'aaaaaaaaaaaaaa1111', '2015-05-30 11:34:45', '2015-05-30 11:36:07', 1),
(2, 1, 'aaaaa', 'sssssssss', '2015-05-30 11:45:37', '0000-00-00 00:00:00', 1),
(3, 1, 'fsfdrrr', 'dfdsfdsrrr', '2015-05-30 12:37:53', '2015-05-30 12:38:01', 1),
(9, 7, 'package  course1', 'package  course1', '2015-11-05 03:09:56', '0000-00-00 00:00:00', 1),
(10, 7, 'package  course2', 'package  course2', '2015-11-05 03:10:16', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `desc200AR` text NOT NULL,
  `desc200GE` text NOT NULL,
  `contentAR` text NOT NULL COMMENT 'package content',
  `contentGE` text NOT NULL,
  `price` float NOT NULL,
  `durationAR` varchar(255) NOT NULL,
  `weeksNumAR` varchar(255) NOT NULL,
  `lecturesNumAR` varchar(255) NOT NULL,
  `durationGE` varchar(255) NOT NULL,
  `weeksNumGE` varchar(255) NOT NULL,
  `lecturesNumGE` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '0' COMMENT '0 = active, 1 = inactive',
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `titleAR`, `titleGE`, `desc200AR`, `desc200GE`, `contentAR`, `contentGE`, `price`, `durationAR`, `weeksNumAR`, `lecturesNumAR`, `durationGE`, `weeksNumGE`, `lecturesNumGE`, `image`, `isActive`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'aaaaaaaaaa', 'package1', '<p>assdfdsf</p>', '<p>package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp;</p>', '<p>sdfddd</p>', '<p>package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp;</p>\r\n<p></p>\r\n<p>package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp; package1&nbsp;</p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>', 333, 'hours', 'weeks', 'lectures', 'hours', 'weeks', 'lectures', '82415c512b4e10342c2e7619d6e64033.jpg', 1, '2015-05-30 11:26:43', '2015-11-05 04:47:17', 1),
(7, 'pakage2', 'pakage2', '', '', '', '', 3000, 'hhhhhhhh', 'wwwwwwwww', 'lllllllllll', 'ddddddd', 'wwwwwwwww', 'llllllll', '3eb1de55c7ed4efaf54ed1b01c53d83f.jpg', 1, '2015-11-05 03:09:41', '2015-11-05 03:31:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_instructors`
--

CREATE TABLE IF NOT EXISTS `package_instructors` (
`id` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `instructorId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_instructors`
--

INSERT INTO `package_instructors` (`id`, `packageId`, `instructorId`) VALUES
(46, 1, 9),
(45, 1, 2),
(42, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
`id` int(11) NOT NULL,
  `nameAR` varchar(255) NOT NULL,
  `nameGE` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL COMMENT 'who added it'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `nameAR`, `nameGE`, `logo`, `website`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(9, 'أوركس لاب', 'ORYX Lab', '28f52c0aa75fbe0e47f432107f56be37.png', 'http://oryxlab.com/', '2016-02-03 06:20:26', '2016-02-03 06:20:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rss_feeds`
--

CREATE TABLE IF NOT EXISTS `rss_feeds` (
`id` int(11) NOT NULL,
  `rssWebsiteId` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `descAR` text NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `descGE` text NOT NULL,
  `pubDate` datetime NOT NULL,
  `url` text NOT NULL,
  `image` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '0' COMMENT '0= active, 1 = deleted',
  `addingDate` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=348 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss_feeds`
--

INSERT INTO `rss_feeds` (`id`, `rssWebsiteId`, `titleAR`, `descAR`, `titleGE`, `descGE`, `pubDate`, `url`, `image`, `isActive`, `addingDate`) VALUES
(152, 27, 'الإمارات تحاكم متهمين بالارتباط بحزب الله والقاعدة', 'بدأت المحكمة الاتحادية العليا في ابوظبي محاكمة ثلاثة أشخاص متهمين بالارتباط بحزب الله اللبناني و23 بتهمة الانتماء الى تنظيم القاعدة، على ما نقلت الصحف المحلية الثلاثاء.', 'الإمارات تحاكم متهمين بالارتباط بحزب الله والقاعدة', 'بدأت المحكمة الاتحادية العليا في ابوظبي محاكمة ثلاثة أشخاص متهمين بالارتباط بحزب الله اللبناني و23 بتهمة الانتماء الى تنظيم القاعدة، على ما نقلت الصحف المحلية الثلاثاء.', '2016-02-09 03:37:00', 'http://www.dw.com/ar/الإمارات-تحاكم-متهمين-بالارتباط-بحزب-الله-والقاعدة/a-19034872?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(151, 27, 'عدة قتلى  واكثر من مائة جريح في تصادم قطارين بألمانيا', 'لقي عدة أشخاص مصرعهم وأصيب أكثر من مائة بجروح صباح الثلاثاء اثر تصادم قطارين قرب باد ايبلينغ في جنوب ألمانيا بحسب ما أعلنت الشرطة.', 'عدة قتلى  واكثر من مائة جريح في تصادم قطارين بألمانيا', 'لقي عدة أشخاص مصرعهم وأصيب أكثر من مائة بجروح صباح الثلاثاء اثر تصادم قطارين قرب باد ايبلينغ في جنوب ألمانيا بحسب ما أعلنت الشرطة.', '2016-02-09 03:44:00', 'http://www.dw.com/ar/عدة-قتلى-واكثر-من-مائة-جريح-في-تصادم-قطارين-بألمانيا/a-19034912?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(150, 27, 'خمس دول عربية الأكثر عرضة لخطر فيروس "زيكا"', 'يتأهب العالم لمواجهة فيروس "زيكا"، بعد أن تفشى بسرعة رهيبة مخلفا أكثر من مليون إصابة حتى الآن. منظمة الصحة العالمية حذرت من أن الفيروس قد ينتقل إلى بعض الدول العربية، ما لم تتخذ الإجراءات الوقائية اللازمة لصده.', 'خمس دول عربية الأكثر عرضة لخطر فيروس "زيكا"', 'يتأهب العالم لمواجهة فيروس "زيكا"، بعد أن تفشى بسرعة رهيبة مخلفا أكثر من مليون إصابة حتى الآن. منظمة الصحة العالمية حذرت من أن الفيروس قد ينتقل إلى بعض الدول العربية، ما لم تتخذ الإجراءات الوقائية اللازمة لصده.', '2016-02-02 08:12:00', 'http://www.dw.com/ar/خمس-دول-عربية-الأكثر-عرضة-لخطر-فيروس-زيكا/a-19017682?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(149, 27, 'صحف ألمانية: تصنيف الدول المغاربية كآمنة لن يغير شيئا', 'أدرجت الحكومة الألمانية الجزائر والمغرب وتونس ضمن لائحة الدول الآمنة، وذلك لتسهيل إجراءات ترحيل اللاجئين القادمين من هذه البلدان. هذا القرار شكل مادة دسمة لمعظم تعليقات الصحف الألمانية وبعضها حمَل على الدول المغاربية.', 'صحف ألمانية: تصنيف الدول المغاربية كآمنة لن يغير شيئا', 'أدرجت الحكومة الألمانية الجزائر والمغرب وتونس ضمن لائحة الدول الآمنة، وذلك لتسهيل إجراءات ترحيل اللاجئين القادمين من هذه البلدان. هذا القرار شكل مادة دسمة لمعظم تعليقات الصحف الألمانية وبعضها حمَل على الدول المغاربية.', '2016-02-04 10:45:00', 'http://www.dw.com/ar/صحف-ألمانية-تصنيف-الدول-المغاربية-كآمنة-لن-يغير-شيئا/a-19027174?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(148, 27, 'بنكرياس صناعي لمرضى السكر', 'هاتفك الذكي يمكن أن ينظّم مستوى الأنسولين في دمك فيوعز بفرز الأنسولين إذا تدنت نسبته. وهذا بالطبع يخص المصابين بالسكر في مختلف مراحله. كشفت عن ذلك دراسة حديثة مشيرة إلى اختراع بنكرياس صناعي سيعمل بهذه الآليات.', 'بنكرياس صناعي لمرضى السكر', 'هاتفك الذكي يمكن أن ينظّم مستوى الأنسولين في دمك فيوعز بفرز الأنسولين إذا تدنت نسبته. وهذا بالطبع يخص المصابين بالسكر في مختلف مراحله. كشفت عن ذلك دراسة حديثة مشيرة إلى اختراع بنكرياس صناعي سيعمل بهذه الآليات.', '2016-02-05 05:44:00', 'http://www.dw.com/ar/بنكرياس-صناعي-لمرضى-السكر/a-19027393?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(146, 27, 'خبير قانوني ألماني: الترحيل ليس حلاً لأزمة اللاجئين', 'الجميع يتساءل في ألمانيا عما يجب فعله مع اللاجئين الذين يرتكبون جنايات؟ رئيس المستشارية بيتر ألتماير يقترح إبعادهم إلى دولة ثالثة. في حين يعتبر المحامي هايكو هابه أن هذا الإجراء غير عملي.', 'خبير قانوني ألماني: الترحيل ليس حلاً لأزمة اللاجئين', 'الجميع يتساءل في ألمانيا عما يجب فعله مع اللاجئين الذين يرتكبون جنايات؟ رئيس المستشارية بيتر ألتماير يقترح إبعادهم إلى دولة ثالثة. في حين يعتبر المحامي هايكو هابه أن هذا الإجراء غير عملي.', '2016-02-05 11:05:00', 'http://www.dw.com/ar/خبير-قانوني-ألماني-الترحيل-ليس-حلاً-لأزمة-اللاجئين/a-19023199?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(147, 27, 'كيف تكشف الأشعة المقطعية عن الاكتئاب قبل الإصابة به؟', 'لم يعد التنبؤ بالأطفال الأكثر عرضة للإصابة بالاكتئاب مسألة مستحيلة، بعد رصد اختلافات واضحة في وظائف المخ تميز من هم أكثر عرضة للإصابة به. تساعد تقنيات أشعة متطورة في الكشف عن الاكتئاب حتى قبل الإصابة به.', 'كيف تكشف الأشعة المقطعية عن الاكتئاب قبل الإصابة به؟', 'لم يعد التنبؤ بالأطفال الأكثر عرضة للإصابة بالاكتئاب مسألة مستحيلة، بعد رصد اختلافات واضحة في وظائف المخ تميز من هم أكثر عرضة للإصابة به. تساعد تقنيات أشعة متطورة في الكشف عن الاكتئاب حتى قبل الإصابة به.', '2016-02-05 07:10:00', 'http://www.dw.com/ar/كيف-تكشف-الأشعة-المقطعية-عن-الاكتئاب-قبل-الإصابة-به؟/a-19027043?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(145, 27, '"حمام الشمس" يزيد من خطر إصابة النساء بسرطان الجلد', 'تمنح "حمامات الشمس" بشرة النساء والرجال لونا برونزيا جذابا، إلا أن عواقب ذلك خاصة على النساء قد تكون وخيمة، إذ تزيد الأشعة فوق البنفسجية من احتمال إصابتهن بسرطان الجلد، حسب ما خلصت إليه دراسة أمريكية.', '"حمام الشمس" يزيد من خطر إصابة النساء بسرطان الجلد', 'تمنح "حمامات الشمس" بشرة النساء والرجال لونا برونزيا جذابا، إلا أن عواقب ذلك خاصة على النساء قد تكون وخيمة، إذ تزيد الأشعة فوق البنفسجية من احتمال إصابتهن بسرطان الجلد، حسب ما خلصت إليه دراسة أمريكية.', '2016-02-05 11:10:00', 'http://www.dw.com/ar/حمام-الشمس-يزيد-من-خطر-إصابة-النساء-بسرطان-الجلد/a-19029742?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(144, 27, 'وجهة نظر: سياسة ميركل إزاء اللاجئين  تستحق الدعم', 'وعدت الأسرة الدولية بتقديم تسعة مليارات يورو لمساعدة اللاجئين السوريين في سوريا والدول المجاورة. لكن لا يمكن تحقيق السلام بالمال، كما ترى باربارا فيزيل.', 'وجهة نظر: سياسة ميركل إزاء اللاجئين  تستحق الدعم', 'وعدت الأسرة الدولية بتقديم تسعة مليارات يورو لمساعدة اللاجئين السوريين في سوريا والدول المجاورة. لكن لا يمكن تحقيق السلام بالمال، كما ترى باربارا فيزيل.', '2016-02-05 11:18:00', 'http://www.dw.com/ar/وجهة-نظر-سياسة-ميركل-إزاء-اللاجئين-تستحق-الدعم/a-19029153?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(143, 27, 'أفكار عالمية', 'كيف ستكون حياتنا عام 2050؟ وهل يمكننا التغلب على مشكلة التحولات المناخية؟ وما هو مصدر الطاقة في المستقبل؟ "أفكار عالمية" سألت الفائزين بجوائز نوبل عن هذه القضايا الملحة، وإجاباتهم كانت أفكاراً عالمية بكل معنى الكلمة.', 'أفكار عالمية', 'كيف ستكون حياتنا عام 2050؟ وهل يمكننا التغلب على مشكلة التحولات المناخية؟ وما هو مصدر الطاقة في المستقبل؟ "أفكار عالمية" سألت الفائزين بجوائز نوبل عن هذه القضايا الملحة، وإجاباتهم كانت أفكاراً عالمية بكل معنى الكلمة.', '2016-02-05 11:49:00', 'http://www.dw.com/ar/أفكار-عالمية/a-19029965?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(142, 27, 'ألمانيا: الشرطة تكافئ فتاة بسبيكة ذهب لأمانتها', 'عثرت فتاة ألمانية على سبيكة ذهب تقدر قيمتها بـ 20 ألف دولار، وسلمتها مباشرة إلى الشرطة. إلا أن الشرطة الألمانية قررت إرجاعها للفتاة، وذلك تطبيقا للقانون وكمكافأة لأمانتها.', 'ألمانيا: الشرطة تكافئ فتاة بسبيكة ذهب لأمانتها', 'عثرت فتاة ألمانية على سبيكة ذهب تقدر قيمتها بـ 20 ألف دولار، وسلمتها مباشرة إلى الشرطة. إلا أن الشرطة الألمانية قررت إرجاعها للفتاة، وذلك تطبيقا للقانون وكمكافأة لأمانتها.', '2016-02-05 11:55:00', 'http://www.dw.com/ar/ألمانيا-الشرطة-تكافئ-فتاة-بسبيكة-ذهب-لأمانتها/a-19029392?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(141, 27, 'حيلة بسيطة تجعل "الآيفون" أسرع!', 'يشكو الكثيرون من مشكلة بطء هاتفهم الذكي "آيفون". لاشك أن هذه المشكلة لها أسباب مختلفة، من بينها ضعف مساحة التخزين. وفيما يلي نقدم لكم حيلة بسيطة ولكنها فعالة تساعد على مسح محتويات الذاكرة وكفيلة بجعل الآيفون أسرع!', 'حيلة بسيطة تجعل "الآيفون" أسرع!', 'يشكو الكثيرون من مشكلة بطء هاتفهم الذكي "آيفون". لاشك أن هذه المشكلة لها أسباب مختلفة، من بينها ضعف مساحة التخزين. وفيما يلي نقدم لكم حيلة بسيطة ولكنها فعالة تساعد على مسح محتويات الذاكرة وكفيلة بجعل الآيفون أسرع!', '2016-02-05 13:08:00', 'http://www.dw.com/ar/حيلة-بسيطة-تجعل-الآيفون-أسرع/a-19029939?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(140, 27, 'وجهة نظر: الرياض لديها رغبة خطيرة في المغامرة', 'أعلنت الرياض استعدادها لإرسال قوات برية سعودية إلى سوريا، في إطار تدخل دولي. لكن هذا العرض مثير للتساؤل إلى أقصى درجة، حسب ما يرى المحلل السياسي الألماني راينَر زوليش.', 'وجهة نظر: الرياض لديها رغبة خطيرة في المغامرة', 'أعلنت الرياض استعدادها لإرسال قوات برية سعودية إلى سوريا، في إطار تدخل دولي. لكن هذا العرض مثير للتساؤل إلى أقصى درجة، حسب ما يرى المحلل السياسي الألماني راينَر زوليش.', '2016-02-06 01:49:00', 'http://www.dw.com/ar/وجهة-نظر-الرياض-لديها-رغبة-خطيرة-في-المغامرة/a-19030150?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(139, 27, 'تشديد الإجراءات القضائية ضد اليمين المتطرف في ألمانيا', 'مع زيادة حدة العداء ضد أجانب في ألمانيا على يد يمنيين متطرفين، أعلن المدعي العام أن المحكمة الاتحادية ستتولى مستقبلا النظر في جرائم ترتكبها جماعات يمينية متطرفة، مؤكدا على ضرورة تشديد الإجراءات القضائية بهذا الخصوص.', 'تشديد الإجراءات القضائية ضد اليمين المتطرف في ألمانيا', 'مع زيادة حدة العداء ضد أجانب في ألمانيا على يد يمنيين متطرفين، أعلن المدعي العام أن المحكمة الاتحادية ستتولى مستقبلا النظر في جرائم ترتكبها جماعات يمينية متطرفة، مؤكدا على ضرورة تشديد الإجراءات القضائية بهذا الخصوص.', '2016-02-06 07:58:00', 'http://www.dw.com/ar/تشديد-الإجراءات-القضائية-ضد-اليمين-المتطرف-في-ألمانيا/a-19030879?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(138, 27, 'تير ستيغن.. هل يصبح حارس برشلونة الأول بفضل غوارديولا؟', 'قبل أن يصل بيب غوارديولا إلى ناديه الجديد في البريميرليغ، والمدرب الاسباني يحاول هندسة فريق مان سيتي، وذلك من خلال شراء لاعبين اعتاد على تدريبهم، الأمر الذي قد يعود بالنفع على بعض اللاعبين، وينعكس سلبا على آخرين!', 'تير ستيغن.. هل يصبح حارس برشلونة الأول بفضل غوارديولا؟', 'قبل أن يصل بيب غوارديولا إلى ناديه الجديد في البريميرليغ، والمدرب الاسباني يحاول هندسة فريق مان سيتي، وذلك من خلال شراء لاعبين اعتاد على تدريبهم، الأمر الذي قد يعود بالنفع على بعض اللاعبين، وينعكس سلبا على آخرين!', '2016-02-06 08:49:00', 'http://www.dw.com/ar/تير-ستيغن-هل-يصبح-حارس-برشلونة-الأول-بفضل-غوارديولا؟/a-19030814?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(137, 27, 'متى يكون رمش العين خطيرا!', 'رمش العين مشكلة تظهر دون سابق إنذاروتختفي دون سبب، حتى الآن لم يتمكن العلماء من تفسير هذه الظاهرة غير الخطيرة، لكن باحثين ألمان يرون أن رمش العين إذ ترافق ببعض الأعراض يصبح الأمر خطيرا ويتطلب التوجه إلى الطببيب فورا.', 'متى يكون رمش العين خطيرا!', 'رمش العين مشكلة تظهر دون سابق إنذاروتختفي دون سبب، حتى الآن لم يتمكن العلماء من تفسير هذه الظاهرة غير الخطيرة، لكن باحثين ألمان يرون أن رمش العين إذ ترافق ببعض الأعراض يصبح الأمر خطيرا ويتطلب التوجه إلى الطببيب فورا.', '2016-02-06 09:57:00', 'http://www.dw.com/ar/متى-يكون-رمش-العين-خطيرا/a-19029432?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(135, 27, 'أجزاء في الجسم البشري فقدت وظائفها', 'هل تعلم أن هناك عدة أعضاء وسلوكيات في جسم الإنسان ليست لها أية وظيفة؟ إذ يعتقد العلماء أن أسلاف البشر السابقين كانوا بحاجة لها وظهرت لديهم خلال مرحلة التطور.', 'أجزاء في الجسم البشري فقدت وظائفها', 'هل تعلم أن هناك عدة أعضاء وسلوكيات في جسم الإنسان ليست لها أية وظيفة؟ إذ يعتقد العلماء أن أسلاف البشر السابقين كانوا بحاجة لها وظهرت لديهم خلال مرحلة التطور.', '2016-02-06 10:32:00', 'http://www.dw.com/ar/أجزاء-في-الجسم-البشري-فقدت-وظائفها/a-19025568?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(136, 27, 'ألمانيا: عودة اللاجئين السوريين لبلدهم كالبوسنيين سابقاً؟', 'جرّاء حرب البوسنة قبل 20 عاما استقبلت ألمانيا أكثر من 400 ألف لاجئ، واجهوا حينها مشاكل شبيهة بمشاكل طالبي اللجوء السوريين حاليا. والسؤال: هل تقع سياسة اللجوء الألمانية في أخطاء مشابهة للسابق، وماذا عن ثقافة الترحيب؟', 'ألمانيا: عودة اللاجئين السوريين لبلدهم كالبوسنيين سابقاً؟', 'جرّاء حرب البوسنة قبل 20 عاما استقبلت ألمانيا أكثر من 400 ألف لاجئ، واجهوا حينها مشاكل شبيهة بمشاكل طالبي اللجوء السوريين حاليا. والسؤال: هل تقع سياسة اللجوء الألمانية في أخطاء مشابهة للسابق، وماذا عن ثقافة الترحيب؟', '2016-02-06 10:21:00', 'http://www.dw.com/ar/ألمانيا-عودة-اللاجئين-السوريين-لبلدهم-كالبوسنيين-سابقاً؟/a-19027598?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(134, 27, 'ألمانيا تفقد بعضاً من مساحتها!', 'غمرت المياه القمة الجنوبية لجزيرة سولت الألمانية الواقعة في بحر الشمال لتفقد ألمانيا جزءا من مساحتها، وذلك رغم وضع الجزيرة تحت الحماية البيئية واتخاذ إجراءات كثيرة لمنع هذه الكارثة الطبيعية.', 'ألمانيا تفقد بعضاً من مساحتها!', 'غمرت المياه القمة الجنوبية لجزيرة سولت الألمانية الواقعة في بحر الشمال لتفقد ألمانيا جزءا من مساحتها، وذلك رغم وضع الجزيرة تحت الحماية البيئية واتخاذ إجراءات كثيرة لمنع هذه الكارثة الطبيعية.', '2016-02-06 11:07:00', 'http://www.dw.com/ar/ألمانيا-تفقد-بعضاً-من-مساحتها/a-19031212?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(133, 27, 'لهذا يفضل غوندوغان البقاء في دورتموند وتجنب الانتقالات', 'أغلق باب الانتقالات الشتوية أبوابه الأسبوع الماضي، وبقي غوندوغان في صفوف دورتموند. حتى الآن لم يتخذ لاعب خط الوسط قرارا محددا بشأن مستقبله الرياضي، وهو يرغب في تجنب أي قرارات غير جادة، تذكّر بقراراته في العام الماضي.', 'لهذا يفضل غوندوغان البقاء في دورتموند وتجنب الانتقالات', 'أغلق باب الانتقالات الشتوية أبوابه الأسبوع الماضي، وبقي غوندوغان في صفوف دورتموند. حتى الآن لم يتخذ لاعب خط الوسط قرارا محددا بشأن مستقبله الرياضي، وهو يرغب في تجنب أي قرارات غير جادة، تذكّر بقراراته في العام الماضي.', '2016-02-06 11:56:00', 'http://www.dw.com/ar/لهذا-يفضل-غوندوغان-البقاء-في-دورتموند-وتجنب-الانتقالات/a-19031056?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(132, 27, 'فوز كبير لشالكه وشتوتغارت وتعادل سلبي لدورتموند مع برلين', 'فيما عدا شالكه وانغولشتات لم تستطع الفرق الألمانية الفوز على ملعبها في المباريات التي أقيمت بعد ظهر السبت ضمن الجولة 20 من الدوري الألماني. حيث تعادل برلين مع دورتموند وانهزم فرانكفورت أمام شتوتغارت وهانوفر أمام ماينز.', 'فوز كبير لشالكه وشتوتغارت وتعادل سلبي لدورتموند مع برلين', 'فيما عدا شالكه وانغولشتات لم تستطع الفرق الألمانية الفوز على ملعبها في المباريات التي أقيمت بعد ظهر السبت ضمن الجولة 20 من الدوري الألماني. حيث تعادل برلين مع دورتموند وانهزم فرانكفورت أمام شتوتغارت وهانوفر أمام ماينز.', '2016-02-06 12:13:00', 'http://www.dw.com/ar/فوز-كبير-لشالكه-وشتوتغارت-وتعادل-سلبي-لدورتموند-مع-برلين/a-19031344?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(131, 27, 'اكتشاف حيوان متوحش عتيق يشبه الديناصورات', 'اكتشف علماء من جامعة اوهايو حفريات لنوع من الحيوانات أشبه بالديناصورات يسمى بروزينجوريكس. عمر الحفريات المكتشفة في قاع قناة قديمة بكينيا يعود إلى أكثر من 55 ألف عام.', 'اكتشاف حيوان متوحش عتيق يشبه الديناصورات', 'اكتشف علماء من جامعة اوهايو حفريات لنوع من الحيوانات أشبه بالديناصورات يسمى بروزينجوريكس. عمر الحفريات المكتشفة في قاع قناة قديمة بكينيا يعود إلى أكثر من 55 ألف عام.', '2016-02-06 12:13:00', 'http://www.dw.com/ar/اكتشاف-حيوان-متوحش-عتيق-يشبه-الديناصورات/a-19031390?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(130, 27, 'العالم العربي: هل الدولة مسؤولة لوحدها عن مشكلة البطالة؟', 'بين من يحمل الدولة مسؤولية البطالة في صفوف الشباب وبين من يحملهم وزر بعضها، تستفحل هذه المشكلة في جميع الدول العربية. لكن السؤال هنا، لماذا لا يساهم القطاع الخاص العربي أيضا في تدريب الشباب وتأهيلهم للدخول في سوق العمل؟', 'العالم العربي: هل الدولة مسؤولة لوحدها عن مشكلة البطالة؟', 'بين من يحمل الدولة مسؤولية البطالة في صفوف الشباب وبين من يحملهم وزر بعضها، تستفحل هذه المشكلة في جميع الدول العربية. لكن السؤال هنا، لماذا لا يساهم القطاع الخاص العربي أيضا في تدريب الشباب وتأهيلهم للدخول في سوق العمل؟', '2016-02-06 14:44:00', 'http://www.dw.com/ar/العالم-العربي-هل-الدولة-مسؤولة-لوحدها-عن-مشكلة-البطالة؟/a-19029722?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(129, 27, 'ليفركوزن يتعادل مع بايرن ويحرمه من توسيع الفارق مع دورتموند', 'في قمة الجولة العشرين بالدوري الألماني لكرة القدم تعادل بايرليفركوزن مع بايرن ميونيخ بدون أهداف في مباراة مثيرة طرد فيها ألونسو. وبهذا حرم ليفركوزن الفريق البافاري من توسيع الفارق مع دورتموند، الذي تعادل مع برلين.', 'ليفركوزن يتعادل مع بايرن ويحرمه من توسيع الفارق مع دورتموند', 'في قمة الجولة العشرين بالدوري الألماني لكرة القدم تعادل بايرليفركوزن مع بايرن ميونيخ بدون أهداف في مباراة مثيرة طرد فيها ألونسو. وبهذا حرم ليفركوزن الفريق البافاري من توسيع الفارق مع دورتموند، الذي تعادل مع برلين.', '2016-02-06 15:14:00', 'http://www.dw.com/ar/ليفركوزن-يتعادل-مع-بايرن-ويحرمه-من-توسيع-الفارق-مع-دورتموند/a-19031544?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(128, 27, 'وجهة نظر: معركة مصير ميركل؟', 'يتراجع الدعم لأنغيلا ميركل بسرعة بين المواطنين الألمان بسبب أزمة اللاجئين. ولا عجب في ذلك، لأن ثقافة الترحيب تحولت إلى ثقافة قلق، كما يرى كاي – ألكسندر شولتس.', 'وجهة نظر: معركة مصير ميركل؟', 'يتراجع الدعم لأنغيلا ميركل بسرعة بين المواطنين الألمان بسبب أزمة اللاجئين. ولا عجب في ذلك، لأن ثقافة الترحيب تحولت إلى ثقافة قلق، كما يرى كاي – ألكسندر شولتس.', '2016-02-07 02:12:00', 'http://www.dw.com/ar/وجهة-نظر-معركة-مصير-ميركل؟/a-19029510?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(127, 27, 'حقوقي: "القضاء السعودي تعسفي والقوانين غير مكتوبة"', 'ازدادت حدة الانتقادات الموجهة للرياض بسبب انتهاكات حقوق الإنسان. كما تشمل الانتقادات الدول الغربية التي تتجاهل الأمر بغية حماية مصالحها. في هذا الحوار يكشف خبير لدى "هيومن رايتس ووتش" أبرز التجاوزات الحقوقية في السعودية.', 'حقوقي: "القضاء السعودي تعسفي والقوانين غير مكتوبة"', 'ازدادت حدة الانتقادات الموجهة للرياض بسبب انتهاكات حقوق الإنسان. كما تشمل الانتقادات الدول الغربية التي تتجاهل الأمر بغية حماية مصالحها. في هذا الحوار يكشف خبير لدى "هيومن رايتس ووتش" أبرز التجاوزات الحقوقية في السعودية.', '2016-02-07 11:42:00', 'http://www.dw.com/ar/حقوقي-القضاء-السعودي-تعسفي-والقوانين-غير-مكتوبة/a-19028788?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(126, 27, 'الدوري الألماني: هامبورغ يكتفي بالتعادل على أرضه أمام كولونيا', 'فرض التعادل نفسه على لقاء هامبورغ مع ضيفه كولونيا في المرحلة العشرين لبطولة الدوري الألماني لكرة القدم اليوم الأحد. وارتفع رصيد هامبورغ إلى 23 نقطة، فيما ظل فريق كولنيا في المركز التاسع برصيد 26 نقطة.', 'الدوري الألماني: هامبورغ يكتفي بالتعادل على أرضه أمام كولونيا', 'فرض التعادل نفسه على لقاء هامبورغ مع ضيفه كولونيا في المرحلة العشرين لبطولة الدوري الألماني لكرة القدم اليوم الأحد. وارتفع رصيد هامبورغ إلى 23 نقطة، فيما ظل فريق كولنيا في المركز التاسع برصيد 26 نقطة.', '2016-02-07 14:50:00', 'http://www.dw.com/ar/الدوري-الألماني-هامبورغ-يكتفي-بالتعادل-على-أرضه-أمام-كولونيا/a-19032519?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(125, 27, 'مهاجرون يعودون لأوطانهم من النمسا بآمال خائبة', 'الشوق لعائلاتهم والإحباط من الصعوبات والعيش مع مئات آخرين في الصالات الرياضية، تدفع المهاجرين لمغادرة النمسا بأرقام قياسية والعودة إلى ديارهم. تقرير أليسون لانغلي من فيينا.', 'مهاجرون يعودون لأوطانهم من النمسا بآمال خائبة', 'الشوق لعائلاتهم والإحباط من الصعوبات والعيش مع مئات آخرين في الصالات الرياضية، تدفع المهاجرين لمغادرة النمسا بأرقام قياسية والعودة إلى ديارهم. تقرير أليسون لانغلي من فيينا.', '2016-02-08 05:54:00', 'http://www.dw.com/ar/مهاجرون-يعودون-لأوطانهم-من-النمسا-بآمال-خائبة/a-19027087?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(124, 27, 'مدونو فيديو يحاربون الكراهية ومعاداة الأجانب في الإنترنت', 'تنشط مجموعة من مدوني الفيديو على موقع يوتيوب لمواجهة المتطرفين الذي يحرضون على الكراهية ومعاداة المهاجرين واللاجئين في ألمانيا. من بين هؤلاء المدونين اللاجئ السوري فراس الشاطر، الذي يقدم لمتابعيه رؤيته إلى الألمان.', 'مدونو فيديو يحاربون الكراهية ومعاداة الأجانب في الإنترنت', 'تنشط مجموعة من مدوني الفيديو على موقع يوتيوب لمواجهة المتطرفين الذي يحرضون على الكراهية ومعاداة المهاجرين واللاجئين في ألمانيا. من بين هؤلاء المدونين اللاجئ السوري فراس الشاطر، الذي يقدم لمتابعيه رؤيته إلى الألمان.', '2016-02-08 05:55:00', 'http://www.dw.com/ar/مدونو-فيديو-يحاربون-الكراهية-ومعاداة-الأجانب-في-الإنترنت/a-19025494?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(122, 27, 'التبرع بالدم مفيد لمن يعاني من ارتفاع ضغط الدم', 'التبرع بالدم لا يساهم فقط في إنقاذ حياة الآخرين، وإنما في خفض ضغط الدم العالي أيضا، حسب ما توصلت إليه دراسة ألمانية جديدة لمستشفى "شاريتيه" الجامعي في برلين.', 'التبرع بالدم مفيد لمن يعاني من ارتفاع ضغط الدم', 'التبرع بالدم لا يساهم فقط في إنقاذ حياة الآخرين، وإنما في خفض ضغط الدم العالي أيضا، حسب ما توصلت إليه دراسة ألمانية جديدة لمستشفى "شاريتيه" الجامعي في برلين.', '2016-02-08 06:43:00', 'http://www.dw.com/ar/التبرع-بالدم-مفيد-لمن-يعاني-من-ارتفاع-ضغط-الدم/a-19030090?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(123, 27, 'هيومن رايتس ووتش تطالب السيسي بإدانة تصريحات وزير عدله', 'طالبت منظمة "هيومن رايتس ووتش" المدافعة عن حقوق الإنسان الرئيس المصري عبد الفتاح السيسي بإدانة تصريحات وزير العدل أحمد الزند، الذي دعا، بحسب المنظمة، إلى "قتل جماعي" لمناصري جماعة الإخوان المسلمين.', 'هيومن رايتس ووتش تطالب السيسي بإدانة تصريحات وزير عدله', 'طالبت منظمة "هيومن رايتس ووتش" المدافعة عن حقوق الإنسان الرئيس المصري عبد الفتاح السيسي بإدانة تصريحات وزير العدل أحمد الزند، الذي دعا، بحسب المنظمة، إلى "قتل جماعي" لمناصري جماعة الإخوان المسلمين.', '2016-02-08 06:20:00', 'http://www.dw.com/ar/هيومن-رايتس-ووتش-تطالب-السيسي-بإدانة-تصريحات-وزير-عدله/a-19033037?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(120, 27, 'ألمانيا وتركيا تتفقان على إجراءات لمراقبة الحدود وإغاثة اللاجئين', 'أكدت المستشارة ميركل على ضرورة أن يلعب حلف شمال الأطلسي دوراً في مكافحة تهريب اللاجئين بين تركيا واليونان وأن تقدم الشرطة الألمانية دعماً لنظيرتها التركية، فيما حذر داود اوغلو من أنّ تركيا لن تتحمل وحدها عبء اللاجئين.', 'ألمانيا وتركيا تتفقان على إجراءات لمراقبة الحدود وإغاثة اللاجئين', 'أكدت المستشارة ميركل على ضرورة أن يلعب حلف شمال الأطلسي دوراً في مكافحة تهريب اللاجئين بين تركيا واليونان وأن تقدم الشرطة الألمانية دعماً لنظيرتها التركية، فيما حذر داود اوغلو من أنّ تركيا لن تتحمل وحدها عبء اللاجئين.', '2016-02-08 08:57:00', 'http://www.dw.com/ar/ألمانيا-وتركيا-تتفقان-على-إجراءات-لمراقبة-الحدود-وإغاثة-اللاجئين/a-19033688?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(121, 27, 'القبض على عناصر من "داعش" خططوا لهجمات في روسيا', 'أعلن جهاز الأمن الروسي إلقاء القبض على سبعة من أعضاء تنظيم "الدولة الإسلامية" في مدينة إيكاترينبرج بجبال الأورال كانوا يخططون لشن هجمات في موسكو وسان بطرسبرج، كما نقلت وكالة "إنترفاكس" الروسية للأنباء.', 'القبض على عناصر من "داعش" خططوا لهجمات في روسيا', 'أعلن جهاز الأمن الروسي إلقاء القبض على سبعة من أعضاء تنظيم "الدولة الإسلامية" في مدينة إيكاترينبرج بجبال الأورال كانوا يخططون لشن هجمات في موسكو وسان بطرسبرج، كما نقلت وكالة "إنترفاكس" الروسية للأنباء.', '2016-02-08 07:47:00', 'http://www.dw.com/ar/القبض-على-عناصر-من-داعش-خططوا-لهجمات-في-روسيا/a-19033202?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(118, 27, 'إمكانيات جوناتان تاه ترشحه بقوة لتعويض بواتينغ في المانشافت', 'يعتبر مدافع ليفركوزن جوناتان تاه أحد أبرز المدافعين في الدوري الألماني هذا الموسم. وبالرغم من أن عمره لا يتجاوز 19 عاما إلا أن تاه يقدم أداء كبيرا جعل الكثيرين يرشحونه لتعويض غياب جيروم بواتينغ في المنتخب الألماني.', 'إمكانيات جوناتان تاه ترشحه بقوة لتعويض بواتينغ في المانشافت', 'يعتبر مدافع ليفركوزن جوناتان تاه أحد أبرز المدافعين في الدوري الألماني هذا الموسم. وبالرغم من أن عمره لا يتجاوز 19 عاما إلا أن تاه يقدم أداء كبيرا جعل الكثيرين يرشحونه لتعويض غياب جيروم بواتينغ في المنتخب الألماني.', '2016-02-08 09:28:00', 'http://www.dw.com/ar/إمكانيات-جوناتان-تاه-ترشحه-بقوة-لتعويض-بواتينغ-في-المانشافت/a-19033548?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(119, 27, 'الصويا قد تحمي خصوبة النساء من تأثير مادة كيماوية', 'توصلت دراسة أمريكية حديثة أجريت على نساء يتناولن علاجات للخصوبة إلى أن تناول الأطعمة التي تحتوي على الصويا ربما يساعد في الوقاية من تأثير ثنائي الفينول.', 'الصويا قد تحمي خصوبة النساء من تأثير مادة كيماوية', 'توصلت دراسة أمريكية حديثة أجريت على نساء يتناولن علاجات للخصوبة إلى أن تناول الأطعمة التي تحتوي على الصويا ربما يساعد في الوقاية من تأثير ثنائي الفينول.', '2016-02-08 09:16:00', 'http://www.dw.com/ar/الصويا-قد-تحمي-خصوبة-النساء-من-تأثير-مادة-كيماوية/a-19033036?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(117, 27, 'الحكم بسجن ألماني لتعليقاته المعادية للّاجئين على فيسبوك', 'يعبر الكثيرون عن آرائهم بنشر تعليقاتهم على الفيسبوك. لكن هذه التعليقات قد تودي بصاحبها إلى السجن. وهو ما تعرض له شاب ألماني، إذ حكمت عليه المحكمة بالسجن مع وقف التنفيذ، بسبب تعليقاته على الفيسبوك.', 'الحكم بسجن ألماني لتعليقاته المعادية للّاجئين على فيسبوك', 'يعبر الكثيرون عن آرائهم بنشر تعليقاتهم على الفيسبوك. لكن هذه التعليقات قد تودي بصاحبها إلى السجن. وهو ما تعرض له شاب ألماني، إذ حكمت عليه المحكمة بالسجن مع وقف التنفيذ، بسبب تعليقاته على الفيسبوك.', '2016-02-08 10:10:00', 'http://www.dw.com/ar/الحكم-بسجن-ألماني-لتعليقاته-المعادية-للّاجئين-على-فيسبوك/a-19028905?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(116, 27, 'قصر دريسدن الملكي شاهد على حقبة من تاريخ ألمانيا', 'يطل قصر دريسدن الملكي على نهر إلبه وهو معروف ببنائه المميز، ورغم الدمار الذي حلّ به في الحرب العالمية الثانية، لكن أعيد بنائه وأصبح مقصدا سياحيا، القصر يضم في أروقته كنوزا فنية تشهد على حقبة من تاريخ ألمانيا.', 'قصر دريسدن الملكي شاهد على حقبة من تاريخ ألمانيا', 'يطل قصر دريسدن الملكي على نهر إلبه وهو معروف ببنائه المميز، ورغم الدمار الذي حلّ به في الحرب العالمية الثانية، لكن أعيد بنائه وأصبح مقصدا سياحيا، القصر يضم في أروقته كنوزا فنية تشهد على حقبة من تاريخ ألمانيا.', '2016-02-08 10:22:00', 'http://www.dw.com/ar/قصر-دريسدن-الملكي-شاهد-على-حقبة-من-تاريخ-ألمانيا/a-19033261?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(115, 27, 'كريستيانو رونالدو يثير الشكوك حول مستقبله مع ريال مدريد', 'بلوغ كريستيانو رونالدو الحادي والثلاثين من العمر دفعه للتفكير ملياً بالخطوة القادمة. فريقه ريال مدريد متأخر عن المتصدر برشلونة هذا الموسم ورونالدو يفكر في مرحلة بعد الريال، قال ذلك في تصريح لصحيفة "ماركا" الأسبانية.', 'كريستيانو رونالدو يثير الشكوك حول مستقبله مع ريال مدريد', 'بلوغ كريستيانو رونالدو الحادي والثلاثين من العمر دفعه للتفكير ملياً بالخطوة القادمة. فريقه ريال مدريد متأخر عن المتصدر برشلونة هذا الموسم ورونالدو يفكر في مرحلة بعد الريال، قال ذلك في تصريح لصحيفة "ماركا" الأسبانية.', '2016-02-08 10:23:00', 'http://www.dw.com/ar/كريستيانو-رونالدو-يثير-الشكوك-حول-مستقبله-مع-ريال-مدريد/a-19034011?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(114, 27, 'وجهة نظر: الصراع السوري دخل مرحلة النهاية؟', 'في الوقت الذي يسعى فيه البعض إلى التفاوض في جنيف لإنهاء الأزمة السورية، تفرض روسيا والأسد حقائق على الأرض. ويبدو أن هذه التطورات تثلج صدر جهة معينة في المنطقة، بشكل خاص ستجعلها تخرج منتصرة، على ما يرى أليكسندر كوداشيف.', 'وجهة نظر: الصراع السوري دخل مرحلة النهاية؟', 'في الوقت الذي يسعى فيه البعض إلى التفاوض في جنيف لإنهاء الأزمة السورية، تفرض روسيا والأسد حقائق على الأرض. ويبدو أن هذه التطورات تثلج صدر جهة معينة في المنطقة، بشكل خاص ستجعلها تخرج منتصرة، على ما يرى أليكسندر كوداشيف.', '2016-02-08 10:53:00', 'http://www.dw.com/ar/وجهة-نظر-الصراع-السوري-دخل-مرحلة-النهاية؟/a-19033386?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(113, 27, 'تقرير أممي يتهم النظام السوري و"داعش" بارتكاب "إبادة ممنهجة" ضد المعتقلين', 'ذكر محققون في لجنة دولية بشأن انتهاكات حقوق الإنسان في سوريا أن النظام السوري قتل آلاف المعتقلين في السجون. كما حملت اللجنة مسؤولية القتل أيضا لتنظيم "الدولة الإسلامية" وجبهة النصرة والمعارضة المسلحة المناهضة للحكومة.', 'تقرير أممي يتهم النظام السوري و"داعش" بارتكاب "إبادة ممنهجة" ضد المعتقلين', 'ذكر محققون في لجنة دولية بشأن انتهاكات حقوق الإنسان في سوريا أن النظام السوري قتل آلاف المعتقلين في السجون. كما حملت اللجنة مسؤولية القتل أيضا لتنظيم "الدولة الإسلامية" وجبهة النصرة والمعارضة المسلحة المناهضة للحكومة.', '2016-02-08 12:16:00', 'http://www.dw.com/ar/تقرير-أممي-يتهم-النظام-السوري-و-داعش-بارتكاب-إبادة-ممنهجة-ضد-المعتقلين/a-19034245?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(112, 27, 'مصر ترفض الاتهامات الإعلامية لقوات الأمن بقتل طالب إيطالي', 'رفضت مصر على لسان وزير داخليتها الاتهامات الإعلامية التي حملت أجهزة الأمن المصرية مقتل الطالب الايطالي جوليو ريجيني. يأتي ذلك في وقت حذرت فيه إيطاليا مصر من إخفاء ملابسات الحادث وطالبت بتقديم الجناة للعدالة.', 'مصر ترفض الاتهامات الإعلامية لقوات الأمن بقتل طالب إيطالي', 'رفضت مصر على لسان وزير داخليتها الاتهامات الإعلامية التي حملت أجهزة الأمن المصرية مقتل الطالب الايطالي جوليو ريجيني. يأتي ذلك في وقت حذرت فيه إيطاليا مصر من إخفاء ملابسات الحادث وطالبت بتقديم الجناة للعدالة.', '2016-02-08 12:38:00', 'http://www.dw.com/ar/مصر-ترفض-الاتهامات-الإعلامية-لقوات-الأمن-بقتل-طالب-إيطالي/a-19034295?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(110, 27, 'أطعمة تساعد على تحسين المزاج وإفراز "هرمون السعادة"', 'تدفع حالات الاكتئاب والإحباط الكثيرين للبحث عن وسائل تساعدهم على تحسين مزاجهم، ولاشك أن للرياضة دور مهم في ذلك، لكن خبراء يرون أن تناول بعض الأطعمة له تأثير واضح على تحسين المزاج، فما هي هذه الأطعمة؟', 'أطعمة تساعد على تحسين المزاج وإفراز "هرمون السعادة"', 'تدفع حالات الاكتئاب والإحباط الكثيرين للبحث عن وسائل تساعدهم على تحسين مزاجهم، ولاشك أن للرياضة دور مهم في ذلك، لكن خبراء يرون أن تناول بعض الأطعمة له تأثير واضح على تحسين المزاج، فما هي هذه الأطعمة؟', '2016-02-08 14:27:00', 'http://www.dw.com/ar/أطعمة-تساعد-على-تحسين-المزاج-وإفراز-هرمون-السعادة/a-19033901?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(111, 27, 'ريبيري ومنافسة قوية في طريق استعادته لمكانه كأساسي', 'عاد فرانك ريبيري نجم بايرن ميونيخ لاستئناف التدريبات مع فريقه بعد تعافيه من إصابة أبعدته لفترة طويلة. ورغم مكانة ريبيري الكبيرة فإنه الآن سيدخل في منافسة قوية لاستعادة قدراته واسترجاع مكانته كأساسي في تشكيلة البافاري.', 'ريبيري ومنافسة قوية في طريق استعادته لمكانه كأساسي', 'عاد فرانك ريبيري نجم بايرن ميونيخ لاستئناف التدريبات مع فريقه بعد تعافيه من إصابة أبعدته لفترة طويلة. ورغم مكانة ريبيري الكبيرة فإنه الآن سيدخل في منافسة قوية لاستعادة قدراته واسترجاع مكانته كأساسي في تشكيلة البافاري.', '2016-02-08 13:12:00', 'http://www.dw.com/ar/ريبيري-ومنافسة-قوية-في-طريق-استعادته-لمكانه-كأساسي/a-19034176?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(109, 27, 'إيران تحذر من عواقب تواجد قوات برية في سوريا', 'حذر أمين المجلس الأعلى للأمن القومي الإيراني علي شمخاني من تصريحات وصفها بـ"غير المعقولة لدول لا تتناسب مع قدرتها العسكرية" للتدخل البري في سوريا، في إشارة منه لاستعداد السعودية والبحرين لقتال "داعش" في سوريا.', 'إيران تحذر من عواقب تواجد قوات برية في سوريا', 'حذر أمين المجلس الأعلى للأمن القومي الإيراني علي شمخاني من تصريحات وصفها بـ"غير المعقولة لدول لا تتناسب مع قدرتها العسكرية" للتدخل البري في سوريا، في إشارة منه لاستعداد السعودية والبحرين لقتال "داعش" في سوريا.', '2016-02-08 15:18:00', 'http://www.dw.com/ar/إيران-تحذر-من-عواقب-تواجد-قوات-برية-في-سوريا/a-19034478?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09');
INSERT INTO `rss_feeds` (`id`, `rssWebsiteId`, `titleAR`, `descAR`, `titleGE`, `descGE`, `pubDate`, `url`, `image`, `isActive`, `addingDate`) VALUES
(108, 27, 'مصرع 27 مهاجرا بينهم 11 طفلا في حادث غرق قبالة سواحل تركيا', 'قال خفر السواحل التركي إن 27 مهاجرا بينهم 11 طفلا غرقوا في بحر إيجه قبالة ساحل البلاد بينما كانوا يحاولون الوصول لجزيرة يونانية. وجرى إنقاذ أربعة مهاجرين وتجري حاليا عملية بحث عن تسعة آخرين.', 'مصرع 27 مهاجرا بينهم 11 طفلا في حادث غرق قبالة سواحل تركيا', 'قال خفر السواحل التركي إن 27 مهاجرا بينهم 11 طفلا غرقوا في بحر إيجه قبالة ساحل البلاد بينما كانوا يحاولون الوصول لجزيرة يونانية. وجرى إنقاذ أربعة مهاجرين وتجري حاليا عملية بحث عن تسعة آخرين.', '2016-02-08 15:30:00', 'http://www.dw.com/ar/مصرع-27-مهاجرا-بينهم-11-طفلا-في-حادث-غرق-قبالة-سواحل-تركيا/a-19034499?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(107, 27, 'تخصص جامعي جديد لتسهيل دمج اللاجئين في ألمانيا', 'يشكل إيواء وإدماج مئات الآلاف من اللاجئين تحديا كبيرا للسلطات الألمانية لذلك قررت جامعة ألمانية إنشاء تخصص جامعي اسمه "إدارة الهجرة"، وذلك لفهم مشكلات وحاجيات اللاجئين أكثر وتطوير استراتيجيات ناجعة وطويلة المدى لإدماجهم.', 'تخصص جامعي جديد لتسهيل دمج اللاجئين في ألمانيا', 'يشكل إيواء وإدماج مئات الآلاف من اللاجئين تحديا كبيرا للسلطات الألمانية لذلك قررت جامعة ألمانية إنشاء تخصص جامعي اسمه "إدارة الهجرة"، وذلك لفهم مشكلات وحاجيات اللاجئين أكثر وتطوير استراتيجيات ناجعة وطويلة المدى لإدماجهم.', '2016-02-08 15:33:00', 'http://www.dw.com/ar/تخصص-جامعي-جديد-لتسهيل-دمج-اللاجئين-في-ألمانيا/a-19034458?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(106, 27, 'ميركل في تركيا مجددا.. هل يتوقف تدفق اللاجئين إلى أوروبا؟', 'أعربت المستشارة الألمانية أنغيلا ميركل عن صدمتها جراء المعاناة الإنسانية التي يعيشها اللاجئون السوريون العالقون على الحدود مع تركيا، وذلك خلال الزيارة التي تجريها إلى أنقرة، فهل تسهم هذه الزيارة في تخفيف أزمة اللاجئين؟', 'ميركل في تركيا مجددا.. هل يتوقف تدفق اللاجئين إلى أوروبا؟', 'أعربت المستشارة الألمانية أنغيلا ميركل عن صدمتها جراء المعاناة الإنسانية التي يعيشها اللاجئون السوريون العالقون على الحدود مع تركيا، وذلك خلال الزيارة التي تجريها إلى أنقرة، فهل تسهم هذه الزيارة في تخفيف أزمة اللاجئين؟', '2016-02-08 15:57:00', 'http://www.dw.com/ar/ميركل-في-تركيا-مجددا-هل-يتوقف-تدفق-اللاجئين-إلى-أوروبا؟/a-19034355?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(105, 27, 'برلمانيون أوروبيون يثيرون قضية المدون رائف بدوي في الرياض', 'قال نواب أوروبيون إنهم أثاروا قضية سجن المدون رائف بدوي في السعودية مع رئيس لجنة حقوق الإنسان السعودية، فيما بحثوا مع الملك سلمان ومسؤولين آخرين الوضع في سوريا واليمن والحاجة إلى خفض التوتر مع إيران.', 'برلمانيون أوروبيون يثيرون قضية المدون رائف بدوي في الرياض', 'قال نواب أوروبيون إنهم أثاروا قضية سجن المدون رائف بدوي في السعودية مع رئيس لجنة حقوق الإنسان السعودية، فيما بحثوا مع الملك سلمان ومسؤولين آخرين الوضع في سوريا واليمن والحاجة إلى خفض التوتر مع إيران.', '2016-02-08 16:34:00', 'http://www.dw.com/ar/برلمانيون-أوروبيون-يثيرون-قضية-المدون-رائف-بدوي-في-الرياض/a-19034497?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(102, 27, 'لاجئون سوريون يضفون مزيدا من البهجة على كرنفال كولونيا', 'شارك لاجئون سوريون في احتفالات مهرجان كولونيا التنكري المعروف بالكرنفال، حيث ارتدوا الملابس التراثية المحلية ورقصوا على أنغام الموسيقا الشعبية، ليضفوا بذلك تنوعا ومزيدا من المرح والسرور على أجواء كرنفال اثنين الورود.', 'لاجئون سوريون يضفون مزيدا من البهجة على كرنفال كولونيا', 'شارك لاجئون سوريون في احتفالات مهرجان كولونيا التنكري المعروف بالكرنفال، حيث ارتدوا الملابس التراثية المحلية ورقصوا على أنغام الموسيقا الشعبية، ليضفوا بذلك تنوعا ومزيدا من المرح والسرور على أجواء كرنفال اثنين الورود.', '2016-02-09 03:11:00', 'http://www.dw.com/ar/لاجئون-سوريون-يضفون-مزيدا-من-البهجة-على-كرنفال-كولونيا/a-19034331?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(103, 27, 'الإمارات تعين وزيراً لـ"السعادة" وآخر لـ"التسامح"', 'أعلنت الإمارات العربية المتحدة إجراء تغييرات هيكلية على شكل الحكومة، تضمنت استحداث منصب وزير دولة "للسعادة" وآخر "للتسامح"، كما ستتضمن هذه الإجراءات تعيين شابة، لا يتجاوز عمرها 22 عاما، كوزيرة دولة للشباب.', 'الإمارات تعين وزيراً لـ"السعادة" وآخر لـ"التسامح"', 'أعلنت الإمارات العربية المتحدة إجراء تغييرات هيكلية على شكل الحكومة، تضمنت استحداث منصب وزير دولة "للسعادة" وآخر "للتسامح"، كما ستتضمن هذه الإجراءات تعيين شابة، لا يتجاوز عمرها 22 عاما، كوزيرة دولة للشباب.', '2016-02-08 17:09:00', 'http://www.dw.com/ar/الإمارات-تعين-وزيراً-لـ-السعادة-وآخر-لـ-التسامح/a-19034501?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(104, 27, 'أنقرة تخشى "الأسوأ" بوصول 600 ألف لاجئ سوري جديد إلى حدودها', 'تخشى الحكومة التركية تدفق أكثر من نصف مليون سوري إلى حدودها نتيجة للقتال الدائر في مدينة حلب، فيما يحتشد عشرات الآلاف من اللاجئين السوريين على الجانب السوري من الحدود التركية المغلقة في العراء رغم البرد القارس.', 'أنقرة تخشى "الأسوأ" بوصول 600 ألف لاجئ سوري جديد إلى حدودها', 'تخشى الحكومة التركية تدفق أكثر من نصف مليون سوري إلى حدودها نتيجة للقتال الدائر في مدينة حلب، فيما يحتشد عشرات الآلاف من اللاجئين السوريين على الجانب السوري من الحدود التركية المغلقة في العراء رغم البرد القارس.', '2016-02-08 16:46:00', 'http://www.dw.com/ar/أنقرة-تخشى-الأسوأ-بوصول-600-ألف-لاجئ-سوري-جديد-إلى-حدودها/a-19034493?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(101, 27, 'قصة لاجئ سوري في ألمانيا يقرر العودة بسبب التذمر', 'لايزال مئات اللاجئين السوريين يتوافدون على ألمانيا هاربين من الحرب. غير أن توقعات بعضهم تصطدم بواقع مختلف كغياب فرص العمل المناسبة. أحد السوريين قرر العودة بعد سنتين من الإقامة في ألمانيا. التقرير التالي يكشف الأسباب.', 'قصة لاجئ سوري في ألمانيا يقرر العودة بسبب التذمر', 'لايزال مئات اللاجئين السوريين يتوافدون على ألمانيا هاربين من الحرب. غير أن توقعات بعضهم تصطدم بواقع مختلف كغياب فرص العمل المناسبة. أحد السوريين قرر العودة بعد سنتين من الإقامة في ألمانيا. التقرير التالي يكشف الأسباب.', '2016-02-09 03:12:00', 'http://www.dw.com/ar/قصة-لاجئ-سوري-في-ألمانيا-يقرر-العودة-بسبب-التذمر/a-19029739?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(153, 27, 'إيطاليا تطالب مصر بمعاقبة قتلة ريغيني', 'طالبت إيطاليا مصر بالقبض على المتورطين في قتل مواطنها الشاب جوليو ريغيني ومعاقبتهم بينما رفضت القاهرة تلميحات إلى تورط أجهزة الأمن في الحادث الذي تسبب في توتر العلاقات بين البلدين.', 'إيطاليا تطالب مصر بمعاقبة قتلة ريغيني', 'طالبت إيطاليا مصر بالقبض على المتورطين في قتل مواطنها الشاب جوليو ريغيني ومعاقبتهم بينما رفضت القاهرة تلميحات إلى تورط أجهزة الأمن في الحادث الذي تسبب في توتر العلاقات بين البلدين.', '2016-02-09 03:32:00', 'http://www.dw.com/ar/إيطاليا-تطالب-مصر-بمعاقبة-قتلة-ريغيني/a-19034839?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(154, 27, 'كيف يمكن كشف فيروس زيكا؟ وهل يشكل خطرا على الحامل؟', 'هل أنا مصابة بفيروس زيكا؟ هذا السؤال المقلق يتبادر بالدرجة الأولى إلى ذهن النساء الحوامل، خشية أن يؤثر ذلك على الجنين وإصابته بتشوه خلقي ينعكس سلبا على دماغ المولود. لكن ما حقيقة ذلك؟ وما مدى خطورة زيكا على الأم وجنينها؟', 'كيف يمكن كشف فيروس زيكا؟ وهل يشكل خطرا على الحامل؟', 'هل أنا مصابة بفيروس زيكا؟ هذا السؤال المقلق يتبادر بالدرجة الأولى إلى ذهن النساء الحوامل، خشية أن يؤثر ذلك على الجنين وإصابته بتشوه خلقي ينعكس سلبا على دماغ المولود. لكن ما حقيقة ذلك؟ وما مدى خطورة زيكا على الأم وجنينها؟', '2016-02-01 16:33:00', 'http://www.dw.com/ar/كيف-يمكن-كشف-فيروس-زيكا؟-وهل-يشكل-خطرا-على-الحامل؟/a-19016720?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(155, 27, 'دراسة تؤكد استخدام البابليين للحسابات الهندسية', 'كشف تحليل لألواح طينية أن علماء الفلك في مملكة بابل القديمة كانوا سابقين لعصرهم بشكل لم يتوقعه أحد، إذ استخدموا بعض الحسابات الهندسية المتطورة للغاية والتي جاءت حتى قبل ظهور علم التفاضل والتكامل.', 'دراسة تؤكد استخدام البابليين للحسابات الهندسية', 'كشف تحليل لألواح طينية أن علماء الفلك في مملكة بابل القديمة كانوا سابقين لعصرهم بشكل لم يتوقعه أحد، إذ استخدموا بعض الحسابات الهندسية المتطورة للغاية والتي جاءت حتى قبل ظهور علم التفاضل والتكامل.', '2016-02-01 11:01:00', 'http://www.dw.com/ar/دراسة-تؤكد-استخدام-البابليين-للحسابات-الهندسية/a-19016434?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(156, 27, 'دراسة تربط بين آلام الأوتار والسكري من النوع الثاني', 'يوصي الأطباء دائما مرضى السكري من النوع الثاني بالرياضة، لكن دراسة حديثة أوضحت أن مرضى السكري أكثر عرضة من غيرهم لألم الأوتار الذي يمنعهم بالتالي عن الرياضة، وهي نتائج نصح الخبراء، المؤسسات الصحية بالاهتمام بها.', 'دراسة تربط بين آلام الأوتار والسكري من النوع الثاني', 'يوصي الأطباء دائما مرضى السكري من النوع الثاني بالرياضة، لكن دراسة حديثة أوضحت أن مرضى السكري أكثر عرضة من غيرهم لألم الأوتار الذي يمنعهم بالتالي عن الرياضة، وهي نتائج نصح الخبراء، المؤسسات الصحية بالاهتمام بها.', '2016-02-01 10:58:00', 'http://www.dw.com/ar/دراسة-تربط-بين-آلام-الأوتار-والسكري-من-النوع-الثاني/a-19016468?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(157, 27, 'كيف تتشكل حصى المرارة ومتى يجب التدخل جراحيا؟', 'توجد عند الكثير من الناس حصى في المرارة، لكنها ليست خطيرة دائما. نتعرف على كيفية تشكل الحصى، ومتى تصبح مضرة بشكل يستدعي التدخل الجراحي.', 'كيف تتشكل حصى المرارة ومتى يجب التدخل جراحيا؟', 'توجد عند الكثير من الناس حصى في المرارة، لكنها ليست خطيرة دائما. نتعرف على كيفية تشكل الحصى، ومتى تصبح مضرة بشكل يستدعي التدخل الجراحي.', '2016-02-01 10:52:00', 'http://www.dw.com/ar/كيف-تتشكل-حصى-المرارة-ومتى-يجب-التدخل-جراحيا؟/a-18994755?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(158, 27, 'نائبة رئيس البرلمان الألماني تطالب تركيا بفتح الحدود', 'طالبت نائبة رئيس البرلمان الألماني كلاوديا روت تركيا بفتح حدودها أمام اللاجئين السوريين بسبب الوضع المأساوي في سوريا.', 'نائبة رئيس البرلمان الألماني تطالب تركيا بفتح الحدود', 'طالبت نائبة رئيس البرلمان الألماني كلاوديا روت تركيا بفتح حدودها أمام اللاجئين السوريين بسبب الوضع المأساوي في سوريا.', '2016-02-09 03:55:00', 'http://www.dw.com/ar/نائبة-رئيس-البرلمان-الألماني-تطالب-تركيا-بفتح-الحدود/a-19034940?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(159, 27, 'آلاف من مهاجري البلقان يغادرون ألمانيا إلى بلادهم طواعية', 'عاد العام الماضي 37220 مهاجرا أغلبهم منحدرين من دول غرب البلقان ومن الملزمين بمغادرة ألمانيا إلى بلدانهم طواعية.', 'آلاف من مهاجري البلقان يغادرون ألمانيا إلى بلادهم طواعية', 'عاد العام الماضي 37220 مهاجرا أغلبهم منحدرين من دول غرب البلقان ومن الملزمين بمغادرة ألمانيا إلى بلدانهم طواعية.', '2016-02-09 04:55:00', 'http://www.dw.com/ar/آلاف-من-مهاجري-البلقان-يغادرون-ألمانيا-إلى-بلادهم-طواعية/a-19035035?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(160, 27, 'تقرير أممي: عينات دم جنود سوريين تظهر احتمال هجوم بغاز السارين', 'قالت منظمة حظر الأسلحة الكيميائية في تقرير نشر أمس إن عينات الدم التي أخذت من جنود شاركوا في هجوم كيميائي مزعوم في سورية العام الماضي تظهر "درجة عالية من احتمالية" تعرضهم لغاز السارين عند نقطة معينة.', 'تقرير أممي: عينات دم جنود سوريين تظهر احتمال هجوم بغاز السارين', 'قالت منظمة حظر الأسلحة الكيميائية في تقرير نشر أمس إن عينات الدم التي أخذت من جنود شاركوا في هجوم كيميائي مزعوم في سورية العام الماضي تظهر "درجة عالية من احتمالية" تعرضهم لغاز السارين عند نقطة معينة.', '2016-02-09 05:39:00', 'http://www.dw.com/ar/تقرير-أممي-عينات-دم-جنود-سوريين-تظهر-احتمال-هجوم-بغاز-السارين/a-19035310?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(161, 27, 'أحمد داود أوغلو – تركيا لن تغلق حدودها أمام اللاجئين', 'قال رئيس الوزراء التركي أحمد داود أوغلو إن نحو 70 ألف لاجئ سوري قد يصلون إلى الحدود التركية إذا استمرت الحملة العسكرية هناك بهذه الكثافة، مضيفا أن بلاده لن تغلق حدودها أمام اللاجئين.', 'أحمد داود أوغلو – تركيا لن تغلق حدودها أمام اللاجئين', 'قال رئيس الوزراء التركي أحمد داود أوغلو إن نحو 70 ألف لاجئ سوري قد يصلون إلى الحدود التركية إذا استمرت الحملة العسكرية هناك بهذه الكثافة، مضيفا أن بلاده لن تغلق حدودها أمام اللاجئين.', '2016-02-09 06:37:00', 'http://www.dw.com/ar/أحمد-داود-أوغلو-تركيا-لن-تغلق-حدودها-أمام-اللاجئين/a-19035529?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(162, 27, 'تفجير انتحاري قرب ناد للشرطة في دمشق يُسقط عدة قتلى', 'لقي ثمانية أشخاص مصرعهم، وأصيب نحو عشرين في تفجير سيارة مفخخة الثلاثاء استهدف ناد لضباط الشرطة في منطقة مساكن برزة في شمال شرق دمشق وفق ما أفاد المرصد السوري لحقوق الإنسان ووزارة الداخلية السورية.', 'تفجير انتحاري قرب ناد للشرطة في دمشق يُسقط عدة قتلى', 'لقي ثمانية أشخاص مصرعهم، وأصيب نحو عشرين في تفجير سيارة مفخخة الثلاثاء استهدف ناد لضباط الشرطة في منطقة مساكن برزة في شمال شرق دمشق وفق ما أفاد المرصد السوري لحقوق الإنسان ووزارة الداخلية السورية.', '2016-02-09 08:57:00', 'http://www.dw.com/ar/تفجير-انتحاري-قرب-ناد-للشرطة-في-دمشق-يُسقط-عدة-قتلى/a-19035721?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(163, 27, 'تصادم قطارات بألمانيا -8 قتلى و عشرات الجرحى بحالة خطرة', 'ارتفع عدد ضحايا تصادم قطارين في ولاية بافاريا الألمانية صباح اليوم الثلاثاء إلى ثمانية قتلى. ومتحدث باسم الشرطة يكشف عن وجود عشرات المصابين في حالة خطيرة.', 'تصادم قطارات بألمانيا -8 قتلى و عشرات الجرحى بحالة خطرة', 'ارتفع عدد ضحايا تصادم قطارين في ولاية بافاريا الألمانية صباح اليوم الثلاثاء إلى ثمانية قتلى. ومتحدث باسم الشرطة يكشف عن وجود عشرات المصابين في حالة خطيرة.', '2016-02-09 07:19:00', 'http://www.dw.com/ar/تصادم-قطارات-بألمانيا-8-قتلى-و-عشرات-الجرحى-بحالة-خطرة/a-19035608?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(164, 27, 'التحقيقات الأولية: حادث القطار سببه "خطأ بشري"', 'التحقيقات الأولية تشير إلى أن خطأ بشرياً هو المسؤول عن تصادم قطارين في جنوب ألمانيا نجم عنه مقتل تسعة أشخاص وإصابة العشرات بجروح متفاوتة، في الوقت الذي أعربت فيه المستشارة ميركل عن "صدمتها".', 'التحقيقات الأولية: حادث القطار سببه "خطأ بشري"', 'التحقيقات الأولية تشير إلى أن خطأ بشرياً هو المسؤول عن تصادم قطارين في جنوب ألمانيا نجم عنه مقتل تسعة أشخاص وإصابة العشرات بجروح متفاوتة، في الوقت الذي أعربت فيه المستشارة ميركل عن "صدمتها".', '2016-02-09 15:03:00', 'http://www.dw.com/ar/التحقيقات-الأولية-حادث-القطار-سببه-خطأ-بشري/a-19036362?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(165, 27, 'أنقرة تستدعي السفير الأمريكي بعد تصريحات مؤيدة للأكراد', 'استدعت وزارة الخارجية التركية السفير الأمريكي في أنقرة بعدما قال متحدث باسم الخارجية الأمريكية إن واشنطن لا تعتبر وحدات حماية الشعب الكردية منظمة إرهابية.', 'أنقرة تستدعي السفير الأمريكي بعد تصريحات مؤيدة للأكراد', 'استدعت وزارة الخارجية التركية السفير الأمريكي في أنقرة بعدما قال متحدث باسم الخارجية الأمريكية إن واشنطن لا تعتبر وحدات حماية الشعب الكردية منظمة إرهابية.', '2016-02-09 15:00:00', 'http://www.dw.com/ar/أنقرة-تستدعي-السفير-الأمريكي-بعد-تصريحات-مؤيدة-للأكراد/a-19036867?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(166, 27, 'الحكومة الفلسطينية مستعدة للاستقالة لتشكيل حكومة وحدة وطنية', 'ذكرت الحكومة الفلسطينية أنها مستعدة لتقديم استقالتها لدعم تشكيل حكومة وحدة وطنية، بعد الإعلان عن آلية للمصالحة بين حركتي فتح وحماس في الدوحة. وجدد ممثلو الحركتين اتفاقهما على الإعداد للانتخابات التشريعية والرئاسية.', 'الحكومة الفلسطينية مستعدة للاستقالة لتشكيل حكومة وحدة وطنية', 'ذكرت الحكومة الفلسطينية أنها مستعدة لتقديم استقالتها لدعم تشكيل حكومة وحدة وطنية، بعد الإعلان عن آلية للمصالحة بين حركتي فتح وحماس في الدوحة. وجدد ممثلو الحركتين اتفاقهما على الإعداد للانتخابات التشريعية والرئاسية.', '2016-02-09 14:07:00', 'http://www.dw.com/ar/الحكومة-الفلسطينية-مستعدة-للاستقالة-لتشكيل-حكومة-وحدة-وطنية/a-19036792?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(167, 27, 'منظمات: أكثر من مليون سوري يعيشون تحت الحصار', 'أفادت منظمتان غير حكوميتان ان أكثر من مليون سوري يعيشون تحت الحصار بعد خمس سنوات من الحرب، مشيرة إلى أن الأزمة "أسوأ بكثير" مما وصفته الأمم المتحدة. وفي الأثناء، أُعلن عن استهداف الطيران الروسي مستشفى في طفس جنوب سوريا.', 'منظمات: أكثر من مليون سوري يعيشون تحت الحصار', 'أفادت منظمتان غير حكوميتان ان أكثر من مليون سوري يعيشون تحت الحصار بعد خمس سنوات من الحرب، مشيرة إلى أن الأزمة "أسوأ بكثير" مما وصفته الأمم المتحدة. وفي الأثناء، أُعلن عن استهداف الطيران الروسي مستشفى في طفس جنوب سوريا.', '2016-02-09 13:47:00', 'http://www.dw.com/ar/منظمات-أكثر-من-مليون-سوري-يعيشون-تحت-الحصار/a-19036765?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(168, 27, 'الهند ترفض مبادرة فيسبوك للإنترنت المجاني', 'أصدرت الهند قرارا يحول دون تقديم الشركات لخدمات إنترنت بأسعار متباينة على أساس المواقع أو التطبيقات. الخطوة قوبلت بترحيب البعض فيما أعربت شركة "فيسبوك" عن صدمتها من القرار الذي يؤدي لحظر مبادرة "فري بيزكس" التي أطلقتها.', 'الهند ترفض مبادرة فيسبوك للإنترنت المجاني', 'أصدرت الهند قرارا يحول دون تقديم الشركات لخدمات إنترنت بأسعار متباينة على أساس المواقع أو التطبيقات. الخطوة قوبلت بترحيب البعض فيما أعربت شركة "فيسبوك" عن صدمتها من القرار الذي يؤدي لحظر مبادرة "فري بيزكس" التي أطلقتها.', '2016-02-09 12:47:00', 'http://www.dw.com/ar/الهند-ترفض-مبادرة-فيسبوك-للإنترنت-المجاني/a-19036370?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(169, 27, 'بروتينات طبيعية وصحية لعشاق رياضة كمال الأجساد', 'تساعد "مكملات بروتين" المصنعة على تقوية العضلات بعد ممارسة الرياضة، بيد أن خبراء ألمان قالوا إن ذلك يمكن الاستغناء عنه بمكملات بروتين طبيعية وصحية ورخيصة، ولكن بمعدلات محددة وفق شروط معينة منها تناسبها مع وزن الجسم.', 'بروتينات طبيعية وصحية لعشاق رياضة كمال الأجساد', 'تساعد "مكملات بروتين" المصنعة على تقوية العضلات بعد ممارسة الرياضة، بيد أن خبراء ألمان قالوا إن ذلك يمكن الاستغناء عنه بمكملات بروتين طبيعية وصحية ورخيصة، ولكن بمعدلات محددة وفق شروط معينة منها تناسبها مع وزن الجسم.', '2016-02-09 12:21:00', 'http://www.dw.com/ar/بروتينات-طبيعية-وصحية-لعشاق-رياضة-كمال-الأجساد/a-19034332?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(170, 27, 'التحرش يضاعف معاناة لاجئات سوريات في المغرب', 'تشتكي لاجئات سوريات في المغرب من تعرضهن للتحرش وحوادث الاعتداء الجنسي، حيث باتت المحاكم المغربية تستقبل مزيدا من القضايا التي لها علاقة بهذه الفئة في الآونة الأخيرة، حسبما أوضح بعض الخبراء القانونيين المغاربة لـDWعربية.', 'التحرش يضاعف معاناة لاجئات سوريات في المغرب', 'تشتكي لاجئات سوريات في المغرب من تعرضهن للتحرش وحوادث الاعتداء الجنسي، حيث باتت المحاكم المغربية تستقبل مزيدا من القضايا التي لها علاقة بهذه الفئة في الآونة الأخيرة، حسبما أوضح بعض الخبراء القانونيين المغاربة لـDWعربية.', '2016-02-09 12:00:00', 'http://www.dw.com/ar/التحرش-يضاعف-معاناة-لاجئات-سوريات-في-المغرب/a-19036490?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(171, 27, 'الكرملين يهاجم ميركل بسبب رفضها للحملة الروسية في سوريا', 'هاجم الكرملين الثلاثاء المستشارة الألمانية أنغيلا ميركل بسبب انتقادها للحملة الجوية الروسية في سوريا، وذلك أثناء زيارتها إلى تركيا. وتنفي روسيا مقتل مدنيين في غاراتها الجوية التي تنفذها في سوريا بموافقة النظام.', 'الكرملين يهاجم ميركل بسبب رفضها للحملة الروسية في سوريا', 'هاجم الكرملين الثلاثاء المستشارة الألمانية أنغيلا ميركل بسبب انتقادها للحملة الجوية الروسية في سوريا، وذلك أثناء زيارتها إلى تركيا. وتنفي روسيا مقتل مدنيين في غاراتها الجوية التي تنفذها في سوريا بموافقة النظام.', '2016-02-09 11:40:00', 'http://www.dw.com/ar/الكرملين-يهاجم-ميركل-بسبب-رفضها-للحملة-الروسية-في-سوريا/a-19036467?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(172, 27, 'دراسة: العقارات المضادة للملاريا لا تؤثر على الحمل', 'قالت دراسة بحثية مشتركة من جامعات أوكسفورد وميلبورن وماهيدول التايلاندية إن عقار الأرتيميسينين المضاد للملاريا لا يزيد المخاطر للحوامل، الأمر الذي من المرجح أن يمهد الطريق لاستخدام الحوامل لهذا العقار.', 'دراسة: العقارات المضادة للملاريا لا تؤثر على الحمل', 'قالت دراسة بحثية مشتركة من جامعات أوكسفورد وميلبورن وماهيدول التايلاندية إن عقار الأرتيميسينين المضاد للملاريا لا يزيد المخاطر للحوامل، الأمر الذي من المرجح أن يمهد الطريق لاستخدام الحوامل لهذا العقار.', '2016-02-09 11:09:00', 'http://www.dw.com/ar/دراسة-العقارات-المضادة-للملاريا-لا-تؤثر-على-الحمل/a-19036364?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(173, 27, 'باحثون يكتشفون نوعا جديدا من البكتريا يسبب داء لايم', 'اكتشف باحثون في المراكز الأمريكية لمكافحة الأمراض نوعا جديدا من البكتريا يسبب لايم للإنسان الذي ينقله القراد، فيما يأمل الباحثون أن يساهم الاكتشاف الجديد في القضاء على هذا المرض.', 'باحثون يكتشفون نوعا جديدا من البكتريا يسبب داء لايم', 'اكتشف باحثون في المراكز الأمريكية لمكافحة الأمراض نوعا جديدا من البكتريا يسبب لايم للإنسان الذي ينقله القراد، فيما يأمل الباحثون أن يساهم الاكتشاف الجديد في القضاء على هذا المرض.', '2016-02-09 11:01:00', 'http://www.dw.com/ar/باحثون-يكتشفون-نوعا-جديدا-من-البكتريا-يسبب-داء-لايم/a-19036416?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(174, 27, 'الاتحاد الألماني لكرة يطالب لجنة المونديال باسترجاع ملايين اليورو', 'كشفت تقارير صحفية ألمانية أن الاتحاد الألماني لكرة القدم طالب فيدور رادمان، النائب السابق لرئيس اللجنة المنظمة لبطولة كأس العالم 2006، برد مبلغ مالي يشتبه أنه قدمه لاتحاد الكرة الدولي لشراء أصوات.', 'الاتحاد الألماني لكرة يطالب لجنة المونديال باسترجاع ملايين اليورو', 'كشفت تقارير صحفية ألمانية أن الاتحاد الألماني لكرة القدم طالب فيدور رادمان، النائب السابق لرئيس اللجنة المنظمة لبطولة كأس العالم 2006، برد مبلغ مالي يشتبه أنه قدمه لاتحاد الكرة الدولي لشراء أصوات.', '2016-02-09 10:31:00', 'http://www.dw.com/ar/الاتحاد-الألماني-لكرة-يطالب-لجنة-المونديال-باسترجاع-ملايين-اليورو/a-19036296?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(175, 27, '"غوغل" تتبرع بـ 25 ألف كمبيوتر للاجئين في ألمانيا', 'أعلن العملاق الأمريكي "غوغل" التبرع بـ 25 ألف جهاز كمبيوتر محمول من نوع "كروم بوك" للاجئين في ألمانيا. "غوغل" يهدف عبر هذا المشروع تسهيل عملية إدماج طالبي اللجوء في المجتمع الألماني.', '"غوغل" تتبرع بـ 25 ألف كمبيوتر للاجئين في ألمانيا', 'أعلن العملاق الأمريكي "غوغل" التبرع بـ 25 ألف جهاز كمبيوتر محمول من نوع "كروم بوك" للاجئين في ألمانيا. "غوغل" يهدف عبر هذا المشروع تسهيل عملية إدماج طالبي اللجوء في المجتمع الألماني.', '2016-02-09 10:14:00', 'http://www.dw.com/ar/غوغل-تتبرع-بـ-25-ألف-كمبيوتر-للاجئين-في-ألمانيا/a-19034055?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(176, 27, 'علماء: تجنب الضوء يزيد حدة الصداع النصفي', 'نوبات الصداع النصفي، تؤثر على الحياة العملية والاجتماعية للمصاب الذي يشعر غالبا بحساسية تجاه الضوء ويفضل البقاء في أماكن مظلمة وهو أمر ينصح به الأطباء، لكن دراسة حديثة أثبتت خطأ هذا الأمر وخلصت إلى "استراتيجية مضادة".', 'علماء: تجنب الضوء يزيد حدة الصداع النصفي', 'نوبات الصداع النصفي، تؤثر على الحياة العملية والاجتماعية للمصاب الذي يشعر غالبا بحساسية تجاه الضوء ويفضل البقاء في أماكن مظلمة وهو أمر ينصح به الأطباء، لكن دراسة حديثة أثبتت خطأ هذا الأمر وخلصت إلى "استراتيجية مضادة".', '2016-02-09 09:56:00', 'http://www.dw.com/ar/علماء-تجنب-الضوء-يزيد-حدة-الصداع-النصفي/a-19035560?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(177, 27, 'السوري داود ـ موهبة ترصدها أقوى الأندية الأوروبية', 'يبصم لاعب مونشنغلادباخ محمود داود على موسم جيد مع فريقه. فبالرغم من صغر سنه، استطاع اللاعب ذو الأصول السورية أن يلفت بمهاراته أنظار أقوى الأندية في أوروبا التي أبدت رغبة في التعاقد معه.', 'السوري داود ـ موهبة ترصدها أقوى الأندية الأوروبية', 'يبصم لاعب مونشنغلادباخ محمود داود على موسم جيد مع فريقه. فبالرغم من صغر سنه، استطاع اللاعب ذو الأصول السورية أن يلفت بمهاراته أنظار أقوى الأندية في أوروبا التي أبدت رغبة في التعاقد معه.', '2016-02-09 09:38:00', 'http://www.dw.com/ar/السوري-داود-ـ-موهبة-ترصدها-أقوى-الأندية-الأوروبية/a-19036062?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(178, 27, 'الأمم المتحدة تطلب من تركيا السماح للفارين من سوريا بدخول أراضيها', 'قالت المفوضية العليا للأمم المتحدة لشؤون اللاجئين أنه يتعين على تركيا السماح للاجئين الذين فروا من مدينة حلب السورية بدخول أراضيها ، وحذرت المنظمة الأممية من موجة فرار جديدة للاجئين.', 'الأمم المتحدة تطلب من تركيا السماح للفارين من سوريا بدخول أراضيها', 'قالت المفوضية العليا للأمم المتحدة لشؤون اللاجئين أنه يتعين على تركيا السماح للاجئين الذين فروا من مدينة حلب السورية بدخول أراضيها ، وحذرت المنظمة الأممية من موجة فرار جديدة للاجئين.', '2016-02-09 09:33:00', 'http://www.dw.com/ar/الأمم-المتحدة-تطلب-من-تركيا-السماح-للفارين-من-سوريا-بدخول-أراضيها/a-19036191?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(179, 27, 'كأس ألمانيا: بريمن يطيح بليفركوزن ودورتموند يتأهل لنصف النهائي', 'فيما خرج باير ليفركوزن بخسارة مفاجئة ومدوية أمام فيردر بريمن المتعثر، تمكن بوروسيا دورتموند من تأمين بطاقة تأهله إلى دوري نصف النهائي في مسابقة كأس ألمانيا، وذلك بعد انتصاره على شتوتغارت.', 'كأس ألمانيا: بريمن يطيح بليفركوزن ودورتموند يتأهل لنصف النهائي', 'فيما خرج باير ليفركوزن بخسارة مفاجئة ومدوية أمام فيردر بريمن المتعثر، تمكن بوروسيا دورتموند من تأمين بطاقة تأهله إلى دوري نصف النهائي في مسابقة كأس ألمانيا، وذلك بعد انتصاره على شتوتغارت.', '2016-02-09 16:52:00', 'http://www.dw.com/ar/كأس-ألمانيا-بريمن-يطيح-بليفركوزن-ودورتموند-يتأهل-لنصف-النهائي/a-19036967?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(180, 27, 'صحف ألمانية: مفتاح حل أزمة اللجوء ليس بيد تركيا لوحدها', 'سلطت الصحف الألمانية الضوء على زيارة المستشارة الألمانية أنغيلا ميركل إلى تركيا التي سعت من خلالها التوصل إلى حل يوقف تدفق اللاجئين نحو أوروبا. تعاليق الصحف الألمانية رأت أن مفتاح الحل الأزمة لا يوجد في يد تركيا لوحدها.', 'صحف ألمانية: مفتاح حل أزمة اللجوء ليس بيد تركيا لوحدها', 'سلطت الصحف الألمانية الضوء على زيارة المستشارة الألمانية أنغيلا ميركل إلى تركيا التي سعت من خلالها التوصل إلى حل يوقف تدفق اللاجئين نحو أوروبا. تعاليق الصحف الألمانية رأت أن مفتاح الحل الأزمة لا يوجد في يد تركيا لوحدها.', '2016-02-09 16:34:00', 'http://www.dw.com/ar/صحف-ألمانية-مفتاح-حل-أزمة-اللجوء-ليس-بيد-تركيا-لوحدها/a-19036041?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(181, 27, 'الشرطة: هجوم بقنبلة يدوية على مسكن للاجئين ليس بدافع الكراهية', 'تحقيقات الشرطة في إلقاء قنبلة يدوية على مركز لإيواء اللاجئين في جنوب ألمانيا توصلت إلى أن دافعه لم يكن كراهية الأجانب، وتعتقد أنه أبعد ما يكون عن ذلك.', 'الشرطة: هجوم بقنبلة يدوية على مسكن للاجئين ليس بدافع الكراهية', 'تحقيقات الشرطة في إلقاء قنبلة يدوية على مركز لإيواء اللاجئين في جنوب ألمانيا توصلت إلى أن دافعه لم يكن كراهية الأجانب، وتعتقد أنه أبعد ما يكون عن ذلك.', '2016-02-09 16:32:00', 'http://www.dw.com/ar/الشرطة-هجوم-بقنبلة-يدوية-على-مسكن-للاجئين-ليس-بدافع-الكراهية/a-19036955?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(182, 27, 'شفاينشتايغر حزين في مانشستر سعيد مع الحسناء إيفانوفيتش', 'يبدو أن علاقة اللاعب باستيان شفاينشتايغر بنجمة التنس آنا إيفانوفيتش تتطور يوما بعد آخر، حيث ينوي الحبيبان الاحتفال قريبا بزفافهما. بخلاف ذلك فإن مسيرة شفاينشتايغر مع فريقه الجديد مانشستر يونايتد تشهد انتكاسة بعد أخرى.', 'شفاينشتايغر حزين في مانشستر سعيد مع الحسناء إيفانوفيتش', 'يبدو أن علاقة اللاعب باستيان شفاينشتايغر بنجمة التنس آنا إيفانوفيتش تتطور يوما بعد آخر، حيث ينوي الحبيبان الاحتفال قريبا بزفافهما. بخلاف ذلك فإن مسيرة شفاينشتايغر مع فريقه الجديد مانشستر يونايتد تشهد انتكاسة بعد أخرى.', '2016-02-09 15:47:00', 'http://www.dw.com/ar/شفاينشتايغر-حزين-في-مانشستر-سعيد-مع-الحسناء-إيفانوفيتش/a-19036558?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-09'),
(183, 27, 'شتاينماير: لا يمكن للناتو القيام بدور في السيطرة على هجرة اللاجئين', 'وزير الخارجية الألماني فرانك-فالتر شتاينماير يعرب، في تصريح صحفي، عن تشككه في مدى جدوى الاستعانة بحلف شمال الأطلسي (الناتو) بهدف السيطرة على هجرة اللاجئين. يأتي ذلك قبيل اجتماع لوزراء دفاع حلف الناتو لمناقشة هذا الأمر.', 'شتاينماير: لا يمكن للناتو القيام بدور في السيطرة على هجرة اللاجئين', 'وزير الخارجية الألماني فرانك-فالتر شتاينماير يعرب، في تصريح صحفي، عن تشككه في مدى جدوى الاستعانة بحلف شمال الأطلسي (الناتو) بهدف السيطرة على هجرة اللاجئين. يأتي ذلك قبيل اجتماع لوزراء دفاع حلف الناتو لمناقشة هذا الأمر.', '2016-02-10 02:52:00', 'http://www.dw.com/ar/شتاينماير-لا-يمكن-للناتو-القيام-بدور-في-السيطرة-على-هجرة-اللاجئين/a-19037267?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(184, 27, 'محنة عائلة ألمانية-سورية في البحث عن الأب المفقود', 'الحرب المستمرة في سوريا أدت لتشريد الملايين ومقتل نحو 300 ألف شخص، ناهيك عن عشرات آلاف المعتقلين والمفقودين الذين لا يعلم ذووهم شيئا عنهم. عائلة ألمانية- سورية تروي مأساتها لـ DW عربية في رحلة البحث عن الوالد المفقود.', 'محنة عائلة ألمانية-سورية في البحث عن الأب المفقود', 'الحرب المستمرة في سوريا أدت لتشريد الملايين ومقتل نحو 300 ألف شخص، ناهيك عن عشرات آلاف المعتقلين والمفقودين الذين لا يعلم ذووهم شيئا عنهم. عائلة ألمانية- سورية تروي مأساتها لـ DW عربية في رحلة البحث عن الوالد المفقود.', '2016-02-10 02:47:00', 'http://www.dw.com/ar/محنة-عائلة-ألمانية-سورية-في-البحث-عن-الأب-المفقود/a-19030932?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(185, 27, 'العراق: العبادي يدعو لتغييرات وزارية جذرية', 'في خطاب متلفز، دعا رئيس الوزراء العراقي إلى تغييرات كبيرة في المناصب الوزيرة بهدف مجابهة الوضع الاقتصادي والتحديات السياسية في البلاد. وطالب العبادي بتعيين تكنوقراطيين بدلاً من وزراء ذوي انتماءات حزبية أو طائفية.', 'العراق: العبادي يدعو لتغييرات وزارية جذرية', 'في خطاب متلفز، دعا رئيس الوزراء العراقي إلى تغييرات كبيرة في المناصب الوزيرة بهدف مجابهة الوضع الاقتصادي والتحديات السياسية في البلاد. وطالب العبادي بتعيين تكنوقراطيين بدلاً من وزراء ذوي انتماءات حزبية أو طائفية.', '2016-02-09 17:07:00', 'http://www.dw.com/ar/العراق-العبادي-يدعو-لتغييرات-وزارية-جذرية/a-19036977?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(186, 27, 'الناتو يدرس الاضطلاع بدور في أزمة الهجرة ومحاربة "داعش"', 'يناقش وزراء الدفاع في حلف شمال الأطلسي (الناتو) اضطلاع الحلف بدور محتمل في التعامل مع أزمة الهجرة في محادثات تستمر يومين ستتركز أيضا على الصراع في سوريا وتعزيز الدفاعات ضد عدوان روسي محتمل.', 'الناتو يدرس الاضطلاع بدور في أزمة الهجرة ومحاربة "داعش"', 'يناقش وزراء الدفاع في حلف شمال الأطلسي (الناتو) اضطلاع الحلف بدور محتمل في التعامل مع أزمة الهجرة في محادثات تستمر يومين ستتركز أيضا على الصراع في سوريا وتعزيز الدفاعات ضد عدوان روسي محتمل.', '2016-02-10 07:23:00', 'http://www.dw.com/ar/الناتو-يدرس-الاضطلاع-بدور-في-أزمة-الهجرة-ومحاربة-داعش/a-19037856?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(187, 27, 'المرصد: مقتل أكثر من شخص منذ بداية هجوم الأسد وحلفائه على حلب', 'قال المرصد السوري لحقوق الإنسان إن أكثر من 500 شخص على الأقل قتلوا من جميع الأطراف خلال المعارك في حلب منذ بداية هجوم الجيش السوري والقوات المتحالفة معه في أوائل فبراير/ شباط الجاري على المحافظة.', 'المرصد: مقتل أكثر من شخص منذ بداية هجوم الأسد وحلفائه على حلب', 'قال المرصد السوري لحقوق الإنسان إن أكثر من 500 شخص على الأقل قتلوا من جميع الأطراف خلال المعارك في حلب منذ بداية هجوم الجيش السوري والقوات المتحالفة معه في أوائل فبراير/ شباط الجاري على المحافظة.', '2016-02-10 07:17:00', 'http://www.dw.com/ar/المرصد-مقتل-أكثر-من-شخص-منذ-بداية-هجوم-الأسد-وحلفائه-على-حلب/a-19037660?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10');
INSERT INTO `rss_feeds` (`id`, `rssWebsiteId`, `titleAR`, `descAR`, `titleGE`, `descGE`, `pubDate`, `url`, `image`, `isActive`, `addingDate`) VALUES
(188, 27, 'الرئيس الألماني يدعو لمكافحة مشتركة للإرهاب وأسباب اللجوء', 'دعا الرئيس الألماني يواخيم غاوك في العاصمة النيجيرية أبوجا إلى مكافحة مشتركة للإرهاب وأسباب موجات اللجوء العالمية. وأكد أن الحد من الهجرة أمر ضروري "إذا كنا نريد الحفاظ على استعداد المواطنين لاستقبال لاجئين".', 'الرئيس الألماني يدعو لمكافحة مشتركة للإرهاب وأسباب اللجوء', 'دعا الرئيس الألماني يواخيم غاوك في العاصمة النيجيرية أبوجا إلى مكافحة مشتركة للإرهاب وأسباب موجات اللجوء العالمية. وأكد أن الحد من الهجرة أمر ضروري "إذا كنا نريد الحفاظ على استعداد المواطنين لاستقبال لاجئين".', '2016-02-10 07:13:00', 'http://www.dw.com/ar/الرئيس-الألماني-يدعو-لمكافحة-مشتركة-للإرهاب-وأسباب-اللجوء/a-19037755?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(189, 27, 'تقرير: انحسار تفوق التكنولوجيا العسكرية للغرب', 'ذكر المعهد الدولي للدراسات الإستراتيجية في لندن في تقريره السنوي أن تفوق الغرب في التكنولوجيا العسكرية "ينحسر" خصوصا أمام الصين وروسيا، مشددا على أن العالم يواجه "توازنا للقوة العسكرية يزداد تعقيدا".', 'تقرير: انحسار تفوق التكنولوجيا العسكرية للغرب', 'ذكر المعهد الدولي للدراسات الإستراتيجية في لندن في تقريره السنوي أن تفوق الغرب في التكنولوجيا العسكرية "ينحسر" خصوصا أمام الصين وروسيا، مشددا على أن العالم يواجه "توازنا للقوة العسكرية يزداد تعقيدا".', '2016-02-10 06:48:00', 'http://www.dw.com/ar/تقرير-انحسار-تفوق-التكنولوجيا-العسكرية-للغرب/a-19037657?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(190, 27, 'الشرطة الألمانية: عشرة قتلى حصيلة تصادم قطارين', 'عدلت الشرطة الألمانية بياناتها بشأن عدد قتلى حادث تصادم قطارين الذي وقع في ولاية بافاريا الألمانية لتؤكد أنهم 10 أشخاص، بعدما ذكرت حصيلة سابقة أن عدد القتلى وصل إلى 11 شخصا.', 'الشرطة الألمانية: عشرة قتلى حصيلة تصادم قطارين', 'عدلت الشرطة الألمانية بياناتها بشأن عدد قتلى حادث تصادم قطارين الذي وقع في ولاية بافاريا الألمانية لتؤكد أنهم 10 أشخاص، بعدما ذكرت حصيلة سابقة أن عدد القتلى وصل إلى 11 شخصا.', '2016-02-10 05:08:00', 'http://www.dw.com/ar/الشرطة-الألمانية-عشرة-قتلى-حصيلة-تصادم-قطارين/a-19037498?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(191, 27, 'الجيش التركي يضبط متفجرات بحوزة مشتبه بهم على الحدود السورية', 'أعلن الجيش التركي أن جنوده ضبطوا أربعة أحزمة ناسفة في حقائب مجموعة من المشتبه بهم تم اعتراضها في قرقميش، بجنوب شرق تركيا، التي تقع قبالة مدينة جرابلس السورية التي يحتلها حاليا تنظيم "الدولة الإسلامية".', 'الجيش التركي يضبط متفجرات بحوزة مشتبه بهم على الحدود السورية', 'أعلن الجيش التركي أن جنوده ضبطوا أربعة أحزمة ناسفة في حقائب مجموعة من المشتبه بهم تم اعتراضها في قرقميش، بجنوب شرق تركيا، التي تقع قبالة مدينة جرابلس السورية التي يحتلها حاليا تنظيم "الدولة الإسلامية".', '2016-02-10 04:09:00', 'http://www.dw.com/ar/الجيش-التركي-يضبط-متفجرات-بحوزة-مشتبه-بهم-على-الحدود-السورية/a-19037362?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(192, 27, 'البرلمان الفرنسي يقر خطة لسحب الجنسية من المدانين بالإرهاب', 'صوت النواب الفرنسيون بأغلبية ضئيلة على مادة مثيرة للجدل تدرج في الدستور وتقضي بإسقاط الجنسية الفرنسية عن مدانين بالإرهاب. يأتي ذلك في إطار أجراءات اُقترحت بعد اعتداءات باريس الأخيرة والتي أوقعت 130 قتيلا.', 'البرلمان الفرنسي يقر خطة لسحب الجنسية من المدانين بالإرهاب', 'صوت النواب الفرنسيون بأغلبية ضئيلة على مادة مثيرة للجدل تدرج في الدستور وتقضي بإسقاط الجنسية الفرنسية عن مدانين بالإرهاب. يأتي ذلك في إطار أجراءات اُقترحت بعد اعتداءات باريس الأخيرة والتي أوقعت 130 قتيلا.', '2016-02-10 03:49:00', 'http://www.dw.com/ar/البرلمان-الفرنسي-يقر-خطة-لسحب-الجنسية-من-المدانين-بالإرهاب/a-19037354?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(193, 27, 'ترامب وساندرز يفوزان في الانتخابات التمهيدية بولاية نيوهامبشير', 'فاز كل من الملياردير الأمريكي دونالد ترامب، الطامح ليصبح مرشح الحزب الجمهوري في انتخابات الرئاسة الأمريكية، والسناتور الديمقراطي بيرني ساندرز في الانتخابات التمهيدية بولاية نيوهامبشير، متقدما بذلك على منافسته كلينتون.', 'ترامب وساندرز يفوزان في الانتخابات التمهيدية بولاية نيوهامبشير', 'فاز كل من الملياردير الأمريكي دونالد ترامب، الطامح ليصبح مرشح الحزب الجمهوري في انتخابات الرئاسة الأمريكية، والسناتور الديمقراطي بيرني ساندرز في الانتخابات التمهيدية بولاية نيوهامبشير، متقدما بذلك على منافسته كلينتون.', '2016-02-10 03:22:00', 'http://www.dw.com/ar/ترامب-وساندرز-يفوزان-في-الانتخابات-التمهيدية-بولاية-نيوهامبشير/a-19037311?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(194, 27, 'الإستغلال الجنسي يضاعف معاناة لاجئات سوريات في المغرب', 'تشتكي لاجئات سوريات في المغرب من تعرضهن للتحرش وحوادث الاعتداء الجنسي، حيث باتت المحاكم المغربية تستقبل مزيدا من القضايا التي لها علاقة بهذه الفئة في الآونة الأخيرة، حسبما أوضح بعض الخبراء القانونيين المغاربة لـDWعربية.', 'الإستغلال الجنسي يضاعف معاناة لاجئات سوريات في المغرب', 'تشتكي لاجئات سوريات في المغرب من تعرضهن للتحرش وحوادث الاعتداء الجنسي، حيث باتت المحاكم المغربية تستقبل مزيدا من القضايا التي لها علاقة بهذه الفئة في الآونة الأخيرة، حسبما أوضح بعض الخبراء القانونيين المغاربة لـDWعربية.', '2016-02-09 12:00:00', 'http://www.dw.com/ar/الإستغلال-الجنسي-يضاعف-معاناة-لاجئات-سوريات-في-المغرب/a-19036490?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(195, 27, 'كيف ينظر المهاجرون العرب إلى اللاجئين الجدد في ألمانيا؟', 'على غرار مواقف الألمان من قضية اللاجئين، تختلف أيضا مواقف المهاجرين العرب المقيمين في ألمانيا من هذا الموضوع. فكيف ينظر هؤلاء إلى اللاجئين الجدد وهل يتوقعون أن ينجحوا في بدء حياة جديدة والاندماج في المجتمع الألماني؟', 'كيف ينظر المهاجرون العرب إلى اللاجئين الجدد في ألمانيا؟', 'على غرار مواقف الألمان من قضية اللاجئين، تختلف أيضا مواقف المهاجرين العرب المقيمين في ألمانيا من هذا الموضوع. فكيف ينظر هؤلاء إلى اللاجئين الجدد وهل يتوقعون أن ينجحوا في بدء حياة جديدة والاندماج في المجتمع الألماني؟', '2016-02-10 08:24:00', 'http://www.dw.com/ar/كيف-ينظر-المهاجرون-العرب-إلى-اللاجئين-الجدد-في-ألمانيا؟/a-19036768?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(196, 27, 'وزيرة الدفاع الألمانية تؤيد الاستعانة بالناتو لمكافحة تهريب البشر', 'أعربت وزيرة الدفاع الألمانية عن تأييدها للاستعانة بسفن تابعة لحلف الناتو في مكافحة عصابات تهريب البشر في الممرات البحرية بين تركيا واليونان. والحلف يؤكد أنه سيدرس بجدية طلبا ألمانيا–تركيا للمساعدة في أزمة الهجرة.', 'وزيرة الدفاع الألمانية تؤيد الاستعانة بالناتو لمكافحة تهريب البشر', 'أعربت وزيرة الدفاع الألمانية عن تأييدها للاستعانة بسفن تابعة لحلف الناتو في مكافحة عصابات تهريب البشر في الممرات البحرية بين تركيا واليونان. والحلف يؤكد أنه سيدرس بجدية طلبا ألمانيا–تركيا للمساعدة في أزمة الهجرة.', '2016-02-10 09:26:00', 'http://www.dw.com/ar/وزيرة-الدفاع-الألمانية-تؤيد-الاستعانة-بالناتو-لمكافحة-تهريب-البشر/a-19038252?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(197, 27, 'دراسة تنصح بالنوم لتخفيف الوزن!', 'كيف يمكن أن يساعد النوم على تفيف الوزنا؟ إن فهم طريقة عمل الأنسولين في الجسم، يلعب دورا مهما في بدانة الجسم البشري، في حالات كثيرة، قد لا ننتبه لها في حياتنا اليومية، وفي طريقة الغذاء التي نتبعها.', 'دراسة تنصح بالنوم لتخفيف الوزن!', 'كيف يمكن أن يساعد النوم على تفيف الوزنا؟ إن فهم طريقة عمل الأنسولين في الجسم، يلعب دورا مهما في بدانة الجسم البشري، في حالات كثيرة، قد لا ننتبه لها في حياتنا اليومية، وفي طريقة الغذاء التي نتبعها.', '2016-02-10 08:44:00', 'http://www.dw.com/ar/دراسة-تنصح-بالنوم-لتخفيف-الوزن/a-19013800?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(198, 27, 'وزير الخارجية الفرنسي فابيوس يستقيل وتوقعات بخلافة رويال له', 'وسط تكهنات بشأن تعديل وزاري، استقال وزير الخارجية الفرنسية لوران فابيون من منصبه ليصبح رئيسا للمجلس الدستوري. ويتوقع أن تخلفه في الخارجية الفرنسية سيغولين رويال، شريكة حياة الرئيس أولاند السابقة.', 'وزير الخارجية الفرنسي فابيوس يستقيل وتوقعات بخلافة رويال له', 'وسط تكهنات بشأن تعديل وزاري، استقال وزير الخارجية الفرنسية لوران فابيون من منصبه ليصبح رئيسا للمجلس الدستوري. ويتوقع أن تخلفه في الخارجية الفرنسية سيغولين رويال، شريكة حياة الرئيس أولاند السابقة.', '2016-02-10 09:40:00', 'http://www.dw.com/ar/وزير-الخارجية-الفرنسي-فابيوس-يستقيل-وتوقعات-بخلافة-رويال-له/a-19038310?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(199, 27, 'المغرب- دعوات لإضراب عام هو الأول من نوعه منذ  35 سنة', 'قررت أربع نقابات عمالية كبرى في المغرب الأربعاء القيام بإضراب عام لمدة يوم واحد في أواخر هذا الشهر. وهذا الإضراب، الذي يأتي اعتراضا على سياسة الحكومة التي يقودها حزب العدالة والتنمية يعد الأول من نوعه منذ عام 1981.', 'المغرب- دعوات لإضراب عام هو الأول من نوعه منذ  35 سنة', 'قررت أربع نقابات عمالية كبرى في المغرب الأربعاء القيام بإضراب عام لمدة يوم واحد في أواخر هذا الشهر. وهذا الإضراب، الذي يأتي اعتراضا على سياسة الحكومة التي يقودها حزب العدالة والتنمية يعد الأول من نوعه منذ عام 1981.', '2016-02-10 13:25:00', 'http://www.dw.com/ar/المغرب-دعوات-لإضراب-عام-هو-الأول-من-نوعه-منذ-35-سنة/a-19041208?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(200, 27, 'حلف شمال الأطلسي لا يعتزم إرسال قوات إلى بحر إيجه', 'لم يجد الاقتراح بإرسال جنود من حلف شمال الأطلسي (ناتو) إلى الممرات المائية بين تركيا واليونان تأييدا كبيرا في اجتماع وزراء خارجية دول الحلف في بروكسل. وقرر الوزراء بدلا من ذلك تعزيز وجود قوات الحلف على حدوده الشرقية.', 'حلف شمال الأطلسي لا يعتزم إرسال قوات إلى بحر إيجه', 'لم يجد الاقتراح بإرسال جنود من حلف شمال الأطلسي (ناتو) إلى الممرات المائية بين تركيا واليونان تأييدا كبيرا في اجتماع وزراء خارجية دول الحلف في بروكسل. وقرر الوزراء بدلا من ذلك تعزيز وجود قوات الحلف على حدوده الشرقية.', '2016-02-10 12:43:00', 'http://www.dw.com/ar/حلف-شمال-الأطلسي-لا-يعتزم-إرسال-قوات-إلى-بحر-إيجه/a-19039316?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(201, 27, 'جامعة ألمانية تغلق "غرفة للتأمل" بعد تحويلها إلى مُصَلَّى', 'جدل جديد في الإعلام الألماني ومواقع التواصل بعد قرار إحدى الجامعات إغلاق "غرفة للتأمل" مخصصة للطلبة الباحثين عن الهدوء، بعد أن حولها طلبة مسلمون إلى مصلى، ما حرم الطلبة الآخرين من الاستفادة من الغرفة.', 'جامعة ألمانية تغلق "غرفة للتأمل" بعد تحويلها إلى مُصَلَّى', 'جدل جديد في الإعلام الألماني ومواقع التواصل بعد قرار إحدى الجامعات إغلاق "غرفة للتأمل" مخصصة للطلبة الباحثين عن الهدوء، بعد أن حولها طلبة مسلمون إلى مصلى، ما حرم الطلبة الآخرين من الاستفادة من الغرفة.', '2016-02-10 12:35:00', 'http://www.dw.com/ar/جامعة-ألمانية-تغلق-غرفة-للتأمل-بعد-تحويلها-إلى-مُصَلَّى/a-19038117?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(202, 27, 'دراسة: تغير المناخ سيطيل مدة الرحلات الجوية', 'طول مدة الرحلات الجوية من أوروبا إلى أمريكا الشمالية، هو أحد تداعيات تغيرات المناخ التي يرجح الخبراء حدوثها في السنوات المقبلة، الأمر الذي سيضيف ألفي ساعة سنويا لزمن الرحلات علاوة على ملايين اللترات الإضافية من الوقود.', 'دراسة: تغير المناخ سيطيل مدة الرحلات الجوية', 'طول مدة الرحلات الجوية من أوروبا إلى أمريكا الشمالية، هو أحد تداعيات تغيرات المناخ التي يرجح الخبراء حدوثها في السنوات المقبلة، الأمر الذي سيضيف ألفي ساعة سنويا لزمن الرحلات علاوة على ملايين اللترات الإضافية من الوقود.', '2016-02-10 12:03:00', 'http://www.dw.com/ar/دراسة-تغير-المناخ-سيطيل-مدة-الرحلات-الجوية/a-19038597?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(203, 27, 'الشرطة الألمانية تبحث عن فتاة قطرية مفقودة في مدينة بون', 'في حي "باد غودسبرغ" بمدينة بون، الذي تسكنه جالية عربية كبيرة اختفت منذ أيام فتاة قطرية كانت في طريقها لزيارة أقارب لها في منزل يبعد خطوات عن سكنها قرب محطة القطار. ولم تعثر الشرطة الألمانية لها على أثر حتى الآن.', 'الشرطة الألمانية تبحث عن فتاة قطرية مفقودة في مدينة بون', 'في حي "باد غودسبرغ" بمدينة بون، الذي تسكنه جالية عربية كبيرة اختفت منذ أيام فتاة قطرية كانت في طريقها لزيارة أقارب لها في منزل يبعد خطوات عن سكنها قرب محطة القطار. ولم تعثر الشرطة الألمانية لها على أثر حتى الآن.', '2016-02-10 11:58:00', 'http://www.dw.com/ar/الشرطة-الألمانية-تبحث-عن-فتاة-قطرية-مفقودة-في-مدينة-بون/a-19038701?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(204, 27, 'جسد غوارديولا في بايرن وعقله في مانشستر سيتي؟', 'منذ تأكيد خبر انتقال غوارديولا لتدريب فريق مانشستر سيتي ابتداء من الموسم المقبل، تزايدت المخاوف من أن يؤثر هذا الأمر على تركيز الفريق البافاري فيما تبقى من الموسم خاصة في مسابقة دوري أبطال أوروبا.', 'جسد غوارديولا في بايرن وعقله في مانشستر سيتي؟', 'منذ تأكيد خبر انتقال غوارديولا لتدريب فريق مانشستر سيتي ابتداء من الموسم المقبل، تزايدت المخاوف من أن يؤثر هذا الأمر على تركيز الفريق البافاري فيما تبقى من الموسم خاصة في مسابقة دوري أبطال أوروبا.', '2016-02-10 11:32:00', 'http://www.dw.com/ar/جسد-غوارديولا-في-بايرن-وعقله-في-مانشستر-سيتي؟/a-19038430?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(205, 27, 'المعارضة السورية تشترط مجددا وقف القصف والحصار قبل المفاوضات', 'اتهم رئيس الوزراء التركي القوات السورية، مدعومة من روسيا، بالقيام بتطهير عرقي متعمد حول مدينة حلب. بينما قال رياض حجاب في لندن إن المعارضة لن تعود للمفاوضات في جنيف إلا بعد توقف القصف وفك الحصار.', 'المعارضة السورية تشترط مجددا وقف القصف والحصار قبل المفاوضات', 'اتهم رئيس الوزراء التركي القوات السورية، مدعومة من روسيا، بالقيام بتطهير عرقي متعمد حول مدينة حلب. بينما قال رياض حجاب في لندن إن المعارضة لن تعود للمفاوضات في جنيف إلا بعد توقف القصف وفك الحصار.', '2016-02-10 10:57:00', 'http://www.dw.com/ar/المعارضة-السورية-تشترط-مجددا-وقف-القصف-والحصار-قبل-المفاوضات/a-19038608?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(206, 27, 'المرصد: مقتل أكثر من 500 شخص منذ بداية هجوم الأسد وحلفائه على حلب', 'قال المرصد السوري لحقوق الإنسان إن أكثر من 500 شخص على الأقل قتلوا من جميع الأطراف خلال المعارك في حلب منذ بداية هجوم الجيش السوري والقوات المتحالفة معه في أوائل فبراير/ شباط الجاري على المحافظة.', 'المرصد: مقتل أكثر من 500 شخص منذ بداية هجوم الأسد وحلفائه على حلب', 'قال المرصد السوري لحقوق الإنسان إن أكثر من 500 شخص على الأقل قتلوا من جميع الأطراف خلال المعارك في حلب منذ بداية هجوم الجيش السوري والقوات المتحالفة معه في أوائل فبراير/ شباط الجاري على المحافظة.', '2016-02-10 10:31:00', 'http://www.dw.com/ar/المرصد-مقتل-أكثر-من-500-شخص-منذ-بداية-هجوم-الأسد-وحلفائه-على-حلب/a-19037660?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(207, 27, 'الهولندي هوب ستيفنز يستقيل من تدريب هوفنهايم لأسباب صحية', 'لأسباب صحية توقف هوب ستيفنز عن تدريب فريق هوفنهايم الألماني. المدرب الهولندي الذي يعد أحد أيقونات التدريب في البوندسليغا ربما يخضع لعملية في القلب. وسيخلفه في تدريب هوفنهايم المتعثر، أصغر مدرب في تاريخ الدوري الألماني.', 'الهولندي هوب ستيفنز يستقيل من تدريب هوفنهايم لأسباب صحية', 'لأسباب صحية توقف هوب ستيفنز عن تدريب فريق هوفنهايم الألماني. المدرب الهولندي الذي يعد أحد أيقونات التدريب في البوندسليغا ربما يخضع لعملية في القلب. وسيخلفه في تدريب هوفنهايم المتعثر، أصغر مدرب في تاريخ الدوري الألماني.', '2016-02-10 10:27:00', 'http://www.dw.com/ar/الهولندي-هوب-ستيفنز-يستقيل-من-تدريب-هوفنهايم-لأسباب-صحية/a-19038504?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(208, 27, 'الزاكي يرحل عن تدريب المغرب ورينار أبرز المرشحين لخلافته', 'أعلن الاتحاد المغربي لكرة القدم اليوم الأربعاء توصله إلى اتفاق بإنهاء العقد الذي يربطه مع مدرب المنتخب بادو الزاكي بالتراضي. وقالت مصادر في الاتحاد المغربي لرويترز إن الفرنسي هيرفيه رينار هو مدرب المغرب القادم.', 'الزاكي يرحل عن تدريب المغرب ورينار أبرز المرشحين لخلافته', 'أعلن الاتحاد المغربي لكرة القدم اليوم الأربعاء توصله إلى اتفاق بإنهاء العقد الذي يربطه مع مدرب المنتخب بادو الزاكي بالتراضي. وقالت مصادر في الاتحاد المغربي لرويترز إن الفرنسي هيرفيه رينار هو مدرب المغرب القادم.', '2016-02-10 14:02:00', 'http://www.dw.com/ar/الزاكي-يرحل-عن-تدريب-المغرب-ورينار-أبرز-المرشحين-لخلافته/a-19041250?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(209, 27, '"معارك حلب..مسمار في نعش محادثات جنيف"', 'مع اشتداد المعارك في حلب بين المعارضة وبين قوات الأسد المدعومة بغطاء جوي روسي، بدا تطويق المدينة وشيكا. وفي حال استولى النظام السوري على المدينة فإن الحرب في سوريا ستدخل منعطفا جديدا حسب الخبير الألماني أنريه بانك.', '"معارك حلب..مسمار في نعش محادثات جنيف"', 'مع اشتداد المعارك في حلب بين المعارضة وبين قوات الأسد المدعومة بغطاء جوي روسي، بدا تطويق المدينة وشيكا. وفي حال استولى النظام السوري على المدينة فإن الحرب في سوريا ستدخل منعطفا جديدا حسب الخبير الألماني أنريه بانك.', '2016-02-10 13:49:00', 'http://www.dw.com/ar/معارك-حلب-مسمار-في-نعش-محادثات-جنيف/a-19038787?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(210, 27, 'الحُضن الدافئ..سر سعادة الروح وصحة الجسد!', 'يشهد العصر الحديث تراجعا مخيفا في التواصل الإنساني والجسدي بين الناس بشكل ملحوظ، ما يفقدنا اللمسة الحانية والحضن الدافئ بما لذلك من فوائد نفسية وجسدية وصحية، بل إن الحضن يكون في معظم الأحيان أهم من ممارسة الجنس.', 'الحُضن الدافئ..سر سعادة الروح وصحة الجسد!', 'يشهد العصر الحديث تراجعا مخيفا في التواصل الإنساني والجسدي بين الناس بشكل ملحوظ، ما يفقدنا اللمسة الحانية والحضن الدافئ بما لذلك من فوائد نفسية وجسدية وصحية، بل إن الحضن يكون في معظم الأحيان أهم من ممارسة الجنس.', '2016-02-10 14:41:00', 'http://www.dw.com/ar/الحُضن-الدافئ-سر-سعادة-الروح-وصحة-الجسد/a-19037611?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(211, 27, 'ناتو يدرس إمكانية التدخل ضد عصابات تهريب البشر في بحر إيجه', 'من الممكن أن يستخدم حلف شمال الأطلسي (ناتو) في المستقبل سفنه الحربية لمواجهة عصابات تهريب البشر في بحر إيجه. وتؤيد ألمانيا وتركيا هذه الفكرة، لكن لا زالت هناك أسئلة كثيرة بخصوصها تحتاج إلى إجابة.', 'ناتو يدرس إمكانية التدخل ضد عصابات تهريب البشر في بحر إيجه', 'من الممكن أن يستخدم حلف شمال الأطلسي (ناتو) في المستقبل سفنه الحربية لمواجهة عصابات تهريب البشر في بحر إيجه. وتؤيد ألمانيا وتركيا هذه الفكرة، لكن لا زالت هناك أسئلة كثيرة بخصوصها تحتاج إلى إجابة.', '2016-02-10 15:23:00', 'http://www.dw.com/ar/ناتو-يدرس-إمكانية-التدخل-ضد-عصابات-تهريب-البشر-في-بحر-إيجه/a-19041306?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-10'),
(212, 27, '"بوتين لا يبحث عن حرب عالمية مع الغرب"', 'يرى الباحث دانيل غيرلاخ أن التدخل العسكري الروسي لم يكن مفاجئا للمراقبين، ويقول في حوار مع DW عربية أن بوتين لا يريد خوض حرب عالمية مع الغرب، بل هو يبحث عن مجالات يمكن الاستفادة منها، ولا تشكل تهديدا مباشرا للغرب.', '"بوتين لا يبحث عن حرب عالمية مع الغرب"', 'يرى الباحث دانيل غيرلاخ أن التدخل العسكري الروسي لم يكن مفاجئا للمراقبين، ويقول في حوار مع DW عربية أن بوتين لا يريد خوض حرب عالمية مع الغرب، بل هو يبحث عن مجالات يمكن الاستفادة منها، ولا تشكل تهديدا مباشرا للغرب.', '2016-02-11 02:08:00', 'http://www.dw.com/ar/بوتين-لا-يبحث-عن-حرب-عالمية-مع-الغرب/a-19041282?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(213, 27, 'كأس ألمانيا- بايرن ميونيخ يكمل عقد المتأهلين للمربع الذهبي', 'أكمل بايرن ميونيخ عقد المتأهلين إلى نصف نهائي كأس ألمانيا بفوزه على بوخوم بثلاثة أهداف نظيفة. كما تأهل هيرتا برلين لنفس الدور لأول مرة منذ 35 عاما، ليلحق الفريقان بدورتموند وفيردر بريمن، اللذين حسما التأهل الثلاثاء.', 'كأس ألمانيا- بايرن ميونيخ يكمل عقد المتأهلين للمربع الذهبي', 'أكمل بايرن ميونيخ عقد المتأهلين إلى نصف نهائي كأس ألمانيا بفوزه على بوخوم بثلاثة أهداف نظيفة. كما تأهل هيرتا برلين لنفس الدور لأول مرة منذ 35 عاما، ليلحق الفريقان بدورتموند وفيردر بريمن، اللذين حسما التأهل الثلاثاء.', '2016-02-10 17:06:00', 'http://www.dw.com/ar/كأس-ألمانيا-بايرن-ميونيخ-يكمل-عقد-المتأهلين-للمربع-الذهبي/a-19041358?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(214, 27, 'مبعوث أمريكي: الضربات الروسية تعزز تمكين "داعش" في سوريا', 'عشية استضافة ميونيخ لمؤتمر حول سوريا حضت فرنسا وبريطانيا روسيا على وقف قصف حلب، بينما قال مبعوث أميركيي إن ما تفعله روسيا يعزز تمكين "داعش"، ولم يستبعد إسقاط بلاده مساعدات جوا لتخفيف حدة الأزمة الإنسانية في سوريا.', 'مبعوث أمريكي: الضربات الروسية تعزز تمكين "داعش" في سوريا', 'عشية استضافة ميونيخ لمؤتمر حول سوريا حضت فرنسا وبريطانيا روسيا على وقف قصف حلب، بينما قال مبعوث أميركيي إن ما تفعله روسيا يعزز تمكين "داعش"، ولم يستبعد إسقاط بلاده مساعدات جوا لتخفيف حدة الأزمة الإنسانية في سوريا.', '2016-02-10 16:47:00', 'http://www.dw.com/ar/مبعوث-أمريكي-الضربات-الروسية-تعزز-تمكين-داعش-في-سوريا/a-19041353?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(215, 27, 'تعرف على طرق استعمال الخردل المتعددة وفوائده', 'يمكن للخردل إضافة نكهة طيبة للطعام تناسب الكثير من الأذواق، بالإضافة إلى استخداماته الطبية كعلاج طبيعي، وخاصة في تسهيل عملية هضم الطعام وكمضاد للميكروبات.', 'تعرف على طرق استعمال الخردل المتعددة وفوائده', 'يمكن للخردل إضافة نكهة طيبة للطعام تناسب الكثير من الأذواق، بالإضافة إلى استخداماته الطبية كعلاج طبيعي، وخاصة في تسهيل عملية هضم الطعام وكمضاد للميكروبات.', '2016-02-10 15:59:00', 'http://www.dw.com/ar/تعرف-على-طرق-استعمال-الخردل-المتعددة-وفوائده/a-19041229?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(216, 27, 'مدافع لستر روبت هوت يطرق باب المانشافت - فهل يستجيب لوف؟', 'من خلال أدائه المتميز مع فريق ليستر سيتي هذا الموسم أصبح اسم المدافع روبرت هوت متداولا كأحد الخيارات التي قد يلجئ إليها المدير الفني للمنتخب الألماني يواخيم لتعويض الفراغ الذي تركه جيروم بواتينغ بسبب الإصابة.', 'مدافع لستر روبت هوت يطرق باب المانشافت - فهل يستجيب لوف؟', 'من خلال أدائه المتميز مع فريق ليستر سيتي هذا الموسم أصبح اسم المدافع روبرت هوت متداولا كأحد الخيارات التي قد يلجئ إليها المدير الفني للمنتخب الألماني يواخيم لتعويض الفراغ الذي تركه جيروم بواتينغ بسبب الإصابة.', '2016-02-10 15:36:00', 'http://www.dw.com/ar/مدافع-لستر-روبت-هوت-يطرق-باب-المانشافت-فهل-يستجيب-لوف؟/a-19041237?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(217, 27, 'أنباء عن سيطرة الأكراد على مطار عسكري في ريف حلب', 'يبدو أن الأكراد استفادوا بدورهم من الدعم الجوي الروسي، إذ تمكنوا من السيطرة على مطار منغ العسكري في ريف حلب والذي كانت المعارضة قد دحرت منه قوات الأسد في صيف 2013، وفق المرصد السوري لحقوق الإنسان.', 'أنباء عن سيطرة الأكراد على مطار عسكري في ريف حلب', 'يبدو أن الأكراد استفادوا بدورهم من الدعم الجوي الروسي، إذ تمكنوا من السيطرة على مطار منغ العسكري في ريف حلب والذي كانت المعارضة قد دحرت منه قوات الأسد في صيف 2013، وفق المرصد السوري لحقوق الإنسان.', '2016-02-11 03:34:00', 'http://www.dw.com/ar/أنباء-عن-سيطرة-الأكراد-على-مطار-عسكري-في-ريف-حلب/a-19041648?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(218, 27, 'الصليب الأحمر: أكثر من 50 ألف نازح بسبب الهجوم على حلب', 'تسبب الهجوم العسكري لنظام الأسد المدعوم بالطائرات الروسية في فرار نحو 50 ألف شخص من ديارهم، وفق الصليب الأحمر. ومنظمة أطباء بلا حدود تؤكد تعرض مستشفياتها في شمال سوريا للقصف من قبل مقاتلات روسية.', 'الصليب الأحمر: أكثر من 50 ألف نازح بسبب الهجوم على حلب', 'تسبب الهجوم العسكري لنظام الأسد المدعوم بالطائرات الروسية في فرار نحو 50 ألف شخص من ديارهم، وفق الصليب الأحمر. ومنظمة أطباء بلا حدود تؤكد تعرض مستشفياتها في شمال سوريا للقصف من قبل مقاتلات روسية.', '2016-02-11 03:26:00', 'http://www.dw.com/ar/الصليب-الأحمر-أكثر-من-50-ألف-نازح-بسبب-الهجوم-على-حلب/a-19041632?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(219, 27, 'الغرب يضغط على روسيا لوقف إطلاق النار في سوريا', 'كثف الغرب من ضغوطه على روسيا لوقف غاراتها الجوية في سوريا من أجل استئناف محادثات السلام في جنيف. وموسكو تشير إلى احتمال وقف إطلاق النار في مطلع الشهر المقبل وتقول إن غارات أمريكية وليست روسية هي التي قصفت حلب الأربعاء.', 'الغرب يضغط على روسيا لوقف إطلاق النار في سوريا', 'كثف الغرب من ضغوطه على روسيا لوقف غاراتها الجوية في سوريا من أجل استئناف محادثات السلام في جنيف. وموسكو تشير إلى احتمال وقف إطلاق النار في مطلع الشهر المقبل وتقول إن غارات أمريكية وليست روسية هي التي قصفت حلب الأربعاء.', '2016-02-11 03:09:00', 'http://www.dw.com/ar/الغرب-يضغط-على-روسيا-لوقف-إطلاق-النار-في-سوريا/a-19041625?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(220, 27, 'المدافع روبت هوت يطرق باب المانشافت - فهل من مستجيب؟', 'من خلال أدائه المتميز مع فريق ليستر سيتي هذا الموسم أصبح اسم المدافع روبرت هوت متداولا كأحد الخيارات التي قد يلجئ إليها المدير الفني للمنتخب الألماني يواخيم لتعويض الفراغ الذي تركه جيروم بواتينغ بسبب الإصابة.', 'المدافع روبت هوت يطرق باب المانشافت - فهل من مستجيب؟', 'من خلال أدائه المتميز مع فريق ليستر سيتي هذا الموسم أصبح اسم المدافع روبرت هوت متداولا كأحد الخيارات التي قد يلجئ إليها المدير الفني للمنتخب الألماني يواخيم لتعويض الفراغ الذي تركه جيروم بواتينغ بسبب الإصابة.', '2016-02-10 15:36:00', 'http://www.dw.com/ar/المدافع-روبت-هوت-يطرق-باب-المانشافت-فهل-من-مستجيب؟/a-19041237?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(221, 27, 'وثيقة: نـداء "كرامة الإنسان أمر لا يجوز المساس به"', 'وجهت شخصيات معروفة في ألمانيا بينها شخضيات دينية وقيادات نقابية ورياضية نداء يدعو إلى الانفتاح ومناهضة التعصب والعنف والكراهية. مؤسسة DW توثق النداء وتنشر نصه.', 'وثيقة: نـداء "كرامة الإنسان أمر لا يجوز المساس به"', 'وجهت شخصيات معروفة في ألمانيا بينها شخضيات دينية وقيادات نقابية ورياضية نداء يدعو إلى الانفتاح ومناهضة التعصب والعنف والكراهية. مؤسسة DW توثق النداء وتنشر نصه.', '2016-02-11 04:58:00', 'http://www.dw.com/ar/وثيقة-نـداء-كرامة-الإنسان-أمر-لا-يجوز-المساس-به/a-19041678?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(222, 27, 'هل تثبت صحة نظرية لآينشتاين بعد قرن على إعلانها؟', 'فرضية للعالم الفيزيائي الألماني الشهير ألبرت آينشتاين قبل نحو مائة عام أشارت إلى وجود موجات جاذبية في الكون تنقل الطاقة. العلماء توصلوا مؤخراً إلى اكتشافات جديدة قد تدعم هذه النظرية.', 'هل تثبت صحة نظرية لآينشتاين بعد قرن على إعلانها؟', 'فرضية للعالم الفيزيائي الألماني الشهير ألبرت آينشتاين قبل نحو مائة عام أشارت إلى وجود موجات جاذبية في الكون تنقل الطاقة. العلماء توصلوا مؤخراً إلى اكتشافات جديدة قد تدعم هذه النظرية.', '2016-02-11 06:03:00', 'http://www.dw.com/ar/هل-تثبت-صحة-نظرية-لآينشتاين-بعد-قرن-على-إعلانها؟/a-19036599?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(223, 27, 'رئيس اتحاد النقابات الألماني: ندعو إلى التحرك ضد الخطاب الشعبوي', 'في مقال نشره على موقع DW يشرح رئيس اتحاد النقابات الألماني راينر هوفمان أهداف تحالف جديد "تحالف من أجل الانفتاح والتضامن والديمقراطية ودولة القانون – وضد التعصب والكراهية والعنف" أصدر نداء يدعو إلى الانتفاح ومناهية العنف', 'رئيس اتحاد النقابات الألماني: ندعو إلى التحرك ضد الخطاب الشعبوي', 'في مقال نشره على موقع DW يشرح رئيس اتحاد النقابات الألماني راينر هوفمان أهداف تحالف جديد "تحالف من أجل الانفتاح والتضامن والديمقراطية ودولة القانون – وضد التعصب والكراهية والعنف" أصدر نداء يدعو إلى الانتفاح ومناهية العنف', '2016-02-11 06:00:00', 'http://www.dw.com/ar/رئيس-اتحاد-النقابات-الألماني-ندعو-إلى-التحرك-ضد-الخطاب-الشعبوي/a-19041315?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(224, 27, 'دراسة: أكثر من مليوني سوري بين قتيل وجريح جراء الحرب', 'الأمم المتحدة تحذر من حدوث مجاعة تهدد 120 ألف شخص في محافظة حمص بعدما انقطعت عنهم الإمدادات بسبب الهجوم السوري-الروسي. ودراسة تقول إن أكثر من 11 بالمائة من الشعب السوري قتل أو جرح منذ اندلاع الحرب قبل خمس سنوات.', 'دراسة: أكثر من مليوني سوري بين قتيل وجريح جراء الحرب', 'الأمم المتحدة تحذر من حدوث مجاعة تهدد 120 ألف شخص في محافظة حمص بعدما انقطعت عنهم الإمدادات بسبب الهجوم السوري-الروسي. ودراسة تقول إن أكثر من 11 بالمائة من الشعب السوري قتل أو جرح منذ اندلاع الحرب قبل خمس سنوات.', '2016-02-11 05:57:00', 'http://www.dw.com/ar/دراسة-أكثر-من-مليوني-سوري-بين-قتيل-وجريح-جراء-الحرب/a-19041988?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(225, 27, 'خبير ألماني: أوروبا قد تُجبر على التدخل عسكريا في ليبيا', 'في حال ما توسع نفوذ تنظيم "الدولة الإسلامية" في ليبيا، فإنه من واجب الاتحاد الأوروبي التدخل هناك عسكريا، كما قال رئيس مؤتمر الأمن الدولي في ميونيخ فولفغانغ إيشنغر.', 'خبير ألماني: أوروبا قد تُجبر على التدخل عسكريا في ليبيا', 'في حال ما توسع نفوذ تنظيم "الدولة الإسلامية" في ليبيا، فإنه من واجب الاتحاد الأوروبي التدخل هناك عسكريا، كما قال رئيس مؤتمر الأمن الدولي في ميونيخ فولفغانغ إيشنغر.', '2016-02-11 05:50:00', 'http://www.dw.com/ar/خبير-ألماني-أوروبا-قد-تُجبر-على-التدخل-عسكريا-في-ليبيا/a-19037801?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(226, 27, 'اجتماع دولي حاسم بميونيخ وسط توقعات متشائمة بشأن سوريا', 'تستضيف مدينة ميونيخ الألمانية اجتماع دوليا جديدا في محاولة لوقف الحرب في سوريا. يأتي ذلك وسط توقعات متشائمة بتحقيق أي نتائج ملموسة بسبب السياسة الروسية في النزاع السوري.', 'اجتماع دولي حاسم بميونيخ وسط توقعات متشائمة بشأن سوريا', 'تستضيف مدينة ميونيخ الألمانية اجتماع دوليا جديدا في محاولة لوقف الحرب في سوريا. يأتي ذلك وسط توقعات متشائمة بتحقيق أي نتائج ملموسة بسبب السياسة الروسية في النزاع السوري.', '2016-02-11 05:40:00', 'http://www.dw.com/ar/اجتماع-دولي-حاسم-بميونيخ-وسط-توقعات-متشائمة-بشأن-سوريا/a-19041840?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(227, 27, 'انطلاق البرليناله بمشاركة النجوم وبرنامج خاص باللاجئين', 'تنطلق اليوم الدور الـ66 لمهرجان برلين السينمائي بمشاركة كبار نجوم هوليود على غرار جورج كلوني، الذي من المقرر أن يحضر مع زوجته أمل. كما لم يغقل المهرجان على إدراج برنامج خاص باللاجئين.', 'انطلاق البرليناله بمشاركة النجوم وبرنامج خاص باللاجئين', 'تنطلق اليوم الدور الـ66 لمهرجان برلين السينمائي بمشاركة كبار نجوم هوليود على غرار جورج كلوني، الذي من المقرر أن يحضر مع زوجته أمل. كما لم يغقل المهرجان على إدراج برنامج خاص باللاجئين.', '2016-02-11 04:28:00', 'http://www.dw.com/ar/انطلاق-البرليناله-بمشاركة-النجوم-وبرنامج-خاص-باللاجئين/a-19041730?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(228, 27, 'وزيرة العمل تطالب بنصف مليار إضافية لتمويل اندماج اللاجئين', 'قالت وزيرة العمل الألمانية إنه لا يمكن إدماج مئات الآلاف من اللاجئين بدون أموال إضافية. وأوضحت أنها بحاجة ماسة لنصف مليار يورو إضافية في السنة. وأشارت الوزيرة إلى أنها باشرت المفاوضات بهذا الشأن.', 'وزيرة العمل تطالب بنصف مليار إضافية لتمويل اندماج اللاجئين', 'قالت وزيرة العمل الألمانية إنه لا يمكن إدماج مئات الآلاف من اللاجئين بدون أموال إضافية. وأوضحت أنها بحاجة ماسة لنصف مليار يورو إضافية في السنة. وأشارت الوزيرة إلى أنها باشرت المفاوضات بهذا الشأن.', '2016-02-11 06:39:00', 'http://www.dw.com/ar/وزيرة-العمل-تطالب-بنصف-مليار-إضافية-لتمويل-اندماج-اللاجئين/a-19042077?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(229, 27, 'ألمانيا: لم الشمل العائلي ممكن في الحالات الإنسانية القصوى', 'توصل وزيرا العدل والداخلية الألمانيان إلى اتفاق بشأن الخلاف حول لم الشمل العائلي للاجئين. وكان تشديد قانون اللجوء الأخير قد أقر تعليق لم الشمل العائلي للأطفال اللاجئين بدون صحبة الأبوين لمدة عامين.', 'ألمانيا: لم الشمل العائلي ممكن في الحالات الإنسانية القصوى', 'توصل وزيرا العدل والداخلية الألمانيان إلى اتفاق بشأن الخلاف حول لم الشمل العائلي للاجئين. وكان تشديد قانون اللجوء الأخير قد أقر تعليق لم الشمل العائلي للأطفال اللاجئين بدون صحبة الأبوين لمدة عامين.', '2016-02-11 08:48:00', 'http://www.dw.com/ar/ألمانيا-لم-الشمل-العائلي-ممكن-في-الحالات-الإنسانية-القصوى/a-19042529?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(230, 27, 'إردوغان يحذر من نفاد صبر تركيا بشأن الأزمة السورية', 'الرئيس التركي يطالب الأمم المتحدة بالتحرك لوقف ما وصفه "التطهير العرقي" في سوريا، مهددا بالتحرك "بما هو ضروري". كما جدد دعوته إلى إقامة مناطق آمنة في سوريا لإبقاء السوريين في بلادهم.', 'إردوغان يحذر من نفاد صبر تركيا بشأن الأزمة السورية', 'الرئيس التركي يطالب الأمم المتحدة بالتحرك لوقف ما وصفه "التطهير العرقي" في سوريا، مهددا بالتحرك "بما هو ضروري". كما جدد دعوته إلى إقامة مناطق آمنة في سوريا لإبقاء السوريين في بلادهم.', '2016-02-11 08:35:00', 'http://www.dw.com/ar/إردوغان-يحذر-من-نفاد-صبر-تركيا-بشأن-الأزمة-السورية/a-19042499?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11');
INSERT INTO `rss_feeds` (`id`, `rssWebsiteId`, `titleAR`, `descAR`, `titleGE`, `descGE`, `pubDate`, `url`, `image`, `isActive`, `addingDate`) VALUES
(231, 27, 'هل يهيمن الذكاء الاصطناعي على الأرض والبشر قريباً؟', 'مستقبل البشرية سيكون بيد الروبوتات والأجهزة الذكية! هكذا يتصور الكثير من العلماء مستقبلنا. لكن هل هذا صحيح؟ وهل يمكن للأجهزة التي صنعها الإنسان أن تتحكم بصانعها؟', 'هل يهيمن الذكاء الاصطناعي على الأرض والبشر قريباً؟', 'مستقبل البشرية سيكون بيد الروبوتات والأجهزة الذكية! هكذا يتصور الكثير من العلماء مستقبلنا. لكن هل هذا صحيح؟ وهل يمكن للأجهزة التي صنعها الإنسان أن تتحكم بصانعها؟', '2016-02-11 08:03:00', 'http://www.dw.com/ar/هل-يهيمن-الذكاء-الاصطناعي-على-الأرض-والبشر-قريباً؟/a-19031540?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(232, 27, 'ألمانيا: ارتفاع قوي في أعمال العنف من قبل اليمين المتطرف', 'كشفت سلطات الأمن الألمانية عن زيادة قوية في جنح اليمين المتطرف مثل الهجوم على دور إيواء اللاجئين. وغالبية أعمال العنف تُرتكب بدوافع كراهية الأجانب.', 'ألمانيا: ارتفاع قوي في أعمال العنف من قبل اليمين المتطرف', 'كشفت سلطات الأمن الألمانية عن زيادة قوية في جنح اليمين المتطرف مثل الهجوم على دور إيواء اللاجئين. وغالبية أعمال العنف تُرتكب بدوافع كراهية الأجانب.', '2016-02-11 07:35:00', 'http://www.dw.com/ar/ألمانيا-ارتفاع-قوي-في-أعمال-العنف-من-قبل-اليمين-المتطرف/a-19042203?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(233, 27, 'موسكو تبدى استعدادا لبحث وقف اطلاق النار في سوريا', 'موسكو تعرب -على لسان نائب وزير خارجيتها - عن استعدادها بحث وقف إطلاق النار في سوريا خلال مؤتمر ميونيخ الدولي، والذي تشترطه المعارضة السورية لاستئناف مفاوضات جنيف في الـ25 من فبراير/شباط الجاري.', 'موسكو تبدى استعدادا لبحث وقف اطلاق النار في سوريا', 'موسكو تعرب -على لسان نائب وزير خارجيتها - عن استعدادها بحث وقف إطلاق النار في سوريا خلال مؤتمر ميونيخ الدولي، والذي تشترطه المعارضة السورية لاستئناف مفاوضات جنيف في الـ25 من فبراير/شباط الجاري.', '2016-02-11 07:12:00', 'http://www.dw.com/ar/موسكو-تبدى-استعدادا-لبحث-وقف-اطلاق-النار-في-سوريا/a-19042076?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(234, 27, 'ما حقيقة "الخطأ رقم 53" في هواتف آيفون؟', 'عندما يظهر الخطأ "53" في هواتف آيفون، تتوقف هذه الأجهزة عن العمل. فما هو سر هذا "الخطأ" ولماذا لا تعده شركة "آبل" خطئاً؟', 'ما حقيقة "الخطأ رقم 53" في هواتف آيفون؟', 'عندما يظهر الخطأ "53" في هواتف آيفون، تتوقف هذه الأجهزة عن العمل. فما هو سر هذا "الخطأ" ولماذا لا تعده شركة "آبل" خطئاً؟', '2016-02-11 09:46:00', 'http://www.dw.com/ar/ما-حقيقة-الخطأ-رقم-53-في-هواتف-آيفون؟/a-19031358?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(235, 27, 'دول الناتو تشكل تحالفا لتتبع قوارب تهريب اللاجئين', 'تحالف عسكري بحري بقيادة ألمانيا سيبدأ بتتبع قوارب تهريب اللاجئين في بحر إيجة، من أجل مساعدة السلطات التركية في مكافحتها لمهربي البشر. هذا التحالف تكون بعد موافقة وزراء دول حلف الناتو على العملية التي ستنطلق قريبا.', 'دول الناتو تشكل تحالفا لتتبع قوارب تهريب اللاجئين', 'تحالف عسكري بحري بقيادة ألمانيا سيبدأ بتتبع قوارب تهريب اللاجئين في بحر إيجة، من أجل مساعدة السلطات التركية في مكافحتها لمهربي البشر. هذا التحالف تكون بعد موافقة وزراء دول حلف الناتو على العملية التي ستنطلق قريبا.', '2016-02-11 09:43:00', 'http://www.dw.com/ar/دول-الناتو-تشكل-تحالفا-لتتبع-قوارب-تهريب-اللاجئين/a-19042734?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(236, 27, 'محاكمة المتهمين بتهريب الطفل ايلان أثناء رحلة موته', 'بعد أشهر من مقتل الطفل السوري الصغير ايلان والعثور على جثته على شاطئ بحر إيجة، انطلقت محاكمة رجلين متهمين بتهريب البشر، في عملية أسفرت يومها عن مقتل الطفل ايلان.', 'محاكمة المتهمين بتهريب الطفل ايلان أثناء رحلة موته', 'بعد أشهر من مقتل الطفل السوري الصغير ايلان والعثور على جثته على شاطئ بحر إيجة، انطلقت محاكمة رجلين متهمين بتهريب البشر، في عملية أسفرت يومها عن مقتل الطفل ايلان.', '2016-02-11 09:20:00', 'http://www.dw.com/ar/محاكمة-المتهمين-بتهريب-الطفل-ايلان-أثناء-رحلة-موته/a-19042689?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(237, 27, 'ميركل تتعهد بتقديم مزيد من الدعم الألماني للعراق', 'المستشارة الألمانية أنغيلا ميركل تتعهد لرئيس الحكومة العراقية بتقديم الدعم للعراق "حتى لا يضطر العراقيون لمغادرة بلادهم". كما شددت ميركل على ضرورة إحلال السلام في سوريا من أجل سلام المنطقة بأسرها.', 'ميركل تتعهد بتقديم مزيد من الدعم الألماني للعراق', 'المستشارة الألمانية أنغيلا ميركل تتعهد لرئيس الحكومة العراقية بتقديم الدعم للعراق "حتى لا يضطر العراقيون لمغادرة بلادهم". كما شددت ميركل على ضرورة إحلال السلام في سوريا من أجل سلام المنطقة بأسرها.', '2016-02-11 09:16:00', 'http://www.dw.com/ar/ميركل-تتعهد-بتقديم-مزيد-من-الدعم-الألماني-للعراق/a-19042664?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(238, 27, 'عالم المخابرات - ثلاجتك تتجسس عليك!', 'بات في الإمكان اقتناء ثلاجة رقمية ومصابيح رقمية وجهاز تسخين ماء رقمي. لكنها جميعاً قد تصبح جواسيس على مالكيها، بحسب ما كشف عنه أحد مدراء الاستخبارات الأمريكية لمجلة "نيوزويك".', 'عالم المخابرات - ثلاجتك تتجسس عليك!', 'بات في الإمكان اقتناء ثلاجة رقمية ومصابيح رقمية وجهاز تسخين ماء رقمي. لكنها جميعاً قد تصبح جواسيس على مالكيها، بحسب ما كشف عنه أحد مدراء الاستخبارات الأمريكية لمجلة "نيوزويك".', '2016-02-11 09:06:00', 'http://www.dw.com/ar/عالم-المخابرات-ثلاجتك-تتجسس-عليك/a-19042483?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(239, 27, 'عودة أوزيل للتألق ترفع أسهمه في بورصة المستديرة', 'الموسم الحالي للدولي الألماني مسعود أوزيل يعتبر الأفضل له منذ التحاقه بالدوري الإنجليزي. صانع ألعاب أرسنال يبدع ويسجل وهو ما أدى إلى ارتفاع قيمته في سوق الانتقالات ليتحول إلى أحد أغلى اللاعبين في "البريمير ليغ".', 'عودة أوزيل للتألق ترفع أسهمه في بورصة المستديرة', 'الموسم الحالي للدولي الألماني مسعود أوزيل يعتبر الأفضل له منذ التحاقه بالدوري الإنجليزي. صانع ألعاب أرسنال يبدع ويسجل وهو ما أدى إلى ارتفاع قيمته في سوق الانتقالات ليتحول إلى أحد أغلى اللاعبين في "البريمير ليغ".', '2016-02-11 10:41:00', 'http://www.dw.com/ar/عودة-أوزيل-للتألق-ترفع-أسهمه-في-بورصة-المستديرة/a-19042853?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(240, 27, 'السعودية - معلم يقتل 6 موظفين في مكتب تعليمي في جازان', 'مواطن سعودي يقدم على قتل ستة أشخاص، مستخدما رشاشا آليا، كما أصاب شخصين آخرين، في هجوم على أحد المكاتب الخاصة بالتربية والتعليم في منطقة جازان جنوب غرب المملكة. دوافع عملية القتل مازالت غير معلومة بحسب الشرطة.', 'السعودية - معلم يقتل 6 موظفين في مكتب تعليمي في جازان', 'مواطن سعودي يقدم على قتل ستة أشخاص، مستخدما رشاشا آليا، كما أصاب شخصين آخرين، في هجوم على أحد المكاتب الخاصة بالتربية والتعليم في منطقة جازان جنوب غرب المملكة. دوافع عملية القتل مازالت غير معلومة بحسب الشرطة.', '2016-02-11 10:28:00', 'http://www.dw.com/ar/السعودية-معلم-يقتل-6-موظفين-في-مكتب-تعليمي-في-جازان/a-19042975?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-11'),
(241, 27, 'مؤتمر ميونيخ للأمن: نهاية حقبة من الاستقرار العالمي؟', 'تتوجه الأنظار في مؤتمر ميونيخ للأمن إلى ما ستسفر عنه المحادثات حول الأزمة السورية التي تشكل الموضوع الرئيس للمؤتمر هذا العام، فيما توقع التقرير الذي يسبق انعقاد المؤتمر بروز اضطرابات في مناطق جديدة من العالم.', 'مؤتمر ميونيخ للأمن: نهاية حقبة من الاستقرار العالمي؟', 'تتوجه الأنظار في مؤتمر ميونيخ للأمن إلى ما ستسفر عنه المحادثات حول الأزمة السورية التي تشكل الموضوع الرئيس للمؤتمر هذا العام، فيما توقع التقرير الذي يسبق انعقاد المؤتمر بروز اضطرابات في مناطق جديدة من العالم.', '2016-02-12 02:50:00', 'http://www.dw.com/ar/مؤتمر-ميونيخ-للأمن-نهاية-حقبة-من-الاستقرار-العالمي؟/a-19036347?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(242, 27, 'أولاند يدعو روسيا إلى "وقف عملياتها" الداعمة لنظام الأسد', 'دعا الرئيس الفرنسي فرانسوا أولاند روسيا للتوقف عن إيذاء المدنيين في سوريا، مجددا الدعوات للرئيس السوري بشار الأسد للرحيل عن السلطة. بدورها اتهمت الولايات المتحدة روسيا بـ"تأجيج" النزاع في سوريا عبر دعمها لقوات النظام.', 'أولاند يدعو روسيا إلى "وقف عملياتها" الداعمة لنظام الأسد', 'دعا الرئيس الفرنسي فرانسوا أولاند روسيا للتوقف عن إيذاء المدنيين في سوريا، مجددا الدعوات للرئيس السوري بشار الأسد للرحيل عن السلطة. بدورها اتهمت الولايات المتحدة روسيا بـ"تأجيج" النزاع في سوريا عبر دعمها لقوات النظام.', '2016-02-11 16:26:00', 'http://www.dw.com/ar/أولاند-يدعو-روسيا-إلى-وقف-عملياتها-الداعمة-لنظام-الأسد/a-19043701?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(243, 27, 'ليفاندوفسكي هداف بايرن الأول ومطمع أقوى الأندية الأوروبية', 'من خلال تسجيله لهدفين في شباك بوخوم وقيادة فريقه للتأهل لنهائي كأس ألمانيا، أكد ليفاندوفسكي من جديد على أنه هداف بايرن ميونيخ الأول. ورغم العروض التي يتلقاها اللاعب من أندية كبيرة، فإن إدارة بايرن لا تنوي التخلي عنه.', 'ليفاندوفسكي هداف بايرن الأول ومطمع أقوى الأندية الأوروبية', 'من خلال تسجيله لهدفين في شباك بوخوم وقيادة فريقه للتأهل لنهائي كأس ألمانيا، أكد ليفاندوفسكي من جديد على أنه هداف بايرن ميونيخ الأول. ورغم العروض التي يتلقاها اللاعب من أندية كبيرة، فإن إدارة بايرن لا تنوي التخلي عنه.', '2016-02-11 15:27:00', 'http://www.dw.com/ar/ليفاندوفسكي-هداف-بايرن-الأول-ومطمع-أقوى-الأندية-الأوروبية/a-19043271?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(244, 27, 'ألمانيا - انتقادات لمشروع القانون الخاص بالأطفال اللاجئين', 'طالب وزير الدولة لمكافحة الاستغلال والمجلس المركزي للمسلمين بإدخال تحسينات على "الحزمة الثانية" من قانون اللجوء، من أجل توفير حماية أفضل للأطفال اللاجئين.', 'ألمانيا - انتقادات لمشروع القانون الخاص بالأطفال اللاجئين', 'طالب وزير الدولة لمكافحة الاستغلال والمجلس المركزي للمسلمين بإدخال تحسينات على "الحزمة الثانية" من قانون اللجوء، من أجل توفير حماية أفضل للأطفال اللاجئين.', '2016-02-11 14:43:00', 'http://www.dw.com/ar/ألمانيا-انتقادات-لمشروع-القانون-الخاص-بالأطفال-اللاجئين/a-19043620?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(245, 27, 'مدفيديف يتحدث عن احتمال نشوب "حرب عالمية" داخل سوريا', 'حذر رئيس الوزراء الروسي مدفيديف من خطر نشوب "حرب عالمية جديدة"، في حال حصل هجوم بري خارجي في سوريا، ولم تتمكن الدول المعنية من "إرغام جميع الأطراف على الجلوس إلى طاولة المفاوضات".', 'مدفيديف يتحدث عن احتمال نشوب "حرب عالمية" داخل سوريا', 'حذر رئيس الوزراء الروسي مدفيديف من خطر نشوب "حرب عالمية جديدة"، في حال حصل هجوم بري خارجي في سوريا، ولم تتمكن الدول المعنية من "إرغام جميع الأطراف على الجلوس إلى طاولة المفاوضات".', '2016-02-11 14:41:00', 'http://www.dw.com/ar/مدفيديف-يتحدث-عن-احتمال-نشوب-حرب-عالمية-داخل-سوريا/a-19043653?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(246, 27, 'تفاصيل وخبايا عالم تهريب اللاجئين من تركيا إلى أوروبا', 'قرر حلف شمال الأطلسي (ناتو) إرسال قوة بحرية إلى بحر إيجه للإسهام في المراقبة وجمع المعلومات في إطار التصدي لشبكات تهريب البشر. التقرير التالي يوضح كيف تعمل هذه الشبكات إلى حد الآن على نقل اللاجئين من تركيا إلى اليونان.', 'تفاصيل وخبايا عالم تهريب اللاجئين من تركيا إلى أوروبا', 'قرر حلف شمال الأطلسي (ناتو) إرسال قوة بحرية إلى بحر إيجه للإسهام في المراقبة وجمع المعلومات في إطار التصدي لشبكات تهريب البشر. التقرير التالي يوضح كيف تعمل هذه الشبكات إلى حد الآن على نقل اللاجئين من تركيا إلى اليونان.', '2016-02-11 14:07:00', 'http://www.dw.com/ar/تفاصيل-وخبايا-عالم-تهريب-اللاجئين-من-تركيا-إلى-أوروبا/a-19038633?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(247, 27, 'شتاينماير: لقاء ميونيخ هام لإنقاذ مستقبل المحادثات السورية', 'أعرب وزير الخارجية الألماني فرانك فالتر شتاينماير عن أمله في أن تحقق المباحثات التي ستجري في ميونيخ بشأن سوريا انفراجة في الوضع هناك. فيما قررت السعودية زيادة مساهماتها العسكرية في الحملة ضد لتنظيم "الدولة الإسلامية".', 'شتاينماير: لقاء ميونيخ هام لإنقاذ مستقبل المحادثات السورية', 'أعرب وزير الخارجية الألماني فرانك فالتر شتاينماير عن أمله في أن تحقق المباحثات التي ستجري في ميونيخ بشأن سوريا انفراجة في الوضع هناك. فيما قررت السعودية زيادة مساهماتها العسكرية في الحملة ضد لتنظيم "الدولة الإسلامية".', '2016-02-11 13:16:00', 'http://www.dw.com/ar/شتاينماير-لقاء-ميونيخ-هام-لإنقاذ-مستقبل-المحادثات-السورية/a-19043529?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(248, 27, 'اكتشاف القرن الفيزيائي - علماء ينجحون في رصد موجات الجاذبية لأول مرة', 'صرح باحثون أمريكيون أنهم اكتشفوا بشكل مباشر موجات الجاذبية التي وصفها الفيزيائي ألبرت أينشتاين لأول مرة قبل 100 عام بأنها "تموّجات صغيرة في نسيج الفضاء".', 'اكتشاف القرن الفيزيائي - علماء ينجحون في رصد موجات الجاذبية لأول مرة', 'صرح باحثون أمريكيون أنهم اكتشفوا بشكل مباشر موجات الجاذبية التي وصفها الفيزيائي ألبرت أينشتاين لأول مرة قبل 100 عام بأنها "تموّجات صغيرة في نسيج الفضاء".', '2016-02-11 12:53:00', 'http://www.dw.com/ar/اكتشاف-القرن-الفيزيائي-علماء-ينجحون-في-رصد-موجات-الجاذبية-لأول-مرة/a-19043521?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(249, 27, 'جمال الصورة ورشاقتها قد تكون خدعة!', 'يتزايد عدد الصور التي تضخها وسائل التواصل الاجتماعي وموقع "إنستغرام" تحديداً، لدرجة أن الحقائق باتت تختفي خلف خداع العدسات وبرامج التحرير والرتوش. وهكذا يختفي القبيح ويظهر الجميل أو العكس، حسب مصلحة صاحب أو صاحبة الصورة.', 'جمال الصورة ورشاقتها قد تكون خدعة!', 'يتزايد عدد الصور التي تضخها وسائل التواصل الاجتماعي وموقع "إنستغرام" تحديداً، لدرجة أن الحقائق باتت تختفي خلف خداع العدسات وبرامج التحرير والرتوش. وهكذا يختفي القبيح ويظهر الجميل أو العكس، حسب مصلحة صاحب أو صاحبة الصورة.', '2016-02-11 12:25:00', 'http://www.dw.com/ar/جمال-الصورة-ورشاقتها-قد-تكون-خدعة/a-19042897?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(250, 27, 'روسيا تقترح وقفا لإطلاق النار في سوريا وتنتظر رد الغرب', 'قدمت روسيا عرضا لوقف إطلاق نار في سوريا، وذلك قبيل اجتماع دولي مهم يعقد في ميونيخ بهدف العمل على إنقاذ عملية المفاوضات التي انطلقت في جنيف والسعي لوقف تدفق المهاجرين إلى أوروبا هربا من الحرب.', 'روسيا تقترح وقفا لإطلاق النار في سوريا وتنتظر رد الغرب', 'قدمت روسيا عرضا لوقف إطلاق نار في سوريا، وذلك قبيل اجتماع دولي مهم يعقد في ميونيخ بهدف العمل على إنقاذ عملية المفاوضات التي انطلقت في جنيف والسعي لوقف تدفق المهاجرين إلى أوروبا هربا من الحرب.', '2016-02-11 11:06:00', 'http://www.dw.com/ar/روسيا-تقترح-وقفا-لإطلاق-النار-في-سوريا-وتنتظر-رد-الغرب/a-19043107?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(251, 27, 'الصدمة الدماغية الرَّضِية تزيد من احتمالات الانتحار', 'ذكرت دراسة طبية حديثة أن الإصابة بالصدمة الدماغية الرَّضِية ترفع احتمالية الانتحار إلى مستويات خطيرة. ويتجه الأطباء إلى تخمين خاطئ لمخاطر الإصابة بهذا النوع من الصدمات بسبب اختفاء بعض الأعراض بعد الإصابة بها.', 'الصدمة الدماغية الرَّضِية تزيد من احتمالات الانتحار', 'ذكرت دراسة طبية حديثة أن الإصابة بالصدمة الدماغية الرَّضِية ترفع احتمالية الانتحار إلى مستويات خطيرة. ويتجه الأطباء إلى تخمين خاطئ لمخاطر الإصابة بهذا النوع من الصدمات بسبب اختفاء بعض الأعراض بعد الإصابة بها.', '2016-02-11 11:02:00', 'http://www.dw.com/ar/الصدمة-الدماغية-الرَّضِية-تزيد-من-احتمالات-الانتحار/a-19041319?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(252, 27, 'تألق أوزيل مع أرسنال يرفع قيمته في بورصة المستديرة', 'الموسم الحالي للدولي الألماني مسعود أوزيل يعتبر الأفضل له منذ التحاقه بالدوري الإنجليزي. صانع ألعاب أرسنال يبدع ويسجل وهو ما أدى إلى ارتفاع قيمته في سوق الانتقالات ليتحول إلى أحد أغلى اللاعبين في "البريمير ليغ".', 'تألق أوزيل مع أرسنال يرفع قيمته في بورصة المستديرة', 'الموسم الحالي للدولي الألماني مسعود أوزيل يعتبر الأفضل له منذ التحاقه بالدوري الإنجليزي. صانع ألعاب أرسنال يبدع ويسجل وهو ما أدى إلى ارتفاع قيمته في سوق الانتقالات ليتحول إلى أحد أغلى اللاعبين في "البريمير ليغ".', '2016-02-11 10:41:00', 'http://www.dw.com/ar/تألق-أوزيل-مع-أرسنال-يرفع-قيمته-في-بورصة-المستديرة/a-19042853?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(253, 27, 'المخابرات الأمريكية: تنظيم "داعش" استخدم أسلحة كيميائية', 'الاستخبارات المركزية الأمريكية تؤكد بأن لديها أدلة على أن "داعش" استخدم أسلحة كيمائية في عملياته القتالية، مشيرة إلى احتمال أن يكون الأخير قادرا على صنع كميات معينة من هذه الأسلحة قد يصدرها إلى الغرب لتحقيق مكاسب مالية.', 'المخابرات الأمريكية: تنظيم "داعش" استخدم أسلحة كيميائية', 'الاستخبارات المركزية الأمريكية تؤكد بأن لديها أدلة على أن "داعش" استخدم أسلحة كيمائية في عملياته القتالية، مشيرة إلى احتمال أن يكون الأخير قادرا على صنع كميات معينة من هذه الأسلحة قد يصدرها إلى الغرب لتحقيق مكاسب مالية.', '2016-02-12 03:33:00', 'http://www.dw.com/ar/المخابرات-الأمريكية-تنظيم-داعش-استخدم-أسلحة-كيميائية/a-19043987?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(254, 27, 'ألمانيا ـ تزايد القلق بشأن التمييز ضد اللاجئين المسيحيين', 'تتوالى التقارير حول حالات التمييز التي تستهدف الأقليات المسيحية في مآوي استقبال اللاجئين في ألمانيا، فهل يتعلق الأمر بحالات معزولة أم بظاهرة مقلقة، في وقت يظل فيه إحداث مآوي حسب الانتماء الديني موضوع خلاف وجدل.', 'ألمانيا ـ تزايد القلق بشأن التمييز ضد اللاجئين المسيحيين', 'تتوالى التقارير حول حالات التمييز التي تستهدف الأقليات المسيحية في مآوي استقبال اللاجئين في ألمانيا، فهل يتعلق الأمر بحالات معزولة أم بظاهرة مقلقة، في وقت يظل فيه إحداث مآوي حسب الانتماء الديني موضوع خلاف وجدل.', '2016-02-12 03:11:00', 'http://www.dw.com/ar/ألمانيا-ـ-تزايد-القلق-بشأن-التمييز-ضد-اللاجئين-المسيحيين/a-19043473?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(255, 27, 'القوى الكبرى توافق على خطة لوقف العمليات العسكرية في سوريا', 'اتفقت القوى الكبرى اليوم الجمعة في مدينة ميونيخ الألمانية على خطة طموحة لوقف المعارك في الحرب الدائرة في سوريا خلال أسبوع وتسريع عملية إيصال المساعدات الانسانية إلى المدنيين داخل البلاد.', 'القوى الكبرى توافق على خطة لوقف العمليات العسكرية في سوريا', 'اتفقت القوى الكبرى اليوم الجمعة في مدينة ميونيخ الألمانية على خطة طموحة لوقف المعارك في الحرب الدائرة في سوريا خلال أسبوع وتسريع عملية إيصال المساعدات الانسانية إلى المدنيين داخل البلاد.', '2016-02-12 03:08:00', 'http://www.dw.com/ar/القوى-الكبرى-توافق-على-خطة-لوقف-العمليات-العسكرية-في-سوريا/a-19043967?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-12'),
(256, 27, 'اللاجئون القاصرون وتأثير إلغاء حق لم الشمل على اندماجهم', 'توصل وزيرا العدل والداخلية الألمانيان إلى اتفاق بشأن الخلاف حول لم الشمل العائلي للاجئين. وكان تشديد قانون اللجوء الأخير قد أقر تعليق لم الشمل العائلي لمدة عامين للاجئين القاصرين الذين أتوا إلى ألمانيا بدون ذويهم .', 'اللاجئون القاصرون وتأثير إلغاء حق لم الشمل على اندماجهم', 'توصل وزيرا العدل والداخلية الألمانيان إلى اتفاق بشأن الخلاف حول لم الشمل العائلي للاجئين. وكان تشديد قانون اللجوء الأخير قد أقر تعليق لم الشمل العائلي لمدة عامين للاجئين القاصرين الذين أتوا إلى ألمانيا بدون ذويهم .', '2016-02-13 01:52:00', 'http://www.dw.com/ar/اللاجئون-القاصرون-وتأثير-إلغاء-حق-لم-الشمل-على-اندماجهم/a-19041877?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(257, 27, 'واشنطن: الأسد واهم إذا اعتقد أن هناك حلا عسكريا في سوريا', 'في أول رد فعل لها على لقاء الأسد مع فرانس برس وتصميمه على الاستمرار في العمليات العسكرية ضد المعارضة، قالت واشنطن إنه "واهم" بمراهنته على الحل العسكري. أما البنتاغون فأكد استمرار العمليات ضد "داعش" رغم اتفاق ميونيخ.', 'واشنطن: الأسد واهم إذا اعتقد أن هناك حلا عسكريا في سوريا', 'في أول رد فعل لها على لقاء الأسد مع فرانس برس وتصميمه على الاستمرار في العمليات العسكرية ضد المعارضة، قالت واشنطن إنه "واهم" بمراهنته على الحل العسكري. أما البنتاغون فأكد استمرار العمليات ضد "داعش" رغم اتفاق ميونيخ.', '2016-02-12 17:16:00', 'http://www.dw.com/ar/واشنطن-الأسد-واهم-إذا-اعتقد-أن-هناك-حلا-عسكريا-في-سوريا/a-19046004?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(258, 27, 'إسرائيل تنهي تجميدها لدور الاتحاد الأوروبي في عملية السلام', 'عقد رئيس الوزراء الإسرائيلي بنيامين نتانياهو اجتماعا مع وزيرة خارجية الاتحاد الأوروبي فيدريكا موغيريني، بحسب وزارة الخارجية، منهيا بذلك تجميد إسرائيل لدور الاتحاد في عملية السلام بين إسرائيل والفلسطينيين.', 'إسرائيل تنهي تجميدها لدور الاتحاد الأوروبي في عملية السلام', 'عقد رئيس الوزراء الإسرائيلي بنيامين نتانياهو اجتماعا مع وزيرة خارجية الاتحاد الأوروبي فيدريكا موغيريني، بحسب وزارة الخارجية، منهيا بذلك تجميد إسرائيل لدور الاتحاد في عملية السلام بين إسرائيل والفلسطينيين.', '2016-02-12 15:20:00', 'http://www.dw.com/ar/إسرائيل-تنهي-تجميدها-لدور-الاتحاد-الأوروبي-في-عملية-السلام/a-19045916?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(259, 27, 'المخابرات الألمانية: داعش يحاول التسلل بين اللاجئين', 'أعرب رئيس هيئة حماية الدستور في ألمانيا هانس غيورغ ماسين عن قناعته بوجود إستراتيجية واضحة لتنظيم "داعش" الإرهابي تكمن في التسلل بين جموع اللاجئين إلى أوروبا. وأشار ماسين إلى أن التنظيم يعمل على تشويه صورة اللاجئين.', 'المخابرات الألمانية: داعش يحاول التسلل بين اللاجئين', 'أعرب رئيس هيئة حماية الدستور في ألمانيا هانس غيورغ ماسين عن قناعته بوجود إستراتيجية واضحة لتنظيم "داعش" الإرهابي تكمن في التسلل بين جموع اللاجئين إلى أوروبا. وأشار ماسين إلى أن التنظيم يعمل على تشويه صورة اللاجئين.', '2016-02-12 14:39:00', 'http://www.dw.com/ar/المخابرات-الألمانية-داعش-يحاول-التسلل-بين-اللاجئين/a-19045893?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(260, 27, 'عارضة أزياء تأسر قلب الدولي ماركو رويس', 'النجاح الحالي الذي يمر به لاعب دورتموند ماركو رويس لا يقتصرعلى الجانب الرياضي فقط بل يشمل أيضا الجانب العاطفي، إذ يعيش الدولي الألماني قصة حب جديدة بطلتها عارضة أزياء ألمانية.', 'عارضة أزياء تأسر قلب الدولي ماركو رويس', 'النجاح الحالي الذي يمر به لاعب دورتموند ماركو رويس لا يقتصرعلى الجانب الرياضي فقط بل يشمل أيضا الجانب العاطفي، إذ يعيش الدولي الألماني قصة حب جديدة بطلتها عارضة أزياء ألمانية.', '2016-02-12 13:53:00', 'http://www.dw.com/ar/عارضة-أزياء-تأسر-قلب-الدولي-ماركو-رويس/a-19045732?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(261, 27, 'دراسة: آدم يبحث عن حواء ذكية لا جميلة كشريكة حياة', 'يبدو أن الاعتقاد السائد أن الرجال مبرمجون بيولوجيا في بحثهم عن شريكة الحياة وأن الجمال والمظهر الأنثوي الأكثر أهمية ضمن أولوياتهم، لم يعد صحيحا. إذ أظهرت دراسة حديثة أن المعايير الحديثة أصبحت مختلفة حاليا.', 'دراسة: آدم يبحث عن حواء ذكية لا جميلة كشريكة حياة', 'يبدو أن الاعتقاد السائد أن الرجال مبرمجون بيولوجيا في بحثهم عن شريكة الحياة وأن الجمال والمظهر الأنثوي الأكثر أهمية ضمن أولوياتهم، لم يعد صحيحا. إذ أظهرت دراسة حديثة أن المعايير الحديثة أصبحت مختلفة حاليا.', '2016-02-12 13:36:00', 'http://www.dw.com/ar/دراسة-آدم-يبحث-عن-حواء-ذكية-لا-جميلة-كشريكة-حياة/a-19044944?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(262, 27, 'ميونيخ تنتظر مصافحة لم تأت حتى الآن', 'يقود وزير الخارجية الإيرانية محمد جواد ظريف تحركا دبلوماسيا ناعما على هامش مؤتمر الأمن العالمي في ميونيخ، مركزا على أزمات العالم العربي، لكن متابعي المشهد في ميونيخ ينتظرون منه مصافحة لخصم لدود ولم تأت حتى الآن.', 'ميونيخ تنتظر مصافحة لم تأت حتى الآن', 'يقود وزير الخارجية الإيرانية محمد جواد ظريف تحركا دبلوماسيا ناعما على هامش مؤتمر الأمن العالمي في ميونيخ، مركزا على أزمات العالم العربي، لكن متابعي المشهد في ميونيخ ينتظرون منه مصافحة لخصم لدود ولم تأت حتى الآن.', '2016-02-12 13:11:00', 'http://www.dw.com/ar/ميونيخ-تنتظر-مصافحة-لم-تأت-حتى-الآن/a-19045834?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(263, 27, 'وزير خارجية السعودية: لا يمكن هزيمة "داعش" إلا إذا رحل الأسد', 'قال وزير الخارجية السعودي عادل الجبير إنه لا يمكن هزيمة تنظيم "داعش" إلا إذا أزيح الرئيس السوري بشار الأسد عن السلطة، مضيفا أن هذا الهدف سيتحقق في نهاية المطاف. وأشار الجبير إلى أن السعودية تدخلت في اليمن "لمنع انهياره".', 'وزير خارجية السعودية: لا يمكن هزيمة "داعش" إلا إذا رحل الأسد', 'قال وزير الخارجية السعودي عادل الجبير إنه لا يمكن هزيمة تنظيم "داعش" إلا إذا أزيح الرئيس السوري بشار الأسد عن السلطة، مضيفا أن هذا الهدف سيتحقق في نهاية المطاف. وأشار الجبير إلى أن السعودية تدخلت في اليمن "لمنع انهياره".', '2016-02-12 12:51:00', 'http://www.dw.com/ar/وزير-خارجية-السعودية-لا-يمكن-هزيمة-داعش-إلا-إذا-رحل-الأسد/a-19045807?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(264, 27, 'ذكاء اينشتاين.. لغز حير العلماء مثل نظرياته', 'يدرس العلماء منذ أكثر من 60 عاما سبب ذكاء الفيزيائي الألماني ألبرت اينشتاين، بسبب إبداعه العلمي الكبير الذي حيّر العالم. العلماء يعتقدون أنهم توصلوا بالفعل إلى تفسير طبي يفسر ذكاء اينشتاين الخارق.', 'ذكاء اينشتاين.. لغز حير العلماء مثل نظرياته', 'يدرس العلماء منذ أكثر من 60 عاما سبب ذكاء الفيزيائي الألماني ألبرت اينشتاين، بسبب إبداعه العلمي الكبير الذي حيّر العالم. العلماء يعتقدون أنهم توصلوا بالفعل إلى تفسير طبي يفسر ذكاء اينشتاين الخارق.', '2016-02-12 11:54:00', 'http://www.dw.com/ar/ذكاء-اينشتاين-لغز-حير-العلماء-مثل-نظرياته/a-19045432?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(265, 27, 'الجيش الألماني سيؤهل لاجئين سوريين لإعادة إعمار بلادهم', 'يعتزم الجيش الألماني تدريب لاجئين سوريين على إعادة إعمار سوريا عقب انتهاء الحرب هناك. وقالت وزيرة الدفاع الألمانية إن التدريب سيكون في مجالات فنية وخدمية عديدة، مشيرة إلى إمكانية تدريب الجيش السوري أيضا.', 'الجيش الألماني سيؤهل لاجئين سوريين لإعادة إعمار بلادهم', 'يعتزم الجيش الألماني تدريب لاجئين سوريين على إعادة إعمار سوريا عقب انتهاء الحرب هناك. وقالت وزيرة الدفاع الألمانية إن التدريب سيكون في مجالات فنية وخدمية عديدة، مشيرة إلى إمكانية تدريب الجيش السوري أيضا.', '2016-02-12 11:42:00', 'http://www.dw.com/ar/الجيش-الألماني-سيؤهل-لاجئين-سوريين-لإعادة-إعمار-بلادهم/a-19045537?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(266, 27, 'موجات الجاذبية.. 6 أشياء تحتاج لمعرفتها', 'نجح علماء أمريكيون بإثبات وجود موجات الجاذبية. حدث مثير، لأنهم تمكنوا وللمرة الأولى من البرهنة على صحة نظرية آينشتاين، التي وضعها قبل مائة عام. هنا أهم الحقائق عن الجاذبية.', 'موجات الجاذبية.. 6 أشياء تحتاج لمعرفتها', 'نجح علماء أمريكيون بإثبات وجود موجات الجاذبية. حدث مثير، لأنهم تمكنوا وللمرة الأولى من البرهنة على صحة نظرية آينشتاين، التي وضعها قبل مائة عام. هنا أهم الحقائق عن الجاذبية.', '2016-02-12 11:39:00', 'http://www.dw.com/ar/موجات-الجاذبية-6-أشياء-تحتاج-لمعرفتها/a-19045235?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(267, 27, 'ميركل: تركيا ستحصل على دعم أكبر إذا أوقفت الهجرة غير الشرعية', 'كشفت المستشارة الألمانية أنغيلا ميركل عن استعداد دول في الاتحاد الأوروبي لاستقبال المزيد من اللاجئين من تركيا في حال تمكنت أنقرة من الحد من الهجرة غير الشرعية بصورة أفضل.', 'ميركل: تركيا ستحصل على دعم أكبر إذا أوقفت الهجرة غير الشرعية', 'كشفت المستشارة الألمانية أنغيلا ميركل عن استعداد دول في الاتحاد الأوروبي لاستقبال المزيد من اللاجئين من تركيا في حال تمكنت أنقرة من الحد من الهجرة غير الشرعية بصورة أفضل.', '2016-02-12 11:38:00', 'http://www.dw.com/ar/ميركل-تركيا-ستحصل-على-دعم-أكبر-إذا-أوقفت-الهجرة-غير-الشرعية/a-19045498?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(268, 27, 'الأسد: هدف معركة حلب هو قطع الطريق مع تركيا', 'أكد الرئيس السوري بشار الأسد أن التفاوض مع المعارضة "لا يعني التوقف عن مكافحة الارهاب"، معتبرا أنهما مساران منفصلان. وأشار إلى أن هدف المعركة في حلب هو "قطع الطريق بين حلب وتركيا" وليس السيطرة على المدينة بحد ذاتها.', 'الأسد: هدف معركة حلب هو قطع الطريق مع تركيا', 'أكد الرئيس السوري بشار الأسد أن التفاوض مع المعارضة "لا يعني التوقف عن مكافحة الارهاب"، معتبرا أنهما مساران منفصلان. وأشار إلى أن هدف المعركة في حلب هو "قطع الطريق بين حلب وتركيا" وليس السيطرة على المدينة بحد ذاتها.', '2016-02-12 10:55:00', 'http://www.dw.com/ar/الأسد-هدف-معركة-حلب-هو-قطع-الطريق-مع-تركيا/a-19045367?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(269, 27, 'دي ميستورا لـ DW: اتفاق ميونيخ حول سوريا هو أسبوع اختبار', 'عبر مبعوث الأمم المتحدة الخاص إلى سوريا ستيفان دي ميستورا عن تفاؤله بشأن إمكانية إعادة إحياء مفاوضات السلام السورية. وقال دي ميستورا في مقابلة مع DW إنه لا بديل عن التفاوض.', 'دي ميستورا لـ DW: اتفاق ميونيخ حول سوريا هو أسبوع اختبار', 'عبر مبعوث الأمم المتحدة الخاص إلى سوريا ستيفان دي ميستورا عن تفاؤله بشأن إمكانية إعادة إحياء مفاوضات السلام السورية. وقال دي ميستورا في مقابلة مع DW إنه لا بديل عن التفاوض.', '2016-02-12 10:14:00', 'http://www.dw.com/ar/دي-ميستورا-لـ-dw-اتفاق-ميونيخ-حول-سوريا-هو-أسبوع-اختبار/a-19045241?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(270, 27, 'خبيرة ألمانية: "اتفاق ميونيخ إجراء تجميلي لحل عسكري روسي"', 'ترى الخبيرة الألمانية في الشؤون السورية بيترا بيكر أن اتفاق مؤتمر ميونيخ لن يساهم في تخفيف حدة الصراع في سوريا. بالعكس من ذلك سيؤدي إلى توسيع النزاع ويحمل إشارات بأن حصار حلب أصبح وشيكا.', 'خبيرة ألمانية: "اتفاق ميونيخ إجراء تجميلي لحل عسكري روسي"', 'ترى الخبيرة الألمانية في الشؤون السورية بيترا بيكر أن اتفاق مؤتمر ميونيخ لن يساهم في تخفيف حدة الصراع في سوريا. بالعكس من ذلك سيؤدي إلى توسيع النزاع ويحمل إشارات بأن حصار حلب أصبح وشيكا.', '2016-02-12 09:54:00', 'http://www.dw.com/ar/خبيرة-ألمانية-اتفاق-ميونيخ-إجراء-تجميلي-لحل-عسكري-روسي/a-19044530?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(271, 27, 'غوارديولا يؤجل حسم قراره بشأن ريبري وغوتسه وتاسكي', 'قال بيب غوارديولا مدرب بايرن ميونيخ إن الشكوك تحيط بقدرة ثلاثي خط الوسط المؤلف من ماريو غوتسه وفرانك ريبري والوافد الجديد سيردار تاسكي على المشاركة في لقاء الفريق أمام آوغسبورغ.', 'غوارديولا يؤجل حسم قراره بشأن ريبري وغوتسه وتاسكي', 'قال بيب غوارديولا مدرب بايرن ميونيخ إن الشكوك تحيط بقدرة ثلاثي خط الوسط المؤلف من ماريو غوتسه وفرانك ريبري والوافد الجديد سيردار تاسكي على المشاركة في لقاء الفريق أمام آوغسبورغ.', '2016-02-12 09:30:00', 'http://www.dw.com/ar/غوارديولا-يؤجل-حسم-قراره-بشأن-ريبري-وغوتسه-وتاسكي/a-19045092?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(272, 27, 'يورغن كلوب يخترع عبارات جديدة في اللغة الإنجليزية!', 'تحولت بعض العبارات الإنجليزية التي يستخدمها مدرب ليفربول يورغن كلوب في تصريحاته الإعلامية إلى مصدر للدعابة والسخرية، فالمدرب الألماني يسقط في بعض الأحيان في الترجمة الحرفية لبعض الكلمات وهو ما يعطيها مفهوما مغايرا.', 'يورغن كلوب يخترع عبارات جديدة في اللغة الإنجليزية!', 'تحولت بعض العبارات الإنجليزية التي يستخدمها مدرب ليفربول يورغن كلوب في تصريحاته الإعلامية إلى مصدر للدعابة والسخرية، فالمدرب الألماني يسقط في بعض الأحيان في الترجمة الحرفية لبعض الكلمات وهو ما يعطيها مفهوما مغايرا.', '2016-02-12 09:25:00', 'http://www.dw.com/ar/يورغن-كلوب-يخترع-عبارات-جديدة-في-اللغة-الإنجليزية/a-19044844?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(273, 27, 'كيف نحمي البيانات من الضياع لو تعطل الهاتف الذكي؟', 'لا شك أن كثرة استخدام الهواتف الذكية تجعل من الوارد تعرضها للخلل. ولعل أكثر ما يزعج مستخدمي الهواتف الذكية هو تعطل الشاشة، فهذا يصعب الحصول على المعلومات المخزنة بداخله. لكن طريقة بسيطة تساعد على استعادة البيانات مجاناً.', 'كيف نحمي البيانات من الضياع لو تعطل الهاتف الذكي؟', 'لا شك أن كثرة استخدام الهواتف الذكية تجعل من الوارد تعرضها للخلل. ولعل أكثر ما يزعج مستخدمي الهواتف الذكية هو تعطل الشاشة، فهذا يصعب الحصول على المعلومات المخزنة بداخله. لكن طريقة بسيطة تساعد على استعادة البيانات مجاناً.', '2016-02-12 09:25:00', 'http://www.dw.com/ar/كيف-نحمي-البيانات-من-الضياع-لو-تعطل-الهاتف-الذكي؟/a-19042778?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(274, 27, 'ميركل تفتح أبواب مكتبها لجورج وأمل كلوني', 'لقاء جمع المستشارة الألمانية ميركل بالنجم جورج كلوني. ورغم عدم نشر أي تفاصيل حول مضمون اللقاء، إلا أن التكهنات تشير إلى أن كلوني ناقش مع ميركل سياستها تجاه اللاجئين.', 'ميركل تفتح أبواب مكتبها لجورج وأمل كلوني', 'لقاء جمع المستشارة الألمانية ميركل بالنجم جورج كلوني. ورغم عدم نشر أي تفاصيل حول مضمون اللقاء، إلا أن التكهنات تشير إلى أن كلوني ناقش مع ميركل سياستها تجاه اللاجئين.', '2016-02-12 07:09:00', 'http://www.dw.com/ar/ميركل-تفتح-أبواب-مكتبها-لجورج-وأمل-كلوني/a-19044379?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13');
INSERT INTO `rss_feeds` (`id`, `rssWebsiteId`, `titleAR`, `descAR`, `titleGE`, `descGE`, `pubDate`, `url`, `image`, `isActive`, `addingDate`) VALUES
(275, 27, '"داون شفتينغ": نمط حياة جديد للتخلص من الإرهاق!', 'يكثر الحديث عن النصائح المفيدة للتخلص من الإجهاد، وبالرغم من أن ممارسة الرياضة وبعض تمارين الاسترخاء وغيرها لها دور مهم في ذلك، إلا أن من الممكن التخلص من الإرهاق باتباع نمط حياة بدأ بالرواج يدعى "داون شفتينغ"!', '"داون شفتينغ": نمط حياة جديد للتخلص من الإرهاق!', 'يكثر الحديث عن النصائح المفيدة للتخلص من الإجهاد، وبالرغم من أن ممارسة الرياضة وبعض تمارين الاسترخاء وغيرها لها دور مهم في ذلك، إلا أن من الممكن التخلص من الإرهاق باتباع نمط حياة بدأ بالرواج يدعى "داون شفتينغ"!', '2016-02-12 05:35:00', 'http://www.dw.com/ar/داون-شفتينغ-نمط-حياة-جديد-للتخلص-من-الإرهاق/a-19043583?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(276, 27, 'علماء يطورون أداة تقنية تتحكم في الأعضاء الاصطناعية في الجسم', 'نجح علماء من أستراليا في تطوير أداة تتحكم في الأطراف الصناعية يمكنها أن تحاكي عمل العمود الفقري الطبيعي، ما من شأنه أن يساعد الأشخاص المصابين بخلل في عمل الحبل الشوكي أو العمود الفقري في تحريك أعضاء الجسم والمشي.', 'علماء يطورون أداة تقنية تتحكم في الأعضاء الاصطناعية في الجسم', 'نجح علماء من أستراليا في تطوير أداة تتحكم في الأطراف الصناعية يمكنها أن تحاكي عمل العمود الفقري الطبيعي، ما من شأنه أن يساعد الأشخاص المصابين بخلل في عمل الحبل الشوكي أو العمود الفقري في تحريك أعضاء الجسم والمشي.', '2016-02-12 04:53:00', 'http://www.dw.com/ar/علماء-يطورون-أداة-تقنية-تتحكم-في-الأعضاء-الاصطناعية-في-الجسم/a-19038645?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(277, 27, '"نحبك هادي" - فيلم تونسي يفتتح فعاليات البرليناله', 'تنطلق اليوم الجمعة المنافسة الرئيسية لمهرجان برلين السينمائي بعرض الفيلم التونسي "نحبك هادي" للمخرج محمد بن عطية. ويعد هذا العمل أحد المتنافسين على الجائزة الرئيسية للبرليناله "الدب الذهبي".', '"نحبك هادي" - فيلم تونسي يفتتح فعاليات البرليناله', 'تنطلق اليوم الجمعة المنافسة الرئيسية لمهرجان برلين السينمائي بعرض الفيلم التونسي "نحبك هادي" للمخرج محمد بن عطية. ويعد هذا العمل أحد المتنافسين على الجائزة الرئيسية للبرليناله "الدب الذهبي".', '2016-02-12 04:34:00', 'http://www.dw.com/ar/نحبك-هادي-فيلم-تونسي-يفتتح-فعاليات-البرليناله/a-19044112?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-13'),
(278, 27, 'حوالي 2000 عراقي غادروا ألمانيا طواعية منذ الخريف الماضي', 'قالت مصادر إعلامية ألمانية استناداً لبيانات المركز التعاوني للاستراتجيات وتحليلات مكافحة الهجرة غير الشرعية أن ما لا يقل عن ألفي عراقي غادروا ألمانيا بشكل طوعي بسبب تذمرهم وعدم تحقق ما وعدهم به المهربون.', 'حوالي 2000 عراقي غادروا ألمانيا طواعية منذ الخريف الماضي', 'قالت مصادر إعلامية ألمانية استناداً لبيانات المركز التعاوني للاستراتجيات وتحليلات مكافحة الهجرة غير الشرعية أن ما لا يقل عن ألفي عراقي غادروا ألمانيا بشكل طوعي بسبب تذمرهم وعدم تحقق ما وعدهم به المهربون.', '2016-02-14 05:20:00', 'http://www.dw.com/ar/حوالي-2000-عراقي-غادروا-ألمانيا-طواعية-منذ-الخريف-الماضي/a-19047727?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(279, 27, 'مؤشرات مواجهة بين أوباما والجمهوريين بعد وفاة القاضي سكاليا', 'توفي قاض محافظ في المحكمة العليا الأمريكية معارض للإجهاض ومؤيد لعقوبة الإعدام عن عمر 79 عاماً، ما أشعل معركة بين الرئيس الديمقراطي باراك أوباما والكونغرس الأمريكي الذي يسيطر عليه الجمهوريون حول مسالة تعيين خلف له.', 'مؤشرات مواجهة بين أوباما والجمهوريين بعد وفاة القاضي سكاليا', 'توفي قاض محافظ في المحكمة العليا الأمريكية معارض للإجهاض ومؤيد لعقوبة الإعدام عن عمر 79 عاماً، ما أشعل معركة بين الرئيس الديمقراطي باراك أوباما والكونغرس الأمريكي الذي يسيطر عليه الجمهوريون حول مسالة تعيين خلف له.', '2016-02-14 05:16:00', 'http://www.dw.com/ar/مؤشرات-مواجهة-بين-أوباما-والجمهوريين-بعد-وفاة-القاضي-سكاليا/a-19047712?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(280, 27, 'قصف تركي على شمال سوريا لليوم الثاني على التوالي', 'قال المرصد السوري لحقوق الإنسان إن الجيش التركي قصف مواقع تحت سيطرة مقاتلين مدعومين من الأكراد في شمال سوريا لليوم الثاني، مما أدى إلى مصرع مقاتلين. واستهدف القصف قاعدة جوية ومواقع أخرى سيطر عليها الأكراد مؤخراً في سوريا', 'قصف تركي على شمال سوريا لليوم الثاني على التوالي', 'قال المرصد السوري لحقوق الإنسان إن الجيش التركي قصف مواقع تحت سيطرة مقاتلين مدعومين من الأكراد في شمال سوريا لليوم الثاني، مما أدى إلى مصرع مقاتلين. واستهدف القصف قاعدة جوية ومواقع أخرى سيطر عليها الأكراد مؤخراً في سوريا', '2016-02-14 04:37:00', 'http://www.dw.com/ar/قصف-تركي-على-شمال-سوريا-لليوم-الثاني-على-التوالي/a-19047623?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(281, 27, 'شتاينماير يدعو الأسد والمعارضة للتراجع عن أعمال القتال', 'دعا وزير الخارجية الألماني فرانك فالتر شتاينماير كلاً من نظام بشار الأسد والمعارضة السورية لوضع حد لأعمال القتال الدائرة بينهما لتمكين المساعدات الإنسانية من الوصول لضحايا لحرب. كما دعا روسيا للمساعدة في تحقيق هذا الهدف.', 'شتاينماير يدعو الأسد والمعارضة للتراجع عن أعمال القتال', 'دعا وزير الخارجية الألماني فرانك فالتر شتاينماير كلاً من نظام بشار الأسد والمعارضة السورية لوضع حد لأعمال القتال الدائرة بينهما لتمكين المساعدات الإنسانية من الوصول لضحايا لحرب. كما دعا روسيا للمساعدة في تحقيق هذا الهدف.', '2016-02-14 04:22:00', 'http://www.dw.com/ar/شتاينماير-يدعو-الأسد-والمعارضة-للتراجع-عن-أعمال-القتال/a-19047647?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(282, 27, 'الرياض تؤكد نشر طائرات حربية في قاعدة إنجرليك التركية', 'أكد مسؤول في وزارة الدفاع السعودية نشر الرياض طائرات حربية في قاعدة إنجرليك التركية بهدف "تكثيف" العمليات ضد تنظيم "الدولة الإسلامية" (داعش)، وسط تصريحات عن احتمال شن البلدين عملية برية مشتركة ضد الجهاديين في سوريا.', 'الرياض تؤكد نشر طائرات حربية في قاعدة إنجرليك التركية', 'أكد مسؤول في وزارة الدفاع السعودية نشر الرياض طائرات حربية في قاعدة إنجرليك التركية بهدف "تكثيف" العمليات ضد تنظيم "الدولة الإسلامية" (داعش)، وسط تصريحات عن احتمال شن البلدين عملية برية مشتركة ضد الجهاديين في سوريا.', '2016-02-14 03:34:00', 'http://www.dw.com/ar/الرياض-تؤكد-نشر-طائرات-حربية-في-قاعدة-إنجرليك-التركية/a-19047606?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(283, 27, 'لاجئون - " البقاء في تركيا أفضل من أوروبا"', 'يتلقون أجراً متدنياً ويسكنون بيوتاً ضيقة، ورغم ذلك يختار بعض اللاجئين السوريين عن وعي البقاء في تركيا، بدلأ من الانتقال إلى أوروبا. DW زارتهم في أزمير بتركيا ، فكان التقرير التالي.', 'لاجئون - " البقاء في تركيا أفضل من أوروبا"', 'يتلقون أجراً متدنياً ويسكنون بيوتاً ضيقة، ورغم ذلك يختار بعض اللاجئين السوريين عن وعي البقاء في تركيا، بدلأ من الانتقال إلى أوروبا. DW زارتهم في أزمير بتركيا ، فكان التقرير التالي.', '2016-02-14 03:11:00', 'http://www.dw.com/ar/لاجئون-البقاء-في-تركيا-أفضل-من-أوروبا/a-19045727?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(284, 27, 'مصيبة جديدة لدفاع بايرن: بادشتوبر يغيب ثلاثة أشهر', 'عمق هولغر بادشتوبر أزمة خط الدفاع لفريق بايرن ميونيخ الألماني لكرة القدم بعد إصابته بكسر في الكاحل وفقا لما ذكره النادي. وسيغيب بادشتوبر ثلاثة أشهر عن الملاعب وهو ما يشكل ضربة موجعة للاعب ولبايرن ميونيخ أيضا.', 'مصيبة جديدة لدفاع بايرن: بادشتوبر يغيب ثلاثة أشهر', 'عمق هولغر بادشتوبر أزمة خط الدفاع لفريق بايرن ميونيخ الألماني لكرة القدم بعد إصابته بكسر في الكاحل وفقا لما ذكره النادي. وسيغيب بادشتوبر ثلاثة أشهر عن الملاعب وهو ما يشكل ضربة موجعة للاعب ولبايرن ميونيخ أيضا.', '2016-02-13 15:20:00', 'http://www.dw.com/ar/مصيبة-جديدة-لدفاع-بايرن-بادشتوبر-يغيب-ثلاثة-أشهر/a-19047353?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(285, 27, 'ردا على مدفيديف ـ الناتو لا يرغب في حرب باردة جديدة', 'ردا على رئيس الوزراء الروسي ديمتري ميدفيديف الذي قال فيها إن علاقات الشرق والغرب "تنزلق إلى حرب باردة جديدة" وإن حلف الأطلسي يتصرف بشكل "عدائي" تجاه روسيا، نفى الناتو أن تكون لديه أي رغبة في الدخول في حرب باردة جديدة.', 'ردا على مدفيديف ـ الناتو لا يرغب في حرب باردة جديدة', 'ردا على رئيس الوزراء الروسي ديمتري ميدفيديف الذي قال فيها إن علاقات الشرق والغرب "تنزلق إلى حرب باردة جديدة" وإن حلف الأطلسي يتصرف بشكل "عدائي" تجاه روسيا، نفى الناتو أن تكون لديه أي رغبة في الدخول في حرب باردة جديدة.', '2016-02-13 14:59:00', 'http://www.dw.com/ar/ردا-على-مدفيديف-ـ-الناتو-لا-يرغب-في-حرب-باردة-جديدة/a-19047340?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(286, 27, '"دون عقوبات لن تتوقف روسيا عن دعم جرائم الأسد"', 'أكد المدير التنفيذي لمنظمة هيومن رايتس ووتش في حوار أجراه مع DW على هامش مؤتمر ميونيخ، أن روسيا لن تتوقف عن تقديم الدعم لبشار الأسد إلا في حال تعرضها لعقوبات، وإلى أن يحدث ذلك فإن الجرائم ضد المدنيين ستتواصل في سوريا.', '"دون عقوبات لن تتوقف روسيا عن دعم جرائم الأسد"', 'أكد المدير التنفيذي لمنظمة هيومن رايتس ووتش في حوار أجراه مع DW على هامش مؤتمر ميونيخ، أن روسيا لن تتوقف عن تقديم الدعم لبشار الأسد إلا في حال تعرضها لعقوبات، وإلى أن يحدث ذلك فإن الجرائم ضد المدنيين ستتواصل في سوريا.', '2016-02-13 14:35:00', 'http://www.dw.com/ar/دون-عقوبات-لن-تتوقف-روسيا-عن-دعم-جرائم-الأسد/a-19047234?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(287, 27, 'هدايا مناسبة للحبيب في الفالانتاين', 'ما هي الهدية المناسبة للحبيب في الفالانتاين؟ وهل يجب أن تكون ثمينة؟ نصائح من أجل إسعاد الشريك بهدايا بسيطة من أجل التعبير عن الحب والاهتمام في هذا اليوم الخاص.', 'هدايا مناسبة للحبيب في الفالانتاين', 'ما هي الهدية المناسبة للحبيب في الفالانتاين؟ وهل يجب أن تكون ثمينة؟ نصائح من أجل إسعاد الشريك بهدايا بسيطة من أجل التعبير عن الحب والاهتمام في هذا اليوم الخاص.', '2016-02-13 13:31:00', 'http://www.dw.com/ar/هدايا-مناسبة-للحبيب-في-الفالانتاين/a-19047147?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(288, 27, 'فرنسا ترفض استقبال مزيد من اللاجئين', 'أعلنت فرنسا على لسان رئيس وزرائها مانويل فالس أنها غير مستعدة لاستقبال أعداد أخرى من اللاجئين وهو ما يعارض خطة المستشارة الألمانية أنغيلا ميركل التي ترمي إلى توزيع اللاجئين مستقبلا بصورة متساوية على دول الاتحاد الأوروبي.', 'فرنسا ترفض استقبال مزيد من اللاجئين', 'أعلنت فرنسا على لسان رئيس وزرائها مانويل فالس أنها غير مستعدة لاستقبال أعداد أخرى من اللاجئين وهو ما يعارض خطة المستشارة الألمانية أنغيلا ميركل التي ترمي إلى توزيع اللاجئين مستقبلا بصورة متساوية على دول الاتحاد الأوروبي.', '2016-02-13 13:29:00', 'http://www.dw.com/ar/فرنسا-ترفض-استقبال-مزيد-من-اللاجئين/a-19047238?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(289, 27, 'خبراء في ميونيخ - لهذه الأسباب لا يزال "داعش" خطرا جدا', 'رغم الضربات العسكرية القوية والنوعية التي يتلقاها منذ أكثر من سنة، لا يزال تنظيم "الدولة الإسلامية" يشكل خطرا محدقا بأوروبا والولايات المتحدة. خبراء وصناع قرار غربيون يكشفون في مؤتمر ميونيخ عن الأسباب.', 'خبراء في ميونيخ - لهذه الأسباب لا يزال "داعش" خطرا جدا', 'رغم الضربات العسكرية القوية والنوعية التي يتلقاها منذ أكثر من سنة، لا يزال تنظيم "الدولة الإسلامية" يشكل خطرا محدقا بأوروبا والولايات المتحدة. خبراء وصناع قرار غربيون يكشفون في مؤتمر ميونيخ عن الأسباب.', '2016-02-13 13:07:00', 'http://www.dw.com/ar/خبراء-في-ميونيخ-لهذه-الأسباب-لا-يزال-داعش-خطرا-جدا/a-19047252?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(290, 27, 'دورتموند يضاعف محنة هانوفر ويقلص الفارق مع بايرن', 'حقق فريق بوروسيا دورتموند الألماني فوزا ثمينا على ضيفه هانوفر ضمن الأسبوع الحادي والعشرين من مسابقة بوندسليغا. وبهذا الفوز قلص دورتموند الفارق بينه وبين المتصدر بايرن ميونيخ إلى خمس نقاط.', 'دورتموند يضاعف محنة هانوفر ويقلص الفارق مع بايرن', 'حقق فريق بوروسيا دورتموند الألماني فوزا ثمينا على ضيفه هانوفر ضمن الأسبوع الحادي والعشرين من مسابقة بوندسليغا. وبهذا الفوز قلص دورتموند الفارق بينه وبين المتصدر بايرن ميونيخ إلى خمس نقاط.', '2016-02-13 12:30:00', 'http://www.dw.com/ar/دورتموند-يضاعف-محنة-هانوفر-ويقلص-الفارق-مع-بايرن/a-19047183?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(291, 27, 'هل يستفيد بايرن ميونيخ فعلا من أخطاء الحكام؟', 'أعاد حصول الجناح أرين روبين على ركلة جزاء غير مستحقة في مباراة الفريق الأخيرة أمام بوخوم، فريقه بايرن ميونيخ إلى قفص الاتهام بكونه يستفيد من أخطاء الحكام. غير أن موقع فوكوس توصل إلى عكس ذلك في بحث نشر نتائجه السبت.', 'هل يستفيد بايرن ميونيخ فعلا من أخطاء الحكام؟', 'أعاد حصول الجناح أرين روبين على ركلة جزاء غير مستحقة في مباراة الفريق الأخيرة أمام بوخوم، فريقه بايرن ميونيخ إلى قفص الاتهام بكونه يستفيد من أخطاء الحكام. غير أن موقع فوكوس توصل إلى عكس ذلك في بحث نشر نتائجه السبت.', '2016-02-13 12:13:00', 'http://www.dw.com/ar/هل-يستفيد-بايرن-ميونيخ-فعلا-من-أخطاء-الحكام؟/a-19047090?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(292, 27, 'الجزائر- الوقت ينفد أمام إصلاحات اقتصادية مصيرية', 'مع تدهور أسعار النفط لا يبقى أمام الجزائر سوى تنفيذ إصلاحات اقتصادية مؤلمة تنفض مخلفات حقبة الاشتراكية وتعيد الاعتبار أيضا للقطاعات التقليدية بتقنيات حديثة، والسؤال المطروح كيف السبيل إلى ذلك في ظل إرادة سياسية مترددة؟', 'الجزائر- الوقت ينفد أمام إصلاحات اقتصادية مصيرية', 'مع تدهور أسعار النفط لا يبقى أمام الجزائر سوى تنفيذ إصلاحات اقتصادية مؤلمة تنفض مخلفات حقبة الاشتراكية وتعيد الاعتبار أيضا للقطاعات التقليدية بتقنيات حديثة، والسؤال المطروح كيف السبيل إلى ذلك في ظل إرادة سياسية مترددة؟', '2016-02-13 10:46:00', 'http://www.dw.com/ar/الجزائر-الوقت-ينفد-أمام-إصلاحات-اقتصادية-مصيرية/a-19046472?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(293, 27, 'طريق أوزيل إلى برشلونة لابد أن يمر عبر ريال مدريد', 'قبل سنوات ذكر مسعود أوزيل أن برشلونة هو "حلمه". لكن بسبب غوارديولا انتقل "ملك التمريرات الحاسمة" إلى ريال مدريد، ومن هناك إلى أرسنال. والآن يسعى برشلونة لضمه، ربما ليرث تشابي. لكن لابد أن يمر الطريق هنا عبر ريال مدريد!', 'طريق أوزيل إلى برشلونة لابد أن يمر عبر ريال مدريد', 'قبل سنوات ذكر مسعود أوزيل أن برشلونة هو "حلمه". لكن بسبب غوارديولا انتقل "ملك التمريرات الحاسمة" إلى ريال مدريد، ومن هناك إلى أرسنال. والآن يسعى برشلونة لضمه، ربما ليرث تشابي. لكن لابد أن يمر الطريق هنا عبر ريال مدريد!', '2016-02-13 09:04:00', 'http://www.dw.com/ar/طريق-أوزيل-إلى-برشلونة-لابد-أن-يمر-عبر-ريال-مدريد/a-19046739?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(294, 27, 'صحيفة عبرية: جدل بين واشنطن وتل أبيب حول رفع المساعدات العسكرية', 'تباين حول رفع المساعدات العسكرية التي تقدمها الولايات المتحدة لإسرائيل سنوياً، إذ يريد الأمريكيون رفعها بمقدار 400 مليون دولار بحلول عام 2018، إلا أن الإسرائيليين يطلبون مليار دولار أو أكثر، بحسب صحيفة إسرائيلية.', 'صحيفة عبرية: جدل بين واشنطن وتل أبيب حول رفع المساعدات العسكرية', 'تباين حول رفع المساعدات العسكرية التي تقدمها الولايات المتحدة لإسرائيل سنوياً، إذ يريد الأمريكيون رفعها بمقدار 400 مليون دولار بحلول عام 2018، إلا أن الإسرائيليين يطلبون مليار دولار أو أكثر، بحسب صحيفة إسرائيلية.', '2016-02-14 06:21:00', 'http://www.dw.com/ar/صحيفة-عبرية-جدل-بين-واشنطن-وتل-أبيب-حول-رفع-المساعدات-العسكرية/a-19047609?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(295, 27, 'بوتين وأوباما يتفقان على التعاون لتنفيذ اتفاق ميونخ', 'أعلن الكرملين أن الرئيس الأمريكي باراك أوباما اتصل هاتفياً بنظيره الروسي فلاديمير بوتين ليبحث معه الوضع في سوريا، واتفقا على تفعيل التعاون من خلال القنوات الدبلوماسية وهيئات أخرى بهدف تطبيق اتفاق ميونخ.', 'بوتين وأوباما يتفقان على التعاون لتنفيذ اتفاق ميونخ', 'أعلن الكرملين أن الرئيس الأمريكي باراك أوباما اتصل هاتفياً بنظيره الروسي فلاديمير بوتين ليبحث معه الوضع في سوريا، واتفقا على تفعيل التعاون من خلال القنوات الدبلوماسية وهيئات أخرى بهدف تطبيق اتفاق ميونخ.', '2016-02-14 07:17:00', 'http://www.dw.com/ar/بوتين-وأوباما-يتفقان-على-التعاون-لتنفيذ-اتفاق-ميونخ/a-19047955?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-14'),
(296, 27, 'ليبيا: قتلى في اشتباكات بين الجيش وإسلاميين في بنغازي', 'أفاد مسؤولون ليبيون أن نحو 15 شخصاً قُتلوا كما أصيب 32 آخرون في اشتباكات عنيفة وقعت في مدينة بنغازي بشرق ليبيا، حيث يخوض منذ أشهر قتالاً ضد جماعات إسلامية في المدينة.', 'ليبيا: قتلى في اشتباكات بين الجيش وإسلاميين في بنغازي', 'أفاد مسؤولون ليبيون أن نحو 15 شخصاً قُتلوا كما أصيب 32 آخرون في اشتباكات عنيفة وقعت في مدينة بنغازي بشرق ليبيا، حيث يخوض منذ أشهر قتالاً ضد جماعات إسلامية في المدينة.', '2016-02-21 02:06:00', 'http://www.dw.com/ar/ليبيا-قتلى-في-اشتباكات-بين-الجيش-وإسلاميين-في-بنغازي/a-19063537?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(297, 27, 'كردستان العراق - من الازدهار إلى حافة الإفلاس!', 'في كردستان العراق يخيم شبح أزمة اقتصادية تهدد مستوى المعيشة والاستقرار، ما أدى إلى تعثر الازدهار مع تدهور أسعار النفط. فهل يعني ذلك أن ضرورات الاقتصاد تحتم على الإقليم الحالم بالاستقلال البقاء في حضن بغداد؟', 'كردستان العراق - من الازدهار إلى حافة الإفلاس!', 'في كردستان العراق يخيم شبح أزمة اقتصادية تهدد مستوى المعيشة والاستقرار، ما أدى إلى تعثر الازدهار مع تدهور أسعار النفط. فهل يعني ذلك أن ضرورات الاقتصاد تحتم على الإقليم الحالم بالاستقلال البقاء في حضن بغداد؟', '2016-02-21 01:33:00', 'http://www.dw.com/ar/كردستان-العراق-من-الازدهار-إلى-حافة-الإفلاس/a-19061129?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(298, 27, 'سوريا..النظام والمعارضة مستعدان لوقف مشروط لإطلاق النار', 'أعرب الرئيس السوري بشار الأسد عن استعداده لوقف إطلاق النار، لكن شريطة عدم استغلال "الإرهابيين" له. جاء ذلك عقب إعلان المعارضة عن استعدادها لبحث الموافقة على هدنة مؤقتة شرط توفر ضمانات بالتزام حلفاء دمشق بوقف إطلاق النار.', 'سوريا..النظام والمعارضة مستعدان لوقف مشروط لإطلاق النار', 'أعرب الرئيس السوري بشار الأسد عن استعداده لوقف إطلاق النار، لكن شريطة عدم استغلال "الإرهابيين" له. جاء ذلك عقب إعلان المعارضة عن استعدادها لبحث الموافقة على هدنة مؤقتة شرط توفر ضمانات بالتزام حلفاء دمشق بوقف إطلاق النار.', '2016-02-20 17:23:00', 'http://www.dw.com/ar/سوريا-النظام-والمعارضة-مستعدان-لوقف-مشروط-لإطلاق-النار/a-19063287?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(299, 27, 'لبنان- انتقادات لحزب الله ودعوة للسعودية بمراجعة وقف المنحة', 'أكدت الخارجية اللبنانية حرص لبنان على العلاقة مع السعودية، التي أعلنت الجمعة وقف "أكبر منحة للقوات المسلحة اللبنانية على الإطلاق" بسبب حزب الله، وفيما انتقد سياسيون لبنانيون الحزب، حظي قررا السعودية بدعم خليجي واسع.', 'لبنان- انتقادات لحزب الله ودعوة للسعودية بمراجعة وقف المنحة', 'أكدت الخارجية اللبنانية حرص لبنان على العلاقة مع السعودية، التي أعلنت الجمعة وقف "أكبر منحة للقوات المسلحة اللبنانية على الإطلاق" بسبب حزب الله، وفيما انتقد سياسيون لبنانيون الحزب، حظي قررا السعودية بدعم خليجي واسع.', '2016-02-20 15:00:00', 'http://www.dw.com/ar/لبنان-انتقادات-لحزب-الله-ودعوة-للسعودية-بمراجعة-وقف-المنحة/a-19063205?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(300, 27, 'فيلم عن اللاجئين يفوز بجائزة الدب الذهبي لمهرجان برلين', 'فاز فيلم إيطالي وثائقي يسجل مأساة اللاجئين بجائزة الدب الذهبي كأفضل فيلم في الدورة 66 من مهرجان برلين السينمائي الدولي (برليناله)، بينما فاز الممثل التونسي مجد مستورة بجائزة أفضل ممثل عن دوره في فيلم "نحبك هادي".', 'فيلم عن اللاجئين يفوز بجائزة الدب الذهبي لمهرجان برلين', 'فاز فيلم إيطالي وثائقي يسجل مأساة اللاجئين بجائزة الدب الذهبي كأفضل فيلم في الدورة 66 من مهرجان برلين السينمائي الدولي (برليناله)، بينما فاز الممثل التونسي مجد مستورة بجائزة أفضل ممثل عن دوره في فيلم "نحبك هادي".', '2016-02-20 14:47:00', 'http://www.dw.com/ar/فيلم-عن-اللاجئين-يفوز-بجائزة-الدب-الذهبي-لمهرجان-برلين/a-19063243?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(301, 27, 'ماذا تفعل عند قرصنة حساباتك الالكترونية؟', 'تحاول فتح بريدك الالكتروني لكنك تفشل؟ أو تكتشف أن كلمة المرور الخاصة بك لم تعد صالحة لفتح صفحتك على فيسبوك ويتم إرسال رسائل غير لائقة؟ مسألة مزعجة لكنها تتكرر دائما. فما الحل؟', 'ماذا تفعل عند قرصنة حساباتك الالكترونية؟', 'تحاول فتح بريدك الالكتروني لكنك تفشل؟ أو تكتشف أن كلمة المرور الخاصة بك لم تعد صالحة لفتح صفحتك على فيسبوك ويتم إرسال رسائل غير لائقة؟ مسألة مزعجة لكنها تتكرر دائما. فما الحل؟', '2016-02-20 14:02:00', 'http://www.dw.com/ar/ماذا-تفعل-عند-قرصنة-حساباتك-الالكترونية؟/a-19063176?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(302, 27, 'أدونيس لـِ DW: لا ديمقراطية دون فصل الدين عن الدولة', 'استلم الشاعر أدونيس جائزة ريمارك للسلام في مدينة أوسنابروك رغم جدل إعلامي ألماني واسع ونقد شديد وجهه إليه وإلى لجنة التحكيم كُتّاب ألمان ومعارضون سوريون. DW التقت أدونيس لدى استلامه الجائزة وأجرت معه الحوار التالي.', 'أدونيس لـِ DW: لا ديمقراطية دون فصل الدين عن الدولة', 'استلم الشاعر أدونيس جائزة ريمارك للسلام في مدينة أوسنابروك رغم جدل إعلامي ألماني واسع ونقد شديد وجهه إليه وإلى لجنة التحكيم كُتّاب ألمان ومعارضون سوريون. DW التقت أدونيس لدى استلامه الجائزة وأجرت معه الحوار التالي.', '2016-02-20 12:59:00', 'http://www.dw.com/ar/أدونيس-لـِ-dw-لا-ديمقراطية-دون-فصل-الدين-عن-الدولة/a-19062896?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(303, 27, 'قبيل لقائه يوفنتوس..بايرن يفرد عضلاته على دارمشتات', 'نجح لاعبو بايرن ميونيخ في قلب تأخرهم إلى فوز مستحق على دارمشتات في الجولة 22 من الدوري الألماني لكرة القدم. بينما سجل محمود داود هدف فوز غلادباخ على كولونيا ونجح هوفنهايم بقيادة ناغلسمان في الفوز على ماينز.', 'قبيل لقائه يوفنتوس..بايرن يفرد عضلاته على دارمشتات', 'نجح لاعبو بايرن ميونيخ في قلب تأخرهم إلى فوز مستحق على دارمشتات في الجولة 22 من الدوري الألماني لكرة القدم. بينما سجل محمود داود هدف فوز غلادباخ على كولونيا ونجح هوفنهايم بقيادة ناغلسمان في الفوز على ماينز.', '2016-02-20 12:37:00', 'http://www.dw.com/ar/قبيل-لقائه-يوفنتوس-بايرن-يفرد-عضلاته-على-دارمشتات/a-19063101?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(304, 27, 'خطاب تأييد من 70 من المشاهير لسياسة ميركل تجاه اللاجئين', 'وجهت 70 شخصية مشهورة داخل وخارج ألمانيا خطاب تأييد للمستشارة ميركل بخصوص سياستها تجاه اللاجئين. وقال الموقعون على الخطاب لميركل، ومن بينهم من يحمل جائزة نوبل ومن نجا من المحرقة، إن "أوروبا وألمانيا الجديدة بحاجة إليك".', 'خطاب تأييد من 70 من المشاهير لسياسة ميركل تجاه اللاجئين', 'وجهت 70 شخصية مشهورة داخل وخارج ألمانيا خطاب تأييد للمستشارة ميركل بخصوص سياستها تجاه اللاجئين. وقال الموقعون على الخطاب لميركل، ومن بينهم من يحمل جائزة نوبل ومن نجا من المحرقة، إن "أوروبا وألمانيا الجديدة بحاجة إليك".', '2016-02-20 11:28:00', 'http://www.dw.com/ar/خطاب-تأييد-من-70-من-المشاهير-لسياسة-ميركل-تجاه-اللاجئين/a-19062791?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(305, 27, 'ميركل تستعين بـ"البطاطا المقلية" لمواصلة قمة بروكسل الشاقة', 'يبدو أن الوجبات التي تقدم لزعماء الاتحاد الأوروبي في بروكسل لم تكن كافية لإعطاء الطاقة اللازمة لمواصلة المباحثات السياسية الشاقة. المستشارة ميركل قررت الخروج بنفسها للشارع واشترت البطاطا المقلية التي تشتهر بها المدينة.', 'ميركل تستعين بـ"البطاطا المقلية" لمواصلة قمة بروكسل الشاقة', 'يبدو أن الوجبات التي تقدم لزعماء الاتحاد الأوروبي في بروكسل لم تكن كافية لإعطاء الطاقة اللازمة لمواصلة المباحثات السياسية الشاقة. المستشارة ميركل قررت الخروج بنفسها للشارع واشترت البطاطا المقلية التي تشتهر بها المدينة.', '2016-02-20 11:16:00', 'http://www.dw.com/ar/ميركل-تستعين-بـ-البطاطا-المقلية-لمواصلة-قمة-بروكسل-الشاقة/a-19062977?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(306, 27, 'مسيرة ضد العنف والعنصرية إزاء لاجئين بشرق ألمانيا', 'أعلن حزب الخضر في ساكسونيا تنظيم مسيرة مؤيدة للاجئين مساء السبت أمام مأوى للاجئين، قام أمامه نحو مائة شخص قبل يومين بتوجيه هتافات معادية لدى وصول حافلة تقل لاجئين، كما أجبرتهم الشرطة، حسب فيديو، على النزول رغم خوفهم.', 'مسيرة ضد العنف والعنصرية إزاء لاجئين بشرق ألمانيا', 'أعلن حزب الخضر في ساكسونيا تنظيم مسيرة مؤيدة للاجئين مساء السبت أمام مأوى للاجئين، قام أمامه نحو مائة شخص قبل يومين بتوجيه هتافات معادية لدى وصول حافلة تقل لاجئين، كما أجبرتهم الشرطة، حسب فيديو، على النزول رغم خوفهم.', '2016-02-20 10:46:00', 'http://www.dw.com/ar/مسيرة-ضد-العنف-والعنصرية-إزاء-لاجئين-بشرق-ألمانيا/a-19062757?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(307, 27, 'بتقنية متطورة.. فنانة تعيد تشكيل تُحف سورية وعراقية', 'تطورت تقنية الطباعة ثلاثية الأبعاد وأصبحت تستخدم حتى في بناء الجدران والمنازل بطابعات ضخمة ذات أبعاد كبيرة. فنانة مقيمة في الولايات المتحدة تعيد تجسيم تحف فنية وآثار سورية وعراقية دمرها تنظيم "الدولة الإسلامية" (داعش).', 'بتقنية متطورة.. فنانة تعيد تشكيل تُحف سورية وعراقية', 'تطورت تقنية الطباعة ثلاثية الأبعاد وأصبحت تستخدم حتى في بناء الجدران والمنازل بطابعات ضخمة ذات أبعاد كبيرة. فنانة مقيمة في الولايات المتحدة تعيد تجسيم تحف فنية وآثار سورية وعراقية دمرها تنظيم "الدولة الإسلامية" (داعش).', '2016-02-20 10:36:00', 'http://www.dw.com/ar/بتقنية-متطورة-فنانة-تعيد-تشكيل-تُحف-سورية-وعراقية/a-19061733?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(308, 27, 'تحديد موعد الاستفتاء على بقاء بريطانيا في الاتحاد الأوروبي', 'بعد أن نال رئيس الوزراء البرطاني كاميرون ما أراده من قادة دول الاتحاد الأوروبي، تمّ تحديد شهر يونيو موعدا للاستفتاء على بقاء بريطانيا في الاتحاد، وذلك بعد اتفاق منح البلاد وضعا استثنائيا في أوروبا على أكثر من صعيد.', 'تحديد موعد الاستفتاء على بقاء بريطانيا في الاتحاد الأوروبي', 'بعد أن نال رئيس الوزراء البرطاني كاميرون ما أراده من قادة دول الاتحاد الأوروبي، تمّ تحديد شهر يونيو موعدا للاستفتاء على بقاء بريطانيا في الاتحاد، وذلك بعد اتفاق منح البلاد وضعا استثنائيا في أوروبا على أكثر من صعيد.', '2016-02-20 08:36:00', 'http://www.dw.com/ar/تحديد-موعد-الاستفتاء-على-بقاء-بريطانيا-في-الاتحاد-الأوروبي/a-19062681?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(309, 27, 'فان خال يواجه تمرد لاعبين مؤثرين في مانشستر يونايتد', 'أصبح وضع لويس فان خال أكثر إحراجاً بسبب أزمة النتائج التي يمر بها فريقه مانشستر يونايتد. فبعد الانتقادات اللاذعة التي وجهتها له الصحف البريطانية بسبب النتائج المخيبة، تحدثت تقارير أنه يواجه موجة تمرد في صفوف الفريق.', 'فان خال يواجه تمرد لاعبين مؤثرين في مانشستر يونايتد', 'أصبح وضع لويس فان خال أكثر إحراجاً بسبب أزمة النتائج التي يمر بها فريقه مانشستر يونايتد. فبعد الانتقادات اللاذعة التي وجهتها له الصحف البريطانية بسبب النتائج المخيبة، تحدثت تقارير أنه يواجه موجة تمرد في صفوف الفريق.', '2016-02-20 08:31:00', 'http://www.dw.com/ar/فان-خال-يواجه-تمرد-لاعبين-مؤثرين-في-مانشستر-يونايتد/a-19062618?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(310, 27, 'هل يرافق غوندوغان غوارديولا إلى مانشستر سيتي؟', 'ذكرت تقارير صحفية إسبانية أن لاعب خط وسط بوروسيا دورتموند إيلكاي غوندوغان على وشك الانتقال للعب في صفوف نادي مانشستر سيتي الإنجليزي انطلاقا من الموسم القادم. فما مدى صحة هذه التقارير؟', 'هل يرافق غوندوغان غوارديولا إلى مانشستر سيتي؟', 'ذكرت تقارير صحفية إسبانية أن لاعب خط وسط بوروسيا دورتموند إيلكاي غوندوغان على وشك الانتقال للعب في صفوف نادي مانشستر سيتي الإنجليزي انطلاقا من الموسم القادم. فما مدى صحة هذه التقارير؟', '2016-02-20 08:05:00', 'http://www.dw.com/ar/هل-يرافق-غوندوغان-غوارديولا-إلى-مانشستر-سيتي؟/a-19062352?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(311, 27, 'اليمن.. معارك متعددة الجبهات وغياب للدبلوماسية المحنكة', 'تتسع دائرة العنف في الحرب الأهلية اليمنية ويزداد الوضع تعقيداً مع تعدد جبهات القتال بما فيها جبهة مكافحة الأمراض. وكان يمكن تحاشي هذا التصعيد لو تم إتباع سياسات أخرى، تتسم بالحنكة.', 'اليمن.. معارك متعددة الجبهات وغياب للدبلوماسية المحنكة', 'تتسع دائرة العنف في الحرب الأهلية اليمنية ويزداد الوضع تعقيداً مع تعدد جبهات القتال بما فيها جبهة مكافحة الأمراض. وكان يمكن تحاشي هذا التصعيد لو تم إتباع سياسات أخرى، تتسم بالحنكة.', '2016-02-20 06:44:00', 'http://www.dw.com/ar/اليمن-معارك-متعددة-الجبهات-وغياب-للدبلوماسية-المحنكة/a-19061258?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(312, 27, 'مجلس اليهود يطالب بإدراج رفض معاداة السامية ضمن الاندماج', 'شدد المجلس الأعلى لليهود في ألمانيا على ضرور أن تتضمن إجراءات اندماج اللاجئين على أسس رفض معاداة السامية، والاعتراف بوجود دولة إسرائيل، منتقدا في الوقت نفسه ما سماه "انجراف" المجتمع نحو اليمين.', 'مجلس اليهود يطالب بإدراج رفض معاداة السامية ضمن الاندماج', 'شدد المجلس الأعلى لليهود في ألمانيا على ضرور أن تتضمن إجراءات اندماج اللاجئين على أسس رفض معاداة السامية، والاعتراف بوجود دولة إسرائيل، منتقدا في الوقت نفسه ما سماه "انجراف" المجتمع نحو اليمين.', '2016-02-20 05:36:00', 'http://www.dw.com/ar/مجلس-اليهود-يطالب-بإدراج-رفض-معاداة-السامية-ضمن-الاندماج/a-19062443?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(313, 27, 'تأييد أوروبي للمقترح التركي بإنشاء "مناطق آمنة" في سوريا', 'حشدت المستشارة الألمانية تأييدا أوروبيا للمقترح التركي بإقامة "منطقة آمنة" في سوريا، أثناء القمة الأوروبية التي عقدت في بروكسل، والتي شكلت الأزمة السورية وأزمة اللاجئين أحد أهم ملفاتها.', 'تأييد أوروبي للمقترح التركي بإنشاء "مناطق آمنة" في سوريا', 'حشدت المستشارة الألمانية تأييدا أوروبيا للمقترح التركي بإقامة "منطقة آمنة" في سوريا، أثناء القمة الأوروبية التي عقدت في بروكسل، والتي شكلت الأزمة السورية وأزمة اللاجئين أحد أهم ملفاتها.', '2016-02-20 05:13:00', 'http://www.dw.com/ar/تأييد-أوروبي-للمقترح-التركي-بإنشاء-مناطق-آمنة-في-سوريا/a-19062368?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(314, 27, 'مخرج إسرائيلي: أناضل من أجل فلسطين لأني أحب ديني اليهودي', 'فاز فيلم "مفرق 48" بجائزة الجمهور في مهرجان برلين هذا العام، وهو أحد الأفلام القليلة التي تتناول معاناة "فلسطينيي 48" من منظور فلسطيني.DW عربية التقت مخرج الفيلم أودي ألوني، فتحدث عن فكرة الفيلم وصناعته.', 'مخرج إسرائيلي: أناضل من أجل فلسطين لأني أحب ديني اليهودي', 'فاز فيلم "مفرق 48" بجائزة الجمهور في مهرجان برلين هذا العام، وهو أحد الأفلام القليلة التي تتناول معاناة "فلسطينيي 48" من منظور فلسطيني.DW عربية التقت مخرج الفيلم أودي ألوني، فتحدث عن فكرة الفيلم وصناعته.', '2016-02-20 02:35:00', 'http://www.dw.com/ar/مخرج-إسرائيلي-أناضل-من-أجل-فلسطين-لأني-أحب-ديني-اليهودي/a-19061281?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(315, 27, 'نصف سكان العالم "بنصف بصر" بحلول 2050؟', 'حذر خبراء من أستراليا وسنغافورة من أن نصف سكان العالم سيعانون من ضعف البصر بحلول 2050، أي ما يعادل 5 مليار نسمة. مؤشرات صحية خطيرة. فما هي الأسباب؟', 'نصف سكان العالم "بنصف بصر" بحلول 2050؟', 'حذر خبراء من أستراليا وسنغافورة من أن نصف سكان العالم سيعانون من ضعف البصر بحلول 2050، أي ما يعادل 5 مليار نسمة. مؤشرات صحية خطيرة. فما هي الأسباب؟', '2016-02-19 16:07:00', 'http://www.dw.com/ar/نصف-سكان-العالم-بنصف-بصر-بحلول-2050؟/a-19061968?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(316, 27, 'تعرف على مزايا وعيوب الخضروات المعلبة', 'يدرك الكثيرون أهمية تناول الخضروات والفواكه. قد يميل البعض لتناول الخضروات المعلبة أكثر من الطازجة. ولذلك دوافع كثيرة، منها سهولة استخدامها. صحيح أن للخضار المعلبة مزايا إيجابية ولكن لها عيوبا أيضا. فما هي هذه العيوب؟', 'تعرف على مزايا وعيوب الخضروات المعلبة', 'يدرك الكثيرون أهمية تناول الخضروات والفواكه. قد يميل البعض لتناول الخضروات المعلبة أكثر من الطازجة. ولذلك دوافع كثيرة، منها سهولة استخدامها. صحيح أن للخضار المعلبة مزايا إيجابية ولكن لها عيوبا أيضا. فما هي هذه العيوب؟', '2016-02-19 12:48:00', 'http://www.dw.com/ar/تعرف-على-مزايا-وعيوب-الخضروات-المعلبة/a-19052289?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(317, 27, 'طرد اللاجئين المرتكبين لجرائم .. إشكال قانوني وعملي', 'طرد اللاجئين الذين يرتكبون جنحاً عملية يمكن وصفها بالسهلة قانونياً، ولكنها صعبة التنفيذ. لذلك، تريد ألمانيا سن قانون جديد لتسهيل الطرد. وزير الداخلية يسعى من جانبه لعقد اتفاقيات ملزمة مع دول مغاربية لاستقبال مواطنيها.', 'طرد اللاجئين المرتكبين لجرائم .. إشكال قانوني وعملي', 'طرد اللاجئين الذين يرتكبون جنحاً عملية يمكن وصفها بالسهلة قانونياً، ولكنها صعبة التنفيذ. لذلك، تريد ألمانيا سن قانون جديد لتسهيل الطرد. وزير الداخلية يسعى من جانبه لعقد اتفاقيات ملزمة مع دول مغاربية لاستقبال مواطنيها.', '2016-02-19 12:44:00', 'http://www.dw.com/ar/طرد-اللاجئين-المرتكبين-لجرائم-إشكال-قانوني-وعملي/a-19060941?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21');
INSERT INTO `rss_feeds` (`id`, `rssWebsiteId`, `titleAR`, `descAR`, `titleGE`, `descGE`, `pubDate`, `url`, `image`, `isActive`, `addingDate`) VALUES
(318, 27, 'المناطق الكردية في تركيا .. الموت خلف كل زاوية', 'تتجه الأمور إلى التصعيد في مناطق الأكراد بعد تفجير أنقرة، الذي راح ضحيته العشرات، وتهديد أردوغان بالانتقام من حزب العمال الكردستاني. المتضررون سيكونون من المدنيين بالدرجة الأولى. نالان سيبار تكتب من جنوب شرق تركيا.', 'المناطق الكردية في تركيا .. الموت خلف كل زاوية', 'تتجه الأمور إلى التصعيد في مناطق الأكراد بعد تفجير أنقرة، الذي راح ضحيته العشرات، وتهديد أردوغان بالانتقام من حزب العمال الكردستاني. المتضررون سيكونون من المدنيين بالدرجة الأولى. نالان سيبار تكتب من جنوب شرق تركيا.', '2016-02-19 09:24:00', 'http://www.dw.com/ar/المناطق-الكردية-في-تركيا-الموت-خلف-كل-زاوية/a-19060722?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(319, 27, 'الصحف الإنجليزية تجلد مانشستر يونايتد ومدربه فان خال', 'تفاقمت مشاكل مانشستر يونايتد الإنجليزي ومدربه الهولندي لويس فان خال بالسقوط أمام المغمور ميدتيلاند الدنماركي في ذهاب دور الـ32 من الدوري الأوروبي. تواضع أداء مانشستر أَلَّب عليه صحافة بلاده، التي واجهته بانتقادات حادة.', 'الصحف الإنجليزية تجلد مانشستر يونايتد ومدربه فان خال', 'تفاقمت مشاكل مانشستر يونايتد الإنجليزي ومدربه الهولندي لويس فان خال بالسقوط أمام المغمور ميدتيلاند الدنماركي في ذهاب دور الـ32 من الدوري الأوروبي. تواضع أداء مانشستر أَلَّب عليه صحافة بلاده، التي واجهته بانتقادات حادة.', '2016-02-19 08:53:00', 'http://www.dw.com/ar/الصحف-الإنجليزية-تجلد-مانشستر-يونايتد-ومدربه-فان-خال/a-19060822?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(320, 27, 'جودة الجنس وتكراريته .. أمور لا يتحدث عنها أحد!', 'ما هو معيار الحياة الجنسية المثالية: تكرارية العملية الجنسية أم جودتها؟ وما علاقة نوعية الجنس وجودته بعدد مرات ممارسته؟ ومتى يكون بلوغ الذروة الجنسية أسهل على المرأة؟ وكيف يؤثر تقدمها في العمر على إحساسها الجنسي؟', 'جودة الجنس وتكراريته .. أمور لا يتحدث عنها أحد!', 'ما هو معيار الحياة الجنسية المثالية: تكرارية العملية الجنسية أم جودتها؟ وما علاقة نوعية الجنس وجودته بعدد مرات ممارسته؟ ومتى يكون بلوغ الذروة الجنسية أسهل على المرأة؟ وكيف يؤثر تقدمها في العمر على إحساسها الجنسي؟', '2016-02-19 07:44:00', 'http://www.dw.com/ar/جودة-الجنس-وتكراريته-أمور-لا-يتحدث-عنها-أحد/a-19060666?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(321, 27, 'عندما تلاحقنا كوابيس الليل!', 'يحلم كثير من الناس بأحلام وكوابيس مزعجة تختفي بعد استيقاظ المرء من نومه. لكن بعض الكوابيس يمكن أن تتكرر باستمرار ويمكن أن تبقى عالقة في الأذهان وترافق الشخص طيلة اليوم، فما وراء ظهور الكوابيس وكيف يمكن التخلص منها؟', 'عندما تلاحقنا كوابيس الليل!', 'يحلم كثير من الناس بأحلام وكوابيس مزعجة تختفي بعد استيقاظ المرء من نومه. لكن بعض الكوابيس يمكن أن تتكرر باستمرار ويمكن أن تبقى عالقة في الأذهان وترافق الشخص طيلة اليوم، فما وراء ظهور الكوابيس وكيف يمكن التخلص منها؟', '2016-02-19 05:53:00', 'http://www.dw.com/ar/عندما-تلاحقنا-كوابيس-الليل/a-19056458?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(322, 27, 'عودة نوري شاهين تجعل فرحة جماهير دورتموند فرحتين', 'لم يكن فوز بوروسيا دورتموند على نظيره بورتو في المباراة التي جمعتهما على ملعب "سيغنال إدونا بارك" هو ما أسعد جماهير الفريق الأصفر فقط، بل أيضاً عودة نوري شاهين للمنافسة بعد غياب دام لمدة قاربت العام بداعي الإصابة.', 'عودة نوري شاهين تجعل فرحة جماهير دورتموند فرحتين', 'لم يكن فوز بوروسيا دورتموند على نظيره بورتو في المباراة التي جمعتهما على ملعب "سيغنال إدونا بارك" هو ما أسعد جماهير الفريق الأصفر فقط، بل أيضاً عودة نوري شاهين للمنافسة بعد غياب دام لمدة قاربت العام بداعي الإصابة.', '2016-02-19 05:38:00', 'http://www.dw.com/ar/عودة-نوري-شاهين-تجعل-فرحة-جماهير-دورتموند-فرحتين/a-19060303?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(323, 27, 'دورتموند وأشبيلية يضعان قدما في الدور الـ 16 للدوري الأوروبي', 'حسم دورتموند الفصل الأول من موقعة الدوري الأوروبي مع بورتو البرتغالي، بثنائية نظيفة ليقترب من التأهل للدور الـ 16 من المسابقة. وبدوره بطل الموسم السابق، أشبيلية، سحق ضيفه مولده النرويجي بثلاثية نظيفة.', 'دورتموند وأشبيلية يضعان قدما في الدور الـ 16 للدوري الأوروبي', 'حسم دورتموند الفصل الأول من موقعة الدوري الأوروبي مع بورتو البرتغالي، بثنائية نظيفة ليقترب من التأهل للدور الـ 16 من المسابقة. وبدوره بطل الموسم السابق، أشبيلية، سحق ضيفه مولده النرويجي بثلاثية نظيفة.', '2016-02-18 15:59:00', 'http://www.dw.com/ar/دورتموند-وأشبيلية-يضعان-قدما-في-الدور-الـ-16-للدوري-الأوروبي/a-19059520?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(324, 27, 'يحدث في الصين..سوق لبيع الهواء المعلب للأثرياء', 'الفكرة قد تبدو خيالية لكنها حقيقية، فـ"بيع الهواء" كان يطلق لوصف من يستطيع الترويج لشيء ما بلباقة وذكاء، لكن هذا المشروع يسعى إلى بيع الهواء قولا وفعلاً، ولا نستغرب أن يكون سوق هذا المنتج هي الصين حيث لا مستحيل تحت الشمس', 'يحدث في الصين..سوق لبيع الهواء المعلب للأثرياء', 'الفكرة قد تبدو خيالية لكنها حقيقية، فـ"بيع الهواء" كان يطلق لوصف من يستطيع الترويج لشيء ما بلباقة وذكاء، لكن هذا المشروع يسعى إلى بيع الهواء قولا وفعلاً، ولا نستغرب أن يكون سوق هذا المنتج هي الصين حيث لا مستحيل تحت الشمس', '2016-02-18 15:20:00', 'http://www.dw.com/ar/يحدث-في-الصين-سوق-لبيع-الهواء-المعلب-للأثرياء/a-19057109?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(325, 27, 'فيفا: لعنة حقوق الإنسان تلاحق الشيخ سلمان المدعوم آسيويا', 'قبل أسبوع من إجراء انتخابات رئاسة الفيفا بدت الأمور تسير وفق خطط المتنافس البحريني الشيخ سلمان الذي ضمن أصوات عدد كبير من الاتحادات الوطنية في آسيا وإفريقيا، ورغم ذلك لا زالت الاتهامات في قضايا حقوق الإنسان تلاحقه.', 'فيفا: لعنة حقوق الإنسان تلاحق الشيخ سلمان المدعوم آسيويا', 'قبل أسبوع من إجراء انتخابات رئاسة الفيفا بدت الأمور تسير وفق خطط المتنافس البحريني الشيخ سلمان الذي ضمن أصوات عدد كبير من الاتحادات الوطنية في آسيا وإفريقيا، ورغم ذلك لا زالت الاتهامات في قضايا حقوق الإنسان تلاحقه.', '2016-02-18 13:16:00', 'http://www.dw.com/ar/فيفا-لعنة-حقوق-الإنسان-تلاحق-الشيخ-سلمان-المدعوم-آسيويا/a-19057085?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(326, 27, 'لا تحكموا على سلوك رونالدو ـ أرض الملعب هي الحكم!', '"الدون" رونالدو هو الأكثر إشكالية في التعامل مع الصحفيين، فهو سريع الاستياء من الأسئلة الحرجة. وحين يقول أحدهم إنها "قلة احترافية"، يرد عليه: "لا يجوز الحكم علي إلا من خلال أرض الملعب"، ومباراة روما خير دليل.', 'لا تحكموا على سلوك رونالدو ـ أرض الملعب هي الحكم!', '"الدون" رونالدو هو الأكثر إشكالية في التعامل مع الصحفيين، فهو سريع الاستياء من الأسئلة الحرجة. وحين يقول أحدهم إنها "قلة احترافية"، يرد عليه: "لا يجوز الحكم علي إلا من خلال أرض الملعب"، ومباراة روما خير دليل.', '2016-02-18 12:43:00', 'http://www.dw.com/ar/لا-تحكموا-على-سلوك-رونالدو-ـ-أرض-الملعب-هي-الحكم/a-19056775?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(327, 27, 'شكوك حول نجاعة منطقة آمنة على الحدود السورية التركية', 'تدعو تركيا منذ فترة طويلة لإقامة شريط آمن بعمق عشرة كيلومترات داخل سوريا لحماية النازحين المدنيين ولتفادي انتقالهم لتركيا، غير أن هذا الاقتراح لم يلق اهتماما من معظم حلفاء تركيا، وإن عبرت برلين مؤخرا عن تأييدها للفكرة.', 'شكوك حول نجاعة منطقة آمنة على الحدود السورية التركية', 'تدعو تركيا منذ فترة طويلة لإقامة شريط آمن بعمق عشرة كيلومترات داخل سوريا لحماية النازحين المدنيين ولتفادي انتقالهم لتركيا، غير أن هذا الاقتراح لم يلق اهتماما من معظم حلفاء تركيا، وإن عبرت برلين مؤخرا عن تأييدها للفكرة.', '2016-02-18 12:30:00', 'http://www.dw.com/ar/شكوك-حول-نجاعة-منطقة-آمنة-على-الحدود-السورية-التركية/a-19056782?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(328, 27, 'احترس..توصيلات (USB-C) الرخيصة قد تدمر جهازك', 'احذر من استعمال وصلات يو أس بي من نوع سي، لأنها لا تناسب جميع الأجهزة وقد تسبب تلفا كبيرا في الكمبيوترات والهواتف الذكية، سيما إذا كانت من النوعيات الرديئة، وفقا لنصائح خبير كمبيوتر متخصص قام بتجربة هذه التقنية.', 'احترس..توصيلات (USB-C) الرخيصة قد تدمر جهازك', 'احذر من استعمال وصلات يو أس بي من نوع سي، لأنها لا تناسب جميع الأجهزة وقد تسبب تلفا كبيرا في الكمبيوترات والهواتف الذكية، سيما إذا كانت من النوعيات الرديئة، وفقا لنصائح خبير كمبيوتر متخصص قام بتجربة هذه التقنية.', '2016-02-18 11:39:00', 'http://www.dw.com/ar/احترس-توصيلات-usb-c-الرخيصة-قد-تدمر-جهازك/a-19036772?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(329, 27, 'دراسة ترجح تعرض ركاب الطائرة لأبخرة سامة من المحركات', 'تتزايد ظاهرة تعرض ركاب الطائرات لمشاكل صحية، الأمر الذي دفع باحثين من جامعة غوتينغن لإجراء أبحاث على بعض هؤلاء الأشخاص. وخلص الباحثون إلى نتائج مثيرة حول الهواء الذي يستنشقه ركاب الطائرة داخل المقصورة.', 'دراسة ترجح تعرض ركاب الطائرة لأبخرة سامة من المحركات', 'تتزايد ظاهرة تعرض ركاب الطائرات لمشاكل صحية، الأمر الذي دفع باحثين من جامعة غوتينغن لإجراء أبحاث على بعض هؤلاء الأشخاص. وخلص الباحثون إلى نتائج مثيرة حول الهواء الذي يستنشقه ركاب الطائرة داخل المقصورة.', '2016-02-18 11:08:00', 'http://www.dw.com/ar/دراسة-ترجح-تعرض-ركاب-الطائرة-لأبخرة-سامة-من-المحركات/a-19053378?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(330, 27, 'دراسة: ممارسة الرياضة تقتل الخلايا السرطانية', 'توصل باحثون ألمان ودنماركيون إلى أن ممارسة الرياضة عامل مهم في القضاء على الخلايا السرطانية. العلماء اكتشفوا أن لهرمون الادرينالين دور كبير في القضاء على الخلايا السرطانية، لكن كيف يعمل هذا الهرمون؟', 'دراسة: ممارسة الرياضة تقتل الخلايا السرطانية', 'توصل باحثون ألمان ودنماركيون إلى أن ممارسة الرياضة عامل مهم في القضاء على الخلايا السرطانية. العلماء اكتشفوا أن لهرمون الادرينالين دور كبير في القضاء على الخلايا السرطانية، لكن كيف يعمل هذا الهرمون؟', '2016-02-18 11:07:00', 'http://www.dw.com/ar/دراسة-ممارسة-الرياضة-تقتل-الخلايا-السرطانية/a-19056660?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(331, 27, 'طبيب سوري من داخل حلب لـ DW: الأسد لا يرحم أحدا', 'يخاطر الأطباء الذين يعالجون المصابين في سوريا بحياتهم يوميا، وأسامة العز واحد منهم. إنه يعالج المصابين والمرضى في حلب. العز تحدث في مقابلة مع DW عن الأوضاع السائدة في المدينة التي تعيش على وقع القصف والغارات الروسية.', 'طبيب سوري من داخل حلب لـ DW: الأسد لا يرحم أحدا', 'يخاطر الأطباء الذين يعالجون المصابين في سوريا بحياتهم يوميا، وأسامة العز واحد منهم. إنه يعالج المصابين والمرضى في حلب. العز تحدث في مقابلة مع DW عن الأوضاع السائدة في المدينة التي تعيش على وقع القصف والغارات الروسية.', '2016-02-18 08:31:00', 'http://www.dw.com/ar/طبيب-سوري-من-داخل-حلب-لـ-dw-الأسد-لا-يرحم-أحدا/a-19055733?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(332, 27, 'أساطير شائعة.. الطعام النباتي أفضل من الحيواني', 'يقول النباتيون إن الاستغناء عن اللحوم والمنتجات الحيوانية يقي من الأمراض والنوبات القلبية، كما أن المأكولات النباتية تحتوي على جميع العناصر التي يحتاجها الجسم. إليك بعض الحقائق العلمية التي تدحض هذا الكلام.', 'أساطير شائعة.. الطعام النباتي أفضل من الحيواني', 'يقول النباتيون إن الاستغناء عن اللحوم والمنتجات الحيوانية يقي من الأمراض والنوبات القلبية، كما أن المأكولات النباتية تحتوي على جميع العناصر التي يحتاجها الجسم. إليك بعض الحقائق العلمية التي تدحض هذا الكلام.', '2016-02-18 07:48:00', 'http://www.dw.com/ar/أساطير-شائعة-الطعام-النباتي-أفضل-من-الحيواني/a-19055028?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(333, 27, '"هومو سابينس" ارتحل من أفريقيا وتزاوج مع إنسان النياندرتال', 'ذكرت أبحاث حديثة أن الرحلة الأولى للإنسان العاقل (هومو سابينس) من أفريقيا كانت قبل نحو 100 ألف عام وباتجاه الشرق الأوسط وحدث هناك أول تزاوج داخلي بين النوع البشري (هومو سابينس) وإنسان النياندرتال.', '"هومو سابينس" ارتحل من أفريقيا وتزاوج مع إنسان النياندرتال', 'ذكرت أبحاث حديثة أن الرحلة الأولى للإنسان العاقل (هومو سابينس) من أفريقيا كانت قبل نحو 100 ألف عام وباتجاه الشرق الأوسط وحدث هناك أول تزاوج داخلي بين النوع البشري (هومو سابينس) وإنسان النياندرتال.', '2016-02-18 07:10:00', 'http://www.dw.com/ar/هومو-سابينس-ارتحل-من-أفريقيا-وتزاوج-مع-إنسان-النياندرتال/a-19055761?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(334, 27, 'دراسة: فيروس زيكا يمكنه عبور المشيمة وإصابة الجنين', 'ذكرت دراسة برازيلية أن فيروس زيكا يمكنه عبور حاجز المشيمة وإصابة الجنين عند المرأة الحامل، لكن لم يثبت بعد ما إذا كان يسبب حالة صغر حجم الرأس لدى المواليد، فيما قالت روسيا إنها نجحت في إنتاج عقاقير تجريبية ضد المرض.', 'دراسة: فيروس زيكا يمكنه عبور المشيمة وإصابة الجنين', 'ذكرت دراسة برازيلية أن فيروس زيكا يمكنه عبور حاجز المشيمة وإصابة الجنين عند المرأة الحامل، لكن لم يثبت بعد ما إذا كان يسبب حالة صغر حجم الرأس لدى المواليد، فيما قالت روسيا إنها نجحت في إنتاج عقاقير تجريبية ضد المرض.', '2016-02-18 07:05:00', 'http://www.dw.com/ar/دراسة-فيروس-زيكا-يمكنه-عبور-المشيمة-وإصابة-الجنين/a-19055632?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(335, 27, 'سرطان الدم - تقنية جديدة تبشر بشفاء حالات ميؤوس منها', 'توصلت أبحاث سريرية أجريت على مرضى سرطان الدم إلى نتائج وصفها الباحثون بأنها "غير مسبوقة". إذ نجحت تقنية العلاج الجديدة في شفاء حالات وصلت إلى مرحلة متأخرة من المرض وميؤوس من شفائها.', 'سرطان الدم - تقنية جديدة تبشر بشفاء حالات ميؤوس منها', 'توصلت أبحاث سريرية أجريت على مرضى سرطان الدم إلى نتائج وصفها الباحثون بأنها "غير مسبوقة". إذ نجحت تقنية العلاج الجديدة في شفاء حالات وصلت إلى مرحلة متأخرة من المرض وميؤوس من شفائها.', '2016-02-18 06:21:00', 'http://www.dw.com/ar/سرطان-الدم-تقنية-جديدة-تبشر-بشفاء-حالات-ميؤوس-منها/a-19053942?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(336, 27, 'أبطال أوروبا: فولفسبورغ والريال يقتربان من ربع النهائي', 'رغم معاناته في الدقائق الأخيرة من عمر المباراة، إلا أن فولفسبورغ الألماني تمكن من قطع نصف المشوار لدور الثمانية لدوري أبطال أوروبا بعد فوزه على جينت البلجيكي. فريق ريال مدريد فاز أيضا بهدفين دون رد على روما الإيطالي.', 'أبطال أوروبا: فولفسبورغ والريال يقتربان من ربع النهائي', 'رغم معاناته في الدقائق الأخيرة من عمر المباراة، إلا أن فولفسبورغ الألماني تمكن من قطع نصف المشوار لدور الثمانية لدوري أبطال أوروبا بعد فوزه على جينت البلجيكي. فريق ريال مدريد فاز أيضا بهدفين دون رد على روما الإيطالي.', '2016-02-17 17:26:00', 'http://www.dw.com/ar/أبطال-أوروبا-فولفسبورغ-والريال-يقتربان-من-ربع-النهائي/a-19055064?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(337, 27, 'هيكل .. "صحفي القرن" الذي لم يسلم من لعبة الكبار', 'رحيل محمد حسنين هيكل، يشكل خسارة كبيرة لعالم الصحافة والسياسة في بلده مصر والعالم العربي. تميز هيكل بحضور إعلامي وسياسي نادر على الساحة الدولية، لكن تداخل أبعاد كثيرة في شخصيته وعلاقاته المتشعبة جعلته مثار جدل كبير.', 'هيكل .. "صحفي القرن" الذي لم يسلم من لعبة الكبار', 'رحيل محمد حسنين هيكل، يشكل خسارة كبيرة لعالم الصحافة والسياسة في بلده مصر والعالم العربي. تميز هيكل بحضور إعلامي وسياسي نادر على الساحة الدولية، لكن تداخل أبعاد كثيرة في شخصيته وعلاقاته المتشعبة جعلته مثار جدل كبير.', '2016-02-17 11:47:00', 'http://www.dw.com/ar/هيكل-صحفي-القرن-الذي-لم-يسلم-من-لعبة-الكبار/a-19054550?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(338, 27, 'معرفة جنس الجنين..هل يفسد الفضول متعة المفاجأة؟', 'لا يطيق معظم الآباء والأمهات الوصول للشهر الرابع من الحمل، لمعرفة جنس الجنين، لكن البعض يفضل حالة الغموض المحيطة بالضيف الجديد. فهل من الأفضل معرفة ذلك قبل الولادة أم الاستمتاع بحالة الترقب وانتظار المفاجأة لحظة الولادة؟', 'معرفة جنس الجنين..هل يفسد الفضول متعة المفاجأة؟', 'لا يطيق معظم الآباء والأمهات الوصول للشهر الرابع من الحمل، لمعرفة جنس الجنين، لكن البعض يفضل حالة الغموض المحيطة بالضيف الجديد. فهل من الأفضل معرفة ذلك قبل الولادة أم الاستمتاع بحالة الترقب وانتظار المفاجأة لحظة الولادة؟', '2016-02-17 11:14:00', 'http://www.dw.com/ar/معرفة-جنس-الجنين-هل-يفسد-الفضول-متعة-المفاجأة؟/a-19050143?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(339, 27, 'مشاهد عرس وسط الدمار- إحياء للأمل أم دعاية للنظام السوري؟', 'صور رومانسية لعروسين بملابس زفاف بهيجة، جاءت في تناقض صارخ مع خلفية الدمار والخراب، التي تسود في مدينة حمص السورية. الزوج أحد عناصر قوات الأسد. والمصور يقول إن الدولة تدعمه ويدعي أن أغلب السوريين يؤيدون صوره!', 'مشاهد عرس وسط الدمار- إحياء للأمل أم دعاية للنظام السوري؟', 'صور رومانسية لعروسين بملابس زفاف بهيجة، جاءت في تناقض صارخ مع خلفية الدمار والخراب، التي تسود في مدينة حمص السورية. الزوج أحد عناصر قوات الأسد. والمصور يقول إن الدولة تدعمه ويدعي أن أغلب السوريين يؤيدون صوره!', '2016-02-17 10:48:00', 'http://www.dw.com/ar/مشاهد-عرس-وسط-الدمار-إحياء-للأمل-أم-دعاية-للنظام-السوري؟/a-19053698?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(340, 27, 'لماذا أوقفت أكبر ولاية ألمانية استقبال لاجئين من المغرب؟', 'أوضح وزير الداخلية في ولاية شمال الراين-ويستفاليا أن ولايته ستتوقف عن استقبال لاجئين من المغرب، علما بأن نحو 80 في المائة من طالبي اللجوء من المغرب كانوا يُحالون على هذه الولاية، التي وقعت في أكبر مدنها أحداث رأس السنة!', 'لماذا أوقفت أكبر ولاية ألمانية استقبال لاجئين من المغرب؟', 'أوضح وزير الداخلية في ولاية شمال الراين-ويستفاليا أن ولايته ستتوقف عن استقبال لاجئين من المغرب، علما بأن نحو 80 في المائة من طالبي اللجوء من المغرب كانوا يُحالون على هذه الولاية، التي وقعت في أكبر مدنها أحداث رأس السنة!', '2016-02-17 10:43:00', 'http://www.dw.com/ar/لماذا-أوقفت-أكبر-ولاية-ألمانية-استقبال-لاجئين-من-المغرب؟/a-19053594?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(341, 27, 'طبيب من حلب: كل ما يضمن بقاء الناس يتعرض للتدمير', 'شهد شمال سوريا في الأيام الأخيرة غارات مكثفة استهدفت مستشفيات ومدارس أدت إلى مقتل العشرات من الأشخاص. ممثل لمنظمة إغاثة كانت تدير المستشفيين اللذين دُمرا يتحدث لـ DW عن الأوضاع هناك.', 'طبيب من حلب: كل ما يضمن بقاء الناس يتعرض للتدمير', 'شهد شمال سوريا في الأيام الأخيرة غارات مكثفة استهدفت مستشفيات ومدارس أدت إلى مقتل العشرات من الأشخاص. ممثل لمنظمة إغاثة كانت تدير المستشفيين اللذين دُمرا يتحدث لـ DW عن الأوضاع هناك.', '2016-02-17 08:32:00', 'http://www.dw.com/ar/طبيب-من-حلب-كل-ما-يضمن-بقاء-الناس-يتعرض-للتدمير/a-19053467?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(342, 27, 'سوريا.. مواقع التواصل ساحات أخرى لمعارك افتراضية شرسة', 'فيما تزداد الحرب في سوريا استعاراً تدور معارك أخرى موازية في مواقع التواصل الاجتماعي، وقود هذه الحروب والمعارك هو الطائفية وكراهية الآخر المختلف. فإلى أي حد تساهم هذه المعارك "الافتراضية" في تأجيج الصراع على أرض الواقع؟', 'سوريا.. مواقع التواصل ساحات أخرى لمعارك افتراضية شرسة', 'فيما تزداد الحرب في سوريا استعاراً تدور معارك أخرى موازية في مواقع التواصل الاجتماعي، وقود هذه الحروب والمعارك هو الطائفية وكراهية الآخر المختلف. فإلى أي حد تساهم هذه المعارك "الافتراضية" في تأجيج الصراع على أرض الواقع؟', '2016-02-16 13:52:00', 'http://www.dw.com/ar/سوريا-مواقع-التواصل-ساحات-أخرى-لمعارك-افتراضية-شرسة/a-19052381?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(343, 27, 'الطريق إلى البلاستيك الحيوي الرخيص والصديق للبيئة', 'يواجه البلاستيك انتقادات عديدة بسبب أضراره على البيئة والصحة. البديل المتمثل في البلاستيك الحيوي يواجه بعض المشكلات رغم فاعليته، من بينها تكلفة الإنتاج الباهظة وصعوبة استخدامه كبديل للبلاستيك التقليدي في بعض المجالات.', 'الطريق إلى البلاستيك الحيوي الرخيص والصديق للبيئة', 'يواجه البلاستيك انتقادات عديدة بسبب أضراره على البيئة والصحة. البديل المتمثل في البلاستيك الحيوي يواجه بعض المشكلات رغم فاعليته، من بينها تكلفة الإنتاج الباهظة وصعوبة استخدامه كبديل للبلاستيك التقليدي في بعض المجالات.', '2016-02-16 11:45:00', 'http://www.dw.com/ar/الطريق-إلى-البلاستيك-الحيوي-الرخيص-والصديق-للبيئة/a-19052197?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(344, 27, 'تحذيرات من تناول الجريب فروت مع حبوب منع الحمل', 'الجريب فروت من الفواكه التي لا تخلو منها مائدة الباحثين عن الرشاقة، لما لهذه الفاكهة لاذعة الطعم من قدرة على حرق الدهون، لكن دراسات حديثة حذرت من تناول الجريب فروت مع حبوب منع الحمل.', 'تحذيرات من تناول الجريب فروت مع حبوب منع الحمل', 'الجريب فروت من الفواكه التي لا تخلو منها مائدة الباحثين عن الرشاقة، لما لهذه الفاكهة لاذعة الطعم من قدرة على حرق الدهون، لكن دراسات حديثة حذرت من تناول الجريب فروت مع حبوب منع الحمل.', '2016-02-16 11:35:00', 'http://www.dw.com/ar/تحذيرات-من-تناول-الجريب-فروت-مع-حبوب-منع-الحمل/a-19051314?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(345, 27, '"غيرشاد" تطبيق جديد لتفادي بطش "شرطة الأخلاق" الإيرانية', 'تمكنت مجموعة من الشباب الإيراني من تطوير تطبيق لنظام أندرويد يتيح للإيرانيين تجنب "الشرطة الأخلاقية". وقد عرف التطبيق إقبالا كبيراً من طرف الإيرانيين، لكن بعد 24 ساعة من طرحه، قامت السلطات الإيرانية بحجبه.', '"غيرشاد" تطبيق جديد لتفادي بطش "شرطة الأخلاق" الإيرانية', 'تمكنت مجموعة من الشباب الإيراني من تطوير تطبيق لنظام أندرويد يتيح للإيرانيين تجنب "الشرطة الأخلاقية". وقد عرف التطبيق إقبالا كبيراً من طرف الإيرانيين، لكن بعد 24 ساعة من طرحه، قامت السلطات الإيرانية بحجبه.', '2016-02-16 02:56:00', 'http://www.dw.com/ar/غيرشاد-تطبيق-جديد-لتفادي-بطش-شرطة-الأخلاق-الإيرانية/a-19046789?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(346, 27, 'السباق نحو البيت الأبيض: ترامب وكلينتون يفوزان وبوش ينسحب', 'فيما يواصل دونالد ترامب انتصاراته في الجولات التمهيدية لانتخابات الرئاسة الأميركية في ساوث كارولينا، أعلن جيب بوش انسحابه من السباق نحو البيت الأبيض. وفي ولاية نيفادا تمكنت كلينتون من التقدم على منافسها ساندرز.', 'السباق نحو البيت الأبيض: ترامب وكلينتون يفوزان وبوش ينسحب', 'فيما يواصل دونالد ترامب انتصاراته في الجولات التمهيدية لانتخابات الرئاسة الأميركية في ساوث كارولينا، أعلن جيب بوش انسحابه من السباق نحو البيت الأبيض. وفي ولاية نيفادا تمكنت كلينتون من التقدم على منافسها ساندرز.', '2016-02-21 03:26:00', 'http://www.dw.com/ar/السباق-نحو-البيت-الأبيض-ترامب-وكلينتون-يفوزان-وبوش-ينسحب/a-19063603?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21'),
(347, 27, 'مؤتمر ميونيخ ـ منتدى عالمي تخلّف عنه الإعلام العربي', 'تصدُّر الأزمات والقضايا الساخنة في العالم العربي لأعمال مؤتمر الأمن في ميونيخ، لم يوازه اهتمام كبير من الإعلام العربي وكان حضوره ضعيفا. في المقابل، حظي المنتدى هذه السنة بحضور قوي على صفحات مواقع التواصل الاجتماعي.', 'مؤتمر ميونيخ ـ منتدى عالمي تخلّف عنه الإعلام العربي', 'تصدُّر الأزمات والقضايا الساخنة في العالم العربي لأعمال مؤتمر الأمن في ميونيخ، لم يوازه اهتمام كبير من الإعلام العربي وكان حضوره ضعيفا. في المقابل، حظي المنتدى هذه السنة بحضور قوي على صفحات مواقع التواصل الاجتماعي.', '2016-02-15 13:34:00', 'http://www.dw.com/ar/مؤتمر-ميونيخ-ـ-منتدى-عالمي-تخلّف-عنه-الإعلام-العربي/a-19050351?maca=ara-rss-ar-all-1125-xml-atom', '', 0, '2016-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `rss_websites`
--

CREATE TABLE IF NOT EXISTS `rss_websites` (
`id` int(11) NOT NULL,
  `websiteName` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `addingDate` date NOT NULL,
  `addUserId` int(11) NOT NULL,
  `lastModifiedDate` date DEFAULT NULL,
  `modifyUserId` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss_websites`
--

INSERT INTO `rss_websites` (`id`, `websiteName`, `url`, `addingDate`, `addUserId`, `lastModifiedDate`, `modifyUserId`) VALUES
(27, 'مصراوي', 'http://rss.dw.com/atom/rss-ar-all', '2016-02-09', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `titleGE` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `addingDate` date NOT NULL,
  `lastModifiedDate` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `titleAR`, `titleGE`, `type`, `userId`, `addingDate`, `lastModifiedDate`) VALUES
(1, 'tag1', 'tag1', 'blog', 1, '2015-09-23', '0000-00-00'),
(2, 'tag2', 'tag2', 'blog', 1, '2015-09-23', '0000-00-00'),
(3, 'tag3', 'tag3', 'blog', 1, '2015-09-23', '0000-00-00'),
(4, 'tag4', 'tag4', 'blog', 1, '2015-09-23', '0000-00-00'),
(5, 'aaaa', 'aaaaaa', 'blog', 1, '2015-11-02', '2015-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
`id` int(11) NOT NULL,
  `testimonialAR` text NOT NULL,
  `nameAR` varchar(255) NOT NULL,
  `testimonialGE` text NOT NULL,
  `nameGE` varchar(255) NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonialAR`, `nameAR`, `testimonialGE`, `nameGE`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(5, '<p>تعلمت الألماني في ٣ شهور فقط بعد الكورس المكثف و ساعدتني الاكاديمية في التقديم للجامعات الالمانية</p>', 'محمد سعد', '<p>Ich lernte Deutsch in nur 3 Monaten nach dem Kurs intensiv ist und half mir Academy in der Einf&uuml;hrung der deutschen Hochschulen</p>\n<p></p>', 'Mohamed Saad', '2016-02-03 09:59:32', '0000-00-00 00:00:00', 1),
(4, '<p>إدارة منظمة و إهتمام كبير بالطلاب.&nbsp;</p>', 'حسام أسامة', '<p>Great Management and well organized</p>', 'Hossam Ossama', '2016-02-03 09:57:08', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE IF NOT EXISTS `trainees` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `college_work` varchar(500) NOT NULL,
  `referralId` int(11) NOT NULL DEFAULT '0',
  `branchesId` int(11) NOT NULL,
  `placementTest` int(11) NOT NULL DEFAULT '0' COMMENT '0 = no , 1 = yes',
  `comment` text NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`id`, `name`, `phone`, `email`, `college_work`, `referralId`, `branchesId`, `placementTest`, `comment`, `addingDate`, `lastModifiedDate`, `adminId`) VALUES
(1, 'ibrahim samir', '0100 088 5477', 'ebrahim_samer2001@yahoo.com', 'efadfsdfsdfsdfdf', 0, 20, 0, '', '2016-02-11 06:29:03', '0000-00-00 00:00:00', 0),
(2, 'ibrahim samir', '0100 088 5477', 'ebrahim_samer2001@yahoo.com', 'efadfsdfsdfsdfdf', 0, 2, 0, '', '2016-02-11 06:29:03', '0000-00-00 00:00:00', 0),
(3, 'ibrahim samir', '0100 088 5477', 'ebrahim_samer2001@yahoo.com', 'efadfsdfsdfsdfdf', 0, 2, 0, '', '2016-02-11 06:29:03', '0000-00-00 00:00:00', 0),
(4, 'ibrahim samir', '0100 088 5477', 'ebrahim_samer2001@yahoo.com', 'efadfsdfsdfsdfdf', 0, 25, 0, '', '2016-02-11 08:58:00', '0000-00-00 00:00:00', 0),
(5, 'ahowsh', '452345634234131253', 'hema@yahoo.com', 'بيلابليبليبليبل', 0, 20, 0, '', '2016-02-13 04:23:19', '0000-00-00 00:00:00', 0),
(6, 'ibrahim samir', '5454545335', 'ebrahim_samer2001@yahoo.com', 'efadfsdfsdfsdfdf', 0, 18, 0, '', '2016-02-13 10:10:23', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `promo_code` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `promo_code`, `image`) VALUES
(1, '0x7f000001', 'admin', '7569dfe20cffc4fce47347caf7ea884e4263c017', '9462e8eee0', 'info@alnoubi.com', '', NULL, NULL, 'e777f41599812d694817f30b1eb2c3333b1733ac', 1268889823, 1456043104, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(18, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_images`
--
ALTER TABLE `about_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_branches`
--
ALTER TABLE `course_branches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_instructors`
--
ALTER TABLE `course_instructors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_applications`
--
ALTER TABLE `events_applications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_files`
--
ALTER TABLE `gallery_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipn_log`
--
ALTER TABLE `ipn_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipn_orders`
--
ALTER TABLE `ipn_orders`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UniqueTransactionID` (`txn_id`);

--
-- Indexes for table `ipn_order_items`
--
ALTER TABLE `ipn_order_items`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `na_tags`
--
ALTER TABLE `na_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslsubsc`
--
ALTER TABLE `newslsubsc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacakge_courses`
--
ALTER TABLE `pacakge_courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_instructors`
--
ALTER TABLE `package_instructors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss_websites`
--
ALTER TABLE `rss_websites`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `about_images`
--
ALTER TABLE `about_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_branches`
--
ALTER TABLE `course_branches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `course_instructors`
--
ALTER TABLE `course_instructors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `events_applications`
--
ALTER TABLE `events_applications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gallery_files`
--
ALTER TABLE `gallery_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ipn_log`
--
ALTER TABLE `ipn_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ipn_orders`
--
ALTER TABLE `ipn_orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ipn_order_items`
--
ALTER TABLE `ipn_order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `na_tags`
--
ALTER TABLE `na_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `newslsubsc`
--
ALTER TABLE `newslsubsc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pacakge_courses`
--
ALTER TABLE `pacakge_courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `package_instructors`
--
ALTER TABLE `package_instructors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=348;
--
-- AUTO_INCREMENT for table `rss_websites`
--
ALTER TABLE `rss_websites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
