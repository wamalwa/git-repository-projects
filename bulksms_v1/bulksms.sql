-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 03:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.6.22

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bulksms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbaccount`
--

CREATE TABLE IF NOT EXISTS `tbaccount` (
  `accountID` int(11) NOT NULL AUTO_INCREMENT,
  `accountType` varchar(50) DEFAULT NULL,
  `availablebalance` decimal(10,2) DEFAULT NULL,
  `actualbalance` decimal(10,2) NOT NULL,
  `clientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbclient`
--

CREATE TABLE IF NOT EXISTS `tbclient` (
  `clientID` int(11) NOT NULL AUTO_INCREMENT,
  `surName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `nationalID` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `physicalAddress` varchar(50) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL,
  `regionToVie` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbclient`
--

INSERT INTO `tbclient` (`clientID`, `surName`, `firstName`, `nationalID`, `gender`, `emailAddress`, `phoneNumber`, `physicalAddress`, `postID`, `regionToVie`, `createdON`, `createdBY`, `Active`) VALUES
(1, 'Omondi', 'Mike', '292439886', 'Male', 'omosh@gmail.com', '2547059877654', 'po box kisumu', 2, 1, '2017-01-10 14:23:15', 'ojwang.jacob@bulksms.com', 1),
(2, 'Mamai', 'Richie', '218909876', 'Male', 'mmairichie@gmail.com', '254705776690', 'Nambale County Busia', 3, 3, '2017-01-11 07:28:19', 'ojwang.jacob@bulksms.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbconstituency`
--

