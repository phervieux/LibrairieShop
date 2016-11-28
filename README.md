# Projet LibrairieShop
Le cahier des charges se trouve dans le ficher cahier_charges.pdf.

# Version
Nous devons utiliser PHP-5.6. Un paquet existe dans Debian et il faut utiliser le programme downgrade dans les distributions similaires à Arch Linux.
La version du serveur MySQL doit être la 5.6.

# Database
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

_écrit par DMIR le 28.11.2016_
