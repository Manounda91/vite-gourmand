-- 1. Ajout des colonnes d'examen à la table plats existante
ALTER TABLE `plats` 
ADD COLUMN `type` ENUM('entrée', 'plat', 'dessert') NOT NULL DEFAULT 'plat',
ADD COLUMN `allergenes` VARCHAR(255) DEFAULT NULL;

-- 2. Qualification des types et allergènes des plats existants
UPDATE `plats` SET `type` = 'entrée', `allergenes` = 'crustacés, fruits à coque' WHERE `id` = 1;
UPDATE `plats` SET `type` = 'plat', `allergenes` = 'lactose' WHERE `id` = 2;
UPDATE `plats` SET `type` = 'plat', `allergenes` = 'poisson, lactose' WHERE `id` = 3;
UPDATE `plats` SET `type` = 'dessert', `allergenes` = 'lactose, gluten' WHERE `id` = 4;

-- 3. Création de la table des menus complexes
CREATE TABLE IF NOT EXISTS `menus` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `titre` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `theme` ENUM('Noel', 'Pâques', 'classique', 'évènement') NOT NULL,
  `regime` ENUM('vegetarien', 'vegan', 'classique') NOT NULL,
  `nb_pers_min` INT NOT NULL DEFAULT 2,
  `prix_base` DECIMAL(10,2) NOT NULL,
  `stock_dispo` INT NOT NULL DEFAULT 0,
  `conditions_specifiques` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Création de la table intermédiaire Many-to-Many
CREATE TABLE IF NOT EXISTS `menu_plats` (
  `menu_id` INT NOT NULL,
  `plat_id` INT NOT NULL,
  PRIMARY KEY (`menu_id`, `plat_id`),
  FOREIGN KEY (`menu_id`) REFERENCES `menus`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`plat_id`) REFERENCES `plats`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;