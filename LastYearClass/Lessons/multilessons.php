<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'db.php';
$page_title="Lessons";
include 'header.php';
?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this Lesson?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
</script> 
<?php

	$class = $_REQUEST['Class'];
	$six_weeks = $_REQUEST['six_weeks'];
	$day = $_REQUEST['day'];
	$user_level = $_SESSION['session_user_level'];
	$offset=$_REQUEST['offset'];

	$six_weeks = stripslashes($six_weeks);
	$day=stripslashes($day);

if ($Submit){
	$Index=$HTTP_POST_VARS['Index'];
	$Book=$HTTP_POST_VARS['Book'];
	$Name=$HTTP_POST_VARS['Name'];
	$SixWeeks=$HTTP_POST_VARS['SixWeeks'];
	$Day=$HTTP_POST_VARS['Day'];
	$DayOrder=$HTTP_POST_VARS['DayOrder'];
	$Instructions=$HTTP_POST_VARS['Instructions'];
	$URL=$HTTP_POST_VARS['URL'];
	$URLName=$HTTP_POST_VARS['URLName'];
	$Textbook=$HTTP_POST_VARS['Textbook'];
	$count = count($Index);
	for ( $i=0 ; $i < $count; $i++)
	{
       $q1 = "UPDATE Lessons SET `SixWeeks`='$SixWeeks[$i]', `Day`='$Day[$i]', `DayOrder`='$DayOrder[$i]', `DueDate`='$DueDate[$i]' WHERE `Index`=$Index[$i]";
       $q2 = "UPDATE Assignments SET `Book`='$Book[$i]', `Name`='$Name[$i]', `Instructions`='$Instructions[$i]' WHERE `Index`=$Index[$i]";
	   $rslt1 = mysql_query($q1) or die("Edit Query failed"); 
   	   $rslt2 = mysql_query($q2) or die("Edit Query failed"); 
	}
}
else
{
	echo ('<form action="');
	echo $_SERVER['PHP_SELF'];
	echo ('" method="post">');
	echo ('Class:<INPUT TYPE="text" NAME="Class" SIZE="10" Value="'.$class.'"<P>');
	echo ('SixWeeks:<INPUT TYPE="text" NAME="six_weeks" SIZE="5" Value="'.$six_weeks.'"<P>');
	echo ('Day:<INPUT TYPE="text" NAME="day" SIZE="5" Value="'.$day.'"<P>');
	echo ("<TABLE>");
	echo ("<TR>");
}			
	echo ("<TH></TH><TH></TH><TH>Lesson Index</TH><TH>Assignment Index</TH><TH>BOOK</TH><TH>Name</TH><TH>Six Weeks</TH><TH>Day</TH><TH>Order</TH><TH>Due Date</TH><TH>Instructions</TH><TH>URL Name</TH><TH>URL</TH><TH>Textbook</TH>");
	
	if ($six_weeks == "")
		$sq1 = "SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject='".$class."' ORDER BY SixWeeks, Day, DayOrder"; 
	else
		if ($day == "")
			$sq1 = "SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject='".$class."' AND SixWeeks = $six_weeks ORDER BY Day, DayOrder";
		else
			$sq1 = "SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject='".$class."' AND SixWeeks = $six_weeks AND Day = $day ORDER BY DayOrder";
        	
	$result = mysql_query($sq1);
	
		
	while($row = mysql_fetch_array($result)) {
	$copyUrl ="lessondetail.php?mode=copy&class=".$class."&Index=".$row['Index']; 
	$delUrl = "lessonpost.php?mode=delete&delclass=".$class."&delIndex=".$row['Index']; 
	echo ("<TR>");
	echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\">";
	echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t";
	echo ('<TD><INPUT TYPE="text" NAME="Index[]" SIZE="5" VALUE="'.$row["Index"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Assignment[]" SIZE="5" VALUE="'.$row["Assignment"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Book[]" SIZE="15" VALUE="'.$row["Book"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Name[]" SIZE="30" VALUE="'.$row["Name"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="SixWeeks[]" SIZE="5" VALUE="'.$row["SixWeeks"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Day[]" SIZE="5" VALUE="'.$row["Day"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="DayOrder[]" SIZE="5" VALUE="'.$row["DayOrder"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="DueDate[]" SIZE="5" VALUE="'.$row["DueDate"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Instructions[]" VALUE="'.$row["Instructions"].'"></TD>');
//		echo ('<TD><INPUT TYPE="text" NAME="Instructions[]" SIZE="50" VALUE="'.$row["Instructions"].'"></TD>');

	echo ('<TD><INPUT TYPE="text" NAME="URL[]" SIZE="25" VALUE="'.$row["URL"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="URLName[]" SIZE="25" VALUE="'.$row["URLName"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Textbook[]" SIZE="25" VALUE="'.$row["Textbook"].'"></TD>');
	echo ("</TR>");
}
	echo ('<TR><TD><input type="Submit" name="Submit" value="Submit"></TD></TR>');
	echo ("</TABLE>");
	echo ("</form>");
include ("footer.php");
?>