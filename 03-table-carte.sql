-- 1. Table qui stocke les informations générales de chaque menu
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

-- 2. Table qui stocke les plats individuellement
CREATE TABLE IF NOT EXISTS `plats` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nom` VARCHAR(100) NOT NULL,
  `type` ENUM('entrée', 'plat', 'dessert') NOT NULL,
  `allergenes` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Table intermédiaire pour lier les plats aux menus (Relation Many-to-Many)
CREATE TABLE IF NOT EXISTS `menu_plats` (
  `menu_id` INT NOT NULL,
  `plat_id` INT NOT NULL,
  PRIMARY KEY (`menu_id`, `plat_id`),
  FOREIGN KEY (`menu_id`) REFERENCES `menus`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`plat_id`) REFERENCES `plats`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;