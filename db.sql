 /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8 */;
 /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
 /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
 /*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


 # Dump of table users
 # ------------------------------------------------------------

 DROP TABLE IF EXISTS `users`;
 DROP TABLE IF EXISTS 'content';

 CREATE TABLE `users` (
   `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `user_name` varchar(32) NOT NULL DEFAULT '',
   `user_email` varchar(100) NOT NULL DEFAULT '',
   `pass_hash` varchar(300) NOT NULL DEFAULT '',
   `last_login` date DEFAULT NULL,
   `lastip` varchar(16) DEFAULT NULL,
   PRIMARY KEY (`user_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE `content` (
   `content_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `contentName` varchar(32) NOT NULL DEFAULT '',
   `contentTags` varchar (100) NOT NULL DEFAULT '',
   `contentToken` varchar(300) NOT NULL DEFAULT '',
   `contentInsertTime` date DEFAULT NULL,
   `contentInsertBy` varchar(16) DEFAULT NULL,
   PRIMARY KEY (`content_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 LOCK TABLES `users` WRITE;
 /*!40000 ALTER TABLE `users` DISABLE KEYS */;

 INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `pass_hash`, `last_login`, `lastip`)
 VALUES
 	(10,'admin','email@email.com','$2y$10$1vw4FmYEo0sS1NwCxJAW9OL0X/.EAUn8vpfqvRgCiLFRxGKhlxxam',NULL,NULL),
 	(13,'&#34;CREATE TABLE test','email+1@email.com','$2y$10$wfSrQ73rqEsiK7Mtw/9Mhev4Jyn8DHtTvDT6f7mgSRsRrIdM1W5Q6',NULL,NULL);

 /*!40000 ALTER TABLE `users` ENABLE KEYS */;
 UNLOCK TABLES;



 /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
 /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
 /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
