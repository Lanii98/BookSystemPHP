
CREATE DATABASE BookSite;

USE BookSite;
DROP TABLE IF EXISTS `Books`;

CREATE TABLE `Books` (
  `BookID` int(4) NOT NULL AUTO_INCREMENT,
  `Title` text(30) NOT NULL,
  `Author` text(30) DEFAULT NULL,
  `PageNum` int(3) DEFAULT NULL,
  `Description` text(255) DEFAULT NULL,
  `StockNo` int(3) NOT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


--
-- Dumping data for table `Books`
--

LOCK TABLES `Books` WRITE;

INSERT INTO `Books` VALUES (1,'Harry Potter and the Chamber of Secrets','J.K Rowling',251,'Harry Potter is in his second year of Hogwarts and it is just as action packed as the first',233),(2,'The Hunger Games','Suzanne Collins',374,'Catniss Everdeen must battle in the Annual Hunger Games and win but she finds love in the arena and faces a difficult challenge ahead.',166),(3,'The Maze Runner','James Dashner',375,'A lot of boys get trapped inside a mysterious place and they must survive.',544);
/*!40000 ALTER TABLE `Books` ENABLE KEYS */;
UNLOCK TABLES;




