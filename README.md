# ATTCHAR
## Instructions (English)
### Install ATTCHAR
ATTCHAR requires PHP with the PDO module and MySQL.

Put the attchar directory at the root of your website (accessible by the web at "/attchar/").
Create a table with the SQL command:

	CREATE TABLE `attchar` (`id` int(11) NOT NULL, `hashcode` varchar(80) NOT NULL, `expire` int(11) NOT NULL, `haship` varchar(40) NOT NULL, `code` varchar(8) NOT NULL);
	ALTER TABLE `attchar` ADD PRIMARY KEY (`id`);
	ALTER TABLE `attchar` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

Modify _database.php_ with the connection informations of your database.

### Use ATTCHAR in a form
You just need to include _attchar_form.php_ into the form.
Paste this PHP code into the form:

	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_form.php'); ?>

Warning: please use POST, not GET (method="post").

Don't forget to include the CSS stylesheet in the header:

	<link rel="stylesheet" href="/attchar/attchar.css" />

### Get form datas
You just need to include _attchar_get.php_ in the file receiving the form datas.
Paste this PHP code:

	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_get.php'); ?>

A variable _$attchar_ok_ is created by this script.
It is _true_ if you are a human, _false_ if you are a robot.
Warning: You must verify if the POST parameters are set:

	isset($_POST['attchar_auto']) and isset($_POST['attchar_code'])

See the example file _example.php_ for more infos.

### Use the mini interface
A compact sized form is available. To integrate it in your site, follow the instructions:

Replace the stylesheet link by this one:

	<link rel="stylesheet" href="/attchar/attchar_mini.css" />

Use this PHP line instead :

	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_mini_form.php'); ?>

### Change the language
Change the ATTCHAR language is very simple:
The variable _$lang_ must be defined before _attchar_form.php_. It must contain the language code ('en' for English, 'fr' for French, etc).
The available languages are in the repertory locales.
If _$langdetect_ exists and is _true_, the script will automatically detect the browser's preferred language.

## Instructions (Français)
### Installer ATTCHAR
ATTCHAR nécessite PHP avec le module PDO et MySQL.

Placez le dossier attchar à la racine de votre site (accessible depuis internet par "/attchar/").
Créez une table avec la commande SQL suivante:

	CREATE TABLE `attchar` (`id` int(11) NOT NULL, `hashcode` varchar(80) NOT NULL, `expire` int(11) NOT NULL, `haship` varchar(40) NOT NULL, `code` varchar(8) NOT NULL);
	ALTER TABLE `attchar` ADD PRIMARY KEY (`id`);
	ALTER TABLE `attchar` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

Modifiez le fichier _database.php_ avec les informations de connexion de votre base de données (nom, utilisateur, mot de passe).

### Inclure ATTCHAR dans un formulaire
Il suffit d'inclure le fichier _attchar_form.php_ dans un formulaire.
Collez ce code PHP à l'emplacement voulu dans un formulaire:

	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_form.php'); ?>

Attention: le formulaire doit utiliser POST et non GET (method="post").

N'oubliez pas d'inclure aussi la feuille de style CSS dans l'entête du document:

	<link rel="stylesheet" href="/attchar/attchar.css" />

### Récupérer les données du formulaire
Il suffit également d'inclure le fichier _attchar_get.php_ dans le fichier recevant le formulaire.
Collez ce code PHP à l'emplacement voulu:

	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_get.php'); ?>

Une variable _$attchar_ok_ est créée par ce script.
Elle vaut _true_ si le test a été passé avec succès (si l'utilisateur est bien un humain) et _false_ sinon (si c'est un robot).

Attention: il faut vérifier avant d'inclure _attchar_get.php_ que les paramètres POST sont bien déclarés:

	isset($_POST['attchar_auto']) and isset($_POST['attchar_code'])

Examinez le fichier d'exemple _example.php_ pour plus de détails.

### Utiliser l'interface mini
Un formulaire de taille réduite est disponible. Pour l'intégrer dans vos pages, procédez comme suit:

Remplacer le lien vers la feuille de styles par celui-ci:

	<link rel="stylesheet" href="/attchar/attchar_mini.css" />

Inclure le fichier PHP suivant à la place de l'autre:

	<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_mini_form.php'); ?>

### Changer la langue
Changer la langue de ATTCHAR est très simple:
La variable _$lang_ doit être définie avant _attchar_form.php_. Elle doit contenir le code de la langue souhaitée ('en' pour anglais, 'fr' pour français, etc).
Les langues disponibles sont dans le dossier locales.
Pour que le script détecte automatiquement la langue du client, mettez _$langdetect_ à _true_.
