-- Category insert
INSERT INTO `category` (`category_id`, `category_name`) VALUES (NULL, 'Sports'), (NULL, 'Business');

-- Category Update
UPDATE `category` SET `category_name`='Local News' WHERE category_id = 1

-- Category Delete
DELETE FROM `category` WHERE category_id = 0

-- Category Retrieve
SELECT * FROM `category`

-- Article Insert
INSERT INTO `article` (`article_id`, `article_text`, `article_category_id`, `article_user_name`, `article_img_url`) VALUES (NULL, 'This is article number one which falls into Business category.', '2', 'admin', 'http://walkmymind.com/wp-content/uploads/2016/10/news-banner.jpg')

-- Article Update
UPDATE `article` SET `article_text`=[value-2],`article_category_id`=[value-3],`article_user_name`=[value-4],`article_img_url`=[value-5] WHERE `article_id` = 2

-- Article Delete
DELETE FROM `article` WHERE article_id = 1

-- Article Retrieve
SELECT * FROM `article`

-- User Create
-- Normal User
