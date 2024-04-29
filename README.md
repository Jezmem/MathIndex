Lien du cahier des charges : [CDC_-_MathIndex.pdf](https://github.com/Jezmem/MathIndex/files/14719569/CDC_-_MathIndex.pdf)
# Mathindex
Projet de fin d'année de bts 2
Ce projet a pour but de créer une plateforme où les étudiants et les enseignants pourront mettre à disposition des exercices avec leurs corrections, ainsi que les matières et thématiques correspondantes.

Technologies utilisées :

- Version de Symfony : 6.3.12
- Version de PHP : 8.2.4

- Utilisateurs rôles : 

- ["ROLE_ADMIN"] : -> admin 
- ["ROLE_STUDENT"] -> étudient 
- ["ROLE_TEACHER"] -> enseigant 

  1 - Initialisez le projet en exécutant la commande suivante à la racine du projet :

  composer install

  2 - Créez et initialisez la base de données :
  php bin/console d:d:c
  php bin/console d:s:u --force
  php bin/console d:f:l -n

  3 - Acces au site :

  http://localhost:8000/

  
