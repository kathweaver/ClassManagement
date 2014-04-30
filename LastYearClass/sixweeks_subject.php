<?php
SESSION_START();
$page_title="Six Weeks Schedule by Subject";
include_once 'header.php';
include 'sessionchecker.php';
require 'schedule.php';
session_checker();

$class = $_SESSION['session_class'];
$user_level = $_SESSION['session_user_level'];

include_once 'db.php';

if ($user_level != 4)
	echo ('You do not have access to this area');
else {	
	$Current_Assignment = new Assignments();
?>
<script language="JavaScript">
<!--
function openwindow(address)
{
	window.open(address,"","status,,scrollbars,resizable")
}
//-->
</script>
	<br>
	Six Week Schedules by Subject
	<li><a href="javascript:openwindow('../class/sixweeks/CS.html')">CS</a></li>
	<li><a href="javascript:openwindow('../class/sixweeks/PreAP.html')">PreAP</a></li>
	<li><a href="javascript:openwindow('../class/sixweeks/APCSI.html')">APCS I</a></li>
	<li><a href="javascript:openwindow('../class/sixweeks/Webmastering.html')">Webmastering</a></li>
	</body>
	</html>
<?
	// Find the six weeks
	$i=0;
	while (empty($SixWeeks)) {
		$StartDate=date("m/d/Y",mktime (0,0,0,date("m")  ,date("d")+$i,date("Y")));
		$This_Day = new Day_Class($StartDate);
		$SixWeeks = $This_Day->SixWeeks;
		$i++;
	}
	$Current_Assignment->SixWeeks_Assignments_File("CS",$SixWeeks);
	$Current_Assignment->SixWeeks_Assignments_File("PreAP",$SixWeeks);	
	$Current_Assignment->SixWeeks_Assignments_File("APCSI",$SixWeeks);
	$Current_Assignment->SixWeeks_Assignments_File("Webmastering",$SixWeeks);
}

include 'footer.php';
echo "</body>";
echo "</html>";
?>