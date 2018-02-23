-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 02:27 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

--
-- Database: `cakesilvercms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8_general_mysql500_ci,
  `content` longtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `url`, `sort_order`, `status`, `created_at`, `modified_at`) VALUES
(1, 'What is Lorem Ipsum?', 'asdas', 'asdas', '<strong style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">Lorem Ipsum</strong><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br>', 'what-is-lorem-ipsum', 0, 1, '2018-02-20 02:24:00', '2018-02-22 08:47:26'),
(3, 'Why do we use it?', NULL, NULL, '<blockquote><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></blockquote>', 'why-do-we-use-it', 0, 1, '2018-02-21 00:43:06', '2018-02-22 08:48:26'),
(4, 'Where does it come from?', NULL, NULL, '<p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'where-does-it-come-from', 0, 1, '2018-02-22 08:48:58', NULL),
(5, 'J Ajay', NULL, NULL, '<p class="title" style="line-height: 20px; color: rgb(44, 119, 161); font-size: 15px; text-align: justify; font-family: Verdana, Geneva, sans-serif;"><i>A target-oriented dynamic professional specialized in converting end user requirements into real time applications by providing them cost effective and timely solution. Worked on very high pressured environment and making best use of available resources. Good technical knowledge which I use to help my colleagues. Believe in growing as a team rather then an individual.</i></p><p style="line-height: 20px; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 12px;">My Objective is to pursue a challenging work in Software industry as Team / Tech Lead where I can contribute my technical and soft skills towards the prosperity of the company.</p>', '', 0, 1, '2018-02-22 08:55:19', '2018-02-22 08:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_region_id` int(11) NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `menu_type` enum('custom','object','module') COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'custom',
  `custom_link` text COLLATE utf8_general_mysql500_ci,
  `object_type` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `object_id` bigint(20) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0',
  `redirection` enum('self','new-window') COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'self',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `menu_region_id` (`menu_region_id`),
  KEY `menu_type` (`menu_type`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`),
  KEY `module_id` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_region_id`, `menu_title`, `menu_type`, `custom_link`, `object_type`, `object_id`, `module_id`, `redirection`, `sort_order`, `status`) VALUES
(1, 1, 'What is Lorem Ipsum?', 'object', NULL, 'article', 1, 0, 'self', 0, 1),
(2, 2, 'Why do we use it?', 'object', NULL, 'article', 3, 0, 'self', 0, 1),
(3, 3, 'Where does it come from?', 'object', NULL, 'article', 4, 0, 'self', 0, 1),
(4, 3, 'Test Ajay', 'custom', 'http://ajayjagad.com', '', 0, 0, 'new-window', 0, 1),
(5, 1, 'J Ajay', 'object', NULL, 'article', 5, 0, 'self', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_regions`
--

DROP TABLE IF EXISTS `menu_regions`;
CREATE TABLE IF NOT EXISTS `menu_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(35) COLLATE utf8_general_mysql500_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `menu_regions`
--

INSERT INTO `menu_regions` (`id`, `region`, `slug`, `status`) VALUES
(1, 'Top Menu', 'top-menu', 1),
(2, 'Sidebar Menu', 'sidebar-menu', 1),
(3, 'Footer menu', 'footer-menu', 1);
