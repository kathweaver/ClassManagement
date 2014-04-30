<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
$page_title="Update User";
include 'header.php';
// Define post fields into simple variables
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email'];
$userid = $_POST['userid'];
$user_level = $_POST['user_level'];
$activated = $_POST['activated'];
$class = $_POST['class'];
$period= $_POST['period'];
$username = $_POST['username'];

$first_name = stripslashes($first_name);
$last_name = stripslashes($last_name);
$email_address = stripslashes($email_address);
$userid = stripslashes($userid);
$user_level = stripslashes($user_level);
$activated = stripslashes($activated);
$class = stripslashes($class);
$period=stripslashes($period);
$username=stripslashes($username);

echo "<head>";
echo "</head>";

$sql = mysql_query("UPDATE users SET username='$username', activated='$activated', user_level='$user_level', first_name='$first_name', last_name='$last_name', email_address='$email_address', class='$class', Period='$period' WHERE userid='$userid'");
					
if (! $sql)
	echo ('Could not update user');
else
	echo('Update successful');

include 'footer.php';

?>