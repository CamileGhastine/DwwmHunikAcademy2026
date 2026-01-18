# Image de base : nginx téléchargée depuis Docker Hub
FROM nginx:alpine

# Copie tous les fichiers du projet dans le dossier utilisé par Nginx
COPY . /usr/share/nginx/html

# Indique que Nginx écoute sur le port 80 du conteneur (HTTP)
EXPOSE 80