CREATE TABLE `mystore`.`categories` (
    `categorie_id` INT NOT NULL AUTO_INCREMENT,
    `categorie_title` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`categorie_id`)
) ENGINE = InnoDB;

CREATE TABLE `mystore`.`brands` (
    `brand_id` INT NOT NULL AUTO_INCREMENT,
    `brand_title` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`brand_id`)
) ENGINE = InnoDB;

CREATE TABLE `mystore`.`products` (
    `product_id` INT NOT NULL AUTO_INCREMENT,
    `product_title` VARCHAR(255) NOT NULL,
    `product_description` VARCHAR(255) NOT NULL,
    `product_keywords` VARCHAR(255) NOT NULL,
    `category_id` INT NOT NULL,
    `brand_id` INT NOT NULL,
    `product_image1` VARCHAR(255) NOT NULL,
    `product_image2` VARCHAR(255) NOT NULL,
    `product_image3` VARCHAR(255) NOT NULL,
    `product_price` INT NOT NULL,
    PRIMARY KEY (`product_id`)
) ENGINE = InnoDB;

ALTER TABLE
    `products`
ADD
    `date` TIMESTAMP NOT NULL
AFTER
    `product_price`,
ADD
    `status` VARCHAR(255) NOT NULL
AFTER
    `date`;