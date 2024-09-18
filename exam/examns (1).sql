-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 12:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examns`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_master`
--

CREATE TABLE IF NOT EXISTS `batch_master` (
`id` int(5) NOT NULL,
  `batch_id` varchar(5) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `report_time` varchar(10) NOT NULL,
  `login_time` varchar(10) DEFAULT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_master`
--

INSERT INTO `batch_master` (`id`, `batch_id`, `start_time`, `report_time`, `login_time`, `status`) VALUES
(1, 'B1', '03:30 PM', '02:30 PM', ' 15:00:00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `center_master`
--

CREATE TABLE IF NOT EXISTS `center_master` (
`id` int(11) NOT NULL,
  `center_code` varchar(25) NOT NULL,
  `center_address` varchar(255) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `contact_no` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_master`
--

INSERT INTO `center_master` (`id`, `center_code`, `center_address`, `userid`, `password`, `contact_no`) VALUES
(1, 'PATNA', 'SIDDHARTA INSTITUTE OF TECHNOLOGY, NAYA TOLA, BHAGWAT NAGAR, KUMHRAR, PATNA-800026', 'sidh_advt@yahoo.com', 'nielit', '9473450846'),
(2, 'AURANGABAD', 'THITHOLI SAMAJIK EVAM SANSKRITIK DARPAN, NAWADIH EIDGAH, AURANGABAD-824101', 'thitholi@rediffmail.com', 'nielit', '9431263763'),
(3, 'JEHANABAD', 'WIZARD-TECH COMPUTER ACADEMY, C/O NIC EDUCATION CENTRE, KHETAN LANE, JEHANABAD-804408', 'jahanabad1@gmail.com', 'nielit', '9386107546'),
(4, 'NALANDA', 'DATAPRO COMPUTERS PVT. LTD., OPP-GULMARG HOTEL, QAMRUDDINGANJ, BIHARSHARIF, NALANDA-803101', 'gm@datapro.in', 'nielit', '9334779133'),
(5, 'AURANGABAD', 'DATAPRO COMPUTERS PVT. LTD., J.K HOSPITAL, GT ROAD, NEAR OVER BRIDGE, AURANGABAD', 'sudhirsuman1989@gmail.com', 'nielit', '9835802809'),
(6, 'BHOJPUR', 'DATAPRO COMPUTERS PVT. LTD., ZERO MILE, ARAG- SASRAM ROAD, OPP TO DHARM KANTA, ARAH, BHOJPUR', 'cm.ajav.ara@datapro.in', 'nielit', '9304022221'),
(7, 'Bhojpur', 'The Saviours, C/o Z. Cariyar Academy, Opp. Dy. SP Kothi , Gate No2, Mahraja Hata,Mangal Pandey Park, Ara', 'zedcaara@gmail.com  ', 'nielit', '8083660903'),
(8, 'ROHTAS (SASARAM)', 'DATAPRO COMPUTERS PVT. LTD., OLD GT ROAD, NEAR BEDA NAHAR, SASARAM ROHTAS', 'gm@datapro.in', 'nielit', '9525132644'),
(9, 'GAYA', 'WIZARD-TECH COMPUTER ACADEMY, C/O BRIGHT COMPUTER EDUCATION, GAYA-823002', 'wtca.gaya@gmail.com', 'nielit', '9709326215'),
(10, 'JEHANABAD', 'BUDHA EDUCATIONAL & ECONOMIC DEVELOPMENT INSTITUTE (BEEDI), MOHAN PANDEY COMPLEX, 1ST FLOOR, OPPOSITE SHIV SHANKAR CINEMA HALL, P.G.ROAD, JEHANABAD.', 'beedi_enquiry@yahoo.co.in', 'nielit', '9386433779'),
(11, 'ARARIA', 'MAXWELL COMPUTER CENTRE, HANUMANT NAGAR, WARD NO.-15, ASHRAM ROAD, ARARIA                             CCC No.-88004064', 'abhishekmiit@gmail.com', 'nielit', '9934606071'),
(12, 'BHAGALPUR', 'SPEED COMPUTER CENTRE, CHHOTI KHAJARPUR, S.M.COLLEGE ROAD, BHAGALPUR                                                     CCC No.-88003517', 'sanjayb4ubgp@gmail.com', 'nielit', '7549928669'),
(13, 'KATIHAR', 'WIZARD-TECH COMPUTER ACADEMY C/O NATIONAL INSTITUTE OF PROFESSIONAL STUDIES, BESIDE MANORAM VIHAR D.S COLLEGE  ROAD, PETROL PUMP, KATIHAR-854105', 'wtca.katihar@gmail.com', 'nielit', '9470424975'),
(14, 'KISHANGANJ', 'SAMTA GRAMIN VIKAS,UTTARPALI RAHMANI COLONY, THAKURGANJROAD, KISHANGANJ.                                                              CCC No.-88004098', 'samtagraminvikas@gmail.com', 'nielit', '9431867814'),
(15, 'KATIHAR', 'MAXWELL COMPUTER CENTRE, DR. N.K.JHA.LANE, KALI BARI CHOWK, BINODPUR, KATIHAR                                     CCC No.-88003480', 'abhishekmiit@gmail.com', 'nielit', '9934606071'),
(16, 'KHAGARIA', 'MAXWELL COMPUTER CENTRE, SAMEER NAGAR, NEAR KOSI COLLEGE, KHAGARIA                       CCC No.-88004063', 'abhishekmiit@gmail.com', 'nielit', '9934606071'),
(17, 'BETTIAH', 'DATAPRO COMPUTERS PVT. LTD., CANARA BANK BUILDING, BHANU CHAPAR, BETTIAH WEST CHAMPARAN', 'bettiah@datapro.in', 'nielit', '9955906631'),
(18, 'CHAPRA', 'WIZARD-TECH COMPUTER ACADEMY C/O SOFTWARE EDUCATION CENTRE, LAH BAZAR, SALEMPUR, CHAPRA, SARAN-841301', 'vikash.wtca@gmail.com', 'nielit', '9386014290'),
(19, 'DARBHANGA', 'DATAPRO COMPUTERS PVT. LTD., VIP ROAD, NEAR ML ACADEMY, LAHERIYA SARAI, DARBHANGA', 'cm.ajv.drb@datapro.in', 'nielit', '9570595265'),
(20, 'GOPALGANJ', 'BUDHA EDUCATIONAL & ECONOMIC DEVELOPMENT INSTITUTE (BEEDI),  B.B VERMA COMPLEX, THANA ROAD, GANDHI NAGAR, BARAULI, GOPALGANJ.', 'beedi_enquiry@yahoo.co.in', 'nielit', '9386433779'),
(21, 'GOPALGANJ', 'WIZARD-TECH COMPUTER ACADEMY C/O MULTI SOFT INSTITUTE OF INFORMATION & TECHNOLOGY, JAMO ROAD BARHARIA, SIWAN, GOPALGANJ-841232', 'wtca.barhariyasiwan@gmail.com', 'nielit', '9572014933'),
(22, 'MADHUBANI', 'DATAPRO COMPUTERS PVT. LTD., RAM CHOWK, MADHUBANI SAKRI ROAD, MADHUBANI', 'hivikram780@gmail.com', 'nielit', '9135527285'),
(23, 'MOTIHARI', 'AKASH INSTITUTE OF INFORMATION TECHNOLOGY, BALUA TAL, MOTIHARI, EAST CHAMPARAN.', 'nkv_motihari@rediffmail.com', 'nielit', '9199655014'),
(24, 'MUZAFFERPUR', 'DATAPRO COMPUTERS PVT. LTD., BABA KA DHABA, SITAMARHI ROAD, NEAR POWER GRID, MUZAFFARPUR', 'cm.ajv.mzf@datapro.in', 'nielit', '9334807737'),
(25, 'RAXAUL', 'WIZARD-TECH COMPUTER ACADEMY C/O B.S.E.F COMPUTER EDUCATION, NEAR CHANDEL MARKET, KACHI NAHAR, SAINIK ROAD, KAURIHAR CHOWK, RAXAUL, EAST CHAMPARAN-8453305', 'wtca.raxaul@gmail.com', 'nielit', '8507623539'),
(26, 'SIWAN', 'BUDHA EDUCATIONAL & ECONOMIC DEVELOPMENT INSTITUTE (BEEDI),      1ST FLOOR, AJAY STEEL WORKS, FRONT OF DR. RAJESHWAR SINGH, BYPASS ROAD, SIWAN.', 'beedi_enquiry@yahoo.co.in', 'nielit', '9386433779'),
(27, 'SIWAN', 'DATAPRO COMPUTERS PVT. LTD., NEW ADARSH COLONY, BEHIND TUNTUN BABU PETROL PUMP, BABUNIYA MORE SIWAN.', 'siwan@datapro.in', 'nielit', '8407801098'),
(28, 'VAISHALI', 'WIARD-TECH COMPUTER ACADEMY, C/O CONCEPT EVALUTAION ACADEMY, NUNUBABA CHOWK, LALGANJ, VAISHALI-844121', 'wtca.lalganj@gmail.com', 'nielit', '9102666869'),
(29, 'VAISHALI', 'JIGYASA EDUCATIONAL SERVICE PVT. LTD., LALGANJ ROAD, SRIRAMPUR, PS-MINAPURRAI,HAJIPUR.', 'jigyasa.hajipurbranch@gmail.com', 'nielit', '9835480755'),
(30, 'Madhepura', 'Global Institute Of Information Technology And Samajic Seva Sansthan Madhepura, Bihar 852113', 'info@giitsss.com', 'nielit', '9939738000');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
`id` int(11) NOT NULL,
  `exam_name` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `total_time` int(5) DEFAULT NULL,
  `total_que` int(5) DEFAULT NULL,
  `negative_mark` float(4,2) DEFAULT NULL,
  `batch` varchar(25) DEFAULT NULL,
  `module` int(3) DEFAULT NULL,
  `bilingual` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_name`, `start_date`, `end_date`, `total_time`, `total_que`, `negative_mark`, `batch`, `module`, `bilingual`, `status`) VALUES
(1, 'Networking_Specialist', '19-03-2021', NULL, 150, 120, 0.00, NULL, 1, 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
`id` int(11) NOT NULL,
  `candidate_id` varchar(20) DEFAULT NULL,
  `module` varchar(11) DEFAULT NULL,
  `candidate_ans` varchar(10000) DEFAULT NULL,
  `total_que` int(5) DEFAULT NULL,
  `total_attempt` int(5) DEFAULT NULL,
  `not_attempt` int(5) DEFAULT NULL,
  `total_mark` float(5,2) DEFAULT NULL,
  `neg_mark` float(5,2) DEFAULT NULL,
  `gross_total` float(5,2) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `percent` float(5,2) DEFAULT NULL,
  `lock_exam` varchar(2) DEFAULT NULL,
  `exam_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE IF NOT EXISTS `log_user` (
`id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id`, `user`, `password`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`id` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `module_description` int(3) DEFAULT NULL,
  `tot_que` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`, `module_description`, `tot_que`) VALUES
(1, 'Networking_Specialist', 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `module_section`
--

CREATE TABLE IF NOT EXISTS `module_section` (
`id` int(5) NOT NULL,
  `module` int(3) NOT NULL,
  `section_name` varchar(100) DEFAULT NULL,
  `section` int(3) NOT NULL,
  `weightage` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_section`
--

INSERT INTO `module_section` (`id`, `module`, `section_name`, `section`, `weightage`) VALUES
(1, 1, '1', 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`qId` int(11) NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `que_desc` varchar(5000) DEFAULT NULL,
  `que_hindi` varchar(10000) CHARACTER SET utf8 DEFAULT NULL,
  `option1` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `option1_hindi` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `option2` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `option2_hindi` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `option3` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `option3_hindi` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `option4` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `option4_hindi` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `answer_type` varchar(25) DEFAULT NULL,
  `correct_answer` varchar(2) DEFAULT NULL,
  `bilingual` enum('N','Y') DEFAULT NULL,
  `creation_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `creation_ip` varchar(255) DEFAULT NULL,
  `status` enum('N','Y') DEFAULT NULL,
  `ques_img` varchar(50) DEFAULT NULL,
  `module_section` varchar(10) DEFAULT NULL,
  `img_status` char(1) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qId`, `module`, `que_desc`, `que_hindi`, `option1`, `option1_hindi`, `option2`, `option2_hindi`, `option3`, `option3_hindi`, `option4`, `option4_hindi`, `answer_type`, `correct_answer`, `bilingual`, `creation_time`, `creation_ip`, `status`, `ques_img`, `module_section`, `img_status`, `created_by`) VALUES
(1, '1', 'A&lowbar;&lowbar;&lowbar;&lowbar;the group is a group that contains the same users as an OU.', '', ' Operation ', '', 'Administration', '', 'Primary', '', 'Shadow', '', 'single', 'D', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(2, '1', 'ACL stands for Access Control List', '', 'TRUE', '', 'FALSE', '', '', '', '', '', 'single', 'A', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(3, '1', 'There are two types of groups in Active Directory.', '', 'TRUE', '', 'FALSE', '', '', '', '', '', 'single', 'A', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(4, '1', 'How many group scopes are there in Active Directory?', '', 'Three ', '', 'Zero', '', 'Ten ', '', 'Five', '', 'single', 'A', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(5, '1', 'Find which is not one of the four divisions or container structures in Active Directory?', '', 'Forests', '', 'Domain', '', 'Webs', '', 'Organizational units', '', 'single', 'C', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(6, '1', 'In Windows Server 2012 and Windows 8&comma; Group Policy Objects give administrators the ability to select new Internet Explorer policies', '', 'TRUE', '', 'FALSE', '', '', '', '', '', 'single', 'A', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(7, '1', 'Active Directory is a technology created by &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; that provides a variety of network services&comma; including:', '', 'Microsoft', '', ' Internet Explorer', '', ' Microsoft Office', '', 'Microsoft Window', '', 'single', 'A', 'N', '2021-03-19 07:23:31', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(8, '1', 'In &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&comma; ADAM has been renamed AD LDS (Lightweight Directory Services', '', 'Microsoft Windows', '', 'Windows Vista', '', 'Windows Server 2008', '', ' Windows 2000', '', 'single', 'C', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(9, '1', 'To Find which of the following Active Directory containers can Group Policies be applied?', '', ' sites', '', ' OUs', '', ' domains', '', ' all of the above', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(10, '1', 'What is the CIDR equivalent for 255.255.255.224?', '', '/24', '', '/25', '', '/26', '', '/27', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(11, '1', 'A DNS client is called &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' DNS updater', '', ' DNS resolver', '', ' DNS handler', '', ' none of the mentioned', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(12, '1', 'The domain name system is maintained by &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' distributed database system', '', ' a single server', '', ' a single computer', '', ' none of the mentioned', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(13, '1', 'The entire hostname has a maximum of &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' 255 characters', '', ' 127 characters', '', ' 63 characters', '', ' 31 characters', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(14, '1', 'Communication channel is shared by all the machines on the network in &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' broadcast network', '', ' unicast network', '', ' multicast network', '', ' anycast network', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(15, '1', 'Network layer firewall works as a &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' Frame filter', '', ' Packet filter', '', ' Content filter', '', ' Virus filter', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(16, '1', 'A proxy firewall filters at ________', '', ' Physical layer', '', ' Data link layer', '', ' Network layer', '', ' Application layer', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(17, '1', 'Physical or logical arrangement of network is &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' Topology', '', ' Routing', '', ' Networking', '', ' Control', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(18, '1', '&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; topology requires a multipoint connection.', '', ' Star', '', ' Mesh', '', ' Ring', '', ' Bus', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(19, '1', 'LAN stands for &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' Last area network', '', ' Local area network', '', 'long area network', '', 'light access network', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(20, '1', 'Communication offered by TCP is &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;', '', ' Full-duplex', '', ' Half-duplex', '', ' Semi-duplex', '', ' Byte by byte', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(21, '1', 'What will be the resistance if 10 resistors of? 10 ohm? each is connected in series??', '', '100', '', '1', '', '0.1', '', '10', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(22, '1', 'what is S.I unit of potential difference', '', 'ohm', '', 'watt', '', 'henry', '', 'volt', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(23, '1', 'what is the S.I unit of power', '', 'jule', '', 'watt', '', 'ohm', '', 'calories', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(24, '1', 'what is the S.I unit of Inductunce', '', 'farad', '', 'ohm', '', 'henry', '', 'jule', '', 'single', 'C', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(25, '1', 'what is the S.I unit of Capacitance', '', 'farad', '', 'ohm', '', 'henry', '', 'jule', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(26, '1', 'What will be the capacitance if 10 capacitors of? 10f? each is connected in parallel??', '', '100', '', '1', '', '0.1', '', '15', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(27, '1', 'The cut - in voltage for silicon and germanium are', '', '0.3 V&comma; 0.3 V', '', '0.3 V&comma; 0.7 V', '', '0.7 V&comma; 0.7 V', '', '0.7 V&comma; 0.3 V', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(28, '1', 'Impurities are generally added in the pure semiconductor to', '', 'increase the number of electrons', '', 'increase the number of holes', '', 'increase their conductivity', '', 'all of the above', '', 'single', 'C', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(29, '1', 'A resistor with color bands: red-red-red-gold has the value', '', '22kohm ', '', '2.2kohm ', '', '220kohm ', '', 'none of above', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(30, '1', 'A resistor with color bands: orenge-red-red-gold has the value', '', '32kohm ', '', '3.2kohm ', '', '320kohm ', '', 'none of above', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(31, '1', 'Two resistor placed in series the final resistance is', '', 'higher', '', 'lower', '', 'same', '', 'cannot determine', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(32, '1', 'If 10k resistor is placed across a 10v supply&comma;the current will be', '', '10mA', '', '1mA', '', '0.01mA', '', '0.1mA', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(33, '1', 'The quantities whose values vary in non-continuous manner are', '', 'analogue', '', 'digital', '', 'scalar', '', 'vector', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(34, '1', 'When anyone of inputs is at 1&comma; the value of output of OR gate will be', '', '2', '', '1', '', '3', '', '0', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(35, '1', 'If  three 10 ?F capacitors are connected in parallel the&comma; net capacitance is', '', '20 ', '', '30 ', '', '40 ', '', '60 ', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(36, '1', 'State Kirchofffs current Law.', '', 'sum of all positive currents is equal to sum of all negative currents.', '', 'sum of all positive emfs is equal to the sum of all negative emfs taken in order', '', 'sum of all powers in a circuit', '', ' sum of all emfs in a circuit', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(37, '1', 'Kirchofffs voltage law', '', 'algebraic sum of emf', '', 'algebraic sum of emf', '', 'zero', '', 'algebraic sum of currents', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(38, '1', 'A battery of emf 12V is connected to an external resistance of 20 ohm. Find current flowing through resistor', '', '4', '', '0.6', '', '40', '', '6', '', 'single', 'B', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(39, '1', 'A passive element in a circuit is one which?', '', 'Receives energy', '', 'Supplies energy ', '', 'both supplies and receives energy', '', 'None of above', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(40, '1', 'KCL is applicable at', '', ' A Junction', '', 'Resistor ', '', 'Loop', '', 'all of the above', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(41, '1', 'What is true about microprocessor?', '', 'microprocessor is a controlling unit of a micro-computer', '', 'It is fabricated on a small chip capable of performing ALU (Arithmetic Logical Unit) operations', '', ' It also communicate with the other devices connected to it.', '', 'All of the above', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(42, '1', 'Microprocessor consists of?', '', 'ALU', '', 'register array', '', 'control unit', '', 'All of the above', '', 'single', 'D', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(43, '1', 'The &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; controls the flow of data and instructions within the computer.', '', 'control unit', '', 'register array', '', 'accumulator', '', 'ALU', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(44, '1', 'Which of the following is not a features of a Microprocessor?', '', 'Versatility', '', 'Reliability', '', 'Low Bandwidth', '', 'Low Power Consumption', '', 'single', 'C', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(45, '1', 'The microprocessor &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; those instructions from the memory', '', 'Fetch', '', 'Decode', '', 'Execute', '', 'None of the above', '', 'single', 'A', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(46, '1', 'It determines the number of operations per second?', '', 'Bandwidth', '', 'Word Length', '', 'Clock Speed', '', 'Operations Speed', '', 'single', 'C', 'N', '2021-03-19 07:23:32', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(47, '1', 'Clock Speed is also known as?', '', 'Clock Rate.', '', 'Clock Length.', '', 'Clock Set.', '', 'Clock Type.', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(48, '1', 'An 8-bit microprocessor can process &lowbar;&lowbar;&lowbar;&lowbar;&lowbar; data at a time.', '', '4-bit', '', '8-bit', '', '16-bit', '', 'All of the above', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(49, '1', 'The number of bits processed in a single instruction is known as ?', '', 'Instruction Set', '', 'Bandwidth', '', 'Bandspeed', '', 'Instruction Speed', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(50, '1', 'What is false about microprocessor?', '', 'The microprocessor is of small size chip&comma; hence is not portable.', '', 'microprocessor chips are available at low prices', '', 'microprocessors are versatile', '', 'failure rate of an IC in microprocessors is very low', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(51, '1', 'A microprocessor can be classified into&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; categories.', '', '2', '', '3', '', '4', '', '5', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(52, '1', 'Which of the following are correct characteristics of RISC?', '', 'It consists of simple instructions.', '', 'It supports various data-type formats.', '', 'It supports register to use in any context.', '', 'All of the above', '', 'single', 'D', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(53, '1', 'Which Processors includes multi-clocks?', '', 'RISC', '', 'CISC', '', 'DSP', '', 'Transputer', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(54, '1', 'DSP stands for?', '', 'Digital Signal Processor', '', 'Digital Signal Preprocessor', '', 'Digital Signal Program', '', 'Data Signal Processor', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(55, '1', '8085 microprocessor is an 8-bit microprocessor designed by?', '', 'IBM', '', 'Dell', '', 'Intel', '', 'VAX', '', 'single', 'C', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(56, '1', 'There are &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; general purpose registers in 8085 processor', '', '5', '', '6', '', '7', '', '8', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(57, '1', 'Flag register is an 8-bit register having &lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar;&lowbar; 1-bit flip-flops.', '', '2', '', '3', '', '4', '', '5', '', 'single', 'D', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(58, '1', 'The devices that provide the means for a computer to communicate with the user or other computers are referred to as:', '', 'CPU', '', 'ALU', '', 'I/O', '', 'None of the above', '', 'single', 'C', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(59, '1', 'The circuits in the 8085A that provide the arithmetic and logic functions are called the:', '', 'CPU', '', 'ALU', '', 'I/O', '', 'None of the above', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(60, '1', 'The items that you can physically touch in a computer system are called:', '', 'software', '', 'firmware', '', 'hardware', '', 'None of the above', '', 'single', 'C', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(61, '1', 'How do you get help about the command ?cp??', '', 'help cp', '', 'man cp', '', 'cd ? ', '', 'none of the mentioned', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(62, '1', 'Which option of rm command is used to remove a directory with all its subdirectories.?', '', '', '', '', '', '', '', '', '', 'single', 'D', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(63, '1', 'pwd command displays', '', 'user password', '', 'password file content', '', 'present working directory', '', ' none of the mentioned', '', 'single', 'C', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(64, '1', 'Which of the following commands can be used to change default permissions for files and directories.', '', 'Chmod', '', 'Chowner', '', 'Umasker', '', 'Chgrp', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(65, '1', 'The command syntax to display the file ?nielit.txt? one page at a time is', '', 'man nielit.txt>more', '', ' cat nielit.txt<more', '', ' cat nielit.txt|more', '', 'none of the mentioned', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(66, '1', 'How do you rename file ?new? to file ?old??', '', ' mv new old', '', 'move new old', '', 'cp new old', '', 'rn new old', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(67, '1', 'Where can I find the printer in the file structure?', '', '/etc ', '', '/dev', '', '/lib ', '', '/printer', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(68, '1', 'Binary or executable files are:', '', 'Regular files', '', 'Device files', '', 'Special files', '', 'Directory files', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(69, '1', 'What is the command to set the execute permissions to all the files and subdirectories within the directory /home/ubu&lowbar;server/direct', '', ' chmod ', '', 'chmod ', '', 'chmod ', '', 'chmod ', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(70, '1', 'Which command is used to assign read-write permission to the owner?', '', ' chmod a+r file ', '', 'chmod u=rw file ', '', ' chmod o+r file ', '', 'hmod og-r file', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(71, '1', 'The process of starting up a computer is known as', '', 'Boot Record', '', 'Boot Strapping', '', 'Booting', '', 'Boot Loading ', '', 'single', 'C', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(72, '1', 'The encrypted password of a user is stored in', '', '/etc/shadow', '', '/etc/enpasswwd', '', '/etc/.passwd', '', '/etc/passwd', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(73, '1', 'User id 0 is', '', 'An invalid user id', '', 'The id of the root user', '', 'The id of a user when the user', '', 'None of the mentioned', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(74, '1', 'The login shell is', '', 'The shell program that runs when the user logs in', '', 'The shell program that authenticates the user while logging in', '', 'Common shell for all the users that belong to the same group', '', 'None of the mentioned', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(75, '1', 'By default&comma; a Linux user falls under which group?', '', 'staff', '', 'others', '', 'same as userid (UPG)', '', 'system', '', 'single', 'C', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(76, '1', 'Shell is ?', '', 'Command Interpreter', '', 'Interface between Kernel and Hardware', '', 'Interface between user and applications', '', 'Command Compiler', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(77, '1', 'Create a new file ?nielit.txt? that is a concatenation of ?olevel.txt? and ?alevel.txt?', '', 'cp olevel.txt alevel.txt nielit.txt', '', 'cat olevel.txt alevel.txt > nielit.txt', '', 'mv level[oa].txt nielit.txt', '', ' ls olevel.txt alevel.txt | nielit.txt', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(78, '1', 'Which of the following represents an absolute path?', '', '../home/file.txt ', '', ' bin/cat', '', 'cs2204/', '', '/usr/bin/cat', '', 'single', 'D', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(79, '1', 'BASH shell stands for?', '', 'Bourne-again Shell', '', 'Basic Access Shell', '', 'Basic to Advanced Shell', '', 'Big & Advanced Shell', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(80, '1', 'Typically the TCP port used by SMTP is', '', '25', '', '23', '', '22', '', '21', '', 'single', 'A', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(81, '1', 'In multitasking..?', '', 'we can use only one CPU.', '', 'we follow single', '', 'we follow multi', '', 'Both a) and b)', '', 'single', 'D', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(82, '1', '&lowbar;&lowbar;&lowbar;&lowbar;is frequently used to import videos to a computer.', '', 'Software', '', 'Firewire', '', 'Firmware', '', 'Optical wire ', '', 'single', 'B', 'N', '2021-03-19 07:23:33', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(83, '1', 'In a Word document, &lowbar;&lowbar;&lowbar;bar gives the information about the page number, number of pages et', '', 'Tool', '', 'Menu', '', 'Task', '', '', '', 'single', 'D', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(84, '1', 'Alternate key is considered as a part of&lowbar;&lowbar;&lowbar;key.', '', 'Primary', '', 'Foreign', '', 'Candidate', '', 'Composite ', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(85, '1', 'In OSI model, the job of dialogue control and token management is performed by&lowbar;&lowbar;&lowbar;&lowbar; layer.', '', 'Presentation', '', 'Network', '', 'Session', '', 'Transport ', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(86, '1', 'The process of moving from main memory to disk is called..?', '', 'Caching', '', 'Swapping', '', 'Spooling', '', '', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(87, '1', 'Which of the following is an absolute cell reference?', '', '!A!1', '', '$A$1', '', '#A#1', '', 'A1 ', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(88, '1', 'In Baudot code&comma; how many number of bits per symbol are used?', '', 'seven', '', 'five', '', 'six', '', 'eight ', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(89, '1', 'The name of a file in MS Word cannot contain..?', '', 'Letter', '', 'Space', '', 'Number', '', 'Underscore B', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(90, '1', '????????????terminals formerly known as cash registers) are often connected to complex inventory and sales computer systems.', '', 'Point-of-sale POS)', '', 'Data', '', 'Sales', '', 'Query ', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(91, '1', 'The Assistant is ??????????', '', 'an application that allows you to take notes and save them in a file', '', 'ab animated character that provides help and suggestions', '', 'a button on the standard Toolbar that executes the print command', '', 'a collection of frequently misspelled words in a dictionary file. ', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(92, '1', 'A term used to describe interconnected computer configuration is..?', '', 'Micro program sequence', '', 'Modulation', '', 'Multiprocessing', '', 'Multi-programming ', '', 'single', 'D', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(93, '1', 'What is required when more than one person uses a central computer at the same time?', '', 'Light pen', '', 'Mouse', '', 'Terminal', '', 'Digitizer ', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(94, '1', 'Multi user systems provided cost savings for small business because they use a Single Processing\nUnit to link several..?', '', 'Personal computers', '', 'Dumb terminals', '', 'Workstations', '', 'Mainframes ', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(95, '1', 'A dumb terminal has..?', '', 'an embedded microprocessor', '', 'extensive memory', '', 'independent processing capability', '', 'a keyboard and screen ', '', 'single', 'D', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(96, '1', 'What is the full form of USB as used in computer related activities?', '', 'Universal Serial Bus', '', 'Ultra Serial Block', '', 'United Service Block', '', 'Universal Security Block ', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(97, '1', 'In Excel paper spreadsheets can have all the same advantages as an electronic spreadsheet except which of the following?', '', 'Rows and column', '', 'Headings', '', 'speed', '', 'None of the above ', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(98, '1', 'A &lowbar;&lowbar;&lowbar;&lowbar;is a collection of computers and device connected together.', '', 'network', '', 'memory card', '', 'protocol', '', 'central processing unit ', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(99, '1', 'Multiplexing involves &lowbar;&lowbar;&lowbar;path and&lowbar;&lowbar;&lowbar;channel.', '', 'one, one', '', 'multiple, one', '', 'one, multiple', '', 'multiple, multiple', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(100, '1', 'Which one amongst them is not an inter network?', '', 'LAN', '', 'WAN', '', 'MAN', '', 'All are internet works ', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(101, '1', 'The term WAN stands for ?', '', 'Wide Area Net', '', 'Wide Access Network', '', 'Wide Area Network', '', 'Wide Access Net', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(102, '1', 'Which IP address class allocates 8 bits for the host identification part?', '', 'Class A', '', 'Class B', '', 'Class C', '', 'Class D', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(103, '1', 'The term IPv4 stands for?', '', 'Internet Protocol Version 4', '', 'Internet Programming Version 4', '', 'International Programming Version 4', '', '', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(104, '1', 'Number of layers in OSI model are ?', '', '6', '', '7', '', '5', '', '4', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(105, '1', 'A communication pathwaythat transfers data from one point to another is called ?', '', 'Link', '', 'Node', '', 'Topology', '', 'None', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(106, '1', 'Bus&comma; Ring & Star topologies are mostly used in ?', '', 'LAN', '', 'WAN', '', 'MAN', '', 'Internetwork', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(107, '1', 'In Star topology&comma; the Central controller is called ?', '', 'Node ', '', 'Router', '', 'Hub', '', 'Modem', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(108, '1', 'ISP stands for ?', '', 'Internet Service Provider', '', 'Internet System Provider', '', 'International Service Provider', '', 'International System Provider', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(109, '1', 'A set of rules that governs data communication is called ?', '', 'Protocols', '', 'Standards', '', 'Servers', '', 'None', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(110, '1', 'What is address size of IPv6 ?', '', '32 bits', '', '64 bits', '', '128 bits', '', '256 bits', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(111, '1', 'Repeater operates at which layer of OSI model ?', '', 'Physical Layer', '', 'Data Link Layer', '', 'Network Layer', '', 'Transport Layer', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(112, '1', 'What is the use of Ping command ?', '', 'To test  that a device on network is reachable', '', 'To test a hard disk fault', '', 'To test a bug in a application', '', 'To test a printer quality', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(113, '1', 'Routing table of the router keeps track of ?', '', 'MAC address assignment', '', 'Port assignment to network devices', '', 'Distribute IP address to network devices', '', 'Routes to use for forwarding data to its destination', '', 'single', 'D', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(114, '1', 'Which of the following is/are protocols of Application layer ?', '', 'FTP', '', 'DNS', '', 'Telnet', '', 'All of above', '', 'single', 'D', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(115, '1', 'What DHCP Server provides to client ?', '', 'Protocol', '', 'IP address', '', 'MAC address', '', 'Network address', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(116, '1', 'Controlling access to a network by analyzing the incoming and outgoing packets is called ?', '', 'IP filtering', '', 'Data  filtering', '', 'Packet  filtering', '', 'Firewall  filtering', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(117, '1', 'Which one is used for error detection by higher layer protocols (TCP/IP) ?', '', 'Bit-sum', '', 'Checksum', '', 'Data-sum', '', 'Error-bit', '', 'single', 'B', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(118, '1', 'Bluetooth is an example of ?', '', 'personal area network', '', 'local area network', '', 'virtual private network', '', 'None', '', 'single', 'A', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(119, '1', 'Which transmission media has the highest transmission speed in a network?', '', 'coaxial cable', '', 'twisted pair cable', '', 'optical fiber', '', 'electrical cable', '', 'single', 'C', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin'),
(120, '1', 'Communication between a computer and a keyboard involves which transmission ?', '', 'Automatic', '', 'Half-duplex', '', 'Full-duplex', '', 'Simplex', '', 'single', 'D', 'N', '2021-03-19 07:23:34', NULL, 'Y', '1.jpg', '1', 'N', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE IF NOT EXISTS `user_answer` (
`id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `q_no` int(3) DEFAULT NULL,
  `user_ans` varchar(4) DEFAULT NULL,
  `right_answer` varchar(5) DEFAULT NULL,
  `que_id` int(11) DEFAULT NULL,
  `sec_id` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `user_id`, `session_id`, `q_no`, `user_ans`, `right_answer`, `que_id`, `sec_id`) VALUES
(1, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 0, 'C', 'A', 12, 1),
(2, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 1, 'A', 'B', 30, 1),
(3, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 2, NULL, 'D', 113, 1),
(4, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 3, NULL, 'B', 104, 1),
(5, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 4, NULL, 'D', 9, 1),
(6, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 5, NULL, 'D', 42, 1),
(7, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 6, NULL, 'A', 79, 1),
(8, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 7, NULL, 'B', 77, 1),
(9, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 8, NULL, 'B', 38, 1),
(10, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 9, NULL, 'B', 61, 1),
(11, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 10, NULL, 'A', 74, 1),
(12, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 11, NULL, 'C', 58, 1),
(13, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 12, NULL, 'C', 75, 1),
(14, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 13, NULL, 'B', 35, 1),
(15, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 14, NULL, 'A', 36, 1),
(16, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 15, NULL, 'A', 6, 1),
(17, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 16, NULL, 'A', 111, 1),
(18, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 17, NULL, 'C', 116, 1),
(19, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 18, NULL, 'A', 13, 1),
(20, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 19, NULL, 'B', 86, 1),
(21, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 20, NULL, 'B', 23, 1),
(22, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 21, NULL, 'B', 34, 1),
(23, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 22, NULL, 'B', 88, 1),
(24, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 23, NULL, 'D', 114, 1),
(25, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 24, NULL, 'A', 21, 1),
(26, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 25, NULL, 'C', 55, 1),
(27, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 26, NULL, 'A', 68, 1),
(28, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 27, NULL, 'A', 54, 1),
(29, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 28, NULL, 'A', 20, 1),
(30, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 29, NULL, 'A', 118, 1),
(31, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 30, NULL, 'C', 84, 1),
(32, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 31, NULL, 'D', 57, 1),
(33, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 32, NULL, 'C', 46, 1),
(34, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 33, NULL, 'C', 44, 1),
(35, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 34, NULL, 'B', 33, 1),
(36, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 35, NULL, 'B', 76, 1),
(37, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 36, NULL, 'A', 108, 1),
(38, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 37, NULL, 'B', 11, 1),
(39, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 38, NULL, 'C', 97, 1),
(40, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 39, NULL, 'A', 112, 1),
(41, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 40, NULL, 'A', 37, 1),
(42, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 41, NULL, 'B', 19, 1),
(43, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 42, NULL, 'A', 2, 1),
(44, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 43, NULL, 'C', 119, 1),
(45, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 44, NULL, 'A', 26, 1),
(46, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 45, NULL, 'A', 109, 1),
(47, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 46, NULL, 'C', 71, 1),
(48, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 47, NULL, 'C', 107, 1),
(49, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 48, NULL, 'D', 22, 1),
(50, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 49, NULL, 'B', 56, 1),
(51, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 50, NULL, 'C', 5, 1),
(52, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 51, NULL, 'D', 62, 1),
(53, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 52, NULL, 'C', 85, 1),
(54, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 53, NULL, 'A', 40, 1),
(55, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 54, NULL, 'B', 67, 1),
(56, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 55, NULL, 'D', 18, 1),
(57, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 56, NULL, 'A', 47, 1),
(58, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 57, NULL, 'D', 78, 1),
(59, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 58, NULL, 'D', 41, 1),
(60, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 59, NULL, 'B', 48, 1),
(61, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 60, NULL, 'C', 102, 1),
(62, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 61, NULL, 'D', 81, 1),
(63, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 62, NULL, 'D', 10, 1),
(64, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 63, NULL, 'A', 103, 1),
(65, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 64, NULL, 'B', 94, 1),
(66, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 65, NULL, 'A', 106, 1),
(67, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 66, NULL, 'A', 3, 1),
(68, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 67, NULL, 'D', 92, 1),
(69, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 68, NULL, 'A', 39, 1),
(70, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 69, NULL, 'A', 98, 1),
(71, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 70, NULL, 'A', 25, 1),
(72, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 71, NULL, 'C', 8, 1),
(73, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 72, NULL, 'A', 50, 1),
(74, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 73, NULL, 'B', 70, 1),
(75, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 74, NULL, 'A', 4, 1),
(76, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 75, NULL, 'A', 45, 1),
(77, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 76, NULL, 'A', 7, 1),
(78, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 77, NULL, 'B', 82, 1),
(79, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 78, NULL, 'C', 101, 1),
(80, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 79, NULL, 'D', 83, 1),
(81, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 80, NULL, 'C', 93, 1),
(82, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 81, NULL, 'A', 66, 1),
(83, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 82, NULL, 'C', 63, 1),
(84, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 83, NULL, 'D', 95, 1),
(85, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 84, NULL, 'A', 96, 1),
(86, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 85, NULL, 'B', 53, 1),
(87, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 86, NULL, 'D', 52, 1),
(88, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 87, NULL, 'B', 15, 1),
(89, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 88, NULL, 'B', 91, 1),
(90, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 89, NULL, 'D', 1, 1),
(91, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 90, NULL, 'B', 32, 1),
(92, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 91, NULL, 'C', 60, 1),
(93, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 92, NULL, 'B', 89, 1),
(94, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 93, NULL, 'A', 105, 1),
(95, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 94, NULL, 'B', 87, 1),
(96, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 95, NULL, 'A', 31, 1),
(97, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 96, NULL, 'B', 29, 1),
(98, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 97, NULL, 'D', 16, 1),
(99, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 98, NULL, 'B', 73, 1),
(100, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 99, NULL, 'B', 59, 1),
(101, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 100, NULL, 'C', 24, 1),
(102, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 101, NULL, 'C', 110, 1),
(103, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 102, NULL, 'A', 14, 1),
(104, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 103, NULL, 'A', 69, 1),
(105, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 104, NULL, 'A', 100, 1),
(106, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 105, NULL, 'B', 51, 1),
(107, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 106, NULL, 'A', 43, 1),
(108, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 107, NULL, 'B', 65, 1),
(109, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 108, NULL, 'C', 99, 1),
(110, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 109, NULL, 'D', 120, 1),
(111, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 110, NULL, 'A', 80, 1),
(112, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 111, NULL, 'B', 117, 1),
(113, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 112, NULL, 'C', 28, 1),
(114, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 113, NULL, 'A', 64, 1),
(115, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 114, NULL, 'B', 115, 1),
(116, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 115, NULL, 'A', 90, 1),
(117, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 116, NULL, 'A', 17, 1),
(118, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 117, NULL, 'A', 72, 1),
(119, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 118, NULL, 'D', 27, 1),
(120, '2103197305', '038c96d9b4bb6cc6423323838675a41c', 119, NULL, 'B', 49, 1),
(121, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 0, 'A', 'B', 32, 1),
(122, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 1, 'C', 'D', 62, 1),
(123, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 2, 'D', 'B', 88, 1),
(124, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 3, 'D', 'A', 4, 1),
(125, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 4, 'A', 'A', 68, 1),
(126, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 5, NULL, 'C', 85, 1),
(127, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 6, NULL, 'A', 12, 1),
(128, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 7, NULL, 'A', 25, 1),
(129, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 8, NULL, 'D', 41, 1),
(130, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 9, NULL, 'A', 6, 1),
(131, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 10, NULL, 'C', 84, 1),
(132, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 11, NULL, 'D', 1, 1),
(133, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 12, NULL, 'C', 116, 1),
(134, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 13, NULL, 'D', 83, 1),
(135, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 14, NULL, 'A', 69, 1),
(136, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 15, NULL, 'A', 37, 1),
(137, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 16, NULL, 'B', 49, 1),
(138, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 17, NULL, 'A', 7, 1),
(139, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 18, NULL, 'A', 13, 1),
(140, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 19, NULL, 'A', 105, 1),
(141, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 20, NULL, 'B', 19, 1),
(142, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 21, NULL, 'C', 110, 1),
(143, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 22, NULL, 'D', 16, 1),
(144, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 23, NULL, 'B', 29, 1),
(145, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 24, NULL, 'D', 9, 1),
(146, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 25, NULL, 'D', 78, 1),
(147, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 26, NULL, 'D', 22, 1),
(148, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 27, NULL, 'A', 96, 1),
(149, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 28, NULL, 'B', 61, 1),
(150, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 29, NULL, 'C', 63, 1),
(151, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 30, NULL, 'A', 111, 1),
(152, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 31, NULL, 'B', 30, 1),
(153, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 32, NULL, 'A', 98, 1),
(154, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 33, NULL, 'C', 44, 1),
(155, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 34, NULL, 'A', 40, 1),
(156, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 35, NULL, 'A', 64, 1),
(157, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 36, NULL, 'B', 104, 1),
(158, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 37, NULL, 'A', 36, 1),
(159, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 38, NULL, 'C', 107, 1),
(160, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 39, NULL, 'D', 42, 1),
(161, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 40, NULL, 'B', 34, 1),
(162, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 41, NULL, 'B', 11, 1),
(163, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 42, NULL, 'D', 18, 1),
(164, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 43, NULL, 'B', 73, 1),
(165, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 44, NULL, 'C', 60, 1),
(166, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 45, NULL, 'B', 91, 1),
(167, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 46, NULL, 'C', 5, 1),
(168, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 47, NULL, 'D', 57, 1),
(169, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 48, NULL, 'A', 118, 1),
(170, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 49, NULL, 'A', 66, 1),
(171, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 50, NULL, 'C', 102, 1),
(172, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 51, NULL, 'A', 45, 1),
(173, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 52, NULL, 'A', 47, 1),
(174, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 53, NULL, 'A', 90, 1),
(175, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 54, NULL, 'B', 51, 1),
(176, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 55, NULL, 'A', 108, 1),
(177, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 56, NULL, 'A', 100, 1),
(178, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 57, NULL, 'D', 120, 1),
(179, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 58, NULL, 'B', 56, 1),
(180, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 59, NULL, 'C', 8, 1),
(181, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 60, NULL, 'B', 82, 1),
(182, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 61, NULL, 'C', 75, 1),
(183, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 62, NULL, 'A', 109, 1),
(184, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 63, NULL, 'A', 103, 1),
(185, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 64, NULL, 'C', 58, 1),
(186, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 65, NULL, 'D', 114, 1),
(187, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 66, NULL, 'A', 50, 1),
(188, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 67, NULL, 'C', 46, 1),
(189, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 68, NULL, 'C', 97, 1),
(190, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 69, NULL, 'C', 101, 1),
(191, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 70, NULL, 'A', 17, 1),
(192, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 71, NULL, 'D', 10, 1),
(193, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 72, NULL, 'B', 70, 1),
(194, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 73, NULL, 'B', 59, 1),
(195, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 74, NULL, 'D', 92, 1),
(196, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 75, NULL, 'B', 53, 1),
(197, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 76, NULL, 'D', 113, 1),
(198, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 77, NULL, 'B', 38, 1),
(199, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 78, NULL, 'A', 14, 1),
(200, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 79, NULL, 'A', 20, 1),
(201, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 80, NULL, 'B', 33, 1),
(202, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 81, NULL, 'C', 99, 1),
(203, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 82, NULL, 'A', 43, 1),
(204, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 83, NULL, 'B', 67, 1),
(205, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 84, NULL, 'B', 89, 1),
(206, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 85, NULL, 'A', 72, 1),
(207, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 86, NULL, 'B', 23, 1),
(208, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 87, NULL, 'C', 71, 1),
(209, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 88, NULL, 'B', 48, 1),
(210, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 89, NULL, 'B', 94, 1),
(211, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 90, NULL, 'A', 54, 1),
(212, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 91, NULL, 'C', 55, 1),
(213, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 92, NULL, 'B', 117, 1),
(214, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 93, NULL, 'A', 106, 1),
(215, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 94, NULL, 'A', 31, 1),
(216, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 95, NULL, 'B', 77, 1),
(217, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 96, NULL, 'B', 87, 1),
(218, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 97, NULL, 'A', 26, 1),
(219, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 98, NULL, 'A', 2, 1),
(220, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 99, NULL, 'C', 24, 1),
(221, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 100, NULL, 'D', 52, 1),
(222, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 101, NULL, 'B', 15, 1),
(223, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 102, NULL, 'A', 21, 1),
(224, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 103, NULL, 'A', 39, 1),
(225, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 104, NULL, 'D', 81, 1),
(226, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 105, NULL, 'D', 27, 1),
(227, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 106, NULL, 'B', 76, 1),
(228, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 107, NULL, 'D', 95, 1),
(229, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 108, NULL, 'B', 65, 1),
(230, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 109, NULL, 'B', 35, 1),
(231, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 110, NULL, 'A', 112, 1),
(232, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 111, NULL, 'A', 3, 1),
(233, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 112, NULL, 'C', 93, 1),
(234, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 113, NULL, 'A', 80, 1),
(235, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 114, NULL, 'A', 79, 1),
(236, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 115, NULL, 'A', 74, 1),
(237, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 116, NULL, 'C', 28, 1),
(238, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 117, NULL, 'C', 119, 1),
(239, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 118, NULL, 'B', 115, 1),
(240, '2211123264', '2a3449612e4d388c2ae09504f7586d33', 119, NULL, 'B', 86, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_id_enc`
--

CREATE TABLE IF NOT EXISTS `user_id_enc` (
  `id` varchar(255) NOT NULL,
  `id_enc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
`Formno` int(11) NOT NULL,
  `userid` varchar(12) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `Exam_name` varchar(30) NOT NULL,
  `SName` varchar(50) DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `S_mother` varchar(30) DEFAULT NULL,
  `Address` varchar(400) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pincode` varchar(10) DEFAULT NULL,
  `Email_id` varchar(50) DEFAULT NULL,
  `Contact_no` varchar(25) DEFAULT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `Category` varchar(10) DEFAULT NULL,
  `reg_no` varchar(20) DEFAULT NULL,
  `module` varchar(11) DEFAULT NULL,
  `user_img` varchar(50) DEFAULT NULL,
  `batch` varchar(5) DEFAULT NULL,
  `online` varchar(2) DEFAULT NULL,
  `lock_login` varchar(2) DEFAULT NULL,
  `exam_center_code` varchar(10) DEFAULT NULL,
  `exam_center_address` varchar(300) DEFAULT NULL,
  `DD_Number` varchar(10) DEFAULT NULL,
  `DD_Bank` varchar(50) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `exam_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`Formno`, `userid`, `password`, `Exam_name`, `SName`, `FName`, `S_mother`, `Address`, `State`, `Pincode`, `Email_id`, `Contact_no`, `DOB`, `Gender`, `Qualification`, `Category`, `reg_no`, `module`, `user_img`, `batch`, `online`, `lock_login`, `exam_center_code`, `exam_center_address`, `DD_Number`, `DD_Bank`, `Amount`, `exam_date`) VALUES
(1, '2103197305', '0', '', 'sarowar', 'gdgdg', 'dgdgd', NULL, NULL, NULL, NULL, '8998989898', '12-08-1988', 'M', NULL, 'OBC', '2103197305', '1', NULL, NULL, 'N', 'Y', NULL, NULL, NULL, NULL, NULL, '19-03-2021'),
(2, '2211123264', '0', '', 'kumar', 'dgfhdg', 'ghghghg', NULL, NULL, NULL, NULL, '8114550284', '12-08-1988', 'M', NULL, 'GEN', '2211123264', '1', NULL, NULL, 'N', 'Y', NULL, NULL, NULL, NULL, NULL, '12-11-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
`id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `module` varchar(10) DEFAULT NULL,
  `total_time` int(5) DEFAULT NULL,
  `time_left` int(5) DEFAULT NULL,
  `login_ip` varchar(25) DEFAULT NULL,
  `login_time` varchar(100) DEFAULT NULL,
  `logout_time` varchar(50) DEFAULT NULL,
  `mac_addr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`id`, `session_id`, `module`, `total_time`, `time_left`, `login_ip`, `login_time`, `logout_time`, `mac_addr`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', '1', 60, NULL, '::1', NULL, NULL, '00-1A-7D-DA-71-12'),
(2, '038c96d9b4bb6cc6423323838675a41c', '1', 150, 149, '203.193.172.110', NULL, NULL, '00-1A-7D-DA-71-12'),
(3, '2a3449612e4d388c2ae09504f7586d33', '1', 150, 103, '::1', NULL, NULL, '50-3E-AA-0D-ED-99'),
(4, 'd41d8cd98f00b204e9800998ecf8427e', '1', 150, NULL, '::1', NULL, NULL, '50-3E-AA-0D-ED-99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_master`
--
ALTER TABLE `batch_master`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `batch_id` (`batch_id`);

--
-- Indexes for table `center_master`
--
ALTER TABLE `center_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_section`
--
ALTER TABLE `module_section`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`qId`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_id_enc`
--
ALTER TABLE `user_id_enc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
 ADD PRIMARY KEY (`Formno`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_master`
--
ALTER TABLE `batch_master`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `center_master`
--
ALTER TABLE `center_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module_section`
--
ALTER TABLE `module_section`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `qId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
MODIFY `Formno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
