<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Assignment Detail";
include 'header.php';
$m = $HTTP_GET_VARS["mode"]; 

$Index = $_REQUEST["Index"];

$s = $HTTP_GET_VARS["status"]; 

if ($m == 'edit' or $m='copy') { 
    $q1 = "SELECT * FROM Assignments WHERE 1 AND `Index` =".$Index;
	$rslt1 = mysql_query($q1) or die("Select Query failed"); 
    $row1 = mysql_fetch_array($rslt1); 
    /* Free resultset */ 
    mysql_free_result($rslt1);     
} else { 
    $Index = 0; 
} 
if ($m=='edit') $posturl = "assignmentpost.php?mode=edit&Index=".$Index; 
if ($m=='copy') $posturl = "assignmentpost.php?mode=add"; 
 
echo '<form name="form1" method="POST" action="'.$posturl.'">'; 
echo "<input type='hidden' name='Index' value='$Index'>"; 
echo "<table>"; 

echo "<tr><th colspan=2>Assignment Detail</th></tr>"; 

if ($m == 'edit') {
	echo "<tr><td>Index:</td><td>$Index"; 
	echo "</td></tr>";
	}

echo '<tr><td>Book:</td><td><input type="text" name="Book" size="50"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Book'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Lesson Name:</td><td><input type="text" name="Name" size="50"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Name'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Topic:</td><td><input type="text" name="Topic" size="50"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Topic'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td height="115">TEKS:</td><td><textarea name="TEKS" cols="80" rows="10" size=2000>'; 
if ($m != 'add') { 
    echo htmlentities($row1['TEKS'],ENT_QUOTES)."</textarea>"; 
} 
echo "</td></tr>"; 

echo '<tr><td height="115">Instructions:</td><td><textarea name="Instructions" cols="80" rows="10" size=2000>'; 
if ($m != 'add') { 
    echo htmlentities($row1['Instructions'],ENT_QUOTES)."</textarea>"; 
} 
echo "</td></tr>"; 
?>
 <script language="javascript1.2">
	editor_generate('Instructions');
	</script>
 <script language="javascript1.2">
	editor_generate('TEKS');
</script>
<?php
echo '<tr><td>URL Name</td><td><input type="text" name="URLName" size="25" maxlength="250"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['URLName'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>URL</td><td><input type="text" name="URL" size="100" maxlength="100"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['URL'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>Textbook</td><td><input type="text" name="Textbook" size="100" maxlength="100"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Textbook'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>Turn In</td><td>';
echo $row1['Turnin'];
if ($m != 'add'){
	if ($row1['TurnIn']!=1)
		echo '<input name="TurnIn" type="checkbox" unchecked>';
    else
		echo '<input name="TurnIn" type="checkbox" checked>';

} 
echo "</td></tr>"; 


echo "<tr><td><input type='submit' name='SubmitFrm' value='Save'></td>"; 
$copyUrl ="http://www.kweaver.net/class/Assignments/assignmentdetail.php?mode=copy&Index=".$Index; 
echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\"></td>";
echo "</tr>"; 

echo "</table>"; 
echo "</form>"; 
if (isset($s)) { 
    echo "Edit Status: $s "; 
}     
if ($m == 'edit') { 
    $addUrl = "http://www.kweaver.net/class/Assignments/assignmentdetail.php?mode=add&Index=$Index"; 
} 
include 'footer.php';
?> 