<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include_once 'db.php';
$page_title="Modify Day";
include_once 'header.php';

$user_level = $_SESSION['session_user_level'];
$Six_Weeks = $_REQUEST['SixWeeks'];
$Day = $_REQUEST['Day'];
$choice = $_REQUEST['Submit'];
$Six_Weeks=stripslashes($Six_Weeks);
$Day=stripslashes($Day);
$user_level=stripslashes($user_level);

if ($user_level == 4)
{
	$sqlstring = "SELECT * FROM Day WHERE SixWeeks = $Six_Weeks AND Day = $Day";
	$sql= mysql_query($sqlstring);
	$result = mysql_num_rows($sql);

	if($result > 0){
		while($row = mysql_fetch_array($sql)){
		foreach( $row AS $key => $val ){
			$$key = stripslashes( $val );
			}
		}
		echo('<form name="form1" method="post" action="update_day.php">');
		echo('<table width="100%" border="0" cellpadding="4" cellspacing="0">');
		echo('<tr><td width="24%" align="left" valign="top">Six Weeks</td>');
		echo('<td width="76%"><input name="SixWeeks" type="text" id="SixWeeks" value="');
		echo($Six_Weeks);
		echo('"></td></tr>');
		echo('<tr><td width="24%" align="left" valign="top">Day</td>');
		echo('<td width="76%"><input name="day" type="text" id="day" value="');
		echo($Day);
		echo('"></td></tr>');
		echo('<tr><td width="24%" align="left" valign="top">Date</td>');
		echo('<td width="76%"><input name="date" type="text" id="date" value="');
		echo($Date);
		echo('"></td></tr>');
		echo('<tr><td align="left" valign="top">&nbsp;</td>
		      <td><input type="submit" name="Submit" value="Update"></td></tr>');
		echo('</table>');
		echo('</form>');
	}
}
	include 'footer.php';
?>