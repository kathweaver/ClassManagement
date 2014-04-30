<?
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
if(!isset($_REQUEST['logmeout'])){
	echo "<center>Are you sure you want to logout?</center><br />";
	echo "<center><a href=logout.php?logmeout>Yes</a> | <a href=javascript:history.back()>No</a>";
} else {
	session_destroy();
	if(!session_is_registered('first_name')){
		echo "<center><font color=red><strong>You are now logged out!</strong></font></center><br />";
		include 'login.php';

	}

}

?>

