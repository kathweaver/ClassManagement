<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';

    $sort = $HTTP_GET_VARS["sort"]; 
    $mode = $HTTP_GET_VARS["mode"]; 
    $deluserid = $HTTP_GET_VARS["deluserid"]; 
         
    $userid = $_POST['userid']; 
	$username = $_POST['username'];
	$user_level = $_POST['user_level'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$period = $_POST['period'];
	$class = $_POST['class'];
	$activated = $_POST['activated'];
	$email_address = $_POST['email_address'];
	$TypingID = $_POST['TypingID'];
	
/*   
    // For debugging 
    foreach($_POST as $key => $value) { 
        echo "$key: $value \n"; 
    } 
*/ 

    if (isset($mode) && ($mode == 'delete') && ($deluserid > 0)) { 
        $status = "Deleted"; 
        $q1 = "DELETE FROM users WHERE userid = $deluserid"; 
        $rslt1 = mysql_query($q1) or die("Delete Query failed");  
    } elseif ($userid > 0) { 
        $status = "Saved"; 
        $q1 = "UPDATE users SET username='$username', user_level='$user_level', first_name='$first_name', last_name='$last_name', class='$class', period='$period', activated='$activated', email_address='$email_address', TypingID='$TypingID' WHERE userid=$userid"; 
        $rslt1 = mysql_query($q1) or die("Edit Query failed");                  
    } else { 
        if ($userid == 0) { 
            $status = "Added";         
            $q1 = "INSERT INTO users (username, user_level, first_name, last_name, class, period, activated, email_address, TypingID) VALUES ('$username', '$user_level', '$first_name', '$last_name', '$class', '$period', '$activated', '$email_address', '$TypingID')"; 
            $rslt1 = mysql_query($q1) or die("Add Query failed");             
			$userid = mysql_insert_id($connection);  
        } 
    } 
    if ($mode == 'delete') { 
        $returnurl = "userlist.php"; 
    } else { 
           $returnurl = "userdetail.php?mode=edit&userid=".$userid."&status=".$status; 
    }     

    header("Location: $returnurl");  
		
include 'footer.php';
?> 