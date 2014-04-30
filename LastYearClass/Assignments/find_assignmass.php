<?php
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
$page_title="Find Lesson";
include 'header.php';
include 'db.php';

$user_level = $_SESSION['session_user_level'];

if ($user_level==4){
	echo "<head>";
	echo "</head>";
	echo ('<form name="form1" action="assignmasslist.php" method=POST>');
	echo ('Book:<input name="book" type="text" id="book" value="">');
	echo ('<br>');
	echo ('TEKS:<input name="teks" type="text" id="TEKS" value="">');
	echo ('<br>');
	echo ('Name:<input name="name" type="text" id="name" value="">');
	echo ('<br>');

	echo ('<input type="submit" name="Search" value="Search">');
	echo ("</form>");
}
else
	echo ("You are not allowed to search for a assignment");

include 'footer.php';
?>