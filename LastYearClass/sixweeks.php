<?php
SESSION_START();
$page_title="Six Weeks Schedule";
include_once 'header.php';

include 'sessionchecker.php';
require 'schedule.php';
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


while (empty($SixWeeks)) { 
	$StartDate=date("m/d/Y",mktime (0,0,0,date("m")  ,date("d")+$i,date("Y")));
	$This_Day = new Day_Class($StartDate);
    $SixWeeks = $This_Day->SixWeeks;
	$i++;
}

mktime (0,0,0,date("m")  ,date("d")+1,date("Y"));

if ($user_level != 4){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_Assignments($class,$SixWeeks);
}

if ($user_level == 4){
	print "<H3><center>Assignments - $StartDate - Computer Science</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_Assignments("CS",$SixWeeks);

	print "<H3><center>Assignments - $StartDate - PreAP</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_Assignments("PreAP",$SixWeeks);	

	print "<H3><center>Assignments - $StartDate - APCSI</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_Assignments("APCSI",$SixWeeks);	

	print "<H3><center>Assignments - $StartDate - Webmastering</center></H3>";
	print "<center>Six Weeks: $SixWeeks</center>";
	$Current_Assignment->SixWeeks_Assignments("Webmastering",$SixWeeks);

	}
	

include 'footer.php';

echo "</body>";
echo "</html>"; 
?>