<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="List Assignments";
include 'noheader.php';
echo "<h3><center>Assignments</CENTER></H3>";
echo "<table border>";

function loadlist() 
{ 
	$user_level = $_SESSION['session_user_level'];
	$offset=$_REQUEST['offset'];

	$user_level=stripslashes($user_level);

	$q1 = "SELECT Distinct Topic FROM Assignments ORDER BY Topic"; 

	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

	if (empty($offset)) { 
		$offset=0; 
    }
	$limit=20; // change to number of items displayed per page 

	$q1 = "SELECT Distinct Topic FROM Assignments ORDER BY Topic LIMIT $offset, $limit"; 
	
	$rslt1 = mysql_query($q1) or die("Query failed"); 

	echo "<tr>";
	echo "<th>&nbsp;</th>";
	echo "<th>Topic</TH>";
	echo "</tr>";
    while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
        echo "<tr>"; 
		$dtlUrl = "assignment_by_topic.php?&Topic=".$row1['Topic'];
		if (empty($row1['Topic'])) $row1['Topic']="&nbsp";
		if ($user_level == 4)
            echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."','modify_window',config='scrollbars=yes,resizable=yes,height=900,width=1000')\"></td>\t"; 
		echo "<td>".$row1['Topic']."</td>";		
 	}
    echo "</table>"; 
	
	mysql_free_result($rslt1);
	
	if ($offset >= 3) { 
		$prevoffset = $offset - $limit; 
		print "<a href='$PHP_SELF?offset=$prevoffset&book=$book&TEKS=$TEKS&name=$name'>PREV</a>&nbsp;"; 
	} 

	$pages=intval($numrows/$limit); 
	
	if ($pages < ($numrows/$limit)){ 
		$pages=($pages + 1); 
	} 
	
	for ($i = 1; $i <= $pages; $i++) { 
		$newoffset = $limit*($i-1); 
		if ($newoffset == $offset) { 
			print "$i&nbsp;"; 
		} else { 
			print "<a href='$PHP_SELF?offset=$newoffset&book=$book&TEKS=$TEKS&name=$name'>$i</a>&nbsp;"; 
		} 
	} 

//show next if not last 
if (! ( ($offset/$limit) == ($pages - 1) ) && ($pages != 1) ) { 
	$newoffset = $offset+$limit; 
	print "<a href='$PHP_SELF?offset=$newoffset&book=$book&TEKS=$TEKS&name=$name'>NEXT</a><p>"; 
	} 
        /* Free resultset */ 
} 
   
// Main Script   
	loadlist();
	
include 'footer.php';
?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this Lesson?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
</script> 
