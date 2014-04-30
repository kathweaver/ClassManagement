<?php
session_start();


ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
// Make database connection.
$page_title="Email Users";
include 'header.php';
include 'db.php';
// Display table information
echo "<center><h3>User List</h3></center>";
echo "<table  align=\"center\" cellpadding=\"2\" cellspacing=\"2\" border=\"0\">";

//Display userlevel = 0 users

echo "<tr></tr>";
echo "<tr><td align=\"center\"><strong>Students</strong></td></tr>";
echo "<tr><td  align=\"left\"><strong>Name</strong></td><td>Period</td><td>Class</td><td  align=\"right\"><strong>Contact</strong></td></tr>";
	
$sql = mysql_query ("SELECT * FROM users WHERE user_level = '3' ORDER BY period AND last_name");

while($row = mysql_fetch_array($sql)){
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}
	
	if(!$last_name){
		$table_username = $first_name;
	} else {
		$table_username = "$first_name $last_name";
	}
	echo "<tr><td  align=\"left\">$table_username</td><td>$period</td><td>$class</td><td  align=\"right\"><a href=\"email.php?userid=$userid\">Contact</a></td></tr>";	
} //end while loop

//Display parents

$sql = mysql_query ("SELECT * FROM users WHERE user_level = '2' ORDER BY period AND last_name");
while($row = mysql_fetch_array($sql)){
	echo "<tr></tr>";
	echo "<tr><td align=\"center\"><strong>Parent</strong></td></tr>";
	echo "<tr><td  align=\"left\"><strong>Name</strong></td><td>Period</td><td>Class</td><td  align=\"right\"><strong>Contact</strong></td></tr>";
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}
	
	if(!$last_name){
		$table_username = $first_name;
	} else {
		$table_username = "$first_name $last_name";
	}
	
	echo "<tr><td  align=\"left\">$table_username</td><td>$period</td><td>$class</td><td  align=\"right\"><a href=\"email.php?userid=$userid\">Contact</a></td></tr>";	
} //end while loop
// Display Guest

$sql = mysql_query ("SELECT * FROM users WHERE user_level = '1'");
while($row = mysql_fetch_array($sql)){
	echo "<tr></tr>";
	echo "<tr><td align=\"center\"><strong>Guest</strong></td></tr>";
	echo "<tr><td  align=\"left\"><strong>Name</strong></td><td  align=\"right\"><strong>Contact</strong></td></tr>";
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}
	
	if(!$last_name){
		$table_username = $first_name;
	} else {
		$table_username = "$first_name $last_name";
	}
	
	echo "<tr><td  align=\"left\">$table_username</td><td  align=\"right\"><a href=\"email.php?userid=$userid\">Contact</a></td></tr>";	
} //end while loop

//Display none

$sql = mysql_query ("SELECT * FROM users WHERE user_level = '0' ORDER BY period");
while($row = mysql_fetch_array($sql)){
	echo "<tr></tr>";
	echo "<tr><td align=\"center\"><strong>No level</strong></td></tr>";
	echo "<tr><td  align=\"left\"><strong>Name</strong></td><td>Period</td><td>Class</td><td  align=\"right\"><strong>Contact</strong></td></tr>";
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}
	
	if(!$last_name){
		$table_username = $first_name;
	} else {
		$table_username = "$first_name $last_name";
	}
	
	echo "<tr><td  align=\"left\">$table_username</td><td>$period</td><td>$class</td><td  align=\"right\"><a href=\"email.php?userid=$userid\">Contact</a></td></tr>";	
} //end while loop

// Display Teachers

$sql = mysql_query ("SELECT * FROM users WHERE user_level = '4'");
while($row = mysql_fetch_array($sql)){
	echo "<tr></tr>";
	echo "<tr><td align=\"center\"><strong>Teacher</strong></td></tr>";
	echo "<tr><td  align=\"left\"><strong>Name</strong></td><td  align=\"right\"><strong>Contact</strong></td></tr>";
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}
	
	if(!$last_name){
		$table_username = $first_name;
	} else {
		$table_username = "$first_name $last_name";
	}
	
	echo "<tr><td  align=\"left\">$table_username</td><td  align=\"right\"><a href=\"email.php?userid=$userid\">Contact</a></td></tr>";	
} //end while loop

echo "</table>";
include 'footer.php';
?>
</BODY>
</HTML>