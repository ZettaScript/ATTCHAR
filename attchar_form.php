<?php
/*
Copyright (c) 2016 ZettaScript, Pascal Engélibert
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

$code = sha1(date('dNmYHis').strval(rand(-99999,99999))); ?>
<div id="attchar">
<span id="attchar_title">ATTCHAR Verification</span><br />
<input id="attchar_hid" type="hidden" value="<?php echo $code; ?>" name="attchar_auto" autocomplete="off" />
<img id="attchar_img" alt="Image anti-SPAM" src="/attchar/attchar_gen.php?c=<?php echo $code; ?>" onload="attchar_imgld();" />
<input id="attchar_input" type="text" name="attchar_code" maxlength="8" placeholder="Code anti-SPAM" autocomplete="off" onkeyup="attchar_change(this);" value="" style="background-color:white;" required />
<a href="#" onclick="attchar_new();"><img id="attchar_new" style="display:none;" alt="Nouvelle image" src="/attchar/images/reload.png" /></a>
<a href="#" onclick="attchar_audio();"><img id="attchar_audiojs" style="display:none;" alt="Écouter l'audio" src="/attchar/images/audio.png" /></a>
<a id="attchar_audio" href="/attchar/attchar_audio.php?c=<?php echo $code; ?>" target="_blank" title="Écouter l'audio mp3" style="display:inline-block;"><img alt="Écouter l'audio" src="/attchar/images/audio.png" /></a>
<p class="attchar_text">Veuillez recopier les huit caractères ci-dessus afin de prouver que vous n'êtes pas un robot.</p>
<script type="text/javascript" src="/attchar/attchar.js"></script>
</div>
