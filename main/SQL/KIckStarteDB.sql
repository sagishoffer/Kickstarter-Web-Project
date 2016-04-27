-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: kickstarter
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `activityId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`activityId`),
  KEY `FK_ProjectId_Projects_idx` (`projectId`),
  KEY `FK_UserId_Users_idx` (`userId`),
  CONSTRAINT `FK_ProjectId_Projects` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_UserId_Users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,1,1,503),(2,2,1,2397),(3,3,1,5000),(4,4,1,255),(5,4,2,7734),(6,2,2,2645),(7,2,2,5624),(8,2,2,9441),(9,3,3,8852),(10,3,3,10000),(11,3,3,10000),(12,3,3,10000),(13,3,3,10000),(14,4,3,10000),(15,4,3,8852),(16,4,3,9597),(17,4,3,10000),(18,4,3,10000),(19,4,3,10000),(20,2,3,10000),(21,2,3,10000);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `brief` varchar(135) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `video` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `collected` int(11) NOT NULL DEFAULT '0',
  `goal` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`projectId`),
  KEY `FK_Projects_Users_owner_idx` (`creator`),
  CONSTRAINT `FK_Projects_Users` FOREIGN KEY (`creator`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Kick Start','A website that designed to promote public projects','Crowdfunding is the practice of funding a project or venture by raising monetary contributions from a large number of people, today often performed via internet-mediated registries, but the concept can also be executed through mail-order subscriptions, benefit events, and other methods. Crowdfunding is a form of alternative finance, which has emerged outside of the traditional financial system.','images/crowdfunding.jpg','https://www.youtube.com/embed/L7VJjDAO0p0','2015-11-27','2016-04-16',503,6500,1,1),(2,'Flyboard','Jet device that powered by a jet of water that it creates.','A Flyboard is a type of water jetpack attached to a personal water craft which supplies propulsion to drive the Flyboard through air and water to perform a sport known as flyboarding. A Flyboard rider stands on a board connected by a long hose to a watercraft. Water is forced under pressure to a pair of boots with jet nozzles underneath which provide thrust for the rider to fly up to 15m in the air or to dive headlong through the water down to 2.5m','images/flyboard.jpg','https://www.youtube.com/embed/eAJkVSxMRm0','2015-11-27','2016-05-06',40107,750000,1,1),(3,'Oculus Rift','A virtual reality head-mounted display, for games and other purposes.','The Rift is a virtual reality head-mounted display headset developed by Oculus VR. It was initially proposed in a Kickstarter campaign, during which Oculus VR raised US$2.5 million for the development of the product. The Rift is scheduled for release in the first quarter of 2016 , making it one of the first consumer-targeted virtual reality headsets. Oculus has described it as the first really professional PC-based VR headset. ','images/oculus.jpg','https://www.youtube.com/embed/kGIIQf3krMM','2015-11-27','2016-04-21',53852,642000,1,1),(4,'Trident','OpenROV Trident - An underwater drone for everyone.','After four years designing and piloting underwater drones, we\'ve taken everything we\'ve learned and completely re-imagined what an underwater drone could be. Trident has a unique design that combines the versatility and control of an ROV (Remotely Operated Vehicle) and the efficiency of an AUV (Autonomous Underwater Vehicle). It can fly in long, straight survey lines called transects as well as perform delicate maneuvers in tight spaces, all while maintaining a sleek and powerful form factor. Trident is easy to use and comes ready to go. Most importantly, it is incredibly fun to fly. Flying really is the best term, because that\'s exactly what it feels like when you\'re piloting.','images/trident.jpg','https://www.youtube.com/embed/pjTh8ChlFss','2015-11-27','2016-05-22',66438,325000,2,1);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `FK_Users_UserType_idx` (`type`),
  CONSTRAINT `FK_Users_UserType` FOREIGN KEY (`type`) REFERENCES `usertype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin',1,'admin@gmail.com','4dbd38ad3c4a4c5363bb630f93bd8171'),(2,'Avi',2,'avi@gmail.com','23a720d0c1a5127f58b4bce12b5f1a65'),(3,'Ron',3,'ron@gmail.com','3ae448ef20fb9563d0c59327d4ba43fe');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'Admin'),(2,'ProjectManager'),(3,'Backer');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-27 17:23:04
