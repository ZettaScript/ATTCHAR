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

require_once('database.php');
$req = $attchar_bdd->prepare('SELECT * FROM `attchar` WHERE `haship` = ?');
$req->execute(array(sha1($_SERVER['REMOTE_ADDR'])));
usleep(rand(5000,10000));
$attchar_ok = false;
$id = -1;
while($data = $req->fetch()) {
	if($data['expire'] > time() and $_POST['attchar_auto'] == substr($data['hashcode'],40,40)) {
		if(sha1(strtoupper($_POST['attchar_code'])) == substr($data['hashcode'],0,40))
			$attchar_ok = true;
		$id = $data['id'];
		break;
	}
}
$req->closeCursor();
if($id != -1) {
	$req = $attchar_bdd->prepare('DELETE FROM `attchar` WHERE `id` = ?');
	$req->execute(array($id));
}
?>
