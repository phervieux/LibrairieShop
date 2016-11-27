/*Charge les titres des livres issus de la collection personnelle de M. Dufour, qui nous la gracieusement prêtée*/

/*T_Livre_exported contient les noms des genres*/
LOAD DATA INFILE 'T_Livre_exported.csv' INTO TABLE book COLUMNS TERMINATED BY ';' LINES TERMINATED BY '\r\n' (id, title, genre);
/* T_livre_IDGENRE contient l'id correspondant au genre explicitement écrit dans le fichier d'avant avec*/
/* les titres des colonenes en première ligne*/
LOAD DATA INFILE 'T_Livre_IDGENRE.csv' INTO TABLE book COLUMNS TERMINATED BY ';' LINES TERMINATED BY '\r\n' ignore 1 lines  (id, title, genre);
/*Charge les types , genres de livres*/
LOAD DATA INFILE 'T_Type.csv' INTO TABLE type COLUMNS TERMINATED BY ';' LINES TERMINATED BY '\r\n' (id, name);