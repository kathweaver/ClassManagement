<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';

// Define post fields into simple variables
$grade = $_POST['grade'];
$grade_comment=$_POST['comment'];
$index = $_POST['index'];

$grade = stripslashes($grade);
if ($grade == "") $grade = 0;

$sqlstring = 'UPDATE submissions SET `grade`='.$grade.', `grade_comments`= "'.$grade_comment.'", `grade_date`=NOW() WHERE `index`='.$index;

$sql = mysql_query($sqlstring) 
		or die (mysql_error());
				
if (! $sql)
	echo ('Could not update grade');
else
	echo('Update successful');
echo "<p>";
include 'list_teacher_grade.php';
?>