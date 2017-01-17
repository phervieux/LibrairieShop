# Projet LibrairieShop
Le cahier des charges se trouve dans le ficher cahier_charges.pdf. Malheureusement, il n'est pas possible de travailler avec un serveur LAMP.

# Version
Nous devons utiliser PHP-5.5. Un paquet existe dans Debian et il faut utiliser le programme downgrade dans les distributions similaires à Arch Linux.
La version du serveur MySQL doit être la 5.6.

# MySQL
* Afin de construire la DB MySQL exécuter les scripts suivants dans vos environnements de développement, après avoir créé l'utilisateur projet151:
```
$ mysql -u projet151 -p < LibrairieShop/DATABASE/projet151.sql
$ mysql -u projet151 -p < LibrairieShop/DATABASE/fixed_data_projet151.sql
```
* Pas besoin d'utiliser les CSV à RDUF

Si vous n'avez pas créé l'utilisateur projet151, voici la procédure:
```
$ mysql -u <USER> -p
CREATE USER "projet151"@"localhost";
SET PASSWORD FOR "projet151"@"localhost" = password("projet151");
SOURCE /home/pherjung/programmation/php/LibrairieShop/DATABASE/projet151.sql
GRANT ALL ON projet151.* TO "projet151"@"localhost";
```

# Access
Dans le cadre du cours, le serveur UwAmp est fourni par l'enseignant.
Pour pouvoir interagir avec Access, il faut donc installer la bonne version d'Access Database Engine.
Cliquez [ici](https://download.microsoft.com/download/2/4/3/24375141-E08D-4803-AB0E-10F2E3A07AAA/AccessDatabaseEngine.exe) pour l'installer.

# FLUX RSS 
* Petit topo:

* Il faut ajouter une ligne de code de la page d'accueil dans la section "<header></header>": link blabla... C'est fait.

* Le lien pointe vers le fichier libraryFlux.xml, c'est le fichier que lit le 'feed reader' du client. Il doit être mis à jour chaque fois qu'on
ajoute un livre dans le shop. Avec Firefox, lorsqu'on est dans la page d'accueil, il faut appuyer sur 'alt' pour afficher une barre de menu
tout en haut de l'écran. Dans "marques-pages", il suffit de cliquer sur "s'abonner à". Si le lien est grisé, c'est que le site
ne diffuse pas de news. Chez moi ça marche (dufour). Avec Opera, il y a un menu 'news'. Ajouter l'adresse du fichier de news.
Le fichier .xml contient deux entrées bidon pour l'instant.
