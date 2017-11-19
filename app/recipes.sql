# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19-0ubuntu0.16.04.1)
# Database: homestead
# Generation Time: 2017-11-19 13:59:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table email
# ------------------------------------------------------------

DROP TABLE IF EXISTS `email`;

CREATE TABLE `email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_10_13_120749_create_recipe_table',1),
	(4,'2017_11_18_150332_create_email_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table recipe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipe`;

CREATE TABLE `recipe` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calories` int(11) DEFAULT '0',
  `protein` int(11) NOT NULL DEFAULT '0',
  `carbs` int(11) NOT NULL DEFAULT '0',
  `fat` int(11) NOT NULL DEFAULT '0',
  `fiber` int(11) NOT NULL DEFAULT '0',
  `sugar` int(11) NOT NULL DEFAULT '0',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `notes` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;

INSERT INTO `recipe` (`id`, `title`, `cost`, `time`, `description`, `ingredients`, `instructions`, `created_at`, `updated_at`, `slug`, `category`, `calories`, `protein`, `carbs`, `fat`, `fiber`, `sugar`, `img`, `score`, `notes`)
VALUES
	(1,'Muesli with Berries',1.23,'Less than 5 minutes','Crunchy and delicious, muesli is a great way to start the day. Just be wary of selecting a brand with too much sugar.','3/4 cup muesli, 1/2 cup berries, 1/2 cup soy yogurt, 2 teaspoons chia seeds','Put it all in a bowl, stir and enjoy!','2017-10-23 13:34:51','2017-10-23 13:34:51','muesli-berries','breakfasts',472,18,84,11,9,38,'',4,'Instead of Soy Yogurt, add any of these other vegan dairy substitutes; Be careful when purchasing museli, as certain brands are packed with artificial ingredients and sugars that may significantly deteriorate the nutritional content of this meal; Feel fre'),
	(2,'Oatmeal ',3.45,'5-10 minutes','Perfect for a cold winter\'s morning, oatmeal keeps you full with plenty of natural fibers and adding fresh fruits provides plenty of taste','3/4 cup oatmeal, 1/2 cup mixed berries, 1/4 cup almond milk, teaspoon of cinnamon','Bring 1.5 cups of water to a boil; add the oatmeal and stir occasionally; when it reaches your desired thickness, top with berries','2017-10-24 07:56:05','2017-10-24 07:56:05','oatmeal','breakfasts',470,17,73,14,20,8,'',8,NULL),
	(3,'Avocado on Toast',1.23,'Less than 5 minutes','Plenty of healthy fats in this one, but the lack of total calories may leave you with some mid-morning hunger','2 slices whole grain bread, 1/2 avocado, 1 tomato','Toast the bread; top with slices of avocado and tomato','2017-10-26 12:11:00','2017-10-26 12:11:00','avocado-toast','breakfasts',414,14,81,17,12,14,'',6,NULL),
	(4,'Oatmeal Protein Smoothie',1.23,'Less than 5 minutes','This smoothie contains plenty of whole grains and protien, perfect for keeping you full until lunch','1/2 cup oatmeal, 1/2 cup almond milk, 1/2 cup water, 1/4 cup berries, 1 scoop vegan protein powder','Put it all in a blender and spin for 60 seconds or until liquid','2017-10-26 12:10:31','2017-10-26 12:10:35','protein-smoothie','breakfasts',420,30,64,8,10,12,'',9,NULL),
	(5,'Mexican Burrito Bowl',1.23,'20-25 minutes','As a vegan it can be difficult to find satisfying mexican food, but this recipe will satisfy your cravings','1 onion, 1 pepper, 1/2 cup mushrooms, 200g black beans, 200g corn, 1 cup lettuce, 2 tomatoes, 1/2 avocado, 1/2 lime','cook the onions and peppers in a pan for 5 minutes; add the beans and corn and cook for another 5 minutes; top the lettuce with the mixture and add the diced tomato, avocado, and a dash of lime juice','2017-10-27 09:58:49','2017-10-27 09:58:49','burrito-bowl','bowls',580,22,95,13,27,27,'',7,'Most of the carbs come from the black beans and the corn'),
	(6,'Falafel Bowl',1.23,'15-20 minutes','Middle Eastern cuisine lends itself naturally to a vegan diet, and this dish takes full advantage of that','1/3 cup couscous, 300g falafel, 1 bell pepper, 1/2 cucumber, 2 tomatoes, sprig of mint, 1/4 cup soy yogurt','Cook the falafel in a pan on medium-high heat for 5-7 minutes, stirring occassionally; place the couscous in a bowl with boiling water and let it sit for 5 minutes with the lid on, chop the vegetables; add all the ingredients together; top with soy yogurt','2017-10-27 09:58:13','2017-10-27 09:58:13','falafel-bowl','bowls',614,22,96,13,10,15,'',8,'Most of the calories come from the couscous and the falafel'),
	(7,'Fall Harvest Bowl',1.23,'20-25 minutes','Delicious both warm for dinner or prepared for leftovers the next day, this bowl incorporates plenty of seasonal vegetables and is extremely flexible: swap out whatever looks fresh from your local produce!','1/3 cup quinoa, 200g chickpeas, 2 cups kale, 1 cup chopped carrots, 1cup red cabbage, 1/2 avocado','Bring a cup of water to a boil, add the quinoa and let simmer for 20 minutes; Meanwhile, slice the carrots and add to a pan to let cook for 7-8 minutes; Add the kale and season to taste; Top with chickpeas, sliced avocado, and the shredded cabbage','2017-10-27 12:38:54','2017-10-27 12:39:09','fall-harvest-bowl','bowls',624,24,100,18,26,16,'',8,NULL),
	(8,'Asian Bowl',1.23,'20-25 minutes','Spicy and savory, this dish provides a hearty and a flavorful meal. ','1/2 cup brown rice, 3/4 cup edamame, 1 cup chopped carrots, 1/2 lime, 4 oz tempeh, 1 tbsp soy sauce, 1 1/2 cups broccoli, 1 tsp hot sauce, cilantro','bring 2 cups of water to a boil, add the rice and let it simmer for 15 minutes; steam the broccoli over a half inch of boiling water to 4-6 minutes or until tender; chop the peppers and cabbage; top with soy sauce and chili peppers','2017-10-30 14:05:47','2017-10-30 14:05:47','spicy-asian-tempeh-bowl','bowls',698,44,93,20,18,12,'',7,'Be careful with sodium in the soy sauce!! Tempeh and edamame both have lots of protein'),
	(9,'Dhal Curry',1.23,'25-30 minutes','Easy, hearty, and protein-packed, this curry can be served for breakfasts, lunch, or dinner!','roti or naan, 200g lentils, 1 onion, 1 red bell pepper, curry powder, 3 cups water, ginger, garlic, lemon juice','Preheat the oven to 200C and when ready cook the naan for 5-7 minutes; cook the lentils and spices for 10-12 minutes; add the onions and tomatoes, bring to a boil and then simmer for 10 more minutes;','2017-10-30 19:19:45','2017-10-30 19:19:53','dhal-curry','curries',640,28,112,11,27,18,'',0,NULL),
	(10,'Pumpkin Coconut Curry',1.23,'20-25 minutes','Rich and creamy pumpkins make this recipe perfect for a cold autumn or winter\'s night, as the coconut milk blends perfectly into the pumpkin flavors','1/2 cup brown rice, 2.5 cups pumpkin, 1 onion, 2 cloves garlic, 1 large tomato, 4 oz coconut milk, 2 tbsp curry powder, 10 cashews','bring 2 cups of water to a boil, add the rice and let it simmer for 20 minutes; meanwhile, slice and heat the garlic over medium heat; add the ginger, onion, and curry powder and let the onions sweat for 3 mins; add the tomato and a dash of water, let it cook for two minutes; add the pumpkin and coconut milk, letting it simmer for 10-12 minutes','2017-10-30 19:19:49','2017-10-30 19:19:55','pumpkin-curry','curries',657,13,101,26,7,23,'',0,NULL),
	(11,'Cauliflower & Carrot Curry',1.23,'25-30 minutes','Healthy, filling, and delicious, the cauliflower in this recipe brings healthy curries to another level!','1/2 cup brown rice, 2 cloves garlic, 1 onion, 2 tablespoons curry powder, 2 cups cauliflower chopped into small florets, 2 large carrots, 4 oz coconut milk','bring 2 cups of water to a boil, add the rice and let it simmer for 20 minutes; in a separate large pan, add the garlic and onions and let cook over medium heat for 3 minutes; add the cauliflower, carrot, and curry powder and let cook for 7 minutes; add the coconut milk, turn the heat to low and let simmer for 15 minutes or until vegetables are tender','2017-10-30 19:21:44','2017-10-30 19:21:44','cauliflower-carrot-curry','curries',583,14,94,20,13,21,'',0,NULL),
	(12,'Thai Curry',1.23,'20-25 minutes','Creamy from the coconut milk, spicy from the thai curry paste, and colorful from the vegetables, this is a savory shot of thai cuisine with all the vegan favorites','1/2 cup brown rice, 1 onion, 1 inch ginger, 2 cloves garlic, 2 cups broccoli, 1 cup snow peas, 1 large carrot, 4 oz coconut milk, 2 tablespoons red curry paste','Bring a cup of water to a boil and add the rice; Simmer on low heat for 20 minutes, or until desired consistency; Chop the garlic, onion, and ginger and add to a frying pan over medium-high heat with a dash of water, let cook for about 5 minutes; Add the broccoli and carrots and let cook for 5 more minutes; Add the snow peas and curry paste, stir and cook for 3-5 more minutes; Now add the coconut milk and let simmer for 10 minutes; ','2017-11-19 12:51:22','2017-11-19 12:51:22','thai-red-curry','curries',0,0,0,0,0,0,'',0,NULL),
	(13,'Eggplant & Cashew Stir Fry',1.23,'20-25 minutes','The mouth watering combination of eggplant and basil, combined with the crunchines of roasted cashews makes the dish a perfect weeknight dinner, and it\'s great for leftovers the next day!','1/2 cup brown rice, 1 eggplant, 1 cup mushrooms, 1 onion, 1 clove garlic, 1/4 cup cashews, handful of fresh basil, dash of soy sauce','Bring a cup of water to a boil and add the rice; Simmer on low heat for 20 minutes, or until desired consistency; chop the onions and garlic and place it in a medium pan on high heat with a dash of water; slice the eggplant into 1 inch cubes and let it cook for 7-8 minutes; add the mushrooms and cook for another 5 minutes',NULL,NULL,'','stir-fry',0,0,0,0,0,0,'',0,NULL),
	(14,'Chinese Broccoli Stir Fry',1.23,'20-25 minutes','','','',NULL,NULL,'','stir-fry',0,0,0,0,0,0,'',0,NULL),
	(15,'Tofu Noodle Stir Fry',1.23,'20-25 minutes','','','',NULL,NULL,'','stir-fry',0,0,0,0,0,0,'',0,NULL),
	(16,'Teriyaki Tempeh Stir Fry',1.23,'20-25 minutes','','','',NULL,NULL,'','stir-fry',0,0,0,0,0,0,'',0,NULL),
	(17,'Black Bean Burger',1.23,'20-25 minutes','','','',NULL,NULL,'','classics',0,0,0,0,0,0,'',0,NULL),
	(18,'Cauliflower Pizza',1.23,'20-25 minutes','','','',NULL,NULL,'','classics',0,0,0,0,0,0,'',0,NULL),
	(19,'Zucchini Pasta',1.23,'20-25 minutes','','','',NULL,NULL,'','classics',0,0,0,0,0,0,'',0,NULL),
	(20,'Vegan Chili',1.23,'20-25 minutes','','','',NULL,NULL,'','classics',0,0,0,0,0,0,'',0,NULL),
	(21,'Mixed Nuts',1.23,'20-25 minutes','','','',NULL,NULL,'','snacks',0,0,0,0,0,0,'',0,NULL),
	(22,'Bread & Nut Butter',1.23,'20-25 minutes','','','',NULL,NULL,'','snacks',0,0,0,0,0,0,'',0,NULL),
	(23,'Fruit',1.23,'20-25 minutes','','','',NULL,NULL,'','snacks',0,0,0,0,0,0,'',0,NULL),
	(24,'Crunchy Vegetables & Dip',1.23,'20-25 minutes','','','',NULL,NULL,'','snacks',0,0,0,0,0,0,'',0,NULL),
	(25,'Very Berry Smoothie',1.23,'20-25 minutes','','','',NULL,NULL,'','smoothies',0,0,0,0,0,0,'',0,NULL),
	(26,'Tropical Smoothie',1.23,'20-25 minutes','','','',NULL,NULL,'','smoothies',0,0,0,0,0,0,'',0,NULL),
	(27,'Mean Green Smoothie',1.23,'20-25 minutes','','','',NULL,NULL,'','smoothies',0,0,0,0,0,0,'',0,NULL),
	(28,'Purple Passion Smoothie',1.23,'20-25 minutes','','','',NULL,NULL,'','smoothies',0,0,0,0,0,0,'',0,NULL),
	(29,'Grilled Vegetable Salad',1.23,'','','','',NULL,NULL,'','salads',0,0,0,0,0,0,'',0,NULL),
	(30,'Mediterranean Salad',1.23,'','','','',NULL,NULL,'','salads',0,0,0,0,0,0,'',0,NULL),
	(31,'Asian Salad',1.23,'','','','',NULL,NULL,'','salads',0,0,0,0,0,0,'',0,NULL),
	(32,'Indonesian Gado Gado',1.23,'30 minutes','This meal has a lot of different methods','Tempeh! ','check http://www.ilovevegan.com/vegan-gado-gado-salad/',NULL,NULL,'','salads',0,0,0,0,0,0,'',0,NULL),
	(33,'Roasted Cauliflower',1.23,'30 minutes','Perhaps my favorite recipe of all time due to the combination of taste and nutrition, this preparation method requires just 5 minutes of active work','1 head of cauliflower ','Turn the oven on grill/broil mode, so that the heat comes from the top???; Break the cauliflower into small pieces and top with a dash of water, salt, and pepper; Bake for 25 minutes or until crispy and delicious ;) ','2017-10-27 10:08:37','2017-10-27 10:08:37','','sides',0,0,0,0,0,0,'',0,NULL),
	(34,'Roasted Vegetables',1.23,'','','','',NULL,NULL,'','sides',0,0,0,0,0,0,'',0,NULL),
	(35,'Sweet Potato',1.23,'20 minutes','Topped with some vegan butter spread and a dash of salt and pepper, baked sweet potatoes are creamy, rich, and delicious','Uh yeah....as many sweet potatoes as you want. That\'s it!','Preheat oven to 200C; Rinse potatoes and chop into 3 inch cubes;  Place them in the oven and roast for about 20 minutes or until you can easily pierce them with a fork','2017-10-27 10:10:11','2017-10-27 10:10:11','','',0,0,0,0,0,0,'',0,NULL),
	(36,'https://www.budgetbytes.com/category/recipes/vegetarian/vegan/',0.00,'','','','',NULL,NULL,'','',0,0,0,0,0,0,'',0,NULL);

/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
