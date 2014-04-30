<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="User Detail";
include 'header.php';

$m = $HTTP_GET_VARS["mode"]; 
$sort = $HTTP_GET_VARS["sort"]; 
$userid = $HTTP_GET_VARS["userid"]; 
$s = $HTTP_GET_VARS["status"]; 

if ($m == 'edit') { 
    $q1 = "SELECT * FROM users WHERE userid=$userid"; 
	$rslt1 = mysql_query($q1) or die("Select Query failed"); 
    $row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC); 
    /* Free resultset */ 
    mysql_free_result($rslt1);     
} else { 
    $seq = 0; 
} 
/* Closing connection */ 

$backurl = "userlist.php"; 
$posturl = "userpost.php"; 
$addurl = "userdetail.php?mode=add"; 
         
echo "<a href=$backurl>Back</a>&nbsp;&nbsp;<a href=$addurl>Add New User</a>";     
echo '<form name="form1" method="POST" action="'.$posturl.'">'; 
echo "<input type='hidden' name='userid' value='$userid'>"; 
echo "<table>"; 
echo "<tr><th colspan=2>User Detail</th></tr>"; 
echo '<tr><td>Username:</td><td><input type="text" name="username" size="25" maxlength="25"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['username'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";

echo '<tr><td>User Level:</td><td><input type="text" name="user_level" size="25" maxlength="25"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['user_level'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>";
echo '<tr><td>First Name:</td><td><input type="text" name="first_name" size="25" maxlength="25"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['first_name'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 
echo '<tr><td>Last Name:</td><td><input type="text" name="last_name" size="25" maxlength="25"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['last_name'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 
echo '<tr><td>Student ID:</td><td><input type="text" name="StudentId" size="8" maxlength="28"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['StudentId'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 
echo '<tr><td>Class:</td><td><input type="text" name="class" size="15" maxlength="15"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['class'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>Period:</td><td><input type="text" name="period" size="5" maxlength="5"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['period'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>Activated:</td><td><input type="text" name="activated" size="5" maxlength="5"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['activated'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo '<tr><td>Email Address:</td><td><input type="text" name="email_address" size="25" maxlength="50"'; 
if ($m == 'edit') { 
    echo " value='".htmlentities($row1['email_address'],ENT_QUOTES)."'"; 
} 
echo "></td></tr>"; 

echo "<tr><td colspan=2 align=center><input type='submit' name='SubmitFrm' value='Save'></td></tr>"; 

echo "</table>"; 
echo "</form>"; 
if (isset($s)) { 
    echo "Edit Status: $s "; 
}     
if ($m == 'edit') { 
    $addUrl = "userdetail.php?mode=add&userid=$userid"; 
    if (isset($s)) 
        $addUrl .= "&sort=$s";     
} 

include 'footer.php';
?> 