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
	$Index = $_REQUEST['Index'];
	 $q1 = "SELECT * FROM Assignments WHERE 1 AND `Index` =".$Index;
	 $rslt1 = mysql_query($q1) or die("Select Query failed"); 
	 $row1 = mysql_fetch_array($rslt1); 
     /* Free resultset */ 
      mysql_free_result($rslt1);     
	
	$book = $row1['Book'];

	$user_level=stripslashes($user_level);

	$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%'"; 
	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

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
} 
   
// Main Script   
	loadlist();
	
?>