-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotlit`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

CREATE TABLE `adminprofile` (
  `adminID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `responseID` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`adminID`, `userID`, `responseID`, `profile_pic`, `phone`) VALUES
(1, 1, NULL, 'profile-admin.jpg', '0142175890');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcementID` int(11) NOT NULL,
  `ann_title` varchar(200) DEFAULT NULL,
  `ann_description` varchar(500) DEFAULT NULL,
  `event_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementID`, `ann_title`, `ann_description`, `event_date`) VALUES
(1, 'Talent Fair', 'Join us for the annual talent showcase', '2025-08-01'),
(2, 'Art Expo', 'Display your artwork at the city expo', '2025-07-15'),
(3, 'Code Fest', 'Compete in our national coding challenge', '2025-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `communityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `communityID`, `userID`, `comment_text`, `comment_date`) VALUES
(6, 2, 9, 'ok', '2025-06-20 20:33:36'),
(7, 1, 9, 'yes pls', '2025-06-20 20:39:16'),
(8, 3, 9, 'me', '2025-06-20 21:05:33'),
(9, 4, 10, 'yes, I am coming!', '2025-06-22 17:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `communityID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `community_title` varchar(200) DEFAULT NULL,
  `community_content` varchar(500) DEFAULT NULL,
  `community_date` date DEFAULT NULL,
  `comment_text` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`communityID`, `userID`, `community_title`, `community_content`, `community_date`, `comment_text`, `comment_date`) VALUES
(1, 2, 'Photography Lovers', 'A group to share photography tips.', '2025-06-01', 'Great community!', '2025-06-02'),
(2, 3, 'Theater Geeks', 'Discuss the latest plays and performances.', '2025-06-03', 'Loved the recent discussion.', '2025-06-04'),
(3, 9, 'I love arts', 'anyone can share something trendy?', '2025-06-20', NULL, NULL),
(4, 9, 'TOM IS COMING', 'Everyone, I heard Tom is coming for a talk!', '2025-06-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customerprofile`
--

CREATE TABLE `customerprofile` (
  `customerID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerprofile`
--

INSERT INTO `customerprofile` (`customerID`, `userID`, `phone`, `profile_pic`) VALUES
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `event_title` varchar(200) DEFAULT NULL,
  `event_desc` varchar(500) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `adminID`, `event_title`, `event_desc`, `event_date`, `event_pic`) VALUES
(1, 1, 'Talent Fair 2025', 'Talent Fair 2025 is a dynamic event designed to uncover and promote emerging talents in music, dance, theater, and other performing arts. The objective of the event is to provide a platform for aspiring individuals to gain exposure, network with industry professionals, and receive constructive feedback. Attendees can participate in talent showcases, interactive workshops, and panel discussions hosted by experts. The expected outcome is to discover new talents for future collaborations and help p', '2025-08-01', 'http://localhost/WebApp-main/image/talentFair.png'),
(2, 1, 'Art Expo 2025', 'Art Expo 2025 aims to bring together creative minds to celebrate visual arts, including painting, sculpture, graphic design, and digital illustration. The objective is to foster artistic expression and create an inclusive space for artists to present their work to the public. Featuring curated galleries, live art demonstrations, artist talks, and workshops, the expo encourages creative exchange between emerging artists and seasoned professionals. The expected outcome is to increase public apprec', '2025-07-15', 'http://localhost/WebApp-main/image/artExpo.png'),
(3, 1, 'Code Fest 2025', 'Code Fest 2025 is a national coding competition that invites tech enthusiasts to demonstrate their programming, innovation, and problem-solving skills. The objective is to challenge participants with real-world scenarios in web development, AI, cybersecurity, and app design. This multi-track event includes hackathons, technical workshops, keynote sessions, and a job-matching zone with tech companies. The expected outcome is to promote digital skills, identify top-performing developers for potent', '2025-09-10', 'http://localhost/WebApp-main/image/codeFest.png');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `feedback_desc` varchar(500) DEFAULT NULL,
  `target_talent` varchar(100) DEFAULT NULL,
  `feedback_date` date DEFAULT NULL,
  `response` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `feedback_desc`, `target_talent`, `feedback_date`, `response`) VALUES
(1, 'Very creative and professional.', 'Carol', '2025-06-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryID` int(11) NOT NULL,
  `media_title` varchar(200) DEFAULT NULL,
  `media_desc` varchar(500) DEFAULT NULL,
  `media_type` varchar(100) DEFAULT NULL,
  `media_date` date DEFAULT NULL,
  `gallery_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryID`, `media_title`, `media_desc`, `media_type`, `media_date`, `gallery_pic`) VALUES
