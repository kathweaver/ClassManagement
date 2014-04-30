<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Days Detail";
include 'header.php';

$m = $HTTP_GET_VARS["mode"]; 
$sort = $HTTP_GET_VARS["sort"]; 
$seq = $HTTP_GET_VARS["seq"]; 
$s = $HTTP_GET_VARS["status"]; 

if ($m == 'edit') { 
    $q1 = "SELECT * FROM Day where seq=$seq"; 
    $rslt1 = mysql_query($q1) or die("Query failed"); 
    $row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC); 
    /* Free resultset */ 
    mysql_free_result($rslt1);     
} else { 
    $seq = 0; 
} 
/* Closing connection */ 

$backurl = "daylist.php"; 
$posturl = "daypost.php"; 
         
echo "<a href=$backurl>Back</a>";     
echo '<form name="form1" method="POST" action="'.$posturl.'">'; 
echo "<input type='hidden' name='seq' value='$seq'>"; 
echo "<table>"; 
echo "<tr><th colspan=2>Day Detail</th></tr>"; 
echo '<tr><td>Six Weeks:</td><td>';
echo '<input type="text" name="sixweeks" size="5" maxlength="5"';
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['SixWeeks'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 
if ($m == 'add') {
	echo '<tr><td>Day:</td><td><input type="text" name="day" size="5" maxlength="5"'; 
}
	
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['Day'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

if ($m=='add') {
    $date = strtotime($date);
	$day1 = date('d', $date);
	$day1++;
	$month = date('m', $date);
	$year = date('Y', $date); 
	$week = 0;
	if ($day1 < 10) { $date = $month.'/0'.$day1.'/'.$year; } else { $date = $month.'/'.$day1.'/'.$year; }
	echo '<tr><td>Date:</td><td><input type="text" name="date" size="10" maxlength="10" value ='.$date; 
	}
else {
    echo '<tr><td>Date:</td><td><input type="text" name="date" size="10" maxlength="10"';
}

if ($m == 'edit') { 
    echo " value='".htmlentities($row1['Date'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo "<tr><td colspan=2 align=center><input type='submit' name='SubmitFrm' value='Save'></td></tr>"; 
echo "</table>"; 
echo "</form>"; 
if (isset($s)) { 
    echo "Edit Status: $s "; 
}     
if ($m == 'edit') { 
    $addUrl = "daydetail.php?mode=add&seq=$seq"; 
    if (isset($s)) 
        $addUrl .= "&sort=$s";     
} 

?> 