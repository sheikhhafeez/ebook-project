-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 08:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author_name` varchar(30) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `user_id`, `author_name`, `bio`, `profile_image`) VALUES
(1, 2, 'richard lawther', NULL, NULL),
(2, 3, 'richard herley', NULL, NULL),
(3, 4, 'mike dixon', NULL, NULL),
(4, 5, 'thomas reissmann', NULL, NULL),
(5, 6, 'charles coiro', NULL, NULL),
(6, 7, 'herman melville', NULL, NULL),
(7, 8, 'mike crowson', NULL, NULL),
(8, 9, 'jules verne', NULL, NULL),
(9, 10, 'dai alanye', NULL, NULL),
(10, 11, 'alexander villiers', NULL, NULL),
(11, 12, 'sam vaknum', NULL, NULL),
(12, 13, 'peter c byrnes', NULL, NULL),
(13, 14, 'judith bitterli', NULL, NULL),
(14, 15, 'john M upton', NULL, NULL),
(15, 16, 'dean caldwell', NULL, NULL),
(16, 17, 'samuel crother', NULL, NULL),
(17, 18, 'dotcom infoway', NULL, NULL),
(18, 19, 'john francis kinsella', NULL, NULL),
(19, 20, 'nimitunte', NULL, NULL),
(20, 21, 'lee A. swanson', NULL, NULL),
(21, 22, 'neilwesson', NULL, NULL),
(22, 23, 'lowrypei', NULL, NULL),
(23, 24, 'jeremy tyrrell', NULL, NULL),
(24, 25, 'max patrick schlienger', NULL, NULL),
(25, 26, 'joleene naylor', NULL, NULL),
(26, 27, 'I.purple', NULL, NULL),
(27, 28, 'sagnik mukherjee', NULL, NULL),
(28, 29, 'candyray', NULL, NULL),
(29, 30, 'shaun whittington', NULL, NULL),
(30, 31, 'hasrat arjjumend', NULL, NULL),
(31, 32, 'peter broquet', NULL, NULL),
(32, 33, 'manjunath R.', NULL, NULL),
(33, 34, 'Stephen L. nowland', NULL, NULL),
(34, 35, 'annelte de jonge', NULL, NULL),
(35, 36, 'zahid ahmed', NULL, NULL),
(36, 37, 'William De witthyder', NULL, NULL),
(37, 38, 'mori ogai', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 'The Flint Lord', 'The Flint Lord is a master of fire and earth, wielding the power of the elements to control the battlefield. With unmatched strength and fiery determination, he leads his warriors to victory against any foe.', 'flintlord-herley.jpg', '2025-04-17 19:09:57'),
(2, 'chinese poker John Francis Kinsella', 'Chinese Poker is an exciting card game where players compete to create the best hands across three separate poker hands. Strategic decision-making and hand management are key to winning in this fast-paced game of skill and luck.', 'chinese-poker-kinsella.jpg', '2025-04-17 19:12:16'),
(3, 'The Hollow Bell Sagnik Mukherjee', 'The Hollow Bellndelves into the complexities of human emotions, exploring themes of love, loss, and self-discovery. Through poignant storytelling, Mukherjee crafts a narrative that resonates with the intricacies of the human experience.', 'the-hollow-bell.jpg', '2025-04-17 19:14:11'),
(4, 'Advances in Environmental Law Hasrat Arjjumend', 'Advances in Environmental Law by Hasrat Arjjumend explores the dynamic developments in environmental jurisprudence. It examines critical issues like climate change law, sustainability, and global environmental governance.', 'advances-in-environmental-law.jpg', '2025-04-17 19:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ebook_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `added_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `ebook_id`, `quantity`, `price`, `added_at`) VALUES
(26, 43, 12, 1, 190.00, '2025-04-19 23:28:34'),
(27, 43, 20, 1, 299.00, '2025-04-19 23:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Adventure'),
(2, 'Business'),
(4, 'Horror'),
(3, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `competition_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(14, 'Afghanistan'),
(12, 'Algeria'),
(10, 'Bangladesh'),
(5, 'Egypt'),
(6, 'Indonesia'),
(3, 'Iran'),
(11, 'Iraq'),
(8, 'Jordan'),
(19, 'Kuwait'),
(9, 'Malaysia'),
(13, 'Morocco'),
(18, 'Oman'),
(1, 'Pakistan'),
(20, 'Qatar'),
(2, 'Saudi Arabia'),
(15, 'Sudan'),
(17, 'Syria'),
(4, 'Turkey'),
(7, 'United Arab Emirates'),
(16, 'Yemen');

-- --------------------------------------------------------

--
-- Table structure for table `downloadable_files`
--

CREATE TABLE `downloadable_files` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `ebook_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `is_free` tinyint(1) DEFAULT 0,
  `published_at` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`ebook_id`, `title`, `author_id`, `category_id`, `description`, `language`, `isbn`, `cover_image`, `file_path`, `price`, `is_free`, `published_at`, `created_at`) VALUES
