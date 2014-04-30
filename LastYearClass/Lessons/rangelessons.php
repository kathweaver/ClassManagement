<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'db.php';
$page_title="Lessons";
include 'noheader.php';
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
	$beginday = $_REQUEST['beginday'];
	$endday = $_REQUEST['endday'];
	$user_level = $_SESSION['session_user_level'];

	$six_weeks = stripslashes($six_weeks);
	$day=stripslashes($day);
	
if ($Submit){
	$Lessons=$HTTP_POST_VARS['Lessons'];
	$Assignments=$HTTP_POST_VARS['Assignments'];
	$Book=$HTTP_POST_VARS['Book'];
	$Name=$HTTP_POST_VARS['Name'];
	$SixWeeks=$HTTP_POST_VARS['SixWeeks'];
	$Day=$HTTP_POST_VARS['Day'];
	$DayOrder=$HTTP_POST_VARS['DayOrder'];
	$Instructions=$HTTP_POST_VARS['Instructions'];
	$URL=$HTTP_POST_VARS['URL'];
	$URLName=$HTTP_POST_VARS['URLName'];
	$Textbook=$HTTP_POST_VARS['Textbook'];
	$count = count($Lessons);
	for ( $i=0 ; $i < $count; $i++)
	{
       $q1 = "UPDATE Lessons SET `SixWeeks`='$SixWeeks[$i]', `Day`='$Day[$i]', `DayOrder`='$DayOrder[$i]', `DueDate`='$DueDate[$i]' WHERE `Index`=$Lessons[$i]";
	   $rslt1 = mysql_query($q1) or die("Edit Query failed"); 
	}
}
	echo ('<form action="');
	echo $_SERVER['PHP_SELF'];
	echo ('" method="post">');
	echo ('<INPUT TYPE="hidden" NAME="Class" SIZE="10" Value="'.$class.'"<P>');
	echo ('<INPUT TYPE="hidden" NAME="six_weeks" SIZE="5" Value="'.$six_weeks.'"<P>');
	echo ('<INPUT TYPE="hidden" NAME="beginday" SIZE="5" Value="'.$beginday.'"<P>');
	echo ('<INPUT TYPE="hidden" NAME="endday" SIZE="5" Value="'.$endday.'"<P>');
	echo ("<TABLE>");
	echo ("<TR>");
			
	echo "<TH></TH><TH></TH><TH>Lesson</TH><TH>Assignment</TH><TH>Book</TH><TH>Name</TH><TH>Six Weeks</TH><TH>Day</TH><TH>Order</TH><TH>Due Day</TH>";
	
	echo "</TR>";
	
	$sq1 = "SELECT Lessons.Index as Lessons, Assignments.Index as Assignments, Book, Name, SixWeeks, Day, DayOrder, DueDate, Instructions, URL, URLName, Textbook
	 FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Lessons.Subject = '$class' AND SixWeeks = $six_weeks AND Day >= $beginday AND Day <= $endday ORDER BY Day, DayOrder";
	 echo $sql;
	$result = mysql_query($sq1);
	while($row = mysql_fetch_array($result)) {
	$copyUrl ="lessondetail.php?mode=copy&class=".$class."&Index=".$row['Lessons']; 
	$delUrl = "lessonpost.php?mode=delete&delclass=".$class."&delIndex=".$row['Lessons']; 
//	$delUrl = "lessonpost.php?mode=delete&delclass=".$class."&delIndex=".$row['Lessons']."&sixweeks=".$six_weeks."&beginday=".$beginday."&endday=".$endday; 
	echo ("<TR>");
	echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\">";
	echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t";
	echo ('<TD><INPUT TYPE="text" NAME="Lessons[]" SIZE="10" VALUE="'.$row["Lessons"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Assignments[]" SIZE="10" VALUE="'.$row["Assignments"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Book[]" SIZE="100" VALUE="'.$row["Book"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Name[]" SIZE="50" VALUE="'.$row["Name"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="SixWeeks[]" SIZE="11" VALUE="'.$row["SixWeeks"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Day[]" SIZE="11" VALUE="'.$row["Day"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="DayOrder[]" SIZE="5" VALUE="'.$row["DayOrder"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="DueDate[]" SIZE="50" VALUE="'.$row["DueDate"].'"></TD>');
	echo ("</TR>");
}
	echo ('<TR><TD><input type="Submit" name="Submit" value="Submit"></TD></TR>');
	echo ("</TABLE>");
	echo ("</form>");
include ("footer.php");
?>