<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Add Assignment";
include 'header.php';
include_once 'db.php';

$user_level=$_SESSION['session_user_level'];
echo "<head>";
echo "</head>";
if ($user_level < 4)
	echo ("You are not allowed to add assignments");
else {
	$book = $_POST['book'];
	$name = $_POST['name'];
	$topic = $_POST['topic'];
	$TEKS = $_POST['TEKS'];
	$instructions = $_POST['instructions'];
	$URL_Name = $_POST['URL_Name'];
	$URL = $_POST['URL'];
	$Textbook = $_POST['Textbook'];
	$TurnIn=$HTTP_POST_VARS['TurnIn'];
	$book = stripslashes($book);
	$name = stripslashes($name);
	$topic = stripslashes($topic);
	$TEKS = stripslashes($TEKS);
	$instructions = stripslashes($instructions);
	$URL_Name = stripslashes($URL_Name);
	$URL = stripslashes($URL);
	$Textbook = stripslashes($Textbook);
	
	if ($TurnIn=="on") 
	   	    $TurnIn=1;
	   	else
			$TurnIn=0;
	echo $TurnIn;
	$sqlstring ="INSERT INTO Assignments ( Book, Topic, TEKS, Name, Instructions, URL, URLName, Textbook, TurnIn )
		VALUES ( '$book', '$topic', '$TEKS', '$name', '$instructions', '$URL', '$URL_Name', '$Textbook', '$TurnIn')";
				
	$sql = mysql_query($sqlstring) or die (mysql_error());
	
	if(!$sql){
		echo 'There has been problem with adding your assignment. Please contact the webmaster.';
		echo '<P>';
	}
	else{
		$entry = mysql_insert_id();
		echo "Assignment Added -- Entry number $entry";
		echo '<P>';
	}
}
include "footer.php";
?>
