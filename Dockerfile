# la base de l'image docker est construite à 
# partir de l'image officielle PHP avec la
# version 8.2 et le gestionnaire de processus
# FastCGI (FPM) activé 
FROM php:8.2-fpm 


#je mets à jours les paquet de apt pour ensuite
#les installer (être sur que c'est récent)
 RUN apt-get update && apt-get install -y \
     git \
    #   récupérer des fichiers depuis Internet
     curl \ 
    #  manipulation chaine de caractère
     libonig-dev \
    #  utilitaires pour compresser et décompresser des fichiers au format ZIP. 
     zip \
     unzip \
    #   manipulation de fichiers ZIP
     libzip-dev 
    


#installer logiciel composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#installer pdo_mysql mbstring et zib
RUN docker-php-ext-install mbstring zip


#définir répertoire de trvail, toutes commande après sera exécuté dans ce répertoire
WORKDIR /app

#copy composer.json dans /www
COPY composer.json .

#lance la commande composer install
RUN composer install --no-scripts

#auto deploy
COPY .env.example .env

#copie tout mon projet laravel dans /www de l'image docker
COPY . .
RUN php artisan key:generate
# RUN touch database/database.sqlit
# RUN touch database/test.sqlite

#host 0.0.0.0 = le serveur laravel est accessible en dehors du conteneur et depuis Windows également, ecouté au port 80
CMD php artisan migrate:fresh --seed && php artisan serve --host=0.0.0.0 --port=80