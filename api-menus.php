<?php
// On indique au navigateur qu'on renvoie du JSON propre
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

// 1. Inclusion de ta connexion existante
require_once 'connexion.php';

try {
    // 2. Requête SQL complexe (Jointure) pour récupérer les menus avec leurs plats associés
    $query = "SELECT 
                m.id AS menu_id, m.titre AS menu_titre, m.description AS menu_desc, 
                m.theme, m.regime, m.nb_pers_min, m.prix_base, m.stock_dispo, m.conditions_specifiques,
                p.id AS plat_id, p.nom AS plat_nom, p.type AS plat_type, p.allergenes
              FROM menus m
              LEFT JOIN menu_plats mp ON m.id = mp.menu_id
              LEFT JOIN plats p ON mp.plat_id = p.id
              ORDER BY m.id, p.type";
              
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $menus = [];
    
    // 3. Traitement et structuration des données en PHP
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $menuId = $row['menu_id'];
        
        // Si le menu n'est pas encore initialisé dans notre tableau, on le crée
        if (!isset($menus[$menuId])) {
            $menus[$menuId] = [
                "id" => (int)$row['menu_id'],
                "titre" => $row['menu_titre'],
                "description" => $row['menu_desc'],
                "theme" => $row['theme'],
                "regime" => $row['regime'],
                "nb_personnes_min" => (int)$row['nb_pers_min'],
                "prix_base" => (float)$row['prix_base'],
                "stock" => (int)$row['stock_dispo'],
                "conditions" => $row['conditions_specifiques'],
                "composition" => []
            ];
        }
        
        // Si le menu possède un plat relié, on l'ajoute dans sa liste de composition
        if ($row['plat_id'] !== null) {
            $menus[$menuId]['composition'][] = [
                "id" => (int)$row['plat_id'],
                "nom" => $row['plat_nom'],
                "type" => $row['plat_type'],
                "allergenes" => $row['allergenes']
            ];
        }
    }
    
    // 4. On renvoie le résultat au format JSON (Code 200 OK)
    http_response_code(200);
    echo json_encode(array_values($menus), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    // En cas de problème avec MySQL, on renvoie une erreur propre
    http_response_code(500);
    echo json_encode(["erreur" => "Impossible de charger la carte : " . $e->getMessage()]);
}
?>