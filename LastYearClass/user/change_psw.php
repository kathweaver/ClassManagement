<?PHP 
session_start();  // Start Session 
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();

include_once 'db.php';

// Convert to simple variables from form 
$username = $_POST['username']; 
$oldpass = $_POST['oldpass']; 
$newpass = $_POST['newpass']; 
$verify = $_POST['verify']; 

/* Let's strip some slashes in case the user entered 
any escaped characters. */ 

$username = stripslashes($username); 
$oldpass = stripslashes($oldpass); 
$newpass = stripslashes($newpass); 
$verify = stripslashes($verify); 

/* Do some error checking on the form posted fields */ 

if((!$username) || (!$oldpass) || (!$newpass) || (!$verify)) { 
   echo "You did not submit the following required information! <br />"; 
   if(!$first_name){ 
      echo "Username is a required field. Please enter it below.<br />"; 
   } 
   if(!$oldpass){ 
      echo "Your old password is a required field. Please enter it below.<br />"; 
   } 
   if(!$newpass){ 
      echo "Your new password is a required field. Please enter it below.<br />"; 
   } 
   if(!$verify){ 
      echo "You must verify your new password. Please enter it below.<br />"; 
   } 

   include 'change_psw.html'; // Show the form again! 
   exit(); // if the error checking has failed, we'll exit the script! 
} 

// Convert the old password to the encrypted version 
$oldpass = md5($oldpass); 

// Check the database to see if the user and password authenticate 

   $sql_check = mysql_query("SELECT * FROM users WHERE username='$username' and password='$oldpass'"); 
   $sql_check_num = mysql_num_rows($sql_check); 
   if($sql_check_num == 0) { 
      echo "No records found matching that Username and Password<br />"; 
      include 'change_psw.html'; 
      exit(); 
   } 

// Get the email address of the user from the db so we can email them later. 

$email_address = mysql_query("SELECT * FROM users WHERE username='$username' and password='$oldpass'"); 
$result = mysql_fetch_array($email_address); 
$email = $result["email_address"]; 

// echo "$email<br />"; 

if($newpass != $verify) { 
   echo "Your new password and the password verification did not match.<br />"; 
   echo "Please make sure to use the same password for both fields.<br />"; 
   include 'http://www.kweaver.net/class/user/change_psw.html'; // Show the form again! 
   exit(); // if the fields are not equal, exit the script! 
} 

$dbpass = md5($newpass); 

// echo "$oldpass<br />"; 
// echo "$dbpass<br />"; 


   $sql_check = mysql_query("SELECT * FROM users WHERE username='$username' and password='$oldpass'"); 
   $sql_check_num = mysql_num_rows($sql_check); 
   if($sql_check_num == 0) { 
      echo "No records found matching that Username and Password<br />"; 
      include 'http://www.kweaver.net/class/user/change_psw.html'; 
      exit(); 
   } 
   if($sql_check_num == 1) { 
   $sql = mysql_query("UPDATE users SET password='$dbpass' WHERE username='$username'"); 
   echo "Your New password has been recorded.<br />"; 
   echo "You must now log in using your new information.<br />"; 
   echo "A copy of your password has been sent to your email for your records.<br />"; 
   
   $subject = "Password Changed!"; 
   $message = "Hi, your password has been successfully changed. 
   Userid: $username
   New Password: $newpass 

   You may use the following link to re-visit the Website. 
   Please log in using your new information. 
   http://www.kweaver.net/class

   Thanks! 

   This is an automated response, please do not reply!"; 

   mail($email, $subject, $message, "From: Webmaster <kathweav@kweaver.net>\nX-Mailer: PHP/" . phpversion()); 
   include 'login.php';
} 

session_destroy(); 
?> 
