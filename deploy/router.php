<?php
// Routeur pour le serveur de dev PHP : reproduit les règles du .htaccess / nginx.conf.
// Lancement : php -S localhost:8080 deploy/router.php

$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');

if (preg_match('#(^|/)\.|^/(includes|deploy)/|\.(md|log|bak|tmp|conf|ini|sql)$#i', $path)) {
    http_response_code(403);
    exit('Accès interdit');
}

require_once __DIR__ . '/../includes/security.php';

// Pages HTML servies ici pour qu'elles reçoivent aussi les en-têtes de sécurité
$file = realpath(__DIR__ . '/..' . ($path === '/' ? '/index.html' : $path));
if ($file && str_ends_with($file, '.html') && str_starts_with($file, realpath(__DIR__ . '/..'))) {
    header('Content-Type: text/html; charset=UTF-8');
    readfile($file);
    return true;
}

// Laisse le serveur intégré servir les autres fichiers (CSS, JS, images, PHP).
return false;
