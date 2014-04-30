<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
include 'header.php';

// Define post fields into simple variables
$index = $_REQUEST['index'];

$sqlstring = "DELETE FROM submissions WHERE `index`=".$index." Limit 1";
$sql = mysql_query($sqlstring) 
		or die (mysql_error());
				
if (! $sql)
	echo ('Could not update recorded fields');
else
	echo('Update successful');
	
include 'list_all_recorded.php';
?>