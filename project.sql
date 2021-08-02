-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 09:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `coachtask`
--

CREATE TABLE `coachtask` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `weight` int(10) NOT NULL,
  `task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coachtask`
--

INSERT INTO `coachtask` (`id`, `name`, `weight`, `task`) VALUES
(1, 'mahin', 1, 'Don\'t rush.'),
(2, 'courtois', 2, '20 Pull up after daily matches.'),
(3, 'lora', 1, 'pet koma beda!'),
(4, 'mack', 2, 'Run on the trademill at least 70 minutes daily.'),
(5, 'malw', 1, 'kakkakkakka'),
(6, 'mahin', 2, 'sdjbwiubdiwu');

-- --------------------------------------------------------

--
-- Table structure for table `fans`
--

CREATE TABLE `fans` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `team` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fans`
--

INSERT INTO `fans` (`id`, `name`, `team`, `status`) VALUES
(600101, 'Sarah Tendon', 'Barcelona', 'invalid'),
(600102, 'Victor Stanny', 'Barcelona', 'valid'),
(600105, 'Vermode Tnawell', 'Barcelona', 'valid'),
(600106, 'Guerto Panema', 'Barcelona', 'valid'),
(600107, 'Rodrique Enhell', 'Barcelona', 'invalid'),
(600108, 'Anabel Jupiter', 'Barcelona', 'valid'),
(600109, 'Lord Bawei', 'Barcelona', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `fixturesdeals`
--

CREATE TABLE `fixturesdeals` (
  `id` int(50) NOT NULL,
  `opponent` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixturesdeals`
--

