# Charte de Développement
* controller les inputs –> taille + type (aA-zZ 0-9)
* infos doivent correspondre à la réalité (npa, city, etc.) utiliser des API ou table avec npa et city
* Faire des logs!!! - bonus???
* Gestion des articles et commentaires en Mysql

/!\ Chaque UserStory possède 3 tâches en général (model, view, controller), à chaque assigné de l'userstory de créer les tâches!!!

# User Stories
* [FE] Moi: visiteur, veux: ajouter des articles dans le panier
* [FE] Moi: visiteur, veux: visualiser le panier
* [FE] Moi: visiteur, veux: suivre les nouveaux articles par RSS
* [FE] Moi: visiteur, veux: terminer ma commande (création de compte obligatoire lors de la commande + captcha + Salt SHA1 "i;151#")
* [FE] Moi: client auhentifié, veux: Modifier mon profile
* [FE] Moi: client auhentifié, veux: voir mes commandes ainsi que leur état
* [FE] Moi: client auhentifié, veux: Exporter pdf avec résumé de commande (Affichage différent de celle du web)
* [FE] Moi: client auhentifié, veux: Ajouter des articles au panier
* [FE] Moi: client auhentifié, veux: Terminer ma commande
* [FE] Moi: client auhentifié, veux: commenter un article afin de partager mon avis (uniquement sur articles commandés et reçus + captcha + afficher date, heure et nom auteur)
* [FE] Moi: client non authentifié, veux: changer mon mdp perdu (mail, nom, prénom, date de naissance requis) - BONUS?
* [BE] Moi: admin auhentifié, veux: Ajouter un article
* [BE] Moi: admin auhentifié, veux: Soft delete un article
* [BE] Moi: admin auhentifié, veux: Modifier un article
* [BE] Moi: admin auhentifié, veux: Changer le status des commandes (en traitement, en livraison, en attente du paiement, livré, payé, livré et payé, litige)
* [BE] Moi: admin auhentifié, veux: Modifier tous les clients
* [BE] Moi: admin auhentifié, veux: Modifier le profil d'un client
* [BE] Moi: admin auhentifié, veux: Activer/désactiver un client
* [BE] Moi: admin auhentifié, veux: Afficher tous les administrateurs
* [BE] Moi: admin auhentifié, veux: Créer des administrateurs 
  * Créer admin de base:  username : "rogeiroa" password: "arogeiro"
* [BE] Moi: admin auhentifié, veux: Activer/Désactiver des administrateurs
* [BE] Moi: admin auhentifié, veux: Modifier les données des administrateurs
* [BE] Moi: admin auhentifié, veux: Masquer des commentaires
* [BE] Moi: admin auhentifié, veux: Supprimer des commentaires
* [BE] Moi: admin auhentifié, veux: Afficher tous les commentaires
