<?php
# Autodetect browser language
if(isset($langdetect) and $langdetect) {
	$langd = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	# Client can modify HTTP headers and modify the file path
	# So we must verify $langd
	if(preg_match('#[a-zA-Z_]{2}#i', $langd))
		$lang = $langd;
}

if(isset($lang) and file_exists($_SERVER['DOCUMENT_ROOT'].'/attchar/locales/'.$lang.'.php')) {}
else $lang = 'en';
require('locales/'.$lang.'.php');
?>
