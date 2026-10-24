<?php require_once __DIR__ . '/includes/security.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La Base sous-marine de Bordeaux, du bunker de 1941 aux Bassins des Lumières.">
    <title>Art — Base sous-marine, Bordeaux — The Wild Tour</title>
    <link rel="icon" href="assets-daniel/logo-the-wild-tour-navbar.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700;1,800&display=swap">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body class="page-fiche">
    <a class="skip-link" href="#contenu">Aller au contenu</a>
    <header class="site-header">
        <nav class="navbar" aria-label="Navigation principale">
            <a href="accueil.html" class="navbar__brand"><img src="assets-daniel/logo-the-wild-tour-navbar.png" alt="The Wild Tour" class="navbar__logo" width="219" height="100"></a>
            <button class="navbar__toggle" type="button" aria-expanded="false" aria-controls="nav-menu" aria-label="Ouvrir le menu"><span></span></button>
            <ul class="navbar__menu" id="nav-menu">
                <li><a href="accueil.html">Accueil</a></li>
                <li class="has-dropdown">
                    <a href="decouvertes.php">Découvertes</a>
                    <button class="dropdown__toggle" type="button" aria-expanded="false" aria-controls="nav-dropdown" aria-label="Afficher les catégories"></button>
                    <ul class="dropdown" id="nav-dropdown">
                        <li><a href="fiche-yacine.html">Gastronomie</a></li>
                        <li><a href="fiche-daniel.html">Sport</a></li>
                        <li><a href="fiche-julien.php" aria-current="page">Art</a></li>
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
            <img class="hero__img" src="assets-julien/photo-base-sous-marine(123).jpg" alt="">
            <div class="hero__content">
                <p class="eyebrow">Art · Bordeaux</p>
                <h1 class="hero__title">Base sous-marine</h1>
                <div class="hero__meta">
                    <img src="assets-julien/profil-julien.prv-instagram.jpg" alt="">
                    <span>Par Julien</span>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container section-head reveal">
                <p class="eyebrow">Un lieu chargé d’histoire</p>
                <h2 class="section-title">Base sous-marine, Bordeaux</h2>
                <hr class="divider">
                <p>Construite entre 1941 et 1944 durant la Seconde Guerre mondiale, la Base sous-marine de Bordeaux abritait des sous-marins allemands. Ce gigantesque monument de 42&nbsp;000&nbsp;m² mesure près de 20 mètres de haut et pouvait accueillir jusqu’à quinze sous-marins répartis dans onze bassins couverts.</p>
            </div>
        </section>

        <section class="bleed">
            <div class="bleed__text reveal">
                <p class="eyebrow">Mémoire</p>
                <h2>Un monument bordelais</h2>
                <div class="prose">
                    <p>Les travaux de construction du bunker auraient nécessité jusqu’à 6&nbsp;000 travailleurs, principalement des prisonniers de guerre espagnols et portugais. Ils ont travaillé sans relâche, jour et nuit, dans des conditions effroyables. Beaucoup sont morts d’épuisement ou noyés, même s’il ne faut pas croire la légende urbaine selon laquelle d’autres seraient tombés dans les fondations, prisonniers du béton.</p>
                    <p>Vous pourrez observer à la Base sous-marine le mémorial érigé en hommage à ceux qui ont pris part à la construction, et en particulier à ceux qui y ont laissé leur vie.</p>
                    <p>Ce lieu offre aujourd’hui un espace culturel dédié à la création contemporaine, peuplé d’une étrange poésie. Allez visiter ses espaces hors norme et bruts où règne une ambiance particulière&nbsp;: le décor abrupt ne vous laissera pas indifférent.</p>
                </div>
            </div>
            <div class="bleed__media reveal">
                <img src="assets-julien/IMG_4109-2.jpg" alt="Bassin intérieur de la Base sous-marine" loading="lazy">
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="prose prose--center reveal">
                    <p>Ce lieu atypique accueille des expositions depuis 2000. Il met à l’honneur une programmation pluridisciplinaire, avec des expositions temporaires et des événements aux genres éclectiques. Les expositions ont souvent une forte identité tournée vers le numérique et la culture électronique, comme « Digitale Abysse » ou « Nobody knew you’re a dog » de Romain Tardy, mêlant projections et installations lumineuses. Le lieu organise aussi des événements dédiés à la culture urbaine, comme l’exposition « Légendes urbaines » consacrée au street-art.</p>
                    <p>Les œuvres mettent souvent en lumière des problématiques contemporaines&nbsp;: hyper-connectivité, inégalités sociales ou ravages de la mondialisation. On y retrouve entre autres l’exposition Medio Acqua, qui traite de l’eau sous toutes ses formes, entre voyage et réflexion.</p>
                </div>
            </div>
        </section>

        <figure class="wide-figure reveal">
            <img src="assets-julien/expo-dali-gaudi-bordeaux.jpg" alt="Exposition immersive Dalí et Gaudí aux Bassins des Lumières" loading="lazy">
            <figcaption>Exposition immersive Dalí et Gaudí aux Bassins des Lumières.</figcaption>
        </figure>

        <section class="section">
            <div class="container">
                <p class="pullquote reveal">Dès 2020, la Base rebaptisée « Bassins des Lumières » devient le plus grand centre d’art numérique au monde.</p>
                <div class="prose prose--center reveal">
                    <p>Utilisant quatre des onze bassins d’origine, le lieu projette sur 12&nbsp;000&nbsp;m² des « expositions immersives » qui, par un jeu d’images, vous transportent vers d’autres lieux ou d’autres époques à travers les œuvres de grands peintres. Depuis son ouverture, l’ancienne base a rendu hommage à Gustav Klimt, Monet, Renoir ou encore à l’art vénitien. À chaque fois, un rendu remarquable et magique&nbsp;: on ne regrette pas la visite.</p>
                </div>
            </div>
        </section>

        <section class="section section--sable">
            <div class="container">
                <div class="section-head reveal">
                    <p class="eyebrow">Continuer la lecture</p>
                    <h2 class="section-title">Autres articles</h2>
                </div>
                <div class="cards">
    <article class="card reveal">
        <div class="card__media">
            <img src="assets-yacine/ai-generated-7955585_1920.jpg" alt="" loading="lazy">
            <span class="card__tag">Gastronomie</span>
        </div>
        <div class="card__body">
            <h3>Shogun Sushi, Chartres</h3>
            <p>Le premier restaurant japonais de Chartres : sushis, makis et salle traditionnelle où l’on mange assis sur des coussins.</p>
            <a class="link-arrow" href="fiche-yacine.html">Lire l’article</a>
        </div>
        <div class="card__footer">
            <img src="assets-yacine/yacine.jpg" alt="" width="40" height="40" loading="lazy">
            <span>Yacine M.</span>
        </div>
    </article>
    <article class="card reveal">
        <div class="card__media">
            <img src="assets-daniel/pexels-cottonbro-studio-4828253.jpg" alt="" loading="lazy">
            <span class="card__tag">Sport</span>
        </div>
        <div class="card__body">
            <h3>La pêche dans l’Aube</h3>
            <p>Sensibilisation, journées dépollution et pêche « no kill » : la pêche, sport national de l’Aube.</p>
            <a class="link-arrow" href="fiche-daniel.html">Lire l’article</a>
        </div>
        <div class="card__footer">
            <img src="assets-daniel/IMG_1713.jpg" alt="" width="40" height="40" loading="lazy">
            <span>Daniel L.</span>
        </div>
    </article>
    <article class="card reveal">
        <div class="card__media">
            <img src="assets-daniel/chris-abney-gvb84QdErNs-unsplash.jpg" alt="" loading="lazy">
            <span class="card__tag">Écologie</span>
        </div>
        <div class="card__body">
            <h3>Le Libournais écoresponsable</h3>
            <p>Un tour d’horizon libournais des acteurs qui réparent, recyclent et revalorisent au quotidien.</p>
            <a class="link-arrow" href="fiche-stephV.html">Lire l’article</a>
        </div>
        <div class="card__footer">
            <span class="avatar" aria-hidden="true">SV</span>
            <span>Stéphanie V.</span>
        </div>
    </article>
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
