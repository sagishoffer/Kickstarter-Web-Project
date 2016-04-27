-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2015 at 09:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kickstarter`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
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
  KEY `FK_Projects_Users_owner_idx` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectId`, `name`, `title`, `description`, `picture`, `video`, `start_date`, `end_date`, `collected`, `goal`, `creator`, `status`) VALUES
(1, 'Kick Start', 'A website that designed to promote public projects', '<h1><ins><big><strong>Our Project</strong></big></ins></h1>\r\n\r\n<h2>This is our project that was build by Oren Yulzary &amp; Matan Shulman.</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>This is our collage:</em></p>\r\n\r\n<p><img alt="Afeka Collage" src="http://limudim.psychometry.co.il/users_images/afeka8%D7%97%D7%96%D7%99%D7%AA.JPG" style="border-style:solid; border-width:2px; height:225px; width:300px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The goal of this project is to buid a web site like &quot;<a href="https://www.kickstarter.com/">Kickstarter</a>&quot;.</p>\r\n\r\n<p><img alt="" src="http://localhost:8080/kickstarter/images/kickstarter1.jpg" style="height:200px; width:400px" /></p>\r\n\r\n<blockquote>\r\n<p>This is how the&nbsp;orginal web site of kickstarter look like:</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/1.jpg', 'http://www.youtube.com/embed/Gv2_sNPBgRw', '2015-11-01', '2015-12-01', 22000, 30000, 3, 1),
(2, 'Flyboard', 'Jet device that powered by a jet of water that it creates. Routed holes under the board allows to fly above the water.', '<p>A&nbsp;<strong>helicopter</strong>&nbsp;is a type of&nbsp;<a href="https://en.wikipedia.org/wiki/Rotorcraft">rotorcraft</a>&nbsp;in which&nbsp;<a href="https://en.wikipedia.org/wiki/Lift_(force)">lift</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Thrust">thrust</a>&nbsp;are supplied by&nbsp;<a href="https://en.wikipedia.org/wiki/Helicopter_rotor">rotors</a>. This allows the helicopter to take off and land vertically, to<a href="https://en.wikipedia.org/wiki/Hover_(helicopter)">hover</a>, and to fly forward, backward, and laterally. These attributes allow helicopters to be used in congested or isolated areas where<a href="https://en.wikipedia.org/wiki/Fixed-wing_aircraft">fixed-wing aircraft</a>&nbsp;and many forms of&nbsp;<a href="https://en.wikipedia.org/wiki/VTOL">VTOL</a>&nbsp;(vertical takeoff and landing) aircraft cannot perform.</p>\r\n\r\n<p>The word&nbsp;<em>helicopter</em>&nbsp;is adapted from the French language&nbsp;<em>h&eacute;licopt&egrave;re</em>, coined by Gustave Ponton d&#39;Am&eacute;court in 1861, which originates from the&nbsp;<a href="https://en.wikipedia.org/wiki/Greek_language">Greek</a>&nbsp;<em>helix</em>&nbsp;(á¼•&lambda;&iota;&xi;) &quot;helix, spiral, whirl, convolution&quot;<a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-1">[1]</a>&nbsp;and&nbsp;<em>pteron</em>&nbsp;(&pi;&tau;&epsilon;&rho;ÏŒ&nu;) &quot;wing&quot;.<a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-2">[2]</a><a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-3">[3]</a><a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-4">[4]</a><a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-5">[5]</a>&nbsp;English-language nicknames for helicopter include &quot;chopper&quot;, &quot;copter&quot;, &quot;helo&quot;, &quot;heli&quot;, &quot;huey&quot; and &quot;whirlybird&quot;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/5/54/Taketombo.JPG" style="height:217px; width:300px" /></p>\r\n\r\n<blockquote>\r\n<p>A&nbsp;decorated&nbsp;Japanese&nbsp;<em>taketombo</em>bamb&nbsp;o-copter</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Helicopters were developed and built during the first half-century of&nbsp;<a href="https://en.wikipedia.org/wiki/Flight">flight</a>, with the&nbsp;<a href="https://en.wikipedia.org/wiki/Focke-Wulf_Fw_61">Focke-Wulf Fw 61</a>&nbsp;being the first operational helicopter in 1936. Some helicopters reached limited production, but it was not until 1942 that a helicopter designed by&nbsp;<a href="https://en.wikipedia.org/wiki/Igor_Sikorsky">Igor Sikorsky</a>&nbsp;reached full-scale&nbsp;<a href="https://en.wikipedia.org/wiki/Mass_production">production</a>,<a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-Munson-6">[6]</a>&nbsp;with 131 aircraft built.<a href="https://en.wikipedia.org/wiki/Helicopter#cite_note-Hirschberg-7">[7]</a>&nbsp;Though most earlier designs used more than one main rotor, it is the single main rotor with anti-torque&nbsp;<a href="https://en.wikipedia.org/wiki/Tail_rotor">tail rotor</a>&nbsp;configuration that has become the most common helicopter configuration.&nbsp;<a href="https://en.wikipedia.org/wiki/Tandem_rotor">Tandem rotor</a>&nbsp;helicopters are also in widespread use due to their greater&nbsp;payload&nbsp;capacity.&nbsp;<a href="https://en.wikipedia.org/wiki/Coaxial_rotors">Coaxial</a>&nbsp;helicopters,&nbsp;<a href="https://en.wikipedia.org/wiki/Tiltrotor">tiltrotor</a>&nbsp;aircraft, and&nbsp;<a href="https://en.wikipedia.org/wiki/Gyrodyne">compound helicopters</a>&nbsp;are all flying today.&nbsp;<a href="https://en.wikipedia.org/wiki/Quadcopter">Quadcopter</a>&nbsp;helicopters pioneered as<a href="https://en.wikipedia.org/wiki/Breguet-Richet_Gyroplane">early as 1907</a>&nbsp;in France, and other types of&nbsp;<a href="https://en.wikipedia.org/wiki/Multicopter">multicopter</a>&nbsp;have been developed for specialized applications such as unmanned drones.</p>\r\n\r\n<p><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/3/37/Leonardo_da_Vinci_helicopter.jpg" style="height:221px; width:300px" /></p>\r\n\r\n<blockquote>\r\n<p>Leonardo&#39;s &quot;aerial screw&quot;</p>\r\n</blockquote>\r\n', 'images/1.jpg', 'https://www.youtube.com/watch?v=eAJkVSxMRm0', '2012-10-20', '2016-10-10', 75000, 100000, 3, 1),
(3, 'Oculus Rift', 'A virtual reality head-mounted display, for games and other purposes.', '<p>The company was founded by&nbsp;<a href="https://en.wikipedia.org/wiki/Nick_Woodman">Nick Woodman</a>&nbsp;in 2002. Woodman started the company following a 2002 surf trip to Australia in which he was hoping to capture quality action photos of his surfing, but could not because amateur photographers could not get close enough, or obtain quality equipment at reasonable prices.<a href="https://en.wikipedia.org/wiki/GoPro#cite_note-2">[2]</a>&nbsp;His desire for a camera system that could capture the professional angles inspired the &#39;GoPro&#39; name.<a href="https://en.wikipedia.org/wiki/GoPro#cite_note-malakye1-3">[3]</a><a href="https://en.wikipedia.org/wiki/GoPro#cite_note-businessweek1-4">[4]</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Cyclisme_%26_GoPro_-_GoPro_Hero_4_%2802%29.JPG/800px-Cyclisme_%26_GoPro_-_GoPro_Hero_4_%2802%29.JPG" style="height:296px; width:400px" /></p>\r\n\r\n<blockquote>\r\n<p>GoPro Hero 4 Silver Edition.</p>\r\n</blockquote>\r\n\r\n<p>Woodman initially raised a portion of the money for his company by selling bead and shell belts for under US $20 out of his&nbsp;<a href="https://en.wikipedia.org/wiki/Volkswagen_Type_2">VW van</a><a href="https://en.wikipedia.org/wiki/GoPro#cite_note-5">[5]</a>&nbsp;and later, fashionable camera straps. He also received over $230,000 in investment from his parents.<a href="https://en.wikipedia.org/wiki/GoPro#cite_note-6">[6]</a><a href="https://en.wikipedia.org/wiki/GoPro#cite_note-7">[7]</a></p>\r\n\r\n<p>In 2004, the company sold its first camera system, which used&nbsp;<a href="https://en.wikipedia.org/wiki/35_mm_film">35 mm film</a>.<a href="https://en.wikipedia.org/wiki/GoPro#cite_note-malakye1-3">[3]</a>&nbsp;Digital still and video camera were later introduced. As of 2014&nbsp;a fixed-lens HD video camera with a wide 170-degree angle was available; two or more can be paired to create&nbsp;<a href="https://en.wikipedia.org/wiki/3D_video">3D video</a>.<a href="https://en.wikipedia.org/wiki/GoPro#cite_note-malakye1-3">[3]</a><a href="https://en.wikipedia.org/wiki/GoPro#cite_note-8">[8]</a></p>\r\n\r\n<p>On June 4, 2014, the company announced the appointment of former Microsoft executive&nbsp;<a href="https://en.wikipedia.org/wiki/Tony_Bates">Tony Bates</a>&nbsp;as President reporting directly to Nick Woodman.<a href="https://en.wikipedia.org/wiki/GoPro#cite_note-9">[9]</a></p>\r\n', 'images/1.jpg', 'https://www.youtube.com/watch?v=kGIIQf3krMM', '2014-06-15', '2017-03-12', 500000, 1000000, 3, 1),
(4, 'OpenBCI', 'OpenBCI is an open source brain-computer interface.', '<p><strong>Polaris Industries</strong>&nbsp;is an American manufacturer of&nbsp;<a href="https://en.wikipedia.org/wiki/Snowmobile">snowmobiles</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/All-terrain_vehicle">ATV</a>, and&nbsp;<a href="https://en.wikipedia.org/wiki/Neighborhood_electric_vehicles">neighborhood electric vehicles</a>. Polaris is based in the<a href="https://en.wikipedia.org/wiki/Minneapolis">Minneapolis</a>&nbsp;exurb of&nbsp;<a href="https://en.wikipedia.org/wiki/Medina,_Minnesota">Medina</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Minnesota">Minnesota</a>, USA. The company also manufactures&nbsp;<a href="https://en.wikipedia.org/wiki/Motorcycles">motorcycles</a>&nbsp;through its&nbsp;<a href="https://en.wikipedia.org/wiki/Victory_Motorcycles">Victory Motorcycles</a>subsidiary and through the&nbsp;<a href="https://en.wikipedia.org/wiki/Indian_(motorcycle)">Indian Motorcycle</a>&nbsp;subsidiary which it purchased in April 2011.<a href="https://en.wikipedia.org/wiki/Polaris_Industries#cite_note-2">[2]</a>&nbsp;Polaris no longer produces&nbsp;<a href="https://en.wikipedia.org/wiki/Watercraft">watercraft</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://cdn-4.psndealer.com/e2/dealersite/images/bertsmegamall/2014-RZR-XP4-1000.jpg" style="height:281px; width:500px" /></p>\r\n\r\n<p>Robin (a subsidiary of&nbsp;<a href="https://en.wikipedia.org/wiki/Fuji_Heavy_Industries">Fuji Heavy Industries</a>, which is the owner of&nbsp;<a href="https://en.wikipedia.org/wiki/Subaru">Subaru</a>) develops and supplies all-terrain vehicle (ATV) and snowmobile engines for U.S.-based leisure equipment maker Polaris Industries Inc. Starting in 1995 with the Polaris Magnum 425 4-stroke atv and in 1997, with the introduction of the &quot;twin 700&quot; snowmobile engine Polaris started the development and production of in-house produced powerplants, known as the &quot;Liberty&quot; line of engines, now found in many models across their current production lines. This production makes some Polaris products 100% American made. However, in 2010 Polaris relocated a portion of its utility and sport vehicle assembly to Mexico. Polaris snowmobiles are still 100% American made with the powertrain components manufactured in Osceola, WI and the vehicle assembly in Roseau, MN. The vast majority of powertrain and vehicles for the off-road line are manufactured in the Osceola and Roseau facilities, respectively. Both the Victory and Indian motorcycle brands are American made with complete powertrains and vehicle assembly located in Osceola, WI and Spirit Lake, IA, respectively.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/openBCI.jpg', 'https://www.youtube.com/watch?v=svuu3BlUVuE', '2014-08-03', '2017-05-22', 900000, 1500000, 3, 1),
(5, 'Kingii', 'The most universal, wearable water security device ever created.', '<p><img alt="" src="https://ksr-ugc.imgix.net/assets/004/356/318/3de0ef55a37b13c38a2963216e1e1d7f_original.png?v=1440178091&amp;w=680&amp;fit=max&amp;auto=format&amp;lossless=true&amp;s=2a6a3b8f32faa102b7b074f62949096d" /></p>\r\n', 'images/1.jpg', 'https://www.youtube.com/watch?v=douxGAsnGfg', '2014-12-17', '2016-12-18', 15000, 30000, 3, 1);


