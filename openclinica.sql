-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2015 at 04:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `openclinica`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_mapping`
--

CREATE TABLE IF NOT EXISTS `batch_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oc_value` varchar(100) DEFAULT NULL,
  `local_value` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `batch_mapping`
--

INSERT INTO `batch_mapping` (`id`, `oc_value`, `local_value`, `date_created`) VALUES
(1, '0', 'ML1154', '1439312168'),
(2, '1', 'ML1234', '1440167956');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('e8828b08c7b064a44e8d53e0455b1d68', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36', 1432211739, '');

-- --------------------------------------------------------

--
-- Table structure for table `clinical_data`
--

CREATE TABLE IF NOT EXISTS `clinical_data` (
  `sutdy_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_oid` varchar(255) DEFAULT NULL,
  `study_subject_id` varchar(50) DEFAULT NULL,
  `protocol_id` varchar(50) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `implant_date` varchar(20) DEFAULT NULL,
  `implant_time` varchar(10) DEFAULT NULL,
  `implant_prob` tinyint(1) DEFAULT NULL,
  `epp_symptoms` tinyint(1) DEFAULT NULL,
  `epp_age` varchar(5) DEFAULT NULL,
  `epp_contras` varchar(5) DEFAULT NULL,
  `implant_batch` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sutdy_id`),
  KEY `report_oid` (`report_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clinical_data`
--

INSERT INTO `clinical_data` (`sutdy_id`, `report_oid`, `study_subject_id`, `protocol_id`, `version`, `implant_date`, `implant_time`, `implant_prob`, `epp_symptoms`, `epp_age`, `epp_contras`, `implant_batch`) VALUES
(7, 'Batch_reportD20150417202248+0200', 'SS_0707', 'EMC11525', '1.0.0', '2015-04-15', '1033', 1, 0, '0', '1', 'ML1053'),
(8, 'Batch_reportD20150417202248+0200', 'SS_1005_3525', 'EMC11525', '1.0.0', '2015-03-30', '1141', 1, 0, '0', '0', 'ML1053'),
(9, 'Batch_reportD20150417202248+0200', 'SS_1_7584', 'EMC11525', '1.0.0', '2015-04-14', '1108', 1, 0, '0', '1', 'ML1053'),
(10, 'Batch_reportD20150417202248+0200', 'SS_4_7984', 'EMC11525', '1.0.0', '2015-02-04', '1533', 1, 0, '0', '1', 'ML1053'),
(11, 'Batch_reportD20150417202248+0200', 'SS_5_9669', 'EMC11525', '1.0.0', '2015-02-15', '1111', 1, 0, '0', '1', 'ML1053');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` int(11) DEFAULT NULL,
  `delivery_date` varchar(100) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `number_implants` int(11) DEFAULT NULL,
  `confirmed_by` varchar(100) DEFAULT NULL,
  `delivery_notes` text,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `site`, `delivery_date`, `batch_number`, `number_implants`, `confirmed_by`, `delivery_notes`, `created`) VALUES
(3, 3, '28/08/2015', '0', 12, 'Test', 'asdf', '1440087432'),
(4, 1, '29/08/2015', '0', 1, 'klklkl', 'klklklklklklk', '1440091250');

-- --------------------------------------------------------

--
-- Table structure for table `drug_batch`
--

CREATE TABLE IF NOT EXISTS `drug_batch` (
  `drug_batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_number` varchar(100) DEFAULT NULL,
  `total_implants` varchar(50) DEFAULT NULL,
  `imp_alloc_qc` varchar(50) DEFAULT NULL,
  `imp_alloc_ct` varchar(50) DEFAULT NULL,
  `manufacture_date` varchar(20) DEFAULT NULL,
  `release_date` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(20) DEFAULT NULL,
  `extended_expiry_date` varchar(20) DEFAULT NULL,
  `notes` text,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`drug_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `drug_batch`
--

INSERT INTO `drug_batch` (`drug_batch_id`, `batch_number`, `total_implants`, `imp_alloc_qc`, `imp_alloc_ct`, `manufacture_date`, `release_date`, `expiry_date`, `extended_expiry_date`, `notes`, `date_created`) VALUES
(1, '1', '10', '4', '4', '19/08/2015', '20/08/2015', '28/08/2015', '28/08/2015', '  asdfasdf                                                                                ', 1428951167),
(2, '0', '22', '2', '6', '13/08/2015', '19/08/2015', '28/08/2015', '28/08/2015', '   a                                                                                                                        ', 1440440397);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_title` varchar(150) DEFAULT NULL,
  `template_body` text,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`template_id`, `template_title`, `template_body`) VALUES
(1, 'Registration', '<table>\r\n<tbody>\r\n<tr><td>Thanks for registration.</td></tr>\r\n<tr><td>Your user_name is EMAIL </td></tr>\r\n<tr><td>Your password is PASSWORD </td></tr>\r\n</tbody>\r\n</table>'),
(2, 'Change Password', '<table>\r\n    <tr>\r\n        <td><a target="_blank" href="http://localhost/clinuvel/change_password?id=ID">Click here</a> to change password.</td>\r\n    </tr>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `implant_administration`
--

CREATE TABLE IF NOT EXISTS `implant_administration` (
  `imp_administration_id` int(11) NOT NULL AUTO_INCREMENT,
  `study_id` int(3) DEFAULT NULL COMMENT 'id from study table',
  `study_subject_id` varchar(255) DEFAULT NULL,
  `protocol_id` varchar(255) DEFAULT NULL,
  `person_id` varchar(255) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `version_name` varchar(255) DEFAULT NULL,
  `epp_symptoms` varchar(255) DEFAULT NULL,
  `implant_date` varchar(100) DEFAULT NULL,
  `implant_time` varchar(100) DEFAULT NULL,
  `implant_prob` varchar(100) DEFAULT NULL,
  `implant_batch` varchar(100) DEFAULT NULL,
  `implant_min` varchar(100) DEFAULT NULL,
  `epp_pregnant` varchar(50) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`imp_administration_id`),
  KEY `study_id` (`study_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `implant_administration`
--

INSERT INTO `implant_administration` (`imp_administration_id`, `study_id`, `study_subject_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`) VALUES
(5, 5, '20003', 'AFAM - 0002', '20003', 'f', '1.6', '0', '1436918400', '23', '1', '0', '6', '0', '2015-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_oid` varchar(255) NOT NULL,
  `report_description` varchar(255) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  UNIQUE KEY `unique` (`report_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_oid`, `report_description`, `created`) VALUES
(5, 'Batch_reportD20150417202248+0200', 'Report of all implants administered to date', '1430498079');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) DEFAULT NULL,
  `institution` varchar(150) DEFAULT NULL,
  `main_pharmacy_contact` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `site_title`, `institution`, `main_pharmacy_contact`, `contact_number`, `country`, `created`) VALUES
