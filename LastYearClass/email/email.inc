<?php

function send_mail($to_name, $to_email, $from_name, $from_email, $subject, $message){
	// strip the slashes out of these strings.
	while(list($key,$val)=each($_REQUEST)){
		$$key = stripslashes( $val );
	}

	mail("$to_name<$to_email>", $subject, $message, "From: $from_name<$from_email>\nX-Mailer: PHP/" . phpversion());	

	// Optional MySQL logging can go here. Example:
	// mysql_query("INSERT INTO some_table (ip_address, from_name, from_email, to_name, to_email, subject, message, date) VALUES('".$_SERVER['REMOTE_ADDR']."', '$from_name', '$from_email', '$to_name', '$to_email', '$subject', '$message', now())");
	// You'll have to make your own insert statement that will actually work based upon a table
	// you setup for this.
}

?>