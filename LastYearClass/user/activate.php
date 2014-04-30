<?

/* Account activation script */
// Get database connection
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';

// Create variables from URL.
$userid = $_REQUEST['id'];
$code = $_REQUEST['code'];

$sql = mysql_query("UPDATE users SET activated='1' WHERE userid='$userid' AND password='$code'");
$sql_doublecheck = mysql_query("SELECT * FROM users WHERE userid='$userid' AND password='$code' AND activated='1'");
$doublecheck = mysql_num_rows($sql_doublecheck);

if($doublecheck == 0){
	echo "<strong><font color=red>Your account could not be activated!</font></strong>";
} elseif ($doublecheck > 0) {
	echo "<strong>Your account has been activated!</strong> You may login below!<br />";
	include '../forms/login_form.html';
}
?>