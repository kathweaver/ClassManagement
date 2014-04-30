<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
$userid=$_SESSION['session_userid'];

include 'db.php';

$sqlstring = "SELECT * FROM submissions WHERE userid = $userid";

$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);
		
if ($numrows != 0)
{
	echo "<center>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Assignment Name</th><th>Date Submitted</th><th>Files</th><th>Grade</th><th>Date Graded</th><th>Comments</th><th>Recorded</th><th>Date Recorded</th>";
	echo "</tr>";
			
			$sqlstring = "SELECT * FROM submissions WHERE userid = $userid Order by submission_time";
	
			$sql = mysql_query($sqlstring)
				or die (mysql_error());
			$row_check = mysql_num_rows($sql);
	
			if ($row_check == 0){
			echo ("No records found");
			}
			else
			{
			while($row = mysql_fetch_array($sql)){
				foreach( $row AS $key => $val ){
					$$key = stripslashes( $val );
			}
			if (empty($assignment_name)) $assignment_name="&nbsp";
			if (is_numeric($assignment_name))
			{
				$q1 = "SELECT Name FROM Assignments WHERE `Index` = ".$assignment_name;
				$sqlResult = mysql_query($q1);
				$row1 = mysql_fetch_array($sqlResult, MYSQL_ASSOC);
				$assignment_name =	$row1['Name'];
			}
			
			if (empty($filename0)) $filename0="&nbsp";
			if (empty($filename1)) $filename1="&nbsp";
			if (empty($filename2)) $filename2="&nbsp";
			if (empty($filename3)) $filename3="&nbsp";
			if (empty($filename4)) $filename4="&nbsp";
			if (empty($grade_comments)) $grade_comments="&nbsp";
			if (empty($record_comments)) $record_comments="&nbsp";
			if (empty($grade)) $grade="&nbsp;";
			if (empty($recorded)) $recorded="&nbsp;";
			if ($recorded == 1) $recorded = "RECORDED";
			echo ("<tr>");
			echo("<td rowspan=5>$assignment_name</td><td  rowspan=5>$submission_time</td><td rowspan=1>$filename0</td><td rowspan=5>$grade</td><td rowspan=5>$grade_date</td><td rowspan=5>$grade_comments</td><td rowspan=5>$recorded</td><td rowspan=5>$recorded_date</td>");
			echo("<tr><td>$filename1</td></tr>");
			echo("<tr><td>$filename2</td></tr>");
			echo("<tr><td>$filename3</td></tr>");
			echo("<tr><td>$filename4</td></tr>");
			echo("</tr>");
		} //end while loop
		echo "</table></center>";
		}
		mysql_free_result($sql); 
}
?>