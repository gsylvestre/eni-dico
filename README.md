# Dico québécois 

Ce dépôt contient pour l'instant : 
- Un export de la bdd, avec les termes, les exemples et les catégories
- Les entités correspondantes, et leur Repository

### Installation 

Dans le terminal : 
```
cd /wamp64/www
git clone https://github.com/gsylvestre/eni-dico.git dico
cd dico
composer install
```

- Créer et configurer un fichier .env.local à la racine du projet, pour la connexion à la bdd
- Aller dans PHPmyAdmin, et importer le fichier qui se trouve ici dico/db_dumps/dico.sql pour créer la bdd

Naviguer vers http://localhost/dico/public/ dans le navigateur.
