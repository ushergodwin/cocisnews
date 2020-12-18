-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 05:25 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(400) NOT NULL,
  `password` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`id`, `email`, `fullname`, `password`, `regdate`, `role`, `username`) VALUES
(1, 'oladayoahmod112@gmail.com', 'Oladayo Ahmod', 'c3bf1ccbf78489182ec6e800f4ff1fd9', '2020-12-15 21:39:56', 'admin', 'unitech');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--
-- Error reading structure for table blog.admin_details: #1932 - Table 'blog.admin_details' doesn't exist in engine
-- Error reading data for table blog.admin_details: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `blog`.`admin_details`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `post`
--
-- Error reading structure for table blog.post: #1932 - Table 'blog.post' doesn't exist in engine
-- Error reading data for table blog.post: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `blog`.`post`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(500) NOT NULL,
  `post_author` varchar(200) NOT NULL,
  `post_desc` text NOT NULL,
  `image_dir` varchar(500) NOT NULL,
  `post_category` varchar(200) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_tag` varchar(500) NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_author`, `post_desc`, `image_dir`, `post_category`, `post_date`, `post_tag`, `post_content`) VALUES
(1, 'Arsenewinger gets married in ibadan ', 'unitech', 'Arsenewinger gets married in ibadan ', '../images/Penguins.jpg', 'latest', '2020-12-05 06:57:36', 'Arsenewinger gets married in ibadan ', '<p>Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;\\r\\n\\r\\n&nbsp;\\r\\n\\r\\nArsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;Arsenewinger gets married in ibadan&nbsp;\\r\\n</p>\r\n'),
(2, 'Arsenewinger gets married in abuja', 'unitech', 'Arsenewinger gets married in abuja', '../images/Koala.jpg', 'latest', '2020-10-11 14:45:40', 'Arsenewinger gets married in abuja', 'Arsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abuja\\r\\n\\r\\n&nbsp;\\r\\n\\r\\nArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abuja\\r\\n\\r\\nArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abujaArsenewinger gets married in abuja\\r\\n'),
(3, 'Arsenewinger gets married in lagos', 'unitech', 'Arsenewinger gets married in lagos', '../images/Desert.jpg', 'latest', '2020-10-11 16:51:52', 'Arsenewinger gets married in lagos', 'Arsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagosArsenewinger gets married in lagos\\r\\n'),
(4, 'drogba gets married in cotonou', 'unitech', 'drogba gets married in cotonou', '../images/Lighthouse.jpg', 'latest', '2020-10-11 16:52:50', 'drogba gets married in cotonou', 'drogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonoudrogba gets married in cotonou\\r\\n'),
(5, 'mikel returned to chelsea', 'alexis', 'mikel returned to chelsea', '../images/Tulips.jpg', 'latest', '2020-10-11 16:54:35', 'mikel returned to chelsea', 'mikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelseamikel returned to chelsea\\r\\n'),
(6, 'Buhari cancelled SARS operatives', 'alexis', 'Buhari cancelled SARS operatives', '../images/Chrysanthemum.jpg', 'other news', '2020-10-11 16:55:46', 'Buhari cancelled SARS operatives', 'Buhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operativesBuhari cancelled SARS operatives\\r\\n'),
(7, 'SARS killed a young boy in ogbomosho oyo state', 'alexis', 'SARS killed a young boy in ogbomosho oyo state', '../images/pexels-photo-1089438.jpeg', 'other news', '2020-10-11 16:57:45', 'SARS killed a young boy in ogbomosho oyo state', 'SARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo stateSARS killed a young boy in ogbomosho oyo state\\r\\n'),
(8, 'Nigeria Army to recruit SARS operatives', 'unitech', 'Nigeria Army to recruit SARS operatives', '../images/testimonials-2.png', 'other news', '2020-10-11 17:00:10', 'Nigeria Army to recruit SARS operatives', 'Nigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operativesNigeria Army to recruit SARS operatives\\r\\n'),
(9, 'basketball to be scrapped in nigeria\\\\\\\'s sport', 'alexis', 'basketball to be scrapped in nigeria\\\\\\\'s sport', '../images/ogimage.jpg', 'sports', '2020-10-20 16:12:27', 'basketball to be scrapped in nigeria\\\\\\\'s sport', '<p>basketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sportbasketball to be scrapped in nigeria&#39;s sport\\r\\n</p>\r\n'),
(10, 'Asuu embarks on indefinite strike', 'unitech', 'Asuu embarks on indefinite strike', '../images/landing-fast-free-html-landing-page-site-template.jpg', 'other news', '2020-10-11 17:31:09', 'Asuu embarks on indefinite strike', 'Asuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strikeAsuu embarks on indefinite strike\\\\r\\\\n\\r\\n'),
(11, 'Buhari sent warning to cricket sport players', 'unitech', 'Buhari sent warning to cricket sport players', '../images/58460647_103785474172027_1292885830129418240_n.jpg', 'sports', '2020-10-20 16:13:14', 'Buhari sent warning to cricket sport players', '<p>Buhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport players\\r\\n</p>\r\n'),
(12, 'Buhari sent warning to cricket sport players', 'alexis', 'Buhari sent warning to cricket sport players', '../images/66323328_105078234141204_494603941271568384_n.jpg', 'sports', '2020-10-20 16:13:42', 'Buhari sent warning to cricket sport players', '<p>Buhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport playersBuhari sent warning to cricket sport players\\r\\n</p>\r\n'),
(13, 'popular female footballer gang raped in abuja', '', 'popular female footballer gang raped in abuja', '../images/computer-code-abstract-illustration-KG56R9 - Copy.jpg', 'sports', '2020-10-20 16:14:07', 'popular female footballer gang raped in abuja', '<p>popular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abujapopular female footballer gang raped in abuja\\r\\n</p>\r\n'),
(17, 'why i left my ex wife - ronaldo', 'alexis', 'why i left my ex wife - ronaldo', '../images/57295289-twisting-tunnel-of-digital-binary-computer-code-.jpg', 'flashback', '2020-10-11 18:35:48', 'why i left my ex wife - ronaldo', 'why i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldo\\r\\n'),
(18, 'why i left my ex wife - ronaldo', 'alexis', 'why i left my ex wife - ronaldo', '../images/57295289-twisting-tunnel-of-digital-binary-computer-code-.jpg', 'flashback', '2020-10-11 19:46:52', 'why i left my ex wife - ronaldo', 'why i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldowhy i left my ex wife - ronaldo\\r\\n'),
(19, 'this is a popular post 1', 'unitech', 'this is a popular post 1', '../images/download (2).jpg', 'Popular', '2020-10-17 18:12:58', 'this is a popular post 1', 'this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1this is a popular post 1\\r\\n'),
(20, 'this is a popular post 2', 'unitech', 'this is a popular post 2', '../images/garrithree.jpg', 'Popular', '2020-10-17 18:14:22', 'this is a popular post 2', 'this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2this is a popular post 2\\r\\n'),
(21, 'this is a popular post 3', 'unitech', 'this is a popular post 3', '../images/pexels-photo-1089440.jpeg', 'Popular', '2020-10-17 18:15:20', 'this is a popular post 3', 'this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3this is a popular post 3\\r\\n'),
(22, 'this is a popular post 4', 'unitech', 'this is a popular post 4', '../images/sheatwo.jpg', 'Popular', '2020-10-19 10:36:27', 'this is a popular post 4', '<p><img alt=\"kiss\" src=\"http://localhost//unitechblog/ckeditor/plugins/smiley/images/kiss.png\" style=\"height:23px; width:23px\" title=\"kiss\" /><img alt=\"broken heart\" src=\"http://localhost//unitechblog/ckeditor/plugins/smiley/images/broken_heart.png\" style=\"height:23px; width:23px\" title=\"broken heart\" /><img alt=\"angel\" src=\"http://localhost//unitechblog/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"devil\" src=\"http://localhost//unitechblog/ckeditor/plugins/smiley/images/devil_smile.png\" style=\"height:23px; width:23px\" title=\"devil\" />hiiiiiithis is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4hfhhfh hfthis is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4this is a popular post 4\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n</p>\r\n'),
(23, 'APC merged with PDP', 'alexis', 'pdp merged with apc', '../images/IMG-20191106-WA0013.jpg', 'politics', '2020-12-08 17:01:33', 'PDP, APC, pdp merged apc', '<p>APC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDP</p>\r\n'),
(24, 'APC merged with PDP', 'alexis', 'pdp merged with apc', '../images/IMG-20191106-WA0013.jpg', 'politics', '2020-12-08 17:01:46', 'PDP, APC, pdp merged apc', '<p>APC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDP</p>\r\n'),
(25, 'APC merged with PDP', 'alexis', 'pdp merged with apc', '../images/IMG-20191106-WA0013.jpg', 'politics', '2020-12-08 17:01:50', 'PDP, APC, pdp merged apc', '<p>APC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDP</p>\r\n'),
(26, 'APC merged with PDP', 'alexis', 'pdp merged with apc', '../images/IMG-20191106-WA0013.jpg', 'politics', '2020-12-08 17:01:53', 'PDP, APC, pdp merged apc', '<p>APC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDP</p>\r\n'),
(27, 'APC merged with PDP', 'alexis', 'pdp merged with apc', '../images/IMG-20191106-WA0013.jpg', 'politics', '2020-12-08 17:01:58', 'PDP, APC, pdp merged apc', '<p>APC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDPAPC merged with PDP</p>\r\n'),
(28, 'another politics story', 'alexis', 'politics story', '../images/download.png', 'politics', '2020-12-08 17:03:20', 'politics story', '<p>another politics story&nbsp;another politics story&nbsp;another politics storyanother politics story&nbsp;another politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics story</p>\r\n'),
(29, 'another politics story', 'alexis', 'politics story', '../images/download.png', 'politics', '2020-12-08 17:03:24', 'politics story', '<p>another politics story&nbsp;another politics story&nbsp;another politics storyanother politics story&nbsp;another politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics story</p>\r\n'),
(30, 'another politics story', 'alexis', 'politics story', '../images/download.png', 'politics', '2020-12-08 17:03:28', 'politics story', '<p>another politics story&nbsp;another politics story&nbsp;another politics storyanother politics story&nbsp;another politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics story</p>\r\n'),
(31, 'another politics story', 'alexis', 'politics story', '../images/download.png', 'politics', '2020-12-08 17:03:31', 'politics story', '<p>another politics story&nbsp;another politics story&nbsp;another politics storyanother politics story&nbsp;another politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics story</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `subusers`
--

CREATE TABLE `subusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subusers`
--

INSERT INTO `subusers` (`id`, `fullname`, `username`, `email`, `password`, `regdate`) VALUES
(2, 'onatuga oluwafemi', 'alexis', 'oladayoahmod113@gmail.com', 'c3bf1ccbf78489182ec6e800f4ff1fd9', '2020-12-09 12:17:52'),
(6, 'oladayo ruqoyyah', 'nurse guru', 'ruqoyyah@gmail.com', 'c3bf1ccbf78489182ec6e800f4ff1fd9', '2020-09-27 08:31:34'),
(7, 'Ali Toheeb Ishola', 'Motunstech', 'allitoheebishola1@gmail.com', '60b294c3f0cef0fa50dc8fc0291b6985', '2020-10-07 17:49:33'),
(8, 'Ahmod Akorede', 'unitechdev', 'oladayoahmod112222@gmail.com', 'c3bf1ccbf78489182ec6e800f4ff1fd9', '2020-10-19 10:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Error reading structure for table blog.users: #1932 - Table 'blog.users' doesn't exist in engine
-- Error reading data for table blog.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `blog`.`users`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subusers`
--
ALTER TABLE `subusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_detail`
--
ALTER TABLE `admin_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `subusers`
--
ALTER TABLE `subusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