(1, 'Site', 'Institution', '321321321', '+321321321', 'US', 1433870512),
(2, 'Rome', 'Institution', '(384) 923-9832', '+9999999999', 'IT', 1434464796),
(3, 'Test', 'Test Insti', 'asdf', '+9999999999', 'US', 1434658503),
(4, 'Manchester', 'Royal Salford Trust', 'A Person', '+44984284288', 'GB', 1434959878),
(5, 'Dusseldorf', 'Uniklinikum Dusseldorf', 'A Person', '+49987732492', 'DE', 1434960003);

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE IF NOT EXISTS `study` (
  `study_id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset_name` varchar(150) DEFAULT NULL,
  `study_name` varchar(150) DEFAULT NULL,
  `protocol_id` varchar(150) DEFAULT NULL,
  `subjects` int(3) DEFAULT NULL,
  `study_event_definitions` int(3) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`study_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`study_id`, `dataset_name`, `study_name`, `protocol_id`, `subjects`, `study_event_definitions`, `date`) VALUES
(5, 'Test_implant_admin', 'Afamelanotide PASS INT', 'AFAM', 1, 1, '2015-Jul-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) DEFAULT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_phone` varchar(150) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_role` int(2) DEFAULT NULL,
  `user_status` enum('active','inactive') DEFAULT 'active',
  `created` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES
(1, 'admin', 'admin@clinuvel.com', '4115 Lake Otis Parkway', '(123) 456-7899', '21232f297a57a5a743894a0e4a801fc3', 1, 'active', '1432149372', NULL),
(27, 'adnan', 'adnankust2@yahoo.com', 'rawalpindi', '(123) 456-7899', '21232f297a57a5a743894a0e4a801fc3', 2, 'active', '1433526461', NULL),
(34, 'adnan', 'adnan.spyko@gmail.com', 'street 10, hali road', '03339660929', 'b5ee03e57bc034bd81b228177773231e', 1, 'active', '1435061297', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_title`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'QP User');

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE IF NOT EXISTS `wastage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` varchar(255) DEFAULT NULL,
  `batch_number` varchar(100) DEFAULT NULL,
  `date_reported` varchar(50) DEFAULT NULL,
  `reason` text,
  `notes` text,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`id`, `site`, `batch_number`, `date_reported`, `reason`, `notes`, `created`) VALUES
(2, '1', '1', '06/10/2015', 'no reason', 'Recusandae euismod penatibus convallis occaecat? Aenean laudantium tellus nemo perspiciatis. Dui recusandae suscipit hymenaeos modi sapien! Sapiente eveniet? Illo dui torquent, turpis, mus! Cras rutrum sunt nulla sequi? Taciti elit, porttitor sequi unde ut. Curabitur etiam! Iaculis laoreet. Eaque nobis, doloribus laoreet, nascetur quam accumsan dictumst? Ridiculus temporibus, blandit augue.', '1434120608'),
(3, '2', '1', '10/08/2016', 'asdf', 'asdfasd', '1440442599');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinical_data`
--
ALTER TABLE `clinical_data`
  ADD CONSTRAINT `clinical_data_ibfk_1` FOREIGN KEY (`report_oid`) REFERENCES `reports` (`report_oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `implant_administration`
--
ALTER TABLE `implant_administration`
  ADD CONSTRAINT `implant_administration_ibfk_1` FOREIGN KEY (`study_id`) REFERENCES `study` (`study_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
