-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `library`;

-- Dumping structure for table library.author
CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No name defined',
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `author_id` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table library.author: ~5 rows (approximately)
DELETE FROM `author`;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`author_id`, `author_name`) VALUES
	(1, 'Charles O. Locke'),
	(2, 'Dee Brown'),
	(3, 'Zane Grey'),
	(4, 'NORA ROBERTS'),
	(5, 'SALLY THORNE'),
	(6, 'JASMINE GUILLORY'),
	(7, 'Vanja GACIC');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;

-- Dumping structure for table library.book
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No title preview',
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(10) unsigned NOT NULL,
  `home_active` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_info` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `book_id` (`book_id`),
  KEY `fk_book_category_id` (`category_id`),
  CONSTRAINT `fk_book_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='data for books';

-- Dumping data for table library.book: ~7 rows (approximately)
DELETE FROM `book`;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`book_id`, `title`, `added_date`, `category_id`, `home_active`, `book_info`) VALUES
	(1, 'The Hell Bent Kid', '2021-05-22 15:30:50', 5, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(2, 'Bury My Heart at Wounded Knee', '2021-05-22 15:31:28', 5, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(3, 'Riders of the Purple Sage', '2021-05-22 15:33:33', 5, '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(4, 'It Ends With Us', '2021-05-22 15:43:22', 4, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(6, 'The Proposal', '2021-05-22 15:43:43', 4, '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(7, 'The Hating Game', '2021-05-22 15:44:04', 4, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(8, 'Vision In White', '2021-05-22 15:44:21', 4, '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
	(9, 'Vanjiga', '2021-05-27 14:15:44', 5, '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;

-- Dumping structure for table library.book_author
CREATE TABLE IF NOT EXISTS `book_author` (
  `book_author` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`book_author`),
  UNIQUE KEY `book_author` (`book_author`),
  KEY `fk_author_book_id` (`book_id`),
  KEY `fk_author_author_id` (`author_id`),
  CONSTRAINT `fk_author_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_author_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table library.book_author: ~7 rows (approximately)
DELETE FROM `book_author`;
/*!40000 ALTER TABLE `book_author` DISABLE KEYS */;
INSERT INTO `book_author` (`book_author`, `book_id`, `author_id`) VALUES
	(1, 2, 1),
	(2, 2, 2),
	(3, 1, 1),
	(4, 3, 3),
	(5, 4, 4),
	(6, 8, 6),
	(8, 1, 2),
	(9, 9, 7);
/*!40000 ALTER TABLE `book_author` ENABLE KEYS */;

-- Dumping structure for table library.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No category name defined',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='category of books';

-- Dumping data for table library.category: ~4 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`category_id`, `category_name`) VALUES
	(1, 'Fantasy'),
	(2, 'Sci-Fi'),
	(3, 'Thriller'),
	(4, 'Romance'),
	(5, 'Westerns');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table library.rank
CREATE TABLE IF NOT EXISTS `rank` (
  `rank_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rank_id`),
  UNIQUE KEY `rank_id` (`rank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='defines the rank of a user';

-- Dumping data for table library.rank: ~2 rows (approximately)
DELETE FROM `rank`;
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` (`rank_id`, `rank_name`) VALUES
	(1, 'Member'),
	(2, 'Administrator');
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;

-- Dumping structure for table library.shelf
CREATE TABLE IF NOT EXISTS `shelf` (
  `shelf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shelf_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No shelf defined',
  PRIMARY KEY (`shelf_id`),
  UNIQUE KEY `shelf_id` (`shelf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table library.shelf: ~2 rows (approximately)
DELETE FROM `shelf`;
/*!40000 ALTER TABLE `shelf` DISABLE KEYS */;
INSERT INTO `shelf` (`shelf_id`, `shelf_name`) VALUES
	(1, 'A - Shelf'),
	(2, 'B - Shelf'),
	(3, 'C - Shelf');
/*!40000 ALTER TABLE `shelf` ENABLE KEYS */;

-- Dumping structure for table library.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `rank_id` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_user_rank_id` (`rank_id`),
  CONSTRAINT `fk_user_rank_id` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`rank_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table library.user: ~4 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `username`, `password`, `rank_id`) VALUES
	(1, 'AdamIgnjatovic', 'Extremerampage23', 2),
	(2, 'VanjaGacic', 'Extremerampage23', 2),
	(3, 'BogdanJovanovic', 'Extremerampage23', 1),
	(14, 'Tester', 'test123', 1),
	(17, 'Luka', 'luka123', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table library.user_book
CREATE TABLE IF NOT EXISTS `user_book` (
  `user_book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  `user_added` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_book_id`),
  UNIQUE KEY `user_book_id` (`user_book_id`),
  KEY `fk_user_user_id` (`user_id`),
  KEY `fk_book_book_id` (`book_id`),
  CONSTRAINT `fk_book_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table library.user_book: ~2 rows (approximately)
DELETE FROM `user_book`;
/*!40000 ALTER TABLE `user_book` DISABLE KEYS */;
INSERT INTO `user_book` (`user_book_id`, `user_id`, `book_id`, `user_added`) VALUES
	(15, 14, 8, '2021-05-27 10:08:59');
/*!40000 ALTER TABLE `user_book` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
