## Ressources 

[DOCUMENTATION TECHNIQUE](https://github.com/LlayN/arcadia/blob/master/DOCUMENTATION%20TECHNIQUE.pdf)

[GESTION DE PROJET](https://github.com/LlayN/arcadia/blob/master/GESTION%20DE%20PROJET.pdf)

[MANUEL D'UTILISATION](https://github.com/LlayN/arcadia/blob/master/MANUEL%20D'UTILISATION.pdf)

[CHARTE GRAPHIQUE](https://github.com/LlayN/arcadia/blob/master/Charte%20Graphique.pdf)


## Déployer l'application en local

> [!NOTE]
> Attention, Windows est utilisé pour ce tutoriel, je vous laisse donc adapter le déploiement à votre OS, vous trouverez toute la documentation nécessaire des services utilisés.

### Installation de XAMPP - Disponible pour Windows, Mac & Linux

XAMPP est un logiciel, qui regroupe un ensemble de services permettant de mettre en place un environnement Web Local.

Pour le télécharger, c'est simple, il suffit de vous rendre directement sur ce [lien](https://www.apachefriends.org/fr/download.html), séléctionner la plateforme de votre choix puis la dernière version de PHP! 

Une fois téléchargé, installer le tout en laissant la configuration telle quelle.

Maintenant que XAMPP est prêt à être utilisé, nous allons devoir faire une petite modification pour activer l'extension `intl` qui s'occupera plus tard de gérer **le formatage des dates**.

Rendez-vous dans Config se trouvant dans la ligne du serveur Apache, puis ouvrez le ficher `php.ini` (ouvrez le dans un éditeur de texte, comme bloc-notes)

![Capture d’écran 2024-10-26 093643](https://github.com/user-attachments/assets/bdae3a93-7266-43c3-924e-23632620d4f8)

Une fois l'éditeur ouvert, CTRL + F, et rechercher cette ligne : 
```
extension=intl
```

Supprimez le point-virgule se trouvant devant, et sauvegarder le fichier !


### Importation du projet via GitHub

Pour importer ce projet, vous avez 2 options :

**Importation Simple :**

- Télécharger directement le projet au format **ZIP** sur GitHub, pour l'extraire dans le dossier ciblé (htdocs).

**Importation Pratique via Git :**

- Télécharger Git, et installez-le, vous pourrez alors utiliser la commande `git clone` par la suite pour installer le projet.


> [!IMPORTANT]
> Pour une question de praticité, je vous conseille fortement d'extraire ou cloner le projet dans le fichier `htdocs` à la racine de XAMPP

**Configurer les variables d'environnement**

Pour adapter le projet à votre environnement de travail, il faudra créer un fichier `.env` à la racine du projet.
Celui-ci comportera toutes les variables d'environnement :

> [!IMPORTANT]
> Pour générer une clée secrète pour la variable APP_SECRET, utiliser la commande : `php -r "echo bin2hex(random_bytes(16));"`

```
APP_ENV=dev
APP_SECRET= #Insérer la clé générée en amont

DATABASE_URL="mysql://app:root@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4" #Remplacer par votre BDD local

MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0

MAILER_DSN= MAILER_DSN= # Indiquer le DSN fourni par votre service mail (Mailtrap, Gmail, etc.)
```

### Installation des dépendances : NPM & Composer

> [!NOTE]
> Après l'installation d'un des logiciels, veillez à relancer votre terminal si celui-ci est ouvert pour qu'il puisse se mettre à jour et ainsi reconnaitre les commandes.


**Installer Composer :**

Attaquons nous à Composer !

Télécharger directement [Composer-setup.exe](https://getcomposer.org/download/) ici, puis installez-le pour tous les utilisateurs.

À la première étape de l'installation, Composer vous demandera si vous souhaitez l'installer en **Developer Mode**, ça ne sera pas utile, vous pouvez donc passer à la suite.

Lors de la deuxième étapes, vous devrez choisir la "command-line PHP" que nous utiliserons pour ce projet : 

![Capture d’écran 2024-10-24 182630](https://github.com/user-attachments/assets/62e1c99d-2976-44c8-b803-efed2d573455)

Il faudra comme moi, récupérer **php.exe** à l'intérieur du dossier XAMPP, puis vous pourrez passer aux étapes suivantes sans rien modifier !

Ouvrez votre terminal, et rendez-vous maintenant à la racine du projet, lancez la commande suivante pour installer les dépendances : 

```
composer install
```

Tous les composants se trouvant dans le fichier `composer.json` seront installés.

**Installer NPM :**

Pour récupérer NPM, nous pouvons passer par le [Prebuilt Installer](https://nodejs.org/en/download/prebuilt-installer) de Node.js, qui inclut NPM à l'installation.
Vous pouvez laisser la configuration par défaut à l'installation.

Rendez-vous maintenant à la racine du projet, et lancez la commande suivante pour installer les dépendances : 

```
npm install
```

Puis, 

```
npm run dev
```

Pour recompiler les assets avec Webpack

Tous les composants se trouvant dans le fichier `package.json` seront installés.

### Installation de la CLI Symfony avec Scoop

**Installation de Scoop**

Pour simplifier l'installation de Symfony, nous utiliseront Scoop qui est un installateur pour Windows.

Scoop s'installe très facilement, il suffit d'ouvrir un terminal PowerShell, et d'en insérer ces lignes : 
``` 
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser 
Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
```

Appuyez sur entrée, et PowerShell vous informera d'une modification de la stratégie d'exécution, vous pouvez tout accepter en appuyant sur `T`

Ce message devrait s'afficher : `Scoop was installed successfully!`

**Installation de la CLI Symfony**

Ouvrez votre terminal, ou votre éditeur de code, et rendez-vous à la racine du projet.

Insérez-y cette ligne pour installer `Symfony CLI`.

``` 
scoop install symfony-cli
```

Vous devriez avoir un message de succès : `symfony-cli (version) was installed successfully !`

### Importation de la base de donnée vers PHPMyAdmin

Il reste un détail important pour ne pas avoir d'erreur lors du lancement sur serveur local, mettre à jour la base de donnée !

Lancer XAMPP en administrateur, puis démarrer les modules Apaches et MySQL un bouton `Start` leur est attribués dans la colonne `Actions`.

Voici à quoi devrait ressembler les services un fois démarrer :

![Capture d’écran 2024-10-26 000953](https://github.com/user-attachments/assets/1ba1b020-6a72-4df2-a91e-d5c74822d120)

Maintenant, cliquer sur le bouton `Admin` du service MySQL, il vous redirigera directement vers PHPMyAdmin !

Vous vous retrouvez maintenant sur le menu principal, cliquer sur le bouton `Importer` se trouvant sur la barre horizontal tout en haut de la page.

Vous vous retrouverez donc ici : 

![Capture d’écran 2024-10-26 001821](https://github.com/user-attachments/assets/8cde5589-4918-403e-9c11-c09033ac4a08)

Parcourez vos fichiers jusqu'à récupérer le fichier SQL importer dans le projet, laisser le jeu de caractères du fichier en UTF-8, et lancer l'importation !

Vous devriez avoir maintenant votre base de donnée à jour ! Rendez-vous maintenant sur votre terminal à la racine du projet puis insérer-y cette ligne pour lancer le serveur Symfony : 

```
symfony server:start
```

Plus qu'à vous rendre sur l'adresse IP local : http://127.0.0.1:8000/ et le tour est joué !





