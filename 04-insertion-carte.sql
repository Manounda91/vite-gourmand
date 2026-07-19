-- 1. Insertion des plats individuels de référence
INSERT INTO `plats` (`id`, `nom`, `type`, `allergenes`) VALUES
(1, 'Salade folle aux éclats de noix et chèvre chaud', 'entrée', 'fruits à coque, lactose'),
(2, 'Foie gras de canard mi-cuit au piment d''Espelette', 'entrée', NULL),
(3, 'Mousseline de panais aux morilles et légumes glacés', 'plat', NULL),
(4, 'Pavé de cabillaud rôti et son émulsion au beurre blanc', 'plat', 'poisson, lactose'),
(5, 'Quasi d''agneau en croûte d''herbes et jus corsé', 'plat', 'gluten'),
(6, 'Moelleux au chocolat noir intense et son cœur coulant', 'dessert', 'lactose, œufs, gluten');

-- 2. Insertion des Menus avec thèmes, régimes et stocks
INSERT INTO `menus` (`id`, `titre`, `description`, `theme`, `regime`, `nb_pers_min`, `prix_base`, `stock_dispo`, `conditions_specifiques`) VALUES
(1, 'Menu Gastronomique de Pâques', 'Un voyage culinaire d''exception mêlant tradition et produits nobles du terroir bordelais.', 'Pâques', 'classique', 4, 120.00, 15, 'À commander impérativement au moins 5 jours avant la prestation.'),
(2, 'Menu Printemps 100% Végétal', 'Une explosion de fraîcheur et de textures autour des plus beaux légumes primeurs.', 'classique', 'vegetarien', 2, 45.00, 8, 'Conserver au réfrigérateur entre 2°C et 4°C jusqu''au moment du service.');

-- 3. Liaisons Many-to-Many dans la table intermédiaire
-- Pour le Menu 1 (Pâques) : Foie gras (2) + Agneau (5) + Moelleux (6)
INSERT INTO `menu_plats` (`menu_id`, `plat_id`) VALUES (1, 2), (1, 5), (1, 6);

-- Pour le Menu 2 (Végétarien) : Salade (1) + Mousseline (3) + Moelleux (6) (Le dessert est partagé !)
INSERT INTO `menu_plats` (`menu_id`, `plat_id`) VALUES (2, 1), (2, 3), (2, 6);