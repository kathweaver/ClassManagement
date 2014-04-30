<? 
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$user_level=$_SESSION['session_user_level'];
$username=$_SESSION['session_username'];
$userid=$_SESSION['session_userid'];
$class=$_SESSION['session_class'];
include 'header.php';
?>
<Title>Turn in Assignment</Title>
<form name="form1" method="post" action="upload_assignment.php" enctype="multipart/form-data">
  <table>
  
<?
	q1="SELECT * FROM Lessons, Assignments WHERE 
	echo "<tr>";
	echo '<td width="23%">Assignment</td>';
	echo '<td width="77%"><select name="assignment" size="1">';
	echo '<option value="APCSI">APCSI</option>';
	echo '</select></td>';
	echo '</tr>';
?>
<tr>
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
