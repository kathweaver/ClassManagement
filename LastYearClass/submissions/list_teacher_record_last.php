<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'db.php';
include 'noheader.php';

$sqlstring = "SELECT * FROM submissions sub, users user WHERE grade IS NOT NULL AND recorded is NULL AND sub.userid = user.userid";

$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);
		
if ($numrows != 0)
	{
		echo "<H3>TO BE RECORDED</H3>";
		echo "<center>";
		echo "<table border=1>";
		echo "<tr>";
		echo "<th>Index</th><th>Period</th><th>Class</th><th>First Name</th><th>Last Name</th><th>Assignment Name</th><th>Date Submitted</th><th>Grade</th><th>Grading Comments</th><TH>Index</TH>";
		echo "</tr>";
		
		$sqlstring = "SELECT * FROM submissions sub, users user WHERE grade IS NOT NULL AND recorded is NULL AND sub.userid = user.userid ORDER BY user.period, user.class, user.last_name, sub.assignment_name";
 
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

		if (empty($grade_comments)) $grade_comments="&nbsp";
		
		if (empty($grade)) $grade="&nbsp;";
		echo ("<tr>");
	    echo("<td><a href='http://www.kweaver.net/class/submissions/record_assign_last.php?index=$index'>$index</a></td><td>$period</td><td>$class</td><td>$first_name</td><td>$last_name</td><td>$assignment_name</td><td>$submission_time</td><td>$grade</td><td>$grade_comments</td><TD><a href='http://www.kweaver.net/class/submissions/grade_assign.php?index=$index'>$index</a></TD></tr>");
		} //end while loop
	echo "</table></center>";
	}
	mysql_free_result($sql); 

}
include 'footer.php';
?>