<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
$page_title="Reset User Password";
include 'header.php';

// Define post fields into simple variables
$user_level = $_SESSION['session_user_level'];
$userid = $_REQUEST['userid'];
			
$dbpass = md5("panther"); 
	
$sql = mysql_query("UPDATE users SET password='$dbpass' WHERE userid='$userid'"); 

$sql = mysql_query("SELECT * FROM users WHERE userid='$userid'");
	$r = mysql_fetch_array($sql);
	$username=$r["username"]; 
	$email=$r["email_address"];
	
$subject = "Password Reset!"; 
$message = "Hi, your password has been successfully changed by the webmaster. 
Userid: $username
New Password: panther 

You may use the following link to re-visit the Website. 
Please log in using your new information. 
http://www.kweaver.net/class

Thanks! 

This is an automated response, please do not reply!"; 

mail($email, $subject, $message, "From: Webmaster <kathleen.weaver@dallasisd.org>\nX-Mailer: PHP/" . phpversion()); 

echo "User's Password was reset";
include 'footer.php';

?>