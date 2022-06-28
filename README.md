# Test Hellocse

Dans le cadre d'un test pour Hellocse
***
À l’aide du framework PHP Laravel 9, créer :
- Un backoffice permettant de créer/modifier/supprimer les fiches « star » (nom, prénom, image, description)
- Une page publique permettant d’afficher de manière responsive sur mobile et desktop le contenu des fiches.
Indications :
- L’utilisation de VueJS 3 et de TailwindCSS est un plus
- N’hésitez pas à commenter votre code et créer des commits sur git au fur et à mesure de votre progression

***

### Mes objectifs :

### Développer la partie front-end
1. HTML site dynamique et adaptable
2. CSS et utilisation de Bootstrap et de Tailwind

### Développer la partie back-end
1. Créer une base de données MySQL
2. Utilisation de PHP pour création admin

***
## Installation
Certains prérequis seront nécéssaire pour un bon démarrage du projet, il vous faudra :

- Xampp / Wampp
- Un serveur : Apache2
- php : v8.x fortement conseillé

### Initialiser le projet
Pour initiliser le projet il vous faut vous diriger dans mon repositrory github https://github.com/Henrissat/Hellocse. Vérifier que vous êtes bien sur la branch principal "main" et cliquer sur le bouton Code situé en haut à droite, puis "Download ZIP".
Dezipper le project sur votre machine.
Ou vous pouvez directement utiliser dans votre terminal la commande :

```bash
git clone https://github.com/Henrissat/Hellocse
```
Lancer Xammp ou wamp ou tout autre serveur local. Depuis votre logiciel VsCode ou équivalent mettez vous dans le dossier Hellocse 
```bash
cd hellocse
```

Le fichier Hellocse doit être placé dans le fichier htdocs de Xampp.
Il vous faudra vous créer votre propre base de données Hellocse en gardant bien les noms des entitées (nom, description, img) ou bien importer dans votre base de données le fichier stars.sql présent dans le zip.

### Lancer le projet 
Il suffira de lancer le fichier index.php dans un navigateur