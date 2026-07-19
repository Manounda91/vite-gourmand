<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

require_once 'connexion.php';

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? trim($data['password']) : '';

try {
    $query = "SELECT id, nom, prenom, email, password, role FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(401);
        echo json_encode(["erreur" => "Diagnostic : Aucun utilisateur trouvé en base avec l'email '" . $email . "'"]);
        exit;
    }

    // On teste la fonction de vérification
    $verification = password_verify($password, $user['password']);

    if ($verification) {
        http_response_code(200);
        echo json_encode([
            "message" => "Connexion réussie !",
            "utilisateur" => [
                "id" => (int)$user['id'],
                "nom" => $user['nom'],
                "prenom" => $user['prenom'],
                "role" => $user['role']
            ]
        ]);
    } else {
        http_response_code(401);
        // Ce message va nous afficher le hash stocké pour voir s'il y a un problème de caractères
        echo json_encode([
            "erreur" => "Diagnostic : Utilisateur trouvé ! Mais le mot de passe tapé '" . $password . "' ne correspond pas au hash stocké : " . $user['password']
        ]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erreur" => "Erreur système : " . $e->getMessage()]);
}
?>