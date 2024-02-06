# Guide d'utilisation pour le Projet

Ce guide vous aidera à démarrer et à utiliser le projet.

Suivez attentivement ces étapes pour configurer l'environnement de développement et pour comprendre comment utiliser ce projet.

Assurez-vous d'avoir les éléments suivants installés sur votre système :

-   PHP (version 8.0 ou supérieure)
-   Composer
-   Serveur Web (Apache, Nginx, etc.)
-   MySQL ou une autre base de données de votre choix
-   Node.js (version LTS recommandée)
-   npm (gestionnaire de paquets Node.js)

## Installation

1.  **Clonage du projet :**

    ```
    git clone <lien-du-repository>
    cd nom-du-projet
    ```

2.  **Installation des dépendances PHP :**

    ```
    composer install
    ```

3.  **Configuration de l'environnement :**

    -   Dupliquez le fichier `.env.example` et renommez-le en `.env`.

    ```
        cp .env.example .env
    ```

    -   Configurez les informations de base de données dans le fichier `.env`.

4.  **Génération de la clé d'application :**

    ```
    php artisan key:generate
    ```

5.  **Migrations et seeders :**

    ```
    php artisan migrate --seed
    ```

    Pour les prochaines fois, utiliser

    ```
    php artisan migrate:refresh --seed
    ```

    Définir les droits d'accès à un utilisateur pour accéder au dashboard Admin

    ```
    php artisan shield:generate --all
    ```

6.  **Installation des dépendances JavaScript :**

    ```
    npm install && npm run dev
    ```

7.  **Préparer les images**

    Dans le dossier racine de votre projet Laravel, ouvrez le fichier `.env` en utilisant un éditeur de texte.

    Recherchez la ligne `APP_URL` dans le fichier `.env`. Cette valeur doit correspondre à l'URL de votre serveur.

    Si la valeur actuelle de `APP_URL` ne correspond pas à l'URL de votre serveur, modifiez-la en conséquence.

    Par exemple, si l'URL de votre serveur est `http://127.0.0.1:8000`, assurez-vous que la ligne `APP_URL` est configurée comme suit :

    ```
    APP_URL=http://localhost:8000
    ```

8.  **Liens symboliques (symlinks) :**

    Rendre le dossier storage est accessible depuis le dossier public de mon application.

    ```
    php artisan storage:link
    ```

    Cela créera un lien symbolique de storage/app/public vers public/storage.

## Utilisation

Une fois l'installation terminée, vous pouvez lancer le serveur de développement Laravel :

````

php artisan serve

```

Accédez à l'application via votre navigateur à les adresses:

-   [http://localhost:8000](http://localhost:8000)
-   [http://localhost:8000/admin](admin)

## Avertissement

-   Assurez-vous de ne pas inclure les fichiers sensibles tels que `.env` dans vos commits.
-   Respectez les bonnes pratiques de développement et de sécurité.

## Contact

Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à contacter l'équipe de développement à [contact@haitiandevelopers.com](mailto:contact@haitiandevelopers.com).
```
````
