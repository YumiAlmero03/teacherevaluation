-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2015 at 07:48 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final_tes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `fname`, `lname`, `rank`, `location`) VALUES
(1, 'deraja', 'deraja', 'Antonio', 'Deraja', 'CIT-Dean', 'sir deraja.jpg'),
(2, 'redoblo', 'redoblo', 'Cristine', 'Redoblo', 'Chairperson-BSIS', 'ms red.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE IF NOT EXISTS `admindetails` (
  `id_teacher` int(50) NOT NULL AUTO_INCREMENT,
  `teacherid` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sem` varchar(100) NOT NULL,
  `ay` int(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `totalave` int(100) NOT NULL,
  `research` int(100) NOT NULL,
  `extension` int(100) NOT NULL,
  `production` int(100) NOT NULL,
  `plus_factor` int(100) NOT NULL,
  `avetotal` int(100) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(50) NOT NULL AUTO_INCREMENT,
  `teacherid` int(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id_teacher` int(100) NOT NULL AUTO_INCREMENT,
  `teacherid` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `program` varchar(100) NOT NULL,
  `sy` int(100) NOT NULL,
  `ave1` int(100) NOT NULL,
  `ave2` int(100) NOT NULL,
  `ave3` int(100) NOT NULL,
  `ave4` int(100) NOT NULL,
  `ave5` varchar(255) NOT NULL,
  `avetotal` int(100) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `rater` varchar(100) NOT NULL,
  `studentid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `idteacher` int(11) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id_teacher`, `teacherid`, `fname`, `lname`, `subject`, `semester`, `program`, `sy`, `ave1`, `ave2`, `ave3`, `ave4`, `ave5`, `avetotal`, `comment`, `rater`, `studentid`, `adminid`, `idteacher`) VALUES
