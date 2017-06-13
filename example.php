<?php

# Default language is English
$lang = 'en';
# Setting available languages
$lang_available = array('en','fr','es');
# Verify and change the language
if(isset($_GET['lang']) and in_array($_GET['lang'], $lang_available))
	$lang = $_GET['lang'];

$log = '';

# Is there form datas?
if(isset($_GET['a']) and $_GET['a'] == 'form') {
	# Is name defined?
	if(isset($_POST['name']) and !empty($_POST['name']) and strlen($_POST['name']) < 255) {
		# Are ATTCHAR datas defined?
		if(isset($_POST['attchar_code']) and isset($_POST['attchar_auto'])) {
			# include attchar_get.php
			require($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_get.php');
			# $attchar_ok is TRUE if I am a human, FALSE if I am a robot
			if($attchar_ok)
				$log = 'Dear <i>' . htmlspecialchars($_POST['name']) . '</i>, you are a human&nbsp;!';
			else
				$log = 'I think <i>' . htmlspecialchars($_POST['name']) . '</i> is a robot...';
		}
		else
			$log = 'You must write something in the ATTCHAR field!';
	}
	else
		$log = 'Your name must not be empty and must be shorter than 256 characters.';
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>ATTCHAR test form</title>
		
		<!-- Don't forget to link stylesheet ! -->
		<link rel="stylesheet" href="/attchar/attchar.css" />
	</head>
	<body>
		<div id="page" style="margin-left: 20%;margin-right: 20%;border-left: 1px solid #0080FF;border-right: 1px solid #0080FF;background-color: #E0E0E0;padding: 10px;">
			<h1>ATTCHAR Test Form</h1>
			<p>This page is available in other languages: <a href="?lang=en">English</a> | <a href="?lang=fr">Français</a> | <a href="?lang=es">Español</a></p>
			<p>ATTCHAR form example (<a href="https://zettascript.org">ZettaScript</a> | <a href="https://github.com/ZettaScript">GitHub</a>)</p>
			
			<?php
# display log
if(!empty($log))
	echo '<p autofocus style="border-top: 1px dashed #0080FF;border-bottom: 1px dashed #0080FF;">'.$log.'</p>';
?>
			
			<!-- method must be POST -->
			<form action="?a=form" method="post">
				<label for="f_name">Enter your name:</label>
				<input type="text" name="name" id="f_name" maxlength="255" required /><br />
				<!-- include attchar_form.php -->
				<?php include($_SERVER['DOCUMENT_ROOT'].'/attchar/attchar_form.php'); ?>
				<input type="submit" value="Submit" />
			</form>
			<hr />
			
			<p>Copyright &copy; 2016-2017 ZettaScript, Pascal Engélibert</p>
			<p>This file is part of ATTCHAR.<br />
ATTCHAR is free software: you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.<br />
ATTCHAR is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.<br />
You should have received a copy of the GNU Lesser General Public License along with ATTCHAR. If not, see <a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>.</p>
		</div>
	</body>
</html>	
