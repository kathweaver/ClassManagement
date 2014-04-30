<?php
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
$page_title="List Due Assignment this Six Weeks";
include_once 'header.php';

include 'sessionchecker.php';
include_once 'schedule.php';
session_checker();

$class = $_SESSION['session_class'];
$user_level = $_SESSION['session_user_level'];

$SixWeeks = $_REQUEST['SixWeeks'];

include_once 'db.php';

	echo "<table border>";
	echo "<tr>";
	$q1 = "SELECT Book, Name, Topic, DueDate, Instructions, URL, URLName, Textbook, Assignment FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index  And Subject = '$class' AND SixWeeks='$sixweeks' AND TurnIn='1' GROUP BY Assignments.Index ORDER BY Day";
    
	$rslt1 = mysql_query($q1) or die("Query failed"); 
	$user_level = $_SESSION['session_user_level'];
	
	if ($user_level == 4)
				echo "<th>Assignment Index</th>";
	echo "<th>Book</th><th>Name</th><th>Topic</TH><th>Instructions</th><th>URL</th><TH>Due Date</TH>";
	echo "</tr>";
    while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
        echo "<tr>"; 
		if ($user_level == 4){
				$dtlUrl = "http://www.kweaver.net/class/Assignments/assignmentdetail.php?mode=edit&Index=".$row1[Assignment]; 
	            echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."');\"></td>\t"; 
			}
		if (empty($row1['Book'])) $row1['Book']="&nbsp";
		if (empty($row1['Name'])) $row1['Name']="&nbsp";
		if (empty($row1['Topic'])) $row1['Topic']="&nbsp";
		if (empty($row1['DueDate'])) $row1['DueDate']="&nbsp";
		if (empty($row1['Instructions'])) $row1['Instructions']="&nbsp";
	   	echo "<td>".$row1['Book']."</td>";
		echo "<td>".$row1['Name']."</td>";
		echo "<td>".$row1['Topic']."</td>";		
		echo "<td>".$row1['Instructions']."</td>";
		$URL=$row1['URL'];
		$URLName=$row1['URLName'];
		$Textbook=$row1['Textbook'];
		if (!empty($URL))
			echo ("<td><a href=$URL>$URLName</a></td>");
		elseif (!empty($Textbook))
			echo ('<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
		else
			echo('<td>&nbsp;</td>');
		echo "<TD>".$row1['DueDate']."</td>";
		echo "</TR>";
 	}
	
    echo "</table>"; 
	
include 'footer.php';	
?>