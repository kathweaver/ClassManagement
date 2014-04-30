<?
class Day_Class{
	var $Exists=false;
	var $SixWeeks;
	var $AssignmentDay;
	var $Week;

	function Day_Class($search_date){
		$query = "SELECT * FROM Day WHERE Date LIKE '$search_date'";
		$sql = mysql_query($query); 
		$row_check = mysql_num_rows($sql);

		if ($row_check==0){
		   $this->Exists = false;
		}
		else {
			$this->Exists = true;
			while($row = mysql_fetch_array($sql)){
				foreach( $row AS $key => $val ){
					$$key = stripslashes( $val );
					} //end foreach
			} // end while
		$this->SixWeeks = $SixWeeks;
		$this->AssignmentDay = $Day;
	} // end else
  } //end function
}
?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this Lesson?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
function confirmcopy(copyurl) { 
    var msg = "Are you sure you want to Copy this Lesson?"; 
    if (confirm(msg)) 
        location.replace(copyurl);     
} 
function openwindow(address)
{
	window.open(address,"","status,,scrollbars,resizable")
}
</script> 
<?
class Assignments{
	function daily_Assignments($class, $sixweeks, $assignmentday, $user_level)
	{
		$q1="SELECT Lessons.Index, Book, Name, Topic, DueDate, Instructions, URL, URLName, Textbook, Assignment, DayOrder FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject='$class' AND SixWeeks='$sixweeks' AND Day ='$assignmentday' ORDER BY DayOrder";

		$sql = mysql_query($q1); 
		
		$row_check = mysql_num_rows($sql);
		if ($row_check == 0){
			echo("<center><H4>No assignments</H4></center><p>");
		}
		else {
			echo "<center><table border>";
			echo "<tr>";
			if ($user_level == 4)
				echo "<th></th><th>Assignment Index</th>";
			echo "<th>Book</th><th>Name</th><th>DueDate</th><th>Instructions</th><th>URL</th>";
			if ($user_level == 4)
				echo "<th>&nbsp</th><th>&nbsp</th>";
			echo "</tr>";			
			while($row = mysql_fetch_array($sql)){
				foreach( $row AS $key => $val ){
					$$key = stripslashes( $val );
				}
			if (empty($Book)) $Book="&nbsp";
			if (empty($Name)) $Name="&nbsp";
			if (empty($DueDate)) $DueDate="&nbsp";
			if (empty($Instructions)) $Instructions="&nbsp";
			
			echo ("<tr>");
			if ($user_level == 4){
				$dtlUrl = "http://www.kweaver.net/class/Lessons/lessondetail.php?mode=edit&Index=".$row[Index]; 
	            echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."');\"></td>\t"; 
				echo "<td>$row[Assignment]</td>";
			}
			echo ("<td>$Book</td><td>$Name</td><td>$DueDate</td><td>$Instructions</td>");
			if ($user_level >= 2) {
				if (!empty($URL))
					echo ('<td><a href='.$URL.' TARGET="_blank">'.$URLName.'</a></td>');
				elseif (!empty($Textbook))
					echo ('<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
				else
					echo('<td>&nbsp</td>');
			}
			if ($user_level == 4){
				$delUrl = "http://www.kweaver.net/class/Lessons/lessonpost.php?mode=delete&delIndex=".$row[Index]; 
				$copyURL ="http://www.kweaver.net/class/Lessons/lessondetail.php?mode=copy&Index=".$row[Index]; 
		    	echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t"; 
				echo "<td><input type=\"button\" value=\"Copy\" onClick=\"confirmcopy('".$copyURL."');\"></td>\t</tr>\n"; 
			}
			echo("</tr>");
		} //end while loop
		echo "</table></center>";
		}
	mysql_free_result($sql); 
	}
	function SixWeeks_Assignments($class, $sixweeks){
		echo "<table border>";

		echo "<tr>";
		echo "<th>Day</th><th>Book</th><th>Name</th><th>DueDate</th><th>Instructions</th><th>URL</th>";
		if ($_SESSION['session_user_level']==4){
			echo "<th>Index</th>";
		}
		echo "</tr>";
	
		$sql = mysql_query("SELECT MAX( DAY ) FROM Lessons WHERE Subject = '$class' AND SixWeeks = $sixweeks");
		$maxrows = mysql_result($sql,0);
		
		for( $i=1; $i<=$maxrows; $i++){	
			$sql = mysql_query("SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index  And Subject = '$class' AND SixWeeks='$sixweeks' AND Day=$i ORDER BY DayOrder"); 
			$row_check = mysql_num_rows($sql);

			$count=0;
			while($row = mysql_fetch_array($sql)){
				$count++;
				foreach( $row AS $key => $val ){
					$$key = stripslashes( $val );
				}
			if ($count == 1)
			if ($_SESSION['session_user_level']==4)
					echo("<tr><td rowspan=' $row_check'><a href='http://www.kweaver.net/class/Lessons/lessonlist.php?Class=$class&six_weeks=$sixweeks&day=$i'>$i</a></td>");
				else
					echo("<tr><td rowspan=' $row_check'>$i</td>");			
			else
				echo("<tr>");
			if (empty($Book)) $Book="&nbsp";
			if (empty($Name)) $Name="&nbsp";
			if (empty($DueDate)) $DueDate="&nbsp";
			if (empty($Instructions)) $Instructions="&nbsp";
			echo ("<td>$Book</td><td>$Name</td><td>$DueDate</td><td>$Instructions</td>");
			if ($_SESSION['session_user_level']>=2){
				if (!empty($URL))
					echo ('<td><a href='.$URL.' TARGET="_blank">'.$URLName.'</a></td>');
				elseif (!empty($Textbook))
					echo ('<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
				else
					echo('<td>&nbsp</td>');
			}
			if ($_SESSION['session_user_level'] == 4){
				echo ('<td>'.$Assignment.'</td>');
			}

			} //end while loop
		}
	echo "</table>";
	mysql_free_result($sql); 
	}
	function SixWeeks_TurnIn($class, $sixweeks){
		echo "<table border>";

		echo "<tr>";
		echo "<th>Day</th><th>Book</th><th>Name</th><th>DueDate</th><th>Instructions</th><th>URL</th>";
		if ($_SESSION['session_user_level']==4){
			echo "<th>Index</th>";
		}
		echo "</tr>";
	
		$sql = mysql_query("SELECT MAX( DAY ) FROM Lessons WHERE Subject = '$class' AND SixWeeks = $sixweeks");
		$maxrows = mysql_result($sql,0);
		
		for( $i=1; $i<=$maxrows; $i++){	
			$sql = mysql_query("SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index  And Subject = '$class' AND SixWeeks='$sixweeks' AND Assignments.TurnIn='1' AND Day=$i ORDER BY DayOrder"); 
			$row_check = mysql_num_rows($sql);

			$count=0;
			while($row = mysql_fetch_array($sql)){
				$count++;
				foreach( $row AS $key => $val ){
					$$key = stripslashes( $val );
				}
			if ($count == 1)
			if ($_SESSION['session_user_level']==4)
					echo("<tr><td rowspan=' $row_check'><a href='http://www.kweaver.net/class/Lessons/lessonlist.php?Class=$class&six_weeks=$sixweeks&day=$i'>$i</a></td>");
				else
					echo("<tr><td rowspan=' $row_check'>$i</td>");			
			else
				echo("<tr>");
			if (empty($Book)) $Book="&nbsp";
			if (empty($Name)) $Name="&nbsp";
			if (empty($DueDate)) $DueDate="&nbsp";
			if (empty($Instructions)) $Instructions="&nbsp";
			echo ("<td>$Book</td><td>$Name</td><td>$DueDate</td><td>$Instructions</td>");
			if ($_SESSION['session_user_level']>=2){
				if (!empty($URL))
					echo ('<td><a href='.$URL.' TARGET="_blank">'.$URLName.'</a></td>');
				elseif (!empty($Textbook))
					echo ('<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
				else
					echo('<td>&nbsp</td>');
			}
			if ($_SESSION['session_user_level'] == 4){
				echo ('<td>'.$Assignment.'</td>');
			}

			} //end while loop
		}
	echo "</table>";
	mysql_free_result($sql); 
	}
	
	function Daily_Assignments_File($class, $sixweeks, $assignmentday){
	    $filename = "/home/kweavus/public_html/class/daily/".$class.".html";
		$fp=fopen($filename,"w");
		fputs($fp,"<html>");
		fputs($fp,"<head>");
		fputs($fp,'<link href="http://www.kweaver.net/class/style.css" rel="stylesheet" type="text/css">');
		fputs($fp,"</head>");
		fputs($fp,"<body>");
		fputs($fp,"<img src='http://www.kweaver.net/class/forms/Layer.gif'>");
		fputs($fp,"<H3><center>Assignments - $class</center></H3>");
		fputs($fp,"<center>Six Weeks: $sixweeks</center> Day: $assignmentday");
			
		fputs($fp,"<table border>");
		fputs($fp,"<tr><th>Book</th><th>Name</th><th>DueDate</th><th>Instructions</th><th>URL</th><tr>");
		
		$q1="SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject='".$class."' AND SixWeeks = $sixweeks AND Day = $assignmentday ORDER BY DayOrder";
		$sql = mysql_query($q1);
		$maxrows = mysql_result($sql,0);
		
		$sql = mysql_query("SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject='$class' AND SixWeeks='$sixweeks' AND Day=$assignmentday ORDER BY DayOrder"); 
		$row_check = mysql_num_rows($sql);
		fputs($fp,'<tr>');
		$count=0;
		while($row = mysql_fetch_array($sql)){
			$count++;
			foreach( $row AS $key => $val ){
				$$key = stripslashes( $val );
		}

		if (empty($Book)) $Book="&nbsp";
		if (empty($Name)) $Name="&nbsp";
		if (empty($DueDate)) $DueDate="&nbsp";
		if (empty($Instructions)) $Instructions="&nbsp";
		fputs($fp,"<td>$Book</td><td>$Name</td><td>$DueDate</td><td>$Instructions</td>");
		if (!empty($URL))
			fputs($fp,'<td><a href='.$URL.' TARGET="_blank">'.$URLName.'</a></td>');
		elseif (!empty($Textbook))
			fputs($fp,'<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
		else
			fputs($fp,'<td>&nbsp</td>');
		fputs($fp,'<tr>');
		} //end while loop

		fputs($fp,"</table>");

		fputs($fp,"</body>");
		fclose($fp);
		mysql_free_result($sql); 		
	}
	function SixWeeks_Assignments_File($class, $sixweeks){
		$filename = "/home/kweavus/public_html/class/sixweeks/".$class.".html";
		$fp=fopen($filename,"w");
		fputs($fp,"<html>");
		fputs($fp,"<head>");
		fputs($fp,'<link href="http://www.kweaver.net/class/style.css" rel="stylesheet" type="text/css">');
		fputs($fp,"</head>");
		fputs($fp,"<body>");
		fputs($fp,"<img src='http://www.kweaver.net/class/forms/Layer.gif'>");
		fputs($fp,"<H3><center>Assignments - $class</center></H3>");
		fputs($fp,"<center>Six Weeks: $sixweeks</center>");
			
		fputs($fp,"<table border>");
		fputs($fp,"<tr><th>Day</th><th>Book</th><th>Name</th><th>DueDate</th><th>Instructions</th><th>URL</th><tr>");
		
		$sql = mysql_query("SELECT MAX( DAY ) FROM Lessons WHERE Subject ='$class' AND SixWeeks = $sixweeks");
		$maxrows = mysql_result($sql,0);
		
		for( $i=1; $i<=$maxrows; $i++){	
			$sql = mysql_query("SELECT * FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index AND Subject ='$class' AND SixWeeks='$sixweeks' AND Day=$i ORDER BY DayOrder"); 
			$row_check = mysql_num_rows($sql);

			$count=0;
			while($row = mysql_fetch_array($sql)){
				$count++;
				foreach( $row AS $key => $val ){
					$$key = stripslashes( $val );
			}
			if ($count == 1)
				fputs($fp,"<tr><td rowspan=' $row_check'>$i</td>");			
			else
				fputs($fp,"<tr>");
			if (empty($Book)) $Book="&nbsp";
			if (empty($Name)) $Name="&nbsp";
			if (empty($DueDate)) $DueDate="&nbsp";
			if (empty($Instructions)) $Instructions="&nbsp";
			fputs($fp,"<td>$Book</td><td>$Name</td><td>$DueDate</td><td>$Instructions</td>");
			if (!empty($URL))
				fputs($fp,'<td><a href='.$URL.' TARGET="_blank">'.$URLName.'</a></td>');
			elseif (!empty($Textbook))
				fputs($fp,'<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
			else
				fputs($fp,'<td>&nbsp</td>');

			} //end while loop
		}
		fputs($fp,"</table>");

		fputs($fp,"</body>");
		fclose($fp);
		mysql_free_result($sql); 		
	}
}
?>