<?php
SESSION_START();
// Make database connection.
$page_title="Make Email Contact";

ini_set('include_path', '/home/kweavus/public_html/class');
include 'header.php';
include 'sessionchecker.php';

session_checker();

include 'db.php';

// Simple conversion for register_globals OFF
while(list($key,$val)=each($_POST)){
	$$key = stripslashes( $val );
	
}
$from_name = "Mrs. Weaver";
$from_email = "kathleen.weaver@dallasisd.org";

function email_form($from_name, $from_email, $subject, $message){
	while(list($key,$val)=each($_POST)){
	$$key = stripslashes( $val );
	}

	// Look up the person's first name that they are trying to contact
	$sql = mysql_query("SELECT * FROM users WHERE userid = '".$_REQUEST['userid']."'") or die (mysql_error());
	while($row = mysql_fetch_array($sql)){
		foreach( $row AS $key => $val ){
			$$key = stripslashes( $val );
		}
		
		// Remove the space after first name if no last name
		// is in the database
		if(!$last_name){
			$username = $first_name;
		} else {
			$username = "$first_name $last_name";
		}
		
		// Include the email_form.html
		include '../forms/email_form.html';
	}
	
	// Free the mysql result.
	mysql_free_result($sql);
}

// Begin Script Navigation
switch($_REQUEST['cmd']){
	
	// The default case to show for this switch. If none is specified
	// this case will be used. In other words, the "index" of this script.
	default:
	
	// call the email_form function above.
	email_form($from_name, $from_email, $subject, $message);
	
	// end this case.
	break;



	// Form Validation. If you called this script by:
	// email.php?cmd=validate_form  you would be here:
	case "validate_form":
	
	if(!$from_name || !$from_email || !$subject || !$message){
		echo "<h4>There were errors with your submission! Please Complete the form and try again!</h4>";
		email_form($from_name, $from_email, $subject, $message);
	} else {
		
		// If all is good, send the email!
		$sql = mysql_query("SELECT * FROM users WHERE userid = '$userid' ") or die (mysql_error());
		while($row = mysql_fetch_array($sql)){
			foreach( $row AS $key => $val ){
				$$key = stripslashes( $val );
			}
			
			// simple name check. Remove the space after the first name
			// if there is no last name in the database.
			if(!$last_name){
				$to_name = $first_name;
			} else {
				$to_name = "$first_name $last_name";
			}
			
			// Note: We got the users's email address from the database.
			// Since we used a quick method of generating strings, we now
			// have $email_address with the email address of the person we are
			// trying to contact.  We can now pass this to the send_mail function
			// in place of $to_email.
			
			// Now, include the email.inc and send the email by calling the funciton
			// with the applicable strings attached.
			
			include 'email.inc';
			send_mail($to_name, $email_address, $from_name, $from_email, $subject, $message);
			echo "<h1>Your Mail has been sent!</h1>";
			
		} // end $sql array
		
	} // end if else check for valid form post.
		
	break;

	
}
include 'footer.php';
?>
