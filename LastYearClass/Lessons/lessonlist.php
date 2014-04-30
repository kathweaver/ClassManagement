<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="List Lessons";
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
function loadlist($class) { 
		 
	$six_weeks = $_REQUEST['six_weeks'];
	$day = $_REQUEST['day'];
	$user_level = $_SESSION['session_user_level'];
	$offset=$_REQUEST['offset'];

	$six_weeks = stripslashes($six_weeks);
	$day=stripslashes($day);
	$user_level=stripslashes($user_level);

	if ($class == "")
		$q1= "SELECT * FROM Lessons"; 
	else
		if ($six_weeks == "")
			$q1 = "SELECT * FROM Lessons WHERE Subject ='".$class."'"; 
		else
			if ($day == "")
				$q1 = "SELECT * FROM Lessons WHERE Subject = '".$class."' AND  SixWeeks = $six_weeks";
			else
				$q1 = "SELECT * FROM Lessons WHERE Subject = '".$class."' AND SixWeeks = $six_weeks AND Day = $day";
		
	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

	if (empty($offset)) { 
		$offset=0; 
	  }
	$limit=20; // change to number of items displayed per page 

	if ($class == "")
		$q1= "SELECT * FROM Lessons Order by Subject, SixWeeks, Day, DayOrder LIMIT $offset,$limit"; 
	else
		if ($six_weeks == "")
			$q1 = "SELECT * FROM Lessons WHERE Subject ='".$class."' Order by SixWeeks, Day, DayOrder LIMIT $offset,$limit"; 
		else
			if ($day == "")
				$q1 = "SELECT * FROM Lessons WHERE Subject ='".$class."' AND SixWeeks = $six_weeks Order by SixWeeks, Day, DayOrder LIMIT $offset,$limit";
			else
				$q1 = "SELECT * FROM Lessons WHERE Subject ='".$class."' AND SixWeeks = $six_weeks AND Day = $day Order by SixWeeks, Day, DayOrder LIMIT $offset,$limit";

   $rslt1 = mysql_query($q1) or die("Query failed"); 

	echo "<body>";
	echo "<center><h3>$class</h3></center>";
	echo "<P>";
	echo "<center><table border>";
	echo "<tr>";
	echo "<th>&nbsp;</th>";
	echo "<th>Class</th><th>Six Weeks</th><th>Day</th><th>Order</th><th>DueDate</th><th>Assignment</th>";
	echo "<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>";
	echo "</tr>";
    while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
        echo "\t<tr>\n"; 
    	$dtlUrl = "lessondetail.php?mode=edit&Index=".$row1['Index']; 
	    $delUrl = "lessonpost.php?mode=delete&delIndex=".$row1['Index']; 
		$copyUrl ="lessondetail.php?mode=copy&Index=".$row1['Index'];
		$assignUrl = "../Assignments/assignmentdetail.php?mode=edit&Index=".$row1['Assignment'];
		
		if (empty($row1['DueDate'])) $row1['DueDate']="&nbsp";
		if ($user_level == 4)
            echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."','',config='height=600,width=700');\"></td>\t"; 
		echo "\t\t<td>".$row1['Subject']."</td>";
		echo "\t\t<td>".$row1['SixWeeks']."</td>";
		echo "\t\t<td>".$row1['Day']."</td>";
		echo "\t\t<td>".$row1['DayOrder']."</td>";
		echo "\t\t<td>".$row1['DueDate']."</td>";
		echo "\t\t<td>".$row1['Assignment']."</td>";
		if ($user_level == 4)
            echo "<td><input type=\"button\" value=\"Assignment\" onClick=\"window.open('".$assignUrl."');\"></td>\t"; 
		if ($user_level == 4){
	    	echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t"; 
			echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\"></td>\t</tr>\n"; 
		}
 	}
    echo "</table>\n"; 
	echo "</center>\n"; 
	
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
	$class = $_REQUEST['Class'];  
	$class=stripslashes($class);
	
    echo "<a href=http://www.kweaver.net/class/Lessons/find_lesson.php>Back</a>";     
    loadlist($class); 
	
include 'footer.php';
?> 