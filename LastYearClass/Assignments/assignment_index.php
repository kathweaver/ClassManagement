<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
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
	echo ('<form name="form1" action="assignmentdetail.php" method=POST>');

	echo ('<input name="mode" type="hidden" id="mode" value="edit">');
	echo ('<br>');

	echo ('Index:<input name="Index" type="text" id="Index" value="">');
	echo ('<br>');

	echo ('<input type="submit" name="Search" value="Search">');
	echo ("</form>");
}
else
	echo ("You are not allowed to search for a assignment");

include 'footer.php';
?>