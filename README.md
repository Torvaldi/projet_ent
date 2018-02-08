# Pré-requis
- PHP installé avec une version >= 7.0.0
- L'extension PHP "OpenSSL"
- L'extension PHP pdo_mysql
- L'extension PHP Mbstring
- L'extension PHP Tokenizer
- L'extension PHP XML
- NodeJS installé avec **npm**
- Une base de données MySQL [MariaDB](https://mariadb.org/)

# Installation
Après avoir cloné le projet, et après chaque récupération, il faut penser à :
- Éxecuter la commande `php composer update`
- Éxecuter la commande `npm install`
- Régler les paramètres d'environnement (voir suite)
- Mettre à jour la base de données avec la commande `php artisan migrate`

# Environnement
Pour indiquer l'environnement dans lequel on travaille avec Laravel, on utilise le fichier ".env" :
- Si il n'existe pas, renommer le fichier ".env.exemple" en ".env"
- Indiquer les bonnes informations (ici, en développement) :

#### Cette partie là n'est pas à toucher
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost
```
    
#### On indique ici les informations de base de données
```
DB_CONNECTION=mysql <--- NE PAS TOUCHER
DB_HOST=127.0.0.1 <--- indiquer l'adresse de la machine SQL
DB_PORT=3306 <--- Indiquer le port SQL
DB_DATABASE=homestead <--- Nom de la base de données du projet
DB_USERNAME=homestead <--- Nom d'utilisateur de la base de données
DB_PASSWORD=secret <--- Mot de passe de la base de données
```

# Accès au pages web
Pour accéder aux projet, il y a deux manières de faire :
1. Lancer la commande `php artisan serve` et se rendre sur la page [du projet indiquée dans la console](http://127.0.0.1:8000)
2. Utiliser un serveur Nginx (sous Linux / MacOS) avec la configuration suivante :
```apacheconfig
server {
        listen 80;
        listen [::]:80;
        
        # Bien penser à modifier le fichier host de l'ordinateur
        server_name intranet.loc www.intranet.loc;

        # Indiquer ici le chemin du projet
        root /var/www/html/intranet/public;

        index index.php index.html index.htm index.nginx-debian.html;

        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/run/php/php7.0-fpm.sock;
        }

        location ~ /\.ht {
                deny all;
        }

        location ~ /.well-known {
                allow all;
        }
}
```

# Erreur connue en base de données
En cas d'erreur 
```  
[PDOException]                                                                                                   
SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
``` 
allez dans le dossier `app/Providers` et modifiez le fichier `AppServiceProvider` ainsi : 
```    
// Ne pas oublier d'importer la classe Schema
use Illuminate\Support\Facades\Schema;

public function boot()
     {
         Schema::defaultStringLength(191);
     }
```