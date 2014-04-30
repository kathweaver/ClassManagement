<?php
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
$page_title="List Due Assignment 4th Six Weeks";
include_once 'header.php';

include 'sessionchecker.php';
include_once 'schedule.php';
session_checker();

$class = $_SESSION['session_class'];
$user_level = $_SESSION['session_user_level'];

$SixWeeks = $_REQUEST['SixWeeks'];

include_once 'db.php';

$Current_Assignment = new Assignments();

echo "<html>";
echo "<head>";
echo '<link href="style.css" rel="stylesheet" type="text/css">';
echo "</head>";
echo "<body>";

$i=0;

$SixWeeks = 2;

mktime (0,0,0,date("m")  ,date("d")+1,date("Y"));


if ($user_level != 4){
	print "<H3><center>Assignments To Be Turned In - $StartDate - $class</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_TurnIn($class,$SixWeeks);
}

if ($user_level == 4){

	print "<H3><center>Assignments To Be Turned In - $StartDate - CSI</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_TurnIn("CS",$SixWeeks);

	print "<H3><center>Assignments To Be Turned In - $StartDate - PreAP</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_TurnIn("PreAP",$SixWeeks);	

	print "<H3><center>Assignments To Be Turned In- $StartDate - APCSI</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_TurnIn("APCSI",$SixWeeks);	

	print "<H3><center>Assignments To Be Turned In- $StartDate - APCSII</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_TurnIn("APCSII",$SixWeeks);	

	print "<H3><center>Assignments To Be Turned In- $StartDate - Webmastering</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_TurnIn("Webmastering",$SixWeeks);

	}
	

include 'footer.php';

?>