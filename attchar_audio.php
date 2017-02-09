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
$code = '';
while($data = $req->fetch()) {
	if($data['expire'] > time() and $_GET['c'] == substr($data['hashcode'],40,40)) {
		$code = $data['code'];
		break;
	}
}
$req->closeCursor();
header('Cache-Control: no-cache, must-revalidate');
$list = array();
if($code != '') {
	header('Content-type: audio/x-wav');
	header('Content-Disposition: inline; filename="attchar.wav"');
	$i = 0;
	while($i < 8) {
		$list[] = 'sounds/sound_'.$code[$i].'.wav';
		$i ++;
	}
}

$datas = '';
$res = fopen($list[0],'rb');
$data = fread($res, 44);
fclose($res);
$entete_unpack = 'H8FileTypeBlocID/VFileSize/H8FileFormatID';
$entete_unpack .= '/H8FormatBlocID/VBlocSize/vAudioFormat/vNbrCanaux/VFrequence/VBytePerSec/vBytePerBloc';
$entete_unpack .= '/vBitsPerSample';
$entete_unpack .= '/H8DataBlocID/VDataSize';
$infos = unpack($entete_unpack,$data);

foreach($list as $file)
{
	$res = fopen($file, 'rb');
	fseek($res, 44);
	$buf = fread($res, filesize($file) - 44);
	$len = strlen($buf);
	for($i=0; $i<$len; $i++) {
		$datas .= chr((ord($buf[$i])+rand(-2,2))%256*!!rand(0,1000));
	}
}

$datasize = strlen($datas);
$filesize = 36 + $datasize; 
$entete_pack = 'H8VH8H8VvvVVvvH8V';
$file = pack($entete_pack, $infos['FileTypeBlocID'], $filesize, $infos['FileFormatID'], $infos['FormatBlocID'], $infos['BlocSize'], $infos['AudioFormat'], $infos['NbrCanaux'], $infos['Frequence'], $infos['BytePerSec'], $infos['BytePerBloc'], $infos['BitsPerSample'], $infos['DataBlocID'], $datasize) . $datas;

echo $file;
?>
