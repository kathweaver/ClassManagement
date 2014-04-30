<?
/* Check User Script */
session_start();  // Start Session
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
// Convert to simple variables
$username = $_POST['username'];
$password = $_POST['password'];

if((!$username) || (!$password)){
	echo "Please enter ALL of the information! <br />";
	include 'index.php';
	exit();
}

// Convert password to md5 hash
$password = md5($password);

// check if the user info validates the db
$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' AND activated='1'");
$login_check = mysql_num_rows($sql);

if($login_check > 0){
	while($row = mysql_fetch_array($sql)){
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}

		// Register some session variables!
		$_SESSION['session_first_name']=$first_name;
		$_SESSION['session_last_name']=$last_name;
		$_SESSION['session_StudentId']=$StudentId;
		$_SESSION['session_email_address']=$email_address;
		$_SESSION['session_user_level']=$user_level;
		$_SESSION['session_class']=$class;
		$_SESSION['session_period']=$period;
		$_SESSION['session_username']=$username;
		$_SESSION['session_userid']=$userid;

		mysql_query("UPDATE users SET last_login=now() WHERE userid='$userid'");
		
		if ($user_level==3)
		{	header("Location: ../cal.php");
		}
		else
		{	header("Location: ../main.php");
		}
	}

} else {

	echo "You could not be logged in! Either the username and password do not match or you have not validated your membership!<br />
	Please try again!<br />";

	include 'index.php';
}
?>