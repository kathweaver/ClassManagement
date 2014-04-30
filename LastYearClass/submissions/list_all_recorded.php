<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'db.php';

$sqlstring = "SELECT * FROM submissions sub, users user WHERE sub.userid = user.userid AND sub.recorded is NOT NULL ORDER BY user.period, user.class";
$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);
		
if ($numrows != 0)
	{
		echo "<H3>RECORDED</H3>";
		echo "<center>";
		echo "<table border=1>";
		echo "<tr>";
		echo "<th>Index</th><th>Period</th><th>Class</th><th>First Name</th><th>Last Name</th><th>Assignment Name</th><th>FileName</th><th>Date Submitted</th><th>Grade</th><th>Date Graded</TH><TH>Date Recorded</th>";
		echo "</tr>";
		
		$sqlstring = "SELECT * FROM submissions sub, users user WHERE sub.userid = user.userid AND sub.recorded is NOT NULL ORDER BY user.period, user.class, user.last_name, sub.recorded_date ASC";
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
		if (empty($filename0)) $filename0="&nbsp";
		if (empty($filename1)) $filename1="&nbsp";
		if (empty($filename2)) $filename2="&nbsp";
		if (empty($filename3)) $filename3="&nbsp";
		if (empty($filename4)) $filename4="&nbsp";
		
		if (empty($grade)) $grade="&nbsp;";
		echo ("<tr>");
	    echo("<td rowspan=5><a href='http://www.kweaver.net/class/assignments/delete_assign.php?index=$index'>$index</a></td><td rowspan=5>$period</td><td rowspan=5>$class</td><td rowspan=5>$first_name</td><td rowspan=5>$last_name</td><td rowspan=5>$assignment_name</td><td rowspan=1>$filename0</td><td rowspan=5>$submission_time</td><td rowspan=5>$grade</td><td rowspan=5>$grade_date</td><TD rowspan=5>$recorded_date</TD></tr>");
		echo("<tr><td>$filename1</td></tr>");
		echo("<tr><td>$filename2</td></tr>");
		echo("<tr><td>$filename3</td></tr>");
		echo("<tr><td>$filename4</td></tr>");
	} //end while loop
	echo "</table></center>";
	}
	mysql_free_result($sql); 
}
include 'footer.php';
?>