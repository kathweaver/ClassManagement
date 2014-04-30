<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Lesson Detail";
include 'header.php';

$m = $HTTP_GET_VARS["mode"]; 
$Index = $HTTP_GET_VARS["Index"]; 
$s = $HTTP_GET_VARS["status"]; 

if ($m == 'edit' or $m == 'copy') { 
    $q1 = "SELECT * FROM Lessons WHERE 1 AND `Index` =".$Index;
	$rslt1 = mysql_query($q1) or die("Lesson Query failed"); 
    $row1 = mysql_fetch_array($rslt1); 

    /* Free resultset */ 
    mysql_free_result($rslt1);     
} else { 
    $Index = 0; 
} 

$backurl = "lessonlist.php"; 
if ($m=='edit') $posturl = "lessonpost.php?mode=edit&Index=".$Index; 
if ($m=='copy') $posturl = "lessonpost.php?mode=edit&Index=";
$addurl = "lessondetail.php?mode=add"; 
         
echo "<a href=$backurl>Back</a>&nbsp;&nbsp;<a href=$addurl>Lesson</a>"; 
echo '<form name="form1" method="POST" action="'.$posturl.'">'; 
echo "<table>"; 

echo "<tr><th colspan=2>Lesson Detail</th></tr>"; 

if ($m == 'edit') echo "<input type='hidden' name='Index' value='$Index'>"; 
if ($m == 'copy' || $m=='edit') {
	echo '<tr><td>Class:</td><td><input type="text" name="Subject" size="25"'; 
    echo " value='".htmlentities($row1['Subject'],ENT_QUOTES)."'";
	} 
echo "</td></tr>";

echo '<tr><td>Six Weeks:</td><td><input type="text" name="SixWeeks" size="5"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['SixWeeks'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Day:</td><td><input type="text" name="Day" size="5" maxlength="5"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Day'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Day Order:</td><td><input type="text" name="DayOrder" size="5"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['DayOrder'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>Due Date:</td><td><input type="text" name="DueDate" size="12" maxlength="12"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['DueDate'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";
echo '<tr><td>Assignment:</td><td><input type="text" name="Assignment" size="12" maxlength="12"'; 
if ($m != 'add') { 
    echo " value='".htmlentities($row1['Assignment'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo "<tr><td><input type='submit' name='SubmitFrm' value='Save'></td>"; 
$copyUrl ="lessondetail.php?mode=copy&Index=".$row1['Index']; 
$assignUrl = "../Assignments/assignmentdetail.php?mode=edit&Index=".$row1['Assignment'];
$listrelatedURL = "../Assignments/assignmentrelated.php?&Index=".$row1['Assignment'];
$listassignURL = "../Assignments/assignmentdump.php";
echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\"></td>";
echo "<td><input type=\"button\" value=\"List Assignments\" onClick=\"window.open('".$listassignURL."');\"></td>";
echo "<td><input type=\"button\" value=\"Related Assignments\" onClick=\"window.open('".$listrelatedURL."');\"></td>";
echo "<td><input type=\"button\" value=\"Edit Assignment\" onClick=\"window.open('".$assignUrl."');\"></td>";
echo "</tr>"; 

echo "</table>"; 
echo "</form>"; 
if (isset($s)) { 
    echo "Edit Status: $s "; 
}     
if ($m == 'edit') { 
    $addUrl = "lessondetail.php?mode=add&class=$class&Index=$Index"; 
} 
include 'footer.php';
?> 