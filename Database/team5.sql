-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 06:46 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team5`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`ArticleID` int(100) NOT NULL,
  `ArticleTitle` varchar(45) DEFAULT NULL,
  `ArticleContent` varchar(500) DEFAULT NULL,
  `Interest` varchar(45) DEFAULT NULL,
  `UserID` int(100) DEFAULT NULL,
  `ImgName` varchar(45) DEFAULT NULL,
  `ImgLocation` varchar(100) DEFAULT NULL,
  `DatePosted` datetime DEFAULT NULL,
  `ViewCount` int(11) DEFAULT NULL,
  `Flag` varchar(3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ArticleID`, `ArticleTitle`, `ArticleContent`, `Interest`, `UserID`, `ImgName`, `ImgLocation`, `DatePosted`, `ViewCount`, `Flag`) VALUES
(6, 'Titanfall for $5, Alienware Alpha, More Pre-B', 'Join Your Friends in the Fight. Join Your Friends in the Fight.Millions of gamers have already heard the words “Prepare for Titanfall” crackle over a radio. They’ve experienced the feeling of dropping a titan from orbit – of hearing the scream of a massive, 20-foot-tall mechanical monstrosity burning through the atmosphere. They’ve fought side-by-side with their titan, running on walls and climbing buildings as their robotic buddy laid waste to enemies. They’ve jumped into the titan to take cont', 'Games', 1, 'vy7bjwjbjhcgkb2w3hxx.gif', 'img/vy7bjwjbjhcgkb2w3hxx.gif', '2014-05-01 10:06:00', 23, 'No'),
(26, 'The publisher seeks to regain trust by offeri', 'The publisher seeks to regain trust by offering free content', 'Games', 12, '284299-new.jpg', 'img/284299-new.jpg', '2014-11-27 09:47:56', 0, 'Yes'),
(30, 'Batman Arkhma Knight', 'While we''ll have plenty to keep us busy later this year, particularly next month, a bunch of the games that are most testing my patience aren''t releasing until 2015. Batman: Arkham Knight is one of them. Today, Warner Bros. announced a worldwide launch date: June 2, 2015.', 'Games', 12, '280885-h1.jpg', 'img/280885-h1.jpg', '2014-11-27 10:04:18', 0, 'No'),
(31, 'Tales From the Borderlands', 'When Tales from the Borderlands was announced, it was met with cautious optimism. Telltale''s basic game structure that focuses on dialogue and choice seemed like a good way to explore the harsh planet of Pandora through the eyes of people who are not mass murderers. There are a lot of colorful characters on the planet, and not everybody has a backpack full of weapons and a thirst for blood.', 'Games', 12, '284164.jpg', 'img/284164.jpg', '2014-11-27 12:13:21', 1, 'No'),
(32, 'Review: Five Nights at Freddy''s 2', 'It feels like only a few weeks since Five Nights at Freddy''s managed to completely ruin my childhood memories of family restaurants and dancing animatronics. The creepy horror/resource management game put you in the shoes of a night security guard at the world''s worst Chuck E. Cheese''s knock-off and made sure you''d never look at those restaurants the same way again after viewing them through the distorted lens of static-ridden security cameras.', 'Games', 12, '283960.jpg', 'img/283960.jpg', '2014-11-27 12:19:35', 0, 'No'),
(33, 'Review Far Cry 4', 'Away from the archipelago of the Rook Islands, we now find ourselves in the vast expanse of the Himalayas in a land called Kyrat. The new protagonist, Ajay Ghale, has returned to his homeland to spread his mother''s ashes in Kyrat at her request. The only problem is Pagan Min, the ruling warlord. Min has history with Ajay''s family, and knows he''s coming. Ajay is thrown in the middle of an all-out war between Min and the Golden Path, a resistance movement led by Ajay''s father, thus sparking the na', 'Games', 12, 'FC4.jpg', 'img/FC4.jpg', '2014-11-27 12:21:42', 0, 'No'),
(34, 'Review Assassin''s Creed Rogue', 'hile it''s loathsome to reference other games for detail in a review, it''s near impossible not to in the case of Assassin''s Creed Rogue. This is nothing more than a patchwork quilt of Black Flag''s systems (right down to the interface and fonts) with other Assassin''s Creed ideas sprinkled in liberally. It plays like a greatest hits album of the franchise, and while some might welcome that, it''s difficult to heartily applaud the effort.', 'Games', 12, 'Rogue1.jpg', 'img/Rogue1.jpg', '2014-11-27 12:23:24', 0, 'No'),
(35, 'Review Assassin''s Creed Unity', 'Unity once again adapts entirely to an iconic period in world history: the French Revolution of the 18th century. Without delay you''re reintroduced to the timeless battle of the Templars and Assassins, but this time, the former are on the defensive after a witch hunt from the ruling class. It''s at this tenuous time that you''ll meet Arno Dorian, the hero of the tale. Much like Ezio, Arno''s father is killed right at the start, which leads him to the discovery of a conspiracy involving the two majo', 'Games', 12, 'AC3.jpg', 'img/AC3.jpg', '2014-11-27 12:27:24', 1000, 'Yes'),
(36, 'HG 1/144 Beargguy III - Released in Japan! ', ' This item is a posable, high-grade or better injection-plastic kit of an item from the Gundam universe.  \r\n\r\nHighly detailed and articulated snapfit kit, molded in mutliple colors with stickers for the markings. ', 'Modelkits', 1, 'bearguy.jpg', 'img/bearguy.jpg', '2014-11-27 12:33:16', 0, 'No'),
(37, '1/72 The Combat Tanks Collection #02', ' Product Description\r\nThis item is a book or magazine about tanks/AFVs and/or military modeling.  \r\n\r\nThis issue features a nicely finished 1/72-scale Type 61 from the 10th Tank Battlion 10th Division, Japan 1993. The model comes mounted on a base in a clear plastic dispay case to help protect it from dust and fingerprints.', 'Modelkits', 1, 'digwc02_0.jpg', 'img/digwc02_0.jpg', '2014-11-27 12:37:15', 0, 'No'),
(38, '1/144 HGUC Zeta Gundam', 'Bandai''s new HGUC Zeta Gundam transforms into the Wave Rider after completion! Nicely detailed as is usual from Bandai, highly posable, and it comes with a beam saber, beam rifle, and hyper mega-launcher. Molded in colored plastic and featuring snap assembly, you''ll be playing around with and transforming it in no time!', 'Modelkits', 1, 'ban922241_0.jpg', 'img/ban922241_0.jpg', '2014-11-27 12:39:18', 0, 'Yes'),
(39, 'Penguins Of Madagascar', 'Discover the secrets of the most entertaining and mysterious birds \nin the global espionage game: Skipper, Kowalski, Rico and Private now \nmust join forces with the chic spy organization, the North Wind, led by Agent \nClassified (we could tell you his name, but then... you know), voiced by Benedict \nCumberbatch, to stop the villainous Dr. Octavius Brine, voiced by John Malkovich, \nfrom taking over the world.', 'Movies', 1, 'img5247.jpg', 'img/img5247.jpg', '2014-09-01 10:06:00', 5, 'No'),
(40, 'Rise Of The Legend', 'This is the story of Fei, a young man who is destined to become a master of his time, and an everlasting legend in the world of martial arts. In 1868 during the \nlate Qing Dynasty, rampant corruption on the Imperial Court inflicts much suffering in peoples lives. \nIn Guangzhou, two crime factions run the Huangpu Port: The Black Tiger and the Northern Sea. \nThe gangs rule the port by striking fear into the hearts of the poor and helpless. On the outside, \nit appears to be a place of opportunities', 'Movies', 5, 'img3247.jpg', 'img/img3247.jpg', '2014-02-11 09:45:00', 0, 'No'),
(41, 'Horrible Bosses 2', 'Fed up with answering to higher-ups, Nick (Bateman), Dale (Day) and Kurt (Sudeikis) decide to become their own \nbosses by launching their own business in "Horrible Bosses 2". \nBut a slick investor soon pulls the rug out from under them. \nOutplayed and desperate, and with no legal recourse, \nthe three would-be entrepreneurs hatch a misguided plan \nto kidnap the investors adult son and ransom him to regain \ncontrol of their company.', 'Movies', 3, 'img5248.jpg', 'img/img5248.jpg', '2014-10-11 09:06:00', 10, 'No'),
(42, 'Disneys Big Hero 6', 'With all the heart and humor audiences expect from Walt Disney Animation Studios, \nBig Hero 6 is an action-packed comedy-adventure about robotics prodigy Hiro Hamada, \nwho learns to harness his genius - thanks to his brilliant brother Tadashi and their \nlike-minded friends: adrenaline junkie Go Go Tamago, neatnik Wasabi, \nchemistry whiz Honey Lemon and fanboy Fred. When a devastating turn of events catapults them \ninto the midst of a dangerous plot unfolding in the streets of San Fransokyo, Hiro', 'Movies', 2, 'img5244.jpg', 'img/img5244.jpg', '2014-11-11 04:06:00', 2, 'No'),
(43, 'Ungli', 'Abhay (a crime journalist), Maya (a medical intern), Goti \n(a computer hardware specialist) and Kalim (the owner of a garage) \nare four friends. They began their friendship when they met at a gym, \nrun by their trainer Ricky. Over the period of a couple of years, all five of \nthem have become a close knit gang. Then one day, Ricky is run over by a young man called \nAnshuman Dayal. Dayal was drinking and driving, but since his father was a fixer for the police, \nhe got away scott-free. When the f', 'Movies', 9, 'img4457.jpg', 'img/img4457.jpg', '2014-01-11 07:06:00', 4, 'No'),
(44, 'Dearest', 'TShenzhen, Southern China - When their 3-year old son goes missing. \nTIAN WEN-JUN and his ex-wife, LU XIAO-JUN, find their ordinary lives thrown into complete turmoil. \nOverwhelmed with guilt, they struggle to cope with the never-ending nightmare that most people would \nbe unable to comprehend. They comb through half the country in search of their child but to no avail. \nThe waiting is the hardest thing to endure but they persevere, clinging to the faintest glimmer of \nhope – even if it comes in', 'Movies', 2, 'img3238.jpg', 'img/img3238.jpg', '2014-01-11 07:45:00', 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`UserID` int(11) NOT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Admin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `Password`, `Admin`) VALUES
(1, 'Hiu Fung', 'hiufung@gmail.com', '$2y$10$97oR7Q0fMDwp2GJVtF4ODO7XclU8DkLySEVonyRRa3ajKgtHOEt2y', 'Yes'),
(2, 'Admin', 'Admin@gmail.com', '$2y$10$jrVQs6mvIlY/EtzhgB1TuOYP7l7RL5XVtV7C2P8DVjAHGO5zz0HMq', 'No'),
(3, 'Arnold', 'arnold@yahoo.com.sg', '$2y$10$Z6.bIu04bZO.pPJusGTKgelBnGK65/PlkGC51b4FPZ9Mjq4JHTHuK', 'No'),
(5, 'Steven', 'Steven@gmail.com', '$2y$10$N38GiEKqqHkj7jFU4v1bXuOg5I0MlwBH6tfSVqZRDV9vJO0x7Q/ca', 'No'),
(9, 'Peter Low', 'PeterLow@gmail.com', '$2y$10$cXw7WM4tke/uKJCY4IuetuO683NFRkuhLhshQz.hJdWPDlDJeG28e', 'No'),
(12, 'John', 'Password2@hotmail.com', '$2y$10$G502jR7XHteHM0qA0wjqe.C8aquv/t76eHkpfu0n4F1FkWAGmlquO', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`ArticleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`UserID`), ADD UNIQUE KEY `UserID_UNIQUE` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
MODIFY `ArticleID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
