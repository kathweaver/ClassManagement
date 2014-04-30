<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();

include_once 'db.php';
$page_title="Add Days";
include 'header.php';
$user_level=$_SESSION['session_user_level'];

if ($user_level < 4)
	echo ("You are not allowed to add days");
else {
	$six_weeks = $_POST['six_weeks'];
	$day = $_POST['day'];
	$date = $_POST['date'];
	
	$six_weeks = stripslashes($six_weeks);
	$day = stripslashes($day);
	$date = stripslashes($date);
	
	print $six_weeks;
	print $day;
	print $date;
	
	$sqlstring ="INSERT INTO Day (SixWeeks, Day, Date)
		VALUES ( '$six_weeks', '$day', '$date')";
	echo("<BR>");		
	$sql = mysql_query($sqlstring) or die (mysql_error());
	
	if(!$sql){
		echo 'There has been problem with adding your day. Please contact the webmaster.';
	}
	else{
		echo "Day Added";
	}
include 'footer.php';
}
?>
