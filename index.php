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
            <a class="navbar-brand fw-bold" href="#">Vite & Gourmand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Notre Carte</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Concept</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-success btn-sm text-white px-3 ms-2" href="#">🛒 <span id="cart-count">0</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center text-white d-flex align-items-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Mangez sain, mangez vite, soutenez local !</h1>
            <p class="lead">Vos plats préférés préparés avec amour et prêts en 10 minutes chrono.</p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
                <a href="#" class="btn btn-success btn-custom">Découvrir la carte & Commander</a>
                <a href="#" class="btn btn-outline-light btn-custom">Réserver une Table</a>
            </div>
        </div>
    </header>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Savoir-faire Gourmand</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Entrée de Langoustines</h5>
                            <p class="card-text text-muted">Langoustines saisies, déclinaison de textures de carottes et émulsion acidulée.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-success fs-5">18.00 €</span>
                                <button class="btn btn-dark btn-sm px-3 add-to-cart">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Plat d'Agneau</h5>
                            <p class="card-text text-muted">Quasi d'agneau rôti au thym, mousseline de panais et jus corsé réduit.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-success fs-5">26.00 €</span>
                                <button class="btn btn-dark btn-sm px-3 add-to-cart">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
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

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4 text-center text-md-start">
                <div class="col-12 col-md-6">
                    <h5 class="fw-bold text-success">Vite & Gourmand</h5>
                    <p class="text-muted small mb-0">Traiteur de confiance depuis 25 ans.</p>
                </div>
                <div class="col-12 col-md-6 text-md-end">
                    <h6 class="fw-bold">Horaires d'ouverture</h6>
                    <p class="text-muted small mb-0">Du Lundi au Samedi : 11h00 - 22h00</p>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center text-muted small">
                &copy; 2026 Vite & Gourmand. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript.js"></script>
</body>
</html>