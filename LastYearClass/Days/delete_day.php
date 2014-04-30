<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
$page_title="Deleted Lesson";
include 'header.php';
include 'db.php';

// Define post fields into simple variables
$user_level = $_SESSION['session_user_level'];
$Six_Weeks = $_REQUEST['SixWeeks'];
$Day = $_REQUEST['Day'];

$index =stripslashes($index);
$class = stripslashes($class);

$sqlstring = "DELETE FROM Day WHERE Six_Weeks = $Six_Weeks AND Day = $Day";
$sql = mysql_query($sqlstring);
					
if (! $sql)
	echo ('Could not delete day');
else
	echo('Delete successful');
include 'footer.php';
?>