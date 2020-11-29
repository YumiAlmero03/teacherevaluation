-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2015 at 10:13 AM
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
(1, 'deraja', 'deraja', 'Antonio', 'Deraja', 'CIT-Dean', 'upload/sir deraja.jpg'),
(2, 'redoblo', 'redoblo', 'Cristine', 'Redoblo', 'Chairperson-BSIS', 'upload/ms red.jpg');

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
  `avetotal` int(100) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `rater` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'admin', 'admin', 'Rj', 'Uy', 'upload/photo.jpg'),
(2, 'host', 'host', 'Mark', 'King', 'upload/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id_student` int(100) NOT NULL AUTO_INCREMENT,
  `id_number` int(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `yr` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_student`),
  UNIQUE KEY `id_number` (`id_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `id_number`, `program`, `yr`, `status`) VALUES
(1, 21500540, 'BSIS', '3rd', 'Evaluated'),
(2, 21500541, 'BSIS', '3rd', 'Not Now'),
(3, 21500542, 'BSIS', '1st', 'Not Now'),
(4, 21500543, 'BSIS', '1st', 'Not Now'),
(5, 21500544, 'BSIS', '2nd', 'Not Now'),
(6, 21500545, 'BSIS', '2nd', 'Not Now'),
(7, 21500546, 'BSIS', '4th', 'Not Now'),
(8, 21500547, 'BSIS', '4th', 'Not Now');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `teacherid`, `fname`, `lname`, `academic_rank`, `program`, `subject`, `yr`, `sec`, `profile_pic`) VALUES
(1, 21200530, 'Cristine', 'Redoblo', 'Chairperson', 'BSIS', 'IS 321', '3rd', 'C', 'upload/ms red.jpg'),
(2, 21200531, 'Aladin', 'Cabrera', 'Teacher', 'BSIS', 'IS 302', '3rd', 'C', 'upload/sir cabrera.jpg'),
(3, 21200532, 'Jomar', 'Pabuaya', 'Teacher', 'BSIS', 'IS 323', '3rd', 'B', 'upload/sir pabuaya.jpg'),
(4, 21200533, 'Charito', 'Puray', 'Teacher', 'BSIS', 'IS 323', '3rd', 'C', 'upload/ms puray.jpg'),
(5, 21200534, 'Ruby Mae', 'Morante', 'Teacher', 'BSIS', 'IS 324', '3rd', 'C', 'upload/ms morante.jpg'),
(6, 21200535, 'Honeylee', 'Magbanua', 'Teacher', 'BSIS', 'IS 303', '3rd', 'C', 'upload/ms magz.jpg'),
(7, 21200536, 'Jonathan', 'Valenzuela', 'Teacher', 'BSIS', 'IS 321', '3rd', 'A', 'upload/sir jonathan.jpg'),
(8, 21200536, 'Allan Joseph', 'Dela Torre', 'Teacher', 'BSIS', 'MQTB', '3rd', 'C', 'upload/sir dela torre.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
