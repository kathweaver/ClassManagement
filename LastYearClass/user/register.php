<?

ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';

// Define post fields into simple variables
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$StudentId = $_POST['StudentId'];
$email_address = $_POST['email_address'];
$user_level_name = $_POST['user_level'];
$period = $_POST['period'];
$class = $_POST['class'];

/* Let's strip some slashes in case the user entered
any escaped characters. */

$first_name = stripslashes($first_name);
$last_name = stripslashes($last_name);
$StudentId = stripslashes($StudentId);
$email_address = stripslashes($email_address);
$user_level_name = stripslashes($user_level_name);
$period = stripslashes($period);
$class = stripslashes($class);

/* make the username */
$username = strtolower($last_name .'_' .$first_name);
$query = "SELECT username FROM users WHERE username='$username'";
$sql_username = mysql_query($query);
$username_check = mysql_num_rows($sql_username);
if($username_check > 0){
	$username = $username.$username_check;

if ($user_level_name == 'Teacher') $user_level = 4;
if ($user_level_name == 'Student') $user_level = 3;
if ($user_level_name == 'Parent') $user_level = 2;
if ($user_level_name == 'Guest') $user_level = 1;

}

/* Do some error checking on the form posted fields */

if((!$first_name) || (!$last_name) || (!$StudentId) || (!$email_address) || (!$user_level)){
	echo 'You did not submit the following required information! <br />';
	if(!$first_name){
		echo "First Name is a required field. Please enter it below.<br />";
	}
	if(!$last_name){
		echo "Last Name is a required field. Please enter it below.<br />";
	}
	if(!$StudentId){
	    echo "Student ID is a required field. Please enter it below.<br />";
	}
	if(!$email_address){
		echo "Email Address is a required field. Please enter it below.<br />";
	}
	if(!$user_level){
		echo "Desired User Level is a required field. Please enter it below.<br />";
	}
	include '../forms/join_form.html'; // Show the form again!
	/* End the error checking and if everything is ok, we'll move on to
	 creating the user account */
	exit(); // if the error checking has failed, we'll exit the script!
}

/* Let's do some checking and ensure that the user's email address or username
 does not exist in the database */

$sql_email_check = mysql_query("SELECT email_address FROM users WHERE email_address='$email_address'");
$email_check = mysql_num_rows($sql_email_check);

if($email_check > 0){
   	echo "Please fix the following errors: <br />";
	echo "<strong>Your email address has already been used by another member in our database. Please submit a different Email address!<br />";
	unset($email_address);
 	include '../forms/join_form.html'; // Show the form again!
 	exit();  // exit the script so that we do not create this account!
}

$sql="SELECT last_name, first_name FROM users WHERE last_name='$last_name' AND first_name='$first_name'";
$sql_name_check = mysql_query($sql);
$name_check = mysql_num_rows($sql_name_check);

if($name_check > 0){
   	echo "Please fix the following errors: <br />";
	echo "<strong>Your lastname and first name have already been used by another member in our database. Please see your teacher!<br />";
	unset($last_name);
	unset($first_name);
 	include '../forms/join_form.html'; // Show the form again!
 	exit();  // exit the script so that we do not create this account!
}

/* Everything has passed both error checks that we have done.
It's time to create the account! */

/* Random Password generator. 
http://www.phpfreaks.com/quickcode/Random_Password_Generator/56.php
We'll generate a random password for the
user and encrypt it, email it and then enter it into the db.
*/

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

// Enter info into the Database.
$info2 = htmlspecialchars($info);
$sql = mysql_query("INSERT INTO users (first_name, last_name, StudentId, email_address, username, password, class, period, user_level, signup_date)
		VALUES('$first_name', '$last_name', '$StudentId', '$email_address', '$username', '$db_password', '$class', '$period', '$user_level', now())") or die (mysql_error());

if(!$sql){
	echo 'There has been an error creating your account. Please contact the webmaster.';
} else {
	$userid = mysql_insert_id();

	// Let's mail the user!
	$subject = "Your Membership at Mrs. Weaver's Website!";
	$message = "Dear $first_name $last_name,
	Thank you for registering at our website, http://www.kweaver.net/class !

	You are two steps away from logging in and accessing our exclusive members area.

	To activate your membership, please click here: http://www.kweaver.net/class/user/activate.php?id=$userid&code=$db_password

	Once you activate your membership, you will be able to login with the following information:

	Username: $username
	Password: $random_password

	Thanks!
	Mrs. Weaver
	
	This is an automated response, please do not reply!";

    mail($email_address, $subject, $message, "From: Mrs. Weaver<kathleen.weaver@dallasisd.org>\nX-Mailer: PHP/" . phpversion());
	echo 'Your membership information has been mailed to your email address! Please check it and follow the directions!';
}
?>
