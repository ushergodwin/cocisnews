<?php
###########################################################
/*
Event Calendar Script
Copyright (C) 2012 StivaSoft ltd. All rights Reserved.


This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.

For further information visit:
http://www.phpjabbers.com/
info@phpjabbers.com

Version:  2.0
Released: 2020-06-12
*/
###########################################################

//Set the Content-Type header to application/json.
header('Content-Type: application/json');

error_reporting(0);
include("config.php");

$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE UNIX_TIMESTAMP(`start`) >=".strtotime($mysqli->real_escape_string($_GET['start']))." AND UNIX_TIMESTAMP(`start`)<=".strtotime($mysqli->real_escape_string($_GET['end']));
$arr = array();
if ($result = $mysqli->query($sql)) {
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        $arr[$counter]=$row;
        $counter++;
    }

	echo json_encode($arr);
} else {
    printf("Error: %s\n", $mysqli->sqlstate);
    exit;
}
?>