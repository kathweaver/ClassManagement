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

	$book = $_REQUEST['book'];
	$TEKS = $_REQUEST['TEKS'];
	$name = $_REQUEST['name'];

	$book = stripslashes($book);
	$TEKS = stripslashes($TEKS);
	$name=stripslashes($name);
	
	$user_level=stripslashes($user_level);

	if ($book == "" && $TEKS =="" && $name=="")
		$q1 = "SELECT * FROM Assignments"; 

	if ($book != "" && $TEKS =="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%'"; 
	
	if ($book == "" && $TEKS !="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%'"; 
		
	if ($book == "" && $TEKS =="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Name LIKE '%".$name."%'"; 
	
	if ($book == "" && $TEKS !="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%' AND Name LIKE '%".$name."%'"; 
	
	if ($book != "" && $TEKS =="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND Name LIKE '%".$Name."%'"; 
	
	if ($book != "" && $TEKS !="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND TEKS LIKE '%".$TEKS."%'"; 
	
	if ($book != "" && $TEKS !="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND TEKS LIKE '%".$TEKS."%' AND Name LIKE '%".$name."%'"; 

	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

	if (empty($offset)) { 
		$offset=0; 
    }
	$limit=20; // change to number of items displayed per page 

	if ($book == "" && $TEKS== "" && $name=="")
		$q1 = "SELECT * FROM Assignments ORDER BY `Index` Limit $offset, $limit"; 
	
	if ($book != "" && $TEKS== "" && $name=="")
			$q1 = "SELECT * FROM Assignments WHERE `Book` LIKE  %".$book."% ORDER BY `Index` Limit $offset, $limit"; 
	
	if ($book == "" && $TEKS!= "" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE `TEKS` LIKE '%".$TEKS."%' ORDER BY `Index` Limit $offset, $limit"; 
	
	if ($book == "" && $TEKS== "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE `Name` LIKE '%".$name."%' ORDER BY `Index` Limit $offset, $limit"; 

	if ($book != "" && $TEKS != "" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE `Book` LIKE '%".$book."' and TEKS LIKE '%".$TEKS."%' ORDER BY `Index` Limit $offset, $limit"; 

	if ($book != "" && $TEKS == "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE `Book` LIKE '%".$book."%' and Name LIKE '%".$name."%' ORDER BY `Index` Limit $offset, $limit"; 

	if ($book == "" && $TEKS != "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE `TEKS` LIKE '%".$TEKS."%' and Name LIKE '%".$name."%' ORDER BY `Index` Limit $offset, $limit"; 

	if ($book != "" && $TEKS != "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE `Book` LIKE `%".$book."%` and TEKS LIKE '%".$TEKS."%' and Name LIKE '%".$name."%' ORDER BY `Index` Limit $offset, $limit"; 

    $rslt1 = mysql_query($q1) or die("Query failed"); 

	echo "<tr>";
	echo "<th>&nbsp;</th>";
	echo "<th>Index</th><th>Book</th><th>Name</th><th>Topic</TH><TH>TEKS</TH><th>Instructions</th><th>URL</th>";
	echo "<th>TurnIn</th><th>&nbsp;</th><th>&nbsp;</th>";
	echo "</tr>";
    while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
        echo "<tr>"; 
    	$dtlUrl = "assignmentdetail.php?mode=edit&Index=".$row1['Index']; 
	    $delUrl = "assignmentpost.php?mode=delete&delIndex=".$row1['Index']; 
		$copyUrl ="assignmentdetail.php?mode=copy&Index=".$row1['Index']; 
		
		if (empty($row1['Book'])) $row1['Book']="&nbsp";
		if (empty($row1['Name'])) $row1['Name']="&nbsp";
		if (empty($row1['Topic'])) $row1['Topic']="&nbsp";
		if (empty($row1['TEKS'])) $row1['TEKS']="&nbsp";
		if (empty($row1['Instructions'])) $row1['Instructions']="&nbsp";
		if ($user_level == 4)
            echo "<td><input type=\"button\" value=\"Modify\" onClick=\"window.open('".$dtlUrl."','modify_window',config='scrollbars=yes,resizable=yes,height=900,width=1000')\"></td>\t"; 
		echo "<td>".$row1['Index']."</td>";
	   	echo "<td>".$row1['Book']."</td>";
		echo "<td>".$row1['Name']."</td>";
		echo "<td>".$row1['Topic']."</td>";		
		echo "<td>".$row1['TEKS']."</td>";
		echo "<td>".$row1['Instructions']."</td>";
		$URL=$row1['URL'];
		$URLName=$row1['URLName'];
		$Textbook=$row1['Textbook'];
		if (!empty($URL))
			echo ("<td><a href=$URL>$URLName</a></td>");
		elseif (!empty($Textbook))
			echo ('<td><a href="http://www.kweaver.net/class/readfile.php?path='.$Textbook.'">'.$URLName.'</a></td>');
		else
			echo('<td>&nbsp;</td>');
		if ($row1['TurnIn'] != 0)
			echo ('<td align="center">X</td>');
		else
			echo ('<td>&nbsp;</td>');
		if ($user_level == 4){
	    	echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>"; 
			echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\"></td></tr>"; 
		}
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
