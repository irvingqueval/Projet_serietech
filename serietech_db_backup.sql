-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: serietech_db
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'comedy'),(2,'dramatic'),(3,'police officer'),(4,'judicial'),(5,'medical'),(6,'policy'),(7,'action/adventure'),(8,'fantasy and science fiction'),(9,'sports series'),(10,'historical series'),(11,'yourth'),(12,'horror');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serie`
--

DROP TABLE IF EXISTS `serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `numberOfSeasons` int DEFAULT NULL,
  `synopsis` text,
  `image_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serie`
--

LOCK TABLES `serie` WRITE;
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` VALUES (1,'Teen Wolf',6,'One night, Scott McCall, a young high school lacrosse player at Beacon Hills High School in California , is walking in the woods looking for half of a corpse with his best friend Stiles Stilinski and is attacked by a huge wild beast. He escapes with a bite to the abdomen , but he soon discovers that he has become a werewolf . From then on, he must find a balance between his new identity and the many dangers it presents to his life as a teenager. Throughout the seasons, he strives to protect those close to him as well as learn more about his werewolf condition and the mysteries that surround it.','/image/teenWolf.webp'),(2,'Supernatural',15,'Two brothers, Sam and Dean Winchester are hunters of supernatural creatures. They travel across the United States in a black 1967 Chevrolet Impala to investigate paranormal phenomena (often from folklore, superstitions, myths and American urban legends, but also supernatural monsters such as ghosts , werewolves , demons , vampires ... ).\n\nThey also hope to get their hands on the demon responsible for their mother\'s death 22 years earlier, which they call \"the demon with yellow eyes\".','https://m.media-amazon.com/images/I/815aonvLheL._AC_SX679_.jpg'),(3,'The Walking Dead',11,'The series begins after the ravages of an apocalypse caused by a virus that turns infected humans into zombies . The latter are called \"walkers\" by most of the last survivors and relentlessly pursue the last human beings still alive in order to devour them, attracted by their blood or loud noises such as gunshots.\n\nThe story follows Rick Grimes (played by Andrew Lincoln ), a deputy sheriff of Kings County, Georgia . He wakes up from a weeks-long coma to discover that the population has been ravaged by an unknown epidemic that transforms humans into undead , called \"walkers\". After reuniting with his family, he quickly becomes the leader of a group of survivors from Atlanta . They are forced to survive in a post-apocalyptic world , facing walkers and other groups of survivors, some even more dangerous than the walkers themselves. Together, they must face a world that has become unrecognizable as best they can, during their journey through the deep south of the United States.\n\n','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(4,'Breaking Bad',5,'Walter \"Walt\" White is a high school chemistry teacher living in Albuquerque , New Mexico , with his physically disabled son and pregnant wife. The day after his fiftieth birthday, he is diagnosed with terminal lung cancer and has an estimated life expectancy of two years. Everything falls apart for him. He decides to set up a methamphetamine lab and operation to ensure a comfortable financial future for his family after his death, teaming up with Jesse Pinkman , one of his former students who has become a small-time dealer.','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(5,'Vikings',6,'Ragnar Lothbrok and his brother Rollo participate in a battle against the Baltic peoples. After the massacre, Ragnar has visions of the god Odin and his Valkyries . Back in his village, Ragnar travels, accompanied by his son Björn, to Kattegat to witness the Thing and for the latter to undergo his rite of passage into adulthood. Left behind at the family farm, Ragnar\'s wife, Lagertha, puts to flight two vagabonds who attempt to rape her. In Kattegat, Ragnar convinces Rollo that raids to the west are more promising in terms of loot than traditional attacks on the Baltic populations. He claims that he is able to find his course on the open sea thanks to an instrument he obtained from a traveler, a navigation compass . However, he is reprimanded and threatened by his clan leader, Earl Haraldson, who does not believe in the presence of lands to the west and wishes to continue his raids to the east. Björn and Ragnar visit Floki, a visionary shipwright who, with the financial support of his friend Ragnar, has secretly undertaken the construction of a new type of ship, better suited to sailing on the high seas. The first sea trials are very promising. While Ragnar recruits men, his brother Rollo makes unwelcome advances to Lagertha. The ship being ready, Ragnar sets sail west, towards the unknown, while Earl Haraldson, informed by a traitor, begins to take revenge on those who helped Ragnar mount his expedition.','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(6,'Lucifer',6,'Tired of being the \"Lord of Hell\", Lucifer Morningstar abandons his kingdom and goes to Los Angeles where he owns a nightclub called \"The Lux\". Lucifer has been given the gift of forcing people to reveal their deepest desires. One night, Lucifer witnesses the murder of a pop singer in front of his club. He decides to go in search of the culprit and crosses paths with a policewoman named Chloe Decker who resists his gift and puts obstacles in his way.\n\nWhile Lucifer Morningstar and Chloe Decker team up to find the killer, God sends the angel Amenadiel to Earth to convince Lucifer to return to rule Hell again. But he fails.','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(7,'SWAT',7,'Daniel Harrelson, nicknamed Hondo, is a sergeant of the SWAT ( Special Weapons And Tactics ) of Los Angeles . On a daily basis, he is torn between his modest origins and his duty to his teammates. His childhood friends have not turned out as well as him. He is tasked with putting together a qualified unit to solve the crimes of the city 3 .','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(8,'Suits: Tailor-made lawyers',9,'Mike Ross is a brilliant young man whose childhood dream was to become a lawyer, a dream shattered after unforeseen circumstances forced him to drop out of school. Intelligent and gifted with an eidetic memory , Mike supports himself by taking exams for other people, particularly law exams.\n\nHarvey Specter is one of the best lawyers in New York , who has just been promoted to the Pearson Hardman law firm: he is then required to hire an assistant. Based on a misunderstanding, Harvey interviews Mike. He is particularly impressed by the young man\'s qualities and hires him. Since Mike does not have a law degree while the Pearson Hardman firm exclusively hires Harvard graduates , both decide to lie and claim that Mike is a former student of the school, even if this exposes them to legal action if the truth is discovered.\n\nUpon his arrival at the firm, Mike is continually harassed by Louis Litt, a rival of Harvey who seems to doubt his credentials. However, he can count on the friendship of Rachel Zane, a legal assistant too anxious to pass the bar exam, with whom he develops a complicity.','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(9,'House of Cards',6,'Francis Underwood , known as \"Frank\", coordinator of the Democratic majority in the American Congress and representative of the State of South Carolina , celebrates the election of President Garret Walker, whom he contributed to electing in a decisive way. In return, Walker agrees to appoint Francis as Secretary of State in his cabinet, (the equivalent of the Minister of Foreign Affairs in France. However, shortly before the inauguration of the president-elect, the chief of staff , Linda Vasquez, announces to him that Walker does not intend to honor his promise. Furious, Underwood and his wife Claire , who was counting on her husband\'s appointment to develop her environmental NGO , join forces to destroy those who oppose their projects.\n\nFrank Underwood then presents himself as a loyalist of the president while in reality he secretly begins to develop a plan to take revenge and achieve his ends. To do this, he has two aces up his sleeve: the representative of Pennsylvania , Peter Russo, manipulable because of a dissolute private life, and the young and ambitious Zoe Barnes, who works at the Washington Herald , and who is hungry to succeed in journalism. Frank Underwood is a manipulator devoid of the slightest scruples: all that matters to him is his conquest of the heights of power.\n\nFrank\'s wife Claire Underwood runs an NGO, the Clean Water Initiative, which draws him into the political arena through lobbying . Claire shares her husband\'s ruthless pragmatism, ambition and lust for power and, although both are very independent, work together to expand their influence.\n\nOn many occasions, the main character uses aside :  he regularly addresses the viewer while looking at the camera, thus breaking the fourth wall . This device allows him to expose his ideas or to make the viewer guess them.','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(10,'Peaky Blinders',6,'Based on the story of the Peaky Blinders gang , active at the end of the 19th century  , this series follows a group of Birmingham gangsters from 1919. This gang, led by the ambitious and dangerous Thomas Shelby and formed by his siblings, practices racketeering, protection, smuggling alcohol and tobacco and illegal betting. A theft of automatic weapons, of which they are the first suspected, pushes Winston Churchill to dispatch Chief Inspector Chester Campbell, an officer of the Royal Irish Constabulary and a fan of expeditious methods.','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE'),(11,'Cobra Kai\n',6,'Johnny Lawrence is now in his fifties and adrift. He now lives in the Reseda neighborhood , far from the luxury of Encino where he lived with his tyrannical stepfather, Sid Weinberg. Johnny had a son, Robbie, with Shannon Keene, his girlfriend at the time. But he abandoned them both on the day of his birth, which coincides with the death of his mother, Laura.\n\nAfter losing his job, Johnny attempts to reopen the Cobra Kai karate dojo . In doing so, he rekindles his rivalry with Daniel LaRusso, who has succeeded in business but struggles to maintain balance in his life without the guidance of his mentor, Mr. Miyagi. Daniel is married to Amanda with whom he has two children: Samantha and Anthony.\n\nBoth men face the demons of the past and the frustrations of the present in the only way they know how: martial arts, and more specifically karate .','https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.reddit.com%2Fr%2FTeenWolf%2Fcomments%2Fsrsfss%2Fmade_this_poster_last_week_when_finished%2F%3Ftl%3Dfr&psig=AOvVaw2MsAZ7BYYZbXCDPW3r2pKp&ust=1721145933986000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCIj-sLW2qYcDFQAAAAAdAAAAABAE');
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serie_category`
--

DROP TABLE IF EXISTS `serie_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serie_category` (
  `serie_ID` int NULL,
  `cat_ID` int NULL,
  KEY `cat_ID` (`cat_ID`),
  CONSTRAINT `serie_category_ibfk_1` FOREIGN KEY (`serie_ID`) REFERENCES `serie` (`id`) ON DELETE SET NULL,
  CONSTRAINT `serie_category_ibfk_2` FOREIGN KEY (`cat_ID`) REFERENCES `category` (`id`) ON DELETE SET NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serie_category`
--

LOCK TABLES `serie_category` WRITE;
/*!40000 ALTER TABLE `serie_category` DISABLE KEYS */;
INSERT INTO `serie_category` VALUES (1,1),(4,1),(6,1),(8,1),(11,1),(1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(2,3),(4,3),(6,3),(7,3),(8,3),(9,3),(10,3),(8,4),(9,6),(1,7),(2,7),(3,7),(5,7),(6,7),(7,7),(10,7),(11,7),(1,8),(2,8),(3,8),(6,8),(11,9),(5,10),(10,10),(1,12),(2,12),(3,12);
/*!40000 ALTER TABLE `serie_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-16 12:00:55
