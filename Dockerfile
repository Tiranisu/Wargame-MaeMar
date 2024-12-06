# Utiliser l'image officielle Apache avec PHP
FROM php:8.2-apache

# Définir le répertoire de travail à l'intérieur du conteneur
WORKDIR /var/www/html

# Installer les dépendances nécessaires et l'extension pdo_pgsql
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copier le contenu du dossier local (le dossier où se trouve votre site) vers /var/www/html dans le conteneur
COPY ./site/ /var/www/html/
COPY ./site/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf


# Donner les bonnes permissions aux fichiers copié
RUN chown -R www-data:www-data /var/www/html

# Activer les modules Apache nécessaires
RUN a2enmod rewrite

# Exposer le port 80
EXPOSE 80

# Démarrer Apache en mode premier plan
CMD ["apache2-foreground"]