(1, 'Singing Competition 2024', 'Highlights from the annual singing competition.', 'Image', '2024-03-12', 'http://localhost/WebApp-main/image/mic.png'),
(2, 'Hackathon 2024', 'Students coding innovative solutions in 24 hours.', 'Image', '2024-04-05', 'http://localhost/WebApp-main/image/hackathon.png'),
(3, 'Robotics Showdown', 'Robots battling it out in the arena.', 'Image', '2024-04-20', 'http://localhost/WebApp-main/image/robot.png'),
(4, 'Acting Gala', 'Dramatic and comedic performances by students.', 'Image', '2024-05-03', 'http://localhost/WebApp-main/image/actingGala.png'),
(5, 'Hackathon Winners', 'Award ceremony for top-performing hackathon teams.', 'Image', '2024-04-06', 'http://localhost/WebApp-main/image/hack2.png'),
(6, 'Singing Finals', 'Finalists performing live on stage.', 'Image', '2024-03-13', 'http://localhost/WebApp-main/image/singing.png');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `report_desc` varchar(500) DEFAULT NULL,
  `target_talent` varchar(100) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `response` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `userID`, `report_desc`, `target_talent`, `report_date`, `response`) VALUES
(1, 2, 'Talent did not show up for meeting.', 'Carol', '2025-06-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `talentprofile`
--

CREATE TABLE `talentprofile` (
  `talentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `talent` enum('music','arts','theater','coding','robotics','graphic','animation','photography','others') DEFAULT NULL,
  `resume_file_path` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talentprofile`
--

INSERT INTO `talentprofile` (`talentID`, `userID`, `nickname`, `education`, `talent`, `resume_file_path`, `phone`, `gender`, `profile_pic`) VALUES
(1, 3, 'CarolW', 'Bachelor of Computer Science', 'coding', 'http://localhost/WebApp-main/uploads/CarolResume.pdf', '0171234567', 'female', 'http://localhost/WebApp-main/image/carol.jpg'),
(11, 10, 'Tom', 'Bachelor in Cinematic Arts', 'theater', 'https://en.wikipedia.org/wiki/Tom_Cruise', '0128473645', 'male', 'http://localhost/WebApp-main/image/tom.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','talent','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'Arisya', 'Yasak', 'arista@outlook.com', 'Adm1n#2024', 'admin'),
(2, 'Bob', 'Johnson', 'bob@gmail.com', 'S3cur3!Pwd', 'customer'),
(3, 'Carol', 'Williams', 'carol@student.mmu.edu.my', 'P@ssword1 ', 'talent'),
(9, 'Surrey', 'Wong', '123@gmail.com', 'qwertyui123!', 'customer'),
(10, 'Tom', 'Cruise', 'tom@gmail.com', 'qwertyui123!', 'talent');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `create_profile_after_user` AFTER INSERT ON `users` FOR EACH ROW BEGIN
  IF NEW.role = 'talent' THEN
    INSERT INTO TalentProfile (userID) VALUES (NEW.userID);
  ELSEIF NEW.role = 'customer' THEN
    INSERT INTO CustomerProfile (userID) VALUES (NEW.userID);
  ELSEIF NEW.role = 'admin' THEN
    INSERT INTO AdminProfile (userID) VALUES (NEW.userID);
  END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminprofile`
--
ALTER TABLE `adminprofile`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `communityID` (`communityID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`communityID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `customerprofile`
--
ALTER TABLE `customerprofile`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `talentprofile`
--
ALTER TABLE `talentprofile`
  ADD PRIMARY KEY (`talentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminprofile`
--
ALTER TABLE `adminprofile`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `communityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerprofile`
--
ALTER TABLE `customerprofile`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `talentprofile`
--
ALTER TABLE `talentprofile`
  MODIFY `talentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminprofile`
--
ALTER TABLE `adminprofile`
  ADD CONSTRAINT `adminprofile_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`communityID`) REFERENCES `community` (`communityID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `community`
--
ALTER TABLE `community`
  ADD CONSTRAINT `community_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `customerprofile`
--
ALTER TABLE `customerprofile`
  ADD CONSTRAINT `customerprofile_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `adminprofile` (`adminID`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `adminprofile` (`adminID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `talentprofile`
--
ALTER TABLE `talentprofile`
  ADD CONSTRAINT `talentprofile_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;