<?php
if(isset($lang) and file_exists('locales/'.$lang.'.php')) {}
else $lang = 'en';
require('locales/'.$lang.'.php');
?>
