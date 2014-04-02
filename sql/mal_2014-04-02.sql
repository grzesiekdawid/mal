# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: mal
# Generation Time: 2014-04-02 12:32:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table wp_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_posts`;

CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`)
VALUES
	(1,1,'2014-03-30 10:44:38','2014-03-30 10:44:38','Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!','Hello world!','','publish','open','open','','hello-world','','','2014-03-30 10:44:38','2014-03-30 10:44:38','',0,'http://mal.dev/?p=1',0,'post','',1),
	(2,1,'2014-03-30 10:44:38','2014-03-30 10:44:38','This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http://mal.dev/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!','Sample Page','','publish','open','open','','sample-page','','','2014-03-30 10:44:38','2014-03-30 10:44:38','',0,'http://mal.dev/?page_id=2',0,'page','',0),
	(3,1,'2014-03-30 10:44:49','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2014-03-30 10:44:49','0000-00-00 00:00:00','',0,'http://mal.dev/?p=3',0,'post','',0),
	(4,1,'2014-03-31 12:17:17','2014-03-31 12:17:17','','Shop','','publish','closed','open','','shop','','','2014-03-31 12:17:17','2014-03-31 12:17:17','',0,'http://mal.dev/?page_id=4',0,'page','',0),
	(5,1,'2014-03-31 12:17:17','2014-03-31 12:17:17','[woocommerce_cart]','Cart','','publish','closed','open','','cart','','','2014-03-31 12:17:17','2014-03-31 12:17:17','',0,'http://mal.dev/?page_id=5',0,'page','',0),
	(6,1,'2014-03-31 12:17:17','2014-03-31 12:17:17','[woocommerce_checkout]','Checkout','','publish','closed','open','','checkout','','','2014-03-31 12:17:17','2014-03-31 12:17:17','',0,'http://mal.dev/?page_id=6',0,'page','',0),
	(7,1,'2014-03-31 12:17:17','2014-03-31 12:17:17','[woocommerce_my_account]','My Account','','publish','closed','open','','my-account','','','2014-03-31 12:17:17','2014-03-31 12:17:17','',0,'http://mal.dev/?page_id=7',0,'page','',0),
	(8,1,'2014-04-01 12:20:15','2014-04-01 12:20:15','','Home','Home','publish','open','open','','home','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=8',2,'nav_menu_item','',0),
	(9,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','9','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=9',3,'nav_menu_item','',0),
	(10,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','10','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=10',4,'nav_menu_item','',0),
	(11,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','11','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=11',5,'nav_menu_item','',0),
	(12,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','12','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=12',6,'nav_menu_item','',0),
	(13,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','13','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=13',7,'nav_menu_item','',0),
	(14,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','14','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=14',8,'nav_menu_item','',0),
	(15,1,'2014-04-01 12:20:15','2014-04-01 12:20:15',' ','','','publish','open','open','','15','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=15',9,'nav_menu_item','',0),
	(16,1,'2014-04-01 12:20:16','2014-04-01 12:20:16',' ','','','publish','open','open','','16','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=16',10,'nav_menu_item','',0),
	(17,1,'2014-04-01 12:20:16','2014-04-01 12:20:16',' ','','','publish','open','open','','17','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=17',11,'nav_menu_item','',0),
	(18,1,'2014-04-01 12:21:26','2014-04-01 12:21:26','','Who we are','','publish','open','open','','who-we-are','','','2014-04-01 12:23:43','2014-04-01 12:23:43','',0,'http://mal.dev/?p=18',1,'nav_menu_item','',0),
	(20,1,'2014-04-01 12:25:17','2014-04-01 12:25:17','We are somebody.','Who we are','','publish','open','open','','who-we-are','','','2014-04-01 12:25:17','2014-04-01 12:25:17','',0,'http://mal.dev/?page_id=20',0,'page','',0),
	(21,1,'2014-04-01 12:25:17','2014-04-01 12:25:17','We are somebody.','Who we are','','inherit','open','open','','20-revision-v1','','','2014-04-01 12:25:17','2014-04-01 12:25:17','',20,'http://mal.dev/?p=21',0,'revision','',0),
	(22,1,'2014-04-01 12:25:50','2014-04-01 12:25:50','It works somehow','How it works','','publish','open','open','','how-it-works','','','2014-04-01 12:25:50','2014-04-01 12:25:50','',0,'http://mal.dev/?page_id=22',0,'page','',0),
	(23,1,'2014-04-01 12:25:50','2014-04-01 12:25:50','It works somehow','How it works','','inherit','open','open','','22-revision-v1','','','2014-04-01 12:25:50','2014-04-01 12:25:50','',22,'http://mal.dev/?p=23',0,'revision','',0),
	(24,1,'2014-04-01 12:26:41','2014-04-01 12:26:41',' ','','','publish','open','open','','24','','','2014-04-02 12:11:11','2014-04-02 12:11:11','',0,'http://mal.dev/?p=24',1,'nav_menu_item','',0),
	(25,1,'2014-04-01 12:26:41','2014-04-01 12:26:41',' ','','','publish','open','open','','25','','','2014-04-02 12:11:11','2014-04-02 12:11:11','',0,'http://mal.dev/?p=25',2,'nav_menu_item','',0),
	(26,1,'2014-04-02 11:26:29','2014-04-02 11:26:29','Best salad 1.\r\n\r\nLong description.','Salad 1','','publish','open','closed','','salad-1','','','2014-04-02 11:26:29','2014-04-02 11:26:29','',0,'http://mal.dev/?post_type=product&#038;p=26',0,'product','',0),
	(27,1,'2014-04-02 11:25:25','2014-04-02 11:25:25','','salad1','','inherit','open','open','','salad1','','','2014-04-02 11:25:25','2014-04-02 11:25:25','',26,'http://mal.dev/wp-content/uploads/2014/04/salad1.jpg',0,'attachment','image/jpeg',0),
	(28,1,'2014-04-02 11:27:27','2014-04-02 11:27:27','Best salad 2.\r\n\r\nDescription.','salad 2','','publish','open','closed','','salad-2','','','2014-04-02 11:27:56','2014-04-02 11:27:56','',0,'http://mal.dev/?post_type=product&#038;p=28',0,'product','',0),
	(29,1,'2014-04-02 11:27:06','2014-04-02 11:27:06','Blabla bla\n','salad2','','inherit','open','open','','salad2','','','2014-04-02 11:27:06','2014-04-02 11:27:06','',28,'http://mal.dev/wp-content/uploads/2014/04/salad2.jpg',0,'attachment','image/jpeg',0),
	(30,1,'2014-04-02 12:10:40','2014-04-02 12:10:40','Test content.','Test 1','','publish','closed','open','','test-1','','','2014-04-02 12:10:40','2014-04-02 12:10:40','',0,'http://mal.dev/?page_id=30',0,'page','',0),
	(31,1,'2014-04-02 12:10:40','2014-04-02 12:10:40','Test content.','Test 1','','inherit','closed','open','','30-revision-v1','','','2014-04-02 12:10:40','2014-04-02 12:10:40','',30,'http://mal.dev/?p=31',0,'revision','',0),
	(32,1,'2014-04-02 12:10:53','2014-04-02 12:10:53','Test content.','Test 2','','publish','closed','open','','test-2','','','2014-04-02 12:10:53','2014-04-02 12:10:53','',0,'http://mal.dev/?page_id=32',0,'page','',0),
	(33,1,'2014-04-02 12:10:53','2014-04-02 12:10:53','Test content.','Test 2','','inherit','closed','open','','32-revision-v1','','','2014-04-02 12:10:53','2014-04-02 12:10:53','',32,'http://mal.dev/?p=33',0,'revision','',0),
	(34,1,'2014-04-02 12:11:11','2014-04-02 12:11:11',' ','','','publish','closed','open','','34','','','2014-04-02 12:11:11','2014-04-02 12:11:11','',0,'http://mal.dev/?p=34',4,'nav_menu_item','',0),
	(35,1,'2014-04-02 12:11:11','2014-04-02 12:11:11',' ','','','publish','closed','open','','35','','','2014-04-02 12:11:11','2014-04-02 12:11:11','',0,'http://mal.dev/?p=35',3,'nav_menu_item','',0);

/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
