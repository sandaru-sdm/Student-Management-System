CREATE DATABASE  IF NOT EXISTS `sms` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sms`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: sms
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academic_officer`
--

DROP TABLE IF EXISTS `academic_officer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `academic_officer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `unique_id` varchar(45) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `user_type_id` int NOT NULL,
  `status_id` int NOT NULL,
  `grade_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_academic_officer_user_type1_idx` (`user_type_id`),
  KEY `fk_academic_officer_status1_idx` (`status_id`),
  KEY `fk_academic_officer_grade1_idx` (`grade_id`),
  CONSTRAINT `fk_academic_officer_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `fk_academic_officer_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_academic_officer_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_officer`
--

LOCK TABLES `academic_officer` WRITE;
/*!40000 ALTER TABLE `academic_officer` DISABLE KEYS */;
INSERT INTO `academic_officer` VALUES (1,'Dilshan','Maduhansa','0754306610','thebatman202011@gmail.com','dilshan','123456789',NULL,'2022-10-12 17:34:02',2,1,8),(2,'Nipuni','Tharika','0754306610','maduhansadilshan@gmail.com','nipuni0754306610','0754306610','6349528a945b3','2022-10-14 17:44:02',2,1,10),(3,'Clark','Kent','0701794934','maduhansadilshan@gmail.com','clark','123456789','634d442ce3a84','2022-10-17 17:31:48',2,0,9);
/*!40000 ALTER TABLE `academic_officer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `user_type_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Admin_user_type1_idx` (`user_type_id`),
  KEY `fk_Admin_status1_idx` (`status_id`),
  CONSTRAINT `fk_Admin_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_Admin_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Sandaru','Gunathilake','0701794934','sandaru','123456789','2022-10-12 17:33:21',1,1),(2,'Bruce','Wayne','0701794934','bruce0712064592','0712064592','2022-10-14 13:56:54',1,2),(3,'Diana','Prince','0754306610','diana0754306610','0754306610','2022-10-14 13:58:12',1,2),(4,'Madhu','Sanda','0752726222','0752726222','0752726222','2022-10-14 13:59:23',1,1),(5,'Jayalath','Gunathilake','0788764949','jayalath0788764949','0788764949','2022-10-14 14:03:34',1,0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `annul_payment_status`
--

DROP TABLE IF EXISTS `annul_payment_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `annul_payment_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annul_payment_status`
--

