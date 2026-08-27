-- Parasat — структура БД + миграции + стартовые новости
-- Импорт: phpMyAdmin → выбрать базу → Импорт
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS=0;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;
DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `title_kz` varchar(255) DEFAULT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `excerpt_kz` text DEFAULT NULL,
  `excerpt_ru` text DEFAULT NULL,
  `excerpt_en` text DEFAULT NULL,
  `body_kz` longtext DEFAULT NULL,
  `body_ru` longtext DEFAULT NULL,
  `body_en` longtext DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_is_published_published_at_index` (`is_published`,`published_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_08_27_093343_create_news_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES
(1,'no-to-violence-legal-awareness','events','images/parasat/auditorium.jpg','«Зорлық-зомбылыққа жол жоқ»: оқушыларға құқықтық түсіндірме жүргізілді','«Насилию — нет»: правовое просвещение учащихся','«No to Violence»: Legal Awareness Session for Students','«Зорлық-зомбылыққа жол жоқ: құқықтық, жауапкершілік және қорғау тетіктері» тақырыбында түсіндірме жұмыстары жүргізілді. Іс-шараға Шымкент қаласы Абай аудандық полиция басқармасының Ювеналды полиция бөлімінің қызметкері, полиция аға лейтенанты Р. Сматілла қатысты.','В школе прошло мероприятие «Насилию нет: правовая ответственность и механизмы защиты». Участие принял сотрудник ювенальной полиции г. Шымкент, старший лейтенант полиции Р. Сматилла, который провёл разъяснительную работу о видах насилия, включая сталкинг, нарушение личных границ, правовую ответственность и способы защиты своих прав.','A seminar titled \"No to Violence: Legal Responsibility and Protection Mechanisms\" was held at the school. A juvenile police officer from the Abai District Police Department of Shymkent, Senior Lieutenant R. Smatilla, explained types of violence, including stalking, personal boundary violations, legal consequences, and ways to protect one\'s rights.','«Зорлық-зомбылыққа жол жоқ: құқықтық, жауапкершілік және қорғау тетіктері» тақырыбында түсіндірме жұмыстары жүргізілді. Іс-шараға Шымкент қаласы Абай аудандық полиция басқармасының Ювеналды полиция бөлімінің қызметкері, полиция аға лейтенанты Р. Сматілла қатысты.','В школе прошло мероприятие «Насилию нет: правовая ответственность и механизмы защиты». Участие принял сотрудник ювенальной полиции г. Шымкент, старший лейтенант полиции Р. Сматилла, который провёл разъяснительную работу о видах насилия, включая сталкинг, нарушение личных границ, правовую ответственность и способы защиты своих прав.','A seminar titled \"No to Violence: Legal Responsibility and Protection Mechanisms\" was held at the school. A juvenile police officer from the Abai District Police Department of Shymkent, Senior Lieutenant R. Smatilla, explained types of violence, including stalking, personal boundary violations, legal consequences, and ways to protect one\'s rights.',1,'2025-11-15','2026-08-27 09:35:58','2026-08-27 09:35:58'),
(2,'zakladchiki-mat-documentary','events','images/parasat/auditorium2.jpg','«Закладчики Мать» деректі фильмі мектебімізде оқушыларға көрсетілді','В школе показали документальный фильм «Закладчики Мать»','Documentary Film «Zakladchiki Mat» Screened for Students','Қазақстан Республикасы Бас прокуратурасының үйлестіруімен түсірілген «Закладчики Мать» деректі фильмі мектебімізде оқушыларға көрсетілді. Фильм арқылы есірткі қылмысының қоғамға, отбасыға және жеке тұлғаның өміріне тигізетін ауыр зардаптары нақты мысалдар арқылы түсіндірілді.','По координации Генеральной прокуратуры РК в школе был показан документальный фильм «Закладчики Мать». Фильм наглядно показал тяжёлые последствия наркопреступности для общества, семьи и личности, а также правовую ответственность за действия «закладчика».','Coordinated by the General Prosecutor\'s Office of Kazakhstan, the documentary «Zakladchiki Mat» was screened for students. The film illustrated the severe consequences of drug crime for society, families and individuals, as well as the legal responsibility for drug-courier activities.','Қазақстан Республикасы Бас прокуратурасының үйлестіруімен түсірілген «Закладчики Мать» деректі фильмі мектебімізде оқушыларға көрсетілді. Фильм арқылы есірткі қылмысының қоғамға, отбасыға және жеке тұлғаның өміріне тигізетін ауыр зардаптары нақты мысалдар арқылы түсіндірілді.','По координации Генеральной прокуратуры РК в школе был показан документальный фильм «Закладчики Мать». Фильм наглядно показал тяжёлые последствия наркопреступности для общества, семьи и личности, а также правовую ответственность за действия «закладчика».','Coordinated by the General Prosecutor\'s Office of Kazakhstan, the documentary «Zakladchiki Mat» was screened for students. The film illustrated the severe consequences of drug crime for society, families and individuals, as well as the legal responsibility for drug-courier activities.',1,'2025-12-10','2026-08-27 09:35:58','2026-08-27 09:35:58'),
(3,'alim-aibyr-zerde-first-place','achievements','images/parasat/steam_startup.jpg','Алим Айбар «Зерде» республикалық конкурсынан 1-орын алды!','Алим Айбар занял 1-е место на республиканском конкурсе «Зерде»!','Alim Aibyr Wins 1st Place at the Republican «Zerde» Competition!','Алим Айбар Азаматұлы – «Зерде» ғылыми жобалар конкурсының республикалық кезеңінен жүлделі 1 орынды иеленді! Ғылыми жобаның тақырыбы: «SmartEco: автономды экологиялық үй концепциясы». Республикалық кезең «Балдәурен» орталығында өтті (28.01.2026 – 31.01.2026).','Алим Айбар Азаматулы завоевал 1-е место на республиканском этапе конкурса научных проектов «Зерде»! Тема проекта: «SmartEco: концепция автономного экологического дома». Научный руководитель: Бимуратова Бибинур. Республиканский этап прошёл в ДОЦ «Балдаурен», г. Щучинск (28.01–31.01.2026).','Alim Aibyr Azamatuly won 1st place at the republican stage of the «Zerde» science project competition! Project title: \"SmartEco: Concept of an Autonomous Eco-Home\". Scientific supervisor: Bimuratova Bibinur. The republican stage was held at the «Baldauiren» REC in Shchuchinsk (28.01–31.01.2026).','Алим Айбар Азаматұлы – «Зерде» ғылыми жобалар конкурсының республикалық кезеңінен жүлделі 1 орынды иеленді! Ғылыми жобаның тақырыбы: «SmartEco: автономды экологиялық үй концепциясы». Республикалық кезең «Балдәурен» орталығында өтті (28.01.2026 – 31.01.2026).','Алим Айбар Азаматулы завоевал 1-е место на республиканском этапе конкурса научных проектов «Зерде»! Тема проекта: «SmartEco: концепция автономного экологического дома». Научный руководитель: Бимуратова Бибинур. Республиканский этап прошёл в ДОЦ «Балдаурен», г. Щучинск (28.01–31.01.2026).','Alim Aibyr Azamatuly won 1st place at the republican stage of the «Zerde» science project competition! Project title: \"SmartEco: Concept of an Autonomous Eco-Home\". Scientific supervisor: Bimuratova Bibinur. The republican stage was held at the «Baldauiren» REC in Shchuchinsk (28.01–31.01.2026).',1,'2026-01-31','2026-08-27 09:35:58','2026-08-27 09:35:58');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;


SET FOREIGN_KEY_CHECKS=1;
