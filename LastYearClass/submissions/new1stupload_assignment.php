<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$user_level=$_SESSION['session_user_level'];
$username=$_SESSION['session_username'];
$userid=$_SESSION['session_userid'];

$assignment_name = $_POST['assignment'];

include 'header.php';
include 'db.php';

include 'class_upload_files.php';

function list_assignments()
{
	include_once 'schedule.php';
	$i=0;
	
	while (empty($SixWeeks)) {
		$StartDate=date("m/d/Y",mktime (0,0,0,date("m")  ,date("d")+$i,date("Y")));
		$This_Day = new Day_Class($StartDate);
		$SixWeeks = $This_Day->SixWeeks;
		$i++;
	}
	
	$class = $_SESSION['session_class'];
	$q1 = "SELECT Assignment, Name FROM Lessons, Assignments WHERE Lessons.Assignment = Assignments.Index  And Subject = '$class' AND SixWeeks='1' AND TurnIn='1' GROUP BY Assignments.Index ORDER BY Day";
	$rslt1 = mysql_query($q1) or die("Query failed"); 

	while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
		echo '<option value= "'.$row1[Assignment].'">'.$row1[Name].'</option>';
	} 
}

if (isset($Submit))
	{
	
		$upload_class = new Upload_Files;
		$upload_class->upload_dir = "/home/kweavus/upload/".$username; 
		$upload_class->upload_log_dir = "/home/kweavus/upload/".$username."/logs"; 
	
		if ($user_level < 3)
			echo ("You are not allowed to add files");
		else
		{ 
			if ($upload_class->get_upload_directory() == "ERROR")
				$upload_class->create_directory();
			for ($i=0; $i<5; $i++)
			{
				$upload_class->file_name = trim($_FILES['upload_file']['name'][$i]);
				$upload_class->temp_file_name = trim($_FILES['upload_file']['tmp_name'][$i]);
				$upload_file = $upload_class->upload_file_no_validation();
				if (!$upload_file) {
					$result = "File".$i."could not be uploaded!\n";
				} else {
					$result = "File".$i."has been successfully uploaded to the server.\n";
				}
			}
			$sqlstring = "INSERT INTO submissions (`userid`, `filename0`,`filename1`, `filename2`, `filename3`, `filename4`, `assignment_name`, `submission_time`) ";
			$sqlstring = $sqlstring.' VALUES ('.$userid.', "'.$_FILES['upload_file']['name'][0].'", "'.$_FILES['upload_file']['name'][1].'", "';
			$sqlstring = $sqlstring.$_FILES['upload_file']['name'][2].'", "'.$_FILES['upload_file']['name'][3].'", "'.$_FILES['upload_file']['name'][4].'", "';
			$sqlstring = $sqlstring.$assignment_name.'" , NOW())';
			$sql = mysql_query($sqlstring);
			if(!$sql) echo 'There has been an error adding your assignment. Please contact your teacher.';
			else echo 'Assignment has been submitted!';
		}
	}
else
	{
?>
<Title>Turn in Assignment</Title>
<form name="form1" method="post" action="newupload_assignment.php" enctype="multipart/form-data">
<table>
<tr>
<td>
Assignment
</td>
<td><select name="assignment" size="1" id="assignment"> 
<?
	list_assignments()
?>
</td>
</tr>
<td>File1</td>
<td>
  <input name="upload_file[]" type="file" size="50">
</td>
</tr>
<tr>
<td>File2</td>
<td>
  <input name="upload_file[]"type="file" size="50">
</td>
</tr>
<tr>
<td>File3</td>
<td>
  <input name="upload_file[]" type="file" size="50">
</td>
</tr>
<tr>
<td>File4</td>
<td>
  <input name="upload_file[]" type="file" size="50">
</td>
<tr>
<td>File5</td>
<td>
  <input name="upload_file[]" type="file" size="50">
</td>

</tr>

<tr>
<td>
<input type="submit" name="Submit" value="Submit">
</td>
</tr>
</table>
</form>

<?
	}
	
include 'footer.php';
?>  