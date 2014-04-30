<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
require_once("zip.lib.php");

$Submit = $_POST['Submit'];
$Upload = $_POST['Upload'];
$filename = $_POST['filename'];
$username = $_POST['username'];

if ($Submit == "Submit")
{// Define post fields into simple variables
	$grade = $_POST['grade'];
	$grade_comment=$_POST['comment'];
	$index = $_POST['index'];
	
	$grade = stripslashes($grade);
	if ($grade == "") $grade = 0;
	
	$sqlstring = 'UPDATE subtest SET `grade`='.$grade.', `grade_comments`= "'.$grade_comment.'", `grade_date`=NOW() WHERE `index`='.$index;
	
	$sql = mysql_query($sqlstring) 
			or die (mysql_error());
					
	if (! $sql)
		echo ('Could not update grade');
	else
		echo('Update successful');
	echo "<p>";
	include 'list_teacher_grade.php';
}

if ($Upload== "Upload Website")
{
	$arch="/home/kweavus/upload/".$username."/".$filename;
	$file="/home/kweavus/public_html/students/".$username."/";
	$zip = new Zip;
	$zip->Extract($arch,$file,Array(-1));
}
?>