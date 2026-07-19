-- 1. On insère deux menus de test conformes au cahier des charges
INSERT INTO `menus` (`id`, `titre`, `description`, `theme`, `regime`, `nb_pers_min`, `prix_base`, `stock_dispo`, `conditions_specifiques`) VALUES
(1, 'Menu Saveurs d''Été', 'Un assortiment frais et idéal pour les réunions de famille.', 'classique', 'classique', 2, 35.00, 15, 'À commander au moins 48h à l''avance.'),
(2, 'Prestige de Fêtes', 'Une sélection gastronomique d''exception pour vos grands événements.', 'évènement', 'classique', 4, 85.00, 10, 'Nécessite une commande 1 semaine avant la prestation. Matériel inclus.');

-- 2. On lie tes plats existants (ID 1, 2, 3, 4) aux menus
-- Pour le Menu 1 (Saveurs d'Été) : Entrée Langoustines (1) + Suggestion Chef (3) + Douceur Chocolat (4)
INSERT INTO `menu_plats` (`menu_id`, `plat_id`) VALUES (1, 1), (1, 3), (1, 4);

-- Pour le Menu 2 (Prestige de Fêtes) : Entrée Langoustines (1) + Plat d'Agneau (2) + Douceur Chocolat (4)
INSERT INTO `menu_plats` (`menu_id`, `plat_id`) VALUES (2, 1), (2, 2), (2, 4);