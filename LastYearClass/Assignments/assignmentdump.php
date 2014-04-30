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
		$q1 = "SELECT * FROM Assignments WHERE name LIKE '%".$name."%'"; 
	
	if ($book == "" && $TEKS !="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%' AND name LIKE '%".$name."%'"; 
	
	if ($book != "" && $TEKS =="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND name LIKE '%".$name."%'"; 
	
	if ($book != "" && $TEKS !="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND TEKS LIKE '%".$TEKS."%'"; 
	
	if ($book != "" && $TEKS !="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND TEKS LIKE '%".$TEKS."%' AND name LIKE '%".$name."%'"; 
			
	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

	if (empty($offset)) { 
		$offset=0; 
    }
	$limit=20; // change to number of items displayed per page 

	if ($book == "" && $TEKS== "" && $name=="")
		$q1 = "SELECT * FROM Assignments LIMIT $offset, $limit"; 
	
	if ($book != "" && $TEKS== "" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' LIMIT $offset, $limit"; 
	
	if ($book == "" && $TEKS!= "" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%' LIMIT $offset, $limit"; 
	
	if ($book == "" && $TEKS== "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE name LIKE '%".$name."%' LIMIT $offset, $limit"; 

	if ($book != "" && $TEKS != "" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."' and TEKS LIKE '%".$TEKS."%'LIMIT $offset, $limit"; 

	if ($book != "" && $TEKS == "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' and name LIKE '%".$name."%' LIMIT $offset, $limit"; 

	if ($book == "" && $TEKS != "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%' and name LIKE '%".$name."%' LIMIT $offset, $limit"; 

	if ($book != "" && $TEKS != "" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' and TEKS LIKE '%".$TEKS."%' and name LIKE '%".$name."%' LIMIT $offset, $limit"; 
	
    $rslt1 = mysql_query($q1) or die("Query failed"); 

	echo "<tr>";
	echo "<th>Index</th><th>Book</th><th>Name</th><th>Topic</TH><th>Instructions</th><th>URL</th>";
	echo "</tr>";
    while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
        echo "<tr>"; 
	
		if (empty($row1['Book'])) $row1['Book']="&nbsp";
		if (empty($row1['Name'])) $row1['Name']="&nbsp";
		if (empty($row1['Topic'])) $row1['Topic']="&nbsp";
		if (empty($row1['Instructions'])) $row1['Instructions']="&nbsp";
		echo "<td>".$row1['Index']."</td>";
	   	echo "<td>".$row1['Book']."</td>";
		echo "<td>".$row1['Name']."</td>";
		echo "<td>".$row1['Topic']."</td>";		
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
	
?>