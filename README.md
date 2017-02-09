# ATTCHAR
## Instructions (English)
### Install ATTCHAR
ATTCHAR requires PHP with the PDO module and MySQL.

Put the attchar directory at the root of your website (accessible by the web at "/attchar/").
Create a table with the SQL command:

	CREATE TABLE `attchar` (`id` int(11) NOT NULL, `hashcode` varchar(80) NOT NULL, `expire` int(11) NOT NULL, `haship` varchar(40) NOT NULL, `code` varchar(8) NOT NULL);
	ALTER TABLE `attchar` ADD PRIMARY KEY (`id`);
	ALTER TABLE `attchar` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

Modify database.php with the connection informations of your database.

### Use ATTCHAR in a form
You just need to include attchar_form.php into the form.
Paste this PHP code into the form:
	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_form.php'); ?>

Warning: please use POST, not GET (method="post").

Don't forget to include the CSS stylesheet in the header:
	<link rel="stylesheet" href="/attchar/attchar.css" />

### Get form datas
You just need to include attchar_get.php in the file receiving the form datas.
Paste this PHP code:
	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_get.php'); ?>

A variable $attchar_ok is created by this script.
It is true if you are a human, false if you are a robot.
Warning: You must verify if the POST parameters are set:
	isset($_POST['attchar_auto']) and isset($_POST['attchar_code'])

See example files test1.php and test2.php for more infos.

## Instructions (Français)
### Installer ATTCHAR
ATTCHAR nécessite PHP avec le module PDO et MySQL.

Placez le dossier attchar à la racine de votre site (accessible depuis internet par "/attchar/").
Créez une table avec la commande SQL suivante:

	CREATE TABLE `attchar` (`id` int(11) NOT NULL, `hashcode` varchar(80) NOT NULL, `expire` int(11) NOT NULL, `haship` varchar(40) NOT NULL, `code` varchar(8) NOT NULL);
	ALTER TABLE `attchar` ADD PRIMARY KEY (`id`);
	ALTER TABLE `attchar` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

Modifiez le fichier database.php avec les informations de connexion de votre base de données (nom, utilisateur, mot de passe).

### Inclure ATTCHAR dans un formulaire
Il suffit d'inclure le fichier attchar_form.php dans un formulaire.
Collez ce code PHP à l'emplacement voulu dans un formulaire:
	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_form.php'); ?>

Attention: le formulaire doit utiliser POST et non GET (method="post").

N'oubliez pas d'inclure aussi la feuille de style CSS dans l'entête du document:
	<link rel="stylesheet" href="/attchar/attchar.css" />

### Récupérer les données du formulaire
Il suffit également d'inclure le fichier attchar_get.php dans le fichier recevant le formulaire.
Collez ce code PHP à l'emplacement voulu:
	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_get.php'); ?>

Une variable $attchar_ok est créée par ce script.
Elle vaut true si le test a été passé avec succès (si l'utilisateur est bien un humain) et false sinon (si c'est un robot).

Attention: il faut vérifier avant d'inclure attchar_get.php que les paramètres POST sont bien déclarés:
	isset($_POST['attchar_auto']) and isset($_POST['attchar_code'])

Examinez les fichier d'exemple test1.php et test2.php pour plus de détails.
