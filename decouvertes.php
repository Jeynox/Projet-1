<?php
require_once __DIR__ . '/includes/security.php';
$articles = require __DIR__ . '/includes/data/articles.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tous les articles de The Wild Tour, classés par catégorie.">
    <title>Découvertes — The Wild Tour</title>
    <link rel="icon" href="assets-daniel/logo-the-wild-tour-navbar.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700;1,800&display=swap">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body class="page-decouvertes">
    <a class="skip-link" href="#contenu">Aller au contenu</a>
    <header class="site-header">
        <nav class="navbar" aria-label="Navigation principale">
            <a href="accueil.html" class="navbar__brand"><img src="assets-daniel/logo-the-wild-tour-navbar.png" alt="The Wild Tour" class="navbar__logo" width="219" height="100"></a>
            <button class="navbar__toggle" type="button" aria-expanded="false" aria-controls="nav-menu" aria-label="Ouvrir le menu"><span></span></button>
            <ul class="navbar__menu" id="nav-menu">
                <li><a href="accueil.html">Accueil</a></li>
                <li class="has-dropdown">
                    <a href="decouvertes.php" aria-current="page">Découvertes</a>
                    <button class="dropdown__toggle" type="button" aria-expanded="false" aria-controls="nav-dropdown" aria-label="Afficher les catégories"></button>
                    <ul class="dropdown" id="nav-dropdown">
                        <li><a href="fiche-yacine.html">Gastronomie</a></li>
                        <li><a href="fiche-daniel.html">Sport</a></li>
                        <li><a href="fiche-julien.php">Art</a></li>
                        <li><a href="fiche-stephV.html">Écologie</a></li>
                        <li><a href="fiche_stephM.html">Nature</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main id="contenu">
        <section class="hero">
            <img class="hero__img" src="assets-julien/casa-del-arbol-ibiza-veranda-salon-exterieur.jpeg" alt="">
            <div class="hero__content">
                <p class="eyebrow">Tous les articles</p>
                <h1 class="hero__title">Découvertes</h1>
                <p class="hero__lead">Cinq catégories, cinq régions, cinq regards : choisissez votre prochaine escapade.</p>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-head reveal">
                    <p class="eyebrow">Explorer</p>
                    <h2 class="section-title">Catégories</h2>
                    <p>Gastronomie, sport, art, écologie ou nature : chaque Wilder partage ce qu’il préfère dans sa région.</p>
                </div>
                <div class="categories">
                    <a class="categorie reveal" href="fiche-yacine.html">
                        <img src="assets-categories/categorie-gastronomie.jpg" alt="" loading="lazy">
                        <div class="categorie__body">
                            <h3>Gastronomie</h3>
                            <p>Les tables qui valent le détour, comme ce restaurant japonais en plein cœur de Chartres.</p>
                            <span class="link-arrow">Découvrir</span>
                        </div>
                    </a>
                    <a class="categorie reveal" href="fiche-daniel.html">
                        <img src="assets-categories/categorie-sport.jpg" alt="" loading="lazy">
                        <div class="categorie__body">
                            <h3>Sport</h3>
                            <p>Au bord de l’eau dans l’Aube, pour une pêche responsable et respectueuse de la nature.</p>
                            <span class="link-arrow">Découvrir</span>
                        </div>
                    </a>
                    <a class="categorie reveal" href="fiche-julien.php">
                        <img src="assets-categories/categorie-art.jpg" alt="" loading="lazy">
                        <div class="categorie__body">
                            <h3>Art</h3>
                            <p>De bunker à centre d’art numérique : la Base sous-marine de Bordeaux se réinvente.</p>
                            <span class="link-arrow">Découvrir</span>
                        </div>
                    </a>
                    <a class="categorie reveal" href="fiche-stephV.html">
                        <img src="assets-categories/categorie-ecologie.jpg" alt="" loading="lazy">
                        <div class="categorie__body">
                            <h3>Écologie</h3>
                            <p>Les acteurs du Libournais qui réparent, recyclent et revalorisent au quotidien.</p>
                            <span class="link-arrow">Découvrir</span>
                        </div>
                    </a>
                    <a class="categorie reveal" href="fiche_stephM.html">
                        <img src="assets-categories/categorie-nature.jpg" alt="" loading="lazy">
                        <div class="categorie__body">
                            <h3>Nature</h3>
                            <p>Forêt domaniale, dunes et plages : une balade iodée aux Sables d’Olonne.</p>
                            <span class="link-arrow">Découvrir</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="section section--sable">
            <div class="container">
                <div class="section-head section-head--left reveal">
                    <p class="eyebrow">Fraîchement publiés</p>
                    <h2 class="section-title">Les articles récents</h2>
                    <hr class="divider">
                </div>
                <div class="features">
<?php foreach ($articles as $article) : ?>
                    <article class="feature reveal">
                        <div class="feature__media">
                            <img src="<?= e($article['image']) ?>" alt="" loading="lazy">
                        </div>
                        <div class="feature__body">
                            <p class="eyebrow"><?= e($article['categorie']) ?></p>
                            <h3><?= e($article['titre']) ?></h3>
                            <p><?= e($article['description']) ?></p>
                            <a class="btn" href="<?= e($article['url']) ?>">Lire l’article</a>
                        </div>
                    </article>
<?php endforeach; ?>
                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="site-footer__inner">
            <div class="site-footer__brand">
                <img src="assets-daniel/logo-the-wild-tour-navbar.png" alt="The Wild Tour" width="150" height="68" loading="lazy">
                <p>Le blog des bonnes adresses des Wilders, région par région.</p>
            </div>
            <div class="site-footer__col">
                <h2>Le site</h2>
                <ul>
                    <li><a href="accueil.html">Accueil</a></li>
                    <li><a href="decouvertes.php">Découvertes</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="site-footer__col">
                <h2>Informations</h2>
                <ul>
                    <li>Mentions légales</li>
                    <li>Politique de confidentialité</li>
                    <li>Conditions d'utilisation</li>
                </ul>
            </div>
        </div>
        <p class="site-footer__bottom">Boulevard des Régions, 96000 WildLand · © <span data-year>2023</span> The Wild Tour — Starting Code</p>
    </footer>
</body>
</html>
