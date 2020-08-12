-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 12 août 2020 à 15:56
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project1`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `photo`, `created`) VALUES
(1, 'Alexandra Daddario\'s 5 Best (& 5 Worst) Films, According To Rotten Tomatoes', 'Once a child star known for her role on the TV show All My Children but admittedly not much else, Alexandra Daddario slowly rose from B-movie unknown to Hollywood starlet in a matter of years, beginning with her pivotal role in the Percy Jackson franchise.\r\n\r\nRELATED:\r\nAll My Children: All Of Erica Kane\'s Marriages, Ranked From Worst To Best\r\n\r\nSince then, she\'s greatly diversified her filmography to include quite a few blockbuster roles - although that\'s not to say her career hasn\'t had its fair share of bombs and stinkers. Review aggregator site Rotten Tomatoes has given each of her films a unique percentage rating; here\'s what they have to say about her best and worst efforts.', 'pjimage-35.jpg', '2020-08-10 00:00:00'),
(2, 'Alexandra Daddario featured on first poster for Lost Girls and Love Hotels', 'Earlier this month we saw the first trailer for Lost Girls and Love Hotels, and now a poster has been released for the upcoming drama featuring Alexandra Daddario (Baywatch, San Andreas); take a look at the teaser poster here…\r\n\r\nLost-Girls-and-Love-Hotels-Key-A-600x878 \r\n\r\n“Margaret (Alexandra Daddario) finds herself in the glittering labyrinth of Tokyo by night and as a respected english teacher of a Japanese flight attendant academy by day. With little life direction, Margaret searches for meaning with fellow ex-pats (Carice Van Houten) in a Japanese dive bar, drinking to remember to forget and losing herself in love hotel encounters with men who satisfy a fleeting craving. When Margaret crosses paths with a dashing Yakuza, Kazu (Takehiro Hira), she falls in love with him despite the danger and tradition that hinders their chances of being together. We follow Margaret through the dark and light of love and what it means to find oneself abroad with a youthful abandon.”\r\n\r\nlost-girls-and-love-hotels-2-600x338 \r\n\r\nLost Girls and Love Hotels is set for release on September 4th.', 'Lost-Girls-and-Love-Hotels-Key-A.jpg', '2020-08-03 00:00:00'),
(3, 'Actress Alexandra Daddario Dating CONFIRMED!! Who is her boy friend? Tap to Explore', 'An American actress Alexandra Anna Daddario who gained huge recognition as Summer Quinn in Baywatch.\r\n\r\nMoreover, she acted in many hit movies like “San Andreas, Percy Jackson, ” movie series.\r\n\r\n\r\n\r\n\r\n\r\nThe 34-year-old actress dated many celebrities and has been at least four relationships to date.\r\n\r\nDaddario’s first love date was Jason Fuchs.\r\n\r\nThey begin dating in 2006, and they broke up their relationship in 2009.\r\n\r\nBetween the ups and downs of their relationship, she hooked up with her co-actor Baywatch Zac Efron.\r\n\r\nBut she made it very clear that they were friends.\r\n\r\n\r\n\r\n\r\nFurthermore, she also in a short-lived relationship with Trey Songz in 2011. She also dated Logan Lerman in 2014.\r\n\r\nBut they also split after a year.\r\n\r\nThey were gambling than to have got engaged, but the thing ended when they split up.', 'images-1-15.jpeg', '2020-08-12 00:00:00'),
(5, 'Bootstrap 5 Removes jQuery Dependency', '<p>The&nbsp;<a href=\"https://blog.getbootstrap.com/2020/06/16/bootstrap-5-alpha/\">Bootstrap 5 Alpha</a>&nbsp;was released in June 2020. The new Bootstrap removes jQuery and no longer supports Internet Explorer (IE). The team said it&rsquo;s time to move on from &quot;what&rsquo;s outdated or no longer appropriate&quot;.</p><p>The&nbsp;<a href=\"https://getbootstrap.com/\">Bootstrap framework</a>, originally developed and open-sourced by Twitter, has been an indispensable tool for web developers. It provides a ready-to-use set of UI components and a grid system essential for adaptive web pages that need to display well across PC and mobile browsers. Since its inception, Bootstrap has always had a dependency on the jQuery framework. The&nbsp;<a href=\"https://jquery.com/\">jQuery framework</a>, originally created in 2006, is one of the most popular JavaScript frameworks of all time. It provides powerful language features and cross-browser compatibility in an era when web technologies are going through many challenges and experimentations to support a variety of use cases ranging from interactive web pages, single-page apps, AJAX requests, and mobile web apps.</p><p>Fast-forward to 2020, with JavaScript standards and dominant web browsers already supporting most of the features in jQuery, the Bootstrap team decided to move on. The Bootstrap 5 framework has removed jQuery as a requirement. It saved 85KB of minified JavaScript, which could be significant as Google starts to&nbsp;<a href=\"https://developers.google.com/web/updates/2018/07/search-ads-speed\">use page speed as a ranking factor for mobile web sites</a>, and&nbsp;<a href=\"https://webmasters.googleblog.com/2020/05/evaluating-page-experience.html\">soon for desktop web sites</a>&nbsp;as well. The Bootstrap team does this because Bootstrap 5 also no longer supports&nbsp;Internet Explorer. The team noted that all supported browsers provide jQuery replacement features in vanilla JavaScript. The decision to drop Internet Explorer is probably due to the fact that&nbsp;<a href=\"https://gs.statcounter.com/browser-market-share/desktop/worldwide\">IE&rsquo;s market share has now dropped below 3% even among Desktop PC users</a>.</p><p>Developer&nbsp;<a href=\"https://flaviocopes.com/\">Flavio Copes</a>&nbsp;has an article on&nbsp;<a href=\"https://flaviocopes.com/jquery/\">&quot;Should you use or learn jQuery in 2020.&quot;</a>&nbsp;In it, he pointed out vanilla JavaScript replacements from jQuery&rsquo;s most popular features. Here are some examples.</p><ul><li>Selecting DOM elements using the # or . notation:&nbsp;document.querySelector(&#39;.button&#39;)</li><li>Waiting for page DOM to load:&nbsp;document.addEventListener(&quot;DOMContentLoaded&quot;, () =&gt; { ... })</li><li>Executing AJAX requests:&nbsp;fetch(&#39;/api.json&#39;).then(response =&gt; response.text()).then(body =&gt; console.log(body))</li></ul><p>If developers create a new web application in 2020, jQuery will&nbsp;probably no longer be necessary. The web has finally evolved beyond jQuery.</p><p>Another benefit of dropping IE is that Bootstrap 5 supports CSS custom properties. They make CSS more flexible and even programmable. For some examples, check out the&nbsp;<a href=\"https://v5.getbootstrap.com/docs/5.0/content/tables/#how-do-the-variants-and-accented-tables-work\">docs on how to style tables</a>&nbsp;in Bootstrap 5.</p><p>Besides dropping jQuery, Bootstrap 5 also brings some notable features. Bootstrap 5 has an updated UI look and feel to focus more on-page content. It has a redesigned and better-looking set of custom form controls. It also has a new logo and&nbsp;<a href=\"https://blog.getbootstrap.com/2020/06/26/bootstrap-icons-alpha5/\">300+ additional icons</a>. For web sites that make heavy use of icons, the new SVG sprite allows developers to load all icons in a single SVG file and then use them as needed. That will likely increase web site performance and improve HTML readability.</p><p>The Bootstrap framework is open-source software available under the MIT license. Submitting bugs and fixes of&nbsp;<a href=\"https://v5.getbootstrap.com/\">Bootstrap 5 alpha</a>&nbsp;to the team via its&nbsp;<a href=\"https://github.com/twbs\">GitHub repo</a>&nbsp;are welcomed.</p>', '5f33b3f165d0f.jpeg', '2020-08-12 10:54:22');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `photo`) VALUES
(1, 'scooter', '5e94741b9e442.jpeg'),
(2, 'vélo', '5e94741ba0a5c.jpeg'),
(3, 'caisson', '5e94741ba151f.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `article_id`, `name`, `message`, `created`) VALUES
(1, 4, NULL, 'Héros zhen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non aliquam est, in ma', '2020-08-12 16:00:36'),
(2, 4, NULL, 'Héros zhen', 'ddqdfqsdf', '2020-08-12 16:07:40'),
(3, NULL, 5, 'abcdefg', 'etus pellentesque nunc, ut elementum libero magna tincidunt erat. Vestibulum interdum ullamcorper viverra. Cras leo tortor, molestie pharetra felis aliq', '2020-08-12 16:59:37');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `text1` longtext COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `about` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `text1`, `map`, `about`) VALUES
(1, '<p><strong>Vertek</strong></p><p>Paris , France , Terre</p><p>Tel: +33 (0)1 11 11 11 11</p><p>Email: gmail@gmail.com</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167998.10803373056!2d2.206977064368058!3d48.858774103123785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1597133348642!5m2!1sfr!2sfr\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '<p>Un v&eacute;ritable service en plus pour vos clients, la livraison &agrave; domicile. LiberBox est un syst&egrave;me unique et innovant en France, de location longue dur&eacute;e sp&eacute;cialement con&ccedil;u pour les professionnels de la livraison. LiberBox, comment sa marche? Les loyers sont attractifs et commence &agrave; partir de 119&euro; HT par mois. Possibilit&eacute; de nous laisser la gestion de l&#39;assurance de votre scooter. Les contrats sont d&#39;une dur&eacute;e d&#39;un an renouvelable, suivant votre besoin. La mobilit&eacute; &eacute;co responsable est un choix, LiberBox vous apporte la solution au d&eacute;fi qu&rsquo;est la livraison Z&eacute;ro &eacute;mission ! Profitez de scooters &eacute;lectriques beaux et performants pour vos livraisons. Simplifiez votre gestion des co&ucirc;ts. Renforcez votre pr&eacute;sence aupr&egrave;s de vos clients et augmentez votre chiffre d&rsquo;affaire sans que la gestion d&rsquo;une flotte de scooters soit une perte de temps pour vous.<br />&nbsp;</p><p>-&Eacute;CONOMIQUE: Loyer &agrave; partir de seulement 119&euro; HT par mois.</p><p>&nbsp;</p><p>-PRATIQUE: Red&eacute;couvrez le plaisir de livrer sans bruit, avec une grande capacit&eacute; de charge.</p><p>&nbsp;</p><p>-&Eacute;COLOGIQUE: Z&eacute;ro &eacute;mission, et une charge compl&egrave;te de la batterie pour moins d&#39;1&euro;.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
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
-- Structure de la table `product`
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
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `descritpion`, `photo`) VALUES
(1, 1, 'TK-A', '111', '<div>\r\nType de batterie: amovible\r\n</div>\r\n<div>\r\nVitesse: 45km/h\r\n</div>\r\n<div>\r\n100% charge: 5h\r\n</div>\r\n<div>\r\nMasse: 164kg\r\n</div>\r\n<div>\r\nLong: 2050mm\r\n</div>', 'tka.jpg'),
(2, 1, 'TK-F', '112', '<div>\r\nType de batterie: fixe\r\n</div>\r\n<div>\r\nVitesse: 45km/h\r\n</div>\r\n<div>\r\n100% charge: 5-10h\r\n</div>\r\n<div>\r\nMasse: 164kg\r\n</div>\r\n<div>\r\nLong: 2050mm\r\n</div>', 'tkf.jpg'),
(3, 1, 'TK-II', '123', '<div>\r\nType de batterie: fixe\r\n</div>\r\n<div>\r\nVitesse: 45km/h\r\n</div>\r\n<div>\r\n100% charge: 5h\r\n</div>\r\n<div>\r\nMasse: 114kg\r\n</div>\r\n<div>\r\nLong: 1850mm\r\n</div>', 'tkii.jpg'),
(4, 2, 'DEVRON', '33', '<div>\r\nMoteur: 36v brushle dans roue avant\r\n</div>\r\n<div>\r\nPuissance: 250W\r\n</div>\r\n<div>\r\nDisplay: Leds\r\n</div>\r\n<div>\r\nBatterie: Li-ion 36v/13Ah dans porte bagage\r\n</div>\r\n<div>\r\nAutonomie: 60-80km\r\n</div>', 'devron.jpg'),
(5, 3, 'VTK01', '50', '<div>\r\nDimension interne: 560x530x470\r\n</div>\r\n<div>\r\nPoids: 8kg\r\n</div>', '5e9af28e163ce.jpeg'),
(6, 3, 'VTK02', '666', '<div>\r\nDimension interne: 560x530x470\r\n</div>\r\n<div>\r\nPoids: 64kg\r\n</div>', '5e9da8b39aa7c.jpeg'),
(7, 2, 'Arcade Renaissance Noir', '10', '<p>Le v&eacute;lo <strong>Arcade renaissance noir </strong>est un mod&egrave;le <strong>tr&egrave;s confortable</strong> gr&acirc;ce &agrave; son cadre. Il vous offre une <strong>position tr&egrave;s droite</strong>. Ce mod&egrave;le entr&eacute;e de gamme offre toutes les qualit&eacute;s d&#39;un v&eacute;lo pratique et simple. <strong>Sobre et id&eacute;al pour la ville</strong>.</p><p>blabla</p>', '5f32dcd1378cc.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id`, `link`) VALUES
(1, 'https://img.cinemablend.com/quill/f/3/d/7/5/9/f3d7591f967beacb0c09a1f59b31ffe6936e9f55.jpg'),
(2, 'https://img09.rl0.ru/afisha/e1425x712p0x0f1920x962q65i/s.afisha.ru/mediastorage/5d/61/78128c747fe04c4a9edd980b615d.jpg'),
(4, 'https://www.allkpop.com/upload/2019/05/content/091034/njpg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `password`, `role`) VALUES
(1, 'Héros', 'zhen', 'aaa@gmail.com', '$2y$10$0Zo5//tHOQFVOBo6iLFQaui39eQyju31GFoQb5qaOnfmmyA1dbd8e', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C4584665A` (`product_id`),
  ADD KEY `IDX_9474526C7294869C` (`article_id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
