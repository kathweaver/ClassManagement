<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';

    $mode = $HTTP_GET_VARS["mode"]; 
    $delIndex = $HTTP_GET_VARS["delIndex"]; 

	$Index = $HTTP_GET_VARS["Index"];

	$Book = $_POST['Book'];
	$Name = $_POST['Name'];
	$Topic = $_POST['Topic'];
	$TEKS = $_POST['TEKS'];
	$Instructions = $_POST['Instructions'];
	$URL_Name = $_POST['URLName'];
	$URL = $_POST['URL'];
	$Textbook = $_POST['Textbook'];
	$TurnIn = $_POST['TurnIn'];
	if ($TurnIn == 'on') 
		$TurnIn=1;
	else
		$TurnIn=0;
	
/*   
    // For debugging 
    foreach($_POST as $key => $value) { 
        echo "$key: $value \n"; 
    } 
*/ 

    if (isset($mode) && ($mode == 'delete') && ($delIndex > 0)) { 
        $status = "Deleted"; 
        $q1 = "DELETE FROM Assignments WHERE `Index` = $delIndex"; 
		$rslt1 = mysql_query($q1) or die("Delete Query failed");  
    } elseif ($Index > 0) { 
        $status = "Saved"; 
		$q1 = "UPDATE Assignments SET `Book`='$Book', `Name`='$Name', `Topic`='$Topic', `TEKS`='$TEKS', `Instructions`='$Instructions', `URL`='$URL', `URLName`='$URL_Name', `Textbook`='$Textbook', `TurnIn`='$TurnIn' WHERE `Index`=$Index";
		$rslt1 = mysql_query($q1) or die("Edit Query failed"); 
    } else { 
        if ($Index == 0) { 
            $status = "Added";         
            $q1 ="INSERT INTO Assignments (Book, Name, Topic, TEKS, Instructions, URL, URLName, Textbook, TurnIn )
				VALUES ('$Book', '$Name', '$Topic', '$TEKS', '$Instructions', '$URL', '$URL_Name', '$Textbook', '$TurnIn')";
			$rslt1 = mysql_query($q1) or die("Add Query failed");             
			$Index = mysql_insert_id($connection); 
        } 
    } 
    if ($mode == 'delete') { 
        $returnurl = $_SESSION['session_prevPage']; 
    } else { 
           $returnurl = "assignmentdetail.php?mode=edit&Index=".$Index."&status=".$status; 
    }    
    header("Location: $returnurl");  
?> 