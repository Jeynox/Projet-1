# project1 
Journal de bord:
21/09/2023 : Ne faites pas attention aux commits effectués, c'est des test et des ajouts de dossier assets 
avec les photos de tout le monde et des fichiers html pour tout le monde.
Demain on s'organise pour faire un wire frame et une mise en page du site et apres on peu commencer a dev .

24/09/2023 , 2h23 : Page index presque finalisée il ne reste plus que le JS a faire. J'ai enlevé les deux lignes qu'il devait y avoir, a voir si on pourra les mettre plus tard.
(Daniel tes fou dort ! XD)
update : Tu as gérer mec l'Index est magnifique :O

Salut tout le monde voila j'ai avancer le menu deroulant en suivant ce tuto : "https://www.codeur.com/tuto/css/creer-menu-deroulant-css/"
+ test avec image mais rien de concluent pour le moment 
j'ai reussi a cacher les sous categories (on peut les voir grace a l'inspecteur) mais je n'arrive pas a les faire reapparaitre au clic si quelqun voit ou j'ai rate un truc hesitez pas a me dire ^^ 
ps je l'ai fait que sur l'acceuil.html histoire de tester :D
+ Ajout de la parti note (a travailler)

27/09/2023 : Finalisation de la page Daniel

## Lancer le site en local

Aucune dépendance à installer : HTML/CSS/JS + PHP 8 (pour `contact.php` et `decouvertes.php`).

```bash
php -S localhost:8080 deploy/router.php
```

Puis ouvrir http://localhost:8080. Le routeur reproduit en local les règles de production (en-têtes de sécurité, accès interdit à `includes/`, `deploy/` et aux fichiers cachés).

## Déploiement sur un VPS

- **Nginx + PHP-FPM** : partir de `deploy/nginx.conf` (adapter `server_name`, `root` et la version de PHP).
- **Apache** : le `.htaccess` à la racine applique les mêmes règles (`mod_headers` et `mod_rewrite` requis).
- Activer le HTTPS (certbot) puis décommenter la ligne `Strict-Transport-Security`.

## Sécurité

- Content-Security-Policy stricte (aucun script ni style inline), `X-Frame-Options`, `nosniff`, `Referrer-Policy`, `Permissions-Policy`.
- Formulaire de contact : jeton CSRF, champ pot de miel, limite d'une soumission toutes les 30 s, validation et longueur maximale de chaque champ, échappement de toutes les valeurs réaffichées, redirection après envoi (PRG). Le message n'est envoyé nulle part (site vitrine).
- Cookie de session `HttpOnly` + `SameSite=Strict` (+ `Secure` en HTTPS).
