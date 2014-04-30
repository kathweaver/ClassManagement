<?
SESSION_START();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Add Lesson";
include 'header.php';
include_once 'db.php';

$submit = $_POST['submit'];

	$user_level=$_SESSION['session_user_level'];
	echo "<head>";
	echo "</head>";
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
		
		$sqlstring ="INSERT INTO Assignments ( Book, Topic, TEKS, Name, Instructions, URL, URLName, Textbook )
		VALUES ( '$book', '$topic', '$TEKS', '$name', '$instructions', '$URL', '$URL_Name', '$Textbook')";
		echo $sqlstring;				
		echo "<BR>";
		$sql = mysql_query($sqlstring) or die (mysql_error());
		$assignment = mysql_insert_id();
	
		$sqlstring ="INSERT INTO Lessons ( Subject, SixWeeks, Day, DayOrder, DueDate, Assignment)
			VALUES ( '$subject', '$six_weeks', '$day', '$order', '$duedate', '$assignment')";

		echo $s
		if(!$sql){
			echqlstring;
		echo "<BR>";				
		$sql = mysql_query($sqlstring) or die (mysql_error());
		o 'There has been problem with adding your lesson. Please contact the webmaster.';
			echo '<P>';
		}
		else{
			echo "Lesson Added";
			echo '<P>';
		}
}

include "footer.php";
?>
