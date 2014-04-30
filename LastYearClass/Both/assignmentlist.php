<?php
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="List Lessons and Assignments";
include 'noheader.php';
echo "<h3><center>List Lessons and Assignments</CENTER></H3>";
echo "<table border>";

function loadlist() { 
		 
	$user_level = $_SESSION['session_user_level'];
	$offset=$_REQUEST['offset'];

	$class = $_REQUEST['Class'];
	$six_weeks = $_REQUEST['six_weeks'];
	$day = $_REQUEST['day'];

	$class = stripslashes($class);
	$six_weeks = stripslashes($six_weeks);
	$day=stripslashes($day);
	$user_level=stripslashes($user_level);

	if ($class == "")
		$q1 = "SELECT * FROM Assignments"; 
	elseif ($six_weeks == "")
		$q1 = "SELECT * FROM Lessons , Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject LIKE '".$class."'"; 
	elseif ($day == "")
		$q1 = "SELECT * FROM Lessons , Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject LIKE '".$class."' AND SixWeeks=".$six_weeks; 
	else
		$q1 = "SELECT * FROM Lessons , Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject LIKE '".$class."' AND SixWeeks=".$six_weeks." AND Day=".$day; 
				
	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

	if (empty($offset)) { 
		$offset=0; 
    }
	$limit=20; // change to number of items displayed per page 

	if ($class == "")
			$q1 = "SELECT * FROM Assignments LIMIT $offset, $limit"; 
		elseif ($six_weeks == "")
			$q1 = "SELECT * FROM Lessons , Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject LIKE '".$class."'  ORDER BY SixWeeks, Day, DayOrder LIMIT $offset, $limit"; 
		elseif ($day == "")
			$q1 = "SELECT * FROM Lessons , Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject LIKE '".$class."' AND SixWeeks=".$six_weeks."  ORDER BY SixWeeks, Day, DayOrder LIMIT $offset, $limit";  
		else
		$q1 = "SELECT * FROM Lessons , Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject LIKE '".$class."' AND SixWeeks=".$six_weeks." AND Day=".$day."  ORDER BY SixWeeks, Day, DayOrder LIMIT $offset, $limit"; 

    $rslt1 = mysql_query($q1) or die("Query failed"); 


	echo "<tr>";
	echo "<th>&nbsp;</th>";
	echo "<TH>Index</th><th>Book</th><th>Name</th><th>Topic</TH><TH>TEKS</TH><th>Instructions</th><th>URL</th>";
	echo "<th>TurnIn</th>";
	echo "</tr>";
    while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
        echo "\t<tr>\n"; 
    	$dtlUrl = "assignmentdetail.php?mode=edit&Index=".$row1['Index']; 
	    $delUrl = "assignmentpost.php?mode=delete&delIndex=".$row1['Index']; 
		$copyUrl ="assignmentdetail.php?mode=copy&Index=".$row1['Index']; 

		if (empty($row1['Book'])) $row1['Book']="&nbsp";
		if (empty($row1['Name'])) $row1['Name']="&nbsp";
		if (empty($row1['Topic'])) $row1['Topic']="&nbsp";
		if (empty($row1['TEKS'])) $row1['TEKS']="&nbsp";
		if (empty($row1['Instructions'])) $row1['Instructions']="&nbsp";
		if ($user_level == 4)
            echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."','modify',config='scrollbars=yes,resizable=yes,height=600,width=900');\"></td>\t"; 
		echo "\t\t<td>".$row1['Index']."</td>";
	   	echo "\t\t<td>".$row1['Book']."</td>";
		echo "\t\t<td>".$row1['Name']."</td>";
		echo "\t\t<td>".$row1['Topic']."</td>";		
		echo "\t\t<td>".$row1['TEKS']."</td>";
		echo "\t\t<td>".$row1['Instructions']."</td>";
		$URL=$row1['URL'];
		$URLName=$row1['URLName'];
		$Textbook=$row1['Textbook'];
		if (!empty($URL))
			echo ("<td><a href=$URL>$URLName</a></td>");
		elseif (!empty($Textbook))
			echo ('<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
		else
			echo('<td>&nbsp;</td>');
		if ($row1['TurnIn'] != 0)
			echo ('<td align="center">X</td>');
		else
			echo ('<td>&nbsp;</td>');
	}
    echo "</table>\n"; 
	
	mysql_free_result($rslt1);
	
	if ($offset >= 3) { 
		$prevoffset = $offset - $limit; 
		print "<a href='$PHP_SELF?offset=$prevoffset&Class=$class&six_weeks=$six_weeks&day=$day'>PREV</a>&nbsp;"; 
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
			print "<a href='$PHP_SELF?offset=$newoffset&Class=$class&six_weeks=$six_weeks&day=$day'>$i</a>&nbsp;"; 
		} 
	} 

//show next if not last 
if (! ( ($offset/$limit) == ($pages - 1) ) && ($pages != 1) ) { 
	$newoffset = $offset+$limit; 
	print "<a href='$PHP_SELF?offset=$newoffset&Class=$class&six_weeks=$six_weeks&day=$day'>NEXT</a><p>"; 
	} 
        /* Free resultset */ 
} 
     
// Main Script   
	loadlist();
	
include 'footer.php';
?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this Lesson?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
</script> 
