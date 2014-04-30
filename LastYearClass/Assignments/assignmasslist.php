<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Modify Assignments";
include 'noheader.php';
echo "<h3><center>Assignments</CENTER></H3>";
?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this Lesson?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
</script>
<?php

	$user_level = $_SESSION['session_user_level'];

	$book = $_REQUEST['book'];
	$teks = $_REQUEST['teks'];
	$name = $_REQUEST['name'];

	$book = stripslashes($book);
	$teks = stripslashes($teks);
	$name=stripslashes($name);
	
	$user_level=stripslashes($user_level);

	if ($book == "" && $teks =="" && $name=="")
		$q1 = "SELECT * FROM Assignments"; 

	if ($book != "" && $teks=="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%'"; 
	
	if ($book == "" && $teks !="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%'"; 
		
	if ($book == "" && $teks =="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE name LIKE '%".$name."%'"; 
	
	if ($book == "" && $teks !="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE TEKS LIKE '%".$TEKS."%' AND name LIKE '%".$name."%'"; 
	
	if ($book != "" && $teks =="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND name LIKE '%".$name."%'"; 
	
	if ($book != "" && $teks !="" && $name=="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND TEKS LIKE '%".$TEKS."%'"; 
	
	if ($book != "" && $teks !="" && $name!="")
		$q1 = "SELECT * FROM Assignments WHERE Book LIKE '%".$book."%' AND TEKS LIKE '%".$TEKS."%' AND name LIKE '%".$name."%'"; 
			
	$rslt1 = mysql_query($q1) or die("Query failed = error is".mysql_error()); 	
	
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 
if ($Submit){
	$Index=$HTTP_POST_VARS['Index'];
	$Book=$HTTP_POST_VARS['Book'];
	$Name=$HTTP_POST_VARS['Name'];
	$TEKS=$HTTP_POST_VARS['TEKS'];
	$Instructions=$HTTP_POST_VARS['Instructions'];
	$URL=$HTTP_POST_VARS['URL'];
	$URLName=$HTTP_POST_VARS['URLName'];
	$Textbook=$HTTP_POST_VARS['Textbook'];
	$TurnIn=$HTTP_POST_VARS['TurnIn'];
  
	$count = count($Index);
	for ( $i=0 ; $i < $count; $i++)
	{
		if ($TurnIn[$i]==" ") 
	   	    $TurnIn[$i]=0;
	   	else
			$TurnIn[$i]=1;
       $q2 = "UPDATE Assignments SET `Book`='$Book[$i]', `Name`='$Name[$i]',`TEKS`='$TEKS[$i]', `Instructions`='$Instructions[$i]', `URLName`='$URLName[$i]',`URL`='$URL[$i]' , `Textbook`='$Textbook[$i]', `TurnIn`='$TurnIn[$i]' WHERE `Index`=$Index[$i]";
 	   $rslt1 = mysql_query($q2) or die("Edit Query failed"); 
 	}
}
	echo ('<form action="');
	echo $_SERVER['PHP_SELF'];
	echo ('" method="post">');
	echo ('<INPUT TYPE="hidden" NAME="book" SIZE="10" Value="'.$book.'"<P>');
	echo ('<INPUT TYPE="hidden" NAME="TEKS" SIZE="5" Value="'.$TEKS.'"<P>');
	echo ('<INPUT TYPE="hidden" NAME="name" SIZE="5" Value="'.$name.'"<P>');
	echo ("<TABLE>");
	echo ("<TR>");
			
	echo "<TH></TH><TH></TH><TH>Assignment</TH><TH>Book</TH><TH>Name</TH><TH>TEKS</TH><TH>Due Date</TH><TH>Instructions</TH><TH>URL</TH><TH>URL Name</TH><TH>Textbook</TH><TH>Turn In</TH>";
	
	echo "</TR>";
	
	$result = mysql_query($q1);
	while($row = mysql_fetch_array($result)) {
	$copyUrl ="assignmentdetail.php?mode=copy&Index=".$row1['Index']; 
	$delUrl = "assignmentpost.php?mode=delete&delIndex=".$row['Index'];
	echo ("<TR>");
	echo "<td><input type=\"button\" value=\"Copy\" onClick=\"window.open('".$copyUrl."');\">";
	echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t";
	echo ('<TD><INPUT TYPE="text" NAME="Index[]" SIZE="5" VALUE="'.$row["Index"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Book[]" SIZE="15" VALUE="'.$row["Book"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Name[]" SIZE="30" VALUE="'.$row["Name"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="teks[]" SIZE="30" VALUE="'.$row["TEKS"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="DueDate[]" SIZE="5" VALUE="'.$row["DueDate"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Instructions[]" SIZE="50" VALUE="'.$row["Instructions"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="URL[]" SIZE="25" VALUE="'.$row["URL"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="URLName[]" SIZE="25" VALUE="'.$row["URLName"].'"></TD>');
	echo ('<TD><INPUT TYPE="text" NAME="Textbook[]" SIZE="25" VALUE="'.$row["Textbook"].'"></TD>');
	if ($row['TurnIn'] == "1")
			echo ('<td><INPUT TYPE="text" NAME="TurnIn[]" SIZE="3" VALUE="Y"></td>');
		else
			echo ('<td><INPUT TYPE="text" NAME="TurnIn[]" SIZE="3" VALUE=" "></td>');
	echo ("</TR>");
}
	echo ('<TR><TD><input type="Submit" name="Submit" value="Submit"></TD></TR>');
	echo ("</TABLE>");
	echo ("</form>");
	
include 'footer.php';

?>