INSERT INTO `fixturesdeals` (`id`, `opponent`, `location`, `date`) VALUES
(1, 'juventus', 'home', '2020-01-12'),
(2, 'liverpool', 'away', '2020-01-22'),
(3, 'arsenal', 'away', '2020-02-02'),
(4, 'real madrid', 'home', '2019-01-02'),
(5, 'barcelona ', 'away', '2020-02-01'),
(6, 'mancity', 'away', '2019-01-01'),
(7, 'psg', 'home', '2020-01-02'),
(9, 'jhakanaka', 'home', '2020-02-11'),
(10, 'srasha', 'home', '2020-02-20'),
(11, 'aaa', 'home', '2020-03-03'),
(12, 'bbb', 'home', '2020-02-20'),
(13, 'ccc', 'germany', '2020-11-20'),
(14, 'ddd', 'home', '2020-01-10'),
(15, 'eee', 'home', '2020-03-03'),
(16, 'fff', 'away', '2020-01-10'),
(17, 'ggg', 'home', '2020-02-03'),
(18, 'hhh', 'home', '2020-03-03'),
(19, 'ice', 'away', '2020-02-20'),
(20, 'beef', 'away', '2020-02-20'),
(21, 'rrr', 'away', '2020-02-20'),
(22, 'kkr', 'home', '2020-01-10'),
(23, 'bikko', 'janina', '2020-02-09'),
(24, 'hhaha', 'hehe', '2020-01-01'),
(25, 'uuu', 'home', '2020-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`name`, `email`, `password`, `usertype`) VALUES
('James Bond', 'bond007@gmail.com', 'Bond007', 'hr'),
('Geralt of Rivia', 'witcher@gmail.com', 'Witcher', 'hr'),
('LeBron James', 'james@yahoo.com', 'lfc2020', 'owner'),
('Ken Miles', 'miles@yahoo.com', 'wowow', 'physio'),
('Caroll Shelby', 'shelby@gmail.com', 'iloveburger', 'physio'),
('Jahid Hasan', 'jahid@gmail.com', 'wowow', 'fan'),
('Bruce Wayne', 'wayne@gmail.com', '123456', 'fan'),
('Tony Stark', 'tony@yahoo.com', 'genius3000', 'fan'),
('Mo Salah', 'salah@liverpool.com', 'kopp', 'player'),
('Sadio Mane', 'mane@liverpool.com', 'manemane', 'player'),
('Firmino', 'bobby@liverpool.com', 'brazil', 'player'),
('Alison ', 'allie@liverpool.com', 'becker', 'player'),
('Jurgen Klopp', 'kop@liverpool.com', 'Jurgen', 'coach'),
('Himi', 'himi@liverpool.com', 'lfcforever', 'receptio'),
('oooo', 'oooo@gmail.com', 'ce7ce9108ae218e4ee612b0b36e3ed1d', 'fan');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id`, `name`, `designation`, `mail`) VALUES
(1, 'mahin', 'player', 'Hello,Sir!how are you?'),
(2, 'shakil', 'player', 'Sorry ,Sir !'),
(3, 'nazim', 'player', 'Okay Sir!'),
(4, 'mack', 'player', 'Is it ok?'),
(5, 'virgil', 'player', 'No sir.It is really bad'),
(6, 'pedro', 'player', 'Okay sir! i am gonna do it');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(10) NOT NULL,
  `msg` varchar(512) DEFAULT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `msg`, `sender`, `receiver`, `time`) VALUES
(500101, ' Excitement, adrenaline, fans, and a perfectly manicured turf: these are all things that come to mind when thinking about a football stadium. One of the most impressive football stadiums I have ever been to is, \"Old Trafford.\" The first time I went there I was overwhelmed by the size, and beauty of it massive structure. It stands 422 feet high and can seat 60,000 roaring fans. Have you ever been in a football stadium? Have you ever been a fan of a football team? If you have you will know what I am talking a', 'Dranga Jr.', 'BJ Sergeo', '2020-09-21 06:38 PM'),
(500102, 'The first thing I noticed when entering the stadium were the fans. There were so many of them, most of them were wearing the black, and white uniforms of Newcastle United. It was so beautiful how they all looked the same. There was excitement and anticipation in the air as the thousands of fans started singing, and chanting for the teams.', 'Dranga Jr.', 'Balaji Alt', '2020-09-21 06:40 PM'),
(500103, 'The noise kept getting louder and louder as other fans arrived and joined in. There were thousands of fans, cramming their way into every available seat. The seats were made of cold, hard plastic, and painted black and white. They were really uncomfortable and sitting in them was a real pain. They were built so close together so you had to squeeze into them.', 'Dranga Jr.', 'BJ Sergeo', '2020-09-21 06:49 PM'),
(500104, 'The noise kept getting louder and louder as other fans arrived and joined in. There were thousands of fans, cramming their way into every available seat. The seats were made of cold, hard plastic, and painted black and white. They were really uncomfortable and sitting in them was a real pain. They were built so close together so you had to squeeze into them.', 'Roiter Holland', 'Dranga Jr.', '2020-09-21 10:13 PM'),
(500105, ' The stadium had loads of smells. You could smell the cold winter breeze. The aromas from different foods were so strong you could actually taste them in your mouth.', 'Roiter Holland', 'BJ Sergeo', '2020-09-21 10:14 PM'),
(500106, 'There was also a stench of old warm beer that had been spilled time and time again and stale urine from over excited fans not wanting to miss a minute of any game.', 'Roiter Holland', 'Balaji Alt', '2020-09-21 10:14 PM'),
(500107, 'Hello there hello...Hello there hello...Hello there hello...Hello there hello...Hello there hello...Hello there hello...', 'himi', 'BJ Sergeo', '2020-09-22 03:33 PM'),
(500109, '2020 Hello there hello...Hello there hello...Hello there hello...Hello there hello...Hello there hello...Hello there hello...', 'himi', 'Dranga Jr.', '2020-09-22 03:34 PM');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `team1` varchar(30) NOT NULL,
  `team2` varchar(30) NOT NULL,
  `place` varchar(30) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `name`, `team1`, `team2`, `place`, `date`) VALUES
(800101, 'Radefort Sealine Fan Match', 'Real Madrid', 'Barcelona', 'Radefort Sealine', '2020-09-12'),
(800102, 'Moreilo Ratt. Friendship Match', 'Real Madrid', 'Bayern Munich', 'Madrid', '2020-09-24'),
(800103, 'Revenford Friendship Match South Hall', 'Manchester United', 'Chelsea', 'Revenford, South Hall. Chelsea', '2020-09-26'),
(800104, 'Modus International tr345', 'Real Madrid', 'Chelsea', 'Tista River Side', '2020-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `ownerstaff`
--

CREATE TABLE `ownerstaff` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `joiningtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownerstaff`
--

INSERT INTO `ownerstaff` (`id`, `name`, `designation`, `joiningtime`) VALUES
(0, 'fahim', 'mid', '0000-00-00'),
(1, 'mahin', 'gk', '2001-09-20'),
(2, 'mugdho', 'ak', '2002-09-20'),
(3, 'shakil', 'nk', '2003-09-20'),
(4, 'arnob', 'dk', '2004-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `physioinjury`
--

CREATE TABLE `physioinjury` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `position` varchar(10) NOT NULL,
  `injury` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physioinjury`
--

INSERT INTO `physioinjury` (`id`, `name`, `position`, `injury`) VALUES
(1, 'mahin', 'gk', 'knee injury'),
(2, 'courtois', 'gk', ''),
(3, 'lora', 'defender', 'ankle twist'),
(4, 'mushfiq', 'defender', 'toe'),
(6, 'mack', 'Striker', 'toe injury');

-- --------------------------------------------------------

--
-- Table structure for table `physiotasks`
--

CREATE TABLE `physiotasks` (
  `id` int(10) NOT NULL,
  `task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physiotasks`
--

INSERT INTO `physiotasks` (`id`, `task`) VALUES
(3, 'JOgging regular 60 minutes'),
(4, 'adad'),
(8, 'Go to gym'),
(9, 'No smoking'),
(11, 'okay'),
(12, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `playerfixtures`
--

CREATE TABLE `playerfixtures` (
  `matchid` int(10) NOT NULL,
  `opponent` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playerfixtures`
--

INSERT INTO `playerfixtures` (`matchid`, `opponent`, `location`, `date`) VALUES
(1, 'Leicester City', 'Home', '2020-09-08'),
(2, 'Chelsea', 'Away', '2020-09-15'),
(3, 'Arsenal', 'Away', '2020-10-01'),
(4, 'Southampton', 'Home', '2020-09-24'),
(5, 'Aston Villa', 'Home', '2020-10-14'),
(6, 'Crystal Palace', 'Away', '2020-10-28'),
(7, 'Manchester United', 'Away', '2020-11-02'),
(8, 'Manchester City', 'Home', '2020-11-17'),
(9, 'Tottenham', 'Away', '2020-11-29'),
(10, 'Sheffield United', 'Home', '2020-12-08'),
(11, 'Newcastle United', 'Home', '2020-12-15'),
(12, 'West Ham United', 'Home', '2020-12-29'),
(13, '', '', '0000-00-00'),
(14, '', '', '0000-00-00'),
(13, 'Leicester City', 'Away', '2021-01-04'),
(14, 'Crystal Palace', 'Away', '2021-01-10'),
(15, 'Tottenham', 'Away', '2021-01-18'),
(16, 'Sheffield United', 'Home', '2021-01-29'),
(17, 'Aston Villa', 'Home', '2021-02-02'),
(18, 'Southampton', 'Home', '2021-02-09'),
(19, 'Real Madrid', 'Away', '2021-03-09'),
(20, 'Juventus', 'Away', '2021-03-24'),
(21, 'Manchester United', 'Home', '2021-04-21'),
(22, 'Manchester City', 'Home', '2021-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `playerinfo`
--

CREATE TABLE `playerinfo` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `postion` int(11) NOT NULL,
  `fitness` int(11) NOT NULL,
  `injuries` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playerinfo`
--

INSERT INTO `playerinfo` (`id`, `name`, `postion`, `fitness`, `injuries`, `rating`) VALUES
(0, 'nazim', 0, 0, 0, 0),
(1, 'mahin', 11, 50, 2, 90),
(2, 'courtois', 12, 80, 0, 90);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rate` int(5) DEFAULT NULL,
  `team` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `rate`, `team`) VALUES
(1, 'Cristiano Ronaldo', 3, 'Real Madrid'),
(2, 'Juerno Rodrique', 4, 'Barcelona'),
(4, 'Arvan Radle', 1, 'Paris Saint Germania'),
(5, 'Terpie Moya', 2, 'Juventus'),
(200101, 'Hangerson', 3, 'Real Madrid'),
(200102, 'Dravid', 3, 'Barcelona'),
(200104, 'Renold Beckham', 3, 'Arsenal FC'),
(200105, 'Tervara Sanculie', 3, 'Real Madrid'),
(200106, 'Telebu Saint', 2, 'Manchester United');

-- --------------------------------------------------------

--
-- Table structure for table `salarydealing`
--

CREATE TABLE `salarydealing` (
  `name` varchar(15) NOT NULL,
  `position` varchar(15) NOT NULL,
  `salary` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salarydealing`
--

INSERT INTO `salarydealing` (`name`, `position`, `salary`) VALUES
('ronaldo', 'striker', 1000000),
('neyemar', 'striker', 100000),
('bale', 'mid', 10000),
('nati', 'mid', 1000),
('fsa', 'fd', 1212),
('ewe', 'tt', 12234),
('fgfg', 'f', 33333),
('ffghgjh', 'rer', 22234),
('fd', 'g', 33345),
('h', 'e', 77778),
('ytgg', 'h', 33333),
('rtrt', 'r', 888887),
('f', 'fff', 33232),
('gh', 'h', 6656),
('akib', 'mid', 4000),
('binod', 'def', 12345),
('hasan', 'mid', 53435),
('kaka', 'striker', 5242422);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `date` date NOT NULL,
  `match` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`date`, `match`, `venue`, `time`) VALUES
('2020-10-17', 'Everton - Liverpool', 'Goodison Park', '20:00:00'),
('2020-10-24', 'Liverpool - Sheffield United', 'Anfield', '20:00:00'),
('2020-10-31', 'Liverpool - West Ham United', 'Anfield', '21:00:00'),
('2020-11-07', 'Manchester City - Liverpool', 'City of Manchester Stadium', '21:00:00'),
('2020-11-21', 'Liverpool - Leicester City', 'Anfield', '21:00:00'),
('2020-11-28', 'Brighton - Liverpool', 'Falmer Stadium', '21:00:00'),
('2020-12-05', 'Liverpool - Wolves', 'Anfield', '21:00:00'),
('2020-12-12', 'Fullham - Liverpool', 'Craven Cottage', '21:00:00'),
('2020-10-17', 'Liverpool - Tottenham Hotspur', 'Anfield', '02:00:00'),
('2020-12-19', 'Crystal Palace - Liverpool', 'Selhurst Park Stadium', '21:00:00'),
('2020-12-26', 'Liverpool - West Brom Albion', 'Anfield', '21:00:00'),
('2020-12-28', 'Newcastle United - Liverpool', 'St. James\' Park', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `player` varchar(30) DEFAULT NULL,
  `place` varchar(128) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `player`, `place`, `date`) VALUES
(800101, 'Altico Covid-19 Awareness Event By Barcelona', 'Cristiano Ronaldo', 'Altico, Athens.', '2020-09-20'),
(800102, 'Modus International Memorial Event', 'Renold Beckham', 'Medis, Russia.', '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) NOT NULL,
  `team` varchar(30) NOT NULL,
  `player` varchar(30) NOT NULL,
  `position` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team`, `player`, `position`) VALUES
(300101, 'Barcelona', 'Dravid', 'Center Forward'),
(300102, 'Real Madrid', 'Hangerson', 'Sweeper'),
(300103, 'Real Madrid', 'Cristiano Ronaldo', 'Forward Striker'),
(300104, 'Real Madrid', 'Juerno Rodrique', 'GoalKeeper'),
(300105, 'Paris Saint Germania', 'Arvan Radle', 'General'),
(300106, 'Juventus', 'Terpie Moya', 'General'),
(300107, 'Real Madrid', 'Renold Beckham', 'Left Midfielder'),
(300108, 'Real Madrid', 'Tervara Sanculie', 'Center Midfielder'),
(300109, 'Manchester United', 'Telebu Saint', 'General'),
(300110, 'Real Madrid', 'player 1', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `transferlistedplayers`
--

CREATE TABLE `transferlistedplayers` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `position` varchar(10) NOT NULL,
  `contractvalidity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transferlistedplayers`
--

INSERT INTO `transferlistedplayers` (`id`, `name`, `position`, `contractvalidity`) VALUES
(1, 'mahin', 'gk', 3),
(2, 'mugdho', 'ak', 2),
(3, 'shakil', 'mid', 4),
(4, 'arnob', 'def', 5),
(0, 'hasan', '', 0),
(0, 'hosen', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) NOT NULL,
  `player` varchar(30) NOT NULL,
  `team1` varchar(30) NOT NULL,
  `team2` varchar(30) NOT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `player`, `team1`, `team2`, `date`) VALUES
(400109, 'Arvan Radle', 'Real Madrid', 'Paris Saint Germania', '20 Sep 2020'),
(400110, 'Terpie Moya', 'Real Madrid', 'Juventus', '20 Sep 2020'),
(400111, 'Renold Beckham', 'Real Madrid', 'Arsenal FC', '22 Sep 2020'),
(400112, 'Juerno Rodrique', 'Real Madrid', 'Barcelona', '25 Sep 2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `team` varchar(30) DEFAULT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`, `team`, `type`) VALUES
(100101, 'Dranga Jr.', 'dranga', 'Real Madrid', 'coach'),
(100102, 'BJ Sergeo', 'sergeo', 'Real Madrid', 'coach'),
(100103, 'Dolly Height', 'dolly', 'Real Madrid', 'receptionist'),
(100105, 'Bite Maria', 'Bite', 'Barcelona', 'receptionist'),
(100106, 'Chantaje Shakira', 'Shakira', 'Barcelona', 'receptionist'),
(100107, 'Balaji Alt', 'balaji', 'Barcelona', 'coach'),
(100108, 'Maria Sante', 'maria', 'Barcelona', 'receptionist'),
(100109, 'Roiter Holland', 'holland', 'Manchester United', 'coach'),
(100110, 'himi', 'himi', 'Real Madrid', 'coach'),
(100111, 'himi', 'himi2', 'Barcelona', 'receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coachtask`
--
ALTER TABLE `coachtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fans`
--
ALTER TABLE `fans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownerstaff`
--
ALTER TABLE `ownerstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physioinjury`
--
ALTER TABLE `physioinjury`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physiotasks`
--
ALTER TABLE `physiotasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playerinfo`
--
ALTER TABLE `playerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fans`
--
ALTER TABLE `fans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600110;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500110;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800105;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200107;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800103;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300111;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
