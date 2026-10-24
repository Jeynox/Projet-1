#!/usr/bin/env bash
# Redéploie le site sur le VPS : envoie les fichiers (sans .git, .env, deploy/...)
# puis reconstruit le conteneur. Usage, depuis la racine du projet : bash deploy/deploy.sh
# Prérequis : l'alias SSH "hackyra" dans ~/.ssh/config.
set -euo pipefail

HOST="${DEPLOY_HOST:-hackyra}"
REMOTE_DIR="wild-tour"
URL="https://wild-tour.daniellemosjose.fr"

cd "$(dirname "$0")/.."

# Liste d'exclusion au format tar (sans le "/" final des dossiers)
EXCLUDE="$(mktemp)"
trap 'rm -f "$EXCLUDE"' EXIT
sed 's#/$##' deploy/rsync-exclude.txt > "$EXCLUDE"

echo "→ Envoi des fichiers vers $HOST:$REMOTE_DIR/site"
ssh "$HOST" "mkdir -p $REMOTE_DIR && rm -rf $REMOTE_DIR/site.new && mkdir $REMOTE_DIR/site.new"
tar --exclude-from="$EXCLUDE" -cf - . | ssh "$HOST" "tar -xf - -C $REMOTE_DIR/site.new"
scp -q deploy/docker/Dockerfile deploy/docker/compose.yaml deploy/docker/apache-security.conf deploy/docker/php-security.ini "$HOST:$REMOTE_DIR/"

echo "→ Reconstruction du conteneur"
ssh "$HOST" "cd $REMOTE_DIR && rm -rf site.old && { [ -d site ] && mv site site.old || true; } && mv site.new site && docker compose up -d --build && rm -rf site.old"

echo "→ Vérification"
code="$(curl -s -o /dev/null -w '%{http_code}' "$URL/accueil.html")"
[ "$code" = "200" ] && echo "OK : $URL répond ($code)" || { echo "ERREUR : $URL répond $code"; exit 1; }
