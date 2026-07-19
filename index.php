<?php
require_once 'connexion.php';

try {
    $query = $pdo->query("SELECT * FROM plats");
    $les_plats = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $les_plats = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite & Gourmand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
                <img src="assets/image/Logo Vite&Gourmand.png" alt="Logo Vite & Gourmand" style="height: 40px; width: auto; margin-right: 10px;">
                Vite & Gourmand
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#carte">Notre Carte</a></li>
                    <li class="nav-item"><a class="nav-link" href="#avis">Concept</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-success btn-sm text-white px-3 ms-2" href="#carte">🛒 <span id="cart-count">0</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center text-white d-flex align-items-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Mangez sain, mangez vite, soutenez local !</h1>
            <p class="lead">Vos plats préférés préparés avec amour et prêts en 10 minutes chrono.</p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
                <a href="#carte" class="btn btn-success btn-custom">Découvrir la carte & Commander</a>
                <a href="#contact" class="btn btn-outline-light btn-custom">Réserver une Table</a>
            </div>
        </div>
    </header>

    <section id="carte" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Savoir-faire Gourmand</h2>
            <div class="row g-4 justify-content-center">
                
                <?php if (!empty($les_plats)): ?>
                    <?php foreach ($les_plats as $plat): ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="assets/image/<?php echo htmlspecialchars($plat['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($plat['nom']); ?>" style="height: 220px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?php echo htmlspecialchars($plat['nom']); ?></h5>
                                    <p class="card-text text-muted"><?php echo htmlspecialchars($plat['description']); ?></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-success fs-5">
                                            <?php echo number_format($plat['prix'], 2, '.', ''); ?> €
                                        </span>
                                        <button class="btn btn-dark btn-sm px-3 add-to-cart">Ajouter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">Aucun plat n'est disponible pour le moment.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <section id="avis" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Avis de nos clients</h2>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 p-3 bg-light border-0">
                        <div class="card-body">
                            <p class="card-text text-muted">"Un régal ! Les plats de Julie et José sont excellents et livrés chauds en un temps record."</p>
                            <h6 class="fw-bold mb-0 mt-3">Marie T.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 p-3 bg-light border-0">
                        <div class="card-body">
                            <p class="card-text text-muted">"Concept incroyable. Manger sainement au bureau sans attendre, je recommande à 100%."</p>
                            <h6 class="fw-bold mb-0 mt-3">Thomas L.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-10 col-lg-4 mx-auto">
                    <div class="card h-100 p-3 bg-light border-0">
                        <div class="card-body">
                            <p class="card-text text-muted">"La qualité d'un traiteur traditionnel avec la vitesse du web. Une vraie réussite."</p>
                            <h6 class="fw-bold mb-0 mt-3">Sophie M.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact" class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4 text-center text-md-start">
                <div class="col-12 col-md-4">
                    <h5 class="fw-bold text-success mb-3">Vite & Gourmand</h5>
                    <p class="text-white-50 small mb-2">Traiteur de confiance depuis 25 ans. Vos plats faits maison en un temps record.</p>
                    <p class="text-white small mb-2">📞 05 56 78 90 12</p>
                    <p class="text-white small mb-0">✉️ contact@vitegourmand.fr</p>
                </div>
                
                <div class="col-12 col-md-4">
                    <h6 class="fw-bold mb-3 text-white">Notre Restaurant</h6>
                    <p class="text-white-50 small mb-1">Retrait des commandes & sur place :</p>
                    <p class="text-white small">45 Rue Sainte-Catherine,<br>33000 Bordeaux</p>
                </div>

                <div class="col-12 col-md-4 text-md-end">
                    <h6 class="fw-bold mb-3 text-white">Horaires d'ouverture</h6>
                    <p class="text-white-50 small mb-1">Du Lundi au Samedi :</p>
                    <p class="text-white small mb-3">11h00 - 14h30 / 18h00 - 22h00</p>
                    <p class="mb-0"><span class="badge bg-secondary">Fermé le Dimanche</span></p>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small">
                <div class="mb-2 mb-md-0 text-white-50">
                    &copy; 2026 Vite & Gourmand. Tous droits réservés.
                </div>
                <div>
                    <a href="#" style="color: #cbd5e1; text-decoration: none;" class="me-3">Mentions légales</a>
                    <a href="#" style="color: #cbd5e1; text-decoration: none;" class="me-3">Allergènes</a>
                    <a href="connexion.html" style="color: #f59e0b; text-decoration: none; font-weight: 500;">🔒 Espace Pro</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript.js"></script>
</body>
</html>