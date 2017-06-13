<?php
/*
Copyright (c) 2016-2017 ZettaScript, Pascal Engélibert
This file is part of ATTCHAR.

	ATTCHAR is free software: you can redistribute it and/or modify
	it under the terms of the GNU Lesser General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	ATTCHAR is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Lesser General Public License for more details.

	You should have received a copy of the GNU Lesser General Public License
	along with ATTCHAR.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once('locales.php');
$code = sha1(date('dNmYHis').strval(rand(-99999,99999))); ?>
<div id="attchar">
<script type="text/javascript">
var attchar_lang = "<?php echo $lang; ?>";
var tr_placeholder = "<?php echo $tr['PLACEHOLDER']; ?>";
var tr_placeholder_conn = "<?php echo $tr['PLACEHOLDER_CONN']; ?>";
var tr_placeholder_load = "<?php echo $tr['PLACEHOLDER_LOAD']; ?>";
var tr_placeholder_err = "<?php echo $tr['PLACEHOLDER_ERR']; ?>";
</script>
<input id="attchar_hid" type="hidden" value="<?php echo $code; ?>" name="attchar_auto" autocomplete="off" />
<img id="attchar_img" alt="<?php echo $tr['IMG_ALT']; ?>" src="/attchar/attchar_gen.php?c=<?php echo $code; ?>" onload="attchar_imgld();" />
<a href="https://zettascript.org/pro/attchar/about.php" title="<?php echo $tr['WHAT_TITLE']; ?>" target="_blank"><img id="attchar_about" alt="<?php echo $tr['WHAT_ALT']; ?>" src="/attchar/images/about.png" /></a>
<label for="attchar_input" id="attchar_label"><?php echo $tr['LABEL']; ?></label>
<input id="attchar_input" type="text" name="attchar_code" maxlength="8" placeholder="<?php echo $tr['PLACEHOLDER']; ?>" autocomplete="off" onkeyup="attchar_change(this);" value="" style="background-color:white;" required />
<a href="#" onclick="attchar_new();" title="<?php echo $tr['BT_NEW']; ?>"><img id="attchar_new" style="display:none;" alt="<?php echo $tr['BT_NEW']; ?>" src="/attchar/images/reload.png" /></a>
<a href="#" onclick="attchar_audio();" title="<?php echo $tr['BT_SND']; ?>"><img id="attchar_audiojs" style="display:none;" alt="<?php echo $tr['BT_SND']; ?>" src="/attchar/images/audio.png" /></a>
<a id="attchar_audio" href="/attchar/attchar_audio.php?c=<?php echo $code.'&lang='.$lang; ?>" target="_blank" title="<?php echo $tr['BT_SND']; ?>" style="display:inline-block;"><img alt="<?php echo $tr['BT_SND']; ?>" src="/attchar/images/audio.png" /></a>
<script type="text/javascript" src="/attchar/attchar.js"></script>
</div>
