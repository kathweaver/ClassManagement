<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
include 'noheader.php';

// Define post fields into simple variables
$index = $_REQUEST['index'];


$sqlstring = "UPDATE submissions SET `recorded`=1, `recorded_date`=NOW() WHERE `index`='".$index."'";
$sql = mysql_query($sqlstring) 
		or die (mysql_error());
				
if (! $sql)
	echo ('Could not update recorded fields');
else
	echo('Update successful');
	
include 'list_teacher_record_last.php';
?>