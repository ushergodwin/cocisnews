-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2022 at 02:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocis_news`
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
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `body` longtext NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `commented_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `body`, `user_agent`, `post_id`, `commented_at`) VALUES
(1, 'Patricia', 'Wow, this is amazing. I can\'t wait', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 34, '2022-09-04 12:01:42'),
(2, 'Kamukama Solomon', 'Great stuff', NULL, 34, '2022-09-04 12:58:39');

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
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(31, 'another politics story', 'alexis', 'politics story', '../images/download.png', 'politics', '2020-12-08 17:03:31', 'politics story', '<p>another politics story&nbsp;another politics story&nbsp;another politics storyanother politics story&nbsp;another politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics storyanother politics story</p>\r\n'),
(32, 'Mak-CoCIS Sets up the “Smart Classroom facility”, worth over $50,000', 'unitech', 'College of computing and information science', '../images/The-front-view-of-a-section-of-the-50-computers-recieved-and-installed-in-the-Smart-Classroom-at-Makerere-scaled.jpg', 'latest', '2022-09-04 08:49:30', 'COCIS', '<p>Makerere University College of Computing and Information Sciences (COCIS) has installed the Smart Classroom facility worth over $ 50,000 US dollars. The mini launch and demonstration will be conducted on&nbsp;<strong>Friday 9<sup>th</sup>&nbsp;September 2022</strong>.</p>\r\n\r\n<p>The facility accommodating 50 computers will be used for recording, broadcasting, and automation in the classroom including monitoring the examination, quizzes, and any other form of assessment.</p>\r\n\r\n<p>The establishment of the smart classroom system at Makerere University has been funded by the Chinese taxpayer and education technology companies (the UNESCO International Centre for Higher Education Innovation (ICHEI) and China&rsquo;s International Institute of Online Education) under the auspices of UNESCO.</p>\r\n\r\n<p>The university has provided space and furniture, manpower, local experts, support team and salaries, cabling, electricity, internet, lighting, and security system among others.</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Mak-CoCIS-IT-experts-Badru-Ssekumba-Baluku-Hert-and-Nicholas-Betungye-testing-the-smart-classroom-system-during-the-final-connectivity-scaled.jpg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Mak-CoCIS-IT-experts-Badru-Ssekumba-Baluku-Hert-and-Nicholas-Betungye-testing-the-smart-classroom-system-during-the-final-connectivity-300x200.jpg\" style=\"height:200px; width:300px\" /></a></p>\r\n\r\n<p>Mak-CoCIS IT experts Badru Ssekumba, Baluku Hert and Nicholas Betungye testing the smart classroom system during the final connectivity</p>\r\n\r\n<p>The Principal CoCIS, Prof. Tonny Oyana said, in 2018, Makerere University College of Computing and Information Sciences together with Create View Education Technology, UNESCO-ICHEI, and Southern University of Science and Technology, China signed a partnership agreement to collaborate in research, teaching, ICT industry, and community engagement activities.</p>\r\n\r\n<p>&ldquo;As a result of this partnership, we received a highly valued donation of Smart Classroom educational equipment. Our core three strategic academic Chinese partners (Southern University of Science and Technology, Shenzhen, China; International Centre for Higher Education Innovation under the auspices of UNSECO (ICHEI), Shenzhen; and Guangzhou&rsquo;s CreateView Educational Technology Co., Ltd.).&rdquo; Prof. Oyana explained.</p>\r\n\r\n<p>The Smart Classroom facility is going to be the first in the history of Uganda. The representative of the UNESCO International Centre for Higher Education Innovation (ICHEI) and China&rsquo;s International Institute of Online Education, Hassan Adeel Shehzad stressed that there are computer laboratories, good studios, and touch panels in Uganda&rsquo;s institutions but the smart room facility at COCIS will integrate all these, combined under one roof.</p>\r\n\r\n<p>Hassan Adeel Shehzad is the program specialist and project lead of the Smart Classroom System. Adeel was at Makerere on 1<sup>st&nbsp;</sup>and 2nd September 2022 to engage the college leadership and staff to implement the Smart Classroom project and also ensure the last connectivity of the smart classroom facility at the CoCIS.</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Mak-CoCIS-IT-experts-Nicholas-Betungye-Badru-Ssekumba-and-Baluku-Herbert-on-the-final-touches-of-the-smart-classroom-scaled.jpg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Mak-CoCIS-IT-experts-Nicholas-Betungye-Badru-Ssekumba-and-Baluku-Herbert-on-the-final-touches-of-the-smart-classroom-300x200.jpg\" style=\"height:203px; width:305px\" /></a></p>\r\n\r\n<p>Mak-CoCIS IT experts Nicholas Betungye, Badru Ssekumba and Baluku Herbert on the final touches of the smart classroom</p>\r\n\r\n<p>Adeel said, that UNESCO-ICHEI is working with the top Chinese education technology companies based on the UNESCO mandate to promote SDG4 for quality education by integrating the technological advantage within Shenzhen &ndash; the world&rsquo;s leading technology city in China.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Shenzhen city, he said is trying to assist the rest of the countries in the world by matching the UNESCO mission and vision and bringing the city technological advantage, and integrating Chinese higher education massification experience.</p>\r\n\r\n<p>He explained that the Smart Classroom is an infrastructure that is a combination of software and capacity-building training aimed at empowering universities not to be worried about the hardware but to help them bring the latest technology entrance to the higher education system through the Smart Classroom in the daily teaching and learning process.</p>\r\n\r\n<p>&ldquo;We are building a recording system for universities so that the teachers can record their lectures alone or the entire classroom lecture of students and the lecturer teaching.</p>\r\n\r\n<p>Secondly, we are trying to broadcast the activities being conducted in the classroom to enable students away from campus and other cities and countries to join. &nbsp;Not only do we record the lectures, but also broadcast live on conference tools such as Zoom, Google meet, and Microsoft teams.</p>\r\n\r\n<p>We are also promoting blended learning from the perception of UNESCO Higher education learning intending to promote SDG4 and our call is to assist higher education at institutional, government and policy level&rdquo;, the expert explained.</p>\r\n\r\n<p>in Uganda, Adeel said, the target audience for the UNESCO- ICHEI Smart Classroom project are universities, teachers, and students to improve the quality of teaching and learning. &nbsp;Once fully established, the rest of the country, including government Ministries, departments, and Agencies will utilize the Smart Classroom for meetings, training, and workshops.</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Badru-Ssekumba-Hassan-Adeel-congratulates-local-expert-Baluku-Herbert-for-the-job-welldone-scaled.jpg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Badru-Ssekumba-Hassan-Adeel-congratulates-local-expert-Baluku-Herbert-for-the-job-welldone-300x200.jpg\" style=\"height:200px; width:300px\" /></a></p>\r\n\r\n<p>Badru Ssekumba, Hassan Adeel congratulates local expert Baluku Herbert for the job welldone</p>\r\n\r\n<p><strong>About the Smart Classroom project</strong></p>\r\n\r\n<p>By fully exploiting the potential of ICT, The International Centre for Higher Education Innovation under the auspices of (UNESCO-ICHEI) sets out to support the higher education system, improve ed</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ucation quality, and promote equity for education in the developing world. Joined by the Southern University of Science and Technology (SUSTech) and CreateView UNESCO ICHEI works with Makerere university to collaborative establish the Smart Classroom on its campus.</p>\r\n\r\n<p>The project will bring together the Smart Classroom functions to the university education system to facilitate advanced learning and cognition, as well as cooperation and participation. It will also develop cooperative research among teachers and students to enhance the effectiveness of academic activities. The project also aims to enable university teachers, students, and technology to make necessary changes to ICT application activities to provide a solid foundation for ICT-driven higher education innovation. Through the provision of the Smart Classroom facility, UNESCO-ICHEI and CreatView will work closely with Makerere University to encourage the development and integration of online courses into the university&rsquo;s curriculum to address challenges facing education in Uganda.</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Badru-Ssekumba-Hassan-Adeel-Nicholas-Betungye-and-Baluku-Herbert-jubilate-after-making-the-last-connectivity-of-the-Smart-Classroom-on-2nd-September-2022-at-Makerere-university-scaled.jpg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/Badru-Ssekumba-Hassan-Adeel-Nicholas-Betungye-and-Baluku-Herbert-jubilate-after-making-the-last-connectivity-of-the-Smart-Classroom-on-2nd-September-2022-at-Makerere-university-300x200.jpg\" style=\"height:200px; width:300px\" /></a></p>\r\n\r\n<p>Badru Ssekumba ,Hassan Adeel , Nicholas Betungye and Baluku Herbert jubilate after making the last connectivity of the Smart Classroom on 2nd September 2022 at Makerere university</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/A-rear-view-section-of-the-50-computers-received-and-installed-at-Makerere-s-Smart-Classroom-scaled.jpg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/09/A-rear-view-section-of-the-50-computers-received-and-installed-at-Makerere-s-Smart-Classroom-300x200.jpg\" style=\"height:200px; width:300px\" /></a></p>\r\n\r\n<p>A rear view section of the 50 computers received and installed at Makerere &lsquo;s Smart Classroom</p>\r\n'),
(33, 'Department of Library and Information Science (EASLIS) Gets New Head', 'unitech', 'Library and Information Science', '/opt/lampp/htdocs/cocis/admin/../images/WhatsApp-Image-2022-02-12-at-4.06.26-PM1.jpeg', 'other news', '2022-09-04 10:56:59', 'EASLIS', '<p>Joyce Bukirwa out-going Head of Dept for Library and Information Science handed over office to newly appointed substantive Head of Department Dr. Sarah Kaddu.Ceremony was on Thursday 10th February 2022 at the East African School of Library and Information Science(EASLIS).</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/02/WhatsApp-Image-2022-02-12-at-4.06.27-PM1.jpeg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/02/WhatsApp-Image-2022-02-12-at-4.06.27-PM1.jpeg\" style=\"height:317px; width:800px\" /></a></p>\r\n'),
(34, 'AI in Health Symposium', 'unitech', 'College of computing and information science', '/opt/lampp/htdocs/cocis/admin../images/WhatsApp-Image-2022-03-29-at-6.53.24-PM-263x263.jpeg', 'other news', '2022-09-04 11:05:40', 'COCIS', '<p>COCIS,CEDAT and the AI lab are set to hold an event, &quot;The AI in Health Symposium&quot; today Thursday 7th April 2022. You can join us online via this link: https://zoom.us/webinar/register/WN_UTSAVDQkSXaOeKJyqo9k1w More details about the event can be found here: https://marconilab.org/events/ai4health-symposium-2022</p>\r\n\r\n<p><a href=\"https://cis.mak.ac.ug/wp-content/uploads/2022/04/WhatsApp-Image-2022-03-29-at-1.57.10-PM.jpeg\"><img alt=\"\" src=\"https://cis.mak.ac.ug/wp-content/uploads/2022/04/WhatsApp-Image-2022-03-29-at-1.57.10-PM.jpeg\" style=\"height:607px; width:1080px\" /></a></p>\r\n\r\n<p>COCIS,CEDAT and the AI lab are set to hold an event, &ldquo;The AI in Health Symposium&rdquo; today Thursday 7th April 2022.</p>\r\n\r\n<p>You can join us online via this link: https://zoom.us/webinar/register/WN_UTSAVDQkSXaOeKJyqo9k1w</p>\r\n\r\n<p>More details about the event can be found here: https://marconilab.org/events/ai4health-symposium-2022</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `body` longtext NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `replied_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `name`, `body`, `comment_id`, `user_agent`, `replied_at`) VALUES
(1, 'Bob Alex', 'Me too, see you there, Patricia', 1, NULL, '2022-09-04 13:18:47');

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
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `num`, `post_id`) VALUES
(1, 5, 34),
(2, 2, 32),
(3, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subusers`
--
ALTER TABLE `subusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subusers`
--
ALTER TABLE `subusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
