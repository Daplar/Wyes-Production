# wyes-prod

Ce document est celui expliquant comment installer et utiliser le site :

(les explications sur le fonctionnement du code seront accompagnés quelque fois d'éclaircissement sur nos décision et
nos choix sur la partie du code concernée)

Information importantes : la base de données a été codéé sur MYSQL et il y a actuellement 7 tables avec 2 contraintes de clé étrangère, le site lui a été codéé en architecture MVC avec les langages PHP,HTML,CSS et JavaScript
(ces 2 choix sont expliqués plus tard dans le code)

I.Installation de la BDD

(La BDD à été codée en MYSQL car c'est le format que nous maîtrisons le mieux et possède 7 tables car nous avons tenté de respecter les exigences tout en limitant le nombre de données et la consommation de celles-ci )

Tout d'abord, la première étape est d'initialiser la base de données, pour cela il faut soit utiliser WAMP (ce qui est
ce qu'on a fait pour le projet) ou alors utiliser directement PHP My Admin sans passer par WAMP, enfin il est
également possible de mettre en place la base de données sur un serveur (mais n'ayant aucune connaissance là-dessus, ce cas ne sera pas abordée ici). En passant par PHP My Amdin il suffit simplement d'importer le script contenue dans le dossier BDD appelé "database_wyes.sql" et cela devrait fonctionnner. Avec WAMP, il faut d'abord évidemment posséder WAMP et l'activer (ou l'installer si ce n'est pas déjà fait) ensuite placer le ZIP du site dans le répertoire
"www" de WAMP) ensuite il faut aller dans la console MYSQL de WAMP, puis se connecter (souvent user="root" mdp="") ensuite il faut créer la database et aller "dedans" avec la commande "use nomBD", enfin il faut faire la commande "source chemin vers le script" (le chemin vers le script sera probablement quelque chose du genre "C:\wamp\www\wyes\bdd\database_wyes.sql"). Et voilà, la BDD est mis en place!
(Nous avons préféré dévelloper le site en local pour nous permettre de travailler dans un envirronement plus familier)

II. Mis en place du site

(le site a été codé en architecture MVC en utilisant du PHP,HTML,CSS et JavaScript car là aussi nous avons décidé que c'est le format qui nous permettait de mieux respecter les exigences des clients tout en nous permettant de coder dans un contexte que nous connaissons)

Pour mettre en place le site il faut soit installer un dossier "public_hmtl" (de préférence) et se diriger vers le site en changeant l'url (cette option est très "rigide" et simple, elle ne sera donc pas trop dévelloper ici ) ou alors il est possible d'utiliser WAMP, en allant dans localhost et en sélectionnant le dossier du projet puis index.php
(là aussi il est possible d'installer le site via un serveur en important les fichiers). Une fois le site installé, il est temps de l'utiliser.

III. Utilisation du site

Le site possède différentes fonctionnalités, ici nous en expliqueront la plupart avec le cheminement dans le code pour certains. La première page affichée est la page d'acceuil, la fonction la plus importante sur cette page est la variable mise en gras (le reste est simplement du HTML et CSS) qui détermine le nombre de produits dans la BDD ( avec une requête count) chacune des variables sur le site est obtenue de la même manière : le controleur calcule la valeur de la variable via le model et ensuite l'affiche en utilisant la vue. Le site comprend 5 sections : l'acceuil (qu'on vient de voir), le suivie des produits, la gestion des patients, la production, la gestion des utilisateurs.

1) Suivi Produit : cette page comme son nom l'indique sert à suivre l'évolution des produits, vous pouvez obtenir les infos du produit que vous rechercher via la barre de recherche ou alors en sélectionnant un critère puis en rentrant la valeur de ce critère, le code fonctionne pour la barre de recherche avec dans le model un marqueur de place sur l'id (pour assurer la sécurité du site) et la fonction retourne tous les produits grâce à la requête dans une table html et chacune des barre de recherches du site fonctionnement de la même manière. Pour la partie des critères, nous avons d'abord créer une fonction qui récupérer les colonnes de la table produit puis nous les avons affichés dans la vue, enfin dans le model nous avons été forcé de créer une fonction qui n'utilisait pas les marqueurs de places (car nous n'avons pas trouver d'autre moyen de faire marcher la fonction autrement), nous avons décider de prendre ce risque afin de permettre à l'utilisateur de rechercher des produits en fonction de critères de la table.

2) Gestion Patient : cette page a pour but de permettre au membre de l'ONG de gérer les patients de l'entreprise, la fonction principale est celle organisant la pagination des patients dans la base de données (il y a aussi celle de recherche de patient à partir de leur nom mais elle suit la même logique que celle vue plutôt). D'abord le controlleur va chercher les lignes en les séparant avec un offset défini en dur dans le code (pour ne pas permettre à quelqu'un de malveillant de créer d'erreur) en suite il appelle la vue qui appelle avec une boucle les pages et les modifie selon la page active.

3) Production : Il y a de nombreuses fonctionnalités sur cette page : vous pouvez soit choisir de "produir" (les ajouter dans la base de données) des composants ou des produits, ici on parlera de la section "produit" car c'est celle qui possède les plus de fonctionnalités. Vous pouvez donc ajoutez un composant (dans le code la vue appelle le controleur qui vérifie les données et les ajoutent dans la bdd en utilisant des marqueurs de places) et les supprimer ou modifier en cliquant soit sur le stylo ou sur la croix rouge. Il est également possible de modifier la quantité la quantité la quantité des compoants selon leur type, c'est ici que la table nom_comp sert, en l'utilisant pour les affficher dans la liste déroulante et quand un nouveau type de composant est ajouté, il apparaît directement dans la liste déroulante sans toucher au code.

4) Gestion Utilisateur : ici le principe de cette page est la même que celle de "gestion patient", veuillez donc vous référez à cette section pour plus d'informations sur cette page.

5) En-tête et pied de page : l'en-tête est composé d'une image redirigeant vers l'acceuil grâce à un hyperlien dans le HTML ainsi que 2 images ouvrant dans un nouvel onglet les pages des réseau sociaux de l'entreprise. Il y également les boutons "se connecter" et "créer un compte"  les utilisateurs peuvent s'identifier et il est possible d'archiver leurs acions et de les autoriser à faire certaines choses ou pas. Concernant le pied de page, il y a les informations de contact et le lien vers le site officiel suivis des politiques des conditions d'utilisation et de gestion des cookies.

IV. Informations complémentaires

Vous pouvez obtenir plus d'informations grâce au rapport écrit qui vous a été envoyé par mail, ou alors en nous contactant directement par mail wyes.prod.lannister@gmail.com et sur la conversation whats app
