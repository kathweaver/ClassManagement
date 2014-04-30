<? 
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';

function select_menu(){ 
	echo '<select name="Assignment">'; 
	$Index = $_REQUEST[Index];
	$q1 = "SELECT * FROM Assignments"; 
	$numresults=mysql_query($q1); 
	$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

	$count = $numrows; 

	while ($row1 = mysql_fetch_array($numresults, MYSQL_ASSOC)) { 
        echo "<option value=\"".$row1[Index]."\">".$row1[Name]."</option>"; 
    } 
    echo '</select>'; 
	echo "Number of Assignments: $count"; 
} 

// HTML Form here: 
echo '<form method="post" action="../Lessons/lessondetail1.php?mode=edit&Index='.$Index.'">'; 
echo 'Select an Assignment';   
	select_menu(); 
	echo "<P>";
	echo "<input type='submit' name='SubmitFrm' value='Submit'>"; 
echo '</form>'; 

?> 