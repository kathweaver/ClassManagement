<?
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
$page_title="Lost Passord?";
include 'header.php';
switch($_POST['recover']){
	default:
	include '../forms/lost_pw.html';
	break;

	case "recover":
	recover_pw($_POST['email_address']);
	break;
}

function recover_pw($email_address){
	if(!$email_address){
		echo "You forgot to enter your Email address <strong>Silly</strong><br />";
		include '../forms/lost_pw.html';
		exit();
	}

	// quick check to see if record exists	

	$sql_check = mysql_query("SELECT * FROM users WHERE email_address='$email_address'");
	$sql_check_num = mysql_num_rows($sql_check);
	if($sql_check_num == 0){
		echo "No records found matching your email address<br />";
		include '../forms/lost_pw.html';
		exit();
	}

	// Everything looks ok, generate password, update it and send it!

	function makeRandomPassword() {
  		$salt = "abchefghjkmnpqrstuvwxyz0123456789";
  		srand((double)microtime()*1000000); 
	  	$i = 0;
	  	while ($i <= 7) {
	    		$num = rand() % 33;
	    		$tmp = substr($salt, $num, 1);
	    		$pass = $pass . $tmp;
	    		$i++;
	  	}
	  	return $pass;
	}

	$random_password = makeRandomPassword();
	$db_password = md5($random_password);

	$sql = mysql_query("UPDATE users SET password='$db_password' WHERE email_address='$email_address'");
	//get username
	$sql = mysql_query("SELECT * FROM users WHERE email_address='$email_address'");
	$r = mysql_fetch_array($sql);
	$username=$r["username"]; 
	
	$subject = "Your Password at www.kweaver.net/class !";
	$message = "Hi, we have reset your password.
	Username: $username
	New Password: $random_password

	http://www.kweaver.net/class/login.php

	Thanks!

	Mrs. Weaver

	This is an automated response, please do not reply!";

	mail($email_address, $subject, $message, "From: Mrs. Weaver<kweavus@kweaver.net>\nX-Mailer: PHP/" . phpversion());

	echo "Your password has been sent! Please check your email!<br />";
	include '../forms/login_form.html';
}

?>