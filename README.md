# Techniques d'interaction avec la base de donnés en PHP

## Informations

> Veiller à vérifier les informations de connexion à la base de données avant d'exécuter les scripts.

> Toutes les requêtes sur la base de données sont préparées, avec des paramètres de requêtes le cas échéant. 
>
> Ceci permet d'éviter les injections SQL.

## Description des différentes pages

### - index.php

La page **index.php** affiche une liste d'événements stockés dans la base de données (*gestion_evenements.sql*).

On y trouve une requête 
```sql 
SELECT * FROM evenement
```
qui récupère tous les événements.
Les événements sont ensuite stockés avec la méthode *fetchAll()* dans un tableau que l'on parcourt avec une boucle *foreach*.

---

### - detailsEvenement.php

La page **detailsEvenement.php** affiche un évenement.

La requête SQL 
```sql
SELECT * FROM evenements_utilisateurs_lieux WHERE id_evenement=:id
```
permet de récupéré un événement par son champ *id_evenement*.

---

### - connexion.php

La page **connexion.php** affiche un formulaire de connexion validé par le script **signin.php**.
Les champs sont vérifiés et traités dans **sigin.php**.

On vérifie si l'email est correct, puis on vérifie le mot de passe.

---

### - inscription.php

La page **inscription.php** affiche un formulaire d'inscription validé par le script **register.php**.

On utilise dans **register.php** la fonction PHP *htmlspecialchars* qui empêche les *injections de code Javascript*.

On utilise une requête préparée *INSERT INTO* avec des paramètres.

---

## Requêtes SQL

Des requêtes sont présentes sous la forme de *vues* dans la base de données.

Il y a d'autres requêtes dans le fichier *requetes.md*.
