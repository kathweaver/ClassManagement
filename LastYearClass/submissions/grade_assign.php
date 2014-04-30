<?

SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();

include_once 'db.php';
$page_title="Grade Assignments";
include 'header.php';
$user_level=$_SESSION['session_user_level'];
$assignment_index=$_REQUEST['index'];

$sql_string="SELECT * FROM submissions sub, users user WHERE `index`=$assignment_index and sub.userid = user.userid";
$sql = mysql_query($sql_string);

$result = mysql_num_rows($sql);
	
if($result > 0){
		while($row = mysql_fetch_array($sql)){
		foreach( $row AS $key => $val ){
			$$key = stripslashes( $val );
			}
		}
	}
echo '<form name="form1" method="post" action="update_grade.php" enctype="multipart/form-data">';
echo "<table>";
echo "<tr>";
echo "<td>Index</td>";
echo '<td><input name="index" value='.$assignment_index.' type="text"></td>';
echo "</tr>";
echo "<tr>";
echo "<td>Assignment</td>";

if (is_numeric($assignment_name))
	{
		$q1 = "SELECT Name FROM Assignments WHERE `Index` = ".$assignment_name;
		$sqlResult = mysql_query($q1);
		$row1 = mysql_fetch_array($sqlResult, MYSQL_ASSOC);
		$assignment_name =	$row1['Name'];
	}

echo '<td>'.$assignment_name.'<td>';
echo "</tr>";
echo "<tr>";
echo "<td>File1</td>";
echo '<td><a href="http://www.kweaver.net/class/readfile.php?path=upload/'.$username."/".$filename0.'">'.$filename0.'</a></td>';
echo "</tr>";
echo "<tr><td>File2</td>";
echo '<td><a href="http://www.kweaver.net/class/readfile.php?path=upload/'.$username."/".$filename1.'">'.$filename1.'</a></td>';
echo "</tr>";
echo "<tr>";
echo "<td>File3</td>";
echo '<td><a href="http://www.kweaver.net/class/readfile.php?path=upload/'.$username."/".$filename2.'">'.$filename2.'</a></td>';
echo "</tr>";
echo "<tr>";
echo "<td>File4</td>";
echo '<td><a href="http://www.kweaver.net/class/readfile.php?path=upload/'.$username."/".$filename3.'">'.$filename3.'</a></td>';
echo "<tr>";
echo "<td>File5</td>";
echo '<td><a href="http://www.kweaver.net/class/readfile.php?path=upload/'.$username."/".$filename4.'">'.$filename4.'</a></td>';
echo "</tr>";
echo "<tr>";
echo "<td>Grade</td>";
echo '<td><input name="grade" type="text"></td>';
echo "</tr>";
echo "<tr>";
echo "<td>Comment</td>";
echo '<td><textarea name="comment" cols="100" rows="5"></textarea></td>';
?>
	<script language="javascript1.2">
	editor_generate('comment');
	</script>
<?
echo "</tr>";
echo "<tr>";
echo '<td><input type="submit" name="Submit" value="Submit"></td>';
$uploadUrl ="teacheruploadStudent.php?Username=".$username."&Filename=".$filename0;
echo "<td><input type=\"button\" value=\"Upload\" onClick=\"window.open('".$uploadUrl."');\"></td></tr>";
echo "</tr>";
echo "</table>";
echo "</form>";
 

include 'footer.php';
?>