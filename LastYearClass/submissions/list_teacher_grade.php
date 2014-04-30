<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'db.php';
if ($_SESSION['Header_done']<>100) {include 'header.php';}
$sqlstring = "SELECT * FROM submissions WHERE grade IS NULL";

$numresults=mysql_query($sqlstring); 
$numrows=mysql_num_rows($numresults);

if ($numrows != 0)
	{		
		if (empty($offset)) { 
			$offset=0; 
		} 

		$limit=10; // change to number of items displayed per page 

		echo "<H3>TO BE GRADED</H3>";
		echo "<table border=1>";
		echo "<tr>";
		echo "<th>Index</th><th>Class</th><th>Assignment Name</th><th>Date Submitted</th>";
		echo "</tr>";
		
		$sqlstring = "SELECT * FROM submissions sub, users user WHERE grade IS NULL AND sub.userid = user.userid Order by assignment_name, class LIMIT $offset,$limit";

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
					if (empty($assignment_name)) $assignment_name="&nbsp";
			if (is_numeric($assignment_name))
			{
				$q1 = "SELECT Name FROM Assignments WHERE `Index` = ".$assignment_name;
				$sqlResult = mysql_query($q1);
				$row1 = mysql_fetch_array($sqlResult, MYSQL_ASSOC);
				$assignment_name =	$row1['Name'];
			}

		echo ("<tr>");
	    echo("<td><a href='http://www.kweaver.net/class/submissions/grade_assign.php?index=$index'>$index<a></td><td>$class</td><td>$assignment_name</td><td>$submission_time</td>");
		echo("</tr>");
	} //end while loop
	echo "</table>";
	}
	mysql_free_result($sql); 

	if ($offset >= 3) { 
		$prevoffset = $offset - $limit; 
		print "<a href='http://www.kweaver.net/class/submissions/list_teacher_grade.php?offset=$prevoffset'>PREV</a>&nbsp;"; 
	} 

	$pages=intval($numrows/$limit); 
	
	if ($pages < ($numrows/$limit)){ 
		$pages=($pages + 1); 
	} 
	
	for ($i = 1; $i <= $pages; $i++) { 
		$newoffset = $limit*($i-1); 
		if ($newoffset == $offset) { 
			print "$i&nbsp;"; 
		} else { 
			print "<a href='http://www.kweaver.net/class/submissions/list_teacher_grade.php?offset=$newoffset'>$i</a>&nbsp;"; 
		} 
	} 

//show next if not last 
	if (! ( ($offset/$limit) == ($pages - 1) ) && ($pages != 1) ) { 
		$newoffset = $offset+$limit; 
		print "<a href='http://www.kweaver.net/class/submissions/list_teacher_grade.php?offset=$newoffset'>NEXT</a><p>"; 
		} 
}
include 'footer.php';
?>