<?php
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Assignment Detail";
include 'header.php';

$m = $HTTP_GET_VARS["mode"]; 

$Index = $HTTP_GET_VARS["Index"]; 

$s = $HTTP_GET_VARS["status"]; 

if ($m == 'edit' or $m == 'copy') { 
    $q1 = "SELECT * FROM Assignments WHERE 1 AND `Index` =".$Index;
	$rslt1 = mysql_query($q1) or die("Select Query failed"); 
    $row1 = mysql_fetch_array($rslt1); 
    /* Free resultset */ 
    mysql_free_result($rslt1);     
} else { 
    $Index = 0; 
} 

$posturl = "assignmentpost.php"; 
$addurl = "assignmentdetail.php?mode=add"; 
         
echo '<form name="form1" method="POST" action="'.$posturl.'">'; 
echo "<table>"; 

echo "<tr><th colspan=2>Assignment Detail</th></tr>"; 

if ($m == 'edit') echo "<td><input type='hidden' name='Index' value='$Index'>"; 
echo "</td></tr>";

echo '<tr><td>Book:</td><td><input type="text" name="Book" size="25"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Book'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Lesson Name:</td><td><input type="text" name="Name" size="25"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Name'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Topic:</td><td><input type="text" name="Topic" size="25"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Topic'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>TEKS:</td><td><input type="text" name="TEKS" size="25"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['TEKS'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";


echo '<tr><td>Instructions:</td><td><input type="text" name="Instructions" size="100"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Instructions'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 
echo '<tr><td>URL Name</td><td><input type="text" name="URLName" size="25" maxlength="25"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['URLName'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>URL</td><td><input type="text" name="URL" size="100" maxlength="200"'; 
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
echo "</tr>"; 

echo "</table>"; 
echo "</form>"; 
if (isset($s)) { 
    echo "Edit Status: $s "; 
}     
if ($m == 'edit') { 
    $addUrl = "http://www.kweaver.net/class/Both/assignmentdetail.php?mode=add&Index=$Index"; 
} 
//include 'footer.php';
?> 