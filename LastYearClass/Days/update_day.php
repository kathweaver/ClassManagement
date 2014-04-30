<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
$page_title="Update Day";
include 'header.php';

// Define post fields into simple variables
$sixweeks = $_POST['SixWeeks'];
$day = $_POST['day'];
$date=$_POST['date'];

echo "<head>";
echo "</head>";

$sqlstring = "UPDATE Day SET `Date`='$date' WHERE `SixWeeks`=$sixweeks AND `Day`=$day";

$sql = mysql_query($sqlstring) 
		or die (mysql_error());
				
if (! $sql)
	echo ('Could not update day');
else
	echo('Update successful');
include 'footer.php';
?>