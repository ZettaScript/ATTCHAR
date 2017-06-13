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

var audio;
function attchar_imgld() {
	document.getElementById('attchar_input').disabled=false;
	document.getElementById('attchar_input').placeholder = tr_placeholder;
	try {audio = new Audio("/attchar/attchar_audio.php?c="+document.getElementById("attchar_hid").value+"&lang="+attchar_lang);}
	catch(e) {audio = null;}
	if(audio) {
		document.getElementById("attchar_audio").style.display = "none";
		document.getElementById("attchar_audiojs").style.display = "inline-block";
	}
}
function getHttpRequest() {
  var httpRequest = false;
  if(window.XMLHttpRequest) {
    httpRequest = new XMLHttpRequest();
    if(httpRequest.overrideMimeType) httpRequest.overrideMimeType('text/plain');
  }
  else if(window.ActiveXObject) {
    try {httpRequest = new ActiveXObject("Msxml2.XMLHTTP");}
    catch(e) {
      try {httpRequest = new ActiveXObject("Microsoft.XMLHTTP");}
      catch(e) {}
    }
  }
  if(!httpRequest)
    return false;
  document.getElementById("attchar_new").style.display = "inline-block";
  return httpRequest;
}
var xhr = getHttpRequest();
function attchar_new() {
	xhr.open('GET', '/attchar/attchar_new.php', true);
	xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
	xhr.send();
	var obj = document.getElementById("attchar_input");
	obj.value = "";
	obj.disabled = true;
	obj.placeholder = tr_placeholder_conn;
	obj.style = "background-color:white;";
}
xhr.onreadystatechange = function() {
	if(xhr.readyState === 4) {
		if(xhr.status === 200) {
			document.getElementById("attchar_input").placeholder = tr_placeholder_load;
			document.getElementById("attchar_img").src = "/attchar/attchar_gen.php?c="+xhr.responseText;
			document.getElementById("attchar_hid").value = xhr.responseText;
			document.getElementById("attchar_input").focus();
		}
		else
			document.getElementById("attchar_input").placeholder = tr_placeholder_err;
	}
}
function attchar_change(obj) {
	obj.value = obj.value.toUpperCase();
	if(obj.value.length != 8)
		obj.style = "background-color:#FFB0B0;";
	else
		obj.style = "background-color:#B0FFB0";
}

function attchar_audio() {
	if(audio) audio.play();
	document.getElementById("attchar_input").focus();
}
