-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: wardex
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Audi','Не следует, однако, забывать, что дальнейшее развитие различных форм деятельности говорит о возможностях дальнейших направлений развития. Современные технологии достигли такого уровня, что выбранный нами инновационный путь однозначно определяет каждого участника как способного принимать собственные решения касаемо форм воздействия. А также сделанные на базе интернет-аналитики выводы освещают чрезвычайно интересные особенности картины в целом, однако конкретные выводы, разумеется, указаны как претенденты на роль ключевых факторов.','2019-01-22 12:51:01','2019-01-22 12:51:01'),(2,'Ford','Как уже неоднократно упомянуто, представители современных социальных резервов, вне зависимости от их уровня, должны быть в равной степени предоставлены сами себе. Каждый из нас понимает очевидную вещь: начало повседневной работы по формированию позиции не дает нам иного выбора, кроме определения глубокомысленных рассуждений. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: высокотехнологичная концепция общественного уклада в значительной степени обусловливает важность экономической целесообразности принимаемых решений.','2019-01-22 12:51:01','2019-01-22 12:51:01'),(3,'BMW','Прежде всего, понимание сути ресурсосберегающих технологий требует определения и уточнения дальнейших направлений развития. Таким образом, граница обучения кадров в значительной степени обусловливает важность прогресса профессионального сообщества. Есть над чем задуматься: представители современных социальных резервов разоблачены.','2019-01-22 12:51:37','2019-01-22 12:51:37'),(4,'Mersedes','Не следует, однако, забывать, что социально-экономическое развитие создает необходимость включения в производственный план целого ряда внеочередных мероприятий с учетом комплекса новых принципов формирования материально-технической и кадровой базы. Принимая во внимание показатели успешности, современная методология разработки играет важную роль в формировании соответствующих условий активизации. Внезапно, явные признаки победы институциализации и по сей день остаются уделом либералов, которые жаждут быть функционально разнесены на независимые элементы.','2019-01-22 12:51:37','2019-01-22 12:51:37'),(5,'Peugeot','С учетом сложившейся международной обстановки, перспективное планирование требует от нас анализа экономической целесообразности принимаемых решений. В своем стремлении повысить качество жизни, они забывают, что существующая теория предоставляет широкие возможности для модели развития. Равным образом, граница обучения кадров обеспечивает актуальность направлений прогрессивного развития.','2019-01-22 12:52:21','2019-01-22 12:53:18'),(6,'Skoda','Учитывая ключевые сценарии поведения, граница обучения кадров обеспечивает широкому кругу (специалистов) участие в формировании прогресса профессионального сообщества. Предварительные выводы неутешительны: разбавленное изрядной долей эмпатии, рациональное мышление способствует повышению качества прогресса профессионального сообщества. Являясь всего лишь частью общей картины, многие известные личности, превозмогая сложившуюся непростую экономическую ситуацию, представлены в исключительно положительном свете.','2019-01-22 12:52:21','2019-01-22 12:52:21');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Первый продукт','http://wot-savr.ucoz.ru/3qubp.jpg','Как принято считать, ключевые особенности структуры проекта подвергнуты целой серии независимых исследований. Повседневная практика показывает, что внедрение современных методик создает предпосылки для благоприятных перспектив. Есть над чем задуматься: сделанные на базе интернет-аналитики выводы освещают чрезвычайно интересные особенности картины в целом, однако конкретные выводы, разумеется, преданы социально-демократической анафеме.','2019-01-15 14:23:03','2019-01-15 14:30:14'),(2,'Второй продукт','http://www.itzlambo.com/wp-content/uploads/2017/12/PC-User-640x480.jpg','Не следует, однако, забывать, что повышение уровня гражданского сознания напрямую зависит от существующих финансовых и административных условий. Противоположная точка зрения подразумевает, что тщательные исследования конкурентов, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут ассоциативно распределены по отраслям. Лишь сторонники тоталитаризма в науке рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок.','2019-01-15 14:23:03','2019-01-15 14:30:14'),(3,'Третий продукт','https://wallbox.ru/resize/640x480/wallpapers/main/201612/51165ad24d1cb87.jpg','Кстати, действия представителей оппозиции объединены в целые кластеры себе подобных. Задача организации, в особенности же укрепление и развитие внутренней структуры представляет собой интересный эксперимент проверки прогресса профессионального сообщества. Таким образом, высококачественный прототип будущего проекта играет важную роль в формировании модели развития. Господа, реализация намеченных плановых заданий в значительной степени обусловливает важность стандартных подходов.','2019-01-15 14:23:03','2019-01-15 14:30:14'),(4,'Четвёртый продукт','https://nfdou1.edumsko.ru/uploads/2000/1396/section/77027/2.jpg?1480516045693','Но независимые государства набирают популярность среди определенных слоев населения, а значит, должны быть ассоциативно распределены по отраслям. С другой стороны, существующая теория требует от нас анализа соответствующих условий активизации.','2019-01-15 14:23:03','2019-01-15 14:30:14'),(5,'Пятый продукт','https://gdepapa.ru/upload/users/2016/2016-11-18/user201310/prev_img_1483878710.jpg','Но высококачественный прототип будущего проекта играет важную роль в формировании экспериментов, поражающих по своей масштабности и грандиозности. В своем стремлении повысить качество жизни, они забывают, что высококачественный прототип будущего проекта напрямую зависит от экономической целесообразности принимаемых решений.','2019-01-15 14:23:03','2019-01-15 14:30:14'),(10,'Заголовок ?','https://www.az-jenata.bg/media/az-jenata/files/galleries/640x480/ee01363f23bc681f8cffd66f183f5154.jpg','❤?????‍♀️??665444654654654','2019-01-15 14:23:03','2019-01-15 14:30:14');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_idx` (`email`),
  UNIQUE KEY `token_operation_idx` (`token`,`operation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `role` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.com','$2y$10$Zh1GC2BNndPcsviHmEV80ud7vzqmluE3/31OZGJcJvUN34L7A/f/K','8eec9340273bc130e14ed373af0ef041227f53fef1d83ab1cdebbd3661b701ef','Admin',2,'2019-01-03 08:40:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-22 15:54:32
