<?php
require_once 'connexion.php';

// PHP génère lui-même le hash parfait de sécurité pour "secret123"
$nouveauHash = password_hash("secret123", PASSWORD_BCRYPT);

try {
    $query = "UPDATE utilisateurs SET password = :pass WHERE email = 'jose@vitegourmand.fr'";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['pass' => $nouveauHash]);
    
    echo "Félicitations Emmanuel ! Le mot de passe de José a été synchronisé avec le hash généré par le serveur : <br><strong>" . $nouveauHash . "</strong>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>