-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'ProjectManager'),
(3, 'Backer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,  
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `FK_Users_UserType_idx` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `type`, `email`, `password`) VALUES
(1, 'Admin', 1, 'a@gmail.com', 'admin123'),
(2, 'Avi', 2, 'avi@gmail.com', 'avi123'),
(3, 'Ron', 3, 'ron@gmail.com', 'ron123');


-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `activityId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ammont` int(11) NOT NULL,
  PRIMARY KEY (`activityId`),
  KEY `FK_ProjectId_Projects_idx` (`projectId`),
  KEY `FK_UserId_Users_idx` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activityId`, `projectId`, `userId`, `ammont`) VALUES
(1, 1, 1, 100),
(2, 2, 2, 100),
(3, 1, 3, 100),
(4, 5, 1, 900),
(5, 4, 1, 50),
(6, 4, 1, 50),
(7, 5, 1, 500),
(8, 3, 1, 300),
(16, 5, 3, 500);

--
-- Triggers `activities`
--
DROP TRIGGER IF EXISTS `activities_AFTER_INSERT`;
DELIMITER //
CREATE TRIGGER `activities_AFTER_INSERT` AFTER INSERT ON `activities`
FOR EACH ROW BEGIN
	Set @collected = (SELECT collected
					  FROM projects
					  WHERE projects.projectId = new.projectId);

	UPDATE projects
	SET collected = @collected + new.ammont
	WHERE projects.projectId = new.projectId;

     
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `activities_BEFORE_DELETE`;
DELIMITER //
CREATE TRIGGER `activities_BEFORE_DELETE` BEFORE DELETE ON `activities`
FOR EACH ROW BEGIN
	Set @collected = (SELECT collected
					  FROM projects
					  WHERE projects.projectId = old.projectId);

	UPDATE projects
	SET collected = @collected - old.ammont
	WHERE projects.projectId = old.projectId; 

END
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `FK_ProjectId_Projects` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_UserId_Users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `FK_Projects_Users` FOREIGN KEY (`creator`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Users_UserType` FOREIGN KEY (`type`) REFERENCES `usertype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
