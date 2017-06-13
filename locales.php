<?php
if(isset($lang) and file_exists('locales/'.$lang.'.php')) require('locales/'.$lang.'.php');
else require('locales/en.php');
?>
