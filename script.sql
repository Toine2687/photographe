CREATE TABLE users(
   `users_id` INT AUTO_INCREMENT,
   `lastname` VARCHAR(50)  NOT NULL,
   `fisrtname` VARCHAR(50)  NOT NULL,
   `phone` VARCHAR(50) ,
   `mail` VARCHAR(80)  NOT NULL,
   `partner_lastname` VARCHAR(50) ,
   `partner_firstname` VARCHAR(50) ,
   password VARCHAR(30)  NOT NULL,
   `created_at` DATETIME NOT NULL,
   role BOOLEAN,
   `adress` VARCHAR(200)  NOT NULL,
   `zip` TINYINT NOT NULL,
   `city` VARCHAR(80)  NOT NULL,
   PRIMARY KEY(`users_id`)
);

CREATE TABLE galleries(
   `galleries_id` INT AUTO_INCREMENT,
   `shooting_date` DATE NOT NULL,
   `shooting_location` VARCHAR(100)  NOT NULL,
   `title` VARCHAR(100)  NOT NULL,
   `main_picture` VARCHAR(50)  NOT NULL,
   `created_at` DATETIME NOT NULL,
   `sent_at` DATETIME,
   `deleted_at` DATETIME,
   `users_id` INT NOT NULL,
   PRIMARY KEY(`galleries_id`),
   FOREIGN KEY(`users_id`) REFERENCES `users`(`users_id`)
);

CREATE TABLE packs(
   `packs_id` INT AUTO_INCREMENT,
   `label` VARCHAR(50)  NOT NULL,
   `duration` INT NOT NULL,
   `price` SMALLINT NOT NULL,
   `created_at` DATETIME NOT NULL,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   `content` TEXT,
   PRIMARY KEY(`packs_id`)
);

CREATE TABLE articles(
   `articles_id` INT AUTO_INCREMENT,
   `title` VARCHAR(50)  NOT NULL,
   description VARCHAR(255)  NOT NULL,
   `content` TEXT NOT NULL,
   `created_at` DATETIME NOT NULL,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   `main_picture` VARCHAR(50)  NOT NULL,
   `users_id` INT NOT NULL,
   PRIMARY KEY(`articles_id`),
   FOREIGN KEY(`users_id`) REFERENCES `users`(`users_id`)
);

CREATE TABLE categories(
   `categories_id` INT AUTO_INCREMENT,
   `Title` VARCHAR(50)  NOT NULL,
   PRIMARY KEY(`categories_id`)
);

CREATE TABLE users_packs(
   `users_id` INT,
   `packs_id` INT,
   PRIMARY KEY(`users_id`, `packs_id`),
   FOREIGN KEY(`users_id`) REFERENCES `users`(`users_id`),
   FOREIGN KEY(`packs_id`) REFERENCES `packs`(`packs_id`)
);

CREATE TABLE Sort(
   `articles_id` INT,
   `categories_id` INT,
   PRIMARY KEY(`articles_id`, `categories_id`),
   FOREIGN KEY(`articles_id`) REFERENCES `articles`(`articles_id`),
   FOREIGN KEY(`categories_id`) REFERENCES `categories`(`categories_id`)
);