CREATE TABLE IF NOT EXISTS `tbconstituency` (
  `constituencyID` int(11) NOT NULL AUTO_INCREMENT,
  `constituencyName` varchar(50) DEFAULT NULL,
  `countyID` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`constituencyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbconstituency`
--

INSERT INTO `tbconstituency` (`constituencyID`, `constituencyName`, `countyID`, `createdON`, `createdBY`) VALUES
(1, 'NYALENDA A', 2, '2017-01-03 09:13:52', 'ojwang.jacob@bulksms.com'),
(2, 'KIBERA', 1, '2017-01-04 05:47:58', ''),
(3, 'KASARANI', 1, '2017-01-04 05:48:19', ''),
(4, 'MANYATTA', 2, '2017-01-04 05:49:24', 'ojwang.jacob@bulksms.com'),
(5, 'DAGORETTI NORTH', 1, '2017-01-11 09:00:02', 'omosh@gmail.com'),
(6, 'DAGORETTI SOUTH', 1, '2017-01-11 09:00:13', 'omosh@gmail.com'),
(7, 'EMBAKASI', 1, '2017-01-11 09:00:30', 'omosh@gmail.com'),
(8, 'KAMUKUNJI', 1, '2017-01-11 09:00:42', 'omosh@gmail.com'),
(9, 'KIBRA', 1, '2017-01-11 09:00:59', 'omosh@gmail.com'),
(10, 'LANGATA', 1, '2017-01-11 09:01:09', 'omosh@gmail.com'),
(11, 'MAKADARA', 1, '2017-01-11 09:01:18', 'omosh@gmail.com'),
(12, 'RUARAKA', 1, '2017-01-11 09:01:27', 'omosh@gmail.com'),
(13, 'STAREHE', 1, '2017-01-11 09:01:36', 'omosh@gmail.com'),
(14, 'WESTLANDS', 1, '2017-01-11 09:01:45', 'omosh@gmail.com'),
(15, 'KISUMU EAST', 2, '2017-01-11 09:03:36', 'omosh@gmail.com'),
(16, 'KISUMU WEST', 2, '2017-01-11 09:03:42', 'omosh@gmail.com'),
(17, 'KISUMU CENTRAL', 2, '2017-01-11 09:03:50', 'omosh@gmail.com'),
(18, 'SEME', 2, '2017-01-11 09:03:59', 'omosh@gmail.com'),
(19, 'NYANDO', 2, '2017-01-11 09:04:04', 'omosh@gmail.com'),
(20, 'MUHORONI', 2, '2017-01-11 09:04:12', 'omosh@gmail.com'),
(21, 'NYAKACH', 2, '2017-01-11 09:04:17', 'omosh@gmail.com'),
(22, 'CHANGAMWE', 28, '2017-01-11 09:11:16', 'omosh@gmail.com'),
(23, 'JOMVU', 28, '2017-01-11 09:11:27', 'omosh@gmail.com'),
(24, 'KISAUNI', 28, '2017-01-11 09:11:35', 'omosh@gmail.com'),
(25, 'NYALI', 28, '2017-01-11 09:11:42', 'omosh@gmail.com'),
(26, 'LIKONI', 28, '2017-01-11 09:11:49', 'omosh@gmail.com'),
(27, 'MVITA', 28, '2017-01-11 09:11:55', 'omosh@gmail.com'),
(28, 'MAPONGOLO', 6, '2017-01-17 13:53:34', 'ojwang.jacob@bulksms.com'),
(29, 'BARINGO CENTRAL', 3, '2017-01-18 08:28:16', 'ojwang.jacob@bulksms.com'),
(30, 'BARINGO NORTH', 3, '2017-01-18 08:29:07', 'ojwang.jacob@bulksms.com'),
(31, 'ELDAMA RAVINE', 3, '2017-01-18 08:29:43', 'ojwang.jacob@bulksms.com'),
(32, 'MOGOTIO', 3, '2017-01-18 08:29:56', 'ojwang.jacob@bulksms.com'),
(33, 'EMBU SOUTH', 8, '2017-01-25 06:30:11', 'ojwang.jacob@bulksms.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbcontactgroup`
--

CREATE TABLE IF NOT EXISTS `tbcontactgroup` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(50) DEFAULT NULL,
  `groupDescription` varchar(255) DEFAULT NULL,
  `cleintID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbcontactgroup`
--

INSERT INTO `tbcontactgroup` (`groupID`, `groupName`, `groupDescription`, `cleintID`, `status`, `createdON`, `createdBy`) VALUES
(1, 'Secretariats', 'xasdfdgerferrtrtrt dsd', 1, 1, '2017-01-25 08:00:02', 'ojwang.jacob@bulksms.com'),
(2, 'Team Mafisi', 'My close Circle', 2, 1, '2017-01-26 09:40:09', 'omosh@gmail.com'),
(3, 'Ngumba Esto Friends', 'Ngumba Estate Frends', 1, 1, '2017-01-27 09:58:13', 'ojwang.jacob@bulksms.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbcounty`
--

CREATE TABLE IF NOT EXISTS `tbcounty` (
  `countyID` int(11) NOT NULL AUTO_INCREMENT,
  `countyName` varchar(50) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`countyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbcounty`
--

INSERT INTO `tbcounty` (`countyID`, `countyName`, `createdON`, `createdBY`) VALUES
(1, 'NAIROBI', '2017-01-02 13:26:24', 'ojwang.jacob@bulksms.com'),
(2, 'KISUMU', '2017-01-03 08:52:00', 'ojwang.jacob@bulksms.com'),
(3, 'BARINGO', '2017-01-11 08:15:36', 'ojwang.jacob@bulksms.com'),
(4, 'BOMET', '2017-01-11 08:37:53', 'omosh@gmail.com'),
(5, 'BUNGOMA', '2017-01-11 08:38:04', 'omosh@gmail.com'),
(6, 'BUSIA', '2017-01-11 08:38:10', 'omosh@gmail.com'),
(7, 'ELGEYO MARAKWET', '2017-01-11 08:38:18', 'omosh@gmail.com'),
(8, 'EMBU', '2017-01-11 08:38:25', 'omosh@gmail.com'),
(9, 'GARISSA', '2017-01-11 08:38:32', 'omosh@gmail.com'),
(10, 'HOMA BAY', '2017-01-11 08:39:04', 'omosh@gmail.com'),
(11, 'ISIOLO', '2017-01-11 08:39:28', 'omosh@gmail.com'),
(12, 'KAKAMEGA', '2017-01-11 08:39:41', 'omosh@gmail.com'),
(13, 'KERICHO', '2017-01-11 08:39:47', 'omosh@gmail.com'),
(14, 'KIAMBU', '2017-01-11 08:40:14', 'omosh@gmail.com'),
(15, 'KILIFI', '2017-01-11 08:40:19', 'omosh@gmail.com'),
(16, 'KISII', '2017-01-11 08:40:34', 'omosh@gmail.com'),
(17, 'KIRINYAGA', '2017-01-11 08:40:43', 'omosh@gmail.com'),
(18, 'KITUI', '2017-01-11 08:40:59', 'omosh@gmail.com'),
(19, 'KWALE', '2017-01-11 08:46:27', 'omosh@gmail.com'),
(20, 'LAIKIPIA', '2017-01-11 08:46:35', 'omosh@gmail.com'),
(21, 'LAMU', '2017-01-11 08:46:42', 'omosh@gmail.com'),
(22, 'MACHAKOS', '2017-01-11 08:46:52', 'omosh@gmail.com'),
(23, 'MAKUENI', '2017-01-11 08:46:59', 'omosh@gmail.com'),
(24, 'MANDERA', '2017-01-11 08:50:18', 'omosh@gmail.com'),
(25, 'MERU', '2017-01-11 08:50:27', 'omosh@gmail.com'),
(26, 'MIGORI', '2017-01-11 08:50:34', 'omosh@gmail.com'),
(27, 'MARSABIT', '2017-01-11 08:53:52', 'omosh@gmail.com'),
(28, 'MOMBASA', '2017-01-11 08:53:57', 'omosh@gmail.com'),
(29, 'MURANGA', '2017-01-11 08:54:06', 'omosh@gmail.com'),
(30, 'NAKURU', '2017-01-11 08:54:14', 'omosh@gmail.com'),
(31, 'NANDI', '2017-01-11 08:54:21', 'omosh@gmail.com'),
(32, 'NAROK', '2017-01-11 08:54:27', 'omosh@gmail.com'),
(33, 'NYAMIRA', '2017-01-11 08:54:33', 'omosh@gmail.com'),
(34, 'NYANDARUA', '2017-01-11 08:54:38', 'omosh@gmail.com'),
(35, 'NYERI', '2017-01-11 08:54:44', 'omosh@gmail.com'),
(36, 'SAMBURU', '2017-01-11 08:54:50', 'omosh@gmail.com'),
(37, 'SIAYA', '2017-01-11 08:54:56', 'omosh@gmail.com'),
(38, 'TAITA TAVETA', '2017-01-11 08:55:02', 'omosh@gmail.com'),
(39, 'TANA RIVER', '2017-01-11 08:55:11', 'omosh@gmail.com'),
(40, 'THARAKA NITHI', '2017-01-11 08:55:18', 'omosh@gmail.com'),
(41, 'TRANS NZOIA', '2017-01-11 08:55:26', 'omosh@gmail.com'),
(42, 'TURKANA', '2017-01-11 08:55:32', 'omosh@gmail.com'),
(43, 'UASIN GISHU', '2017-01-11 08:55:38', 'omosh@gmail.com'),
(44, 'VIHIGA', '2017-01-11 08:55:44', 'omosh@gmail.com'),
(45, 'WAJIR', '2017-01-11 08:55:50', 'omosh@gmail.com'),
(46, 'WEST POKOT', '2017-01-11 08:56:00', 'omosh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbfileuploads`
--

CREATE TABLE IF NOT EXISTS `tbfileuploads` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) DEFAULT NULL,
  `filestatus` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) NOT NULL,
  `updatedON` varchar(50) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbfileuploads`
--

INSERT INTO `tbfileuploads` (`fileid`, `filename`, `filestatus`, `createdON`, `createdBY`, `updatedON`) VALUES
(1, 'fileUplaods/_20170124110115contacts.xls', 0, '2017-01-24 10:24:15', 'ojwang.jacob@bulksms.com', ''),
(2, 'fileUplaods/_20170124110142contacts.xls', 0, '2017-01-24 10:48:42', 'ojwang.jacob@bulksms.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbgroupmember`
--

CREATE TABLE IF NOT EXISTS `tbgroupmember` (
  `gmID` int(11) NOT NULL AUTO_INCREMENT,
  `goupID` int(11) DEFAULT NULL,
  `profileID` int(11) DEFAULT NULL,
  PRIMARY KEY (`gmID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbmessages`
--

CREATE TABLE IF NOT EXISTS `tbmessages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `messageText` text,
  `pageCount` int(11) DEFAULT NULL,
  `cleintID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `receipients` varchar(50) DEFAULT NULL,
  `delivered` int(11) DEFAULT NULL,
  `pending` int(11) DEFAULT NULL,
  `failed` int(11) DEFAULT NULL,
  `datesent` varchar(50) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tboutbox`
--

CREATE TABLE IF NOT EXISTS `tboutbox` (
  `outboxID` int(11) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(50) DEFAULT NULL,
  `messageID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updatedAt` varchar(50) DEFAULT NULL,
  `verfiied` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`outboxID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbpost`
--

CREATE TABLE IF NOT EXISTS `tbpost` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `postName` varchar(50) DEFAULT NULL,
  `postScope` int(11) NOT NULL,
  `PostDescription` varchar(255) NOT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbpost`
--

INSERT INTO `tbpost` (`postID`, `postName`, `postScope`, `PostDescription`, `createdON`, `createdBY`) VALUES
(1, 'Member of Parliament(MP)', 2, 'member of parliement', '2017-01-24 11:45:52', 'ojwang.jacob@bulksms.com'),
(2, 'MEMBER OF COUNTY ASSEMBLY(MCA)', 1, 'MCA', '2017-01-24 11:45:33', 'ojwang.jacob@bulksms.com'),
(3, 'SENATOR', 1, 'Member of Parliament', '2017-01-24 11:45:27', 'ojwang.jacob@bulksms.com'),
(4, 'WOMEN REPRESENTATIVE(WR)', 1, 'Women Representative', '2017-01-24 11:45:37', 'omosh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbprofile`
--

CREATE TABLE IF NOT EXISTS `tbprofile` (
  `profileID` int(11) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `otherNames` varchar(50) DEFAULT NULL,
  `clientID` int(11) DEFAULT NULL,
  `groupID` int(11) NOT NULL DEFAULT '0',
  `YOB` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `regionID` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`profileID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbprofile`
--

INSERT INTO `tbprofile` (`profileID`, `msisdn`, `firstName`, `otherNames`, `clientID`, `groupID`, `YOB`, `gender`, `regionID`, `createdON`, `createdBY`) VALUES
(1, '2547059877658', 'Mike', 'Frankysty', 1, 0, 'Male', '1991-01-10', 8, '2017-01-27 08:44:41', 'ojwang.jacob@bulksms.com'),
(2, '2547059877653', 'Mike', 'Mokono', 1, 0, 'Male', '1992-09-10', 8, '2017-01-27 08:44:35', 'ojwang.jacob@bulksms.com'),
(3, '254705776690', 'Richie', 'Messy Joan', 1, 0, 'Male', '1981-10-10', 2, '2017-01-25 06:17:50', 'ojwang.jacob@bulksms.com'),
(4, '2547059867654', 'Martha', 'Masile Mosia', 1, 0, 'Female', '1923-01-12', 1, '2017-01-25 06:20:23', 'ojwang.jacob@bulksms.com'),
(5, '2547029877654', 'Charles', 'Musila', 1, 0, 'Male', '1992-09-07', 6, '2017-01-25 06:22:13', 'ojwang.jacob@bulksms.com'),
(6, '2547059877633', 'Westlife', 'Backstreeter', 1, 0, 'Male', '1992-01-11', 6, '2017-01-25 06:23:12', 'ojwang.jacob@bulksms.com'),
(7, '254705776693', 'Joan', 'Wanja', 1, 1, 'Female', '1990-01-20', 9, '2017-01-27 08:45:06', 'ojwang.jacob@bulksms.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbreceipients`
--

CREATE TABLE IF NOT EXISTS `tbreceipients` (
  `receipientID` int(11) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(50) DEFAULT NULL,
  `messageID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sources` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`receipientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbroles`
--

CREATE TABLE IF NOT EXISTS `tbroles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) DEFAULT NULL,
  `roleDescription` text,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(50) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbroles`
--

INSERT INTO `tbroles` (`roleid`, `roleName`, `roleDescription`, `createdON`, `createdBy`) VALUES
(1, 'ADMIN', 'Admin role here', '2017-01-10 08:56:12', 'ojwang.jacob@bulksms.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE IF NOT EXISTS `tbusers` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`userid`, `msisdn`, `username`, `userpassword`, `active`, `clientID`, `roleid`, `createdon`, `createdby`) VALUES
(1, '0705958918', 'ojwang.jacob@bulksms.com', 'bulksms', 1, 0, 1, '2017-01-02 11:55:48', 'SuperAdmin'),
(2, '2547059877654', 'omosh@gmail.com', '612864', 1, 1, 1, '2017-01-11 08:22:48', 'ojwang.jacob@bulksms.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbward`
--

CREATE TABLE IF NOT EXISTS `tbward` (
  `wardID` int(11) NOT NULL AUTO_INCREMENT,
  `wardName` varchar(50) DEFAULT NULL,
  `constituencyID` int(11) DEFAULT NULL,
  `createdON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`wardID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbward`
--

INSERT INTO `tbward` (`wardID`, `wardName`, `constituencyID`, `createdON`, `createdBY`) VALUES
(1, 'KASAGAM', 1, '2017-01-04 06:55:35', 'ojwang.jacob@bulksms.com'),
(2, 'KAJULU', 15, '2017-01-11 09:19:37', 'omosh@gmail.com'),
(3, 'KOLWA EAST', 15, '2017-01-11 09:19:47', 'omosh@gmail.com'),
(4, 'MANYATTA B', 15, '2017-01-11 09:20:44', 'omosh@gmail.com'),
(5, 'NYALENDA A', 15, '2017-01-11 09:20:49', 'omosh@gmail.com'),
(6, 'KOLWA CENTRAL', 15, '2017-01-11 09:20:19', 'omosh@gmail.com'),
(7, 'MAPONGE', 28, '2017-01-17 13:54:37', 'ojwang.jacob@bulksms.com'),
(8, 'SARANGOMBE', 2, '2017-01-26 09:32:23', 'omosh@gmail.com'),
(9, 'WOODLEY/KENYATTA GOLF COURSE', 2, '2017-01-26 09:32:38', 'omosh@gmail.com'),
(10, 'MAKINA', 2, '2017-01-26 09:32:50', 'omosh@gmail.com'),
(11, 'LAINI SABA', 2, '2017-01-26 09:32:58', 'omosh@gmail.com'),
(12, 'LINDI', 2, '2017-01-26 09:33:06', 'omosh@gmail.com'),
(13, 'CLAY CITY', 3, '2017-01-26 09:34:09', 'omosh@gmail.com'),
(14, 'MWIKI', 3, '2017-01-26 09:34:17', 'omosh@gmail.com'),
(15, 'KASARANI', 3, '2017-01-26 09:34:25', 'omosh@gmail.com'),
(16, 'NJIRU', 3, '2017-01-26 09:34:32', 'omosh@gmail.com'),
(17, 'RUAI', 3, '2017-01-26 09:34:39', 'omosh@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
