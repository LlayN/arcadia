## Déployer l'application en local

> [!NOTE]
> Attention, Windows est utilisé pour ce tutoriel, je vous laisse donc adapter le déploiement à votre OS, vous trouverez toute la documentation nécessaire des services utilisés.

### Installation de XAMPP - Disponible pour Windows, Mac & Linux

XAMPP est un logiciel, qui regroupe un ensemble de services permettant de mettre en place un environnement Web Local.

Pour le télécharger, c'est simple, il suffit de vous rendre directement sur ce [lien](https://www.apachefriends.org/fr/download.html), et séléctionner la plateforme de votre choix ! 

Une fois téléchargé, installer le tout en laissant la configuration telle quelle.

### Importation du projet via GitHub

Pour importer ce projet, vous avez 2 options :
- Télécharger Git, et installez-le, vous pourrez alors utiliser la commande `git clone` par la suite pour installer le projet.
- Télécharger directement le projet au format **RAR** sur GitHub, pour l'extraire dans le dossier ciblé.

> [!IMPORTANT]
> Pour une question de praticité, je vous conseille fortement d'extraire ou cloner le projet dans le fichier `htdocs` à la racine de XAMPP

### Installation des dépendances : NPM & Composer

**Installer Composer :**

Attaquons nous à Composer !

Télécharger directement [Composer-setup.exe](https://getcomposer.org/download/) ici, puis installez-le pour tous les utilisateurs.

À la première étape de l'installation, Composer vous demandera si vous souhaitez l'installer en Developer Mode, ça ne sera pas utile, vous pouvez donc passer à la suite.

Lors de la deuxième étapes, vous devrez choisir la "command-line PHP" que nous utiliserons pour ce projet : 

![Capture d’écran 2024-10-24 182630](https://github.com/user-attachments/assets/62e1c99d-2976-44c8-b803-efed2d573455)

Il faudra comme moi, récupérer **php.exe** à l'intérieur du dossier XAMPP, puis vous pourrez passer aux étapes suivantes sans rien modifier !

Rendez-vous maintenant à la racine du projet, et lancez la commande suivante pour installer les dépendances : 

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

Lancer XAMPP en administrateur, pour démarrer les modules Apaches et MySQL un bouton `Start` leur est attribués dans la colonne `Actions`.

Voici à quoi devrait ressembler les services un fois démarrer :

![Capture d’écran 2024-10-26 000953](https://github.com/user-attachments/assets/1ba1b020-6a72-4df2-a91e-d5c74822d120)

Maintenant, cliquer sur le bouton `Admin` du service MySQL, il vous redirigera directement vers PHPMyAdmin !

Vous vous retrouvez maintenant sur le menu principal, cliquer sur le bouton `Importer` se trouvant sur la barre horizontal tout en haut de la page.

Vous vous retrouverez donc ici : 

![Capture d’écran 2024-10-26 001821](https://github.com/user-attachments/assets/8cde5589-4918-403e-9c11-c09033ac4a08)

Parcourez vos fichiers jusqu'à récupérer le fichier SQL importer dans le projet, laisser le jeu de caractères du fichier en UTF-8, et lancer l'importation !

Vous devriez avoir maintenant votre base de donnée à jour, plus qu'à vous rendre sur l'adresse IP local : http://127.0.0.1:8000/ !





