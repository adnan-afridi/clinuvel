#
# TABLE STRUCTURE FOR: adverse_events
#

DROP TABLE IF EXISTS adverse_events;

CREATE TABLE `adverse_events` (
  `ae_id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset_name` varchar(150) DEFAULT NULL,
  `study_name` varchar(150) DEFAULT NULL,
  `protocol_id` varchar(150) DEFAULT NULL,
  `subjects` int(3) DEFAULT NULL,
  `study_event_definitions` int(3) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ae_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO adverse_events (`ae_id`, `dataset_name`, `study_name`, `protocol_id`, `subjects`, `study_event_definitions`, `date`) VALUES (3, 'All_AEs', 'European EPP Disease Registry', 'AFAM', 7, 1, '2015-Nov-11');


#
# TABLE STRUCTURE FOR: adverse_events_data
#

DROP TABLE IF EXISTS adverse_events_data;

CREATE TABLE `adverse_events_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ae_id` int(11) DEFAULT NULL,
  `study_subject_id` int(11) DEFAULT NULL,
  `protocol_id` varchar(100) DEFAULT NULL,
  `site_number` int(11) DEFAULT NULL,
  `sex` varchar(5) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `version_name` varchar(100) DEFAULT NULL,
  `crf_version_status` varchar(255) DEFAULT NULL,
  `advevent_desc` varchar(100) DEFAULT NULL,
  `advevent_date` varchar(50) DEFAULT NULL,
  `advevent_inter` int(11) DEFAULT NULL,
  `advevent_severity` int(11) DEFAULT NULL,
  `advevent_action` int(11) DEFAULT NULL,
  `advevent_other` text,
  `advevent_outcome` int(11) DEFAULT NULL,
  `advevent_related` int(11) DEFAULT NULL,
  `advevent_resdate` varchar(50) DEFAULT NULL,
  `advevent_SAE` int(11) DEFAULT NULL,
  `advevent_reporter` text,
  `advevent_lastdosedate` varchar(50) DEFAULT NULL,
  `advevent_lastdosetime` int(11) DEFAULT NULL,
  `advevent_comments` text,
  `datetime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ae_id` (`ae_id`),
  CONSTRAINT `adverse_events_data_ibfk_1` FOREIGN KEY (`ae_id`) REFERENCES `adverse_events` (`ae_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (29, 3, 4901004, 'AFAM', 4901, 'm', '42270', NULL, '1.8', 'data entry complete', 'Cardiac arrest', '42269', 1, 2, 3, 'Patient hospitalised following ambulatory care', 2, 3, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (30, 3, 4901004, 'AFAM', 4901, 'm', '-', NULL, '-', '-', '-', '-', 0, 0, 0, '-', 0, 0, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (31, 3, 4901001, 'AFAM', 4901, 'm', '-', NULL, '-', '-', '-', '-', 0, 0, 0, '-', 0, 0, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (32, 3, 4901001, 'AFAM', 4901, 'm', '42270', NULL, '1.8', 'data entry complete', 'Headache', '42262', 0, 1, 1, '-', 0, 1, '42262', 1, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (33, 3, 3101001, 'AFAM - 0001', 3101, 'm', '42312', NULL, '1.8', 'data entry complete', 'Headache', '42318', 1, 0, 1, '-', 0, 2, '42318', 1, 'A Citizen', '1446595200', 1130, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (34, 3, 3101001, 'AFAM - 0001', 3101, 'm', '-', NULL, '-', '-', '-', '-', 0, 0, 0, '-', 0, 0, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (35, 3, 3101003, 'AFAM - 0001', 3101, 'm', '42265', NULL, '1.8', 'data entry complete', 'Migraine', '42250', 0, 2, 1, '-', 0, 1, '42251', 1, 'B Citizen', '1441497600', 1500, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (36, 3, 3101003, 'AFAM - 0001', 3101, 'm', '42265', NULL, '1.8', 'data entry complete', 'Nausea', '42256', 0, 0, 0, '-', 0, 2, '42256', 1, 'A Citizen', '1441324800', 1500, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (37, 3, 3101004, 'AFAM - 0001', 3101, 'm', '42270', NULL, '1.8', 'initial data entry', 'Nausea', '42269', 1, 0, 0, '-', 2, 1, '-', 1, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (38, 3, 3101004, 'AFAM - 0001', 3101, 'm', '-', NULL, '-', '-', '-', '-', 0, 0, 0, '-', 0, 0, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (39, 3, 3101006, 'AFAM - 0001', 3101, 'm', '42270', NULL, '1.8', 'data entry complete', 'cough', '42270', 0, 2, 2, '-', 1, 1, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (40, 3, 3101006, 'AFAM - 0001', 3101, 'm', '-', NULL, '-', '-', '-', '-', 0, 0, 0, '-', 0, 0, '-', 0, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (41, 3, 4402002, 'AFAM - 4402', 4402, 'f', '42270', NULL, '1.8', 'data entry complete', 'Nausea', '42268', 0, 1, 1, '-', 0, 1, '42269', 1, '-', '-', 0, NULL, '2015-12-01');
INSERT INTO adverse_events_data (`id`, `ae_id`, `study_subject_id`, `protocol_id`, `site_number`, `sex`, `start_date`, `age`, `version_name`, `crf_version_status`, `advevent_desc`, `advevent_date`, `advevent_inter`, `advevent_severity`, `advevent_action`, `advevent_other`, `advevent_outcome`, `advevent_related`, `advevent_resdate`, `advevent_SAE`, `advevent_reporter`, `advevent_lastdosedate`, `advevent_lastdosetime`, `advevent_comments`, `datetime`) VALUES (42, 3, 4402002, 'AFAM - 4402', 4402, 'f', '42270', NULL, '1.8', 'data entry complete', 'Nausea', '42258', 0, 1, 0, '-', 0, 1, '42258', 1, '-', '-', 0, NULL, '2015-12-01');


#
# TABLE STRUCTURE FOR: batch_mapping
#

DROP TABLE IF EXISTS batch_mapping;

CREATE TABLE `batch_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oc_value` varchar(100) DEFAULT NULL,
  `local_value` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oc_value` (`oc_value`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO batch_mapping (`id`, `oc_value`, `local_value`, `date_created`) VALUES (2, '0', 'ML1154', '1439316037');
INSERT INTO batch_mapping (`id`, `oc_value`, `local_value`, `date_created`) VALUES (3, '1', 'ml1145', '1455221523');
INSERT INTO batch_mapping (`id`, `oc_value`, `local_value`, `date_created`) VALUES (4, '10', 'test value updated', '1460656602');


#
# TABLE STRUCTURE FOR: ci_sessions
#

DROP TABLE IF EXISTS ci_sessions;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('819b1ff839439e158ef7f4470740b89b', '58.65.190.123', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1432151359, '');
INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('43a4b2d52ba0ac6075c9dba4d0f85a1e', '58.65.190.123', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36', 1432151126, '');
INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('fe584c54af2537c7a0cbb2f4aa5f080b', '58.65.190.123', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36', 1432151815, '');


#
# TABLE STRUCTURE FOR: clinical_data
#

DROP TABLE IF EXISTS clinical_data;

CREATE TABLE `clinical_data` (
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
  KEY `report_oid` (`report_oid`),
  CONSTRAINT `clinical_data_ibfk_1` FOREIGN KEY (`report_oid`) REFERENCES `reports` (`report_oid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: deliveries
#

DROP TABLE IF EXISTS deliveries;

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` int(11) DEFAULT NULL,
  `delivery_date` varchar(100) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `number_implants` int(11) DEFAULT NULL,
  `confirmed_by` varchar(100) DEFAULT NULL,
  `delivery_notes` text,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site` (`site`),
  KEY `batch_number` (`batch_number`),
  CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`site`) REFERENCES `site_mapping` (`site_oc_value`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`batch_number`) REFERENCES `batch_mapping` (`oc_value`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO deliveries (`id`, `site`, `delivery_date`, `batch_number`, `number_implants`, `confirmed_by`, `delivery_notes`, `created`) VALUES (11, 3101, '07/04/2016', '0', 12, 'Mr. ABC', 'asdfadf', '1455222779');


#
# TABLE STRUCTURE FOR: drug_batch
#

DROP TABLE IF EXISTS drug_batch;

CREATE TABLE `drug_batch` (
  `drug_batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_number` varchar(100) DEFAULT NULL,
  `total_implants` int(11) DEFAULT NULL,
  `imp_alloc_qc` int(11) DEFAULT NULL,
  `imp_alloc_ct` int(11) DEFAULT NULL,
  `manufacture_date` varchar(20) DEFAULT NULL,
  `release_date` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(20) DEFAULT NULL,
  `extended_expiry_date` varchar(20) DEFAULT NULL,
  `notes` text,
  `date_created` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`drug_batch_id`),
  KEY `batch_number` (`batch_number`),
  CONSTRAINT `drug_batch_ibfk_1` FOREIGN KEY (`batch_number`) REFERENCES `batch_mapping` (`oc_value`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO drug_batch (`drug_batch_id`, `batch_number`, `total_implants`, `imp_alloc_qc`, `imp_alloc_ct`, `manufacture_date`, `release_date`, `expiry_date`, `extended_expiry_date`, `notes`, `date_created`) VALUES (2, '0', 50, 10, 10, '03/02/2016', '04/02/2016', '20/02/2016', '20/02/2016', '    asdfasdfasdfasdf                                                                                              ', '1455222588');


#
# TABLE STRUCTURE FOR: email_templates
#

DROP TABLE IF EXISTS email_templates;

CREATE TABLE `email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_title` varchar(150) DEFAULT NULL,
  `template_body` text,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO email_templates (`template_id`, `template_title`, `template_body`) VALUES (1, 'Registration', '<table>\r\n    <tbody>\r\n        <tr>\r\n            <td>Dear EMAIL,</td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>You have now been registered as a user of the SCENESSE® drug accountability database and assigned a temporary password. Your temporary password is PASSWORD. You will need to change your password when you first log in.\r\n                    If you have any questions regarding the use of the database, please contact Clinuvel.</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>Kind regards,</td>\r\n        </tr>\r\n        <tr>\r\n            <td>The Clinuvel team</td>\r\n        </tr>\r\n    </tbody>\r\n</table> ');
INSERT INTO email_templates (`template_id`, `template_title`, `template_body`) VALUES (2, 'Change Password', '<table>\r\n    <tr>\r\n        <td><a target=\"_blank\" href=\"http://spijko.com/clinuvel/change_password?id=ID\">Click here</a> to change password.</td>\r\n    </tr>\r\n</table>');


#
# TABLE STRUCTURE FOR: implant_administration
#

DROP TABLE IF EXISTS implant_administration;

CREATE TABLE `implant_administration` (
  `imp_administration_id` int(11) NOT NULL AUTO_INCREMENT,
  `study_id` int(3) DEFAULT NULL COMMENT 'id from study table',
  `study_subject_id` varchar(255) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL COMMENT 'extracted from study_subject_id',
  `protocol_id` varchar(255) DEFAULT NULL,
  `person_id` varchar(255) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `version_name` varchar(255) DEFAULT NULL,
  `epp_symptoms` varchar(255) DEFAULT NULL,
  `implant_date` varchar(100) DEFAULT NULL,
  `implant_time` varchar(100) DEFAULT NULL,
  `implant_prob` varchar(100) DEFAULT NULL,
  `implant_prob_spec` text,
  `implant_batch` varchar(100) DEFAULT NULL,
  `implant_min` varchar(100) DEFAULT NULL,
  `epp_pregnant` varchar(50) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `implant_suprail` varchar(10) DEFAULT NULL,
  `implant_suprail_expl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`imp_administration_id`),
  KEY `study_id` (`study_id`),
  KEY `site_id` (`site_id`),
  KEY `implant_batch` (`implant_batch`),
  CONSTRAINT `implant_administration_ibfk_1` FOREIGN KEY (`study_id`) REFERENCES `study` (`study_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `implant_administration_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `site_mapping` (`site_oc_value`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `implant_administration_ibfk_3` FOREIGN KEY (`implant_batch`) REFERENCES `batch_mapping` (`oc_value`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

INSERT INTO implant_administration (`imp_administration_id`, `study_id`, `study_subject_id`, `site_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_prob_spec`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`, `implant_suprail`, `implant_suprail_expl`) VALUES (77, 11, '4901004', 4901, 'AFAM', '004', 'm', NULL, '0', '1442275200', '13', '1', '-', '0', '30', '0', '2015-10-05', '0', NULL);
INSERT INTO implant_administration (`imp_administration_id`, `study_id`, `study_subject_id`, `site_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_prob_spec`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`, `implant_suprail`, `implant_suprail_expl`) VALUES (78, 11, '4901001', 4901, 'AFAM', '001', 'm', NULL, '0', '1437264000', '15', '1', '-', '0', '0', '0', '2015-10-05', '0', NULL);
INSERT INTO implant_administration (`imp_administration_id`, `study_id`, `study_subject_id`, `site_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_prob_spec`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`, `implant_suprail`, `implant_suprail_expl`) VALUES (79, 11, '3101001', 3101, 'AFAM - 0001', '001', 'm', NULL, '0', '1442534400', '11', '1', '-', '0', '5', '0', '2015-10-05', '0', NULL);
INSERT INTO implant_administration (`imp_administration_id`, `study_id`, `study_subject_id`, `site_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_prob_spec`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`, `implant_suprail`, `implant_suprail_expl`) VALUES (80, 11, '3101002', 3101, 'AFAM - 0001', '002', 'm', NULL, '0', '1443398400', '9', '0', 'Implant dropped, new implant had to be administered', '0', '40', '0', '2015-10-05', '0', NULL);
INSERT INTO implant_administration (`imp_administration_id`, `study_id`, `study_subject_id`, `site_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_prob_spec`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`, `implant_suprail`, `implant_suprail_expl`) VALUES (81, 11, '3101003', 3101, 'AFAM - 0001', '003', 'm', NULL, '0', '1435708800', '13', '1', '-', '0', '40', '0', '2015-10-05', '0', NULL);
INSERT INTO implant_administration (`imp_administration_id`, `study_id`, `study_subject_id`, `site_id`, `protocol_id`, `person_id`, `sex`, `version_name`, `epp_symptoms`, `implant_date`, `implant_time`, `implant_prob`, `implant_prob_spec`, `implant_batch`, `implant_min`, `epp_pregnant`, `date`, `implant_suprail`, `implant_suprail_expl`) VALUES (82, 11, '4402003', 4402, 'AFAM - 4402', '003', '-', NULL, '0', '1443398400', '10', '1', '-', '0', '30', '0', '2015-10-05', '0', NULL);


#
# TABLE STRUCTURE FOR: logs
#

DROP TABLE IF EXISTS logs;

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `date_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=801 DEFAULT CHARSET=latin1;

INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (27, NULL, '', '1449685254');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (28, 1, 'welcome', '1449685374');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (29, 1, 'users', '1449685830');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (30, 1, 'users/user_log', '1449685931');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (31, 1, 'welcome', '1449694437');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (32, 1, 'users', '1449694470');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (33, 1, 'users/user_log', '1449694478');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (34, 1, 'welcome', '1449739127');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (35, 1, 'users', '1449739133');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (36, 1, 'users/edit_user', '1449739136');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (37, 1, 'users/user_log', '1449739136');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (38, 1, 'users/edit_user', '1449739143');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (39, 1, 'users/user_log', '1449739143');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (40, 1, 'users/edit_user', '1449739147');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (41, 1, 'users/user_log', '1449739147');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (42, 1, 'users/edit_user', '1449739154');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (43, 1, 'users/user_log', '1449739154');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (44, 1, 'users/edit_user', '1449739157');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (45, 1, 'users/user_log', '1449739157');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (46, 1, 'users/edit_user', '1449739161');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (47, 1, 'users/user_log', '1449739161');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (48, 1, 'users/edit_user', '1449739165');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (49, 1, 'users/user_log', '1449739165');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (50, 1, 'users/edit_user', '1449739178');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (51, 1, 'users/user_log', '1449739178');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (52, 1, 'welcome', '1449766010');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (53, 1, 'imp_administration/all_implants', '1449766064');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (54, 1, 'reports', '1449766095');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (55, 1, 'users', '1449766132');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (56, 1, 'manage_sites/site_mapping', '1449766166');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (57, 1, 'batch/batch_mapping', '1449766184');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (58, 1, 'welcome', '1449770627');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (59, 1, 'users', '1449770631');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (60, 1, 'users/user_log', '1449770634');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (61, 1, 'users/user_log', '1449770652');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (62, 1, 'users/user_log', '1449770682');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (63, 1, 'welcome', '1449778927');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (64, 1, 'users', '1449779061');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (65, 1, 'users/user_log', '1449779067');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (66, 1, 'welcome', '1449824155');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (67, 1, 'users', '1449824160');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (68, 1, 'users/user_log', '1449824163');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (69, 1, 'users/user_log', '1449824178');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (70, 1, 'users/user_log', '1449824182');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (71, 1, 'users/user_log', '1449824185');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (72, 1, 'users/user_log', '1449824188');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (73, 1, 'welcome', '1449862126');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (74, 1, 'users', '1449862134');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (75, 1, 'users/user_log', '1449862142');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (76, 1, 'welcome', '1450096994');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (77, 1, 'users', '1450097017');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (78, 1, 'users/edit_user', '1450097018');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (79, 1, 'users/user_log', '1450097018');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (80, 1, 'welcome', '1450373313');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (81, 1, 'users', '1450373318');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (82, 1, 'users/edit_log', '1450373322');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (83, 1, 'users/edit_log', '1450373416');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (84, 1, 'users/edit_log', '1450373532');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (85, 1, 'users', '1450376232');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (86, 1, 'users/edit_log', '1450376236');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (87, 1, 'users', '1450376241');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (88, 1, 'manage_delivery', '1450376264');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (89, 1, 'manage_delivery/edit_delivery', '1450376268');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (90, 1, 'generic/get_batch_data', '1450376272');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (91, 1, 'generic/calculate_implants', '1450376272');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (92, 1, 'generic/calculate_implants', '1450376273');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (93, 1, 'generic/get_batch_data', '1450376273');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (94, 1, 'generic/get_batch_data', '1450376276');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (95, 1, 'generic/get_batch_data', '1450376276');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (96, 1, 'generic/get_batch_data', '1450376276');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (97, 1, 'manage_delivery/update_delivery', '1450376276');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (98, 1, 'manage_delivery', '1450376277');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (99, 1, 'users', '1450376281');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (100, 1, 'users/edit_log', '1450376285');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (101, 1, 'manage_delivery', '1450376317');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (102, 1, 'manage_delivery/edit_delivery', '1450376320');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (103, 1, 'generic/get_batch_data', '1450376323');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (104, 1, 'generic/calculate_implants', '1450376324');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (105, 1, 'generic/calculate_implants', '1450376324');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (106, 1, 'generic/get_batch_data', '1450376324');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (107, 1, 'generic/get_batch_data', '1450376325');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (108, 1, 'generic/get_batch_data', '1450376326');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (109, 1, 'generic/get_batch_data', '1450376326');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (110, 1, 'manage_delivery/update_delivery', '1450376326');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (111, 1, 'manage_delivery', '1450376327');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (112, 1, 'users', '1450376332');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (113, 1, 'users/edit_log', '1450376336');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (114, 1, 'manage_delivery', '1450376497');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (115, 1, 'manage_delivery', '1450376550');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (116, 1, 'manage_delivery', '1450376551');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (117, 1, 'manage_delivery/edit_delivery', '1450376563');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (118, 1, 'generic/get_batch_data', '1450376567');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (119, 1, 'generic/get_batch_data', '1450376567');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (120, 1, 'generic/calculate_implants', '1450376567');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (121, 1, 'generic/calculate_implants', '1450376567');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (122, 1, 'generic/get_batch_data', '1450376569');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (123, 1, 'manage_delivery/update_delivery', '1450376569');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (124, 1, 'generic/get_batch_data', '1450376569');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (125, 1, 'generic/get_batch_data', '1450376569');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (126, 1, 'manage_delivery', '1450376569');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (127, 1, 'users', '1450376573');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (128, 1, 'users/edit_log', '1450376577');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (129, 1, 'users', '1450377522');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (130, 1, 'welcome', '1450466788');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (131, 1, 'manage_sites/site_mapping', '1450466810');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (132, 1, 'users', '1450466815');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (133, 1, 'users/edit_log', '1450466819');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (134, 1, 'welcome', '1450466860');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (135, 1, 'users', '1450466991');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (136, 1, 'users', '1450469313');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (137, 1, 'welcome', '1450729981');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (138, 1, 'users', '1450729988');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (139, 1, 'users/edit_log', '1450729992');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (140, 1, 'welcome', '1450787311');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (141, 1, 'users', '1450787315');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (142, 1, 'users/edit_log', '1450787321');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (143, 1, 'users/edit_user', '1450787321');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (144, 1, 'users', '1450787334');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (145, 1, 'users/edit_user', '1450787338');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (146, 1, 'users/edit_log', '1450787338');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (147, 1, 'users', '1450787340');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (148, 1, 'users/edit_user', '1450787345');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (149, 1, 'users/edit_log', '1450787345');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (150, 1, 'users', '1450787347');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (151, 1, 'users/edit_user', '1450787351');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (152, 1, 'users/edit_log', '1450787351');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (153, 1, 'users', '1450787354');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (154, 1, 'users/edit_user', '1450787360');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (155, 1, 'users/edit_log', '1450787360');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (156, 1, 'users', '1450787362');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (157, 1, 'users/edit_user', '1450787368');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (158, 1, 'users/edit_log', '1450787368');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (159, 1, 'users', '1450787370');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (160, 1, 'users/edit_user', '1450787373');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (161, 1, 'users/user_log', '1450787373');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (162, 1, 'welcome', '1450796885');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (163, 1, 'users', '1450796889');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (164, 1, 'users/edit_log', '1450796892');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (165, 1, 'manage_delivery', '1450797846');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (166, 1, 'welcome', '1450891162');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (167, 1, 'users', '1450891167');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (168, 1, 'users/edit_log', '1450891170');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (169, 1, 'users/edit_log', '1450891251');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (170, 1, 'generic/edit_from_log', '1450891257');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (171, 1, 'manage_delivery/edit_delivery', '1450891258');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (172, 1, 'welcome', '1450903533');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (173, 1, 'users', '1450903537');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (174, 1, 'users/edit_log', '1450903542');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (175, 1, 'generic/edit_from_log', '1450903545');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (176, 1, 'manage_delivery/edit_delivery', '1450903546');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (177, 1, 'welcome', '1451407184');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (178, 1, 'users', '1451407301');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (179, 1, 'users/edit_log', '1451410840');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (180, 1, 'generic/edit_from_log', '1451410849');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (181, 1, 'manage_delivery/edit_delivery', '1451410849');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (182, 1, 'users/user_profile', '1451412532');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (183, 1, 'users/user_profile', '1451412534');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (184, 1, 'users/user_profile', '1451412537');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (185, 1, 'reports', '1451412544');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (186, 1, 'manage_wastage', '1451412546');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (187, 1, 'manage_delivery', '1451412549');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (188, 1, 'batch', '1451412552');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (189, 1, 'welcome', '1451412555');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (190, 1, 'manage_delivery', '1451412569');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (191, 1, 'reports', '1451412574');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (192, 1, 'manage_sites/site_mapping', '1451412656');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (193, 1, 'ae_mapping', '1451412659');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (194, 1, 'welcome', '1451412662');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (195, 1, 'welcome', '1451412665');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (196, 1, 'parser', '1451412678');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (197, 1, 'parser', '1451412687');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (198, 1, 'parser/parse', '1451412727');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (199, 1, 'parser', '1451412727');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (200, 1, 'batch/add_new_batch', '1451412739');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (201, 1, 'parser', '1451412744');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (202, 1, 'welcome', '1451412752');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (203, 1, 'logout', '1451412759');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (204, 1, 'welcome', '1451414079');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (205, 1, 'users', '1451414123');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (206, 1, 'users/edit_user', '1451414125');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (207, 1, 'users', '1451414128');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (208, 1, 'users/edit_log', '1451414129');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (209, 1, 'users', '1451414133');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (210, 1, 'users/edit_log', '1451414135');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (211, 1, 'reports', '1451414224');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (212, 1, 'reports/show', '1451414228');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (213, 1, 'reports', '1451414298');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (214, 1, 'reports/all_wastages', '1451414301');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (215, 1, 'users', '1451414715');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (216, 1, 'users/edit_log', '1451414717');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (217, 1, 'users/edit_log', '1451414765');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (218, 1, 'users/edit_log', '1451414793');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (219, 1, 'users/edit_log', '1451414858');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (220, 1, 'users/edit_log', '1451414862');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (221, 1, 'users/edit_log', '1451415109');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (222, 1, 'users/edit_log', '1451415127');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (223, 1, 'generic/create_pdf', '1451415162');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (224, 1, 'users/edit_log', '1451415307');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (225, 1, 'users/edit_log', '1451415486');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (226, 1, 'generic/create_pdf', '1451415490');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (227, 1, 'users/edit_log', '1451415551');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (228, 1, 'generic/create_pdf', '1451415557');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (229, 1, 'reports', '1451415721');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (230, 1, 'reports/show', '1451415725');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (231, 1, 'reports/show', '1451415884');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (232, 1, 'users/edit_log', '1451415889');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (233, 1, 'users/edit_log', '1451415895');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (234, 1, 'generic/create_pdf', '1451415915');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (235, 1, 'users/edit_log', '1451415924');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (236, 1, 'generic/create_pdf', '1451415928');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (237, 1, 'users/edit_log', '1451416000');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (238, 1, 'generic/create_pdf', '1451416004');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (239, 1, 'users/edit_log', '1451416066');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (240, 1, 'generic/create_pdf', '1451416076');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (241, 1, 'users/edit_log', '1451416185');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (242, 1, 'generic/create_excel', '1451416188');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (243, 1, 'generic/create_excel', '1451416214');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (244, 1, 'users/edit_log', '1451416255');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (245, 1, 'generic/create_excel', '1451416258');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (246, 1, 'users/edit_log', '1451416277');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (247, 1, 'users/edit_log', '1451416308');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (248, 1, 'users/edit_log', '1451416500');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (249, 1, 'users/edit_log', '1451416547');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (250, 1, 'generic/create_excel', '1451416550');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (251, 1, 'users/edit_log', '1451416691');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (252, 1, 'users/edit_log', '1451416711');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (253, 1, 'generic/create_excel', '1451416715');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (254, 1, 'generic/create_excel', '1451416741');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (255, 1, 'welcome', '1451418399');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (256, 1, 'welcome', '1451481411');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (257, 1, 'users', '1451481459');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (258, 1, 'users/edit_log', '1451481473');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (259, 1, 'users/edit_log', '1451481656');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (260, 1, 'users/edit_log', '1451481760');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (261, 1, 'generic/create_excel', '1451481932');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (262, 1, 'users/edit_log', '1451482095');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (263, 1, 'users/edit_log', '1451482384');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (264, 1, 'generic/create_excel', '1451482387');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (265, 1, 'welcome', '1451505052');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (266, 1, 'manage_wastage', '1451505054');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (267, 1, 'welcome', '1451915245');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (268, 1, 'welcome', '1451922583');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (269, 1, 'users', '1451922586');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (270, 1, 'users/edit_log', '1451922588');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (271, 1, 'ae_mapping', '1451925457');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (272, 1, 'users', '1451925460');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (273, 1, 'users/edit_log', '1451925462');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (274, 1, 'welcome', '1452001627');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (275, 1, 'welcome', '1452024628');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (276, 1, 'users', '1452024631');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (277, 1, 'users/edit_log', '1452024633');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (278, 1, 'welcome', '1452263860');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (279, 1, 'users', '1452263882');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (280, 1, 'users/edit_log', '1452263887');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (281, 1, 'welcome', '1453123463');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (282, 1, 'batch', '1453123905');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (283, 1, 'manage_delivery', '1453123960');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (284, 1, 'manage_sites', '1453124238');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (285, 1, 'manage_wastage', '1453124242');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (286, 1, 'reports', '1453124245');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (287, 1, 'welcome', '1453216329');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (288, 1, 'batch', '1453223244');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (289, 1, 'batch/edit_batch', '1453223246');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (290, 1, 'batch/update_batch', '1453223250');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (291, 1, 'batch', '1453223250');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (292, 1, 'reports', '1453223934');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (293, 1, 'reports/show', '1453223936');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (294, 1, 'reports', '1453223941');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (295, 1, 'reports/show', '1453223947');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (296, 1, 'welcome', '1453382422');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (297, 1, 'welcome', '1453903718');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (298, 1, 'welcome', '1453988158');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (299, 1, 'batch', '1453988173');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (300, 1, 'manage_delivery', '1453988175');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (301, 1, 'manage_sites', '1453988177');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (302, 1, 'manage_wastage', '1453988178');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (303, 1, 'reports', '1453988180');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (304, 1, 'users', '1453988353');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (305, 1, 'batch/batch_mapping', '1453988384');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (306, 1, 'manage_sites/site_mapping', '1453988387');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (307, 1, 'ae_mapping', '1453988392');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (308, 1, 'batch', '1453988400');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (309, 1, 'welcome', '1454007321');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (310, 1, 'batch', '1454008439');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (311, 1, 'batch/edit_batch', '1454008476');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (312, 1, 'batch', '1454008479');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (313, 1, 'manage_delivery', '1454009087');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (314, 1, 'manage_sites', '1454009231');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (315, 1, 'manage_wastage', '1454009353');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (316, 1, 'reports', '1454009519');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (317, 1, 'users', '1454009523');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (318, 1, 'batch/batch_mapping', '1454009771');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (319, 1, 'welcome', '1454335655');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (320, 1, 'batch/batch_mapping', '1454335669');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (321, 1, 'manage_wastage', '1454335671');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (322, 1, 'manage_sites', '1454335677');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (323, 1, 'manage_sites/edit_site', '1454340129');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (324, 1, 'welcome', '1454348978');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (325, 1, 'batch', '1454348981');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (326, 1, 'manage_delivery', '1454348984');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (327, 1, 'manage_sites', '1454348986');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (328, 1, 'batch/batch_mapping', '1454349034');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (329, 1, 'manage_sites/site_mapping', '1454349038');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (330, 1, 'batch/batch_mapping', '1454349040');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (331, 1, 'manage_sites/site_mapping', '1454349122');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (332, 1, 'batch/batch_mapping', '1454349127');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (333, 1, 'manage_sites/site_mapping', '1454349159');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (334, 1, 'reports', '1454352170');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (335, 1, 'reports/show', '1454352173');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (336, 1, 'welcome', '1455025036');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (337, 1, 'test', '1455025224');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (338, 1, 'test', '1455025333');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (339, 1, 'welcome', '1455217870');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (340, 1, 'imp_administration/all_implants', '1455217891');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (341, 1, 'welcome', '1455217905');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (342, 1, 'parser', '1455217907');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (343, 1, 'welcome', '1455217913');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (344, 1, 'batch', '1455217918');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (345, 1, 'batch', '1455217928');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (346, 1, 'welcome', '1455217929');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (347, 1, 'batch/add_new_batch', '1455217930');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (348, 1, 'manage_delivery', '1455217932');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (349, 1, 'batch', '1455217933');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (350, 1, 'welcome', '1455217934');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (351, 1, 'imp_administration/all_implants', '1455217942');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (352, 1, 'batch', '1455218003');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (353, 1, 'batch/batch_mapping', '1455218009');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (354, 1, 'welcome', '1455218021');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (355, 1, 'imp_administration/all_implants', '1455218024');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (356, 1, 'manage_sites', '1455218334');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (357, 1, 'manage_sites/site_mapping', '1455218348');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (358, 1, 'welcome', '1455218358');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (359, 1, 'imp_administration/all_implants', '1455218360');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (360, 1, 'manage_sites', '1455218391');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (361, 1, 'manage_delivery', '1455218486');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (362, 1, 'manage_delivery/edit_delivery', '1455218505');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (363, 1, 'manage_delivery', '1455218511');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (364, 1, 'manage_sites', '1455218628');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (365, 1, 'manage_wastage', '1455218632');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (366, 1, 'reports', '1455218645');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (367, 1, 'batch/batch_mapping', '1455218654');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (368, 1, 'batch/batch_mapping', '1455218785');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (369, 1, 'users', '1455218867');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (370, 1, 'reports', '1455218875');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (371, 1, 'reports/show', '1455218879');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (372, 1, 'reports', '1455218882');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (373, 1, 'reports/show_all_batches', '1455218887');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (374, 1, 'generic/search', '1455218929');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (375, 1, 'generic/search', '1455218936');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (376, 1, 'batch', '1455218961');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (377, 1, 'welcome', '1455221274');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (378, 1, 'parser', '1455221310');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (379, 1, 'welcome', '1455221385');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (380, 1, 'imp_administration/all_implants', '1455221392');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (381, 1, 'batch/batch_mapping', '1455221506');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (382, 1, 'batch/add_batch_map', '1455221522');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (383, 1, 'batch/batch_mapping', '1455221523');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (384, 1, 'batch/edit_batch_map', '1455221536');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (385, 1, 'batch/update_batch_map', '1455221540');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (386, 1, 'batch', '1455221541');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (387, 1, 'batch/batch_mapping', '1455221547');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (388, 1, 'welcome', '1455221564');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (389, 1, 'imp_administration/all_implants', '1455221565');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (390, 1, 'batch/batch_mapping', '1455221573');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (391, 1, 'batch/edit_batch_map', '1455221575');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (392, 1, 'batch/update_batch_map', '1455221580');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (393, 1, 'batch', '1455221581');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (394, 1, 'welcome', '1455221587');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (395, 1, 'imp_administration/all_implants', '1455221588');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (396, 1, 'batch/batch_mapping', '1455221650');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (397, 1, 'batch/edit_batch_map', '1455221652');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (398, 1, 'batch/update_batch_map', '1455221657');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (399, 1, 'batch', '1455221658');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (400, 1, 'welcome', '1455221671');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (401, 1, 'parser', '1455221678');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (402, 1, 'welcome', '1455221681');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (403, 1, 'parser', '1455221684');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (404, 1, 'welcome', '1455221691');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (405, 1, 'imp_administration/all_implants', '1455221757');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (406, 1, 'welcome', '1455221914');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (407, 1, 'manage_delivery', '1455221933');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (408, 1, 'generic/delete', '1455221939');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (409, 1, 'manage_delivery', '1455221940');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (410, 1, 'manage_wastage', '1455221942');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (411, 1, 'generic/delete', '1455221947');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (412, 1, 'manage_wastage', '1455221947');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (413, 1, 'reports', '1455221949');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (414, 1, 'batch', '1455221952');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (415, 1, 'generic/delete', '1455221955');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (416, 1, 'batch', '1455221956');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (417, 1, 'manage_delivery', '1455221957');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (418, 1, 'manage_sites', '1455221959');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (419, 1, 'manage_wastage', '1455221968');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (420, 1, 'reports', '1455221970');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (421, 1, 'users', '1455221971');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (422, 1, 'welcome', '1455221974');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (423, 1, 'parser', '1455222007');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (424, 1, 'parser/parse', '1455222030');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (425, 1, 'parser/parse', '1455222039');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (426, 1, 'parser/parse', '1455222049');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (427, 1, 'imp_administration/all_implants', '1455222334');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (428, 1, 'welcome', '1455222346');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (429, 1, 'imp_administration/all_implants', '1455222368');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (430, 1, 'welcome', '1455222398');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (431, 1, 'batch', '1455222408');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (432, 1, 'batch/add_batch', '1455222588');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (433, 1, 'batch', '1455222588');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (434, 1, 'batch/edit_batch', '1455222595');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (435, 1, 'batch/update_batch', '1455222600');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (436, 1, 'batch', '1455222600');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (437, 1, 'welcome', '1455222610');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (438, 1, 'batch', '1455222623');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (439, 1, 'manage_delivery', '1455222628');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (440, 1, 'generic/get_batch_data', '1455222635');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (441, 1, 'generic/get_batch_data', '1455222650');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (442, 1, 'generic/calculate_implants', '1455222650');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (443, 1, 'generic/calculate_implants', '1455222650');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (444, 1, 'generic/get_batch_data', '1455222650');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (445, 1, 'generic/get_batch_data', '1455222660');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (446, 1, 'generic/calculate_implants', '1455222669');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (447, 1, 'generic/get_batch_data', '1455222669');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (448, 1, 'generic/get_batch_data', '1455222699');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (449, 1, 'generic/calculate_implants', '1455222699');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (450, 1, 'generic/calculate_implants', '1455222700');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (451, 1, 'generic/get_batch_data', '1455222700');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (452, 1, 'generic/get_batch_data', '1455222702');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (453, 1, 'generic/calculate_implants', '1455222702');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (454, 1, 'generic/get_batch_data', '1455222703');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (455, 1, 'generic/calculate_implants', '1455222703');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (456, 1, 'generic/get_batch_data', '1455222763');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (457, 1, 'generic/calculate_implants', '1455222776');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (458, 1, 'generic/get_batch_data', '1455222776');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (459, 1, 'generic/calculate_implants', '1455222776');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (460, 1, 'generic/get_batch_data', '1455222776');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (461, 1, 'generic/get_batch_data', '1455222779');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (462, 1, 'generic/get_batch_data', '1455222779');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (463, 1, 'generic/get_batch_data', '1455222779');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (464, 1, 'manage_delivery/add_delivery_process', '1455222779');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (465, 1, 'manage_delivery', '1455222779');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (466, 1, 'welcome', '1455222783');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (467, 1, 'manage_sites', '1455222795');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (468, 1, 'manage_sites/site_mapping', '1455222851');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (469, 1, 'manage_sites/add_site_map', '1455222860');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (470, 1, 'manage_sites/site_mapping', '1455222860');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (471, 1, 'manage_sites', '1455222870');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (472, 1, 'manage_sites/add_site_process', '1455222924');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (473, 1, 'manage_sites', '1455222924');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (474, 1, 'welcome', '1455222945');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (475, 1, 'imp_administration/all_implants', '1455222951');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (476, 1, 'manage_sites', '1455223096');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (477, 1, 'manage_wastage', '1455223112');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (478, 1, 'generic/calculate_implants', '1455223121');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (479, 1, 'generic/get_batch_data', '1455223121');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (480, 1, 'manage_wastage/add_wastage', '1455223168');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (481, 1, 'manage_wastage', '1455223168');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (482, 1, 'manage_delivery', '1455223173');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (483, 1, 'generic/get_batch_data', '1455223185');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (484, 1, 'generic/get_batch_data', '1455223191');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (485, 1, 'generic/calculate_implants', '1455223191');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (486, 1, 'generic/calculate_implants', '1455223191');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (487, 1, 'generic/get_batch_data', '1455223191');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (488, 1, 'generic/get_batch_data', '1455223205');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (489, 1, 'generic/calculate_implants', '1455223205');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (490, 1, 'manage_wastage', '1455223208');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (491, 1, 'manage_wastage/edit_wastage', '1455223214');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (492, 1, 'batch', '1455223221');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (493, 1, 'batch/edit_batch', '1455223225');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (494, 1, 'batch/update_batch', '1455223237');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (495, 1, 'batch', '1455223237');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (496, 1, 'batch/edit_batch', '1455223239');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (497, 1, 'manage_wastage', '1455223244');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (498, 1, 'manage_sites', '1455223247');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (499, 1, 'manage_sites/edit_site', '1455223249');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (500, 1, 'manage_sites/update_site', '1455223265');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (501, 1, 'manage_sites', '1455223266');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (502, 1, 'users', '1455223284');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (503, 1, 'logout', '1455223415');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (504, 20, 'welcome', '1455223466');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (505, 20, 'batch', '1455223483');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (506, 20, 'batch/edit_batch', '1455223490');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (507, 20, 'manage_delivery', '1455223502');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (508, 20, 'manage_delivery/edit_delivery', '1455223503');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (509, 20, 'reports', '1455223517');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (510, 20, 'logout', '1455223522');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (511, 1, 'welcome', '1455223524');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (512, 1, 'reports', '1455223537');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (513, 1, 'reports/all_wastages', '1455223546');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (514, 1, 'reports', '1455223567');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (515, 1, 'reports/show', '1455223580');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (516, 1, 'generic/create_pdf', '1455223586');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (517, 1, 'reports', '1455223615');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (518, 1, 'reports/show', '1455223627');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (519, 1, 'reports', '1455223652');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (520, 1, 'reports/show', '1455223657');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (521, 1, 'reports', '1455223669');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (522, 1, 'reports/show', '1455223682');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (523, 1, 'reports', '1455223689');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (524, 1, 'reports/show', '1455223693');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (525, 1, 'reports', '1455223695');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (526, 1, 'reports/show', '1455223701');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (527, 1, 'reports', '1455223710');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (528, 1, 'welcome', '1455223760');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (529, 1, 'welcome', '1455552141');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (530, 1, 'welcome', '1455648641');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (531, 1, 'imp_administration/all_implants', '1455648660');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (532, 1, 'manage_sites/site_mapping', '1455648676');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (533, 1, 'generic/delete', '1455648693');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (534, 1, 'manage_sites/site_mapping', '1455648693');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (535, 1, 'batch', '1455648699');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (536, 1, 'reports', '1455648708');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (537, 1, 'reports/show', '1455648717');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (538, 1, 'reports', '1455648884');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (539, 1, 'reports/show', '1455648888');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (540, 1, 'reports', '1455648898');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (541, 1, 'reports/show', '1455648902');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (542, 1, 'generic/create_pdf', '1455648914');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (543, 1, 'batch', '1455649426');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (544, 1, 'welcome', '1455649431');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (545, 1, 'imp_administration/all_implants', '1455649435');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (546, 1, 'batch/batch_mapping', '1455649515');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (547, 1, 'batch', '1455649556');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (548, 1, 'batch/batch_mapping', '1455649560');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (549, 1, 'batch', '1455649568');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (550, 1, 'batch/batch_mapping', '1455649574');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (551, 1, 'batch', '1455649582');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (552, 1, 'batch/batch_mapping', '1455649665');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (553, 1, 'batch/edit_batch_map', '1455649754');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (554, 1, 'batch/batch_mapping', '1455649763');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (555, 1, 'batch/edit_batch_map', '1455649771');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (556, 1, 'batch/edit_batch_map', '1455649795');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (557, 1, 'batch/update_batch_map', '1455649800');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (558, 1, 'batch', '1455649801');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (559, 1, 'batch/batch_mapping', '1455649811');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (560, 1, 'batch', '1455649830');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (561, 1, 'welcome', '1455649856');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (562, 1, 'parser', '1455649862');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (563, 1, 'batch/batch_mapping', '1455649912');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (564, 1, 'welcome', '1455649915');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (565, 1, 'batch/add_new_batch', '1455649927');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (566, 1, 'welcome', '1455649931');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (567, 1, 'parser', '1455649988');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (568, 1, 'welcome', '1455649993');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (569, 1, 'batch/add_new_batch', '1455649998');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (570, 1, 'batch', '1455650016');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (571, 1, 'welcome', '1455650019');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (572, 1, 'manage_wastage/new_wastage', '1455650024');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (573, 1, 'welcome', '1455650027');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (574, 1, 'imp_administration/all_implants', '1455650045');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (575, 1, 'welcome', '1455650112');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (576, 1, 'imp_administration/all_implants', '1455650121');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (577, 1, 'welcome', '1455650134');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (578, 1, 'imp_administration/all_implants', '1455650141');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (579, 1, 'welcome', '1455650151');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (580, 1, 'imp_administration/all_implants', '1455650204');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (581, 1, 'imp_administration/all_implants', '1455650235');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (582, 1, 'batch/add_new_batch', '1455650268');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (583, 1, 'manage_wastage', '1455650293');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (584, 1, 'welcome', '1455650310');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (585, 1, 'imp_administration/all_implants', '1455650780');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (586, 1, 'batch', '1455650850');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (587, 1, 'manage_delivery', '1455650932');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (588, 1, 'manage_sites', '1455650999');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (589, 1, 'manage_wastage', '1455651043');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (590, 1, 'reports', '1455651093');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (591, 1, 'reports/show', '1455651102');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (592, 1, 'reports', '1455651112');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (593, 1, 'reports/show', '1455651131');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (594, 1, 'reports', '1455651136');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (595, 1, 'manage_wastage', '1455651137');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (596, 1, 'manage_wastage/edit_wastage', '1455651140');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (597, 1, 'manage_wastage', '1455651147');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (598, 1, 'manage_wastage/edit_wastage', '1455651159');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (599, 1, 'manage_wastage', '1455651171');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (600, 1, 'manage_wastage/edit_wastage', '1455651176');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (601, 1, 'manage_wastage', '1455651230');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (602, 1, 'reports', '1455651241');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (603, 1, 'reports/show_all_batches', '1455651254');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (604, 1, 'generic/create_excel', '1455651294');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (605, 1, 'generic/create_pdf', '1455651324');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (606, 1, 'reports', '1455651404');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (607, 1, 'reports/show', '1455651409');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (608, 1, 'reports', '1455651431');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (609, 1, 'reports/all_wastages', '1455651435');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (610, 1, 'reports', '1455651444');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (611, 1, 'reports/show', '1455651452');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (612, 1, 'reports/show', '1455651488');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (613, 1, 'reports', '1455651566');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (614, 1, 'users', '1455651568');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (615, 1, 'users/user_log', '1455651578');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (616, 1, 'users', '1455651647');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (617, 1, 'users/edit_log', '1455651701');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (618, 1, 'generic/edit_from_log', '1455651705');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (619, 1, 'manage_delivery/edit_delivery', '1455651705');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (620, 1, 'manage_delivery', '1455651717');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (621, 1, 'users', '1455651724');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (622, 1, 'batch/batch_mapping', '1455652001');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (623, 1, 'batch/edit_batch_map', '1455652005');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (624, 1, 'batch/add_batch_map', '1455652061');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (625, 1, 'batch/batch_mapping', '1455652061');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (626, 1, 'batch', '1455652091');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (627, 1, 'batch/batch_mapping', '1455652096');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (628, 1, 'generic/delete', '1455652106');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (629, 1, 'batch/batch_mapping', '1455652107');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (630, 1, 'manage_sites/site_mapping', '1455652111');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (631, 1, 'batch/batch_mapping', '1455652113');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (632, 1, 'manage_sites/site_mapping', '1455652148');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (633, 1, 'users/user_profile', '1455652208');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (634, 1, 'welcome', '1455652231');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (635, 1, 'welcome', '1455811463');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (636, 1, 'welcome', '1456506782');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (637, 1, 'welcome', '1456506788');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (638, 1, 'welcome', '1456506792');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (639, 1, 'welcome', '1456506801');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (640, 1, 'welcome', '1456506803');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (641, 1, 'welcome', '1456506897');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (642, 1, 'parser', '1456507054');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (643, 1, 'batch/batch_mapping', '1456509246');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (644, 1, 'batch', '1456509979');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (645, 1, 'batch/edit_batch', '1456510074');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (646, 1, 'batch', '1456510079');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (647, 1, 'manage_sites/site_mapping', '1456510735');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (648, 1, 'manage_sites', '1456510803');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (649, 1, 'welcome', '1457013005');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (650, 1, 'welcome', '1460483286');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (651, 1, 'parser', '1460483292');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (652, 1, 'welcome', '1460483329');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (653, 1, 'parser', '1460483334');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (654, 1, 'parser/parse', '1460483343');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (655, 1, 'welcome', '1460484832');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (656, 1, 'welcome', '1460654801');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (657, 1, 'parser', '1460654810');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (658, 1, 'parser/parse', '1460655708');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (659, 1, 'welcome', '1460655712');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (660, 1, 'imp_administration/all_implants', '1460655734');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (661, 1, 'welcome', '1460655740');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (662, 1, 'welcome', '1460655884');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (663, 1, 'welcome', '1460656280');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (664, 1, 'parser', '1460656344');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (665, 1, 'welcome', '1460656369');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (666, 1, 'imp_administration/all_implants', '1460656372');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (667, 1, 'batch/batch_mapping', '1460656445');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (668, 1, 'batch/add_batch_map', '1460656602');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (669, 1, 'batch/batch_mapping', '1460656602');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (670, 1, 'batch/edit_batch_map', '1460656636');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (671, 1, 'batch/edit_batch_map', '1460656646');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (672, 1, 'batch/update_batch_map', '1460656681');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (673, 1, 'batch', '1460656681');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (674, 1, 'batch/batch_mapping', '1460656691');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (675, 1, 'batch/edit_batch_map', '1460656693');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (676, 1, 'batch/edit_batch_map', '1460656719');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (677, 1, 'batch/update_batch_map', '1460656730');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (678, 1, 'batch', '1460656731');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (679, 1, 'batch/batch_mapping', '1460656733');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (680, 1, 'manage_sites/site_mapping', '1460656780');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (681, 1, 'manage_sites/add_site_map', '1460656888');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (682, 1, 'manage_sites/site_mapping', '1460656888');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (683, 1, 'manage_sites/edit_site_map', '1460656910');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (684, 1, 'manage_sites/update_site_map', '1460656948');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (685, 1, 'manage_sites', '1460656949');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (686, 1, 'manage_sites/site_mapping', '1460656962');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (687, 1, 'batch', '1460657101');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (688, 1, 'batch', '1460657297');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (689, 1, 'batch/add_batch', '1460657537');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (690, 1, 'batch', '1460657537');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (691, 1, 'batch/edit_batch', '1460657567');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (692, 1, 'batch/update_batch', '1460657617');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (693, 1, 'batch', '1460657617');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (694, 1, 'generic/delete', '1460657670');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (695, 1, 'batch', '1460657671');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (696, 1, 'manage_sites', '1460657723');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (697, 1, 'manage_sites/add_site_process', '1460657807');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (698, 1, 'manage_sites', '1460657807');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (699, 1, 'manage_sites/edit_site', '1460657836');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (700, 1, 'manage_sites/update_site', '1460657891');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (701, 1, 'manage_sites', '1460657891');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (702, 1, 'generic/delete', '1460657957');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (703, 1, 'manage_sites', '1460657957');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (704, 1, 'welcome', '1462548843');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (705, 1, 'users', '1462548850');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (706, 1, 'users/user_log', '1462548859');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (707, 1, 'users', '1462548889');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (708, 1, 'users/edit_log', '1462548895');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (709, 1, 'generic/edit_from_log', '1462548901');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (710, 1, 'manage_delivery/edit_delivery', '1462548901');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (711, 1, 'generic/edit_from_log', '1462548920');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (712, 1, 'welcome', '1462548921');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (713, 1, 'generic/edit_from_log', '1462548926');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (714, 1, 'welcome', '1462548927');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (715, 1, 'generic/edit_from_log', '1462548931');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (716, 1, 'welcome', '1462548932');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (717, 1, 'users', '1462548935');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (718, 1, 'users/edit_log', '1462548944');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (719, 1, 'users/user_log', '1462548949');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (720, 1, 'users/edit_log', '1462548954');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (721, 1, 'generic/edit_from_log', '1462548966');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (722, 1, 'manage_delivery/edit_delivery', '1462548966');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (723, 1, 'generic/edit_from_log', '1462548972');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (724, 1, 'welcome', '1462548972');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (725, 1, 'generic/edit_from_log', '1462548979');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (726, 1, 'batch/edit_batch_map', '1462548980');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (727, 1, 'generic/edit_from_log', '1462548987');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (728, 1, 'batch/edit_batch_map', '1462548987');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (729, 1, 'generic/edit_from_log', '1462548991');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (730, 1, 'welcome', '1462548991');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (731, 1, 'generic/edit_from_log', '1462548997');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (732, 1, 'welcome', '1462548997');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (733, 1, 'generic/edit_from_log', '1462549003');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (734, 1, 'batch/edit_batch_map', '1462549003');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (735, 1, 'generic/edit_from_log', '1462549007');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (736, 1, 'welcome', '1462549007');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (737, 1, 'users', '1462549022');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (738, 1, 'users', '1462549168');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (739, 1, 'welcome', '1462558866');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (740, 1, 'users', '1462558871');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (741, 1, 'generic/delete', '1462558879');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (742, 1, 'users', '1462558879');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (743, 1, 'generic/delete', '1462559181');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (744, 1, 'users', '1462559181');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (745, 1, 'users/edit_user', '1462559439');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (746, 1, 'users', '1462559463');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (747, 1, 'users/edit_user', '1462559714');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (748, 1, 'users', '1462559722');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (749, 1, 'users/edit_user', '1462559730');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (750, 1, 'users', '1462559732');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (751, 1, 'users', '1462559881');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (752, 1, 'users/edit_user', '1462559893');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (753, 1, 'users/edit_user', '1462559939');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (754, 1, 'users/edit_user', '1462559950');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (755, 1, 'users', '1462559999');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (756, 1, 'users/edit_user', '1462560070');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (757, 1, 'users/edit_user', '1462560075');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (758, 1, 'users/edit_user', '1462560083');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (759, 1, 'users/edit_user', '1462560086');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (760, 1, 'users/edit_user', '1462560096');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (761, 1, 'users/edit_user', '1462560101');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (762, 1, 'users/edit_user', '1462560116');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (763, 1, 'users/edit_user', '1462560124');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (764, 1, 'users/edit_user', '1462560145');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (765, 1, 'users/edit_user', '1462560164');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (766, 1, 'users/edit_user', '1462560183');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (767, 1, 'users/edit_user', '1462560209');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (768, 1, 'users/edit_user', '1462560219');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (769, 1, 'users/update_user', '1462560272');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (770, 1, 'users/update_user', '1462560285');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (771, 1, 'users/update_user', '1462560363');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (772, 1, 'users/edit_user', '1462560614');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (773, 1, 'users/edit_user', '1462560625');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (774, 1, 'users', '1462560628');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (775, 1, 'users/edit_user', '1462560631');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (776, 1, 'users', '1462560742');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (777, 1, 'users/edit_user', '1462560743');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (778, 1, 'users/update_user', '1462560748');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (779, 1, 'users', '1462560748');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (780, 1, 'users', '1462562531');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (781, 1, 'users', '1462562582');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (782, 1, 'users', '1462562598');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (783, 1, 'users', '1462562623');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (784, 1, 'users', '1462562632');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (785, 1, 'users', '1462562636');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (786, 1, 'users', '1462562653');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (787, 1, 'users', '1462562660');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (788, 1, 'users', '1462562685');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (789, 1, 'users', '1462562748');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (790, 1, 'users', '1462562763');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (791, 1, 'users', '1462563594');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (792, 1, 'users', '1462563607');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (793, 1, 'users', '1462563645');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (794, 1, 'users', '1462563691');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (795, 1, 'users', '1462563704');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (796, 1, 'users', '1462563721');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (797, 1, 'users', '1462563733');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (798, 1, 'users', '1462563872');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (799, 1, 'users', '1462563903');
INSERT INTO logs (`log_id`, `user_id`, `activity`, `date_time`) VALUES (800, 1, 'users', '1462563934');


#
# TABLE STRUCTURE FOR: reports
#

DROP TABLE IF EXISTS reports;

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_oid` varchar(255) NOT NULL,
  `report_description` varchar(255) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  UNIQUE KEY `unique` (`report_oid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO reports (`report_id`, `report_oid`, `report_description`, `created`) VALUES (38, 'Batch_reportD20150417202248+0200', 'Report of all implants administered to date', '1430506432');


#
# TABLE STRUCTURE FOR: site_mapping
#

DROP TABLE IF EXISTS site_mapping;

CREATE TABLE `site_mapping` (
  `site_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_oc_value` int(11) NOT NULL,
  `site_title` varchar(150) DEFAULT NULL,
  `date_created` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`site_map_id`),
  UNIQUE KEY `site_oc_value` (`site_oc_value`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO site_mapping (`site_map_id`, `site_oc_value`, `site_title`, `date_created`) VALUES (6, 3101, 'Rotterdam', '1442987379');
INSERT INTO site_mapping (`site_map_id`, `site_oc_value`, `site_title`, `date_created`) VALUES (11, 4901, 'Dusseldorf', '1443605476');
INSERT INTO site_mapping (`site_map_id`, `site_oc_value`, `site_title`, `date_created`) VALUES (12, 4402, 'Manchester', '1443605491');
INSERT INTO site_mapping (`site_map_id`, `site_oc_value`, `site_title`, `date_created`) VALUES (13, 12345, 'test site map updated', '1460656888');


#
# TABLE STRUCTURE FOR: sites
#

DROP TABLE IF EXISTS sites;

CREATE TABLE `sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site` int(11) DEFAULT NULL,
  `institution` varchar(150) DEFAULT NULL,
  `main_pharmacy_contact` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  PRIMARY KEY (`site_id`),
  KEY `site` (`site`),
  CONSTRAINT `sites_ibfk_1` FOREIGN KEY (`site`) REFERENCES `site_mapping` (`site_oc_value`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO sites (`site_id`, `site`, `institution`, `main_pharmacy_contact`, `contact_number`, `country`, `created`) VALUES (1, 3101, 'Institution', '321321321', '+321321321', 'NL', 1433870512);
INSERT INTO sites (`site_id`, `site`, `institution`, `main_pharmacy_contact`, `contact_number`, `country`, `created`) VALUES (2, 4901, '', 'Main', '+9999999999', 'IT', 1434464796);
INSERT INTO sites (`site_id`, `site`, `institution`, `main_pharmacy_contact`, `contact_number`, `country`, `created`) VALUES (3, 4402, 'Test Insti', 'asdf', '+9999999999', 'US', 1434658503);
INSERT INTO sites (`site_id`, `site`, `institution`, `main_pharmacy_contact`, `contact_number`, `country`, `created`) VALUES (4, 3101, 'LUMS', 'Mr. xyz', '+923339660929', 'GB', 1455222924);


#
# TABLE STRUCTURE FOR: study
#

DROP TABLE IF EXISTS study;

CREATE TABLE `study` (
  `study_id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset_name` varchar(150) DEFAULT NULL,
  `study_name` varchar(150) DEFAULT NULL,
  `protocol_id` varchar(150) DEFAULT NULL,
  `subjects` int(3) DEFAULT NULL,
  `study_event_definitions` int(3) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO study (`study_id`, `dataset_name`, `study_name`, `protocol_id`, `subjects`, `study_event_definitions`, `date`) VALUES (11, 'Year1Impl1VisitData', 'European EPP Disease Registry', 'AFAM', 6, 1, '2015-Sep-30');


#
# TABLE STRUCTURE FOR: update_logs
#

DROP TABLE IF EXISTS update_logs;

CREATE TABLE `update_logs` (
  `update_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `table` varchar(150) DEFAULT NULL,
  `data` text,
  `date_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`update_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (3, 1, 'deliveries', '{\" `site` \":\" \'3101\'\",\" `batch_number` \":\" \'0\'\",\" `delivery_date` \":\" \'09\\/10\\/2015\'\",\" `number_implants` \":\" \'13\'\",\" `confirmed_by` \":\" \'Mr.ASDF\'\",\" `delivery_notes` \":\" \'Notes Notes Notes\' \",\" `id` \":\"  \'10\'\"}', '1450376569');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (4, 1, 'drug_batch', '{\" `batch_number` \":\" \'0\'\",\" `total_implants` \":\" \'956\'\",\" `imp_alloc_qc` \":\" \'5\'\",\" `imp_alloc_ct` \":\" \'15\'\",\" `manufacture_date` \":\" \'01\\/08\\/2015\'\",\" `release_date` \":\" \'26\\/08\\/2015\'\",\" `expiry_date` \":\" \'31\\/08\\/2015\'\",\" `extended_expiry_date` \":\" \'31\\/08\\/2015\'\",\" `notes` \":\" \'  Updated to actual figures 28\\/8                                                                                \' \",\" `drug_batch_id` \":\"  \'1\'\"}', '1453223250');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (5, 1, 'batch_mapping', '{\" `oc_value` \":\" \'1\'\",\" `local_value` \":\" \'ml1145\' \",\" `id` \":\"  \'3\'\"}', '1455221540');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (6, 1, 'batch_mapping', '{\" `oc_value` \":\" \'0\'\",\" `local_value` \":\" \'ML115444444\' \",\" `id` \":\"  \'2\'\"}', '1455221580');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (7, 1, 'batch_mapping', '{\" `oc_value` \":\" \'0\'\",\" `local_value` \":\" \'ML1154\' \",\" `id` \":\"  \'2\'\"}', '1455221657');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (8, 1, 'drug_batch', '{\" `batch_number` \":\" \'0\'\",\" `total_implants` \":\" \'50\'\",\" `imp_alloc_qc` \":\" \'10\'\",\" `imp_alloc_ct` \":\" \'10\'\",\" `manufacture_date` \":\" \'03\\/02\\/2016\'\",\" `release_date` \":\" \'04\\/02\\/2016\'\",\" `expiry_date` \":\" \'20\\/02\\/2016\'\",\" `extended_expiry_date` \":\" \'20\\/02\\/2016\'\",\" `notes` \":\" \'                   tyerrey                                                              \' \",\" `drug_batch_id` \":\"  \'2\'\"}', '1455222600');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (9, 1, 'drug_batch', '{\" `batch_number` \":\" \'0\'\",\" `total_implants` \":\" \'50\'\",\" `imp_alloc_qc` \":\" \'10\'\",\" `imp_alloc_ct` \":\" \'10\'\",\" `manufacture_date` \":\" \'03\\/02\\/2016\'\",\" `release_date` \":\" \'04\\/02\\/2016\'\",\" `expiry_date` \":\" \'20\\/02\\/2016\'\",\" `extended_expiry_date` \":\" \'20\\/02\\/2016\'\",\" `notes` \":\" \'    asdfasdfasdfasdf                                                                                              \' \",\" `drug_batch_id` \":\"  \'2\'\"}', '1455223237');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (10, 1, 'sites', '{\" `site` \":\" \'3101\'\",\" `institution` \":\" \'LUMS\'\",\" `main_pharmacy_contact` \":\" \'Mr. xyz\'\",\" `contact_number` \":\" \'+923339660929\'\",\" `country` \":\" \'GB\' \",\" `site_id` \":\"  \'4\'\"}', '1455223265');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (11, 1, 'batch_mapping', '{\" `oc_value` \":\" \'1\'\",\" `local_value` \":\" \'ml1145\' \",\" `id` \":\"  \'3\'\"}', '1455649800');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (12, 1, 'batch_mapping', '{\" `oc_value` \":\" \'100\'\",\" `local_value` \":\" \'test value\' \",\" `id` \":\"  \'4\'\"}', '1460656681');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (13, 1, 'batch_mapping', '{\" `oc_value` \":\" \'10\'\",\" `local_value` \":\" \'test value updated\' \",\" `id` \":\"  \'4\'\"}', '1460656731');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (14, 1, 'site_mapping', '{\" `site_oc_value` \":\" \'12345\'\",\" `site_title` \":\" \'test site map updated\' \",\" `site_map_id` \":\"  \'13\'\"}', '1460656948');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (15, 1, 'drug_batch', '{\" `batch_number` \":\" \'10\'\",\" `total_implants` \":\" \'16\'\",\" `imp_alloc_qc` \":\" \'5\'\",\" `imp_alloc_ct` \":\" \'3\'\",\" `manufacture_date` \":\" \'13\\/04\\/2016\'\",\" `release_date` \":\" \'15\\/04\\/2016\'\",\" `expiry_date` \":\" \'19\\/04\\/2016\'\",\" `extended_expiry_date` \":\" \'19\\/04\\/2016\'\",\" `notes` \":\" \' Rutrum aut et platea cillum laoreet incidunt\",\" aute\":null,\" magni illum laudantium vitae tenetur laudantium\":null,\" posuere pharetra tortor                                         \' \":null,\" `drug_batch_id` \":\"  \'3\'\"}', '1460657617');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (16, 1, 'sites', '{\" `site` \":\" \'3101\'\",\" `institution` \":\" \'Test Name updated\'\",\" `main_pharmacy_contact` \":\" \'Mr. Contact Name updated\'\",\" `contact_number` \":\" \'+1234565789\'\",\" `country` \":\" \'GB\' \",\" `site_id` \":\"  \'5\'\"}', '1460657891');
INSERT INTO update_logs (`update_log_id`, `user_id`, `table`, `data`, `date_time`) VALUES (17, 1, 'users', '{\" `user_email` \":\" \'test@testing.com\'\",\" `user_address` \":\" \'adadasdas\'\",\" `user_phone` \":\" \'1213131321\'\",\" `user_role` \":\" \'2\'\",\" `user_status` \":\" \'active\' \",\" `user_id` \":\"  \'8\'\"}', '1462560748');


#
# TABLE STRUCTURE FOR: user_roles
#

DROP TABLE IF EXISTS user_roles;

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO user_roles (`role_id`, `role_title`) VALUES (1, 'Administrator');
INSERT INTO user_roles (`role_id`, `role_title`) VALUES (2, 'Manager');
INSERT INTO user_roles (`role_id`, `role_title`) VALUES (3, 'QP User');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
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
  PRIMARY KEY (`user_id`),
  KEY `user_role` (`user_role`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (1, 'admin', 'admin@clinuvel.com', NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', 1, 'active', '1432149372', NULL);
INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (5, 'admin', 'admn@gmail.com', 'aaddada', '13123132', NULL, 1, 'active', NULL, NULL);
INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (8, 'Tst', 'test@testing.com', 'adadasdas', '1213131321', '202cb962ac59075b964b07152d234b70', 2, 'active', '1433360422', NULL);
INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (18, 'marco', 'marco.spijko@gmail.com', 'adasdas', '123131313131321', '2aa53aa7ad6d333be9dab0261df56730', 1, 'active', '1435087214', NULL);
INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (19, 'mail', 'mail@clinuvel.com', 'Clinuvel', '9999999999', '97bf34d31a8710e6b1649fd33357f783', 2, 'active', '1435173052', NULL);
INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (20, 'qp', 'qp@clinuvel.com', 'test addresss', '+999999999', '21232f297a57a5a743894a0e4a801fc3', 3, 'active', '1441221766', NULL);
INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_role`, `user_status`, `created`, `token`) VALUES (21, 'Manager', 'pm@clinuvel.com', 'lake otis', '+88811122222', '21232f297a57a5a743894a0e4a801fc3', 2, 'active', '1441223350', NULL);


#
# TABLE STRUCTURE FOR: wastage
#

DROP TABLE IF EXISTS wastage;

CREATE TABLE `wastage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` int(11) DEFAULT NULL,
  `batch_number` varchar(100) DEFAULT NULL,
  `date_reported` varchar(50) DEFAULT NULL,
  `reason` text,
  `notes` text,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site` (`site`),
  KEY `batch_number` (`batch_number`),
  CONSTRAINT `wastage_ibfk_1` FOREIGN KEY (`site`) REFERENCES `site_mapping` (`site_oc_value`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wastage_ibfk_2` FOREIGN KEY (`batch_number`) REFERENCES `batch_mapping` (`oc_value`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO wastage (`id`, `site`, `batch_number`, `date_reported`, `reason`, `notes`, `created`) VALUES (9, 3101, '0', '07/04/2016', 'accident', 'a;klsdfj', '1455223168');


