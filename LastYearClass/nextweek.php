<?php
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
$page_title="Weekly Calendar";
// check access 
include 'sessionchecker.php';
session_checker();
include 'header.php';
include_once 'db.php';
require 'schedule.php';

$FONT ="Microsoft Sans Serif, Default, sans-serif";
$FONTSIZE="10";
$FONTCOLOR="Black";
$BorderColor="White";
$BarColor="Black";
$_SESSION['session_address']="http://www.kweaver.net/class/weekly.php";


$dow = date("w");
$dow = $dow;
//print "Today is dow $dow (Monday is 1)\n";

// How many days ago was monday?
$offset = ($dow -1);
if ($offset <0) { 
    $offset = 6+7;
}
$StartDate=date("m/d/Y", mktime(0,0,0,date('m'), date('d')-$offset, date('Y') ));
 
print "<html><head>";
print "<style>";
print "A, TD, LI, P{font-family: $FONT;font-size: $FONTSIZE.pt;color: $FONTCOLOR;}
";
print "BODY{font-family: $FONT;font-size: $FONTSIZE.pt;}
";
print "</STYLE></head>";
print "<body>";
print "
	<table width='100%' style='border:1pt solid $BorderColor' >
		<tr>
		<td><font size=1>Week Of:"
		.date("M d, Y").
		"</font><p><font siz2=4><b>Current View: "
		.date("M d, Y",strtotime($StartDate)).
		"</b></font></td>
		</tr>
	</table>
";


$class = $_SESSION['session_class'];
$user_level = $_SESSION['session_user_level'];

$This_Day = new Day_Class($StartDate);
echo($StartDate);
$SixWeeks = $This_Day->SixWeeks;
$AssignmentDay = $This_Day->AssignmentDay;
$Exists = $This_Day->Exists;
echo($SixWeeks);
echo($AssignmentDay);
echo($Exists);

$Current_Assignment = new Assignments();

if ($user_level == 2 && $Exists){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments($class,$SixWeeks,$AssignmentDay,$user_level);
}

if ($user_level == 1 && $Exists){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments($class,$SixWeeks,$AssignmentDay,$user_level);
}

if ($user_level == 3 && $Exists){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments($class,$SixWeeks,$AssignmentDay,$user_level);
}

if ($user_level == 4 && $Exists){

	print "<H3><center>Assignments - $StartDate - Computer Science</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	print "<center>Monday</center>";
	$Current_Assignment->daily_Assignments("CS",$SixWeeks,$AssignmentDay,$user_level);
	print "<center>Tuesday</center>";
	$Current_Assignment->daily_Assignments("CS",$SixWeeks,$AssignmentDay+1,$user_level);
	print "<center>Wednesday</center>";
	$Current_Assignment->daily_Assignments("CS",$SixWeeks,$AssignmentDay+2,$user_level);
	print "<center>Thursday</center>";	
	$Current_Assignment->daily_Assignments("CS",$SixWeeks,$AssignmentDay+3,$user_level);
	print "<center>Friday</center>";	
	$Current_Assignment->daily_Assignments("CS",$SixWeeks,$AssignmentDay+4,$user_level);
	
	print "<H3><center>Assignments - $StartDate - PreAP</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	print "<center>Monday</center>";
	$Current_Assignment->daily_Assignments("PreAP",$SixWeeks,$AssignmentDay,$user_level);
	print "<center>Tuesday</center>";
	$Current_Assignment->daily_Assignments("PreAP",$SixWeeks,$AssignmentDay+1,$user_level);	
	print "<center>Wednesday</center>";
	$Current_Assignment->daily_Assignments("PreAP",$SixWeeks,$AssignmentDay+2,$user_level);	
	print "<center>Thursday</center>";	
	$Current_Assignment->daily_Assignments("PreAP",$SixWeeks,$AssignmentDay+3,$user_level);	
	print "<center>Friday</center>";	
	$Current_Assignment->daily_Assignments("PreAP",$SixWeeks,$AssignmentDay+4,$user_level);	
	
	print "<H3><center>Assignments - $StartDate - APCSI</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	print "<center>Monday</center>";
	$Current_Assignment->daily_Assignments("APCSI",$SixWeeks,$AssignmentDay,$user_level);	
	print "<center>Tuesday</center>";
	$Current_Assignment->daily_Assignments("APCSI",$SixWeeks,$AssignmentDay+1,$user_level);	
	print "<center>Wednesday</center>";
	$Current_Assignment->daily_Assignments("APCSI",$SixWeeks,$AssignmentDay+2,$user_level);	
	print "<center>Thursday</center>";	
	$Current_Assignment->daily_Assignments("APCSI",$SixWeeks,$AssignmentDay+3,$user_level);	
	print "<center>Friday</center>";	
	$Current_Assignment->daily_Assignments("APCSI",$SixWeeks,$AssignmentDay+4,$user_level);	
			
	print "<H3><center>Assignments - $StartDate - Webmastering</center></H3>";
	print "<center>$StartDate Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	print "<center>Monday</center>";
	$Current_Assignment->daily_Assignments("Webmastering",$SixWeeks,$AssignmentDay,$user_level);
	print "<center>Tuesday</center>";
	$Current_Assignment->daily_Assignments("Webmastering",$SixWeeks,$AssignmentDay+1,$user_level);
	print "<center>Wednesday</center>";
	$Current_Assignment->daily_Assignments("Webmastering",$SixWeeks,$AssignmentDay+2,$user_level);
	print "<center>Thursday</center>";	
	$Current_Assignment->daily_Assignments("Webmastering",$SixWeeks,$AssignmentDay+3,$user_level);
	print "<center>Friday</center>";	
	$Current_Assignment->daily_Assignments("Webmastering",$SixWeeks,$AssignmentDay+4,$user_level);
	
}
include 'footer.php';
?>