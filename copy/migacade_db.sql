-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2016 at 04:28 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.31

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
(1, 'Know More', 'MIG', 'Academy', 'Know More', 'MIG', 'Academy', 'Make It in Germany', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', 'Make It in Germany', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', '2015-11-02 08:22:43', '2015-11-03 06:14:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `about_images`
--

CREATE TABLE IF NOT EXISTS `about_images` (
  `id` int(11) NOT NULL,
  `aboutId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_images`
--

INSERT INTO `about_images` (`id`, `aboutId`, `image`) VALUES
(1, 1, '4da4b74d173361c9a9d321a2c6be4ec3.jpg'),
(2, 1, '7e595b47f80417f6df59e6797768e50a.jpg'),
(3, 1, 'df452165d6db7bb443065028be782427.jpg');

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
(1, 1, 'What?111', 'MIG Academy11', '<p>22222222222222222222222222211m) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', 'What?', 'MIG Academy', '<p>It is a long established fact that1111111111111111111111 a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here</p>'),
(2, 1, 'Why?11', 'We are The Best111', '<p>لوريم إيبسوم(1111111111111111Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', 'Why?', 'We are The Best', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here</p>'),
(3, 1, '', '', '', '', '', '');

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
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `traineeId`, `courseId`, `packageId`, `price`, `paid`, `type`, `status`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 2, 1, 0, 0, 0, 1, 'normal', '2015-11-05 00:00:00', '0000-00-00 00:00:00', 0),
(2, 3, 0, 1, 0, 0, 1, 'normal', '2015-11-05 00:00:00', '0000-00-00 00:00:00', 0);

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
(1, 'Hello', 'Make It in', 'Germany', 'Hello', 'Make It in', 'Germany', '72cef36e8c841876cea8387237168452.jpg', 1, '2015-11-02 05:47:25');

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
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `titleAR`, `titleGE`, `descAR`, `descGE`, `image`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'title1', 'title1', '<p>title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1</p>\r\n<p>title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1</p>', '<p>title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1</p>\r\n<p>title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1 title1</p>', '65274dc0b124c7ab60568f31b8fbe24a.jpg', '2015-09-20 03:52:46', '2015-11-02 10:58:46', 1),
(2, 'title2', 'title2', '<p>title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2</p>\r\n<p>title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2</p>\r\n<p>&nbsp;</p>', '<p>title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2</p>\r\n<p>title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2</p>\r\n<p>title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2 title2</p>', 'd1ff191f0e75354aeab0a8cfa1f5525b.jpg', '2015-09-20 03:53:46', '2015-11-02 10:58:24', 1),
(5, 'title3', 'title3', '<p>title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3</p>', '<p>title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3 title3</p>', '77003db57dbaaa6e267a5367dff1e0f1.jpg', '2015-09-20 03:56:22', '2015-11-04 11:38:51', 1),
(6, 'title4', 'title4', '<p>title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4</p>', '<p>title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4 title4</p>', '31342dfee4de55fc3fc29c1b2f5adcc2.jpg', '2015-09-20 03:57:03', '2015-11-02 10:58:34', 1),
(9, 'Ten amazing and strange pictures by professionals', 'Ten amazing and strange pictures by professionals', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', '94d3a9707ca58cbd4e1b6d83b3ee7f8f.jpg', '2015-11-02 10:55:52', '2015-11-02 11:24:31', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `titleAR`, `titleGE`, `isActive`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'عام', 'General', 1, '2015-05-24 10:58:25', '2015-11-02 15:37:52', 1),
(6, 'عام', 'General', 0, '2015-05-24 11:22:42', '2015-05-24 11:26:56', 1),
(8, 'كتابة', 'Writing', 1, '2015-05-24 11:26:37', '2015-11-02 15:38:09', 1),
(5, 'dfgfdg', 'dfgdf', 0, '2015-05-24 11:02:54', '0000-00-00 00:00:00', 1),
(9, 'aaaaaa', 'saaaaaaaa', 1, '2015-11-02 15:37:43', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
(1, '+1 234 5678 910', 'info@mig-academy.com', '30.00304061468779', '31.245256031640565', 'yasmeen.fci@gmail.com', 'https://www.facebook.com/', 'https://www.linkedin.com', '', '2015-05-06 07:39:45', '2015-11-05 22:27:54');

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
  `price` float NOT NULL,
  `durationAR` varchar(255) NOT NULL,
  `weeksNumAR` varchar(255) NOT NULL,
  `lecturesNumAR` varchar(255) NOT NULL,
  `durationGE` varchar(255) NOT NULL,
  `weeksNumGE` varchar(255) NOT NULL,
  `lecturesNumGE` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL DEFAULT '0' COMMENT 'This will be any id, if the type is language',
  `image` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1= active',
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `titleAR`, `titleGE`, `desc200AR`, `desc200GE`, `contentAR`, `contentGE`, `price`, `durationAR`, `weeksNumAR`, `lecturesNumAR`, `durationGE`, `weeksNumGE`, `lecturesNumGE`, `categoryId`, `image`, `isActive`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'course1', 'course1', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار </p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 2000, '10 Hours', '2 Weeks', '2 Lectures\\Week', '', '', '', 1, 'e47507663b11f474f54a78f930eaedb3.jpg', 1, '2015-11-02 16:30:09', '0000-00-00 00:00:00', 1),
(2, 'course2', 'course2', '', '', '', '', 333, '10 ساعات', '2 أسبوع', '2 محاضرة \\أسبوع', '10 HRS', '2  Weeks', '2 Lectures\\Week', 1, '730b0781d95b30a9cc86f42f8e7f446a.jpg', 1, '2015-11-02 16:38:18', '2015-11-04 02:30:32', 1),
(3, 'course3', 'course3', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. يبسوم.</p>\r\n<p>&nbsp;</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 3000, '50 ساعة', '6 أسابيع', '3 محاضرة\\أسبوع', '50 HRS', '', '', 8, 'd4229460581daaec12178bffed86ac13.jpg', 1, '2015-11-02 16:40:15', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructors`
--

CREATE TABLE IF NOT EXISTS `course_instructors` (
  `id` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `instructorId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_instructors`
--

INSERT INTO `course_instructors` (`id`, `courseId`, `instructorId`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 2, 1),
(4, 3, 2),
(5, 3, 9);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `titleAR`, `titleGE`, `contentAR`, `contentGE`, `date`, `startTime`, `endTime`, `locationAR`, `locationGE`, `latitude`, `lagitude`, `image`, `userId`, `addingDate`, `lastModifiedDate`) VALUES
(15, 'مناسبة', 'eventttttttttt', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel dignissim sem. Curabitur consequat non elit non fermentum. Sed vitae eleifend sapien. Donec dapibus felis vitae iaculis tincidunt. Ut consequat sapien ac nulla hendrerit interdum. Etiam tempus vehicula erat quis egestas. Nulla erat erat, consequat ac fringilla quis, sodales non lectus. Aliquam scelerisque felis tincidu</p>', '2015-05-14', '08:00:00', '23:00:00', 'المكان', 'location', '30.0096557', '31.1889511', 'c2856defe4aa063edf2feb30350c7418.jpg', 1, '2015-05-14 00:00:00', '2015-11-05 05:08:28'),
(16, 'event1', 'event111', '<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>\r\n<p>مكااااااااااااان&nbsp;</p>', '<p>locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn</p>\r\n<p></p>\r\n<p>locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn locationnnnnnnnnnn</p>', '2015-11-10', '09:00:00', '20:00:00', 'مكااااااااااااان', 'locationnnnnnnnnnn11', '30.0096557', '31.1889511', 'b8ce742cd1e6e0f6a65c89513b6abe7c.jpg', 1, '2015-11-05 04:44:07', '2015-11-05 05:08:08');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='static titles and description for interface pages';

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `title1AR`, `title2AR`, `title3AR`, `title1GE`, `title2GE`, `title3GE`, `titleAR`, `titleGE`, `captionAR`, `captionGE`, `pageName`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'Meet', 'MIG', 'Partners', 'Meet', 'MIG', 'Partners', 'الشركاء', 'Partners', 'خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً،', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'partnersContent', '2015-05-28 10:58:59', '2015-11-02 09:58:10', 1),
(2, 'Meet', 'MIG', 'Team', 'Meet', 'MIG', 'Team', 'فريقنا', 'Meet Our Team', 'خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً،', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'ourTeam', '2015-05-28 11:35:32', '2015-11-02 09:36:22', 1),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'Why Join XSpace', 'Why Join XSpace', 'Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. Ferri clitaponderum ne.', 'Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. Ferri clitaponderum ne.', 'indexSection2', '2015-05-31 04:43:48', '0000-00-00 00:00:00', 1),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 'College Admissions', 'College Admissions', 'Ex utamur fierent tacimates duis choro an', 'Ex utamur fierent tacimates duis choro an', 'admissionsContent', '2015-06-06 13:09:40', '0000-00-00 00:00:00', 1),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 'الخدمات', 'Services', '', '', 'servicesContent', '2015-06-07 13:53:46', '0000-00-00 00:00:00', 1),
(6, 'View', 'MIG', 'Gallery', 'View', 'MIG', 'Gallery', 'MIG Image Gallery', 'MIG Image Gallery', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'albumsContent', '2015-11-02 10:22:14', '0000-00-00 00:00:00', 1),
(7, 'Learn', 'MIG', 'Academy', 'Learn', 'MIG', 'Academy', 'MIG Courses', 'MIG Courses', '', '', 'coursesContent', '2015-11-02 11:27:05', '0000-00-00 00:00:00', 1),
(8, 'Contact', 'MIG', 'Academy', 'Contact', 'MIG', 'Academy', 'Connect with us', 'Connect with us', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa', 'contactContent', '2015-11-02 15:25:16', '0000-00-00 00:00:00', 1),
(9, 'Read', 'MIG', 'Blog', 'Read', 'MIG', 'Blog', 'Latest Blog', 'Latest Blog', '', '', 'blogContent', '2015-11-02 17:06:19', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `nameAR`, `nameGE`, `descAR`, `descGE`, `image`, `gender`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'محمد', 'Mohammed', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arc</p>', '84fe448905bd8e1f1ad65abe27a14200.jpg', 0, '2015-05-10 00:00:00', '2015-11-04 02:31:17', 1),
(2, 'أحمد', 'Ahmed', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arc</p>', 'ea949bd20afba72d3a2f72fca5c964b6.jpg', 0, '2015-05-10 00:00:00', '2015-11-04 02:31:03', 1),
(9, 'يقبليلبر', 'ewdsdfsdf', '<p>ءبلربؤل</p>', '<p>dsfsdfdsf</p>', '4f3ebc580842f02bb3b199fe323488c4.jpg', 1, '2015-05-29 11:22:56', '2015-11-04 02:30:52', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COMMENT='news_articles_tags';

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
(83, 9, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `nameAR`, `nameGE`, `descAR`, `descGE`, `image`, `gender`, `facebook`, `twitter`, `linkedIn`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'محمد', 'Mohammed', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arc</p>', '830f77ef6e0c938a4cfe4937ad5bb7fb.jpg', 0, '', 'http://www.twitter.com/', 'https://www.linkedin.com', '2015-05-10 00:00:00', '2015-11-02 09:44:11', 1),
(2, 'أحمد', 'Ahmed', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arc</p>', 'd8c14af9a4c673617588eb6e9db0f2b0.png', 0, 'https://www.google.com.eg/', 'https://www.twitter.com/', 'https://www.linkedin.com', '2015-05-10 00:00:00', '2015-11-02 09:44:26', 1),
(10, 'aaaaaaa', 'aaaaaaaaaaa', '<p>aaaaaaaa</p>', '<p>aaaaaaaaaaaa</p>', '', 1, 'https://www.google.com.eg/', 'https://www.twitter.com/', 'https://www.linkedin.com', '2015-11-02 09:47:01', '2015-11-02 18:05:30', 1),
(11, 'bbbbbbbb', 'bbbbbbb', '<p>bbbbbbbb</p>', '<p>bbbbbbbbbb</p>', '', 0, 'https://www.google.com.eg/', '', '', '2015-11-02 09:47:16', '2015-11-03 10:10:31', 1),
(9, 'Aliiiii', 'Aliiiii', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n<p>&nbsp;</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 'aed14d4c6e5c2db76b6b949c1927bd7d.jpg', 0, 'https://www.google.com.eg/', 'https://www.twitter.com/', '', '2015-11-02 09:43:43', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `nameAR`, `nameGE`, `logo`, `website`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, 'شريك1', 'partner1', 'ce03fdade0457cc126aa42d9f3a08249.png', 'https://www.google.com', '2015-05-28 11:05:19', '0000-00-00 00:00:00', 1),
(2, 'شريك2', 'partner2', 'fd3a1b80eb9a5ab535002b048643c897.png', 'https://www.google.com', '2015-05-28 11:05:40', '0000-00-00 00:00:00', 1),
(3, 'شريك3', 'partner3', 'be51e4f582847e3717b0fba03eaa4496.png', 'https://www.google.com', '2015-05-28 11:05:58', '0000-00-00 00:00:00', 1),
(7, 'شريك4', 'partner4', '822214114ae0b949fc4e4d23d24b659c.png', 'https://www.google.com', '2015-05-28 11:08:17', '0000-00-00 00:00:00', 1),
(8, 'aliiiii', 'aliiiiii', '03a3ebe560dcc0375b673c1f32a46363.jpg', 'https://www.google.com.eg/', '2015-11-02 10:02:53', '0000-00-00 00:00:00', 1);

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
  `image` varchar(500) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '0' COMMENT '0= active, 1 = deleted',
  `addingDate` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonialAR`, `nameAR`, `testimonialGE`, `nameGE`, `addingDate`, `lastModifiedDate`, `userId`) VALUES
(1, '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم&nbsp;</p>', 'Ali aaaaaafffff', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel dignissim sem. Curabitur consequat non elit non fermentum. Sed vitae eleifend sapien. Donec dapibus felis vitae iaculis tincidunt. Ut consequat sapien ac nulla hendrerit interdum. Etiam tempus vehicula erat quis egestas. Nulla erat erat, consequat ac fringilla quis, sodales non lectus. Aliquam scelerisque felis tincidu</p>', 'Ali aaaaaaffffff', '2015-05-14 13:44:15', '2015-11-02 09:54:55', 1),
(2, '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم&nbsp;</p>', 'منى إبراهيم', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus felis, condimentum eget gravida vitae, hendrerit quis augue. Nullam rutrum tortor vel arcu fermentum blandit. Fusce ut malesuada magna.111111111</p>', 'Mona Ibraheem', '2015-05-14 13:44:39', '2015-05-15 07:22:38', 1),
(3, '<p>dfgdfgdfg</p>', 'dgsdfgdsfg', '<p>gfsfggf</p>', 'gfdfg', '2015-11-02 09:54:23', '0000-00-00 00:00:00', 1);

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
  `placementTest` int(11) NOT NULL DEFAULT '0' COMMENT '0 = no , 1 = yes',
  `comment` text NOT NULL,
  `addingDate` datetime NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`id`, `name`, `phone`, `email`, `college_work`, `referralId`, `placementTest`, `comment`, `addingDate`, `lastModifiedDate`, `adminId`) VALUES
(3, 'ahmed', '5478995566655', 'ahmed@yahoo.com', 'student college', 0, 0, '', '2015-11-05 22:54:28', '0000-00-00 00:00:00', 0),
(2, 'ali ahmed', '1235698745698', 'ali@yahoo.com', 'woooork', 0, 0, '', '2015-11-05 22:30:20', '0000-00-00 00:00:00', 0);

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
(1, '0x7f000001', 'admin', '7569dfe20cffc4fce47347caf7ea884e4263c017', '9462e8eee0', 'info@alnoubi.com', '', NULL, NULL, 'e777f41599812d694817f30b1eb2c3333b1733ac', 1268889823, 1454254565, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_instructors`
--
ALTER TABLE `course_instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `events_applications`
--
ALTER TABLE `events_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `newslsubsc`
--
ALTER TABLE `newslsubsc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `rss_websites`
--
ALTER TABLE `rss_websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
