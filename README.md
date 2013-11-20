Module de Devis en ligne SCGB
====================================


Environment
-----------
On WAMP 
```
#Pour apache :
Faites clic-gauche sur l’icône de Wamp dans la barre des tâches > Apache > Apache Modules > sélectionnez « Rewrite Module »
#Pour les modules php :
clic-gauche sur l’icône de Wamp > PHP > PHP Extensions > cochez « php_intl », « php_xmlrpc », « php_pdo_mysql », « php_sqlite3″, « php_mbstring »
```

On LAMP 
```
#Pour Lamp : 
Skip Download and Extract Go directly to prepare
http://www.joelverhagen.com/blog/2011/05/how-to-configure-symfony-2-0-on-ubuntu-server-2011-4/
```

Paramétrage du système avant utilisation
-----------

#Génération de la bases de données :
aller dans le répertoire du projet SCGB/Symfony en console(niveau des dossiers app,bin,src,web...) et entrée la ligne de commande suivante
php app/console doctrine:schema:update --force
Il est possible que la commande soit refuser si vous avez paramétrer l'accès à votre MySQL, renseigner les paramètres de votre BDD dans le fichier suivant puis relancer la commande précédente:
SCGB/Symfony/app/config/parameters.yml

#Charger en SQL le fichier work.sql présent au même niveau (SCGB/Symfony)

#La route à charger et la suivante pour accéder à l'application en développement:
http://localhost/SCGB/Symfony/web/app_dev.php/devis/new
