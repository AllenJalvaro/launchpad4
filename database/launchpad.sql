-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `launchpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_registration`
--

CREATE TABLE `company_registration` (
  `Company_ID` int(11) NOT NULL,
  `Student_ID` varchar(20) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Company_logo` varchar(100) NOT NULL,
  `Company_description` text NOT NULL,
  `Registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_registration`
--

INSERT INTO `company_registration` (`Company_ID`, `Student_ID`, `Company_name`, `Company_logo`, `Company_description`, `Registration_date`) VALUES
(77, '22-UR-0007', 'ByteBurst Tech', 'images/658018bcccfe9.jpg', 'ByteBurst Tech is a dynamic startup focused on revolutionizing the tech landscape. We specialize in developing streamlined software solutions that propel businesses forward. With a passion for efficiency and a commitment to simplicity, ByteBurst Tech aims to empower organizations through innovative and user-centric digital experiences. Embrace the future with ByteBurst Tech — where bytes meet brilliance!', '2023-12-18 18:02:36'),
(78, '22-UR-0007', 'StellarCraft Innovations', 'images/658019737fd43.jpg', 'StellarCraft Innovations is a forward-thinking startup dedicated to exploring the outer limits of creativity and technological innovation. With a passion for pushing boundaries, StellarCraft is committed to crafting solutions that transcend the ordinary. Our team of visionaries is driven by a mission to redefine industries through ingenious ideas and groundbreaking technologies.', '2023-12-18 18:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvaluationID` int(11) NOT NULL,
  `Phase` varchar(50) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Evaluator_ID` int(11) NOT NULL,
  `Comments` text NOT NULL,
  `ApprovalStatus` varchar(50) NOT NULL,
  `Evaluation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ideation_phase`
--

CREATE TABLE `ideation_phase` (
  `IdeationID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Project_logo` varchar(255) NOT NULL,
  `Project_Overview` text NOT NULL,
  `Project_Modelcanvas` varchar(255) NOT NULL,
  `Submission_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ideation_phase`
--

INSERT INTO `ideation_phase` (`IdeationID`, `Project_ID`, `Project_logo`, `Project_Overview`, `Project_Modelcanvas`, `Submission_date`) VALUES
(3, 27, 'images/657e4a963eb86.jpg', 'Hello', 'pdf/Chapter 7 - Hypothesis Testing.pdf', '2023-12-19 21:42:04'),
(4, 28, 'images/Screenshot 2023-12-15 222049.png', 'AHHA', 'pdf/Final-Final-version-5-Executive-after-intro.pdf', '2023-12-19 21:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_registration`
--

CREATE TABLE `instructor_registration` (
  `Instructor_ID` int(11) NOT NULL,
  `Instructor_fname` varchar(100) NOT NULL,
  `Instructor_lname` varchar(100) NOT NULL,
  `empID` varchar(255) NOT NULL,
  `Instructor_email` varchar(100) NOT NULL,
  `Instructor_password` varchar(255) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Instructor_contactno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_registration`
--

INSERT INTO `instructor_registration` (`Instructor_ID`, `Instructor_fname`, `Instructor_lname`, `empID`, `Instructor_email`, `Instructor_password`, `Department`, `Instructor_contactno`) VALUES
(25, 'JC', 'Reyer', '', 'jc@psu.edu.ph', '12!@qwQW', 'College of Computing', '09123456789'),
(26, 'cj', 'jc', '', 'cj@psu.edu.ph', '12qw!@QW', 'College of Architecture', '09523456789'),
(27, 'Abc', 'Def', '', 'abc_def@psu.edu.ph', 'zxZX12!@', 'College of Engineering', '09123456789'),
(28, '1', '1', '1', 'cj1@psu.edu.ph', '12qw!@QW', 'College of Engineering and Architecture', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `investor_request`
--

CREATE TABLE `investor_request` (
  `InvestorRequestID` int(11) NOT NULL,
  `PublishedProjectID` int(11) NOT NULL,
  `InvestorName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SourceofIncome` varchar(100) NOT NULL,
  `IdentityProof` varchar(255) NOT NULL,
  `RequestedDocuments` varchar(255) NOT NULL,
  `Submission_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `InvitationID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `InviterID` varchar(50) DEFAULT NULL,
  `InviteeID` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending',
  `InvitationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pitching_phase`
--

CREATE TABLE `pitching_phase` (
  `PitchingID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `VideoPitch` varchar(255) NOT NULL,
  `PitchDeck` varchar(255) NOT NULL,
  `Submission_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Project_title` varchar(100) NOT NULL,
  `Project_Description` text NOT NULL,
  `Project_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Company_ID`, `Project_title`, `Project_Description`, `Project_date`) VALUES
(27, 77, 'QuantumLeap Dashboard', 'The QuantumLeap Dashboard project by ByteBurst Tech is a cutting-edge data visualization tool designed to elevate business intelligence. Harness the power of quantum computing-inspired algorithms to process and interpret vast datasets with unprecedented speed and accuracy. The QuantumLeap Dashboard empowers decision-makers with real-time insights, enabling them to navigate complex data landscapes effortlessly. Revolutionize your analytics experience and take a leap into the future of data-driven decision-making with ByteBurst Tech\'s QuantumLeap Dashboard.', '2023-12-18 18:04:28'),
(28, 78, 'CelestialHub', 'CelestialHub is an immersive virtual innovation expo curated by StellarCraft Innovations. Step into a digital realm where groundbreaking ideas converge, and innovation takes center stage. Explore the cosmos of creativity as StellarCraft showcases cutting-edge projects, disruptive technologies, and visionary concepts. CelestialHub invites you to witness the future, connecting minds across galaxies to shape the universe of innovation. Join us on this celestial journey, where inspiration knows no bounds.', '2023-12-18 18:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE `project_member` (
  `Projectmember_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Student_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_mentor`
--

CREATE TABLE `project_mentor` (
  `Mentorassign_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Mentor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `published_project`
--

CREATE TABLE `published_project` (
  `PublishedProjectID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Published_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `Student_ID` varchar(50) NOT NULL,
  `Student_fname` varchar(100) NOT NULL,
  `Student_lname` varchar(100) NOT NULL,
  `Student_email` varchar(100) NOT NULL,
  `Student_password` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `Block` varchar(20) NOT NULL,
  `Student_contactno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`Student_ID`, `Student_fname`, `Student_lname`, `Student_email`, `Student_password`, `Course`, `Year`, `Block`, `Student_contactno`) VALUES
('21-UR-0123', 'Elijah', 'Vennise', '21ur0123@psu.edu.ph', '12qw!@QW', 'BS Information Technology', '2nd Year', 'D', '+639673845232'),
('21-UR-0245', 'Monica', 'Ave', 'mave_21UR0245@psu.edu.ph', '12!@qwQW', 'BS Computer Engineering', '5th Year', 'C', '+639573947421'),
('22-UR-0007', 'Allen James', 'Alvaro', '22ur0007@psu.edu.ph', '@Llen123', 'BS Information Technology', '3rd Year', 'A', '09123457890'),
('23-UR-0987', 'Patrick', 'Tomas', '23ur0987@psu.edu.ph', 'asAS12!@', 'BS Computer Engineering', '4th Year', 'D', '+639673845232');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD PRIMARY KEY (`Company_ID`),
  ADD KEY `Fk_company_registration` (`Student_ID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvaluationID`),
  ADD KEY `Fk_one_evaluation` (`Evaluator_ID`),
  ADD KEY `Fk_two_ecaluation` (`Project_ID`);

--
-- Indexes for table `ideation_phase`
--
ALTER TABLE `ideation_phase`
  ADD PRIMARY KEY (`IdeationID`),
  ADD KEY `Fk_ideation_phase` (`Project_ID`);

--
-- Indexes for table `instructor_registration`
--
ALTER TABLE `instructor_registration`
  ADD PRIMARY KEY (`Instructor_ID`),
  ADD UNIQUE KEY `Instructor_ID` (`Instructor_ID`),
  ADD UNIQUE KEY `Instructor_email` (`Instructor_email`);

--
-- Indexes for table `investor_request`
--
ALTER TABLE `investor_request`
  ADD PRIMARY KEY (`InvestorRequestID`),
  ADD KEY `Fk_investor` (`PublishedProjectID`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`InvitationID`),
  ADD KEY `ProjectID` (`ProjectID`),
  ADD KEY `InviterID` (`InviterID`),
  ADD KEY `InviteeID` (`InviteeID`);

--
-- Indexes for table `pitching_phase`
--
ALTER TABLE `pitching_phase`
  ADD PRIMARY KEY (`PitchingID`),
  ADD KEY `Fk_pitching` (`Project_ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_ID`),
  ADD KEY `Fk_project_owner` (`Company_ID`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`Projectmember_ID`),
  ADD KEY `Fk_project_member` (`Project_ID`),
  ADD KEY `FkTwo_project_member_` (`Student_ID`);

--
-- Indexes for table `project_mentor`
--
ALTER TABLE `project_mentor`
  ADD PRIMARY KEY (`Mentorassign_ID`),
  ADD KEY `Fk_mentor_assign` (`Project_ID`),
  ADD KEY `FkTwo_mentor_assign` (`Mentor_ID`);

--
-- Indexes for table `published_project`
--
ALTER TABLE `published_project`
  ADD PRIMARY KEY (`PublishedProjectID`),
  ADD KEY `Fk_published` (`Project_ID`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Student_email` (`Student_email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_registration`
--
ALTER TABLE `company_registration`
  MODIFY `Company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvaluationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideation_phase`
--
ALTER TABLE `ideation_phase`
  MODIFY `IdeationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instructor_registration`
--
ALTER TABLE `instructor_registration`
  MODIFY `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `investor_request`
--
ALTER TABLE `investor_request`
  MODIFY `InvestorRequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pitching_phase`
--
ALTER TABLE `pitching_phase`
  MODIFY `PitchingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_member`
--
ALTER TABLE `project_member`
  MODIFY `Projectmember_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_mentor`
--
ALTER TABLE `project_mentor`
  MODIFY `Mentorassign_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `published_project`
--
ALTER TABLE `published_project`
  MODIFY `PublishedProjectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD CONSTRAINT `Fk_company_registration` FOREIGN KEY (`Student_ID`) REFERENCES `student_registration` (`Student_ID`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `Fk_one_evaluation` FOREIGN KEY (`Evaluator_ID`) REFERENCES `instructor_registration` (`Instructor_ID`),
  ADD CONSTRAINT `Fk_two_ecaluation` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `ideation_phase`
--
ALTER TABLE `ideation_phase`
  ADD CONSTRAINT `Fk_ideation_phase` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `investor_request`
--
ALTER TABLE `investor_request`
  ADD CONSTRAINT `Fk_investor` FOREIGN KEY (`PublishedProjectID`) REFERENCES `published_project` (`PublishedProjectID`);

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`Project_ID`),
  ADD CONSTRAINT `invitation_ibfk_2` FOREIGN KEY (`InviterID`) REFERENCES `student_registration` (`Student_ID`),
  ADD CONSTRAINT `invitation_ibfk_3` FOREIGN KEY (`InviteeID`) REFERENCES `student_registration` (`Student_ID`);

--
-- Constraints for table `pitching_phase`
--
ALTER TABLE `pitching_phase`
  ADD CONSTRAINT `Fk_pitching` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `Fk_project_owner` FOREIGN KEY (`Company_ID`) REFERENCES `company_registration` (`Company_ID`);

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `FkTwo_project_member_` FOREIGN KEY (`Student_ID`) REFERENCES `student_registration` (`Student_ID`),
  ADD CONSTRAINT `Fk_project_member` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `project_mentor`
--
ALTER TABLE `project_mentor`
  ADD CONSTRAINT `FkTwo_mentor_assign` FOREIGN KEY (`Mentor_ID`) REFERENCES `instructor_registration` (`Instructor_ID`),
  ADD CONSTRAINT `Fk_mentor_assign` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `published_project`
--
ALTER TABLE `published_project`
  ADD CONSTRAINT `Fk_published` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
