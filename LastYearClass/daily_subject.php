<?php
SESSION_START();
$page_title="Daily Schedule by Subject";
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
	Daily Schedule by Subject
	<li><a href="javascript:openwindow('../class/daily/CS.html')">CS</a></li>
	<li><a href="javascript:openwindow('../class/daily/PreAP.html')">PreAP</a></li>
	<li><a href="javascript:openwindow('../class/daily/APCSI.html')">APCS I</a></li>
	<li><a href="javascript:openwindow('../class/daily/Webmastering.html')">Webmastering</a></li>
	</body>
	</html>
<?
	if(!empty($GoToDay)){
		$StartDate=date("m/d/Y",strtotime ("$GoToDay"));
	}else{
		if(empty($StartDate)){
			$StartDate=date("m/d/Y");
		}
	}
	
	$user_level = $_SESSION['session_user_level'];
	
	$This_Day = new Day_Class($StartDate);

	$SixWeeks = $This_Day->SixWeeks;
	
	$AssignmentDay = $This_Day->AssignmentDay;
	$Exists = $This_Day->Exists;

	$Current_Assignment->Daily_Assignments_File("CS",$SixWeeks,$AssignmentDay);
	$Current_Assignment->Daily_Assignments_File("PreAP",$SixWeeks,$AssignmentDay);	
	$Current_Assignment->Daily_Assignments_File("APCSI",$SixWeeks,$AssignmentDay);
	$Current_Assignment->Daily_Assignments_File("Webmastering",$SixWeeks,$AssignmentDay);
}

include 'footer.php';
echo "</body>";
echo "</html>";
?>