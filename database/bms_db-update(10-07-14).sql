-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2014 at 04:16 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`AccNo` int(11) unsigned NOT NULL,
  `AccType` enum('admin','user') NOT NULL,
  `MemberID` int(11) unsigned DEFAULT NULL,
  `CategoryID` varchar(255) NOT NULL,
  `Member_Pword` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccNo`, `MemberID`, `CategoryID`, `Member_Pword`) VALUES
(2, 1, '11104785', 'fe703d258c7ef5f50b71e06565a65aa07194907f');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`Cat_ID` int(10) unsigned NOT NULL,
  `Cat_Type` varchar(255) NOT NULL,
  `Cat_Desc` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Type`, `Cat_Desc`) VALUES
(1, 'Construction', 'Anything that involves construction that involves public property '),
(2, 'Community Service', 'Anything that helps the welfare of the people');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
`Com_ID` int(11) unsigned NOT NULL,
  `Com_Status` enum('Active','Inactive','Disbanded','Suspended') NOT NULL,
  `Com_Name` varchar(255) NOT NULL,
  `Com_Desc` text NOT NULL,
  `Com_Yr_Founded` year(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`Com_ID`, `Com_Status`, `Com_Name`, `Com_Desc`, `Com_Yr_Founded`) VALUES
(1, 'Active', 'PAASCO', 'We are not the creditors you want but the creditors you deserve!', 1990);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`Event_ID` int(10) unsigned NOT NULL,
  `Event_ProjID` int(10) unsigned NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `Event_Location` varchar(255) NOT NULL,
  `Event_DateStart` date NOT NULL,
  `Event_DateEnd` date NOT NULL,
  `Event_Participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`Mem_ID` int(11) unsigned NOT NULL,
  `Mem_CommitteeID` int(11) unsigned NOT NULL,
  `Mem_FirstName` varchar(255) NOT NULL,
  `Mem_LastName` varchar(255) NOT NULL,
  `Mem_OfficePosition` varchar(50) NOT NULL,
  `Mem_Curr_Term` varchar(50) NOT NULL,
  `Mem_Address` varchar(255) NOT NULL,
  `Mem_Gender` varchar(10) NOT NULL,
  `Mem_MiddleName` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Mem_ID`, `Mem_CommitteeID`, `Mem_FirstName`, `Mem_LastName`, `Mem_OfficePosition`, `Mem_Curr_Term`, `Mem_Address`, `Mem_Gender`, `Mem_MiddleName`) VALUES
(1, 1, 'John Claude', 'Damme', 'President', '2014 - 2018', 'Here in cebu!', 'Male', 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`Proj_ID` int(11) unsigned NOT NULL,
  `Proj_AccNo` int(11) unsigned NOT NULL,
  `Proj_CatID` int(11) unsigned NOT NULL,
  `Proj_Name` varchar(255) NOT NULL,
  `Proj_Purpose` varchar(255) NOT NULL,
  `Proj_Desc` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Proj_ID`, `Proj_AccNo`, `Proj_CatID`, `Proj_Name`, `Proj_Purpose`, `Proj_Desc`) VALUES
(1, 2, 1, 'Bridge Rework', 'To make the bridge sturdier', 'This aims to renovate the bridge enough to withstand typhoons');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`Trans_ID` int(10) unsigned NOT NULL,
  `Trans_AccNo` int(10) unsigned NOT NULL,
  `Trans_ListID` int(10) unsigned NOT NULL,
  `Trans_Date` date NOT NULL,
  `Trans_Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_list`
--

CREATE TABLE IF NOT EXISTS `transaction_list` (
`TL_ID` int(10) unsigned NOT NULL,
  `TL_TransID` int(10) unsigned NOT NULL,
  `TL_ProjectID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`AccNo`), ADD UNIQUE KEY `MemberID_2` (`MemberID`), ADD KEY `MemberID` (`MemberID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
 ADD PRIMARY KEY (`Com_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`Event_ID`), ADD KEY `Event_ProjID` (`Event_ProjID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`Mem_ID`), ADD UNIQUE KEY `Mem_ComID` (`Mem_CommitteeID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`Proj_ID`), ADD KEY `Proj_CatID` (`Proj_CatID`), ADD KEY `Proj_AccNo` (`Proj_AccNo`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`Trans_ID`), ADD KEY `Trans_AccNo` (`Trans_AccNo`), ADD KEY `Trans_ListID` (`Trans_ListID`);

--
-- Indexes for table `transaction_list`
--
ALTER TABLE `transaction_list`
 ADD PRIMARY KEY (`TL_ID`), ADD KEY `TL_TransID` (`TL_TransID`), ADD KEY `TL_ProjectID` (`TL_ProjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `AccNo` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `Cat_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
MODIFY `Com_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `Event_ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `Mem_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `Proj_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `Trans_ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_list`
--
ALTER TABLE `transaction_list`
MODIFY `TL_ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `member` (`Mem_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`Event_ProjID`) REFERENCES `project` (`Proj_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`Mem_CommitteeID`) REFERENCES `committee` (`Com_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`Proj_CatID`) REFERENCES `category` (`Cat_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`Proj_AccNo`) REFERENCES `account` (`AccNo`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Trans_AccNo`) REFERENCES `account` (`AccNo`),
ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`Trans_ListID`) REFERENCES `transaction_list` (`TL_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `transaction_list`
--
ALTER TABLE `transaction_list`
ADD CONSTRAINT `transaction_list_ibfk_1` FOREIGN KEY (`TL_TransID`) REFERENCES `transaction` (`Trans_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `transaction_list_ibfk_2` FOREIGN KEY (`TL_ProjectID`) REFERENCES `project` (`Proj_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