(1, 'The gang of four', 1, 1, 'A radical political faction in China during the Cultural Revolution, the Gang of Four was led by Jiang Qing, Mao Zedong\'s last wife, and included Zhang Chunqiao, Yao Wenyuan, and Wang Hongwen.', 'English', '0-123456-47-9', '1744917769_gang-of-four-lawther.jpg', '1744917769_gang-four-lawther.pdf', 150.00, 0, '2015-06-15', '2025-04-17 12:22:49'),
(2, 'The Flintlord ', 2, 1, '​\"The Flint Lord\" by Richard Herley is a historical fiction novel set in prehistoric Britain. It follows Brennis Gehan, the fifth Lord of Valdoe, who plans to annihilate the nomadic tribes impeding his empire\'s expansion.', 'English', ' 1-234567-89-1', '1744918049_flintlord-herley.jpg', '1744918049_TheFlintLord.pdf', 250.00, 0, '1981-05-16', '2025-04-17 12:27:29'),
(4, 'Invisible drone', 3, 1, 'Petra de Villiers investigates the mysterious disappearance of her father\'s plane, uncovering a conspiracy involving a powerful group known as \"The Cabal', 'English', '2-345678-90-2', '1744918246_invisible-drone.jpg', '1744918246_The-Invisible-Drone.pdf', 290.00, 0, '2017-02-09', '2025-04-17 12:30:46'),
(5, 'journey of coincidence', 4, 1, 'A true tale of adventure and self-discovery, beginning behind the walls of East Germany, leading to a quest for spiritual freedom and adventure in South America', 'English', ' 3-456789-01-3', '1744918403_journey to the.jpg', '1744918403_journey to centre.pdf', 290.00, 0, '2011-01-30', '2025-04-17 12:33:23'),
(6, 'key hole island', 5, 1, '​Keyhole Island is a small, uninhabited rocky islet located in Antarctica, approximately 9 kilometers southeast of the Terra Firma Islands in Mikkelsen Bay, off the west coast of Graham Land. ', 'English', '4-567890-12-4', '1744918649_keyhole-island-charles.jpg', '1744918649_Keyhole-Island.pdf', 320.00, 0, '2012-04-23', '2025-04-17 12:37:29'),
(7, 'Moby dick', 6, 1, ' The story follows Ishmael, a sailor, and his journey with Captain Ahab, who is obsessed with hunting the white whale, Moby Dick', 'English', '5-678901-23-5', '1744918825_moby-dick.jpg', '1744918825_moby-dick-obooko.pdf', 320.00, 0, '1851-10-18', '2025-04-17 12:40:25'),
(8, 'Ring poseidon', 7, 1, '​The Rings of Poseidon by Mike Crowson is a fantasy novel that intertwines archaeology and the occult. The story follows a team of archaeologists led by Afro-Caribbean Alysia Graham, who uncover a remarkably preserved copper ring during an excavation in the Orkney Isles.', 'English', '6-789012-34-6', '1744918996_rings-poseidon-crowson.jpg', '1744918996_RingsPoseidon.pdf', 300.00, 0, '2000-09-01', '2025-04-17 12:43:16'),
(9, 'Under the sea', 8, 1, 'The story follows JoJo and her mother as they relocate from a bustling city reef to Bubbletown, a quaint village beneath the sea. ', 'English', '7-890123-45-7', '1744919149_under the sea.jpg', '1744919149_under-the-sea.pdf', 300.00, 0, '2020-06-23', '2025-04-17 12:45:49'),
(10, 'Time management of mercenaries', 9, 1, 'Time Management of Mercenaries is a tactical guide exploring how elite soldiers for hire balance mission readiness, planning, and recovery. It emphasizes strategic time use in high-risk operations for peak efficiency.', 'English', '8-901234-56-8', '1744919392_time management.jpg', '1744919392_TimeManMercs.pdf', 300.00, 0, '1996-03-30', '2025-04-17 12:49:52'),
(11, 'New day', 10, 1, ' It narrates Jamaica\'s journey from the Morant Bay Rebellion to the 1944 constitution through the eyes of John Campbell, blending Jamaican dialect with English to portray the nation\'s struggle for self-governance.', 'English', '9-012345-67-9', '1744919625_the-new-day.jpg', '1744919625_thenewday.pdf', 290.00, 0, '1949-08-28', '2025-04-17 12:53:45'),
(12, 'Digital Content and Web Technologies', 11, 2, '​Digital Content and Web Technologies by Sam Vaknin is a comprehensive guide exploring the intersection of digital media and web development. It delves into the evolution of web technologies and their impact on content creation and dissemination', 'English', '0-306-40615-2', '1744920049_trendsiters-vaknin.jpg', '1744920049_digitalcontent.pdf', 190.00, 0, '2018-12-05', '2025-04-17 13:00:49'),
(13, 'small business manual', 13, 2, '​The Small Business Owner\'s Manual by Joe Kennedy is a comprehensive guide for entrepreneurs, offering practical advice on starting and managing a business.', 'English', '3-4028-9462-8', '1744920405_small-business-digital-policy-guide.jpg', '1744920405_business-plan-development.pdf', 120.00, 0, '2015-05-15', '2025-04-17 13:06:45'),
(14, 'A tough life', 12, 2, 'A Tough Life by Peter C. Byrnes is a compelling crime thriller that follows Detective Joseph Lind as he navigates personal loss and professional challenges. Set against the backdrop of Australia\'s coastal landscapes', 'English', '4-4028-9462-3', '1744920654_tough-life-byrnes.jpg', '1744920654_tough-life-byrnes.pdf', 300.00, 0, '1851-10-18', '2025-04-17 13:10:54'),
(15, 'lodon bridge', 14, 2, '​London Bridge by John M. Upton is a gripping political thriller that delves into a covert plot aiming to reshape global power structures. ', 'English', '6-395-19395-8', '1744920894_london-bridge-upton.jpg', '1744920894_London-Bridge.pdf', 300.00, 0, '1990-05-16', '2025-04-17 13:14:54'),
(16, 'Penny in for a pound', 15, 2, 'Caught in a spiral of decisions big and small, one penny leads to a price much heavier than expected. Dean Caldwell weaves a tale of consequences, commitment, and the cost of going all in.', 'English', '9-14-044926-3', '1744921309_in-for-penny-caldwell.jpg', '1744921309_InForaPenny-obooko-thr0232.pdf', 300.00, 0, '1993-10-27', '2025-04-17 13:21:49'),
(17, 'Henry ford', 16, 2, 'My Life and Work\" by Henry Ford, co-authored with Samuel Crowther, is an autobiography that highlights Ford\'s journey in founding the Ford Motor Company and revolutionizing mass production', 'English', '10-452-28423-2', '1744921518_henry-ford-my-life-and-work-autobiography.jpg', '1744921518_my-life-and-work-henry-ford.pdf', 300.00, 0, '1999-06-13', '2025-04-17 13:25:18'),
(18, 'Google PPC for small business', 17, 2, 'Google PPC For Small Businesses: A Beginner\'s Guide by Dot Com Infoway is a practical eBook designed to help small business owners navigate the world of pay-per-click (PPC) advertising. It offers a straightforward introduction to Google Ads,', 'English', '11-452-28423-4', '1744921744_google-ppc-beginners-guide.jpg', '1744921744_Google-PPC-Guide.pdf', 300.00, 0, '2023-08-01', '2025-04-17 13:29:04'),
(19, 'Chinese Poker', 18, 2, 'Chinese Poker is a comprehensive guide to the popular card game, focusing on strategy and techniques. It is perfect for beginners looking to understand the fundamentals of 13-card Chinese Poker.', 'English', '12-452-28423-6', '1744921940_chinese-poker-kinsella.jpg', '1744921940_chinese-poker-kinsella.pdf', 310.00, 0, '1998-02-17', '2025-04-17 13:32:20'),
(20, '101 Step to Success', 19, 2, '101 Steps to Success\" is a practical guide offering actionable advice to help individuals achieve their personal and professional goals. The book emphasizes the importance of setting clear objectives and taking consistent action toward success.', 'English', '1230001634464', '1744922196_101success.jpg', '1744922196_obooko_101_Steps_Success.pdf', 299.00, 0, '2017-04-12', '2025-04-17 13:36:36'),
(21, 'Business Plan', 20, 2, 'Business Plan Development Guide\" by Lee A. Swanson is a practical textbook designed to help students and entrepreneurs create effective business plans. It provides step-by-step instructions, templates, and real-world examples to guide users through the planning process', 'English', '978-1-77897-034-4', '1744922381_business-plan-development-guide-swanson.jpg', '1744922381_business-plan-development.pdf', 330.00, 0, '2023-10-11', '2025-04-17 13:39:41'),
(22, 'Echoes', 21, 4, 'Echoes: An Almanac of Ghost Stories\" by Neil Wesson is a collection of eerie tales set in East Yorkshire, England, blending contemporary settings with supernatural elements. Notably, the short story ', 'English', '978-1-4092-9070-6', '1744922661_echoes-wesson.jpg', '1744922661_Echoes-obooko.pdf', 330.00, 0, '2011-11-01', '2025-04-17 13:44:21'),
(23, 'For Adam ', 22, 4, 'For Adam by Lowry Pei is a heartfelt story that explores the complexities of love, identity, and personal growth. Through its characters, the novel delves into deep emotional connections and the journey of self-discovery in the face of life\'s challenges.', 'English', '967-1-4092-9070-3', '1744922924_foradam-pei.jpg', '1744922924_For_Adam.pdf', 290.00, 0, '1897-08-06', '2025-04-17 13:48:44'),
(24, 'Grosvenor Lane Ghost', 23, 4, 'Grosvenor Lane Ghost\" by Jeremy Tyrrell is the first installment in the Paranormology series, blending science fiction and fantasy. The story follows a professor\'s assistant investigating paranormal phenomena,', 'English', '923-1-4092-9070-6', '1744923118_grosvenor-lane-ghost.jpg', '1744923118_grosvenor-lane-ghost.pdf', 170.00, 0, '2020-04-17', '2025-04-17 13:51:58'),
(25, 'Nearly Departed', 24, 4, 'Nearly Departed\" by Max Patrick Schlienger is a humorous paranormal mystery featuring Dennis Gufehautt, a con artist posing as a ghost hunter who encounters a real haunting. ', 'English', '918-1-4092-9070-2', '1744923299_nearly-departed-Schlienger.jpg', '1744923299_Nearly-Departed.pdf', 350.00, 0, '2012-04-12', '2025-04-17 13:54:59'),
(26, 'Tales from the Island', 25, 4, 'Tales from the Island\" by Joleene Naylor is a collection of six short stories that bridge the events between Heart of the Raven and Children of Shadows in the Amaranthine vampire series. The stories follow various characters as they embark on a tropical island vacation,', 'English', '909-1-4092-9070-1', '1744923506_tales-from-the-island.jpg', '1744923506_tales-from-the-island.pdf', 180.00, 0, '2019-09-03', '2025-04-17 13:58:26'),
(27, 'The Compass', 26, 4, '​\"Compass\" by Mathias Énard is a lyrical exploration of East-West cultural intersections, narrated by Franz Ritter, an Austrian musicologist reflecting on his life and unrequited love during a sleepless night in Vienna.', 'English', ' 9780811226622', '1744923752_the-compass-purple.jpg', '1744923752_The-Compass.pdf', 320.00, 0, '2015-06-08', '2025-04-17 14:02:32'),
(28, 'The Hollow Bell', 27, 4, 'The Hollow Bell\" by Sagnik Mukherjee is a poignant narrative that delves into the complexities of human emotions and relationships. Through evocative storytelling, the author explores themes of love, loss, and self-discovery, leaving readers with a profound sense of introspection.', 'English', ' 9740811226623', '1744924064_the-hollow-bell.jpg', '1744924064_the-hollow-bell.pdf', 360.00, 0, '1999-09-19', '2025-04-17 14:07:44'),
(29, 'The rescue circle', 28, 4, '​The Rescue Circle by Candy Ray is a fantasy novella that follows Ryan, a young magician from an English magical lodge, who embarks on a perilous journey to the next world to become a psychopomp. Unprepared for the challenges he faces, including a time tunnel created by an angry soldier', 'English', ' 2940155068051​', '1744924227_the-rescue-circle.jpg', '1744924227_the-rescue-circle-ray.pdf', 290.00, 0, '2017-12-21', '2025-04-17 14:10:27'),
(30, 'What the dead fear', 29, 4, 'What the Dead Fear by Lea Ryan is a paranormal novella that follows Juniper Townsend, a 22-year-old who dies of carbon monoxide poisoning and finds herself in Limbo—a foggy, eerie realm between life and death', 'English', '9781458138088​', '1744924418_what-the-dead-fear.jpg', '1744924418_WhatDeadFear.pdf', 300.00, 0, '2011-02-23', '2025-04-17 14:13:38'),
(31, 'Wood red hill', 30, 4, '​The Woods of Red Hill by Shaun Whittington is a horror novel set in the quiet town of Ridgeware, where newcomer Gary Strand uncovers chilling legends about a local killer known as \"Killer Kelly', 'English', '9751458138078', '1744924657_woods-red-hill-whittington.jpg', '1744924657_WoodsRedHill.pdf', 279.00, 0, '2013-05-23', '2025-04-17 14:17:37'),
(32, 'Environmental law', 31, 3, 'Environmental Law\" by Stuart Bell, Donald McGillivray, and Ole Pedersen is a comprehensive textbook that provides an in-depth analysis of environmental legislation, policy, and regulation', 'English', ' 9780198748328', '1744925208_advances-in-environmental-law.jpg', '1744925208_advances-in-environmental-law.pdf', 290.00, 0, '2019-08-15', '2025-04-17 14:26:48'),
(33, 'Ben zero', 32, 3, '\"Ben Zero\" follows a solitary hacker who uncovers a digital conspiracy threatening the core of global security. As he races against time, his code becomes the only weapon that can rewrite the fate of the world.', 'English', ' 9780198748300', '1744925405_ben-zero-cloudclipper-broquet.jpg', '1744925405_BenZero1.pdf', 160.00, 0, '1997-04-27', '2025-04-17 14:30:05'),
(35, 'mathematical Universe ', 33, 3, '\"Mathematical Universe: Our Search for the Ultimate Nature of Reality\" by Manjunath R. is a thought-provoking exploration of how mathematics underpins the fabric of our cosmos. The book delves into profound questions about whether mathematics is a human invention or a fundamental aspect of reality', 'English', ' 9760198748234', '1744925716_mathematical-universe-manjunath.jpg', '1744925716_the-mathematical-universe.pdf', 250.00, 0, '2021-08-07', '2025-04-17 14:35:16'),
(36, 'Nature Abhors Vaccum', 34, 3, '\"Nature Abhors a Vacuum\" explores the voids—both literal and metaphorical—that shape human experience and the natural world. With philosophical insight, it reflects on how emptiness influences science, society, and the self.', 'English', ' 9730198748255', '1744925875_nature-abhors-vacuum-stephen-nowland.jpg', '1744925875_NatureAbhorsVacuum.pdf', 345.00, 0, '0000-00-00', '2025-04-17 14:37:55'),
(37, 'Nature Spirit', 35, 3, '​\"Insights into Nature Spirits and Earth Energies\" by Annette de Jonge is a spiritual exploration that delves into the unseen realms of nature, offering guidance on connecting with elemental beings and understanding the energies of the Earth', 'English', ' 9710198748100', '1744926121_nature-spirits-and-earth.jpg', '1744926121_nature-spirits-and-earth-energies.pdf', 180.00, 0, '2011-02-20', '2025-04-17 14:42:01'),
(38, 'Stolen Coin', 36, 3, '\"The Stolen Coin and Other Short Stories\" by Zahid Ahmed is a collection of nine compelling tales, each delving into the complexities of human nature, particularly focusing on themes of kleptomania and youthful misadventures. The stories are narrated from the perspective of a young boy or teenager, ', 'English', ' 9710198748300', '1744926304_stolen-coin-and-other-stories-ahmed.jpg', '1744926304_The-Stolen-Coin.pdf', 110.00, 0, '2010-04-27', '2025-04-17 14:45:04'),
(39, 'The Five Great Philosophies', 37, 3, '​\"The Five Great Philosophies of Life\" by William De Witt Hyde explores five major philosophical traditions that have shaped human thought and action: Epicureanism, Stoicism, Platonism, Aristotelianism, and Christianity. Hyde examines each philosophy\'s core principles and their implications for personal development and ethical living', 'English', ' 9780790503769', '1744926523_the-five-great-philosophies-of-life.jpg', '1744926523_the-five-great-philosophies-of-life.pdf', 320.00, 0, '1992-04-22', '2025-04-17 14:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `total_amount`, `status`) VALUES
(1, 42, '2025-04-19 02:06:36', 910.00, 'pending'),
(2, 42, '2025-04-19 02:14:41', 910.00, 'pending'),
(3, 42, '2025-04-19 02:16:19', 290.00, 'pending'),
(4, 42, '2025-04-19 02:23:06', 300.00, 'pending'),
(5, 42, '2025-04-19 02:53:55', 590.00, 'pending'),
(6, 43, '2025-04-19 12:14:28', 190.00, 'pending'),
(7, 43, '2025-04-19 23:17:43', 350.00, 'pending'),
(8, 43, '2025-04-19 23:23:15', 110.00, 'pending'),
(9, 43, '2025-04-19 23:28:24', 680.00, 'pending'),
(10, 43, '2025-04-19 23:44:59', 190.00, 'pending'),
(11, 43, '2025-04-19 23:50:18', 489.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ebook_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `ebook_id`, `price`, `quantity`) VALUES
(1, 1, 39, 320.00, 1),
(2, 1, 4, 290.00, 1),
(3, 1, 17, 300.00, 1),
(4, 2, 39, 320.00, 1),
(5, 2, 4, 290.00, 1),
(6, 2, 17, 300.00, 1),
(7, 3, 4, 290.00, 1),
(8, 4, 16, 300.00, 1),
(9, 5, 16, 300.00, 1),
(10, 5, 4, 290.00, 1),
(11, 6, 12, 190.00, 1),
(12, 7, 25, 350.00, 1),
(13, 8, 38, 110.00, 1),
(14, 9, 6, 320.00, 1),
(15, 9, 28, 360.00, 1),
(16, 10, 12, 190.00, 1),
(17, 11, 12, 190.00, 1),
(18, 11, 20, 299.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ebook_id` int(11) DEFAULT NULL,
  `purchase_date` datetime DEFAULT current_timestamp(),
  `amount_paid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `ebook_id`, `purchase_date`, `amount_paid`) VALUES
(1, 42, 39, '2025-04-19 02:14:41', 320.00),
(2, 42, 4, '2025-04-19 02:14:41', 290.00),
(3, 42, 17, '2025-04-19 02:14:41', 300.00),
(4, 42, 4, '2025-04-19 02:16:19', 290.00),
(5, 42, 16, '2025-04-19 02:23:06', 300.00),
(6, 42, 16, '2025-04-19 02:53:55', 300.00),
(7, 42, 4, '2025-04-19 02:53:55', 290.00),
(8, 43, 12, '2025-04-19 12:14:28', 190.00),
(9, 43, 25, '2025-04-19 23:17:43', 350.00),
(10, 43, 38, '2025-04-19 23:23:15', 110.00),
(11, 43, 6, '2025-04-19 23:28:24', 320.00),
(12, 43, 28, '2025-04-19 23:28:24', 360.00),
(13, 43, 12, '2025-04-19 23:44:59', 190.00),
(14, 43, 12, '2025-04-19 23:50:18', 190.00),
(15, 43, 20, '2025-04-19 23:50:18', 299.00);

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `reader_id` int(11) NOT NULL,
  `reader_name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`reader_id`, `reader_name`, `phone`, `address`, `country_id`, `profile_image`, `user_id`, `created_at`) VALUES
(1, 'Inaya', '12345678', 'clifton', 1, '1745004984_inaaya.avif', 42, '2025-04-18 19:36:24'),
(2, 'zaviyar', '12345988', 'North Nazimabad', 1, '1745080191_zaviyar.jpg', 43, '2025-04-19 16:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ebook_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `reviewed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Author'),
(3, 'Reader');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `created_at`) VALUES
(1, 'superadmin@example.com', 'd1e576b71ccef5978d221fadf4f0e289', 1, '2025-04-17 18:39:24'),
(2, 'richard@gmail.com', '$2y$10$ff.36ICbRVx9keJeEpFVP.jn5qqIsUAf0qfd21Gv1Gm7BFCPzegTi', 2, '2025-04-17 18:46:46'),
(3, 'herley@gmail.com', '$2y$10$f7hSJXzpgilN2czM5RhefOOuo8iYs48mjV/lkX7JP24Av8tKIBNRC', 2, '2025-04-17 18:48:03'),
(4, 'mike@gmail.com', '$2y$10$53deF.4bpamBHA82zZ5zhuygUFeyTG3.CRt4.W2az8Y4k7eag1f7a', 2, '2025-04-17 18:48:27'),
(5, 'thomas@gmail.com', '$2y$10$lVzJ75SJvzn068Of7.//8uHgQ/HV8rRoruvu35mzFg7aB8X8BA35W', 2, '2025-04-17 18:49:00'),
(6, 'charles@gmail.com', '$2y$10$R2qFuURxLiRbOBOB8dGoNuKG0im/PMraepOdkai.jNtv746z4D87q', 2, '2025-04-17 18:49:25'),
(7, 'herman@gmail.com', '$2y$10$YY3OCgMWDtN4UEy.f4gwseChpEnb27tc2Cz6qWIHR9LnMm7CLX2ve', 2, '2025-04-17 18:49:53'),
(8, 'crowson@gmail.com', '$2y$10$FyHd5Do19iS7R5BIUd6jC.BtQqx8Ifk7g9e6EA8i/D4OY/KfBVdly', 2, '2025-04-17 18:50:18'),
(9, 'jules@gmail.com', '$2y$10$8/zBRKkACjBQKSMxeKuNOegv18VSQym67VbBIeMmHlELXrrrNd2z.', 2, '2025-04-17 18:50:41'),
(10, 'dai@gmail.com', '$2y$10$nmEoRKhLTv.bgk0XJMMkD.7C6yZlHMBaY1btOM3J./WsDxDGefBLW', 2, '2025-04-17 18:51:05'),
(11, 'alexander@gmail.com', '$2y$10$Ig1VXAyL1u5tCU4S/kAonOWroEI1STfHEID9Lfx2ZlXQvAmL5Li5W', 2, '2025-04-17 18:51:37'),
(12, 'samvaknum@gmail.com', '$2y$10$EPiVMZizcZOqTEdiv/Y/KuDr3.LyuiM2sx/ojdfWOf3HUsW6ov61q', 2, '2025-04-17 18:52:34'),
(13, 'peter@gmail.com', '$2y$10$E9vd4CXbbNDWS/oiGi210eHs8sxPVAYEeEFtGmSYw7Iufzkx.Mp.u', 2, '2025-04-17 18:53:10'),
(14, 'judith@gmail.com', '$2y$10$o7FF2HyOhcZVdOclkBscfu/IddbOgjJIcfZgSXESlGK9HoKr2.K7e', 2, '2025-04-17 18:53:36'),
(15, 'johnupton@gmail.com', '$2y$10$6s0YgW43emme77QWaB9yDuTTdE4TnSKeIQjpNb3QCIOgiavYZg/jK', 2, '2025-04-17 18:54:01'),
(16, 'dean@gmail.com', '$2y$10$VLrJMPjiy2HQfScS.wpOOOXmzLcTfy84NdOHfvpjIXp7Qu6k1bg8.', 2, '2025-04-17 18:54:29'),
(17, 'samuel@gmail.com', '$2y$10$M/noyPsuWEg9rrDdkIDOtOHHqhcPeJG.HM.YlD3qpFPEjJnfC2zg6', 2, '2025-04-17 18:54:49'),
(18, 'dotcom@gmail.com', '$2y$10$jtYP0gaM039AZSNhpt1O6ODyhT4uP1ZWBIlnCbbfZiHYeTBMhO/KS', 2, '2025-04-17 18:55:19'),
(19, 'johnfrancis@gmail.com', '$2y$10$RRa06jxW.4QHePEth1GDMuAmdgsBE.Lmr1t5sT3ZWIihz13EDDMmy', 2, '2025-04-17 18:55:53'),
(20, 'nimitunte@gmail.com', '$2y$10$GU2OyeRvtevAqmdXwpXg8edGw4cACQZVSOmwy61pzbXSOl7j5iaqG', 2, '2025-04-17 18:56:22'),
(21, 'swanson@gmail.com', '$2y$10$ZrZKeAMnrIy62DkwI5e/we91D/oDadH3.NgF67kPA3iV18pD5VQUO', 2, '2025-04-17 18:56:55'),
(22, 'neilwesson@gmail.com', '$2y$10$66iBY1TOiMbWPcaQn9xM3.SwqkOZwZlRHOjkyAZHrwFyJMEOAMo3u', 2, '2025-04-17 18:57:45'),
(23, 'lowrypei@gmail.com', '$2y$10$doQ51fdHy.wjud0Bf/ly5.wFbYnUX4Bg3YpOAzOGDzffeR7.dmYgG', 2, '2025-04-17 18:58:05'),
(24, 'jeremy@gmail.com', '$2y$10$bnRZkf62/cVKLkVuxwQa.udwR1dubK02GrpksMf8U8N1QhvGZlXPW', 2, '2025-04-17 18:58:33'),
(25, 'maxpatrick@gmail.com', '$2y$10$VkMWzdtldNBb2zN3jKNLmeQfOkb3qllKUKxOeNtXgkqLoerAsCjFe', 2, '2025-04-17 18:59:11'),
(26, 'joleene@gmail.com', '$2y$10$rda5i1i6UGOWCmWQ4xv9iekB0vgM9wvBibQ.PM.U8X5nvsmicOi2K', 2, '2025-04-17 18:59:41'),
(27, 'ipurple@gmail.com', '$2y$10$Ea0ziL9sejtKltilxvnH7egPut2wNY0AR.nZbCkTbUnF7x2Z6ZFj.', 2, '2025-04-17 19:00:09'),
(28, 'sagnik@gmail.com', '$2y$10$RtgSk.BQIaOpqPIVW0KqTu3rsGuGFb9Um2Dm7M9PiscSUiZZpRlTq', 2, '2025-04-17 19:00:52'),
(29, 'candyray@gmail.com', '$2y$10$8nKlCn0F/PkfnT7Lwd2JlOluTx/g4E.WmIywRpCJywSSW0x/Io6VW', 2, '2025-04-17 19:01:13'),
(30, 'whittington@gmail.com', '$2y$10$mjXJyFLMsNyW/SFt9H1.Ge/nvYA1.Zn0/ap14Dy5KAlNHznFHdDlm', 2, '2025-04-17 19:01:58'),
(31, 'arjjumend@gmail.com', '$2y$10$0MFv7LZmBoE6AtO8bBTfvOviaIdDmMot/Vp5oEh2n8M6ltg71qDM6', 2, '2025-04-17 19:02:52'),
(32, 'broquet@gmail.com', '$2y$10$Q26/9UAWz8vWWHtQlRzeA.J.xdZskZioT47A5uUfDz.xNMLdjEaYy', 2, '2025-04-17 19:03:22'),
(33, 'manjunath@gmail.com', '$2y$10$Ze3npaw/.ZsCahzziI8mSO4uXNbW.FXEHtI3JtvUxtCPRY8K.PErK', 2, '2025-04-17 19:03:58'),
(34, 'Stephen@gmail.com', '$2y$10$4tw3G1IiqtZlHk9Fdas2ceO6cAx.xc3LXMDhI0OOpJKpasJ0JY6qm', 2, '2025-04-17 19:04:31'),
(35, 'annelte@gmail.com', '$2y$10$t51WjcDJzPmXVRROEnB7kuXKbdwkDtQBj1C5uc1qXX5rq7mu6HjJ.', 2, '2025-04-17 19:05:07'),
(36, 'zahid@gmail.com', '$2y$10$uj9luFVlp0SLliyCqt1vX.Y9f8oLD56Xi0w3f35pirJAONT3DDv96', 2, '2025-04-17 19:05:32'),
(37, 'William@gmail.com', '$2y$10$x56kZHPkUlPgjnO5wOnmWeVhUvtXTFx7ecg0wstmEYQir86ge6Rte', 2, '2025-04-17 19:06:01'),
(38, 'moriogai@gmail.com', '$2y$10$Kylb5fSrnFkrF0y1zZ/AWuAZvVSqXSzc7j.3/8OutQJ4fsKX73LTS', 2, '2025-04-17 19:06:31'),
(42, 'inaya@hotmail.com', '$2y$10$za6pQsQK0NerVsD5Z6.9EupqVjc8Gc5DB3TiC.9TkVnFdhJmHDObW', 3, '2025-04-18 19:36:24'),
(43, 'zaviyar@gmail.com', '$2y$10$VwNIHiMcfjdFqpifXGfk4uIfEmzsgP8otJWE8w9DM9i2Lx6sKqMRq', 3, '2025-04-19 16:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `winner_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL CHECK (`position` between 1 and 3),
  `prize` varchar(255) DEFAULT NULL,
  `declared_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ebook_id` (`ebook_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`competition_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `downloadable_files`
--
ALTER TABLE `downloadable_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`ebook_id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `ebook_id` (`ebook_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ebook_id` (`ebook_id`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`reader_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ebook_id` (`ebook_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`winner_id`),
  ADD KEY `competition_id` (`competition_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `competition_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `downloadable_files`
--
ALTER TABLE `downloadable_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `ebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `reader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `winner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`ebook_id`);

--
-- Constraints for table `downloadable_files`
--
ALTER TABLE `downloadable_files`
  ADD CONSTRAINT `downloadable_files_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD CONSTRAINT `ebooks_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `ebooks_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`ebook_id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`ebook_id`);

--
-- Constraints for table `reader`
--
ALTER TABLE `reader`
  ADD CONSTRAINT `reader_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reader_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`ebook_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`competition_id`),
  ADD CONSTRAINT `winners_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
