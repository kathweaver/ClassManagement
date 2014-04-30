<?php
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'db.php';
$page_title="Reset User Password";
include 'header.php';

// Define post fields into simple variables
$user_level = $_SESSION['session_user_level'];
$userid = $_REQUEST['userid'];
			
$dbpass = md5("panther"); 
	
$sql = mysql_query("UPDATE users SET password='$dbpass' WHERE class='$BCIS'"); 

echo "BCIS Password was reset";
include 'footer.php';

?>