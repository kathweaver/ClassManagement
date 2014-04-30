<?php
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
$page_title="Daily Calendar";
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

function WriteMonth($StartDate,$Border_color,$Title_color){
	$WriteMonth="";
	$CurrentDate=date("m/1/y", strtotime ("$StartDate"));
	$setMonth=date("m",strtotime ($CurrentDate));
	$BeginWeek=date("m",strtotime ($CurrentDate));
	$EndWeek=date("m",strtotime ($CurrentDate));
	
	$WriteMonth="
			<table border=0 cellspacing=0 cellpadding=0 bgcolor='$Border_color' width=150 resize=none >
			<tr><td>
			<table border=0 cellspacing=1 cellpadding=2 resize=none
			 width='100%' style='border: 1pt solid $Border_color' >
			<tr>
				<td colspan=7 valign=top BGCOLOR='$Title_color' align=center >
				<a href='cal.php?GoToDay="
				.date("m/1/y", strtotime ("$StartDate -1 months")).
				"'>
				<font color='black'><<<</font></a>
				<b><font color='black'>"
				.date("M",strtotime ($StartDate))." ".date("Y",strtotime ($StartDate)).
				"</font></b>
				<a href='cal.php?GoToDay="
				.date("m/1/y", strtotime ("$StartDate +1 months")).
				"'><font color='black'>>>></font></a>
				</td>
			</tr>
			<tr>
				<td align='center' valign=top bgcolor=black ><B>S</B></td>
				<td align='center' bgcolor=black ><B>M</B></td>
				<td align='center' bgcolor=black ><B>T</B></td>
				<td align='center' bgcolor=black ><B>W</B></td>
				<td align='center' bgcolor=black ><B>T</B></td>
				<td align='center' bgcolor=black ><B>F</B></td>
				<td align='center' bgcolor=black ><B>S</B></td>
			</tr>
	";
	for($j=1;$j<6;$j++){
		if($BeginWeek==$setMonth||$EndWeek==$setMonth){	
			switch(date("w",strtotime($CurrentDate))){
			case 0:
				$DaysToAd=array("","+1 days","+2 days","+3 days","+4 days","+5 days","+6 days");
				break;
			case 1:
				$DaysToAd=array("-1 days","","+1 days","+2 days","+3 days","+4 days","+5 days");
				break;
			case 2:
				$DaysToAd=array("-2 days","-1 days","","+1 days","+2 days","+3 days","+4 days");
				break;
			case 3:
				$DaysToAd=array("-3 days","-2 days","-1 days","","+1 days","+2 days","+3 days");
				break;
			case 4:
				$DaysToAd=array("-4 days","-3 days","-2 days","-1 days","","+1 days","+2 days");
				break;
			case 5:
				$DaysToAd=array("-5 days","-4 days","-3 days","-2 days","-1 days","","+1 days");
				break;
			case 6:
				$DaysToAd=array("-6 days","-5 days","-4 days","-3 days","-2 days","-1 days","");
				break;
			}	
			$WriteMonth.="<tr>";
			for($i=0;$i<7;$i++){
				$strTemp="";
				$BGcolor="white";
				$FontColor="#000000";
				$Style="";
				if(date("m",strtotime ("$CurrentDate $DaysToAd[$i]"))!=$setMonth){
					$FontColor="#999999";
				}
				if(date("m/d/y",strtotime ("$CurrentDate $DaysToAd[$i]"))==
				date("m/d/y",strtotime($StartDate))){
					$Style="style='border: 1pt solid red'";
				}
				$WriteMonth.="
					<td align=center bgcolor='$BGcolor' $Style >
					<a href='cal.php?GoToDay="
					.date("m/d/y",strtotime ("$CurrentDate $DaysToAd[$i]")).
					"'><font color='$FontColor'>"
					.date("d",strtotime ("$CurrentDate $DaysToAd[$i]")).
					"</font></a></td>";
			}
			$WriteMonth.="</tr>";
			$CurrentDate=date("m/d/y",strtotime("$CurrentDate +1 week"));
			$StartDateofWeek=date("w",strtotime ($CurrentDate));
			$EndofWeek=6 - $StartDateofWeek;
			$BeginWeek=date("m",strtotime ("$CurrentDate -$StartDateofWeek days"));
			$EndWeek=date("m",strtotime ("$CurrentDate +$EndofWeek days"));
		}
	}
	$WriteMonth.="</table></td></tr></table>";
	return $WriteMonth;
}

$_SESSION['session_address']="http://www.kweaver.net/class/cal.php";

if(!empty($GoToDay)){
	$StartDate=date("m/d/Y",strtotime ("$GoToDay"));
}else{
	if(empty($StartDate)){
		$StartDate=date("m/d/Y");
	}
}

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
		<td width='100'>"
		.WriteMonth($StartDate,$BorderColor,$BarColor,1).
		"</td>
		<td><font size=1>Today's Date: "
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

$SixWeeks = $This_Day->SixWeeks;
$AssignmentDay = $This_Day->AssignmentDay;
$Exists = $This_Day->Exists;

$Current_Assignment = new Assignments();

if ($user_level == 2 && $Exists){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments($class,$SixWeeks,$AssignmentDay,$user_level);
}

if ($user_level == 1 && $Exists){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments($class,$SixWeeks,$AssignmentDay,$user_level);
}

if ($user_level == 3 && $Exists){
	print "<H3><center>Assignments - $StartDate - $class</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments($class,$SixWeeks,$AssignmentDay,$user_level);
}

if ($user_level == 4 && $Exists){

	print "<H3><center>Assignments - $StartDate - Computer Science</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments("CS",$SixWeeks,$AssignmentDay,$user_level);

	print "<H3><center>Assignments - $StartDate - PreAP</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments("PreAP",$SixWeeks,$AssignmentDay,$user_level);	
	
	print "<H3><center>Assignments - $StartDate - APCSI</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments("APCSI",$SixWeeks,$AssignmentDay,$user_level);	
			
	print "<H3><center>Assignments - $StartDate - Webmastering</center></H3>";
	print "<center>Six Weeks: $SixWeeks Day: $AssignmentDay</center>";
	$Current_Assignment->daily_Assignments("Webmastering",$SixWeeks,$AssignmentDay,$user_level);
}
include 'footer.php';
?>