(1, 21200531, 'Aladin', 'Cabrera', 'IS 302', '1st', 'BSIS', 2015, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(2, 21200536, 'Allan Joseph', 'Dela Torre', 'MQTB', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(3, 21200533, 'Charito', 'Puray', 'IS 323', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(4, 21200530, 'Cristine', 'Redoblo', 'IS 321', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(5, 21200535, 'Honeylee', 'Magbanua', 'IS 303', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(6, 21200532, 'Jomar', 'Pabuaya', 'IS 323', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(7, 21200537, 'Jonathan', 'Valenzuela', 'IS 321', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(8, 21200534, 'Ruby Mae', 'Morante', 'IS 324', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'dean/chairperson', 0, 1, 0),
(10, 21200536, 'Allan Joseph', 'Dela Torre', 'MQTB', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 2),
(11, 21200533, 'Charito', 'Puray', 'IS 323', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 2),
(12, 21200530, 'Cristine', 'Redoblo', 'IS 321', '1st', 'BSIS', 2012, 5, 5, 5, 5, '4.40', 5, '', 'peer', 0, 0, 2),
(13, 21200534, 'Ruby Mae', 'Morante', 'IS 324', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 2),
(14, 21200535, 'Honeylee', 'Magbanua', 'IS 303', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 2),
(15, 21200532, 'Jomar', 'Pabuaya', 'IS 323', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 2),
(16, 21200537, 'Jonathan', 'Valenzuela', 'IS 321', '1st', 'BSIS', 2012, 5, 5, 5, 5, '4.80', 5, '', 'peer', 0, 0, 2),
(17, 21200531, 'Aladin', 'Cabrera', 'IS 302', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(18, 21200530, 'Cristine', 'Redoblo', 'IS 321', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(19, 21200533, 'Charito', 'Puray', 'IS 323', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(20, 21200536, 'Allan Joseph', 'Dela Torre', 'MQTB', '1st', 'BSIS', 2012, 5, 5, 5, 5, '4.88', 5, '', 'peer', 0, 0, 1),
(21, 21200534, 'Ruby Mae', 'Morante', 'IS 324', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(22, 21200537, 'Jonathan', 'Valenzuela', 'IS 321', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(23, 21200535, 'Honeylee', 'Magbanua', 'IS 303', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(24, 21200532, 'Jomar', 'Pabuaya', 'IS 323', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, '', 'peer', 0, 0, 1),
(25, 21200531, 'Aladin', 'Cabrera', 'IS 302', '1st', 'BSIS', 2012, 5, 5, 5, 5, '4.63', 5, '', 'self', 0, 0, 2),
(26, 21200531, 'Aladin', 'Cabrera', 'IS 302', '1st', 'BSIS', 2012, 5, 5, 5, 5, '5', 5, 'ahaha', 'dean/chairperson', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id_personnel` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id_personnel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `username`, `password`, `fname`, `lname`, `profile_pic`) VALUES
(1, 'admin', 'admin', 'Rj', 'Uy', 'admin.png'),
(2, 'host', 'host', 'Mark', 'King', 'corpor1.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id_student` int(100) NOT NULL AUTO_INCREMENT,
  `id_number` int(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `yr` varchar(100) NOT NULL,
  `sec` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_student`),
  UNIQUE KEY `id_number` (`id_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `id_number`, `program`, `yr`, `sec`, `status`) VALUES
(1, 21500540, 'BSIS', '1st', 'A', 'Evaluated'),
(2, 21500541, 'BSIS', '1st', 'B', 'Not Now'),
(3, 21500542, 'BSIS', '1st', 'C', 'Not Now'),
(4, 21500543, 'BSIS', '2nd', 'A', 'Not Now'),
(5, 21500544, 'BSIS', '2nd', 'B', 'Not Now'),
(6, 21500545, 'BSIS', '2nd', 'C', 'Not Now'),
(7, 21500546, 'BSIS', '3rd', 'A', 'Not Now'),
(8, 21500547, 'BSIS', '3rd', 'B', 'Not Now'),
(9, 21500548, 'BSIS', '3rd', 'C', 'Not Now'),
(10, 21500549, 'BSIS', '4th', 'A', 'Not Now'),
(11, 21500550, 'BSIS', '4th', 'B', 'Not Now');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id_subject` int(100) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_category` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `subject_code`, `subject_title`, `subject_category`, `semester`) VALUES
(1, 'Acctg2', 'Accounting 2', 'Major', '1st'),
(3, 'ENG: TW', 'English technical writing', 'minor', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id_teacher` int(50) NOT NULL AUTO_INCREMENT,
  `teacherid` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `academic_rank` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `yr` varchar(100) NOT NULL,
  `sec` varchar(10000) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `teacherid`, `fname`, `lname`, `academic_rank`, `program`, `subject`, `yr`, `sec`, `profile_pic`) VALUES
(1, 21200530, 'Cristine', 'Redoblo', 'Chairperson', 'BSIS', 'IS 321', '3rd', 'C', 'ms red.jpg'),
(2, 21200531, 'Aladin', 'Cabrera', 'Teacher', 'BSIS', 'IS 302', '3rd', 'C', 'sir cabrera.jpg'),
(3, 21200532, 'Jomar', 'Pabuaya', 'Teacher', 'BSIS', 'IS 323', '3rd', 'B', 'sir pabuaya.jpg'),
(4, 21200533, 'Charito', 'Puray', 'Teacher', 'BSIS', 'IS 323', '3rd', 'C', 'ms puray.jpg'),
(5, 21200534, 'Ruby Mae', 'Morante', 'Teacher', 'BSIS', 'IS 324', '3rd', 'C', 'ms morante.jpg'),
(6, 21200535, 'Honeylee', 'Magbanua', 'Teacher', 'BSIS', 'IS 303', '3rd', 'C', 'ms magz.jpg'),
(7, 21200537, 'Jonathan', 'Valenzuela', 'Teacher', 'BSIS', 'IS 321', '3rd', 'A', 'sir jonathan.jpg'),
(8, 21200536, 'Allan Joseph', 'Dela Torre', 'Teacher', 'BSIS', 'MQTB', '3rd', 'C', 'sir dela torre.jpg'),
(9, 21200531, 'Aladin', 'Cabrera', 'Teacher', 'BSIS', 'IS 302', '3rd', 'A', 'sir cabrera.jpg'),
(10, 21200531, 'Aladin', 'Cabrera', 'Teacher', 'BSIS', 'IS 302', '3rd', 'B', 'sir cabrera.jpg'),
(11, 21200535, 'Honeylee', 'Magbanua', 'Teacher', 'BSIS', 'IS 303', '3rd', 'A', 'ms magz.jpg'),
(12, 21200535, 'Honeylee', 'Magbanua', 'Teacher', 'BSIS', 'IS 303', '3rd', 'B', 'ms magz.jpg'),
(13, 21200537, 'Jonathan', 'Valenzuela', 'Teacher', 'BSIS', 'IS 321', '3rd', 'B', 'sir jonathan.jpg'),
(14, 21200532, 'Jomar', 'Pabuaya', 'Teacher', 'BSIS', 'IS 323', '3rd', 'A', 'sir pabuaya.jpg'),
(15, 21200534, 'Ruby Mae', 'Morante', 'Teacher', 'BSIS', 'IS 324', '3rd', 'A', 'ms morante.jpg'),
(16, 21200534, 'Ruby Mae', 'Morante', 'Teacher', 'BSIS', 'IS 324', '3rd', 'B', 'ms morante.jpg'),
(17, 21200536, 'Allan Joseph', 'Dela Torre', 'Teacher', 'BSIS', 'MQTB', '3rd', 'A', 'sir dela torre.jpg'),
(18, 21200536, 'Allan Joseph', 'Dela Torre', 'Teacher', 'BSIS', 'MQTB', '3rd', 'B', 'sir dela torre.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
