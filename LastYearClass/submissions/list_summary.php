<?
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';

$sqlstring = "SELECT * FROM submissions WHERE grade IS NULL";

$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);

echo ("You have ".$numrows." assignments to grade");
echo ("<br>");


$sqlstring = "SELECT * FROM submissions sub, users user WHERE grade IS NOT NULL AND recorded is NULL AND sub.userid = user.userid";

$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);

echo ("You have ".$numrows." grades to record");
echo ("<br>");
?>