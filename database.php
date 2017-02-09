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

// please complete this
try {$attchar_bdd = new PDO('mysql:host=localhost;dbname=DATABASE_NAME;charset=utf8', 'USER_NAME', 'USER_PASSWORD');}
catch(Exception $e) {die('Error : ' . $e->getMessage());}
?>
