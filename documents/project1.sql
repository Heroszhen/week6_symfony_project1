-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 11, 2020 at 03:15 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `photo`, `created`) VALUES
(1, 'Alexandra Daddario\'s 5 Best (& 5 Worst) Films, According To Rotten Tomatoes', 'Once a child star known for her role on the TV show All My Children but admittedly not much else, Alexandra Daddario slowly rose from B-movie unknown to Hollywood starlet in a matter of years, beginning with her pivotal role in the Percy Jackson franchise.\r\n\r\nRELATED:\r\nAll My Children: All Of Erica Kane\'s Marriages, Ranked From Worst To Best\r\n\r\nSince then, she\'s greatly diversified her filmography to include quite a few blockbuster roles - although that\'s not to say her career hasn\'t had its fair share of bombs and stinkers. Review aggregator site Rotten Tomatoes has given each of her films a unique percentage rating; here\'s what they have to say about her best and worst efforts.', 'pjimage-35.jpg', '2020-08-10 00:00:00'),
(2, 'Alexandra Daddario featured on first poster for Lost Girls and Love Hotels', 'Earlier this month we saw the first trailer for Lost Girls and Love Hotels, and now a poster has been released for the upcoming drama featuring Alexandra Daddario (Baywatch, San Andreas); take a look at the teaser poster here…\r\n\r\nLost-Girls-and-Love-Hotels-Key-A-600x878 \r\n\r\n“Margaret (Alexandra Daddario) finds herself in the glittering labyrinth of Tokyo by night and as a respected english teacher of a Japanese flight attendant academy by day. With little life direction, Margaret searches for meaning with fellow ex-pats (Carice Van Houten) in a Japanese dive bar, drinking to remember to forget and losing herself in love hotel encounters with men who satisfy a fleeting craving. When Margaret crosses paths with a dashing Yakuza, Kazu (Takehiro Hira), she falls in love with him despite the danger and tradition that hinders their chances of being together. We follow Margaret through the dark and light of love and what it means to find oneself abroad with a youthful abandon.”\r\n\r\nlost-girls-and-love-hotels-2-600x338 \r\n\r\nLost Girls and Love Hotels is set for release on September 4th.', 'Lost-Girls-and-Love-Hotels-Key-A.jpg', '2020-08-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `photo`) VALUES
(1, 'scooter', '5e94741b9e442.jpeg'),
(2, 'vélo', '5e94741ba0a5c.jpeg'),
(3, 'caisson', '5e94741ba151f.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `text1` longtext COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `text1`, `map`) VALUES
(1, '<div>\r\n                        <strong>Vertek</strong>\r\n                        <div  class=\"text-black-50\">\r\n                            Paris , France , Terre \r\n                        </div>\r\n                        <div class=\"text-black-50\">\r\n                            Tel: +33 (0)1 11 11 11 11\r\n                        </div>\r\n                        <div class=\"text-black-50\">\r\n                            Email: gmail@gmail.com\r\n                        </div>\r\n                    </div>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167998.10803373056!2d2.206977064368058!3d48.858774103123785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1597133348642!5m2!1sfr!2sfr\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descritpion` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `descritpion`, `photo`) VALUES
(1, 1, 'TK-A', '111', '<div>\r\nType de batterie: amovible\r\n</div>\r\n<div>\r\nVitesse: 45km/h\r\n</div>\r\n<div>\r\n100% charge: 5h\r\n</div>\r\n<div>\r\nMasse: 164kg\r\n</div>\r\n<div>\r\nLong: 2050mm\r\n</div>', 'tka.jpg'),
(2, 1, 'TK-F', '112', '<div>\r\nType de batterie: fixe\r\n</div>\r\n<div>\r\nVitesse: 45km/h\r\n</div>\r\n<div>\r\n100% charge: 5-10h\r\n</div>\r\n<div>\r\nMasse: 164kg\r\n</div>\r\n<div>\r\nLong: 2050mm\r\n</div>', 'tkf.jpg'),
(3, 1, 'TK-II', '123', '<div>\r\nType de batterie: fixe\r\n</div>\r\n<div>\r\nVitesse: 45km/h\r\n</div>\r\n<div>\r\n100% charge: 5h\r\n</div>\r\n<div>\r\nMasse: 114kg\r\n</div>\r\n<div>\r\nLong: 1850mm\r\n</div>', 'tkii.jpg'),
(4, 2, 'DEVRON', '33', '<div>\r\nMoteur: 36v brushle dans roue avant\r\n</div>\r\n<div>\r\nPuissance: 250W\r\n</div>\r\n<div>\r\nDisplay: Leds\r\n</div>\r\n<div>\r\nBatterie: Li-ion 36v/13Ah dans porte bagage\r\n</div>\r\n<div>\r\nAutonomie: 60-80km\r\n</div>', 'devron.jpg'),
(5, 3, 'VTK01', '50', '<div>\r\nDimension interne: 560x530x470\r\n</div>\r\n<div>\r\nPoids: 8kg\r\n</div>', '5e9af28e163ce.jpeg'),
(6, 3, 'VTK02', '666', '<div>\r\nDimension interne: 560x530x470\r\n</div>\r\n<div>\r\nPoids: 64kg\r\n</div>', '5e9da8b39aa7c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `link`) VALUES
(1, 'https://img.cinemablend.com/quill/f/3/d/7/5/9/f3d7591f967beacb0c09a1f59b31ffe6936e9f55.jpg'),
(2, 'https://img09.rl0.ru/afisha/e1425x712p0x0f1920x962q65i/s.afisha.ru/mediastorage/5d/61/78128c747fe04c4a9edd980b615d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
