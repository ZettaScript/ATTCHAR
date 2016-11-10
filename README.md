# ATTCHAR
An accessible anti-bots test.

## Instructions (Français)
### Installer ATTCHAR
Placez le dossier attchar à la racine de votre site.
Créez une table avec la commande SQL suivante:
CREATE TABLE 'zettamain'.'attchar' ( 'id' INT(11) NULL AUTO_INCREMENT , 'hashcode' VARCHAR(80) NOT NULL , 'expire' INT(11) NOT NULL , 'haship' VARCHAR(70) NOT NULL , 'code' VARCHAR(8) NOT NULL , PRIMARY KEY ('id')) ENGINE = InnoDB;
(aller dans la source du fichier README pour accéder à la commande SQL sans la mise en forme de GitHub)

Modifiez le fichier database.php avec les informations de connexion de votre base de données.

### Inclure ATTCHAR dans un formulaire
Il suffit d'inclure le fichier attchar_form.php dans un formulaire.
Collez ce code PHP à l'emplacement voulu dans un formulaire:
<?php include('attchar_form.php'); ?>

Attention: le formulaire doit utiliser POST et non GET (method="post").

Il suffit également d'inclure le fichier attchar_get.php dans le fichier recevant le formulaire.
Collez ce code PHP de préférence au début du fichier:
<?php include('attchar_get.php'); ?>

Une variable $attchar_ok est créée par ce script.
Elle vaut true si le test a été passé avec succès (si l'utilisateur est bien un humain) et false sinon (si c'est un robot).

Attention: il faut vérifier avant d'inclure attchar_get.php que les paramètres POST sont bien déclarés:
isset($_POST['attchar_auto']) and isset($_POST['attchar_code'])
