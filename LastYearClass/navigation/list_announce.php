<?
ini_set('include_path', '/home/kathweav/public_html/class');
include 'db.php';

$sqlstring = "SELECT * FROM announce WHERE class = 'All'";

$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);

while($row = mysql_fetch_array($numresults)) {
	echo ('<P><STRONG>');
	echo ($row["announcement"]);
	echo ('</STRONG><P>');
}
?>