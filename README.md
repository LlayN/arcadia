## Déployer l'application en local

> [!NOTE]
> Attention, Windows est utilisé pour ce tutoriel, je vous laisse donc adapter le déploiement à votre OS, vous trouverez toutes la documentation nécessaire des services utilisés.

### Installation de XAMPP - Disponible pour Windows, Mac & Linux

XAMPP est un logiciel, qui regroupe un ensemble de services permettant de mettre en place un environnement Web Local.

Pour le télécharger, c'est simple, il suffit de nous rendre directement sur ce [lien](https://www.apachefriends.org/fr/download.html), et séléctionner la plateforme de votre choix ! 

Une fois télécharger, installer le tout en laissant la configuration tel quel.


### Installation des dépendances : NPM & Composer


**Installer NPM :**

Pour récupérer NPM, nous pouvons passer par le [Prebuilt Installer](https://nodejs.org/en/download/prebuilt-installer) de Node.js, qui inclut NPM à l'installation.
Vous pouvez laisser la configuration par défaut à l'installation.

**Installer Composer :**

Passons maintenant à Composer !

Télécharger directement [Composer-setup.exe](https://getcomposer.org/download/) ici, puis installer-le pour tous les utilisateurs.

À la première étape de l'installation, Composer vous demandera si vous souhaitez l'installer en Developer Mode, ça ne sera pas utile, vous pouvez donc passer à la suite.

Lors de la deuxième étapes, vous devrez choisir la "command-line PHP" qu'on utilisera : 

![Capture d’écran 2024-10-24 182630](https://github.com/user-attachments/assets/62e1c99d-2976-44c8-b803-efed2d573455)

Il faudra comme moi, récupérer **php.exe** à l'intérieur du dossier XAMPP, puis vous pouvez passer aux étapes suivantes sans rien modifier !

### Installation de la CLI Symfony avec Scoop

Pour simplifié l'installation de Symfony, nous utiliseront Scoop qui est un installateur pour Windows.
Scoop s'installe très facilement, il suffit d'ouvrir un terminal PowerShell, et d'y insérer ces lignes : 
``` Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression ```



