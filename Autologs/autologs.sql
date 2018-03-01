-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 08:27 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autologs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblogs`
--

CREATE TABLE IF NOT EXISTS `tblogs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `field0` varchar(5) NOT NULL,
  `field1` varchar(10) NOT NULL,
  `field2` varchar(16) NOT NULL,
  `field3` varchar(10) NOT NULL,
  `field4` decimal(65,0) NOT NULL,
  `field7` varchar(20) NOT NULL,
  `field37` varchar(50) NOT NULL,
  `field39` varchar(10) NOT NULL,
  `field48` varchar(255) NOT NULL,
  `field50` varchar(50) NOT NULL,
  `field56` varchar(50) NOT NULL,
  `field65` varchar(50) NOT NULL,
  `field68` varchar(50) NOT NULL,
  `field90` varchar(50) NOT NULL,
  `field102` varchar(16) NOT NULL,
  `field127` varchar(90) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbprofile`
--

CREATE TABLE IF NOT EXISTS `tbprofile` (
  `profileid` int(11) NOT NULL AUTO_INCREMENT,
  `usergroupid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `createdON` datetime DEFAULT NULL,
  `createdBY` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`profileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbprofile`
--

INSERT INTO `tbprofile` (`profileid`, `usergroupid`, `roleid`, `createdON`, `createdBY`) VALUES
(1, 1, 1, '2017-02-08 00:00:00', '1'),
(2, 1, 2, '2017-02-08 00:00:00', '1'),
(3, 1, 3, '2017-02-08 00:00:00', '1'),
(4, 1, 4, '2017-02-08 00:00:00', '1'),
(5, 1, 5, '2017-06-26 00:00:00', '1'),
(6, 1, 6, '2017-06-26 00:00:00', NULL),
(7, 1, 7, '2017-06-26 00:00:00', '1'),
(8, 1, 8, '2017-06-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbroles`
--

CREATE TABLE IF NOT EXISTS `tbroles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) DEFAULT NULL,
  `roleDescription` text,
  `createdON` datetime DEFAULT NULL,
  `createdBy` varchar(50) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbroles`
--

INSERT INTO `tbroles` (`roleid`, `roleName`, `roleDescription`, `createdON`, `createdBy`) VALUES
(1, 'Add New Post', 'This menu is for Posting News', '2017-02-08 00:00:00', '1'),
(2, 'Approve Posts', 'Approving the news posted before they are seen by the public', '2017-02-08 00:00:00', '1'),
(3, 'View Posts', 'View News Posted', '2017-02-08 00:00:00', '1'),
(4, 'Statistics', 'Amend News post', '2017-02-08 00:00:00', '1'),
(5, 'Account', 'For creating the Account and managing it.', '2017-06-26 00:00:00', '1'),
(6, 'Users', 'Manage Users, by adding,disabling and enabling.', '2017-06-26 00:00:00', '1'),
(7, 'Profiles', 'Managing Profiles.', '2017-06-26 00:00:00', '1'),
(8, 'System Admin', 'Manage Categories', '2017-06-26 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbuserapps`
--

CREATE TABLE IF NOT EXISTS `tbuserapps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `appname` varchar(50) NOT NULL,
  `appdescription` varchar(500) DEFAULT NULL,
  `createdon` varchar(20) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbuserapps`
--

INSERT INTO `tbuserapps` (`id`, `userid`, `appname`, `appdescription`, `createdon`, `createdby`) VALUES
(1, 1, 'AAR_Servlet', 'AAR_Servlet this is esb module that process requests from the channels', '2017/08/27 4.00pm', 1),
(2, 1, 'AAR_SMS_Adaptor', 'AAR_SMS_Adaptor sends SMS', '2017/08/27 4.00pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbusergroup`
--

CREATE TABLE IF NOT EXISTS `tbusergroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(50) DEFAULT NULL,
  `groupDescription` text,
  `createdON` datetime DEFAULT NULL,
  `createdBy` varchar(50) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbusergroup`
--

INSERT INTO `tbusergroup` (`groupid`, `groupName`, `groupDescription`, `createdON`, `createdBy`) VALUES
(1, 'Super Admin', 'this is the creater of the system and can do all the roles', '2017-02-07 09:44:07', '1'),
(2, 'Human Resource', 'Human Resource guys', '2017-02-22 07:58:15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE IF NOT EXISTS `tbusers` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `createdON` datetime DEFAULT NULL,
  `createdBY` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`userid`, `lastname`, `firstname`, `emailaddress`, `phonenumber`, `gender`, `username`, `userpassword`, `active`, `groupid`, `createdON`, `createdBY`) VALUES
(1, 'ojwang', 'jacob', 'ojwang.jacob@gmail.com', '0705123456', '', 'ojwang.jacob', 'sunday', 1, 1, '2017-02-08 00:00:00', '1'),
(2, 'mathayiae', 'Merrito', 'merito@ymail.com', '0712589369', 'Male', 'mathayiae.Merrito', '556252', 1, 2, '2017-03-29 16:11:33', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
