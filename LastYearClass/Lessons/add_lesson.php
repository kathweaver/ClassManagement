<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Add Lesson";
include 'header.php';
include_once 'db.php';

$submit = $_POST['submit'];
$subject = $_POST['class'];
$six_weeks = $_POST['six_weeks'];
$day = $_POST['day'];
$order = $_POST['dayorder'];
$dueDate = $_POST['duedate'];
$assignment = $_POST['assignment'];

$submit = stripslashes($submit);
$subject = stripslashes($subject);
$six_weeks = stripslashes($six_weeks);
$day = stripslashes($day);
$order = stripslashes($order);
$dueDate = stripslashes($dueDate);
$assignment = stripslashes($assignment);

	echo "\n<form name=\"form1\" action=\"add_lesson.php\" method=POST>";
	echo "<p align=\"center\">Add Lesson</p>";
	echo "<table width=\"75%\" border=\"0\">";
	echo "<tr>";
	echo "<td width=\"23%\">Class</td>";
	echo "<td width=\"77%\"><select name=\"class\" size=\"1\">";
	echo "<option selected>$subject";
	echo "<option value=\"APCSI\">APCSI</option>";
	echo "<option value=\"APCSII\">APCSII</option>";
	echo "<option value=\"CS\">CS</option>";
	echo "<option value=\"PreAP\">PreAP</option>";
	echo "<option value=\"Webmastering\">Webmastering</option>";
	echo "<option value=\"BCIS\">BCIS</option>";
	echo "</select></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Six Weeks</td>";
	echo "<td><input name=\"six_weeks\" type=\"text\" id=\"six_weeks\" size=\"5\" maxlength=\"1\" value=\"$six_weeks\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td height=\"24\">Day</td>";
	echo "<td><input name=\"day\" type=\"text\" id=\"day\" size=\"5\" maxlength=\"2\" value=\"$day\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Order</td>";
	echo "<td><input name=\"dayorder\" type=\"text\" id=\"dayorder\" size=\"5\" maxlength=\"2\" value=\"$order\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Due Date: </td>";
	echo "<td><input type=\"text\" name=\"duedate\" value=\"$duedate\"></td>";
	echo "</tr>";
	echo "<td>Assignment Index</td>";
	echo "<td><input name=\"assignment\" type=\"text\" id=\"assignment\" size=\"10\" maxlength=\"10\" value=\"$assignment\"></td>";
   	echo "</tr>";
    echo "<tr> ";
	echo "<td>&nbsp;</td>";
	
     	$addAssignUrl = "http://www.kweaver.net/class/Assignments/add_assignment.html"; 
	 	$listAssignUrl = "http://www.kweaver.net/class/Assignments/assignmentlist.php"; 
		echo "<td><input type=\"submit\" name=\"submit\" value=\"Add\">";
        echo "<input type=\"submit\" name=\"List\" value=\"List Assignments\" onClick=\"window.open('".$listAssignUrl."','',config='height=600,width=800');\">";
         echo "<input type=\"submit\" name=\"Add\" value=\"Add Assignment\" onClick=\"window.open('".$addAssignUrl."','',config='height=600,width=800');\">";
		echo "<input type=\"submit\" name=\"submit\" value=\"Update\"> </td>";
	echo "</tr>";
    echo "<tr>";
      echo "<td>&nbsp;</td>";
      echo "<td>&nbsp;</td>";
  echo "</tr>";
  echo "</table>";
  echo "<p>&nbsp;</p>";
  echo "</form>";

if ($submit=="List Lessons")
{
	echo "test";
}

if ($submit=="Add Assignment")
{
echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."','',config='height=600,width=700');\"></td>\t"; 
}

if ($submit=="Add")
{
	$user_level=$_SESSION['session_user_level'];
	if ($user_level < 4)
		echo ("You are not allowed to add lessons");
	else {
		$subject = $_POST['class'];
		$six_weeks = $_POST['six_weeks'];
		$day = $_POST['day'];
		$order = $_POST['dayorder'];
		$dueDate = $_POST['duedate'];
	
		$subject = stripslashes($subject);
		$six_weeks = stripslashes($six_weeks);
		$day = stripslashes($day);
		$order = stripslashes($order);
		$dueDate = stripslashes($dueDate);
		
		$sqlstring ="INSERT INTO Lessons ( Subject, SixWeeks, Day, DayOrder, DueDate, Assignment)
			VALUES ( '$subject', '$six_weeks', '$day', '$order', '$duedate', '$assignment')";
		echo("<BR>");
				
		$sql = mysql_query($sqlstring) or die (mysql_error());
		
		if(!$sql){
			echo 'There has been problem with adding your lesson. Please contact the webmaster.';
			echo '<P>';
		}
		else{
			echo "Lesson Added";
			echo '<P>';
		}
	}
}

if ($submit=="Update")
{
	$user_level=$_SESSION['session_user_level'];
	if ($user_level < 4)
		echo ("You are not allowed to update lessons");
	else {
		
		$sqlstring ="Update Lessons ( Subject, SixWeeks, Day, DayOrder, DueDate)
			VALUES ( '$subject', '$six_weeks', '$day', '$order', '$duedate')";
		echo("<BR>");
				
		$sql = mysql_query($sqlstring) or die (mysql_error());
		
		if(!$sql){
			echo 'There has been problem with adding your lesson. Please contact the webmaster.';
			echo '<P>';
		}
		else{
			echo "Lesson Update";
			echo '<P>';
		}
	}
}

include "footer.php";
?>
