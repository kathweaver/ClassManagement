<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';

    $sort = $HTTP_GET_VARS["sort"]; 
    $mode = $HTTP_GET_VARS["mode"]; 
    $delseq = $HTTP_GET_VARS["delseq"]; 
         
    $seq = $_POST['seq']; 
	$sixweeks = $_POST['sixweeks'];
	$day = $_POST['day'];
	$date = $_POST['date'];

/*   
    // For debugging 
    foreach($_POST as $key => $value) { 
        echo "$key: $value \n"; 
    } 
*/ 

    if (isset($mode) && ($mode == 'delete') && ($delseq > 0)) { 
        $status = "Deleted"; 
        $q1 = "DELETE FROM Day WHERE seq = $delseq"; 
        $rslt1 = mysql_query($q1) or die("Delete Query failed");  
    } elseif ($seq > 0) { 
        $status = "Saved"; 
        $q1 = "UPDATE Day SET SixWeeks='$sixweeks', Day='$day', Date='$date' WHERE seq=$seq"; 
        $rslt1 = mysql_query($q1) or die("Edit Query failed");                  
    } else { 
        if ($seq == 0) { 
            $status = "Added";         
            $q1 = "INSERT INTO Day (SixWeeks, Day, Date) VALUES ('$sixweeks', '$day', '$date')"; 
            $rslt1 = mysql_query($q1) or die("Add Query failed");  
			$seq = mysql_insert_id($connection);            
        } 
    } 
    $returnurl = "daylist.php?page=$sixweeks"; 
     

    header("Location: $returnurl");  
		
include 'footer.php';
?> 