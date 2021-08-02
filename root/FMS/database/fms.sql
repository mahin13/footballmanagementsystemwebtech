-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 06:01 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

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
(2, 'Juerno Rodrique', 4, 'Real Madrid'),
(4, 'Arvan Radle', 1, 'Paris Saint Germania'),
(5, 'Terpie Moya', 2, 'Juventus'),
(200101, 'Hangerson', 3, 'Real Madrid'),
(200102, 'Dravid', 3, 'Barcelona'),
(200104, 'Renold Beckham', 3, 'Arsenal FC'),
(200105, 'Tervara Sanculie', 3, 'Real Madrid'),
(200106, 'Telebu Saint', 2, 'Manchester United');

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
(400111, 'Renold Beckham', 'Real Madrid', 'Arsenal FC', '22 Sep 2020');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
