<?php
require_once __DIR__ . '/includes/security.php';

session_start([
    'cookie_httponly' => true,
    'cookie_samesite' => 'Strict',
    'cookie_secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'use_strict_mode' => true,
]);

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// Longueur maximale de chaque champ
$limits = ['nom' => 80, 'prenom' => 80, 'email' => 254, 'numero' => 20, 'message' => 2000];
$data = array_fill_keys(array_keys($limits), '');
$errors = [];
$sent = isset($_SESSION['flash']) && $_SESSION['flash'] === 'sent';
unset($_SESSION['flash']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère chaque champ comme une chaîne (ignore les tableaux injectés)
    foreach ($limits as $field => $max) {
        $value = $_POST[$field] ?? '';
        $data[$field] = is_string($value) ? trim($value) : '';
    }

    $token = $_POST['csrf'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
        $errors['global'] = 'Votre session a expiré, merci de renvoyer le formulaire.';
    }

    // Pot de miel : un humain ne remplit pas ce champ invisible
    if (!empty($_POST['website'])) {
        $errors['global'] = 'Envoi refusé.';
    }

    // Anti-spam : une soumission toutes les 30 secondes maximum
    if (isset($_SESSION['last_submit']) && time() - $_SESSION['last_submit'] < 30) {
        $errors['global'] = 'Merci de patienter quelques secondes avant de renvoyer un message.';
    }

    if ($data['nom'] === '') {
        $errors['nom'] = 'Veuillez saisir votre nom.';
    }
    if ($data['prenom'] === '') {
        $errors['prenom'] = 'Veuillez saisir votre prénom.';
    }
    if ($data['email'] === '') {
        $errors['email'] = 'Veuillez saisir votre adresse email.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Votre adresse email n’est pas valide.';
    }
    if ($data['numero'] !== '' && !preg_match('/^\+?[0-9 .\-()]{6,20}$/', $data['numero'])) {
        $errors['numero'] = 'Votre numéro de téléphone n’est pas valide.';
    }
    if ($data['message'] === '') {
        $errors['message'] = 'Veuillez écrire votre message.';
    }

    foreach ($limits as $field => $max) {
        if (!isset($errors[$field]) && mb_strlen($data[$field]) > $max) {
            $errors[$field] = "Ce champ ne doit pas dépasser $max caractères.";
        }
    }

    if (!$errors) {
        // Site vitrine : le message n'est envoyé nulle part.
        // Pour un vrai envoi, brancher ici un mailer (PHPMailer, Symfony Mailer...).
        $_SESSION['last_submit'] = time();
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
        $_SESSION['flash'] = 'sent';
        header('Location: contact.php', true, 303);
        exit;
    }
}

/** Affiche le message d'erreur d'un champ. */
function field_error(array $errors, string $field): string
{
    return isset($errors[$field])
        ? '<p class="form__error" id="' . e($field) . '-error">' . e($errors[$field]) . '</p>'
        : '';
}

/** Attributs ARIA d'un champ en erreur. */
function field_aria(array $errors, string $field): string
{
    return isset($errors[$field]) ? ' aria-invalid="true" aria-describedby="' . e($field) . '-error"' : '';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contactez l'équipe de The Wild Tour, le blog des bonnes adresses des Wilders.">
    <title>Contact — The Wild Tour</title>
    <link rel="icon" href="assets-daniel/logo-the-wild-tour-navbar.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700;1,800&display=swap">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body class="page-contact">
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
                        <li><a href="fiche-julien.php">Art</a></li>
                        <li><a href="fiche-stephV.html">Écologie</a></li>
                        <li><a href="fiche_stephM.html">Nature</a></li>
                    </ul>
                </li>
                <li><a href="contact.php" aria-current="page">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="contact" id="contenu">
        <div class="contact__intro">
            <p class="eyebrow">Une adresse à partager ?</p>
            <h1 class="contact__title">Contact</h1>
            <p>Une question, une bonne adresse ou envie de rejoindre les Wilders ? Laissez-nous un message, on vous répond rapidement.</p>
        </div>

        <form class="form" action="contact.php" method="post" novalidate>
            <?php if ($sent) : ?>
                <p class="form__success" role="status">Merci, votre message a bien été envoyé !</p>
            <?php endif; ?>
            <?php if (isset($errors['global'])) : ?>
                <p class="form__error form__error--global" role="alert"><?= e($errors['global']) ?></p>
            <?php endif; ?>

            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
            <div class="form__hp" aria-hidden="true">
                <label for="website">Ne pas remplir</label>
                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="form__row">
                <div class="form__field">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" maxlength="80" autocomplete="family-name" required value="<?= e($data['nom']) ?>"<?= field_aria($errors, 'nom') ?>>
                    <?= field_error($errors, 'nom') ?>
                </div>
                <div class="form__field">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" maxlength="80" autocomplete="given-name" required value="<?= e($data['prenom']) ?>"<?= field_aria($errors, 'prenom') ?>>
                    <?= field_error($errors, 'prenom') ?>
                </div>
            </div>

            <div class="form__row">
                <div class="form__field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" maxlength="254" autocomplete="email" required value="<?= e($data['email']) ?>"<?= field_aria($errors, 'email') ?>>
                    <?= field_error($errors, 'email') ?>
                </div>
                <div class="form__field">
                    <label for="numero">Téléphone <span class="form__optional">(facultatif)</span></label>
                    <input type="tel" id="numero" name="numero" maxlength="20" autocomplete="tel" value="<?= e($data['numero']) ?>"<?= field_aria($errors, 'numero') ?>>
                    <?= field_error($errors, 'numero') ?>
                </div>
            </div>

            <div class="form__field">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" maxlength="2000" required<?= field_aria($errors, 'message') ?>><?= e($data['message']) ?></textarea>
                <?= field_error($errors, 'message') ?>
            </div>

            <button type="submit" class="btn btn--accent">Envoyer le message</button>
        </form>
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
