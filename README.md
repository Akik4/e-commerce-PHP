# Level 4 - La connexion à la base de donnée

1. Unzip

2. Ajoutez un fichier `src/db.php` qui s'occupera de la connexion à la DB

3. Créez une connexion à la BDD, avec PDO.

4. Faire en sorte que le formulaire d'inscription ajoute un utilisateur en DB

5. Pouvoir se connecter avec un utilisateur enregistré en DB

6. N'oubliez pas de hasher les mots de passe (avec la fonction `hash` ou `password_hash`) (Attention, elles ne fonctionnent pas pareil).

7. Créer un CRUD (Ajouter, Mettre à jour, supprimer, et lister) d'un logiciel de bibliothèque.
  
Une fois connecté, un utilisateur doit pouvoir créer, modifier ou supprimer un livre se trouvant en base de donnée.

- Un formulaire pour créer
- Un formulaire pour éditer
- Un bouton sur la liste des livres pour supprimer

BONUS:
- Trier les livres par `updated_at`. (Sur la même page, grâce à un paramètre d'URL)
- Filtrer les livres dispo / non dispo. (Sur la même page, grâce à un paramètre d'URL)

## Schema SQL du livre
Un livre est défini comme suit:
- id (INT AUTO-INCREMENT)
- name (VARCHAR 255)
- price (DECIMAL 8,2)
- available (BOOLEAN)
- updated_at (DATETIME)
- updated_by (INT (RELATION to users.id))

## Pour lancer ce projet sans MAMP ou autre

Installez Docker, ensuite faites la commande `docker compose up` dans votre terminal (en étant dans ce dossier)
Cela pourrait vous être très utile pour le projet de la semaine afin d'évier certains problèmes récurrents.

## Sinon: Installez...

- MacOS = MAMP
- Windows = WAMP
- Linux = XAMPP / LAMP / hand-made / ...