LOCK TABLES `annul_payment_status` WRITE;
/*!40000 ALTER TABLE `annul_payment_status` DISABLE KEYS */;
INSERT INTO `annul_payment_status` VALUES (0,'Unpaid'),(1,'Paid');
/*!40000 ALTER TABLE `annul_payment_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `student_id` int NOT NULL,
  `assignment_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_answer_student1_idx` (`student_id`),
  KEY `fk_answer_assignment1_idx` (`assignment_id`),
  CONSTRAINT `fk_answer_assignment1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`id`),
  CONSTRAINT `fk_answer_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'..//Resources//Answer//6351248960181.pdf',2,1);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `teacher_has_subject_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignment_teacher_has_subject1_idx` (`teacher_has_subject_id`),
  KEY `fk_assignment_status1_idx` (`status_id`),
  CONSTRAINT `fk_assignment_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_assignment_teacher_has_subject1` FOREIGN KEY (`teacher_has_subject_id`) REFERENCES `teacher_has_subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,'English-AS-1','..//Resources//Assignments//634fa71ce3c27.pdf',1,6),(2,'English-AS-2','..//Resources//Assignments//634fda49c4ed4.pdf',1,5),(3,'Sinhala AS 01','..//Resources//Assignments//Science_AS_01.pdf',4,5),(4,'Sinhala AS 02','..//Resources//Assignments//Sinhala_AS_01.pdf',4,5),(5,'Science','..//Resources//Assignments//Science.pdf',3,5);
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_fee_status`
--

DROP TABLE IF EXISTS `enrollment_fee_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_fee_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_fee_status`
--

LOCK TABLES `enrollment_fee_status` WRITE;
/*!40000 ALTER TABLE `enrollment_fee_status` DISABLE KEYS */;
INSERT INTO `enrollment_fee_status` VALUES (0,'Unpaid'),(1,'Paid');
/*!40000 ALTER TABLE `enrollment_fee_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8'),(9,'9'),(10,'10'),(11,'11'),(12,'12'),(13,'13'),(14,'Graduated');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_update_history`
--

DROP TABLE IF EXISTS `grade_update_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_update_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `years` int DEFAULT NULL,
  `Admin_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_grade_update_history_Admin1_idx` (`Admin_id`),
  CONSTRAINT `fk_grade_update_history_Admin1` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_update_history`
--

LOCK TABLES `grade_update_history` WRITE;
/*!40000 ALTER TABLE `grade_update_history` DISABLE KEYS */;
INSERT INTO `grade_update_history` VALUES (1,2022,1);
/*!40000 ALTER TABLE `grade_update_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `details` varchar(50) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_student1_idx` (`student_id`),
  CONSTRAINT `fk_invoice_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_note`
--

DROP TABLE IF EXISTS `lesson_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_note` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `teacher_has_subject_id` int NOT NULL,
  `status_id` int NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lesson_note_teacher_has_subject1_idx` (`teacher_has_subject_id`),
  KEY `fk_lesson_note_status1_idx` (`status_id`),
  CONSTRAINT `fk_lesson_note_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_lesson_note_teacher_has_subject1` FOREIGN KEY (`teacher_has_subject_id`) REFERENCES `teacher_has_subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_note`
--

LOCK TABLES `lesson_note` WRITE;
/*!40000 ALTER TABLE `lesson_note` DISABLE KEYS */;
INSERT INTO `lesson_note` VALUES (1,'English Lesson 01',1,5,'..//Resources//Notes//English_Lesson_01.pdf'),(2,'English Lesson 02',1,5,'..//Resources//Notes//English_Lesson_02.pdf'),(3,'English Lesson 03',1,5,'..//Resources//Notes//English_Lesson_03.pdf'),(4,'Science Lesson 01',3,5,'..//Resources//Notes//Science_Lesson_01.pdf');
/*!40000 ALTER TABLE `lesson_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mark` double DEFAULT NULL,
  `student_id` int NOT NULL,
  `assignment_id` int NOT NULL,
  `answer_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marks_student1_idx` (`student_id`),
  KEY `fk_marks_assignment1_idx` (`assignment_id`),
  KEY `fk_marks_status1_idx` (`status_id`),
  KEY `fk_marks_answer1_idx` (`answer_id`),
  CONSTRAINT `fk_marks_answer1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`),
  CONSTRAINT `fk_marks_assignment1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`id`),
  CONSTRAINT `fk_marks_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_marks_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marks`
--

LOCK TABLES `marks` WRITE;
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
INSERT INTO `marks` VALUES (1,90,2,1,1,5);
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (0,'Inactive'),(1,'Verified'),(2,'Disabled'),(4,'Submitted'),(5,'Released'),(6,'Time-Up');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `grade_id` int NOT NULL,
  `unique_id` varchar(45) DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  `user_type_id` int NOT NULL,
  `status_id` int NOT NULL,
  `enrollment_fee_status_id` int NOT NULL,
  `annul_payment_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_user_type1_idx` (`user_type_id`),
  KEY `fk_student_status1_idx` (`status_id`),
  KEY `fk_student_gender1_idx` (`gender_id`),
  KEY `fk_student_grade1_idx` (`grade_id`),
  KEY `fk_student_enrollment_fee_status1_idx` (`enrollment_fee_status_id`),
  KEY `fk_student_annul_payment_status1_idx` (`annul_payment_status_id`),
  CONSTRAINT `fk_student_annul_payment_status1` FOREIGN KEY (`annul_payment_status_id`) REFERENCES `annul_payment_status` (`id`),
  CONSTRAINT `fk_student_enrollment_fee_status1` FOREIGN KEY (`enrollment_fee_status_id`) REFERENCES `enrollment_fee_status` (`id`),
  CONSTRAINT `fk_student_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_student_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `fk_student_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_student_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Lahiru','Gunathilake','0712064592','lahiru','123456789','simpleidealk@gmail.com',1,8,NULL,'2022-09-21',4,1,1,1),(2,'Tharindu','Dilshan','0701794934','tharindu0701794934','0701794934','maduhansadilshan@gmail.com',1,10,'634e5788c537b','2022-10-18',4,1,1,0);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'English'),(2,'Sinhala'),(3,'Science'),(4,'History'),(5,'Buddhism'),(6,'Information Technology'),(7,'Health'),(8,'Media');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `unique_id` varchar(45) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `user_type_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_status1_idx` (`status_id`),
  KEY `fk_teacher_gender1_idx` (`gender_id`),
  KEY `fk_teacher_user_type1_idx` (`user_type_id`),
  CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_teacher_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_teacher_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Isuri','Gunathilake','0752726222','isuri','123456789','isuritharika@gmail.com',2,NULL,'2022-10-12 17:41:45',3,1),(2,'Tharushi','Maheshi','0754306610','tharushi0754306610','0754306610','maduhansadilshan@gmail.com',2,'634a7065a7073','2022-10-15 14:03:41',3,1);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_has_subject`
--

DROP TABLE IF EXISTS `teacher_has_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_has_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `grade_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_teacher_has_subject_teacher1_idx` (`teacher_id`),
  KEY `fk_teacher_has_subject_grade1_idx` (`grade_id`),
  KEY `fk_teacher_has_subject_status1_idx` (`status_id`),
  CONSTRAINT `fk_teacher_has_subject_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `fk_teacher_has_subject_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_teacher_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  CONSTRAINT `fk_teacher_has_subject_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_has_subject`
--

LOCK TABLES `teacher_has_subject` WRITE;
/*!40000 ALTER TABLE `teacher_has_subject` DISABLE KEYS */;
INSERT INTO `teacher_has_subject` VALUES (1,1,1,11,1),(2,2,2,10,1),(3,2,3,8,1),(4,1,2,8,1);
/*!40000 ALTER TABLE `teacher_has_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Admin'),(2,'Academic Officer'),(3,'Teacher'),(4,'Student');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-02 13:28:51
