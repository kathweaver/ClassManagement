<?
session_start();
$page_title="Login Successful - Welcome to Mrs. Weaver's ClassRoom Site";
include 'header.php';
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();	

echo "<br>Welcome ". $_SESSION['session_first_name'] ." ". $_SESSION['session_last_name'] ."! You have made it to the members area!<br /><br />";
echo "Your user level is ". $_SESSION['session_user_level']." which enables you access to the following areas: <br />";

include 'footer.php';

?>