<?
SESSION_START();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
$page_title="Change User Information";
include 'header.php';
session_checker();

include 'db.php';

if ($Submit){
	$userid = $_SESSION['session_userid'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$StudentId = $_POST['StudentId'];
	$class = $_POST['class'];
	$period = $_POST['period'];
	$email_address = $_POST['email_address'];

	
	$first_name = stripslashes($first_name);
	$last_name = stripslashes($last_name);
	$StudentId = stripslashes($StudentId);
	$class = stripslashes($class);
	$period = stripslashes($period);
	$email_address = stripslashes($email_address);
	$q1 ="UPDATE users SET first_name='$first_name', last_name='$last_name', StudentId='$StudentId', email_address='$email_address', class='$class', period='$period' WHERE userid='$userid'";
    $rslt1 = mysql_query($q1) or die("Query failed");                  
	echo "Update completed!";
	$_SESSION['session_first_name']=$first_name;
	$_SESSION['session_last_name']=$last_name;
	$_SESSION['session_StudentId']=$StudentId;
	$_SESSION['session_email_address']=$email_address;
	$_SESSION['session_class']=$class;
	$_SESSION['session_period']=$period;
}
else
{
	$user_level = $_SESSION['session_user_level'];
	$userid = $_SESSION['userid'];
	$username = $_SESSION['session_username'];
	$first_name = $_SESSION['session_first_name'];
	$last_name = $_SESSION['session_last_name'];
	$StudentId = $_SESSION['session_StudentId'];
	$class = $_SESSION['session_class'];
	$period = $_SESSION['session_period'];
	$email_address = $_SESSION['session_email_address'];
}

echo ('<form action="');
echo $_SERVER['PHP_SELF'];
echo ('" method="post">');
echo ('<table width="100%" border="0" cellspacing="0" cellpadding="2">');
echo ('<tr>');
echo ('<td align="left" valign="top">First Name</td>');
echo ('<td><input name="first_name" type="text" id="first_name" value ="');
echo ($first_name);
echo ('"></td>');
echo ('</tr>');
echo ('<tr>');
echo ('<td align="left" valign="top">Last Name</td>');
echo ('<td><input name="last_name" type="text" id="last_name" value ="');
echo ($last_name);
echo ('"></td>');
echo ('</tr>');
echo ('<tr>');
echo ('<td align="left" valign="top">Student ID</td>');
echo ('<td><input name="StudentId" type="text" id="StudentId" value ="');
echo ($StudentId);
echo ('"></td>');
echo ('</tr>');
echo ('<tr>');
echo ('<td align="left" valign="top">Email Address</td>');
echo ('<td><input name="email_address" type="text" size="50" id="email_address" value ="');
echo ($email_address);
echo ('"></td>');
echo ('</tr>');
echo ('<tr>');
echo ('<td align="left" valign="top">Period</td>');
echo ('<td><input name="period" type="text" size="5" id="period" value ="');
echo ($period);
echo ('"></td>');
echo ('</tr>');
echo ('<tr>');
echo ('<td align="left" valign="top">Class</td>');
echo ('<td><input name="class" type="text" size="15" id="class" value ="');
echo ($class);
echo ('"></td>');
echo ('</tr>');
echo ('<tr>');
echo ('<td align="left" valign="top"> </td>');
echo ('<td><input type="Submit" name="Submit" value="Submit"></td>');
echo ('<tr>');
echo ('</table>');
echo ('</form>');

include 'footer.php';
?>