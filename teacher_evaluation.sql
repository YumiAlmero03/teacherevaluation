-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 04:50 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Commitment'),
(3, 'Knowledge of the '),
(5, 'Management of learning');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `day` varchar(255) NOT NULL,
  `class_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id_teacher` int(100) NOT NULL,
  `teacherid` varchar(100) NOT NULL,
  `teacher` varchar(40) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL,
  `sy` int(100) NOT NULL,
  `ave1` int(100) NOT NULL,
  `ave2` int(100) NOT NULL,
  `ave3` int(100) NOT NULL,
  `ave4` int(100) NOT NULL,
  `avetotal` int(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `rater` varchar(100) NOT NULL,
  `studentid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `questioner_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questioner`
--

CREATE TABLE `questioner` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questioner`
--

INSERT INTO `questioner` (`id`, `category_id`, `question`) VALUES
(1, 2, 'Demonstrates sensitively to students\' ability to attend and absorb content information.'),
(2, 2, 'Integrates sensitively his/her learning objectives with those of the students on a collaborative process.'),
(3, 3, 'Demonstrates mastery of the subject matter (explains the subject without relying solely on the prescribed textbook).'),
(4, 3, 'Draws and share information on the state of the art theory and practice his/her discipline.'),
(5, 2, 'Makes self available to students beyond official time.'),
(6, 2, 'Regularly comes to class on time, well groomed and well prepared to complete assigned task.'),
(7, 2, 'Keeps accurate records of students\' performance and prompt submission of the same.'),
(8, 3, 'Integrates subject to practical circumstances and learning intents/purposes of students.'),
(9, 3, 'Explains the relevance of present topics to previous lessons and relates the subject matter to relevant current issues and/or daily activities.'),
(10, 3, 'Demonstrates up-to-date knowledge and/or awareness of current trends and issues of the subject.'),
(11, 4, 'Creates teaching strategies that allows students to practice concepts they need t understand (interactive discussion).'),
(12, 4, 'Enhances student self-esteem and/or gives due recognition to students\' performance/potentials.'),
(15, 4, 'Encourages students to learn beyond what is required and help/guide the students how to apply concepts learned.'),
(16, 5, 'Creates opportunities for intensive and/or extensive contribution of students in the class activities (e.g. break class in dyads, triads or buzz/task group).'),
(17, 3, 'Assumes role'),
(18, 5, 'Assumes various appropriate roles, (facilitator, coach, resource speaker, integrator, inquisitor, referee, etc.) in drawing students to contribute knowledge and understanding of the concepts at hand.'),
(19, 5, 'Structures/re-structures learning conditions and experience that promotes healthy exchange and/or confrontations.'),
(20, 5, 'Uses instructional materials (audio- video materials, fieldtrips, film showing, computer aided instruction and etc.) to reinforce learning processes.'),
(21, 0, ''),
(22, 0, ''),
(23, 0, ''),
(24, 3, 'oino');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `userID` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `course` varchar(60) NOT NULL,
  `subject` varchar(60) DEFAULT NULL,
  `semester` varchar(60) NOT NULL,
  `yl` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userID`, `fname`, `course`, `subject`, `semester`, `yl`, `username`, `password`, `profname`) VALUES
(27, 'Arlene', 'bscs', 'CSRES', '3rd', '3RD YEAR', '20150053', '00000', 'Mr.  Morales'),
(28, 'Mary Joy P. Ebora  ', 'bscs', 'MATH', '3rd', '3RD YEAR', '20147531', 'mmm', 'Ms. Saldino'),
(29, 'Girlie Mary Jean H. Dizon', 'BSCS', 'Etron04A', '3rd', '3RD YEAR', 'TA12003', 'dizon', 'Ms.Leonen'),
(30, 'Kate Joyce V. Casolita', 'BSCS', 'COMS006', '3rd', '3RD YEAR', '20154893', 'casolita', 'Mr. Tipudan'),
(31, 'Maria Christine Yleinne P. Agbayani', 'BSCS', 'CSCOMSO20', '3rd', '3RD YEAR', '20153025', 'mclei', 'Mr. Tipudan'),
(32, 'Rafael Tallo', 'BSIT', 'Math', '1st', '1st', '1500100', 'rafael23', 'Ms.saldeno'),
(33, 'Lnie', 'bsit', 'eng', '1st', '5', 'lailanie', 'Manil@2017', 'fhfuighir'),
(34, 'yufu7', 'bsit', 'eng', '1st', '5', '2345', 'Manil@2017', 'fhfuighir'),
(36, 'Lailanie', 'bsit', ' ', '1st', '2', '12345', '12345', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `td_admin`
--

CREATE TABLE `td_admin` (
  `userID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_admin`
--

INSERT INTO `td_admin` (`userID`, `username`, `password`) VALUES
(1, 'admin', 'a1Bz20ydqelm8m1wql40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'arlene', 'a1Bz20ydqelm8m1wql6934105ad50010b814c933314b1da6841431bc8b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questioner`
--
ALTER TABLE `questioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `td_admin`
--
ALTER TABLE `td_admin`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id_teacher` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questioner`
--
ALTER TABLE `questioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `td_admin`
--
ALTER TABLE `td_admin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
