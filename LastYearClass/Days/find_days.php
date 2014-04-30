<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Find Days";
include 'header.php';

$user_level = $_SESSION['session_user_level'];

if ($user_level==4){
	echo "<head>";
	echo '<link href="style.css" rel="stylesheet" type="text/css">';
	echo "</head>";
	echo ('<form name="form1" action="list_days.php" method=POST>');
	echo ('Six Weeks:<input name="six_weeks" type="text" id="six_weeks"  value=""');
	echo ('<p>');
	echo ('Day: <input name="day" type="text" id="day"  value=""');
	echo ('<br>');

	echo ('<input type="submit" name="Search" value="Search">');
	echo ("</form>");
}
else
	echo ("You are not allowed to maintain days");

include 'footer.php';
?>